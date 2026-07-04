#!/bin/bash
#
# SessionStart hook for Claude Code on the web.
#
# Idempotent bootstrap of a fresh remote container so the InstaHub Laravel app,
# Pint and the Pest test suite are ready to run without manual steps:
#   * PHP 8.5 + required extensions
#   * Node.js 24
#   * Composer dependencies
#   * .env file + application key
#   * A MariaDB server with the `testing` + `laravel` databases (the suite
#     talks to MySQL/MariaDB on 127.0.0.1:3306 as root/root, see phpunit.xml)
#   * Node dependencies + a production asset build
#
# Runs synchronously so dependencies are guaranteed to be in place before the
# agent starts working. Safe to run repeatedly: every step checks whether its
# work is already done. Can also be run by hand: bash .claude/hooks/session-start.sh
#
set -euo pipefail

# Only provision in Claude Code on the web (remote) environments.
if [ "${CLAUDE_CODE_REMOTE:-}" != "true" ]; then
    exit 0
fi

PROJECT_DIR="${CLAUDE_PROJECT_DIR:-$(cd "$(dirname "$0")/../.." && pwd)}"
cd "$PROJECT_DIR"

log() { printf '\n\033[1;34m[setup]\033[0m %s\n' "$1"; }

# Composer runs as root inside these containers.
export COMPOSER_ALLOW_SUPERUSER=1
export DEBIAN_FRONTEND=noninteractive

# --------------------------------------------------------------------------
# PHP 8.5 (+ extensions the app and its dependencies require)
# --------------------------------------------------------------------------
PHP_EXTS=(cli common bcmath curl gd intl mbstring mysql xml zip sqlite3 redis gmp bz2 igbinary)
if ! command -v php >/dev/null 2>&1 || ! php -v 2>/dev/null | grep -q "PHP 8.5"; then
    log "Installing PHP 8.5 and extensions"
    apt-get update -y || true
    pkgs=(); for e in "${PHP_EXTS[@]}"; do pkgs+=("php8.5-$e"); done
    apt-get install -y "${pkgs[@]}" || true
    [ -x /usr/bin/php8.5 ] && update-alternatives --set php /usr/bin/php8.5 || true
else
    # PHP 8.5 already the default; make sure the extensions are present.
    missing=()
    for e in bcmath curl gd intl mbstring pdo_mysql redis gmp zip exif; do
        php -m 2>/dev/null | grep -qix "$e" || missing+=("$e")
    done
    if [ "${#missing[@]}" -gt 0 ]; then
        log "Installing missing PHP extensions: ${missing[*]}"
        apt-get update -y || true
        pkgs=(); for e in "${PHP_EXTS[@]}"; do pkgs+=("php8.5-$e"); done
        apt-get install -y "${pkgs[@]}" || true
    fi
fi
log "PHP: $(php -v 2>/dev/null | head -1)"

# --------------------------------------------------------------------------
# Node.js 24
# --------------------------------------------------------------------------
if ! node --version 2>/dev/null | grep -q '^v24'; then
    if [ -x /opt/node24/bin/node ]; then
        log "Activating existing Node.js 24 at /opt/node24"
    else
        log "Installing Node.js 24"
        NODE_TARBALL="$(curl -fsSL https://nodejs.org/dist/latest-v24.x/ \
            | grep -oE 'node-v24\.[0-9.]+-linux-x64\.tar\.xz' | head -1 || true)"
        if [ -n "$NODE_TARBALL" ]; then
            curl -fsSL "https://nodejs.org/dist/latest-v24.x/$NODE_TARBALL" -o /tmp/node24.tar.xz
            mkdir -p /opt/node24
            tar -xJf /tmp/node24.tar.xz -C /opt/node24 --strip-components=1
            rm -f /tmp/node24.tar.xz
        fi
    fi
    # Put Node 24 first on PATH for login shells and this script.
    if [ -x /opt/node24/bin/node ]; then
        echo 'export PATH=/opt/node24/bin:$PATH' > /etc/profile.d/nodejs.sh
        export PATH="/opt/node24/bin:$PATH"
    fi
fi
log "Node: $(node --version 2>/dev/null) / npm $(npm --version 2>/dev/null)"

# Persist env for the rest of the Claude Code session, if requested.
if [ -n "${CLAUDE_ENV_FILE:-}" ]; then
    echo 'export COMPOSER_ALLOW_SUPERUSER=1' >> "$CLAUDE_ENV_FILE"
    [ -x /opt/node24/bin/node ] && echo 'export PATH=/opt/node24/bin:$PATH' >> "$CLAUDE_ENV_FILE"
fi

# --------------------------------------------------------------------------
# Composer dependencies
# --------------------------------------------------------------------------
if [ ! -d vendor ] || [ composer.lock -nt vendor ]; then
    log "Installing Composer dependencies"
    composer install --no-interaction --prefer-dist --no-progress
else
    log "Composer dependencies already installed"
fi

# --------------------------------------------------------------------------
# Application environment (.env + key)
# --------------------------------------------------------------------------
if [ ! -f .env ]; then
    log "Creating .env from .env.example"
    cp .env.example .env
fi
if ! grep -q '^APP_KEY=base64:' .env; then
    log "Generating application key"
    php artisan key:generate --ansi --force
fi
# Align the local DB password with the MariaDB root user provisioned below
# (the .env ships with an empty password, but we secure root with 'root' so
# the same credentials work for TCP connections and the test suite).
if grep -q '^DB_PASSWORD=$' .env; then
    log "Setting local DB_PASSWORD to match the provisioned MariaDB root user"
    sed -i 's/^DB_PASSWORD=$/DB_PASSWORD=root/' .env
fi

# --------------------------------------------------------------------------
# MariaDB (the test suite needs MySQL/MariaDB on 127.0.0.1:3306, root/root).
# InstaHub is multi-tenant and provisions per-hub databases with
# `CREATE DATABASE` + `GRANT ... IDENTIFIED BY`, which needs MariaDB and a
# server reachable at 127.0.0.1 that resolves to `localhost`.
# --------------------------------------------------------------------------
if ! command -v mariadbd >/dev/null 2>&1 && ! command -v mysqld >/dev/null 2>&1; then
    log "Installing MariaDB server"
    apt-get update -y || true
    apt-get install -y mariadb-server || true
fi

if command -v mariadb >/dev/null 2>&1 || command -v mysql >/dev/null 2>&1; then
    mkdir -p /var/lib/mysql /var/run/mysqld
    chown -R mysql:mysql /var/lib/mysql /var/run/mysqld 2>/dev/null || true
    if [ ! -d /var/lib/mysql/mysql ]; then
        log "Initializing MariaDB data directory"
        mariadb-install-db --user=mysql --datadir=/var/lib/mysql >/dev/null 2>&1 || true
    fi
    if ! mysqladmin ping --silent 2>/dev/null; then
        log "Starting MariaDB"
        mysqld_safe --user=mysql >/tmp/mariadb.log 2>&1 &
        for _ in $(seq 1 30); do mysqladmin ping --silent 2>/dev/null && break; sleep 1; done
    fi
    log "Configuring databases and root access (root/root over TCP)"
    mysql <<'SQL' 2>/dev/null || mysql -uroot -proot <<'SQL2' 2>/dev/null || true
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
CREATE USER IF NOT EXISTS 'root'@'127.0.0.1' IDENTIFIED BY 'root';
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
CREATE DATABASE IF NOT EXISTS testing;
CREATE DATABASE IF NOT EXISTS laravel;
FLUSH PRIVILEGES;
SQL
CREATE USER IF NOT EXISTS 'root'@'127.0.0.1' IDENTIFIED BY 'root';
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
CREATE DATABASE IF NOT EXISTS testing;
CREATE DATABASE IF NOT EXISTS laravel;
FLUSH PRIVILEGES;
SQL2
    log "Running migrations on the local database"
    php artisan migrate --force --graceful --ansi || true
fi

# --------------------------------------------------------------------------
# Frontend dependencies + build
# --------------------------------------------------------------------------
if [ ! -d node_modules ]; then
    log "Installing Node dependencies"
    npm install --no-audit --no-fund
fi
if [ ! -d public/build ]; then
    log "Building frontend assets"
    npm run build
fi

log "Environment ready."

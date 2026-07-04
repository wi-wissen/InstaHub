#!/bin/bash
#
# SessionStart hook for Claude Code on the web.
# Bootstraps a fresh remote container so the InstaHub Laravel app, Pint and the
# Pest test suite are ready to run without manual steps.
#
# Runs synchronously so dependencies are guaranteed to be in place before the
# agent starts working (no race conditions). All heavy lifting lives in
# scripts/setup-environment.sh, which is idempotent.
#
set -euo pipefail

# Only provision in Claude Code on the web (remote) environments.
if [ "${CLAUDE_CODE_REMOTE:-}" != "true" ]; then
    exit 0
fi

PROJECT_DIR="${CLAUDE_PROJECT_DIR:-$(cd "$(dirname "$0")/../.." && pwd)}"
bash "$PROJECT_DIR/scripts/setup-environment.sh"

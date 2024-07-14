## InstaHub

**Source code and install instructions are in English. Documentation and excersices currently are available in German only.**

InstaHub is a social network for educational purpose only. Students can create their own social network as a database admin. They learn basics about working in a software project, creating and managing a database, querying (SQL SELECT) and editing (SQL INSERT, UPDATE and DELETE).

This project aims to help students develop a general technical understanding of social networks. As result, they will be able to discuss sinjects as big data and information privacy.

Live Demo: https://instahub.org/

Read more (only in German): https://blog.wi-wissen.de/

### Standing on the shoulders of giants

Many thanks and respect to:

- [mariaDB](https://mariadb.org/)
- [php](http://php.net/)
- [Laravel](https://laravel.com/)
  - [hisorange/browser-detect](https://github.com/hisorange/browser-detect)
  - [laracasts/flash](https://github.com/laracasts/flash)
  - [livewire/livewire](https://github.com/livewire/livewire)
  - [orangehill/iseed](https://github.com/orangehill/iseed)
  
- [Bootstrap](https://getbootstrap.com/)
- [Grand Hotel Font](https://fontsource.org/fonts/grand-hotel)
- [Clarity Icons](https://github.com/vmware-archive/clarity)
- Photos by [pixabay](https://pixabay.com/) (CC0)
- Face images by [unsplash.com](https://unsplash.com/) (CC0)
- Fake Ad images based on [unsplash.com](https://unsplash.com/) (CC0)

### Install

#### Prerequisits 

- Have min. PHP 8.2
- Download composer https://getcomposer.org/download/
- Download git https://git-scm.com/downloads

#### Prerequisits for Windows users

- Download XAMMP: https://www.apachefriends.org/download.html
- (Optional) Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside XAMMP installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

### Prerequisits for Sail

```
docker-compose exec mariadb bash
mysql -u root -p
# default: password
GRANT ALL PRIVILEGES ON *.* TO 'sail'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

#### Mac Os, Ubuntu and Windows

1. Create a local database named `instahub`  with encoding utf8_general_ci 
2. Create user `instahub` and grant all rights on `instahub` and for creating databases
3. cd to your local target folder and clone remote project: `git clone git://github.com/wi-wissen/instahub.git`
4. Rename `.env.example` file to `.env`inside your project root and fill in the database information.
  (windows won't let you do that, so you have to use Notepad++ or open your console, cd your project root directory and run `mv .env.example .env` )
5. Edit `.env`
    - `APP_ENV=production` (In `test` Teacher will be activated automatically.)
    - `APP_DEBUG=false` - enable only temporaly for debugging!
    - `DB_*` - if you want another database than MySQL, you have to edit source code.
    - `DB_USERNAME` - user for database
    - `DB_PASSWORD` - passwort for database
    - `MAIL_*` - mail provider for notification of new teachers and resetting passworts (admin accounts may reset passworts without sending a mail)
6. Open the console and cd to your project root directory
7. Run `composer install` or ```php composer.phar install``` ([Howto install composer](https://getcomposer.org/download/))
Optional: Just to be safe or if an error occur on bootup run `php artisan config:clear`
8.  You may need to configure some permissions. Directories within the `storage` and the `bootstrap/cache` directories should be writable by your web server
9. Run `php artisan storage:link`
10. Run `php artisan key:generate` 
11. Run `php artisan migrate`
12. Run `php artisan migrate --path=/database/migrations/create/users`
13. Configure your top-level domain and all subdomains (wildcard) to point to the `public` directory 
14. Visit website and create first teacher (ignore error after creating, thats okay cause you are the first).
15. In the `user` table of your database, manually set the attribute  `is_active` to `1` and `role` to `admin`. Now your user is admin and may manage other accounts.

I recomend to add a cronjob to your system: `* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1`
Then InstaHub will delete old analytic database files each night.

### Contributing
Thank you for considering contributing to the InstaHub! Create a pull request or contact [me](https://wi-wissen.de/contact.php).

### Contributers
InstaHub used parts of [Laragram](https://github.com/itsshady101/Laragram) from [itsshady101](https://github.com/itsshady101) 

### License
[Mozilla Public License (MPL)](https://www.mozilla.org/en-US/MPL/2.0/)
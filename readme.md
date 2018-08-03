## InstaHub

**Source code and install instructions are in English. Documentation and excersices currently are available in German only.**

InstaHub is a social network for educational purpose only. Students can create their own social network as a database admin. They learn basics about working in a software project, creating and managing a database, querying (SQL SELECT) and editing (SQL INSERT, UPDATE and DELETE).

This project aims to help students develop a general technical understanding of social networks. As result, they will be able to discuss sinjects as big data and information privacy.

Live Demo: https://instahub.org/

Read more (only in German): https://blog.wi-wissen.de/

### Standing on the shoulders of giants

Many thanks and respect to:

- [MySQL](https://www.mysql.com/)
- [php](http://php.net/)
- [Laravel](https://laravel.com/)
	- [laracasts/flash](https://github.com/laracasts/flash)
    - [orangehill/iseed](https://github.com/orangehill/iseed)
    - [graham-campbell/exceptions](https://github.com/graham-campbell/exceptions)
	- [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer)
	- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Bootstrap](http://bootstrap.com/)
- [jQuery](https://jquery.com/) with [Backstretch](https://github.com/jquery-backstretch/jquery-backstretch)
- Photos by [pixabay](https://pixabay.com/) (CC0)
- Splash images by [unsplash.com](https://unsplash.com/) (CC0)
- [male](https://unsplash.com/collections/2452740/faces_male) and [female](https://unsplash.com/collections/2453183/faces_female) avatar images by [unsplash.com](https://unsplash.com/) (CC0) 

### Install

#### Prerequisits 

- Download composer https://getcomposer.org/download/
- Download git https://git-scm.com/downloads

#### Prerequisits for Windows users

- Download XAMMP: https://www.apachefriends.org/download.html
- (Optional) Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside XAMMP installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

#### Mac Os, Ubuntu and Windows

1. Create a local database named `instahub`  with encoding utf8_general_ci 
2. Create user `instahub` and grant all rights on `instahub` and for creating databases
3. cd to your local target folder and clone remote project: `git clone git://github.com/wi-wissen/instahub.git`
4. Rename `.env.example` file to `.env`inside your project root and fill in the database information.
  (windows won't let you do that, so you have to use Notepad++ or open your console, cd your project root directory and run `mv .env.example .env` )
5. Edit `.env`
    - `APP_ENV=production`
    - `APP_DEBUG=false` - enable only temporaly for debugging!
    -  `DB_*` - if you want another database than MySQL, you have to edit source code.
    - `DB_USERNAME` - user for database
    - `DB_PASSWORD` - passwort for database
    - `MAIL_*` - mail provider for resetting passworts (admin accounts may reset passworts without sending a mail)
6. Open the console and cd to your project root directory
7. Run `composer install` or ```php composer.phar install``` ([Howto install composer](https://getcomposer.org/download/))
8. Run `php artisan key:generate` 
9. Run `php artisan migrate`
10. Run `php artisan migrate --path=/database/migrations/users`
11. Visit website and create first teacher.
12. In the `user` table of your database, manually set the attribute  `is_active` to `1` and `role` to `admin`. Now your user is admin and may manage other accounts.

### Contributing
Thank you for considering contributing to the InstaHub! Create a pull request or contact [me](https://wi-wissen.de/contact.php).

### Contributers
InstaHub used parts of [Laragram](https://github.com/itsshady101/Laragram) from [itsshady101](https://github.com/itsshady101) 

### License
[Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)](https://creativecommons.org/licenses/by-nc-sa/4.0/)

Commits up to [9c21886](https://github.com/wi-wissen/InstaHub/commit/9c21886f1a578bd991fa4ad5d02c2d7033413a34) are licenced under MIT License. 

Contact [me](https://wi-wissen.de/contact.php) if you need an other licence. 
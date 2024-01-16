# Installation:

1. Installation
    1. Download and install composer from the website https://getcomposer.org/
    2. Start (cmd)
    3. In cmd enter « php -v » to make sure that the php version is ( 8.x) or higher)
    4. In cmd enter « composer -V » to make sure that composer is installed.
    5. create a new project named « my-app » using the folowing command :
       `composer create-project laravel/laravel my-app`
2. if cloneing the repository:
    1. `composer install`
    2. Rename .env.example to .env
    3. Generate encription key `php artisan key:generate`
    4. Setup database credentials in .env
3. Starting the app:
   `php artisan serve`

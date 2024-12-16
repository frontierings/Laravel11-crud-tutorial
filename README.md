<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>

# Laravel CRUD application
This CRUD application is aimed to introduce students to web development using Laravel 11.
## Features:
 - Multi Language: English, Persian/Dari, and Pashto
 - Breeze authentication
 - Tailwindcss for styling

 ## How to configure
 - After cloning the project, rename the ".env.example" file to ".env", then run the following commands:

    ```
    composer install
    ```
    ```
    php artisan migrate
    ```
 - Run <a href="https://tailwindcss.com/docs/guides/laravel"> Tailwindcss</a> commands:

    ```
    npm install -D tailwindcss postcss autoprefixer
    ```
    ```
    npx tailwindcss init -p
    ```
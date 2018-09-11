Prerequisites:
    * PHP >= 7
    * Laravel >= 5.6
    * MySQL >= 5.6
    * Any IDE
    * Any MySQL client

Setup instructions:

    - Add your local database password to the .env file.

    - Create your database using your prefered MySQL client

    - In the Terminal / Command Line, navigate to this directory (The directory containing Readme.txt) and run the following commands:
        * composer install
        * php artisan migrate
        * php artisan serve

    - You can then access the api using your prefered toolset (Postman, Curl, etc).

Testing instructions:

    - Add your local database password to the .env.testing file.

    - Create your testing database using your prefered MySQL client

    - In the Terminal / Command Line, navigate to this directory (The directory containing Readme.txt) and run the following commands:
        * composer install
        * php artisan migrate --env=testing
        * vendor/bin/phpunit

# Project implemented during test

## Installation

Create a `.env` file. You can copy the `.env.example` file. The DB details need to updated.

````
DB_DATABASE=quiz
DB_USERNAME=quiz
DB_PASSWORD=quiz
````

Then run the following commands to finish up.
````
$ composer install
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan serve
````

The application will be available at http://localhost:8000. You have to register first, then login.

To get started, click on the Questions link in the navigation. You can add-edit questions in this module.

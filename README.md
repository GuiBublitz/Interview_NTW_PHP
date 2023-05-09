## Requirements

To run this project on your computer, you must have the following software installed:

- PHP
- Composer

## Setup (running the project)

Follow these steps to set up the project on your machine:

1. Download the project.
2. Run `composer install` in the project directory to install the required dependencies.
3. Rename the `env.example` file to `.env`.
4. Edit the `.env` file to configure your database connection settings.
5. Run `php artisan migrate` to create the necessary database tables.
6. ( Optional ) Run `php artisan db:seed` to seed database with fake data.
7. Run `php artisan serve` to start the local development server.

After completing these steps, your API should be running and ready to use.

## Running Tests

If you don't want to set up the project for development, but only want to run the tests, follow these steps:

1. Download the project.
2. Run `composer install` in the project directory to install the required dependencies.
3. Run `php artisan test` to execute the test suite. 

# support_system

Getting started

Installation

Please check the official laravel installation guide for server requirements before you start. Official Documentation

Clone the repository

git clone https://github.com/binaryprotagonist/support_system.git

Switch to the repo folder

cd support_system

Install all the dependencies using composer

composer install

Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env

Generate a new application key

php artisan key:generate

php artisan migrate

Start the local development server

php artisan serve

You can now access the server at http://localhost:8000

Make sure you set the correct database connection information before running the migrations Environment variables

Database seeding

php artisan db:seed

php artisan migrate:refresh

Client Panel Credentials

email - client1@mailinator.com
password - 123456

email - client2@mailinator.com
password - 123456

Support Panel Credentials

email - admin@mailinator.com
password - 123456

email - support@mailinator.com
password - 123456



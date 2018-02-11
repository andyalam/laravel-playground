Laravel Intro Repo
====
Useful commands

Spin up a dev server:

    php artisan serve

If views aren't updated, clear the cache!

    php artisan view:clear


# Database Notes
To create some models, -m flag for migration:

    php artisan make:model ModelName -m

To create a migration

    php artisan make:migration migration_name_here

To migrate

    php artisan migrate

To create a seed

    php artisan make:seed SeedName

To run a seed

    php artisan db:seed

To refresh for duplicate entries while developing!

    php artisan migrate:refresh


# Creating your database manually

Log into MySQL:

    $ mysql -uroot -p

Create the database specified in the .env file

    mysql> create database DATABASE_NAME;

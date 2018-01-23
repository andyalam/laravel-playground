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
    
To migrate

    php artisan migrate
    
To create a seed

    php artisan make:seed SeedName
    
To run a seed

    php artisan db:seed
    
To refresh for duplicate entries while developing!

    php artisan migrate:refresh
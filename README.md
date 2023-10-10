## First time Setup Intructions

-   Copy `.env.example` to `.env`
-   Make database in your wamp server named as `travel-north`
-   Run following commands

```
composer install
yarn
php artisan key:generate
php artisan config:clear
php artisan migrate
php artisan db:Seed --class=RolesAndPermissionsSeeder
php artisan db:Seed --class=ServicesSeeder
php artisan storage:link
```

## Running the project

```
yarn dev
php artisan serve
```

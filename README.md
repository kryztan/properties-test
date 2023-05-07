<p align="center"><img src="https://snipboard.io/GBIeFR.jpg" width="400" alt="Propertest Logo"></p>

## Propertest (Properties CRM Test)

A simple admin panel to manage properties.

## Setup

Run composer install.
```
composer install
```

Make a `.env` file out of `.env.example`, then update its fields, especially the database connection values and the `APP_URL`. You may have to create a new database as well.

Generate the app key and clear the configuration cache.
```
php artisan key:generate
php artisan config:clear
```

Run the migrations and the seeder.
```
php artisan migrate:install
php artisan migrate
php artisan db:seed
```

## Usage

### Login

Login as admin with email **admin@property.com** and password **password**.

## API Endpoint

Send a `GET` request to `/api/properties`.

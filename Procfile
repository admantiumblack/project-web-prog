web: vendor/bin/heroku-php-apache2 public/
worker: composer install
worker: composer update
worker: php artisan migrate:fresh
worker: php db:seed
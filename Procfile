web: vendor/bin/heroku-php-apache2 public/
worker: composer update
worker: php artisan migrate:fresh
worker: php db:seed
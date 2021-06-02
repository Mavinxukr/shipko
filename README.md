<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Shipko

## Requirements
- PHP >= 7.2.5
- MySQL 5.6+
- Ubuntu 18.04
- Nginx
- Composer

## About Install
1) copy ".env.example" to ".env" with new parameters
2) composer install
3) php artisan cache:clear
4) php artisan config:clear
5) php artisan config:cache
6) php artisan migrate --seed
7) Install [apidocjs](https://apidocjs.com/#install)
8) php artisan apidoc

## Synchronizations
1) php artisan synchronize:cookie
2) php artisan synchronize:database
3) php artisan synchronize:status
4) php artisan synchronize:plan
5) php artisan synchronize:contract
6) php artisan synchronize:procurement
7) php artisan synchronize:reason
7) php artisan synchronize:cause

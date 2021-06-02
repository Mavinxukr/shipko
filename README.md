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
2) composer update 
3) php artisan key:generate
4) php artisan optimize:clear
5) php artisan migrate --seed
6) Install [apidocjs](https://apidocjs.com/#install)
7) edit parameter "url" in file apadoc.json 
8) php artisan apidoc

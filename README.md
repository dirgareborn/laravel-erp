# ERP Toko Amel

## Cara Install
Aplikasi ini dapat dipasang dalam server lokal (PC/Laptop) dan server online, dengan spesifikasi berikut :

#### Spesifikasi minimum server
1. PHP >= 7.3 (dan memenuhi [server requirement Laravel 8.x](https://laravel.com/docs/8.x/deployment#server-requirements)),
2. MySQL atau MariaDB

#### Tahapan Install

1. Clone Repo, pada terminal : `git clone https://github.com/dirgareborn/laravel-erp.git`
2. `$ cd laravel-erp`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Buat database pada MySQL untuk aplikasi ini
7. Setting database pada file `.env`
8. `$ php artisan migrate`
9. `$ php artisan storage:link`
10. `$ php artisan serve`
11. Kunjungi web : `http://localhost:8000`

 [![toko-amel.png](https://i.postimg.cc/05MWkx5b/toko-amel.png)](https://postimg.cc/4nGbPD9g)


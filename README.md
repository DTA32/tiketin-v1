# TIKETIN

## Software Engineering Project

Aplikasi website sederhana pemesanan tiket pesawat yang dibuat untuk tugas akhir mata kuliah Software Engineering. Kelebihan dari website ini adalah user dapat memilih kursi yang diinginkan saat memesan penerbangan

Disclaimer:

- Data yang digunakan web ini hanya dummy
- Segala order yang dilakukan dalam web ini tidak dapat digunakan di dunia nyata

---

## How to install

Execute these lines in your terminal

1. `composer install`
1. `npm install`
1. `cp .env.example .env (or copy and rename .env.example to .env)`
1. `php artisan migrate`
1. `php artisan db:seed`
1. `php artisan key:generate`
1. `php artisan storage:link`

To run this project, execute

`php artisan serve`

---

## Default data

After executing db:seed, these data will be available:

### Credentials

- Admin

email: <admin@email.com>

password: admin

- User

email: <user@email.com>

password: user

### Flights

Flights are available tomorrow, starting from db:seed was executed

---

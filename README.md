# TIKETIN

## Software Engineering Project

Aplikasi website sederhana pemesanan tiket pesawat yang dibuat untuk tugas akhir mata kuliah Software Engineering. Kelebihan dari website ini adalah user dapat memilih kursi yang diinginkan saat memesan penerbangan

Disclaimer:

- Data yang digunakan web ini hanya dummy
- Segala order yang dilakukan dalam web ini tidak dapat digunakan di dunia nyata

---

### Navigation

Login Page: SERVER_URL/login

User Main Page: SERVER_URL/home

Management Admin: SERVER_URL/admin

(SERVER_URL default is localhost:8000)

---

### Default Account

(use db:seed first)

- Admin

email: <admin@email.com>

password: admin

- User

email: <user@email.com>

password: user

---

# How to install

Execute these lines in your terminal

1. composer install
1. npm install
1. cp .env.example .env (or copy and rename .env.example to .env)
1. php artisan migrate
1. php artisan key:generate
1. php artisan storage:link

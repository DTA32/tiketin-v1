# TIKETIN

## Software Engineering Project

Aplikasi website sederhana pemesanan tiket pesawat yang dibuat untuk tugas akhir mata kuliah Software Engineering

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

### To-do list

- [x] kursi penerbangan
- [x] user authentication
- [x] menu admin (detail below)
- [x] news
- [x] settings
- [x] binding pemesanan to user sekalian cobain ubah kelas_penerbangan_id di pemesanan
- [ ] custom scrollbar
- [ ] styling add more icon illust etc
- [ ] step1 filter n sort
- [ ] input validation
- [ ] possible bug fix (step 123 etc (use alert if back))
- [ ] export e-ticket

### menu admin

**ALL USE DB MODEL ELOQUENT**

- [x] bandara: UD
- [x] penerbangan: masukin menu kelas penerbangan, UD
- [x] kelas penerbangan: C seat layout pake template or auto-generate dari parameter input, U gabisa update seat layout, D (C dianggap beres dulu karena terlalu ribet)
- [x] pemesanan: show data aja, jangan CUD (upcoming: Delete)
- [x] news: CRUD
- [x] user: C bikin menu buat bikin akun admin baru, R only show name email, UD

**catatan tambahan (low priority):**

- kelas penerbangan seed JSON seat_layout berbagai tipe pesawat
- step 2 pemesanan tambahin nomor identitas n gender penumpang
- customer service on settings (form db nama user, 'judul, keluhan', id pemesanan (0 = sistem), respon, status)
- db bisa di-optimize chatgpt
- report admin
- online check-in
- fix gitignore
- guide installation (composer autoload, db seed (isi n fix dulu))
- readme: project description (from tugas), disclaimer (using dummy data), recommended improvement (db transaction)

notes from figma comment:

- harusnya db pesawat (maskapai + tipe) dipisah sendiri buat callsign
- step 0 pemesanan opsi pulang pergi
- step 3 tambahin addons (bagasi, asuransi, etc)
- step 5 tambah konfirmasi sweetalert "apakah anda yakin dengan pesanan anda? [ (kecil) pesanan akan diproses setelah ini dan tidak dapat diubah kembali ]"

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

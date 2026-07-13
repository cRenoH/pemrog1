<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">🛍️ Darimata — E-Commerce Fashion</h1>

<p align="center">
  Aplikasi belanja fashion berbasis web, dibangun dengan Laravel 12 + Blade Template Engine.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=flat-square&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/Vite-Bundler-purple?style=flat-square&logo=vite" alt="Vite">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
</p>

---

## 📖 Tentang Project

**Darimata** adalah aplikasi e-commerce fashion yang memungkinkan pengguna untuk berbelanja produk pakaian secara online. Fitur utama meliputi manajemen produk dengan varian ukuran & warna, keranjang belanja, sistem checkout multi-langkah, pembayaran, hingga retur barang.

### Fitur Utama

**Untuk Pembeli (User)**
- Registrasi & login akun
- Katalog produk dengan pencarian & filter
- Detail produk dengan varian ukuran dan warna
- Keranjang belanja & Buy Now
- Wishlist produk
- Checkout dengan pilihan alamat, kurir, dan metode bayar
- Invoice & riwayat pesanan
- Pengajuan retur barang
- Manajemen profil & multiple alamat pengiriman

**Untuk Admin**
- Dashboard statistik (stok, pesanan, pengguna)
- Manajemen produk (tambah, edit, hapus + upload gambar)
- Manajemen varian produk (ukuran, warna, stok)
- Update status pesanan & nomor resi
- Manajemen user (lock, ban, ubah role)
- Activity log (audit trail semua aksi admin)

---

## ⚙️ Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | PHP 8.2+, Laravel 12 |
| Frontend | Blade Template Engine, Vanilla CSS, Vite |
| Database | MySQL |
| Server (Dev) | Laragon (Apache + MySQL) |
| Testing | PestPHP |
| Auth | Laravel built-in Auth + Middleware |

---

## 🚀 Cara Menjalankan Project

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL (via Laragon atau sejenisnya)

### Langkah Instalasi

**1. Clone repository**
```bash
git clone <url-repo> projdarimata1
cd projdarimata1
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Install dependensi Node**
```bash
npm install
```

**4. Konfigurasi environment**
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan koneksi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=darimata
DB_USERNAME=root
DB_PASSWORD=
```

**5. Buat database**

Di MySQL / phpMyAdmin:
```sql
CREATE DATABASE darimata;
```

**6. Jalankan migrasi & seeder**
```bash
php artisan migrate
php artisan db:seed
```

**7. Buat symlink storage**
```bash
php artisan storage:link
```

**8. Jalankan aplikasi**

Opsi A — via Laragon (direkomendasikan):
```
Akses: http://projdarimata1.test
```

Opsi B — via Artisan + Vite:
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Opsi C — satu perintah (via composer script):
```bash
composer run dev
```

---

## 🗂️ Struktur Folder Penting

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AdminController.php       # Dashboard & manajemen admin
│   │   ├── OrdersController.php      # Keranjang, checkout, payment, invoice
│   │   ├── ShopController.php        # Katalog & detail produk
│   │   ├── LoginController.php       # Autentikasi
│   │   ├── RegisterController.php    # Registrasi
│   │   ├── UserProfileController.php # Profil & alamat user
│   │   └── WishlistController.php    # Wishlist
│   └── IsAdmin.php                   # Middleware is_admin
└── Models/                           # 19 Eloquent Model

database/
├── migrations/                       # 23 file migrasi
└── seeders/                          # Data awal (produk, user, kategori)

resources/views/                      # Blade templates
routes/
└── web.php                           # Semua route aplikasi
```

---

## 🗃️ Database

Nama database: **`darimata`**

Project ini menggunakan **23 tabel**, termasuk:
`users`, `products`, `product_variants`, `product_images`, `categories`, `orders`, `order_items`, `order_returns`, `carts`, `addresses`, `wishlists`, `reviews`, `activity_logs`, `sessions`, dan lainnya.

Lihat dokumentasi lengkap di [`rancangan/DOKUMENTASI_PROJECT.md`](rancangan/DOKUMENTASI_PROJECT.md).

---

## 🔐 Akses Default (setelah seeder)

Setelah menjalankan `php artisan db:seed`, akun admin dan user sample tersedia. Cek file `database/seeders/UserSeeder.php` untuk detail kredensial.

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

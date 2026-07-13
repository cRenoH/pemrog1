# 📦 Dokumentasi Lengkap Project: projdarimata1
### Aplikasi E-Commerce Fashion — Laravel 12

---

## 📋 Daftar Isi
1. [Gambaran Umum Project](#1-gambaran-umum-project)
2. [Teknologi & Dependensi](#2-teknologi--dependensi)
3. [Struktur Folder Project](#3-struktur-folder-project)
4. [Skema Database & Migrasi](#4-skema-database--migrasi)
5. [Model Eloquent](#5-model-eloquent)
6. [Routes (Alur URL)](#6-routes-alur-url)
7. [Controllers (Logika Bisnis)](#7-controllers-logika-bisnis)
8. [Views (Tampilan)](#8-views-tampilan)
9. [Middleware & Keamanan](#9-middleware--keamanan)
10. [Alur Kerja Fitur Utama](#10-alur-kerja-fitur-utama)
11. [Cara Menjalankan Project](#11-cara-menjalankan-project)
12. [Ringkasan Fitur](#12-ringkasan-fitur)

---

## 1. Gambaran Umum Project

**projdarimata1** adalah aplikasi **e-commerce fashion** berbasis web yang dibangun menggunakan framework **Laravel 12**. Aplikasi ini memungkinkan pengguna untuk berbelanja produk pakaian/fashion secara online, mulai dari melihat katalog produk, menambahkan ke keranjang, melakukan checkout, hingga manajemen pesanan.

### Nama Database
```
darimata
```

### Tipe Aplikasi
- **Frontend**: Blade Template Engine (Laravel)
- **Backend**: PHP / Laravel 12
- **Database**: MySQL (via Laragon)
- **Asset Bundler**: Vite + NPM

---

## 2. Teknologi & Dependensi

### PHP / Composer Dependencies

| Package | Versi | Keterangan |
|---|---|---|
| `laravel/framework` | ^12.0 | Core framework |
| `laravel/tinker` | ^2.10.1 | REPL untuk debugging |
| `barryvdh/laravel-ide-helper` | ^3.7 | IDE helper (dev) |
| `laravel/breeze` | ^2.3 | Auth scaffolding (dev) |
| `pestphp/pest` | ^3.8 | Testing framework (dev) |

### Node / NPM Dependencies

Menggunakan **Vite** sebagai bundler aset frontend (CSS, JS).

### Environment

- **PHP**: ^8.2
- **Database**: MySQL via `DB_CONNECTION=mysql`, host `127.0.0.1`, port `3306`
- **Database Name**: `darimata`
- **Session**: Database-driven (`SESSION_DRIVER=database`)
- **Queue**: Database-driven (`QUEUE_CONNECTION=database`)
- **Cache**: Database-driven (`CACHE_STORE=database`)

---

## 3. Struktur Folder Project

```
projdarimata1/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php       # Manajemen admin (produk, order, user)
│   │   │   ├── Controller.php            # Base controller
│   │   │   ├── LoginController.php       # Autentikasi login/logout
│   │   │   ├── OrdersController.php      # Keranjang, checkout, payment, invoice
│   │   │   ├── RegisterController.php    # Registrasi user baru
│   │   │   ├── ShopController.php        # Halaman toko & detail produk
│   │   │   ├── UserProfileController.php # Profil & alamat user
│   │   │   └── WishlistController.php    # Wishlist produk
│   │   └── IsAdmin.php                   # Middleware cek is_admin
│   │
│   ├── Models/
│   │   ├── ActivityLog.php       # Log aktivitas admin
│   │   ├── Addresses.php         # Alamat pengiriman user
│   │   ├── Carts.php             # Item keranjang belanja
│   │   ├── Categories.php        # Kategori produk
│   │   ├── ContactSubmissions.php# Form kontak
│   │   ├── Faqs.php              # FAQ
│   │   ├── Order.php             # Pesanan
│   │   ├── OrderItem.php         # Item dalam pesanan
│   │   ├── OrderReturn.php       # Pengajuan retur
│   │   ├── Pages.php             # Halaman statis CMS
│   │   ├── ProductImages.php     # Gambar produk
│   │   ├── ProductVariants.php   # Varian (ukuran, warna, stok)
│   │   ├── Products.php          # Produk utama
│   │   ├── Reviews.php           # Ulasan produk
│   │   ├── Role.php              # Role user
│   │   ├── Settings.php          # Pengaturan aplikasi
│   │   ├── Subscribers.php       # Subscriber newsletter
│   │   ├── User.php              # Model user utama
│   │   └── Wishlist.php          # Wishlist item
│   │
│   ├── Providers/
│   └── View/
│
├── database/
│   ├── migrations/               # 23 file migrasi
│   ├── seeders/                  # Data dummy awal
│   └── factories/                # Factory untuk testing
│
├── resources/
│   └── views/                    # Blade templates
│       ├── landing.blade.php          # Halaman utama
│       ├── shop2.blade.php            # Halaman toko/katalog
│       ├── product-details.blade.php  # Detail produk
│       ├── cart.blade.php             # Keranjang belanja
│       ├── checkout.blade.php         # Form checkout
│       ├── payment.blade.php          # Halaman pembayaran
│       ├── invoice.blade.php          # Invoice/bukti bayar
│       ├── login.blade.php            # Form login
│       ├── register.blade.php         # Form registrasi
│       ├── user-profile.blade.php     # Profil pengguna
│       ├── wishlist.blade.php         # Halaman wishlist
│       ├── about.blade.php            # Halaman about
│       ├── contact.blade.php          # Halaman kontak
│       ├── admin.blade.php            # Dashboard admin (SPA-style)
│       └── ...
│
├── routes/
│   └── web.php                   # Semua route web aplikasi
│
├── public/                       # Aset publik (CSS, JS, gambar)
├── storage/                      # File upload & log
├── .env                          # Konfigurasi environment
├── composer.json                 # Dependensi PHP
└── vite.config.js                # Konfigurasi Vite
```

---

## 4. Skema Database & Migrasi

Terdapat **23 tabel** yang dibuat melalui migrasi Laravel. Berikut penjelasan masing-masing:

### Tabel Utama

| No | Nama Tabel | Deskripsi |
|---|---|---|
| 1 | `users` | Data pengguna (nama, email, password, is_admin, is_locked, is_banned) |
| 2 | `roles` | Peran pengguna (admin, user, dll) |
| 3 | `role_user` | Pivot tabel: relasi many-to-many user dan role |
| 4 | `categories` | Kategori produk |
| 5 | `products` | Data produk (nama, slug, deskripsi, status) |
| 6 | `product_variants` | Varian produk: ukuran, warna, harga, stok |
| 7 | `product_images` | Gambar produk (primary & gallery) |
| 8 | `carts` | Item keranjang belanja user |
| 9 | `orders` | Pesanan (nomor order, total, status, resi, kurir) |
| 10 | `order_items` | Item dalam pesanan (relasi ke variant) |
| 11 | `order_returns` | Pengajuan retur/return barang |
| 12 | `addresses` | Alamat pengiriman milik user |
| 13 | `reviews` | Ulasan produk dari pembeli |
| 14 | `wishlists` | Produk yang di-wishlist user |
| 15 | `contact_submissions` | Pesan dari form kontak |
| 16 | `subscribers` | Email subscriber newsletter |
| 17 | `faqs` | Pertanyaan dan jawaban umum |
| 18 | `pages` | Halaman konten statis |
| 19 | `settings` | Pengaturan global aplikasi |
| 20 | `activity_logs` | Log aktivitas admin (audit trail) |
| 21 | `sessions` | Sesi pengguna (database-based) |
| 22 | `cache` | Cache aplikasi |
| 23 | *(update)* | Tambahan kolom `stock_check` pada `product_variants` |

### Diagram Relasi Antar Tabel (ERD Sederhana)

```
users ──────────────────────────── orders
  │                                    │
  ├── addresses                         ├── order_items ── product_variants ── products
  ├── carts ── product_variants          └── order_returns
  ├── wishlists ── products
  ├── reviews ── products
  └── role_user ── roles

products ── categories
         ── product_variants
         ── product_images
         ── reviews
```

---

## 5. Model Eloquent

### `User` — app/Models/User.php
- **fillable**: `first_name`, `last_name`, `email`, `phone_number`, `password`, `is_admin`
- **relasi**:
  - `orders()` → hasMany Order
  - `addresses()` → hasMany Addresses
  - `roles()` → belongsToMany Role

### `Products` — app/Models/Products.php
- **fillable**: `name`, `category_id`, `slug`, `description`, `status`, `meta_title`, `meta_description`
- **relasi**:
  - `images()` → hasMany ProductImages
  - `primaryImage()` → hasOne ProductImages (is_primary = 1)
  - `variants()` → hasMany ProductVariants
  - `category()` → belongsTo Categories
  - `reviews()` → hasMany Reviews
- **accessor**: `getRatingAttribute()` → rata-rata rating yang sudah approved

### `Order` — app/Models/Order.php
- **fillable**: `user_id`, `order_number`, `subtotal`, `shipping_cost`, `discount_amount`, `total_amount`, `shipping_address`, `payment_method`, `status`, `courier`, `resi`
- **relasi**:
  - `user()` → belongsTo User
  - `items()` → hasMany OrderItem
  - `orderReturns()` → hasMany OrderReturn

### `ProductVariants` — app/Models/ProductVariants.php
- Menyimpan: ukuran (size), warna (color_name, color_hex), harga (price, sale_price), stok (stock)
- Relasi ke produk dan order items

### `Carts` — app/Models/Carts.php
- Menyimpan: `user_id`, `product_variant_id`, `quantity`
- Relasi ke ProductVariants dan Products

---

## 6. Routes (Alur URL)

### Public Routes (Tanpa Login)

| Method | URL | Action | Nama Route |
|---|---|---|---|
| GET | `/` | View `landing` | `home` |
| GET | `/about` | View `about` | `about` |
| GET | `/contact` | View `contact` | `contact` |
| GET | `/shop2` | `ShopController@index` | `shop2` |
| GET | `/product-details/{product}` | `ShopController@show` | `product.details` |

### Guest-Only Routes (Belum Login)

| Method | URL | Action | Nama Route |
|---|---|---|---|
| GET | `/login` | View `login` | `login` |
| POST | `/login` | `LoginController@login` | `login.submit` |
| GET | `/register` | `RegisterController@registerView` | `register.view` |
| POST | `/register` | `RegisterController@register` | `register.submit` |

### Authenticated User Routes (Wajib Login)

| Method | URL | Action | Nama Route |
|---|---|---|---|
| GET | `/cart` | `OrdersController@show` | `cart` |
| POST | `/cart/add` | `OrdersController@add` | `cart.add` |
| POST | `/cart/remove/{cart}` | `OrdersController@remove` | `cart.remove` |
| GET | `/wishlist` | `WishlistController@wishlist` | `wishlist` |
| POST | `/wishlist/add` | `WishlistController@addToWishlist` | `wishlist.add` |
| POST | `/wishlist/remove` | `WishlistController@removeFromWishlist` | `wishlist.remove` |
| GET | `/checkout` | `OrdersController@checkout` | `checkout` |
| POST | `/checkout` | `OrdersController@processCheckout` | `checkout.process` |
| GET | `/payment` | `OrdersController@payment` | `payment` |
| POST | `/payment` | `OrdersController@processPayment` | `payment.process` |
| GET | `/invoice/{order}` | `OrdersController@invoice` | `invoice` |
| POST | `/order/{order}/confirm` | `OrdersController@confirmOrder` | `order.confirm` |
| POST | `/order/{order}/return` | `OrdersController@requestReturn` | `order.return` |
| GET | `/order-history` | `OrdersController@orderHistory` | `order.history` |
| GET | `/user-profile` | `UserProfileController@showProfile` | `user-profile` |
| PATCH | `/user-profile/address/{id}` | `UserProfileController@UserProfileAddresses` | `user-profile.address.update` |
| DELETE | `/user-profile/address/{id}` | `UserProfileController@deleteAddress` | `user-profile.address.delete` |

### Admin Routes (Middleware: auth + is_admin, Prefix: /admin)

| Method | URL | Action | Nama Route |
|---|---|---|---|
| GET | `/admin/` | `AdminController@AdminView` | `admin.dashboard` |
| POST | `/admin/logout` | `AdminController@logoutAdmin` | `admin.logout` |
| POST | `/admin/settings/update` | `AdminController@AdminSetting` | `admin.settings.update` |
| POST | `/admin/products` | `AdminController@store` | `admin.products.store` |
| PATCH | `/admin/products/{id}` | `AdminController@update` | `admin.products.update` |
| DELETE | `/admin/products/{id}` | `AdminController@destroy` | `admin.products.destroy` |
| PATCH | `/admin/orders/{order}/status` | `AdminController@updateOrderStatus` | `admin.orders.update-status` |
| PATCH | `/admin/users/{user}/lock` | `AdminController@lockUser` | `admin.users.lock` |
| PATCH | `/admin/users/{user}/ban` | `AdminController@banUser` | `admin.users.ban` |
| PATCH | `/admin/users/{user}/role` | `AdminController@editUserRole` | `admin.users.role` |

---

## 7. Controllers (Logika Bisnis)

### OrdersController — Inti alur belanja

Berisi semua logika dari keranjang hingga invoice:

**Step-by-step alur order:**

**1. `add()`** — Tambah item ke keranjang
   - Resolve variant dari `product_id` + `size` atau `variant_id`
   - Validasi stok sebelum menambah
   - Jika item sudah ada di cart → update qty; jika belum → buat baru

**2. `show()`** — Tampilkan isi keranjang user

**3. `remove()`** — Kurangi/hapus item dari keranjang
   - Jika qty > 1 → kurangi 1
   - Jika qty = 1 → hapus dari keranjang

**4. `checkout()`** — Tampilkan halaman checkout
   - Support **"Buy Now"** (via query param `product_id`, `variant_id`, `qty`)
   - Atau dari keranjang (cart)
   - Validasi stok saat ini sebelum render

**5. `processCheckout()`** — Simpan data checkout ke session
   - Hanya menyimpan ID referensi (bukan objek) ke session

**6. `payment()`** — Tampilkan halaman konfirmasi pembayaran
   - Query ulang data dari session `checkout`

**7. `processPayment()`** — Proses pesanan final
   - Gunakan **DB Transaction** + **lockForUpdate()** (mencegah race condition)
   - Validasi stok sekali lagi
   - Kurangi stok `product_variants`
   - Buat record `Order` + `OrderItem`
   - Generate `order_number` & `resi` unik
   - Hapus keranjang (jika bukan buy now)
   - Redirect ke invoice

**8. `invoice()`** — Tampilkan invoice
   - Hanya pemilik order yang bisa akses (cek `user_id`)

---

### AdminController — Manajemen admin

| Method | Fungsi |
|---|---|
| `AdminView()` | Dashboard: statistik, daftar produk/order/user, activity log |
| `store()` | Tambah produk baru (dengan variants & gambar) |
| `update()` | Edit produk (sync variants, ganti gambar) |
| `destroy()` | Hapus produk + semua gambarnya dari storage |
| `updateOrderStatus()` | Update status order + nomor resi |
| `lockUser()` | Toggle lock/unlock akun user |
| `banUser()` | Toggle ban/unban akun user |
| `editUserRole()` | Ubah role user menjadi admin atau user biasa |
| `AdminSetting()` | Update profil admin (nama, email, password) |
| `logoutAdmin()` | Logout dan flush session |

> Setiap aksi penting di admin mencatat **Activity Log** (`ActivityLog::create()`).

---

### ShopController — Katalog & Detail Produk
- `index()` — Tampilkan daftar produk dengan filter/pencarian
- `show()` — Tampilkan detail 1 produk beserta varian dan gambar

### LoginController — Autentikasi
- `login()` — Proses login, validasi email dan password, handle akun terkunci/banned
- `logout()` — Logout dan hapus session

### RegisterController — Pendaftaran
- `registerView()` — Tampilkan form registrasi
- `register()` — Validasi dan simpan user baru

### WishlistController — Wishlist
- `wishlist()` — Tampilkan daftar wishlist
- `addToWishlist()` — Tambah produk ke wishlist
- `removeFromWishlist()` — Hapus dari wishlist

### UserProfileController — Profil Pengguna
- `showProfile()` — Tampilkan profil + alamat + riwayat order
- `updateProfile()` — Update data profil
- `updatePassword()` — Ganti password
- `UserProfileAddressesAdd()` — Tambah alamat baru
- `UserProfileAddresses()` — Update alamat
- `deleteAddress()` — Hapus alamat

---

## 8. Views (Tampilan)

Semua view menggunakan **Blade Template Engine** Laravel dan disimpan di `resources/views/`.

| File View | Halaman |
|---|---|
| `landing.blade.php` | Halaman utama / beranda |
| `shop2.blade.php` | Halaman katalog produk |
| `product-details.blade.php` | Detail produk + pilih varian |
| `cart.blade.php` | Keranjang belanja |
| `checkout.blade.php` | Form checkout (alamat, kurir, metode bayar) |
| `payment.blade.php` | Konfirmasi dan proses pembayaran |
| `invoice.blade.php` | Invoice / bukti pesanan |
| `login.blade.php` | Form login |
| `register.blade.php` | Form registrasi |
| `user-profile.blade.php` | Profil pengguna (edit, alamat, order history) |
| `wishlist.blade.php` | Daftar wishlist |
| `about.blade.php` | Halaman tentang toko |
| `contact.blade.php` | Halaman kontak |
| `admin.blade.php` | Dashboard admin (SPA-style single page) |
| `404.blade.php` | Halaman error 404 |
| `customer-service(Opsional).blade.php` | Halaman customer service (opsional) |

### Komponen & Layout

```
resources/views/
├── layouts/        # Layout utama (header, footer, dll)
├── components/     # Komponen Blade yang reusable
└── partials/       # Partial view (navbar, sidebar, dll)
```

---

## 9. Middleware & Keamanan

### IsAdmin — app/Http/IsAdmin.php
- **Fungsi**: Memeriksa apakah user yang sedang login memiliki hak akses admin (`is_admin = true`)
- **Dipakai di**: Route group `/admin/*`
- **Jika bukan admin**: Redirect atau abort 403

### Middleware Bawaan Laravel
- `auth` — Memastikan user sudah login (digunakan di semua route user & admin)
- `guest` — Memastikan user belum login (digunakan di route login & register)

### Keamanan Tambahan
- **DB Transaction + lockForUpdate()**: Pada `processPayment()` untuk mencegah race condition saat pengurangan stok
- **Validasi kepemilikan**: `invoice()`, `remove()`, `requestReturn()` selalu cek `user_id` sebelum memproses
- **CSRF Protection**: Bawaan Laravel, aktif untuk semua POST/PATCH/DELETE

---

## 10. Alur Kerja Fitur Utama

### Alur Belanja (Cart ke Invoice)

```
[Katalog/Shop]
    └─> Pilih Produk (size, warna)
            └─> [Tambah ke Cart] ATAU [Buy Now]
                    └─> [Halaman Cart] - review item
                            └─> [Checkout] - pilih alamat, kurir, metode bayar
                                    └─> Session: checkout data disimpan
                                            └─> [Payment] - konfirmasi detail
                                                    └─> [Process Payment]
                                                            ✓ Validasi stok (DB Transaction)
                                                            ✓ Buat Order + Order Items
                                                            ✓ Kurangi stok variant
                                                            ✓ Hapus cart
                                                            └─> [Invoice]
```

### Alur Registrasi & Login

```
[Register]
    └─> Validasi form
            └─> Simpan User (password di-hash)
                    └─> Auto login
                            └─> Redirect home

[Login]
    └─> Validasi email + password
            ├─> Cek is_locked / is_banned
            ├─> Berhasil -> Redirect berdasarkan role (admin/user)
            └─> Gagal -> Kembali dengan pesan error
```

### Alur Admin: Tambah Produk

```
[Admin Dashboard]
    └─> Form Tambah Produk
            └─> Input: nama, harga, deskripsi, kategori, gambar, variants
                    └─> Validasi server-side
                            ├─> Buat/temukan Category
                            ├─> Generate unique slug
                            ├─> Simpan Products
                            ├─> Simpan ProductVariants (loop)
                            ├─> Upload & simpan ProductImages
                            └─> Catat ActivityLog
                                    └─> Redirect ke dashboard + pesan sukses
```

### Alur Retur Barang

```
[User Profile / Order History]
    └─> Pilih Order yang ingin di-retur
            └─> Form retur (alasan + foto opsional)
                    └─> Simpan OrderReturn (status: pending)
                            └─> Update Order status ke 'retur'
                                    └─> Admin review di dashboard
                                            └─> Admin update status retur
```

---

## 11. Cara Menjalankan Project

### Prasyarat
- **PHP** >= 8.2
- **Composer**
- **Node.js** & NPM
- **MySQL** (via Laragon)
- **Laragon** (sudah running: Apache/Nginx + MySQL)

### Step-by-Step Setup

#### Step 1: Buka Project
```bash
cd path\to\projdarimata1
```

#### Step 2: Install Dependensi PHP
```bash
composer install
```

#### Step 3: Install Dependensi Node
```bash
npm install
```

#### Step 4: Konfigurasi Environment
```bash
# Salin file .env.example jika belum ada .env
cp .env.example .env

# Generate app key
php artisan key:generate
```

Edit `.env` dan sesuaikan:
```env
DB_DATABASE=darimata
DB_USERNAME=root
DB_PASSWORD=
```

#### Step 5: Buat Database
Di MySQL/phpMyAdmin Laragon:
```sql
CREATE DATABASE darimata;
```

#### Step 6: Jalankan Migrasi
```bash
php artisan migrate
```

#### Step 7: Jalankan Seeder (Data Awal)
```bash
php artisan db:seed
```

Seeder yang tersedia:
- `DatabaseSeeder` — memanggil semua seeder
- `Categories` — Data kategori
- `ProductSeeder` — Data produk sample
- `ProductVariantSeeder` — Data varian produk
- `ProductImageSeed` — Data gambar produk
- `UserSeeder` — User sample (admin + user biasa)
- `RoleSeeder` — Data role

#### Step 8: Buat Symlink Storage
```bash
php artisan storage:link
```

#### Step 9: Jalankan Aplikasi

**Opsi A — Menggunakan Laragon (Direkomendasikan)**
```
Akses: http://projdarimata1.test
(Laragon otomatis serve virtual host)
```

**Opsi B — PHP Artisan Serve + Vite**
```bash
# Terminal 1: PHP Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev

# Akses: http://localhost:8000
```

**Opsi C — Semua sekaligus via composer script**
```bash
composer run dev
```

---

## 12. Ringkasan Fitur

### Fitur User (Pembeli)
- [x] Registrasi & Login akun
- [x] Lihat katalog produk dengan filter
- [x] Lihat detail produk (gambar, varian ukuran/warna, stok)
- [x] Tambah produk ke keranjang
- [x] Buy Now (beli langsung tanpa masuk keranjang)
- [x] Kelola wishlist
- [x] Checkout dengan pilihan alamat, kurir (JNE/J&T/SiCepat), dan metode bayar
- [x] Konfirmasi dan proses pembayaran
- [x] Lihat invoice/bukti pembayaran
- [x] Riwayat pesanan
- [x] Ajukan retur barang (dengan foto dan alasan)
- [x] Kelola profil (data diri, password, multiple alamat)
- [ ] Tambah ulasan/rating produk (in progress)

### Fitur Admin
- [x] Dashboard dengan statistik (total stok, order, users, pending orders)
- [x] Tambah / Edit / Hapus produk
- [x] Manajemen varian produk (ukuran, warna, stok)
- [x] Upload gambar produk (utama + gallery)
- [x] Update status pesanan + nomor resi
- [x] Manajemen user (lock, ban, ubah role)
- [x] Activity log (audit trail semua aksi admin)
- [x] Update pengaturan akun admin

---

## Catatan Pengembang

> **Database**: `darimata`
> **Framework**: Laravel 12 + Blade Template Engine
> **Lokasi Project**: `d:\KullYeah\Laragon\www\projdarimata1`
> **Versi PHP**: 8.2+
> **Tanggal Dokumentasi**: Juli 2026

### File Penting yang Perlu Diperhatikan
- `routes/web.php` — Semua definisi URL
- `app/Http/Controllers/OrdersController.php` — Logika belanja utama
- `app/Http/Controllers/AdminController.php` — Logika admin
- `.env` — Konfigurasi environment (jangan di-commit ke git!)
- `database/migrations/` — Skema database

---

*Dokumentasi ini dibuat berdasarkan analisis lengkap kode project pada Juli 2026.*

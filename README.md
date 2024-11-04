# BookRN

**BookRN** adalah platform untuk booking tiket event/konser yang dibangun menggunakan Laravel 11. Aplikasi ini memudahkan pengguna untuk mencari acara, melihat detail, dan melakukan pemesanan tiket dengan cepat dan aman.

## Fitur

-   Cari dan jelajahi berbagai acara
-   Lihat detail acara dan harga tiket
-   Pesan tiket secara online
-   Integrasi pembayaran

## Persyaratan Sistem

Pastikan Anda telah menginstal prasyarat berikut:

-   PHP >= 8.3
-   Composer
-   MySQL atau database lain yang didukung Laravel
-   Ekstensi PHP yang diperlukan: `OpenSSL`, `PDO`, `Mbstring`, `Tokenizer`, `XML`, `Ctype`, `JSON`, `SQLite` dan `BCMath`

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek **BookRN** di lingkungan lokal Anda.

### 1. Clone Repository

Clone repository ini ke direktori lokal Anda:

```bash
git clone https://github.com/dhikaid/BookRN.git
cd BookRN
```

### 2. Instal Dependensi

Instal semua dependensi Laravel menggunakan Composer:

```bash
composer install
```

### 3. Konfigurasi Environment

Buat file `.env` dengan menyalin `.env.example`:

```bash
cp .env.example .env
```

### 4. Generate Key Aplikasi

Jalankan perintah berikut untuk menghasilkan key aplikasi Laravel:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database Anda:

```dotenv
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

### 6. Migrasi dan Seed Database

Jalankan migrasi untuk membuat tabel database, dan tambahkan data awal jika tersedia:

```bash
php artisan migrate:fresh
```

### 7. Jalankan Server

Setelah semua konfigurasi selesai, jalankan server lokal:

```bash
composer dev
```

Aplikasi akan dapat diakses di `http://127.0.0.1:8000`.

## Cara Penggunaan

-   Buka `http://127.0.0.1:8000` di browser Anda
-   Jelajahi acara dan pilih tiket yang ingin Anda pesan

## Testing

Untuk menjalankan tes pada aplikasi ini, gunakan perintah berikut:

```bash
php artisan test
```

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository ini dan buat pull request dengan penjelasan singkat tentang perubahan yang Anda buat.

## Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---

**BookRN** - Platform booking tiket event dan konser yang cepat dan mudah!

```

```

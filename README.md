# Sistem Pendukung Keputusan (SPK) - Pembersihan Kampus

Proyek ini adalah aplikasi web berbasis Laravel untuk manajemen penjadwalan pembersihan kampus menggunakan metode **SAW (Simple Additive Weighting)**. Aplikasi ini membantu dalam menentukan prioritas area yang perlu dibersihkan berdasarkan berbagai kriteria.

## Fitur Utama
- Manajemen area yang perlu dibersihkan
- Penjadwalan pembersihan berdasarkan prioritas area
- Penghitungan skor prioritas menggunakan metode SAW

## Prasyarat
Sebelum menjalankan proyek ini, pastikan Anda memiliki perangkat lunak berikut:
- PHP (versi 8.0 atau lebih baru)
- Composer (untuk mengelola dependensi PHP)
- MySQL (untuk database)
- Laravel (untuk framework web)

## Cara Menjalankan Proyek

### 1. Clone Repositori
Untuk meng-clone proyek ini, buka terminal atau command prompt dan jalankan perintah berikut:

```bash
git clone https://github.com/alfrzy/spk.git
```

### 2. Masuk ke Direktori Proyek
Setelah proses cloning selesai, masuk ke dalam direktori proyek:

```bash
cd spk
```

### 3. Install Dependensi
Instal dependensi proyek dengan menggunakan Composer:

```bash
composer install
```

### 4. Konfigurasi `.env`
Salin file `.env.example` dan beri nama file `.env`:

```bash
cp .env.example .env
```

Kemudian, buka file `.env` dan atur konfigurasi berikut:
- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=nama_database`
- `DB_USERNAME=username_mysql`
- `DB_PASSWORD=password_mysql`

### 5. Generate Key Aplikasi
Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

```bash
php artisan key:generate
```

### 6. Migrasi Database
Lakukan migrasi database untuk membuat struktur tabel:

```bash
php artisan migrate
```

Jika Anda juga ingin mengisi tabel dengan data dummy (seperti pengguna dan area), Anda bisa menjalankan seeder:

```bash
php artisan db:seed
```

### 7. Menjalankan Server Lokal
Setelah semua langkah selesai, Anda dapat menjalankan server lokal Laravel:

```bash
php artisan serve
```

Akses aplikasi di browser Anda melalui `http://127.0.0.1:8000`.

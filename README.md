<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README - SPK Pembersihan Kampus</title>
</head>
<body>
    <h1>Sistem Pendukung Keputusan (SPK) - Pembersihan Kampus</h1>
    <p>Proyek ini adalah aplikasi web berbasis Laravel untuk manajemen penjadwalan pembersihan kampus menggunakan metode <strong>SAW (Simple Additive Weighting)</strong>. Aplikasi ini membantu dalam menentukan prioritas area yang perlu dibersihkan berdasarkan berbagai kriteria.</p>

    <h2>Fitur Utama</h2>
    <ul>
        <li>Manajemen area yang perlu dibersihkan</li>
        <li>Penjadwalan pembersihan berdasarkan prioritas area</li>
        <li>Penghitungan skor prioritas menggunakan metode SAW</li>
        <li>Manajemen pengguna dengan role admin dan pembersih</li>
    </ul>

    <h2>Prasyarat</h2>
    <p>Sebelum menjalankan proyek ini, pastikan Anda memiliki perangkat lunak berikut:</p>
    <ul>
        <li>PHP (versi 8.0 atau lebih baru)</li>
        <li>Composer (untuk mengelola dependensi PHP)</li>
        <li>MySQL (untuk database)</li>
        <li>Laravel (untuk framework web)</li>
    </ul>

    <h2>Cara Menjalankan Proyek</h2>

    <h3>1. Clone Repositori</h3>
    <p>Untuk meng-clone proyek ini, buka terminal atau command prompt dan jalankan perintah berikut:</p>
    <pre><code>git clone https://github.com/alfrzy/spk.git</code></pre>

    <h3>2. Masuk ke Direktori Proyek</h3>
    <p>Setelah proses cloning selesai, masuk ke dalam direktori proyek:</p>
    <pre><code>cd spk</code></pre>

    <h3>3. Install Dependensi</h3>
    <p>Instal dependensi proyek dengan menggunakan Composer:</p>
    <pre><code>composer install</code></pre>

    <h3>4. Konfigurasi .env</h3>
    <p>Salin file <code>.env.example</code> dan beri nama file <code>.env</code>:</p>
    <pre><code>cp .env.example .env</code></pre>
    <p>Kemudian, buka file <code>.env</code> dan atur konfigurasi berikut:</p>
    <ul>
        <li><strong>DB_CONNECTION</strong>=mysql</li>
        <li><strong>DB_HOST</strong>=127.0.0.1</li>
        <li><strong>DB_PORT</strong>=3306</li>
        <li><strong>DB_DATABASE</strong>=nama_database</li>
        <li><strong>DB_USERNAME</strong>=username_mysql</li>
        <li><strong>DB_PASSWORD</strong>=password_mysql</li>
    </ul>

    <h3>5. Generate Key Aplikasi</h3>
    <p>Jalankan perintah berikut untuk menghasilkan kunci aplikasi:</p>
    <pre><code>php artisan key:generate</code></pre>

    <h3>6. Migrasi Database</h3>
    <p>Lakukan migrasi database untuk membuat struktur tabel:</p>
    <pre><code>php artisan migrate</code></pre>
    <p>Jika Anda juga ingin mengisi tabel dengan data dummy (seperti pengguna dan area), Anda bisa menjalankan seeder:</p>
    <pre><code>php artisan db:seed</code></pre>

    <h3>7. Menjalankan Server Lokal</h3>
    <p>Setelah semua langkah selesai, Anda dapat menjalankan server lokal Laravel:</p>
    <pre><code>php artisan serve</code></pre>
    <p>Akses aplikasi di browser Anda melalui <code>http://127.0.0.1:8000</code>.</p>
    <p>Terima kasih telah menggunakan atau berkontribusi pada proyek ini!</p>
</body>
</html>

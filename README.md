# Medify - Sistem Manajemen Master Items & Kategori Medis

Aplikasi web manajemen master item medis dan kategori item berbasis **Laravel** dengan UI modern, responsif, real-time input formatting Rupiah, kalkulasi estimasi harga jual otomatis, debounce live search, serta integrasi ekspor data (Excel & PDF).

---

## 📋 Daftar Isi
1. [Akun Default (Admin / User)](#-akun-default-admin--user)
2. [Fitur Unggulan](#-fitur-unggulan)
3. [Kebutuhan Sistem](#-kebutuhan-sistem)
4. [Panduan Instalasi & Setup](#-panduan-instalasi--setup)
5. [Perintah Menjalankan Database Seeder](#-perintah-menjalankan-database-seeder)
6. [Menjalankan Server Pengembangan](#-menjalankan-server-pengembangan)
7. [Daftar Rute & Endpoint](#-daftar-rute--endpoint)

---

## 👤 Akun Default (Admin / User)
Akun administrator ini dibuat otomatis melalui database seeder:

| Field | Keterangan |
| :--- | :--- |
| **Email** | `ferryfx08@gmail.com` |
| **Password** | `password123` |
| **Role / Name** | Administrator Medify |

---

## ✨ Fitur Unggulan

* **Master Items:**
  * Manajemen data barang medis (Kode otomatis format `MED-xxx`, Nama, Harga Beli, Laba %, Estimasi Harga Jual, Jenis, Supplier, dan Foto).
  * Format input mata uang Rupiah otomatis menggunakan pemisah titik ribuan secara real-time (contoh ketik `900000` $\rightarrow$ `Rp 900.000`).
  * Kalkulasi real-time **Estimasi Harga Jual** berdasarkan persentase laba: $\text{Harga Jual} = \text{Harga Beli} + (\text{Harga Beli} \times \text{Laba } \%)$.
  * Upload foto produk dengan thumbnail interaktif pada tabel dan tampilan detail.
  * Ekspor seluruh data master item ke format **Microsoft Excel (.xlsx / HTML Table)**.
* **Kategori Items:**
  * Relasi *Many-to-Many* antara master item dan kategori medis.
  * Hitungan jumlah item aktif per kategori.
  * Cetak & Ekspor laporan detail kategori ke format **PDF resmi (Dompdf)** dengan kop dan waktu cetak otomatis.
* **Pencarian & Live Filter:**
  * Filter live dengan mekanisme **Debounce jQuery (350ms)** untuk performa optimal tanpa spam request ke server.
  * Filter berdasarkan Nama, Kode, Rentang Harga Minimum (Rp Min), dan Harga Maksimum (Rp Max).
* **Interaktivitas & Notifikasi:**
  * Notifikasi interaktif modern menggunakan **SweetAlert2** untuk semua aksi (Tambah, Edit, Hapus, Flash Message).
  * Modal konfirmasi hapus data dan konfirmasi logout yang aman.

---

## 💻 Kebutuhan Sistem

* **PHP** >= 8.0 (disarankan PHP 8.1 / 8.2)
* **Composer** >= 2.x
* **Node.js** >= 16.x & **NPM**
* **MySQL / MariaDB** (melalui MAMP, XAMPP, atau MySQL standalone)

---

## 🚀 Panduan Instalasi & Setup

### 1. Masuk ke Direktori Proyek
```bash
cd /Applications/MAMP/htdocs/medify-test
```

### 2. Pasang Dependensi Backend & Frontend
```bash
# Install paket dependensi PHP
composer install

# Install paket dependensi JavaScript / CSS
npm install
```

### 3. Konfigurasi Environment (`.env`)
Salin file konfigurasi environment dan sesuaikan kredensial database Anda:
```bash
cp .env.example .env
```

Buka file `.env` dan pastikan konfigurasi database sudah sesuai:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306      # Gunakan port MySQL Anda (misal 3306 atau 8889 jika menggunakan MAMP)
DB_DATABASE=medify_db
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Generate Application Key & Symlink Storage
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Jalankan Migrasi Tabel Database
```bash
php artisan migrate
```

---

## 🗄️ Perintah Menjalankan Database Seeder

Aplikasi menyediakan seeder lengkap:
* `UserSeeder`: 1 akun admin default (`ferryfx08@gmail.com` / `password123`).
* `KategoriSeeder`: 25 kategori medis realistis (Obat Generik, Alat Kesehatan, dll).
* `MasterItemSeeder`: 25 data master barang medis yang langsung terhubung ke kategori (*many-to-many*).

### 🔹 Opsi 1: Menjalankan Seluruh Seeder Sekaligus (Direkomendasikan)
Jalankan perintah berikut untuk mengisi seluruh data awal (User, Kategori, & Master Item):
```bash
php artisan db:seed
```

### 🔹 Opsi 2: Reset Database Ulang Bersih & Seed Langsung
Jika ingin menghapus seluruh tabel lama, membuat struktur database baru dari nol, dan langsung mengisi seeder:
```bash
php artisan migrate:fresh --seed
```

### 🔹 Opsi 3: Menjalankan Seeder Secara Spesifik per Kelas
Anda juga dapat mengeksekusi seeder tertentu saja sesuai kebutuhan:

```bash
# Hanya jalankan seeder user admin:
php artisan db:seed --class=UserSeeder

# Hanya jalankan seeder kategori medis:
php artisan db:seed --class=KategoriSeeder

# Hanya jalankan seeder master items dan relasinya:
php artisan db:seed --class=MasterItemSeeder
```

---

## 🖥️ Menjalankan Server Pengembangan

Buka 2 tab terminal untuk menjalankan backend server dan compiler frontend Vite:

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```
Aplikasi dapat diakses melalui browser di: [http://localhost:8000](http://localhost:8000)

**Terminal 2 (Vite Asset Watcher):**
```bash
npm run dev
```

---

## 🗺️ Daftar Rute & Endpoint Utama

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/login` | Halaman login admin |
| `GET` | `/master-items` | Daftar tabel master items & filter |
| `GET` | `/master-items/search` | API AJAX Live search master items |
| `GET` | `/master-items/form/new` | Form tambah master item baru |
| `POST`| `/master-items/form/new` | Simpan data master item baru |
| `GET` | `/master-items/form/edit/{id}` | Form edit data master item |
| `POST`| `/master-items/form/edit/{id}` | Update data master item |
| `GET` | `/master-items/view/{kode}` | Halaman detail master item |
| `GET` | `/master-items/delete/{id}` | Soft delete data master item |
| `GET` | `/master-items/export-excel` | Unduh data master items format Excel |
| `GET` | `/kategoris` | Daftar kategori items |
| `GET` | `/kategoris/search` | API AJAX Live search kategori items |
| `GET` | `/kategoris/form/new` | Form tambah kategori baru |
| `POST`| `/kategoris/form/new` | Simpan kategori baru |
| `GET` | `/kategoris/view/{kode}` | Halaman detail kategori & daftar itemnya |
| `GET` | `/kategoris/pdf/{kode}` | Cetak & download laporan PDF kategori |
| `GET` | `/kategoris/delete/{id}` | Hapus data kategori |

---

*Dikembangkan untuk Medify Medical System.*

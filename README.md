# Dokumentasi Tempat

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Tentang Project Ini

**Dokumentasi Tempat** adalah sebuah aplikasi web berbasis Laravel yang dirancang untuk mendokumentasikan dan mengelola data tempat-tempat (lokasi) dengan kategori tertentu. Aplikasi ini memungkinkan pengguna untuk:

- 📍 Menambah dan mengelola data tempat dengan informasi lengkap (nama, alamat, deskripsi)
- 📂 Mengorganisir tempat ke dalam kategori
- 📸 Mengunggah foto/gambar untuk setiap tempat
- 👥 Mengelola pengguna dengan sistem autentikasi
- 📊 Melihat statistik dan ringkasan data melalui dashboard

### Teknologi yang Digunakan

- **Framework**: Laravel 12
- **PHP**: 8.2+
- **Database**: MySQL/MariaDB
- **Frontend**: Blade Template Engine, Tailwind CSS
- **Build Tool**: Vite
- **Package Manager**: Composer, NPM

### Fitur Utama

1. **Manajemen Tempat** - Tambah, ubah, dan hapus data tempat
2. **Kategori Tempat** - Organisir tempat berdasarkan kategori
3. **Galeri Foto** - Unggah dan kelola foto untuk setiap tempat
4. **Autentikasi Pengguna** - Sistem login dan registrasi
5. **Dashboard** - Tampilan ringkasan statistik data

## Cara Menjalankan Website Ini

### Prerequisites (Persyaratan)

Sebelum menjalankan aplikasi ini, pastikan Anda telah menginstal:

- **PHP** (versi 8.2 atau lebih tinggi)
- **Composer** (package manager PHP)
- **Node.js & NPM** (untuk menjalankan Vite)
- **MySQL/MariaDB** (database server)
- **Git** (untuk cloning repository)

### Langkah Instalasi

#### 1. Clone Repository
```bash
git clone https://github.com/riqhman15/project-arriq-ukk.git
cd dokumentasi-tempat
```

#### 2. Install PHP Dependencies
```bash
composer install
```

#### 3. Buat File .env
```bash
cp .env.example .env
```

#### 4. Generate Application Key
```bash
php artisan key:generate
```

#### 5. Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dokumentasi_tempat
DB_USERNAME=root
DB_PASSWORD=
```

#### 6. Jalankan Database Migrations
```bash
php artisan migrate
```

#### 7. Install Node Dependencies
```bash
npm install
```

#### 8. Build Frontend Assets
```bash
npm run build
```

Atau untuk development dengan hot reload:
```bash
npm run dev
```

#### 9. Jalankan Development Server
```bash
php artisan serve
```

Aplikasi akan tersedia di `http://localhost:8000`

### Penggunaan

Setelah aplikasi berjalan, Anda dapat:

1. **Register/Login** - Buat akun baru atau login dengan akun yang sudah ada
2. **Dashboard** - Lihat statistik jumlah tempat, kategori, dan pengguna
3. **Kelola Kategori** - Tambah kategori baru untuk mengorganisir tempat
4. **Kelola Tempat** - Tambah tempat baru dengan informasi lengkap dan foto
5. **Lihat Galeri** - Tampilkan semua tempat yang telah didokumentasikan

### Troubleshooting

#### Masalah: "Composer command not found"
**Solusi**: Pastikan Composer sudah terinstall dengan benar dan PATH sudah dikonfigurasi.

#### Masalah: "PDO Exception" saat migration
**Solusi**: Pastikan MySQL/MariaDB sedang berjalan dan konfigurasi `.env` sudah benar.

#### Masalah: "npm: command not found"
**Solusi**: Pastikan Node.js dan npm sudah terinstall. Download dari https://nodejs.org

#### Masalah: Folder storage tidak writable
**Solusi**: Berikan permission pada folder storage:
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### File Penting

- `.env` - Konfigurasi environment aplikasi
- `app/Models/` - Model aplikasi (User, Kategori, Tempat, dll)
- `routes/web.php` - Definisi route aplikasi
- `resources/views/` - Template Blade
- `database/migrations/` - File migrasi database
- `public/` - Folder public untuk file statik

## Laravel Framework

Laravel adalah web application framework dengan syntax yang ekspresif dan elegan. Untuk mempelajari lebih lanjut tentang Laravel, kunjungi:

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [Laracasts](https://laracasts.com)

## Contributing

Terima kasih telah mempertimbangkan untuk berkontribusi pada project ini! Contribution guide dapat ditemukan di [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

Untuk memastikan komunitas Laravel tetap ramah bagi semua, harap review dan patuhi [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Dokumentasi

Project ini memiliki dokumentasi lengkap mengenai arsitektur dan struktur database:

- **[ERD.md](./ERD.md)** - Entity Relationship Diagram yang mendokumentasikan schema database, struktur tabel, dan relasi antar entity
- **[UML.md](./UML.md)** - UML Diagrams termasuk class diagrams, sequence diagrams, dan data flow diagrams untuk arsitektur aplikasi

### Model Database
- **User** - Pengguna aplikasi dengan sistem autentikasi
- **Kategori** - Kategori untuk mengorganisir tempat
- **Tempat** - Data tempat dengan informasi lengkap
- **Foto** - Manajemen foto/gambar
- **Dashboard** - Statistik dan metrik aplikasi

### Relasi Antar Model
- Satu Kategori dapat memiliki banyak Tempat (relasi 1:N)
- User dapat mengautentikasi dan mengelola tempat

## Lisensi

Laravel framework adalah open-source software yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).

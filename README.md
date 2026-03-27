# FlowTrack - Sistem Pencatatan Keuangan Sederhana
> My first commit

**[ ID ]** **FlowTrack** adalah aplikasi berbasis web yang dirancang untuk membantu pengguna mencatat dan memantau arus keuangan (pemasukan dan pengeluaran) secara digital. Proyek ini hadir sebagai solusi modern untuk menggantikan pencatatan manual di buku agar lebih praktis, rapi, dan mudah diakses.

**[ EN ]**

---

## 💡 Latar Belakang / Background
**[ ID ]** Proyek ini awalnya dikembangkan untuk memenuhi tugas mata kuliah di kampus. Namun, saya memutuskan untuk melakukan **rebuild** total guna memperbaiki struktur kode, mempercantik antarmuka (UI/UX), serta mengoptimalkan fitur-fitur yang ada agar lebih layak digunakan.

**[ EN ]**

## ✨ Fitur Utama / Main Feature
* **Sistem Autentikasi / Authentication System:**
**1. [ ID ]** Register dan Login akun yang aman bagi setiap user.
**1. [ EN ]** Register and Login to a secure account for every user.
**2. [ ID ]** Menggunakan Laravel Breeze untuk manajemen Login, Register, dan Password Reset yang aman dan responsif.
**2. [ EN ]** Using Laravel Breeze for secure and responsive Login, Register, and Password Reset management.
* **Manajemen Keuangan (CRUD) / Financial Management:**
**[ ID ]** Create(Tambah), Update(Lihat), Edit(Ubah), dan Delete(Hapus) catatan keuangan.
**[ EN ]** Create(Add), Update(View), Edit(Change), and Delete(Delete) financial records.
* **Kategori Transaksik / Transaction Category:**
**[ ID ]** Membedakan antara *Income* (Pemasukan) dan *Expense* (Pengeluaran).
**[ EN ]** Differentiate between *Income* and *Expense*.
* **Filter & Pencarian / Filter & Search:**
**[ ID ]** Sistem pencarian catatan keuangan berdasarkan tanggal tertentu.
**[ EN ]** Financial records search system based on a specific date.
* **Responsive Design:**
**[ ID ]** Tampilan yang nyaman diakses dari perangkat apa pun.
**[ EN ]** Convenient viewing accessible from any device.
* **Security Check:**
**[ ID ]** Validasi kepemilikan data pada Controller; jika data tidak ditemukan atau bukan milik user, sistem otomatis mengembalikan response `404 Not Found`.
**[ EN ]** Validate data ownership on the Controller; if the data is not found or does not belong to the user, the system automatically returns a `404 Not Found` response.
* **ID Obfuscation:**
**[ ID ]** Menggunakan library `vinkla/hashids` untuk menyembunyikan ID asli transaksi pada URL guna meningkatkan keamanan.
**[ EN ]** Using the `vinkla/hashids` library to hide the original transaction ID in the URL to improve security.

## 🛠️ Tech Stack
**[ ID ]** Aplikasi ini dibangun menggunakan teknologi terbaru:
**[ ID ]** This application build using newer technology:
* **Framework:** Laravel 12.x (Starter Kit: Laravel Breeze)
* **Database:** MySQL
* **Libraries:**
    * vinkla/hashids (untuk enkripsi ID transaksi/for transaction ID encription)
* **Frontend:**
    * Blade Templating Engine
    * Tailwind CSS (Styling)
    * Vanilla JavaScript

---

## ⚙️ Cara Instalasi / Installation Method (Local)

**[ ID ]** Jika Anda ingin menjalankan proyek ini di komputer lokal, ikuti langkah-langkah berikut:
**[ EN ]** If you want to run this project on a local computer, follow these steps:

1.  **Clone Repository:**
    ```bash
    git clone [https://github.com/username-anda/flowtrack.git](https://github.com/username-anda/flowtrack.git)
    cd flowtrack
    ```

2.  **Install Dependencies:**
    ```bash
    composer install
    npm install && npm run dev
    ```

3.  **Konfigurasi Environment / Environment Configuration:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate App Key:**
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database:**
    ```bash
    php artisan migrate
    ```

6.  **Jalankan Server / Running Server:**
    ```bash
    php artisan serve
    ```

---

## 📈 Status Proyek & Pengembangan
Proyek ini sudah mencapai versi **Stable**. Namun, saya berencana untuk terus mengembangkannya dengan fitur-fitur tambahan seperti:
- [ ] Visualization chart of monthly expenses.
- [ ] Export data to Excel/PDF format.

![Version](https://img.shields.io/badge/version-1.0.2-blue) ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)

---
*Made With Passion For Learning By Azkkaa*

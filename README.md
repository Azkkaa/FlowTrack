# FlowTrack - Sistem Pencatatan Keuangan Sederhana

**FlowTrack** adalah aplikasi berbasis web yang dirancang untuk membantu pengguna mencatat dan memantau arus keuangan (pemasukan dan pengeluaran) secara digital. Proyek ini hadir sebagai solusi modern untuk menggantikan pencatatan manual di buku agar lebih praktis, rapi, dan mudah diakses.

---

## 🚀 Latar Belakang
Proyek ini awalnya dikembangkan untuk memenuhi tugas mata kuliah di kampus. Namun, saya memutuskan untuk melakukan **rebuild** total guna memperbaiki struktur kode, mempercantik antarmuka (UI/UX), serta mengoptimalkan fitur-fitur yang ada agar lebih layak digunakan.

## ✨ Fitur Utama
* **Sistem Autentikasi:** Register dan Login akun yang aman bagi setiap user.
* **Manajemen Keuangan (CRUD):** Create(Tambah), Update(Lihat), Edit(Ubah), dan Delete(Hapus) catatan keuangan.
* **Kategori Transaksi:** Membedakan antara *Income* (Pemasukan) dan *Expense* (Pengeluaran).
* **Filter & Pencarian:** Sistem pencarian catatan keuangan berdasarkan tanggal tertentu.
* **Responsive Design:** Tampilan yang nyaman diakses dari perangkat apa pun.
* **Sistem Autentikasi:** Menggunakan Laravel Breeze untuk manajemen Login, Register, dan Password Reset yang aman dan responsif.

## 🛠️ Tech Stack
Aplikasi ini dibangun menggunakan teknologi terbaru:
* **Framework:** [Laravel 12.16.0] (Starter Kit: Laravel Breeze)
* **Database:** MySQL
* **Frontend:** 
    * Blade Templating Engine
    * Tailwind CSS (Styling)
    * Vanilla JavaScript (Interaktivitas)

---

## ⚙️ Cara Instalasi (Lokal)

Jika Anda ingin menjalankan proyek ini di komputer lokal, ikuti langkah-langkah berikut:

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

3.  **Konfigurasi Environment:**
    Salin file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database Anda.
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

6.  **Jalankan Server:**
    ```bash
    php artisan serve
    ```

---

## 📈 Status Proyek & Pengembangan
Proyek ini sudah mencapai versi **Stable**. Namun, saya berencana untuk terus mengembangkannya dengan fitur-fitur tambahan seperti:
- [ ] Grafik visualisasi pengeluaran bulanan.
- [ ] Export data ke format Excel/PDF.

---
*Dibuat dengan semangat belajar oleh Azka Faza*

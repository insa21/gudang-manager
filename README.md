# 📦 GudangManager

GudangManager adalah aplikasi manajemen gudang berbasis web yang membantu Anda mengelola stok barang, transaksi barang masuk dan keluar, serta pemasok dengan mudah dan efisien. Dibangun menggunakan **Laravel** dan **Filament**, aplikasi ini dilengkapi dengan antarmuka yang modern dan grafik interaktif untuk memberikan pengalaman pengguna terbaik. 🎉

## ✨ Fitur Utama

-   **📊 Dashboard Interaktif**: Menyajikan statistik gudang secara visual, seperti tren barang masuk, barang keluar, distribusi pemasok, dan stok berdasarkan kategori.
-   **📂 Manajemen Barang**: Mengelola data barang secara efisien, termasuk kategori barang.
-   **🛠️ Transaksi Barang**:
    -   **Barang Masuk**: Catat barang yang masuk ke gudang.
    -   **Barang Keluar**: Pantau barang yang keluar dari gudang.
-   **🤝 Manajemen Pemasok**: Kelola data pemasok yang terhubung dengan gudang Anda.

## 🖼️ Tampilan Aplikasi

### Dashboard Gudang

![GudangManager Dashboard](.\resources\images\dashboard.png)

**Penjelasan**: Tampilan dashboard yang menunjukkan statistik barang masuk dan keluar, serta grafik interaktif untuk analisis tren dan distribusi pemasok.

### Manajemen Barang

![Manajemen Barang](./images/barang_screenshot.png)

**Penjelasan**: Halaman untuk mengelola data barang, memudahkan penambahan, pengeditan, dan penghapusan barang dari gudang.

### Transaksi Barang

![Transaksi Barang](./images/transaksi_screenshot.png)

**Penjelasan**: Antarmuka untuk mencatat transaksi barang masuk dan keluar, memantau stok barang secara real-time.

### Manajemen Pemasok

![Manajemen Pemasok](./images/pemasok_screenshot.png)

**Penjelasan**: Tampilan untuk mengelola informasi pemasok yang terhubung dengan gudang Anda, termasuk alamat dan detail kontak.

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan GudangManager di lingkungan lokal Anda:

1. **Kloning Repository**:

    ```bash
    git clone https://github.com/insa21/gudangmanager.git
    cd gudangmanager
    ```

2. **Instalasi Dependencies**:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Konfigurasi Lingkungan**:
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.

    ```bash
    cp .env.example .env
    ```

4. **Generate Key**:

    ```bash
    php artisan key:generate
    ```

5. **Migrasi Database**:

    ```bash
    php artisan migrate --seed
    ```

6. **Jalankan Server Lokal**:
    ```bash
    php artisan serve
    ```
    Akses aplikasi di [http://127.0.0.1:8000](http://127.0.0.1:8000).

## 🛠️ Teknologi yang Digunakan

-   **Backend**: Laravel 11
-   **Frontend**: Filament
-   **Grafik**: Laravel Trend
-   **Database**: MySQL
-   **Server Lokal**: Laragon dan Xampp

## 📝 Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](./LICENSE).

---

**Dibuat dengan ❤️ oleh Indra Saepudin ([GitHub](https://github.com/insa21))**

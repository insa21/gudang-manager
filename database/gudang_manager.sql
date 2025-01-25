-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2025 pada 17.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_manager`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1737306240),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1737306240;', 1737306240),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1737466644),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1737466644;', 1737466644);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elektronik', 'Peralatan elektronik, seperti komputer, telepon, dan peralatan multimedia.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(2, 'Komputer & Aksesoris', 'Komponen dan aksesoris komputer, termasuk mouse, keyboard, dan kabel.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(3, 'Peralatan Dapur', 'Peralatan untuk kebutuhan dapur seperti panci, wajan, dan blender.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(4, 'Bahan Baku Industri', 'Barang yang digunakan dalam proses produksi industri, termasuk bahan kimia dan logam.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(5, 'Pangan & Minuman', 'Produk pangan dan minuman, dari bahan baku hingga produk jadi.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(6, 'Perabotan Rumah Tangga', 'Barang-barang yang digunakan untuk melengkapi rumah, seperti kursi, meja, lemari, dan lainnya.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(7, 'Peralatan Olahraga', 'Barang-barang untuk aktivitas olahraga, seperti bola, raket, dan perlengkapan fitness.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(8, 'Kesehatan & Kecantikan', 'Produk untuk kesehatan dan kecantikan, seperti kosmetik, perawatan kulit, dan suplemen.', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `sku`, `category_id`, `stock`, `price`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop ASUS X509', 'ELEC001', 1, 15, 5000000, '01JHZQTFKK436ZSZEMEWC7YTQ2.png', '2025-01-19 16:14:57', '2025-01-19 16:55:02', NULL),
(2, 'Smartphone Xiaomi Mi 11a', 'ELEC002', 1, 30, 7500000, '01JHZQW0KZYBEDQVFQB88SXQFG.jpg', '2025-01-19 16:14:57', '2025-01-19 16:55:52', NULL),
(3, 'Mouse Logitech Wireless', 'COMP001', 2, 50, 150000, '01JHZQXMRVHRQN8NMHHHYWVYTW.jpg', '2025-01-19 16:14:57', '2025-01-19 16:56:45', NULL),
(4, 'Keyboard Mekanikal Razer', 'COMP002', 2, 40, 1200000, '01JHZQZ91JDX9CVKDR7G7S0QPD.jpg', '2025-01-19 16:14:57', '2025-01-19 16:57:39', NULL),
(5, 'Blender Philips HR2020', 'KITCH001', 3, 20, 600000, '01JHZR0KY2T0RS2RW1V1H1EVK7.webp', '2025-01-19 16:14:57', '2025-01-19 16:58:23', NULL),
(6, 'Kompor Gas 2 Tungku', 'KITCH002', 3, 25, 350000, '01JHZR2HBD5BRHXDTJ0S1F0153.webp', '2025-01-19 16:14:57', '2025-01-19 16:59:25', NULL),
(7, 'Semen 50kg', 'BAK001', 4, 200, 80000, '01JHZR4NZ9XQNM4EQKE9QXBSMW.jpg', '2025-01-19 16:14:57', '2025-01-19 17:00:36', NULL),
(8, 'Baja Ringan 3mm', 'BAK002', 4, 150, 100000, '01JHZR683C2TD7VMHEVVB71MD7.jpg', '2025-01-19 16:14:57', '2025-01-19 17:01:27', NULL),
(9, 'Beras 5kg', 'FOOD001', 5, 500, 70000, '01JHZR7XTRF4VH8QFM0ZWYSGZV.webp', '2025-01-19 16:14:57', '2025-01-19 17:02:22', NULL),
(10, 'Minyak Goreng 1L', 'FOOD002', 5, 250, 15000, '01JHZR95F2DBGDB1NC2BWYDHX2.webp', '2025-01-19 16:14:57', '2025-01-19 17:03:03', NULL),
(11, 'Meja Kantor Kayu', 'FURN001', 6, 50, 1200000, 'meja_kantor.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(12, 'Kursi Kantor', 'FURN002', 6, 75, 500000, 'kursi_kantor.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(13, 'Bola Sepak Adidas', 'SPORT001', 7, 100, 350000, 'bola_sepak_adidas.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(14, 'Raket Tenis Wilson', 'SPORT002', 7, 50, 1500000, 'raket_tenis_wilson.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(15, 'Shampo Sampoerna', 'HEALTH001', 8, 150, 30000, 'shampo_sampoerna.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(16, 'Vitamin C 500mg', 'HEALTH002', 8, 200, 25000, 'vitamin_c.jpg', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(17, 'Stone Talley', 'Et esse dolor et laborum A et earum ea culpa ex quia eos et dolores praesentium ab fugiat labore', 7, 0, 68, NULL, '2025-01-21 13:58:53', '2025-01-21 13:59:18', '2025-01-21 13:59:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_17_124831_create_categories_table', 1),
(5, '2025_01_17_124920_create_items_table', 1),
(6, '2025_01_17_125016_create_suppliers_table', 1),
(7, '2025_01_17_125104_create_stock_ins_table', 1),
(8, '2025_01_17_125132_create_stock_outs_table', 1),
(9, '2025_01_18_135653_update_suppliers_table_add_columns', 1),
(10, '2025_01_18_161701_update_items_table_add_columns', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0yvrW5tIEYxF6b2ZMTva7fsNVAyns1VgVlhssdFy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibDNBREFvSjF4VEdsbDAwNWI3Y1M3dU14TDdmQ28xT3RzbHdsaTRYbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fX0=', 1737466491),
('47eL9IofonKXMSioWuSBmMlRSLClsBOiSLvuwDiB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjFoYW9wUW1TV1RSa2pyOGZwcmtibnRGbDlmNFpjUXhkTzdMTVhEdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737466615),
('7ogjaDZ5ohqXxAzwKGKiobJhPWqEkbYjnJ23bG8V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUE16Y0R6cXVIZVNIYTBzT2REMWtuRUNJb2ZzQWJVTnBLTE1IS2laRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjg6ImZpbGFtZW50IjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkU0JvREtGOHBrM0R1cDNBcFVsc2JDTzNxUTlOTWJSUjIybkFDMDFsekIvd2cubFhleGJhWW0iO30=', 1737468057),
('G3f1aY866RRfxqnq3Yv28x2JdeLYsollNJnnOkCA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmx3YUZmSFU0RnhudWxMNEZ0WGpLMUszMDBLcVpacEwzVTM3ZUliQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fX0=', 1737823173),
('ZatdwgVvS9PleF6H2cVDfQ2cAbLT55uxCJXeADGg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGlFbm1OSTN0eUY3TFplTDU1dEd4OHYyc3BiUm5xalFRQllTY2l5SCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737466616),
('zZX9qwxSWKNwma8k7Ba7ZHjVcFyZKK5jWK8oz7pR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzRKdm9WQW5HZHcwSWpIeDRzeTJIM01rMUxEWHQ2bm1ZcGlDclNiZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737466617);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_ins`
--

CREATE TABLE `stock_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_ins`
--

INSERT INTO `stock_ins` (`id`, `item_id`, `supplier_id`, `quantity`, `transaction_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 100, '2025-01-19', '2025-01-19 16:16:39', '2025-01-19 16:16:39', NULL),
(2, 2, 1, 200, '2025-01-19', '2025-01-19 16:17:25', '2025-01-19 16:17:25', NULL),
(3, 3, 1, 400, '2025-01-19', '2025-01-19 16:17:46', '2025-01-19 16:17:46', NULL),
(4, 4, 1, 900, '2025-01-16', '2025-01-19 16:18:08', '2025-01-19 16:18:08', NULL),
(5, 5, 3, 50, '2025-01-16', '2025-01-19 16:18:50', '2025-01-19 16:18:50', NULL),
(6, 6, 3, 80, '2025-01-19', '2025-01-19 16:19:17', '2025-01-19 16:19:17', NULL),
(7, 8, 2, 90, '2025-01-17', '2025-01-19 16:19:54', '2025-01-19 16:19:54', NULL),
(8, 10, 4, 700, '2025-01-17', '2025-01-19 16:20:19', '2025-01-19 16:20:39', NULL),
(9, 9, 4, 1800, '2025-01-17', '2025-01-19 16:21:07', '2025-01-19 16:21:07', NULL),
(10, 11, 2, 300, '2025-01-17', '2025-01-19 16:21:27', '2025-01-19 16:21:27', NULL),
(11, 12, 2, 30, '2025-01-15', '2025-01-19 16:21:48', '2025-01-19 16:21:48', NULL),
(12, 13, 4, 60, '2025-01-14', '2025-01-19 16:22:20', '2025-01-19 16:22:20', NULL),
(13, 14, 4, 70, '2025-01-13', '2025-01-19 16:22:44', '2025-01-19 16:22:44', NULL),
(14, 15, 3, 70, '2025-01-19', '2025-01-19 16:23:11', '2025-01-19 16:23:11', NULL),
(15, 16, 4, 80, '2025-01-06', '2025-01-19 16:23:32', '2025-01-19 16:23:32', NULL),
(16, 8, 1, 80, '2025-01-20', '2025-01-19 17:03:30', '2025-01-19 17:03:30', NULL),
(17, 7, 4, 90, '2025-01-20', '2025-01-19 17:03:49', '2025-01-19 17:03:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_outs`
--

CREATE TABLE `stock_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_outs`
--

INSERT INTO `stock_outs` (`id`, `item_id`, `quantity`, `transaction_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 80, '2025-01-14', '2025-01-19 16:24:43', '2025-01-19 16:24:43', NULL),
(2, 12, 16, '2025-01-19', '2025-01-19 16:25:01', '2025-01-19 16:25:57', NULL),
(3, 3, 90, '2025-01-17', '2025-01-19 16:27:03', '2025-01-19 16:27:03', NULL),
(4, 15, 9, '2025-01-18', '2025-01-19 16:27:21', '2025-01-19 16:27:21', NULL),
(5, 2, 90, '2025-01-15', '2025-01-19 16:27:40', '2025-01-19 16:27:40', NULL),
(6, 7, 0, '2025-01-16', '2025-01-19 16:27:58', '2025-01-19 16:27:58', NULL),
(7, 2, 5, '2025-01-16', '2025-01-19 16:28:16', '2025-01-19 16:28:16', NULL),
(8, 11, 1, '2025-01-14', '2025-01-19 16:28:35', '2025-01-19 16:28:35', NULL),
(9, 6, 5, '2025-01-13', '2025-01-19 16:28:47', '2025-01-19 16:28:47', NULL),
(10, 10, 9, '2025-01-18', '2025-01-19 16:29:03', '2025-01-19 16:29:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supplier Elektronik ABC', '021-12345678', 'Jl. Elektronik No. 123, Jakarta', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(2, 'Supplier Bahan Baku XYZ', '021-23456789', 'Jl. Bahan Baku No. 456, Bandung', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(3, 'Supplier Pangan Maju', '021-34567890', 'Jl. Pangan No. 789, Surabaya', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL),
(4, 'Supplier Kesehatan Sehat', '021-45678901', 'Jl. Kesehatan No. 101, Jakarta', '2025-01-19 16:14:57', '2025-01-19 16:14:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Gudang', 'admin@gudang.com', NULL, '$2y$12$SBoDKF8pk3Dup3ApUlsbCO3qQ9NMbRR22nAC01lzB/wg.lXexbaYm', NULL, '2025-01-19 16:15:20', '2025-01-19 16:15:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_sku_unique` (`sku`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_ins_item_id_foreign` (`item_id`),
  ADD KEY `stock_ins_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `stock_outs`
--
ALTER TABLE `stock_outs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_outs_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `stock_outs`
--
ALTER TABLE `stock_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD CONSTRAINT `stock_ins_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_ins_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `stock_outs`
--
ALTER TABLE `stock_outs`
  ADD CONSTRAINT `stock_outs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

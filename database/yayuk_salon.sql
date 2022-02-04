-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2022 pada 03.19
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayuk_salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `code_booking`, `user_id`, `user_name`, `date`, `start_time`, `end_time`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '6W8-ys1643177630', 6, 'Sri Handayani', '2022-01-31', '08:30:00', '08:40:00', 10000, 2, '2022-01-25 23:13:50', '2022-01-31 19:55:27'),
(2, 'z7n-ys1643205268', 2, 'Reno Alane Pradino', '2022-01-29', '08:30:00', '10:10:00', 210000, 3, '2022-01-26 06:54:28', '2022-01-31 19:55:19'),
(3, 'bNb-ys1643263746', 2, 'Reno Alane Pradino', '2022-01-28', '10:00:00', '10:55:00', 60000, 2, '2022-01-26 23:09:06', '2022-01-31 19:55:10'),
(4, 'isk-ys1643640545', 5, 'Anselma Putri Pratiwi', '2022-02-01', '11:00:00', '13:05:00', 90000, 2, '2022-01-31 07:49:05', '2022-01-31 22:42:09'),
(5, 'GOs-ys1643683673', 3, 'Clarissa Aline', '2022-02-02', '10:00:00', '11:15:00', 60000, 0, '2022-01-31 19:47:53', '2022-01-31 19:47:53'),
(6, 'TxA-ys1643696808', 4, 'Aisyah Widiantara', '2022-02-09', '08:30:00', '09:20:00', 40000, 0, '2022-01-31 23:26:48', '2022-01-31 23:26:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Semir Rambut', 1, '2022-01-25 20:24:06', '2022-01-25 20:24:06'),
(2, 1, 'Vitamin Rambut', 1, '2022-01-25 20:24:17', '2022-01-25 20:24:17'),
(3, 1, 'Obat Smoothing', 1, '2022-01-25 20:24:54', '2022-01-25 20:24:54'),
(4, 1, 'Shampo Salon', 1, '2022-01-25 20:25:35', '2022-01-25 20:25:35'),
(5, 1, 'Conditioner', 1, '2022-01-25 20:25:45', '2022-01-25 20:25:45'),
(6, 1, 'Sabun Muka', 1, '2022-01-25 20:25:55', '2022-01-25 20:25:55'),
(7, 1, 'Masker Wajah', 1, '2022-01-25 20:46:57', '2022-01-25 20:46:57'),
(8, 1, 'Alat Salon', 1, '2022-01-25 20:47:04', '2022-01-25 20:47:04'),
(9, 1, 'Hair Tonic', 1, '2022-01-30 08:14:04', '2022-01-30 08:14:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bookings`
--

CREATE TABLE `detail_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_duration` int(11) NOT NULL,
  `service_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_bookings`
--

INSERT INTO `detail_bookings` (`id`, `booking_id`, `service_id`, `service_name`, `service_duration`, `service_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Potong Rambut', 10, 10000, '2022-01-25 23:13:50', '2022-01-25 23:13:50'),
(2, 2, 1, 'Potong Rambut', 10, 10000, '2022-01-26 06:54:28', '2022-01-26 06:54:28'),
(3, 2, 2, 'Rebonding', 120, 200000, '2022-01-26 06:54:28', '2022-01-26 06:54:28'),
(4, 3, 3, 'Keramas', 10, 10000, '2022-01-26 23:09:06', '2022-01-26 23:09:06'),
(5, 3, 5, 'Make Up', 45, 50000, '2022-01-26 23:09:07', '2022-01-26 23:09:07'),
(6, 4, 1, 'Potong Rambut', 15, 10000, '2022-01-31 07:49:06', '2022-01-31 07:49:06'),
(7, 4, 6, 'Facial', 50, 40000, '2022-01-31 07:49:06', '2022-01-31 07:49:06'),
(8, 4, 10, 'Creambath', 60, 40000, '2022-01-31 07:49:06', '2022-01-31 07:49:06'),
(9, 5, 1, 'Potong Rambut', 15, 10000, '2022-01-31 19:47:53', '2022-01-31 19:47:53'),
(10, 5, 3, 'Keramas', 10, 10000, '2022-01-31 19:47:53', '2022-01-31 19:47:53'),
(11, 5, 6, 'Facial', 50, 40000, '2022-01-31 19:47:53', '2022-01-31 19:47:53'),
(12, 6, 6, 'Facial', 50, 40000, '2022-01-31 23:26:48', '2022-01-31 23:26:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_03_155618_create_categories_table', 1),
(6, '2021_11_06_082429_create_products_table', 1),
(7, '2021_11_14_130015_create_services_table', 1),
(8, '2021_12_07_034827_create_bookings_table', 1),
(9, '2021_12_21_084727_create_detail_bookings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `name`, `description`, `image`, `price`, `stok`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Miranda Bleaching', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Bleaching<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang, gunakan mc-6/ bleaching decoloring.</div>', 'products-image/dVxAABimPZYm18Ur1ccYCuKx9Zk4oz6Uo0Vg9GgG.jpg', 12500, 2, 1, '2022-01-25 20:29:20', '2022-01-25 20:29:20'),
(2, 2, 1, 'Silkoro 80ML', '<div>SILKORO VITAMIN RAMBUT 80ML</div>', 'products-image/jbtvnKqphiD6SPQdOrf3gbSNBfV6eCN1renF3X82.jpg', 25000, 9, 1, '2022-01-25 20:31:00', '2022-01-25 20:31:00'),
(3, 2, 1, 'Silkoro 200ML', '<div>SILKORO VITAMIN RAMBUT 200ML</div>', 'products-image/JmSSxPtnURnJYNco1zOWISxQBJMgYVil7ZgBdpbJ.jpg', 40000, 2, 1, '2022-01-25 20:31:47', '2022-01-25 20:31:47'),
(4, 6, 1, 'Klinskin', '<div>Sabun KLINSKIN Beauty Body Soap adalah Sabun Pemutih Kulit Badan Dan Wajah. Sabun Pencerah Kulit mengandung Collagen Asli BPOM<br>PRODUK &nbsp; :&nbsp; KLINSKIN BEAUTY SOAP<br>NETTO&nbsp; &nbsp; &nbsp; :&nbsp; 100g</div>', 'products-image/Bjal9iS8D9kkhMKEbGJSGwnbvVB8tYoLZ2aI7rMQ.jpg', 35000, 1, 1, '2022-01-25 20:33:40', '2022-01-25 20:33:40'),
(5, 6, 1, 'Temulawak Facewash', '<div>Sabun Temulawak THE FACE dengan kandungan Ekstrak temulawak dan whitening serta diperkaya dengan Vitamin E menjadikan kulit wajah Anda tampak lebih putih lembut dan Sehat..<br><br>Cara Pemakaian :<br>Basahi wajah dengan air dan usapkan sabun dengan lembut hingga merata dan berbusa, biarkan kurang lebih 3 menit dan bilas kembali dengan Air.</div>', 'products-image/beSfUsZSJZutYG26qz0vuVmk4Oh5tkp50OogEfp2.jpg', 15000, 2, 1, '2022-01-25 20:36:16', '2022-01-25 20:36:16'),
(6, 3, 1, 'Matrix Opti Straight', '<div>MATRIX OPTI STRAIGHT Smoothing Straightening Cream 2 x 125ml<br>MATRIX OPTI STRAIGHT Smoothing Straightening Cream 2 x 125ml KEMASAN BARU!<br>Untuk sekali pemakaian smoothing rambut.<br><br>Menjadikan rambut lurus, lembut, dan sehat.</div>', 'products-image/5Pd9toAG9kZHgp51Mhrlsw5c1db00vDzf4zssRcG.jpg', 65500, 1, 1, '2022-01-25 20:38:47', '2022-01-25 20:38:47'),
(7, 1, 1, 'Mirathon Blue Black', '<div>Pewarna Rambut Original Miratone</div>', 'products-image/POqf62QYUsCqwcIPYtt3DNPV0QNQmtFQY6I2BweU.jpg', 42000, 1, 1, '2022-01-25 20:41:55', '2022-01-25 20:41:55'),
(8, 1, 1, 'Miranda Blue', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Blue<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang, gunakan mc-6/ bleaching decoloring.</div>', 'products-image/I9bLT3MtJooSbyTeneJeB5c2fEfIrKOclTllRGAO.jpg', 12500, 2, 1, '2022-01-25 20:43:07', '2022-01-25 20:43:07'),
(9, 1, 1, 'Miranda Red Hair Color', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Violet Red<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang</div>', 'products-image/x6jxnAFCrenat7KqiJK0z2PGXUC52aG27NEAULcz.jpg', 12500, 2, 1, '2022-01-25 20:44:06', '2022-01-25 20:44:06'),
(10, 5, 1, 'Venotel Melon', '<div>Conditioner/pelembut rambut yang digunakan setelah pemakaian shampoo. Cukup oles rata di batang rambut diamkan sebentar lalu bilas hingga bersih.<br>ready varian melon</div>', 'products-image/VWN3vlD8wrvqhSkQHKDVgKQdLkpQ0Czy2XjukDAA.jpg', 40000, 5, 1, '2022-01-25 20:46:34', '2022-01-25 20:46:34'),
(11, 1, 1, 'Feves Color Cream', '<div>Feves 60ml</div>', 'products-image/bOQpGSTI3rpJ1YZa5HKYCXAASxOBCzdqD8IPY8bI.jpg', 35000, 2, 1, '2022-01-30 07:51:16', '2022-01-30 07:51:16'),
(12, 7, 1, 'Hanasui Naturgo', '<div>Hanasui Naturgo Masker Wajah</div><ul><li>Ampuh mengangkat komedo</li><li>Cocok untuk kulit sensitif</li><li>Meminimalkan pori-pori</li><li>Mengangkat sel kulit mati</li><li>Mengontrol minyak berlebih</li><li>Cocok untuk kulit berminyak</li><li>kulit kombinasi!</li><li>Bersihkan wajah terlebih dahulu, lalu keringkan</li><li>Oleskan Shiseido Naturgo Mud Mask ke seluruh wajah (Hindari daerah mata, alis dan bibir)</li><li>Tunggu hingga kering (25 menit ~ 30 menit)</li><li>Angkat secara perlahan dari bawah ke atas</li><li>Gunakan 2-3 kali dalam seminggu</li></ul><div><br></div>', 'products-image/4OPuiWD4bzBdXEN34bVn8ivmFXT4rHqFTRkL7dL8.jpg', 2500, 10, 1, '2022-01-30 07:53:38', '2022-01-30 07:53:38'),
(13, 7, 1, 'Hanasui Naturgo Gold', '<div>Masker Wajah untuk mencegah penuaan.<br>Masker wajah mewah yang diformulasikan dengan peach extract dan vitamin B3, Peach extract berfungsi sebagai Anti-Aging agar kulit tampak lebih awet muda dan Vitamin B3 yang berfungsi untuk mencerahkan kulit sekaligus membuat kulit senantiasa lebih halus, lembut dan bercahaya.PEMAKAIAN</div>', 'products-image/42HMRUtXMu8LYjHzTQpS9mbNCcbG4ivG1H69MyBq.jpg', 3000, 20, 1, '2022-01-30 07:55:09', '2022-01-30 07:55:09'),
(14, 4, 1, 'Metal Fortis', '<ul><li>Shampoo Metal</li><li>Cocok Untuk Semua Jenis Rambut</li><li>Terbuat Dari Bahan Water, Sodium Laureth Sulfate, Glycerin, Sodium Lauryl Sulfate, Polyquatemium-7, Parfume, Cocamide DEA, Polydimethyl Siloxane, Sodium PCA, Aspartic Acid, Hydroxypropyl Methylcellulose DMDM Hydantoin, CI 47005.</li><li>Penumbuh Rambut</li><li>Aman Untuk Semua Usia (Disarankan Konsultasi Ke Dokter Terlebih Dahulu Karena Ditakutkan Ada Reaksi Alergi Pada Bahan Yang Terkandung)</li></ul><div><br></div>', 'products-image/vjUZG8vOiJPBIdLz4Kuq48CZRZwNubHx5VeffeRD.jpg', 28000, 4, 1, '2022-01-30 07:57:22', '2022-01-30 07:57:22'),
(15, 8, 1, 'Peralatan Semir Rambut', '<div>Peralatan Semir Rambut</div>', 'products-image/RDChQv4Fntov6SszYOTqLK99BCauOU6qFPThpTo2.jpg', 5000, 6, 1, '2022-01-30 08:01:45', '2022-01-30 08:09:56'),
(16, 5, 1, 'Macarizo Rebonding Sistem', '<div>Macarizo Rebonding Sistem</div>', 'products-image/bLpf1qQxzdaDPpjTiR5SFrmAA8m7IA1Bi3czCOCm.jpg', 110000, 2, 1, '2022-01-30 08:04:58', '2022-01-30 08:04:58'),
(17, 1, 1, 'Garnier Color Naturals', '<div>GARNIER COLOR NATURAL EXPRESS<br>3 Langkah Mudah :</div><div>1. Persiapan - Campur gel pewarna dan developer ke dalam mangkuk non-logam. Ikuti petunjuk penggunaan di dalam kemasan.</div><div>2. Mudah digunakan - Gunakan campuran pada rambut yang kering. Teksturnya yang kaya menyebar secara merata dan tidak menetes.</div><div>3. Langkah terakhir - Biarkan selama 15 menit, kemudian bilas dengan air hingga air terlihat bersih.</div>', 'products-image/CfvgfdcyjExsnF1NypQhMEuXErmErFKJxe483lwE.jpg', 45000, 5, 1, '2022-01-30 08:09:03', '2022-01-30 08:09:03'),
(18, 1, 1, 'Miranda Natural Black', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Natural Black<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang, gunakan mc-6/ bleaching decoloring.</div>', 'products-image/U9kDHAUX8aqhfR4pvEfk1bcvjizg3ftgAXzTB226.jpg', 12500, 3, 1, '2022-01-30 08:11:10', '2022-01-30 08:11:10'),
(19, 1, 1, 'Miranda Grey', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Grey<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang, gunakan mc-6/ bleaching decoloring.</div>', 'products-image/BAOPFFG0icXPeETMlC8hszsOPPP3b0WylHFzvLL2.jpg', 12500, 2, 1, '2022-01-30 08:11:59', '2022-01-30 08:11:59'),
(20, 9, 1, 'Putri Hair Tonic 200ml', '<div>Hair Tonik Putri adalah produk tonik rambut dan kulit kepala yg dilengkapi vitamin untuk merawat keindahan, kesegaran dan kekuatan rambut. 1 botol berisi 200 ml. Normal warna kuning: untuk rambut normal mencegah rambut rontok dan merawat kekuatan rambut. Cara pemakaian: Gosokkan merata Hair Tonic Putri ke kulit kepala yg bersih (sebaiknya setelah keramas dan rambut dalam keadaan setengah kering).</div>', 'products-image/Rmj1RmdkBih0lHjolWDpjKgamGkK9knz2xLmEhfg.jpg', 35000, 2, 1, '2022-01-30 08:15:21', '2022-01-30 08:15:21'),
(21, 1, 1, 'Diosys Pure Green 100ml', '<div><strong><em>DIOSYS COLOR sangat mudah digunakan di rumah dan dirancang untuk mewarnai rambut.<br>Diformulasikan secara khusus.<br>DIOSYS Color dapat bertahan lama dan memiliki aroma yang sangat nyaman. Tersedia dalam berbagai pilihan warna untuk tampil alami, elegan dan tetep sehat berkilau.</em></strong><br><br><strong>Keunggulan:<br>1) Harga ekonomis karena isi 100ml x 2 sehingga satu kemasan dapat digunakan untuk rambut tebal hingga 24 cm<br>2) Beraroma harum<br>3) Warna yang tahan lama dan permanent<br>4) Tidak mengakibatkan rambut menjadi kering<br>5) Tidak memerlukan jasa salon dan dapat digunakan dirumah<br><br>CARA PENGGUNAAN:<br>Campurkan krim pewarna rambut yang diinginkan dengan<br>DIOSYS Cream Developer denganperbandingan 1 : 1 lalu aduk rata. Oleskan secara merata pada rambut mulai dari akar rambut sampai ke ujung rambut. Diamkan sampai 30–45 menit sebelum di bilas dengan air untuk mendapatkan hasil warna&nbsp;</strong></div>', 'products-image/jIcFzKvVz8Or23HtOM5rAY2TQyCAgw9jzlQjxVGj.jpg', 35000, 1, 1, '2022-01-30 08:18:36', '2022-01-30 08:18:36'),
(22, 1, 1, 'L\'oreal Violet Brown', '<div><strong>Pewarna rambut yang melindungi rambut sebelum, saat, dan sesudah pewarnaan.</strong> Excellence Fashion diperkaya dengan:&nbsp;<br>(1) Shine Complex Untuk refleksi cahaya pada rambut yang lebih indah&nbsp;<br>(2) Intensif Pigments Untuk warna rambut yang lebih tahan lama&nbsp;<br>(3) Triple Care Formula Untuk melindungi, menjaga kekuatan, dan menutrisi rambut yang diwarnai .<br>CARA PENGGUNAAN :&nbsp;<br>1. Kenakan sarung tangan yang tersedia dalam kemasan L\'Oreal Excellence.&nbsp;<br>2. Buka ujung botol developer dan lepaskan penutup aplikator.&nbsp;<br>3. Tusuk bagian atas tabung pewarna dengan ujung penutupnya.&nbsp;<br>4. Masukkan semua isi tabung pewarna ke dalam botol developer dan pasang kembali penutup developer.&nbsp;<br>5. Tutup ujung botol developer dengan jari yang sudah terbungkus sarung tangan dan kocok sampai kedua bahan tercampur rata.&nbsp;<br>6. Pasanga handuk di atas bahu agar pakaian terlindung dari bahan pewarna.&nbsp;<br>7. Sisirlah rambut dan oleskan serum precolor hingga ujung agar ranbut terlindung selama proses pewarnaan. Tunggu dua menit sebelum mewarnai dan jangan membilas serum.&nbsp;<br>8. Gunakan ujung aplikator untuk mengoleskan zat pewarna ke akar rambut.&nbsp;<br>9. Oleskan zat pewarna ke bagian rambut yang lain secara menyeluruh menggunakan jari yang terbungkus sarung tangan atau sisir aplikator.&nbsp;<br>10. Diamkan rambut selama 30 menit dan kemudian bilas sampai air benar-benar jernih.&nbsp;<br>11. Gunakan kondisioner pelindung yang tersedia dalam kemasan pewarna rambut dan biarkan selama dua menit.&nbsp;<br>12. Bilas dan tata rambut seperti biasa.</div>', 'products-image/HM5SEd9xNv0n4lpU7Yr6PkqhOx1xIeNlHOcxUXyH.jpg', 140000, 1, 1, '2022-01-30 08:21:53', '2022-01-30 08:21:53'),
(23, 1, 1, 'Miranda Golden Brown', '<div>Miranda Hair Color [30 mL], pewarna rambut permanent dengan hasil pewarnaan yang lebih terang dan lebih merata ke seluruh bagian batang rambut, menjadikan rambut tampak indah dan lebih berkilau. Dilengkapi dengan kondisioner membuat rambut tetap halus dan lembut setelah pewarnaan.</div><div><br>Manfaat &amp; Keuntungan mengandung kondisioner dengan extra perlindungan untuk melindungi rambut dari kekeringan, rambut pecah dan patah.melindungi rambut dari sinar matahari, membuat rambut menjadi lebih lembut dan bersinar,efektif untuk menutup rambut putih / uban ,mudah digunakan dan harga terjangkau<br><br><strong>Cara Pakai :</strong><br>Campur bubuk dan krim developer dengan perbandingan 1:1 dan dipakai ke rambut secara merata, maksimum selama 45 menit (tergantung jenis rambut). Hindari dari temperatur tinggi. Dan kemudian pakai Miranda Hair Colorant dengan segera. Akan menghasilkan warna rambut yang berkualitas tinggi.</div>', 'products-image/iiV2q8XcHVupNuWKIGQveZDQ9qSd9DevEMkftgsJ.jpg', 12500, 2, 1, '2022-01-30 08:23:38', '2022-01-30 08:23:38'),
(24, 8, 1, 'Catok', '<div><strong>Catok Codos : catok lurus dengan kualitas yang teruji dari korea, dengan design yang elegan dilengkapi dengan pengatur suhu digital dan layar LED.</strong></div><div><br></div>', 'products-image/Bmr1bghMerrjuTvMudrfQry4mbC6N9MbTcZ8gQr8.jpg', 680000, 1, 1, '2022-01-30 08:26:32', '2022-01-30 08:26:32'),
(25, 1, 1, 'Miranda Pink', '<div>Miranda Hair Colour 30gr<br>Original 100%<br>Ada NO.BPOM di kemasan<br>Netto : 30 gr<br>Jenis Warna : Natural Black<br><br>Pewarna rambut profesional yang mudah digunakan. Dilengkapi kondisioner yang memberikan perlindungan extra terhadap rambut yang telah di warnai, memberi kelembutan, dan mencegah rambut pecah/bercabang. Menutup uban dengan sempurna dan hasil yang tahan lama.<br>Untuk mendapatkan hasil warna yang lebih terang, gunakan mc-6/ bleaching decoloring.</div>', 'products-image/kg03X86S8N1LBJddeVDeZZV8USK4UZ7F7sgnxXfs.jpg', 12500, 1, 1, '2022-01-30 08:27:40', '2022-01-30 08:27:40'),
(26, 3, 1, 'Inaura CREAMBATH FRESH Dry & Dull', '<div><strong><em>-CREAMBATH FRESH Dry &amp; Dull<br></em></strong><strong>Creambath Fresh diformulasikan untuk professional salon yang dilengkapi dengan sensasi dingin diperkaya AVOCADO EKSTRAK yang berfungsi sebagai Moisturizer pada rambut untuk mengatasi rambut kering dan rusak serta SOYA OILNYA sebagai kondisioner alami sehingga rambut tampak lebih sehat. Technology Fresh Lock Fragrancenya berfungsi menjaga kesegaran sehingga lebih tahan lama, walaupun menggunakan proses pemanasan dengan Hair Dryer, rambut tetap sehat, lembut dan berkilau.</strong></div>', 'products-image/aUotovFPMiEgvwfmM6EjgQKmPgqXJIaxyaitRITu.jpg', 100000, 1, 1, '2022-01-30 08:30:10', '2022-01-30 08:30:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `duration`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Potong Rambut', 15, 10000, '<div>DiYayuk Salon, anda dapat dengan nyaman mengkonsultasikan gaya tatanan rambut yang diinginkan.</div>', 1, '2022-01-25 23:10:43', '2022-01-26 08:15:33'),
(2, NULL, 'Rebonding', 180, 200000, '<div>Rambut lurus tergerai adalah idaman sebagian besar wanita. Pada umumnya mungkin anda meluruskan rambut dengan alat catok sebelum berpergian, hal ini memberikan masalah selain menyita waktu juga akan membuat rambut rusak karena harus dilakukan berulang.</div>', 1, '2022-01-25 23:11:09', '2022-01-26 20:13:08'),
(3, NULL, 'Keramas', 10, 10000, '<div>Rawat rambut agar selalu tampak segar</div>', 1, '2022-01-26 20:06:37', '2022-01-26 20:06:37'),
(4, NULL, 'Smoothing', 240, 300000, '<div>Dengan smoothing rambut lurus umumnya lebih lembut dan halus sehingga tampak lebih natural</div>', 1, '2022-01-26 20:08:35', '2022-01-30 08:33:38'),
(5, NULL, 'Make Up', 45, 50000, '<div>Percantik wajah anda, untuk kelulusan, pernikahan dll.</div>', 1, '2022-01-26 20:09:26', '2022-01-26 20:09:26'),
(6, NULL, 'Facial', 50, 40000, '<div>Rawat kulit wajah dengan bahan-bahan yang aman.</div>', 1, '2022-01-26 20:10:21', '2022-01-26 20:10:21'),
(7, NULL, 'Semir Warna', 60, 30000, '<div>Harga tergantung jenis semir yang dipakai</div>', 1, '2022-01-26 20:11:09', '2022-01-26 20:11:09'),
(8, NULL, 'Toning / Semir Uban', 80, 50000, '<div>Untuk rambut yang sudah memutih dan masih ingin terlihat muda <strong>toning</strong> jadi solusinya. Perwarnaan rambut secara alami agar kembali ke warna aslinya.</div>', 1, '2022-01-26 20:12:55', '2022-01-26 20:12:55'),
(9, NULL, 'Curly', 30, 15000, NULL, 1, '2022-01-26 20:13:32', '2022-01-26 20:13:32'),
(10, NULL, 'Creambath', 60, 40000, '<div>Rawat rambut agar terhindar dari kerontokan dan mudah diatur dengan menggunakan bahan alami.</div>', 1, '2022-01-26 20:16:31', '2022-01-26 20:16:31'),
(11, NULL, 'Catok', 30, 15000, '<div>Meluruskan Rambut</div>', 1, '2022-01-30 08:33:12', '2022-01-30 08:33:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `is_admin`, `status`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 1, 1, '8534653743', 'admin@yayuksalon.com', NULL, '$2y$10$Q4O3GHFV8iuzHk4ZG2BWIuKMf.xdaIGvrdHfKfnSBy1m0mE1EaWri', NULL, '2022-01-25 20:22:18', '2022-01-25 20:22:18'),
(2, 'Reno Alane Pradino', 'reno08', 0, 1, '85333815959', 'renoalanp@gmail.com', NULL, '$2y$10$VzjxmGhWigaN83tUn7KM1uwBnYa1nwh0UG1WKyvfIH9MvswVY09MK', NULL, '2022-01-25 23:09:16', '2022-01-26 07:46:04'),
(3, 'Clarissa Aline', 'Clrs12', 0, 1, '82223545678', 'risaaline@gmail.com', NULL, '$2y$10$uvVBW7FGcuzSmD88LUqiMOjRjPJgOeINEBmd.mFxfOBxASfMeXm7K', NULL, '2022-01-26 06:39:09', '2022-01-26 06:39:09'),
(4, 'Aisyah Widiantara', 'Aisyah', 0, 1, '85321432586', 'aisyah122@gmail.com', NULL, '$2y$10$IaR0jBhKqT0kwt7PQ/0hV.BNG8xgSWSnawLtu3M6s3s/mijXTPcmW', NULL, '2022-01-26 06:40:32', '2022-01-26 06:40:32'),
(5, 'Anselma Putri Pratiwi', 'Ansel', 0, 1, '82224586978', 'Anselmus@gmail.com', NULL, '$2y$10$d8uSag3nxZlXd8oPyUUpNuHOPErIJGfE2QrOPN79VyY8aSg4XfwEK', NULL, '2022-01-26 06:41:16', '2022-01-26 06:41:16'),
(6, 'Sri Handayani', 'sriyatun', 0, 1, '8733314567', 'srihandayani@gmail.com', NULL, '$2y$10$148ZMoJLaNPnDPdjYyHJ8.i8YCnh5pKVxGpjWEJIIjA1L3ghxWXFe', NULL, '2022-01-26 06:41:59', '2022-01-26 06:41:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_code_booking_unique` (`code_booking`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `detail_bookings`
--
ALTER TABLE `detail_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_bookings_booking_id_foreign` (`booking_id`),
  ADD KEY `detail_bookings_service_id_foreign` (`service_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_bookings`
--
ALTER TABLE `detail_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_bookings`
--
ALTER TABLE `detail_bookings`
  ADD CONSTRAINT `detail_bookings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

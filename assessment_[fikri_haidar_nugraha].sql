-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2023 pada 08.07
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessment_[fikri_haidar_nugraha]`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Heryanto Napitupulu', 'maulana.ina@yahoo.co.id', '(+62) 599 6763 121', 'Ki. B.Agam Dlm No. 214, Bengkulu 19265, Kalsel', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(2, 'Tira Astuti', 'lailasari.asmadi@yahoo.com', '(+62) 472 5450 7383', 'Jln. Salam No. 991, Padang 34825, Babel', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(3, 'Uchita Kuswandari', 'ana41@yahoo.co.id', '0914 9679 6971', 'Gg. Dr. Junjunan No. 681, Palopo 72317, Lampung', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(4, 'Ade Jati Nashiruddin S.Ked', 'jelita.gunarto@gmail.com', '(+62) 770 1926 475', 'Dk. Pattimura No. 488, Tanjung Pinang 42945, Banten', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(5, 'Padmi Prastuti', 'firgantoro.pia@yahoo.com', '0221 2951 9401', 'Dk. W.R. Supratman No. 556, Kupang 31075, Babel', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(6, 'Ulva Purnawati', 'wasita.gamblang@wibowo.in', '0405 4697 124', 'Ki. Babadan No. 420, Tarakan 37459, Riau', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(7, 'Aurora Zaenab Winarsih', 'purwanto64@gmail.com', '(+62) 579 9794 087', 'Ds. Jakarta No. 256, Bandung 55180, Papua', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(8, 'Mulyono Aris Sinaga', 'yardianto@gmail.co.id', '(+62) 327 6933 972', 'Ds. Sukajadi No. 640, Surakarta 59775, Gorontalo', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(9, 'Joko Latupono', 'ajeng.adriansyah@yahoo.co.id', '0897 7633 033', 'Jr. Bak Mandi No. 109, Surakarta 79001, Jateng', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(10, 'Ikin Saefullah', 'zulaikha.siregar@yahoo.co.id', '025 5279 147', 'Psr. Samanhudi No. 384, Tarakan 34747, Maluku', '2023-10-25 10:21:12', '2023-10-25 10:21:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toko Pakaian Maju Jaya', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(2, 'Restoran Lezat Rasa', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(3, 'Toko Elektronik Tekno', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(4, 'Minimarket Cepat', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(5, 'Kedai Kopi Hangat', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(6, 'Salon Cantik Indah', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(7, 'Apotek Sehat Jaya', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(8, 'Toko Buku Pintar', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(9, 'Bengkel Mobil Terbaik', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(10, 'Butik Fashion Elegan', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(12, 'Toko Pakaian Maju Jaya 2', '2023-10-25 21:38:42', '2023-10-25 21:38:59');

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
(4, '2023_10_23_132858_create_merchants_table', 1),
(5, '2023_10_23_133510_create_outlets_table', 1),
(6, '2023_10_23_133533_create_staff_table', 1),
(7, '2023_10_23_133607_create_customers_table', 1),
(8, '2023_10_23_133620_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_merchants` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outlets`
--

INSERT INTO `outlets` (`id`, `id_merchants`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Outlet Toko Pakaian Maju Jaya', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(2, 2, 'Outlet Restoran Lezat Rasa', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(3, 3, 'Outlet Toko Elektronik Tekno', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(4, 4, 'Outlet Minimarket Cepat', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(5, 5, 'Outlet Kedai Kopi Hangat', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(6, 6, 'Outlet Salon Cantik Indah', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(7, 7, 'Outlet Apotek Sehat Jaya', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(8, 8, 'Outlet Toko Buku Pintar', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(9, 9, 'Outlet Bengkel Mobil Terbaik', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(10, 10, 'Outlet Butik Fashion Elegan', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(11, 12, 'Outlet Toko Pakaian Maju Jaya 2', '2023-10-25 21:39:25', '2023-10-25 21:39:25');

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
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Hana Pudjiastuti S.Psi', 'suryono.ikhsan@pranowo.my.id', '(+62) 973 7409 295', 'Jr. Bakhita No. 774, Samarinda 12821, NTT', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(2, 'Cindy Wijayanti', 'mandasari.okto@yahoo.co.id', '(+62) 406 9383 494', 'Gg. Fajar No. 161, Palu 72867, Jatim', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(3, 'Bakidin Cakrabuana Putra', 'khalimah@lazuardi.net', '(+62) 571 6203 2313', 'Dk. Taman No. 545, Administrasi Jakarta Utara 87881, Sultra', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(4, 'Jaiman Mahendra', 'jsuryono@gmail.com', '(+62) 869 6548 603', 'Dk. Tambak No. 435, Padangsidempuan 42833, Maluku', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(5, 'Tri Damar Prasasta', 'rajasa.sakti@yahoo.co.id', '0761 8558 610', 'Dk. Bhayangkara No. 169, Mataram 92813, Kalteng', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(6, 'Widya Wirda Hariyah S.Kom', 'nababan.ratih@yahoo.co.id', '(+62) 507 0841 4210', 'Psr. Pattimura No. 46, Tangerang Selatan 46764, Jateng', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(7, 'Fathonah Nasyiah S.Kom', 'okto20@gmail.co.id', '0559 9060 357', 'Dk. Yohanes No. 511, Solok 23145, Papua', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(8, 'Hilda Hartati', 'dhalim@gmail.co.id', '(+62) 304 4944 0177', 'Jln. Industri No. 443, Kupang 60271, Jatim', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(9, 'Kania Mulyani S.Pd', 'zaenab.uwais@pratama.co.id', '(+62) 571 2629 9672', 'Gg. Sadang Serang No. 685, Ambon 13942, Malut', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(10, 'Yosef Mahendra', 'riyanti.yoga@susanti.info', '(+62) 715 2968 873', 'Dk. Tambun No. 506, Surabaya 56877, DKI', '2023-10-25 10:21:12', '2023-10-25 10:21:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_staff` bigint(20) UNSIGNED NOT NULL,
  `id_customers` bigint(20) UNSIGNED NOT NULL,
  `id_outlets` bigint(20) UNSIGNED NOT NULL,
  `id_merchants` bigint(20) UNSIGNED NOT NULL,
  `transaction_time` datetime NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `change_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('Paid','Not Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `id_staff`, `id_customers`, `id_outlets`, `id_merchants`, `transaction_time`, `pay_amount`, `payment_type`, `tax`, `change_amount`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 5, 5, '2023-01-31 15:46:58', '496984.00', 'Credit Card', '54668.24', '54668.24', '551652.24', 'Paid', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(2, 1, 4, 9, 9, '2023-07-07 13:47:03', '598076.00', 'Credit Card', '65788.36', '65788.36', '663864.36', 'Paid', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(3, 6, 10, 6, 6, '2023-09-08 10:39:25', '204882.00', 'Debit Card', '22537.02', '22537.02', '227419.02', 'Paid', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(4, 10, 3, 7, 7, '2023-07-16 20:39:45', '174265.00', 'Debit Card', '19169.15', '19169.15', '193434.15', 'Not Paid', '2023-10-25 10:21:12', '2023-10-25 10:21:12'),
(5, 5, 6, 1, 1, '2023-04-20 09:14:37', '959149.00', 'Credit Card', '105506.39', '105506.39', '1064655.39', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(6, 4, 8, 10, 10, '2023-08-17 10:07:24', '442612.00', 'Debit Card', '48687.32', '48687.32', '491299.32', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(7, 4, 9, 3, 3, '2023-07-09 12:32:17', '194662.00', 'Debit Card', '21412.82', '21412.82', '216074.82', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(8, 8, 6, 6, 6, '2023-09-22 18:57:27', '930515.00', 'Credit Card', '102356.65', '102356.65', '1032871.65', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(9, 7, 5, 9, 9, '2023-06-04 04:10:46', '826734.00', 'Debit Card', '90940.74', '90940.74', '917674.74', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(10, 9, 9, 2, 2, '2023-05-18 00:46:51', '854657.00', 'Debit Card', '94012.27', '94012.27', '948669.27', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(11, 4, 2, 10, 10, '2023-10-15 12:56:05', '596669.00', 'Credit Card', '65633.59', '65633.59', '662302.59', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(12, 4, 9, 6, 6, '2023-03-12 14:23:25', '100000.00', 'Debit Card', '11000.00', '11000.00', '111000.00', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(13, 3, 2, 2, 2, '2023-12-28 09:25:55', '237755.00', 'Debit Card', '26153.05', '26153.05', '263908.05', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(14, 9, 9, 4, 4, '2023-05-29 08:01:47', '254826.00', 'Debit Card', '28030.86', '28030.86', '282856.86', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(15, 8, 4, 6, 6, '2023-07-14 19:19:06', '914534.00', 'Credit Card', '100598.74', '100598.74', '1015132.74', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(16, 3, 5, 10, 10, '2023-04-01 07:16:24', '274180.00', 'Debit Card', '30159.80', '30159.80', '304339.80', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(17, 5, 5, 4, 4, '2023-01-20 18:52:18', '100000.00', 'Credit Card', '11000.00', '11000.00', '111000.00', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(18, 1, 8, 5, 5, '2023-10-27 21:14:26', '487588.00', 'Debit Card', '53634.68', '53634.68', '541222.68', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(19, 8, 3, 4, 4, '2023-10-22 04:50:30', '691222.00', 'Debit Card', '76034.42', '76034.42', '767256.42', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(20, 10, 9, 10, 10, '2023-04-28 11:17:00', '761867.00', 'Credit Card', '83805.37', '83805.37', '845672.37', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(21, 3, 3, 6, 6, '2023-09-04 10:10:29', '100000.00', 'Credit Card', '11000.00', '11000.00', '111000.00', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(22, 8, 8, 6, 6, '2023-12-09 03:38:13', '607447.00', 'Credit Card', '66819.17', '66819.17', '674266.17', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(23, 7, 5, 7, 7, '2023-08-08 08:25:13', '809083.00', 'Credit Card', '88999.13', '88999.13', '898082.13', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(24, 5, 1, 5, 5, '2023-10-09 17:15:44', '519850.00', 'Debit Card', '57183.50', '57183.50', '577033.50', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(25, 10, 3, 4, 4, '2023-03-26 19:24:01', '574363.00', 'Debit Card', '63179.93', '63179.93', '637542.93', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(26, 4, 3, 5, 5, '2023-01-24 08:30:13', '551161.00', 'Debit Card', '60627.71', '60627.71', '611788.71', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(27, 5, 10, 7, 7, '2023-08-23 01:51:54', '733989.00', 'Credit Card', '80738.79', '80738.79', '814727.79', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(28, 3, 1, 5, 5, '2023-12-29 00:41:46', '434292.00', 'Debit Card', '47772.12', '47772.12', '482064.12', 'Not Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(29, 6, 8, 8, 8, '2023-01-13 13:34:09', '100000.00', 'Debit Card', '11000.00', '11000.00', '111000.00', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(30, 3, 6, 6, 6, '2023-10-02 22:10:43', '679913.00', 'Debit Card', '74790.43', '74790.43', '754703.43', 'Paid', '2023-10-25 10:21:13', '2023-10-25 10:21:13'),
(31, 1, 6, 1, 1, '2023-10-31 04:00:00', '123311.00', 'Cash', '13564.21', '13564.21', '136875.21', 'Paid', '2023-10-25 21:40:07', '2023-10-25 21:45:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_id_merchants_foreign` (`id_merchants`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_id_merchants_foreign` FOREIGN KEY (`id_merchants`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

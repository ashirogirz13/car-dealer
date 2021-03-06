-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 11:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_dealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `nama_pembeli`, `email`, `nomor_telepon`, `produk_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Angga Zain', 'anggazain@gmail.com', '089654901680', 2, 10, '2021-03-06 02:18:34', '2021-03-06 02:18:34'),
(2, 'Angga Zain', 'anggazain@gmail.com', '089654901680', 2, 15, '2021-03-06 02:29:30', '2021-03-06 02:29:30'),
(3, 'Angga Zain', 'anggazain@gmail.com', '089654901680', 4, 10, '2021-03-06 02:29:44', '2021-03-06 02:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2021_03_06_061323_create_produks_table', 2),
(8, '2021_03_06_061934_create_stocks_table', 2),
(9, '2021_03_06_073052_create_invoices_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(2, 'Xenia 8', 70000000, '2021-03-06 00:13:25', '2021-03-06 01:54:46'),
(4, 'Avanza', 90000000, '2021-03-06 01:52:33', '2021-03-06 01:54:33'),
(5, 'Kijang', 80000000, '2021-03-06 01:54:18', '2021-03-06 01:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masuk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `produk_id`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 90, 'masuk', '2021-03-06 00:13:25', '2021-03-06 00:13:25'),
(4, 2, 10, 'keluar', '2021-03-06 00:50:26', '2021-03-06 00:50:26'),
(5, 2, 5, 'keluar', '2021-03-06 01:31:33', '2021-03-06 01:31:33'),
(6, 2, 5, 'keluar', '2021-03-06 01:32:14', '2021-03-06 01:32:14'),
(7, 2, 5, 'keluar', '2021-03-06 01:32:31', '2021-03-06 01:32:31'),
(8, 2, 5, 'keluar', '2021-03-06 01:34:59', '2021-03-06 01:34:59'),
(9, 2, 5, 'keluar', '2021-03-06 01:36:06', '2021-03-06 01:36:06'),
(10, 2, 5, 'keluar', '2021-03-06 01:36:50', '2021-03-06 01:36:50'),
(11, 2, 5, 'keluar', '2021-03-06 01:37:16', '2021-03-06 01:37:16'),
(12, 2, 5, 'keluar', '2021-03-06 01:38:47', '2021-03-06 01:38:47'),
(13, 2, 5, 'keluar', '2021-03-06 01:39:28', '2021-03-06 01:39:28'),
(14, 2, 10, 'keluar', '2021-03-06 01:41:20', '2021-03-06 01:41:20'),
(15, 2, 15, 'keluar', '2021-03-06 01:48:00', '2021-03-06 01:48:00'),
(16, 2, 5, 'keluar', '2021-03-06 01:49:26', '2021-03-06 01:49:26'),
(18, 4, 100, 'masuk', '2021-03-06 01:52:33', '2021-03-06 01:52:33'),
(19, 5, 90, 'masuk', '2021-03-06 01:54:18', '2021-03-06 01:54:18'),
(20, 2, 10, 'keluar', '2021-03-06 02:18:34', '2021-03-06 02:18:34'),
(21, 2, 15, 'keluar', '2021-03-06 02:29:30', '2021-03-06 02:29:30'),
(22, 4, 10, 'keluar', '2021-03-06 02:29:44', '2021-03-06 02:29:44'),
(23, 2, 50, 'masuk', '2021-03-06 02:55:03', '2021-03-06 02:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$SWx8vKKau7wv6up9nrPXOOfv036uTEd1ymNuXSbQSTO9zMB8pc1zS', NULL, '2021-01-03 13:32:57', '2021-03-06 05:17:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

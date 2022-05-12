-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2022 at 01:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readylearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2022_03_08_100552_create_packages_table', 1),
(46, '2022_03_08_100828_create_transactions_table', 1),
(47, '2022_03_09_085339_create_admins_table', 1),
(48, '2022_03_09_101503_create_subjects_table', 1),
(49, '2022_03_09_101544_create_videos_table', 1),
(50, '2022_04_09_033151_create_users_verify_table', 2),
(51, '2022_04_10_065111_add_entity_trans', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`) VALUES
(1, 'Saintek', 'Fisika\r\nBiologi\r\nMatematika\r\nKimia', 50000),
(2, 'Soshum', 'Sejarah\r\nGeografi\r\nSosiologi\r\nEkonomi', 50000);

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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `package_id`, `name`) VALUES
(1, 1, 'Fisika'),
(2, 1, 'Kimia'),
(3, 1, 'Biologi'),
(4, 1, 'Matematika'),
(5, 2, 'Sejarah'),
(6, 2, 'Geografi'),
(7, 2, 'Ekonomi'),
(8, 2, 'Sosiologi');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gross_amount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `package_id`, `photo`, `status`, `created_at`, `updated_at`, `gross_amount`) VALUES
(8, 5, 1, 'photo/1648883847.png', '2', '2022-03-30 09:50:07', '2022-04-03 23:30:55', NULL),
(10, 7, 1, 'photo/1649056614.png', '2', '2022-04-04 00:16:45', '2022-04-04 00:17:11', NULL),
(12, 11, 1, 'photo/1649489245.png', '2', '2022-04-08 22:23:40', '2022-04-09 00:27:50', NULL),
(13, 11, 2, 'photo/1649490967.png', '2', '2022-04-09 00:56:02', '2022-04-09 01:20:01', NULL),
(14, 12, 1, 'photo/1649525141.png', '2', '2022-04-09 10:25:29', '2022-04-09 10:26:00', NULL),
(15, 6, 1, NULL, '0', '2022-04-10 00:45:52', '2022-04-10 00:45:52', 50000),
(16, 13, 1, NULL, '0', '2022-04-10 00:48:30', '2022-04-10 00:48:30', 50000),
(21, 3, 1, NULL, '0', '2022-04-10 01:38:41', '2022-04-10 01:38:41', 50000),
(22, 3, 2, NULL, '1', '2022-04-10 01:41:02', '2022-04-23 02:56:33', 50000),
(23, 7, 2, NULL, '0', '2022-04-12 18:13:01', '2022-04-12 18:13:01', 50000),
(24, 2, 1, NULL, '2', '2022-04-13 02:13:18', '2022-04-13 02:13:32', 50000),
(25, 2, 2, NULL, '2', '2022-04-13 02:14:47', '2022-04-13 02:14:54', 50000),
(26, 5, 2, NULL, '2', '2022-04-13 08:42:44', '2022-04-13 08:42:51', 50000),
(27, 4, 1, NULL, '2', '2022-04-15 02:06:56', '2022-04-15 10:08:59', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$SXD2qR2VHrnfUkj2dU/SBOdim8Wymzt3RJULiXPT.XxLdPVEl72OK', 1, '2022-03-12 00:41:15', '2022-03-12 00:41:15', 1),
(2, 'fahd', 'fahd@gmail.com', '$2y$10$it8CmjU4oV8itg6uSkLb4.kgmfORhIyVM4.sI0fcNYMdL5j/qC6HK', 0, '2022-03-12 01:03:55', '2022-03-12 01:03:55', 1),
(3, 'fafa', 'fafa@gmail.com', '$2y$10$qtHL7RrLwDZKsK8TEnRRhuK3sH9KeMIh8q8bU036Ac1dvHK4mWHym', 0, '2022-03-15 02:32:12', '2022-04-10 01:30:10', 1),
(4, 'arsa', 'arsa@gmail.com', '$2y$10$3zxm.t9d93/wdmiF8mpnc.eudfqY0w6FEsvWAZWSCEZNLUCof3wsa', 0, '2022-03-17 00:26:04', '2022-04-15 02:06:45', 1),
(5, 'akhmal', 'akhmal@gmail.com', '$2y$10$kOKfUNiMlOJ/ayjFgcqGwupdzFR4jS.aFwi6TFqZbmh4Yf2X91K52', 0, '2022-03-30 09:40:50', '2022-04-13 08:42:34', 1),
(6, 'x', 'x@mail', '$2y$10$I0XlJCxVgCsRbdUtUkKGkuzqVW5HET.F5o1bX2hA6gFhbpG4r/Pda', 0, '2022-04-01 23:44:21', '2022-04-10 00:45:29', 1),
(7, 'cenayang', 'cenayang@gmail.com', '$2y$10$Jz9SYAT2X.MNd4UelnGQ2OTtOGEy8/oUL.Y19V80uEGr3zhmfj2xy', 0, '2022-04-04 00:15:10', '2022-04-12 18:12:38', 1),
(10, 'fahd', 'fxhdmhmmd@gmail.com', '$2y$10$zKJvdvdXGxS3boqZiUbBeeUtRVX50CbE1Z.vP39p9plCGN21fcDDu', 0, '2022-04-08 21:14:26', '2022-04-08 21:14:41', 1),
(11, 'nana', 'nana@gmail.com', '$2y$10$Kmy7gMoxIRM0TSHsJtMzRO/vvvcMK4.3j65qg.d3R1xPN2pye3mPi', 0, '2022-04-08 21:15:08', '2022-04-09 00:27:05', 1),
(12, 'bastian w', 'Bastian@gmail.com', '$2y$10$XJcuQiwmhaIxVltBiDnDWu2rpYBKhF0pv4vZS79JDqAXDxl1Oy.py', 0, '2022-04-09 10:24:45', '2022-04-09 10:25:15', 1),
(13, 'viva', 'hahaha@gmail.com', '$2y$10$YD/XFYBBjvKcVaoNejqaqe2aavCR5QCumlFkG4SbPKUIzKeO4RpCC', 0, '2022-04-10 00:48:09', '2022-04-10 00:48:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(8, 'tOXlpfO3RtaNiCEDefkThvTiWjYXObcl1aCUd7UALRociQ8h5mCalLoGhH8W7id9', '2022-04-08 21:00:48', '2022-04-08 21:00:48'),
(9, 'AlSoaD75Wo9xVafP1V8pTokgwfeJBJsi9Qoxy4UROxRTW2hIcakKEzpkOCd8jen2', '2022-04-08 21:12:49', '2022-04-08 21:12:49'),
(10, 'aEBv9cDQXfrAYJkgNvQFauNclTtZTAr4SBcRdCXRNKReuC5PvDqkXFb1x7y5iJ0m', '2022-04-08 21:14:26', '2022-04-08 21:14:26'),
(11, 'E7Qspz6J7KORYIJHgpXliW4KwCdfbcZOSmz7OKvnnJLD3kamg6EwbmKImYWTUMoW', '2022-04-09 00:26:57', '2022-04-09 00:26:57'),
(12, 'kDv1ui2OWCDstbVzhnD2TKlR1caTErZ07WFvvvGpFPAQx5rLyzIO4a4hqPPO8xLT', '2022-04-09 10:24:45', '2022-04-09 10:24:45'),
(6, 'PB2EWDBmhMadXDlXLvBlw8Buiu5i5iwsCmMIfvBv7K1CNWRDyg0NpZdndGwGWP54', '2022-04-10 00:45:01', '2022-04-10 00:45:01'),
(13, 'MT6Ylfjqu4L6PyzBXJi0PLMNPcbeX9UyyHU6s61FNsV0fue8pVBTll0vDAJWPe60', '2022-04-10 00:48:09', '2022-04-10 00:48:09'),
(3, 'tND8E54ygZTIR7KZGjIrVtIO755nZ8eE22yMjzy3qNxhM6jAvE14V3YKoAYrrzLZ', '2022-04-10 01:29:45', '2022-04-10 01:29:45'),
(7, 'UZUWfzolTJGBGhhgLVpswVrtbo0UHngqpSG86PtXW75FV4e2aJtojvLh7dCB1ErI', '2022-04-12 18:12:30', '2022-04-12 18:12:30'),
(5, 'EeqfiSKmZOMRAepYLlum4Hk7XYJkF8kf8IN9JP701Im8aIPb81puWKoeqCSMul4k', '2022-04-13 08:42:27', '2022-04-13 08:42:27'),
(4, '1LdGx4qyLhGBqdIIsQl7cZ3Qh2kVcwkv4ZIuHGgoCKuhG1oIwaDuzZyY6vpCROHv', '2022-04-15 02:05:39', '2022-04-15 02:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `subject_id`, `name`, `description`, `video`, `created_at`, `updated_at`) VALUES
(5, 2, 'Redoks', 'Reduksi dan Oksidasi', 'https://www.youtube.com/embed/1-QQ19vXUkI', '2022-03-15 03:04:18', '2022-03-15 03:04:18'),
(6, 1, 'Parabola', 'Parabola', 'https://www.youtube.com/embed/Tz-F9FhdWw0', '2022-03-21 08:25:19', '2022-03-21 08:25:19'),
(7, 4, 'Polinomial Part 1', 'Suku banyak', 'https://www.youtube.com/embed/_niucJN1c7o', '2022-04-04 00:19:14', '2022-04-04 00:19:14'),
(8, 1, 'Paralayang', 'hahahaha', 'https://www.youtube.com/embed/3lWSaraEqMA', '2022-04-05 06:17:05', '2022-04-05 06:17:05'),
(9, 1, 'mantep', 'test', 'https://www.youtube.com/embed/4H30-8734rY', '2022-04-05 06:32:03', '2022-04-05 06:32:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_package_id_foreign` (`package_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_package_id_foreign` (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

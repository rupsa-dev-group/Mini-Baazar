-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 08:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'india', '1720763303.png', '1', '2024-07-12 00:18:23', '2024-07-12 00:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `dis_type` varchar(255) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `cont_date` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `manageaddres`
--

CREATE TABLE `manageaddres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manageaddres`
--

INSERT INTO `manageaddres` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `country_id`, `state_id`, `city`, `postcode`, `created_at`, `updated_at`) VALUES
(1, '2', 'User', 'user@gmail.com', '09547875962', 'je\'ljtdrklk tkjtlkejtljtlktkjretlkjltjreltjeljtjtlekljt jtkljrtljlrtlkj', '1', '1', '8539583958', 'retet345', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `brand`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABC', '1721127190.png', '1', '2024-07-16 05:23:10', '2024-07-16 05:23:10'),
(2, 'DFB', '1721127201.png', '1', '2024-07-16 05:23:21', '2024-07-16 05:23:21'),
(3, 'FCG', '1721127211.jpg', '1', '2024-07-16 05:23:31', '2024-07-16 05:23:31'),
(4, 'ERF', '1721127221.png', '1', '2024-07-16 05:23:41', '2024-07-16 05:23:41'),
(5, 'FGVD', '1721127231.png', '1', '2024-07-16 05:23:51', '2024-07-16 05:23:51'),
(6, 'VDD', '1721127266.png', '1', '2024-07-16 05:24:26', '2024-07-16 05:24:26'),
(7, 'SDAD', '1721127318.png', '1', '2024-07-16 05:25:18', '2024-07-16 05:25:18'),
(8, 'DGV', '1721127334.png', '1', '2024-07-16 05:25:34', '2024-07-16 05:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `mcategories`
--

CREATE TABLE `mcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcategories`
--

INSERT INTO `mcategories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Women\'sClothing', 'Women\'s_Clothing', '1721126622.jpg', '1', '2024-07-15 00:05:13', '2024-07-16 05:13:42'),
(2, 'Men\'s Clothing', 'Men\'s_Clothing', '1721126577.jpg', '1', '2024-07-15 00:06:08', '2024-07-16 05:12:57'),
(3, 'PHP', 'php_123', '1721126555.jpg', '1', '2024-07-15 00:07:18', '2024-07-16 05:12:35'),
(4, 'Java', 'java', '1721126566.jpg', '1', '2024-07-15 00:07:38', '2024-07-16 05:12:46'),
(5, 'SDFD', 'sfsdf', '1721126591.jpg', '1', '2024-07-16 05:13:11', '2024-07-16 05:13:11'),
(6, 'VDF', 'sdgdg', '1721126636.jpg', '1', '2024-07-16 05:13:56', '2024-07-16 05:13:56'),
(7, 'HGTDH', 'sfdsf', '1721126673.jpg', '1', '2024-07-16 05:14:33', '2024-07-16 05:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2024_07_11_074550_create_manageaddres_table', 2),
(25, '2024_06_18_082429_create_shippingcharges_table', 3),
(26, '0001_01_01_000000_create_users_table', 4),
(27, '0001_01_01_000001_create_cache_table', 4),
(28, '0001_01_01_000002_create_jobs_table', 4),
(29, '2024_06_10_062731_create_mcategories_table', 4),
(30, '2024_06_10_082632_create_scategories_table', 4),
(31, '2024_06_12_085030_create_sscategories_table', 4),
(32, '2024_06_13_070817_create_productoptions_table', 4),
(33, '2024_06_13_100556_create_coupons_table', 4),
(34, '2024_06_14_081314_create_manufacturers_table', 4),
(35, '2024_06_18_052616_create_countries_table', 4),
(36, '2024_06_18_061022_create_states_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productoptions`
--

CREATE TABLE `productoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scategories`
--

CREATE TABLE `scategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mcategory_id` bigint(20) UNSIGNED NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scategories`
--

INSERT INTO `scategories` (`id`, `mcategory_id`, `s_name`, `s_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abc', 'abc', '1', '2024-07-15 00:08:09', '2024-07-15 00:08:09'),
(2, 1, 'BCD', 'bcd', '1', '2024-07-15 00:08:37', '2024-07-15 00:08:37'),
(3, 2, 'Fdgdg', 'dgdg', '1', '2024-07-15 00:08:55', '2024-07-15 00:08:55'),
(4, 2, 'Hueu', 'fdfd', '1', '2024-07-15 00:09:09', '2024-07-15 00:09:09'),
(5, 3, 'fdf', 'dfd', '1', '2024-07-15 00:09:25', '2024-07-15 00:09:25'),
(6, 3, 'dfderecd', 'fdfr32', '1', '2024-07-15 00:09:35', '2024-07-15 00:09:35'),
(7, 4, 'rfdff', 'dfdf', '1', '2024-07-15 00:09:50', '2024-07-15 00:09:50'),
(8, 4, 'dfdfer3r3', 'fdfdf4r3', '1', '2024-07-15 00:10:02', '2024-07-15 00:10:02'),
(9, 1, 'BGDJD', 'szfasfa', '1', '2024-07-15 05:46:53', '2024-07-15 05:46:53'),
(10, 3, 'ABCDEF', 'fdsfdfdfs', '1', '2024-07-15 05:58:05', '2024-07-15 05:58:05'),
(11, 1, 'fsfsdfds', 'fdsfdsf', '1', '2024-07-15 06:05:06', '2024-07-15 06:05:06'),
(12, 1, 'fdsfdsfsdf', 'fdsfdsf', '1', '2024-07-15 06:05:13', '2024-07-15 06:05:13'),
(13, 1, 'fsfsdf', 'fdsfdsf', '1', '2024-07-15 06:05:19', '2024-07-15 06:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nKHzFnMiBl8NTqL9hN7NwlFrUwEnrlQsZ3o1EgZm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVXdUWWJoeVk4d3VlQ2FoNmJHb0pUSzl5VElmb3hDR1RrMDZXZGxwaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1721214513);

-- --------------------------------------------------------

--
-- Table structure for table `shippingcharges`
--

CREATE TABLE `shippingcharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sscategories`
--

CREATE TABLE `sscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mcategory_id` bigint(20) UNSIGNED NOT NULL,
  `scategory_id` bigint(20) UNSIGNED NOT NULL,
  `ss_name` varchar(255) NOT NULL,
  `ss_slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sscategories`
--

INSERT INTO `sscategories` (`id`, `mcategory_id`, `scategory_id`, `ss_name`, `ss_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dffdf', 'dfdff', '1', '2024-07-15 00:10:17', '2024-07-15 00:10:17'),
(2, 1, 2, 'efdfdf', 'fdfdf', '1', '2024-07-15 00:10:28', '2024-07-15 00:10:28'),
(3, 1, 1, 'dffdf', 'fdfdfe3', '1', '2024-07-15 00:10:40', '2024-07-15 00:10:40'),
(4, 2, 3, 'rererer', 'rerer', '1', '2024-07-15 00:10:56', '2024-07-15 00:10:56'),
(5, 2, 3, 'erererff', 'dfdfdf', '1', '2024-07-15 00:11:06', '2024-07-15 00:11:06'),
(6, 1, 9, 'hfdhdfgh', 'fghdfghd', '1', '2024-07-15 05:49:26', '2024-07-15 05:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_name`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'WB', '1720763768.png', '60', '1', '2024-07-12 00:26:08', '2024-07-12 00:26:08'),
(2, 1, 'UP', '1720763800.png', '110', '1', '2024-07-12 00:26:40', '2024-07-12 00:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone_otp` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `phone_otp`, `image`, `email_verified_at`, `password`, `address`, `country_id`, `state_id`, `city`, `postcode`, `pan`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Soumen Sarkar', 'admin@gmail.com', '9547875966', NULL, NULL, NULL, '$2y$12$GdOBvuBdZ54OLmbp6Q4XoOosfSns8avTMI9X/cRPz7sBHSwC0xpTS', 'Sree Gaudiya Bhajan Ashram\r\nMuktapukur,Beltala(Sporting Clube)Talpukur', '1', '1', 'Barrackpur', '700123', NULL, 'Admin', NULL, '2024-07-12 00:17:19', '2024-07-12 00:17:19'),
(2, 'ishika Das', 'ishika@gmail.com', '9932117958', NULL, NULL, NULL, '$2y$12$as33.vvHD1L2wDayaiHTLO99ciGr6GKpa7dWEujKu879tVSJ2yD.W', NULL, NULL, NULL, NULL, NULL, NULL, 'Customer', NULL, '2024-07-14 02:00:23', '2024-07-14 02:00:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manageaddres`
--
ALTER TABLE `manageaddres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manageaddres_email_unique` (`email`),
  ADD UNIQUE KEY `manageaddres_phone_unique` (`phone`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcategories`
--
ALTER TABLE `mcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `productoptions`
--
ALTER TABLE `productoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scategories`
--
ALTER TABLE `scategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scategories_mcategory_id_foreign` (`mcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippingcharges`
--
ALTER TABLE `shippingcharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sscategories`
--
ALTER TABLE `sscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sscategories_mcategory_id_foreign` (`mcategory_id`),
  ADD KEY `sscategories_scategory_id_foreign` (`scategory_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manageaddres`
--
ALTER TABLE `manageaddres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mcategories`
--
ALTER TABLE `mcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `productoptions`
--
ALTER TABLE `productoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shippingcharges`
--
ALTER TABLE `shippingcharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sscategories`
--
ALTER TABLE `sscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scategories`
--
ALTER TABLE `scategories`
  ADD CONSTRAINT `scategories_mcategory_id_foreign` FOREIGN KEY (`mcategory_id`) REFERENCES `mcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sscategories`
--
ALTER TABLE `sscategories`
  ADD CONSTRAINT `sscategories_mcategory_id_foreign` FOREIGN KEY (`mcategory_id`) REFERENCES `mcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sscategories_scategory_id_foreign` FOREIGN KEY (`scategory_id`) REFERENCES `scategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

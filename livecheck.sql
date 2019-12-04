-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 12:39 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livecheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bike', '2019-12-02 18:00:00', NULL),
(2, 'Cosmetic', '2019-12-02 18:00:00', NULL),
(3, 'Medicine', '2019-12-02 18:00:00', NULL),
(4, 'Home Appliance', '2019-12-02 18:00:00', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_03_062413_create_categories', 1),
(4, '2019_12_03_063526_create_products', 2),
(5, '2019_12_03_103952_create_productdetails', 3),
(6, '2019_12_03_105031_add_code_to_productdetails', 4),
(7, '2019_12_03_105548_add_code_to_productdetails', 5);

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
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `warrenty_started` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warrenty_ends` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `product_id`, `warrenty_started`, `warrenty_ends`, `created_at`, `updated_at`, `code`) VALUES
(1, 12, '03/12/2019', '03/12/2020', '2019-12-03 06:47:17', '2019-12-03 06:47:17', 'ErtySfc'),
(2, 12, '03/12/2019', '03/12/2020', '2019-12-03 06:47:41', '2019-12-03 06:47:41', 'ErtySfv'),
(4, 2, '03/12/2019', '03/12/2022', '2019-12-03 08:20:06', '2019-12-03 08:20:06', 'absjdks'),
(5, 5, '03/12/2019', '18/01/2020', '2019-12-03 13:31:54', '2019-12-03 13:31:54', 'Rtsuyns'),
(6, 8, '03/12/2019', '03/12/2021', '2019-12-03 13:33:06', '2019-12-03 13:33:06', 'uyshsbd'),
(7, 6, '03/12/2019', '18/01/2020', '2019-12-03 15:12:35', '2019-12-03 15:12:35', 'bshdkdf'),
(8, 5, '03/12/2019', '18/01/2020', '2019-12-03 15:13:26', '2019-12-03 15:13:26', 'ABracaD'),
(9, 10, '03/12/2019', '03/12/2020', '2019-12-03 16:25:14', '2019-12-03 16:25:14', 'EERtsdf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `warrenty` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `warrenty`, `created_at`, `updated_at`) VALUES
(1, 'Honda CB150R', 1, 36.00, '2019-12-02 18:00:00', NULL),
(2, 'Bajaj Discover', 1, 36.00, '2019-12-02 18:00:00', NULL),
(3, 'Suzuki Gixxer', 1, 36.00, '2019-12-02 18:00:00', NULL),
(4, 'Iconic Eye Shadow', 2, 1.50, '2019-12-02 18:00:00', NULL),
(5, 'Lakme Matt Lipstick', 2, 1.50, NULL, NULL),
(6, 'Maybelline Highlighter', 2, 1.50, '2019-12-02 18:00:00', NULL),
(7, 'Rolac 20mg', 3, 24.00, '2019-12-02 18:00:00', NULL),
(8, 'Maxpro 20mg', 3, 24.00, '2019-12-02 18:00:00', NULL),
(9, 'Amoclav 1g', 3, 24.00, '2019-12-02 18:00:00', NULL),
(10, 'Miako Convection Oven', 4, 12.00, '2019-12-02 18:00:00', NULL),
(11, 'General Air Conditioner', 4, 12.00, '2019-12-02 18:00:00', NULL),
(12, 'Vision 32° LED TV', 4, 12.00, '2019-12-02 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productdetails_code_unique` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

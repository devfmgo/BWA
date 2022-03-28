-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2022 at 03:58 PM
-- Server version: 8.0.25
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwa-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `products_id` int NOT NULL,
  `users_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gadgets', 'assets/category/CWoK8A7DOpsWNbPXipYInLoUTeWBy9iAWaob4ekj.svg', 'gadgets', NULL, '2022-02-25 02:53:25', '2022-02-25 02:53:25'),
(2, 'Furniture', 'assets/category/h7VEWMpdxMIkR58sthDiV9TuWlBA96cgoZ7xXfbT.svg', 'furniture', NULL, '2022-02-25 02:53:40', '2022-02-25 02:53:40'),
(3, 'Makeup', 'assets/category/87o0AIVgUQFDN14SX42dX7nNmRlY4QjkdDrRI4LN.svg', 'makeup', NULL, '2022-02-25 02:53:59', '2022-02-25 02:53:59'),
(4, 'Sneakers', 'assets/category/HE0aTm2Rt12K3aQTA1jveSwQ9rlwNfjEVkvsyVPQ.svg', 'sneakers', NULL, '2022-02-25 02:54:15', '2022-02-25 02:54:15'),
(5, 'Tools', 'assets/category/W6bIrR44uaJwPUD1CfjwwgOfB3rwaImeG2teo9HV.svg', 'tools', NULL, '2022-02-25 02:54:29', '2022-02-25 02:54:29'),
(6, 'Baby', 'assets/category/xG4PqwVqlmfc9wEaEpq1lQ5HsD4XcLSbFK7ds64u.svg', 'baby', NULL, '2022-02-25 02:54:43', '2022-02-25 02:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_24_014204_create_categories_table', 1),
(6, '2022_01_24_014648_create_products_table', 1),
(7, '2022_01_24_015025_create_product_galleries_table', 1),
(8, '2022_01_24_015343_create_carts_table', 1),
(9, '2022_02_03_023520_create_transactions_table', 1),
(10, '2022_02_03_023547_create_transaction_details_table', 1),
(11, '2022_02_03_025537_delete_resi_field_at_transactions_table', 1),
(12, '2022_02_03_030810_add_resi_and_shipping_status_to_transaction_details_table', 1),
(13, '2022_02_03_034006_add_code_to_transactions_table', 2),
(14, '2022_02_03_034238_add_code_to_transaction_details_table', 2),
(15, '2022_02_03_034705_add_slug_to_products_table', 3),
(16, '2022_02_03_035214_add_roles_to_users_table', 4),
(17, '2022_02_17_010825_change_nullable_field_at_users_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int NOT NULL,
  `categories_id` int NOT NULL,
  `price` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `users_id`, `categories_id`, `price`, `description`, `deleted_at`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Nike Air 20221', 5, 1, 500000, '<p>Nike Air 2022, Sneaker Keluaran Terbaru Nike Broo</p>', '2022-02-20 21:00:52', '2022-02-20 19:40:27', '2022-02-20 21:00:52', 'nike-air-20221'),
(2, 'Nike Air 2022', 5, 1, 120000, '<p>Waw</p>', '2022-02-24 23:42:01', '2022-02-20 21:01:14', '2022-02-24 23:42:01', 'nike-air-2022'),
(3, 'Nike Air 2022', 5, 1, 120000, '<p>test</p>', NULL, '2022-02-24 23:52:25', '2022-02-24 23:52:25', 'nike-air-2022'),
(4, 'Apple Watch 4', 5, 1, 2000000, '<p>lorem</p>', NULL, '2022-02-28 19:10:51', '2022-02-28 19:10:51', 'apple-watch-4'),
(5, 'Orange Bogotta', 5, 4, 150000, '<p>-</p>', NULL, '2022-02-28 19:11:21', '2022-02-28 19:11:21', 'orange-bogotta'),
(6, 'Sofa Addliz', 5, 2, 3000000, '<p>-</p>', NULL, '2022-02-28 19:11:43', '2022-02-28 19:11:43', 'sofa-addliz'),
(7, 'Bubuk Maketi', 5, 3, 100000, '<p>-</p>', NULL, '2022-02-28 19:12:09', '2022-02-28 19:12:09', 'bubuk-maketi'),
(8, 'Mavic Drone', 5, 1, 4500000, '<p>-</p>', NULL, '2022-02-28 19:12:51', '2022-02-28 19:12:51', 'mavic-drone'),
(9, 'Black Edition Nike', 5, 4, 150000, '<p>-</p>', NULL, '2022-02-28 19:16:21', '2022-02-28 19:16:21', 'black-edition-nike'),
(10, 'Monkey Toys', 5, 6, 100000, '<p>-</p>', NULL, '2022-02-28 19:16:44', '2022-02-28 19:16:44', 'monkey-toys');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `photos`, `products_id`, `created_at`, `updated_at`) VALUES
(4, 'assets/product/RxWkqSVVbu8xqQf5XMaSQVRMHgJ7vUhouoVdNjqr.png', 3, '2022-02-25 00:02:07', '2022-02-25 00:02:07'),
(5, 'assets/product/ziLXZEnqESaIyUAlKcElg5RuVgTXZpoWrIHXxnzW.jpg', 4, '2022-02-28 19:13:59', '2022-02-28 19:13:59'),
(6, 'assets/product/MyfyoMdj5VZI1ftnLNo2W6UwEYeQln5C6p696UbD.jpg', 5, '2022-02-28 19:14:18', '2022-02-28 19:14:18'),
(7, 'assets/product/BREWRVesctVjkwYan1KPYhmtXtpaXkOmI3yHEdlS.jpg', 6, '2022-02-28 19:14:36', '2022-02-28 19:14:36'),
(8, 'assets/product/WgXq66PvJtw00zmXxHJJmjEEu7prmaD0BqnmMr9d.jpg', 7, '2022-02-28 19:14:50', '2022-02-28 19:14:50'),
(9, 'assets/product/hhGvQc4inlXZ1nfKpzSipE6xKUNTPKGhn2z05xnN.jpg', 8, '2022-02-28 19:15:04', '2022-02-28 19:15:04'),
(10, 'assets/product/zAFJvSCUOjRYPAIBdUejCOswjue5mEAMvkntrU4u.jpg', 9, '2022-02-28 19:17:10', '2022-02-28 19:17:10'),
(11, 'assets/product/5opooLyroABtgNnw8kXw9fSPcR5WDZY05jkenqpG.jpg', 10, '2022-02-28 19:17:23', '2022-02-28 19:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` int NOT NULL,
  `insurance_price` int NOT NULL,
  `total_price` int NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `transactions_id` int NOT NULL,
  `products_id` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address_one` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_two` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `provinces_id` int DEFAULT NULL,
  `regencies_id` int DEFAULT NULL,
  `zip_code` int DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int DEFAULT NULL,
  `store_status` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `deleted_at`, `address_one`, `address_two`, `provinces_id`, `regencies_id`, `zip_code`, `country`, `phone_number`, `store_name`, `categories_id`, `store_status`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(5, 'Muhamad Fikri', 'fikri@nurulfikri.sch.id', NULL, '$2y$10$Wfj8cEpXzImZrWRYrH1Oa./4dnnXmRMbWgzcBTb78j5FCHxnV3icO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-20 19:37:18', '2022-02-20 19:37:18', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 01:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/3bdd0b66-13e0-468b-a66c-cc0ea3766c2510636070_684918051599510_5462355415825174467_n.jpg', 0, '2023-03-29 10:01:58', '2023-03-29 10:01:59', NULL),
(2, 'images/303f7d83-e6af-4995-a959-ece11b7a6b6a15c6ea74-2ada-48a9-bc7b-e973b047f611person1.jpeg', 0, '2023-03-29 10:04:25', '2023-03-29 10:04:26', NULL),
(3, 'images/88466579-7a42-4c27-bb04-b3ada9a32580a648b48a-c498-41b3-9981-3b64da60d1e9image1.png', 0, '2023-03-29 10:15:51', '2023-03-29 10:15:51', NULL),
(4, 'images/43174971-463e-4fd1-b6a8-1094381c5090news-700x435-1.jpg', 0, '2023-03-29 10:19:09', '2023-03-29 10:19:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `title`, `content`) VALUES
(1, 1, 'ar', 'الاقتصاد', 'القسم الاول عبارة عن مواضيع اقتصادية'),
(2, 1, 'en', 'Economy', 'Economy Section'),
(3, 1, 'fr', 'Economy', 'Economy Section'),
(4, 2, 'ar', 'العلوم', 'القسم الثاني يتحدث عن العلوم بانواعها'),
(5, 2, 'en', 'science', 'science section'),
(6, 2, 'fr', 'science', 'science section'),
(7, 3, 'ar', 'الرياضة و الصحة', 'الرياضة و الصحة'),
(8, 3, 'en', 'Sports', 'Sport Content'),
(9, 3, 'fr', 'Sport', 'Sports Content'),
(10, 4, 'ar', 'التعليم', 'التعليم'),
(11, 4, 'en', 'Education', 'Education'),
(12, 4, 'fr', 'Education', 'Education');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_21_204339_create_settings_table', 1),
(6, '2023_01_21_205611_create_setting_translations_table', 1),
(7, '2023_01_21_210025_create_categories_table', 1),
(8, '2023_01_21_210654_create_category_translations_table', 1),
(9, '2023_01_21_210911_create_posts_table', 1),
(10, '2023_01_21_210925_create_post_translations_table', 1),
(11, '2023_02_25_200653_add_tags_to_post_translations_table', 1),
(12, '2023_02_28_171111_add_user_id_to_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'images/fa989296-1a4a-4a1b-9162-3969a5855d2fbuilding_03.jpg', 1, '2023-03-29 10:08:57', '2023-03-29 10:08:57', NULL, 1),
(2, 'images/2233a4c2-55b1-4e83-b392-d10bae18f51fportfolio-img1.jpg', 2, '2023-03-29 10:11:34', '2023-03-29 10:11:35', NULL, 1),
(3, 'images/cf9c66cc-bee0-48ad-8447-3519dba02889a648b48a-c498-41b3-9981-3b64da60d1e9image1.png', 3, '2023-03-29 10:17:30', '2023-03-29 10:17:31', NULL, 1),
(4, 'images/37ac1b78-1dc6-4428-95c7-1f906e9d25dfblog-3.jpg', 4, '2023-03-29 10:20:16', '2023-03-29 10:23:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `smallDesc` text DEFAULT NULL,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`, `smallDesc`, `tags`) VALUES
(1, 1, 'ar', 'البناء و التشيد', '<p>البناء و التشيد</p>', '<p>البناء و التشيد</p>', 'البناء و التشيد'),
(2, 1, 'en', 'Building And Constructiong', '<p>Building And Constructiong</p>', '<p>Building And Constructiong</p>', 'Building And Constructiong'),
(3, 1, 'fr', 'Building And Constructiong', '<p>Building And Constructiong</p>', '<p>Building And Constructiong</p>', 'Building And Constructiong'),
(4, 2, 'ar', 'التطور التكنولوجي', '<p>محتوي المقال الثاني عن التطور التكنولوجي حيث الحاسوب</p>', '<p>محتوي المقال الثاني عن التطور التكنولوجي حيث الحاسوب</p>', 'التطور التكنولوجي'),
(5, 2, 'en', 'Technology', '<p>Technology</p>', '<p>Technology</p>', 'Technology'),
(6, 2, 'fr', 'Technology', '<p>Technology</p>', '<p>Technology</p>', 'Technology'),
(7, 3, 'ar', 'الاخبار الرياضية', '<p>الاخبار الرياضية</p>', '<p>الاخبار الرياضية</p>', 'الاخبار الرياضية'),
(8, 3, 'en', 'Sports News', '<p>Sports News</p>', '<p>Sports News</p>', 'Sports News'),
(9, 3, 'fr', 'Sports News', '<p>Sports News</p>', '<p>Sports News</p>', 'Sports News'),
(10, 4, 'ar', 'التعليم عن بعد', '<p>التعليم عن بعد</p>', '<p>التعليم عن بعد</p>', 'التعليم عن بعد'),
(11, 4, 'en', 'Remote Learning', '<p>Remote Learning</p>', '<p>Remote Learning</p>', 'Remote Learning'),
(12, 4, 'fr', 'Remote Learning', '<p>Remote Learning</p>', '<p>Remote Learning</p>', 'Remote Learning');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `facebook`, `instagram`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/798c1e41-cbb7-41ac-a805-2a4e937512669c9ae4be-1876-4d28-82a4-48ca81890230course-01.jpg', 'images/12f83271-6042-4b01-be46-bc8f111a7e2097831606-2b61-47ba-a1b0-5399c7dc97aacourse-01.jpg', 'mahmoud.tokhey.facebook', 'mahmoud.tokhey.instagram', '0123123123', 'mahmoudtokhey@gmail.com', '2023-03-29 09:55:06', '2023-03-29 10:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `title`, `content`, `address`) VALUES
(1, 1, 'ar', 'المدونة', 'المدونة', NULL),
(2, 1, 'en', 'Blog', 'Blog', NULL),
(3, 1, 'fr', 'Blog', 'Blog', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('writer','admin') DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mahmoud Eltokhey', 'mahmoudtokhey@gmail.com', NULL, '$2y$10$APUaDJjWmcvTxWBf8RPGUOoU2OXz27sZG0nmjkTKbnSdBTtCDf3Ve', 'admin', 'YaIiItW085WIjneuPVkpNBLk4XyZMYjzz34bAAWhXNQh5N2YWnn1kcoBfpnz', NULL, '2023-03-29 09:56:29', '2023-03-29 09:56:29'),
(2, 'sayed', 'sayed@gmail.com', NULL, '$2y$10$nnngDgpSRXT0iVxMyo7rg.9hJ0RPbcZQ2ZE9lZrrXlNbsbjuobZru', 'writer', NULL, NULL, '2023-03-29 10:34:19', '2023-03-29 10:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  ADD KEY `setting_translations_locale_index` (`locale`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

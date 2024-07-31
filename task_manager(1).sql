-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 09:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_06_26_085903_create_tasks_table', 1),
(11, '2024_07_03_052705_update_status_default_in_tasks_table', 2),
(12, '2024_07_03_082134_add_status_to_tasks', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('aliahmvd420@gmail.com', '$2y$12$k20vAyAwkugW5gM.Weg8PeVxW67h7LmYoOkP0F/AIiP4MmjJbpDJW', '2024-06-30 08:47:46'),
('alimvd@gmail.com', '$2y$12$21YqHkp9lofjkSq5evi2O.W/WaHkNzMEDprGZMe5boIeD0j1MXilm', '2024-06-30 01:46:58'),
('thuraiya@gmail.com', '$2y$12$JNiF5YCNlMVy9/h5CvrcmOGnsoIrtR8ZxqnVHtryyg/1kwn.HPF0S', '2024-06-30 01:11:03'),
('thurayashakir1@gmail.com', '$2y$12$QWO4vxdDEhn7M.UVkvqM0eksYcX21ImYoPcPYWdRhs4SKEnleozQ6', '2024-06-30 08:51:21');

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
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `due_date`, `created_at`, `updated_at`, `status`) VALUES
(10, 2, 'sleep', '2024-07-24', '2024-07-03 04:29:22', '2024-07-31 01:18:15', 0),
(11, 2, 'eatt', NULL, '2024-07-03 04:33:08', '2024-07-29 16:31:08', 1),
(12, 2, 'movies', NULL, '2024-07-03 04:34:22', '2024-07-16 01:08:40', 0),
(14, 2, 'thurspd', NULL, '2024-07-03 07:59:01', '2024-07-16 01:17:29', 0),
(15, 2, 'cleaning', NULL, '2024-07-03 07:59:07', '2024-07-16 01:16:37', 0),
(16, 2, 'shopping', NULL, '2024-07-03 08:06:27', '2024-07-09 01:39:34', 0),
(17, 2, 'sleep', NULL, '2024-07-04 01:07:31', '2024-07-09 01:44:37', 0),
(19, 2, 'study', NULL, '2024-07-04 01:29:10', '2024-07-16 01:14:47', 0),
(25, 2, 'sleep', NULL, '2024-07-04 04:12:47', '2024-07-09 01:50:37', 1),
(26, 1, 'ytgtyt', NULL, '2024-07-04 06:39:32', '2024-07-04 06:39:32', 1),
(27, 2, 'ththg', NULL, '2024-07-08 00:58:50', '2024-07-08 00:58:50', 1),
(28, 2, 'eat', NULL, '2024-07-08 00:58:56', '2024-07-08 00:58:56', 1),
(29, 2, 'ggg', NULL, '2024-07-08 03:18:42', '2024-07-08 03:18:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `gender`, `position`, `created_at`, `updated_at`) VALUES
(1, 'thuraiya', 'thuraiya@gmail.com', NULL, '$2y$12$U3Nut45Vc1hmLhzh/klXeu.mT3wo38rGNlqb9ZM8UkfXahHNrY7c.', NULL, 'female', 'student', '2024-06-26 05:43:13', '2024-06-26 05:43:13'),
(2, 'Thuraiya Shakir', 'thurayashakir1@gmail.com', NULL, '$2y$12$ER9U6PS4MGymr8dsmOfLvuOp7KQkJA0km7K0H9Ltn9SzPlfmsfApa', 'DzbEcQGn8QyW9QqPOgXV48fVr9seKHSpfBu6FalQv6zZ0tBTgEVNrBUgrdgs', 'female', 'student', '2024-06-30 01:29:25', '2024-06-30 02:03:44'),
(3, 'Ali', 'alimvd@gmail.com', NULL, '$2y$12$mkwQccgMe8H.JLF9igeYAeUnT95/QKmX.S01/KLISFaYUaOlzBchW', NULL, 'male', 'student', '2024-06-30 01:46:16', '2024-06-30 01:46:16'),
(4, 'ALii', 'aliahmvd420@gmail.com', NULL, '$2y$12$jKbp4Zu6Z5AfEfwaaY70V.dMSWkJzhx3QxoTXZqK3Gm1XAHy2Sw36', NULL, 'male', 'employee', '2024-06-30 08:45:43', '2024-06-30 08:45:43'),
(5, 'Alii', 'aligheilani@gmail.com', NULL, '$2y$12$odGw2ipTHFSRQcJftGP58euCBXlVeigXMnPoZdIt3QusH/rYCWopC', NULL, 'male', 'employee', '2024-07-15 01:23:58', '2024-07-15 01:23:58');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

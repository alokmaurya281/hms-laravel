-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 02:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_time` varchar(100) DEFAULT NULL,
  `appointment_date` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `razorpay_payment_id` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `appointment_time`, `appointment_date`, `user_id`, `razorpay_payment_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(17, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:30:28', '2023-01-20 15:30:28'),
(18, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:33:31', '2023-01-20 15:33:31'),
(19, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:34:04', '2023-01-20 15:34:04'),
(20, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:36:29', '2023-01-20 15:36:29'),
(21, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:37:08', '2023-01-20 15:37:08'),
(22, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:37:48', '2023-01-20 15:37:48'),
(23, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:43:15', '2023-01-20 15:43:15'),
(24, 11, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 15:45:22', '2023-01-20 15:45:22'),
(25, 11, '10:00 AM to 1:00 PM', NULL, 5, 'pay_L6UNCGZggNtvHX', '1', 'Confirmed', '2023-01-20 15:51:18', '2023-01-20 15:51:18'),
(26, 10, '10:00 AM to 1:00 PM', NULL, 5, NULL, NULL, 'Pending', '2023-01-20 16:09:33', '2023-01-20 16:09:33'),
(27, 10, '10:00 AM to 1:00 PM', NULL, 5, 'pay_L6UcbABdyshFZ8', '1', 'Confirmed', '2023-01-20 16:10:10', '2023-01-20 16:10:10'),
(28, 12, '10:00 AM to 1:00 PM', NULL, 8, NULL, NULL, 'Pending', '2023-01-23 13:07:48', '2023-01-23 13:07:48'),
(29, 12, '10:00 AM to 1:00 PM', NULL, 8, NULL, NULL, 'Pending', '2023-01-23 13:21:29', '2023-01-23 13:21:29'),
(30, 12, '10:00 AM to 1:00 PM', NULL, 8, 'pay_L7drwvNGefz2PZ', '1', 'Confirmed', '2023-01-23 13:52:12', '2023-01-23 13:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Alok Maurya', 'snmaurya10275@gmail.com', 'I want to use this site', 'ghfgffgh', '7071994439', '2023-01-19 14:35:21', '2023-01-19 14:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `date`, `created_at`) VALUES
(1, 'Teeath', '20/10/2022', '2023-01-18 12:58:42'),
(3, 'Surgery', '18/01/2023', '2023-01-23 13:05:08'),
(4, 'Chest', '22/01/2023', '2023-01-23 13:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `pincode` varchar(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `govt_id_type` varchar(100) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `profile_image` varchar(1000) NOT NULL,
  `professional_image` varchar(1000) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `mobile`, `gender`, `address`, `city`, `pincode`, `department`, `govt_id_type`, `id_number`, `profile_image`, `professional_image`, `password`, `created_at`, `updated_at`) VALUES
(11, 'Alok Maurya', 'snmaurya10275@gmail.co', '07071994439', 'F', 'alokmaurya', 'Fatehpur', '212601', 'Teeath', 'pancard', '11111111111', 'files/doctors_images/OMnOmH4pU32Bp4iktrTGP3Vo9dWwlt8dtssegH39.jpg', 'files/doctors_images/DpUkOISWeFPWC1xtM9nfoBFl3UwqLqa5jnWDpqwc.jpg', '$2y$10$K.f1J1C58xhljzci0vVvxuXsx5kNdU8P6rIDarvL.2/J4r6Kta8ga', '2023-01-18 17:24:20', '2023-01-18 17:24:20'),
(12, 'Surendra nath', 'alok1@gmail.com', '99999999888', 'M', 'Vidhayak Road Jayram Nagar Fatehpur', 'Fatehpur', '212601', 'Surgery', 'aadhar', '585475695248', 'files/doctors_images/I98VmSsP15OEYaT0Np2NRVUpjP57ugNwQ6NIznbx.jpg', 'files/doctors_images/xnjB3O8LhqtrLlkbcDYMg1y02EbjbvW4X60S98l6.jpg', '$2y$10$6OCOj79RG8KD4nRCe77GwOJqZB51mggkaTYF1j3amWvcwT/huqpGy', '2023-01-23 18:36:59', '2023-01-23 18:36:59'),
(13, 'Surendra nath', 'a@gmail.com1', '99999999888', 'M', 'Vidhayak Road Jayram Nagar Fatehpur', 'Fatehpur', '212601', 'Surgery', 'aadhar', '585475695248', 'files/doctors_images/Xi0YXAaR2wbfEo8ObX8imJS3hc7YwnUKsZJnZDeY.jpg', NULL, '$2y$10$8hGE9u3d4NBAUkJfPBL3QunUfUhbmZ9A9d70krpApANfP4Dj2h4bS', '2023-01-23 19:05:20', '2023-01-23 19:05:20'),
(14, 'Alok Maurya', 'snmaurya10275@gmail.com7777', '07071994439', 'M', 'Vidhayak Road Jayram Nagar Fatehpur', 'Fatehpur', '212601', 'Teeath', 'aadhar', '11111111111', 'files/doctors_images/qpIuJIDUiVlIQA1FCHoy43AeEhWyjEMu0JV937jR.jpg', NULL, '$2y$10$EnVNZIe8zLYWO30zDyzcUuM5oGC35RZy8kmhDvo3f.QbKDWv07tza', '2023-01-23 20:51:49', '2023-01-23 20:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Token', 'a91fae2e74015b9a8e828ce8f1cfb3b82af34f6141ad1c6726f1aa5ea53227b3', '[\"*\"]', NULL, NULL, '2023-01-04 08:07:03', '2023-01-04 08:07:03'),
(2, 'App\\Models\\User', 2, 'Token', '2fe881f86ee79d21687d493d549ac2028d2a668d757d13f4c8dc67cdf275c19e', '[\"*\"]', NULL, NULL, '2023-01-04 08:35:12', '2023-01-04 08:35:12'),
(3, 'App\\Models\\User', 3, 'Token', 'ae74d605872f8b49b26af99b866fcd234d0869a22dfff4213bdb49d89bfde0c2', '[\"*\"]', NULL, NULL, '2023-01-04 08:57:40', '2023-01-04 08:57:40'),
(4, 'App\\Models\\User', 4, 'Token', '6c33b486372637758e9ded90a87c4fde0a9ff63e46e78e98940775f9de8e96c6', '[\"*\"]', NULL, NULL, '2023-01-04 09:00:02', '2023-01-04 09:00:02'),
(5, 'App\\Models\\User', 5, 'Token', '5b5a5c50d96ab9ffb228e35d6df0b6b944d69f6f7d1cd6b40da89588ac3c1e98', '[\"*\"]', NULL, NULL, '2023-01-04 09:02:49', '2023-01-04 09:02:49'),
(6, 'App\\Models\\User', 6, 'Token', 'c3e778f0b69180a1f260c74bea34a84d564a9a427b912599c2f70ef28ace00d0', '[\"*\"]', NULL, NULL, '2023-01-04 09:11:52', '2023-01-04 09:11:52'),
(7, 'App\\Models\\User', 1, 'token', 'e4cd2b9bab012f8eb2d0ab7f2d4be8591e3d74e73c15a814bed6673e29853ab7', '[\"*\"]', NULL, NULL, '2023-01-04 09:18:41', '2023-01-04 09:18:41'),
(8, 'App\\Models\\User', 1, 'token', 'd785be4651bfb3c5e78d72c625b27152ea08048b3b46179930b2b29de4cd984f', '[\"*\"]', NULL, NULL, '2023-01-04 09:19:00', '2023-01-04 09:19:00'),
(9, 'App\\Models\\User', 1, 'token', 'c5e4108d51670a34d545f6139c2664d874a6e9f6a550ec3e04cd7a0f6ca0ffdf', '[\"*\"]', NULL, NULL, '2023-01-04 09:24:24', '2023-01-04 09:24:24'),
(10, 'App\\Models\\User', 1, 'token', '7fd9be4a845c4fdf26e41bb779a98aa98b8cba4dd20567d053af13876146893f', '[\"*\"]', NULL, NULL, '2023-01-04 10:23:40', '2023-01-04 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alok Maurya', 'worldsqna@gmail.com', '07071994439', '3', NULL, '$2y$10$3.ZDuJ4D2HcS68sODxh0oOdV4teBH2fMoaluKK//xUPHicSqKllqS', NULL, '2023-01-04 08:07:03', '2023-01-04 08:07:03'),
(2, 'Alok Maurya', 'worldsqnea@gmail.com', '07071994439', '3', NULL, '$2y$10$gWaWvbEfOuR3EdGZDl.bF.0BwUDg1uUX5mXN21iPXz0dDZVzBpYH2', NULL, '2023-01-04 08:35:12', '2023-01-04 08:35:12'),
(3, 'Alok Maurya', 'snmaurya5@gmail.com', '07071994439', '3', NULL, '$2y$10$NBe..ocpRPxF1plDrhv7reE.Ps2LFIdZzWUsO5XU028N5x/WDoqOO', NULL, '2023-01-04 08:57:40', '2023-01-05 08:00:14'),
(4, 'Alok Maurya', 'snmaury22a10275@gmail.com', '07071994439', '3', NULL, '$2y$10$sTprMx7F2f.KB0Vo5WEbwuDP/ZYuPv3b5upe1w.X21zmApyUL8UUO', NULL, '2023-01-04 09:00:02', '2023-01-04 09:00:02'),
(5, 'Alok Maurya', 'alok1@gmail.com', '07071994439', '3', NULL, '$2y$10$DLFaVUpRB7Dt7X2snifRxuW4AYDqb09NXRbMn54QP/i0BNKZd8FSi', NULL, '2023-01-04 09:02:49', '2023-01-04 09:02:49'),
(6, 'Alok Maurya', 'alok2@gmail.com', '07071994439', '3', NULL, '$2y$10$uOppS31Fzzl8p5QMEq3TrOdJrOhD9B7pNXEU2xG.B2Wc6c6/8MsBm', NULL, '2023-01-04 09:11:52', '2023-01-04 09:11:52'),
(7, 'Surendra nath', 'a@n.com', '99999999888', '1', NULL, '$2y$10$BwkcgCeKcg2EuNB6IzM.6./u4HDvXgfMByEyofX..1FW7ZfixTxZq', NULL, '2023-01-04 10:35:55', '2023-01-04 10:35:55'),
(8, 'Ratan', 'admin@gmail.com', '7894561230', '1', NULL, '$2y$10$t97FBrvqFFotapngGN0LB.oCcsCknO2bSQYwnwhK4Pm0r5g0iRUnm', NULL, '2023-01-05 06:21:03', '2023-01-05 06:21:03'),
(9, 'Kaushal', 'kaushal@gmail.com', '1414253687', '2', NULL, '$2y$10$YQpkaWdAnX66sfJIYRUZE.8R9iAG.fsOJn04jWP6d77AL7YavYVxa', NULL, '2023-01-05 07:22:50', '2023-01-05 07:22:50'),
(10, 'Surendra nath', 'a@gmail.com1', '99999999888', '2', NULL, '$2y$10$qq1e/HGo62koQ3c3NL3GwuSa/69lh5QD4loSZg7JE1Cbi9tXS1deS', NULL, '2023-01-23 08:05:20', '2023-01-23 08:05:20'),
(36, 'Alok Maurya', 'snmaurya10275@gmail.com7777', '07071994439', '2', NULL, '$2y$10$kMvcJUv3TiRn/rbGyWjA6ecJA4yX3YXw1J9R/Ynyx3kxWheb.bwP.', NULL, '2023-01-23 09:51:49', '2023-01-23 09:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

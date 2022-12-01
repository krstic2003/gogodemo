-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 12:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `user_id`, `format`, `cover`, `pages`, `price`, `pdf_url`, `created_at`, `updated_at`) VALUES
(1, 'knjiga admin', 1, 'A4 uspravno (200x280)', 'Meki povez', '28', '520', NULL, '2022-03-24 12:05:42', '2022-05-14 13:16:43'),
(2, 'knjiga korisnik', 4, 'A4 uspravno (200x280)', 'A4 uspravno (200x280)', '33', '333', NULL, '2022-03-24 12:06:03', '2022-03-24 12:06:03'),
(3, 'knjiga korisnik 2', 4, 'A4 uspravno (200x280)', 'A4 uspravno (200x280)', '33', '333', NULL, '2022-03-24 12:06:03', '2022-03-24 12:06:03'),
(4, 'knjiga admin 2', 1, 'A4 uspravno (200x280)', 'A4 uspravno (200x280)', '22', '222', NULL, '2022-03-24 12:05:42', '2022-03-24 12:05:42'),
(8, 'sasa', 1, 'Mala kocka (200x200)', 'Tvrdi povez', '60', '710', NULL, '2022-03-25 12:37:54', '2022-03-25 14:22:15'),
(9, 'Aleksandar Krstic', 1, 'A4 uspravno (200x280)', 'Meki povez', '28', '520', NULL, '2022-03-29 11:35:04', '2022-03-29 11:35:04'),
(10, 'cdfd', 4, 'A4 uspravno (200x280)', 'Meki povez', '56', '940', NULL, '2022-03-29 12:54:00', '2022-03-29 12:54:00'),
(11, 'saas', 8, 'A4 landscape (280x200)', 'Meki povez', '40', '700', NULL, '2022-04-08 22:38:11', '2022-04-08 22:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `cover_prices`
--

CREATE TABLE `cover_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_prices`
--

INSERT INTO `cover_prices` (`id`, `type`, `format`, `price`) VALUES
(1, 'Meki povez', 'A4 uspravno (200x280)', '100'),
(2, 'Meki povez', 'A4 landscape (280x200)', '100'),
(3, 'Meki povez', 'Mala kocka (200x200)', '70'),
(4, 'Meki povez', 'Velika kocka (300x300)', '150'),
(5, 'Tvrdi povez', 'A4 uspravno (200x280)', '170'),
(6, 'Tvrdi povez', 'A4 landscape (280x200)', '170'),
(7, 'Tvrdi povez', 'Mala kocka (200x200)', '110'),
(8, 'Tvrdi povez', 'Velika kocka (300x300)', '200');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_15_101213_add_role_to_users_table', 2),
(6, '2022_03_16_135139_add_address_to_users_table', 3),
(7, '2022_03_17_161733_create_cover_prices_table', 4),
(11, '2022_03_17_161955_create_page_prices_table', 5),
(12, '2022_03_24_114555_create_books_table', 5),
(13, '2022_04_04_123458_create_orders_table', 6),
(14, '2022_04_04_141959_create_settings_table', 7),
(15, '2022_04_07_154941_add_email_to_settings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `book_id`, `shipping_name`, `shipping_email`, `shipping_tel`, `shipping_state`, `shipping_zip`, `shipping_city`, `shipping_street`, `qty`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-04 11:18:16', '2022-04-04 11:18:16'),
(2, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 11:19:01', '2022-04-04 11:19:01'),
(3, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 11:58:30', '2022-04-04 11:58:30'),
(4, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 11:58:53', '2022-04-04 11:58:53'),
(5, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 11:59:18', '2022-04-04 11:59:18'),
(6, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 12:02:45', '2022-04-04 12:02:45'),
(7, 1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-04 12:13:06', '2022-04-04 12:13:06'),
(8, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-07 13:14:51', '2022-04-07 13:14:51'),
(9, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:15:00', '2022-04-07 13:15:00'),
(10, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:16:02', '2022-04-07 13:16:02'),
(11, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:17:24', '2022-04-07 13:17:24'),
(12, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:21:19', '2022-04-07 13:21:19'),
(13, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:22:10', '2022-04-07 13:22:10'),
(14, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:22:33', '2022-04-07 13:22:33'),
(15, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:23:06', '2022-04-07 13:23:06'),
(16, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-07 13:27:17', '2022-04-07 13:27:17'),
(17, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:27:24', '2022-04-07 13:27:24'),
(18, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 13:36:23', '2022-04-07 13:36:23'),
(19, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:35:22', '2022-04-07 16:35:22'),
(20, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:35:38', '2022-04-07 16:35:38'),
(21, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:44:53', '2022-04-07 16:44:53'),
(22, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:45:11', '2022-04-07 16:45:11'),
(23, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:47:23', '2022-04-07 16:47:23'),
(24, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 16:48:03', '2022-04-07 16:48:03'),
(25, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-07 17:41:50', '2022-04-07 17:41:50'),
(26, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 17:41:58', '2022-04-07 17:41:58'),
(27, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 17:59:55', '2022-04-07 17:59:55'),
(28, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 18:20:45', '2022-04-07 18:20:45'),
(29, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 18:21:09', '2022-04-07 18:21:09'),
(30, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:40:04', '2022-04-07 19:40:04'),
(31, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:40:37', '2022-04-07 19:40:37'),
(32, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:44:04', '2022-04-07 19:44:04'),
(33, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:46:15', '2022-04-07 19:46:15'),
(34, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:48:13', '2022-04-07 19:48:13'),
(35, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:48:38', '2022-04-07 19:48:38'),
(36, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 19:49:01', '2022-04-07 19:49:01'),
(37, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-07 20:01:30', '2022-04-07 20:01:30'),
(38, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:14:33', '2022-04-07 20:14:33'),
(39, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:16:38', '2022-04-07 20:16:38'),
(40, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:17:02', '2022-04-07 20:17:02'),
(41, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:18:37', '2022-04-07 20:18:37'),
(42, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:18:55', '2022-04-07 20:18:55'),
(43, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:19:55', '2022-04-07 20:19:55'),
(44, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:20:00', '2022-04-07 20:20:00'),
(45, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:20:41', '2022-04-07 20:20:41'),
(46, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:21:01', '2022-04-07 20:21:01'),
(47, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:22:19', '2022-04-07 20:22:19'),
(48, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:25:08', '2022-04-07 20:25:08'),
(49, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:25:30', '2022-04-07 20:25:30'),
(50, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:25:54', '2022-04-07 20:25:54'),
(51, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:28:03', '2022-04-07 20:28:03'),
(52, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:28:20', '2022-04-07 20:28:20'),
(53, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:28:44', '2022-04-07 20:28:44'),
(54, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:29:08', '2022-04-07 20:29:08'),
(55, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:29:24', '2022-04-07 20:29:24'),
(56, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:29:49', '2022-04-07 20:29:49'),
(57, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:32:12', '2022-04-07 20:32:12'),
(58, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:35:54', '2022-04-07 20:35:54'),
(59, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:36:42', '2022-04-07 20:36:42'),
(60, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:37:29', '2022-04-07 20:37:29'),
(61, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:41:40', '2022-04-07 20:41:40'),
(62, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-07 20:46:57', '2022-04-07 20:46:57'),
(63, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-08 17:34:36', '2022-04-08 17:34:36'),
(64, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-08 17:44:18', '2022-04-08 17:44:18'),
(65, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-08 17:44:35', '2022-04-08 17:44:35'),
(66, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'cod', 'Aktivan', '2022-04-08 17:47:15', '2022-04-08 17:47:15'),
(67, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'inovice', 'Aktivan', '2022-04-08 17:47:35', '2022-04-08 17:47:35'),
(68, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-08 20:37:39', '2022-04-08 20:37:39'),
(69, 9, 'Aleksandar Krstic', 'krstic2003@gmail.com', '+38169653662', 'Serbia', '1100q', 'Belgrade', 'Sarajevska 70/8', 1, 'ips', 'Aktivan', '2022-04-08 20:57:34', '2022-04-08 20:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `page_prices`
--

CREATE TABLE `page_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_prices`
--

INSERT INTO `page_prices` (`id`, `format`, `price`) VALUES
(1, 'A4 uspravno (200x280)', '15'),
(2, 'A4 landscape (280x200)', '15'),
(3, 'Mala kocka (200x200)', '10'),
(4, 'Velika kocka (300x300)', '20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('krsticitp@gmail.com', '$2y$10$gn.CjO5Zhr8MtBBc4HRcaeQTsm.qvuCe4MRUNnUDEvjzNq4sE2wiG', '2022-03-16 12:02:58'),
('info@krstic.info', '$2y$10$JQMUZem.XCfkqv5DGPVcJOuWE/G19H414m3CZQl/.PEX/GtPCUg4m', '2022-04-08 22:21:13');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company`, `account`, `email`) VALUES
(1, 'GoGoBook Neka Adresa, 11000 Beograd, Srbija', '160570010107507958', 'krstic2003@gmail.com');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT 1,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `telephone`, `state`, `city`, `zip`, `street`, `company`) VALUES
(1, 'Aleksandar Krstic', 'krstic2003@gmail.com', '2022-04-08 22:38:52', '$2y$10$ks.WYZqVsFjhonpV2u5yj.spYr0wimh/fXpQ1MiKXZbWRY7niP6m6', 'EFYBsK2Puj36sOM1Jt3D9HKQDD6ed5TlvS88xBX2PEelVEPQd127yKvE6iHq', '2022-03-15 09:07:21', '2022-04-08 22:38:52', 2, '+38169653662', 'Serbia', 'Belgrade', '1100q', 'Sarajevska 70/8', 'fizicko'),
(4, 'Korinsik', 'test@test.com', NULL, '$2y$10$BH5UboYPlToWKfGVvfI1EOnygfGLr7R8UmWbd9G6UArtQ4i/lIAr.', NULL, '2022-03-17 14:56:07', '2022-03-17 14:56:07', 1, '063653662', 'test', NULL, '11000', 'Sarajevska 70/8', 'pravno'),
(5, 'Aleksandar Krstic', 'itprogram2010@gmail.com', NULL, '$2y$10$OEOzb3cg/ENwUBCQEfpFDeZS7rJ5LhgdCG2J76MLu.6ytisTB8nuO', NULL, '2022-04-08 21:02:07', '2022-04-08 21:02:07', 1, '+38169653662', 'Serbia', 'Belgrade', '11000', 'Sarajevska 70/8', 'fizicko'),
(6, 'Aleksandar Krstic', 'krsticitp@gmail.com', '2022-04-08 22:23:26', '$2y$10$nKn8sdEgXfxQINX/.6kMzO.r/2I3TuPLVpz5cg7p5eEXCYCvVlEaS', 'BTIWLWs2plwR6tduyZ4FoAMfVr3LKSVq0v8oRGZuiy1odswPT1xvSyCeAXrX', '2022-04-08 21:42:53', '2022-04-08 22:23:26', 1, '+38169653662', 'Serbia', 'Belgrade', '11000', 'Sarajevska 70/8', 'fizicko'),
(7, 'Aleksandar Krstic', 'info@krstic.info', '2022-04-08 21:45:25', '$2y$10$NTHrIJTQvdJ7h9Yg/8Hz2ul2EN2wG5b2ndmPY30Izv/nugpQWLEaS', NULL, '2022-04-08 21:45:03', '2022-04-08 21:45:25', 1, '+38169653662', 'Serbia', 'Belgrade', '11000', 'Sarajevska 70/8', 'fizicko'),
(8, 'Aleksandar Krstic', 'office@itprogram.org', '2022-04-08 22:24:35', '$2y$10$vyyhousr6QQIx7LlmN4.s.qxmLzF.S2T6GyttFWg2qkiRR7IvjK9O', 'kJIZxODObS4hjgOKJS2GQFVk4VMOnaLHZIgHeCqIFOtdt60eDmf0TVGdC2Vt', '2022-04-08 22:24:19', '2022-04-08 22:24:35', 1, '+38169653662', 'Serbia', 'Belgrade', '11000', 'Sarajevska 70/8', 'fizicko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `cover_prices`
--
ALTER TABLE `cover_prices`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_book_id_foreign` (`book_id`);

--
-- Indexes for table `page_prices`
--
ALTER TABLE `page_prices`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cover_prices`
--
ALTER TABLE `cover_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `page_prices`
--
ALTER TABLE `page_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

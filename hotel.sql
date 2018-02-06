-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 07:22 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in`, `check_out`, `status`, `code`, `total`, `user_id`, `promotion_id`, `created_at`, `updated_at`) VALUES
(1, '2018-01-07', '2018-01-08', 0, 'REHF4T', 100, 4, NULL, '2018-01-06 00:29:05', '2018-01-06 00:29:05'),
(2, '2018-01-19', '2018-01-21', 2, 'CH9N12', 40, 1, NULL, '2018-01-16 02:24:02', '2018-01-16 02:26:26'),
(3, '2018-01-19', '2018-01-21', 3, 'CGPIIY', 430, 1, NULL, '2018-01-16 02:28:27', '2018-01-16 02:33:49'),
(4, '2018-01-24', '2018-01-26', 0, 'ECME2M', 200, 5, NULL, '2018-01-16 02:43:51', '2018-01-16 02:43:51'),
(5, '2018-01-30', '2018-01-31', 0, 'YL8DJA', 100, 5, NULL, '2018-01-16 02:49:21', '2018-01-16 02:49:21'),
(6, '2018-01-19', '2018-01-21', 1, 'Z8OLVD', 200, 1, NULL, '2018-01-16 05:09:00', '2018-01-16 05:22:17'),
(7, '2018-02-01', '2018-02-02', 1, 'WRCEE6', 200, 6, NULL, '2018-01-16 05:31:08', '2018-01-16 05:57:42'),
(8, '2018-01-17', '2018-01-18', 0, '0VCJGQ', 100, 1, NULL, '2018-01-16 06:15:56', '2018-01-16 06:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `book_rooms`
--

CREATE TABLE `book_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` int(11) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_rooms`
--

INSERT INTO `book_rooms` (`id`, `room_id`, `booking_id`, `created_at`, `updated_at`, `full_name`, `passport`, `phone_number`) VALUES
(1, 1, 1, '2018-01-06 00:29:05', '2018-01-06 00:29:05', NULL, NULL, NULL),
(2, 2, 2, '2018-01-16 02:24:02', '2018-01-16 02:24:02', NULL, NULL, NULL),
(3, 1, 3, '2018-01-16 02:28:27', '2018-01-16 02:28:27', NULL, NULL, NULL),
(4, 2, 3, '2018-01-16 02:28:27', '2018-01-16 02:28:27', NULL, NULL, NULL),
(5, 2, 4, '2018-01-16 02:43:51', '2018-01-16 02:43:51', NULL, NULL, NULL),
(6, 2, 5, '2018-01-16 02:49:21', '2018-01-16 02:49:21', NULL, NULL, NULL),
(7, 1, 6, '2018-01-16 05:09:00', '2018-01-16 05:09:00', NULL, NULL, NULL),
(8, 1, 7, '2018-01-16 05:31:08', '2018-01-16 05:31:08', NULL, NULL, NULL),
(9, 2, 7, '2018-01-16 05:31:08', '2018-01-16 05:31:08', NULL, NULL, NULL),
(10, 1, 8, '2018-01-16 06:15:56', '2018-01-16 06:15:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_room_services`
--

CREATE TABLE `book_room_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `book_room_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_room_services`
--

INSERT INTO `book_room_services` (`id`, `quantity`, `book_room_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, NULL, NULL),
(2, 3, 7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_072348_create_promotions_table', 1),
(4, '2017_12_15_072413_create_bookings_table', 1),
(5, '2017_12_15_072432_create_room_types_table', 1),
(6, '2017_12_15_072444_create_rooms_table', 1),
(7, '2017_12_15_073429_create_services_table', 1),
(8, '2017_12_15_073504_create_book_rooms_table', 1),
(9, '2017_12_15_073536_create_book_room_services_table', 1),
(10, '2017_12_22_110311_delete_amount_people_rooms_table', 1),
(11, '2017_12_22_111134_create_room_sizes_table', 1),
(12, '2017_12_22_111239_create_room_size_id_rooms_table', 1),
(13, '2017_12_22_131550_update_image_rooms_table', 1),
(14, '2018_01_01_012408_update_book_room_services_table', 1),
(15, '2018_01_03_003417_add_deposit_on_users_table', 1),
(16, '2018_01_12_080956_add_full_name_id_phone_number_on_book_rooms', 2),
(17, '2018_01_16_110115_add_image_on_roomType_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_size_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `status`, `description`, `image1`, `image2`, `image3`, `room_type_id`, `created_at`, `updated_at`, `room_size_id`) VALUES
(1, 'P101', 100, 1, 'Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.', '1516021008.jpg', '1516021424.jpg', '1516068695.24458.50512.83850.jpg', 1, '2018-01-06 00:25:43', '2018-01-16 02:11:35', 1),
(2, 'P102', 100, 1, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516023631.jpg', '1516023631.jpg', '1516023631.jpg', 1, '2018-01-13 01:44:56', '2018-01-16 02:28:27', 1),
(3, 'P103', 100, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068654.35696.47323.24035.jpg', '1516068654.72219.11576.35719.jpg', '1516068654.62905.45370.23262.jpg', 1, '2018-01-13 01:45:39', '2018-01-16 02:10:54', 1),
(4, 'P104', 100, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068740.50448.41689.6114.jpg', '1516068740.1976.18875.82001.jpg', '1516068740.94456.99901.46562.jpg', 1, '2018-01-16 02:12:20', '2018-01-16 02:12:20', 1),
(5, 'P105', 100, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068773.33257.52502.57614.jpg', '1516068773.86924.20024.47761.jpg', '1516068773.8306.45449.78351.jpg', 1, '2018-01-16 02:12:53', '2018-01-16 02:12:53', 2),
(6, 'P106', 120, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068859.12079.14927.35744.jpg', '1516068859.82812.2503.86316.jpg', '1516068859.36493.31644.76041.jpg', 1, '2018-01-16 02:14:19', '2018-01-16 02:14:19', 3),
(7, 'P201', 75, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068908.7215.40648.1984.jpg', '1516068908.93383.26451.7576.jpg', '1516068908.54750.40151.31181.jpg', 2, '2018-01-16 02:15:08', '2018-01-16 02:15:08', 1),
(8, 'P203', 75, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516068954.90376.94593.85974.jpg', '1516068954.56692.8322.63185.jpg', '1516068954.38438.79159.82231.jpg', 2, '2018-01-16 02:15:54', '2018-01-16 02:15:54', 1),
(9, 'P204', 75, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516069042.84919.6425.3547.jpg', '1516069042.3885.23246.33574.jpg', '1516069042.90924.61495.45044.jpg', 2, '2018-01-16 02:17:22', '2018-01-16 02:17:22', 1),
(10, 'P301', 50, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516069137.63239.11834.60526.jpg', '1516069137.60191.95067.12489.jpg', '1516069137.79802.90305.34882.jpg', 3, '2018-01-16 02:18:57', '2018-01-16 02:18:57', 1),
(11, 'P302', 50, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516069244.49617.65430.76315.jpg', '1516069244.3697.21503.24174.jpg', '1516069244.53201.57082.34403.jpg', 3, '2018-01-16 02:20:44', '2018-01-16 02:21:10', 1),
(12, 'P107', 50, 2, 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.\r\n\r\nCras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.', '1516069362.41659.18607.98602.jpg', '1516069362.68708.7257.14577.jpg', '1516069362.65268.56357.74789.jpg', 3, '2018-01-16 02:22:42', '2018-01-16 05:14:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_sizes`
--

CREATE TABLE `room_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_sizes`
--

INSERT INTO `room_sizes` (`id`, `name`, `size`, `created_at`, `updated_at`) VALUES
(1, 'Room for 2 People', 2, NULL, NULL),
(2, 'Room for 4 People', 4, NULL, NULL),
(3, 'Room for 6 People', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`, `created_at`, `updated_at`, `image`) VALUES
(1, 'VIP', 'VIP Room', NULL, '2018-01-16 04:53:58', '1516078438.jpg'),
(2, 'DELUXE', 'DELUXE Room', NULL, '2018-01-16 04:54:05', '1516078445.jpg'),
(3, 'FAMILY', 'FAMILY Room', NULL, '2018-01-16 04:54:14', '1516078454.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Coca', 2, 'a', NULL, NULL),
(2, 'Hamburger', 2, 'a', NULL, NULL),
(3, 'Chivas', 30, 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `phone_number` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deposit` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `phone_number`, `address`, `active`, `remember_token`, `created_at`, `updated_at`, `deposit`) VALUES
(1, 'Thinh', 'VIP', 'nguyentranthinh430@gmail.com', '$2y$10$2S4MmHXyMF6X7eC20VaOOu/mcyQ8y37HvfrcYcU8AoxNFHPYu4SSu', 1, 915315162, '193 NLB', 1, 'RsEOB0HGiErOlIC2d2u3zOOWqq6o4ZqEm9Ecm6dEOjYoVvz27v6gH3v9P8DF', NULL, '2018-01-16 06:15:56', 2340),
(2, 'Hoa', 'DELUXE', 'hoangtu.hoangtuech92@gmail.com', '$2y$10$rUcvLTABazxIoBfrH/bipuOVOuUUYZ30LcsNL9jstgZJS8rrSibU.', 1, 1283496275, '193 NLB', 1, NULL, NULL, NULL, 1000),
(3, 'Tung', 'FAMILY', 'tung.tranduy0@gmail.com', '$2y$10$Lfr47sNv14ZLJpSOUAfdzOoyXiHbGQkAVrSHR2ojB6i7t7lqahQn.', 1, 1289480359, '193 NLB', 1, NULL, NULL, NULL, 1000),
(4, 'hoa', 'dep trai', 'howdfsdfa@gmail.com', '$2y$10$VJj..TPysUMBp.i04Qmjg.MlEYBblbYV6041y5TNBfTTuW3MR27Fe', 0, 1695391842, 'dfgdfgdfg', 1, NULL, '2018-01-06 00:28:45', '2018-01-06 00:29:04', 900),
(5, 'nguyen', 'thinh', 'nguyenthinh@gmail.com', '$2y$10$0bZSqiz2d4AKluY6gqJsQO0sE.LKcLy0ISHYSZ0hsr.Gl4EQnBWR.', 0, 915315162, '22 giap hai', 1, 'HjvtpmZ6nwaxNPxyJB6vlR8om5ARfhPWDBIgK1wVZOFK9uHPKxvWnYSROsFe', '2018-01-16 02:41:10', '2018-01-16 02:49:21', 700),
(6, 'tran', 'tung', 'trantung@gmail.com', '$2y$10$6aw095xhb.cvDvGBxj8ho.lqilI/0S9NBtemB2O9OQu65XezpzhJu', 0, 915315162, 'tran tung', 1, 'Y6fUTMUGsHRmnYfsHsrzPWi0GSj1vaUBQkCNPvHDyvHxzyb0d6NtqBcZx5Cp', '2018-01-16 05:31:01', '2018-01-16 05:31:08', 800),
(7, 'tung', 'nguyen', 'tungsisate@gmail.com', '$2y$10$r7/mBb8QOECujU3CS8T.neLoYOLX6E4zn.2lU.sSQeC5Z1H6ReDEy', 0, 915315162, 'tung di ia', 1, '5vG78wTYap8F3BlHYenTM56bWk30GZBWzhk7z58ag75Lx7T5KCCsz6ZQMjIb', '2018-01-16 05:42:28', '2018-01-16 05:42:28', 1000),
(8, 'thinh', 'nguyen2', 'thinh1@gmail.com', '$2y$10$ZNibaEhjugYK86pFbbO/9OkxiT3ddo3AeHbDrEIkoCByEe5qRxr5W', 0, 234234234, 'sdfsdf', 1, 'NwGjs7OZ3IYgiRq45MViCeRAQXJr076AIhrwF8nINPrwQaUiVjQG4lsgSooT', '2018-01-16 05:46:58', '2018-01-16 05:46:58', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `book_rooms`
--
ALTER TABLE `book_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_rooms_room_id_foreign` (`room_id`),
  ADD KEY `book_rooms_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `book_room_services`
--
ALTER TABLE `book_room_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_room_services_book_room_id_foreign` (`book_room_id`),
  ADD KEY `book_room_services_service_id_foreign` (`service_id`);

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
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`),
  ADD KEY `rooms_room_size_id_foreign` (`room_size_id`);

--
-- Indexes for table `room_sizes`
--
ALTER TABLE `room_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_rooms`
--
ALTER TABLE `book_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_room_services`
--
ALTER TABLE `book_room_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_sizes`
--
ALTER TABLE `room_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `book_rooms`
--
ALTER TABLE `book_rooms`
  ADD CONSTRAINT `book_rooms_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `book_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `book_room_services`
--
ALTER TABLE `book_room_services`
  ADD CONSTRAINT `book_room_services_book_room_id_foreign` FOREIGN KEY (`book_room_id`) REFERENCES `book_rooms` (`id`),
  ADD CONSTRAINT `book_room_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_size_id_foreign` FOREIGN KEY (`room_size_id`) REFERENCES `room_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

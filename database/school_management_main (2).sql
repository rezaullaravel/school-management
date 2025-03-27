-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2025 at 05:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01719475187', 'upload/admin_images/466035587.jeet.jpg', '$2y$12$gUoX3s.chzlHbFronk4u3OsNKz4RdEKsCkFsxqsu7lqIB8nozb22i', NULL, NULL, '2024-03-04 01:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `clas`
--

CREATE TABLE `clas` (
  `id` bigint UNSIGNED NOT NULL,
  `class_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clas`
--

INSERT INTO `clas` (`id`, `class_name`, `created_at`, `updated_at`) VALUES
(7, 'Seven', NULL, '2024-11-27 11:55:46'),
(8, 'Eight', NULL, NULL),
(9, 'Nine', NULL, NULL),
(10, 'Ten', NULL, NULL),
(11, 'Six', NULL, NULL),
(14, 'demo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_routines`
--

CREATE TABLE `class_routines` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `week_id` int NOT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_routines`
--

INSERT INTO `class_routines` (`id`, `clas_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_no`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '09:00', '10:00', '101', '2024-03-31 03:30:44', '2024-03-31 03:30:44'),
(2, 7, 1, 2, '08:30', '09:30', '205', '2024-03-31 03:30:44', '2024-03-31 03:30:44'),
(3, 7, 1, 3, '07:30', '08:30', '307', '2024-03-31 03:30:44', '2024-03-31 03:49:06'),
(4, 7, 1, 4, '08:00', '09:00', '204', '2024-03-31 03:30:44', '2024-03-31 03:52:32'),
(5, 7, 1, 5, '09:30', '09:30', '312', '2024-03-31 03:30:44', '2024-03-31 08:17:49'),
(6, 7, 1, 6, NULL, NULL, NULL, '2024-03-31 03:30:44', '2024-03-31 03:30:44'),
(7, 7, 1, 7, NULL, NULL, NULL, '2024-03-31 03:30:44', '2024-03-31 03:30:44'),
(15, 7, 2, 1, '09:00', '10:00', '101', '2024-03-31 03:53:06', '2024-03-31 03:56:05'),
(16, 7, 2, 2, '09:00', '10:00', '102', '2024-03-31 03:53:06', '2024-03-31 03:56:05'),
(17, 7, 2, 3, '09:00', '10:00', '103', '2024-03-31 03:53:06', '2024-03-31 03:56:05'),
(18, 7, 2, 4, '09:00', '10:30', '204', '2024-03-31 03:53:06', '2024-03-31 03:56:05'),
(19, 7, 2, 5, '08:30', '10:00', '100', '2024-03-31 03:53:06', '2024-03-31 03:56:05'),
(20, 7, 2, 6, NULL, NULL, NULL, '2024-03-31 03:53:06', '2024-03-31 03:53:06'),
(21, 7, 2, 7, NULL, NULL, NULL, '2024-03-31 03:53:06', '2024-03-31 03:53:06'),
(22, 7, 3, 1, '09:00', '10:00', '401', '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(23, 7, 3, 2, '09:00', '10:00', '400', '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(24, 7, 3, 3, '08:00', '09:00', '403', '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(25, 7, 3, 4, '09:00', '10:00', '405', '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(26, 7, 3, 5, '08:30', '09:30', '402', '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(27, 7, 3, 6, NULL, NULL, NULL, '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(28, 7, 3, 7, NULL, NULL, NULL, '2024-03-31 04:03:11', '2024-03-31 04:03:11'),
(29, 7, 5, 1, '11:00', '12:00', '209', '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(30, 7, 5, 2, '11:00', '12:00', '209', '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(31, 7, 5, 3, '11:00', '12:00', '209', '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(32, 7, 5, 4, '11:00', '12:00', '209', '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(33, 7, 5, 5, '11:00', '12:00', '208', '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(34, 7, 5, 6, NULL, NULL, NULL, '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(35, 7, 5, 7, NULL, NULL, NULL, '2024-03-31 05:21:46', '2024-03-31 05:21:46'),
(50, 8, 1, 1, '09:00', '10:00', '101', '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(51, 8, 1, 2, '21:00', '10:00', '102', '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(52, 8, 1, 3, '09:00', '10:00', '403', '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(53, 8, 1, 4, '09:00', '10:00', '204', '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(54, 8, 1, 5, '09:00', '10:00', '308', '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(55, 8, 1, 6, NULL, NULL, NULL, '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(56, 8, 1, 7, NULL, NULL, NULL, '2024-04-01 09:57:45', '2024-04-01 09:57:45'),
(57, 8, 2, 1, '11:00', '12:00', '405', '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(58, 8, 2, 2, '11:00', '12:00', '403', '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(59, 8, 2, 3, '11:00', '12:00', '307', '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(60, 8, 2, 4, NULL, NULL, NULL, '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(61, 8, 2, 5, NULL, NULL, NULL, '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(62, 8, 2, 6, NULL, NULL, NULL, '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(63, 8, 2, 7, NULL, NULL, NULL, '2024-04-01 09:59:48', '2024-04-01 09:59:48'),
(64, 11, 1, 1, '09:30', '11:43', '101', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(65, 11, 1, 2, '09:30', '10:00', '102', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(66, 11, 1, 3, '14:48', '02:47', '307', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(67, 11, 1, 4, '10:44', '11:44', '405', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(68, 11, 1, 5, '13:46', '02:44', '500', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(69, 11, 1, 6, '14:50', '14:49', '209', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(70, 11, 1, 7, '09:45', '21:46', '308', '2024-04-04 14:45:07', '2024-04-04 14:45:07'),
(71, 11, 2, 1, '09:45', '10:46', '101', '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(72, 11, 2, 2, '09:46', '00:48', '304', '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(73, 11, 2, 3, '01:49', '13:47', '307', '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(74, 11, 2, 4, '01:49', '02:48', '405', '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(75, 11, 2, 5, '08:49', NULL, '500', '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(76, 11, 2, 6, NULL, '01:50', NULL, '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(77, 11, 2, 7, NULL, NULL, NULL, '2024-04-04 14:46:14', '2024-04-04 14:46:14'),
(78, 10, 1, 1, '09:00', '10:00', '100', '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(79, 10, 1, 2, '09:00', '10:00', '103', '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(80, 10, 1, 3, '09:00', '10:00', '105', '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(81, 10, 1, 4, NULL, NULL, NULL, '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(82, 10, 1, 5, NULL, NULL, NULL, '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(83, 10, 1, 6, NULL, NULL, NULL, '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(84, 10, 1, 7, NULL, NULL, NULL, '2024-04-07 02:45:01', '2024-04-07 02:45:01'),
(85, 10, 2, 1, '10:00', '11:00', '301', '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(86, 10, 2, 2, '10:00', '11:00', '301', '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(87, 10, 2, 3, '10:00', '11:00', '305', '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(88, 10, 2, 4, NULL, NULL, NULL, '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(89, 10, 2, 5, NULL, NULL, NULL, '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(90, 10, 2, 6, NULL, NULL, NULL, '2024-04-07 02:45:54', '2024-04-07 02:45:54'),
(91, 10, 2, 7, NULL, NULL, NULL, '2024-04-07 02:45:54', '2024-04-07 02:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(4, 'Assistant Teacher', NULL, '2024-04-01 09:46:57'),
(5, 'headmaster', NULL, '2024-04-01 09:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `created_at`, `updated_at`) VALUES
(1, '1st terminal exam', NULL, NULL),
(2, '2nd terminal exam', NULL, NULL),
(3, '3rd terminal exam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_routines`
--

CREATE TABLE `exam_routines` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `session_id` int NOT NULL,
  `room_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_routines`
--

INSERT INTO `exam_routines` (`id`, `clas_id`, `subject_id`, `exam_id`, `session_id`, `room_no`, `start_time`, `end_time`, `date`, `created_at`, `updated_at`) VALUES
(18, 8, 1, 1, 11, '104', '10:00', '13:00', '2024-04-01 06:00:00', '2024-04-01 10:01:08', '2024-04-01 10:01:08'),
(19, 8, 2, 1, 11, '104', '09:00', '12:00', '2024-04-02 06:00:00', '2024-04-01 10:01:47', '2024-04-01 10:01:47'),
(20, 8, 3, 1, 11, '400', '22:02', '13:00', '2024-04-03 06:00:00', '2024-04-01 10:02:24', '2024-04-01 10:02:24'),
(25, 7, 1, 1, 11, '300', '09:00', '13:00', '2024-04-07 06:00:00', '2024-04-07 03:16:51', '2024-04-07 03:16:51'),
(26, 7, 2, 1, 11, '3001', '09:30', '12:00', '2024-07-01 06:00:00', '2024-06-29 05:22:29', '2024-06-29 05:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint UNSIGNED NOT NULL,
  `fees_category_id` int DEFAULT NULL,
  `clas_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `session_id` int NOT NULL,
  `january` int DEFAULT NULL,
  `february` int DEFAULT NULL,
  `march` int DEFAULT NULL,
  `april` int DEFAULT NULL,
  `may` int DEFAULT NULL,
  `june` int DEFAULT NULL,
  `july` int DEFAULT NULL,
  `august` int DEFAULT NULL,
  `september` int DEFAULT NULL,
  `october` int DEFAULT NULL,
  `november` int DEFAULT NULL,
  `december` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fees_category_id`, `clas_id`, `section_id`, `session_id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, 11, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, '2024-07-05 03:11:51', '2024-07-05 03:11:51'),
(2, 1, 10, 14, 11, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, '2024-07-05 03:15:10', '2024-07-05 03:15:10'),
(3, 2, 7, NULL, 11, 300, 300, 300, 300, 300, 300, 300, 300, 300, 300, 300, 300, '2024-07-05 03:51:44', '2024-07-05 03:51:44'),
(4, 3, 7, NULL, 11, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, '2024-07-05 04:14:50', '2024-07-05 04:14:50'),
(5, 3, 10, 14, 11, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, 400, '2024-07-05 05:47:27', '2024-07-05 05:47:27'),
(6, 1, 11, 11, 11, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 06:02:14', '2024-07-05 06:02:14'),
(7, 5, 11, 11, 11, NULL, NULL, NULL, NULL, NULL, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 06:03:18', '2024-07-05 06:03:18'),
(9, 5, 7, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, 1500, NULL, NULL, NULL, NULL, NULL, '2024-07-06 05:33:17', '2024-07-06 05:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `fees_categories`
--

CREATE TABLE `fees_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `fees_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_categories`
--

INSERT INTO `fees_categories` (`id`, `fees_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bus Fee', '2024-04-05 14:23:02', '2024-07-05 02:47:57'),
(2, 'Lab Fee', '2024-04-05 14:23:08', '2024-04-05 14:23:08'),
(3, 'Monthly Tution Fee', '2024-04-05 14:23:32', '2024-04-05 14:23:32'),
(5, 'Exam fee', '2024-07-05 02:24:28', '2024-07-05 02:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `fees_collections`
--

CREATE TABLE `fees_collections` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `section_id` int DEFAULT NULL,
  `session_id` int NOT NULL,
  `registration` int NOT NULL,
  `given_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_fee` int NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_collections`
--

INSERT INTO `fees_collections` (`id`, `clas_id`, `section_id`, `session_id`, `registration`, `given_amount`, `total_fee`, `month`, `created_at`, `updated_at`) VALUES
(1, 7, NULL, 11, 77777, '600', 600, 'january', '2024-07-05 05:45:19', '2024-07-05 05:45:19'),
(2, 10, 14, 11, 651, '500', 800, 'january', '2024-07-05 05:48:49', '2024-07-05 05:48:49'),
(3, 11, 11, 11, 2403, '150', 200, 'january', '2024-07-05 06:05:29', '2024-07-05 06:05:29'),
(4, 10, 14, 11, 651, '100', 800, 'january', '2024-07-05 05:48:49', '2024-07-05 05:48:49'),
(6, 7, NULL, 11, 3456, '400', 600, 'january', '2024-07-06 00:18:56', '2024-07-06 00:18:56'),
(7, 7, NULL, 11, 3456, '100', 600, 'january', '2024-07-06 01:04:03', '2024-07-06 01:04:03'),
(8, 7, NULL, 11, 1456, '300', 600, 'january', '2024-07-06 01:07:05', '2024-07-06 01:07:05'),
(9, 7, NULL, 11, 1456, '100', 600, 'january', '2024-07-06 01:15:59', '2024-07-06 01:15:59'),
(10, 7, NULL, 11, 3456, '600', 600, 'june', '2024-07-06 01:18:08', '2024-07-06 01:18:08'),
(11, 7, NULL, 11, 3456, '100', 600, 'january', '2024-07-06 05:42:02', '2024-07-06 05:42:02'),
(12, 7, NULL, 11, 3456, '300', 600, 'march', '2024-07-07 09:05:03', '2024-07-07 09:05:03'),
(13, 7, NULL, 11, 1456, '100', 600, 'january', '2024-07-07 09:12:16', '2024-07-07 09:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `name`, `phone`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'guardian', '09887665', 'guardian@gmail.com', '$2y$12$XTlawfqEeA1Pe29Xd/8BOeVftuz9.wTeEkKCbrV5gcLKaP8KDExZO', 'upload/guardian_images/939892045.sarukh (2).jpg', NULL, NULL, '2024-03-04 01:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `section_id` int DEFAULT NULL,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `exam_id` int DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `mark` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `clas_id`, `section_id`, `student_id`, `subject_id`, `exam_id`, `session_id`, `mark`, `created_at`, `updated_at`) VALUES
(1, 7, NULL, 9, 15, 1, 11, 80, '2025-01-14 13:42:43', '2025-01-14 13:42:43'),
(2, 7, NULL, 10, 15, 1, 11, 80, '2025-01-14 13:42:43', '2025-01-14 13:42:43'),
(3, 7, NULL, 11, 15, 1, 11, 75, '2025-01-14 13:42:43', '2025-01-14 13:42:43'),
(4, 7, NULL, 14, 15, 1, 11, 75, '2025-01-14 13:42:43', '2025-01-14 13:42:43'),
(5, 7, NULL, 15, 15, 1, 11, 65, '2025-01-14 13:42:43', '2025-01-14 13:42:43'),
(6, 7, NULL, 17, 15, 1, 11, 70, '2025-01-14 13:42:43', '2025-01-15 15:47:25'),
(7, 7, NULL, 9, 16, 1, 11, 85, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(8, 7, NULL, 10, 16, 1, 11, 80, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(9, 7, NULL, 11, 16, 1, 11, 80, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(10, 7, NULL, 14, 16, 1, 11, 75, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(11, 7, NULL, 15, 16, 1, 11, 80, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(12, 7, NULL, 17, 16, 1, 11, 65, '2025-01-14 13:43:23', '2025-01-14 13:43:23'),
(13, 7, NULL, 9, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(14, 7, NULL, 10, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(15, 7, NULL, 11, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(16, 7, NULL, 14, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(17, 7, NULL, 15, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(18, 7, NULL, 17, 17, 1, 11, 75, '2025-01-14 13:43:58', '2025-01-14 13:43:58'),
(19, 7, NULL, 17, 39, 1, 11, 65, '2025-01-14 13:46:17', '2025-01-14 15:14:24'),
(20, 7, NULL, 15, 39, 1, 11, 75, '2025-01-14 13:47:13', '2025-01-14 13:47:13'),
(21, 7, NULL, 9, 40, 1, 11, 65, '2025-01-14 13:56:07', '2025-01-14 13:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_25_091623_create_admins_table', 1),
(7, '2024_02_25_092806_create_teachers_table', 2),
(8, '2024_02_26_083516_create_clas_table', 3),
(10, '2024_02_26_100320_create_sections_table', 4),
(11, '2024_02_27_062502_create_sessions_table', 5),
(12, '2024_02_27_071828_create_designations_table', 6),
(13, '2024_02_27_123823_create_students_table', 7),
(14, '2024_02_28_063309_create_student_attendences_table', 8),
(15, '2024_02_28_165503_create_marks_table', 9),
(17, '2024_02_29_021555_create_subjects_table', 10),
(18, '2024_02_29_085655_create_exams_table', 11),
(19, '2024_03_02_131928_create_sliders_table', 12),
(20, '2024_03_03_031552_create_guardians_table', 13),
(21, '2024_03_03_053725_create_sub_categories_table', 14),
(22, '2024_03_04_023747_create_notices_table', 14),
(24, '2024_03_05_020101_create_settings_table', 15),
(25, '2024_03_31_064811_create_weeks_table', 16),
(26, '2024_03_31_073457_create_class_routines_table', 17),
(27, '2024_03_31_145240_create_exam_routines_table', 18),
(28, '2024_04_05_193736_create_fees_table', 19),
(29, '2024_04_05_193944_create_fees_categories_table', 19),
(30, '2024_04_06_191704_create_fees_collections_table', 20),
(31, '2024_04_07_122831_create_payments_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'First title.', '<figure class=\"image\"><img src=\"http://127.0.0.1:8000/upload/ckeditor_images/1712673621.jpg\"></figure><p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>&nbsp;</p><p>&nbsp;</p>', '2024-03-03 23:04:26', '2024-04-09 14:40:24'),
(2, 'second title', '<figure class=\"image\"><img style=\"aspect-ratio:318/159;\" src=\"http://127.0.0.1:8000/upload/ckeditor_images/1712675995.jpeg\" width=\"318\" height=\"159\"></figure><p>&nbsp;</p><p>using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2024-04-09 15:20:03', '2024-04-09 15:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_reg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_id`, `sender_name`, `sender_phone`, `sender_email`, `sender_type`, `student_reg`, `status`, `created_at`, `updated_at`) VALUES
(2, 'x3x4x5', 'mamun', '46565', 'mamun@gmail.com', 'Student', '2402', 1, '2024-04-07 09:19:43', '2025-01-15 16:06:31'),
(3, 'xvcz23', 'guardian', '09887665', 'guardian@gmail.com', 'Guardian', '77777', 1, '2024-04-08 21:15:48', '2024-04-08 21:31:53'),
(4, '2x23we', 'guardian', '09887665', 'guardian@gmail.com', 'Guardian', '2401', 1, '2024-04-19 15:10:03', '2025-01-13 15:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `principals`
--

CREATE TABLE `principals` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principals`
--

INSERT INTO `principals` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'dhfjfgjgjgh', 'upload/principal/1465547699.banner4.jpg', '<figure class=\"image\"><img style=\"aspect-ratio:100/150;\" src=\"http://127.0.0.1:8000/upload/ckeditor_images/1712675641.jpg\" width=\"100\" height=\"150\"></figure><p>using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2024-04-09', '2024-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `section_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `clas_id`, `section_name`, `created_at`, `updated_at`) VALUES
(8, 9, 'Humanity', NULL, NULL),
(9, 9, 'Commerce', NULL, NULL),
(10, 9, 'Science', NULL, NULL),
(11, 11, 'Section Ka', NULL, NULL),
(12, 11, 'Section Kha', NULL, NULL),
(13, 11, 'Section Ga', NULL, NULL),
(14, 10, 'Science', NULL, NULL),
(15, 10, 'Commerce', NULL, NULL),
(16, 10, 'Humanity', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `session_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_year`, `created_at`, `updated_at`) VALUES
(5, '2016-17', NULL, '2024-02-27 01:15:06'),
(6, '2017-18', NULL, '2024-02-27 01:15:13'),
(7, '2018-19', NULL, NULL),
(8, '2019-20', NULL, NULL),
(9, '2021-22', NULL, NULL),
(10, '2022-23', NULL, NULL),
(11, '2023-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `title`, `date`, `created_at`, `updated_at`) VALUES
(1, 'upload/setting/1438703736.logo (3).jpg', 'Welcome to Myschool', '২০০১  খ্রিঃ', NULL, '2024-04-08 10:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, 'upload/slider_images/999169535.my-banner1.jpeg', '2024-03-02 08:36:24', '2024-04-08 11:06:48'),
(5, 'upload/slider_images/2092823296.my-banner2.jpeg', '2024-03-02 08:42:34', '2024-04-08 11:07:13'),
(6, 'upload/slider_images/1093402699.my-banner3.jpeg', '2024-03-02 08:42:41', '2024-04-08 11:14:17'),
(7, 'upload/slider_images/727746291.my-banner4.jpeg', '2024-04-08 10:09:52', '2024-04-08 11:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `section_id` int DEFAULT NULL,
  `session_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `clas_id`, `section_id`, `session_id`, `name`, `father_name`, `mother_name`, `roll`, `registration`, `image`, `phone`, `email`, `password`, `birth_certificate`, `present_address`, `permanent_address`, `status`, `created_at`, `updated_at`) VALUES
(4, 11, 11, 11, 'karim', 'josim', 'jamila begum', '6677', '2401', 'upload/student_images/1800538276.g1.jpg', '3434', 'karim@gmail.com', '$2y$12$bimntQl3mxOcgsUSr9foAOeKeik46sVpbERfaIqCSY7iCJJVhxxwy', 'upload/student_images/1176954875.pc3.jpg', 'fgfdhfghfj', 'ghgkhkghk', 1, '2024-02-27 11:24:15', '2024-02-27 11:24:15'),
(5, 11, 11, 11, 'mamun', 'lutfor', 'nojeda', '5577', '2402', 'upload/student_images/123923097.g5 - Copy.jpg', '46565', 'mamun@gmail.com', '$2y$12$zUU9W98hzX1PQzpbVLHno.73/Fj2QwjzDaWXNOnlreoXCdfCDD4s2', 'upload/student_images/1176780638.rose1.jpg', 'dfgfdhdf', 'ghjghkgk', 1, '2024-02-27 11:25:58', '2024-02-27 11:25:58'),
(6, 11, 11, 11, 'runa', 'lutfor', 'nojeda', '7766', '2403', 'upload/student_images/294340235.rose4.jpg', '53533', 'runa@gmail.com', '$2y$12$fnbNMlTH/7yHqL68SnMAMOOounQP1qWA7521bx5COWe5pmFUXYtJ6', 'upload/student_images/1109312639.pc.jpg', 'sherkole teligram', 'sherkole teligram', 1, '2024-02-27 11:27:19', '2024-02-27 11:27:19'),
(7, 9, 8, 11, 'harun', 'baser', 'najma', '5689', '4532', 'upload/student_images/785515525.salman (3).jpg', '576768', 'harun@gmail.com', '$2y$12$TeK6c0X2.HgD9UPwrLjDSupxnYgFiv7cKIMx.AO9cp/IGp0ySFTA6', '', 'dgdfhfdh', 'ghjgjgf', 1, '2024-02-28 01:11:19', '2024-02-28 01:11:19'),
(8, 10, 14, 11, 'motin', 'mannan', 'usha', '567', '651', 'upload/student_images/1535973089.g1.jpg', '43434', 'motin@gmail.com', '$2y$12$uTZB2Wg0Ywr3l11wOh5f7.47p5kdjbBDSHAABJ1IdeceuOcO8xjSq', '', 'dgdhfdh', 'ghjhgkghk', 1, '2024-02-28 01:13:00', '2024-07-05 05:48:26'),
(9, 7, NULL, 11, 'ujjol', 'babor', 'baby', '654', '3456', 'upload/student_images/1476948820.salman (3).jpg', '455666', 'ujjol@gmail.com', '$2y$12$iRyJZPaFiBlHo9weTdyeeO/TcGrLxHSczXxqDKUPQ99Ldt9FRM2f6', '', 'dfgfhfgjfj', 'hgjkhjkhjgjlgl', 1, '2024-02-28 23:55:08', '2024-07-28 15:54:39'),
(10, 7, NULL, 11, 'imrul', 'aroj ali', 'monira', '5433', '1456', 'upload/student_images/725753960.jeet.jpg', '67687876', 'imrul@gmail.com', '$2y$12$kXXQexzGj/uytIleIIOt9eu/zqn8RTTQtNeRvy5bCEtrrbZ4IQ2su', '', 'dfgfhfd', 'hgjghfhjf', 1, '2024-02-28 23:56:09', '2024-07-28 15:54:51'),
(11, 7, NULL, 11, 'Rubel', 'Lutfor', 'Nojedas', '5656', '5676', 'upload/student_images/881049909.jeet.jpg', '56764', 'rubel@gmail.com', '$2y$12$KsTBFNjYJUjP/S6fqcIH/e7CMoAEPNZPp09X2.FoDE1IPPjJUvLou', 'upload/student_images/1640610054.pc5.jpg', 'fhfhfgjgj', 'hjkhjllgfhdfhd', 1, '2024-02-29 02:24:29', '2024-02-29 02:24:29'),
(12, 8, NULL, 11, 'student', 'father', 'mother', '1115', '1115', 'upload/student_images/266393417.g4.jpg', '30201', 'student@gmail.com', '$2y$12$1K1eak2dlDkWIZNmGg1OzeZTOeQF3Kj0kPEVvefvn697bNIujNhhm', 'upload/student_images/172253082.rose2 - Copy.png', 'natore', 'natore', 1, '2024-03-01 06:12:43', '2024-04-01 15:40:39'),
(13, 11, 12, 11, 'keya', 'md. kafil uddin', 'rojina begum', '343558', '343558', 'upload/student_images/1900059178.jeet - Copy.jpg', '34645547547', 'kafil@gmail.com', '$2y$12$/Xc/m0o00vatYmAQ6MOoX.ConVFN5QgUx1YubKbzIhgGmSlEc8ftS', 'upload/student_images/2009168266.moto1.jpeg', 'raninogor', 'raninogor', 1, '2024-03-04 02:15:15', '2024-04-01 17:37:59'),
(14, 7, NULL, 11, 'Kamini', 'Moiful Islam', 'Mohini Begum', '77777', '77777', 'upload/student_images/1504426529.rose2 - Copy.png', '09876612', 'kamini@gmail.com', '$2y$12$fO8TnIgX8hTKISfbxRJg2OiEfv1O16CZYPCIbUBHsVHAWLbA5KjQe', '', 'Sherkole, singra.', 'Sherkole, singra.', 1, '2024-04-08 15:22:08', '2024-04-08 15:28:46'),
(15, 7, NULL, 11, 'Jahangir', 'Abdullah', 'Jamila begum', '4500', '4500', 'upload/student_images/606464941.g1.jpg', '009988', 'jahangir@gmail.com', NULL, '', 'dfgdfhfgh', 'ghjhjkhjhjl', 1, '2024-04-08 15:23:50', '2024-07-06 01:10:06'),
(16, 8, NULL, 11, 'Mainul Islam', 'Johurul', 'Jamila begum', NULL, NULL, 'upload/student_images/738581769.g1.jpg', '34567888999', 'mainul@gmail.com', NULL, '', 'Singra natore', 'Singra natore', 1, '2024-04-19 14:57:27', '2024-04-19 14:58:37'),
(17, 7, NULL, 11, 'Demo Student', 'Demo Father', 'demo mother', '3344', '3344', '', '4465757868', 'demo@gmail.com', '$2y$12$Ca0xW5pEhePZhaeDzCTlH.wFu4SFktq3g960biz02tzUN7k5oAc5e', '', 'Naotore', 'Natore', 1, '2025-01-14 10:03:44', '2025-01-14 12:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendences`
--

CREATE TABLE `student_attendences` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int NOT NULL,
  `attendence_type` int NOT NULL DEFAULT '2',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendences`
--

INSERT INTO `student_attendences` (`id`, `clas_id`, `student_id`, `attendence_type`, `date`, `created_at`, `updated_at`) VALUES
(1, '11', 4, 2, '2024-02-28', '2024-02-28 04:03:43', '2024-02-28 06:50:53'),
(2, '11', 5, 1, '2024-02-28', '2024-02-28 04:11:12', '2024-02-28 06:50:27'),
(3, '11', 6, 1, '2024-02-28', '2024-02-28 04:11:16', '2024-02-28 06:50:02'),
(4, '11', 4, 1, '2024-02-27', '2024-02-28 04:25:51', '2024-02-28 04:25:51'),
(5, '11', 5, 2, '2024-02-27', '2024-02-28 04:25:56', '2024-02-28 04:25:56'),
(6, '11', 6, 3, '2024-02-27', '2024-02-28 04:25:58', '2024-02-28 04:25:58'),
(7, '9', 7, 1, '2024-02-28', '2024-02-28 04:28:15', '2024-02-28 04:28:15'),
(8, '9', 8, 1, '2024-02-28', '2024-02-28 04:28:23', '2024-02-28 04:28:23'),
(9, '9', 7, 1, '2024-02-29', '2024-02-29 00:26:35', '2024-02-29 00:29:05'),
(10, '9', 8, 1, '2024-02-29', '2024-02-29 00:26:41', '2024-02-29 00:26:59'),
(11, '7', 9, 1, '2024-03-01', '2024-02-29 23:44:53', '2024-02-29 23:44:53'),
(12, '7', 10, 2, '2024-03-01', '2024-02-29 23:44:59', '2024-02-29 23:44:59'),
(13, '7', 11, 1, '2024-03-01', '2024-02-29 23:45:01', '2024-02-29 23:45:01'),
(14, '11', 4, 2, '2024-03-01', '2024-03-01 08:20:14', '2024-03-01 08:21:32'),
(15, '11', 5, 2, '2024-03-01', '2024-03-01 08:20:18', '2024-03-01 08:20:18'),
(16, '11', 6, 1, '2024-03-01', '2024-03-01 08:20:22', '2024-03-01 08:20:22'),
(17, '9', 7, 1, '2024-03-02', '2024-03-02 06:21:10', '2024-03-02 06:21:10'),
(18, '9', 8, 2, '2024-03-02', '2024-03-02 06:21:13', '2024-03-02 06:21:13'),
(19, '9', 7, 2, '2024-03-03', '2024-03-02 23:50:00', '2024-03-03 00:07:15'),
(20, '9', 8, 1, '2024-03-03', '2024-03-02 23:50:14', '2024-03-02 23:50:14'),
(21, '7', 9, 1, '2024-03-03', '2024-03-02 23:51:12', '2024-03-02 23:51:12'),
(22, '7', 10, 1, '2024-03-03', '2024-03-02 23:51:15', '2024-03-02 23:51:15'),
(23, '7', 11, 2, '2024-03-03', '2024-03-02 23:51:19', '2024-03-02 23:51:50'),
(24, '11', 4, 1, '2024-03-03', '2024-03-02 23:52:57', '2024-03-02 23:52:57'),
(25, '11', 5, 1, '2024-03-03', '2024-03-02 23:52:59', '2024-03-02 23:52:59'),
(26, '11', 6, 3, '2024-03-03', '2024-03-02 23:53:00', '2024-03-02 23:53:05'),
(27, '7', 9, 2, '2024-03-04', '2024-03-03 23:43:14', '2024-03-04 00:00:01'),
(28, '7', 10, 1, '2024-03-04', '2024-03-03 23:43:22', '2024-03-03 23:43:22'),
(29, '7', 11, 2, '2024-03-04', '2024-03-03 23:43:26', '2024-03-03 23:43:26'),
(30, '9', 7, 2, '2024-03-04', '2024-03-03 23:59:19', '2024-03-04 01:06:56'),
(31, '9', 8, 2, '2024-03-04', '2024-03-03 23:59:23', '2024-03-03 23:59:23'),
(32, '9', 7, 2, '2024-03-10', '2024-03-10 09:42:54', '2024-03-10 09:43:05'),
(33, '9', 8, 2, '2024-03-10', '2024-03-10 09:43:02', '2024-03-10 09:43:02'),
(34, '7', 9, 3, '2024-03-10', '2024-03-10 09:43:47', '2024-03-10 09:44:32'),
(35, '7', 10, 2, '2024-03-10', '2024-03-10 09:43:49', '2024-03-10 09:43:49'),
(36, '7', 11, 1, '2024-03-10', '2024-03-10 09:43:52', '2024-03-10 09:43:52'),
(37, '7', 9, 2, '2024-03-29', '2024-03-29 05:55:40', '2024-03-29 05:55:53'),
(38, '7', 10, 2, '2024-03-29', '2024-03-29 05:55:43', '2024-03-29 05:55:43'),
(39, '7', 11, 1, '2024-03-29', '2024-03-29 05:55:45', '2024-03-29 05:55:51'),
(40, '7', 9, 1, '2024-04-01', '2024-04-01 10:05:45', '2024-04-01 10:05:45'),
(41, '7', 10, 1, '2024-04-01', '2024-04-01 10:05:48', '2024-04-01 10:05:48'),
(42, '7', 11, 2, '2024-04-01', '2024-04-01 10:05:50', '2024-04-01 10:05:50'),
(43, '9', 7, 3, '2024-04-01', '2024-04-01 10:07:13', '2024-04-01 10:07:13'),
(44, '9', 8, 3, '2024-04-01', '2024-04-01 10:07:15', '2024-04-01 10:07:15'),
(45, '7', 9, 1, '2024-04-02', '2024-04-01 17:23:47', '2024-04-01 17:23:47'),
(46, '7', 10, 2, '2024-04-02', '2024-04-01 17:23:49', '2024-04-01 17:24:44'),
(47, '7', 11, 1, '2024-04-02', '2024-04-01 17:23:50', '2024-04-01 17:24:18'),
(48, '7', 9, 1, '2024-04-04', '2024-04-04 14:33:53', '2024-04-04 14:34:13'),
(49, '7', 10, 1, '2024-04-04', '2024-04-04 14:33:55', '2024-04-04 14:34:13'),
(50, '7', 11, 1, '2024-04-04', '2024-04-04 14:33:56', '2024-04-04 14:34:58'),
(51, '7', 9, 1, '2024-04-07', '2024-04-07 02:31:08', '2024-04-07 02:31:08'),
(52, '7', 10, 2, '2024-04-07', '2024-04-07 02:31:10', '2024-04-07 02:31:10'),
(53, '7', 11, 1, '2024-04-07', '2024-04-07 02:31:12', '2024-04-07 02:31:53'),
(54, '7', 9, 1, '2024-04-08', '2024-04-07 02:40:30', '2024-04-07 02:40:30'),
(55, '7', 10, 1, '2024-04-08', '2024-04-07 02:40:32', '2024-04-07 02:40:32'),
(56, '7', 11, 2, '2024-04-08', '2024-04-07 02:40:34', '2024-04-07 02:40:39'),
(57, '7', 9, 2, '2024-04-19', '2024-04-19 14:59:48', '2024-04-19 15:00:30'),
(58, '7', 10, 1, '2024-04-19', '2024-04-19 14:59:50', '2024-04-19 14:59:50'),
(59, '7', 11, 1, '2024-04-19', '2024-04-19 14:59:51', '2024-04-19 14:59:51'),
(60, '7', 14, 2, '2024-04-19', '2024-04-19 14:59:53', '2024-04-19 14:59:53'),
(61, '7', 15, 2, '2024-04-19', '2024-04-19 14:59:54', '2024-04-19 14:59:54'),
(62, '7', 9, 1, '2024-07-07', '2024-07-07 09:16:59', '2024-07-07 09:16:59'),
(63, '7', 10, 1, '2024-07-07', '2024-07-07 09:17:00', '2024-07-07 09:17:00'),
(64, '7', 11, 1, '2024-07-07', '2024-07-07 09:17:01', '2024-07-07 09:17:01'),
(65, '7', 14, 2, '2024-07-07', '2024-07-07 09:17:02', '2024-07-07 09:17:02'),
(66, '7', 15, 2, '2024-07-07', '2024-07-07 09:17:04', '2024-07-07 09:17:04'),
(67, '7', 9, 1, '2024-07-12', '2024-07-12 16:28:21', '2024-07-12 16:29:19'),
(68, '7', 10, 2, '2024-07-12', '2024-07-12 16:28:24', '2024-07-12 16:28:24'),
(69, '7', 11, 2, '2024-07-12', '2024-07-12 16:28:25', '2024-07-12 16:28:25'),
(70, '7', 14, 1, '2024-07-12', '2024-07-12 16:28:26', '2024-07-12 16:28:26'),
(71, '7', 15, 2, '2024-07-12', '2024-07-12 16:28:28', '2024-07-12 16:28:28'),
(72, '7', 9, 1, '2024-07-14', '2024-07-14 13:26:49', '2024-07-14 13:26:49'),
(73, '7', 10, 2, '2024-07-14', '2024-07-14 13:26:52', '2024-07-14 13:26:52'),
(74, '7', 11, 1, '2024-07-14', '2024-07-14 13:26:53', '2024-07-14 13:26:53'),
(75, '7', 14, 2, '2024-07-14', '2024-07-14 13:26:54', '2024-07-14 13:26:54'),
(76, '7', 15, 1, '2024-07-14', '2024-07-14 13:26:55', '2024-07-14 13:26:55'),
(77, '7', 9, 1, '2024-11-27', '2024-11-27 16:03:05', '2024-11-27 16:03:05'),
(78, '7', 10, 1, '2024-11-27', '2024-11-27 16:03:10', '2024-11-27 16:03:10'),
(79, '7', 11, 1, '2024-11-27', '2024-11-27 16:03:11', '2024-11-27 16:03:11'),
(80, '7', 14, 2, '2024-11-27', '2024-11-27 16:03:13', '2024-11-27 16:03:13'),
(81, '7', 15, 2, '2024-11-27', '2024-11-27 16:03:14', '2024-11-27 16:03:14'),
(82, '7', 9, 1, '2025-01-15', '2025-01-15 15:52:13', '2025-01-15 15:52:13'),
(83, '7', 10, 2, '2025-01-15', '2025-01-15 15:52:15', '2025-01-15 15:52:27'),
(84, '7', 11, 2, '2025-01-15', '2025-01-15 15:52:16', '2025-01-15 15:52:16'),
(85, '7', 14, 1, '2025-01-15', '2025-01-15 15:52:17', '2025-01-15 15:52:17'),
(86, '7', 15, 1, '2025-01-15', '2025-01-15 15:52:17', '2025-01-15 15:52:17'),
(87, '7', 17, 1, '2025-01-15', '2025-01-15 15:52:18', '2025-01-15 15:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `clas_id` int NOT NULL,
  `section_id` int DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mandatory',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `clas_id`, `section_id`, `subject`, `type`, `created_at`, `updated_at`) VALUES
(1, 10, 14, 'Bangla', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(2, 10, 14, 'English', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(3, 10, 14, 'Math', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(4, 10, 14, 'Physics', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(5, 10, 14, 'Chemistry', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(6, 10, 14, 'Biology', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(7, 10, 14, 'Higher math', 'mandatory', '2024-07-04 07:18:48', '2024-07-04 07:18:48'),
(8, 10, 16, 'Bangla', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(9, 10, 16, 'English', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(10, 10, 16, 'Math', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(11, 10, 16, 'Civics', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(12, 10, 16, 'Geography', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(13, 10, 16, 'General science', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(14, 10, 16, 'Agriculture', 'mandatory', '2024-07-04 07:19:52', '2024-07-04 07:19:52'),
(15, 7, NULL, 'Amar Bangla', 'mandatory', '2024-07-04 07:34:34', '2024-07-04 07:34:34'),
(16, 7, NULL, 'My English', 'mandatory', '2024-07-04 07:34:34', '2024-07-04 07:34:34'),
(17, 7, NULL, 'My Math', 'mandatory', '2024-07-04 07:34:34', '2024-07-04 07:34:34'),
(18, 11, 11, 'Bangla', 'mandatory', '2024-07-04 19:44:44', '2024-07-04 19:44:44'),
(19, 11, 11, 'English', 'mandatory', '2024-07-04 19:44:44', '2024-07-04 19:44:44'),
(20, 11, 11, 'Music', 'mandatory', '2024-07-04 19:44:44', '2024-07-04 19:44:44'),
(21, 11, 11, 'Drawing', 'mandatory', '2024-07-04 19:44:44', '2024-07-04 19:44:44'),
(22, 8, NULL, 'Computer technology', 'optional', '2024-07-05 01:21:59', '2025-01-14 14:35:48'),
(23, 8, NULL, 'Calculas', 'mandatory', '2024-07-05 01:21:59', '2024-07-05 01:21:59'),
(24, 8, NULL, 'Trigonometry', 'mandatory', '2024-07-05 01:21:59', '2024-07-05 01:21:59'),
(25, 8, NULL, 'Geometry', 'mandatory', '2024-07-05 01:21:59', '2024-07-05 01:21:59'),
(29, 11, 13, 'my subject one', 'mandatory', '2024-08-16 16:06:35', '2024-08-16 16:06:35'),
(32, 14, NULL, 'demo-s1', 'mandatory', '2025-01-14 09:19:26', '2025-01-14 09:19:26'),
(33, 14, NULL, 'demo-s2', 'mandatory', '2025-01-14 09:19:26', '2025-01-14 09:19:26'),
(34, 14, NULL, 'demo-s3', 'optional', '2025-01-14 09:19:26', '2025-01-14 09:57:08'),
(39, 7, NULL, 'my-optional7', 'optional', '2025-01-14 13:12:35', '2025-01-14 13:12:50'),
(40, 7, NULL, 'my-optional7.2', 'optional', '2025-01-14 13:55:00', '2025-01-14 13:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `category`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'বাংলা', 'আমাদের সম্পর্কে', 'upload/subCategory_images/1516259366.slider3.jpeg', '<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>id no</td>\r\n			<td>77</td>\r\n		</tr>\r\n		<tr>\r\n			<td>name</td>\r\n			<td>karim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>roll</td>\r\n			<td>65</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">act that a r<img alt=\"\" src=\"https://buffer.com/cdn-cgi/image/w=1000,fit=contain,q=90,f=auto/library/content/images/size/w1200/2023/10/free-images.jpg\" style=\"height:133px; width:200px\" />eader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2024-03-03 22:52:34', '2024-03-03 23:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `designation_id` int DEFAULT NULL,
  `salary` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `designation_id`, `salary`, `name`, `email`, `phone`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, '25000', 'Teacher', 'teacher@gmail.com', '776688990', 'upload/teacher_images/534481094.g5 - Copy.jpg', '$2y$12$PE8zPzPSeUKE5YACM6g.CeOiPuOlT/lCpwmGOzzoBhqK4lzlaO.1y', NULL, NULL, '2024-03-04 01:14:29'),
(4, 4, '25000', 'helal uddin', 'helal@gmail.com', '8888', 'upload/teacher_images/592953217.jeet - Copy.jpg', '$2y$12$hhSUOw.BII1NdQ8S.cbQhO2f.XVRCH0xHD11Dc3nFIaZOeZg2A/7G', NULL, '2024-04-01 09:48:01', '2024-04-01 09:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint UNSIGNED NOT NULL,
  `week_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `week_name`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', NULL, NULL),
(2, 'Monday', NULL, NULL),
(3, 'Tuesday', NULL, NULL),
(4, 'Wednesday', NULL, NULL),
(5, 'Thursday ', NULL, NULL),
(6, 'Friday ', NULL, NULL),
(7, 'Saturday ', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routines`
--
ALTER TABLE `class_routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_categories`
--
ALTER TABLE `fees_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_collections`
--
ALTER TABLE `fees_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendences`
--
ALTER TABLE `student_attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clas`
--
ALTER TABLE `clas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_routines`
--
ALTER TABLE `class_routines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fees_categories`
--
ALTER TABLE `fees_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees_collections`
--
ALTER TABLE `fees_collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_attendences`
--
ALTER TABLE `student_attendences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

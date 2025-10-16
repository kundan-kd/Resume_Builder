-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2025 at 12:03 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

DROP TABLE IF EXISTS `category_types`;
CREATE TABLE IF NOT EXISTS `category_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 'Web development', 1, '2025-09-01 11:40:19', '2025-09-01 11:40:19', NULL),
(25, 'UI/UX', 1, '2025-09-01 12:04:07', '2025-09-01 12:04:07', NULL),
(26, 'App dev', 1, '2025-09-02 04:41:03', '2025-09-02 04:41:03', NULL),
(28, 'sghsk', 1, '2025-09-11 12:07:15', '2025-09-11 12:07:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_types`
--

DROP TABLE IF EXISTS `designation_types`;
CREATE TABLE IF NOT EXISTS `designation_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation_types`
--

INSERT INTO `designation_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Front End Specialist', 1, '2025-09-03 07:40:30', '2025-09-03 07:40:30', NULL),
(6, 'Backend Engineers', 1, '2025-09-03 07:40:41', '2025-09-03 07:40:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_skill_types`
--

DROP TABLE IF EXISTS `extra_skill_types`;
CREATE TABLE IF NOT EXISTS `extra_skill_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_skill_types`
--

INSERT INTO `extra_skill_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UV', 1, '2025-09-01 08:58:25', '2025-09-01 08:58:25'),
(4, 'UX', 1, '2025-09-01 06:53:53', '2025-09-01 06:53:53'),
(5, 'Ku', 1, '2025-09-01 08:55:21', '2025-09-01 08:55:21'),
(7, 'UV Design', 1, '2025-09-01 09:00:26', '2025-09-01 09:00:26'),
(9, 'Ui king', 1, '2025-09-01 09:10:47', '2025-09-01 09:10:47'),
(10, 'Php', 1, '2025-09-01 11:57:47', '2025-09-01 11:57:47'),
(11, 'kim', 1, '2025-09-01 12:02:19', '2025-09-01 12:02:19'),
(12, 'Ud', 1, '2025-09-02 05:58:08', '2025-09-02 05:58:08'),
(13, 'UJ', 1, '2025-09-02 06:42:59', '2025-09-02 06:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `language_types`
--

DROP TABLE IF EXISTS `language_types`;
CREATE TABLE IF NOT EXISTS `language_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_types`
--

INSERT INTO `language_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Russian', 1, '2025-08-29 11:40:36', '2025-08-29 11:40:36', NULL),
(3, 'Spanish', 1, '2025-09-01 12:53:53', '2025-09-01 12:53:53', NULL),
(4, 'French', 1, '2025-09-01 12:54:13', '2025-09-01 12:54:13', NULL),
(5, 'Mandarin', 1, '2025-09-01 12:59:37', '2025-09-01 12:59:37', NULL),
(6, 'bca', 1, '2025-09-01 13:12:17', '2025-09-01 13:12:17', '2025-10-16 12:02:33'),
(7, 'rca', 1, '2025-09-01 13:12:28', '2025-09-01 13:12:28', NULL),
(8, 'rca', 1, '2025-09-01 13:15:12', '2025-09-01 13:15:12', NULL),
(9, 'bba', 1, '2025-09-01 13:20:00', '2025-09-01 13:20:00', NULL),
(10, 'latin', 1, '2025-09-02 05:54:19', '2025-09-02 05:54:19', NULL),
(11, 'Graphic designs', 1, '2025-09-02 06:02:55', '2025-09-02 06:02:55', NULL),
(12, 'Hindi', 1, '2025-10-16 12:02:30', '2025-10-16 12:02:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_types`
--

DROP TABLE IF EXISTS `plan_types`;
CREATE TABLE IF NOT EXISTS `plan_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_types`
--

INSERT INTO `plan_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Yearly', 1, '2025-09-01 12:13:43', '2025-09-01 12:13:43', NULL),
(5, 'Fortnightly', 1, '2025-09-02 05:52:08', '2025-09-02 05:52:08', NULL),
(6, 'Monthly', 1, '2025-09-03 07:41:28', '2025-09-03 07:41:28', NULL),
(7, 'Weekly', 1, '2025-09-03 07:41:36', '2025-09-03 07:41:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programming_skill_types`
--

DROP TABLE IF EXISTS `programming_skill_types`;
CREATE TABLE IF NOT EXISTS `programming_skill_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programming_skill_types`
--

INSERT INTO `programming_skill_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Assembly', 1, '2025-08-29 11:37:47', '2025-08-29 11:37:47', NULL),
(5, 'Java', 1, '2025-09-03 07:39:31', '2025-09-03 07:39:31', NULL),
(6, 'C++', 1, '2025-09-03 07:39:42', '2025-09-03 07:39:42', NULL),
(7, 'Cobol', 1, '2025-09-03 07:39:52', '2025-09-03 07:39:52', NULL),
(8, 'Fortran', 1, '2025-09-03 07:40:00', '2025-09-03 07:40:00', NULL),
(9, 'PHP', 1, '2025-10-16 11:47:45', '2025-10-16 11:47:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qualification_types`
--

DROP TABLE IF EXISTS `qualification_types`;
CREATE TABLE IF NOT EXISTS `qualification_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualification_types`
--

INSERT INTO `qualification_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'LLM', 1, '2025-09-01 05:36:09', '2025-09-01 05:36:09'),
(6, 'LLB', 1, '2025-09-02 06:01:22', '2025-09-02 06:01:22'),
(7, 'Php Dev', 1, '2025-09-03 07:48:27', '2025-09-03 07:48:27'),
(8, 'Web Dev', 1, '2025-09-03 08:29:34', '2025-09-03 08:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `skill_list_types`
--

DROP TABLE IF EXISTS `skill_list_types`;
CREATE TABLE IF NOT EXISTS `skill_list_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill_list_types`
--

INSERT INTO `skill_list_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Code Optmization', NULL, '2025-08-29 11:52:48', '2025-08-29 11:52:48'),
(4, 'Indexing', NULL, '2025-09-03 07:47:35', '2025-09-03 07:47:35'),
(5, 'Reo', NULL, '2025-09-03 07:47:43', '2025-09-03 07:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_posts`
--

DROP TABLE IF EXISTS `user_blog_posts`;
CREATE TABLE IF NOT EXISTS `user_blog_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `post_title` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(320) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `user_id`, `name`, `email`, `phone_no`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 27, 'John Doe', 'john@example.com', '9876543210', 'Hello, I want to know more.', NULL, '2025-09-02 07:34:12', '2025-09-02 07:34:12'),
(2, 1, 'John Row', 'row@example.com', '9976543210', 'Hello, I want to know less.', NULL, '2025-09-02 07:35:22', '2025-09-02 07:35:22'),
(6, 62, 'Johnnie Crane', 'johnniecrane@gmail.com', '7644945964', 'Hi\nThis is a test message', 1, '2025-09-16 06:59:04', '2025-09-16 06:59:04'),
(7, 62, 'Mohit', 'rama@gmail.com', '7644945964', 'This is regarding a contact form', 1, '2025-09-18 07:40:03', '2025-09-18 07:40:03'),
(8, 62, 'John Constantin', 'john_cons@gmail.com', '7644945964', 'This is regarding job', 1, '2025-09-18 07:43:44', '2025-09-18 07:43:44'),
(9, 62, 'John Constantin', 'john_cons@gmail.com', '7644945964', 'This is regarding job', 1, '2025-09-18 08:31:17', '2025-09-18 08:31:17'),
(10, 62, 'Zhou Enlai', 'baron_manchausen@gmail.com', '7644945984', 'Hi This is ZHOU calling', 1, '2025-09-18 08:32:51', '2025-09-18 08:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

DROP TABLE IF EXISTS `user_languages`;
CREATE TABLE IF NOT EXISTS `user_languages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  `user_efficiency` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `user_id`, `language_id`, `user_efficiency`, `status`, `created_at`, `updated_at`) VALUES
(1, 62, 1, '23', 1, '2025-09-03 10:50:24', '2025-09-03 10:50:24'),
(2, 62, 5, '35', 1, '2025-09-09 05:57:00', '2025-09-09 05:57:00'),
(3, 62, 4, '47', 1, '2025-09-09 05:58:07', '2025-09-09 05:58:07'),
(4, 9, 4, '33', 1, '2025-09-09 05:58:07', '2025-09-09 05:58:07'),
(5, 9, 10, '24', 1, '2025-09-09 12:32:25', '2025-09-09 12:32:25'),
(6, 9, 1, '100', 1, '2025-09-10 08:58:28', '2025-09-10 08:58:28'),
(7, 66, 1, '100', 1, '2025-09-19 12:09:54', '2025-09-19 12:09:54'),
(8, 66, 1, '100', 1, '2025-09-19 12:09:54', '2025-09-19 12:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan_prices`
--

DROP TABLE IF EXISTS `user_plan_prices`;
CREATE TABLE IF NOT EXISTS `user_plan_prices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `plan_type_id` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `skill_types` smallint DEFAULT NULL,
  `popularity_type` smallint DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_plan_prices`
--

INSERT INTO `user_plan_prices` (`id`, `user_id`, `plan_type_id`, `price`, `skill_types`, `popularity_type`, `status`, `created_at`, `updated_at`) VALUES
(8, 62, 3, 11, 1, 0, NULL, '2025-09-10 06:36:13', '2025-09-10 06:36:13'),
(9, 62, 5, 25, 5, 0, NULL, '2025-09-10 06:36:27', '2025-09-10 06:36:27'),
(10, 62, 6, 50, 6, 1, NULL, '2025-09-10 06:37:13', '2025-09-10 06:37:13'),
(11, 62, 7, 5, 7, 1, NULL, '2025-09-10 06:37:31', '2025-09-10 06:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `residence` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pincode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `punchline` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `languages_id` int DEFAULT NULL,
  `programming_languages_id` int DEFAULT NULL,
  `programming_efficiency` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `language_efficiency` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `extra_skills_id` int DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `projects_completed` int DEFAULT NULL,
  `customer_count` int DEFAULT NULL,
  `award_count` int DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `residence`, `city`, `state`, `pincode`, `dob`, `file_name`, `designation_id`, `punchline`, `languages_id`, `programming_languages_id`, `programming_efficiency`, `language_efficiency`, `extra_skills_id`, `experience`, `projects_completed`, `customer_count`, `award_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 62, 'Khajai Imli', 'patna', 'Bihar', '805105', '0000-00-00', 'dummy face.jpg', '\'5\',\'6\'', 'Checkout my Portfolio', NULL, 1, NULL, NULL, NULL, 2, 3, 2, 2, 1, '2025-09-02 10:54:59', '2025-09-19 10:22:44'),
(9, NULL, 'Khajai Imli', 'patna', 'Bihar', '801505', '2025-09-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, 3, 1, '2025-09-05 12:58:10', '2025-09-05 13:05:58'),
(10, 9, '', 'patna', 'Chongqing', '801505', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, '2025-09-08 07:29:25', '2025-09-08 07:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_programming_languages`
--

DROP TABLE IF EXISTS `user_programming_languages`;
CREATE TABLE IF NOT EXISTS `user_programming_languages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `programming_language_id` int DEFAULT NULL,
  `user_efficiency` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_programming_languages`
--

INSERT INTO `user_programming_languages` (`id`, `user_id`, `programming_language_id`, `user_efficiency`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '12', 1, '2025-09-09 05:26:25', '2025-09-09 05:26:25'),
(2, 9, 6, '45', 1, '2025-09-09 05:26:25', '2025-09-09 05:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

DROP TABLE IF EXISTS `user_projects`;
CREATE TABLE IF NOT EXISTS `user_projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`id`, `category_id`, `user_id`, `title`, `description`, `file_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 0, 'Title', 'This is a test', '', NULL, '2025-09-03 11:36:16', '2025-09-03 11:36:16'),
(2, 23, 0, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:39:21', '2025-09-03 11:39:21'),
(3, 23, 0, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:39:29', '2025-09-03 11:39:29'),
(4, 23, 0, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:39:32', '2025-09-03 11:39:32'),
(5, 23, 0, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:43:06', '2025-09-03 11:43:06'),
(6, 25, 0, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:45:13', '2025-09-03 11:45:13'),
(7, 25, 1, 'Ttile', 'This is a test', '', NULL, '2025-09-03 11:50:22', '2025-09-03 11:50:22'),
(8, 25, 1, 'Ttile', 'This is a test', '', 1, '2025-09-03 11:56:25', NULL),
(9, 25, 1, 'Ttile', 'This is a test', '', 1, '2025-09-03 11:56:27', NULL),
(10, 23, 1, 'Ttile', 'This is a test', '', 1, '2025-09-03 11:58:32', NULL),
(11, 25, 9, 'rama', 'test', 'Capture001.png', 1, '2025-09-11 05:56:16', '2025-09-11 06:06:28'),
(12, 25, 9, 'rama', 'test', 'Capture001.png', 1, '2025-09-11 06:04:01', '2025-09-11 06:06:28'),
(13, 26, 62, 'My Project', 'This is my project', 'Capture001.png', 1, '2025-09-11 06:06:04', '2025-09-19 07:22:51'),
(14, 0, 9, 'title', 'This is a test', 'hero-image.jpg', 1, '2025-09-11 06:58:02', '2025-09-11 09:22:59'),
(15, 0, 9, 'title', 'This is a test', 'hero-image.jpg', 1, '2025-09-11 09:06:40', '2025-09-11 09:22:59'),
(16, 0, 9, 'title', 'This is a test', 'hero-image.jpg', 1, '2025-09-11 09:08:12', '2025-09-11 09:22:59'),
(17, 0, 9, 'title', 'This is a test', 'hero-image.jpg', 1, '2025-09-11 09:12:20', '2025-09-11 09:22:59'),
(18, 28, 62, 'Another Project', 'Another one of my project', 'hero-image.jpg', 1, '2025-09-11 12:07:15', '2025-09-19 07:22:56'),
(19, 25, 66, 'Resume', 'Done', 'logo-dark.png', 1, '2025-09-19 12:10:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_qualification_details`
--

DROP TABLE IF EXISTS `user_qualification_details`;
CREATE TABLE IF NOT EXISTS `user_qualification_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `qualification_id` int DEFAULT NULL,
  `type` enum('job','edu') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `certification` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_qualification_details`
--

INSERT INTO `user_qualification_details` (`id`, `user_id`, `qualification_id`, `type`, `start_date`, `end_date`, `description`, `certification`, `file_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 62, 7, 'job', '2025-09-08', '2025-09-10', 'You have done very good here', 'Very fine ', NULL, 1, '2025-09-12 10:14:18', '2025-09-12 10:15:24'),
(2, 62, 3, 'edu', '2025-04-01', '2025-11-14', 'You have fone very much fine', 'Brilliant ', NULL, 1, '2024-09-03 10:22:33', '2025-09-18 10:15:35'),
(3, 62, 8, 'job', '2025-09-10', '2025-09-25', 'This I have done verywell', 'Satisfying', NULL, NULL, NULL, '2025-09-18 10:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_registrations`
--

DROP TABLE IF EXISTS `user_registrations`;
CREATE TABLE IF NOT EXISTS `user_registrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(56) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pincode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telegram` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skype` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `personal_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `office_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registrations`
--

INSERT INTO `user_registrations` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `token`, `country`, `street`, `pincode`, `telegram`, `skype`, `personal_no`, `support_no`, `office_no`, `status`, `created_at`, `updated_at`) VALUES
(61, 'Mohit', 'Singh', 'Mohit_Singh', 'anandmohitsingh@gmail.com', 'oldeuboi', '6c8aeccd21eae6ad11acd0c9d2eca19a', 'India', 'Maa Anandmayee Colony', '801505', 'moe_tele', 'moe_skype', '7644945964', '6299591327', '8252779560', 1, '2025-09-19 05:39:06', '2025-09-19 05:41:46'),
(62, 'Mohit', 'Anand', '', 'teru@mail.com', '', 'mg7zRtFgmg7zRtFgmg7zRtFg', 'India', 'Chesire', '805105', 'terutele', 'teruskype', '6299591327', '7488401368', '8252779560', 1, '2025-09-08 09:24:28', '2025-09-19 10:22:44'),
(64, 'Mohit', 'Anand', 'Mohit_Anand', 'moesin@gmail.com', 'oldeuboi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-09-19 10:33:57', '2025-09-19 10:33:57'),
(65, 'Pradeep', 'Rangnathan', 'Pradeep_Rangnathan', 'pranga@gmail.com', 'ramayana', 'fb87ce61ac5d8ef39bb9dd1f0eeeb84e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-09-19 10:35:14', '2025-09-19 10:35:14'),
(66, 'Shyam', 'Sundar', 'Shyam_Sundar', 'shyam_sundar@gmail.com', 'shyam_sundar', 'd7520c54356bfe83cc6e06c4a66d0d0f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-09-19 12:06:36', '2025-09-19 12:06:36'),
(67, 'Jason', 'Borune', 'Jason_Borune', 'jb@email.com', '123456789', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-09-19 12:36:45', '2025-09-19 12:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

DROP TABLE IF EXISTS `user_reviews`;
CREATE TABLE IF NOT EXISTS `user_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation_id` enum('') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` smallint DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

DROP TABLE IF EXISTS `user_services`;
CREATE TABLE IF NOT EXISTS `user_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 62, 'Web Apps', 'I build web apps and other thing\nlike that whihc give me\npleasure', 1, '2025-09-16 07:37:24', '2025-09-16 07:38:10'),
(2, 62, 'Mobile Apps', 'I create mobile applications and other many thingswhcihc give me genuine pleasure as a mobile developer', 1, '2025-09-16 08:42:09', '2025-09-16 08:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills_to_show`
--

DROP TABLE IF EXISTS `user_skills_to_show`;
CREATE TABLE IF NOT EXISTS `user_skills_to_show` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `skill_list_id` int DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_skills_to_show`
--

INSERT INTO `user_skills_to_show` (`id`, `user_id`, `skill_list_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 62, 1, NULL, '2025-09-10 05:47:05', '2025-09-10 05:47:05'),
(10, 62, 4, NULL, '2025-09-10 05:47:30', '2025-09-10 05:47:30'),
(11, 62, 5, NULL, '2025-09-10 07:19:57', '2025-09-10 07:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_social_icons`
--

DROP TABLE IF EXISTS `user_social_icons`;
CREATE TABLE IF NOT EXISTS `user_social_icons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `url` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_social_icons`
--

INSERT INTO `user_social_icons` (`id`, `user_id`, `url`, `filename`, `status`, `created_at`, `updated_at`) VALUES
(6, 62, 'https://www.facebook.com', 'meta.png', 1, '2025-09-11 09:04:04', '2025-09-11 09:04:04'),
(7, 62, 'https://x.com/', 'X.jpg', 1, '2025-09-11 09:04:42', '2025-09-11 09:04:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

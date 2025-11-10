-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2025 at 03:52 AM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techiesquad1_resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web Development', 1, '2025-11-07 10:30:57', '2025-11-07 10:30:57', NULL),
(2, 'SEO', 1, '2025-11-07 10:31:03', '2025-11-07 10:31:03', NULL),
(3, 'Marketing', 1, '2025-11-07 10:31:12', '2025-11-07 10:31:12', NULL),
(4, 'MLM', 1, '2025-11-07 10:31:27', '2025-11-07 10:31:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_types`
--

CREATE TABLE `designation_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation_types`
--

INSERT INTO `designation_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Softwate Developer', 1, '2025-11-07 10:31:45', '2025-11-07 10:31:45', NULL),
(2, 'Tester', 1, '2025-11-07 10:31:51', '2025-11-07 10:31:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_types`
--

CREATE TABLE `education_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_types`
--

INSERT INTO `education_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '10th', 1, '2025-11-07 10:37:38', '2025-11-07 10:37:38', NULL),
(2, '12th', 1, '2025-11-07 10:37:43', '2025-11-07 10:37:43', NULL),
(3, 'BCA', 1, '2025-11-07 10:37:50', '2025-11-07 10:37:50', NULL),
(4, 'B.Tech', 1, '2025-11-07 10:37:57', '2025-11-07 10:37:57', NULL),
(5, 'MCA', 1, '2025-11-07 10:38:34', '2025-11-07 10:38:34', NULL),
(6, 'M.Tech', 1, '2025-11-07 10:38:41', '2025-11-07 10:38:41', NULL),
(7, 'Other', 1, '2025-11-07 10:38:46', '2025-11-07 10:38:46', NULL),
(8, 'BA', 1, '2025-11-07 10:50:15', '2025-11-07 10:50:15', NULL),
(9, 'B.sc', 1, '2025-11-07 10:50:29', '2025-11-07 10:50:29', NULL),
(10, 'Bcom', 1, '2025-11-07 10:50:35', '2025-11-07 10:50:35', NULL),
(11, 'MA', 1, '2025-11-07 10:50:39', '2025-11-07 10:50:39', NULL),
(12, 'M.sc', 1, '2025-11-07 10:50:49', '2025-11-07 10:50:49', NULL),
(13, 'Mcom', 1, '2025-11-07 10:50:53', '2025-11-07 10:50:53', NULL),
(14, 'BBA', 1, '2025-11-07 10:51:02', '2025-11-07 10:51:02', NULL),
(15, 'MBA', 1, '2025-11-07 10:51:10', '2025-11-07 10:51:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_skill_types`
--

CREATE TABLE `extra_skill_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_skill_types`
--

INSERT INTO `extra_skill_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Typing', 1, '2025-11-07 10:34:31', '2025-11-07 10:34:31', NULL),
(2, 'Cricket', 1, '2025-11-07 10:34:41', '2025-11-07 10:34:41', NULL),
(3, 'Public Speaking', 1, '2025-11-07 10:34:51', '2025-11-07 10:34:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_types`
--

CREATE TABLE `language_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_types`
--

INSERT INTO `language_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hindi', 1, '2025-11-07 10:33:31', '2025-11-07 10:33:31', NULL),
(2, 'English', 1, '2025-11-07 10:33:38', '2025-11-07 10:33:38', NULL),
(3, 'Spanies', 1, '2025-11-07 10:33:49', '2025-11-07 10:33:49', NULL),
(4, 'Japanese', 1, '2025-11-07 10:34:21', '2025-11-07 10:34:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_types`
--

CREATE TABLE `plan_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_types`
--

INSERT INTO `plan_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Daily', 1, '2025-11-07 10:32:00', '2025-11-07 10:32:00', NULL),
(2, 'Weekly', 1, '2025-11-07 10:32:07', '2025-11-07 10:32:07', NULL),
(3, 'Monthly', 1, '2025-11-07 10:32:12', '2025-11-07 10:32:12', NULL),
(4, 'Yearly', 1, '2025-11-07 10:32:18', '2025-11-07 10:32:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programming_skill_types`
--

CREATE TABLE `programming_skill_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programming_skill_types`
--

INSERT INTO `programming_skill_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PHP', 1, '2025-11-07 10:32:28', '2025-11-07 10:32:28', NULL),
(2, 'Laravel', 1, '2025-11-07 10:32:33', '2025-11-07 10:32:33', NULL),
(3, 'HTML', 1, '2025-11-07 10:32:38', '2025-11-07 10:32:38', NULL),
(4, 'CSS', 1, '2025-11-07 10:32:44', '2025-11-07 10:32:44', NULL),
(5, 'Javascript', 1, '2025-11-07 10:32:51', '2025-11-07 10:32:51', NULL),
(6, 'Bootstrap', 1, '2025-11-07 10:32:58', '2025-11-07 10:32:58', NULL),
(7, 'jQuery', 1, '2025-11-07 10:33:06', '2025-11-07 10:33:06', NULL),
(8, 'Ajax', 1, '2025-11-07 10:33:11', '2025-11-07 10:33:11', NULL),
(9, 'API', 1, '2025-11-07 10:33:17', '2025-11-07 10:33:17', NULL),
(10, 'MySql', 1, '2025-11-07 10:33:24', '2025-11-07 10:33:24', NULL),
(11, 'Java', 1, '2025-11-10 07:00:54', '2025-11-10 07:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_list_types`
--

CREATE TABLE `skill_list_types` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill_list_types`
--

INSERT INTO `skill_list_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Programming', 1, '2025-11-07 10:39:12', '2025-11-07 10:39:12', NULL),
(2, 'Non Programming', 1, '2025-11-07 10:40:29', '2025-11-07 10:40:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_posts`
--

CREATE TABLE `user_blog_posts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `post_title` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(320) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_us`
--

CREATE TABLE `user_contact_us` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_extra_skills`
--

CREATE TABLE `user_extra_skills` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `skill_list_id` int DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_extra_skills`
--

INSERT INTO `user_extra_skills` (`id`, `user_id`, `skill_list_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-11-10 06:33:34', '2025-11-10 06:33:34'),
(2, 1, 2, 1, '2025-11-10 06:33:34', '2025-11-10 06:33:34'),
(3, 1, 3, 1, '2025-11-10 06:33:34', '2025-11-10 06:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE `user_languages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  `user_efficiency` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `user_id`, `language_id`, `user_efficiency`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '80', 1, '2025-11-10 06:15:39', '2025-11-10 06:15:39'),
(2, 1, 2, '75', 1, '2025-11-10 06:15:39', '2025-11-10 06:15:39'),
(3, 1, 3, '40', 1, '2025-11-10 06:15:39', '2025-11-10 06:15:39'),
(4, 1, 4, '30', 1, '2025-11-10 06:15:39', '2025-11-10 06:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `plan_type_id` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `skill_types` smallint DEFAULT NULL,
  `popularity_type` smallint DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `user_id`, `plan_type_id`, `price`, `skill_types`, `popularity_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 9, 1, 10, 1, '2025-11-10 06:34:12', '2025-11-10 06:34:12'),
(2, 1, 2, 50, 1, 10, 1, '2025-11-10 06:34:12', '2025-11-10 06:34:12'),
(3, 1, 3, 199, 1, 10, 1, '2025-11-10 06:34:12', '2025-11-10 06:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_programming_languages`
--

CREATE TABLE `user_programming_languages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `programming_language_id` int DEFAULT NULL,
  `user_efficiency` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_programming_languages`
--

INSERT INTO `user_programming_languages` (`id`, `user_id`, `programming_language_id`, `user_efficiency`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '70', 1, '2025-11-10 06:15:20', '2025-11-10 06:15:20'),
(2, 1, 2, '80', 1, '2025-11-10 06:15:20', '2025-11-10 06:15:20'),
(3, 1, 3, '70', 1, '2025-11-10 06:15:20', '2025-11-10 06:15:20'),
(4, 1, 10, '75', 1, '2025-11-10 06:15:20', '2025-11-10 06:15:20'),
(5, 1, 11, '40', 1, '2025-11-10 07:00:54', '2025-11-10 07:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE `user_projects` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`id`, `category_id`, `user_id`, `title`, `description`, `file_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hospital Management', 'Hospital management oversees healthcare operations, staff, resources, and patient services to ensure efficient, safe, and quality medical care delivery', 'project_6911867f1ea2e.jpg', 1, '2025-11-10 06:30:23', '2025-11-10 06:32:47'),
(3, 4, 1, 'Network Marketing', 'Network marketing is a business model where individuals sell products directly and earn commissions by recruiting others to join their sales network.', 'project_691186c5b52df.jpg', 1, '2025-11-10 06:31:33', '2025-11-10 06:32:57'),
(4, 2, 1, 'Web Optimization', 'Website optimization enhances site performance, speed, user experience, and search visibility by refining design, content, code, and technical elements', 'project_6911b3cd1478b.png', 1, '2025-11-10 09:43:41', '2025-11-10 09:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualification_details`
--

CREATE TABLE `user_qualification_details` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `education_id` int DEFAULT NULL,
  `qualification_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qualification_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `certification` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_qualification_details`
--

INSERT INTO `user_qualification_details` (`id`, `user_id`, `education_id`, `qualification_type`, `qualification_title`, `start_date`, `end_date`, `description`, `certification`, `file_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Education', 'Batchlor of computer application', '2025-11-11', '2025-11-14', 'Bachelor of Computer Applications teaches software, programming, networking, and IT fundamentals.', 'Best Proje', NULL, 1, '2025-11-10 06:35:31', '2025-11-10 06:35:31'),
(2, 1, 5, 'Education', 'Master of computer application', '0000-00-00', '0000-00-00', 'Master of Computer Applications (MCA) is a postgraduate degree focusing on advanced software development, system design, networking, and IT management.', '', NULL, 1, '2025-11-10 06:46:38', '2025-11-10 06:46:38'),
(3, 1, 0, 'Work', 'SEO', '0000-00-00', '0000-00-00', 'Web development involves designing, building, and maintaining websites using coding, frameworks, and tools to ensure functionality, performance, and user experience.', '', NULL, 1, '2025-11-10 06:47:47', '2025-11-10 06:47:47'),
(4, 1, 0, 'Work', 'Web Development', '2025-11-11', '2025-11-21', 'Software testing is the process of evaluating and verifying that a software application functions correctly, meets requirements, and is free of defects.', 'No', NULL, 1, '2025-11-10 06:47:47', '2025-11-10 06:47:47'),
(5, 1, 2, 'Education', '', '0000-00-00', '0000-00-00', 'Class 12th', '', NULL, 1, '2025-11-10 07:43:11', '2025-11-10 07:43:11'),
(6, 1, 0, 'Work', 'MLM', '2025-11-08', '2025-11-14', 'Network Marketing', 'non', NULL, 1, '2025-11-10 09:40:59', '2025-11-10 09:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_registrations`
--

CREATE TABLE `user_registrations` (
  `id` int NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plain_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `city` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pincode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `personal_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `office_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telegram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `punchline` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_count` int DEFAULT NULL,
  `award_count` int DEFAULT NULL,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `experience` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registrations`
--

INSERT INTO `user_registrations` (`id`, `first_name`, `last_name`, `user_type`, `user_name`, `email`, `plain_password`, `password`, `token`, `mobile`, `dob`, `address`, `city`, `state`, `pincode`, `country`, `designation`, `personal_no`, `support_no`, `office_no`, `telegram`, `skype`, `punchline`, `customer_count`, `award_count`, `linkedin`, `experience`, `project`, `profile_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin', 'Super Admin', 'admin@gmail.com', 'admin@123', '$2y$10$RxAZseai6q1qrocCRpwBu.vv8ppbE0/sAOn7unmUnD5wMhaBi/1L6', '9a97eec5ec234a8d8ba8fd03deba967c1', '9876543210', '2025-11-12', 'Patna, Bihar', 'Patna', 'Bihar', '801503', 'India', 'Software Developer', '123456789', '5874658974', '8745985748', 'abcddsdsdsdsds', 'dsdsdsdsdsdsd', 'Groww Your Carieer', 6, 5, 'kundansss.linkedin', '2years', '5', '../../uploads/profile/69118384477bf.jpg', 1, '2025-10-30 09:26:25', '2025-11-10 06:17:40'),
(2, 'Kundan', 'Singh', NULL, 'Kundan Singh', 'kundan123@gmail.com', '12345678', '$2y$10$C2jx5oF6F87tpFcgiq2lwOAoi66a8s.HFHhXNdygrH1xPzqGv9rMW', '9a97eec5ec234a8d8ba8fd03deba967c', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-07 11:52:45', '2025-11-07 11:52:45'),
(3, 'Chandan', 'Singh', NULL, 'Chandan Singh', 'chandan123@gmail.com', '12345678', '$2y$10$F/yQLfhcEk3qjOWajCzcPuMkXIUp4Yd25jnCE4NDiWh0H5Z3l5Ocy', '825f29259215b4f7822ddc570243c06f', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-07 12:01:37', '2025-11-07 12:01:37'),
(4, 'Demo', 'Demo', NULL, 'Demo Demo', 'demo@gmail.com', '12345678', '$2y$10$ZX3DMrbnJlG4lU//TSqVD.gKzm0ruj7TkDGv4jpDezP5w1pp517x.', '3694c2fc19bebe21e7a41d20ebd7f983', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-10 07:22:16', '2025-11-10 07:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation_id` enum('') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` smallint DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 'Web development involves designing, building, and maintaining websites using coding, frameworks, and tools to ensure functionality, performance, and user experience.', 1, '2025-11-10 06:14:52', '2025-11-10 06:14:52'),
(2, 1, 'SEO', 'SEO improves website visibility by optimizing content, keywords, and structure to rank higher in search engines and attract organic traffic', 1, '2025-11-10 06:14:52', '2025-11-10 06:14:52'),
(3, 1, 'Web Hosting', 'Web hosting provides storage and access for websites on internet servers, enabling users to view content online anytime, anywhere.', 1, '2025-11-10 06:14:52', '2025-11-10 06:14:52'),
(4, 1, 'Domain', 'A domain is a unique web address that identifies a website, making it accessible online through browsers and search engines.', 1, '2025-11-10 06:14:52', '2025-11-10 06:14:52'),
(5, 1, 'Marketing', 'Software marketing promotes digital products through strategies like advertising, content, SEO, and demos to attract users and drive sales growth.', 1, '2025-11-10 06:49:10', '2025-11-10 06:49:10'),
(6, 1, 'Support', 'Support refers to assistance or help provided to individuals or systems to solve problems, improve performance, or ensure smooth functioning.', 1, '2025-11-10 06:49:10', '2025-11-10 06:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_social_icons`
--

CREATE TABLE `user_social_icons` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `url` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` smallint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_types`
--
ALTER TABLE `designation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_types`
--
ALTER TABLE `education_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_skill_types`
--
ALTER TABLE `extra_skill_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_types`
--
ALTER TABLE `language_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_types`
--
ALTER TABLE `plan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_skill_types`
--
ALTER TABLE `programming_skill_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_list_types`
--
ALTER TABLE `skill_list_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_blog_posts`
--
ALTER TABLE `user_blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_extra_skills`
--
ALTER TABLE `user_extra_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_programming_languages`
--
ALTER TABLE `user_programming_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_projects`
--
ALTER TABLE `user_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_qualification_details`
--
ALTER TABLE `user_qualification_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registrations`
--
ALTER TABLE `user_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_icons`
--
ALTER TABLE `user_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation_types`
--
ALTER TABLE `designation_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education_types`
--
ALTER TABLE `education_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `extra_skill_types`
--
ALTER TABLE `extra_skill_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_types`
--
ALTER TABLE `language_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_types`
--
ALTER TABLE `plan_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programming_skill_types`
--
ALTER TABLE `programming_skill_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skill_list_types`
--
ALTER TABLE `skill_list_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_blog_posts`
--
ALTER TABLE `user_blog_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_extra_skills`
--
ALTER TABLE `user_extra_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_languages`
--
ALTER TABLE `user_languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_programming_languages`
--
ALTER TABLE `user_programming_languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_projects`
--
ALTER TABLE `user_projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_qualification_details`
--
ALTER TABLE `user_qualification_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_registrations`
--
ALTER TABLE `user_registrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_social_icons`
--
ALTER TABLE `user_social_icons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

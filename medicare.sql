-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2021 at 03:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance_transactions`
--

CREATE TABLE `balance_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `previous_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `moved_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `new_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `addedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cookie` text COLLATE utf8mb4_unicode_ci,
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'temp',
  `addedby_id` bigint(20) DEFAULT NULL,
  `editedby_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `title`, `description`, `company_code`, `mobile`, `email`, `address`, `zip_code`, `city`, `country`, `logo_name`, `status`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Multisoft', 'software firm', 'ac123', '01918515567', 'masudbdm@gmail.com', 'Dhaka', '1212', 'Dhaka', 'Bangladesh', NULL, 'active', 1, 1, '2020-12-24 10:49:08', '2020-12-27 12:25:25'),
(2, 2, 'office3', 'office3', 'oo003', '01671820622', 'atiqewu012@gmail.com', '285/1, Baharampur\r\nRajpara', '6000', 'Rajshahi', 'Bangladesh', NULL, 'active', 1, 1, '2020-12-24 10:50:18', '2020-12-24 10:51:41'),
(3, 4, 'Uk Test Company', 'uk test company', 'uktestcompany', '01880000000', 'ukmedicaretraining@gmail.com', 'uk', '15264', 'London', 'United Kingdom', NULL, 'active', 4, 4, '2020-12-27 05:35:26', '2020-12-27 05:36:50'),
(4, 1, 'Multisoft2', 'some description', 'multisoft2', '01918515567', 'masudbdm@gmail.com', 'some address', '15685', 'London', 'United Kingdom', NULL, 'active', NULL, 1, '2020-12-27 12:27:50', '2020-12-27 12:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `company_sub_roles`
--

CREATE TABLE `company_sub_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'temp',
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_sub_roles`
--

INSERT INTO `company_sub_roles` (`id`, `company_id`, `user_id`, `title`, `status`, `addedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'member', 'active', 1, '2020-12-24 10:59:16', '2020-12-24 10:59:36'),
(2, 1, 3, 'member 2', 'active', 1, '2020-12-24 10:59:37', '2020-12-24 11:01:02'),
(3, 1, 1, 'dezii', 'active', 1, '2020-12-24 11:01:02', '2020-12-24 11:01:50'),
(4, 1, NULL, NULL, 'temp', 1, '2020-12-24 11:01:51', '2020-12-24 11:01:51'),
(5, 4, 2, 'member', 'active', 1, '2020-12-27 12:34:57', '2020-12-27 12:35:21'),
(6, 4, 1, 'member', 'active', 1, '2020-12-27 12:35:21', '2020-12-27 12:37:35'),
(7, 4, NULL, NULL, 'temp', 1, '2020-12-27 12:37:36', '2020-12-27 12:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'temp',
  `course_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_level` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_achievement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `excerpt` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_credit` int(11) DEFAULT NULL,
  `course_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mandatory_unit` text COLLATE utf8mb4_unicode_ci,
  `entry_requirement` text COLLATE utf8mb4_unicode_ci,
  `assesments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accreditation` text COLLATE utf8mb4_unicode_ci,
  `how_to_apply` text COLLATE utf8mb4_unicode_ci,
  `optional_unit` text COLLATE utf8mb4_unicode_ci,
  `course_brochure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brochure_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `syllabus_file` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packageable` tinyint(1) DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `payment_one` decimal(10,2) DEFAULT NULL,
  `duration_one` int(11) DEFAULT NULL,
  `payment_one_details` text COLLATE utf8mb4_unicode_ci,
  `payment_two` decimal(10,2) DEFAULT NULL,
  `duration_two` int(11) DEFAULT NULL,
  `payment_two_details` text COLLATE utf8mb4_unicode_ci,
  `payment_three` decimal(10,2) DEFAULT NULL,
  `duration_three` int(11) DEFAULT NULL,
  `payment_three_details` text COLLATE utf8mb4_unicode_ci,
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `subject_id`, `status`, `course_type`, `course_level`, `course_achievement`, `title`, `description`, `excerpt`, `course_code`, `course_credit`, `course_mode`, `mandatory_unit`, `entry_requirement`, `assesments`, `accreditation`, `how_to_apply`, `optional_unit`, `course_brochure`, `brochure_ext`, `image_name`, `syllabus_file`, `packageable`, `featured`, `payment_one`, `duration_one`, `payment_one_details`, `payment_two`, `duration_two`, `payment_two_details`, `payment_three`, `duration_three`, `payment_three_details`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'published', 'Postgraduate', '1', 'Degree', 'Autism Spectrum Disorder', '<ul style=\"box-sizing: border-box; color: rgb(108, 117, 125); font-family: Lato, sans-serif; font-size: 16px; font-weight: 700; background-color: rgb(248, 249, 250);\"><li style=\"box-sizing: border-box;\">Understand what Autism is</li><li style=\"box-sizing: border-box;\">Know the most common types of Autism</li><li style=\"box-sizing: border-box;\">Understand that individuals will have differing experiences of Autism</li><li style=\"box-sizing: border-box;\">Understand approaches that improve wellbeing for people with Autism</li><li style=\"box-sizing: border-box;\">Understand the roles of carers and others in the support of people with Autism</li><li style=\"box-sizing: border-box;\">Understand factors influencing communication and interaction with people who have Autism</li><li style=\"box-sizing: border-box;\">Understand how a person-centred approach encourages positive communication</li><li style=\"box-sizing: border-box;\">Understand ways of working to ensure that diverse needs are met</li></ul>', 'Know the most common types of Autism.', 'MA11', 2, 'new', 'c m u', 'e r', 'c ass', 'acc', 'h a', 'o u', NULL, NULL, 'fi_MhB6UgDr1608989145.png', NULL, 1, 1, '2323.00', 3, 'p o d', '2323.00', 6, 'p t d', '3.00', 6, 'p t d', 1, NULL, '2020-12-13 04:53:10', '2020-12-27 14:00:54'),
(2, 2, 'published', 'Undergraduate', '1', 'Degree', 'Bed Rails', 'Learning outcomes\r\nIdentify the main types of bed rails and reasons for using them\r\nKnow the priorities of health and safety in the use of bed rails\r\nAppreciate the importance of client consent, choice and capacity\r\nUnderstand the potential risks and hazards of using bed rails\r\nDescribe the principles of risk assessment in reducing risks and hazards\r\nBe aware of the selection, safe fitting, and care of the client with bed rails.', 'Identify the main types of bed rails and reasons for using them\r\nKnow the priorities of health and safety in the use of bed rails', 'ccs', 2, '1', '1234', '23', '12', 'adsadad', 'asdasdasdasd', '34', NULL, NULL, 'fi_QulAEkiI1608988041.png', NULL, 1, 1, '1.00', 1, 'asdasd', '2.00', 1, '1', '2.00', 1, 'asdas', 1, NULL, '2020-12-13 05:01:43', '2020-12-26 13:07:21'),
(5, 2, 'published', 'Undergraduate', '2', 'Degree', 'Care Certificate', 'Learning outcomes\r\nLearning Outcomes\r\n\r\nUnderstand what challenging behaviours are\r\nRecognise the factors that may contribute to challenging behaviour\r\nUnderstand that behaviour is a form of communication\r\nKnow how person-centred approaches reduce the likelihood of challenging behaviours\r\nRecognise that poor care and lack of understanding can cause challenging behaviour', 'Understand what challenging behaviours are\r\nRecognise the factors that may contribute to challenging behaviour', 'care001', 3, '1', 'asdasdad', 'no requirement', 'Grading', NULL, NULL, 'asdad', NULL, 'pdf', 'fi_FXN6QZGN1608989227.png', 'br_H0ucEv0l1608808574.pdf', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 09:48:37', '2020-12-26 13:27:07'),
(6, 2, 'published', 'Undergraduate', '1', 'Topup Degree', 'Fire Safety & Emergency', 'Learning outcomes\r\nLearning Outcomes\r\n\r\nUnderstand the importance of food safety measures when providing food and drink for individuals\r\nUnderstand how to maintain hygiene when handling food and drink\r\nKnow how to meet safety requirements when preparing and serving food and drink for individuals\r\nUnderstand how to meet safety requirements when clearing away food and drink\r\nKnow how to store food and drink safely\r\nKnow how to access additional advice or support about food safety', 'Understand the importance of food safety measures when providing food and drink for individuals\r\nUnderstand how to maintain hygiene when handling food and drink', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_z6lMNRfy1607861545.jpg', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:00:33', '2020-12-27 12:14:30'),
(7, 2, 'published', 'Undergraduate', '1', 'Degree', 'Equality, Diversity & Inclusion', 'Learning outcomes\r\nLearning outcomes\r\n\r\nKnow what is meant by equality, diversity, inclusion and discrimination\r\nUnderstand how practices that support equality, diversity and inclusion reduce the likelihood of discrimination\r\nKnow key legislation and policies relating to equality, diversity, inclusion and discrimination', 'Know what is meant by equality, diversity, inclusion and discrimination\r\nUnderstand how practices that support equality, diversity and inclusion reduce the likelihood of discrimination', 'as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_ctG7e2Ni1608989298.png', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:07:03', '2020-12-26 13:28:18'),
(8, 3, 'published', 'Undergraduate', '1', 'Degree', 'Coronavirus (Covid 19)', 'Learning outcomes\r\nLearning Outcomes\r\n•  Identifying the origins of COVID-19\r\n•  Understanding the symptoms', 'Understanding  how  it  spreads  within  the  wider  community  and  care facilities', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_erQVdEAA1608989857.png', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:14:27', '2020-12-26 13:37:37'),
(9, 4, 'published', 'Undergraduate', '1', 'Degree', 'Safeguarding Children', 'Learning outcomes\r\nThis is a bolt on manual to the Safeguarding of an adult manual\r\nThis manual is to be completed in conjunction with the Safeguarding of an adult manual', 'This manual is to be completed in conjunction with the Safeguarding of an adult manual', 'bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_laMRdJxn1607862151.jpg', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:17:45', '2020-12-13 12:22:31'),
(10, 4, 'published', 'Undergraduate', '1', 'Degree', 'Malnutrition', 'Learning outcomes\r\nLearning Outcomes\r\n\r\nIdentify what are the elements of a well balanced diet.', 'Identify what are the elements of a well balanced diet.\r\nBe aware of the risk factors, cost, and consequences of malnutrition on the person.', 'as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_kkvj07z11607862455.jpg', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:22:32', '2020-12-13 12:27:36'),
(11, 2, 'published', 'Undergraduate', '1', 'Degree', 'Prevention of Pressure Ulcers', 'Understand the importance of food safety measures when providing food and drink for individuals\r\nUnderstand how to maintain hygiene when handling food and drink', 'Understand the importance of food safety measures when providing food and drink for individuals\r\nUnderstand how to maintain hygiene when handling food and drink', 'BF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_yS8vDDXQ1608989408.png', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:27:36', '2020-12-26 13:30:08'),
(12, 2, 'published', 'Undergraduate', '1', 'Award', 'Promoting Dignity', 'Learning outcomes\r\nLearning Outcomes\r\n\r\nUnderstand what is meant by ‘dignity’ and ‘compassion’\r\nKnow the ten point ‘dignity challenge’\r\nRecognise threats to dignity\r\nKnow how to work in a way that promotes dignity\r\nUnderstand appropriate ways of demonstrating compassion', 'Understand what is meant by ‘dignity’ and ‘compassion’\r\nKnow the ten point ‘dignity challenge’', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fi_UessGsAp1608989563.png', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:30:01', '2020-12-26 13:32:43'),
(13, NULL, 'temp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 12:53:08', '2020-12-13 12:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_answers`
--

CREATE TABLE `course_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_answers`
--

INSERT INTO `course_answers` (`id`, `course_id`, `course_topic_id`, `course_question_id`, `answer`, `correct`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(31, 1, 9, 27, 'ans1', 0, 1, 1, NULL, '2020-12-30 14:13:51', '2020-12-30 14:13:51'),
(32, 1, 9, 27, 'ans2', 0, 1, 1, NULL, '2020-12-30 14:13:54', '2020-12-30 14:13:54'),
(36, 1, 10, 32, 'asdf', 0, 1, 1, NULL, '2020-12-30 14:15:56', '2020-12-30 14:15:56'),
(37, 1, 10, 32, 'asdf asdf', 1, 1, 1, NULL, '2020-12-30 14:16:02', '2020-12-30 14:16:02'),
(41, 1, 9, 31, 'River', 0, 1, 1, NULL, '2020-12-31 03:07:09', '2020-12-31 03:07:09'),
(42, 1, 9, 31, 'pond', 0, 1, 1, NULL, '2020-12-31 03:07:25', '2020-12-31 03:07:25'),
(43, 1, 9, 31, 'Country', 1, 1, 1, NULL, '2020-12-31 03:07:40', '2020-12-31 03:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_questions`
--

CREATE TABLE `course_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `question_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_questions`
--

INSERT INTO `course_questions` (`id`, `course_id`, `course_topic_id`, `question`, `image_name`, `question_type`, `active`, `question_level`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(30, 1, 9, 'Q4?', NULL, 'mcq', 1, '1', 1, NULL, '2020-12-30 14:14:17', '2020-12-30 14:14:17'),
(31, 1, 9, 'What is BD?', NULL, 'mcq', 1, '1', 1, NULL, '2020-12-30 14:15:03', '2020-12-30 14:15:03'),
(32, 1, 10, 'asdfasdf', NULL, 'mcq', 1, '1', 1, NULL, '2020-12-30 14:15:46', '2020-12-30 14:15:46'),
(33, 1, 10, 'asdfasdfqwerqwer', NULL, 'mcq', 1, '1', 1, NULL, '2020-12-30 14:15:48', '2020-12-30 14:15:48'),
(34, 1, 10, 'asdfasdfqwerqwerqwerwqer', NULL, 'mcq', 1, '1', 1, NULL, '2020-12-30 14:15:51', '2020-12-30 14:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `course_random_question_papers`
--

CREATE TABLE `course_random_question_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_attempts` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `started_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_topics`
--

CREATE TABLE `course_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_topics`
--

INSERT INTO `course_topics` (`id`, `course_id`, `title`, `description`, `file_name`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(9, 1, 'asdfasdf', 'asdfasdf', NULL, 0, 0, NULL, '2020-12-30 14:13:13', '2020-12-30 14:13:13'),
(10, 1, 'asdfasdfasdf', 'asdfasdf sadfasdf', NULL, 0, 0, NULL, '2020-12-30 14:13:18', '2020-12-30 14:13:18'),
(11, 1, 'asdfasdfasdf asdfasdf', 'asdfasdf sadfasdf asdfsadf', NULL, 0, 0, NULL, '2020-12-30 14:13:23', '2020-12-30 14:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_mime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` int(10) UNSIGNED DEFAULT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2020_08_12_095404_create_companies_table', 1),
(5, '2018_11_07_105038_create_media_table', 2),
(6, '2018_07_04_163826_create_pages_table', 3),
(7, '2019_04_11_145253_create_page_items_table', 3),
(8, '2019_06_19_161007_create_subjects_table', 4),
(9, '2019_06_20_124831_create_courses_table', 4),
(10, '2016_12_08_075609_create_user_roles_table', 5),
(11, '2020_10_10_034354_create_company_sub_roles_table', 6),
(12, '2020_12_13_141955_create_packages_table', 7),
(13, '2020_12_13_151805_create_taken_packages_table', 8),
(14, '2020_12_13_154902_create_taken_courses_table', 9),
(15, '2020_12_13_170908_create_course_topics_table', 9),
(26, '2020_12_13_171649_create_course_questions_table', 10),
(27, '2020_12_13_175608_create_course_answers_table', 10),
(28, '2020_12_13_181433_create_course_random_question_papers_table', 10),
(29, '2020_12_13_182716_create_question_paper_items_table', 10),
(30, '2020_12_13_183517_create_taken_course_exams_table', 10),
(31, '2020_12_13_202344_create_taken_course_exam_items_table', 10),
(32, '2020_12_13_220213_create_orders_table', 10),
(33, '2020_12_13_220317_create_order_payments_table', 10),
(34, '2020_12_13_220339_create_balance_transactions_table', 10),
(35, '2020_12_13_221306_create_order_items_table', 10),
(36, '2020_12_13_234201_create_carts_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_number` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_for` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'package',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `grand_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_due` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pending_at` timestamp NULL DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `company_id`, `invoice_number`, `name`, `email`, `mobile`, `address`, `city`, `county`, `zipcode`, `country`, `order_for`, `order_status`, `payment_status`, `grand_total`, `total_paid`, `total_due`, `addedby_id`, `editedby_id`, `pending_at`, `confirmed_at`, `delivered_at`, `cancelled_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 14074, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Diamond Pa', 'delivered', 'paid', '170.00', '170.00', '0.00', NULL, 1, '2020-12-24 10:57:08', '2020-12-24 10:58:21', '2020-12-24 10:58:22', NULL, '2020-12-24 10:57:08', '2020-12-24 10:58:22'),
(2, 1, 1, 53542, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Silver Pac', 'delivered', 'paid', '59.00', '59.00', '0.00', NULL, 1, '2020-12-24 10:57:18', '2020-12-24 10:57:54', '2020-12-24 10:57:55', NULL, '2020-12-24 10:57:18', '2020-12-24 10:57:55'),
(3, 1, 1, 50322, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Ultimate P', 'delivered', 'paid', '190.00', '190.00', '0.00', NULL, 1, '2020-12-24 11:11:05', '2020-12-24 11:12:35', '2020-12-24 11:12:36', NULL, '2020-12-24 11:11:05', '2020-12-24 11:12:36'),
(4, 1, 1, 14615, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Silver Pac', 'delivered', 'paid', '59.00', '59.00', '0.00', NULL, 1, '2020-12-24 11:11:33', '2020-12-24 11:12:16', '2020-12-24 11:12:16', NULL, '2020-12-24 11:11:33', '2020-12-24 11:12:16'),
(5, 1, NULL, 65423, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Bronze Pac', 'pending', 'unpaid', '11.00', '0.00', '11.00', NULL, NULL, '2020-12-27 12:24:13', NULL, NULL, NULL, '2020-12-27 12:24:13', '2020-12-27 12:24:13'),
(6, 1, 4, 83217, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Silver Pac', 'delivered', 'paid', '59.00', '118.00', '0.00', NULL, 1, '2020-12-27 12:29:21', '2020-12-27 12:32:59', '2020-12-27 12:33:22', NULL, '2020-12-27 12:29:21', '2020-12-27 12:33:22'),
(7, 1, 1, 32922, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Diamond Pa', 'pending', 'unpaid', '170.00', '0.00', '170.00', NULL, NULL, '2020-12-27 13:09:40', NULL, NULL, NULL, '2020-12-27 13:09:40', '2020-12-27 13:09:40'),
(8, 1, 4, 59353, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', NULL, NULL, NULL, NULL, NULL, 'Diamond Pa', 'delivered', 'paid', '170.00', '170.00', '0.00', NULL, 1, '2020-12-27 13:12:24', '2020-12-27 13:13:47', '2020-12-27 13:13:49', NULL, '2020-12-27 13:12:24', '2020-12-27 13:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_for` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'package',
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pending_at` timestamp NULL DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `user_id`, `company_id`, `order_status`, `package_id`, `taken_package_id`, `total_price`, `order_for`, `addedby_id`, `editedby_id`, `pending_at`, `confirmed_at`, `delivered_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'delivered', 3, 2, '170.00', 'Diamond Pa', 1, 1, '2020-12-24 10:57:08', '2020-12-24 10:58:21', '2020-12-24 10:58:22', '2020-12-24 10:57:08', '2020-12-24 10:58:22'),
(2, 2, 1, 1, 'delivered', 6, 1, '59.00', 'Silver Pac', 1, 1, '2020-12-24 10:57:18', '2020-12-24 10:57:54', '2020-12-24 10:57:55', '2020-12-24 10:57:18', '2020-12-24 10:57:55'),
(3, 3, 1, 1, 'delivered', 2, 4, '190.00', 'Ultimate P', 1, 1, '2020-12-24 11:11:05', '2020-12-24 11:12:35', '2020-12-24 11:12:36', '2020-12-24 11:11:05', '2020-12-24 11:12:36'),
(4, 4, 1, 1, 'delivered', 6, 3, '59.00', 'Silver Pac', 1, 1, '2020-12-24 11:11:33', '2020-12-24 11:12:16', '2020-12-24 11:12:16', '2020-12-24 11:11:33', '2020-12-24 11:12:16'),
(5, 5, 1, NULL, 'pending', 7, NULL, '11.00', 'Bronze Pac', 1, NULL, '2020-12-27 12:24:13', NULL, NULL, '2020-12-27 12:24:13', '2020-12-27 12:24:13'),
(6, 6, 1, 4, 'delivered', 6, 5, '59.00', 'Silver Pac', 1, 1, '2020-12-27 12:29:22', '2020-12-27 12:32:59', '2020-12-27 12:33:22', '2020-12-27 12:29:22', '2020-12-27 12:33:22'),
(7, 7, 1, 1, 'pending', 3, NULL, '170.00', 'Diamond Pa', 1, NULL, '2020-12-27 13:09:40', NULL, NULL, '2020-12-27 13:09:40', '2020-12-27 13:09:40'),
(8, 8, 1, 4, 'delivered', 3, 6, '170.00', 'Diamond Pa', 1, 1, '2020-12-27 13:12:24', '2020-12-27 13:13:47', '2020-12-27 13:13:49', '2020-12-27 13:12:24', '2020-12-27 13:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_date` date DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `receivedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `trans_date`, `order_id`, `user_id`, `company_id`, `payment_by`, `payment_type`, `payment_status`, `bank_name`, `account_number`, `cheque_number`, `note`, `paid_amount`, `receivedby_id`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, '2020-12-24', 1, 1, 1, 'cash', 'cash', 'completed', 'cash', NULL, NULL, NULL, '170.00', 1, 1, 1, '2020-12-24 10:57:11', '2020-12-24 10:58:17'),
(2, '2020-12-24', 2, 1, 1, NULL, NULL, 'completed', NULL, NULL, NULL, NULL, '59.00', 1, 1, 1, '2020-12-24 10:57:20', '2020-12-24 10:57:49'),
(3, '2020-12-24', 3, 1, 1, 'cash', 'cash', 'completed', 'cash', NULL, NULL, NULL, '190.00', 1, 1, 1, '2020-12-24 11:11:08', '2020-12-24 11:12:30'),
(4, '2020-12-24', 4, 1, 1, 'cash', 'cash', 'completed', 'cash', NULL, NULL, NULL, '59.00', 1, 1, 1, '2020-12-24 11:11:36', '2020-12-24 11:12:11'),
(5, '2020-12-27', 6, 1, 4, 'cash', 'cash', 'completed', 'cash', '654654564', NULL, '56456456', '59.00', 1, 1, 1, '2020-12-27 12:29:43', '2020-12-27 12:33:22'),
(6, '2020-12-27', 7, 1, 1, NULL, 'hand cash', 'pending', NULL, NULL, NULL, NULL, '170.00', NULL, 1, NULL, '2020-12-27 13:10:00', '2020-12-27 13:10:00'),
(7, '2020-12-27', 8, 1, 4, 'cash', 'cash', 'completed', 'cash', '654654', NULL, NULL, '170.00', 1, 1, 1, '2020-12-27 13:12:28', '2020-12-27 13:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_courses` int(10) UNSIGNED DEFAULT NULL,
  `no_of_persons` int(10) UNSIGNED DEFAULT NULL,
  `no_of_attempts` int(10) UNSIGNED DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `attempt_duration` int(10) NOT NULL DEFAULT '0',
  `no_of_credits` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) UNSIGNED DEFAULT NULL,
  `package_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'temp',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `file_name`, `course_level`, `no_of_courses`, `no_of_persons`, `no_of_attempts`, `duration`, `attempt_duration`, `no_of_credits`, `price`, `package_for`, `package_type`, `status`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(2, 'Ultimate Pack', 'Ultimate Pack is a promo pack that can be found in FIFA 21 Ultimate Team. It includes 30 items, all players, all gold, all rare.', '2_fi_2020_12_26_084550_11400651.png', '1,2,3', 45, 30, 100, 365, 365, '150.00', '190.00', 'company', 'no_of_courses', 'active', 1, 1, 1, '2020-12-14 01:00:47', '2020-12-26 14:45:50'),
(3, 'Diamond Pack', 'Diamond Pack has made a well-recognized name as an manufacturer and wholesaler of Chocolate Tray, Sweets Tray, Cookies.', '3_fi_2020_12_26_084334_77885011.png', '2', 35, 25, 80, 365, 365, '130.00', '170.00', 'company', 'no_of_persons', 'active', 1, 1, 1, '2020-12-14 09:34:08', '2020-12-26 14:43:34'),
(4, 'Platinum Pack', 'The Loop Loft just went 8X platinum and now so can you! With over 8000000 kB (8.8 GB to be exact) of drum loops in our library, The Platinum Pack is a bundled', '4_fi_2020_12_26_084517_68496665.png', '1,2', 30, 22, 75, 300, 250, '124.00', '166.00', 'individual', 'no_of_courses', 'active', 1, 1, 1, '2020-12-14 09:38:01', '2020-12-26 14:45:17'),
(5, 'Gold Pack', 'Gold Pack. Great value for finding top-rated players. A mix of 12 items, including players and consumables, at least 10 Gold with 1 Rare.', '5_fi_2020_12_26_084453_29084417.png', '1,2', 53, 28, 77, 268, 236, '108.00', '125.00', 'individual', 'no_of_courses', 'active', 1, 1, 1, '2020-12-14 09:41:07', '2020-12-26 14:44:53'),
(6, 'Silver Pack', 'The Silver Pack is a regular pack that can be found in medicare.', '6_fi_2020_12_26_084534_51990767.png', '2', 95, 19, 95, 100, 124, '55.00', '59.00', 'company', 'no_of_courses', 'active', 1, 1, 1, '2020-12-14 09:47:49', '2020-12-26 14:45:34'),
(7, 'Bronze Pack', 'The Jio Fiber Bronze plan is the most affordable offering available in the line-up at 40 Euro', '7_fi_2020_12_26_084330_16550927.png', '2', 11, 1, 10, 80, 60, '20.00', '11.00', 'individual', 'no_of_courses', 'active', 1, 1, 1, '2020-12-14 09:51:27', '2020-12-26 14:43:30'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'temp', 1, 1, NULL, '2020-12-14 09:54:30', '2020-12-14 09:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title_hide` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `list_in_menu` tinyint(1) NOT NULL DEFAULT '0',
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `route_name`, `content`, `title_hide`, `active`, `list_in_menu`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', NULL, 0, 1, 1, 1, 1, '2020-12-12 18:06:27', '2020-12-12 21:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `page_items`
--

CREATE TABLE `page_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `editor` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_items`
--

INSERT INTO `page_items` (`id`, `page_id`, `title`, `content`, `editor`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello', '<p>new<img src=\"data:image/jpeg;base64,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\" style=\"width: 50%; float: right;\" class=\"note-float-right\"></p>', 1, 1, 1, 1, '2020-12-12 20:46:20', '2020-12-12 21:27:31'),
(2, 1, 'b', '<p>cd</p>', 1, 1, 1, NULL, '2020-12-12 21:31:31', '2020-12-12 21:31:31');

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
-- Table structure for table `question_paper_items`
--

CREATE TABLE `question_paper_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_paper_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(2, 'new subject', 1, NULL, '2020-12-12 21:56:03', '2020-12-12 21:56:03'),
(3, 'Subject B', 1, NULL, '2020-12-12 21:56:21', '2020-12-12 21:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `taken_courses`
--

CREATE TABLE `taken_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subrole_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_package_id` int(10) DEFAULT NULL,
  `taken_package_user_id` int(10) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taken_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `attempt_started_at` timestamp NULL DEFAULT NULL,
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `last_attempt_started_at` timestamp NULL DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taken_courses`
--

INSERT INTO `taken_courses` (`id`, `user_id`, `company_id`, `subrole_id`, `package_id`, `taken_package_id`, `taken_package_user_id`, `course_id`, `course_from`, `course_title`, `taken_date`, `expired_date`, `attempt_started_at`, `no_of_attempts`, `last_attempt_started_at`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 3, 3, 1, 6, 5, NULL, 'Care Certificate', '2020-12-24', '2021-12-24', NULL, 0, NULL, 3, NULL, '2020-12-24 11:13:55', '2020-12-24 11:13:55'),
(2, 6, 6, 6, 6, 5, 8, 5, NULL, 'Care Certificate', '2020-12-27', '2021-12-27', NULL, 0, NULL, 6, NULL, '2020-12-27 12:44:31', '2020-12-27 12:44:31'),
(3, 6, 6, 6, 6, 6, 9, 5, NULL, 'Care Certificate', '2020-12-27', '2021-12-27', NULL, 0, NULL, 6, NULL, '2020-12-27 14:44:06', '2020-12-27 14:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `taken_course_exams`
--

CREATE TABLE `taken_course_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subrole_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_paper_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempt_started_at` timestamp NULL DEFAULT NULL,
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `attempt_renewed` int(11) NOT NULL DEFAULT '0',
  `last_attempt_started_at` timestamp NULL DEFAULT NULL,
  `attempt_expired_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taken_course_exam_items`
--

CREATE TABLE `taken_course_exam_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subrole_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_paper_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_course_exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taken_packages`
--

CREATE TABLE `taken_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `order_item_id` bigint(20) DEFAULT NULL,
  `course_level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_courses` int(10) UNSIGNED DEFAULT NULL,
  `no_of_persons` int(10) UNSIGNED DEFAULT NULL,
  `no_of_attempts` int(10) UNSIGNED DEFAULT NULL,
  `no_of_credits` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) UNSIGNED DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `attempt_duration` int(10) NOT NULL DEFAULT '0',
  `package_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taken_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED NOT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taken_packages`
--

INSERT INTO `taken_packages` (`id`, `user_id`, `company_id`, `package_id`, `order_id`, `order_item_id`, `course_level`, `title`, `no_of_courses`, `no_of_persons`, `no_of_attempts`, `no_of_credits`, `price`, `duration`, `attempt_duration`, `package_for`, `package_type`, `taken_date`, `expired_date`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 2, 2, '2', 'Silver Pack', 95, 19, 95, '55.00', '59.00', 100, 124, 'company', 'no_of_courses', '2020-12-24', '2021-04-03', 0, NULL, '2020-12-24 10:57:55', '2020-12-24 10:57:55'),
(2, 1, 1, 3, 1, 1, '1,2,3', 'Diamond Pack', 35, 25, 80, '130.00', '170.00', 365, 365, 'company', 'no_of_persons', '2020-12-24', '2021-12-24', 0, NULL, '2020-12-24 10:58:21', '2020-12-24 10:58:21'),
(3, 1, 1, 6, 4, 4, '2', 'Silver Pack', 95, 19, 95, '55.00', '59.00', 100, 124, 'company', 'no_of_courses', '2020-12-24', '2021-04-03', 0, NULL, '2020-12-24 11:12:16', '2020-12-24 11:12:16'),
(4, 1, 1, 2, 3, 3, '1,2,3', 'Ultimate Pack', 45, 30, 100, '150.00', '190.00', 365, 365, 'company', 'no_of_courses', '2020-12-24', '2021-12-24', 0, NULL, '2020-12-24 11:12:36', '2020-12-24 11:12:36'),
(5, 1, 4, 6, 6, 6, '2', NULL, 95, 19, 95, '55.00', '59.00', 100, 124, 'company', 'no_of_courses', '2020-12-27', '2021-04-06', 0, NULL, '2020-12-27 12:33:22', '2020-12-27 12:33:22'),
(6, 1, 4, 3, 8, 8, '2', 'Diamond Pack', 35, 25, 80, '130.00', '170.00', 365, 365, 'company', 'no_of_persons', '2020-12-27', '2021-12-27', 0, NULL, '2020-12-27 13:13:48', '2020-12-27 13:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `taken_package_users`
--

CREATE TABLE `taken_package_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_subrole_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taken_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editedby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taken_package_users`
--

INSERT INTO `taken_package_users` (`id`, `user_id`, `company_subrole_id`, `company_id`, `package_id`, `taken_package_id`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 3, 2, NULL, NULL, '2020-12-24 11:00:22', '2020-12-24 11:00:22'),
(2, 3, 2, 1, 6, 1, NULL, NULL, '2020-12-24 11:01:11', '2020-12-24 11:01:11'),
(3, 1, 3, 1, 3, 2, NULL, NULL, '2020-12-24 11:02:13', '2020-12-24 11:02:13'),
(4, 1, 3, 1, 2, 4, NULL, NULL, '2020-12-24 11:13:11', '2020-12-24 11:13:11'),
(5, 1, 3, 1, 6, 3, NULL, NULL, '2020-12-24 11:13:22', '2020-12-24 11:13:22'),
(6, 1, 3, 1, 6, 1, NULL, NULL, '2020-12-24 11:13:39', '2020-12-24 11:13:39'),
(7, 2, 5, 4, 6, 5, NULL, NULL, '2020-12-27 12:35:36', '2020-12-27 12:35:36'),
(8, 1, 6, 4, 6, 5, NULL, NULL, '2020-12-27 12:39:46', '2020-12-27 12:39:46'),
(9, 1, 6, 4, 3, 6, NULL, NULL, '2020-12-27 13:14:43', '2020-12-27 13:14:43'),
(10, 2, 5, 4, 3, 6, NULL, NULL, '2020-12-27 13:14:43', '2020-12-27 13:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_temp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `password_temp`, `active`, `addedby_id`, `editedby_id`, `remember_token`, `email_verified_at`, `mobile_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Masud Hasan', 'masudbdm@gmail.com', '01918515567', '$2y$12$tbxuuRDiHlYjCzk1HNxO1.I4JkJXdYqZ8AGL5CNdDrAceAagO.Gw.', 'ssssssss', 1, 1, 1, 'rtKEyKGNrx6PGMOqzYekIeU2XgQIJu33HTLFNmZwDAYjxIDHWVfSMTAb7GQk', '2020-12-11 18:00:00', '2020-12-11 18:00:00', '2020-12-11 18:00:00', '2020-12-12 17:38:20'),
(2, 'atiqur', 'atiqewu012@gmail.com', '01671820622', '$2y$10$73gWCWL9iof1XSlvqSLFKepfBgwzZST4W5xS1aOnuOuzWunPwP3SW', '', 1, 1, NULL, NULL, NULL, NULL, '2020-12-24 10:50:52', '2020-12-24 10:50:52'),
(3, 'Noman', 'noman@gmail.com', '019234567890', '$2y$10$isEJoNrbGScWIcNo4PgcluIf1oyx8OzbPKs6yxML194SeCGbbxTXG', '', 1, 1, NULL, NULL, NULL, NULL, '2020-12-24 11:00:08', '2020-12-24 11:00:08'),
(4, 'Medicare Admin', 'ukmedicaretraining@gmail.com', '01977015514', '$2y$10$e/9/zEHN3sZkQq068PCxJ.toseVaxlOeM5lFgaoEqxOMAu.FHELeK', '', 1, 1, NULL, NULL, NULL, NULL, '2020-12-27 05:31:10', '2020-12-27 05:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` int(10) UNSIGNED NOT NULL,
  `editedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_name`, `role_value`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Admin', 1, 1, '2020-12-11 18:00:00', '2020-12-11 18:00:00'),
(2, 4, 'admin', 'Admin', 1, 1, '2020-12-11 18:00:00', '2020-12-11 18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance_transactions`
--
ALTER TABLE `balance_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_sub_roles`
--
ALTER TABLE `company_sub_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_answers`
--
ALTER TABLE `course_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_questions`
--
ALTER TABLE `course_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_random_question_papers`
--
ALTER TABLE `course_random_question_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_topics`
--
ALTER TABLE `course_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_items`
--
ALTER TABLE `page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `question_paper_items`
--
ALTER TABLE `question_paper_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_courses`
--
ALTER TABLE `taken_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_course_exams`
--
ALTER TABLE `taken_course_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_course_exam_items`
--
ALTER TABLE `taken_course_exam_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_packages`
--
ALTER TABLE `taken_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_package_users`
--
ALTER TABLE `taken_package_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance_transactions`
--
ALTER TABLE `balance_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_sub_roles`
--
ALTER TABLE `company_sub_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_answers`
--
ALTER TABLE `course_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `course_questions`
--
ALTER TABLE `course_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course_random_question_papers`
--
ALTER TABLE `course_random_question_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_topics`
--
ALTER TABLE `course_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_items`
--
ALTER TABLE `page_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_paper_items`
--
ALTER TABLE `question_paper_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taken_courses`
--
ALTER TABLE `taken_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taken_course_exams`
--
ALTER TABLE `taken_course_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taken_course_exam_items`
--
ALTER TABLE `taken_course_exam_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taken_packages`
--
ALTER TABLE `taken_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taken_package_users`
--
ALTER TABLE `taken_package_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 11:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_secs`
--

CREATE TABLE `about_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_secs`
--

INSERT INTO `about_secs` (`id`, `status`, `watermark`, `heading_1`, `heading_2`, `description`, `image_label`, `image`, `button`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', '<span>//</span> I\'m PJMessi', 'In pellentesque viverra purus', 'Innovative solutions<br>to boost <span> your creative </span>  projects', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.', 'PJMESSI', 'Bumblebee-2018-Poster-HD-_1553954430.jpg', '[\"portfolio.html\", \"My Portfolio\"]', NULL, '2019-03-30 10:02:29'),
(4, 'DRAFT', '<span>//</span>Words About', 'In pellentesque viverra purus', 'Innovative solutions<br>to boost <span> your creative </span>  projects', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.', 'PJMESSI', '8578a28e090616a0a83b7560f49f5b5f_1553955015.jpg', '[\"portfolio.html\", \"My Portfolio\"]', NULL, '2019-03-30 08:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `aitem_secs`
--

CREATE TABLE `aitem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aitem_secs`
--

INSERT INTO `aitem_secs` (`id`, `status`, `icon`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', 'fal fa-desktop', 'Web Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.', NULL, '2019-03-30 10:14:07'),
(2, 'PUBLISHED', 'fal fa-mobile-android', 'Ui/Ux Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.', NULL, '2019-03-30 11:36:36'),
(3, 'PUBLISHED', 'fab fa-pagelines', 'Branding', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.  ', NULL, NULL),
(4, 'PUBLISHED', 'fal fa-shopping-bag', 'Ecommerce', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `status`, `email`, `phone`, `address`, `facebook`, `linkedIn`, `github`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', 'pjmessi25@gmail.com', '+977 9843471707', 'Swoyambhu, Kathmandu', 'https://www.facebook.com/ChaChinggg', 'https://www.linkedin.com/in/prajwal-shrestha-03762416b/', 'https://github.com/PJMessi', 'https://twitter.com/pjmessi10', NULL, '2019-04-09 10:35:44'),
(2, 'DRAFT', 'pjmessi25@gmail.com', 'sdf', 'dsf', 'sdf', 'sdf', 'sdf', 'sdf', '2019-04-09 05:40:12', '2019-04-09 05:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `fact_secs`
--

CREATE TABLE `fact_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fact_secs`
--

INSERT INTO `fact_secs` (`id`, `status`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'PUBLISHED', 'some interesting <span>facts</span> <br>\r\nabout me', 'We have a wide range of pneumatic and vacuum components and conveyor belts and systems specifically suiting the precise needs of the print and packaging industry.', '6_1554045711.jpg', '2019-03-31 09:36:51', '2019-04-01 03:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `fitem_secs`
--

CREATE TABLE `fitem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fitem_secs`
--

INSERT INTO `fitem_secs` (`id`, `status`, `heading`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', 'FINISHED PROJECTS', '146', NULL, '2019-03-31 11:18:01'),
(2, 'PUBLISHED', 'HAPPY CUSTOMERS', '357', NULL, NULL),
(3, 'PUBLISHED', 'WORKING HOURS', '825', NULL, NULL),
(4, 'PUBLISHED', 'COFFEE CUPS', '1124', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_secs`
--

CREATE TABLE `main_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_secs`
--

INSERT INTO `main_secs` (`id`, `status`, `heading_1`, `heading_2`, `button`, `image`, `created_at`, `updated_at`) VALUES
(12, 'DRAFT', 'I\'m  Prajwal Shrestha <br> A Cool <span> Web Developer </span>', 'I make backend for websites', '[\"#sec2\",\"Learn more\"]', '1.jpg', '2019-03-30 03:10:30', '2019-03-30 07:52:25'),
(18, 'PUBLISHED', 'I am Prajwal Shrestha <br> \r\nAn awesome <span> Web Developer </span>', 'I develop websites, cool ones', '[\"#sec2\",\"Learn More\"]', '6_1553942675.jpg', '2019-03-30 04:59:35', '2019-03-30 18:55:18');

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
(3, '2019_03_30_033545_create_main_secs_table', 2),
(4, '2019_03_30_051017_add_status_column_to_main_secs_table', 3),
(5, '2019_03_30_104645_create_about_secs_table', 4),
(6, '2019_03_30_143328_create_aitem_secs_table', 5),
(7, '2019_03_31_144501_create_fact_secs_table', 6),
(8, '2019_03_31_160726_create_fitem_secs_table', 7),
(9, '2019_04_01_080159_create_resume_secs_table', 8),
(13, '2019_04_01_104733_create_ritems_table', 9),
(14, '2019_04_01_111925_create_ritem_secs_table', 9),
(15, '2019_04_01_113553_add_button_column_to_resume_secs_table', 10),
(16, '2019_04_01_144327_create_skill_secs_table', 11),
(17, '2019_04_02_072247_add_watermark_column_to_skill_secs_table', 12),
(18, '2019_04_02_081102_create_sitem_secs_table', 13),
(19, '2019_04_02_105045_create_project_secs_table', 14),
(20, '2019_04_02_112200_create_pitem_secs_table', 15),
(21, '2019_04_02_113300_create_titem_secs_table', 15),
(22, '2019_04_02_120252_add_images_column_to_pitem_secs_table', 16),
(23, '2019_04_03_070206_create_testmonial_secs_table', 17),
(24, '2019_04_03_084541_add_image_column_to_titem_secs_table', 18),
(28, '2019_04_08_154027_create_contacts_table', 22),
(29, '2019_04_08_153856_create_subscribers_table', 23),
(31, '2019_04_09_133608_create_miscellaneouses_table', 24),
(32, '2019_04_09_135612_add_favicon_column_to_miscellaneouses_table', 25),
(33, '2019_04_09_140321_add_txt_logo__column_to_miscellaneouses_table', 26),
(34, '2019_04_10_075629_add_username_column_to_users_table', 27),
(35, '2019_04_10_103941_add_avatar_column_to_users_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneouses`
--

CREATE TABLE `miscellaneouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trButton` text COLLATE utf8mb4_unicode_ci,
  `footer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txt_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `miscellaneouses`
--

INSERT INTO `miscellaneouses` (`id`, `status`, `title`, `logo`, `trButton`, `footer`, `created_at`, `updated_at`, `favicon`, `txt_logo`) VALUES
(1, 'PUBLISHED', 'Prajwal Shrestha', 'logo.png', '[\"<b style=\'font-size:2rem;\'>PJ</b>\", \"Looking_For_Intern\"]', '&#169; Solonick 2018  /  All rights reserved.', NULL, '2019-04-09 10:42:16', 'favicon.ico', 'logo2.png'),
(9, 'DRAFT', '12', '184117_windows-10-wallpaper-hd-1920x1080_1554825839.png', '[\"12\",\"12\"]', '21', '2019-04-09 10:19:00', '2019-04-09 10:42:16', 'fa5636e57996a29097c6ff7e5b8b9b06_1554825840.jpg', '55704642_355584708381534_6688210368541491200_n_1554825839.jpg');

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
-- Table structure for table `pitem_secs`
--

CREATE TABLE `pitem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `detail` mediumtext COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `category` text COLLATE utf8mb4_unicode_ci,
  `date` text COLLATE utf8mb4_unicode_ci,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pitem_secs`
--

INSERT INTO `pitem_secs` (`id`, `status`, `watermark`, `title`, `description`, `detail`, `images`, `category`, `date`, `client`, `skill`, `location`, `created_at`, `updated_at`) VALUES
(2, 'PUBLISHED', '<span>//</span>Project Title', 'Project Single <span>Title</span>', 'Lorem Ipsum generators on the Internet   king this the first true generator', '<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar</h4>\r\n                                            <p>\r\n                                                Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.\r\n                                            </p>\r\n                                            <p>\r\n                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.\r\n                                            </p>', '[\"6_1554287581.jpg\",\"fire-loader_1554287581.gif\"]', '[\"Branding\",\"        Design\"]', '[\"16\",\"9\",\"2018\"]', 'Themeforest', 'Php , Javascript , C++', 'Kharkiv Ukraine', NULL, '2019-04-08 06:56:37'),
(3, 'PUBLISHED', '<span>//</span>Project Title', 'Project Single <span>Title</span>', 'Lorem Ipsum generators on the Internet   king this the first true generator', '<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar</h4>\r\n                                            <p>\r\n                                                Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.\r\n                                            </p>\r\n                                            <p>\r\n                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.\r\n                                            </p>', '[\"6_1554287606.jpg\",\"fire-loader_1554287606.gif\"]', '[\"Branding\",\"   Design\"]', '[\"16\",\"9\",\"2018\"]', 'Themeforest', 'Php , Javascript , C++', 'Kharkiv Ukraine', NULL, '2019-04-08 04:45:35'),
(11, 'PUBLISHED', '<span>//</span>Project Title', 'Project Single <span>Title</span>', 'Lorem Ipsum generators on the Internet   king this the first true generator', '<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar</h4>\r\n                                            <p>\r\n                                                Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.\r\n                                            </p>\r\n                                            <p>\r\n                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.\r\n                                            </p>', '[\"6_1554287616.jpg\",\"fire-loader_1554287616.gif\"]', '[\"Branding\",\" Design\"]', '[\"16\",\"9\",\"2018\"]', 'Themeforest', 'Php , Javascript , C++', 'Kharkiv Ukraine', NULL, '2019-04-03 04:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `resume_secs`
--

CREATE TABLE `resume_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `button` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resume_secs`
--

INSERT INTO `resume_secs` (`id`, `status`, `watermark`, `heading_1`, `heading_2`, `description`, `created_at`, `updated_at`, `button`) VALUES
(1, 'PUBLISHED', 'My Resume  <span>//</span>', 'Some Words About Me', 'My Awesome <span> Story</span>', 'We have a wide range of pneumatic and vacuum components and conveyor belts and systems specifically suiting the precise needs of the print and packaging industry.', NULL, '2019-04-01 06:04:29', '[\"#\", \"DOWNLOAD RESUME\"]'),
(5, 'DRAFT', 'asd', 'asd', 'asd', 'asd', '2019-04-01 06:04:12', '2019-04-01 06:04:29', '[\"asd\",\"asd\"]');

-- --------------------------------------------------------

--
-- Table structure for table `ritem_secs`
--

CREATE TABLE `ritem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ritem_secs`
--

INSERT INTO `ritem_secs` (`id`, `status`, `icon`, `heading`, `interval`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', 'fa fa-briefcase', 'Work in company \"Dolore\"', '2012-2017', '<h4>Complete the project \"domik\"</h4>\r\n                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p>\r\n                                            <ul>\r\n                                                <li>Door portals plan</li>\r\n                                                <li>Furniture specifications</li>\r\n                                                <li>Interior design</li>\r\n                                            </ul>', 'Bumblebee-2018-Poster-HD-_1554129092.jpg', NULL, '2019-04-01 08:46:32'),
(2, 'PUBLISHED', 'fa fa-briefcase', 'Work in company \"Dolore\"', '2012-2017', '<h4>Complete the project \"domik\"</h4>\r\n                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p>\r\n                                            <ul>\r\n                                                <li>Door portals plan</li>\r\n                                                <li>Furniture specifications</li>\r\n                                                <li>Interior design</li>\r\n                                            </ul>', '8578a28e090616a0a83b7560f49f5b5f_1554129038.jpg', NULL, '2019-04-01 08:45:38'),
(3, 'PUBLISHED', 'fa fa-briefcase', 'Work in company \"Dolore\"', '2012-2017', '<h4>Complete the project \"domik\"</h4>\r\n                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p>\r\n                                            <ul>\r\n                                                <li>Door portals plan</li>\r\n                                                <li>Furniture specifications</li>\r\n                                                <li>Interior design</li>\r\n                                            </ul>', 'fire-loader_1554129100.gif', NULL, '2019-04-01 08:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `sitem_secs`
--

CREATE TABLE `sitem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_1` mediumtext COLLATE utf8mb4_unicode_ci,
  `items_1` text COLLATE utf8mb4_unicode_ci,
  `heading_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_2` mediumtext COLLATE utf8mb4_unicode_ci,
  `items_2` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitem_secs`
--

INSERT INTO `sitem_secs` (`id`, `status`, `heading_1`, `description_1`, `items_1`, `heading_2`, `description_2`, `items_2`, `created_at`, `updated_at`) VALUES
(1, 'DRAFT', 'Design Skills', 'Lorem Ipsum generators on the Internet   king this the first true generator', '[[\"Design\",\"85\"],[\"Branding\",\"95\"],[\"Ecommerce\",\"80\"]]', 'Developer Skills', 'Lorem Ipsum generators on the Internet   king this the first true generator', '[[\"Photoshop\",\"95\"],[\"Jquery\",\"65\"],[\"HTML5\",\"75\"],[\"PHP\",\"71\"]]', NULL, '2019-04-02 04:47:33'),
(8, 'PUBLISHED', 'Design Skills', 'Lorem Ipsum generators on the Internet   king this the first true generator', '[[\"Design\",\"85\"],[\"Branding\",\"95\"],[\"Ecommerce\",\"80\"]]', 'Developer Skills', 'Lorem Ipsum generators on the Internet   king this the first true generator', '[[\"Photoshop\",\"95\"],[\"Jquery\",\"65\"],[\"HTML5\",\"75\"],[\"PHP\",\"70\"],[\"Laravel\",\"90\"],[\"Django\",\"30\"],[\".NET\",\"20\"]]', NULL, '2019-04-09 10:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `skill_secs`
--

CREATE TABLE `skill_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watermark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_secs`
--

INSERT INTO `skill_secs` (`id`, `watermark`, `status`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '<span>//</span>attainments', 'PUBLISHED', 'My   Own <span> Developer\'s </span> and <br> Design   Skills', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.', '6_1554189620.jpg', NULL, '2019-04-02 01:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'pjmessi10@outlook.com', '2019-04-09 04:07:16', '2019-04-09 04:07:16'),
(6, 'pjmessi25@gmail.com', '2019-04-09 04:09:48', '2019-04-09 04:09:48'),
(9, 'pjmessi10@yahoo.com', '2019-04-09 04:16:30', '2019-04-09 04:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `testmonial_secs`
--

CREATE TABLE `testmonial_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testmonial_secs`
--

INSERT INTO `testmonial_secs` (`id`, `status`, `watermark`, `heading_1`, `heading_2`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PUBLISHED', 'Testimonials<span>//</span>', 'Reviews', 'My Clients and <span>Testimonials</span>', 'In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.', NULL, '2019-04-04 04:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `titem_secs`
--

CREATE TABLE `titem_secs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titem_secs`
--

INSERT INTO `titem_secs` (`id`, `project_id`, `status`, `name`, `stars`, `content`, `created_at`, `updated_at`, `image`) VALUES
(3, 3, 'PUBLISHED', 'Milka Antony', 5, 'In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.', NULL, '2019-04-08 04:45:24', '1.jpg'),
(4, 11, 'PUBLISHED', 'Milka Antony', 2, 'In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.', NULL, NULL, '2.jpg'),
(5, 2, 'PUBLISHED', 'Milka Antony', 2, 'In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.', NULL, '2019-04-08 06:57:09', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'pjmessi10', 'fa5636e57996a29097c6ff7e5b8b9b06_1554897603.jpg', 'Prajwal Shrestha', 'pjmessi25@gmail.com', NULL, '$2y$10$Eu0gMq/qcqEdfionWNG3xu1OWIlmUkqTIlGOa2llKAuyYkQ4yvm0G', '8zRS9gin5EZFGepjtwKOE9ZOfCPbBPMQgV9LNqaJkIMn5LKrK5CDGYRLDbCh', '2019-04-10 02:19:15', '2019-04-10 06:15:03'),
(7, 'anisha04', 'default.jpg', 'Anisha Maharjan', 'anishamaharjan4@gmail.com', NULL, '$2y$10$iI9ZpBYfz1LGTTSDCGaHCuga80l2ZsVYIymRmP37FVrrGEZCNLyXa', NULL, '2019-04-10 06:39:46', '2019-04-10 06:39:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_secs`
--
ALTER TABLE `about_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aitem_secs`
--
ALTER TABLE `aitem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fact_secs`
--
ALTER TABLE `fact_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitem_secs`
--
ALTER TABLE `fitem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_secs`
--
ALTER TABLE `main_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneouses`
--
ALTER TABLE `miscellaneouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pitem_secs`
--
ALTER TABLE `pitem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_secs`
--
ALTER TABLE `resume_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ritem_secs`
--
ALTER TABLE `ritem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitem_secs`
--
ALTER TABLE `sitem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_secs`
--
ALTER TABLE `skill_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `testmonial_secs`
--
ALTER TABLE `testmonial_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titem_secs`
--
ALTER TABLE `titem_secs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_secs`
--
ALTER TABLE `about_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aitem_secs`
--
ALTER TABLE `aitem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fact_secs`
--
ALTER TABLE `fact_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fitem_secs`
--
ALTER TABLE `fitem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_secs`
--
ALTER TABLE `main_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `miscellaneouses`
--
ALTER TABLE `miscellaneouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pitem_secs`
--
ALTER TABLE `pitem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resume_secs`
--
ALTER TABLE `resume_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ritem_secs`
--
ALTER TABLE `ritem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sitem_secs`
--
ALTER TABLE `sitem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skill_secs`
--
ALTER TABLE `skill_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testmonial_secs`
--
ALTER TABLE `testmonial_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `titem_secs`
--
ALTER TABLE `titem_secs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `text`, `created_at`, `updated_at`) VALUES
(2, 'Technology', '2024-01-25 17:55:07', '2024-01-25 17:55:07'),
(3, 'Travel', '2024-01-25 17:55:15', '2024-01-25 17:55:15'),
(4, 'Food and Cooking', '2024-01-25 17:55:23', '2024-01-25 17:55:23'),
(5, 'Health and Wellness', '2024-01-25 17:55:32', '2024-01-25 17:55:32'),
(6, 'Fashion and Style', '2024-01-25 17:55:38', '2024-01-25 17:55:38'),
(7, 'Home Decor', '2024-01-25 17:56:43', '2024-01-25 17:56:43'),
(8, 'Personal Finance', '2024-01-25 17:56:50', '2024-01-25 17:56:50'),
(9, 'Sports and Fitness', '2024-01-25 17:56:56', '2024-01-25 17:56:56'),
(10, 'Parenting and Family', '2024-01-25 17:57:03', '2024-01-25 17:57:03'),
(11, 'Education and Learning', '2024-01-25 17:57:14', '2024-01-25 17:57:14'),
(12, 'Sports', '2024-01-28 18:43:27', '2024-01-28 18:43:27'),
(13, 'Latest', '2024-01-28 18:45:15', '2024-01-28 18:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `temp_id`, `name`, `message`, `created_at`, `updated_at`) VALUES
(1, 58, 'sample', 'sadgfdg fdgfgfdgfgd', '2024-01-25 18:52:57', '2024-01-25 18:52:57'),
(2, 59, 'Sam', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2024-01-25 18:57:56', '2024-01-25 18:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `concerns`
--

CREATE TABLE `concerns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concerns`
--

INSERT INTO `concerns` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `temp_id`) VALUES
(1, 'kimi no nawa', 'uwu@gmail.com', 'demo mail', 'sddsdf', '2024-01-25 19:05:41', '2024-01-25 19:05:41', 0),
(2, 'kimi no nawa', 'uwu@gmail.com', 'demo mail', 'hhy', '2024-01-25 19:06:45', '2024-01-25 19:06:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id`, `temp_id`, `text`, `created_at`, `updated_at`) VALUES
(19, 55, 'Complete', '2024-01-25 18:03:08', '2024-01-25 18:03:08'),
(20, 56, 'Sam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam Pogisss', '2024-01-25 18:09:26', '2024-01-25 18:13:26'),
(21, 57, 'Sam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam Pogi', '2024-01-25 18:25:18', '2024-01-25 18:25:18'),
(22, 58, 'Complete', '2024-01-25 18:52:57', '2024-01-25 18:52:57'),
(23, 59, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2024-01-25 18:57:56', '2024-01-25 18:57:56'),
(24, 60, 'Sam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam PogiSam Pogi', '2024-01-25 18:58:49', '2024-01-25 18:58:49');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_24_065430_create_permission_tables', 1),
(6, '2024_01_24_065516_create_products_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2024_01_24_070739_create_templates_table', 2),
(9, '2024_01_24_070811_create_titles_table', 2),
(10, '2024_01_24_070820_create_subtitles_table', 2),
(11, '2024_01_24_070827_create_descriptions_table', 2),
(12, '2024_01_24_070834_create_images_table', 2),
(13, '2024_01_24_114635_create_images_table', 3),
(14, '2024_01_25_121155_create_categories_table', 4),
(15, '2024_01_26_011507_create_categories_table', 5),
(16, '2024_01_26_022259_create_concerns_table', 6),
(17, '2024_01_26_022938_create_comments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(2, 'edit-role', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(3, 'delete-role', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(4, 'create-user', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(5, 'edit-user', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(6, 'delete-user', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(7, 'create-product', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(8, 'edit-product', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(9, 'delete-product', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(2, 'Admin', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(3, 'Product Manager', 'web', '2024-01-23 22:58:03', '2024-01-23 22:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subtitles`
--

CREATE TABLE `subtitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subtitles`
--

INSERT INTO `subtitles` (`id`, `temp_id`, `text`, `created_at`, `updated_at`) VALUES
(15, 55, 'Complete', '2024-01-25 18:03:08', '2024-01-25 18:03:08'),
(16, 56, 'Sam cute kaayo mag codesss', '2024-01-25 18:09:26', '2024-01-25 18:13:26'),
(17, 57, 'Sam cute kaayo mag code', '2024-01-25 18:25:18', '2024-01-25 18:25:18'),
(18, 58, 'Complete', '2024-01-25 18:52:57', '2024-01-25 18:52:57'),
(19, 59, 'Sam cute kaayo mag code', '2024-01-25 18:57:56', '2024-01-25 18:57:56'),
(20, 60, 'Sam cute kaayo mag code', '2024-01-25 18:58:49', '2024-01-25 18:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `header`, `banner`, `logo`, `description`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(55, 'Here are some General To-Do List', 'banner_1706234588.jpg', 'logo_1706234588.png', NULL, '2024-01-25 18:03:08', '2024-01-25 18:12:30', 1, 6),
(56, 'Sam Pogi', 'banner_1706234966.png', 'logo_1706235880.png', NULL, '2024-01-25 18:09:26', '2024-01-25 18:24:40', 1, 7),
(57, 'New Announcement', 'banner_1706235918.png', 'logo_1706235918.png', NULL, '2024-01-25 18:25:18', '2024-01-25 18:25:18', 1, 11),
(58, 'Here are some General To-Do List', 'banner_1706237577.jpg', 'logo_1706237577.png', NULL, '2024-01-25 18:52:57', '2024-01-25 18:52:57', 1, 3),
(59, 'New Announcement', 'banner_1706237876.png', 'logo_1706237876.png', NULL, '2024-01-25 18:57:56', '2024-01-25 18:57:56', 1, 9),
(60, 'New Announcement', 'banner_1706237929.png', 'logo_1706237929.png', NULL, '2024-01-25 18:58:49', '2024-01-25 18:58:49', 1, 2),
(61, 'Here are some General To-Do List', 'banner_1706240642.jpg', 'logo_1706240642.png', NULL, '2024-01-25 19:44:02', '2024-01-25 19:44:02', 1, 3),
(62, 'Here are some General To-Do List', 'banner_1706241028.jpg', 'logo_1706241028.jpg', NULL, '2024-01-25 19:50:28', '2024-01-25 19:50:28', 1, 5),
(63, 'Here are some General To-Do List', 'banner_1706241377.jpg', 'logo_1706241377.png', NULL, '2024-01-25 19:56:17', '2024-01-25 19:56:17', 1, 3),
(64, 'Here are some General To-Do List', 'banner_1706242569.jpg', 'logo_1706242569.png', NULL, '2024-01-25 20:16:09', '2024-01-25 20:16:09', 1, 5),
(65, 'Here are some General To-Do List', 'banner_1706242840.png', 'logo_1706242840.jpg', NULL, '2024-01-25 20:20:40', '2024-01-25 20:20:40', 1, 6),
(66, 'Here are some General To-Do List', 'banner_1706242995.jpg', 'logo_1706242995.jpg', NULL, '2024-01-25 20:23:15', '2024-01-25 20:23:15', 1, 4),
(67, 'Here are some General To-Do List', 'banner_1706243091.png', 'logo_1706243091.jpg', NULL, '2024-01-25 20:24:51', '2024-01-25 20:24:51', 1, 5),
(68, 'ImageTestImageTestImageTestImageTest', 'banner_1706243122.jpg', 'logo_1706243122.jpg', '<p>ImageTestImageTestImageTestImageTestImageTestImageTestImageTestv</p>', '2024-01-25 20:25:22', '2024-01-28 23:47:38', 1, 5),
(69, 'Here are some General To-Do List', 'banner_1706243311.jpg', 'logo_1706243311.png', NULL, '2024-01-25 20:28:31', '2024-01-25 20:28:31', 1, 7),
(76, 'Here are some General To-Do List', 'banner_1706245323.jpg', 'logo_1706245323.png', NULL, '2024-01-25 21:02:03', '2024-01-25 21:02:03', 1, 6),
(77, 'ImageTest', 'banner_1706245483.jpg', 'logo_1706245483.jpg', NULL, '2024-01-25 21:04:43', '2024-01-25 21:04:43', 1, 5),
(78, 'Nissi Mini Cup Noodles Seafood 40g', 'banner_1706491144.png', 'logo_1706491144.png', '<p>&nbsp;Nissi Mini Cup Noodles Seafood 40g&nbsp;Nissi Mini Cup Noodles Seafood 40g&nbsp;Nissi Mini C&nbsp;Nissi Mini Cup Noodles Seafood 40g&nbsp;Nissi Mini Cup Noodles Seafood 40g&nbsp;Nissi Mini Cup Noodles Seafood 40gup Noodles Seafood 40g</p>', '2024-01-28 17:19:04', '2024-01-28 23:51:31', 1, 5),
(79, 'Nissi Mini Cup Noodles Seafood 40g', 'banner_1706496790.jpg', 'logo_1706496790.jpg', '<p>Philippine cities, Luzon to Mindanao, have their share of local restaurants you can try that flare with their dishes fused with other cuisines. Iligan City, Lanao Del Norte has also its set of restaurants from diners, dessert places, burger joints, and coffee houses.</p>\r\n<p>After conquering the numerous waterfalls scattered around the vicinity of Iligan, food is the first thing you will seek when you return to the city proper. Here\'s a list of five restaurants to visit in the City of Majestic Waterfalls.</p>\r\n<h3><strong>Iliganon\'s Cafe</strong></h3>\r\n<p>With its name that signifies the notion of being a true Iliganon, it serves an array of food choices from rice meals, noodles, appetizers (some are sizzlers), and pizza. But the house specialty is randang: beef, fish, and chicken. They have a note that the randang being served has a \"high level of spiciness\".</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Iliganon.jpg\" alt=\"Bisita Iligan - Iliganon\"></p>\r\n<h3><strong>Tita Fannies Liempo and Chicken House</strong></h3>\r\n<p>Thanks to a food chain for bringing the famous \"chicken inasal\" within the reach of every Filipino in any part of the country. Before that, Iliganon\'s were already enjoying this meal in their locality courtesy of Tita Fannies Liempo and Chicken House.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Tita%20Fannies.jpg\" alt=\"Bisita Iligan - Tita Fannies\"></p>\r\n<p>Bestsellers include the chicken inasal in petso (thigh) and paa (legs) with the enticing unlimited rice offer, the liempo which was used in the branding of the food house and of course, the hefty Halo-Halo sa Buko. Forget the grilled chicken because you can have it anywhere but don\'t ever skip their Liempo de Lechon, considered as the best one in Mindanao. The well-seasoned liempo is being hyped with a crunchy pork skin perfect for a spicy soy-vinegar sauce.</p>\r\n<p>You can end your meal in Tita Fannies by having a serving of their Halo-Halo sa Buko, which is actually for sharing. The buko (coconut) shell was filled generously with gulaman, some beans, banana, coconut meat, topped with a scoop of ube ice cream, and sprinkled with rice crisps.</p>\r\n<h3><strong>Delecta\'s Diner and Cafe</strong></h3>\r\n<p>A famous diner, already on its decades, is a place that Iliganon kids in the \'90s grew up with, Delecta\'s Diner and Cafe located at the heart of the city center. After an early and grueling trek to see the falls in the northeastern part, Delecta\'s Diner and Cafe is the perfect place to have some gastronomical adventure.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Delecta.jpg\" alt=\"Bisita Iligan - Delecta\"></p>\r\n<h3><strong>Flamoo\'s Flamed-Grilled Burgers</strong></h3>\r\n<p>Flamoo Burgers is now gaining popularity as Iligan\'s best burger house. Located on the grounds of Calda, The Strip, it offers a nice hang-out for the family on the weekends, teenagers in late afternoons, and some night get-togethers for yuppies. The Strip is like a large open field for children to run around, old friends to get together, and big families to have bonding time. Flamoo sits invitingly here and fits perfectly well at a corner of this big spacious lawn. And when the natural lights dim out, and the stars peek out, it is when still hot burgers and really cold beer marries well together with laughter trying to fill up space to no avail.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Flamoo.jpg\" alt=\"Bisita Iligan - Flamoo\"></p>\r\n<h3><strong>Latino\'s Diner and Cafe</strong></h3>\r\n<p>Latino\'s Diner Cafe is another addition to the growing family of \'homegrown<em>\'</em>&nbsp;restaurants in Iligan. Having local food hubs amidst the mushrooming foreign franchise is worth celebrating.</p>\r\n<p>Although it does not offer Latin American cuisine, it caters extensive selection of Filipino dishes and pastries.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Latinos.jpg\" alt=\"Bisita Iligan - Latinos\"></p>\r\n<p><strong>Source</strong>:&nbsp;<a href=\"http://www.rjdexplorer.com/where-to-eat-in-iligan-city-lanao-del-norte/\">http://www.rjdexplorer.com/where-to-eat-in-iligan-city-lanao-del-norte/</a></p>', '2024-01-28 18:53:10', '2024-01-28 23:51:15', 1, 5),
(80, 'Nissi Mini Cup Noodles Seafood 40g', 'banner_1706497146.jpg', 'logo_1706497146.jpg', '<p>Philippine cities, Luzon to Mindanao, have their share of local restaurants you can try that flare with their dishes fused with other cuisines. Iligan City, Lanao Del Norte has also its set of restaurants from diners, dessert places, burger joints, and coffee houses.</p>\r\n<p>After conquering the numerous waterfalls scattered around the vicinity of Iligan, food is the first thing you will seek when you return to the city proper. Here\'s a list of five restaurants to visit in the City of Majestic Waterfalls.</p>\r\n<h3><strong>Flamoo\'s Flamed-Grilled Burgers</strong></h3>\r\n<p>Flamoo Burgers is now gaining popularity as Iligan\'s best burger house. Located on the grounds of Calda, The Strip, it offers a nice hang-out for the family on the weekends, teenagers in late afternoons, and some night get-togethers for yuppies. The Strip is like a large open field for children to run around, old friends to get together, and big families to have bonding time. Flamoo sits invitingly here and fits perfectly well at a corner of this big spacious lawn. And when the natural lights dim out, and the stars peek out, it is when still hot burgers and really cold beer marries well together with laughter trying to fill up space to no avail.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Flamoo.jpg\" alt=\"Bisita Iligan - Flamoo\"></p>\r\n<h3><strong>Latino\'s Diner and Cafe</strong></h3>\r\n<p>Latino\'s Diner Cafe is another addition to the growing family of \'homegrown<em>\'</em>&nbsp;restaurants in Iligan. Having local food hubs amidst the mushrooming foreign franchise is worth celebrating.</p>\r\n<p>Although it does not offer Latin American cuisine, it caters extensive selection of Filipino dishes and pastries.</p>\r\n<p><img src=\"https://www.bisitailigan.com/storage/photos/1/Bisita%20Iligan%20-%20Latinos.jpg\" alt=\"Bisita Iligan - Latinos\"></p>\r\n<p><strong>Source</strong>:&nbsp;<a href=\"http://www.rjdexplorer.com/where-to-eat-in-iligan-city-lanao-del-norte/\">http://www.rjdexplorer.com/where-to-eat-in-iligan-city-lanao-del-norte/</a></p>', '2024-01-28 18:59:06', '2024-01-28 23:51:01', 1, 5),
(81, 'Nissi Mini Cup Noodles Seafood 40g', 'banner_1706503283.jpg', 'logo_1706503283.jpg', '<p style=\"text-align: justify;\">n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '2024-01-28 20:41:23', '2024-01-28 23:50:53', 1, 4),
(82, 'Nissin Mini Cup Noodles Seafood 40g', 'banner_1706505083.png', 'logo_1706505083.png', '<div>@php</div>\r\n<div>$secondToLastTemplate = $latestTemplates-&gt;reverse()-&gt;skip(1)-&gt;first();</div>\r\n<div>@endphp</div>\r\n<div>&nbsp;</div>\r\n<div>@if($secondToLastTemplate)</div>\r\n<div>&lt;div class=\"card grid-item card_large_with_image\"&gt;</div>\r\n<div>&lt;img class=\"card-img-top\" src=\"{{ asset(\'images/banners/\' . $secondToLastTemplate-&gt;banner) }}\" alt=\"{{ $secondToLastTemplate-&gt;header }}\" width=\"690\" height=\"87\"&gt;</div>\r\n<div>&lt;div class=\"card-body\"&gt;</div>\r\n<div>&lt;div class=\"card-title\"&gt;&lt;a href=\"{{ url(\'post/\' . $secondToLastTemplate-&gt;id) }}\"&gt;{{ $secondToLastTemplate-&gt;header }}&lt;/a&gt;&lt;/div&gt;</div>\r\n<div>&lt;p class=\"card-text\"&gt;{{ $secondToLastTemplate-&gt;description }}&lt;/p&gt;</div>\r\n<div>@if($secondToLastTemplate-&gt;user)</div>\r\n<div>&lt;small class=\"post_meta\"&gt;&lt;a href=\"#\"&gt;{{ $secondToLastTemplate-&gt;user-&gt;name }}&lt;/a&gt;&lt;span&gt;{{ $secondToLastTemplate-&gt;created_at-&gt;format(\'M d, Y \\a\\t h:i A\') }}&lt;/span&gt;&lt;/small&gt;</div>\r\n<div>@else</div>\r\n<div>&lt;span class=\"date\"&gt;No User&lt;/span&gt;</div>\r\n<div>@endif</div>\r\n<div>&lt;/div&gt;</div>\r\n<div>&lt;/div&gt;</div>\r\n<div>@else</div>\r\n<div>&lt;!-- Handle the case when there is no second-to-last template --&gt;</div>\r\n<div>&lt;p&gt;No second-to-last template available&lt;/p&gt;</div>\r\n<div>@endif</div>', '2024-01-28 21:11:23', '2024-01-28 23:50:38', 1, 13),
(84, 'Nissin Mini Cup Noodles Seafood 40g.', 'banner_1706513732.jpg', 'logo_1706513732.jpg', '<p style=\"text-align: justify;\"><em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em>&nbsp;Seafood 40g.&nbsp;<em>Nissin</em>&nbsp;Mini&nbsp;<em>Cup Noodles</em> Seafood 40g</p>', '2024-01-28 23:35:32', '2024-01-28 23:50:26', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `temp_id`, `text`, `created_at`, `updated_at`) VALUES
(82, 55, 'Clothing And Personal Grooming', '2024-01-25 18:03:08', '2024-01-25 18:03:08'),
(83, 56, 'Sam Pogisss', '2024-01-25 18:09:26', '2024-01-25 18:13:26'),
(84, 57, 'Sam Pogi', '2024-01-25 18:25:18', '2024-01-25 18:25:18'),
(85, 58, 'Clothing And Personal Grooming', '2024-01-25 18:52:57', '2024-01-25 18:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_photo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Javed Ur Rehman', 'javed@allphptricks.com', NULL, '$2y$12$h5UU35VBgdQMob071zpSSup5qyEXM/Z3EnJRBOgcvcRoeuoU/YhVO', 'oNxSL08t4yEk5x7WNzfzvtbP3AiwFPZYeJbJBYBEbc8Iuj50i9GYc2f7WNSF', '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(2, '', 'Syed Ahsan Kamal', 'ahsan@allphptricks.com', NULL, '$2y$12$/dvul/S8JWpumj6MJegMR.T9aXRTaO492HFxw9sPMWBGEsSZxjfJG', NULL, '2024-01-23 22:58:03', '2024-01-23 22:58:03'),
(3, '', 'Abdul Muqeet', 'muqeet@allphptricks.com', NULL, '$2y$12$eV3YyEGHJTrxVYKTRKVpa.IIRELfiZnewaApJstXh1USUMYDiyZuu', NULL, '2024-01-23 22:58:04', '2024-01-23 22:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_temp_id_foreign` (`temp_id`);

--
-- Indexes for table `concerns`
--
ALTER TABLE `concerns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cocnerns_template` (`temp_id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descriptions_temp_id_foreign` (`temp_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_temp_id_foreign` (`temp_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subtitles`
--
ALTER TABLE `subtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subtitles_temp_id_foreign` (`temp_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_templates_user` (`user_id`),
  ADD KEY `fk_templates_category` (`category_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titles_temp_id_foreign` (`temp_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `concerns`
--
ALTER TABLE `concerns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subtitles`
--
ALTER TABLE `subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_temp_id_foreign` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `concerns`
--
ALTER TABLE `concerns`
  ADD CONSTRAINT `fk_cocnerns_template` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `descriptions_temp_id_foreign` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_temp_id_foreign` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subtitles`
--
ALTER TABLE `subtitles`
  ADD CONSTRAINT `subtitles_temp_id_foreign` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `fk_templates_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_templates_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `titles_temp_id_foreign` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

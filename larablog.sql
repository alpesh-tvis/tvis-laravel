-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 10:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tess Reilly', 'mr-jaylan-weber-i', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '/storage/category/1672838300.jpg', '2022-10-03 23:32:00', '2023-01-04 23:02:01'),
(2, 'Ellen Rodriguez', 'prof-foster-yundt', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '/storage/category/1673265383.jpg', '2022-10-03 23:32:00', '2023-01-09 06:26:23'),
(3, 'Maritza Ullrich', 'jordi-kirlin', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '/storage/category/1672838451.jpg', '2022-10-03 23:32:00', '2023-01-04 07:50:51'),
(4, 'Alfonso Leuschke PhD', 'dr-enos-rogahn', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '/storage/category/1672838464.jpg', '2022-10-03 23:32:00', '2023-01-04 23:02:22'),
(5, 'Mr. Remington Becker', 'angus-conroy', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point oasasdasf using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '/storage/category/1673265572.jpg', '2022-10-03 23:32:00', '2023-01-09 06:29:32'),
(50, 'beach', 'beach', 'bwech content here', '/storage/category/1672835750.jpg', '2023-01-04 07:05:50', '2023-01-04 07:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_no`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test555555@hotmail.com', '', 'test', 'Alternatively you might want to move the Super Admin check to the Gate::after phase instead, particularly if your Super Admin shouldn\'t be allowed to do things your app doesn\'t want \"anyone\" to do, such as writing more than 1 review, or bypassing unsubscribe rules, etc.', '2022-10-06 05:03:52', '2022-10-06 05:03:52'),
(2, 'sdADA', 'lokesh@tvistech.com', '5419848', 'test', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2022-12-14 05:35:42', '2022-12-14 05:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
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
(4, '2020_03_22_082535_create_categories_table', 1),
(5, '2020_03_24_061006_create_tags_table', 1),
(7, '2020_04_21_134614_create_settings_table', 1),
(8, '2020_04_22_145332_create_contacts_table', 1),
(9, '2022_10_06_094619_create_permission_tables', 2),
(10, '2022_12_14_103759_add_phone_number_to_contacts', 3),
(11, '2022_12_14_105317_add_phoneno_to_contacts', 4),
(12, '2022_12_14_121847_add_is_admin_to_users_table', 5),
(13, '2016_01_01_000000_add_voyager_user_fields', 6),
(14, '2016_01_01_000000_create_data_types_table', 6),
(15, '2016_05_19_173453_create_menu_table', 6),
(16, '2022_12_21_101346_create_products_table', 7),
(17, '2022_12_27_083906_create_admin_users_table', 8),
(19, '2023_01_02_124635_create_product_cat_table', 9),
(21, '2023_02_15_065249_create_review_ratings_table', 10),
(22, '2023_03_17_063616_create_orders_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('test@gmail.com', '$2y$10$RUSgTtir8fgV0QxU0Ok/ieQibsZYM6i3.N676Cc0mznX5G6sYpYpq', '2022-12-14 06:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tag_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `description`, `category_id`, `user_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 'Testing', 'testing', '/storage/post/1677477238.jpg', '<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p><p></p>', 4, 2, '', '2023-02-27 00:23:58', '2023-02-27 00:23:58'),
(2, 'middle', 'middle', '/storage/post/1677477610.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p><p></p>', 1, 2, '', '2023-02-27 00:30:10', '2023-02-27 00:30:10'),
(3, 'literature', 'literature', '/storage/post/1677477657.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p></p>', 2, 2, '', '2023-02-27 00:30:57', '2023-02-27 00:30:57'),
(4, 'popular', 'popular', '/storage/post/1677477692.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p></p>', 3, 2, '', '2023-02-27 00:31:32', '2023-02-27 00:31:32'),
(5, 'Excepteur', 'excepteur', '/storage/post/1677477724.jpg', '<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad \r\nminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip \r\nex ea commodo consequat. Duis aute irure dolor in reprehenderit in \r\nvoluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur \r\nsint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\r\n mollit anim id est laborum.\"</p><p></p>', 5, 2, '', '2023-02-27 00:32:04', '2023-02-27 00:32:04'),
(6, 'Internet', 'internet', '/storage/post/1677478653.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p><p></p>', 5, 2, '', '2023-02-27 00:47:33', '2023-02-27 00:47:33'),
(7, 'porro', 'porro', '/storage/post/1677478728.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt \r\ntempora dolor laudantium sed optio, explicabo ad deleniti impedit \r\nfacilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p><p></p>', 3, 2, '', '2023-02-27 00:48:48', '2023-02-27 00:48:48'),
(8, 'established', 'established', '/storage/post/1677491237.jpg', '<p>dgfdgdfgdfg<br></p>', 2, 2, '', '2023-02-27 01:38:51', '2023-02-27 04:17:17'),
(9, 'beatae', 'beatae', '/storage/post/1677482557.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt \r\ntempora dolor laudantium sed optio, explicabo ad deleniti impedit \r\nfacilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>', 5, 2, '', '2023-02-27 01:52:37', '2023-02-27 01:52:37'),
(10, 'adipisicing', 'adipisicing', '/storage/post/1677490104.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt \r\ntempora dolor laudantium sed optio, explicabo ad deleniti impedit \r\nfacilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p><p></p>', 1, 2, '', '2023-02-27 03:58:24', '2023-02-27 03:58:24'),
(11, 'dsdsad', 'dsdsad', '/storage/post/1677491916.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt \r\ntempora dolor laudantium sed optio, explicabo ad deleniti impedit \r\nfacilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p><p></p>', 1, 2, '', '2023-02-27 04:03:57', '2023-02-27 04:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 1),
(51, 1),
(52, 1),
(53, 3),
(2, 1),
(54, 3),
(55, 3),
(56, 1),
(56, 3),
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 3),
(7, 1),
(8, 3),
(11, 3),
(11, 4),
(9, 3),
(10, 4),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(20) NOT NULL,
  `sale_price` int(20) NOT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `content`, `regular_price`, `sale_price`, `currency`, `category`, `image`, `date`, `created_at`, `updated_at`) VALUES
(2204, 'Opbergdozen', '10m3', 'hello', 254, 81, '$', 'Opbergdozen', '/storage/product/1678448819.png', '2023-03-10 11:46:59.872726', '2022-12-22 05:35:23', '2023-03-10 06:16:59'),
(2208, 'Algemeen', 'op-slot-doen', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 230, 30, '$', 'Algemeen', '/storage/product/1678448758.png', '2023-03-10 11:45:58.500297', '2022-12-22 05:35:19', '2023-03-10 06:15:58'),
(2212, 'Zware standaard doos', 'zware-standaard-doos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 562, 62, '$', 'Verhuisdoos', '/storage/product/1678448776.png', '2023-03-10 11:46:16.692250', '2022-12-22 05:34:40', '2023-03-10 06:16:16'),
(2217, 'Verhuisdoos', 'licht-standaard-box', 'so it depends on your controllers etc if you have a updateController with the correct code it can be updated but you would also need a edit method as well, If you could share your code it will be easier to say what would happen instead of guessing', 150, 135, '$', 'Verhuisdoos', '/storage/product/1678448789.png', '2023-03-10 11:46:29.045950', '2022-12-22 05:34:36', '2023-03-10 06:16:29'),
(2221, 'Boekendoos', 'boekendoos-2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 110, 20, '$', 'Verhuisdoos', '/storage/product/1678448793.png', '2023-03-10 11:46:33.908852', '2022-12-22 05:34:32', '2023-03-10 06:16:33'),
(2226, 'Computerdoos', 'computerdoos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 236, 152, '$', 'Verhuisdoos', '/storage/product/1678448797.png', '2023-03-10 11:46:37.999269', '2022-12-22 05:34:28', '2023-03-10 06:16:37'),
(2230, 'Linnen doos', 'linnendoos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 68, 10, '$', 'Verhuisdoos', '/storage/product/1678448803.png', '2023-03-10 11:46:43.397612', '2022-12-22 05:34:24', '2023-03-10 06:16:43'),
(2234, 'Kleerhangersdoos', 'kledingkast', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 2240, 62, '$', 'Verhuisdoos', '/storage/product/1678448807.png', '2023-03-14 07:13:08.691597', '2022-12-22 05:34:20', '2023-03-14 01:43:08'),
(2240, 'Flessendoos incl. indeling', 'bottle-box-incl-divisie', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 120, 89, '$', 'Verhuisdoos', '/storage/product/1678448811.png', '2023-03-10 11:46:51.438915', '2022-12-22 05:34:16', '2023-03-10 06:16:51'),
(2253, 'Dekens 10 stuks', 'dekens-10-delig-verhuur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 562, 521, '$', 'Inpakken', '/storage/product/1678448853.png', '2023-03-15 12:57:22.812018', '2022-12-22 05:33:15', '2023-03-15 07:27:22'),
(2400, '15 m3', '15-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 320, 20, '$', 'Opbergdozen', '/storage/product/1678448859.png', '2023-03-10 11:47:39.418977', '2022-12-22 05:33:10', '2023-03-10 06:17:39'),
(2408, '18 m3', '18-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 562, 20, '$', 'Opbergdozen', '/storage/product/1678448863.png', '2023-03-10 11:47:43.393510', '2022-12-22 05:33:05', '2023-03-10 06:17:43'),
(2416, '21 m3', '21-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 965, 520, '$', 'Opbergdozen', '/storage/product/1678448867.png', '2023-03-10 11:47:47.864872', '2022-12-22 05:33:00', '2023-03-10 06:17:47'),
(2434, '24 m3', '24-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 562, 220, '$', 'Opbergdozen', '/storage/product/1678448871.png', '2023-03-10 11:47:51.688642', '2022-12-22 05:32:56', '2023-03-10 06:17:51'),
(2442, '27 m3', '27-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 230, 12, '$', 'Opbergdozen', '/storage/product/1678448875.png', '2023-03-10 11:47:55.416443', '2022-12-22 05:32:51', '2023-03-10 06:17:55'),
(2450, '33 m3', '33-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 562, 120, '$', 'Opbergdozen', '/storage/product/1678448880.png', '2023-03-10 11:48:00.250994', '2022-12-22 05:32:47', '2023-03-10 06:18:00'),
(2457, '40 m3', '40-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 320, 120, '$', 'Opbergdozen', '/storage/product/1678448884.png', '2023-03-10 11:48:04.216931', '2022-12-22 05:32:43', '2023-03-10 06:18:04'),
(2462, '50 m3', '50-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 625, 452, '$', 'Opbergdozen', '/storage/product/1678448906.png', '2023-03-10 11:48:26.748637', '2022-12-22 05:32:38', '2023-03-10 06:18:26'),
(7660, 'Dekens 10 stuks (huur)', 'dekens-huur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 620, 120, '$', 'Verhuur', '/storage/product/1678448911.png', '2023-03-10 11:48:31.237365', '2022-12-22 05:32:34', '2023-03-10 06:18:31'),
(7669, 'T shirt', 't-shirt', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 125, 10, '$', 'Men', '/storage/product/1677577733.jpg', '2023-02-28 10:13:25.113501', '2023-02-28 04:18:53', '2023-02-28 04:34:13'),
(7670, '30 m3', '30-m3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 120, 23, '₹', 'Rental', '/storage/product/1677673962.jpg', '2023-03-01 12:32:42.745198', '2023-03-01 07:02:42', '2023-03-01 07:02:42'),
(7671, 'Test', 'test', 'Terst Content', 120, 41, '₹', 'Rental', '/storage/product/1678453566.png', '2023-03-10 13:06:06.941927', '2023-03-10 07:36:06', '2023-03-10 07:36:06'),
(7672, 'shirting', 'shirting', 'content', 412, 23, '₹', 'Inpakken', '/storage/product/1678453982.png', '2023-03-10 13:13:02.681160', '2023-03-10 07:43:02', '2023-03-10 07:43:02'),
(7673, 'Verhuisdoos', 'verhuisdoos', 'content', 412, 41, '₹', 'Inpakken', '/storage/product/1678454100.jpg', '2023-03-10 13:15:00.939322', '2023-03-10 07:45:00', '2023-03-10 07:45:00'),
(7674, 'test', 'test', 'test content', 485, 12, '₹', 'General', '/storage/product/1678454464.png', '2023-03-10 13:21:04.061751', '2023-03-10 07:51:04', '2023-03-10 07:51:04'),
(7675, 'test', 'test', 'test content', 412, 52, '₹', 'Algemeen', '/storage/product/1678454592.png', '2023-03-10 13:23:12.277614', '2023-03-10 07:53:12', '2023-03-10 07:53:12'),
(7676, 'jeans', 'jeans', 'Contnt', 412, 12, '₹', 'Men', '/storage/product/1678454709.jpg', '2023-03-10 13:25:09.100940', '2023-03-10 07:55:09', '2023-03-10 07:55:09'),
(7677, 'Test', 'test', 'content', 452, 12, '₹', 'Men', '/storage/product/1678454823.jpg', '2023-03-10 13:27:03.786623', '2023-03-10 07:57:03', '2023-03-10 07:57:03'),
(7678, 'test', 'test', 'content', 12, 12, '₹', 'Inpakken', '/storage/product/1678455323.png', '2023-03-10 13:35:23.036560', '2023-03-10 08:05:23', '2023-03-10 08:05:23'),
(7679, 'test', 'test', 'content', 415, 12, '₹', 'General', '/storage/product/1678455435.png', '2023-03-10 13:37:15.308383', '2023-03-10 08:07:15', '2023-03-10 08:07:15'),
(7682, 'Hoodies', 'hoodies', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.', 452, 23, '₹', 'Verhuisdoos', '/storage/product/1678683220.png', '2023-03-13 04:53:40.088858', '2023-03-12 23:23:40', '2023-03-12 23:23:40'),
(7683, 'Hoodies', 'hoodies', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.', 456, 23, '₹', 'Verhuur', '/storage/product/1678683278.png', '2023-03-13 04:54:38.683888', '2023-03-12 23:24:38', '2023-03-12 23:24:38'),
(7684, 'Hoodies', 'hoodies', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.', 123, 85, '₹', 'Verhuur', '/storage/product/1678683385.png', '2023-03-13 04:56:25.787262', '2023-03-12 23:26:25', '2023-03-12 23:26:25'),
(7685, 'hoodi', 'hoodi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.', 635, 56, '₹', 'Webwinkel', '/storage/product/1678683475.jpg', '2023-03-13 04:57:55.999266', '2023-03-12 23:27:55', '2023-03-12 23:27:55'),
(7719, 'sdaS', 'sdas', 'AsaSA', 165416, 541, '₹', 'Verhuur', '/storage/product/1678707667.jpg', '2023-03-13 11:41:07.272654', '2023-03-13 06:11:07', '2023-03-13 06:11:07'),
(7720, 'sdaS', 'sdas', 'AsaSA', 165416, 541, '₹', 'Verhuur', '/storage/product/1678707672.jpg', '2023-03-13 11:41:12.234475', '2023-03-13 06:11:12', '2023-03-13 06:11:12'),
(7721, 'sadasdasd', 'sadasdasd', 'asdasd', 498498, 165, '₹', 'Verhuur', '/storage/product/1678707695.jpg', '2023-03-13 11:41:35.053899', '2023-03-13 06:11:35', '2023-03-13 06:11:35'),
(7722, 'asdas', 'asdas', 'dasdasd', 5984984, 4948, '₹', 'Verhuisdoos', '/storage/product/1678708159.jpg', '2023-03-13 11:49:19.364674', '2023-03-13 06:19:19', '2023-03-13 06:19:19'),
(7723, 'asdas', 'asdas', 'dasdasd', 5984984, 4948, '₹', 'Verhuisdoos', '/storage/product/1678708172.jpg', '2023-03-13 11:49:32.480399', '2023-03-13 06:19:32', '2023-03-13 06:19:32'),
(7724, 'rttreter', 'rttreter', 'terterter', 16444, 11, '₹', 'Webshop', '/storage/product/1678708194.jpg', '2023-03-13 11:49:54.643617', '2023-03-13 06:19:54', '2023-03-13 06:19:54'),
(7725, 'dfgdfgdfg', 'dfgdfgdfg', 'fdffgfgfg', 8585, 695, '₹', 'Shirts', '/storage/product/1678708748.png', '2023-03-13 11:59:08.697994', '2023-03-13 06:29:08', '2023-03-13 06:29:08'),
(7726, 'dsfsdfsd', 'dsfsdfsd', 'fsdfsdf', 54574, 123, '₹', 'Verhuur', '/storage/product/1678709669.jpg', '2023-03-13 12:14:29.286830', '2023-03-13 06:44:29', '2023-03-13 06:44:29'),
(7727, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710217.png', '2023-03-13 12:23:37.365557', '2023-03-13 06:53:37', '2023-03-13 06:53:37'),
(7728, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710253.png', '2023-03-13 12:24:13.497542', '2023-03-13 06:54:13', '2023-03-13 06:54:13'),
(7729, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710370.png', '2023-03-13 12:26:10.905854', '2023-03-13 06:56:10', '2023-03-13 06:56:10'),
(7730, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710375.png', '2023-03-13 12:26:15.442048', '2023-03-13 06:56:15', '2023-03-13 06:56:15'),
(7731, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710396.png', '2023-03-13 12:26:36.746926', '2023-03-13 06:56:36', '2023-03-13 06:56:36'),
(7732, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710402.png', '2023-03-13 12:26:42.717420', '2023-03-13 06:56:42', '2023-03-13 06:56:42'),
(7733, 'fgfg', 'fgfg', 'hfghfg', 4444, 123, '₹', 'Webshop', '/storage/product/1678710414.png', '2023-03-13 12:26:54.381331', '2023-03-13 06:56:54', '2023-03-13 06:56:54'),
(7738, 'saSAs', 'sasas', 'aSA', 899, 15, '₹', 'Verhuisdoos', '/storage/product/1678769478.png', '2023-03-14 04:51:18.352321', '2023-03-13 23:21:18', '2023-03-13 23:21:18'),
(7739, 'adads', 'adads', 'adasdas', 4898498, 5115, '₹', 'Verhuisdoos', '/storage/product/1678770251.jpg', '2023-03-14 05:04:11.429249', '2023-03-13 23:34:11', '2023-03-13 23:34:11'),
(7740, 'zcfsafas', 'zcfsafas', 'fasfas', 415545, 455, '₹', 'Verhuur', '/storage/product/1678770473.jpg', '2023-03-14 05:07:53.445301', '2023-03-13 23:37:53', '2023-03-13 23:37:53'),
(7741, 'dsfsdf', 'dsfsdf', 'sdfsdfsd', 58418, 115, '₹', 'Verhuur', '/storage/product/1678770606.jpg', '2023-03-14 05:10:06.747647', '2023-03-13 23:40:06', '2023-03-13 23:40:06'),
(7742, 'beach', 'beach', 'ggggggg', 415245, 523, '₹', 'Verhuur', '/storage/product/1678771456.jpg', '2023-03-14 05:24:16.428778', '2023-03-13 23:54:16', '2023-03-13 23:54:16'),
(7751, 'Test', 'test', 'test content', 4521, 12, '₹', 'Verhuur', '/storage/product/1678774806.jpg', '2023-03-14 06:20:06.799229', '2023-03-14 00:50:06', '2023-03-14 00:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`id`, `product_id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '163', 'Accessories', 'accessories', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(2, '70', 'Algemeen', 'algemeen', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(3, '69', 'General', 'general', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(4, '178', 'Hoodies', 'hoodies-women', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(5, '166', 'Hoodies', 'hoodies', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(6, '85', 'Inpakken', 'inpakken', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(7, '41', 'Mechelsesteenweg 328 - 330, Dendermonde', 'mechelsesteenweg-328-330-dendermonde-nl', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(8, '44', 'Mechelsesteenweg 328 – 360, Dendermonde', 'mechelsesteenweg-328-360-dendermonde', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(9, '164', 'Men', 'men', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(10, '71', 'Moving box', 'moving-box', '', '', '2023-01-24 03:05:50', '2023-01-24 03:05:50'),
(11, '45', 'Opbergdozen', 'storage-boxes-nl', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(12, '84', 'Packing', 'packing', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(13, '199', 'Rental', 'rental', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(14, '179', 'Shirts', 'shirts-women', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(15, '165', 'Shirts', 'shirts', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(16, '18', 'Storage Boxes', 'storage-boxes', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(17, '72', 'Verhuisdoos', 'verhuisdoos', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(18, '201', 'Verhuur', 'verhuur', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(19, '30', 'Webshop', 'webshop', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(20, '42', 'Webwinkel', 'webwinkel', '', '', '2023-01-24 03:07:16', '2023-01-24 03:07:16'),
(21, '177', 'Women', 'women', '', '', '2023-01-24 03:08:46', '2023-01-24 03:08:46'),
(23, NULL, 'dbox cate', 'dbox-cate', '<p>dbox cate content<br></p>', '/storage/productcategory/1676375751.jpg', '2023-02-14 06:20:39', '2023-02-14 06:25:51'),
(24, NULL, 'Dbox storage cate', 'dbox-storage-cate', '<p>dbox content<br></p>', '/storage/productcategory/1676375536.jpg', '2023-02-14 06:22:16', '2023-02-14 06:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `review_ratings`
--

CREATE TABLE `review_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_ratings`
--

INSERT INTO `review_ratings` (`id`, `post_id`, `post_name`, `name`, `email`, `phone`, `comments`, `star_rating`, `created_at`, `updated_at`) VALUES
(1, 4, 'Et natus dignissimos aspernatur molestiae incidunt.', 'Bekhum', 'bekhum@gmail.com', '789848498', 'Good', 3, '2023-02-20 05:26:47', '2023-02-20 05:26:47'),
(2, 52, 'hjkhjk', 'david', 'david34@gmail.com', '85965245', 'AverageNice', 4, '2023-02-20 06:16:10', '2023-02-20 06:16:10'),
(3, 10, 'adipisicing', 'David', 'david.45452@gmail.com', '569898498', 'Nice!!!', 5, '2023-02-27 05:36:24', '2023-02-27 05:36:24'),
(4, 9, 'beatae', 'Dav', 'dav@gmail.com', '85965845845', 'Nice', 5, '2023-03-13 07:01:34', '2023-03-13 07:01:34'),
(5, 2, 'middle', 'sdfsdf', 'sdfsd@gfdgd.com', '484984', 'fdsdfsd', 3, '2023-03-16 08:18:48', '2023-03-16 08:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'customer user', '2022-12-26 06:40:47', '2022-12-26 06:40:47'),
(2, 'Manager', 'Manager', '2022-12-26 06:47:45', '2022-12-26 06:47:45'),
(3, 'Executive', 'Executive', '2022-12-26 06:49:29', '2022-12-26 06:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reddit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `site_logo`, `description`, `facebook`, `twitter`, `instagram`, `reddit`, `email`, `copyright`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Example.com', '/storage/setting/1678078756.svg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.reddit.com/', 'lokesh@tvistech.com', 'Copyright © 2023 All rights reserved', '+91 9685745214454545', 'Tvistech CG Main Road, Ahmedabad', '2022-10-03 23:32:00', '2023-03-05 23:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tea', 'tea', NULL, '2022-10-04 01:57:43', '2022-10-04 01:57:43'),
(3, 'beach', 'beach', 'beach', '2022-12-26 04:04:55', '2022-12-26 04:04:55'),
(4, 'make', 'make', NULL, '2023-02-27 00:57:22', '2023-02-27 00:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `image`, `description`, `slug`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Zakir Hossen', 'web.zakirbd@gmail.com', 'users/default.png', NULL, '$2y$10$3Ec2tXEzOv0fOqOkOhYbxuYkE7y4bxPH.UM4mt7gbAsmjRx.1ZTp.', NULL, NULL, NULL, 'y0dxTeK2zB9MQ6im56pz3yWt1Ona9d7CvaOf3ekcr4FyG0tVjq0Q2yV5FMXM', '2022-10-03 23:32:00', '2022-12-19 05:28:38', ''),
(2, 'lokesh', 'lokesh@tvistech.com', 'users/default.png', NULL, '$2y$10$2dOwVgmsjS/sgfMeeE0qXenXhqaakG1GlSpGav.bBc4xpJjWzv5Am', '/storage/user/1664861792.jpg', NULL, NULL, 'oCt6AC6H7OntHNs1lC9xYuie8sWuy04tlvqOSsXQilJ7TlA5zz9KGqPHBRSO', '2022-10-03 23:38:56', '2022-12-19 05:30:05', '1'),
(3, 'test', 'test@gmail.com', 'users/default.png', NULL, '25f9e794323b453885f5181f1b624d0b', '/storage/user/1670999825.jpg', 'Say Something else.....', NULL, NULL, '2022-12-14 01:00:58', '2022-12-27 06:58:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_cat_product_id_unique` (`product_id`);

--
-- Indexes for table `review_ratings`
--
ALTER TABLE `review_ratings`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7761;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review_ratings`
--
ALTER TABLE `review_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

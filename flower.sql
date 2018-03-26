-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 04:30 AM
-- Server version: 5.6.11
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flower`
--
CREATE DATABASE IF NOT EXISTS `flower` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `flower`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`Slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Image`, `Slug`, `parent_id`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'hoa-1520933523.jpg', 'hoa', NULL, 1, NULL, '2018-03-13 09:32:07'),
(3, NULL, 'tin-tuc', NULL, 1, NULL, '2018-03-14 09:36:58'),
(16, NULL, 'tiec-cuoi', NULL, 1, '2018-03-13 08:28:13', '2018-03-14 07:59:16'),
(23, 'le-hoi-1521020255.jpg', 'le-hoi', 3, 1, '2018-03-13 09:14:06', '2018-03-14 09:37:39'),
(24, 'zzzzzzzzzzz-1520932718.jpg', 'zzzzzzzzzzz', 16, 1, '2018-03-13 09:18:41', '2018-03-13 09:18:41'),
(25, NULL, 'gioi-thieu', NULL, 0, '2018-03-18 12:55:39', '2018-03-18 12:55:39'),
(26, NULL, 'danh-gia-cua-khach-hang', NULL, 0, '2018-03-20 07:20:10', '2018-03-20 07:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories_detail`
--

CREATE TABLE IF NOT EXISTS `categories_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categories_id` int(10) unsigned NOT NULL,
  `lang_id` int(10) unsigned NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Descriptions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_detail_categories_id_foreign` (`categories_id`),
  KEY `categories_detail_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `categories_detail`
--

INSERT INTO `categories_detail` (`id`, `categories_id`, `lang_id`, `Name`, `Descriptions`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Flower', NULL, NULL, '2018-03-14 08:00:42'),
(3, 3, 1, 'Tin Tức', NULL, NULL, NULL),
(4, 1, 1, 'Hoa', 'Hoa Tươi', NULL, '2018-03-12 15:32:24'),
(6, 3, 2, 'News', NULL, NULL, NULL),
(16, 16, 1, 'Tiệc Cưới', 'Bài viết về tiệc cưới', '2018-03-13 08:28:13', '2018-03-13 08:28:13'),
(17, 16, 2, 'wedding', 'post wedding', '2018-03-13 08:28:14', '2018-03-13 08:28:14'),
(24, 23, 1, 'Lễ Hội', NULL, '2018-03-13 09:14:07', '2018-03-14 09:37:39'),
(25, 23, 2, 'Festival', NULL, '2018-03-13 09:14:07', '2018-03-14 09:37:39'),
(26, 24, 1, 'zzzzzzzzzzz', 'zzzzzzzzzzz', '2018-03-13 09:18:41', '2018-03-13 09:18:41'),
(27, 24, 2, 'zz', 'zz', '2018-03-13 09:18:41', '2018-03-13 09:18:41'),
(28, 25, 1, 'Giới Thiệu', NULL, '2018-03-18 12:55:39', '2018-03-18 12:55:39'),
(29, 25, 2, 'About US', NULL, '2018-03-18 12:55:39', '2018-03-18 12:55:39'),
(30, 26, 1, 'Đánh Giá Của Khách Hàng', NULL, '2018-03-20 07:20:11', '2018-03-20 07:20:11'),
(31, 26, 2, 'Our Client Say', NULL, '2018-03-20 07:20:11', '2018-03-20 07:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `Code`, `created_at`, `updated_at`) VALUES
(1, '#ff0000', NULL, NULL),
(2, '#0000ff', NULL, NULL),
(3, '##00ff00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_detail`
--

CREATE TABLE IF NOT EXISTS `color_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color_id` int(10) unsigned NOT NULL,
  `lang_id` int(10) unsigned NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_detail_color_id_foreign` (`color_id`),
  KEY `color_detail_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `color_detail`
--

INSERT INTO `color_detail` (`id`, `color_id`, `lang_id`, `Name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Đỏ', NULL, NULL),
(2, 2, 1, 'Xanh Lam', NULL, NULL),
(3, 3, 1, 'Xanh Lá', NULL, NULL),
(4, 1, 2, 'Red', NULL, NULL),
(5, 2, 2, 'Blue', NULL, NULL),
(6, 3, 2, 'Green', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_post_id_foreign` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Birth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hobbies` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_post_id_foreign` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 7, 'tin-moi-cua-topiary-0-1521451906.jpg', '2018-03-19 09:31:46', '2018-03-19 09:31:46'),
(2, 7, 'tin-moi-cua-topiary-1-1521451906.jpg', '2018-03-19 09:31:46', '2018-03-19 09:31:46'),
(3, 7, 'tin-moi-cua-topiary-2-1521451906.jpg', '2018-03-19 09:31:47', '2018-03-19 09:31:47'),
(4, 7, 'tin-moi-cua-topiary-3-1521451907.jpg', '2018-03-19 09:31:47', '2018-03-19 09:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `Image`, `Locale`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'vi.png', 'vi', 'Việt Nam', NULL, NULL),
(2, 'en.png', 'en', 'England', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=204 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(184, '2014_10_12_000000_create_users_table', 1),
(185, '2014_10_12_100000_create_password_resets_table', 1),
(186, '2018_02_23_042933_create_colors_table', 1),
(187, '2018_02_23_091644_create_categories_table', 1),
(188, '2018_02_23_091801_create_posts_table', 1),
(189, '2018_02_23_091899_create_lang_table', 1),
(190, '2018_02_23_091900_create_post_detail_table', 1),
(191, '2018_02_23_093056_create_color_detail_table', 1),
(192, '2018_02_23_093528_create_categories_detail_table', 1),
(193, '2018_02_23_093918_create_comment_table', 1),
(194, '2018_02_23_094904_create_customers_table', 1),
(195, '2018_02_23_095207_create_orders_table', 1),
(196, '2018_02_23_095546_create_order_detail_table', 1),
(197, '2018_03_06_101209_create_image_table', 1),
(202, '2018_03_10_012356_create_slide_table', 2),
(203, '2018_03_10_012427_create_slide_detail_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ship_user_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `Ship` tinyint(1) DEFAULT '0',
  `Active` tinyint(1) DEFAULT '0',
  `Ship_Date` date DEFAULT NULL,
  `Slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_slug_unique` (`Slug`),
  KEY `orders_ship_user_id_foreign` (`ship_user_id`),
  KEY `orders_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `post_id` int(10) unsigned DEFAULT NULL,
  `Method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_detail_order_id_foreign` (`order_id`),
  KEY `order_detail_post_id_foreign` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categories_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `Status` tinyint(1) DEFAULT '1',
  `Slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Kind` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `View` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`Slug`),
  KEY `posts_categories_id_foreign` (`categories_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_color_id_foreign` (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `categories_id`, `user_id`, `color_id`, `Status`, `Slug`, `Avatar`, `Kind`, `View`, `created_at`, `updated_at`) VALUES
(7, 3, 1, 1, 1, 'tin-moi-cua-topiary', 'tin-moi-cua-topiary-1521451905.jpg', NULL, '0', '2018-03-07 15:33:10', '2018-03-19 09:31:46'),
(8, 25, 1, 1, 0, 'xin-chao-den-voi-topiary', 'welcome-to-topiary-1521378869.jpg', NULL, '0', '2018-03-18 13:14:30', '2018-03-19 08:02:53'),
(9, 1, 1, 1, 1, 'test-hoa-1', 'test-hoa-1-1521473579.jpg', NULL, '0', '2018-03-19 15:33:05', '2018-03-19 15:33:05'),
(10, 1, 1, 1, 1, 'thu-nghiem-hoa-1', 'thu-nghiem-hoa-1-1521473645.jpg', NULL, '0', '2018-03-19 15:34:10', '2018-03-19 15:34:10'),
(12, 1, 1, 1, 1, 'thu-nghiem-hoa-2', 'thu-nghiem-hoa-2-1521473867.jpg', NULL, '0', '2018-03-19 15:37:51', '2018-03-19 15:37:51'),
(13, 1, 1, 1, 1, 'thu-nghiem-hoa-3', 'thu-nghiem-hoa-3-1521474088.jpg', NULL, '0', '2018-03-19 15:41:33', '2018-03-19 15:41:33'),
(14, 16, 1, 1, 1, 'thu-nghiem-tiec-cuoi-3', 'thu-nghiem-tiec-cuoi-3-1521474645.jpg', NULL, '0', '2018-03-19 15:50:45', '2018-03-19 15:50:45'),
(15, 26, 1, 1, 0, 'laura-paul', 'laura-paul-1521530722.jpg', NULL, '0', '2018-03-20 07:25:22', '2018-03-20 07:25:48'),
(16, 26, 1, 1, 0, 'nguyen-thai-nghia', 'nguyen-thai-nghia-1521532425.jpg', NULL, '0', '2018-03-20 07:53:22', '2018-03-20 07:53:45'),
(17, 1, 1, 1, 1, 'gio-hoa-tuoi-tinh-khuc-vang', 'gio-hoa-tuoi-tinh-khuc-vang-1521536711.jpg', NULL, '0', '2018-03-20 09:05:16', '2018-03-20 09:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `post_detail`
--

CREATE TABLE IF NOT EXISTS `post_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `lang_id` int(10) unsigned NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Short_Descriptions` text COLLATE utf8_unicode_ci,
  `Descriptions` text COLLATE utf8_unicode_ci,
  `Avartar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price_Sale` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `View` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_detail_post_id_foreign` (`post_id`),
  KEY `post_detail_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `post_detail`
--

INSERT INTO `post_detail` (`id`, `post_id`, `lang_id`, `Title`, `Short_Descriptions`, `Descriptions`, `Avartar`, `Price`, `Price_Sale`, `View`, `created_at`, `updated_at`) VALUES
(9, 7, 1, 'Tin Mới Của Topiary', 'Ut enim ad minima veniam', '<p>Quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate. vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>', NULL, NULL, NULL, NULL, '2018-03-07 15:33:10', '2018-03-19 09:31:47'),
(10, 7, 2, 'tesst', NULL, NULL, NULL, '1', NULL, NULL, '2018-03-07 15:33:10', '2018-03-07 15:33:10'),
(11, 8, 1, 'Xin Chào Đến Với Topiary', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<h4>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.2</h4>', NULL, NULL, NULL, NULL, '2018-03-18 13:14:31', '2018-03-19 09:11:04'),
(12, 8, 2, 'Welcome To Topiary', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<h4>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.12</h4>', NULL, NULL, NULL, NULL, '2018-03-18 13:14:31', '2018-03-19 09:11:03'),
(13, 9, 1, 'test hoa 1', NULL, '<p>test hoa 1&nbsp;</p>', NULL, '250000', NULL, NULL, '2018-03-19 15:33:05', '2018-03-19 15:33:05'),
(14, 10, 1, 'thử nghiệm hoa 1', NULL, '<p>test hoa 1&nbsp;</p>', NULL, '250000', NULL, NULL, '2018-03-19 15:34:10', '2018-03-19 15:34:10'),
(15, 10, 2, 'test flower', NULL, '<p>test 1</p>', NULL, '10', NULL, NULL, '2018-03-19 15:34:10', '2018-03-19 15:34:10'),
(16, 12, 1, 'thử nghiệm hoa 2', NULL, '<p>test hoa 2</p>', NULL, '250000', NULL, NULL, '2018-03-19 15:37:51', '2018-03-19 15:37:51'),
(17, 12, 2, 'test flower 2', NULL, '<p>test 2</p>', NULL, '10', NULL, NULL, '2018-03-19 15:37:51', '2018-03-19 15:37:51'),
(18, 13, 1, 'thử nghiệm hoa 3', NULL, '<p>test hoa 3</p>', NULL, '250000', NULL, NULL, '2018-03-19 15:41:33', '2018-03-19 15:41:33'),
(19, 13, 2, 'test flower 3', NULL, '<p>test 3</p>', NULL, '10', NULL, NULL, '2018-03-19 15:41:33', '2018-03-19 15:41:33'),
(20, 14, 1, 'thử nghiệm tiệc cưới 3', NULL, '<p>ti&ecirc;c cưới&nbsp;3</p>', NULL, '250000', NULL, NULL, '2018-03-19 15:50:45', '2018-03-19 15:50:45'),
(21, 14, 2, 'test wedding 1', NULL, '<p>wedding 1</p>', NULL, '10', NULL, NULL, '2018-03-19 15:50:45', '2018-03-19 15:50:45'),
(22, 15, 1, 'Laura Paul', 'Lorem', '<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, non laoreet dolor.</p>', NULL, NULL, NULL, NULL, '2018-03-20 07:25:22', '2018-03-20 07:25:22'),
(23, 15, 2, 'Laura Paul', 'Lorem', '<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, non laoreet dolor.</p>', NULL, NULL, NULL, NULL, '2018-03-20 07:25:23', '2018-03-20 07:25:23'),
(24, 16, 1, 'Nguyễn Thái Nghĩa', 'Thiết kế website', '<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, non laoreet dolor.</p>', NULL, NULL, NULL, NULL, '2018-03-20 07:53:22', '2018-03-20 07:53:22'),
(25, 16, 2, 'Thai Nghia Nguyen', 'web designer', '<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, non laoreet dolor.</p>', NULL, NULL, NULL, NULL, '2018-03-20 07:53:22', '2018-03-20 07:53:22'),
(26, 17, 1, 'GIỎ HOA TƯƠI - TÌNH KHÚC VÀNG', 'Những ngươi luôn sống bên bạn và trải qua vui buồn, khó khăn cùng bạn thì đó là những người đáng cho bạn trân trọng cũng như dành tình cảm trân quý nhất dành cho họ. Tựa như bản tình khúc vàng cất lên giúp cho tình cảm ấy càng thêm sâu sắc, bền bĩ cũng năm tháng mãi không nhạt nhòa theo màu thời gian. Thích hợp tặng sinh nhật, hẹn hò, kỉ niệm ngày cưới..', '<p>Giỏ hoa tươi T&igrave;nh Kh&uacute;c V&agrave;ng gồm c&aacute;c loại hoa:</p>\r\n\r\n<p>- Hoa hồng trứng g&agrave;</p>\r\n\r\n<p>- Hoa c&aacute;t tường</p>\r\n\r\n<p>- Hoa thủy ti&ecirc;n</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>* Shop HoaYeuThuong cam kết giao gấp trong v&ograve;ng 2 giờ kể từ khi qu&yacute; kh&aacute;ch đặt xong sản phẩm hoa</p>', NULL, '2500000', '2000000', NULL, '2018-03-20 09:05:17', '2018-03-20 09:36:55'),
(27, 17, 2, 'GIỎ HOA TƯƠI - TÌNH KHÚC VÀNG(Tiếng Anh)', 'Những ngươi luôn sống bên bạn và trải qua vui buồn, khó khăn cùng bạn thì đó là những người đáng cho bạn trân trọng cũng như dành tình cảm trân quý nhất dành cho họ. Tựa như bản tình khúc vàng cất lên giúp cho tình cảm ấy càng thêm sâu sắc, bền bĩ cũng năm tháng mãi không nhạt nhòa theo màu thời gian. Thích hợp tặng sinh nhật, hẹn hò, kỉ niệm ngày cưới..(Tiếng Anh)', '<p>Giỏ hoa tươi T&igrave;nh Kh&uacute;c V&agrave;ng gồm c&aacute;c loại hoa:</p>\r\n\r\n<p>- Hoa hồng trứng g&agrave;</p>\r\n\r\n<p>- Hoa c&aacute;t tường</p>\r\n\r\n<p>- Hoa thủy ti&ecirc;n</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>* Shop HoaYeuThuong cam kết giao gấp trong v&ograve;ng 2 giờ kể từ khi qu&yacute; kh&aacute;ch đặt xong sản phẩm hoa</p>', NULL, '100', '85', NULL, '2018-03-20 09:05:17', '2018-03-20 09:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`, `Status`, `created_at`, `updated_at`) VALUES
(1, '-1521255769.jpg', 1, NULL, '2018-03-17 03:03:00'),
(4, '-1521254284.jpg', 1, '2018-03-12 01:40:52', '2018-03-17 02:38:13'),
(5, '-1521255542.jpg', 1, '2018-03-12 01:41:23', '2018-03-17 02:59:14'),
(6, 'if-we-provide-best-design-1521254925.jpg', 1, '2018-03-17 02:48:56', '2018-03-17 02:48:56'),
(7, 'if-we-provide-best-design-1521255414.jpg', 1, '2018-03-17 02:57:00', '2018-03-17 02:57:00'),
(8, '-1521256650.jpeg', 1, '2018-03-17 03:13:28', '2018-03-17 03:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `slide_detail`
--

CREATE TABLE IF NOT EXISTS `slide_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slide_id` int(10) unsigned DEFAULT NULL,
  `lang_id` int(10) unsigned DEFAULT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Descriptions` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `css` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Top` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bottom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Right` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Left` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slide_detail_slide_id_foreign` (`slide_id`),
  KEY `slide_detail_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `slide_detail`
--

INSERT INTO `slide_detail` (`id`, `slide_id`, `lang_id`, `Title`, `Descriptions`, `url`, `css`, `Top`, `Bottom`, `Right`, `Left`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'IF We provide best design', 'We provide best Interior living room', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 02:36:37'),
(6, 4, 1, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 01:40:52', '2018-03-17 02:38:42'),
(7, 4, 2, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 01:40:52', '2018-03-17 02:38:42'),
(8, 5, 1, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 01:41:23', '2018-03-17 02:59:14'),
(9, 5, 2, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 01:41:23', '2018-03-17 02:59:14'),
(10, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 02:49:30', '2018-03-12 02:49:30'),
(11, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 02:49:52', '2018-03-12 02:49:52'),
(12, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 02:56:38', '2018-03-12 02:56:38'),
(13, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:24:32', '2018-03-12 03:24:32'),
(14, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:25:28', '2018-03-12 03:25:28'),
(15, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:25:35', '2018-03-12 03:25:35'),
(16, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:27:58', '2018-03-12 03:27:58'),
(17, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:28:51', '2018-03-12 03:28:51'),
(18, 5, 2, NULL, 'asfasad á d ád', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:30:06', '2018-03-12 03:30:06'),
(19, 5, 2, NULL, 'á d ád', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 03:30:22', '2018-03-12 03:30:22'),
(20, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 04:09:44', '2018-03-12 04:09:44'),
(21, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 04:10:15', '2018-03-12 04:10:15'),
(22, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 04:10:50', '2018-03-12 04:10:50'),
(23, 1, 2, 'IFWe provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 13:45:23', '2018-03-17 02:36:37'),
(24, 6, 1, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 02:48:56', '2018-03-17 02:48:56'),
(25, 6, 2, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 02:48:56', '2018-03-17 02:48:56'),
(26, 7, 1, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 02:57:00', '2018-03-17 02:57:00'),
(27, 7, 2, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 02:57:01', '2018-03-17 02:57:01'),
(28, 8, 1, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 03:13:28', '2018-03-17 03:13:28'),
(29, 8, 2, 'IF We provide best design', 'We provide best Interior living rooms', NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-17 03:13:28', '2018-03-17 03:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Api_Token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `Address`, `Detail`, `Api_Token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$9BENQy5Dj188Q/K/oXFvhe5FCW.DzU1igTJdvdaPfvudiCQbD6Jri', 'admin', 'admin', NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_detail`
--
ALTER TABLE `categories_detail`
  ADD CONSTRAINT `categories_detail_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_detail_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color_detail`
--
ALTER TABLE `color_detail`
  ADD CONSTRAINT `color_detail_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `color_detail_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ship_user_id_foreign` FOREIGN KEY (`ship_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_detail`
--
ALTER TABLE `post_detail`
  ADD CONSTRAINT `post_detail_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_detail_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slide_detail`
--
ALTER TABLE `slide_detail`
  ADD CONSTRAINT `slide_detail_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slide_detail_slide_id_foreign` FOREIGN KEY (`slide_id`) REFERENCES `slide` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

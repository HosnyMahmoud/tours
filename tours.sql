-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 05:23 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pre` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `pre`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eslam', 'admin@sawa4.com.eg', '$2y$10$UsBmwucORMwVquoRkc9T2OihSpOMgdKRpl6Kg4dZZTmI5nhFG2G9.', 'settings|users|admins', 'V1mf9Mh6bZ3MmSVMixkV4T0aSA1Z45NglPmMuIa9OmW90ggZfSCkOHmLBqgO', '0000-00-00 00:00:00', '2016-10-02 05:26:20'),
(2, 'Vivian Hester', 'bafa@gmail.com', '$2y$10$b1IKFY2.A/U1kd8V.Tl3p./5iggXFuPxmktx3.G37rC/JK.RsH8Gm', 'settings|users|admins', NULL, '2016-08-27 06:20:43', '2016-08-27 06:20:43'),
(3, 'Macaulay Carney', 'xakelaqet@gmail.com', '$2y$10$rKCOaYAFFGfbtXuihGQfe..0rT1UviPpfUnXC.FYWqMeo9fLm6MdS', 'settings|users|admins', NULL, '2016-08-27 07:10:34', '2016-08-27 07:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `airline_tickets_reservs`
--

CREATE TABLE IF NOT EXISTS `airline_tickets_reservs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `airport_from` int(11) NOT NULL,
  `airport_to` int(11) NOT NULL,
  `num_persons` int(11) NOT NULL,
  `num_child` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airline_tickets_reservs`
--

INSERT INTO `airline_tickets_reservs` (`id`, `user_id`, `airport_from`, `airport_to`, `num_persons`, `num_child`, `type`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 5, 3, 0, '2016-09-09 22:00:00', '0000-00-00 00:00:00', 2, '2016-09-06 06:58:19', '2016-10-04 12:08:22'),
(2, 1, 2, 1, 5, 3, 1, '2016-09-09 22:00:00', '2016-09-22 22:00:00', 1, '2016-09-06 07:37:36', '2016-09-06 07:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `air_ports`
--

CREATE TABLE IF NOT EXISTS `air_ports` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `air_ports`
--

INSERT INTO `air_ports` (`id`, `name_ar`, `name_en`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة الدولي ', 'Cairo International', 7, '2016-08-30 06:23:02', '2016-08-30 06:23:02'),
(2, 'مطار الإسكندرية الدولي', 'Alexandria International Airport', 8, '2016-08-30 06:27:16', '2016-08-30 06:27:16'),
(3, 'Test Air ports', 'Test Air ports En', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `api_settings`
--

CREATE TABLE IF NOT EXISTS `api_settings` (
  `id` int(10) unsigned NOT NULL,
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_settings`
--

INSERT INTO `api_settings` (`id`, `secret`, `version`, `created_at`, `updated_at`) VALUES
(1, 'sawa4', '1.0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cars_brand`
--

CREATE TABLE IF NOT EXISTS `cars_brand` (
  `id` int(10) unsigned NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_brand`
--

INSERT INTO `cars_brand` (`id`, `brand_name`, `country_id`, `city_id`, `slug_ar`, `slug_en`, `meta_desc_ar`, `meta_desc_en`, `tags_ar`, `tags_en`, `created_at`, `updated_at`) VALUES
(1, 'Bmw', 5, 8, 'bmw', 'bmw', 'wwwwwwwwwwwwwwww', '', 'wwwwwwwwww', 'wwwwwwwwwwww', '2016-07-30 11:47:17', '2016-07-30 14:45:01'),
(2, 'toyta', 9, 10, '', '', '', '', '', '', '2016-07-30 11:51:38', '2016-07-30 11:51:38'),
(3, 'Kia', 0, 0, '', '', '', '', '', '', '2016-07-30 11:54:17', '2016-07-30 11:54:17'),
(4, 'Ford', 0, 0, '', '', '', '', '', '', '2016-07-30 11:54:57', '2016-07-30 11:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `cars_models`
--

CREATE TABLE IF NOT EXISTS `cars_models` (
  `id` int(10) unsigned NOT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_models`
--

INSERT INTO `cars_models` (`id`, `model_name`, `price`, `brand_id`, `country_id`, `city_id`, `slug_ar`, `slug_en`, `meta_desc_ar`, `meta_desc_en`, `tags_ar`, `tags_en`, `created_at`, `updated_at`) VALUES
(1, 'bmw 200', '300000', 1, 5, 7, '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tana Whitfield', '814', 4, 8, 9, 'tana-whitfield', 'tana-whitfield', 'In quasi ipsam eos, impedit, dolor nisi ipsum, et voluptatem, atque eius pariatur. Consequat. Aperiam officia aut.', '', 'Blanditiis iste cumque doloribus eos voluptate adipisicing irure magnam irure amet eos tempor', 'Blanditiis mollit sunt id dolor nulla consectetur amet vero', '0000-00-00 00:00:00', '2016-08-25 11:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `cars_offers`
--

CREATE TABLE IF NOT EXISTS `cars_offers` (
  `id` int(10) unsigned NOT NULL,
  `offer_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `offer_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_offers`
--

INSERT INTO `cars_offers` (`id`, `offer_name_ar`, `offer_name_en`, `offer_desc_ar`, `offer_desc_en`, `country_id`, `city_id`, `price`, `color`, `image`, `brand_id`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 'offer name ar ', 'offer name en ', 'offer desc ar', 'offer desc en', 5, 7, '3000', 'red', 'test image', 1, 1, '2016-08-07 22:00:00', '2016-08-02 22:00:00'),
(2, 'test name arabic ', 'test name English', 'some desc', 'some desc en', 9, 10, '2000', 'blue', 'test imgae 2', 2, 2, '2016-08-07 22:00:00', '2016-08-09 22:00:00'),
(3, 'Xavier Flores', 'Richard Kirby', 'Cumque ullam excepturi a voluptas aliquam sit, deserunt atque itaque minima nihil sequi dolor Nam minus.', 'Quos quisquam dolore aspernatur explicabo. Vel officia ut est enim qui.', 6, 11, '184', 'Vel dolore non sunt necessitat', '', 2, 2, '2016-08-27 11:38:13', '2016-08-28 06:50:32'),
(4, 'Kato Collins', 'Declan Graham', 'Asperiores sed ullamco dolore voluptatem voluptatem. Laborum. Quasi eum pariatur? Officia ex occaecat dolorem.', 'Quaerat quo nisi id numquam sunt amet, et qui voluptas est adipisci dicta dignissimos cupiditate eiusmod.', 5, 7, '3473', 'Aut enim laborum est ut sit au', '1472374383.jpg', 2, 1, '2016-08-27 11:38:42', '2016-08-28 06:53:03'),
(5, 'Adria Rosa', 'Risa Rodgers', 'Reprehenderit, magna delectus, enim corrupti, incididunt dolor anim illo consequatur.', 'Ut fugiat, asperiores omnis cumque atque laboris ea dolorem iure ipsa.', 6, 10, '168', 'Excepturi qui nisi culpa ex in', '', 2, 2, '2016-08-27 11:39:55', '2016-08-28 06:55:00'),
(7, 'الأسم باللغة العربية', 'الأسم باللغة الأنجليزية', 'الوصف باللغة العربية', 'الوصف باللغة الأنجليزية', 5, 7, '5000', 'اسود', '1472372583.jpg', 1, 1, '2016-08-28 06:23:03', '2016-08-28 06:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `cars_reservations`
--

CREATE TABLE IF NOT EXISTS `cars_reservations` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_reservations`
--

INSERT INTO `cars_reservations` (`id`, `user_id`, `city_id`, `model_id`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`, `offer_id`) VALUES
(1, 1, 7, 1, '2016-03-31 22:00:00', '2016-04-30 22:00:00', 2, '2016-08-06 07:48:53', '2016-10-04 10:27:29', 7);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `country_id`, `created_at`, `updated_at`) VALUES
(7, 'القااهرة ', 'Cairo ', 5, '2016-07-30 14:42:51', '2016-07-30 14:42:51'),
(8, 'الاسكندرية', 'Alex', 5, '2016-07-30 14:43:15', '2016-07-30 14:43:15'),
(9, 'أسيوط', 'Asute', 5, '2016-07-30 14:43:46', '2016-07-30 14:43:46'),
(10, 'اسطنبول', 'astunbol', 9, '2016-08-02 12:21:52', '2016-08-02 12:21:52'),
(11, 'Ryder House', 'Vera Dalton', 9, '2016-08-10 09:31:30', '2016-08-10 09:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(10) unsigned NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `title_ar`, `title_en`, `content_ar`, `content_en`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(5, 'مصر', 'Egypt', '2016-07-30 13:27:34', '2016-07-30 13:31:31'),
(6, 'انجولا', 'ِAngola', '2016-07-30 13:39:18', '2016-07-30 13:39:18'),
(8, 'السعودية ', 'sudi arabia', '2016-07-30 13:46:38', '2016-07-30 13:46:38'),
(9, 'تركياا', 'Turkish', '2016-08-02 12:20:42', '2016-08-02 12:20:42'),
(10, 'sadsad', 'sadsadsad', '2016-08-25 12:10:22', '2016-08-25 12:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `num_of_per` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `price`, `num_of_per`, `country_id`, `city_id`, `stars`, `logo`, `images`, `slug_ar`, `slug_en`, `meta_desc_ar`, `meta_desc_en`, `tags_ar`, `tags_en`, `created_at`, `updated_at`) VALUES
(1, 'Kylie Norris', 'Kylie Norris', 'Aute recusandae. Duis minim at aut qui aliqua. Ut qui quia numquam consequatur? Id laboriosam, ipsam cum fuga. Esse, minima.', 'Deserunt amet, quo asperiores laudantium, doloremque laborum autem quae mollit eveniet.', '224.00', 0, 9, 8, 4, '', '', 'kylie-norris', 'kylie-norris', 'Quisquam quae et labore eu aute accusamus voluptatem, quia eum.', 'Consequatur, elit, vel et non ex iste cupidatat irure a fugiat, tempor est, quia aliquid aliquid cumque consectetur.', 'Sed nesciunt dolorem asperiores cillum odio eiusmod aliquip alias', 'Velit aut ullamco voluptas est reprehenderit sint tenetur consectetur accusamus consequat Aut sit ea quia aut rem anim', '2016-07-30 09:21:10', '2016-10-02 14:31:17'),
(2, 'Kimberley Price', 'Chaney Woodward', 'Architecto eum et aperiam ea consequatur, incididunt blanditiis esse provident, recusandae. Architecto fugiat, neque consequuntur.', 'Illum, culpa, qui culpa, consequatur, atque sit, incidunt, et irure dolor dolor duis laudantium.', '585.00', 0, 10, 8, 5, '', '1472377917_1.jpg|1472377917_1.jpg|1472377917_1.jpg|1472377917_1.jpg|1472377917_1.jpg', 'kimberley-price', 'chaney-woodward', 'Corrupti, quis sint voluptates omnis incidunt, qui molestiae officia quia.', 'Velit, quis sint sint ea facilis consequatur, voluptas aut possimus, quo consequatur? Consectetur, molestiae vel.', 'Laboris mollitia ut quae perferendis repellendus Iure ea eiusmod tenetur qui do ducimus soluta sint tempora', 'Suscipit consequatur tenetur quisquam explicabo Dolore vel pariatur Mollitia non nisi rerum', '2016-07-30 09:22:34', '2016-08-28 07:51:57'),
(3, 'النادي الاهلي يفوز الزمالك كالعاادة', 'الاسم بالانجليزية', 'الوصف العربي', 'الوصف الانجلش', '5555.00', 5, 10, 9, 5, '', '', 'النادي-الاهلي-يفوز-الزمالك-كالعاادة', 'الاسم-بالانجليزية', '', '', '', '', '2016-07-30 09:22:34', '2016-07-30 09:22:34'),
(4, 'عرض خااص ', 'الأسم باللغة الأنجليزية', 'fffffffffffffffff', 'ffffffffffffffff', '5000.00', 7, 5, 7, 0, '', '', 'عرض-خااص', 'الأسم-باللغة-الأنجليزية', 'wwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwww', '2016-08-03 07:31:39', '2016-08-03 07:31:39'),
(5, 'تجربة اسم عربي ', 'تجربة اسم انجليزي ', '', '', '0.00', 0, 0, 0, 0, '', '', 'تجربة-اسم-عربي', 'تجربة-اسم-انجليزي', '', '', '', '', '2016-08-27 05:38:51', '2016-08-27 05:38:51'),
(6, 'تجربة اسم عربي ', 'تجربة اسم انجليزي ', '', '', '0.00', 0, 0, 8, 0, '', '', 'تجربة-اسم-عربي', 'تجربة-اسم-انجليزي', '', '', '', '', '2016-08-27 05:39:09', '2016-08-27 05:39:09'),
(7, 'تجربة اسم عربي ', 'تجربة اسم انجليزي ', '', '', '0.00', 0, 0, 0, 0, '', '', 'تجربة-اسم-عربي', 'تجربة-اسم-انجليزي', '', '', '', '', '2016-08-27 05:40:47', '2016-08-27 05:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_reservations`
--

CREATE TABLE IF NOT EXISTS `hotels_reservations` (
  `id` int(10) unsigned NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels_reservations`
--

INSERT INTO `hotels_reservations` (`id`, `hotel_id`, `user_id`, `persons`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2016-09-14 22:00:00', '2016-09-14 22:00:00', 2, '0000-00-00 00:00:00', '2016-10-04 12:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg`, `user_id`, `admin_id`, `sender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hello , sir', 1, 0, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'test msg', 1, 0, 1, 0, '2016-08-08 12:54:49', '2016-08-08 12:54:49'),
(3, 'sdsadsadsadsad', 1, 0, 0, 0, '2016-08-08 12:57:22', '2016-08-08 12:57:22'),
(4, 'ewrewr', 1, 0, 1, 0, '2016-08-08 13:09:16', '2016-08-08 13:09:16'),
(5, '10', 1, 0, 1, 0, '2016-10-05 12:47:39', '2016-10-05 12:47:39'),
(6, 'aaaaa', 1, 0, 1, 0, '2016-10-05 13:01:16', '2016-10-05 13:01:16'),
(7, 'sssssssssssssss', 1, 0, 1, 0, '2016-10-05 13:01:21', '2016-10-05 13:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_admins_table', 1),
('2014_10_12_000000_create_users_table', 13),
('2016_03_16_163518_create_api_settings_table', 1),
('2016_06_26_063535_create_settings_table', 1),
('2016_07_16_110433_create_cars_brand_tabel', 1),
('2016_07_16_110445_create_cars_model_tabel', 1),
('2016_07_19_130348_create_hotels_table', 1),
('2016_07_20_130600_create_offers_table', 9),
('2016_07_25_084129_create_travels_table', 5),
('2016_07_25_142831_create_hotels__reservations_table', 4),
('2016_07_30_015909_create_countries_table', 1),
('2016_07_30_015927_create_cities_table', 1),
('2016_08_03_091737_create_cars_offers_table', 2),
('2016_08_06_093905_create_cars__reservations_table', 3),
('2016_08_08_114634_create_messages_table', 5),
('2016_08_09_085755_create_wish_lists_table', 6),
('2016_08_09_111935_create_special_offers_table', 7),
('2016_08_10_111043_create_special_offer_reservs_table', 8),
('2016_08_30_073510_create_air_ports_table', 10),
('2016_09_04_125028_create_airline_tickets_reservs_table', 11),
('2016_09_25_082017_create_contact_us_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservtravel`
--

CREATE TABLE IF NOT EXISTS `reservtravel` (
  `id` int(10) unsigned NOT NULL,
  `travel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservtravel`
--

INSERT INTO `reservtravel` (`id`, `travel_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 2, '2016-08-08 09:36:13', '2016-10-04 12:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `site_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `site_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `site_tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `site_tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `address_en` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_Plus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedIn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name_ar`, `site_name_en`, `site_desc_ar`, `site_desc_en`, `site_tags_ar`, `site_tags_en`, `phone`, `email`, `address_ar`, `address_en`, `facebook`, `twitter`, `google_Plus`, `youtube`, `linkedIn`, `site_status`, `created_at`, `updated_at`) VALUES
(1, 'فويدج', 'Voyage App', 'فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج ', 'voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App ', 'فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج فويدج ', 'voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App voyage App ', '11111 - 22222', 'voyageapp.travel@gmail.com', '18 ش مصطفى النحاس , مدينه نصر , القاهره', '18 Mustafa El Nahas Street,\r\nMadinet El-Nasr', 'https://www.facebook.com/VoyageApp', 'twitter link', 'google_Plus ', 'youtube', 'linkedIn', 1, '2016-08-26 22:00:00', '2016-10-02 07:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE IF NOT EXISTS `special_offers` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `num_of_persons` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL DEFAULT '0000-00-00',
  `date_to` date NOT NULL DEFAULT '0000-00-00',
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`id`, `name_ar`, `name_en`, `price`, `desc_ar`, `desc_en`, `status`, `num_of_persons`, `images`, `date_from`, `date_to`, `slug_ar`, `slug_en`, `meta_desc_ar`, `meta_desc_en`, `tags_ar`, `tags_en`, `created_at`, `updated_at`) VALUES
(1, 'Cleo Guy', 'Marvin Page', '436.00', 'Quod nemo qui illo culpa ut ut amet, sit, iste rerum.', 'Expedita ut ipsum, consectetur, sit optio, voluptate magna consequatur dolores earum maiores id.', 1, 5, '1_1472557279.jpg', '1987-05-04', '2016-09-03', '', '', 'Incidunt, adipisci velit, a maiores et doloribus minim natus amet, nostrud.', 'Ut inventore laborum qui nesciunt, eiusmod eos et aut et earum asperiores nulla esse.', 'Laborum Anim consectetur esse pariatur Veritatis minus est explicabo Obcaecati nulla', 'Inventore qui soluta illum lorem consectetur voluptas nulla quos qui sint cupidatat labore magna blanditiis deserunt', '0000-00-00 00:00:00', '2016-08-30 09:41:19'),
(2, 'عرض الصيف ', 'samar  ', '500.00', 'desc en', 'desc en 2', 1, 6, 'Array', '2016-08-15', '2016-08-20', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-08-30 06:50:17'),
(3, 'عرض خااااااص ', 'Special offers ', '6000.00', 'عرض خاااااااااااااااااااااااااص ', 'عرض خاااااااااااااااااااااااااص \r\nباللغة الانجليزية', 0, 5, 'Array', '2016-08-10', '2016-09-30', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-08-29 13:11:51'),
(4, 'Hayley Dillard', 'Bianca Skinner', '843.00', '', '', 0, 0, '', '0000-00-00', '2016-10-29', '', '', '', '', '', '', '2016-08-29 07:38:12', '2016-08-29 12:59:51'),
(5, 'Xenos Barnett', 'Wyatt Brady', '437.00', '', '', 1, 0, '', '2016-08-31', '2016-09-03', '', '', 'Cumque mollit dignissimos dolor impedit, dolor quisquam et magna et laboris nulla ipsum, magna qui accusantium quas consequuntur ut aliquam.', 'Voluptatem aut ad praesentium nisi quia reprehenderit, harum non alias sed quam voluptatem corrupti, at ut.', 'Tempora ex voluptatem est temporibus aut recusandae Voluptatem In provident cum eligendi itaque id non esse labore cupiditate exercitation illo', 'Possimus est velit nostrud nemo Nam doloremque eaque eum error laborum Nam labore dolor facere et doloremque corrupti', '2016-08-29 07:49:06', '2016-08-29 07:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `special_offer_reservs`
--

CREATE TABLE IF NOT EXISTS `special_offer_reservs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `special_offer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_offer_reservs`
--

INSERT INTO `special_offer_reservs` (`id`, `user_id`, `special_offer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2016-08-10 09:50:00', '2016-10-04 12:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE IF NOT EXISTS `travels` (
  `id` int(10) unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `tags_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `hotel_id`, `nights`, `type`, `country_id`, `city_id`, `images`, `price`, `date_from`, `date_to`, `slug_ar`, `slug_en`, `meta_desc_ar`, `meta_desc_en`, `tags_ar`, `tags_en`, `created_at`, `updated_at`) VALUES
(1, 'اسم الرحلة بالعربي ', 'الاسم بالانجلش ', 'وصف عربي ', 'وصف انجلش ', 2, 6, 0, 9, 10, '1_1472412702.jpg', '2000.00', '2016-08-01 22:00:00', '2016-08-30 22:00:00', 'deborah-chapman', 'deborah-chapman', '', '', '', '', '0000-00-00 00:00:00', '2016-08-30 08:00:10'),
(2, 'اسم الرحلة باللغة العربية', 'اسم الرحلة باللغة الانجيزية', 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي ', 'وصف انجليش ', 2, 5, 1, 9, 10, '2_1472412419.jpg', '5000.00', '2016-07-31 22:00:00', '2016-08-30 22:00:00', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Deborah Chapman', 'Vanna Estes', 'Consequatur? Quia sunt reprehenderit nobis reiciendis deleniti voluptas exercitationem quasi veritatis ullamco ullam ab eveniet, dolore voluptatem dolorum.', 'Do illo aliqua. Quod harum doloremque consectetur id voluptatem esse dolorem enim sed qui ut est labore in cupidatat qui.', 2, 8, 2, 5, 7, '1_1472411031.jpg', '10711.00', '2016-08-30 22:00:00', '2016-09-02 22:00:00', 'deborah-chapman', 'vanna-estes', 'Nisi obcaecati reprehenderit temporibus et nisi aliquid veniam, enim dolor.', 'Culpa et quia minima consequat. Molestias laboriosam, eos nihil nulla tenetur velit esse, possimus, tenetur laboriosam, rem aut nulla porro.', 'Quidem fugit repudiandae laboriosam eaque aut velit aperiam voluptates vel non sit est', 'Quidem fugit repudiandae laboriosam eaque aut velit aperiam voluptates vel non sit est', '2016-08-28 11:28:11', '2016-08-29 13:08:42'),
(4, 'Yvonne Russell', 'Reed Porter', 'Vero occaecat sunt officia ducimus, vero porro eius eum nobis est perspiciatis, cumque nostrum blanditiis id.', 'Corporis voluptate dolorum aut ut magni fuga. Ex culpa ipsum, expedita ea dolore ipsam in laboris illum, facere eum aute.', 7, 5, 2, 5, 7, '1_1472412702.jpg', '461.00', '2016-09-02 22:00:00', '2016-09-04 22:00:00', 'yvonne-russell', 'reed-porter', 'Ut quisquam voluptatibus reprehenderit hic iure corporis minus earum atque.', 'Est modi enim necessitatibus consequatur, reiciendis modi deserunt aut nostrum ex voluptatem nostrum amet, omnis lorem.', 'Facilis nihil qui earum iure reiciendis rerum consectetur et laudantium beatae minima et qui occaecat nostrud', ' voluptate consequat', '2016-08-28 11:28:38', '2016-08-28 17:31:42'),
(5, 'Wang Lang', 'Venus Boyd', 'Duis facere quas aute accusantium eum est, eos illo eius itaque ipsum, quas sunt officia consectetur, reiciendis itaque exercitation quia.', 'Consequatur earum deserunt architecto aute excepteur rem do qui perferendis.', 2, 9, 2, 5, 8, '1_1472412765.jpg', '134.00', '1998-12-09 22:00:00', '1994-05-08 22:00:00', 'wang-lang', 'venus-boyd', 'Enim quibusdam dolore aliquam doloribus porro ad modi nihil voluptatibus.', 'Mollit tempor sint culpa tempora nisi eiusmod pariatur? Voluptas voluptates dolor quae.', 'Est voluptates tempore nesciunt qui sunt elit deserunt rerum sit voluptatem Dolore sit ex', 'Cumque quasi reprehenderit cupidatat nostrum eos dolorem beatae', '2016-08-28 11:34:06', '2016-08-28 17:32:45'),
(6, 'تجربة تعديل الرحلة عربي ', 'تجربة تعديل الرحلة انجلش', 'الوصف العربي', 'الوصف الأنجليزي', 3, 17, 2, 5, 7, '1_1472412419.png|2_1472412419.jpg', '7000.00', '2016-08-25 22:00:00', '2016-09-02 22:00:00', 'تجربة-تعديل-الرحلة-عربي', 'تجربة-تعديل-الرحلة-انجلش', 'Meta descriptions arabic', 'Meta descriptions english', 'الكلمات الدلالية باللغة العربية', 'الكلمات الدلالية باللغة الأنجليزية', '2016-08-28 11:40:49', '2016-08-28 18:07:21'),
(7, 'Kitra Le', 'Sacha Herrera', 'Est tempora irure voluptatem mollitia sit, odit nihil laudantium, nisi in.', 'Et aute aut assumenda et quod mollitia iste excepteur aut quas.', 7, 5, 1, 0, 0, '1_1472409698.jpg', '842.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kitra-le', 'sacha-herrera', 'Et eveniet, quos error id, sunt dolore rerum reiciendis cum possimus, quos est, aut est.', 'Corporis et voluptate autem soluta aliqua. Sapiente cupiditate sunt, reprehenderit molestiae rerum aliqua. Ad odio.', 'Hic non voluptas ut aperiam dicta aliquip aut adipisci qui', 'Quae inventore dolores accusamus amet facilis iusto vel non voluptatem ad commodi itaque voluptas eu qui fuga Veniam', '2016-08-28 15:47:20', '2016-08-28 15:47:20'),
(9, 'Kaden Graham', 'Amelia Marks', 'Debitis a animi, maxime et sit, consectetur tenetur nulla ullam nobis.', 'Elit, laboriosam, culpa quam eiusmod illo ut non exercitationem dolores sit, aut error incidunt, esse quis tempor corrupti, velit.', 6, 6, 1, 10, 10, '2_1472412419.jpg', '691.00', '2013-08-19 22:00:00', '1990-05-14 22:00:00', 'kaden-graham', 'amelia-marks', 'Iste ea accusantium dolor mollitia quo non vero reprehenderit sed.', 'Aut dolor libero in aut in quis dolorum debitis facere.', 'Vero velit sed tempore numquam quam quidem deserunt velit itaque et', 'Obcaecati rerum consequatur quo nulla minima qui enim reiciendis error sit dolore itaque nulla sed facere ullamco aliquam distinctio', '2016-08-28 16:04:01', '2016-08-28 16:04:01'),
(10, 'Kaden Graham', 'Amelia Marks', 'Debitis a animi, maxime et sit, consectetur tenetur nulla ullam nobis.', 'Elit, laboriosam, culpa quam eiusmod illo ut non exercitationem dolores sit, aut error incidunt, esse quis tempor corrupti, velit.', 6, 6, 1, 10, 10, '1_1472412419.png|2_1472412419.jpg', '691.00', '2013-08-19 22:00:00', '1990-05-14 22:00:00', 'kaden-graham', 'amelia-marks', 'Iste ea accusantium dolor mollitia quo non vero reprehenderit sed.', 'Aut dolor libero in aut in quis dolorum debitis facere.', 'Vero velit sed tempore numquam quam quidem deserunt velit itaque et', 'Obcaecati rerum consequatur quo nulla minima qui enim reiciendis error sit dolore itaque nulla sed facere ullamco aliquam distinctio', '2016-08-28 16:15:01', '2016-08-28 16:15:01'),
(11, 'Inez Ellis', 'Zephania Stark', 'Velit laboriosam, reprehenderit, eu illo beatae et tempor voluptates id, pariatur? Et exercitationem aperiam irure pariatur? Incidunt, dolorum sit, dolorem.', 'Perferendis aut consequatur, ut enim dolore iste totam itaque sit sed eligendi unde suscipit ut quo magna soluta libero sint.', 4, 5, 1, 9, 10, '1_1472409698.jpg', '201.00', '1982-12-20 22:00:00', '2012-07-13 22:00:00', 'inez-ellis', 'zephania-stark', 'Tempora do beatae et voluptas laborum laborum dolore repudiandae alias cupiditate velit, culpa.', 'Autem tempor qui magna rerum et doloribus nulla magnam perferendis eius.', 'Ipsa veniam rerum reprehenderit sed amet numquam maiores', 'Ex elit atque architecto enim ipsa sed', '2016-08-28 16:41:38', '2016-08-28 16:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mac_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `username`, `mobile`, `city`, `password`, `source`, `source_id`, `mac_address`, `device_token`, `details`, `verification_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Gad', '1475505560.png', 'eng.ahmedmgad@gmail.com', 'ahmedgad', '', 7, '', '', '', '', '', '111111111', '1', 'oc9vMeQcrfPxThsWeHgKprPS8nwVN6j8Zd6IGTXq72B1QGfA89stzq2ViM5c', '2016-10-03 12:39:20', '2016-10-05 13:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE IF NOT EXISTS `wish_lists` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `list_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2016-08-09 22:00:00', '2016-08-16 22:00:00'),
(3, 1, 1, 3, '2016-08-09 08:36:09', '2016-08-09 08:36:09'),
(5, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `airline_tickets_reservs`
--
ALTER TABLE `airline_tickets_reservs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_ports`
--
ALTER TABLE `air_ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_brand`
--
ALTER TABLE `cars_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_models`
--
ALTER TABLE `cars_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_offers`
--
ALTER TABLE `cars_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_reservations`
--
ALTER TABLE `cars_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels_reservations`
--
ALTER TABLE `hotels_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`migration`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservtravel`
--
ALTER TABLE `reservtravel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offer_reservs`
--
ALTER TABLE `special_offer_reservs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `airline_tickets_reservs`
--
ALTER TABLE `airline_tickets_reservs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `air_ports`
--
ALTER TABLE `air_ports`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cars_brand`
--
ALTER TABLE `cars_brand`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cars_models`
--
ALTER TABLE `cars_models`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cars_offers`
--
ALTER TABLE `cars_offers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cars_reservations`
--
ALTER TABLE `cars_reservations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hotels_reservations`
--
ALTER TABLE `hotels_reservations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservtravel`
--
ALTER TABLE `reservtravel`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `special_offer_reservs`
--
ALTER TABLE `special_offer_reservs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2018 at 12:18 PM
-- Server version: 5.6.41-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventako_eventakom`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_ranges`
--

CREATE TABLE `age_ranges` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `from` tinyint(1) DEFAULT NULL,
  `to` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_ranges`
--

INSERT INTO `age_ranges` (`id`, `name`, `is_default`, `from`, `to`) VALUES
(1, 'Kids', 0, 0, 15),
(2, '15 -18 years', 0, 15, 18),
(3, '18 - 25 years', 1, 18, 25),
(4, 'More than 25 years', 0, 25, 120);

-- --------------------------------------------------------

--
-- Table structure for table `big_events`
--

CREATE TABLE `big_events` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `sort_order` tinyint(1) DEFAULT NULL,
  `is_notification_sent` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `big_events`
--

INSERT INTO `big_events` (`id`, `event_id`, `sort_order`, `is_notification_sent`) VALUES
(13, 41, 3, 0),
(14, 43, 4, 0),
(16, 24, 1, 0),
(17, 8, 2, 0),
(18, 68, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `symbol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rate` double(11,6) DEFAULT NULL,
  `def` int(11) DEFAULT '0',
  `subdivision_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `rate`, `def`, `subdivision_name`, `sort_order`) VALUES
(1, 'Euro', 'EUR', 0.811060, 0, 'cents', 3),
(2, 'Egyptian Pound', 'EGP', 17.649000, 0, 'piastres', 2),
(3, 'US Dollar', 'USD', 1.000000, 1, 'cents', 1),
(4, 'Saudi Ryal', 'SAR', 3.750200, 0, 'dirhams', 9),
(5, 'French Frank', 'FF', 3.750938, 0, 'cents', NULL),
(6, 'Japanese Yen', 'JPY', 106.275002, 0, 'cen', 4),
(7, 'Emirates Dirham', 'AED', 3.672955, 0, 'fils', 16),
(8, 'Great Britain Pound', 'GBP', 0.713370, 0, 'pence', 6),
(9, 'Algerian Dinar', 'DZD', 114.001999, 0, 'centimes', 18),
(10, 'Australian Dollar', 'AUD', 1.302756, 0, 'cents', 5),
(11, 'Bahraini Dinar', 'BHD', 0.377045, 0, 'fils', 12),
(12, 'Canadian Dollar', 'CAD', 1.290264, 0, 'cents', 13),
(13, 'Chinese Yuan Renminbi', 'CNY', 6.286600, 0, 'fen', 14),
(14, 'Hong Kong Dollar', 'HKD', 7.849950, 0, 'cents', 17),
(15, 'Indian Rupee', 'INR', 65.079597, 0, 'paise', 19),
(16, 'Jordanian Dinar', 'JOD', 0.709503, 0, 'fils', 21),
(17, 'Korean Won', 'KRW', 1060.900024, 0, 'chon', 22),
(18, 'Kuwaiti Dinar', 'KWD', 0.299600, 0, 'fils', NULL),
(19, 'Pakistan Rupee', 'PKR', 115.709900, 0, 'paisa', 23),
(20, 'Qatari Rial', 'QAR', 3.641481, 0, 'dirhams', 24),
(21, 'Russian Rouble', 'RUB', 57.327999, 0, '', 15),
(22, 'Singapore Dollar', 'SGD', 1.310530, 0, 'cents', NULL),
(23, 'South African Rand', 'ZAR', 11.831755, 0, 'cents', 11),
(24, 'Taiwan Dollar', 'TWD', 28.988857, 0, 'cents', 17),
(25, 'Thailand Baht', 'THB', 31.174000, 0, 'satang', 12),
(26, 'Malaysian Ringgit', 'MYR', 3.862497, 0, 'sen', NULL),
(27, 'Kenyan shilling', 'KES', 100.749046, 0, 'Cents', 10),
(28, 'Turkish lira', 'TRY', 3.954900, 0, 'Lira', 8),
(29, 'Polish', 'PLN', 3.422548, 0, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `name`, `table_name`) VALUES
(1, 'Age Ranges', 'age_ranges'),
(2, 'Currency', 'currencies'),
(3, 'Days', 'days'),
(4, 'Events', 'events'),
(5, 'Fixed Pages', 'fixed_pages'),
(6, 'Gender', 'genders'),
(7, 'Cities', 'geo_cities'),
(8, 'Countries', 'geo_countries'),
(9, 'Offers', 'offers'),
(10, 'Shop And Dine', 'shops'),
(11, 'Sponsors', 'sponsors'),
(12, 'Famous Attracion Categories', 'fa_categories'),
(13, 'User', 'users'),
(14, 'Rule', 'rules'),
(15, 'Interests', 'interests'),
(16, 'Trends', 'trending_keywords'),
(17, 'Tags', 'hash_tags'),
(18, 'Event Statuses', 'event_statuses'),
(19, 'Famous Attractions', 'famous_attractions'),
(20, 'Shop Branches', 'shop_branches'),
(21, 'Shop Media', 'shop_media');

-- --------------------------------------------------------

--
-- Table structure for table `entity_localizations`
--

CREATE TABLE `entity_localizations` (
  `id` int(11) NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `value` text,
  `cleared_text` text,
  `lang_id` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entity_localizations`
--

INSERT INTO `entity_localizations` (`id`, `entity_id`, `field`, `item_id`, `value`, `cleared_text`, `lang_id`) VALUES
(17, 8, 'name', 66, 'مصر', NULL, 2),
(23, 15, 'name', 6, 'مسرح', NULL, 2),
(28, 8, 'name', 11, 'الارجنتين', NULL, 2),
(29, 8, 'name', 17, 'البحرين', NULL, 2),
(30, 8, 'name', 22, 'بلجيكا', NULL, 2),
(31, 8, 'name', 24, 'بنين', NULL, 2),
(32, 8, 'name', 45, 'تشيلي', NULL, 1),
(33, 8, 'name', 46, 'الصين', NULL, 1),
(34, 8, 'name', 49, 'كولومبيا', NULL, 1),
(35, 8, 'name', 51, 'الكنوغو', NULL, 1),
(36, 8, 'name', 54, 'كوستاريكا', NULL, 1),
(37, 8, 'name', 55, 'كوتايفوار', NULL, 1),
(38, 8, 'name', 56, 'كورواتيا', NULL, 1),
(39, 8, 'name', 59, 'قبرص', NULL, 1),
(40, 8, 'name', 61, 'الدنمارك', NULL, 1),
(41, 8, 'name', 65, 'الاكوادور', NULL, 1),
(42, 8, 'name', 67, 'سلفادور', NULL, 1),
(48, 7, 'name', 6, 'قصير', NULL, 2),
(50, 7, 'name', 8, 'حائل', NULL, 2),
(51, 7, 'name', 9, 'الحدود الشمالية', NULL, 2),
(52, 7, 'name', 10, 'جزران', NULL, 2),
(53, 7, 'name', 11, 'نجران', NULL, 2),
(54, 7, 'name', 12, 'بها', NULL, 2),
(55, 7, 'name', 13, 'جوف', NULL, 2),
(56, 7, 'name', 14, 'القاهرة', NULL, 2),
(57, 7, 'name', 15, 'الاسكندرية', NULL, 2),
(58, 7, 'name', 16, 'المنصورة', NULL, 2),
(59, 7, 'name', 17, 'طنطا', NULL, 2),
(60, 7, 'name', 18, 'اسيوط', NULL, 2),
(61, 7, 'name', 19, 'اسوان', NULL, 2),
(62, 7, 'name', 20, 'الاقصر', NULL, 2),
(63, 7, 'name', 21, 'الغردقة', NULL, 2),
(64, 7, 'name', 22, 'شرم الشيخ', NULL, 2),
(65, 7, 'name', 23, 'بورسعيد', NULL, 2),
(66, 7, 'name', 24, 'الاسماعيلية', NULL, 2),
(72, 15, 'name', 8, 'المؤتمرات', NULL, 2),
(73, 15, 'name', 9, 'الندوات', NULL, 2),
(75, 15, 'name', 11, 'تكريم', NULL, 2),
(78, 1, 'name', 1, 'اطفال', NULL, 2),
(85, 2, 'name', 6, 'ين ياباني', NULL, 2),
(87, 2, 'name', 8, 'جنيه استرليني', NULL, 2),
(88, 2, 'name', 9, 'دينار جزائري', NULL, 2),
(94, 4, 'rejection_reason', 16, 'متكرر', NULL, 2),
(95, 4, 'rejection_reason', 15, 'لا يسمح', NULL, 2),
(96, 4, 'rejection_reason', 18, 'رمضان خلص خلاص', NULL, 2),
(100, 12, 'name', 6, 'طبيعة', NULL, 2),
(102, 12, 'name', 8, 'متاحف', NULL, 2),
(103, 12, 'name', 9, 'اطفال', NULL, 2),
(110, 9, 'name', 6, 'بيبسي خصم 60 %', NULL, 2),
(111, 9, 'description', 6, 'خصم بيبسي', NULL, 2),
(112, 4, 'rejection_reason', 21, 'eeeeeeeeee', NULL, 2),
(128, 4, 'name', 25, 'test', 'test', 2),
(129, 4, 'description', 25, 'tt', 'tt', 2),
(130, 4, 'venue', 25, 'ttt', 'ttt', 2),
(131, 4, 'name', 26, 'test', 'test', 2),
(132, 4, 'description', 26, 'tt', 'tt', 2),
(133, 4, 'venue', 26, 'ttt', 'ttt', 2),
(134, 1, 'name', 2, 'من 15 الى 18 سنة', NULL, 2),
(136, 1, 'name', 4, 'اكبر من 25 سنة', NULL, 2),
(137, 16, 'name', 1, 'شباب', NULL, 2),
(138, 16, 'name', 2, 'مهرجان', NULL, 2),
(139, 6, 'name', 2, 'انثى', NULL, 2),
(140, 6, 'name', 1, 'ذكر', NULL, 2),
(167, 4, 'rejection_reason', 20, 'غير حقيقي', NULL, 2),
(168, 4, 'rejection_reason', 20, 'غير حقيقي', NULL, 2),
(171, 21, 'link', 96, 'shops_images/1529594640492.png', NULL, 2),
(172, 10, 'name', 4, 'سوق', NULL, 2),
(173, 10, 'info', 4, 'سيب', NULL, 2),
(174, 21, 'link', 97, 'https://www.youtube.com/watch?v=23ruEfLScnM', NULL, 2),
(175, 21, 'link', 98, 'shops_images/1529596443346.jpg', NULL, 2),
(176, 21, 'link', 99, 'shops_images/1529596443342.jpg', NULL, 2),
(177, 21, 'link', 100, 'shops_images/1529596443596.jpg', NULL, 2),
(178, 21, 'link', 101, 'shops_images/1529596443675.jpg', NULL, 2),
(181, 20, 'branch', 6, 'فرع 1', NULL, 2),
(183, 20, 'branch', 8, 'سويتنس', NULL, 2),
(184, 20, 'branch', 9, 'سويتنس', NULL, 2),
(185, 5, 'name', 1, '', NULL, 2),
(186, 5, 'body', 1, '<h1 style=\"text-align: right;\">عن الشركة</h1>\r\n<p style=\"text-align: right;\">شركة ايفنتاكوم تهدف الي تقريب الاحداث اليكم</p>\r\n<p style=\"margin: 1em 0px; padding: 0px; line-height: 1.65em; color: #333333; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #faf9f8;\"><span class=\"s1\" style=\"letter-spacing: 0.8px;\"></span></p>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539077820410\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539077849822\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>', NULL, 2),
(187, 5, 'name', 2, '', NULL, 2),
(188, 5, 'body', 2, '<h2 style=\"text-align: right;\">الشروط والاحكام<br /><span class=\"s1\" style=\"letter-spacing: 0.8px;\"></span></h2>\r\n<p style=\"text-align: right;\">1- الموقع غير مسؤول عن اي خصوصيات يتم الافصاح عنها بنفسك</p>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539159643380\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539159654233\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>', NULL, 2),
(190, 12, 'name', 10, 'حفل جائزة الكرة الذهبية', NULL, 2),
(191, 11, 'name', 4, 'هواوي', NULL, 2),
(193, 4, 'name', 27, 'Jamalia Osborn', NULL, 2),
(194, 4, 'description', 27, 'Cumque consequatur dolorem amet veniam facilis aliquam incidunt consectetur sint aliquip quia pariatur Ullamco accusamus', NULL, 2),
(195, 4, 'venue', 27, 'Similique reiciendis qui fuga Aperiam mollit incididunt est ipsum perferendis maxime quis pariatur Est', NULL, 2),
(199, 4, 'name', 28, 'Jamalia Osborn', NULL, 2),
(200, 4, 'description', 28, 'Cumque consequatur dolorem amet veniam facilis aliquam incidunt consectetur sint aliquip quia pariatur Ullamco accusamus', NULL, 2),
(201, 4, 'venue', 28, 'Similique reiciendis qui fuga Aperiam mollit incididunt est ipsum perferendis maxime quis pariatur Est', NULL, 2),
(202, 17, 'hash_tags', 28, 'فرقة جدل', NULL, 2),
(203, 17, 'hash_tags', 28, 'روك اند رول', NULL, 2),
(204, 17, 'hash_tags', 28, 'Veritatis quis debitis doloremque deserunt non ullamco fugiat cupidatat placeat dolores tenetur', NULL, 2),
(208, 17, 'hash_tags', 27, 'فرقة جدل', NULL, 2),
(209, 17, 'hash_tags', 27, 'روك اند رول', NULL, 2),
(210, 17, 'hash_tags', 27, 'Veritatis quis debitis doloremque deserunt non ullamco fugiat cupidatat placeat dolores tenetur', NULL, 2),
(211, 4, 'name', 29, 'فرقة جدل', NULL, 2),
(212, 4, 'description', 29, 'فرقة جدل الاردنية', NULL, 2),
(213, 4, 'venue', 29, 'مصر القاهرة', NULL, 2),
(218, 17, 'hash_tags', 29, 'جدل', NULL, 2),
(219, 17, 'hash_tags', 29, 'فرقة جدل', NULL, 2),
(220, 9, 'name', 8, 'خصم 7%', NULL, 2),
(221, 9, 'description', 8, 'خصم 7% علي جميع منتجات Huawei لمدة محدودة', NULL, 2),
(222, 17, 'name', 8, 'تجربة عامة', NULL, 2),
(223, 17, 'description', 8, 'يا يوجد وصف للتجارب', NULL, 2),
(224, 17, 'venue', 8, 'لا يوجد', NULL, 2),
(225, 17, 'hashtag', 8, 'لا يوجد', NULL, 2),
(226, 4, 'name', 30, 'Kylee Hickman', NULL, 2),
(227, 4, 'description', 30, 'Est aspernatur amet quia ipsam officiis mollitia et quia distinctio Cupiditate', NULL, 2),
(228, 4, 'venue', 30, 'Qui laborum Est vero rerum incididunt officia ipsa vitae quis rerum lorem eius', NULL, 2),
(229, 17, 'hash_tags', 30, 'Sunt aute fugiat quo magna veritatis minim consectetur deserunt quam suscipit consequuntur deserunt occaecat consectetur elit', NULL, 2),
(230, 4, 'name', 31, 'Richard Hicks', NULL, 2),
(231, 4, 'description', 31, 'Ut est voluptatem ducimus consectetur consequat Fugiat', NULL, 2),
(232, 4, 'venue', 31, 'Quidem debitis cillum pariatur Id modi velit aut', NULL, 2),
(233, 17, 'hash_tags', 31, 'Architecto laudantium eligendi quia rerum', NULL, 2),
(234, 4, 'name', 32, 'سمسون', NULL, 2),
(235, 4, 'description', 32, 'Animi eveniet explicabo Quia aut', NULL, 2),
(236, 4, 'venue', 32, 'Lorem blanditiis quod qui quo expedita irure ipsa id', NULL, 2),
(238, 17, 'name', 10, 'حفل الساقية', NULL, 2),
(239, 17, 'description', 10, 'الساقية', NULL, 2),
(240, 17, 'venue', 10, 'ساقية الصاوي', NULL, 2),
(241, 17, 'hashtag', 10, 'الساقية', NULL, 2),
(246, 17, 'hash_tags', 32, 'Qui inventore voluptate sunt vel irure quibusdam deserunt sint dolore molestiae commodi labore incididunt', NULL, 2),
(256, 4, 'name', 8, 'حفل الساقية', NULL, 2),
(257, 4, 'description', 8, 'الساقية', NULL, 2),
(258, 4, 'venue', 8, 'ساقية الصاوي', NULL, 2),
(259, 4, 'hashtag', 8, 'الساقية', NULL, 2),
(260, 4, 'name', 33, 'Blythe Ward', NULL, 2),
(261, 4, 'description', 33, 'Eum quod ut placeat qui exercitationem', NULL, 2),
(262, 4, 'venue', 33, 'Enim incididunt ut sapiente impedit ipsum delectus aliquam fuga Non veniam libero atque sint eos ad dolores', NULL, 2),
(263, 17, 'hash_tags', 33, 'event', NULL, 2),
(273, 4, 'name', 23, NULL, NULL, 2),
(274, 4, 'description', 23, NULL, NULL, 2),
(275, 4, 'venue', 23, NULL, NULL, 2),
(276, 4, 'hashtag', 23, '', NULL, 2),
(285, 10, 'name', 6, 'Moses Santos', NULL, 2),
(286, 10, 'info', 6, 'Neque qui est eos minim do modi unde atque duis dolores adipisci animi et omnis magna vel', NULL, 2),
(287, 10, 'name', 7, 'Kalia Kennedy', NULL, 2),
(288, 10, 'info', 7, 'Incidunt ut fugiat mollitia quis est dolores mollitia nihil a nisi', NULL, 2),
(289, 20, 'branch', 10, 'Ila Gutierrez', NULL, 2),
(290, 20, 'branch', 11, 'Jelani Olson', NULL, 2),
(291, 10, 'name', 5, NULL, NULL, 2),
(292, 10, 'info', 5, NULL, NULL, 2),
(293, 20, 'branch', 12, NULL, NULL, 2),
(294, 4, 'name', 13, NULL, NULL, 2),
(295, 4, 'description', 13, NULL, NULL, 2),
(296, 4, 'venue', 13, NULL, NULL, 2),
(297, 4, 'hashtag', 13, '', NULL, 2),
(298, 20, 'branch', 13, NULL, NULL, 2),
(299, 15, 'name', 4, 'فرق مغمورة', NULL, 2),
(300, 15, 'name', 5, 'موسيقي', NULL, 2),
(301, 15, 'name', 7, 'مهرجانات', NULL, 2),
(302, 11, 'name', 1, 'محمد موسي', NULL, 2),
(303, 11, 'name', 2, 'انجليزي', NULL, 2),
(304, 19, 'name', 2, 'قلعة صلاح الدين', NULL, 2),
(305, 19, 'address', 2, 'مصر القديمة القاهرة', NULL, 2),
(306, 19, 'other_info', 2, 'شرع صلاح الدين الأيوبي في تشييد قلعة فوق جبل المقطم في موضع كان يعرف بقبة الهواء.', NULL, 2),
(307, 15, 'name', 13, 'معارض', NULL, 2),
(308, 14, 'name', 2, 'مستخدم تطبيق', NULL, 2),
(310, 14, 'name', 4, 'ادمن', NULL, 2),
(311, 14, 'name', 5, 'مدخل بيانات', NULL, 2),
(312, 4, 'name', 40, 'Warren Banks', NULL, 2),
(313, 4, 'description', 40, 'Voluptatem Lorem perferendis esse sint labore aliquid dolorem vero vero in est sunt perspiciatis proident magnam fugiat vel aut esse', NULL, 2),
(314, 4, 'venue', 40, 'Eos corporis culpa exercitation quis qui voluptas sunt quia quo qui iure fugit Nam adipisicing excepturi nesciunt', NULL, 2),
(315, 17, 'hash_tags', 40, 'Nisi enim pe', NULL, 2),
(316, 4, 'name', 41, 'Todd Perry', NULL, 2),
(317, 4, 'description', 41, 'Iure magni in saepe in asperiores voluptates sed minima recusandae Maxime laborum Placeat assumenda', NULL, 2),
(318, 4, 'venue', 41, 'Incidunt consectetur accusantium excepteur et', NULL, 2),
(320, 9, 'name', 9, '55%', NULL, 2),
(321, 9, 'description', 9, 'opera House', NULL, 2),
(322, 10, 'name', 8, 'Charissa Cline', NULL, 2),
(323, 10, 'info', 8, 'Unde mollitia non exercitationem enim quaerat eos et dolor veniam dolore', NULL, 2),
(324, 21, 'link', 102, 'http://www.bog.net', NULL, 2),
(325, 21, 'link', 103, 'http://www.fotolyme.us', NULL, 2),
(326, 20, 'branch', 14, NULL, NULL, 2),
(327, 17, 'hash_tags', 41, 'Quisquam per', NULL, 2),
(328, 4, 'name', 10, 'amirecan band', NULL, 2),
(329, 4, 'description', 10, 'R&P', NULL, 2),
(330, 4, 'venue', 10, 'Dolores voluptas', NULL, 2),
(331, 4, 'hashtag', 10, '45', NULL, 2),
(332, 4, 'name', 47, 'Price Joseph', NULL, 2),
(333, 4, 'description', 47, 'Magna et unde duis earum', NULL, 2),
(334, 4, 'venue', 47, 'Officiis alias delectus ullamco sequi iusto qui pariatur', NULL, 2),
(335, 17, 'hash_tags', 47, 'R&P', NULL, 2),
(336, 4, 'name', 24, 'عمر خيرت', NULL, 2),
(337, 4, 'description', 24, 'حفل عمر خيرت', NULL, 2),
(338, 4, 'venue', 24, 'اوبرا', NULL, 2),
(339, 4, 'hashtag', 24, 'اوبرا', NULL, 2),
(340, 4, 'hashtag', 24, '        هاوس', NULL, 2),
(341, 10, 'name', 9, 'Hanna Winters', NULL, 2),
(342, 10, 'info', 9, 'Molestiae ad labore lorem tempora reiciendis delectus', NULL, 2),
(343, 21, 'link', 104, 'http://www.nanyz.ws', NULL, 2),
(344, 21, 'link', 105, 'http://www.petycedezumoz.me', NULL, 2),
(345, 4, 'name', 50, 'Jason Atkins', NULL, 2),
(346, 4, 'description', 50, 'Aut architecto dolore consequuntur ab exercitationem quis facilis aperiam rem obcaecati possimus est quibusdam', NULL, 2),
(347, 4, 'venue', 50, 'CFC', NULL, 2),
(348, 17, 'hash_tags', 50, 'NOT', NULL, 2),
(349, 4, 'name', 51, 'Keaton Webster', NULL, 2),
(350, 4, 'description', 51, 'Omnis aut rerum sunt exercitation ex fuga', NULL, 2),
(351, 4, 'venue', 51, 'EEEE', NULL, 2),
(353, 4, 'name', 52, 'Garth Cote', NULL, 2),
(354, 4, 'description', 52, 'Pariatur Sint aliquid sit qui fugiat recusandae Qui at voluptates aute reprehenderit ea anim quam', NULL, 2),
(355, 4, 'venue', 52, 'TTTT', NULL, 2),
(356, 17, 'hash_tags', 52, 'Et praesenti', NULL, 2),
(357, 4, 'name', 53, 'Kameko Lindsay', NULL, 2),
(358, 4, 'description', 53, 'Aliquam quaerat ut nemo quo ad qui minus inventore velit ipsum consequatur excepteur in cumque consectetur ratione enim magna', NULL, 2),
(359, 4, 'venue', 53, 'RRR', NULL, 2),
(360, 17, 'hash_tags', 53, 'Vero hic ut', NULL, 2),
(361, 17, 'hash_tags', 51, 'Enim expedit', NULL, 2),
(362, 10, 'name', 10, 'سيسب', NULL, 2),
(363, 10, 'info', 10, 'asdda', NULL, 2),
(364, 9, 'name', 10, 'sf', NULL, 2),
(365, 9, 'description', 10, 'sdf', NULL, 2),
(366, 10, 'name', 11, 'City Center', NULL, 2),
(367, 10, 'info', 11, 'Mall 2', NULL, 2),
(368, 21, 'link', 106, 'shops_images/1539088630334.bmp', NULL, 2),
(369, 21, 'link', 107, 'shops_images/1539088723704.bmp', NULL, 2),
(370, 9, 'name', 11, 'عرض من الباك اند', NULL, 2),
(371, 9, 'description', 11, 'عرض من الباك اند', NULL, 2),
(372, 19, 'name', 3, 'cfc', NULL, 2),
(373, 19, 'address', 3, 'new cairo', NULL, 2),
(374, 19, 'other_info', 3, 'بدون معلومات اضافية', NULL, 2),
(375, 16, 'name', 4, 'Cinema', NULL, 2),
(376, 15, 'name', 14, 'مولات', NULL, 2),
(377, 11, 'name', 5, 'فودافون', NULL, 2),
(378, 4, 'name', 67, 'Lana Jennings', NULL, 2),
(379, 4, 'description', 67, 'Aliqua In quis aliqua Dolor aliquid non aut excepturi dolore elit excepturi tempora', NULL, 2),
(380, 4, 'venue', 67, 'Aut omnis sequi dolor optio sed molestiae cupidatat dolore et ex assumenda deleniti ad nobis eu commodi sit provident', NULL, 2),
(381, 17, 'hash_tags', 67, 'Eius earum r', NULL, 2),
(382, 4, 'name', 68, 'Nile Ritz', NULL, 2),
(383, 4, 'description', 68, 'Velit voluptatem consequatur ut nisi laboriosam in soluta dolore', NULL, 2),
(384, 4, 'venue', 68, 'CFC', NULL, 2),
(385, 17, 'hash_tags', 68, 'Aute ut corr', NULL, 2),
(386, 4, 'name', 69, 'nox', NULL, 2),
(387, 4, 'description', 69, 'Doloremque sint enim nihil labore quaerat magnam iste eos sed', NULL, 2),
(388, 4, 'venue', 69, 'Quia quasi non aliqua Ut est ad suscipit fugiat fugit', NULL, 2),
(389, 17, 'hash_tags', 69, 'Beatae reici', NULL, 2),
(390, 4, 'name', 70, 'Nile Ritz', NULL, 2),
(391, 4, 'description', 70, 'Nile Ritz', NULL, 2),
(392, 4, 'venue', 70, 'Nile Ritz', NULL, 2),
(393, 17, 'hash_tags', 70, 'nile', NULL, 2),
(395, 15, 'name', 16, 'فانتازيا', NULL, 2),
(396, 15, 'name', 17, 'ترانس', NULL, 2),
(399, 21, 'link', 108, 'shops_images/1539260183874.jpg', NULL, 2),
(400, 10, 'name', 12, 'سيتي سنتر', NULL, 2),
(401, 10, 'info', 12, 'اتصل بنا', NULL, 2),
(402, 9, 'name', 12, 'تخفيض', NULL, 2),
(403, 9, 'description', 12, 'خصومات تصل إلى 50%', NULL, 2),
(404, 21, 'link', 109, 'shops_images/1539262154148.jpg', NULL, 2),
(405, 21, 'link', 110, 'shops_images/1539263484483.jpg', NULL, 2),
(406, 10, 'name', 13, 'ٍيتي ستارز', NULL, 2),
(407, 10, 'info', 13, 'هاي', NULL, 2),
(408, 21, 'link', 111, 'shops_images/1539263617954.jpg', NULL, 2),
(409, 19, 'name', 4, 'بدون اسم', NULL, 2),
(410, 19, 'address', 4, 'بدون عنوان', NULL, 2),
(411, 19, 'other_info', 4, 'بدون معلومات اضافية', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tele_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longtuide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `suggest_big_event` tinyint(1) DEFAULT NULL,
  `show_in_mobile` tinyint(1) DEFAULT '1',
  `gender_id` int(11) DEFAULT NULL,
  `age_range_id` int(11) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `use_ticketing_system` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `event_status_id` int(11) DEFAULT NULL,
  `is_backend` tinyint(1) DEFAULT '1',
  `rejection_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `website`, `tele_code`, `mobile`, `email`, `code`, `address`, `longtuide`, `latitude`, `venue`, `start_datetime`, `end_datetime`, `suggest_big_event`, `show_in_mobile`, `gender_id`, `age_range_id`, `is_paid`, `use_ticketing_system`, `is_active`, `event_status_id`, `is_backend`, `rejection_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 'El Saqya Concent', 'saqya', 'http://www.eventakom.com', NULL, '01227775312', 'salmaomario@yahoo.com', '56315661', 'Al Gazira, Giza Governorate, Egypt', '31.221135722198483', '30.049276888613115', 'saqya', '2018-06-29 06:00:00', '2018-06-29 06:00:00', 1, 1, 3, 1, 0, 1, 1, 2, 0, NULL, '2018-05-31 11:20:18', '2018-06-25 08:15:17', 1, NULL),
(10, 'El Saqya Concent', 'saqya', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', '020', 'Al Gazira, Giza Governorate, Egypt', '31.22199402908325', '30.050688476335125', 'saqya', '1929-10-11 06:00:00', '1935-03-12 06:00:00', 0, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-05-31 14:30:17', '2018-07-15 13:39:10', 41, NULL),
(11, 'OraMaki Event ', 'Ora Maki Event ', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-04 13:08:17', '2018-06-06 07:01:00', 41, NULL),
(12, 'SamHarris Event ', 'SamHarris Event ', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-04 13:12:01', '2018-06-06 07:01:08', 41, NULL),
(13, 'Ora Maki 2 Event', 'saqya', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', '020', NULL, '31.22429', '30.045915', 'saqya', '1970-01-01 06:00:00', '1970-01-01 06:00:00', 1, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-04 13:18:41', '2018-06-25 09:17:35', 41, NULL),
(14, 'Ora Maki 24444 Event ', 'SamHarris Event ', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-04 13:20:37', '2018-06-06 11:11:38', 36, NULL),
(15, 'Ora Maki 5555 Event ', 'SamHarris Event ', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, 'not allowed', '2018-06-04 13:28:09', '2018-06-11 12:36:00', 41, NULL),
(18, 'Kheima Ramadan', 'Ramadan Event ', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, 'Ramdan is over', '2018-06-10 11:50:07', '2018-06-14 12:38:18', 36, NULL),
(23, 'Test Edit Event', 'saqya', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', '020', NULL, '31.22429', '30.045915', 'saqya', '1970-01-01 06:00:00', '1970-01-01 06:00:00', 0, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-19 02:28:32', '2018-06-25 09:00:47', 36, NULL),
(24, 'Omar Khairat', 'Opera House', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', '15668647', 'Inside Cairo Uni, Oula, Giza, Giza Governorate, Egypt', '31.207265853881836', '30.022806863746357', 'Opera House', '2027-02-07 06:00:00', '2029-02-07 06:00:00', 1, 1, 3, 3, 0, 1, 0, 2, 0, NULL, '2018-06-19 02:31:12', '2018-07-15 13:59:06', 36, NULL),
(25, 'test', 'tt', 'http://www.eventakom.com', '+20', '01', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'ttt', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-19 02:32:04', '2018-06-21 12:13:02', 36, NULL),
(26, 'test', 'tt', 'http://www.eventakom.com', '+20', '01', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'ttt', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 1, 2, 0, NULL, '2018-06-19 02:32:22', '2018-06-21 11:23:45', 36, NULL),
(29, 'Jaddal', 'Jaddal Band', 'http://www.xupevali.org.au', NULL, '563', 'deso@mailinator.com', '190', NULL, '31.41180215959389', '30.045727628836843', 'Cairo, Egypt', '2018-06-06 09:30:00', '2018-06-07 04:00:00', 0, 1, 3, 3, 1, NULL, 1, NULL, 1, NULL, '2018-06-23 12:43:43', '2018-06-23 12:46:22', 1, 1),
(32, 'Samson Hutchinson', 'Modi est a dignissimos minus velit voluptatum omnis tempore vel', 'http://www.cesyfucezyrarub.org.au', NULL, '707', 'bido@mailinator.net', '536', NULL, '32.5693651023837', '30.047059762805294', 'Voluptatibus qui ex dignissimos molestias porro exercitationem fuga Aliqua Et occaecat ea', '1970-01-01 12:00:00', '1970-01-01 12:00:00', 0, 1, 2, 4, 1, NULL, 1, NULL, 1, NULL, '2018-06-24 09:04:25', '2018-06-24 12:25:23', 1, 1),
(33, 'Benedict Weaver', 'Facere reprehenderit dolores modi cupiditate ut non aut vitae iusto', 'http://www.qocidid.me', NULL, '0123268895', 'zunudugova@mailinator.net', '906', 'طومان باي، Cairo Governorate, Egypt', '32.5693651023837', '30.047059762805294', 'musuem', '2018-06-12 12:00:00', '2018-06-12 06:00:00', 1, 1, 2, 3, 0, NULL, 1, NULL, 1, NULL, '2018-06-25 08:52:03', '2018-06-25 08:52:03', 1, NULL),
(34, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-06-27 12:12:18', '2018-06-27 12:12:18', 41, NULL),
(35, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-06-27 12:13:38', '2018-06-27 12:13:38', 41, NULL),
(36, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-06-27 12:14:45', '2018-06-27 12:14:45', 41, NULL),
(37, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 0, 0, 0, 1, 0, NULL, '2018-06-27 12:16:08', '2018-06-27 12:16:08', 41, NULL),
(38, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-09 19:51:45', '2018-07-09 19:51:45', 36, NULL),
(39, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-09 20:04:54', '2018-07-09 20:04:54', 36, NULL),
(40, 'Tarik Reed', 'Sed quis consequat Cum veritatis sint culpa necessitatibus ex tempora voluptatem dolor et expedita laborum labore nisi ex optio id', 'http://www.wotukiduvo.co', NULL, '99364363463', 'secosadom@mailinator.net', '11', 'Ali Al Sibai, Cairo Governorate, Egypt', '31.444163312255796', '30.042998197763644', 'Consequatur Excepteur sint libero autem aute quis', '1981-05-24 12:00:00', '2011-05-16 12:00:00', 1, 1, 3, 3, 0, NULL, 1, NULL, 1, NULL, '2018-07-10 08:21:10', '2018-07-10 08:21:10', 1, NULL),
(41, 'Leah Roach', 'Iusto voluptatem quaerat non sed consequatur Et nisi asperiores necessitatibus sit fugit nulla adipisci rerum', 'http://www.qilexywewaxi.me.uk', NULL, '22045345345', 'dikigeq@mailinator.net', '243', 'Taha Hussein, القاهرة الجديدة، Cairo Governorate 11371, Egypt', '31.420975099999964', '30.0361148', 'CFC mall', '1970-01-01 12:00:00', '1970-01-01 12:00:00', 1, 1, 2, 1, 0, NULL, 1, NULL, 1, NULL, '2018-07-10 08:23:14', '2018-07-15 12:27:33', 1, 1),
(42, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-10 13:18:54', '2018-07-10 13:18:54', 36, NULL),
(43, 'big Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-10 13:57:45', '2018-07-10 13:57:45', 36, NULL),
(44, 'big Event', 'big band Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'cairo ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-10 14:46:52', '2018-07-10 14:46:52', 36, NULL),
(45, 'big Event', 'big band Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'cairo ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-15 13:45:30', '2018-07-15 13:45:30', 36, NULL),
(46, 'big summer Event', 'big band Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'cairo ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-15 13:46:18', '2018-07-15 13:46:18', 36, NULL),
(47, 'Fitzgerald Dunn', 'Enim qui atque voluptatem Et nobis velit quo dolor quia', 'http://www.duja.ca', NULL, '6054545454', 'cuxu@mailinator.net', '409', '185 Moustafa Kamel Axis, Cairo Governorate, Egypt', '31.440901746093687', '30.033784652534013', 'the big show', '2019-10-15 12:00:00', '2020-02-15 02:00:00', 1, 1, 3, 4, 0, NULL, 1, NULL, 1, NULL, '2018-07-15 13:48:16', '2018-07-15 13:48:16', 1, NULL),
(48, 'sumer dance Event', 'big band Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'cairo ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-15 15:52:52', '2018-07-15 15:52:52', 36, NULL),
(49, 'sumer dance Event', 'big band Event', 'http://www.eventakom.com', '+20', '01025113059', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'cairo ', '1974-12-21 19:46:40', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-15 15:53:36', '2018-07-15 15:53:36', 36, NULL),
(50, 'Sybill Herrera', 'Ipsam excepteur veniam at eaque deleniti omnis veniam vel commodi nulla explicabo Sit eius a quasi omnis odit', 'http://www.wozelazosocabu.net', NULL, '472', 'saryrozulu@mailinator.com', '203', 'Sint expedita ea impedit est', '31.42236231738275', '30.043146796311134', 'CFC', '2018-07-01 12:00:00', '2018-07-19 12:00:00', 1, 1, 1, 1, 0, NULL, 1, NULL, 1, NULL, '2018-07-17 04:47:32', '2018-07-17 04:47:32', 1, NULL),
(51, 'Nerea Poole', 'Voluptas a atque autem saepe laboris ipsum asperiores', 'http://www.vytewenyhugyvuw.info', NULL, '784324324', 'fice@mailinator.net', '87', 'Al Sayyeda Zeinab, Cairo Governorate, Egypt', '31.452746381103452', '30.046564501382758', 'FFFF', '2018-01-07 03:00:00', '2018-10-07 12:00:00', 1, 1, 1, 3, 0, NULL, 1, NULL, 1, NULL, '2018-07-17 04:48:44', '2018-07-17 04:52:33', 1, 1),
(52, 'Edan Slater', 'Illo dolor sunt suscipit qui praesentium rerum aut consequat Voluptas vero facere excepteur blanditiis culpa', 'http://www.quvakidijekek.co', NULL, '342', 'mele@mailinator.net', '839', 'Taha Hussein, Cairo Governorate, Egypt', '31.41034602099603', '30.036459641018794', 'CCCC', '2018-07-01 12:00:00', '2018-07-31 12:00:00', 1, 1, 3, 3, 0, NULL, 1, NULL, 1, NULL, '2018-07-17 04:50:14', '2018-07-17 04:50:14', 1, NULL),
(53, 'Blair Huffman', 'Nam quibusdam anim eaque sint vel nisi voluptas', 'http://www.kewodoqylukuzy.mobi', NULL, '998', 'xiqykyko@mailinator.com', '854', 'Ahmed Al Salab, Izbat Al Haganah, Nasr City, Cairo Governorate, Egypt', '31.39712809497064', '30.052508055418297', 'CFC', '2018-08-01 07:00:00', '2018-09-01 12:00:00', 0, 1, 3, 1, 0, NULL, 1, NULL, 1, NULL, '2018-07-17 04:51:51', '2018-07-17 04:51:51', 1, NULL),
(54, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-07-21 16:10:28', '2018-07-21 16:10:28', 36, NULL),
(55, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-09-29 19:45:41', '2018-09-29 19:45:41', 69, NULL),
(56, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 0, 0, 0, 1, 0, NULL, '2018-09-29 19:48:29', '2018-09-29 19:48:29', 69, NULL),
(57, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 0, 0, 0, 1, 0, NULL, '2018-09-29 19:49:10', '2018-09-29 19:49:10', 69, NULL),
(58, 'ahhah:', 'ahahhah', 'www.akkakakkaasd.com', '1', '0101010010', 'akakkaka@aasdas.com', NULL, NULL, '-0.985197', '7.750434', 'ahhahah', '2018-10-02 21:30:00', '2018-10-06 21:30:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 12:54:30', '2018-09-30 12:54:30', 49, NULL),
(59, 'ahhah:', 'ahahhah', 'www.akkakakkaasd.com', '1', '0101010010', 'akakkaka@aasdas.com', NULL, NULL, '-0.985197', '7.750434', 'ahhahah', '2018-10-02 21:30:00', '2018-10-06 21:30:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 12:56:11', '2018-09-30 12:56:11', 49, NULL),
(60, 'ajajkkak', 'kkkkkskskk', 'www.lsllslsl.slsl', '+20', '88282892929', 'ssjsksk@sjjsjsj.com', NULL, NULL, '-0.985197', '7.750434', 'kkskksksk', '2018-10-03 19:45:00', '2018-10-10 19:45:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 19:46:54', '2018-09-30 19:46:54', 69, NULL),
(61, 'akkakak', 'kkksksk', 'www.sllslsl.slsl', '+20', '9929282828', 'ssskk@ssjs.xnxn', NULL, NULL, '-0.985197', '7.750434', 'kskskskk', '2018-10-03 19:45:00', '2018-10-09 19:45:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 19:50:04', '2018-09-30 19:50:04', 69, NULL),
(62, 'kakakk', 'kkkkkk', 'www.sllslsl.com', '+20', '2828828282', 'akakak@hajajsj.com', NULL, NULL, '-0.985197', '7.750434', 'kkkkkk', '2018-10-02 19:45:00', '2018-10-08 19:45:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 19:53:52', '2018-09-30 19:53:52', 69, NULL),
(63, 'jjjjsjsjjs', 'jsjsjsjsjj', 'www.shjsj.com', '+20', '82728282', 'ahaja@jjjjsj.com', NULL, NULL, '-0.985197', '7.750434', 'jsjsjjsj', '2018-10-03 20:00:00', '2018-10-09 20:00:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 20:02:27', '2018-09-30 20:02:27', 69, NULL),
(64, 'kkskksk', 'kskkskk', 'www.skksk.com', '+20', '1919199119', 'shsh@Hugh.com', NULL, NULL, '-0.985197', '7.750434', 'kkskksk', '2018-10-03 20:00:00', '2018-10-07 20:00:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 20:12:44', '2018-09-30 20:12:44', 69, NULL),
(65, 'skskskk', 'kskkssk', 'www.sjsj.com', '+20', '17717171', 'skskks@sjjs.com', NULL, NULL, '-0.985197', '7.750434', 'kksksksk', '2018-10-01 20:15:00', '2018-10-10 20:15:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-09-30 20:20:46', '2018-09-30 20:20:46', 69, NULL),
(66, 'kakkaka', 'akakkak', 'www.ksksksk.com', '+20', '292929929', 'ajajj@hhhhh.com', NULL, NULL, '-0.985197', '7.750434', 'kkkskkk', '2018-10-05 17:45:00', '2018-10-11 17:45:00', NULL, 1, 3, 3, 0, 0, 0, 1, 0, NULL, '2018-10-01 18:00:14', '2018-10-01 18:00:14', 69, NULL),
(67, 'Noble Dyer', 'Sed in architecto debitis dolor maiores', 'http://www.xuxiwalewo.org.uk', NULL, '441', 'pyxonyleta@mailinator.net', '621', '17 Haret Al Sabaa Qaahat Al Baharia, El-Gamaleya, Qism El-Gamaleya, Cairo Governorate, Egypt', '31.257805400000052', '30.04876419999999', 'Enim corporis distinctio Earum aut rerum', '1990-04-17 03:00:00', '2018-08-16 12:00:00', 0, 1, 1, 4, 0, NULL, 0, NULL, 1, NULL, '2018-10-11 08:08:27', '2018-10-11 08:08:27', 1, NULL),
(68, 'PentaValue Nile Ritz', 'Aspernatur cum aut nihil cumque officia quidem quasi et minus non mollit nemo mollit pariatur Explicabo Nostrum quos et', 'http://www.comykapozuwuk.com', NULL, '3024556549', 'ruco@mailinator.com', '324', 'Ibn Al Nafeis, Al Manteqah as Sadesah, Nasr City, Cairo Governorate, Egypt', '31.351261099999988', '30.0587452', 'CFC', '2018-10-01 12:00:00', '2018-10-31 04:00:00', 1, 1, 2, 1, 0, NULL, 1, NULL, 1, NULL, '2018-10-11 08:16:28', '2018-10-11 08:16:28', 1, NULL),
(69, 'nox', 'Tempor consequuntur voluptatibus in consequatur earum tempor incidunt dicta laboriosam perferendis qui officiis voluptate aut in nostrud', 'http://www.kuzitu.ca', NULL, '97885263', 'rygineki@mailinator.com', '692', '151 Al Haram, Oula Al Haram, Al Omraneyah, Giza Governorate, Egypt', '31.16097460000003', '29.9938868', 'Reprehenderit omnis cum occaecat vel quidem quae', '2018-10-30 04:00:00', '2018-10-31 01:00:00', 0, 1, 2, 3, 0, NULL, 1, NULL, 1, NULL, '2018-10-11 08:27:14', '2018-10-11 08:27:14', 1, NULL),
(70, 'ritz', 'ritz', 'http://www.Nile Ritz.com', NULL, '0123456789', 'nile@tt.com', '45678', 'Sheraton Al Matar, Qism El-Nozha, Cairo Governorate, Egypt', '31.411330799999973', '30.1012996', 'Nile Ritz', '2018-10-01 01:30:00', '2018-10-31 01:30:00', 1, 1, 1, 2, 0, NULL, 1, NULL, 1, NULL, '2018-10-11 09:37:02', '2018-10-11 09:37:02', 1, NULL),
(71, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 1, 1, 0, 1, 0, NULL, '2018-10-13 23:36:50', '2018-10-13 23:36:50', 89, NULL),
(72, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 0, 1, 0, 1, 0, NULL, '2018-10-13 23:37:06', '2018-10-13 23:37:06', 89, NULL),
(73, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 0, 0, 0, 1, 0, NULL, '2018-10-13 23:37:26', '2018-10-13 23:37:26', 89, NULL),
(74, 'Test Edit Event', 'Test Edit Event', 'http://www.eventakom.com', '+20', '01227775312', 'salmaomario@yahoo.com', NULL, NULL, '31.22429', '30.045915', 'saqya ', '2018-06-29 18:00:00', '2018-06-29 23:00:00', NULL, 1, 3, 1, 2, 0, 0, 1, 0, NULL, '2018-10-13 23:37:37', '2018-10-13 23:37:37', 89, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_bookings`
--

CREATE TABLE `event_bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `event_ticket_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_tickets` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_booking_tickets`
--

CREATE TABLE `event_booking_tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `interest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `event_id`, `interest_id`) VALUES
(46, 11, 4),
(47, 11, 5),
(48, 11, 11),
(49, 12, 4),
(50, 12, 5),
(51, 12, 11),
(55, 14, 4),
(56, 14, 5),
(57, 14, 11),
(58, 15, 4),
(59, 15, 5),
(60, 15, 11),
(61, 16, 4),
(62, 16, 5),
(63, 16, 11),
(67, 18, 4),
(68, 18, 5),
(69, 18, 11),
(70, 19, 4),
(71, 19, 5),
(72, 19, 11),
(76, 21, 4),
(77, 21, 5),
(78, 21, 11),
(88, 22, 4),
(89, 22, 5),
(90, 22, 11),
(97, 25, 4),
(98, 25, 5),
(99, 25, 11),
(100, 26, 4),
(101, 26, 5),
(102, 26, 11),
(115, 7, 4),
(116, 7, 5),
(117, 7, 11),
(132, 29, 4),
(155, 32, 4),
(162, 8, 4),
(163, 8, 5),
(164, 8, 7),
(165, 8, 11),
(166, 33, 4),
(167, 33, 6),
(168, 33, 7),
(169, 33, 8),
(175, 23, 4),
(176, 23, 5),
(177, 23, 11),
(184, 13, 4),
(185, 13, 5),
(186, 13, 11),
(187, 34, 4),
(188, 34, 5),
(189, 34, 11),
(190, 35, 4),
(191, 35, 5),
(192, 35, 11),
(193, 36, 4),
(194, 36, 5),
(195, 36, 11),
(196, 37, 4),
(197, 37, 5),
(198, 37, 11),
(199, 38, 4),
(200, 38, 5),
(201, 38, 11),
(202, 39, 4),
(203, 39, 5),
(204, 39, 11),
(205, 40, 5),
(206, 40, 7),
(209, 42, 4),
(210, 42, 5),
(211, 42, 11),
(212, 43, 4),
(213, 43, 5),
(214, 43, 11),
(215, 44, 4),
(216, 44, 5),
(217, 44, 11),
(218, 45, 4),
(219, 45, 5),
(220, 45, 11),
(221, 46, 4),
(222, 46, 5),
(223, 46, 11),
(224, 41, 4),
(225, 41, 5),
(226, 10, 4),
(227, 10, 5),
(228, 10, 11),
(229, 47, 7),
(230, 48, 4),
(231, 48, 5),
(232, 48, 11),
(233, 49, 4),
(234, 49, 5),
(235, 49, 11),
(236, 24, 5),
(237, 24, 6),
(238, 50, 6),
(239, 50, 9),
(240, 50, 11),
(241, 50, 12),
(243, 52, 7),
(244, 52, 8),
(245, 52, 11),
(246, 52, 12),
(247, 52, 13),
(248, 53, 6),
(249, 53, 7),
(250, 53, 8),
(251, 51, 4),
(252, 54, 4),
(253, 54, 5),
(254, 54, 11),
(255, 55, 4),
(256, 55, 5),
(257, 55, 11),
(258, 56, 7),
(259, 57, 7),
(260, 59, 7),
(261, 60, 8),
(262, 61, 7),
(263, 62, 8),
(264, 63, 6),
(265, 64, 6),
(266, 65, 7),
(267, 66, 6),
(268, 67, 7),
(269, 67, 9),
(270, 68, 9),
(271, 69, 5),
(272, 69, 6),
(273, 69, 9),
(274, 69, 11),
(275, 70, 4),
(276, 71, 4),
(277, 71, 5),
(278, 71, 11),
(279, 72, 4),
(280, 72, 5),
(281, 72, 11),
(282, 73, 4),
(283, 73, 5),
(284, 73, 11),
(285, 74, 4),
(286, 74, 5),
(287, 74, 11);

-- --------------------------------------------------------

--
-- Table structure for table `event_hash_tags`
--

CREATE TABLE `event_hash_tags` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `hash_tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_hash_tags`
--

INSERT INTO `event_hash_tags` (`id`, `event_id`, `hash_tag_id`) VALUES
(55, 11, 5),
(56, 11, 6),
(57, 11, 7),
(58, 11, 8),
(59, 11, 7),
(60, 11, 9),
(61, 12, 5),
(62, 12, 6),
(63, 12, 7),
(64, 12, 8),
(65, 12, 7),
(66, 12, 9),
(73, 14, 5),
(74, 14, 6),
(75, 14, 7),
(76, 14, 8),
(77, 14, 7),
(78, 14, 9),
(79, 15, 5),
(80, 15, 6),
(81, 15, 7),
(82, 15, 8),
(83, 15, 7),
(84, 15, 9),
(85, 16, 5),
(86, 16, 6),
(87, 16, 7),
(88, 16, 8),
(89, 16, 7),
(90, 16, 9),
(97, 18, 5),
(98, 18, 6),
(99, 18, 7),
(100, 18, 10),
(101, 18, 7),
(102, 18, 9),
(103, 19, 5),
(104, 19, 6),
(105, 19, 7),
(106, 19, 10),
(107, 19, 7),
(108, 19, 9),
(115, 21, 5),
(116, 21, 6),
(117, 21, 7),
(118, 21, 8),
(119, 21, 7),
(120, 21, 9),
(136, 22, 5),
(137, 22, 6),
(138, 22, 7),
(139, 22, 8),
(140, 22, 7),
(141, 22, 9),
(154, 25, 5),
(155, 25, 6),
(156, 25, 7),
(157, 25, 8),
(158, 25, 7),
(159, 25, 9),
(160, 26, 5),
(161, 26, 6),
(162, 26, 7),
(163, 26, 8),
(164, 26, 7),
(165, 26, 9),
(174, 7, 26),
(175, 7, 29),
(176, 7, 30),
(221, 29, 31),
(222, 29, 32),
(237, 32, 46),
(244, 8, 5),
(245, 8, 51),
(246, 33, 6),
(256, 23, 5),
(257, 23, 15),
(258, 23, 16),
(259, 23, 17),
(260, 23, 18),
(271, 13, 5),
(272, 13, 19),
(273, 13, 20),
(274, 13, 21),
(275, 13, 22),
(276, 34, 5),
(277, 34, 6),
(278, 34, 7),
(279, 34, 8),
(280, 34, 7),
(281, 34, 9),
(282, 35, 5),
(283, 35, 6),
(284, 35, 7),
(285, 35, 8),
(286, 35, 7),
(287, 35, 9),
(288, 36, 5),
(289, 36, 6),
(290, 36, 7),
(291, 36, 8),
(292, 36, 7),
(293, 36, 9),
(294, 37, 5),
(295, 37, 6),
(296, 37, 7),
(297, 37, 8),
(298, 37, 7),
(299, 37, 9),
(300, 38, 5),
(301, 38, 6),
(302, 38, 7),
(303, 38, 8),
(304, 38, 7),
(305, 38, 9),
(306, 39, 5),
(307, 39, 6),
(308, 39, 7),
(309, 39, 8),
(310, 39, 7),
(311, 39, 9),
(312, 40, 55),
(314, 42, 5),
(315, 42, 6),
(316, 42, 7),
(317, 42, 8),
(318, 42, 7),
(319, 42, 9),
(320, 43, 5),
(321, 43, 6),
(322, 43, 7),
(323, 43, 8),
(324, 43, 7),
(325, 43, 9),
(326, 44, 5),
(327, 44, 6),
(328, 44, 7),
(329, 44, 8),
(330, 44, 7),
(331, 44, 9),
(332, 45, 5),
(333, 45, 6),
(334, 45, 7),
(335, 45, 8),
(336, 45, 7),
(337, 45, 9),
(338, 46, 5),
(339, 46, 6),
(340, 46, 7),
(341, 46, 8),
(342, 46, 7),
(343, 46, 9),
(344, 41, 56),
(345, 10, 5),
(346, 10, 15),
(347, 10, 16),
(348, 10, 17),
(349, 10, 18),
(350, 47, 57),
(351, 48, 5),
(352, 48, 6),
(353, 48, 7),
(354, 48, 8),
(355, 48, 7),
(356, 48, 9),
(357, 49, 5),
(358, 49, 6),
(359, 49, 7),
(360, 49, 8),
(361, 49, 7),
(362, 49, 9),
(363, 24, 5),
(364, 24, 58),
(365, 24, 59),
(366, 24, 60),
(367, 50, 61),
(369, 52, 63),
(370, 53, 64),
(371, 51, 62),
(372, 54, 5),
(373, 54, 6),
(374, 54, 7),
(375, 54, 8),
(376, 54, 7),
(377, 54, 9),
(378, 55, 5),
(379, 55, 6),
(380, 55, 7),
(381, 55, 8),
(382, 55, 7),
(383, 55, 9),
(384, 56, 5),
(385, 56, 6),
(386, 56, 7),
(387, 56, 8),
(388, 56, 7),
(389, 56, 9),
(390, 57, 5),
(391, 57, 6),
(392, 57, 7),
(393, 57, 8),
(394, 57, 7),
(395, 57, 9),
(396, 59, 65),
(397, 59, 66),
(398, 60, 67),
(399, 60, 67),
(400, 60, 68),
(401, 61, 69),
(402, 61, 69),
(403, 61, 70),
(404, 62, 68),
(405, 62, 71),
(406, 62, 68),
(407, 63, 72),
(408, 63, 73),
(409, 63, 74),
(410, 64, 75),
(411, 64, 76),
(412, 64, 77),
(413, 65, 78),
(414, 65, 79),
(415, 65, 80),
(416, 66, 68),
(417, 66, 81),
(418, 66, 68),
(419, 67, 82),
(420, 68, 83),
(421, 69, 84),
(422, 70, 85),
(423, 71, 5),
(424, 71, 6),
(425, 71, 7),
(426, 71, 8),
(427, 71, 7),
(428, 71, 9),
(429, 72, 5),
(430, 72, 6),
(431, 72, 7),
(432, 72, 8),
(433, 72, 7),
(434, 72, 9),
(435, 73, 5),
(436, 73, 6),
(437, 73, 7),
(438, 73, 8),
(439, 73, 7),
(440, 73, 9),
(441, 74, 5),
(442, 74, 6),
(443, 74, 7),
(444, 74, 8),
(445, 74, 7),
(446, 74, 9);

-- --------------------------------------------------------

--
-- Table structure for table `event_media`
--

CREATE TABLE `event_media` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT 'type 1 => file - type 2 => video '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `link`, `type`) VALUES
(22, 8, 'img/events/VOdmOGzHbq.png', 1),
(28, 10, 'img/events/QetOcyOhKS.png', 1),
(31, 11, 'img/events/wvPyK2SKwb.png', 1),
(32, 11, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(33, 11, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(34, 12, 'img/events/k9wQKL6SgQ.png', 1),
(35, 12, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(36, 12, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(37, 13, 'img/events/Y1s24Fl9dr.png', 1),
(40, 14, 'img/events/vpKVmzEXDb.png', 1),
(41, 14, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(42, 14, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(43, 15, 'img/events/MyKCWu1XKU.png', 1),
(44, 15, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(45, 15, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(46, 16, 'img/events/f3MtH1rze8.png', 1),
(47, 16, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(48, 16, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(52, 18, 'img/events/s7XWXvTHqO.png', 1),
(53, 18, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(54, 18, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(55, 19, 'img/events/uHDAJS8ewI.png', 1),
(56, 19, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(57, 19, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(61, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(62, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(63, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(70, 7, '/events/arabic/524d8f9fa1e09ed17684b17d62b9ef14-12311233_722755697825602_2226419946138546279_n.jpg', 1),
(71, 7, '/events/english/0e52efea45430a8d63bdb0ee9a4a9d7a-whatsapp image 2017-03-08 at 4.46.09 pm.jpeg', 1),
(76, 7, '/events/english/524d8f9fa1e09ed17684b17d62b9ef14-12311233_722755697825602_2226419946138546279_n.jpg', 1),
(81, 22, 'img/events/1mnLLi20d7.png', 1),
(82, 22, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(83, 22, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(84, 23, 'img/events/CC282GIppq.png', 1),
(87, 24, 'img/events/Gs62a7GaY9.png', 1),
(90, 25, 'img/events/pe47YGjvHj.png', 1),
(91, 25, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(92, 25, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(93, 26, 'img/events/3eflaEgrPW.png', 1),
(94, 26, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(95, 26, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(108, 7, '/events/arabic/kitkat.jpg', 1),
(109, 7, '/events/arabic/looking for.jpg', 1),
(110, 7, '/events/arabic/mango.jpg', 1),
(111, 7, '/events/english/kitkat.jpg', 1),
(112, 7, '/events/english/looking for.jpg', 1),
(113, 7, '/events/english/mango.jpg', 1),
(118, 7, 'http://www.zakihuzex.tv', 2),
(119, 7, 'http://www.jyvejep.ws', 2),
(120, 7, 'http://www.nuqulolehefutab.me.uk', 2),
(121, 7, 'http://www.lygif.in', 2),
(165, 29, 'http://www.sybus.cc', 2),
(166, 29, 'http://www.tolabaf.me', 2),
(167, 29, 'http://www.depudomyb.cc', 2),
(168, 29, 'http://www.mev.ws', 2),
(198, 32, 'http://www.widyfun.org.au', 2),
(199, 32, 'http://www.jygud.me', 2),
(200, 32, 'http://www.jimafojep.com', 2),
(201, 32, 'http://www.wol.com', 2),
(210, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(211, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(212, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(213, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(214, 33, '', 2),
(215, 33, '', 2),
(216, 33, '', 2),
(217, 33, '', 2),
(218, 33, 'events/default/events.png', 1),
(227, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(228, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(229, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(230, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(239, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(240, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(241, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(242, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(243, 34, 'img/events/V0IfaRw9yh.png', 1),
(244, 34, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(245, 34, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(246, 35, 'img/events/CEpLD6HWoP.png', 1),
(247, 35, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(248, 35, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(249, 36, 'img/events/kbhs95cLYE.png', 1),
(250, 36, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(251, 36, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(252, 37, 'img/events/60gS8kgbYF.png', 1),
(253, 37, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(254, 37, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(255, 38, 'img/events/N0gDOvXdaW.png', 1),
(256, 38, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(257, 38, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(258, 39, 'img/events/tqly7luEqZ.png', 1),
(259, 39, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(260, 39, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(261, 40, 'http://www.bonenom.co', 2),
(262, 40, 'http://www.genefafasyjy.tv', 2),
(263, 40, 'http://www.nazo.us', 2),
(264, 40, 'http://www.duz.me.uk', 2),
(265, 40, 'events/default/events.png', 1),
(270, 41, 'events/english/1531218194_looking for.jpg', 1),
(271, 41, 'events/default/events.png', 1),
(272, 42, 'img/events/KEHfpXqmMY.png', 1),
(273, 42, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(274, 42, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(275, 43, 'img/events/s19DTE1kZD.png', 1),
(276, 43, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(277, 43, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(278, 44, 'img/events/Rcs6MM1JTY.png', 1),
(279, 44, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(280, 44, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(281, 45, 'img/events/ZwyaLcnvk5.png', 1),
(282, 45, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(283, 45, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(284, 46, 'img/events/Fh1vAGJpLh.png', 1),
(285, 46, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(286, 46, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(287, 41, 'http://www.xuqewev.in', 2),
(288, 41, 'http://www.wimomociwu.cc', 2),
(289, 41, 'http://www.vyd.cc', 2),
(290, 41, 'http://www.sucu.ca', 2),
(291, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(292, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(293, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(294, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(295, 47, 'http://www.nurelitevybemo.biz', 2),
(296, 47, 'http://www.hefiqyv.us', 2),
(297, 47, 'http://www.liqofudyzi.co', 2),
(298, 47, 'http://www.badipyniduqyber.mobi', 2),
(299, 47, 'events/arabic/1531669696_images.jpg', 1),
(300, 47, 'events/english/1531669696_images.jpg', 1),
(301, 48, 'img/events/zNXcaClLis.png', 1),
(302, 48, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(303, 48, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(304, 49, 'img/events/20JGOlgY5u.png', 1),
(305, 49, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(306, 49, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(307, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(308, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(309, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(310, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(311, 50, 'http://www.xoros.org.au', 2),
(312, 50, 'http://www.ludyq.info', 2),
(313, 50, 'http://www.tenyzusug.co', 2),
(314, 50, 'http://www.lutanumahepo.in', 2),
(315, 50, 'events/english/1531810052_omega3.JPG', 1),
(316, 50, 'events/default/events.png', 1),
(321, 51, 'events/english/1531810124_looking for.jpg', 1),
(322, 51, 'events/default/events.png', 1),
(323, 52, 'http://www.mivuximekedyp.cm', 2),
(324, 52, 'http://www.lovakutityfovi.me.uk', 2),
(325, 52, 'http://www.tovu.co', 2),
(326, 52, 'http://www.jyzu.in', 2),
(327, 52, 'events/english/1531810214_omega3.JPG', 1),
(328, 52, 'events/default/events.png', 1),
(329, 53, '', 2),
(330, 53, '', 2),
(331, 53, '', 2),
(332, 53, '', 2),
(333, 53, 'events/default/events.png', 1),
(334, 51, 'http://www.gawifucyrurecar.net', 2),
(335, 51, 'http://www.sodi.org.au', 2),
(336, 51, 'http://www.kodysyrefuvow.com.au', 2),
(337, 51, 'http://www.pomovetazozof.me.uk', 2),
(338, 54, 'img/events/F6mKyPf5De.png', 1),
(339, 54, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(340, 54, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(341, 55, 'img/events/2upoo5FWtB.png', 1),
(342, 55, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(343, 55, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(344, 59, '', 2),
(345, 60, '', 2),
(346, 61, '', 2),
(347, 62, '', 2),
(348, 63, '', 2),
(349, 64, '', 2),
(350, 65, '', 2),
(351, 66, '', 2),
(352, 67, 'http://www.ribapo.tv', 2),
(353, 67, 'http://www.goku.cm', 2),
(354, 67, 'http://www.munytamape.in', 2),
(355, 67, 'http://www.hohylymogukyco.org', 2),
(356, 67, 'events/arabic/1539252507_20180812034406446.jpg', 1),
(357, 67, 'events/english/1539252507_20180812034406446.jpg', 1),
(358, 68, 'http://www.cohewepo.me', 2),
(359, 68, 'http://www.cyxezilob.com', 2),
(360, 68, 'http://www.ryjy.info', 2),
(361, 68, 'http://www.qybonynuga.me.uk', 2),
(362, 68, 'events/arabic/1539252988_20180812034406446.jpg', 1),
(363, 68, 'events/english/1539252988_20180812034406446.jpg', 1),
(364, 69, 'https://www.youtube.com/watch?v=eCZHbMRq2TU', 2),
(365, 69, 'https://www.youtube.com/watch?v=eCZHbMRq2TU', 2),
(366, 69, 'https://www.youtube.com/watch?v=eCZHbMRq2TU', 2),
(367, 69, 'https://www.youtube.com/watch?v=eCZHbMRq2TU', 2),
(368, 69, 'events/arabic/1539253634_20180812034406446.jpg', 1),
(369, 69, 'events/english/1539253634_20180812034406446.jpg', 1),
(370, 70, 'https://www.youtube.com/watch?v=DdJwH8Y3QWU', 2),
(371, 70, 'https://www.youtube.com/watch?v=DdJwH8Y3QWU', 2),
(372, 70, 'https://www.youtube.com/watch?v=DdJwH8Y3QWU', 2),
(373, 70, 'https://www.youtube.com/watch?v=DdJwH8Y3QWU', 2),
(374, 70, 'events/default/events.png', 1),
(375, 71, 'img/events/9YN2g5nxtq.png', 1),
(376, 71, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(377, 71, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(378, 72, 'img/events/tOeJymIYVZ.png', 1),
(379, 72, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(380, 72, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(381, 73, 'img/events/wagIQ92l0Z.png', 1),
(382, 73, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(383, 73, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(384, 74, 'img/events/LasB9kL26S.png', 1),
(385, 74, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(386, 74, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_posts`
--

CREATE TABLE `event_posts` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_posts`
--

INSERT INTO `event_posts` (`id`, `event_id`, `user_id`, `post`, `created_at`) VALUES
(1, 1, 36, 'test the return event 1', '2018-06-11 10:35:19'),
(2, 1, 36, 'test the return event 1', '2018-06-11 10:35:28'),
(3, 1, 36, 'test the return event 1', '2018-06-11 10:35:29'),
(4, 1, 36, 'test the return event 1', '2018-06-11 10:35:31'),
(5, 2, 36, 'test the return event 2', '2018-06-11 10:36:00'),
(6, 2, 36, 'test the return event 2', '2018-06-11 10:36:01'),
(7, 2, 36, 'test the return event 2', '2018-06-11 10:36:02'),
(8, 2, 36, 'test the return event 2', '2018-06-11 10:36:03'),
(9, 3, 36, 'test the return event 2', '2018-06-11 10:36:05'),
(10, 3, 36, 'test the return event 3', '2018-06-11 10:36:08'),
(11, 3, 36, 'test the return event 3', '2018-06-11 10:36:09'),
(12, 3, 36, 'test the return event 3', '2018-06-11 10:36:10'),
(13, 3, 36, 'test the return event 3', '2018-06-11 10:36:11'),
(14, 3, 36, 'test the return event 3', '2018-06-11 10:36:13'),
(15, 3, 36, 'test the return event 3', '2018-06-11 10:36:14'),
(16, 4, 36, 'test the return event 4', '2018-06-11 10:36:20'),
(17, 4, 36, 'test the return event 4', '2018-06-11 10:36:21'),
(18, 4, 36, 'test the return event 4', '2018-06-11 10:36:22'),
(19, 4, 36, 'test the return event 4', '2018-06-11 10:36:23'),
(20, 4, 36, 'test the return event 4', '2018-06-11 10:36:24'),
(21, 4, 36, 'test the return event 4', '2018-06-11 10:36:25'),
(22, 4, 36, 'test the return event 4', '2018-06-11 10:36:25'),
(23, 4, 36, 'test the return event 4', '2018-06-11 10:44:25'),
(24, 4, 36, 'test the return event 4', '2018-06-11 12:43:58'),
(25, 4, 36, 'test the return event 4', '2018-06-11 12:44:31'),
(26, 41, 53, 'Test', '2018-07-16 08:22:10'),
(27, 29, 49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-19 09:37:28'),
(28, 29, 49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-19 09:37:32'),
(29, 29, 49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-19 09:37:33'),
(30, 29, 49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-19 09:37:35'),
(31, 29, 49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-07-19 09:42:23'),
(32, 41, 57, 'Test', '2018-07-27 17:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `event_post_replies`
--

CREATE TABLE `event_post_replies` (
  `id` int(11) NOT NULL,
  `event_post_id` int(11) DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_post_replies`
--

INSERT INTO `event_post_replies` (`id`, `event_post_id`, `reply`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 25, 'Thanks so much', 36, '2018-06-11 12:45:13', '2018-06-11 12:45:13', NULL),
(2, 25, 'Thanks so much', 36, '2018-06-11 12:45:14', '2018-06-11 12:45:14', NULL),
(3, 25, 'Thanks so much', 36, '2018-06-11 12:45:16', '2018-06-11 12:45:16', NULL),
(5, 25, 'Thanks so much', 36, '2018-06-11 12:45:19', '2018-06-11 12:45:19', NULL),
(6, 27, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 49, '2018-07-19 09:40:40', '2018-07-19 09:40:40', NULL),
(7, 28, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 49, '2018-07-19 09:40:45', '2018-07-19 09:40:45', NULL),
(8, 29, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 49, '2018-07-19 09:40:48', '2018-07-19 09:40:48', NULL),
(9, 30, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 49, '2018-07-19 09:40:52', '2018-07-19 09:40:52', NULL),
(10, 30, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 49, '2018-07-19 09:41:10', '2018-07-19 09:41:10', NULL),
(11, 29, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 49, '2018-07-19 09:41:14', '2018-07-19 09:41:14', NULL),
(12, 28, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 49, '2018-07-19 09:41:18', '2018-07-19 09:41:18', NULL),
(13, 27, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 49, '2018-07-19 09:41:23', '2018-07-19 09:41:23', NULL),
(14, 26, 'Thanks so much', 57, '2018-07-27 19:17:41', '2018-07-27 19:17:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_statuses`
--

CREATE TABLE `event_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_statuses`
--

INSERT INTO `event_statuses` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'approved'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Main',
  `price` decimal(10,2) DEFAULT NULL,
  `available_tickets` int(11) DEFAULT NULL,
  `current_available_tickets` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `event_id`, `name`, `price`, `available_tickets`, `current_available_tickets`, `currency_id`) VALUES
(1, 1, 'VIP', '850.00', 2000, NULL, 1),
(2, 1, 'Gold', '500.00', 1500, NULL, 2),
(3, 2, 'VIP', '850.00', 2000, NULL, 1),
(4, 2, 'Gold', '500.00', 1500, NULL, 2),
(5, 3, 'VIP', '850.00', 2000, NULL, 1),
(6, 3, 'Gold', '500.00', 1500, NULL, 2),
(7, 4, 'VIP', '850.00', 2000, NULL, 1),
(8, 4, 'Gold', '500.00', 1500, NULL, 2),
(9, 5, 'VIP', '850.00', 2000, NULL, 1),
(10, 5, 'Gold', '500.00', 1500, NULL, 2),
(11, 6, 'VIP', '850.00', 2000, NULL, 1),
(12, 6, 'Gold', '500.00', 1500, NULL, 2),
(13, 7, 'VIP', '850.00', 2000, 2000, 1),
(14, 7, 'Gold', '500.00', 1500, 1500, 2),
(15, 8, 'VIP', '850.00', 2000, 2000, 1),
(16, 8, 'Gold', '500.00', 1500, 1500, 2),
(17, 9, 'VIP', '850.00', 2000, 2000, 1),
(18, 9, 'Gold', '500.00', 1500, 1500, 2),
(19, 10, 'VIP', '850.00', 2000, 2000, 1),
(20, 10, 'Gold', '500.00', 1500, 1500, 2),
(21, 11, 'VIP', '850.00', 2000, 2000, 1),
(22, 11, 'Gold', '500.00', 1500, 1500, 2),
(23, 12, 'VIP', '850.00', 2000, 2000, 1),
(24, 12, 'Gold', '500.00', 1500, 1500, 2),
(25, 13, 'VIP', '850.00', 2000, 2000, 1),
(26, 13, 'Gold', '500.00', 1500, 1500, 2),
(27, 14, 'VIP', '850.00', 2000, 2000, 1),
(28, 14, 'Gold', '500.00', 1500, 1500, 2),
(29, 15, 'VIP', '850.00', 2000, 2000, 1),
(30, 15, 'Gold', '500.00', 1500, 1500, 2),
(31, 16, 'VIP', '850.00', 2000, 2000, 1),
(32, 16, 'Gold', '500.00', 1500, 1500, 2),
(35, 18, 'VIP', '850.00', 2000, 2000, 1),
(36, 18, 'Gold', '500.00', 1500, 1500, 2),
(37, 19, 'VIP', '850.00', 2000, 2000, 1),
(38, 19, 'Gold', '500.00', 1500, 1500, 2),
(41, 21, 'VIP', '850.00', 2000, 2000, 1),
(42, 21, 'Gold', '500.00', 1500, 1500, 2),
(43, 22, 'VIP', '850.00', 2000, 2000, 1),
(44, 22, 'Gold', '500.00', 1500, 1500, 2),
(45, 23, 'VIP', '850.00', 2000, 2000, 1),
(46, 23, 'Gold', '500.00', 1500, 1500, 2),
(47, 24, 'VIP', '850.00', 2000, 2000, 1),
(48, 24, 'Gold', '500.00', 1500, 1500, 2),
(49, 25, 'VIP', '850.00', 2000, 2000, 1),
(50, 25, 'Gold', '500.00', 1500, 1500, 2),
(51, 26, 'VIP', '850.00', 2000, 2000, 1),
(52, 26, 'Gold', '500.00', 1500, 1500, 2),
(53, 27, 'Mia Ratliff', '761.00', 958, 958, 17),
(54, 28, 'Mia Ratliff', '761.00', 958, 958, 17),
(55, 29, 'Jaddal', '819.00', 696, 696, 2),
(56, 30, 'Maxine Hall', '194.00', 783, 783, 28),
(57, 31, 'Megan Finch', '754.00', 909, 909, 3),
(58, 32, 'Samson Hutchinson', '201.00', 337, 337, 29),
(59, 34, 'VIP', '850.00', 2000, 2000, 1),
(60, 34, 'Gold', '500.00', 1500, 1500, 2),
(61, 35, 'VIP', '850.00', 2000, 2000, 1),
(62, 35, 'Gold', '500.00', 1500, 1500, 2),
(63, 36, 'VIP', '850.00', 2000, 2000, 1),
(64, 36, 'Gold', '500.00', 1500, 1500, 2),
(65, 38, 'VIP', '850.00', 2000, 2000, 1),
(66, 38, 'Gold', '500.00', 1500, 1500, 2),
(67, 39, 'VIP', '850.00', 2000, 2000, 1),
(68, 39, 'Gold', '500.00', 1500, 1500, 2),
(69, 42, 'VIP', '850.00', 2000, 2000, 1),
(70, 42, 'Gold', '500.00', 1500, 1500, 2),
(71, 43, 'VIP', '850.00', 2000, 2000, 1),
(72, 43, 'Gold', '500.00', 1500, 1500, 2),
(73, 44, 'VIP', '850.00', 2000, 2000, 1),
(74, 44, 'Gold', '500.00', 1500, 1500, 2),
(75, 45, 'VIP', '850.00', 2000, 2000, 1),
(76, 45, 'Gold', '500.00', 1500, 1500, 2),
(77, 46, 'VIP', '850.00', 2000, 2000, 1),
(78, 46, 'Gold', '500.00', 1500, 1500, 2),
(79, 48, 'VIP', '850.00', 2000, 2000, 1),
(80, 48, 'Gold', '500.00', 1500, 1500, 2),
(81, 49, 'VIP', '850.00', 2000, 2000, 1),
(82, 49, 'Gold', '500.00', 1500, 1500, 2),
(83, 54, 'VIP', '850.00', 2000, 2000, 1),
(84, 54, 'Gold', '500.00', 1500, 1500, 2),
(85, 55, 'VIP', '850.00', 2000, 2000, 1),
(86, 55, 'Gold', '500.00', 1500, 1500, 2),
(87, 59, NULL, NULL, NULL, NULL, NULL),
(88, 59, NULL, NULL, NULL, NULL, NULL),
(89, 60, NULL, NULL, NULL, NULL, NULL),
(90, 61, NULL, NULL, NULL, NULL, NULL),
(91, 62, NULL, NULL, NULL, NULL, NULL),
(92, 63, NULL, NULL, NULL, NULL, NULL),
(93, 64, NULL, NULL, NULL, NULL, NULL),
(94, 65, NULL, NULL, NULL, NULL, NULL),
(95, 66, NULL, NULL, NULL, NULL, NULL),
(96, 71, 'VIP', '850.00', 2000, 2000, 1),
(97, 71, 'Gold', '500.00', 1500, 1500, 2),
(98, 72, 'VIP', '850.00', 2000, 2000, 1),
(99, 72, 'Gold', '500.00', 1500, 1500, 2),
(100, 73, 'VIP', '850.00', 2000, 2000, 1),
(101, 73, 'Gold', '500.00', 1500, 1500, 2),
(102, 74, 'VIP', '850.00', 2000, 2000, 1),
(103, 74, 'Gold', '500.00', 1500, 1500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `famous_attractions`
--

CREATE TABLE `famous_attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longtuide` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famous_attractions`
--

INSERT INTO `famous_attractions` (`id`, `name`, `address`, `longtuide`, `latitude`, `phone`, `info`, `website`, `is_active`) VALUES
(1, 'Cairo Museum ', 'Tahrir Square', '31.233637', '30.047848', '426651215', 'historical', NULL, 1),
(2, 'Cairo Citadel', 'Passage Inside Salah Al Din, Al Abageyah, Qism El-Khalifa, Cairo Governorate, Egypt', '31.260910034179688', '30.029866486852946', '3242432432432', 'is a medieval Islamic fortification in Cairo, Egypt. T', 'http://www.cairo-citadel.com', 1),
(3, 'cairo festival', 'Unnamed Road, محافظة القاهرة‬، مصر', '31.408286084472593', '30.031406824375857', NULL, NULL, NULL, 1),
(4, 'شارع المعز', 'Salah Salem St, El-Gamaleya, Qism El-Gamaleya, Cairo Governorate, Egypt', '31.276877600000034', '30.0522333', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `famous_attraction_categories`
--

CREATE TABLE `famous_attraction_categories` (
  `id` int(11) NOT NULL,
  `famous_attraction_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `famous_attraction_categories`
--

INSERT INTO `famous_attraction_categories` (`id`, `famous_attraction_id`, `category_id`) VALUES
(1, 1, 8),
(2, 1, 7),
(7, 2, 3),
(8, 2, 4),
(10, 3, 3),
(11, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `famous_attraction_days`
--

CREATE TABLE `famous_attraction_days` (
  `id` int(11) NOT NULL,
  `famous_attraction_id` int(11) DEFAULT NULL,
  `day_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `famous_attraction_days`
--

INSERT INTO `famous_attraction_days` (`id`, `famous_attraction_id`, `day_id`, `from`, `to`) VALUES
(11, 2, '2', '11:00 AM', '12:00 PM'),
(12, 2, '3', '12:00 PM', '12:00 PM'),
(13, 2, '4', '10:00 AM', '12:00 PM'),
(14, 2, '5', '02:00 PM', '12:00 PM'),
(15, 2, '6', '10:00 AM', '12:00 PM'),
(23, 3, '1', '03:30 PM', '03:30 PM'),
(24, 3, '2', '03:30 PM', '03:30 PM'),
(25, 3, '3', '03:30 PM', '03:30 PM'),
(26, 3, '4', '03:30 PM', '03:30 PM'),
(27, 3, '5', '03:30 PM', '03:30 PM'),
(28, 3, '6', '03:30 PM', '03:30 PM'),
(29, 3, '7', '03:30 PM', '03:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `famous_attraction_media`
--

CREATE TABLE `famous_attraction_media` (
  `id` int(11) NOT NULL,
  `famous_attraction_id` int(11) DEFAULT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `famous_attraction_media`
--

INSERT INTO `famous_attraction_media` (`id`, `famous_attraction_id`, `media`, `type`) VALUES
(7, 2, 'https://www.youtube.com/watch?v=74RE2gh938A', '2'),
(8, 2, 'https://www.youtube.com/watch?v=EsR8F_teQt8', '2'),
(9, 2, 'famous_images/arabic/1530094095_citadel.jpg', '1'),
(10, 2, 'famous_images/english/1530094095_citadel 2.jpg', '1'),
(15, 3, '', '2'),
(16, 3, '', '2'),
(17, 3, 'famous_images/arabic/1539168472_61K4+A1HccL._SX425_.jpg', '1'),
(18, 3, 'famous_images/english/1539168472_mortal_combat.bmp', '1'),
(19, 4, '', '2'),
(20, 4, '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `fa_categories`
--

CREATE TABLE `fa_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_categories`
--

INSERT INTO `fa_categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'music', 1, NULL, '2018-05-25 17:44:52', '2018-05-25 17:44:52'),
(4, 'Cultural', 1, NULL, '2018-06-12 10:54:35', '2018-06-12 10:54:35'),
(5, 'Theme Parks', 1, NULL, '2018-06-12 10:54:52', '2018-06-12 10:54:52'),
(6, 'Nature', 1, NULL, '2018-06-12 10:55:04', '2018-06-12 10:55:04'),
(7, 'Arts', 1, NULL, '2018-06-12 10:55:18', '2018-06-12 10:55:18'),
(8, 'Museums', 1, NULL, '2018-06-12 10:55:30', '2018-06-12 10:55:30'),
(9, 'Kids', 1, NULL, '2018-06-12 10:55:42', '2018-06-12 10:55:42'),
(10, 'Ballon d\'orr award', 1, NULL, '2018-06-23 12:21:28', '2018-06-23 12:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_pages`
--

CREATE TABLE `fixed_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_pages`
--

INSERT INTO `fixed_pages` (`id`, `name`, `body`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'About Us', '<h1></h1>\r\n<p style=\"text-align: left;\">Eventakom aims to make any events reachable to you.</p>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539077820517\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539077850141\"></script>\r\n<script type=\"text/javascript\" src=\"http://henamecool.xyz/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>', '2018-05-03 12:51:40', '2018-10-09 07:37:47', 1),
(2, 'Terms and Conditions', '<h2 style=\"text-align: left;\"><strong>Terms and Conditions:The website is not responsible for any personal info that you publish</strong></h2>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539159644299\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr5.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://loadsource.org/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51824x7517x&amp;r=1539159655370\"></script>\r\n<script type=\"text/javascript\" src=\"http://linksource.cool/addons/lnkr30_nt.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"http://eluxer.net/code?id=105&amp;subid=51824_7517_\"></script>', '2018-05-03 12:52:13', '2018-10-10 06:21:36', 1),
(3, 'Privacy and Policy', '<h2>Privacy and Policy:</h2>\r\n<p style=\"text-align: left;\">1- Your privacy is your responsibility.&nbsp;</p>', '2018-05-03 12:52:28', '2018-06-25 07:07:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `geo_cities`
--

CREATE TABLE `geo_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geo_cities`
--

INSERT INTO `geo_cities` (`id`, `name`, `code`, `latitude`, `longitude`, `country_id`, `application_id`) VALUES
(1, 'Ryad', NULL, '24.77426500', '46.73858600', 195, 1),
(2, 'Makka', NULL, '21.42251000', '39.82616800', 195, 1),
(3, 'Madinah', NULL, '24.47090100', '39.61223600', 195, 1),
(4, 'Qussem', NULL, '26.09408800', '43.97345400', 195, 1),
(5, 'Sharqia', NULL, '19.10714500', '50.11123300', 195, 1),
(6, 'Qasser', NULL, '18.21679700', '42.50376500', 195, 1),
(7, 'Tabouk', NULL, '28.38350000', '36.56620000', 195, 1),
(8, 'Hael', NULL, '27.52364700', '41.69663200', 195, 1),
(9, 'North Borders', NULL, '29.72490000', '42.23620000', 195, 1),
(10, 'Gazran', NULL, '16.90968300', '42.56790200', 195, 1),
(11, 'Najran', NULL, '17.56560000', '44.22890000', 195, 1),
(12, 'Baha', NULL, '20.02170000', '41.47130000', 195, 1),
(13, 'Gouf', NULL, '29.88740000', '39.32060000', 195, 1),
(14, 'Cairo', NULL, NULL, NULL, 66, 1),
(15, 'Alexandria', NULL, NULL, NULL, 66, 1),
(16, 'Mansoura', NULL, NULL, NULL, 66, 1),
(17, 'Tanta', NULL, NULL, NULL, 66, 1),
(18, 'Assuit', NULL, NULL, NULL, 66, 1),
(19, 'Aswar', NULL, NULL, NULL, 66, 1),
(20, 'Luxor', NULL, NULL, NULL, 66, 1),
(21, 'Hurghada', NULL, NULL, NULL, 66, 1),
(22, 'Sharm El Sheikh', NULL, NULL, NULL, 66, 1),
(23, 'Port Said ', NULL, NULL, NULL, 66, 1),
(24, 'Ismailia', NULL, NULL, NULL, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `geo_countries`
--

CREATE TABLE `geo_countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code_alpha3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tele_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `continent_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geo_countries`
--

INSERT INTO `geo_countries` (`id`, `name`, `iso_code`, `iso_code_alpha3`, `tele_code`, `timezone`, `continent_id`, `application_id`, `is_default`) VALUES
(1, 'Afghanistan', 'AF', NULL, '+93', '+02:00', NULL, NULL, 0),
(2, 'Åland Islands', 'AX', NULL, NULL, '+02:00', NULL, NULL, 0),
(3, 'Albania', 'AL', NULL, '+355', '+02:00', NULL, NULL, 0),
(4, 'Algeria', 'DZ', NULL, '+213', '+2:00', NULL, NULL, 0),
(5, 'American Samoa', 'AS', NULL, '+1-684', '+02:00', NULL, NULL, 0),
(6, 'Andorra', 'AD', NULL, '+376', '+02:00', NULL, NULL, 0),
(7, 'Angola', 'AO', NULL, '+244', '+02:00', NULL, NULL, 0),
(8, 'Anguilla', 'AI', NULL, '+1-264', '+02:00', NULL, NULL, 0),
(9, 'Antarctica', 'AQ', NULL, '+672', '+02:00', NULL, NULL, 0),
(10, 'Antigua and Barbuda', 'AG', NULL, '+1-268', '+02:00', NULL, NULL, 0),
(11, 'Argentina', 'AR', NULL, '+54', '+02:00', NULL, NULL, 0),
(12, 'Armenia', 'AM', NULL, '+374', '+02:00', NULL, NULL, 0),
(13, 'Aruba', 'AW', NULL, '+297', '+02:00', NULL, NULL, 0),
(14, 'Australia', 'AU', NULL, '+61', '+02:00', NULL, NULL, 0),
(15, 'Austria', 'AT', NULL, '+43', '+02:00', NULL, NULL, 0),
(16, 'Azerbaijan', 'AZ', NULL, '+994', '+02:00', NULL, NULL, 0),
(17, 'Bahrain', 'BH', NULL, '+973', '+02:00', NULL, NULL, 0),
(18, 'Bahamas', 'BS', NULL, '+1-242', '+02:00', NULL, NULL, 0),
(19, 'Bangladesh', 'BD', NULL, '+880', '+02:00', NULL, NULL, 0),
(20, 'Barbados', 'BB', NULL, '+1-246', '+02:00', NULL, NULL, 0),
(21, 'Belarus', 'BY', NULL, '+375', '+01:00', NULL, NULL, 0),
(22, 'Belgium', 'BE', NULL, '+32', '+02:00', NULL, NULL, 0),
(23, 'Belize', 'BZ', NULL, '+501', '+02:00', NULL, NULL, 0),
(24, 'Benin', 'BJ', NULL, '+229', '+02:00', NULL, NULL, 0),
(25, 'Bermuda', 'BM', NULL, '+1-441', '+02:00', NULL, NULL, 0),
(26, 'Bhutan', 'BT', NULL, '+975', '+02:00', NULL, NULL, 0),
(27, 'Bolivia, Plurinational State of', 'BO', NULL, '+591', '+02:00', NULL, NULL, 0),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', NULL, '+387', '+02:00', NULL, NULL, 0),
(29, 'Bosnia and Herzegovina', 'BA', NULL, '+267', '+02:00', NULL, NULL, 0),
(30, 'Botswana', 'BW', NULL, '', '+02:00', NULL, NULL, 0),
(31, 'Bouvet Island', 'BV', NULL, '+55', '+02:00', NULL, NULL, 0),
(32, 'Brazil', 'BR', NULL, '', '+02:00', NULL, NULL, 0),
(33, 'British Indian Ocean Territory', 'IO', NULL, '+673', '+02:00', NULL, NULL, 0),
(34, 'Brunei Darussalam', 'BN', NULL, '+359', '+02:00', NULL, NULL, 0),
(35, 'Bulgaria', 'BG', NULL, '+226', '+02:00', NULL, NULL, 0),
(36, 'Burkina Faso', 'BF', NULL, '+257', '+02:00', NULL, NULL, 0),
(37, 'Burundi', 'BI', NULL, NULL, '+02:00', NULL, NULL, 0),
(38, 'Cambodia', 'KH', NULL, '+855', '+02:00', NULL, NULL, 0),
(39, 'Cameroon', 'CM', NULL, '+237', '+02:00', NULL, NULL, 0),
(40, 'Canada', 'CA', NULL, '+1', '+02:00', NULL, NULL, 0),
(41, 'Cape Verde', 'CV', NULL, '+238', '+02:00', NULL, NULL, 0),
(42, 'Cayman Islands', 'KY', NULL, '+1-345', '+02:00', NULL, NULL, 0),
(43, 'Central African Republic', 'CF', NULL, '+236', '+02:00', NULL, NULL, 0),
(44, 'Chad', 'TD', NULL, '+235', '+02:00', NULL, NULL, 0),
(45, 'Chile', 'CL', NULL, '+56', '+02:00', NULL, NULL, 0),
(46, 'China', 'CN', NULL, '+86', '+02:00', NULL, NULL, 0),
(47, 'Christmas Island', 'CX', NULL, '+53', '+02:00', NULL, NULL, 0),
(48, 'Cocos (Keeling) Islands', 'CC', NULL, '+61', '+02:00', NULL, NULL, 0),
(49, 'Colombia', 'CO', NULL, '+57', '+02:00', NULL, NULL, 0),
(50, 'Comoros', 'KM', NULL, '+269', '+02:00', NULL, NULL, 0),
(51, 'Congo', 'CG', NULL, '+243', '+02:00', NULL, NULL, 0),
(52, 'Congo, the Democratic Republic of the', 'CD', NULL, '+242', '+02:00', NULL, NULL, 0),
(53, 'Cook Islands', 'CK', NULL, '+682', '+02:00', NULL, NULL, 0),
(54, 'Costa Rica', 'CR', NULL, '+506', '+05:30', NULL, NULL, 0),
(55, 'Côte d\'Ivoire', 'CI', NULL, '+225', '+01:00', NULL, NULL, 0),
(56, 'Croatia', 'HR', NULL, '+385', '+02:00', NULL, NULL, 0),
(57, 'Cuba', 'CU', NULL, '+53', '+02:00', NULL, NULL, 0),
(58, 'Curaçao', 'CW', NULL, NULL, '+02:00', NULL, NULL, 0),
(59, 'Cyprus', 'CY', NULL, '+855', '+02:00', NULL, NULL, 0),
(60, 'Czech Republic', 'CZ', NULL, '+237', '+02:00', NULL, NULL, 0),
(61, 'Denmark', 'DK', NULL, '+45', '+02:00', NULL, NULL, 0),
(62, 'Djibouti', 'DJ', NULL, '+253', '+02:00', NULL, NULL, 0),
(63, 'Dominica', 'DM', NULL, '+1-767', '+01:00', NULL, NULL, 0),
(64, 'Dominican Republic', 'DO', NULL, '+1-809', '+02:00', NULL, NULL, 0),
(65, 'Ecuador', 'EC', NULL, '+593 ', '+02:00', NULL, NULL, 0),
(66, 'Egypt', 'EG', NULL, '+20', '+02:00', NULL, NULL, 0),
(67, 'El Salvador', 'SV', NULL, '+503', '+02:00', NULL, NULL, 0),
(68, 'Equatorial Guinea', 'GQ', NULL, '+240', '+02:00', NULL, NULL, 0),
(69, 'Eritrea', 'ER', NULL, '+291', '+02:00', NULL, NULL, 0),
(70, 'Estonia', 'EE', NULL, '+372', '+02:00', NULL, NULL, 0),
(71, 'Ethiopia', 'ET', NULL, '+251', '+02:00', NULL, NULL, 0),
(72, 'Falkland Islands (Malvinas)', 'FK', NULL, '+500', '+02:00', NULL, NULL, 0),
(73, 'Faroe Islands', 'FO', NULL, '+298', '+02:00', NULL, NULL, 0),
(74, 'Fiji', 'FJ', NULL, '+679', '+02:00', NULL, NULL, 0),
(75, 'Finland', 'FI', NULL, '+358', '+02:00', NULL, NULL, 0),
(76, 'France', 'FR', NULL, '+33', '+02:00', NULL, NULL, 0),
(77, 'French Guiana', 'GF', NULL, '+594', '+02:00', NULL, NULL, 0),
(78, 'French Polynesia', 'PF', NULL, '+689', '+02:00', NULL, NULL, 0),
(79, 'French Southern Territories', 'TF', NULL, NULL, '+02:00', NULL, NULL, 0),
(80, 'Gabon', 'GA', NULL, '+241', '+01:00', NULL, NULL, 0),
(81, 'Gambia', 'GM', NULL, '+220', '+02:00', NULL, NULL, 0),
(82, 'Georgia', 'GE', NULL, '+995', '+02:00', NULL, NULL, 0),
(83, 'Germany', 'DE', NULL, '+49', '+02:00', NULL, NULL, 0),
(84, 'Ghana', 'GH', NULL, '+233', '+02:00', NULL, NULL, 0),
(85, 'Gibraltar', 'GI', NULL, NULL, '+02:00', NULL, NULL, 0),
(86, 'Greece', 'GR', NULL, '+30', '+02:00', NULL, NULL, 0),
(87, 'Greenland', 'GL', NULL, '+299', '+02:00', NULL, NULL, 0),
(88, 'Grenada', 'GD', NULL, '+1-473', '+02:00', NULL, NULL, 0),
(89, 'Guadeloupe', 'GP', NULL, '+590', '+02:00', NULL, NULL, 0),
(90, 'Guam', 'GU', NULL, '+1-671', '+02:00', NULL, NULL, 0),
(91, 'Guatemala', 'GT', NULL, '+502', '+02:00', NULL, NULL, 0),
(92, 'Guernsey', 'GG', NULL, NULL, '+02:00', NULL, NULL, 0),
(93, 'Guinea', 'GN', NULL, '+224', '+02:00', NULL, NULL, 0),
(94, 'Guinea-Bissau', 'GW', NULL, '+245', '+02:00', NULL, NULL, 0),
(95, 'Guyana', 'GY', NULL, '+592', '+02:00', NULL, NULL, 0),
(96, 'Haiti', 'HT', NULL, '+509', '+02:00', NULL, NULL, 0),
(97, 'Heard Island and McDonald Islands', 'HM', NULL, '', '+02:00', NULL, NULL, 0),
(98, 'Holy See (Vatican City State)', 'VA', NULL, '', '+02:00', NULL, NULL, 0),
(99, 'Honduras', 'HN', NULL, '+504', '+02:00', NULL, NULL, 0),
(100, 'Hong Kong', 'HK', NULL, '+852', '+02:00', NULL, NULL, 0),
(101, 'Hungary', 'HU', NULL, '+36', '+02:00', NULL, NULL, 0),
(102, 'Iceland', 'IS', NULL, '+354', '+02:00', NULL, NULL, 0),
(103, 'India', 'IN', NULL, '+91', '+02:00', NULL, NULL, 0),
(104, 'Indonesia', 'ID', NULL, '+62', '+02:00', NULL, NULL, 0),
(105, 'Iran, Islamic Republic of', 'IR', NULL, '+98', '+02:00', NULL, NULL, 0),
(106, 'Iraq', 'IQ', NULL, '+964', '+02:00', NULL, NULL, 0),
(107, 'Ireland', 'IE', NULL, '+353', '+02:00', NULL, NULL, 0),
(108, 'Isle of Man', 'IM', NULL, NULL, '+02:00', NULL, NULL, 0),
(109, 'Israel', 'IL', NULL, '+972', '+02:00', NULL, NULL, 0),
(110, 'Italy', 'IT', NULL, '+39', '+02:00', NULL, NULL, 0),
(111, 'Jamaica', 'JM', NULL, '+1-876', '+02:00', NULL, NULL, 0),
(112, 'Japan', 'JP', NULL, '+81', '+02:00', NULL, NULL, 0),
(113, 'Jersey', 'JE', NULL, NULL, '+02:00', NULL, NULL, 0),
(114, 'Jordan', 'JO', NULL, '+962', '+02:00', NULL, NULL, 0),
(115, 'Kazakhstan', 'KZ', NULL, '+7', '+02:00', NULL, NULL, 0),
(116, 'Kenya', 'KE', NULL, '+254', '+02:00', NULL, NULL, 0),
(117, 'Kiribati', 'KI', NULL, '+686', '+02:00', NULL, NULL, 0),
(118, 'Korea, Democratic People\'s Republic of', 'KP', NULL, '+850', '+02:00', NULL, NULL, 0),
(119, 'Korea, Republic of', 'KR', NULL, '+82', '+02:00', NULL, NULL, 0),
(120, 'Kuwait', 'KW', NULL, '+965', '+02:00', NULL, NULL, 0),
(121, 'Kyrgyzstan', 'KG', NULL, '+996', '+02:00', NULL, NULL, 0),
(122, 'Lao People\'s Democratic Republic', 'LA', NULL, '+856', '+02:00', NULL, NULL, 0),
(123, 'Latvia', 'LV', NULL, '+371', '+02:00', NULL, NULL, 0),
(124, 'Lebanon', 'LB', NULL, '+961', '+02:00', NULL, NULL, 0),
(125, 'Lesotho', 'LS', NULL, '+266', '+02:00', NULL, NULL, 0),
(126, 'Liberia', 'LR', NULL, '+231', '+02:00', NULL, NULL, 0),
(127, 'Libya', 'LY', NULL, '+218', '+02:00', NULL, NULL, 0),
(128, 'Liechtenstein', 'LI', NULL, '+423', '+02:00', NULL, NULL, 0),
(129, 'Lithuania', 'LT', NULL, '+370', '+02:00', NULL, NULL, 0),
(130, 'Luxembourg', 'LU', NULL, '+352', '+02:00', NULL, NULL, 0),
(131, 'Macao', 'MO', NULL, '+853', '+02:00', NULL, NULL, 0),
(132, 'Macedonia, the Former Yugoslav Republic of', 'MK', NULL, '+389', '+02:00', NULL, NULL, 0),
(133, 'Madagascar', 'MG', NULL, '+261', '+02:00', NULL, NULL, 0),
(134, 'Malawi', 'MW', NULL, '+265', '+02:00', NULL, NULL, 0),
(135, 'Malaysia', 'MY', NULL, '+60', '+02:00', NULL, NULL, 0),
(136, 'Maldives', 'MV', NULL, '+960', '+02:00', NULL, NULL, 0),
(137, 'Mali', 'ML', NULL, '+223', '+02:00', NULL, NULL, 0),
(138, 'Malta', 'MT', NULL, '+356', '+02:00', NULL, NULL, 0),
(139, 'Marshall Islands', 'MH', NULL, '+692', '+02:00', NULL, NULL, 0),
(140, 'Martinique', 'MQ', NULL, '+596', '+02:00', NULL, NULL, 0),
(141, 'Mauritania', 'MR', NULL, '+222', '+02:00', NULL, NULL, 0),
(142, 'Mauritius', 'MU', NULL, '+230', '+02:00', NULL, NULL, 0),
(143, 'Mayotte', 'YT', NULL, '+269', '+02:00', NULL, NULL, 0),
(144, 'Mexico', 'MX', NULL, '+52', '+02:00', NULL, NULL, 0),
(145, 'Micronesia, Federated States of', 'FM', NULL, '+691', '+01:00', NULL, NULL, 0),
(146, 'Moldova, Republic of', 'MD', NULL, '+373', '+02:00', NULL, NULL, 0),
(147, 'Monaco', 'MC', NULL, '+377', '+02:00', NULL, NULL, 0),
(148, 'Mongolia', 'MN', NULL, '+976', '+02:00', NULL, NULL, 0),
(149, 'Montenegro', 'ME', NULL, NULL, '+02:00', NULL, NULL, 0),
(150, 'Montserrat', 'MS', NULL, '+1-664', '+01:00', NULL, NULL, 0),
(151, 'Morocco', 'MA', NULL, '+212', '+02:00', NULL, NULL, 0),
(152, 'Mozambique', 'MZ', NULL, '+258', '+02:00', NULL, NULL, 0),
(153, 'Myanmar', 'MM', NULL, '+95', '+02:00', NULL, NULL, 0),
(154, 'Namibia', 'NA', NULL, '+264', '+02:00', NULL, NULL, 0),
(155, 'Nauru', 'NR', NULL, '+674', '+02:00', NULL, NULL, 0),
(156, 'Nepal', 'NP', NULL, '+977', '+02:00', NULL, NULL, 0),
(157, 'Netherlands', 'NL', NULL, '+31', '+02:00', NULL, NULL, 0),
(158, 'New Caledonia', 'NC', NULL, '+687', '+02:00', NULL, NULL, 0),
(159, 'New Zealand', 'NZ', NULL, '+64', '+02:00', NULL, NULL, 0),
(160, 'Nicaragua', 'NI', NULL, '+505', '+02:00', NULL, NULL, 0),
(161, 'Niger', 'NE', NULL, '+227', '+02:00', NULL, NULL, 0),
(162, 'Nigeria', 'NG', NULL, '+234', '+02:00', NULL, NULL, 0),
(163, 'Niue', 'NU', NULL, '+683', '+02:00', NULL, NULL, 0),
(164, 'Norfolk Island', 'NF', NULL, '+672', '+02:00', NULL, NULL, 0),
(165, 'Northern Mariana Islands', 'MP', NULL, '+1-670', '+02:00', NULL, NULL, 0),
(166, 'Norway', 'NO', NULL, '+47', '+02:00', NULL, NULL, 0),
(167, 'Oman', 'OM', NULL, '+968', '+02:00', NULL, NULL, 0),
(168, 'Pakistan', 'PK', NULL, '+92', '+02:00', NULL, NULL, 0),
(169, 'Palau', 'PW', NULL, '+680', '+02:00', NULL, NULL, 0),
(170, 'Palestine, State of', 'PS', NULL, '+970', '+02:00', NULL, NULL, 0),
(171, 'Panama', 'PA', NULL, '+507', '+01:00', NULL, NULL, 0),
(172, 'Papua New Guinea', 'PG', NULL, '+675', '+02:00', NULL, NULL, 0),
(173, 'Paraguay', 'PY', NULL, '+595', '+02:00', NULL, NULL, 0),
(174, 'Peru', 'PE', NULL, '+51', '+02:00', NULL, NULL, 0),
(175, 'Philippines', 'PH', NULL, '+63', '+02:00', NULL, NULL, 0),
(176, 'Pitcairn', 'PN', NULL, '', '+02:00', NULL, NULL, 0),
(177, 'Poland', 'PL', NULL, '+48', '+02:00', NULL, NULL, 0),
(178, 'Portugal', 'PT', NULL, '+351', '+02:00', NULL, NULL, 0),
(179, 'Puerto Rico', 'PR', NULL, '+1-787 or +1-939', '+02:00', NULL, NULL, 0),
(180, 'Qatar', 'QA', NULL, '+974 ', '+02:00', NULL, NULL, 0),
(181, 'Réunion', 'RE', NULL, '+262', '+02:00', NULL, NULL, 0),
(182, 'Romania', 'RO', NULL, '+40', '+02:00', NULL, NULL, 0),
(183, 'Russian Federation', 'RU', NULL, '+7', '+02:00', NULL, NULL, 0),
(184, 'Rwanda', 'RW', NULL, '+250', '+02:00', NULL, NULL, 0),
(185, 'Saint Barthélemy', 'BL', NULL, NULL, '+02:00', NULL, NULL, 0),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', NULL, NULL, '+02:00', NULL, NULL, 0),
(187, 'Saint Kitts and Nevis', 'KN', NULL, NULL, '+02:00', NULL, NULL, 0),
(188, 'Saint Lucia', 'LC', NULL, NULL, '+02:00', NULL, NULL, 0),
(189, 'Saint Martin (French part)', 'MF', NULL, NULL, '+02:00', NULL, NULL, 0),
(190, 'Saint Pierre and Miquelon', 'PM', NULL, NULL, '+02:00', NULL, NULL, 0),
(191, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL, '+02:00', NULL, NULL, 0),
(192, 'Samoa', 'WS', NULL, NULL, '+02:00', NULL, NULL, 0),
(193, 'San Marino', 'SM', NULL, NULL, '+02:00', NULL, NULL, 0),
(194, 'Sao Tome and Principe', 'ST', NULL, NULL, '+02:00', NULL, NULL, 0),
(195, 'Saudi Arabia', 'SA', NULL, '+966', '+02:00', NULL, NULL, 0),
(196, 'Senegal', 'SN', NULL, NULL, '+02:00', NULL, NULL, 0),
(197, 'Serbia', 'RS', NULL, NULL, '+02:00', NULL, NULL, 0),
(198, 'Seychelles', 'SC', NULL, NULL, '+02:00', NULL, NULL, 0),
(199, 'Sierra Leone', 'SL', NULL, NULL, '+02:00', NULL, NULL, 0),
(200, 'Singapore', 'SG', NULL, NULL, '+02:00', NULL, NULL, 0),
(201, 'Sint Maarten (Dutch part)', 'SX', NULL, NULL, '+02:00', NULL, NULL, 0),
(202, 'Slovakia', 'SK', NULL, NULL, '+02:00', NULL, NULL, 0),
(203, 'Slovenia', 'SI', NULL, NULL, '+02:00', NULL, NULL, 0),
(204, 'Solomon Islands', 'SB', NULL, NULL, '+02:00', NULL, NULL, 0),
(205, 'Somalia', 'SO', NULL, NULL, '+02:00', NULL, NULL, 0),
(206, 'South Africa', 'ZA', NULL, NULL, '+02:00', NULL, NULL, 0),
(207, 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL, '+02:00', NULL, NULL, 0),
(208, 'South Sudan', 'SS', NULL, NULL, '+02:00', NULL, NULL, 0),
(209, 'Spain', 'ES', NULL, '+34', '+02:00', NULL, NULL, 0),
(210, 'Sri Lanka', 'LK', NULL, '+94', '+02:00', NULL, NULL, 0),
(211, 'Sudan', 'SD', NULL, '+249', '+02:00', NULL, NULL, 0),
(212, 'Suriname', 'SR', NULL, NULL, '+02:00', NULL, NULL, 0),
(213, 'Svalbard and Jan Mayen', 'SJ', NULL, NULL, '+02:00', NULL, NULL, 0),
(214, 'Swaziland', 'SZ', NULL, NULL, '+02:00', NULL, NULL, 0),
(215, 'Sweden', 'SE', NULL, '+46', '+02:00', NULL, NULL, 0),
(216, 'Switzerland', 'CH', NULL, '+41', '+02:00', NULL, NULL, 0),
(217, 'Syrian Arab Republic', 'SY', NULL, '+963', '+02:00', NULL, NULL, 0),
(218, 'Taiwan, Province of China', 'TW', NULL, '+886', '+02:00', NULL, NULL, 0),
(219, 'Tajikistan', 'TJ', NULL, '+992', '+02:00', NULL, NULL, 0),
(220, 'Tanzania, United Republic of', 'TZ', NULL, '+255', '+02:00', NULL, NULL, 0),
(221, 'Thailand', 'TH', NULL, '+66', '+02:00', NULL, NULL, 0),
(222, 'Timor-Leste', 'TL', NULL, NULL, '+02:00', NULL, NULL, 0),
(223, 'Togo', 'TG', NULL, NULL, '+02:00', NULL, NULL, 0),
(224, 'Tokelau', 'TK', NULL, '+690', '+02:00', NULL, NULL, 0),
(225, 'Tonga', 'TO', NULL, '+676', '+02:00', NULL, NULL, 0),
(226, 'Trinidad and Tobago', 'TT', NULL, '+1-868', '+02:00', NULL, NULL, 0),
(227, 'Tunisia', 'TN', NULL, '+216', '+02:00', NULL, NULL, 0),
(228, 'Turkey', 'TR', NULL, '+90', '+02:00', NULL, NULL, 0),
(229, 'Turkmenistan', 'TM', NULL, '+993', '+02:00', NULL, NULL, 0),
(230, 'Turks and Caicos Islands', 'TC', NULL, '+1-649', '+08:00', NULL, NULL, 0),
(231, 'Tuvalu', 'TV', NULL, '+688', '+02:00', NULL, NULL, 0),
(232, 'Uganda', 'UG', NULL, '+256', '+02:00', NULL, NULL, 0),
(233, 'Ukraine', 'UA', NULL, '+380', '+02:00', NULL, NULL, 0),
(234, 'United Arab Emirates', 'AE', NULL, '+971', '+02:00', NULL, NULL, 0),
(235, 'United Kingdom', 'GB', NULL, '+44', '+02:00', NULL, NULL, 0),
(236, 'United States', 'US', NULL, '+1', '+02:00', NULL, NULL, 0),
(237, 'United States Minor Outlying Islands', 'UM', NULL, '+1', '+02:00', NULL, NULL, 0),
(238, 'Uruguay', 'UY', NULL, '+598', '+02:00', NULL, NULL, 0),
(239, 'Uzbekistan', 'UZ', NULL, '+998', '+02:00', NULL, NULL, 0),
(240, 'Vanuatu', 'VU', NULL, '+678', '+02:00', NULL, NULL, 0),
(241, 'Venezuela, Bolivarian Republic of', 'VE', NULL, '+58', '+01:00', NULL, NULL, 0),
(242, 'Viet Nam', 'VN', NULL, '+84', '+05:00', NULL, NULL, 0),
(243, 'Virgin Islands, British', 'VG', NULL, '+1-284', '+02:00', NULL, NULL, 0),
(244, 'Virgin Islands, U.S.', 'VI', NULL, '+1-340', '+05:00', NULL, NULL, 0),
(245, 'Wallis and Futuna', 'WF', NULL, '+681', '+02:00', NULL, NULL, 0),
(246, 'Western Sahara', 'EH', NULL, NULL, '+02:00', NULL, NULL, 0),
(247, 'Yemen', 'YE', NULL, '+967', '+03:00', NULL, NULL, 0),
(248, 'Zambia', 'ZM', NULL, '+260', '+02:00', NULL, NULL, 0),
(249, 'Zimbabwe', 'ZW', NULL, '+263', '+05:00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hash_tags`
--

CREATE TABLE `hash_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hash_tags`
--

INSERT INTO `hash_tags` (`id`, `name`) VALUES
(1, 'redbull'),
(2, 'festival'),
(3, 'underground'),
(4, 'jadal'),
(5, 'event'),
(6, 'test'),
(7, 'drama'),
(8, 'novel'),
(9, 'MY'),
(10, 'so7or'),
(11, '  test '),
(12, '  drama '),
(13, '  novel '),
(14, '  MY'),
(15, '    test  '),
(16, '    drama  '),
(17, '    novel  '),
(18, '    MY'),
(19, '      test   '),
(20, '      drama   '),
(21, '      novel   '),
(22, '      MY'),
(23, 'شعر'),
(24, 'غناء'),
(25, 'اشعار'),
(26, 'saqya'),
(27, 'sawy'),
(28, 'poams'),
(29, '  sawy '),
(30, '  poams'),
(31, 'Jaddal'),
(32, 'Jaddal Band'),
(33, 'Rock n Roll'),
(34, 'Jazz'),
(35, 'Band'),
(36, 'Concert'),
(37, 'Egypt'),
(38, 'Cairo'),
(39, 'Jordan'),
(40, 'Laboris perspiciatis est esse minim voluptatem dolores exercitationem aperiam cupiditate rerum et non do sed'),
(41, 'saqia'),
(42, 'Quos pariatur Ex delectus mollit aut sunt dolor perferendis aliquip labore voluptatem voluptate adipisci non repudiandae laudantium facilis'),
(43, 'Nulla ipsum non exercitationem duis anim fugit maxime laborum eligendi'),
(44, 'Voluptate explicabo Minima quod alias nobis quo ipsum commodi voluptatum in molestiae amet qui dignissimos ducimus molestiae nisi'),
(45, 'Ipsa dolorem architecto quo aliquam minus anim dolore esse irure voluptatem labore officia quae a'),
(46, 'Mollitia sed maxime est aut magni excepteur nisi eius dolor velit perspiciatis et explicabo Quos totam ullam inventore'),
(47, '  saqia'),
(48, 'Opera'),
(49, 'House'),
(50, '    saqia'),
(51, '      saqia'),
(52, '  Opera '),
(53, '  House '),
(54, '  Concert'),
(55, 'Eos aut ea n'),
(56, 'Ut voluptate'),
(57, 'jm'),
(58, '    Opera  '),
(59, '    House  '),
(60, '    Concert'),
(61, 'Sapiente exp'),
(62, 'Nulla volupt'),
(63, 'Odit asperna'),
(64, 'Architecto r'),
(65, 'ass'),
(66, 'aa'),
(67, 'kskksk'),
(68, 'kkkk'),
(69, 'kkksk'),
(70, 'kkksksk'),
(71, 'kkkkkk'),
(72, 'jsjjsj'),
(73, 'jjjjsj'),
(74, 'jjjsjsjs'),
(75, 'kk'),
(76, 'k'),
(77, 'kkk'),
(78, 'ksksk'),
(79, 'ksksks'),
(80, 'ksskks'),
(81, 'kkkkk'),
(82, 'Duis veniam'),
(83, 'Consectetur'),
(84, 'Adipisicing'),
(85, 'ritz');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(4, 'underground', '2018-05-23 13:48:15', '2018-05-30 08:14:09', 1, NULL),
(5, 'music', '2018-05-23 14:04:58', '2018-05-30 08:14:26', 1, NULL),
(6, 'Drama', '2018-05-25 17:43:34', '2018-05-30 08:14:57', 1, NULL),
(7, 'festival', '2018-05-30 08:16:03', '2018-05-30 08:16:03', 1, NULL),
(8, 'Conferences', '2018-05-30 08:16:46', '2018-05-30 08:16:46', 1, NULL),
(9, 'Seminars', '2018-05-30 08:17:21', '2018-05-30 08:17:21', 1, NULL),
(11, 'Award Ceremonies', '2018-05-30 08:18:24', '2018-05-30 08:18:24', 1, NULL),
(13, 'Exhibitions', '2018-07-02 02:44:20', '2018-07-02 02:44:20', 1, NULL),
(14, 'Mall', '2018-10-10 06:24:43', '2018-10-10 06:24:43', 1, NULL),
(16, 'fantasy', '2018-10-11 09:58:09', '2018-10-11 09:58:09', 1, NULL),
(17, 'trance', '2018-10-11 09:58:19', '2018-10-11 09:58:19', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'en'),
(2, 'ar');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_05_07_121356_create_age_ranges_table', 1),
(3, '2018_05_07_121356_create_big_events_table', 1),
(4, '2018_05_07_121356_create_currencies_table', 1),
(5, '2018_05_07_121356_create_days_table', 1),
(6, '2018_05_07_121356_create_event_booking_tickets_table', 1),
(7, '2018_05_07_121356_create_event_bookings_table', 1),
(8, '2018_05_07_121356_create_event_categories_table', 1),
(9, '2018_05_07_121356_create_event_hash_tags_table', 1),
(10, '2018_05_07_121356_create_event_media_table', 1),
(11, '2018_05_07_121356_create_event_post_replies_table', 1),
(12, '2018_05_07_121356_create_event_posts_table', 1),
(13, '2018_05_07_121356_create_event_statuses_table', 1),
(14, '2018_05_07_121356_create_event_tickets_table', 1),
(15, '2018_05_07_121356_create_events_table', 1),
(16, '2018_05_07_121356_create_fa_categories_table', 1),
(17, '2018_05_07_121356_create_famous_attraction_categories_table', 1),
(18, '2018_05_07_121356_create_famous_attraction_days_table', 1),
(19, '2018_05_07_121356_create_famous_attraction_media_table', 1),
(20, '2018_05_07_121356_create_famous_attractions_table', 1),
(21, '2018_05_07_121356_create_fixed_pages_table', 1),
(22, '2018_05_07_121356_create_genders_table', 1),
(23, '2018_05_07_121356_create_geo_cities_table', 1),
(24, '2018_05_07_121356_create_geo_countries_table', 1),
(25, '2018_05_07_121356_create_hash_tags_table', 1),
(26, '2018_05_07_121356_create_interactions_table', 1),
(27, '2018_05_07_121356_create_interests_table', 1),
(28, '2018_05_07_121356_create_notification_items_table', 1),
(29, '2018_05_07_121356_create_notification_types_table', 1),
(30, '2018_05_07_121356_create_notifications_push_table', 1),
(31, '2018_05_07_121356_create_notifications_table', 1),
(32, '2018_05_07_121356_create_offers_table', 1),
(33, '2018_05_07_121356_create_rules_table', 1),
(34, '2018_05_07_121356_create_shop_branch_times_table', 1),
(35, '2018_05_07_121356_create_shop_branches_table', 1),
(36, '2018_05_07_121356_create_shop_days_table', 1),
(37, '2018_05_07_121356_create_shops_table', 1),
(38, '2018_05_07_121356_create_sponsors_table', 1),
(39, '2018_05_07_121356_create_system_settings_table', 1),
(40, '2018_05_07_121356_create_trending_keywords_table', 1),
(41, '2018_05_07_121356_create_user_event_interactions_table', 1),
(42, '2018_05_07_121356_create_user_interests_table', 1),
(43, '2018_05_07_121356_create_user_rules_table', 1),
(44, '2018_05_07_121356_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `msg_ar` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `notification_type_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `schedule` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `msg`, `msg_ar`, `description`, `description_ar`, `user_id`, `entity_id`, `item_id`, `notification_type_id`, `is_read`, `is_sent`, `created_at`, `schedule`, `updated_at`) VALUES
(21, 'YOUR EVENT IS APPROVED', 'تم الموافقة على الحدث', NULL, NULL, 36, 4, 24, 3, 0, NULL, '2018-06-21 13:05:17', NULL, '2018-06-21 13:05:17'),
(22, 'New event added to underground', 'تم إضافة حدث جديد متعلق ب underground', NULL, NULL, 36, 4, 24, 5, 0, NULL, '2018-06-21 13:05:17', NULL, '2018-06-21 13:05:17'),
(23, 'New event added to موسيقى', 'تم إضافة حدث جديد متعلق ب موسيقى', NULL, NULL, 36, 4, 24, 5, 0, NULL, '2018-06-21 13:05:17', NULL, '2018-06-21 13:05:17'),
(24, 'Welcome to Eventakom', 'اهلا', NULL, NULL, 1, NULL, NULL, 1, 0, 0, '2018-06-21 14:04:34', NULL, '2018-06-21 14:04:34'),
(25, 'New event added to الندوات', 'تم إضافة حدث جديد متعلق ب الندوات', NULL, NULL, 42, 4, 27, 5, 0, NULL, '2018-06-23 12:37:58', NULL, '2018-06-23 12:37:58'),
(26, 'New event added to الندوات', 'تم إضافة حدث جديد متعلق ب الندوات', NULL, NULL, 42, 4, 28, 5, 0, NULL, '2018-06-23 12:37:59', NULL, '2018-06-23 12:37:59'),
(27, 'New event added to مسرح', 'تم إضافة حدث جديد متعلق ب مسرح', NULL, NULL, 36, 4, 29, 5, 0, NULL, '2018-06-23 12:43:43', NULL, '2018-06-23 12:43:43'),
(28, 'New event added to music', 'تم إضافة حدث جديد متعلق ب music', NULL, NULL, 36, 4, 30, 5, 0, NULL, '2018-06-24 08:39:03', NULL, '2018-06-24 08:39:03'),
(29, 'New event added to المؤتمرات', 'تم إضافة حدث جديد متعلق ب المؤتمرات', NULL, NULL, 42, 4, 30, 5, 0, NULL, '2018-06-24 08:39:03', NULL, '2018-06-24 08:39:03'),
(30, 'New event added to الندوات', 'تم إضافة حدث جديد متعلق ب الندوات', NULL, NULL, 42, 4, 30, 5, 0, NULL, '2018-06-24 08:39:03', NULL, '2018-06-24 08:39:03'),
(31, 'New event added to music', 'تم إضافة حدث جديد متعلق ب music', NULL, NULL, 36, 4, 31, 5, 0, NULL, '2018-06-24 09:01:30', NULL, '2018-06-24 09:01:30'),
(32, 'New event added to الندوات', 'تم إضافة حدث جديد متعلق ب الندوات', NULL, NULL, 42, 4, 31, 5, 0, NULL, '2018-06-24 09:01:30', NULL, '2018-06-24 09:01:30'),
(33, 'Good Morning', 'صباح الخير', NULL, NULL, 1, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(34, 'Good Morning', 'صباح الخير', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(35, 'Good Morning', 'صباح الخير', NULL, NULL, 37, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(36, 'Good Morning', 'صباح الخير', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(37, 'Good Morning', 'صباح الخير', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(38, 'Good Morning', 'صباح الخير', NULL, NULL, 40, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(39, 'Good Morning', 'صباح الخير', NULL, NULL, 41, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(40, 'Good Morning', 'صباح الخير', NULL, NULL, 42, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(41, 'Good Morning', 'صباح الخير', NULL, NULL, 43, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(42, 'Good Morning', 'صباح الخير', NULL, NULL, 44, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(43, 'Good Morning', 'صباح الخير', NULL, NULL, 45, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(44, 'Good Morning', 'صباح الخير', NULL, NULL, 46, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(45, 'Good Morning', 'صباح الخير', NULL, NULL, 47, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(46, 'Good Morning', 'صباح الخير', NULL, NULL, 48, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(47, 'Good Morning', 'صباح الخير', NULL, NULL, 49, NULL, NULL, 1, 0, 0, '2018-06-25 07:54:33', NULL, '2018-06-25 07:54:33'),
(48, 'New event added to underground', 'تم إضافة حدث جديد متعلق ب underground', NULL, NULL, 36, 4, 33, 5, 0, NULL, '2018-06-25 08:52:03', NULL, '2018-06-25 08:52:03'),
(49, 'New event added to Drama', 'تم إضافة حدث جديد متعلق ب Drama', NULL, NULL, 36, 4, 33, 5, 0, NULL, '2018-06-25 08:52:03', NULL, '2018-06-25 08:52:03'),
(50, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 33, 5, 0, NULL, '2018-06-25 08:52:03', NULL, '2018-06-25 08:52:03'),
(51, 'New event added to Conferences', 'تم إضافة حدث جديد متعلق ب Conferences', NULL, NULL, 42, 4, 33, 5, 0, NULL, '2018-06-25 08:52:03', NULL, '2018-06-25 08:52:03'),
(52, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 36, 8, 1, NULL, '2018-06-27 12:14:45', NULL, '2018-06-27 10:15:00'),
(53, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 37, 8, 0, NULL, '2018-06-27 12:16:08', NULL, '2018-06-27 12:16:08'),
(54, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 38, 8, 0, NULL, '2018-07-09 19:51:45', NULL, '2018-07-09 19:51:45'),
(55, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 39, 8, 0, NULL, '2018-07-09 20:04:54', NULL, '2018-07-09 20:04:54'),
(56, 'New event added to music', 'تم إضافة حدث جديد متعلق ب music', NULL, NULL, 36, 4, 40, 5, 0, NULL, '2018-07-10 08:21:10', NULL, '2018-07-10 08:21:10'),
(57, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 40, 5, 0, NULL, '2018-07-10 08:21:10', NULL, '2018-07-10 08:21:10'),
(58, 'New event added to Seminars', 'تم إضافة حدث جديد متعلق ب Seminars', NULL, NULL, 42, 4, 41, 5, 0, NULL, '2018-07-10 08:23:14', NULL, '2018-07-10 08:23:14'),
(59, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 42, 8, 0, NULL, '2018-07-10 13:18:54', NULL, '2018-07-10 13:18:54'),
(60, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 43, 8, 0, NULL, '2018-07-10 13:57:45', NULL, '2018-07-10 13:57:45'),
(61, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 44, 8, 0, NULL, '2018-07-10 14:46:52', NULL, '2018-07-10 14:46:52'),
(62, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 45, 8, 0, NULL, '2018-07-15 13:45:30', NULL, '2018-07-15 13:45:30'),
(63, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 46, 8, 0, NULL, '2018-07-15 13:46:18', NULL, '2018-07-15 13:46:18'),
(64, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 47, 5, 0, NULL, '2018-07-15 13:48:16', NULL, '2018-07-15 13:48:16'),
(65, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 48, 8, 0, NULL, '2018-07-15 15:52:52', NULL, '2018-07-15 15:52:52'),
(66, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 49, 8, 0, NULL, '2018-07-15 15:53:36', NULL, '2018-07-15 15:53:36'),
(67, 'New event added to Drama', 'تم إضافة حدث جديد متعلق ب Drama', NULL, NULL, 36, 4, 50, 5, 0, NULL, '2018-07-17 04:47:32', NULL, '2018-07-17 04:47:32'),
(68, 'New event added to Seminars', 'تم إضافة حدث جديد متعلق ب Seminars', NULL, NULL, 42, 4, 50, 5, 0, NULL, '2018-07-17 04:47:32', NULL, '2018-07-17 04:47:32'),
(69, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 52, 5, 0, NULL, '2018-07-17 04:50:14', NULL, '2018-07-17 04:50:14'),
(70, 'New event added to Conferences', 'تم إضافة حدث جديد متعلق ب Conferences', NULL, NULL, 42, 4, 52, 5, 0, NULL, '2018-07-17 04:50:14', NULL, '2018-07-17 04:50:14'),
(71, 'New event added to Drama', 'تم إضافة حدث جديد متعلق ب Drama', NULL, NULL, 36, 4, 53, 5, 0, NULL, '2018-07-17 04:51:51', NULL, '2018-07-17 04:51:51'),
(72, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 53, 5, 0, NULL, '2018-07-17 04:51:51', NULL, '2018-07-17 04:51:51'),
(73, 'New event added to Conferences', 'تم إضافة حدث جديد متعلق ب Conferences', NULL, NULL, 42, 4, 53, 5, 0, NULL, '2018-07-17 04:51:51', NULL, '2018-07-17 04:51:51'),
(74, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 54, 8, 0, NULL, '2018-07-21 16:10:28', NULL, '2018-07-21 16:10:28'),
(75, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 55, 8, 0, NULL, '2018-09-29 19:45:41', NULL, '2018-09-29 19:45:41'),
(76, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 56, 8, 0, NULL, '2018-09-29 19:48:29', NULL, '2018-09-29 19:48:29'),
(77, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 57, 8, 0, NULL, '2018-09-29 19:49:10', NULL, '2018-09-29 19:49:10'),
(78, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 59, 8, 0, NULL, '2018-09-30 12:56:11', NULL, '2018-09-30 12:56:11'),
(79, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 60, 8, 0, NULL, '2018-09-30 19:46:54', NULL, '2018-09-30 19:46:54'),
(80, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 61, 8, 0, NULL, '2018-09-30 19:50:04', NULL, '2018-09-30 19:50:04'),
(81, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 62, 8, 0, NULL, '2018-09-30 19:53:52', NULL, '2018-09-30 19:53:52'),
(82, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 63, 8, 0, NULL, '2018-09-30 20:02:27', NULL, '2018-09-30 20:02:27'),
(83, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 64, 8, 0, NULL, '2018-09-30 20:12:44', NULL, '2018-09-30 20:12:44'),
(84, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 65, 8, 0, NULL, '2018-09-30 20:20:46', NULL, '2018-09-30 20:20:46'),
(85, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 66, 8, 1, NULL, '2018-10-01 18:00:14', NULL, '2018-10-09 10:45:06'),
(86, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 1, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(87, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(88, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 37, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(89, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(90, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(91, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 40, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(92, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 41, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(93, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 42, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(94, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 43, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(95, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 44, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(96, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 45, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(97, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 46, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(98, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 47, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(99, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 48, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(100, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 49, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(101, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 50, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(102, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 51, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(103, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 52, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(104, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 53, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(105, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 54, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(106, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 55, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(107, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 56, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(108, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 57, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(109, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 58, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(110, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 59, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(111, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 60, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(112, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 61, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(113, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 62, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(114, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 63, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(115, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 64, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(116, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 65, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(117, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 66, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(118, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 67, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(119, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 68, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(120, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 69, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(121, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 70, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(122, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 71, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(123, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 72, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(124, 'Test Notifi.', 'اختبار اشعارات', NULL, NULL, 73, NULL, NULL, 1, 0, 0, '2018-10-09 07:46:22', NULL, '2018-10-09 07:46:22'),
(125, 'test 2', 'Test 2', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(126, 'test 2', 'Test 2', NULL, NULL, 37, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(127, 'test 2', 'Test 2', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(128, 'test 2', 'Test 2', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(129, 'test 2', 'Test 2', NULL, NULL, 40, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(130, 'test 2', 'Test 2', NULL, NULL, 41, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(131, 'test 2', 'Test 2', NULL, NULL, 42, NULL, NULL, 1, 0, 0, '2018-10-09 07:51:26', NULL, '2018-10-09 07:51:26'),
(132, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 1, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(133, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(134, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 37, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(135, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(136, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(137, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 40, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(138, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 41, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(139, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 42, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(140, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 43, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(141, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 44, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(142, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 45, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(143, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 46, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(144, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 47, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(145, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 48, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(146, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 49, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(147, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 50, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(148, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 51, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(149, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 52, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(150, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 53, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(151, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 54, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(152, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 55, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(153, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 56, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(154, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 57, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(155, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 58, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(156, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 59, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(157, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 60, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(158, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 61, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(159, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 62, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(160, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 63, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(161, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 64, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(162, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 65, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(163, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 66, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(164, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 67, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(165, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 68, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(166, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 69, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(167, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 70, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(168, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 71, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(169, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 72, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(170, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 73, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(171, 'Noti.TEST ->', 'Noti.TEST ->', NULL, NULL, 74, NULL, NULL, 1, 0, 0, '2018-10-09 10:42:50', NULL, '2018-10-09 10:42:50'),
(172, 'TESTTTTTTTTTTT', 'TSETTTTTTTTTTTTTTT', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-10-09 10:45:49', NULL, '2018-10-09 10:45:49'),
(173, 'TESTTTTTTTTTTT', 'TSETTTTTTTTTTTTTTT', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-10-09 10:45:49', NULL, '2018-10-09 10:45:49'),
(174, 'TESTTTTTTTTTTT', 'TSETTTTTTTTTTTTTTT', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-10-09 10:45:49', NULL, '2018-10-09 10:45:49'),
(175, 'New event added to festival', 'تم إضافة حدث جديد متعلق ب festival', NULL, NULL, 42, 4, 67, 5, 0, NULL, '2018-10-11 08:08:27', NULL, '2018-10-11 08:08:27'),
(176, 'New event added to Seminars', 'تم إضافة حدث جديد متعلق ب Seminars', NULL, NULL, 42, 4, 67, 5, 0, NULL, '2018-10-11 08:08:27', NULL, '2018-10-11 08:08:27'),
(177, 'New event added to Seminars', 'تم إضافة حدث جديد متعلق ب Seminars', NULL, NULL, 42, 4, 68, 5, 0, NULL, '2018-10-11 08:16:28', NULL, '2018-10-11 08:16:28'),
(178, 'New event added to music', 'تم إضافة حدث جديد متعلق ب music', NULL, NULL, 36, 4, 69, 5, 0, NULL, '2018-10-11 08:27:14', NULL, '2018-10-11 08:27:14'),
(179, 'New event added to Drama', 'تم إضافة حدث جديد متعلق ب Drama', NULL, NULL, 36, 4, 69, 5, 0, NULL, '2018-10-11 08:27:14', NULL, '2018-10-11 08:27:14'),
(180, 'New event added to Seminars', 'تم إضافة حدث جديد متعلق ب Seminars', NULL, NULL, 42, 4, 69, 5, 0, NULL, '2018-10-11 08:27:14', NULL, '2018-10-11 08:27:14'),
(181, 'New event added to underground', 'تم إضافة حدث جديد متعلق ب underground', NULL, NULL, 36, 4, 70, 5, 0, NULL, '2018-10-11 09:37:02', NULL, '2018-10-11 09:37:02'),
(182, 'max', 'ماكس', NULL, NULL, 1, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(183, 'max', 'ماكس', NULL, NULL, 36, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(184, 'max', 'ماكس', NULL, NULL, 37, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(185, 'max', 'ماكس', NULL, NULL, 38, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(186, 'max', 'ماكس', NULL, NULL, 39, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(187, 'max', 'ماكس', NULL, NULL, 40, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(188, 'max', 'ماكس', NULL, NULL, 41, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(189, 'max', 'ماكس', NULL, NULL, 43, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(190, 'max', 'ماكس', NULL, NULL, 44, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(191, 'max', 'ماكس', NULL, NULL, 45, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(192, 'max', 'ماكس', NULL, NULL, 46, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(193, 'max', 'ماكس', NULL, NULL, 47, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(194, 'max', 'ماكس', NULL, NULL, 48, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(195, 'max', 'ماكس', NULL, NULL, 49, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(196, 'max', 'ماكس', NULL, NULL, 50, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(197, 'max', 'ماكس', NULL, NULL, 51, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(198, 'max', 'ماكس', NULL, NULL, 52, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(199, 'max', 'ماكس', NULL, NULL, 53, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(200, 'max', 'ماكس', NULL, NULL, 54, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(201, 'max', 'ماكس', NULL, NULL, 55, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(202, 'max', 'ماكس', NULL, NULL, 56, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(203, 'max', 'ماكس', NULL, NULL, 57, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(204, 'max', 'ماكس', NULL, NULL, 58, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(205, 'max', 'ماكس', NULL, NULL, 59, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(206, 'max', 'ماكس', NULL, NULL, 60, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(207, 'max', 'ماكس', NULL, NULL, 61, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(208, 'max', 'ماكس', NULL, NULL, 62, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(209, 'max', 'ماكس', NULL, NULL, 63, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(210, 'max', 'ماكس', NULL, NULL, 64, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(211, 'max', 'ماكس', NULL, NULL, 65, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(212, 'max', 'ماكس', NULL, NULL, 66, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(213, 'max', 'ماكس', NULL, NULL, 67, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(214, 'max', 'ماكس', NULL, NULL, 68, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(215, 'max', 'ماكس', NULL, NULL, 69, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(216, 'max', 'ماكس', NULL, NULL, 70, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(217, 'max', 'ماكس', NULL, NULL, 71, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(218, 'max', 'ماكس', NULL, NULL, 72, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(219, 'max', 'ماكس', NULL, NULL, 73, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(220, 'max', 'ماكس', NULL, NULL, 74, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(221, 'max', 'ماكس', NULL, NULL, 75, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(222, 'max', 'ماكس', NULL, NULL, 76, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(223, 'max', 'ماكس', NULL, NULL, 77, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(224, 'max', 'ماكس', NULL, NULL, 78, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(225, 'max', 'ماكس', NULL, NULL, 79, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(226, 'max', 'ماكس', NULL, NULL, 80, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(227, 'max', 'ماكس', NULL, NULL, 81, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(228, 'max', 'ماكس', NULL, NULL, 82, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(229, 'max', 'ماكس', NULL, NULL, 83, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(230, 'max', 'ماكس', NULL, NULL, 84, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(231, 'max', 'ماكس', NULL, NULL, 85, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(232, 'max', 'ماكس', NULL, NULL, 86, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(233, 'max', 'ماكس', NULL, NULL, 87, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(234, 'max', 'ماكس', NULL, NULL, 88, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(235, 'max', 'ماكس', NULL, NULL, 89, NULL, NULL, 1, 0, 0, '2018-10-11 11:26:52', NULL, '2018-10-11 11:26:52'),
(236, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 71, 8, 0, NULL, '2018-10-13 23:36:50', NULL, '2018-10-13 23:36:50'),
(237, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 72, 8, 0, NULL, '2018-10-13 23:37:06', NULL, '2018-10-13 23:37:06'),
(238, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 73, 8, 0, NULL, '2018-10-13 23:37:26', NULL, '2018-10-13 23:37:26'),
(239, 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, NULL, 4, 74, 8, 0, NULL, '2018-10-13 23:37:37', NULL, '2018-10-13 23:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_push`
--

CREATE TABLE `notifications_push` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `mobile_os` varchar(255) DEFAULT NULL,
  `lang_id` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications_push`
--

INSERT INTO `notifications_push` (`id`, `notification_id`, `device_token`, `mobile_os`, `lang_id`, `user_id`) VALUES
(16, 21, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(17, 22, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(18, 23, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(19, 24, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(20, 24, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(21, 24, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(22, 24, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(23, 24, 'testtesttest', 'android', 1, 42),
(24, 25, 'testtesttest', 'android', 1, 42),
(25, 26, 'testtesttest', 'android', 1, 42),
(26, 27, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(27, 28, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(28, 29, 'testtesttest', 'android', 1, 42),
(29, 30, 'testtesttest', 'android', 1, 42),
(30, 31, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(31, 32, 'testtesttest', 'android', 1, 42),
(32, 33, NULL, NULL, 2, 1),
(33, 34, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(34, 35, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(35, 36, 'testtesttest', 'android', 2, 38),
(36, 37, 'testtesttest', 'android', 1, 39),
(37, 38, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(38, 39, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(39, 40, 'testtesttest', 'android', 1, 42),
(40, 41, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 43),
(41, 42, NULL, NULL, NULL, 44),
(42, 43, NULL, NULL, NULL, 45),
(43, 44, NULL, NULL, NULL, 46),
(44, 45, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 47),
(45, 46, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 48),
(46, 47, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 49),
(47, 48, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(48, 48, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(49, 49, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(50, 49, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(51, 50, 'testtesttest', 'android', 1, 42),
(52, 50, 'testtesttest', 'android', 1, 42),
(53, 51, 'testtesttest', 'android', 1, 42),
(54, 51, 'testtesttest', 'android', 1, 42),
(55, 56, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(56, 57, 'testtesttest', 'android', 1, 42),
(57, 58, 'testtesttest', 'android', 1, 42),
(58, 64, 'testtesttest', 'android', 1, 42),
(59, 67, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(60, 68, 'testtesttest', 'android', 1, 42),
(61, 69, 'testtesttest', 'android', 1, 42),
(62, 70, 'testtesttest', 'android', 1, 42),
(63, 71, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(64, 72, 'testtesttest', 'android', 1, 42),
(65, 73, 'testtesttest', 'android', 1, 42),
(66, 86, NULL, NULL, 1, 1),
(67, 87, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(68, 88, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(69, 89, 'testtesttest', 'android', 2, 38),
(70, 90, 'testtesttest', 'android', 1, 39),
(71, 91, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(72, 92, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(73, 93, 'testtesttest', 'android', 1, 42),
(74, 94, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 43),
(75, 95, NULL, NULL, NULL, 44),
(76, 96, NULL, NULL, NULL, 45),
(77, 97, NULL, NULL, NULL, 46),
(78, 98, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 47),
(79, 99, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 48),
(80, 100, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 49),
(81, 101, NULL, NULL, NULL, 50),
(82, 102, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 51),
(83, 103, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 52),
(84, 104, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 53),
(85, 105, 'BF729B2D-4477-4D62-AE8E-16AF0616DC06', 'android', 1, 54),
(86, 106, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 55),
(87, 107, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 56),
(88, 108, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 57),
(89, 109, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 58),
(90, 110, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 59),
(91, 111, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 60),
(92, 112, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 61),
(93, 113, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 62),
(94, 114, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 63),
(95, 115, '51EB31F6-CC2A-42AE-89EB-20FB6B376125', 'ios', NULL, 64),
(96, 116, 'DFE57C9B-69C5-4077-B093-4074654D0006', 'ios', NULL, 65),
(97, 117, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 66),
(98, 118, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 67),
(99, 119, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 68),
(100, 120, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 69),
(101, 121, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 70),
(102, 122, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 71),
(103, 123, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', NULL, 72),
(104, 124, 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, 73),
(105, 125, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(106, 126, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(107, 127, 'testtesttest', 'android', 2, 38),
(108, 128, 'testtesttest', 'android', 1, 39),
(109, 129, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(110, 130, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(111, 131, 'testtesttest', 'android', 1, 42),
(112, 132, NULL, NULL, 1, 1),
(113, 133, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(114, 134, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(115, 135, 'testtesttest', 'android', 2, 38),
(116, 136, 'testtesttest', 'android', 1, 39),
(117, 137, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(118, 138, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(119, 139, 'testtesttest', 'android', 1, 42),
(120, 140, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 43),
(121, 141, NULL, NULL, NULL, 44),
(122, 142, NULL, NULL, NULL, 45),
(123, 143, NULL, NULL, NULL, 46),
(124, 144, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 47),
(125, 145, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 48),
(126, 146, 'testToken', 'android', 1, 49),
(127, 147, NULL, NULL, NULL, 50),
(128, 148, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 51),
(129, 149, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 52),
(130, 150, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 53),
(131, 151, 'BF729B2D-4477-4D62-AE8E-16AF0616DC06', 'android', 1, 54),
(132, 152, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', 1, 55),
(133, 153, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 56),
(134, 154, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 57),
(135, 155, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 58),
(136, 156, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 59),
(137, 157, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 60),
(138, 158, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 61),
(139, 159, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 62),
(140, 160, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 63),
(141, 161, '51EB31F6-CC2A-42AE-89EB-20FB6B376125', 'ios', NULL, 64),
(142, 162, 'DFE57C9B-69C5-4077-B093-4074654D0006', 'ios', NULL, 65),
(143, 163, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 66),
(144, 164, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 67),
(145, 165, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 68),
(146, 166, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 69),
(147, 167, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 70),
(148, 168, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 71),
(149, 169, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', NULL, 72),
(150, 170, 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, 73),
(151, 171, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'android', NULL, 74),
(152, 172, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(153, 173, 'testtesttest', 'android', 2, 38),
(154, 174, 'testtesttest', 'android', 1, 39),
(155, 175, 'testtesttest', 'android', 1, 42),
(156, 176, 'testtesttest', 'android', 1, 42),
(157, 177, 'testtesttest', 'android', 1, 42),
(158, 178, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(159, 179, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(160, 180, 'testtesttest', 'android', 1, 42),
(161, 181, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(162, 182, NULL, NULL, 1, 1),
(163, 183, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 2, 36),
(164, 184, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 37),
(165, 185, 'testtesttest', 'android', 2, 38),
(166, 186, 'testtesttest', 'android', 1, 39),
(167, 187, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 40),
(168, 188, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 41),
(169, 189, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 43),
(170, 190, NULL, NULL, NULL, 44),
(171, 191, NULL, NULL, NULL, 45),
(172, 192, NULL, NULL, NULL, 46),
(173, 193, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 47),
(174, 194, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 48),
(175, 195, 'testToken', 'android', 1, 49),
(176, 196, NULL, NULL, NULL, 50),
(177, 197, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 51),
(178, 198, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 52),
(179, 199, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 53),
(180, 200, 'BF729B2D-4477-4D62-AE8E-16AF0616DC06', 'android', 1, 54),
(181, 201, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', 1, 55),
(182, 202, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 56),
(183, 203, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 57),
(184, 204, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 58),
(185, 205, '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, 59),
(186, 206, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 60),
(187, 207, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 61),
(188, 208, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 62),
(189, 209, '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, 63),
(190, 210, '51EB31F6-CC2A-42AE-89EB-20FB6B376125', 'ios', NULL, 64),
(191, 211, 'DFE57C9B-69C5-4077-B093-4074654D0006', 'ios', NULL, 65),
(192, 212, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 66),
(193, 213, 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, 67),
(194, 214, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 68),
(195, 215, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 69),
(196, 216, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 70),
(197, 217, 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, 71),
(198, 218, '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', NULL, 72),
(199, 219, 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, 73),
(200, 220, 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', 1, 74),
(201, 221, NULL, NULL, 1, 75),
(202, 222, 'B3BF2A77-CB7F-4954-819A-2EB55427F683', 'ios', 2, 76),
(203, 223, '8C134F55-CC87-4067-811A-69C26EC99BB4', 'ios', NULL, 77),
(204, 224, '8C134F55-CC87-4067-811A-69C26EC99BB4', 'ios', NULL, 78),
(205, 225, 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, 79),
(206, 226, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 80),
(207, 227, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 81),
(208, 228, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 82),
(209, 229, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 83),
(210, 230, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 84),
(211, 231, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 85),
(212, 232, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 86),
(213, 233, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 87),
(214, 234, 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', 1, 88),
(215, 235, 'AA13ED2E-AB93-455B-9D35-94A63E4D651C', 'android', 1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `notification_items`
--

CREATE TABLE `notification_items` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `msg_ar` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `is_push` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification_types`
--

INSERT INTO `notification_types` (`id`, `name`, `msg`, `msg_ar`, `description`, `description_ar`, `is_push`) VALUES
(1, 'Customized Push Notification', NULL, NULL, NULL, NULL, 1),
(2, 'Big Event', 'Big Event Added', NULL, '00 IS HAPPENING, DON\'T MISS IT', 'يحدث الآن 00 لا يفوتك', 1),
(3, 'Event Accepted', 'YOUR EVENT IS APPROVED', 'تم الموافقة على الحدث', 'We\'ve approve your event, users will engage with it.', 'We\'ve approve your event, users will engage with it.', 1),
(4, 'Event Rejected', 'YOUR EVENT IS Rejected', 'لم يتم الموافقة على الحدث', NULL, NULL, 1),
(5, 'Event Same Interest has been added ', 'New event added to 00', 'تم اضافة حدث جديد 00 ', 'Based on your interests, new event added to 00 go check it', 'Based on your interests, new event added to 00 go check it', 1),
(6, '24 Hrs For Event Added To Calendar', '1 Day left for 00', 'باقي يوم على انطلاق 00', 'You added this to your calendar, don\'t miss it', 'You added this to your calendar, don\'t miss it', 1),
(7, '24 Hrs For Favorite Event ', '1 Day left for 00', 'باقي يوم على انطلاق 00', 'You added this to your favorites, don\'t miss it', 'You added this to your favorites, don\'t miss it', 1),
(8, 'Backend - New Event Added ', 'New event added from mobile application', 'تم اضافة حدث جديد عن طريق التطبيق', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('e55f0a4ad611eb7be229abcd6584faea65e1052cf30c44aec2a6b342bb7494d6dab89466609aac79', 3, 3, 'api_token', '[]', 0, '2018-05-22 13:37:42', '2018-05-22 13:37:42', '2019-05-22 13:37:42'),
('6adae8a3555050e1fd5c432b8b282870c0938710279637ca1348a70a04ff628b5840efa258d80918', 5, 3, 'api_token', '[]', 0, '2018-05-23 09:02:48', '2018-05-23 09:02:48', '2019-05-23 09:02:48'),
('7026da870451d145e3e7a74c0f33e4de833556cfd4f53d34e8e9693caddbbeb5879984dcfa5570fe', 3, 3, 'api_token', '[]', 0, '2018-05-23 10:39:03', '2018-05-23 10:39:03', '2019-05-23 10:39:03'),
('af82bf870f09f07fab59e1bb2bb4007297382c1ae0431d68e84c2208f7d517769a4d7a1b45e4ab13', 12, 3, 'api_token', '[]', 0, '2018-05-23 13:17:59', '2018-05-23 13:17:59', '2019-05-23 13:17:59'),
('79631cfc64ffce8e8f2e22c609c890c3c0cd9ab6b8d28014822de0214789f67f7ec0143f44627e12', 12, 3, 'api_token', '[]', 0, '2018-05-23 13:34:28', '2018-05-23 13:34:28', '2019-05-23 13:34:28'),
('4fea4564c97d1efa4d64ef3d21a6220443e31ee81a43670f47c6f37599d50dec1005722c9693b218', 5, 3, 'api_token', '[]', 0, '2018-05-23 13:41:40', '2018-05-23 13:41:40', '2019-05-23 13:41:40'),
('01a80655c0ed3b56f284f4e532985b24c338f812c6c89eacc99d4451b9975d9fddb23000acced67f', 12, 3, 'api_token', '[]', 0, '2018-05-23 13:51:53', '2018-05-23 13:51:53', '2019-05-23 13:51:53'),
('d2e00b00ae7a8066e9a40a8b3e4acafccaff460b6ff3da01e56404c1625b8257d6de70b25584e9dc', 5, 3, 'api_token', '[]', 0, '2018-05-23 14:08:04', '2018-05-23 14:08:04', '2019-05-23 14:08:04'),
('1ddb162f73022a41927f87c706913c96bd337cbb96ab5c6d9eb64bd54cf0554cea5f2153aab8b80b', 12, 3, 'api_token', '[]', 0, '2018-05-23 14:22:59', '2018-05-23 14:22:59', '2019-05-23 14:22:59'),
('8453c168ce97b1c773636ab431e308da56226c22cf4dfaff1b3511e5e13fa8d4448b5e85c4ef8d09', 16, 3, 'api_token', '[]', 0, '2018-05-23 15:08:25', '2018-05-23 15:08:25', '2019-05-23 15:08:25'),
('81f36d28b2de6ecff93c07056efbb2784446540753ee63e0c975c9713186a340524e47f946d8975d', 16, 3, 'api_token', '[]', 0, '2018-05-23 15:21:36', '2018-05-23 15:21:36', '2019-05-23 15:21:36'),
('9f7d5b25cf9615de3c50151137cedfe98656203ae0cfc7ebe1e0285f6768c2f6bfbff06c45a3e2bb', 16, 3, 'api_token', '[]', 0, '2018-05-23 15:21:51', '2018-05-23 15:21:51', '2019-05-23 15:21:51'),
('4f7f43e0585b371e0e9670fdcf29e74cc97b5516f96d6928e6d97699376517cf47e0339c0058e333', 16, 3, 'api_token', '[]', 0, '2018-05-23 15:22:23', '2018-05-23 15:22:23', '2019-05-23 15:22:23'),
('dd8656ece6b407bd3dd28ae65934223e7d535fb368a7053e63e48dfb1c23aac1b29e1b5f98f0e574', 16, 3, 'api_token', '[]', 0, '2018-05-23 16:02:22', '2018-05-23 16:02:22', '2019-05-23 16:02:22'),
('f3452db3d376e01ec74500fadf1dec4ff9820100af5f33316090f7247d5462a77dfcccfa2836d537', 16, 3, 'api_token', '[]', 0, '2018-05-23 16:03:41', '2018-05-23 16:03:41', '2019-05-23 16:03:41'),
('134f8ad08135bf6997abd2341ecece407814a8d1e8019148160f17a8439a33b2a62a5653fd6ef76f', 16, 3, 'api_token', '[]', 0, '2018-05-23 16:05:24', '2018-05-23 16:05:24', '2019-05-23 16:05:24'),
('8904ff0060d826e5c803a709b391ba1dffe078b6c24882ed8c31bcd87b62eb3d52a5d98c0fc64560', 16, 3, 'api_token', '[]', 0, '2018-05-23 16:21:02', '2018-05-23 16:21:02', '2019-05-23 16:21:02'),
('d682e7d06a583d77b7242445c03a56096536487a120a3e641fc47333f36c2d9f02022b908653b1f0', 24, 3, 'api_token', '[]', 0, '2018-05-26 12:13:29', '2018-05-26 12:13:29', '2019-05-26 12:13:29'),
('488c9f002c7cee709eda8f07bbc6e48013d0633e417755c20e84341e9e975c96777316a5a8a496ee', 18, 3, 'api_token', '[]', 0, '2018-05-27 08:15:18', '2018-05-27 08:15:18', '2019-05-27 08:15:18'),
('e5d4d86c4479de888baa170555522d1599f67b048f8d8f1c1c0ef7f7b281b49659e046a56bc6cd2e', 33, 3, 'api_token', '[]', 0, '2018-05-27 14:30:24', '2018-05-27 14:30:24', '2019-05-27 14:30:24'),
('65d0c3317fb80cc839a082d015dc68a51d16145e3f30b91b05dd4933bb5e18bd510b9129d155b6b7', 33, 3, 'api_token', '[]', 0, '2018-05-27 14:32:17', '2018-05-27 14:32:17', '2019-05-27 14:32:17'),
('f9d74deeb0b42b15b9c535becbc85149154f25e052506e9f23d5a7989790afe0a35649b552302dba', 33, 3, 'api_token', '[]', 0, '2018-05-27 14:52:32', '2018-05-27 14:52:32', '2019-05-27 14:52:32'),
('e38892bd7959a47d6474cbd6b6b3326bfc7e11c13c8e25f5cdcb9d709a0277e33d80e09c1cfbed86', 39, 3, 'api_token', '[]', 0, '2018-05-28 14:08:44', '2018-05-28 14:08:44', '2019-05-28 14:08:44'),
('64d105f82972e0b024a9c618458de5757288e6330ba0a64e0b171b806b7220505acc3e5c6c393a1a', 39, 3, 'api_token', '[]', 0, '2018-05-28 14:11:22', '2018-05-28 14:11:22', '2019-05-28 14:11:22'),
('ff24ce0922c938b7d54146914127f99a7e2f69c8edd3aebe589bdf75ac8985eff04992877e796a2b', 40, 3, 'api_token', '[]', 0, '2018-05-28 14:36:08', '2018-05-28 14:36:08', '2019-05-28 14:36:08'),
('cc4183c91ac280682df2cdf2af11d1d79d733b6bb34245c1ab0c89b29375f512345ad855561a6a6b', 36, 3, 'api_token', '[]', 0, '2018-05-28 14:43:13', '2018-05-28 14:43:13', '2019-05-28 14:43:13'),
('b4b69e531492a297802a8e35745917bc0444293bd511cdeccb53776fc2db08d68caeade4289c8f09', 41, 3, 'api_token', '[]', 0, '2018-05-28 14:46:31', '2018-05-28 14:46:31', '2019-05-28 14:46:31'),
('6b3d935755c198e1d33ebeb13cde2425f60a27a1a3f81ccfd49f30097004017780f8b52c10d1a22a', 41, 3, 'api_token', '[]', 0, '2018-05-28 14:47:24', '2018-05-28 14:47:24', '2019-05-28 14:47:24'),
('e67843593da1a33e029888b35c0472533e9e6662f85433997b92a956bd8c1efff525a1fa02884b2a', 42, 3, 'api_token', '[]', 0, '2018-05-28 15:36:03', '2018-05-28 15:36:03', '2019-05-28 15:36:03'),
('12becfa0a6f598179772a00ac3cfef340f6ba18dff94267a0b403152a5c7a22644d21bdec1318649', 42, 3, 'api_token', '[]', 0, '2018-05-28 15:40:43', '2018-05-28 15:40:43', '2019-05-28 15:40:43'),
('f9d2a0f669510abfda6b8da434ac2ec896c346bd113d2ccbc55ad4976ea27d74e6fb7a81a8904fc3', 42, 3, 'api_token', '[]', 0, '2018-05-28 15:40:58', '2018-05-28 15:40:58', '2019-05-28 15:40:58'),
('86a4344cfbf8ae85127b53fefe8f03513509ea4a784a7ae7eb7202bb84c535ab63c8a86ff5a6cfb7', 38, 3, 'api_token', '[]', 0, '2018-05-29 12:59:42', '2018-05-29 12:59:42', '2019-05-29 12:59:42'),
('077d439a4bbfc281c39a025a5c4f58ccd9a5cf66a116817ff233ce6c5531b9548ae94740b99d8bf5', 41, 3, 'api_token', '[]', 0, '2018-05-30 08:15:13', '2018-05-30 08:15:13', '2019-05-30 08:15:13'),
('2e41f02416e542bc4240db1ba5b23895c569b132262f65c217f7675c99ebf7531f542121c1efd57f', 41, 3, 'api_token', '[]', 0, '2018-05-30 10:45:59', '2018-05-30 10:45:59', '2019-05-30 10:45:59'),
('e9c29325ddefb35e17b908b55e408729bf266d8637bdc9e6ea034d3024444ba2a90fb4e6bf1bd619', 41, 3, 'api_token', '[]', 0, '2018-05-31 11:08:52', '2018-05-31 11:08:52', '2019-05-31 11:08:52'),
('49e33d7233ca377c92244b9bf82b75291b40c33df985098f1f96c62e4e1ef78ec151105991753dcb', 36, 3, 'api_token', '[]', 0, '2018-05-31 13:42:28', '2018-05-31 13:42:28', '2019-05-31 13:42:28'),
('f0fa162ce3ff820ee9a83138c39c0cd6bba41708f01cf872163a0117704c256feab72268638fd5ba', 41, 3, 'api_token', '[]', 0, '2018-05-31 13:48:10', '2018-05-31 13:48:10', '2019-05-31 13:48:10'),
('00feb63e2cb2249115cafcf765113cf98da771a7a9c070ef49c42402bd44c882f0970b701b8dab3f', 41, 3, 'api_token', '[]', 0, '2018-05-31 14:28:15', '2018-05-31 14:28:15', '2019-05-31 14:28:15'),
('00dac02a90ad4fb9a6ea9c651f93550949d2e60080118964fea24c4e558260ed04b699c05205e36e', 42, 3, 'api_token', '[]', 0, '2018-06-03 15:13:47', '2018-06-03 15:13:47', '2019-06-03 15:13:47'),
('1c9a969f6ed81428b9af2305f3bebb167961540a3098af54786e45db2f4bf4baf80eb87e3ae8456a', 42, 3, 'api_token', '[]', 0, '2018-06-03 15:24:06', '2018-06-03 15:24:06', '2019-06-03 15:24:06'),
('c169e972d3a05634a4dfbc12ddc940f1523836da5d545144b55d0d9bea9ba7e7fbb2c6c6fe63829a', 42, 3, 'api_token', '[]', 0, '2018-06-03 15:40:37', '2018-06-03 15:40:37', '2019-06-03 15:40:37'),
('f39b4f7463bb13afb61ed6e3662a8942dfd8a05108a4c432643e3ed0ea1294d5c5abc0d06a8f67ba', 41, 3, 'api_token', '[]', 0, '2018-06-04 10:28:16', '2018-06-04 10:28:16', '2019-06-04 10:28:16'),
('2daa107d88a2eb30bbb49768592d2d0ff61728b12bd8590b9c30db44115f3f61cbcdb282673e9d29', 41, 3, 'api_token', '[]', 0, '2018-06-04 12:58:50', '2018-06-04 12:58:50', '2019-06-04 12:58:50'),
('470528fece630699bb566acada3c5d1347d9288e6a6c20f05b17bc181209fead0de510b3b3dbc54d', 36, 3, 'api_token', '[]', 0, '2018-06-04 13:10:46', '2018-06-04 13:10:46', '2019-06-04 13:10:46'),
('8610c81c01d13255fbafab980590e600c82fecc4981f1411c9e04119c9e801508525ce6ac6fa6166', 41, 3, 'api_token', '[]', 0, '2018-06-04 13:17:57', '2018-06-04 13:17:57', '2019-06-04 13:17:57'),
('dd505569efc4e0404224eba982c74545954983ae2ecd3a23d49403dd3e932a95f14a04c22b83e438', 36, 3, 'api_token', '[]', 0, '2018-06-04 13:19:30', '2018-06-04 13:19:30', '2019-06-04 13:19:30'),
('41c491540fd3bc8398b18b02fd19a827305dc98cec1760fbacc15aebdffc5ed70b75f60533b20b02', 38, 3, 'api_token', '[]', 0, '2018-06-04 13:22:50', '2018-06-04 13:22:50', '2019-06-04 13:22:50'),
('7b1278f817da5c08f0593174be967aa3de13332efa079a1b70b0a9863d78678f9acfe32d4bef84c2', 36, 3, 'api_token', '[]', 0, '2018-06-04 13:26:20', '2018-06-04 13:26:20', '2019-06-04 13:26:20'),
('fc2f59f8a5787059bb1f1730caa8f1b8bcfa7432807cd0236f56a4e4e2f457335da5820ad62bcd3e', 36, 3, 'api_token', '[]', 0, '2018-06-04 13:27:37', '2018-06-04 13:27:37', '2019-06-04 13:27:37'),
('d4e4516a2a6edfed3586cb495cc70bfeab173082a76dbdd4676e71bb48b553d7bf40c2f94a1c0f71', 36, 3, 'api_token', '[]', 0, '2018-06-06 08:59:16', '2018-06-06 08:59:16', '2019-06-06 08:59:16'),
('6c2f4d9cc34a1f5b6b620f4ebc456614038877c557197f83a43ebe1e151244b0486fb2dec34e2869', 36, 3, 'api_token', '[]', 0, '2018-06-06 09:00:34', '2018-06-06 09:00:34', '2019-06-06 09:00:34'),
('d0eded3e54448131e999c693c8f96f35c373d88f90dbbcd260586a57beac1d687a4daa0a33fc925a', 36, 3, 'api_token', '[]', 0, '2018-06-06 09:43:06', '2018-06-06 09:43:06', '2019-06-06 09:43:06'),
('d02b6703ff1360568884bbd7e923c2eecca0b49e089387f6a091b77612aba4ea3aff8ebc7849374b', 36, 3, 'api_token', '[]', 0, '2018-06-06 13:20:33', '2018-06-06 13:20:33', '2019-06-06 13:20:33'),
('408cada4112bd2f5bf37237fd43448b6e3d842f08591dec844974415f8bd247f850681e60f9c799d', 36, 3, 'api_token', '[]', 0, '2018-06-07 08:41:24', '2018-06-07 08:41:24', '2019-06-07 08:41:24'),
('e9462b9cfaf0ae2c766e97c413dde96abeb772a3b08998c62c87b712796c551ff4427110e3f2ed8f', 36, 3, 'api_token', '[]', 0, '2018-06-10 11:49:16', '2018-06-10 11:49:16', '2019-06-10 11:49:16'),
('5e335b940b18ac94ae9f755dcf039488fa80f637fed12407fd28e86a9b673f1d6b1ba88db11d17a4', 36, 3, 'api_token', '[]', 0, '2018-06-11 09:32:12', '2018-06-11 09:32:12', '2019-06-11 09:32:12'),
('54e4e0e505f597884d704167c31bf5a7f05a7bec7945004341e2323892fb316afa6c25036897993e', 36, 3, 'api_token', '[]', 0, '2018-06-11 09:50:19', '2018-06-11 09:50:19', '2019-06-11 09:50:19'),
('857956bafd6ad6a752e0ea4bfe35c0f057eacf568965837efa61aaefe66936b2dd62baee44409239', 36, 3, 'api_token', '[]', 0, '2018-06-11 13:15:20', '2018-06-11 13:15:20', '2019-06-11 13:15:20'),
('88afd4b7d5f6085b59be3f2f36946b6809e6096f056eb562d54ecaea9ce91c9905a9151562bd032a', 41, 3, 'api_token', '[]', 0, '2018-06-13 11:55:57', '2018-06-13 11:55:57', '2019-06-13 11:55:57'),
('6e3d299614c7566147cbf07e8a06620af049148127b30722cc023b14d3c88394a413d06773b823f5', 41, 3, 'api_token', '[]', 0, '2018-06-20 13:18:12', '2018-06-20 13:18:12', '2019-06-20 13:18:12'),
('5a4e30bbc92cb6db79e4145ea344c92f1af482619da80be5230d5a45004690f65af9fb5c2da381a9', 41, 3, 'api_token', '[]', 0, '2018-06-22 22:52:59', '2018-06-22 22:52:59', '2019-06-22 22:52:59'),
('f7fd2db642afae897e10750ae9f8de05b9c089b7959326df59f6aace1f90f8c61a3aab27866f3b70', 41, 3, 'api_token', '[]', 0, '2018-06-26 04:18:40', '2018-06-26 04:18:40', '2019-06-26 04:18:40'),
('2d39c29c9a84ebb21c9b271daa02f5152a6ff1d73562b4c58644bdcd0b3f54ef0d17d239d1956743', 41, 3, 'api_token', '[]', 0, '2018-06-26 05:41:25', '2018-06-26 05:41:25', '2019-06-26 05:41:25'),
('12566313f26a5bb5c8ebdee2637aafaa1a90bc93b02073db716567563e242a9ae0bf6aa058a84c0a', 41, 3, 'api_token', '[]', 0, '2018-06-27 12:11:56', '2018-06-27 12:11:56', '2019-06-27 12:11:56'),
('0e3c629124555e2e422c286cfbfbf1b2ea37b1797e799c347d1d04bb83bf9380f35fc1869f12462d', 41, 3, 'api_token', '[]', 0, '2018-06-28 03:43:33', '2018-06-28 03:43:33', '2019-06-28 03:43:33'),
('923c318aa9b83d4c1a7e588dd379192b74fa640b49414a68f1899c0c6d58ba10071f17bdda6fd096', 41, 3, 'api_token', '[]', 0, '2018-06-28 03:47:07', '2018-06-28 03:47:07', '2019-06-28 03:47:07'),
('705590e0153f258395a6da6427305988d9ec48214c90293689b32e0f3849420a4d20f906d068bfba', 41, 3, 'api_token', '[]', 0, '2018-06-28 12:46:41', '2018-06-28 12:46:41', '2019-06-28 12:46:41'),
('d8bd8f79139447abf60df2efbff98c56ea28790f1c720ccbba9400f327f6c3297f2e0534bc06af01', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:12:27', '2018-06-28 13:12:27', '2019-06-28 13:12:27'),
('b9dfd08d4140f42d48ecc5c3571e111ad91dce6d18398746589359c6c8a0ea28f1a5a1fe6e788cc3', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:34:10', '2018-06-28 13:34:10', '2019-06-28 13:34:10'),
('9532765e9f1f447b59782e39e07b2203a3bbe0b3511d824c9de06d683c3470ff6a40f14163862235', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:34:40', '2018-06-28 13:34:40', '2019-06-28 13:34:40'),
('14cd8f8d1c26caf54431867ede7cb44d675c2b144d7acad0ca2346d2bb016f817ddb4978e4edc815', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:36:30', '2018-06-28 13:36:30', '2019-06-28 13:36:30'),
('cd64ce7fa8916ff32c79a9e078e456b179d165591912fb5229246745b22eac99f4585d8d8550014b', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:40:37', '2018-06-28 13:40:37', '2019-06-28 13:40:37'),
('4dc22324297cc1d41d49b634410a1e12b9710d0e13af21fa229f691c6c957151dc0c7136b0fffb5c', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:42:12', '2018-06-28 13:42:12', '2019-06-28 13:42:12'),
('84d0a587eceb2efb82f8e5ade83103dbdb1a7244e117ac8b9543d84d3ae359aae9c1f86a8d3f6200', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:44:25', '2018-06-28 13:44:25', '2019-06-28 13:44:25'),
('3695fe60d07b1d0c10542bda07752cf2b3f070a3353fa134917b9d998a7b1523bc46052153655214', 41, 3, 'api_token', '[]', 0, '2018-06-28 13:45:44', '2018-06-28 13:45:44', '2019-06-28 13:45:44'),
('b5f2be19991a3ead8532b374a8ba2be7f3e9dd2f8044565740168c92aead35534249793bbf0bd64c', 41, 3, 'api_token', '[]', 0, '2018-06-28 14:04:45', '2018-06-28 14:04:45', '2019-06-28 14:04:45'),
('fc4b2d75512f359b8e5ae78adcfc7fa5c50b64c4edd912ecd585b42871aa225e3e13f7fbb011277b', 41, 3, 'api_token', '[]', 0, '2018-06-28 14:06:59', '2018-06-28 14:06:59', '2019-06-28 14:06:59'),
('b6f0a2fb9b0b460b0ea7b266e70df8200baf073790d8d906fbbb149cb8c1d09fa7fc5223c18de0ab', 41, 3, 'api_token', '[]', 0, '2018-06-28 14:07:08', '2018-06-28 14:07:08', '2019-06-28 14:07:08'),
('3f3539b8f97d8bf969178098d25d7b4301d08e53c070ae9d2d54e5c9221b93e6f7baac963f0cb02a', 41, 3, 'api_token', '[]', 0, '2018-06-28 14:12:07', '2018-06-28 14:12:07', '2019-06-28 14:12:07'),
('d100ff8bb6b813ed9193743a8c1e6186978dd06cb1c40510927c308838f0f4fcfb8809dad563beeb', 41, 3, 'api_token', '[]', 0, '2018-06-28 14:13:04', '2018-06-28 14:13:04', '2019-06-28 14:13:04'),
('9efa1e2bcee85fd3028adbb3564c750aeb9c30e13c883d7b0f838bfb4f468fdfa9381d948bbeef2b', 41, 3, 'api_token', '[]', 0, '2018-06-30 05:45:22', '2018-06-30 05:45:22', '2019-06-30 05:45:22'),
('8155ff552970f0d6e0ad44c02b92cf20b902a894a36020ab014feaf79d95db183e67934884c184da', 41, 3, 'api_token', '[]', 0, '2018-06-30 06:08:09', '2018-06-30 06:08:09', '2019-06-30 06:08:09'),
('010a1d83bd4231f4c60c0b6e8eaaa70bbf67020c7bbbaa529da91f5cab6794d31b463cf8a11b6d56', 41, 3, 'api_token', '[]', 0, '2018-06-30 07:05:05', '2018-06-30 07:05:05', '2019-06-30 07:05:05'),
('44c97eceb5c390a8ad6fa4f13c9814717eb2792fb48ec40697fa61b50fe084d78ebe77e89f6d0387', 41, 3, 'api_token', '[]', 0, '2018-06-30 07:09:28', '2018-06-30 07:09:28', '2019-06-30 07:09:28'),
('13f23a494003640a78c70094d09ffc7d5713d3e8fa975e2ebdc48c1088b744d0850e7675057a9b46', 41, 3, 'api_token', '[]', 0, '2018-06-30 19:35:24', '2018-06-30 19:35:24', '2019-06-30 19:35:24'),
('bc5a454a63b49428698886a2e9d9e6c0e982b4431021a2195dd9e3a01d7144d2fe03196d9480e29e', 41, 3, 'api_token', '[]', 0, '2018-07-04 19:54:45', '2018-07-04 19:54:45', '2019-07-04 19:54:45'),
('866a7970e50f04809cfa3ff9be4ee0a3fcb1b4b4d64a4740b94392b3e65a634d4d5c8d6055dac96d', 41, 3, 'api_token', '[]', 0, '2018-07-07 05:40:16', '2018-07-07 05:40:16', '2019-07-07 05:40:16'),
('463074da1f9c4108c734ae2d1fb76b120c5a30567263e945bd9ee7c4ea2558ea5e30041caf583ae1', 41, 3, 'api_token', '[]', 0, '2018-07-07 06:26:34', '2018-07-07 06:26:34', '2019-07-07 06:26:34'),
('6d3999e6a79368f53d4a5a754d49ea7785684d7fb2f4d332df6e9f8c5ee0c80065536b34283f3675', 41, 3, 'api_token', '[]', 0, '2018-07-07 06:29:53', '2018-07-07 06:29:53', '2019-07-07 06:29:53'),
('9e509c0d86790be80b51795577f04ff9c6e07e857a7c1e4f2d9b6462058ffd891da5fe119a049c48', 41, 3, 'api_token', '[]', 0, '2018-07-07 06:31:31', '2018-07-07 06:31:31', '2019-07-07 06:31:31'),
('ef414931520fd0aa23282547f03a265a4a738714f731af9fe95e4bf9151d4abf686806a81212c20a', 41, 3, 'api_token', '[]', 0, '2018-07-07 06:36:04', '2018-07-07 06:36:04', '2019-07-07 06:36:04'),
('4ddab6acd95813f99769df11cedec011911f23819ac57467334557ac3938a0c93e401fa3caa62873', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:14:07', '2018-07-07 07:14:07', '2019-07-07 07:14:07'),
('19380d72997fc5c54aa800759c9d42eba9ab59285e8e9d89e5d97837c14684c901b6ce8b5bb37d36', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:16:04', '2018-07-07 07:16:04', '2019-07-07 07:16:04'),
('fc1b5e3d32a275c1819a35640cbcc8ab4e61d5e4f578407d41c3310222397e7f66f086403069b161', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:16:17', '2018-07-07 07:16:17', '2019-07-07 07:16:17'),
('5e36f1622015240f7da336857ef9d259625c500a1d355d1e5a81b85d7e81e072bd27f5b2127bc271', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:20:24', '2018-07-07 07:20:24', '2019-07-07 07:20:24'),
('f9976462f447b61c09834d19144b039b3ae32d6a47ea1f1fcdac477dba2e0f899d07ca59dbee4287', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:23:29', '2018-07-07 07:23:29', '2019-07-07 07:23:29'),
('8b91e7701fd486a531e962f6876b89f1c57ca5f29f555041b6d94466265eb9a7f727eed71f21fec2', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:28:29', '2018-07-07 07:28:29', '2019-07-07 07:28:29'),
('60dc9ae910b3d8f68877e7e78ae871c65010aa2c5cf63911b5987fdafaec6f9b2ac9201da79a7044', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:31:33', '2018-07-07 07:31:33', '2019-07-07 07:31:33'),
('d4dff30098d3326756e2d07763b00b6215aee250a9510a155e72447e945dc2389808f16e9674e52d', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:32:25', '2018-07-07 07:32:25', '2019-07-07 07:32:25'),
('ca8a79cb43f3b1a3cf9fbe8c9ee3da4a3551b5b3b1630fd57dbf1f876f4cc29c495c7126b89c8882', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:38:46', '2018-07-07 07:38:46', '2019-07-07 07:38:46'),
('2beb19b9c4ed178de5c50765def9d348f4074b2b7d88175ccafe03ddbbba4e35f0738c9ea924a080', 41, 3, 'api_token', '[]', 0, '2018-07-07 07:40:58', '2018-07-07 07:40:58', '2019-07-07 07:40:58'),
('6cd9803cd992c8aa5189632e447cb780600e83f5cd7e2127bb547f43425125c2bc28ba0923935ab6', 41, 3, 'api_token', '[]', 0, '2018-07-07 08:21:43', '2018-07-07 08:21:43', '2019-07-07 08:21:43'),
('cdf63ba7b1f42f441799722369ccf08f2074304826685dbd98621c891b7e7a5b579fb383fd6aa708', 41, 3, 'api_token', '[]', 0, '2018-07-07 08:26:20', '2018-07-07 08:26:20', '2019-07-07 08:26:20'),
('9de039712e24448f1aabf13e98e707a858344a62468849676aaf157c3573e5e0ed592e6dc376c8ec', 41, 3, 'api_token', '[]', 0, '2018-07-07 08:30:25', '2018-07-07 08:30:25', '2019-07-07 08:30:25'),
('748c1d29101796e4aeb9a6e39b75b030262b0f0fe2750eebb9bb6d0921efb5a12d6c22ad4423609c', 41, 3, 'api_token', '[]', 0, '2018-07-07 12:53:16', '2018-07-07 12:53:16', '2019-07-07 12:53:16'),
('bcf612b0d096c136bade6f7a044b9e462888f03f44cd9c15d6d454a1ff4f93c31ac8cd724f67a39d', 41, 3, 'api_token', '[]', 0, '2018-07-07 18:56:39', '2018-07-07 18:56:39', '2019-07-07 18:56:39'),
('81589c85f0d99ae37541fa0bb078829e74d48c6af48d9d9e06f5a679ce578eaf11819e42ef5e5253', 41, 3, 'api_token', '[]', 0, '2018-07-07 18:58:16', '2018-07-07 18:58:16', '2019-07-07 18:58:16'),
('36e06e178ce9dc69e2a3a3773edb4f55635dd9778e2b0d3a06633dcf854473e61ac4c680bff83f6f', 41, 3, 'api_token', '[]', 0, '2018-07-07 18:59:04', '2018-07-07 18:59:04', '2019-07-07 18:59:04'),
('9157122c7e7f7019f5dd9e8026851d0de826e90304bbb90772cdae8f326f54bdc66b327e3b88f878', 41, 3, 'api_token', '[]', 0, '2018-07-07 18:59:54', '2018-07-07 18:59:54', '2019-07-07 18:59:54'),
('6f946712f2d787ac1585c39d0d227be5d05269b0d8959c732b3f0b6d9eef78d1726665ee1f6cd5ac', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:04:35', '2018-07-07 19:04:35', '2019-07-07 19:04:35'),
('1d412fb91c8ae41e42ab2f25df499f510066edb9bbf4476e9a9186d5801db21eb9999f6a903dc00d', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:04:45', '2018-07-07 19:04:45', '2019-07-07 19:04:45'),
('8d17798bb1f8a710bf6c745f7135b3eebc4e5e9284ecd9fe23d19572c204ad37d77091f6f15edbbe', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:05:51', '2018-07-07 19:05:51', '2019-07-07 19:05:51'),
('29972df4e5f58d6c3b18e1b54179bb8b415b899d48bacc92fd2ae3b72c9fd6d80ae789133d78b929', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:35:30', '2018-07-07 19:35:30', '2019-07-07 19:35:30'),
('0f3feabe481cbf87d4e0bdc7b193a1a67f834f269e1d988ad357309b7ef9ad9b680768ea6722d78f', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:37:08', '2018-07-07 19:37:08', '2019-07-07 19:37:08'),
('e28d20c825bb324d3be6bc5eedf54d67d647449583a17fec99ec3c40a5b8b35b1840f6e6ad12c1eb', 41, 3, 'api_token', '[]', 0, '2018-07-07 19:39:03', '2018-07-07 19:39:03', '2019-07-07 19:39:03'),
('13c2f68e75bf3e682107eb7ab1d835fefdf377adc74399dc1e008ee0878d71958d947b3394adc89f', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:09:32', '2018-07-07 20:09:32', '2019-07-07 20:09:32'),
('2d6f7fb443630e1e7a3e9e2b26576f75440a6d26223f382c75cebeda00e4a66efbf02efa7fbb8e6f', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:15:32', '2018-07-07 20:15:32', '2019-07-07 20:15:32'),
('31b7aa5dd97a075adc7bb32fd40f21e895580474c5878066733311882579f57a6baff93fde5d7f92', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:23:52', '2018-07-07 20:23:52', '2019-07-07 20:23:52'),
('a4c05e1e788229935fcdcb71d5106b70386b2b25ebb201da181aee050547cffd1c720e8bf39f9990', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:26:15', '2018-07-07 20:26:15', '2019-07-07 20:26:15'),
('6e96cc64b460ca136127daad0aadfe960fc3bface990b7d5c6b4482a6f8e53071cff228da4b659b1', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:31:18', '2018-07-07 20:31:18', '2019-07-07 20:31:18'),
('f53945e76dc050c2db6e45ffee94dc9d1f8aabfac079fb88aa4388ed0f476973998597b1c9715c8d', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:35:17', '2018-07-07 20:35:17', '2019-07-07 20:35:17'),
('ae87895661aa1fe30cc758b1d75f0859b047d59cf63229791149f635baee7cad23399a08a3f6ff94', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:40:59', '2018-07-07 20:40:59', '2019-07-07 20:40:59'),
('56a418371da31dfa625f545e8a9dab3c4329bd7a8dde93df541241fee543c1e3276fb469bf54bbfc', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:44:55', '2018-07-07 20:44:55', '2019-07-07 20:44:55'),
('4b4e31a09932b60627e0b5234ee91c1a4020c4e63525e390e581483b6809207a54a3126707cca22e', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:46:46', '2018-07-07 20:46:46', '2019-07-07 20:46:46'),
('7e9b83b3eed6e9be10172b4b281a031f1bf88645bfd94eccc917461476222aa0ca5457ccd0a4eeb2', 41, 3, 'api_token', '[]', 0, '2018-07-07 20:48:05', '2018-07-07 20:48:05', '2019-07-07 20:48:05'),
('3c1a049784ca4a0718129230364996b4513695e475227d990508c4727211407e6664bb54126bc8f9', 41, 3, 'api_token', '[]', 0, '2018-07-07 21:20:41', '2018-07-07 21:20:41', '2019-07-07 21:20:41'),
('bfb557281ae8d5ead738ee5e0332d95e13decca0230deef5f5939d66b72bd283f8726cb2c54317d8', 41, 3, 'api_token', '[]', 0, '2018-07-08 04:53:36', '2018-07-08 04:53:36', '2019-07-08 04:53:36'),
('854799f328cf7b0ed12270e99e7e5574085499e8670f9cd28188f4d5f9c91fdb10883d466737042e', 41, 3, 'api_token', '[]', 0, '2018-07-08 04:56:26', '2018-07-08 04:56:26', '2019-07-08 04:56:26'),
('de8e5f560e2b011629bbd61352711d95bc0fb62e09271483b972a4fe57271b4d0d902419839b94c5', 41, 3, 'api_token', '[]', 0, '2018-07-08 04:59:26', '2018-07-08 04:59:26', '2019-07-08 04:59:26'),
('6882c407c06ebcac5d65f4c3454dc2ddc9c773a93b8e8b6001045d5e5a2b0fa492bed1a6d40aeceb', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:03:16', '2018-07-08 05:03:16', '2019-07-08 05:03:16'),
('18b0f244424d1e210f1cd8735f89bcc061e99551920c4c4c5d523f0a6d9bc0e99f35cffa00e8ce65', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:15:25', '2018-07-08 05:15:25', '2019-07-08 05:15:25'),
('e06173b234f598838b0e2f0842f12377f7de625981b2577f46d7a3c49660a61dc2a9a03463fee943', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:20:26', '2018-07-08 05:20:26', '2019-07-08 05:20:26'),
('3ea645f6bc005e5545a3a590182a6cd8029f7738efd6db2a1f4fd5145bba5aef7f2db22f7825c09e', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:22:15', '2018-07-08 05:22:15', '2019-07-08 05:22:15'),
('72eea70ed8f41322733465f34da7e6b6115ab26221780e9545957caec8172734ce9064342b35f77c', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:24:09', '2018-07-08 05:24:09', '2019-07-08 05:24:09'),
('3a9f91ac3925c3bd91fd45688aa3d9b28878c2517adcc77a29ab502a73bfe7bcaba19afa6e3e2215', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:25:25', '2018-07-08 05:25:25', '2019-07-08 05:25:25'),
('0fc54c9bd6d4dde68648ec701896de91d5bbdb52e168fb085540edef8a4e77cfce029cea5e7f3f1d', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:27:10', '2018-07-08 05:27:10', '2019-07-08 05:27:10'),
('2030c8e86ec98dba983b0b8141abc166d8561a4f91e0cdef3b425b94d4455d9949083dfbc98809ff', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:28:34', '2018-07-08 05:28:34', '2019-07-08 05:28:34'),
('f113f1222b8ac719d1e4cb18bdcef6c7750d8d2b2742c6c0738c22b4e0bf0cba44943ecb4536c110', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:30:06', '2018-07-08 05:30:06', '2019-07-08 05:30:06'),
('58485d7099127bde34d9c08b3e77ebd472beb4dff3e625af27f3d1db9ca01d98b1290fca6e373f71', 41, 3, 'api_token', '[]', 0, '2018-07-08 05:32:01', '2018-07-08 05:32:01', '2019-07-08 05:32:01'),
('eb0faebbff1745d0ee0922babe83d89e72d04e63f786be4b4f3ed153e29f466c8477ef36401a99d6', 41, 3, 'api_token', '[]', 0, '2018-07-08 07:33:58', '2018-07-08 07:33:58', '2019-07-08 07:33:58'),
('784e01858b1a705ed911ed0a6b150d4bb956c83314cfde3ab6d0b2fba301c95583b02fd7dbda1a43', 41, 3, 'api_token', '[]', 0, '2018-07-08 13:44:29', '2018-07-08 13:44:29', '2019-07-08 13:44:29'),
('cbbc88efecb8f41081f3e35047ac971124b78712d544feae8d755ba39451e1c66483153e921e04eb', 41, 3, 'api_token', '[]', 0, '2018-07-09 15:22:44', '2018-07-09 15:22:44', '2019-07-09 15:22:44'),
('7552172fb9e8d8a5c6907164b6acb40416d9de29f169b149c4f07a3aedc5b91483883b1d4f434ed3', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:20:14', '2018-07-09 20:20:14', '2019-07-09 20:20:14'),
('d1b18b64ef7d2459319bb84d0edb985617a7463a99a359ae12698291b1694016ee8f11c7ba1f030b', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:41:09', '2018-07-09 20:41:09', '2019-07-09 20:41:09'),
('5710504eac2c44e4e618e9a250cab5155a2bc7d475abb5d7635fc36a9b969344a8eef49f6f4df348', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:41:27', '2018-07-09 20:41:27', '2019-07-09 20:41:27'),
('d7ac32c0db013f10f3be5430ea25a520101dd56d26849ce311ce1f843e404f29ec8d097d59b09b77', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:44:29', '2018-07-09 20:44:29', '2019-07-09 20:44:29'),
('91599f44c586d775facf6abe6ad41f888abf3b5b7e6577d9167f84447c4ad5e6c76bce826d9e70fa', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:44:40', '2018-07-09 20:44:40', '2019-07-09 20:44:40'),
('a5a85e2974bb3b07144213253933dabf81d2a1704591fa58771ac478176c0a6d2cc6dce164abbc99', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:44:50', '2018-07-09 20:44:50', '2019-07-09 20:44:50'),
('4ff1e5d02f83f0d6e6cb2b8321b409b6038b31699b10c6adde75f42fb31205f990f90659ab77ce94', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:47:35', '2018-07-09 20:47:35', '2019-07-09 20:47:35'),
('fbd5c8eb5572e5d4e5f945aadcb7f15f011d99d9dfc0bb5a4b45cab51ead43de61053e5e4a01f0ef', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:47:55', '2018-07-09 20:47:55', '2019-07-09 20:47:55'),
('7cd1132a71d6f77f90bd3ac255dc553d6210bf0d3e491da572f9fc1e91fbcc74d9ed32d64349f206', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:49:33', '2018-07-09 20:49:33', '2019-07-09 20:49:33'),
('6bef9545c5804297e8199cf74e3429fd2c920a188d0db094b0c05ada42708da828e059f2999f9e69', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:50:28', '2018-07-09 20:50:28', '2019-07-09 20:50:28'),
('e0d1c96acd6a84d927f2d3a597041b3f6d3195628e75ada53cff69e2159ac947a9921481c808f021', 41, 3, 'api_token', '[]', 0, '2018-07-09 20:54:51', '2018-07-09 20:54:51', '2019-07-09 20:54:51'),
('a78fe94f858b9762f7e863fe5e71f1157c4533468f06600733fee8108f855f835d328719a8ee2b86', 41, 3, 'api_token', '[]', 0, '2018-07-09 21:02:16', '2018-07-09 21:02:16', '2019-07-09 21:02:16'),
('1edab88d33917e5dd76d4ca2f8cb9fb4902fccb575ea1bbfcb8e08c21379090a5aac1b82e3936ab2', 41, 3, 'api_token', '[]', 0, '2018-07-10 07:10:09', '2018-07-10 07:10:09', '2019-07-10 07:10:09'),
('abb23efa53d34bb2031ec8fe2c480a8cf0a7d2c8e29946b8fd35e8fda54f65e448bd009298739331', 41, 3, 'api_token', '[]', 0, '2018-07-10 10:01:58', '2018-07-10 10:01:58', '2019-07-10 10:01:58'),
('2cc842536cb8b8c751d9a19171a35c0b48d54e3c332d809540864adc1ed4330f5bd02113b9d45957', 41, 3, 'api_token', '[]', 0, '2018-07-10 10:17:55', '2018-07-10 10:17:55', '2019-07-10 10:17:55'),
('0fce6587c9b3d579b780f957a0a28214644a387f9690d7a30a0717779ed781e5395bc1a4f0f6103e', 41, 3, 'api_token', '[]', 0, '2018-07-10 10:48:11', '2018-07-10 10:48:11', '2019-07-10 10:48:11'),
('a483c90b8cb152e09e4d1226667ff1d4192df46d0767decb10dddf3445bf94daac8ad4630ac245d5', 53, 3, 'api_token', '[]', 0, '2018-07-10 13:49:52', '2018-07-10 13:49:52', '2019-07-10 13:49:52'),
('d4816057faf21d1d485d13a144ca88eaf0bb21aa84c7f39a98642c371b1ce442898ae0815911cf0f', 53, 3, 'api_token', '[]', 0, '2018-07-10 14:45:31', '2018-07-10 14:45:31', '2019-07-10 14:45:31'),
('7fbc4a80ff706e5d6793711db1cbd4fb6f94eec1945ed1d0ccbb7411a0b71e5d880f9bc6a12a56b0', 53, 3, 'api_token', '[]', 0, '2018-07-10 14:53:22', '2018-07-10 14:53:22', '2019-07-10 14:53:22'),
('fc3e2afa31e44293afe46ccceb98e46952b4b368573a4ce6545dd5adb9b927a2c060980fc6ccdb77', 54, 3, 'api_token', '[]', 0, '2018-07-10 18:03:01', '2018-07-10 18:03:01', '2019-07-10 18:03:01'),
('77a33356c608926585e0327d2916a109678decb0b89913f8ade01029fb9b18f2c00b3fe334fa7c50', 54, 3, 'api_token', '[]', 0, '2018-07-10 20:50:36', '2018-07-10 20:50:36', '2019-07-10 20:50:36'),
('33aa7f2703dca27fee877c51df9b2431b0ab3b6c3ca12feb25cba51fd24abec1a723ff99ff774ccb', 54, 3, 'api_token', '[]', 0, '2018-07-10 20:53:26', '2018-07-10 20:53:26', '2019-07-10 20:53:26'),
('88d8e3f2465fd3bdff7c0878baf0c3119bb9f2ea906d08e7bda058579f742aed68c73d1e64347a20', 54, 3, 'api_token', '[]', 0, '2018-07-10 20:56:01', '2018-07-10 20:56:01', '2019-07-10 20:56:01'),
('34a21296e8958657aada9ab3b6d77f44b2016eb7dc3b11709e3751c369fc7c17993335fef24b599e', 54, 3, 'api_token', '[]', 0, '2018-07-10 20:58:53', '2018-07-10 20:58:53', '2019-07-10 20:58:53'),
('1a4a1792acf9ee959ce0d50e30cafde788b06a5e143bcda41475dfd1cc46e08f476a9812d437aab3', 54, 3, 'api_token', '[]', 0, '2018-07-10 21:14:35', '2018-07-10 21:14:35', '2019-07-10 21:14:35'),
('ae38e1d6abfb3cb77cf3dc3c1e79a8c3d2b619216d1a0f504a41136a101a110f3f9463c6aee27a41', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:33:17', '2018-07-10 23:33:17', '2019-07-10 23:33:17'),
('2969d1173012d45889f214cd8f9256833c4523a605a0a3e749c90fb1f1c6c18d87c3f789110a4156', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:35:05', '2018-07-10 23:35:05', '2019-07-10 23:35:05'),
('f8a26da7527b9e925a383721af7d03c6538cfe7f377a18410b6f04cd1c7539c8e7e83d4e7158933c', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:35:50', '2018-07-10 23:35:50', '2019-07-10 23:35:50'),
('0bd497a94f6792a7d7a27c75cadd3d64f366c712bd05413fa33bc82769061cbc6036d8e85c77f2ed', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:37:15', '2018-07-10 23:37:15', '2019-07-10 23:37:15'),
('38c03981c12430a23d14644a1e207c195ac61a553e545073c306a4379b2a74fd38973cb063e06826', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:41:54', '2018-07-10 23:41:54', '2019-07-10 23:41:54'),
('606f96bfde9986eb2b08c4802b6a33a60a0c09b5865a262d2c973ccc9c51b8c0a534ea7fefeca344', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:42:49', '2018-07-10 23:42:49', '2019-07-10 23:42:49'),
('78c992b25908942de990892a54fe399ae34db590c292f22c70f203a47283a929d794da6b2cb7c88e', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:47:04', '2018-07-10 23:47:04', '2019-07-10 23:47:04'),
('9e6c971962fdc6544612a23c12dab5c6dcf88e865c5f0c319211ff9c58cd4819d73e896920703bef', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:48:56', '2018-07-10 23:48:56', '2019-07-10 23:48:56'),
('ba97ddc8dc1cd2529db0927ccd5f122164f0709adfdfa85d851a3006cebc7ba1a807be43403fa14e', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:49:50', '2018-07-10 23:49:50', '2019-07-10 23:49:50'),
('860ec4f681c729d33636967827233749d0c3e4cb87e3771bf2c58b21dc91abc8cda22ed996b8f13c', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:53:14', '2018-07-10 23:53:14', '2019-07-10 23:53:14'),
('cc373d414f90e3c35094e2c952214c1b400097faf465c9c0a2df1f2c22ba18938bebdb8fc6b6da63', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:56:44', '2018-07-10 23:56:44', '2019-07-10 23:56:44'),
('7d18cd4b954c7d5f6093adbc44bcc3fe57803bf623e7371dc738b8cd2d0547dcf19684d4a5e9230c', 54, 3, 'api_token', '[]', 0, '2018-07-10 23:59:47', '2018-07-10 23:59:47', '2019-07-10 23:59:47'),
('83606dac26589303c7930cd4937db5603a24445fac186ecafd8062b760d700df3c1f9e1c18a008e0', 54, 3, 'api_token', '[]', 0, '2018-07-11 00:01:28', '2018-07-11 00:01:28', '2019-07-11 00:01:28'),
('87a3b9c45a3a5fc7a668b1d28b7bf271a9d23fc4eabaf88d6301f7a3f2ba00f3653dd313917f1f60', 54, 3, 'api_token', '[]', 0, '2018-07-11 00:04:12', '2018-07-11 00:04:12', '2019-07-11 00:04:12'),
('3c7ca6eb3e2abc4582bfedc0e2abea361c5f8536e3999a95fb8377be673a46201c5fd59e1b83e3e3', 53, 3, 'api_token', '[]', 0, '2018-07-11 13:31:32', '2018-07-11 13:31:32', '2019-07-11 13:31:32'),
('6cfa070dc766e2c6e18676df8aa1b3066390a79de5a696e38f7d9c378a219e3423ca4833d7d1d664', 56, 3, 'api_token', '[]', 0, '2018-07-12 09:56:50', '2018-07-12 09:56:50', '2019-07-12 09:56:50'),
('6778c9d2f78bf98b968761a8fbcd88607e327c9655ee83f897f80b34efd504be2b4524437f666367', 55, 3, 'api_token', '[]', 0, '2018-07-12 09:57:59', '2018-07-12 09:57:59', '2019-07-12 09:57:59'),
('14274e22c8ee8f94733519c0898f7d43e1b19bbec7db587ad3cf55c827f011f6bd00cad498d2bc30', 57, 3, 'api_token', '[]', 0, '2018-07-14 17:20:15', '2018-07-14 17:20:15', '2019-07-14 17:20:15'),
('a2a5222a0228906aca0e24cdada6706e9ca20e2e578d577f989a99c0b33a86ea2ae9a9c38cd38097', 57, 3, 'api_token', '[]', 0, '2018-07-14 18:12:17', '2018-07-14 18:12:17', '2019-07-14 18:12:17'),
('175541962f99431a75def07b0c3ccadd8b6cf7bf829fb7147b4a10fe3cd348439d14c94934d1091f', 55, 3, 'api_token', '[]', 0, '2018-07-15 08:40:41', '2018-07-15 08:40:41', '2019-07-15 08:40:41'),
('45ed0a9d85274b668293a1177e1a763b02a58afd76f2a67ea5852a37d4d9bb3c779b10165a6fa592', 55, 3, 'api_token', '[]', 0, '2018-07-15 08:55:34', '2018-07-15 08:55:34', '2019-07-15 08:55:34'),
('f89e2019af488d4e09cbe05481e69fa0a6d8f14596b8677b9384b12d2b41c6c9c70c5515f9780b87', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:04:50', '2018-07-15 09:04:50', '2019-07-15 09:04:50'),
('e5e8d069f6fd7868c36cec8d41f41e843c407751c923d7aa2761c7ee1d973ac10021943d78fcb667', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:07:19', '2018-07-15 09:07:19', '2019-07-15 09:07:19'),
('2b292c060b81b9224c200f342daa77d1b5430d52555affc8e5c1ab49b69767a930f8ae1ee02188b7', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:08:55', '2018-07-15 09:08:55', '2019-07-15 09:08:55'),
('f1bd147ba1e1ac9f611f86a0557a850cdca51a8404d206e62a5d77d6d51d2b8194d91c41869e2deb', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:09:51', '2018-07-15 09:09:51', '2019-07-15 09:09:51'),
('6bbcf28e587640077ca9f3af1fd40f25f3da7dfa1f59a803f774d76af6595f3c5bd2c118828e1cc3', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:11:23', '2018-07-15 09:11:23', '2019-07-15 09:11:23'),
('0b74151f494406fffe1f8c8aed9e025cc687376c50c2b17ed8829f380fc0dca0e97ebc6ad477adaa', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:12:28', '2018-07-15 09:12:28', '2019-07-15 09:12:28'),
('3f87863950306687500786cf7b72a1151b8248d457dff7116a08d6b37f833e9b368568a3eb722eb1', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:18:11', '2018-07-15 09:18:11', '2019-07-15 09:18:11'),
('7685a5cf07b6650789c7d7d514a475211a93748beff2dabe3a6f3625fe46ed80acf73de1c240de96', 55, 3, 'api_token', '[]', 0, '2018-07-15 09:47:18', '2018-07-15 09:47:18', '2019-07-15 09:47:18'),
('2a6a8d50d69d7aac5090cabc803f86c04a3146701344a29068875831615940eee26a83d55be76115', 55, 3, 'api_token', '[]', 0, '2018-07-15 12:02:38', '2018-07-15 12:02:38', '2019-07-15 12:02:38'),
('bfe3da7e88f9dfa5965698669413dd55fd730e46038a3db48c787e58d7b99cc41348327ed6e4f7b0', 53, 3, 'api_token', '[]', 0, '2018-07-16 08:01:04', '2018-07-16 08:01:04', '2019-07-16 08:01:04'),
('7262a8a2a12177552060763d4906ce88a44d335b2c217eed815ba50a40d508ad6ce1073aea833748', 55, 3, 'api_token', '[]', 0, '2018-07-16 14:46:42', '2018-07-16 14:46:42', '2019-07-16 14:46:42'),
('cc749e448e31c01ff7849283ef3eccdb45c39316b07b6fcd9e09d1f80ba59ba994bf091ac684efb3', 49, 3, 'api_token', '[]', 0, '2018-07-17 06:21:07', '2018-07-17 06:21:07', '2019-07-17 06:21:07'),
('7a9c64b7e377fabf478723b1b5db1580b47dd6a3149ce407797c0c23906178e8066a5f5c462783fa', 57, 3, 'api_token', '[]', 0, '2018-07-17 19:17:28', '2018-07-17 19:17:28', '2019-07-17 19:17:28'),
('19133628b3c59e2f10100bebfe310b385a8d92d0594959766bfb676507b18a78e7fdcf2147c36c3d', 57, 3, 'api_token', '[]', 0, '2018-07-17 22:41:42', '2018-07-17 22:41:42', '2019-07-17 22:41:42'),
('7109024aeb91267c96137bfebb107b7d2fe00a11d533abc9d211ad592ea46d8bb0fd64e7f5bde7c7', 55, 3, 'api_token', '[]', 0, '2018-07-18 06:54:20', '2018-07-18 06:54:20', '2019-07-18 06:54:20'),
('d34e6307e8950f2e05c07d3005cb933189346b395c61237067e5bad5b8681b6a1a95bd8e03adf866', 55, 3, 'api_token', '[]', 0, '2018-07-18 07:02:37', '2018-07-18 07:02:37', '2019-07-18 07:02:37'),
('c4e5d75ccebcea69020f227e764a726cd1fe84c70aae6d9837cbbb7da8fcb2b4a1f1f8e38a32eee9', 55, 3, 'api_token', '[]', 0, '2018-07-18 07:04:00', '2018-07-18 07:04:00', '2019-07-18 07:04:00'),
('71abcda5b0e5bb842c908764e4905bc2675818cb397a06b326c9c77403d12e5ae4a8fda28dd8f89a', 55, 3, 'api_token', '[]', 0, '2018-07-18 07:07:37', '2018-07-18 07:07:37', '2019-07-18 07:07:37'),
('d69a1f9d25964105776b0de2b7b26ff92365a1c34d19e8e42fa0b33645f2442526493df631b82d04', 55, 3, 'api_token', '[]', 0, '2018-07-18 09:54:43', '2018-07-18 09:54:43', '2019-07-18 09:54:43'),
('6c88523b80665eabaa826f8539c1f711896f6dccb1a1bef1c15c3361c23c2ff6c4eb257306f71bb5', 55, 3, 'api_token', '[]', 0, '2018-07-18 11:27:28', '2018-07-18 11:27:28', '2019-07-18 11:27:28'),
('bd815a193f08f9b9f29456be735e8f609831adacd12d5d828c1022ba780b40250b8567dc593e2ee5', 55, 3, 'api_token', '[]', 0, '2018-07-18 12:03:51', '2018-07-18 12:03:51', '2019-07-18 12:03:51'),
('afdbdcad3d9bbe38f12e70c5e6c8ac4fcf37d5ffd5aeaa220e11205f4ca24ea6508a5c5f8d0b9cb1', 49, 3, 'api_token', '[]', 0, '2018-07-18 12:04:00', '2018-07-18 12:04:00', '2019-07-18 12:04:00'),
('2504aab07265377d18ed0de281867c6dc1dc1051734e1b2bb207d6a7f997c8de16ac6d9f86ca06c7', 55, 3, 'api_token', '[]', 0, '2018-07-18 14:25:42', '2018-07-18 14:25:42', '2019-07-18 14:25:42'),
('55c0e9f0be995137b413bd120eb28b6cc29ad320c6bb08580e1a5ce77ce9ef601bc4bba362b9fb53', 55, 3, 'api_token', '[]', 0, '2018-07-18 14:27:29', '2018-07-18 14:27:29', '2019-07-18 14:27:29'),
('f20b75c3b38d175f51ffc2c0ff2210fffbd4773f7827f08028e60fc3b885548ba938edd1933e17b3', 57, 3, 'api_token', '[]', 0, '2018-07-18 18:26:20', '2018-07-18 18:26:20', '2019-07-18 18:26:20'),
('999cc459c698135a3e2a1962a87326e81b9d9529c240032070cecf08876760c0c901313d90e70f5e', 57, 3, 'api_token', '[]', 0, '2018-07-18 18:26:55', '2018-07-18 18:26:55', '2019-07-18 18:26:55'),
('8ee639d7f6a4a01385f896c4c6e01bd7c047f2a81accc78ae2a7bbaeccaa423bd9c47f3eb1e769cb', 49, 3, 'api_token', '[]', 0, '2018-07-19 09:36:22', '2018-07-19 09:36:22', '2019-07-19 09:36:22'),
('a16ccc4a5114542e629d42ebd2a7e1e4fc357336e92843124e855fa0bfb16a5777b09c9ebd4cc32a', 55, 3, 'api_token', '[]', 0, '2018-07-19 09:44:09', '2018-07-19 09:44:09', '2019-07-19 09:44:09'),
('c626587c80163d77e157c7ed0fecb6ea9f4b421a77159a9c0d56b39db7e9a188983058e53d0dea65', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:03:37', '2018-07-19 14:03:37', '2019-07-19 14:03:37'),
('4713afdc910314580d886bd2f98d6a057bf7a6907d4d9238c838e9d1ca43c0170b0eda10388e3e1a', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:08:27', '2018-07-19 14:08:27', '2019-07-19 14:08:27'),
('8278c7b0ff50b6c96a32ff0279b615d0b85aedcd786c7af4146c566283041ee59fa67dc533218efa', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:09:34', '2018-07-19 14:09:34', '2019-07-19 14:09:34'),
('1678f3e348ea5b1aeacb3863cbc804f0294acb821da97be11e1689ef75cb4fa0a86f053b5fa8df67', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:11:01', '2018-07-19 14:11:01', '2019-07-19 14:11:01'),
('4a355709c0e84ab365bdfcd408302913b332556dad68c74494439519a7fea6897ec032a35766bea8', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:11:17', '2018-07-19 14:11:17', '2019-07-19 14:11:17'),
('2c67929e94cf9d645d165c0749d064581078885f739101fd5d4bcb0be6bcee41c6af031f232f82b8', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:11:47', '2018-07-19 14:11:47', '2019-07-19 14:11:47'),
('ec83a95aeb0773839e385c09956f7c0a8a4f0d48bf8e90732c12c193a503e360af60912b4d62b2c8', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:13:59', '2018-07-19 14:13:59', '2019-07-19 14:13:59'),
('b861b637d3b29f3a61849109fdda75b28bae321aeb4882436707051a461cde7e2d25418d3abe78a6', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:15:21', '2018-07-19 14:15:21', '2019-07-19 14:15:21'),
('7524a5c5229caec9f55dc69df03695fa86a6958dd513f6d71651c60bad0de64703ec26ebcb6a1fca', 55, 3, 'api_token', '[]', 0, '2018-07-19 14:15:49', '2018-07-19 14:15:49', '2019-07-19 14:15:49'),
('81a765de18d69d5ce2eeb251c84757c1df37771593529660d2cb1a53333d611ab9fd5a39c2a7e3c4', 57, 3, 'api_token', '[]', 0, '2018-07-19 19:51:06', '2018-07-19 19:51:06', '2019-07-19 19:51:06'),
('dcaf73b752de3b4c9ad0a97fed8d1dea0f4ab69aec2ba6509b248ffe450de935fe4b37b5e055b9e2', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:05:09', '2018-07-21 14:05:09', '2019-07-21 14:05:09'),
('8fda5c39602fd3339591c1a9f4977edf829e239cfa4dcc84784f4965c38a1d5f9a0d97c46705cda3', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:06:32', '2018-07-21 14:06:32', '2019-07-21 14:06:32'),
('4ccf4e1fab607b31e07744fb63baad037dabd7b752a902e5a00fd6c83d57a4318f9ba42006e6aaa2', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:09:02', '2018-07-21 14:09:02', '2019-07-21 14:09:02'),
('cf644b8aeba6e705fa3b783c1b9cc64826dc83dbfc1cd6407c4b915f06d085364204c8de84a396ed', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:10:27', '2018-07-21 14:10:27', '2019-07-21 14:10:27'),
('dab37cb06ead6db630a1b44c076884dac04d2fdca59bdb021e323c92a88b1e48e554450f5764b552', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:14:34', '2018-07-21 14:14:34', '2019-07-21 14:14:34'),
('d1f3bb2837e0f798abd3285d4bb7afb3cd5e1a4dc1f78d732e59066a216c4a04fbd7dc07876154e5', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:19:00', '2018-07-21 14:19:00', '2019-07-21 14:19:00'),
('fd181c8e69b8fda77d7a69d782329d9cc3030f06d9924d922270b5bc2d7de9a192859f620a92ad76', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:21:13', '2018-07-21 14:21:13', '2019-07-21 14:21:13'),
('063e82aa914fd4d832b2f7ad42831973c201e3e4c0e5e5d0e0b56b70897ca20849604b4e10fa3eb0', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:22:41', '2018-07-21 14:22:41', '2019-07-21 14:22:41'),
('7b328a1931be6fa6bb540df5729e36731fcf8de5b158d31ec2e32eec3577b543b8f7313f3ae17379', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:33:18', '2018-07-21 14:33:18', '2019-07-21 14:33:18'),
('db9c5616ad8b8a0e2998eb9843ccf91206adaed9a01d15b65fb33655fc3ed2a9463a75f8ae98ddd5', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:34:53', '2018-07-21 14:34:53', '2019-07-21 14:34:53'),
('e997a2e9420b63f04c781d2bee51acd0ab05de391962f5f39c160a9df75172b1baf5a2501793fb38', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:37:25', '2018-07-21 14:37:25', '2019-07-21 14:37:25'),
('3e8a5c49e24ad19e5b2a3a63222279f8037a015d09fded8f769f16731f5786d66af563d949c635f3', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:40:09', '2018-07-21 14:40:09', '2019-07-21 14:40:09'),
('ea391b85d3d4e5754ae93bdf12c2a60afb5818bafdc81b7fbadaf585aff9c7eeee456a4fe2074952', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:40:42', '2018-07-21 14:40:42', '2019-07-21 14:40:42'),
('350448d635f1e2c6291521cde6b4edfd2ddf26b73b65afb39ed68aa4cf8bee77ff3703413783c949', 55, 3, 'api_token', '[]', 0, '2018-07-21 14:42:42', '2018-07-21 14:42:42', '2019-07-21 14:42:42'),
('a33673978a51718a38a13ff942597f763ea8ca4efe492dbb0007507620718a2360e99b4437c441f0', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:03:16', '2018-07-21 15:03:16', '2019-07-21 15:03:16'),
('e55ffee9a6fc7a9c4ce21eb6579d41161edbdeff1280119908d362e0919b09a18efaee04bc189a88', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:04:48', '2018-07-21 15:04:48', '2019-07-21 15:04:48'),
('f300e7279ea1a41b1e22d4b2041b25b43e679b81afb1a7e1b0bd413ecf81b462452f12ac5fb68cfe', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:06:10', '2018-07-21 15:06:10', '2019-07-21 15:06:10'),
('15d151b727efa8b74bd3bb68aa7cf1121e3eb5792b63784736806cb6aa8aaa0c0187f47bc24a49a5', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:17:42', '2018-07-21 15:17:42', '2019-07-21 15:17:42'),
('5be9560a4b26ad87178ee4ed0776f590486294aaf891313816876ef6e1710a41f482a82049785652', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:19:55', '2018-07-21 15:19:55', '2019-07-21 15:19:55'),
('2384f19b03e2b6d43fa333c68e4299d43b3094f89079a3990bbcecd32f6f731e54ff34fe140111d7', 55, 3, 'api_token', '[]', 0, '2018-07-21 15:24:19', '2018-07-21 15:24:19', '2019-07-21 15:24:19'),
('f588a7afbc2b06406f4a1fd28d01396f126fb4bb4f8800dde487d195e0cf8fd3a55953f1d249884f', 49, 3, 'api_token', '[]', 0, '2018-07-21 16:05:16', '2018-07-21 16:05:16', '2019-07-21 16:05:16'),
('933cc8ec04416809eb990fdbfec0da1749b0e0c1edcaf24a5e82a10ff2e597217efa21187ba0cfde', 49, 3, 'api_token', '[]', 0, '2018-07-21 16:08:54', '2018-07-21 16:08:54', '2019-07-21 16:08:54'),
('0ba62f2e023bc4c0fc86f6c5e716d50b6aea4662b22f000ffb9c9f89079f4ab88ff767395e1ee961', 55, 3, 'api_token', '[]', 0, '2018-07-21 17:20:59', '2018-07-21 17:20:59', '2019-07-21 17:20:59'),
('4ea0465b618bf1c2d010954775ca2736371c5e028e67c549b26f156350a285a525ae1b6820de1843', 55, 3, 'api_token', '[]', 0, '2018-07-21 17:58:55', '2018-07-21 17:58:55', '2019-07-21 17:58:55'),
('bb0cba8a27031c2cc535b06b44dc4ab70a1f07abf252d5bac045b3bf1a9edbcf001a0d277589dc49', 57, 3, 'api_token', '[]', 0, '2018-07-21 18:24:35', '2018-07-21 18:24:35', '2019-07-21 18:24:35'),
('5bce10f226e9247844a8a12f2ca53f1879998f3814e8041a875fb2f23b2b67f71a320f08cf3ebe85', 55, 3, 'api_token', '[]', 0, '2018-07-21 18:33:19', '2018-07-21 18:33:19', '2019-07-21 18:33:19'),
('0eccef736223172563e7079f0ac356b26af9ef5b5b6357ec243dbe1b6d5d77dcb418c42744052e57', 55, 3, 'api_token', '[]', 0, '2018-07-21 18:35:55', '2018-07-21 18:35:55', '2019-07-21 18:35:55'),
('ef4907976f476edfda50d5b9ada4b8946a1f1b5f43c0a8e5a1cac76753aaffc540ca8a9b377a2fd9', 55, 3, 'api_token', '[]', 0, '2018-07-21 18:37:14', '2018-07-21 18:37:14', '2019-07-21 18:37:14'),
('e10134708af0d4759a1857b7f337b612948f1ad9c3d69b5edebc310d029f8b40d4bd3b07db97f7fb', 55, 3, 'api_token', '[]', 0, '2018-07-21 18:38:39', '2018-07-21 18:38:39', '2019-07-21 18:38:39'),
('21c6df7aeefccc4ffeb241fd4b47b506a0effda7953a5e9c40c5e405bbb9da6ee98ce0b554e710e0', 55, 3, 'api_token', '[]', 0, '2018-07-22 06:57:57', '2018-07-22 06:57:57', '2019-07-22 06:57:57'),
('128d907a560e1739b9030d5aa9539de04ed6af7f544611cb93a3c739bc49aee4f0150622ec207410', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:04:07', '2018-07-22 07:04:07', '2019-07-22 07:04:07'),
('825458377e48aa50203678b0f8662639c9a0ce6a654b4d8666a41ba91fb06ad8aeed5abb9845c7ed', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:07:23', '2018-07-22 07:07:23', '2019-07-22 07:07:23'),
('55bb0888dad414bb651b6b0514b1b695d361b86c594cbb0e94cfce2bf5fee50bf0587e27e8f2a9dc', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:09:15', '2018-07-22 07:09:15', '2019-07-22 07:09:15'),
('92a64a5fc9e1183c52e721b6a86e19dac869c6c0ff4ff6f9db17d77bd9abb170f6312b1cf7224d69', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:10:03', '2018-07-22 07:10:03', '2019-07-22 07:10:03'),
('73a6ebe4a58d365fd6ff98608c94868eb886b67bd25cbae79a84f72825dbaf9e2134d8a48b290a03', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:27:56', '2018-07-22 07:27:56', '2019-07-22 07:27:56'),
('972c99ae1d4b15a9a7c698cf8dc56d2470f198fa435ff7f099062e44b71df48e4aaf26589acb3920', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:29:56', '2018-07-22 07:29:56', '2019-07-22 07:29:56'),
('10aa2ed7e34091ca4b181574d51e929e86ff93b552f367094595ef2aab9dd78602dc6b96ae0719f5', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:34:43', '2018-07-22 07:34:43', '2019-07-22 07:34:43'),
('e0da58e6eccc44dc723cb02c0254f696a605c1318db433f2fe918b05f2eba650270c52859ff7ccc2', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:36:05', '2018-07-22 07:36:05', '2019-07-22 07:36:05'),
('e2b1688aabddef672dd5f920541aa5869b0184afedb500b99d4b07cc03e36de510906d8067d6a0cb', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:37:15', '2018-07-22 07:37:15', '2019-07-22 07:37:15'),
('32c785e1b3038e87363cd0a2e48d832fcb258eb941656a05732fa5320fa765d62d053b211d3a693e', 55, 3, 'api_token', '[]', 0, '2018-07-22 07:38:22', '2018-07-22 07:38:22', '2019-07-22 07:38:22'),
('057adb8006fa0aa530e57ca3601ea82de9f56b5b296245d175c3d748601a5416ab5e8e38589420d8', 57, 3, 'api_token', '[]', 0, '2018-07-22 18:04:07', '2018-07-22 18:04:07', '2019-07-22 18:04:07'),
('9c713ffb0b804e4982db4dec82b25f535d6e24fc260803addf1c08d7d52e25fa2fa7ede405a5c04e', 57, 3, 'api_token', '[]', 0, '2018-07-22 19:52:05', '2018-07-22 19:52:05', '2019-07-22 19:52:05'),
('f0d0a2668454837fe0adfa1f3d193253ad2d0fa1a86c844bce3a1bed414ea3d928c4582bdbdeb8bf', 57, 3, 'api_token', '[]', 0, '2018-07-22 19:58:31', '2018-07-22 19:58:31', '2019-07-22 19:58:31'),
('28c5cc0af04c79bd1305822c90395949bee2d6db006a38ef647035b22196d306cf4d6389c731639a', 57, 3, 'api_token', '[]', 0, '2018-07-22 20:05:35', '2018-07-22 20:05:35', '2019-07-22 20:05:35'),
('8cca3baabdb50800843a8d532413917076ca927f360ca60b57564855282d2cadf84b487cde52a0f2', 55, 3, 'api_token', '[]', 0, '2018-07-22 20:08:48', '2018-07-22 20:08:48', '2019-07-22 20:08:48'),
('7f4abd59f8338a481b9c2264c782126bd1b06f3c8b73a08b921e07c65c99d24ebc5be6088084d097', 55, 3, 'api_token', '[]', 0, '2018-07-22 20:09:13', '2018-07-22 20:09:13', '2019-07-22 20:09:13'),
('01e76e2536d40aea05a4b682558bc5471baac67f836a35c3a9d469cb75485eb11247cfceed9b77f6', 57, 3, 'api_token', '[]', 0, '2018-07-22 20:46:26', '2018-07-22 20:46:26', '2019-07-22 20:46:26');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3ba710f44945416172dd64c04b0ad62d0c32d773b6b452ea75c5cadd678ab0a133121a5f9ebdaf97', 57, 3, 'api_token', '[]', 0, '2018-07-22 20:47:53', '2018-07-22 20:47:53', '2019-07-22 20:47:53'),
('1513d728c75c60b887b1a4bd0bc4de285bb0fdb33243dcf8ef300ed03f0758b523b958de8f45e39b', 57, 3, 'api_token', '[]', 0, '2018-07-22 22:07:57', '2018-07-22 22:07:57', '2019-07-22 22:07:57'),
('9d1588be373bb68f5afa83440e7fa2f621dc0fbea02874a1f0ba9a07d09f65763e072c5b73863e56', 57, 3, 'api_token', '[]', 0, '2018-07-23 17:39:54', '2018-07-23 17:39:54', '2019-07-23 17:39:54'),
('c2d26b6f032c9cb3c186f0e07558f03c929f00a1ae0ef1dc13602a0b7e59df6192567f927a20fb0c', 57, 3, 'api_token', '[]', 0, '2018-07-23 17:42:40', '2018-07-23 17:42:40', '2019-07-23 17:42:40'),
('d8471d4a30b692c68eeebb74d1c41995884234df51e41002e6d3db10812b4a6a09938d2f0ce28b0f', 57, 3, 'api_token', '[]', 0, '2018-07-23 17:45:16', '2018-07-23 17:45:16', '2019-07-23 17:45:16'),
('be2cb62adda09ddaa621c28e49d97f808c9bbd258fb4682e2fb682b87d4bce3405d18269fb7d801d', 57, 3, 'api_token', '[]', 0, '2018-07-24 10:59:56', '2018-07-24 10:59:56', '2019-07-24 10:59:56'),
('2c4f5c90e9d4c0419b927fdc174ba61a4f043eee037aee4f00b9eb32d61204e4bf022640ff2aadd1', 57, 3, 'api_token', '[]', 0, '2018-07-24 12:34:08', '2018-07-24 12:34:08', '2019-07-24 12:34:08'),
('ac9a74d52cc5be1d01158f906efe2024f72a6b767f665570ddab5a59207617b9639d48c5ce9ca11c', 55, 3, 'api_token', '[]', 0, '2018-07-28 08:52:51', '2018-07-28 08:52:51', '2019-07-28 08:52:51'),
('799c079bdd0555dbae74e427decd317ef15982196ecbbab2b3c79adad6e5414f2fdacaa680f16871', 55, 3, 'api_token', '[]', 0, '2018-07-28 09:18:26', '2018-07-28 09:18:26', '2019-07-28 09:18:26'),
('342ae96e1a64c6adaf0ad0f3f0db010ef68574a155d2ec015cc93012df88d6d3d1e2f1b3c8c4ceb3', 55, 3, 'api_token', '[]', 0, '2018-07-28 11:23:18', '2018-07-28 11:23:18', '2019-07-28 11:23:18'),
('be7693e3bec6a5b1960fe2207244e815802ece9b28f5e1048cca167ed3c8922bbe048500a84f5578', 55, 3, 'api_token', '[]', 0, '2018-07-28 11:47:19', '2018-07-28 11:47:19', '2019-07-28 11:47:19'),
('b7eba06f8a9cb747a6eac901a9db864453c5caf3b0b9298b80e7b07720b9ff10bcd4aeeccc2d1989', 55, 3, 'api_token', '[]', 0, '2018-07-28 11:51:37', '2018-07-28 11:51:37', '2019-07-28 11:51:37'),
('01fca97d7fe540ebc1edccc3b18b641ba6664332ab78b6a7e59d4b73c40c7dfef59fddc5f84c7de2', 55, 3, 'api_token', '[]', 0, '2018-07-28 11:56:19', '2018-07-28 11:56:19', '2019-07-28 11:56:19'),
('47d6e747e54ac8cdf093cae55d8cc7399c7696938d1a25b4bec0ea17b5ad008e9014bae0e2483f83', 55, 3, 'api_token', '[]', 0, '2018-07-28 11:57:33', '2018-07-28 11:57:33', '2019-07-28 11:57:33'),
('7739159be5cadc9230e9f1b20453db4db015de3a0aa277589b1255d78ba30c7759dfcfa3d8d63080', 55, 3, 'api_token', '[]', 0, '2018-07-28 12:04:03', '2018-07-28 12:04:03', '2019-07-28 12:04:03'),
('150e1b97129e4463ac39227149d85de44b805969af22b71e1469cfb16f1f7b69ca77bdd8cbed21ee', 55, 3, 'api_token', '[]', 0, '2018-07-28 12:07:48', '2018-07-28 12:07:48', '2019-07-28 12:07:48'),
('75eae3dae59e4d5d89ebf16f042743ed227f0499321e09ea413681fa6bc2ccfa0dd912c8233c9a39', 55, 3, 'api_token', '[]', 0, '2018-07-28 12:38:28', '2018-07-28 12:38:28', '2019-07-28 12:38:28'),
('2d950f9df10e7c74f8ef437557108465158740c7684043f7e309058a5e7791374f619f58901a8278', 55, 3, 'api_token', '[]', 0, '2018-07-28 12:38:50', '2018-07-28 12:38:50', '2019-07-28 12:38:50'),
('ec0443929c96c0e2cc9310e54505408214f3e2c46a2fd7ee032ab1e7a39b746f6a04e5707da218e1', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:12:25', '2018-07-28 13:12:25', '2019-07-28 13:12:25'),
('a766b01cd7688a4794d28caa9fc2354b45bf451f03626aa0261d4ccc5cfbf6d484326af1483467a3', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:21:48', '2018-07-28 13:21:48', '2019-07-28 13:21:48'),
('e6c31e8e08610605cd4dadaa50e3766a3252b573768b052e3abad73d5368e9a50977e3c5bd5857d9', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:23:42', '2018-07-28 13:23:42', '2019-07-28 13:23:42'),
('354210b17ec7acabbed07de367cc64d06dccc7485c710fafa569c3c3ed26e1eadeb34dcac3591bdd', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:29:31', '2018-07-28 13:29:31', '2019-07-28 13:29:31'),
('74bc9882dc77cf14007366cb331ff40ffda33ebbe2b071c1e53a8e06b019b543049a8109195bef3a', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:29:53', '2018-07-28 13:29:53', '2019-07-28 13:29:53'),
('5da5815264e416df89c840fbc6d43784b04f34af4131ea4cc14e7cd8b97849b7f9d079459e759feb', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:31:37', '2018-07-28 13:31:37', '2019-07-28 13:31:37'),
('5f89e53fbe8588f93a06bd0628d2ed1c052701a462eb3e750b9384d0171a3ed1e7b587af5a5e17ad', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:33:41', '2018-07-28 13:33:41', '2019-07-28 13:33:41'),
('96f40d92186fd83a3e14bedf5b1263750f2709a2b2b6d405ca678c8089d508a57812029e19faf8b8', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:37:41', '2018-07-28 13:37:41', '2019-07-28 13:37:41'),
('604d182a027bfe721e6825d84158830af96b1e313ea4931a63ed1a67e132eec9183bb4d8111a7831', 55, 3, 'api_token', '[]', 0, '2018-07-28 13:59:40', '2018-07-28 13:59:40', '2019-07-28 13:59:40'),
('281e118eb67a826100d82ef24bb52433c0ab378ef2f309fa45403f14baaf18e627f089a888498d1f', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:00:08', '2018-07-28 14:00:08', '2019-07-28 14:00:08'),
('980f7530577f88fbc17b88928697d06a90705f4da8c8c67875b85d217aa7c6c1d9b5f7eeb4b26209', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:01:09', '2018-07-28 14:01:09', '2019-07-28 14:01:09'),
('be8f38f5ce9313f9e99026a9142d7902429a3ba9dfda896147f80f1cb25ff7ebbcf40ad1e192c518', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:04:45', '2018-07-28 14:04:45', '2019-07-28 14:04:45'),
('d99055475a6e69c3c144ce78c4b56fb96d78d831cae97033d0ea00e0926786531e8b3a632880b514', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:07:08', '2018-07-28 14:07:08', '2019-07-28 14:07:08'),
('1b04120b7528d10c2d734b23dc86c1f3c7f4fb7bf3279971d3308c139d53f8a1bc7b1fb184ad4733', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:08:24', '2018-07-28 14:08:24', '2019-07-28 14:08:24'),
('00e903b69d26d7f45a0a6b239d23a80b1ac9f52b0fdda919452770b34398a56404da73a30b87c809', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:14:31', '2018-07-28 14:14:31', '2019-07-28 14:14:31'),
('fb3ec5a71657e407e8038f8d7db8cbbf3782e87bb8f8d71e9b20dd6522b2066c0a8cc1e22bd5947b', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:30:01', '2018-07-28 14:30:01', '2019-07-28 14:30:01'),
('3b5b09625223c801c1403c0404ee8e73b8826db8f1dcd17ba2345f8e5337b14cec5bdfccc289eb8c', 55, 3, 'api_token', '[]', 0, '2018-07-28 14:30:47', '2018-07-28 14:30:47', '2019-07-28 14:30:47'),
('f88caf238f43159ea696be4805edc64c4f8ebd8ba5982a28efad3ea607f689ea6d4598f23c5e52b9', 55, 3, 'api_token', '[]', 0, '2018-07-29 08:43:45', '2018-07-29 08:43:45', '2019-07-29 08:43:45'),
('a2972410760e8fbe169b7cfbcceefd102cfbc8756560f56d3bef9a877c66a7dda48c13c318a60fe1', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:40:01', '2018-07-29 11:40:01', '2019-07-29 11:40:01'),
('311983d6a01fbac09e328e12c08020bd995a9171182a7948ee977cf0118368403591db7525034ac1', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:46:37', '2018-07-29 11:46:37', '2019-07-29 11:46:37'),
('524d2d7283b1d6ab0cee106b74eb88982276fc7486a403656f759b5c12af52f1edefcd2386ec2053', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:51:06', '2018-07-29 11:51:06', '2019-07-29 11:51:06'),
('0c61d93b890f92ae990d434156ad42ea950f6b1f0c2a88fc34dfccceac2ff812b99115a0a62902ea', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:54:21', '2018-07-29 11:54:21', '2019-07-29 11:54:21'),
('5add404a0f58e77dabd6e5aec0ed118fbcf0c3b5616f1d995ed57cd0b9fd34a4ebc7af410198e0c5', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:55:36', '2018-07-29 11:55:36', '2019-07-29 11:55:36'),
('301103e9325a7c4ba84c5b5426be94bc1d37add70c55c587e90dc12a9ab47e549076401e5849ba6e', 55, 3, 'api_token', '[]', 0, '2018-07-29 11:59:16', '2018-07-29 11:59:16', '2019-07-29 11:59:16'),
('74953af9fef6ada9b95e8ef4eaab7d344ac5fa2b82a2828ba98b3a30263fe57b8640427c49515616', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:05:19', '2018-07-29 12:05:19', '2019-07-29 12:05:19'),
('a64189fb82ff8a2653cf00ae2ee7a956b1e9fb9eea34402ece654faa0e5ae4fb7fb790e23b1b523e', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:09:11', '2018-07-29 12:09:11', '2019-07-29 12:09:11'),
('278eb91aee03cc283c5e358080da906dbd7637c048d2b4296d9c2439e7b961d8da66019dcef445e8', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:11:09', '2018-07-29 12:11:09', '2019-07-29 12:11:09'),
('b2a3cf98fdda640df47f2867512537da694aa1826e8ee0c22c359c5c3f9a956008ee9b73de578120', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:16:17', '2018-07-29 12:16:17', '2019-07-29 12:16:17'),
('5f8b10e8c6c9f7ff2e9675e981799c48950d75c633d0afc16ae71c13a25920fb2eeead5b7663f50c', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:18:42', '2018-07-29 12:18:42', '2019-07-29 12:18:42'),
('d6cbdc77a0d8cef8e1629a064db76ce9fccbd6dbc3ffdc25ea6de15427737a5c1c7fac46a3f217a5', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:21:04', '2018-07-29 12:21:04', '2019-07-29 12:21:04'),
('8ca2df08b32dfc8974bd0bc0451dd88481e66a74d5aa5975dc280c63757de7f4e7e5cd94f6b55ad8', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:23:43', '2018-07-29 12:23:43', '2019-07-29 12:23:43'),
('4615659a3af49fdcfbcb66d1afd9a34e4ec380c83674d42e43ab8f188cd23815459a208dc7b09223', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:25:17', '2018-07-29 12:25:17', '2019-07-29 12:25:17'),
('e2a3e7f880c1741eade7a40d786982471e46af1b0aac65a9c82bf6ae0790de22125dfec8afc5ab5b', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:25:52', '2018-07-29 12:25:52', '2019-07-29 12:25:52'),
('ed7059d9082bc8ac7e960e728fa916fd189552c2d5801ec91f89de377b014f061b66df9a2ac6d983', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:26:51', '2018-07-29 12:26:51', '2019-07-29 12:26:51'),
('5d42c0f34dfd952021c155b42926189367c20794e2c9196e1771f99ee2f59db0c6f7edc959751e20', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:28:21', '2018-07-29 12:28:21', '2019-07-29 12:28:21'),
('eba2225b7fa0654493c8038b8065dd2ea5f4df70df02e052fba373534e33359457a1ff1c6837b362', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:31:12', '2018-07-29 12:31:12', '2019-07-29 12:31:12'),
('206e363b377c797eaeade1bf9ec6122a9c5ad1efaef02f14c6c99b1541f246e18bc3fddba54048fa', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:32:39', '2018-07-29 12:32:39', '2019-07-29 12:32:39'),
('5ffe5c0fc49634694c0837373cf689785763f7426ee9570e41efb9a9dd6348fa5204194df9b5e242', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:33:31', '2018-07-29 12:33:31', '2019-07-29 12:33:31'),
('3ba1ce8fe0800b2a801f38949ef8c6b12f20cc31e6c224296b16985262e25e43a5b4bba143e8e5b3', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:34:18', '2018-07-29 12:34:18', '2019-07-29 12:34:18'),
('6727b5bb79390490753f81256c981c86d1efeedf77b8109978f8b5b1d9cd0cb331b8dd134cb7fff0', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:35:15', '2018-07-29 12:35:15', '2019-07-29 12:35:15'),
('b433768958f54098a014a38a802101881489652ddd2fe382cdff3037e3458cc266fb300e8e3b1b22', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:46:00', '2018-07-29 12:46:00', '2019-07-29 12:46:00'),
('c146ce4e8a4dbe1445a09f77dc57f4a62b3edc94416c9c6a6d0aba56a6c35f8fbcff56c5dcd9efb2', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:47:10', '2018-07-29 12:47:10', '2019-07-29 12:47:10'),
('a4e3da938cd4769027f6a8993c4ee00670c29514f64a52088df96e84b40ad2f321cdc5c449315215', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:48:36', '2018-07-29 12:48:36', '2019-07-29 12:48:36'),
('d7edc732101d5ff146cf67232e1bf01c95f812e04741d795474ec17d332fa70e5dc2d9e675a83327', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:50:50', '2018-07-29 12:50:50', '2019-07-29 12:50:50'),
('08ff42c2415efb9fe203b90644b6369f41f3ed065ca24f87fee19289b76f5e34efaf4debdb12102e', 55, 3, 'api_token', '[]', 0, '2018-07-29 12:56:58', '2018-07-29 12:56:58', '2019-07-29 12:56:58'),
('b522727298adc989439fcd7666333062b42ea997fdfee70042a858906a7b90d6fae758e58178d814', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:05:35', '2018-07-29 13:05:35', '2019-07-29 13:05:35'),
('db8e60428dc851de26c20c15e87088937b50bcc63058495c8cb6f124709dc660635e57b5f9856c6c', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:07:19', '2018-07-29 13:07:19', '2019-07-29 13:07:19'),
('60e0863462f6025f308aa202a2409b9788efdcaa3178b66c239107714d2cc205c5499ec3c14f76b8', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:08:07', '2018-07-29 13:08:07', '2019-07-29 13:08:07'),
('bb78210c719af5e7491676d43775527f47c628b0bc57744b5f9b20916a2f9698fc5af4f830e2ae52', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:09:57', '2018-07-29 13:09:57', '2019-07-29 13:09:57'),
('46230ae2cc9d1a067bf1d1e6bf78f0869a319a80c897dca30301b9894a9eecdabf610ee3c403d45d', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:11:27', '2018-07-29 13:11:27', '2019-07-29 13:11:27'),
('ff4c50474b28cbff652d780a439e365559fc8a3881409899dbb22a645a75355d141f90805d40eac5', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:12:32', '2018-07-29 13:12:32', '2019-07-29 13:12:32'),
('bd47f11e3eac66724623b2a32cd8fea9445f4eff33e303a570f94a046b5319e417d84275fd642035', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:12:57', '2018-07-29 13:12:57', '2019-07-29 13:12:57'),
('75fefb6b42c401982e80c90afe4748d3f4199dc188049b83eec8fc0c9cb5b273a823ea590e2c4f63', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:14:14', '2018-07-29 13:14:14', '2019-07-29 13:14:14'),
('37181851a704e610d5add9aca92b8fd03aa00fe5de52e8fc19aa4edab8b663899f13d167ad129768', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:15:09', '2018-07-29 13:15:09', '2019-07-29 13:15:09'),
('c5b2f46840113bc3c6c0531ed148de8c1e1531dce9e8593520b05cab40786b830c05cf6943e05e68', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:16:41', '2018-07-29 13:16:41', '2019-07-29 13:16:41'),
('a822d84fc52ee385d34c718de74f810822c954266f241540fee6f846af1b039f130c7278a0d573a9', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:20:39', '2018-07-29 13:20:39', '2019-07-29 13:20:39'),
('f01069ce65eb3181105ef1bd8fe2de66b4302028df9406d80de6fb8851e38aaff31cd094b582f00b', 55, 3, 'api_token', '[]', 0, '2018-07-29 13:21:14', '2018-07-29 13:21:14', '2019-07-29 13:21:14'),
('da4290e5a313ec9461471ab5839c7148544a2a01a807462e72fabcbeb1f7a82ed257ff9d7082ec96', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:19:56', '2018-07-29 14:19:56', '2019-07-29 14:19:56'),
('2f2099ce240098dee2db69f8ec0ca22435be280c92697cb8551bba684cb255d3d04fb77fe4d5ae69', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:21:47', '2018-07-29 14:21:47', '2019-07-29 14:21:47'),
('f42385accea87ec5909ea728f711a9b74bc25515260c82f6e16499cd78c8539b9d4670d02b331838', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:23:16', '2018-07-29 14:23:16', '2019-07-29 14:23:16'),
('2dd8a48897c6c89c730812c06dc6db6cb154ee3a3dbbaf356dd2576e225ceea02a858b820395e07b', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:24:31', '2018-07-29 14:24:31', '2019-07-29 14:24:31'),
('69623f828f9fd81d0c10c6499325edb3e8dea0dd8d75d7f0484b5ac48855faad2dda8fd10581237e', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:45:21', '2018-07-29 14:45:21', '2019-07-29 14:45:21'),
('504bbbcf6e9fe87e6b941ee1b2da53f31699e3a069c8274221988a6f336d71cb293bad2a3056f1f4', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:46:45', '2018-07-29 14:46:45', '2019-07-29 14:46:45'),
('724f6d29c0e7761317696734b1c9f1e5654e64e2454fa8b38cf971e6fc16b573ecc4633f5fa7bd5e', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:49:46', '2018-07-29 14:49:46', '2019-07-29 14:49:46'),
('441f8f5bef3b291b71dc8b5b047864d5d5e51d298c1915be0e6fc112473f584755fade45be3fc30c', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:51:01', '2018-07-29 14:51:01', '2019-07-29 14:51:01'),
('98700789000dd3283fe4b30546b86bb82e11a9ad01ac1590c6528efcb543daa4a56e47d8f151eb98', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:52:27', '2018-07-29 14:52:27', '2019-07-29 14:52:27'),
('1e2b3ca19aa56b140140ddb59df84afd34c6e3c67766b2afe9949800a9c3b4e49fee5b4776b79af8', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:54:23', '2018-07-29 14:54:23', '2019-07-29 14:54:23'),
('1d48cf79a3609cc82d442639144d76fefafd3ebabce209ba3badca47e9a9a1c4256e581c281cb8ad', 55, 3, 'api_token', '[]', 0, '2018-07-29 14:55:22', '2018-07-29 14:55:22', '2019-07-29 14:55:22'),
('8ccce193b0d2ba7de5d42ad316b4a469d2f731104a13078e6f3b1914c3579ee18265229239ff4c9c', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:00:26', '2018-07-29 15:00:26', '2019-07-29 15:00:26'),
('902e167e4a624a8c3a3286ed76fefc836e9831e00abf7f69c605267f3c42d58207e6dd1c0109dfd2', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:01:55', '2018-07-29 15:01:55', '2019-07-29 15:01:55'),
('71cef00297e7e7bdd3e70a4d0be330c2c052bfc93331e9c058f58513292471f976cc3d3b5cd5a838', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:03:11', '2018-07-29 15:03:11', '2019-07-29 15:03:11'),
('e317e7ebb1180850b59dfd3a537b8d40fcd8209819c5c1c8b49c18877daf261a09f68bdda98f6388', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:05:42', '2018-07-29 15:05:42', '2019-07-29 15:05:42'),
('9e095ac6cf355f6dcc298abd6a79d7ddf7838df99bdc0ec12285b3986bb3baed4d3349482f0cbe06', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:08:08', '2018-07-29 15:08:08', '2019-07-29 15:08:08'),
('8bc89f6d5227bf5a2a8e9ce9a0f22145371ff8796dd635b4b0f047679b7c9f54c1387b96069de965', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:09:30', '2018-07-29 15:09:30', '2019-07-29 15:09:30'),
('42cea6111dacecb529a2f23271cc6a9c4474e27dba39d8cce1d9c7e24382d5bb133211a5d50675ba', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:09:39', '2018-07-29 15:09:39', '2019-07-29 15:09:39'),
('8b50d45d7fbccbf04804e40d4556d71a463f5299e273a1d8e63d5966b283f356f5d45d5c980c0cd8', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:10:44', '2018-07-29 15:10:44', '2019-07-29 15:10:44'),
('74dc4e4c2fd8914bb4f6fc440e29c6c287cfc5455e1b00852286761faed674570c7fa73f33d56f3a', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:11:56', '2018-07-29 15:11:56', '2019-07-29 15:11:56'),
('4bb359a44539ffee25f4f5f1d661ab9b7c17a826e96eda06046a55da51b22712879dc8c45d7dfb68', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:14:49', '2018-07-29 15:14:49', '2019-07-29 15:14:49'),
('40f9692bd4010d5da9461b6e05f2783a7fcc5202baed9b12dd8bdb1b956cb31496a39f0f3d8c467b', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:16:22', '2018-07-29 15:16:22', '2019-07-29 15:16:22'),
('50a8e31977ca5c5a449cfa30905efab1ddd1fdb845ea44f11a160a5ded71f0de1df7086e963ac6e2', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:17:15', '2018-07-29 15:17:15', '2019-07-29 15:17:15'),
('58b6e1fd3c1e98e433f18ec0737c5e285a8c636d5555b0331cc637f1f47ed902e340545d9488cf19', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:26:41', '2018-07-29 15:26:41', '2019-07-29 15:26:41'),
('8d9c83769749b9fb82ea76bc4012df69b8b8776690ba9be2e6033e1261eec458aca9a811143ca50b', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:37:44', '2018-07-29 15:37:44', '2019-07-29 15:37:44'),
('da35896f2dc958d860279d74d335b75af67b3698f404ee5505676d49ab38ef485212601acba9f8b8', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:47:11', '2018-07-29 15:47:11', '2019-07-29 15:47:11'),
('dfaf815ab4037fbd685c606a5f2b7b432291446a3843533a335af920d4ceb77562a6b30e60688fd2', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:49:46', '2018-07-29 15:49:46', '2019-07-29 15:49:46'),
('ee2b0f94016c3380612fa3cf3d1c42880c7af93a8ac58bdaf7f23dc714387a1a4bc2cd0ffc538cf0', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:51:11', '2018-07-29 15:51:11', '2019-07-29 15:51:11'),
('9fcde23e543ab85c5eb22a87803fbaed25f9d1a17e0cc340bc4647b2b77054e0059d9bd98c746986', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:53:56', '2018-07-29 15:53:56', '2019-07-29 15:53:56'),
('b3389a4fa1d55b3e1a8310b24d52e6aaaf253c5568028945ecd30e2ccb20b16b5cf79cfbb4dbe2a2', 55, 3, 'api_token', '[]', 0, '2018-07-29 15:58:33', '2018-07-29 15:58:33', '2019-07-29 15:58:33'),
('4ee125fe7b28eea78bd96770930dcaca505617400186725549af286592282b93d420267e4187992a', 55, 3, 'api_token', '[]', 0, '2018-07-30 08:25:12', '2018-07-30 08:25:12', '2019-07-30 08:25:12'),
('a538a857caa28eab3c4c9d0f19c89232312bdb083bf855834cba1125be389e685cba9e33911380aa', 55, 3, 'api_token', '[]', 0, '2018-07-30 08:41:00', '2018-07-30 08:41:00', '2019-07-30 08:41:00'),
('fb09c0180f571f12384752c8b1ec443dbb74e25ac07b61066fbef5d0dd5508aaac77b681d575ca2c', 55, 3, 'api_token', '[]', 0, '2018-07-30 08:42:08', '2018-07-30 08:42:08', '2019-07-30 08:42:08'),
('291647bcb8336576a4253c5238fb4d598b9171c0be30e1338740696e6d604af31657bf68d991b822', 55, 3, 'api_token', '[]', 0, '2018-07-30 08:44:06', '2018-07-30 08:44:06', '2019-07-30 08:44:06'),
('d55136c388203e0aa633da3fa517caed71688bac905d151f410e09394e630a53168754e8ac124bb6', 55, 3, 'api_token', '[]', 0, '2018-07-30 09:03:12', '2018-07-30 09:03:12', '2019-07-30 09:03:12'),
('0b103ff93c37abbbfa3b5f9ec023770d783d3348b2e7f5b99500d23399d2fb4ad1d839de7c9074c2', 55, 3, 'api_token', '[]', 0, '2018-07-30 10:26:14', '2018-07-30 10:26:14', '2019-07-30 10:26:14'),
('c2ef8abf097002195cdbd5364cef7726d550be85a74cdb51188a1c7ca58e6734e02fc2bbfebe4eaf', 55, 3, 'api_token', '[]', 0, '2018-07-30 10:58:31', '2018-07-30 10:58:31', '2019-07-30 10:58:31'),
('9b874ef1f434b1974062db1b1d5e9db234390aff3ed12a6cc87b1b59a2ccf91f9de41199ef719602', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:01:54', '2018-07-30 11:01:54', '2019-07-30 11:01:54'),
('b758921dbd5e1ae7b36b84a42bfe527e12f6124f0bba8f6d3d56d3e2c355048566dda08082f7c857', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:03:50', '2018-07-30 11:03:50', '2019-07-30 11:03:50'),
('dcc266ef6e0595b0df63bcde4dea05e018d9c881c6427db7fe1eecc271f143e58f76bd223f48fb8d', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:08:52', '2018-07-30 11:08:52', '2019-07-30 11:08:52'),
('e8b6bb0575962c60e493ae1e150e8a2656693648bbcbc0163cd62df6e1307ddddaa4eb00949c9b8f', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:15:28', '2018-07-30 11:15:28', '2019-07-30 11:15:28'),
('1331136689faff366e716aaa837d8bbd6fe91712ef2843110329ef0844cb3b56b923fa571e2404a5', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:16:23', '2018-07-30 11:16:23', '2019-07-30 11:16:23'),
('45bd0413c1e4208070c21ae743eab7b2039e4b6821ca3ce44deb65572cfaecaeeb3c54d870f3e38d', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:18:22', '2018-07-30 11:18:22', '2019-07-30 11:18:22'),
('e251272276addc367b836f689cf03955a6446fbcb91571f0073a10012a90aac215ab74c5b88680b3', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:20:01', '2018-07-30 11:20:01', '2019-07-30 11:20:01'),
('90b10ab1457fb4e1036ff8a5606f402bfa8ee3b1a74ef68ef3b7dc39563c9d0e86c0378d3a11be49', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:22:02', '2018-07-30 11:22:02', '2019-07-30 11:22:02'),
('19d3f02b0f549c00639ff6a6df173f3779395f38a69820355791cc7383bf14b6b586382e9a6f2e09', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:23:15', '2018-07-30 11:23:15', '2019-07-30 11:23:15'),
('b38cb38a738fe86a6d248608026ff79e752a2eb951e2b83b5cbc9492df2fd34464a861f11f5efb3f', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:24:10', '2018-07-30 11:24:10', '2019-07-30 11:24:10'),
('8cb689be9fdfcd21d376940d53ef8ebe2e2a0516ed4d1ed458225dd14bb69aabeb5a5a3b48f7faf2', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:27:29', '2018-07-30 11:27:29', '2019-07-30 11:27:29'),
('29855fff302331ce0577edcb93f6ff2354d360300f2d0b8bedbf74fd5062539f169de0dee6b54d01', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:28:17', '2018-07-30 11:28:17', '2019-07-30 11:28:17'),
('5d14adfde3df2d8dda47e1a6594ac877a394f9f21d21789e5b713d993fe4c8070ee1343746626a3e', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:31:52', '2018-07-30 11:31:52', '2019-07-30 11:31:52'),
('ef122e407bf7a1314c4aee6bfe70b8c548bcb9045585b197b3f1dcda3e37ed00b4fe4b6c032bdba4', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:33:27', '2018-07-30 11:33:27', '2019-07-30 11:33:27'),
('db29b3de74f85109fd695708c6e1a540913f61a1e32d74104a4551d978a98eeedf3f9d6af092b244', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:36:58', '2018-07-30 11:36:58', '2019-07-30 11:36:58'),
('e4be82fbf29bab4dd7e77a32150ae3d552b90a956ddd31aaaae495ca0b9c2dc5fb4d0d93ffdde38d', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:50:02', '2018-07-30 11:50:02', '2019-07-30 11:50:02'),
('f6bab0748d8c0e134d1feca65ddc266ca724ab6cd311ba9107e5d138a46d0bd0bb166a02e68d712e', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:52:24', '2018-07-30 11:52:24', '2019-07-30 11:52:24'),
('ccace639db1a456675fe4157a5be81e90e828a3cd02d3377f901e434f63ef2b65895a40e88d36c35', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:54:29', '2018-07-30 11:54:29', '2019-07-30 11:54:29'),
('fa9b167e925eced2ed7bbd25c2a25773de7f2f5b0f331baee295aa1bf7662101262d4a24cdfd7877', 55, 3, 'api_token', '[]', 0, '2018-07-30 11:57:29', '2018-07-30 11:57:29', '2019-07-30 11:57:29'),
('d17cf87b31ada0e7c49635cfd8eb157adcb21c615177e8c6ef4210e1b0984fe481b5df3790565832', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:00:16', '2018-07-30 12:00:16', '2019-07-30 12:00:16'),
('15b7802c115dac636f95b53f8eaf5bcc24e1439352a33f7730a2300b61e13f9e8da86d22946c5a1f', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:03:30', '2018-07-30 12:03:30', '2019-07-30 12:03:30'),
('be3b1535a99a78789d663b9c89245c8d902ee0abbe0c59ea705c28edac5b04ffdfe750cdfed7799a', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:08:06', '2018-07-30 12:08:06', '2019-07-30 12:08:06'),
('e89888cda3df675e973cd022a98a594095d3abdbac7bb3aa27ee2b7b6c9fe114d88c603c1fc83725', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:13:00', '2018-07-30 12:13:00', '2019-07-30 12:13:00'),
('7baedd0a0889a2ccfd16c1516a0ec90fa222b84ceeafc9e886e0a76fe8ff9fd098d53780d9f0bcfa', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:15:25', '2018-07-30 12:15:25', '2019-07-30 12:15:25'),
('e947e8a185dde30b03e76a211d5dbb0d61e307e6a1fa1ac1cb2f03af6a77e7cf5fdb90db50b9948d', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:17:33', '2018-07-30 12:17:33', '2019-07-30 12:17:33'),
('12560014d9660ed2a8899e4098b6e425c6f77a9fbefa0fe42f99b469df54a5c24d2baabe4090034d', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:19:43', '2018-07-30 12:19:43', '2019-07-30 12:19:43'),
('89fccdf57f9ee3ceb194ae3a4be1556b396ec8f617d69b65360745a89604ff7639785fdc85e3309f', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:21:10', '2018-07-30 12:21:10', '2019-07-30 12:21:10'),
('f452f97ba776262a754634702e6d8eb98401b02d38f2e1f6736d75039984d1888c22b86476af5baf', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:22:45', '2018-07-30 12:22:45', '2019-07-30 12:22:45'),
('7a0d9654de90c2f4c5ad8c07f8065ceeca1d1422b5cacdbbb2e0b41311120007de555d44f4d38283', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:27:35', '2018-07-30 12:27:35', '2019-07-30 12:27:35'),
('463fe30fb9c5171b862539ed6cbff1176475ee2d494e84ec2b75de0bea0a4b65e86b0e0dc1d9a3f1', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:28:22', '2018-07-30 12:28:22', '2019-07-30 12:28:22'),
('8a2aca3175a2b685711348f6d6d9eaa17f096c7c4a12a2b0a2d4d8ae28a738a2911dcb942fca6018', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:31:03', '2018-07-30 12:31:03', '2019-07-30 12:31:03'),
('3be5afc16c122eefb3ccd88795e5d2cb938491bccb16f62a7acfe00c0d60e413d304155802258897', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:34:06', '2018-07-30 12:34:06', '2019-07-30 12:34:06'),
('dcf83b6d4cc54e5b282f3244c48f6e16c7849006cd6a8ae2bc509980c352003ba14d1369507c0d93', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:44:39', '2018-07-30 12:44:39', '2019-07-30 12:44:39'),
('8295afc1f4bbf4602480d5962753a04f266294a15386e833ed3faa6d4103ec3d43f7480d57cafbb1', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:46:09', '2018-07-30 12:46:09', '2019-07-30 12:46:09'),
('69cc22fc471de233d99316a8d6efe03993742ede12d28f8a20b16bed56b4ba93d6818fb509c7be38', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:47:24', '2018-07-30 12:47:24', '2019-07-30 12:47:24'),
('2e66fc8cf359469168e17c1c3d84886f43eb00ee69ec8a2cc8a0fef92af3048a7291021d390bda08', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:55:32', '2018-07-30 12:55:32', '2019-07-30 12:55:32'),
('891d213542a20693c2094b58bb3e75a5211ff01e176bde747fb2986d32f312388cd05ae5a03f979f', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:57:32', '2018-07-30 12:57:32', '2019-07-30 12:57:32'),
('3b496b5acce79d621b9a00b9f4f4c3d55a3df6034881dba8d0e46a2b37353c00fcdfa8b82f952fea', 55, 3, 'api_token', '[]', 0, '2018-07-30 12:59:41', '2018-07-30 12:59:41', '2019-07-30 12:59:41'),
('970966ac566676cb935a4ab7135907255003fdad866ca65b50e4c769717762b379448485dc50f9ca', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:03:49', '2018-07-30 13:03:49', '2019-07-30 13:03:49'),
('07e80bf209aaeb0a7a3d1f969caad33812a0b09432efd3f501e46c83832f5c9d77a9e5a2019335dc', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:04:48', '2018-07-30 13:04:48', '2019-07-30 13:04:48'),
('4c74bc5bcce073002c5a307081c80fa176d798033ecbba90051fc22ad82cc98b6f25cae3fccebf92', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:05:52', '2018-07-30 13:05:52', '2019-07-30 13:05:52'),
('a1305c4f56483585e1bf81b38e2565d0e9f0df6d269f985a73e61b5ee33558d3632c9ed18c3d4f59', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:06:52', '2018-07-30 13:06:52', '2019-07-30 13:06:52'),
('b672be4c43af611df28009be34c54a74b54e6fce1e1eb27645ded8d59fd943bfcca48de77f9cf856', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:12:53', '2018-07-30 13:12:53', '2019-07-30 13:12:53'),
('ff31118267692509513e401ea8a578f35f78bcfefeb1ebfd309cf54ef3aef8d2340666d6d6b7c333', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:15:40', '2018-07-30 13:15:40', '2019-07-30 13:15:40'),
('74371b6d9f7a2d849ef69f5f8754734bddc01eff9e2f5be1a9e99d003a699c1d573fce44df5d393a', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:17:05', '2018-07-30 13:17:05', '2019-07-30 13:17:05'),
('4158690883918294f4e0f8b2a5ec3cec66073d1638c4b1afe43c30a19c51eed3a00111e8fba0f826', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:21:16', '2018-07-30 13:21:16', '2019-07-30 13:21:16'),
('43479e145f57b2fb0bb1aac16ef3f31131abd720b67590f1db8336325a885b37d2cbd79fff1720ea', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:22:19', '2018-07-30 13:22:19', '2019-07-30 13:22:19'),
('4c00b726d62184378517a495e4d2400038179c5529dbff38e155d1141261c31ae56eb83fe27c004d', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:24:57', '2018-07-30 13:24:57', '2019-07-30 13:24:57'),
('957335ab3028f481189f0406028a27ddcb7cf8a266030ac5f2e6d11cad742056df73062fb05a654e', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:26:08', '2018-07-30 13:26:08', '2019-07-30 13:26:08'),
('d576c71c3803c0ab39570551f91de599ea1cb9350bba5451dbb69331e0a1d316e7c6867a957d4886', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:29:47', '2018-07-30 13:29:47', '2019-07-30 13:29:47'),
('13cbb3b8fe1fa030709b152199ee7b884b8f5caf2a7b6621c152b14dca7b053129ee86461b491908', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:30:59', '2018-07-30 13:30:59', '2019-07-30 13:30:59'),
('e246beff76d47e973c44f653bdc0144269b47a5dbc3dc9f00c6c17d645c5dbbc851bd16916f657b2', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:32:05', '2018-07-30 13:32:05', '2019-07-30 13:32:05'),
('ff0f53f422dd1667489e0d24207d5511cbca107e97ee61538249155fb0e5e2b4285d77c9d1ef0973', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:33:37', '2018-07-30 13:33:37', '2019-07-30 13:33:37'),
('a8c6e487834cba49e77a3eabb5f1213382c78e06af8ddcb296f9a893ba187b7229e28222a77f0bc8', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:35:09', '2018-07-30 13:35:09', '2019-07-30 13:35:09'),
('b1f2a3dd409db6636cdccee11ef756788b4fb26788632660af3ce7875297ad0db09250635f1f2515', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:37:29', '2018-07-30 13:37:29', '2019-07-30 13:37:29'),
('2f09c0191723bd21a5c8a3b061e7d46f5c8397245a01f3d13410e133b7657b041a37569585d09c9c', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:40:15', '2018-07-30 13:40:15', '2019-07-30 13:40:15'),
('b96ae76f854dc3ac9657afd39c1b89002a9abdbc3335eca8192eed84849197e14f2fb00119226451', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:46:47', '2018-07-30 13:46:47', '2019-07-30 13:46:47'),
('13d37a1098ecec5ff38efd75e0f01d678199c4d3b2d40aaecabe88536d64d021532347425ab33ee9', 55, 3, 'api_token', '[]', 0, '2018-07-30 13:49:36', '2018-07-30 13:49:36', '2019-07-30 13:49:36'),
('3d4768429a50f4a4de2c9e1290043b22777b57cfb756f0abbd6fef4572abdf14a02e6c9b398b2a71', 59, 3, 'api_token', '[]', 0, '2018-07-31 22:13:19', '2018-07-31 22:13:19', '2019-07-31 22:13:19'),
('99ebe2596e674d6e927daef9dadf3844e91589749aa710af3eaa2f9db7f797cae592d77cf5b2adab', 57, 3, 'api_token', '[]', 0, '2018-08-06 18:19:23', '2018-08-06 18:19:23', '2019-08-06 18:19:23'),
('aae02e64388bf148ceefc664e1c2ad264af16da6d99540b45546183eed09dadd8974baea3ada5945', 55, 3, 'api_token', '[]', 0, '2018-08-09 08:49:56', '2018-08-09 08:49:56', '2019-08-09 08:49:56'),
('368c44511ff1c46510b2336929a1764e7ee937413daa50881befc1a706de088bb9d0b675600c7b48', 55, 3, 'api_token', '[]', 0, '2018-08-09 08:50:33', '2018-08-09 08:50:33', '2019-08-09 08:50:33'),
('bfce21b02eef86ac8002d6357ef2d3f2205c7ab59bdf837b4bd2a33912d86ac5b910fa49057b6e2d', 55, 3, 'api_token', '[]', 0, '2018-08-09 08:51:28', '2018-08-09 08:51:28', '2019-08-09 08:51:28'),
('c8e8cc094f83b27aab3c8c5cedefc1dac787c78178d8dbbffbd50dd0c3a0e2d4c3b7812a51ed4a40', 55, 3, 'api_token', '[]', 0, '2018-08-09 08:56:56', '2018-08-09 08:56:56', '2019-08-09 08:56:56'),
('20f27dd9637aed2fbc51545d6070738a22e07bbb3574378cb93945d388c7a8eb88617aa18a734da0', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:06:45', '2018-08-09 09:06:45', '2019-08-09 09:06:45'),
('9f92b0baf5fef3a05eebe165e58072e4c9ed073995a85769c012777f9ad4a9f43e1c2856f56f9e8b', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:07:05', '2018-08-09 09:07:05', '2019-08-09 09:07:05'),
('f9019770dbe4d71e264229ba3577bec1e47f18c5a8d108fda99955992f1fb904d198024c71ff9d79', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:09:29', '2018-08-09 09:09:29', '2019-08-09 09:09:29'),
('9c12e88e4cb6fdd94d37056c2e13573b54eaafb2444e2cd8bfe482335c92354adfc7dfb02dd5dbb7', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:11:25', '2018-08-09 09:11:25', '2019-08-09 09:11:25'),
('9462906e32b71a7bbe9c0a483fb034409d40f4b0d65809f9ed9ae6b9193aa95a932af12240d383d6', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:12:48', '2018-08-09 09:12:48', '2019-08-09 09:12:48'),
('f4064142e59796f212bf3d03cb84ec510dbb21201a8942d21ed5b03e4e6b3ca4d1061e0846c81b15', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:46:20', '2018-08-09 09:46:20', '2019-08-09 09:46:20'),
('a8da0bf732a1f3a60afd92b0180390fa059cd1874953fe35c4caa08e2537a936386017a36a0a658d', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:54:25', '2018-08-09 09:54:25', '2019-08-09 09:54:25'),
('0203ab8e58ed56d2599e5a61422280b72d2fb18a768faa8559a750cd704e0913a750fb6881816d20', 55, 3, 'api_token', '[]', 0, '2018-08-09 09:59:30', '2018-08-09 09:59:30', '2019-08-09 09:59:30'),
('2bebcf82dfe7213e49951b3a9f08a44b5a019f8cc264187a3f42fb742c148ad5ad1ac70b1169ed77', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:00:41', '2018-08-09 10:00:41', '2019-08-09 10:00:41'),
('d9983a483c19886a55c928d07db243e031a3679cdd4395b0b6aa1835da5d28c8f38f9eadc1948970', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:05:18', '2018-08-09 10:05:18', '2019-08-09 10:05:18'),
('198ff18d5ede9ac21f591e7338b4fcdde5e095b6fe5d22b7439a0249cfd47368115613df8c8bf6c8', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:11:03', '2018-08-09 10:11:03', '2019-08-09 10:11:03'),
('ad52620d6c26cf1da7a1bbbdca118f6c0ef11f2370ddf6d9d6c2fea2bce74f6600b9d82d48c9936e', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:37:39', '2018-08-09 10:37:39', '2019-08-09 10:37:39'),
('567a302630c873156dbb0dd5be83532aa85a9d4cb03ced443be97f98ce4da697c88f5e62debcd9fe', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:43:40', '2018-08-09 10:43:40', '2019-08-09 10:43:40'),
('cb5c99db35370fe8022d24ead980cd774347153537c88cfafb8b0c29d5f8959dc8d44af941070329', 55, 3, 'api_token', '[]', 0, '2018-08-09 10:49:50', '2018-08-09 10:49:50', '2019-08-09 10:49:50'),
('75850a1a39645cedbdeabd774a5dde711e481ebddd5865337300d46bbead09d8029efbe3a37b5e59', 55, 3, 'api_token', '[]', 0, '2018-08-09 11:04:21', '2018-08-09 11:04:21', '2019-08-09 11:04:21'),
('f8d7198ba3fa91c316f1a40f7a7f3f8152ebd794ca7ffd0827fc51c26a1de90dbff730501cfbe6e9', 55, 3, 'api_token', '[]', 0, '2018-08-09 11:05:41', '2018-08-09 11:05:41', '2019-08-09 11:05:41'),
('6046f34f86878f31e4cd557b4fe46e4994a592b9dd4b22d507dab2045f6af4dadbae73246cf20ae9', 55, 3, 'api_token', '[]', 0, '2018-08-09 11:46:03', '2018-08-09 11:46:03', '2019-08-09 11:46:03'),
('2f42ab7e0382b3c238d4ef05fb99efcda837712315c4bc1f74dde15814d07982292b9eb7c180766b', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:03:25', '2018-08-09 12:03:25', '2019-08-09 12:03:25'),
('aab74ac75989ad7d0010947c21df70ebbd148587a2a19e46741488ee0457d09ded7761d15560bac5', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:08:29', '2018-08-09 12:08:29', '2019-08-09 12:08:29'),
('fc7b7167381a73caf0e78dee31e0e3455bea0ab336d9005e587ecfd7a20f650d2205e80c53fe56f8', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:28:42', '2018-08-09 12:28:42', '2019-08-09 12:28:42'),
('15e58f812df7e6308d969b831e893b0fed413c370a5249e7f363dcff786fbdad1670e473e608d6f2', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:41:30', '2018-08-09 12:41:30', '2019-08-09 12:41:30'),
('2d85ec84da47b5c284ac789975f9d2e22c55ba6c1df9a1c7b9494b8e5aec7493b50581cacf5f4d7b', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:43:09', '2018-08-09 12:43:09', '2019-08-09 12:43:09'),
('df8ba5ca5872beb5e1d9c98c91070b82a78ae6b43cfaa9191f16b5d68aef8e112c0bbcd5f4db05a9', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:54:35', '2018-08-09 12:54:35', '2019-08-09 12:54:35'),
('12e71dcb7d23c2798c6bc1764f12b77cbb91742bce0d1429bacfc844eee34c16e394d99606320c75', 55, 3, 'api_token', '[]', 0, '2018-08-09 12:58:02', '2018-08-09 12:58:02', '2019-08-09 12:58:02'),
('f849544553aa4b2c1b523e1b460b50c6aa530bda3b931c779dd58e9866f98cfd34278ef5c7e6bfca', 55, 3, 'api_token', '[]', 0, '2018-08-09 13:01:48', '2018-08-09 13:01:48', '2019-08-09 13:01:48'),
('28abf9c65f548413b908c6de5c4155796f6ef34de57523e24aa5996a03cd2b18ac0851953d39a46f', 55, 3, 'api_token', '[]', 0, '2018-08-09 13:04:52', '2018-08-09 13:04:52', '2019-08-09 13:04:52'),
('ec5fdbb082097200b250d8aaaa51b76b0d3eb410feaee77625b14fe7a6378dccf2787c0116f4f436', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:17:24', '2018-08-09 14:17:24', '2019-08-09 14:17:24'),
('0db38897d365c5d7a109f438856e08ca270997988bb4cf81d84d473a1cbefbd30bb1fd2a7d08bf99', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:19:19', '2018-08-09 14:19:19', '2019-08-09 14:19:19'),
('d376b238a4a85cd893f35e65c4b85191515d893b298c9217bb32cbf0deaba1a1f6717814cd63a58b', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:22:25', '2018-08-09 14:22:25', '2019-08-09 14:22:25'),
('4f590b550f7a6339a1f3181cc4bc8e4d5b60e2ebaaef7adc16fbc86427e973a6a95c96b13ff7ece4', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:26:27', '2018-08-09 14:26:27', '2019-08-09 14:26:27'),
('5776b2d81975c9d6f892e9af9f58555c0f0d2159c2031d9b0cace48dfe67fd61b83e0bac36603f34', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:28:37', '2018-08-09 14:28:37', '2019-08-09 14:28:37'),
('355fc43ec66cf444ec67cdef7fc36e9630aba38db1dd36de225150a023cdbf10b336f06aa2dd2d12', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:31:39', '2018-08-09 14:31:39', '2019-08-09 14:31:39'),
('041030ef0ca240200748c220df42f91d02b029d30fc00d2136d72fce804fda8574c808cacf19053c', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:34:00', '2018-08-09 14:34:00', '2019-08-09 14:34:00'),
('3ce606bdc36bf583753096e21504871f5738893ca634823de9fb8e13986604338acddf79894d9e01', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:38:06', '2018-08-09 14:38:06', '2019-08-09 14:38:06'),
('aa2bbc3440110c8d6a6062cae622f86f46de223b9adf45d891fc018da30c2deb1c70353a85e92172', 55, 3, 'api_token', '[]', 0, '2018-08-09 14:42:16', '2018-08-09 14:42:16', '2019-08-09 14:42:16'),
('008feb60bd457c2986163e097d2fa2669b3715d09036146d0b9df5db091b3ca8a3b2cda15b2d7bfb', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:01:56', '2018-08-09 15:01:56', '2019-08-09 15:01:56'),
('da7d29d72577b2f58e9381ec317f19b34f3f96f94630cf1d1dfd61e620b4811b17e007c2f5653cc5', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:04:55', '2018-08-09 15:04:55', '2019-08-09 15:04:55'),
('04c0d021c3f7060581ceba47a4835f1c312a0f3e97a5f1384964d630e662cb65abc07e591078b916', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:13:54', '2018-08-09 15:13:54', '2019-08-09 15:13:54'),
('b2fc84cab7c258a5eee517e2894ed4b696eef600dfc339ea1895f7fc1ca4479f5574c7e0c3ff0fdb', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:17:44', '2018-08-09 15:17:44', '2019-08-09 15:17:44'),
('578af353121c21607f53c62597e71185005d3d8e66dae3de1d083e7e532c0abd8d1971a36f0744a2', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:24:14', '2018-08-09 15:24:14', '2019-08-09 15:24:14'),
('6dda45723cea6b1d21bbdc7394dd76b54fe43662318933a936cb54d0b182ce81a4ec5f4837e159fd', 55, 3, 'api_token', '[]', 0, '2018-08-09 15:26:26', '2018-08-09 15:26:26', '2019-08-09 15:26:26'),
('1c9c743782f54069d80d23934a502e24a1884be16964fba3ae69fda563ce7a0af675e82eb0bbb3d5', 57, 3, 'api_token', '[]', 0, '2018-08-11 17:45:25', '2018-08-11 17:45:25', '2019-08-11 17:45:25'),
('1799c3e8acb77f2b503159fad728d1a85212e06648d7ffeb98d51dfc63b37442ab7f33b51071efbf', 57, 3, 'api_token', '[]', 0, '2018-08-11 18:03:40', '2018-08-11 18:03:40', '2019-08-11 18:03:40'),
('edeff3b9b4fb950fe5f2ef2a64013edf3d6a137f280d44291a1d183795c6b4c6a988415461f5b422', 57, 3, 'api_token', '[]', 0, '2018-08-11 18:16:58', '2018-08-11 18:16:58', '2019-08-11 18:16:58'),
('b58a43c8c42e6986e8966f08fe039b39e061138b955cde4f497b6a8922e16f71d3c734061bb7726e', 57, 3, 'api_token', '[]', 0, '2018-08-11 19:06:37', '2018-08-11 19:06:37', '2019-08-11 19:06:37'),
('8b020d9285c23a240f71fc6ea6259a3b9bf3cc7fcbf34573d470a71faff9ed456831ea5b86d767c8', 57, 3, 'api_token', '[]', 0, '2018-08-11 19:18:38', '2018-08-11 19:18:38', '2019-08-11 19:18:38'),
('f9f386c197085761d453a0a53339672e735320b948ff887e1803713194966d7ccddec4c38c224522', 57, 3, 'api_token', '[]', 0, '2018-08-11 19:24:14', '2018-08-11 19:24:14', '2019-08-11 19:24:14'),
('74e399d4bbc0238553c0575c56e9e15c391d00dd42e9ce388149d595e65dfd28713b5e4ba0f1b5fe', 57, 3, 'api_token', '[]', 0, '2018-08-11 19:35:04', '2018-08-11 19:35:04', '2019-08-11 19:35:04'),
('b9b0657529eda2d8883bec96381b1473a018618e251b5450f43b086ac775309f3eea6325937efca8', 57, 3, 'api_token', '[]', 0, '2018-08-11 19:45:34', '2018-08-11 19:45:34', '2019-08-11 19:45:34'),
('e4a8ad34f88e77807afac118983b068a2a03b6b27e273ad1cd50a2464198f7922bb80fd3132dc629', 55, 3, 'api_token', '[]', 0, '2018-08-13 08:41:19', '2018-08-13 08:41:19', '2019-08-13 08:41:19'),
('26cfb72f7ebeab821a6b39e983deed6e2e5c776019da4e44c996b82894d3c878453e100a3de0a63f', 55, 3, 'api_token', '[]', 0, '2018-08-13 08:44:20', '2018-08-13 08:44:20', '2019-08-13 08:44:20'),
('8caf419fc70c9ff702e3e165b29f42a937a75f4798a111c5b8bb581dd458a63f393b0a717fcfff17', 55, 3, 'api_token', '[]', 0, '2018-08-13 08:50:11', '2018-08-13 08:50:11', '2019-08-13 08:50:11'),
('79d309a6c868f621c8409a310d3d55779285a3b24f27e7dca6a468548dfecef13c17edb80093dcaa', 55, 3, 'api_token', '[]', 0, '2018-08-13 08:56:22', '2018-08-13 08:56:22', '2019-08-13 08:56:22'),
('4a11aec7694ac5906973b22c58a36cb060a2cc9d064c4c027ef90b3e35407427be11efc0f9a3fc19', 55, 3, 'api_token', '[]', 0, '2018-08-13 08:59:04', '2018-08-13 08:59:04', '2019-08-13 08:59:04'),
('7b19ced2aa982690dcc931ae676aed9cba0fc0fc267817605f6d12f4de9271c1b28c7a4dd36725f2', 55, 3, 'api_token', '[]', 0, '2018-08-13 09:08:03', '2018-08-13 09:08:03', '2019-08-13 09:08:03'),
('7970c619d38349b83103a13dde372d7d5cb4f2f4f03b3bcfe0f0a6b93e456cce58b7e80eed9cdc29', 55, 3, 'api_token', '[]', 0, '2018-08-13 09:22:10', '2018-08-13 09:22:10', '2019-08-13 09:22:10'),
('2884eedf480ad9d003c3a218ae349fb5c962509642275ad48678e9d128d4f1b620dcb265d56496cf', 55, 3, 'api_token', '[]', 0, '2018-08-13 09:25:08', '2018-08-13 09:25:08', '2019-08-13 09:25:08'),
('24ca503e510372a0673d5e9f67af86d52e593294e7320da0737d48a1103215c2f6dbb1e86b5ca5c6', 55, 3, 'api_token', '[]', 0, '2018-08-13 09:33:24', '2018-08-13 09:33:24', '2019-08-13 09:33:24'),
('2a66677aecf96412aa6aed257f3b9d33763f8fe77036826d7e025d6789c94dbf47690f7763e62ed0', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:09:00', '2018-08-13 10:09:00', '2019-08-13 10:09:00'),
('bf0c270c22d523837bf3b5babeab7bf8ca91be6365bf4e02f91c1f3941459689748a8df440d838aa', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:14:52', '2018-08-13 10:14:52', '2019-08-13 10:14:52'),
('594bc6e9f6fe18f2cb9d5d86de88fbfbbcaaa5e95c70d577cf8de7ea4fd1807e558eb1da91164b90', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:18:34', '2018-08-13 10:18:34', '2019-08-13 10:18:34'),
('c12bd654b17cb83c611602935907d434dab1ffd5631bd5df8354975f937f04d40838422e85ca81dd', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:22:52', '2018-08-13 10:22:52', '2019-08-13 10:22:52'),
('153d444779c4cf1718eb6ab028b805c6660afe45e46adec26d27873951693b43513792c345d2db55', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:33:14', '2018-08-13 10:33:14', '2019-08-13 10:33:14'),
('d72a4da22225831caeabb4c847b2cde360a54e428b08d5df414ec62d9bfc036372d074deec63fdd6', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:35:29', '2018-08-13 10:35:29', '2019-08-13 10:35:29'),
('0f56d7431a0450c3204ef0bd6da037554ef90d99e3220338659b363bd743daa0bcb08429004246f3', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:40:06', '2018-08-13 10:40:06', '2019-08-13 10:40:06'),
('6dfadc283923281a923a17d63e38af83e80774f2b5aa3c178878905b10419af5c270aa0dbef0c01b', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:41:32', '2018-08-13 10:41:32', '2019-08-13 10:41:32'),
('b50451aaebcf0ca06d3763048783b59c0860c5cbb30db33eb4f7ce5966455e29089100434af9dd21', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:49:12', '2018-08-13 10:49:12', '2019-08-13 10:49:12'),
('fee13fda140eed5e48f7a42ab07f64d465407c8213a9046f310661b6d259ff60a61651799c131aad', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:51:00', '2018-08-13 10:51:00', '2019-08-13 10:51:00'),
('2dc148dd1e2909f147ceb793801eace999aaeff8b79a779902b845fbdfffbd28910e367b03963826', 55, 3, 'api_token', '[]', 0, '2018-08-13 10:57:28', '2018-08-13 10:57:28', '2019-08-13 10:57:28'),
('84b18eba09620ea1b68895e149f7902a53e037e2698a19a8454bdb7a66097f6dfcce7527ddf336ef', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:01:14', '2018-08-13 11:01:14', '2019-08-13 11:01:14'),
('612fb11c37d9564143e0a1ccfdc76cdeb6a30dedd6bcf10a571d65c9a9f4af33020ae70e26d5a0c8', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:05:03', '2018-08-13 11:05:03', '2019-08-13 11:05:03'),
('9e7d1b468ee9b4bfc44ccd73a26340d57dc8502db18bc56d210b26b12470b20a56f47a81402fa45f', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:08:42', '2018-08-13 11:08:42', '2019-08-13 11:08:42'),
('eff5ae2ca5b4cec79336907a7e6b836b4cf78426285f94bc8862cdd5d5756dd530897697a71de067', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:09:23', '2018-08-13 11:09:23', '2019-08-13 11:09:23'),
('db97ed30280ff3f4a22dc3173d826a1379658b6be7172a9033b0d4a49cb01e8c23ef8c9796c91788', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:11:34', '2018-08-13 11:11:34', '2019-08-13 11:11:34'),
('d4d12b5e972cab141457b1dc444cbd59393c13d3698a933ec55e42bb021e972e38dd49c97c34ad77', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:12:24', '2018-08-13 11:12:24', '2019-08-13 11:12:24'),
('c681690912b0ccfeb99163664ba67edf9cfcf5fd53ffa0e57ca9a17f57a906d78221b4e81dbebfc3', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:48:47', '2018-08-13 11:48:47', '2019-08-13 11:48:47'),
('ca7dd364b226c4f4e2869bf5c5ff11968efc45e56c255f99af9c5699dcea8aa66a9b371a748b7500', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:50:44', '2018-08-13 11:50:44', '2019-08-13 11:50:44'),
('2e7c3787ca60d4a28bd812e3862c0a4efaa4d2eba1968e34edf2c66032e7d30e9f09fae623b9411d', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:54:14', '2018-08-13 11:54:14', '2019-08-13 11:54:14'),
('ba993668f4065244df17cc3162535416b3ea03b87e0b88e13f0f38f34a8ec4c3e9f6269a5b1d977f', 55, 3, 'api_token', '[]', 0, '2018-08-13 11:56:51', '2018-08-13 11:56:51', '2019-08-13 11:56:51'),
('0b551dc2df14e6dbe30a2bc1832b7d462862c65b5335ee4b37c301546449594b67105c14abf9d18d', 55, 3, 'api_token', '[]', 0, '2018-08-13 12:05:49', '2018-08-13 12:05:49', '2019-08-13 12:05:49'),
('5b9f55db576358be1948cd827736182f0b51bba0e16863698bcb20c5bb575a41fbb6d4eaba1bad4e', 55, 3, 'api_token', '[]', 0, '2018-08-13 12:09:00', '2018-08-13 12:09:00', '2019-08-13 12:09:00'),
('7f707f70caafc243bfbc6f38e1d50735aa092223eeada60ccca0d1860d1026ccc4629412aafc7932', 55, 3, 'api_token', '[]', 0, '2018-08-13 12:30:26', '2018-08-13 12:30:26', '2019-08-13 12:30:26'),
('0f8fa149ef6946a2f41c7ab3ee8b0ce58fefa322690912b814af46bad4d75a3b8d288aca9968ff81', 55, 3, 'api_token', '[]', 0, '2018-08-13 13:58:06', '2018-08-13 13:58:06', '2019-08-13 13:58:06'),
('bda82b0b5f6edbd136ba856d1e678c739b6ce761a8903f9b03cabe062604f6898fb93d76eb4ffd8d', 55, 3, 'api_token', '[]', 0, '2018-08-15 09:38:04', '2018-08-15 09:38:04', '2019-08-15 09:38:04'),
('388d5a6c0502924bb30db0e7a0be40a1c9186d02fe7f3448e941dbe93ce009242ca1f09b05d25d13', 55, 3, 'api_token', '[]', 0, '2018-08-15 09:48:43', '2018-08-15 09:48:43', '2019-08-15 09:48:43'),
('7bbc81601ba02c218a417ae2339eb2de566e2779e9fdb5ff64a3eadb481d62a83fe8f6aff953a7e3', 55, 3, 'api_token', '[]', 0, '2018-08-15 09:51:41', '2018-08-15 09:51:41', '2019-08-15 09:51:41'),
('ba12d85cdd05bddb48fdbfdb8056565522af3ac014f3ffd0cfd96f8a504437e41f52af640ee06211', 55, 3, 'api_token', '[]', 0, '2018-08-15 09:56:53', '2018-08-15 09:56:53', '2019-08-15 09:56:53'),
('cbb40fe3a887f70e2606eab534f5d770e239e6887f722bff9ccd92247055837f6c972c7c588bd068', 55, 3, 'api_token', '[]', 0, '2018-08-15 10:49:03', '2018-08-15 10:49:03', '2019-08-15 10:49:03'),
('e0a9bb80a374c7cca4fb7f3a6d633d62247a8dd30ce508604b994ebea935ea6ce948a789fc272f19', 55, 3, 'api_token', '[]', 0, '2018-08-15 10:49:55', '2018-08-15 10:49:55', '2019-08-15 10:49:55'),
('2aa2c0062c38f33426a3a036f17f7e02d154c1aaeb99855bd914324260e9ca079fea2cedd01747b2', 55, 3, 'api_token', '[]', 0, '2018-08-15 10:55:13', '2018-08-15 10:55:13', '2019-08-15 10:55:13'),
('8bd96f2b92126d2344ab9d1b7056da64a2b6d13bab6cb148f6f1f6903fe40eb1d26cb30f7fec4af6', 55, 3, 'api_token', '[]', 0, '2018-08-15 11:01:32', '2018-08-15 11:01:32', '2019-08-15 11:01:32'),
('6c55456a20c7d06e561352b20ca59598bc2db5b3a97cd2f393c0f839694b957c937ec52f9d45cee1', 55, 3, 'api_token', '[]', 0, '2018-08-15 12:34:39', '2018-08-15 12:34:39', '2019-08-15 12:34:39'),
('ec3a3d41b6c34528ee61953536ec5c8257682108d0366559d5b5f48033dc6e21279eb7b4bc1d52a0', 55, 3, 'api_token', '[]', 0, '2018-08-15 12:42:34', '2018-08-15 12:42:34', '2019-08-15 12:42:34'),
('681de2db09935210e89b82f8733c62c96c39afb86224615664f7956691966eb195443d1f2aa4b539', 55, 3, 'api_token', '[]', 0, '2018-08-15 12:47:30', '2018-08-15 12:47:30', '2019-08-15 12:47:30'),
('786c614c0692b2a4b52a49692a2477d9fb74dc7f044ac5be8ad69f5c1be0ba979a4c23cbb4fec90a', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:20:34', '2018-08-15 13:20:34', '2019-08-15 13:20:34'),
('8b2c2da9f09a35b273985ff5e65be6302a9ce6d44a1c63cea913367c4e944629ba1f10002ea7b0e0', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:45:59', '2018-08-15 13:45:59', '2019-08-15 13:45:59'),
('86893b799c002a9d87475b100bb14db97e7e0558c69a167fe886e5c1def1df9865614a3b136ec3c5', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:47:25', '2018-08-15 13:47:25', '2019-08-15 13:47:25');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('4e0ce8dfacd060e30870be63cc96966a7a02b4494859b273e93397cfb3e25c019447384c3bcd70c8', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:48:46', '2018-08-15 13:48:46', '2019-08-15 13:48:46'),
('88bd4996bffb00d6761ffb897d1106763a61f650d8e14636287eb5e703b41c8f851c62a8c0f91098', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:49:50', '2018-08-15 13:49:50', '2019-08-15 13:49:50'),
('5ad43274dfd86fc4f6b1243d6e9dd1598da8e5b8fded3147372e116554e683303b0727efc1cf89bb', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:51:28', '2018-08-15 13:51:28', '2019-08-15 13:51:28'),
('775c6b2df7ded9660d2a290d203949fd36a5b2471481419354dfc4a3e9bcbaa1c880faf1426c0e37', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:53:46', '2018-08-15 13:53:46', '2019-08-15 13:53:46'),
('cf2a6a496a39f5b805c101d0c60b366f4bade090a1fd90235e23e727c49372bc70d27431d10728ee', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:57:37', '2018-08-15 13:57:37', '2019-08-15 13:57:37'),
('078970776e26df46eb5bd6559edc36bfa172504c559893bb1138f9ebfcda7860f1ad346b3d4395fc', 55, 3, 'api_token', '[]', 0, '2018-08-15 13:59:28', '2018-08-15 13:59:28', '2019-08-15 13:59:28'),
('fe07c64f713707bd26a1b6f51bed363a070cc12c80197fa858b003531436e2df0f280180f1fa3b4e', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:01:16', '2018-08-15 14:01:16', '2019-08-15 14:01:16'),
('45031b29d65dcae96587eb71c4a5753c41da1fac2b5283e88e43b1d9b648b50cdc9dbfb6d74dfeba', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:03:42', '2018-08-15 14:03:42', '2019-08-15 14:03:42'),
('159d8a6058bb73938816a6decdad38f070be29f232531060def0eeb09356efe4b515969936114fd3', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:05:11', '2018-08-15 14:05:11', '2019-08-15 14:05:11'),
('c6a6c06177c6ac329ac62a13bc74449a1d6f9f36bd3c5096a3df40816f3a48271f66d84dc910a27c', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:11:00', '2018-08-15 14:11:00', '2019-08-15 14:11:00'),
('deb44f9eb3d02cfb5354c72aa9498f82298a297b377f8486e07e7bdd125219308632c1b04b287ec0', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:15:47', '2018-08-15 14:15:47', '2019-08-15 14:15:47'),
('45026c2ea8a47a552a812dc1b6180642c77677bf9e8067e9a366469a3fa6b3678d279df0eb8f4b9b', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:30:22', '2018-08-15 14:30:22', '2019-08-15 14:30:22'),
('f1c699eba456060a8cad32e42bddfc6da0d21184b6454467f313c9abce7ad626f379f055c3b0009b', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:34:16', '2018-08-15 14:34:16', '2019-08-15 14:34:16'),
('ceaa5b1481f94f8b8e5bde77ff70fb9a8567353ca7c55bd9fa06c2ab3e678dfc9a4f88b6925a2cd9', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:40:06', '2018-08-15 14:40:06', '2019-08-15 14:40:06'),
('e21f8683a975352696ba27e97924053fc77aecbe5d7f6fe5f573651387113706bd4e7172e4b67792', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:43:06', '2018-08-15 14:43:06', '2019-08-15 14:43:06'),
('4e5e8c04aca3db6559d7912bb8e97a2d0c227ae8074f313ee68763e3bad2f1d64c0241119efb6086', 55, 3, 'api_token', '[]', 0, '2018-08-15 14:48:03', '2018-08-15 14:48:03', '2019-08-15 14:48:03'),
('7362b7191e3b6b4be94284d36805f55a23ddfe2cfd4beeeeb71748e302f9b9f7daa340f92446fbf1', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:13:01', '2018-08-15 15:13:01', '2019-08-15 15:13:01'),
('a1775b7469fe456ccab6e8becb169a856a84236c2e4de22107f0e20fbaf70471302875068281a50c', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:14:44', '2018-08-15 15:14:44', '2019-08-15 15:14:44'),
('c9a5dff8107dc89d1eeff4429ac04b1a5f10d339033a41e97743388e55facdbfffecf9ab06ff2f86', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:32:42', '2018-08-15 15:32:42', '2019-08-15 15:32:42'),
('dcfbb4fb176a1b2e42fb1b0b67e684cdf23bf2551452c035d5e4ab87780f02e700bd64144f81b3ec', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:35:50', '2018-08-15 15:35:50', '2019-08-15 15:35:50'),
('44b55e46fee884dbfdf515e20dc0359addceeee5c77e6a6873b932c81ba59e6841eb8362a550ec06', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:38:59', '2018-08-15 15:38:59', '2019-08-15 15:38:59'),
('ca9ac2bcb2fdc63910c81aefa1793ee6e73991e886ddb1f9247e3f1bd31c73a8fb39510a76b8ff0d', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:40:30', '2018-08-15 15:40:30', '2019-08-15 15:40:30'),
('b5ece4a29b74c432cac9717772e22a98ff6606216b43900db0cd715002eea7cb9da4461019c525d5', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:41:35', '2018-08-15 15:41:35', '2019-08-15 15:41:35'),
('a7b05a56b29ff0556436dbce08bc0f1c75fbdbca290bca31636e76458c9fac7b039fa7b722e829af', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:44:26', '2018-08-15 15:44:26', '2019-08-15 15:44:26'),
('41b28541e45c0f5e7aefda552529fd3e555a8f59184aa1e669cb1b1043b6cb812db5eedcc308dbc7', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:46:08', '2018-08-15 15:46:08', '2019-08-15 15:46:08'),
('14f3a5fd552ce71c28db05e168357249f8f8c0822f197a46b7eb46681bb7e72b96c764ee617551d8', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:48:48', '2018-08-15 15:48:48', '2019-08-15 15:48:48'),
('d4abfc48098c1bcb67ee091caf01483f41cae9cdf7bbb46d0319101d0ee3966450af96db8e1cf022', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:50:09', '2018-08-15 15:50:09', '2019-08-15 15:50:09'),
('bd7a7576d7186184b8733a4cabbd150c193de9d0970f57de4410321622aca2b625e3a35f7eb195b0', 55, 3, 'api_token', '[]', 0, '2018-08-15 15:51:34', '2018-08-15 15:51:34', '2019-08-15 15:51:34'),
('b15557a44123319088f095ac0c2a0423dff544becbac52fdfc7cfef3c13f1294b42156b156cbcbd4', 55, 3, 'api_token', '[]', 0, '2018-08-16 12:08:28', '2018-08-16 12:08:28', '2019-08-16 12:08:28'),
('487a9e327c2f8a3c8b3ea72b33453485b662f5ff60ba2c8cda4d26f58315cd12599a1a560a6dfc95', 55, 3, 'api_token', '[]', 0, '2018-08-16 12:25:36', '2018-08-16 12:25:36', '2019-08-16 12:25:36'),
('40a2dc0029fdf956db17632c5647438faaa796e05473fa994e0c35e4b2f08b523620a065bbc6e196', 55, 3, 'api_token', '[]', 0, '2018-08-16 12:37:39', '2018-08-16 12:37:39', '2019-08-16 12:37:39'),
('13a5d6c20736c697814ee6d62b9988f98c6cad5cc85f0da42dd10dec6cd0da5a88705b304ffa53f5', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:05:57', '2018-08-16 13:05:57', '2019-08-16 13:05:57'),
('7090f1e665ef372c46d0fc25e4b7b48ca13ecaaa2f18797ceed9d6f2a8dceb7f9507933edd142c79', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:08:36', '2018-08-16 13:08:36', '2019-08-16 13:08:36'),
('3eee5ed358bb944f4ec6a5670a732dd26a46ae600ab864628195aa953dfa1a7a41db78ba837ca124', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:11:50', '2018-08-16 13:11:50', '2019-08-16 13:11:50'),
('321b3a87a1555de400cfb29fd316b616d316f86554c3161cb89f2003746c6ac0beb4d3b6c8665952', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:15:40', '2018-08-16 13:15:40', '2019-08-16 13:15:40'),
('6eda0eb454b55a307dac544a215b953e6dcdc072ab824bc88e33e539d05d9dda26691b362ae92737', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:27:05', '2018-08-16 13:27:05', '2019-08-16 13:27:05'),
('a211d5c6acf6818df6355cbec151d434102f806c6e3dd805f57dee4d1abda81228fb9df9d0b86860', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:40:42', '2018-08-16 13:40:42', '2019-08-16 13:40:42'),
('c68081464647439064cb340be26e3a9db18a77709e8d0e7a392716a28e7c490954f422f05b402c41', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:43:05', '2018-08-16 13:43:05', '2019-08-16 13:43:05'),
('af0b394592827c6fbec3db139d000c9989848007fed6220877d68917a793f7b3c36cf025ae92b0d0', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:44:00', '2018-08-16 13:44:00', '2019-08-16 13:44:00'),
('b78997c6994766536de210008e046a3128d42768666b8d6bc0e11274d2abee12a764f1092cbfa0de', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:45:03', '2018-08-16 13:45:03', '2019-08-16 13:45:03'),
('ff36887f6e9d759119078399a0a4b41983bdb634afdab31289d6608423d45f8187ddc8e48a04fb64', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:52:53', '2018-08-16 13:52:53', '2019-08-16 13:52:53'),
('bd47b495bbbfb8cad083a0bc6d4e25fbf8270cb02bf7b8ff69b0591d4f6f8b3f5f023cf7b4ec4b6a', 55, 3, 'api_token', '[]', 0, '2018-08-16 13:58:24', '2018-08-16 13:58:24', '2019-08-16 13:58:24'),
('6b1b67d731e297fab735d4cb7041601ae04fe78d209ab154aac38bf84db629a7ca4fa4ff019fa979', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:01:04', '2018-08-16 14:01:04', '2019-08-16 14:01:04'),
('01dab0f3e9add95a8561f3bcb749c6303bc0402bece02aed453d505564b062c6a9c987d46030cc9c', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:02:28', '2018-08-16 14:02:28', '2019-08-16 14:02:28'),
('11c158baa1cb8284fa8e2eccf8cb21c1489c2548ac272a3686b61971cbdca785ddea8e77b95c5998', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:03:19', '2018-08-16 14:03:19', '2019-08-16 14:03:19'),
('5f1a4f57d2e3c8ebdf8c67c047563172f66e7d3ca9b8a175b46e3716292aabc39836acddef9d7f64', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:08:40', '2018-08-16 14:08:40', '2019-08-16 14:08:40'),
('5c81902c35103f07aebfafbcd4ba9ec8a9f1ccf80569d0cd8d381fc91d8f04ea2815e9368e03f712', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:11:14', '2018-08-16 14:11:14', '2019-08-16 14:11:14'),
('34147a66dbeb60d9139a91388cd663aa395ba218bd454871e77cba988d24b7cc051de3e8e8a43109', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:13:23', '2018-08-16 14:13:23', '2019-08-16 14:13:23'),
('d2fac2ea8a38e2204f605a60dba32eb052954e34059c9f45cf70ed31876c98f34e962c1c57beec81', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:15:15', '2018-08-16 14:15:15', '2019-08-16 14:15:15'),
('91b5de0059497fbf2eb4bc73f7897f20f904c32960c757a40214f18b3d0a2965863ddc4f32a02713', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:20:07', '2018-08-16 14:20:07', '2019-08-16 14:20:07'),
('69e155fa5a879ff7556971ac353bd90bdde3c04992e622b444bd88c7d4d9e07234a50929a6ce33bb', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:21:35', '2018-08-16 14:21:35', '2019-08-16 14:21:35'),
('b91bfe8f2ddb37d363e559ea099772b2f5d33c8efa74dcc44efa8e444d394eb159ac22095475f509', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:22:01', '2018-08-16 14:22:01', '2019-08-16 14:22:01'),
('fc052fe56e53b824da10631187aadfb3c170517e3e935fda78fcf1c04c65f649c3a2744a47e1c4ef', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:22:49', '2018-08-16 14:22:49', '2019-08-16 14:22:49'),
('48f86750be21e1a412005557594285a4010e5978c1716db6945159b7ac45c3aebfdc72f1ebf33a33', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:23:42', '2018-08-16 14:23:42', '2019-08-16 14:23:42'),
('750b25fa016f331339ff277e4676f3330f9c4ee37dc69ebdefccbd951e1d9397755eafafc7c8f9d1', 55, 3, 'api_token', '[]', 0, '2018-08-16 14:24:56', '2018-08-16 14:24:56', '2019-08-16 14:24:56'),
('1fb3a8f687242220b2bfcd0aff964b6bf58fc21f1a4f2ffc641b4fe5a557212c23304c88c50e18b5', 57, 3, 'api_token', '[]', 0, '2018-08-16 19:49:17', '2018-08-16 19:49:17', '2019-08-16 19:49:17'),
('2ed1ec70fb7d7b35694f8467729a2097d178b776920d19d84756ae1e70f2dd5573f34390e45b889f', 57, 3, 'api_token', '[]', 0, '2018-08-16 23:21:29', '2018-08-16 23:21:29', '2019-08-16 23:21:29'),
('d051e4f82e1b18db1f1f429c1172f7b8039cfe252e075b0627825df87844341efe7b845e28164bae', 57, 3, 'api_token', '[]', 0, '2018-08-29 20:14:09', '2018-08-29 20:14:09', '2019-08-29 20:14:09'),
('1db29c0d695be155a4c8f3249cea89e7ae699e0736b6b10dc7d38fa6232dd36a8431cc53fad66393', 57, 3, 'api_token', '[]', 0, '2018-08-29 20:48:38', '2018-08-29 20:48:38', '2019-08-29 20:48:38'),
('cb220712cd06b527d9673c85b98040e75535e500547a96f36b8677906be96732064424aebd6f0f7b', 57, 3, 'api_token', '[]', 0, '2018-08-29 20:54:48', '2018-08-29 20:54:48', '2019-08-29 20:54:48'),
('21fac82ecfd0291264125d4e291b9446b4447debc10cce2dd8d51c298645297089c9664dbc68dfe1', 57, 3, 'api_token', '[]', 0, '2018-08-29 21:22:42', '2018-08-29 21:22:42', '2019-08-29 21:22:42'),
('0d7fe5da64cf8b649e50b1751c4bdebb7f44f780a5197a304a6e0954fe172b4eeb7a79a398806b06', 57, 3, 'api_token', '[]', 0, '2018-08-29 21:40:04', '2018-08-29 21:40:04', '2019-08-29 21:40:04'),
('2a67596a4d2b87468ee0350920ee427590c842151085b4448e1be688dc8048ef62458f5e12d727a2', 57, 3, 'api_token', '[]', 0, '2018-08-29 21:56:04', '2018-08-29 21:56:04', '2019-08-29 21:56:04'),
('da68b78802b4e9d87a017f489ebddac4e8cc574a3478914e5375eeeae0df7ca9929073e4a9e36c80', 57, 3, 'api_token', '[]', 0, '2018-08-29 22:03:15', '2018-08-29 22:03:15', '2019-08-29 22:03:15'),
('9d027fec8fc34070b6f27d9b30abca1ca4c9739fcd372e868acfd4b026afc4d14b16cf6706549a79', 55, 3, 'api_token', '[]', 0, '2018-09-14 19:15:27', '2018-09-14 19:15:27', '2019-09-14 19:15:27'),
('947d53041cb7287f4f84e9daf908ff32e708531492f3290e856609ea548230c9670fc31449cab047', 55, 3, 'api_token', '[]', 0, '2018-09-16 15:01:31', '2018-09-16 15:01:31', '2019-09-16 15:01:31'),
('3f3bb4fb995d67ad0cbe969ef96e7f08db29ab4262c76d215825fbabdefb4781633559658d288f07', 55, 3, 'api_token', '[]', 0, '2018-09-16 15:03:59', '2018-09-16 15:03:59', '2019-09-16 15:03:59'),
('729ff7d390d4e0b6b55987abc1c88eaf855634c73e82fee762dae9e40c412f01ff55de720bcb76f8', 57, 3, 'api_token', '[]', 0, '2018-09-17 06:40:12', '2018-09-17 06:40:12', '2019-09-17 06:40:12'),
('d104894cb97c11c65ab3b6c372ec052eeb7f63538b002552a11e8e179d3c993be2d9cca32508da25', 55, 3, 'api_token', '[]', 0, '2018-09-23 13:54:38', '2018-09-23 13:54:38', '2019-09-23 13:54:38'),
('9b254bc7a6613627666333c60d8ced8365515a647e7e25f525246476c99ee54861d9b52a42d934cc', 55, 3, 'api_token', '[]', 0, '2018-09-25 09:34:26', '2018-09-25 09:34:26', '2019-09-25 09:34:26'),
('6a65e0e455f20f995b23aedcc277ffdb13c7c5270d0c1ea743ab9a85f35c5f483ac852c13808b199', 55, 3, 'api_token', '[]', 0, '2018-09-25 09:35:34', '2018-09-25 09:35:34', '2019-09-25 09:35:34'),
('4cbad42a06c046aea6384f62d6b55749754aba93a00720f6b1eae12ca923ed582732215b5fbd21b0', 55, 3, 'api_token', '[]', 0, '2018-09-25 09:37:49', '2018-09-25 09:37:49', '2019-09-25 09:37:49'),
('2b4a1bb9be15d1f9f9f6cf2426b2013beed77a8fbf0eef9e20e807ce73872782cffd4cc8a3696929', 55, 3, 'api_token', '[]', 0, '2018-09-25 09:43:40', '2018-09-25 09:43:40', '2019-09-25 09:43:40'),
('02c88c0aaad1e1a51617c3c3c1d90f82d74eaa4bb4d6f271cedd1af48d5dce36aeb011daa31b0149', 55, 3, 'api_token', '[]', 0, '2018-09-25 12:42:18', '2018-09-25 12:42:18', '2019-09-25 12:42:18'),
('235838ac901e8930dacc078182674e2d1e894e2f8d0cfc7a651255fc264ad50b93a5e02749f85807', 55, 3, 'api_token', '[]', 0, '2018-09-25 12:45:39', '2018-09-25 12:45:39', '2019-09-25 12:45:39'),
('800f1ee730b609e44aa566364183dc202a5f5ad925bee2328826cac9c3d5ce8789b48c9d4abfee62', 55, 3, 'api_token', '[]', 0, '2018-09-25 15:33:16', '2018-09-25 15:33:16', '2019-09-25 15:33:16'),
('54eb87936eb2469addcf69ef52ef430ede395b2f2863bf62d5a6ccd98964b26755b7764c46f974c2', 55, 3, 'api_token', '[]', 0, '2018-09-26 14:25:41', '2018-09-26 14:25:41', '2019-09-26 14:25:41'),
('2d23fbf22c228bbd8d110d1c88adce8d19ad562de4c22fe7adb5d0c375122d902b177dff07b3f939', 55, 3, 'api_token', '[]', 0, '2018-09-26 14:26:10', '2018-09-26 14:26:10', '2019-09-26 14:26:10'),
('8384729c2e32063e7100a2589e58bdca884b5d1bc0ad1f163ccfbeb3c66930c9e6d1445e541b1c22', 55, 3, 'api_token', '[]', 0, '2018-09-26 14:40:16', '2018-09-26 14:40:16', '2019-09-26 14:40:16'),
('ae47caa2321d733f64ed79c57e542071d03923f46fa1444bce69f8e5b6fac606d80109243304a9e5', 55, 3, 'api_token', '[]', 0, '2018-09-26 15:56:20', '2018-09-26 15:56:20', '2019-09-26 15:56:20'),
('ad40e731a6d3f65631d7a509b7ff57e4f3a592c821caa80a0da60f785df882f2c9da003afc46f6c4', 55, 3, 'api_token', '[]', 0, '2018-09-26 15:57:18', '2018-09-26 15:57:18', '2019-09-26 15:57:18'),
('aea263f68266c51603c60aed4f6cc43aa299b1b990b6ef01e51418526978b58ab7b4de7ba7485b91', 55, 3, 'api_token', '[]', 0, '2018-09-26 15:58:43', '2018-09-26 15:58:43', '2019-09-26 15:58:43'),
('7c14032fe1e250479898a072e36456352a0abd762282e966ff14e2c3f549682e7e44df8b51ab4b26', 55, 3, 'api_token', '[]', 0, '2018-09-26 16:00:07', '2018-09-26 16:00:07', '2019-09-26 16:00:07'),
('e903aba7369d9bafd46379effab507fd41e3321ce9704593f814448d88b180d6a123198befe22fe0', 55, 3, 'api_token', '[]', 0, '2018-09-26 16:00:23', '2018-09-26 16:00:23', '2019-09-26 16:00:23'),
('a1e692945b5c3eb8d2101b8ab6f1d86453f390371e194314490a13e8276272776254c49484967d96', 55, 3, 'api_token', '[]', 0, '2018-09-26 16:45:40', '2018-09-26 16:45:40', '2019-09-26 16:45:40'),
('641467c9c43b40c04aa767567ed1cd46aac1326bf02ef15bff31d4821fab41d5f6af6fa9ea0d8283', 55, 3, 'api_token', '[]', 0, '2018-09-26 20:11:02', '2018-09-26 20:11:02', '2019-09-26 20:11:02'),
('a93a9c819902c9719544e36b41417128f68c056304e1b8c1d1448e5c11856264a45ab10463e549f7', 55, 3, 'api_token', '[]', 0, '2018-09-26 20:12:35', '2018-09-26 20:12:35', '2019-09-26 20:12:35'),
('7ecbf73c5b0691c1079ccc2cce800613b7469093c9348c356b9218cc19762f3b3b7a1f13463096dd', 55, 3, 'api_token', '[]', 0, '2018-09-26 20:19:49', '2018-09-26 20:19:49', '2019-09-26 20:19:49'),
('9b886f0a54244ac65a91970d3a79b3db954aa41b5cdd76327f7731749a36e46f81792a655549114c', 55, 3, 'api_token', '[]', 0, '2018-09-26 20:23:11', '2018-09-26 20:23:11', '2019-09-26 20:23:11'),
('daa167dde8f8ad2b82321da393953d3f2106938b16445bb027aad763bcbd2bf952d20416ca3a93f9', 55, 3, 'api_token', '[]', 0, '2018-09-26 20:41:04', '2018-09-26 20:41:04', '2019-09-26 20:41:04'),
('30cc21b8c83d39ddc8d9ed657ab55690983e8ea071e614bdc0cedb52ef89b66903d97d94f895f281', 69, 3, 'api_token', '[]', 0, '2018-09-29 18:06:21', '2018-09-29 18:06:21', '2019-09-29 18:06:21'),
('70baeaf61e26de7910d904c5c08584b95092d03a57481d8ce1591bb1f7167397abbfc3a3f4b7dccf', 69, 3, 'api_token', '[]', 0, '2018-09-29 18:23:38', '2018-09-29 18:23:38', '2019-09-29 18:23:38'),
('debd6e7be7b46effc9b53839876ed9694fcd73669e9e93a0722fe1a590f9b225b09a84f6f32e59a1', 49, 3, 'api_token', '[]', 0, '2018-09-30 12:27:27', '2018-09-30 12:27:27', '2019-09-30 12:27:27'),
('07527161da6dfdeb64fc48448c7d71f7fe4b1fa5f8312cefcf6345221280bf308aef18fa4ed2a8c5', 49, 3, 'api_token', '[]', 0, '2018-09-30 12:27:43', '2018-09-30 12:27:43', '2019-09-30 12:27:43'),
('51dad90245d608fb3367f502f1d772b2df6b96841b874cbb15aa145fabdb83ed7acdbed7e41d1777', 49, 3, 'api_token', '[]', 0, '2018-09-30 12:27:53', '2018-09-30 12:27:53', '2019-09-30 12:27:53'),
('c259d21c79a88b0ddc01099f5f5f1d2f218498303db548bb0e7028562d7562de86ad0a03a8fea9f3', 55, 3, 'api_token', '[]', 0, '2018-09-30 22:08:30', '2018-09-30 22:08:30', '2019-09-30 22:08:30'),
('3c9626a8da4fd74b7635494cee9051f1200dd41c2a74978a50b23367125cb393d5e99d645d0c4c4c', 55, 3, 'api_token', '[]', 0, '2018-09-30 22:12:04', '2018-09-30 22:12:04', '2019-09-30 22:12:04'),
('bacec5e9acc489a321b70f41be79d2409ed15b633f113423ac233fafeabc8147fd9ff833cc213e3a', 55, 3, 'api_token', '[]', 0, '2018-09-30 22:13:23', '2018-09-30 22:13:23', '2019-09-30 22:13:23'),
('785369ecc70b1faffee866a0efd70e9b2a2a6952ff720a3a73454406522dfbc7d0bbff87c26e34fd', 55, 3, 'api_token', '[]', 0, '2018-09-30 22:14:43', '2018-09-30 22:14:43', '2019-09-30 22:14:43'),
('b9f148b1c899b8407bb8663d14865400dd3cd40dc9950478e3f14d7474ba63c9c9f44e700ea918c6', 55, 3, 'api_token', '[]', 0, '2018-09-30 23:46:45', '2018-09-30 23:46:45', '2019-09-30 23:46:45'),
('3b1b07c406043295bd8feeb4ec37852ab66da376f69636702ec0c8a72016b2bb6ec41dcb931e0d29', 55, 3, 'api_token', '[]', 0, '2018-09-30 23:50:47', '2018-09-30 23:50:47', '2019-09-30 23:50:47'),
('b4e0d61886db2b9ae231560b74fb6c5e68f31b1b75c6cd42508beeb3886910199d73ea423c2a1a4e', 55, 3, 'api_token', '[]', 0, '2018-09-30 23:53:00', '2018-09-30 23:53:00', '2019-09-30 23:53:00'),
('1d51bb9261cd4f467263799565986088b926acece872f708bfeda5707c7ddacf9e1540dc0a960a3a', 55, 3, 'api_token', '[]', 0, '2018-09-30 23:55:57', '2018-09-30 23:55:57', '2019-09-30 23:55:57'),
('79f43301086458c43413ce045606cce202f4e4f05e0e77adbbb22f3fc837f5438f347a9b2319a375', 55, 3, 'api_token', '[]', 0, '2018-09-30 23:58:26', '2018-09-30 23:58:26', '2019-09-30 23:58:26'),
('7b1eb85f58c6162b821ae2c5822a0ccb629a508201ea8b463088b4dc595a0b02a556e0abceeffcee', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:01:10', '2018-10-01 00:01:10', '2019-10-01 00:01:10'),
('1cea445c9abb270b371e7fc9072345710c61ab6171e73830b675315528c0a50fa01e5a3caba5c31f', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:09:28', '2018-10-01 00:09:28', '2019-10-01 00:09:28'),
('10b180a2aa25ac912a96c1dfab0514c7564c494638ad4612229051222f11c71c9348e22808aae6d9', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:11:39', '2018-10-01 00:11:39', '2019-10-01 00:11:39'),
('3ca7d84c5b20dc74f5b5fb96bef4926cd9ce02c8053d1cd25601a1999881f16a95f8afa841c17ce2', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:15:03', '2018-10-01 00:15:03', '2019-10-01 00:15:03'),
('55d09ac7ceb138d0ab3bcc9dcb6925d68c517b93e592194e57e57ec11fe9ed5c1ef24f3e7e9f6c38', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:18:11', '2018-10-01 00:18:11', '2019-10-01 00:18:11'),
('29b4f436729da37e0a01a629d39bab6551e33885cf4a101ee03c1b010866a1c9d2f48f4f38207179', 55, 3, 'api_token', '[]', 0, '2018-10-01 00:19:16', '2018-10-01 00:19:16', '2019-10-01 00:19:16'),
('8547af331357abcd614f4fbbbcfe2b5bc38cd0919ef61f9836f6ceaf8875eda44b2aae8bcf324030', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:23:41', '2018-10-03 12:23:41', '2019-10-03 12:23:41'),
('1a28db6d39d3bdff71ede7f716e0be19c1537a42e0e81b96d080bbac1ce13474d7b7879c21731344', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:25:23', '2018-10-03 12:25:23', '2019-10-03 12:25:23'),
('1529529e3e68039d23d327ea752cef3a111e748f35e69998c241dab9556eb369c729010af3ed3f87', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:28:16', '2018-10-03 12:28:16', '2019-10-03 12:28:16'),
('033842551b818384196c47458aa3407f04126f3973dfc1a8953e540269d70d646f0ae5ed1bcc4610', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:33:11', '2018-10-03 12:33:11', '2019-10-03 12:33:11'),
('27c21782a780ec39e3764589037f184770fb197536e9e29e8775872613a6eda88a1509d28b928a0c', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:38:21', '2018-10-03 12:38:21', '2019-10-03 12:38:21'),
('92c415fed6ce21912c06b6f79511ca8abf4cf042920a51b076e7e5ae0a7f65cbf0e4af7739c1faaf', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:41:12', '2018-10-03 12:41:12', '2019-10-03 12:41:12'),
('a34b1320eb6fed3e5c7e49546f1076a1fceafa1188907f920720481b15217fd0037ccbe19513c43d', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:41:58', '2018-10-03 12:41:58', '2019-10-03 12:41:58'),
('07d09bf0796a596d6d49218b4223e8f95cdbdfa59fee00e6fb4b97f3c3e24d16b5e6cfa1f834a2a9', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:43:00', '2018-10-03 12:43:00', '2019-10-03 12:43:00'),
('dd54ae75182e5ae015da9369b9b831ea6200895619e687cb794c3ae7eed56e91537a7806bd863a46', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:44:21', '2018-10-03 12:44:21', '2019-10-03 12:44:21'),
('2c9dff21d013694c40342f7e16d13b9e3754241fcf6d281a3f1972fdc8bf40894b7d4b5085046359', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:48:34', '2018-10-03 12:48:34', '2019-10-03 12:48:34'),
('560d007bb9d63e86c54a5eefa1f43020e049f709f47448573c669b72fab41649fcd88c73e2ebb882', 55, 3, 'api_token', '[]', 0, '2018-10-03 12:51:55', '2018-10-03 12:51:55', '2019-10-03 12:51:55'),
('e111faa1728e43c7bbd38f1cfc6ba8e3f494e0d85762d8529b1328ef18e2fc175b1f97c4ddb15dd1', 49, 3, 'api_token', '[]', 0, '2018-10-03 12:55:56', '2018-10-03 12:55:56', '2019-10-03 12:55:56'),
('a6bd4472012d9eca3552a549f8a482d688a71e06816ee08b0c1f1834bea4d8525f9d75ae2c712942', 55, 3, 'api_token', '[]', 0, '2018-10-08 11:29:09', '2018-10-08 11:29:09', '2019-10-08 11:29:09'),
('e3818228c4dc6d8d2448a8f99cf0e9da2261e5971f415ced55fa7564a876326386a0b04e23c3f371', 55, 3, 'api_token', '[]', 0, '2018-10-08 14:23:40', '2018-10-08 14:23:40', '2019-10-08 14:23:40'),
('210708e9bedbfd4efcd98e505a4e78a911689631ad9241b70a650b1c0e2d253d6e8ab6ae77ec2a22', 55, 3, 'api_token', '[]', 0, '2018-10-09 10:34:08', '2018-10-09 10:34:08', '2019-10-09 10:34:08'),
('d7bafd5580834ddd784f6770c561c92a9577f594cab3c631c7c0d6b023a2b9a3d764dc429823f2bd', 49, 3, 'api_token', '[]', 0, '2018-10-09 11:54:40', '2018-10-09 11:54:40', '2019-10-09 11:54:40'),
('1821be4583040959f94dfecb55e21d191c73adad308b57e65b0bf999663c6381b880706a097f0fbe', 49, 3, 'api_token', '[]', 0, '2018-10-09 11:54:46', '2018-10-09 11:54:46', '2019-10-09 11:54:46'),
('c17c353fac7076e91370734e7775cc4ac717fc6c6605ec51aba85f2a0843e49b6ef1b16abb0184d0', 49, 3, 'api_token', '[]', 0, '2018-10-09 12:00:01', '2018-10-09 12:00:01', '2019-10-09 12:00:01'),
('c3925dfa1ddbeb122f71c12171d644ab6d6c7dd59d643a5ef2519552f1188a8b1ac0f2a4de11e288', 49, 3, 'api_token', '[]', 0, '2018-10-09 12:00:11', '2018-10-09 12:00:11', '2019-10-09 12:00:11'),
('872105c3d60180f52801901fda41eb30e22c4e0ac53f326c7971d4c9dc923b7024c5815d12ee11db', 74, 3, 'api_token', '[]', 0, '2018-10-09 12:12:03', '2018-10-09 12:12:03', '2019-10-09 12:12:03'),
('6fce785cf1f5d23f6523bdcc86da5097f2874bcd720c4fd83f3257499faeee147c8f7e242c7ca201', 74, 3, 'api_token', '[]', 0, '2018-10-09 12:12:14', '2018-10-09 12:12:14', '2019-10-09 12:12:14'),
('aa822abd6e02c256d47d589ec82b14644e08267891a30c2e9137f805d95fa6d6af290c3614994a6a', 73, 3, 'api_token', '[]', 0, '2018-10-09 12:19:23', '2018-10-09 12:19:23', '2019-10-09 12:19:23'),
('761f73c0b94db51ceabc8a922a0fa6e19ce8830ecdc65a5c949c4c811b035a78f7b3d88f529540d8', 73, 3, 'api_token', '[]', 0, '2018-10-09 12:22:36', '2018-10-09 12:22:36', '2019-10-09 12:22:36'),
('8245a771eeed48fd5fb0471654c04d2fed1e819d63f6152ad27416a59993e2e84f2ec65a85956b25', 76, 3, 'api_token', '[]', 0, '2018-10-09 18:03:22', '2018-10-09 18:03:22', '2019-10-09 18:03:22'),
('30add77073ffcb0f34c72a9f58edfb8654e3eb67089485b4f6dfb0b257a7feab8af4bb2ddad7b257', 73, 3, 'api_token', '[]', 0, '2018-10-10 08:33:53', '2018-10-10 08:33:53', '2019-10-10 08:33:53'),
('94e25b282a74c85016f9557b37a4a46100569a74d962db03a9fe896ad6d4f00094cf69b0f100557f', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:38:58', '2018-10-10 12:38:58', '2019-10-10 12:38:58'),
('c827462e5a4822b7f74bff34002d9c62858858b92d1f99eca0f09dfed9238b46309f60daa78d2a9d', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:41:45', '2018-10-10 12:41:45', '2019-10-10 12:41:45'),
('058da06d98e3caaf3516eab0a3385f0a3a590c19270c3083c0eebd396c598ff4493f14341bd43989', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:41:55', '2018-10-10 12:41:55', '2019-10-10 12:41:55'),
('acc2d4baca159bc16556778707f375fecd17ffdc093f027de983a94e663a844649ae2c0676775af8', 74, 3, 'api_token', '[]', 0, '2018-10-10 12:42:35', '2018-10-10 12:42:35', '2019-10-10 12:42:35'),
('ecdd74f54d2baf3740f970c99566df186e55eb6f56a91281bd57085f537f0525cb5071170ff91084', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:43:30', '2018-10-10 12:43:30', '2019-10-10 12:43:30'),
('531bebd02d66dc631adfa788e25bbdd88a2fe197f4a30f8257d52ea32319ccec1aa42366ca67b039', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:44:57', '2018-10-10 12:44:57', '2019-10-10 12:44:57'),
('b0afe8d8e6be37c4cbcf2ba1a6c5fa821f95a0dc36fe2c83009934775fc71d8e67f35fdf446172cd', 73, 3, 'api_token', '[]', 0, '2018-10-10 12:47:10', '2018-10-10 12:47:10', '2019-10-10 12:47:10'),
('17d90bf38809a70fe3bc19eb43e7754f6d286c3e4562af54c30388870b13db2ba87257eb22ff1cc9', 74, 3, 'api_token', '[]', 0, '2018-10-10 13:37:59', '2018-10-10 13:37:59', '2019-10-10 13:37:59'),
('0539abc15bb3c9fc34179731198199277d92375c5d13eff1eb75355c4115f12c4bf20a3bc47932f6', 74, 3, 'api_token', '[]', 0, '2018-10-10 13:39:35', '2018-10-10 13:39:35', '2019-10-10 13:39:35'),
('fbacf2a4ba828b1d8e96f357d85f6dd65e3fbceb0578363619200fc911365e00289c94a494a54927', 74, 3, 'api_token', '[]', 0, '2018-10-11 08:16:20', '2018-10-11 08:16:20', '2019-10-11 08:16:20'),
('72095439d49382a0cf16a330fd10ffedd7551812d3fdf649391454dbb09d925b72080c0cab7ae0e0', 74, 3, 'api_token', '[]', 0, '2018-10-11 08:29:43', '2018-10-11 08:29:43', '2019-10-11 08:29:43'),
('f768a0440444e7055c435d683b7b97ee04a285e9c42c717d3d54f2cba18197a3a048ee13f55faa06', 74, 3, 'api_token', '[]', 0, '2018-10-11 08:49:59', '2018-10-11 08:49:59', '2019-10-11 08:49:59'),
('9e6cf01b1341ed1a429bc2d5629b44bad4507dddcd80844f7c1e371b09f255c9411d0600f4e2cc99', 88, 3, 'api_token', '[]', 0, '2018-10-11 10:03:13', '2018-10-11 10:03:13', '2019-10-11 10:03:13'),
('a682252a6f115fe50e4aba511e3b0a8680a1de5d0e6b21c8887a44a2b989dc7ff40bfb0816d63467', 88, 3, 'api_token', '[]', 0, '2018-10-11 10:03:51', '2018-10-11 10:03:51', '2019-10-11 10:03:51'),
('d14f1cd2c31249c3f9179a560ef6a182007f7e422d2ba4c156aec6fbb5bacaa918c5c995233eca51', 89, 3, 'api_token', '[]', 0, '2018-10-11 10:37:30', '2018-10-11 10:37:30', '2019-10-11 10:37:30'),
('f1fd4ea6f0461c97dbf14dd284e38a997718f833365ad172535a2f5e8c88d7c86857d992e5c81258', 74, 3, 'api_token', '[]', 0, '2018-10-11 10:48:33', '2018-10-11 10:48:33', '2019-10-11 10:48:33'),
('db7e8d4f0923d986459210882498805667b1af551a3dec153021cedeffa62d7228247f85a505434a', 74, 3, 'api_token', '[]', 0, '2018-10-11 10:50:47', '2018-10-11 10:50:47', '2019-10-11 10:50:47'),
('dddb75b0647b825fb3d450dedf8c2265a570058992053e0bc509bcc43d859eb4414bff27988a89d3', 88, 3, 'api_token', '[]', 0, '2018-10-11 10:51:04', '2018-10-11 10:51:04', '2019-10-11 10:51:04'),
('fff261eeccea64d49cd89448a68d5f8e950fca5aaeb57bba3751ec34ee79adb462ad12e01deb5f82', 74, 3, 'api_token', '[]', 0, '2018-10-11 10:51:05', '2018-10-11 10:51:05', '2019-10-11 10:51:05'),
('3eb33a304b50d0951b733034ccd4fb5935a0342063f73c3b67053dcbea79665b3d1cf6f9ab603e33', 74, 3, 'api_token', '[]', 0, '2018-10-11 10:52:03', '2018-10-11 10:52:03', '2019-10-11 10:52:03'),
('702e04d11a419743384145c5bcedf9a56339d4c7f5c77d1efe032fbdfd0361424c795a720cfaba5e', 74, 3, 'api_token', '[]', 0, '2018-10-11 11:00:58', '2018-10-11 11:00:58', '2019-10-11 11:00:58'),
('25ff4f87cce64d4e87340d731faf0fab35ddc2e1b40cd37001442c72911942cf06a0a214f21208dc', 74, 3, 'api_token', '[]', 0, '2018-10-11 11:14:33', '2018-10-11 11:14:33', '2019-10-11 11:14:33'),
('9059f370dfeb9b6b8b9adcc9e2ca03fc5078a6e3d8e7a0ea8c1f2464d7cc386ea3379077766e85ca', 88, 3, 'api_token', '[]', 0, '2018-10-11 11:28:31', '2018-10-11 11:28:31', '2019-10-11 11:28:31'),
('9695e130f1903ba639dd315f6e679fa82939a283e93e040609977d1f34d019b029dc1021d6f12180', 88, 3, 'api_token', '[]', 0, '2018-10-11 11:57:35', '2018-10-11 11:57:35', '2019-10-11 11:57:35'),
('908ee78c8ee660aaee9862c66fa25e567f88be0f18392b6bbdc1bf442d26078c0f9889c6996b2d4b', 88, 3, 'api_token', '[]', 0, '2018-10-11 12:03:32', '2018-10-11 12:03:32', '2019-10-11 12:03:32'),
('3c21a739164b7a4870beea689e513208504e3281c169781563eb5a1a350e83557f3a26343f98cc51', 88, 3, 'api_token', '[]', 0, '2018-10-11 12:42:47', '2018-10-11 12:42:47', '2019-10-11 12:42:47'),
('002cb839f93681f49a4f02aac65975f48ca2fc4daddfbdfe0f3b0ed4665feea3de18a6cbd5e55d76', 88, 3, 'api_token', '[]', 0, '2018-10-11 12:53:04', '2018-10-11 12:53:04', '2019-10-11 12:53:04'),
('506b10b21f6364725bbf76ba8c56ab3163dce8ff2ea39e6810d34430f3a263313e45b84b5d01d868', 88, 3, 'api_token', '[]', 0, '2018-10-11 13:01:12', '2018-10-11 13:01:12', '2019-10-11 13:01:12'),
('22c1449b1351a327f0372d486546364acdd07c68d2f173d37b53e7fe232688ae9fae700ba184514b', 88, 3, 'api_token', '[]', 0, '2018-10-11 13:02:38', '2018-10-11 13:02:38', '2019-10-11 13:02:38'),
('a097e4ced7a401a6235471044ad915667a45e16d00c47f1af6fef09c31f9dbe6672a3fcf444e4c42', 88, 3, 'api_token', '[]', 0, '2018-10-11 13:08:45', '2018-10-11 13:08:45', '2019-10-11 13:08:45'),
('940455ff3db3c44c6de673ea60320fdc83d6eea91892739a583f6788e9e9779693e7777817ee63b0', 88, 3, 'api_token', '[]', 0, '2018-10-11 13:15:45', '2018-10-11 13:15:45', '2019-10-11 13:15:45'),
('15321c989fa6198fb8ea82cdd4ce74aff3db80bb2335fba288d43ce1f5fcb38265bd53d9c96717c4', 88, 3, 'api_token', '[]', 0, '2018-10-11 13:21:30', '2018-10-11 13:21:30', '2019-10-11 13:21:30'),
('2e046e2c3d8ca70400c27da1e8b1c648468723dc780dffa7633163d8cf32aaa9112afc957ea7ba78', 74, 3, 'api_token', '[]', 0, '2018-10-11 13:43:25', '2018-10-11 13:43:25', '2019-10-11 13:43:25'),
('09d88d044f54efcfd76276b2b98763029c8cb0d938470cff0ef5d61f58246dcc32af264ba6c8efd8', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:10:51', '2018-10-11 14:10:51', '2019-10-11 14:10:51'),
('438e59f9fa3dc024f037e88e622100caf894eb97bd72acfb8dcdbdc8efab7a927fc30d273055d937', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:28:01', '2018-10-11 14:28:01', '2019-10-11 14:28:01'),
('8a4530a239cdc8f2a0a4caf13de1b6d257b35ff88b98d15eecf0a3b982112df5a51d84162ec9fb6f', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:29:24', '2018-10-11 14:29:24', '2019-10-11 14:29:24'),
('6293c21c79bcd1a88301f49676d332f94e76f8580a632c5cf4f6a249ae080684b7dcf904be3dbb34', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:31:23', '2018-10-11 14:31:23', '2019-10-11 14:31:23'),
('b6f8b25a53bb6604edc2d8972521a1cf05fd271c3eed028acc407a4478491616c2d57e429c062685', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:32:59', '2018-10-11 14:32:59', '2019-10-11 14:32:59'),
('0917553e5abcdb2d1a72c8e8a05323d20fd24e433fb74f97bd5041b5209a0fd913351f221b56fbdb', 88, 3, 'api_token', '[]', 0, '2018-10-11 14:42:24', '2018-10-11 14:42:24', '2019-10-11 14:42:24'),
('c9e380e460fa23925b9b9df602af4a57c08ddb70970aebce287e1fd1d945e82099ff5e3b2da6a6eb', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:23:07', '2018-10-11 15:23:07', '2019-10-11 15:23:07'),
('d5fa1fef9f6f83d80bcfbe5351e8ac9fa81ad2982f1d151fe80f5d9e0aa0805266e34668569d6cd6', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:33:02', '2018-10-11 15:33:02', '2019-10-11 15:33:02'),
('781f4b14745ac4375e917a9a96858370d0ec9302bdf63adb834cf3d01b56246528b6b326f43d3258', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:36:34', '2018-10-11 15:36:34', '2019-10-11 15:36:34'),
('9aa39d75fea41af031483bf0de847c8591dca89afa3ec616742249c9a68fb23a8864bb09f03e0934', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:39:59', '2018-10-11 15:39:59', '2019-10-11 15:39:59'),
('76cf5530164bcea37cdc20260e3881e1b252e37789b94898494766f6232453ad20cd5abb0e8998a8', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:46:13', '2018-10-11 15:46:13', '2019-10-11 15:46:13'),
('04aaf9449faef83e8c51d91d4757f0c70d286c75b08131da8b7fad738b320d058bc3fc4fea9e7370', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:47:44', '2018-10-11 15:47:44', '2019-10-11 15:47:44'),
('601dafa35780daa763f4cdc6b0608cfe35d99a05b386cb2cecf7d6d63a0b0404853a07724c18de3d', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:49:38', '2018-10-11 15:49:38', '2019-10-11 15:49:38'),
('e83e6c2dc09bfbeff73ec44b44150bf24cf0d3d932dc0af4e1cf20dafbade56887fac1d38868485d', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:52:13', '2018-10-11 15:52:13', '2019-10-11 15:52:13'),
('ceb975f82bb7f877d76e306ffd4067bf32d78714106a6bf317bcbd20a32dd2d44ddec519bcf868b7', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:53:17', '2018-10-11 15:53:17', '2019-10-11 15:53:17'),
('6072c528242eaac630a01f643d3f59c67e9495b825b861f54b563dfedaf925a3e7800c5337d0061a', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:57:08', '2018-10-11 15:57:08', '2019-10-11 15:57:08'),
('c26876d34d83d694a596d9215f1f68a514fced5c49cac61234d3a9149cfdb3d4bec1d12d6a78d70e', 88, 3, 'api_token', '[]', 0, '2018-10-11 15:58:05', '2018-10-11 15:58:05', '2019-10-11 15:58:05'),
('26e80fdd814a757751c528ba4d6bc9d5c7b4232a49ddcdaea2093ea1ff82d89e87e48b7cd60e47c4', 88, 3, 'api_token', '[]', 0, '2018-10-11 16:14:10', '2018-10-11 16:14:10', '2019-10-11 16:14:10'),
('e4a75508030cff268ce33efd65d76f66533d7745c21f476c9db72e498d1ff36588b29490d8f8d602', 88, 3, 'api_token', '[]', 0, '2018-10-11 16:19:25', '2018-10-11 16:19:25', '2019-10-11 16:19:25'),
('4dd47b462bf372edbe11630f68d76276fbde52d70ca5c4826eb43e3b3e80a695cfadcc93becfe07c', 94, 3, 'api_token', '[]', 0, '2018-10-12 20:40:01', '2018-10-12 20:40:01', '2019-10-12 20:40:01'),
('563887c26340f47f37ab8f5d53dde29baa4d938aec7e4f267ae07d6e11e6699bd44c08de02d54953', 94, 3, 'api_token', '[]', 0, '2018-10-12 22:49:46', '2018-10-12 22:49:46', '2019-10-12 22:49:46'),
('459e59d9a9f7fb434f180f67b69195712d80825220ac69287a1693f5dc81419822e268250357c2c0', 94, 3, 'api_token', '[]', 0, '2018-10-12 22:56:54', '2018-10-12 22:56:54', '2019-10-12 22:56:54'),
('8c5ee3aaca54015839adea41672570098af848503f1e3ddcdb8bee7132662a75375d655a2ec21aac', 96, 3, 'api_token', '[]', 0, '2018-10-13 11:12:02', '2018-10-13 11:12:02', '2019-10-13 11:12:02'),
('478c3bc0c6a519355f44e6d06a410ebf28957003a9021d6b734231b0b7ab39fbd2223b8f52311a42', 96, 3, 'api_token', '[]', 0, '2018-10-13 11:28:03', '2018-10-13 11:28:03', '2019-10-13 11:28:03'),
('21e4166fd308b919b24def910520989351f132c1e2047bcfcb17f8b71ba4a4882c9e32fba3f00e2c', 88, 3, 'api_token', '[]', 0, '2018-10-13 15:44:19', '2018-10-13 15:44:19', '2019-10-13 15:44:19'),
('b2d22f753c028e13dfdd316f0bc8634265a68521f9431edb362795c5e6ab7dacba0a2cfdc956f076', 88, 3, 'api_token', '[]', 0, '2018-10-13 16:26:03', '2018-10-13 16:26:03', '2019-10-13 16:26:03'),
('2b9f8ef9fde0a90c14ed3032fbf4cb691c4d8fb250ab3a0e55874cf0c02205607a0600c43b3c8a3c', 88, 3, 'api_token', '[]', 0, '2018-10-13 16:31:40', '2018-10-13 16:31:40', '2019-10-13 16:31:40'),
('572b15697cc6de9537c4eb8521ccebde13b3aa0ea5884bfd106aa39de3a47f055f2729eab57ea366', 88, 3, 'api_token', '[]', 0, '2018-10-13 16:33:45', '2018-10-13 16:33:45', '2019-10-13 16:33:45'),
('cff6aab38d756f88869234a99d65d55be2c1b9bb327f43de7fbc0ee58cb8470518508c6a4a15ee84', 88, 3, 'api_token', '[]', 0, '2018-10-13 16:37:36', '2018-10-13 16:37:36', '2019-10-13 16:37:36'),
('0215b6ada0d465c2d4c2063fec089572f5b640b27815a759217e8cbc874cec386b1f6844833c1bc6', 88, 3, 'api_token', '[]', 0, '2018-10-13 16:40:00', '2018-10-13 16:40:00', '2019-10-13 16:40:00'),
('39e98c06332c143f534b8957604ca3cd3fe06bf77387064d345d39a0c5ad813da387208ff0f016cf', 97, 3, 'api_token', '[]', 0, '2018-10-13 17:03:17', '2018-10-13 17:03:17', '2019-10-13 17:03:17'),
('7fa6a117d1c3f5727c1c86753198fe69adc2e4648a4baaa4e0696cca0994209c57a6394ec35f9a44', 94, 3, 'api_token', '[]', 0, '2018-10-13 20:30:34', '2018-10-13 20:30:34', '2019-10-13 20:30:34'),
('c6a70b279871c8b171bc41722e6a4e38cec445a8b8e2da5aad9f0ba887329c1efea0dea07c9f9323', 94, 3, 'api_token', '[]', 0, '2018-10-13 20:48:22', '2018-10-13 20:48:22', '2019-10-13 20:48:22'),
('dd6d02427676e458eaa72f0e2e71f824a0a7d6a4b5a050900257d9fa476f50f3c33585177b663519', 88, 3, 'api_token', '[]', 0, '2018-10-13 21:20:32', '2018-10-13 21:20:32', '2019-10-13 21:20:32'),
('26651b0bd6ae1c002a8dc5fb0dc42d062fc87411347f85369c1c6af9f892a05954949021ec113802', 88, 3, 'api_token', '[]', 0, '2018-10-13 21:25:35', '2018-10-13 21:25:35', '2019-10-13 21:25:35'),
('546e1c06563b0f124aee01e83503eede78cd9e809dfdce0338968d3419d355793cb3a6cd32a7c581', 88, 3, 'api_token', '[]', 0, '2018-10-13 21:27:31', '2018-10-13 21:27:31', '2019-10-13 21:27:31'),
('be35997438c11481b5c3fa3c7f893d590f4877f123fd57e7a7990fe0632b9200aceeb92b859a03aa', 88, 3, 'api_token', '[]', 0, '2018-10-13 22:36:28', '2018-10-13 22:36:28', '2019-10-13 22:36:28'),
('c4e64201befaea38c8e8f1b25560712c78627e6598789ed976f151a422a5ecf33b852bc7730903ff', 89, 3, 'api_token', '[]', 0, '2018-10-13 23:34:56', '2018-10-13 23:34:56', '2019-10-13 23:34:56'),
('9aca7ec15d2e099ec50caf180dbbf6b98cd17475a53c169a2883cf6720adfe4bd9290b381d6bc0ad', 88, 3, 'api_token', '[]', 0, '2018-10-14 02:09:34', '2018-10-14 02:09:34', '2019-10-14 02:09:34'),
('92a4a7394412b03fe801de9559267a6a8797dac721a4636c607d5a635fb08573ce7be386660bfa53', 88, 3, 'api_token', '[]', 0, '2018-10-14 02:13:29', '2018-10-14 02:13:29', '2019-10-14 02:13:29'),
('ec4af1b8dbbd37afaf38c20d247493f2532672518d6d1598708837c9b078fff7ac14036230dc071f', 88, 3, 'api_token', '[]', 0, '2018-10-14 02:17:29', '2018-10-14 02:17:29', '2019-10-14 02:17:29'),
('8ad0611e155ec2fb156f55286faadda7c9eb0595702a9f8c98f52dcdb53f9a767a1c0d304848997c', 88, 3, 'api_token', '[]', 0, '2018-10-14 02:29:03', '2018-10-14 02:29:03', '2019-10-14 02:29:03'),
('3c0d202c371e9799d256e7424079242cd726dd5aa676338c2487ad620bb4dbee6458f28fcc2fcb39', 89, 3, 'api_token', '[]', 0, '2018-10-14 03:22:47', '2018-10-14 03:22:47', '2019-10-14 03:22:47'),
('43e61b9cc2a3475ce1906209cfb3cedc56aac450a309b746542836840c4aa6f849010df199347753', 88, 3, 'api_token', '[]', 0, '2018-10-14 03:54:05', '2018-10-14 03:54:05', '2019-10-14 03:54:05'),
('bc425030e5f127149e68b304523752ae9cf996fa29892fe6a8132468c80b5b1ee520bdbb7563d8b4', 88, 3, 'api_token', '[]', 0, '2018-10-14 03:57:44', '2018-10-14 03:57:44', '2019-10-14 03:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(3, NULL, ' Personal Access Client', 'cbkbag5Gc9GbGqU5FHgt7akPClpB8Opz5ndBFPfc', 'http://localhost', 1, 0, 0, '2018-05-22 13:37:38', '2018-05-22 13:37:38'),
(4, NULL, ' Password Grant Client', 'UJy6S91WyFhoIaky6VFk68cZJsjquEtp7TnKvXV6', 'http://localhost', 0, 1, 0, '2018-05-22 13:37:38', '2018-05-22 13:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 3, '2018-05-22 13:37:38', '2018-05-22 13:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `image_en`, `image_ar`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'Pepsi discount 60 %', 'pepsi discount', 'offer_images/1529878855looking for.jpg', 'offer_images/1529878855looking for.jpg', 1, 1, NULL, '2018-06-13 09:43:48', '2018-06-24 20:20:55'),
(8, '7% discount', '7% discount on Huawei products for a limited time', 'offer_images/1529878877pepsi.jpg', 'offer_images/1529878877pepsi.jpg', 1, 1, NULL, '2018-06-23 12:48:28', '2018-06-24 20:21:17'),
(9, '55%', 'opera House', 'offer_images/153909033620180812034406446.jpg', 'offer_images/153909032520180812034406446.jpg', 1, 1, NULL, '2018-07-11 11:18:18', '2018-10-09 11:05:36'),
(10, 'sdf', 'sdf', 'offer_images/153804740140603033_224786751726006_2148029551228223488_n.png', 'offer_images/153804740140603033_224786751726006_2148029551228223488_n.png', 1, 1, NULL, '2018-09-27 09:23:21', '2018-09-27 09:23:21'),
(11, 'Harlan Vance', 'Vel exercitationem cupidit', 'offer_images/153909029020180812034406446.jpg', 'offer_images/153909029020180812034406446.jpg', 1, 1, NULL, '2018-10-09 11:04:50', '2018-10-09 11:04:50'),
(12, 'Sale', 'Discount up to 50%', NULL, NULL, 1, 1, NULL, '2018-10-11 10:20:25', '2018-10-11 10:20:25');

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
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`) VALUES
(1, 'Backend User'),
(2, 'Mobile User'),
(3, 'Super Admin'),
(4, 'Admin'),
(5, 'Data Entry');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `photo`, `phone`, `website`, `info`, `address`, `longitude`, `latitude`, `is_active`) VALUES
(5, 'Lee Allison', 'shops_images/1529596443221.jpg', '0126546566', 'http://www.guv.in', 'Aliquam velit dolorem dolore sed qui sunt esse nihil eius voluptas voluptatem laborum optio', 'salah salem', NULL, NULL, '1'),
(8, 'Nora Turner', 'img/default.jpg', '+755-45-3826680', 'http://www.negy.cc', 'Eos placeat veniam non unde autem rerum officiis velit consequatur Consequat Molestiae odit ex', 'Voluptates nesciunt molestiae nostrud sed qui eos soluta commodo delectus', NULL, NULL, '1'),
(9, 'best shop', 'img/default.jpg', '+433-98-3530753', 'http://www.baterywohiwutoz.biz', 'Aut est et magnam consectetur iure', 'Iusto explicabo Aliqua Eius velit lorem eos voluptatem maxime', NULL, NULL, '1'),
(10, 'TEst', 'img/default.jpg', '520', 'https://laravel.com/api/5.7/Illuminate/Routing/Router.html', 'adasd', 'adsdasd', NULL, NULL, '1'),
(11, 'CIty Center', 'shops_images/1539263617954.jpg', '01007895473', 'https://www.gsmarena.com/compare.php3?&idPhone3=8967&idPhone1=8505&idPhone2=9163', 'Mall', 'Nasr City', NULL, NULL, '1'),
(13, 'City stars', 'shops_images/1539263484654.jpg', '00201128255536', 'https://www.facebook.com/', 'hi', 'madint nasr', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `shop_branches`
--

CREATE TABLE `shop_branches` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longtuide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_branches`
--

INSERT INTO `shop_branches` (`id`, `shop_id`, `branch`, `address`, `longtuide`, `latitude`) VALUES
(14, 5, 'branch 1', 'عمّان، Jordan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_branch_times`
--

CREATE TABLE `shop_branch_times` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `from` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_branch_times`
--

INSERT INTO `shop_branch_times` (`id`, `branch_id`, `day_id`, `from`, `to`) VALUES
(1, 1, 1, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(2, 1, 2, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(3, 1, 3, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(4, 1, 4, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(5, 1, 5, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(6, 1, 6, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(7, 1, 7, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(8, 2, 1, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(9, 2, 2, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(10, 2, 3, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(11, 2, 4, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(12, 2, 5, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(13, 2, 6, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(14, 2, 7, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(15, 3, 1, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(16, 3, 2, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(17, 3, 3, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(18, 3, 4, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(19, 3, 5, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(20, 3, 6, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(21, 3, 7, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(22, 4, 1, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(23, 4, 2, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(24, 4, 3, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(25, 4, 4, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(26, 4, 5, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(27, 4, 6, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(28, 4, 7, '2018-06-12 07:00:00', '2018-06-30 23:00:00'),
(29, 6, 1, '17:45:00 pm', '17:45:00 pm'),
(30, 6, 2, '17:45:00 pm', '17:45:00 pm'),
(31, 6, 3, '17:45:00 pm', '17:45:00 pm'),
(32, 7, 1, '17:45:00 pm', '17:45:00 pm'),
(33, 7, 2, '17:45:00 pm', '17:45:00 pm'),
(34, 7, 3, '17:45:00 pm', '17:45:00 pm'),
(35, 8, 5, '17:45:00 pm', '17:45:00 pm'),
(36, 8, 6, '17:45:00 pm', '17:45:00 pm'),
(37, 8, 7, '17:45:00 pm', '17:45:00 pm'),
(38, 9, 4, '17:45:00 pm', '17:45:00 pm'),
(39, 9, 5, '17:45:00 pm', '17:45:00 pm'),
(40, 9, 6, '17:45:00 pm', '17:45:00 pm'),
(41, 9, 7, '17:45:00 pm', '17:45:00 pm'),
(42, 10, 2, '06:00:00 am', '00:00:00 am'),
(43, 10, 3, '06:00:00 am', '00:00:00 am'),
(44, 10, 4, '06:00:00 am', '00:00:00 am'),
(45, 10, 5, '06:00:00 am', '00:00:00 am'),
(46, 10, 6, '06:00:00 am', '00:00:00 am'),
(47, 11, 2, '00:00:00 am', '00:00:00 am'),
(48, 11, 3, '00:00:00 am', '00:00:00 am'),
(49, 11, 4, '00:00:00 am', '00:00:00 am'),
(50, 11, 5, '00:00:00 am', '00:00:00 am'),
(51, 11, 6, '00:00:00 am', '00:00:00 am'),
(52, 12, 1, '15:00:00 pm', '15:00:00 pm'),
(53, 12, 2, '15:00:00 pm', '15:00:00 pm'),
(54, 12, 3, '15:00:00 pm', '15:00:00 pm'),
(55, 13, 1, '12:30:00 pm', '12:30:00 pm'),
(56, 13, 2, '12:30:00 pm', '12:30:00 pm'),
(57, 13, 3, '12:30:00 pm', '12:30:00 pm'),
(58, 14, 1, '16:45:00 pm', '16:45:00 pm'),
(59, 14, 2, '16:45:00 pm', '16:45:00 pm'),
(60, 14, 3, '16:45:00 pm', '16:45:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `shop_days`
--

CREATE TABLE `shop_days` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_days`
--

INSERT INTO `shop_days` (`id`, `shop_id`, `day_id`) VALUES
(51, 8, 1),
(52, 5, 1),
(53, 5, 2),
(54, 5, 3),
(55, 9, 4),
(56, 9, 5),
(57, 10, 1),
(58, 10, 3),
(88, 13, 5),
(89, 11, 1),
(90, 11, 2),
(91, 11, 3),
(92, 11, 4),
(93, 11, 5),
(94, 11, 6),
(95, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `shop_media`
--

CREATE TABLE `shop_media` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT 'type 1 => file - type 2 => video '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_media`
--

INSERT INTO `shop_media` (`id`, `shop_id`, `link`, `type`) VALUES
(13, 5, 'img/events/OtGF8KtLOB.png', 1),
(22, 8, 'img/events/VOdmOGzHbq.png', 1),
(23, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(24, 8, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(25, 9, 'img/events/U1IDrcJmhi.png', 1),
(26, 9, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(27, 9, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(28, 10, 'img/events/QetOcyOhKS.png', 1),
(29, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(30, 10, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(31, 11, 'img/events/wvPyK2SKwb.png', 1),
(37, 13, 'img/events/Y1s24Fl9dr.png', 1),
(38, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(39, 13, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(40, 14, 'img/events/vpKVmzEXDb.png', 1),
(41, 14, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(42, 14, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(43, 15, 'img/events/MyKCWu1XKU.png', 1),
(44, 15, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(45, 15, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(46, 16, 'img/events/f3MtH1rze8.png', 1),
(47, 16, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(48, 16, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(52, 18, 'img/events/s7XWXvTHqO.png', 1),
(53, 18, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(54, 18, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(55, 19, 'img/events/uHDAJS8ewI.png', 1),
(56, 19, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(57, 19, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(58, 20, 'img/events/wRTg0Ed7LO.png', 1),
(59, 20, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(60, 20, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(61, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(62, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(63, 21, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(81, 22, 'img/events/1mnLLi20d7.png', 1),
(82, 22, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(83, 22, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(84, 23, 'img/events/CC282GIppq.png', 1),
(85, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(86, 23, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(87, 24, 'img/events/Gs62a7GaY9.png', 1),
(88, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(89, 24, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(90, 25, 'img/events/pe47YGjvHj.png', 1),
(91, 25, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(92, 25, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(93, 26, 'img/events/3eflaEgrPW.png', 1),
(94, 26, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(95, 26, 'https://www.youtube.com/watch?v=2PSRmK06YFk', 2),
(98, 5, 'shops_images/1529596443750.jpg', 1),
(99, 5, 'shops_images/1529596443789.jpg', 1),
(100, 5, 'shops_images/1529596443508.jpg', 1),
(101, 5, 'shops_images/1529596443221.jpg', 1),
(102, 8, 'http://www.mycegenok.co.uk', 2),
(103, 8, 'http://www.ciliryquxefyxi.org.uk', 2),
(104, 9, 'http://www.bapyvuqyz.co', 2),
(105, 9, 'http://www.zeb.ws', 2),
(106, 11, 'shops_images/1539088630150.bmp', 1),
(107, 11, 'shops_images/1539088723644.bmp', 1),
(109, 11, 'shops_images/1539262154852.jpg', 1),
(110, 13, 'shops_images/1539263484654.jpg', 1),
(111, 11, 'shops_images/1539263617954.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `logo_en`, `logo_ar`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Muhamed Musa', 'logo/en/1526992021_male.jpg', 'logo/ar/1526992021_male.jpg', 1, 1, '2018-05-22 10:27:01', '2018-06-27 07:59:53'),
(2, 'english', 'logo/en/1527090714_looking for.jpg', 'logo/ar/1527090741_looking for.jpg', 1, 1, '2018-05-23 13:51:54', '2018-05-23 13:52:21'),
(3, 'Toshiba', 'logo/en/1527421592_milk.jpg', 'logo/ar/1527421592_looking for.jpg', 1, NULL, '2018-05-27 09:46:32', '2018-05-27 09:46:32'),
(4, 'Huawei', 'logo/en/1529763897_download.png', 'logo/ar/1529763897_download (1).png', 1, NULL, '2018-06-23 12:24:57', '2018-06-23 12:24:57'),
(5, 'vodafone', 'logo/en/1539162019_2672__500x550_vodafone_uk_2016.png', 'logo/ar/1539162019_2672__500x550_vodafone_uk_2016.png', 1, NULL, '2018-10-10 07:00:19', '2018-10-10 07:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `value`) VALUES
(1, 'contact_us', 'info@eventakom.com'),
(2, 'notification_distance', '-9,3');

-- --------------------------------------------------------

--
-- Table structure for table `trending_keywords`
--

CREATE TABLE `trending_keywords` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trending_keywords`
--

INSERT INTO `trending_keywords` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Youth', 1, NULL, '2018-05-31 09:25:38', '2018-05-31 09:25:38'),
(2, 'Festival', 1, NULL, '2018-05-31 09:25:53', '2018-05-31 09:25:53'),
(3, 'new trend', 1, NULL, '2018-06-23 12:25:42', '2018-06-23 12:25:42'),
(4, 'Cinema', 1, NULL, '2018-10-09 13:32:37', '2018-10-09 13:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'KM'),
(2, 'M'),
(3, 'Mile');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tele_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_mobile_verified` tinyint(1) DEFAULT '0',
  `is_email_verified` tinyint(1) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_os` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_social` tinyint(1) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_valid_token` tinyint(1) DEFAULT NULL,
  `social_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_id` tinyint(1) DEFAULT NULL,
  `mobile_verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_mobile_verification_code_expired` tinyint(1) DEFAULT NULL,
  `email_verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verification_count` int(11) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `tele_code`, `mobile`, `country_id`, `city_id`, `gender_id`, `photo`, `birthdate`, `is_active`, `is_mobile_verified`, `is_email_verified`, `created_by`, `updated_by`, `created_at`, `updated_at`, `device_token`, `mobile_os`, `is_social`, `api_token`, `is_valid_token`, `social_token`, `lang_id`, `mobile_verification_code`, `is_mobile_verification_code_expired`, `email_verification_code`, `verification_date`, `verification_count`, `last_login`, `longitude`, `latitude`, `timezone`, `remember_token`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$ZbvTptQsZEfD5FZcHrxA6uTnG.cx/fZBnelHFerW19xI2f1Qifyia', 'super', 'admin', 'super@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-12 13:03:05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-10-12 15:03:05', NULL, '2018-10-12 13:03:05', NULL, NULL, 'Africa/Cairo', 'fIOvAoaI0QUKAqsyriAdnX6t18YZZfWapI9SiMHuC2wN2cXIrJw5mc2mOEBh', NULL),
(36, 'SalmaOmar', '$2y$10$Dr7FSXEf1vzxHkbAMqxBeuuNeZOfyiRitMCSMjzLstVHCsXdS2Aoq', 'Salma', 'Omar', 'salma.omar@pentavalue.com', '+20', '1227775315', 195, 1, 2, 'mobile_users/NEogRziLjX.jpeg', '1988-04-30 22:00:00', 1, 1, 1, NULL, NULL, '2018-06-11 13:15:20', '2018-07-22 17:38:40', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 2, 'Xhmw', 1, 'gnsa', '2018-07-22 17:38:40', 2, '2018-06-11 13:15:20', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(37, 'SalmaAhmed', '$2y$10$CDk83K0uQOiO.FnxfjWmlOg1pI9cUsQTVM8upKSPESHvPPS1UG8Wm', 'Salma', 'Ahmed', 'salmaomario@yahoo.commmm', '+20', '1007225558', 195, 1, 2, 'mobile_users/oRt5oEkGEO.jpeg', '1990-05-21 21:00:00', 0, 0, 0, NULL, NULL, '2018-05-28 13:34:29', '2018-05-28 13:34:29', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 't4cO', 0, 'JCSi', '2018-06-20 12:11:03', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(38, 'OmarIbrahim', '$2y$10$BOneSUbwy1EFsDE.7IzzL.XipT2k7EgopBpkImVutKRmlm9FQHn7e', 'Omar', 'Ibrahim', 'omar.brahim@pentavalue.com', '+20', '1002848469', 195, 1, 1, 'mobile_users/wrdMcQmOAz.png', '2006-10-12 13:47:11', 1, 1, 0, NULL, NULL, '2018-06-04 13:22:50', '2018-06-25 14:05:07', 'testtesttest', 'android', NULL, '41c491540fd3bc8398b18b02fd19a827305dc98cec1760fbacc15aebdffc5ed70b75f60533b20b02', NULL, NULL, 2, 'NQg9', 0, '1Kzb', '2018-06-25 16:16:20', NULL, '2018-06-25 14:05:07', '46.73858600', '24.77426500', 'Africa/Cairo', 'p8SvsVN1wdlGv9oPqrugP9nEsNvMt4ef48fIrpqoIzGI09xCia6sDeiLUFTo', NULL),
(39, 'aliIbrahim', '$2y$10$ZbvTptQsZEfD5FZcHrxA6uTnG.cx/fZBnelHFerW19xI2f1Qifyia', 'ali', 'Ibrahim', 'omar.ebrahim@pentavalue.com', '+20', '10028484691', 195, 1, 1, '/mobile_users/T5YKymJugi.png', '2006-10-12 13:47:11', 1, 1, 0, NULL, NULL, '2018-05-28 14:11:22', '2018-06-26 08:04:56', 'testtesttest', 'android', NULL, '64d105f82972e0b024a9c618458de5757288e6330ba0a64e0b171b806b7220505acc3e5c6c393a1a', NULL, NULL, 1, 'DDyg', 1, 'mCDs', '2018-06-26 10:06:58', NULL, '2018-06-26 08:04:56', '46.73858600', '24.77426500', 'Africa/Cairo', 'jits4FKaSYFRxkbQMoaTgIsNJu9O7zeQPeszUWPJO2VnGAEntox1nN99ydfn', NULL),
(40, 'DaliaNagy', '$2y$10$Q4lIwGB3CJIKlRMsc2TRpesHb.4gHnAsghBQHjg3nQ/lx9NsLj4qW', 'Dalia', 'Nagy', 'salma.side@gmail.com', '+20', '1096787227', 195, 1, 2, 'mobile_users/4q0glQfHLR.jpeg', '1995-06-17 21:00:00', 1, 1, 0, NULL, NULL, '2018-05-28 14:36:08', '2018-05-28 14:36:08', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, 'ff24ce0922c938b7d54146914127f99a7e2f69c8edd3aebe589bdf75ac8985eff04992877e796a2b', NULL, NULL, 1, 'cyjq', 1, 'FOc6', '2018-06-13 10:08:35', NULL, '2018-05-28 14:36:08', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(41, 'OraMaki', '$2y$10$MkdG.ey05szCsXj1xFNYaeTUupzk4bHMQnVT4NvrV2JxXm7nz9Y0G', 'Ora', 'Maki', 'salm@gmail.com', '+20', '1227770000', 195, 1, 2, 'mobile_users/bQ9ArLuWOm.jpeg', '2002-06-25 21:00:00', 1, 1, 0, NULL, NULL, '2018-07-10 10:48:11', '2018-08-05 18:13:29', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, '0fce6587c9b3d579b780f957a0a28214644a387f9690d7a30a0717779ed781e5395bc1a4f0f6103e', NULL, NULL, 1, 'spMJ', 1, 'zOdc', '2018-08-05 18:13:29', NULL, '2018-07-10 10:48:11', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(43, 'nermineatef', '$2y$10$e9wJ5dhBm49l6aWMdlxPaOSsOP1IYb1BKT.twzfl9XSHUmE5DPubO', 'nermine', 'atef', 'nermine.atef12@gmail.com', '+20', '1005517725', 195, 1, NULL, 'mobile_users/qwvVNOVJBq.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-05-28 15:46:26', '2018-05-28 15:46:26', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 'OvyR', 0, '73HT', '2018-06-03 15:35:13', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(44, 'DanHeggs', NULL, NULL, NULL, 'salmaomario@yahoo.comm', NULL, '01002544569', NULL, NULL, NULL, 'backend_users/1528278563606.jpg', NULL, 1, 0, 0, NULL, NULL, '2018-05-29 07:49:55', '2018-06-06 07:49:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-20 12:11:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'samharriis', NULL, NULL, NULL, 'salmaomario@yahoo.commmm', NULL, '01002544569', NULL, NULL, NULL, 'backend_users/samharriis1527587678323.jpg', NULL, 1, 0, 0, NULL, NULL, '2018-05-29 07:54:38', '2018-05-29 07:54:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-20 12:11:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'DanDee', NULL, NULL, NULL, 'salmaomario@yahoo.comhhhhhhhh', NULL, '2561256125', NULL, NULL, NULL, 'backend_users/DanDee1527587767666.jpg', NULL, 1, 0, 0, NULL, NULL, '2018-05-29 07:56:07', '2018-05-29 07:56:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-20 12:11:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'OraMaki', '$2y$10$wdjRuwMjLjWjBrJMdHs9FugmDLapkV5MaVJ3V/hHdJUnH4V/oqOZu', 'Ora', 'Maki', 'salmaomario@yahoo.comcom', '+20', '1227775316', 195, 1, NULL, 'mobile_users/NTV9Ubz1uP.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-06-20 12:08:40', '2018-06-20 12:08:40', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 'CdoB', 0, 'd6wK', '2018-06-20 12:10:45', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(48, 'OraMaki', '$2y$10$ZiusSsYjvROI4dPtUdq1Ou6LEfZjLhtp.INy/jYnQUwgJirp6dqCW', 'Ora', 'Maki', 'salmaomario@yahoo.comqqaaa', '+20', '12277753129999', 195, 1, NULL, 'mobile_users/Eyj2yjbJX7.jpeg', NULL, 0, 0, 1, NULL, NULL, '2018-06-20 12:12:03', '2018-06-20 12:12:38', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 'T17m', 0, 'iPK3', '2018-06-20 13:19:34', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(49, 'MalekMaktabi', '$2y$10$L3MqCbMXPfRhbKZBOcexYuJZmJG3jXD6xeVJttRxv8gDNZ025fPp.', 'Malek', 'Maktabi', 'salma.omar@pentavalue.comd', '+20', '1227775312', 195, 1, NULL, 'mobile_users/jtvcf6vI9j.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-09 12:00:11', '2018-10-09 12:00:11', 'testToken', 'android', NULL, 'c3925dfa1ddbeb122f71c12171d644ab6d6c7dd59d643a5ef2519552f1188a8b1ac0f2a4de11e288', NULL, NULL, 1, 'c5Gm', 1, 'xAyS', '2018-10-09 12:00:11', 1, '2018-10-09 12:00:11', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(50, 'ahmed.yacoub', '$2y$10$eKb4VbZHHwx7n5QJviwRRO.QZ4jfDACF5yhvklWvo5hHpFYvEQKcm', 'Ahmed Yacoub', NULL, 'ahmed.yacoup@pentavalue.com', NULL, '0123456789', NULL, NULL, NULL, 'backend_users/1530708959812.jpg', NULL, 1, 0, 0, NULL, NULL, '2018-07-04 10:55:59', '2018-07-04 10:55:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'OraMaki', '$2y$10$1lKRz/e8egocwFk7FhE15u0koJklyJIdc.EQnhE3mYe49RXcdW8ru', 'Ora', 'Maki', 'salma@gmail.com', '+20', '122777000', 195, 1, NULL, 'mobile_users/7Cw47CbXar.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-07-09 04:02:59', '2018-07-09 04:02:59', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 'ldHw', 0, 'RBnN', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(52, 'sherifMaktabi', '$2y$10$QcAWsGpm3WMHh3eboHR2OufT1qczxX2CDoT.r3dOzc4N2hzMq8.aS', 'sherif', 'Maktabi', 'sherif.abdelkader@pentavalue.com', '+20', '1025113059', 195, 1, NULL, 'mobile_users/iGgB0pRFT2.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-07-10 12:09:47', '2018-07-10 12:09:47', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, 'pbbs', 0, 'yJgG', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(53, 'sherifa', '$2y$10$8YAT/LfEfTz3NUpPIBK0zuD2R/AQ6YHGkoIqwYt5ninGlu.LtPXFi', 'sherif', 'a', 'eng.s.abdelkader@pentavalue.com', '+20', '1287696187', 195, 1, NULL, 'mobile_users/HYzD3UBGfy.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-07-16 08:01:04', '2018-07-16 08:01:04', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, 'bfe3da7e88f9dfa5965698669413dd55fd730e46038a3db48c787e58d7b99cc41348327ed6e4f7b0', NULL, NULL, 1, 'ZV4I', 1, 'XWfL', '2018-07-16 08:01:04', NULL, '2018-07-16 08:01:04', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(54, 'OraMaki', '$2y$10$0tna8TlmGR9t/lEq3A8JHeVa/V1jWT79aUQmwGpMLuY.fS6JR/XSW', 'Ora', 'Maki', 'salma_100@gmail.com', '+20', '1277770000', 195, 1, NULL, 'mobile_users/aUqJshftl0.jpeg', NULL, 0, 1, 0, NULL, NULL, '2018-07-11 00:04:12', '2018-07-14 14:22:46', 'BF729B2D-4477-4D62-AE8E-16AF0616DC06', 'android', NULL, NULL, NULL, NULL, 1, '7JwE', 1, '1JYJ', '2018-07-14 14:22:46', NULL, '2018-07-11 00:04:12', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(55, 'androidandroid', '$2y$10$ryZC5NJ43YNMEnc9vn.ZtuU7Z4oBtfd2XC9G/ithjlaXBWwCpxwxa', 'android', 'android', 'android@pentavalue.com', '+966', '1227775313', 195, 1, NULL, '/mobile_users/tfATpX7iJE.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-09 10:34:08', '2018-10-09 10:41:48', '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', NULL, '210708e9bedbfd4efcd98e505a4e78a911689631ad9241b70a650b1c0e2d253d6e8ab6ae77ec2a22', NULL, NULL, 1, 'qz7P', 1, 'nDt6', '2018-10-09 10:41:48', NULL, '2018-10-09 10:34:08', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(56, 'iosios', '$2y$10$7gwRqg1NPgzqk1oVPQpmsufefOyqkdo7pWCibCmN3YFd114snDnlm', 'ios', 'ios', 'ios@pentavalue.com', '+20', '1227775314', 195, 1, NULL, 'mobile_users/aUNxfdUTIe.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-07-12 09:56:50', '2018-07-12 09:56:50', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, '6cfa070dc766e2c6e18676df8aa1b3066390a79de5a696e38f7d9c378a219e3423ca4833d7d1d664', NULL, NULL, 1, 'y4uh', 1, 'T8ZG', '2018-07-12 09:56:50', NULL, '2018-07-12 09:56:50', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(57, 'OraMaki', '$2y$10$DrJ1kHLrohDznXHSHjEFNOewA6yKK7hz8Mt1sbMMujZFkFv2iP1T6', 'Ora', 'Maki', 'momo@gmail.com', '+20', '1007770000', 195, 1, NULL, 'mobile_users/uIEimIRuvC.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-17 06:40:12', '2018-09-17 06:40:12', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, '729ff7d390d4e0b6b55987abc1c88eaf855634c73e82fee762dae9e40c412f01ff55de720bcb76f8', NULL, NULL, 1, 'iouN', 1, 'DW7x', '2018-09-17 06:40:12', 1, '2018-09-17 06:40:12', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(58, 'mohamedhussien', '$2y$10$Yp5KVmDUq6fxFCJj4JlTzuboiD1XwgvKFq8tDcO4sYMxwzT1ts5T6', 'mohamed', 'hussien', 'Mohamed.hussien07@gmail.com', '+20', '9876543210', 195, 1, NULL, '0', NULL, 0, 0, 0, NULL, NULL, '2018-07-31 21:55:22', '2018-07-31 21:55:22', '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, NULL, NULL, NULL, NULL, 'oOjw', 0, 'x7rR', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(59, 'mohamedhussien', '$2y$10$4xW0CaJY6NAyz5rFivJh7.EWxh4S2z3cutt43MWLsm1O/adkyLgoG', 'mohamed', 'hussien', 'test@yyyy.com', '+244', '1284811078', 195, 1, NULL, '0', NULL, 1, 1, 0, NULL, NULL, '2018-07-31 22:13:19', '2018-08-11 16:12:22', '8E05FA19-C090-4095-AA31-2F4D046A3ED3', 'ios', NULL, NULL, NULL, NULL, NULL, 'rS6A', 1, 'fCbO', '2018-08-11 16:12:22', 1, '2018-07-31 22:13:19', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(60, 'shahiparis', '$2y$10$yDhGgRel5V7KMilaSQM.x.YUbKjZm5OA0A6NdBA8OQd0W1azXba/m', 'shahi', 'paris', 'shahi.paris@pentavalue.com', '+20', '1227779876', 195, 1, NULL, 'mobile_users/o2Z5YHKJsg.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-09-25 08:58:43', '2018-09-25 08:58:43', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'OtdH', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(61, 'amrelghadbna', '$2y$10$FN5fvBhU8HJ/WIlPPoiuAOVVBU9k535p8jTSMbTQXC9ML/htHV/T6', 'amr', 'elghadbna', 'and.elghadban@gmail.com', '+93', '3445566', 195, 1, NULL, 'mobile_users/bLguYGHikn.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-09-26 18:36:06', '2018-09-26 18:36:06', '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'hK5s', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(62, 'amrelghadbna', '$2y$10$n26JA1EAuMYuIQEkebt1LOtg8OfSTPfki68DO.uclS1J.U9k/L51G', 'amr', 'elghadbna', 'amr.elghadban@gmail.com', '+93', '334455', 195, 1, NULL, 'mobile_users/zR5sjKv3wW.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-09-26 18:41:16', '2018-09-26 18:41:16', '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'sR5B', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(63, 'amrelghadabn', '$2y$10$X7qyaDjHn1LLPuEIMnDriuU/p7AGlLQJMc7rsge2n9AOVjxR0SMn.', 'amr', 'elghadabn', 'amr.elghadban@gamil.com', '+93', '554433221', 195, 1, NULL, 'mobile_users/MP92wPCUg3.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-09-26 18:56:06', '2018-09-26 18:56:06', '2F2A2E74-9E83-4600-AD88-222AFDBB2FBB', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'X6mR', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(64, 'amrelghadban', '$2y$10$A5DhOEIRiUIyv9VTt.birOAWwg6DcmiBQnriC.u36VC00FjFHHqG.', 'amr', 'elghadban', 'amr.elghadban13@gmail.com', '+93', '33445566', 195, 1, NULL, 'mobile_users/AV0sNeRbnU.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-26 19:29:27', '2018-09-26 19:30:05', '51EB31F6-CC2A-42AE-89EB-20FB6B376125', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'GQNZ', '2018-09-26 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(65, 'basemahmed', '$2y$10$vrCYoRAqiqvB2hlrJi7OXOjbVr3i.43.trn7HFGd4RJfz6fGCj/GG', 'basem', 'ahmed', 'test123@gmail.com', '+93', '123123', 195, 1, NULL, 'mobile_users/YweY0BJb7i.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-26 20:02:17', '2018-09-26 20:11:19', 'DFE57C9B-69C5-4077-B093-4074654D0006', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'Obge', '2018-09-26 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(66, 'mohamedakalla', '$2y$10$1Y3SmkYFlWbc3UCw/w0KsOr0onJS6UKpIMGcILd472x0JXwi6CMVG', 'mohamed', 'akalla', 'akalal@halal.com', '+93', '123456', 195, 1, NULL, 'mobile_users/wgGeT16px6.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-26 20:32:18', '2018-09-26 20:32:44', 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'OuTh', '2018-09-26 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(67, 'qwqwwqwww', '$2y$10$IBNs9g2J.Wv0t5yTv8omzONHaopBjK8ZnWPrs9duOKWKpbUV9C1UW', 'qwqww', 'qwww', 'asdd@jjdkfk.com', '+93', '987654321', 195, 1, NULL, 'mobile_users/cslvhXmR8z.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-26 20:41:30', '2018-09-26 20:41:49', 'A902A5BC-1B8F-4A36-A081-06C7020DF1A3', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, '2j90', '2018-09-26 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(68, 'akaoaallal', '$2y$10$zoGLGrpbtWPUlWTzFCyHFObHNi0DB5cOULER4X/zVoMhIh.kd7DBe', 'akaoa', 'allal', 'koko@lol.com', '+93', '111213141516', 195, 1, NULL, 'mobile_users/7KmwNO3k8q.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-09-29 17:31:01', '2018-09-29 17:31:01', 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'eLFw', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(69, 'koaokkskls', '$2y$10$KGnNEPhpXeZE4grSmYlPxuvDxiibcL/VV38/N.d1ExpL03Q4QolMq', 'koaok', 'kskls', 'aaalal@lalla.com', '+93', '109109109', 195, 1, NULL, 'mobile_users/agtmPUvGed.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-29 18:23:38', '2018-09-29 18:23:38', 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, '70baeaf61e26de7910d904c5c08584b95092d03a57481d8ce1591bb1f7167397abbfc3a3f4b7dccf', NULL, NULL, NULL, '1234', 1, 'JwPw', '2018-09-29 18:23:38', NULL, '2018-09-29 18:23:38', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(70, 'saasaaasasa', '$2y$10$ekoJGzR.ErUTKnqL2XVy7ey/PFSDJmItmajEjydkGrik7auBCAHjm', 'saasa', 'aasasa', 'akklalkal@jsjkls.com', '+93', '11111111111223', 195, 1, NULL, 'mobile_users/TfoIF55G0D.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-29 18:13:25', '2018-09-29 18:13:33', 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'zYWw', '2018-09-29 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(71, 'kkalalqqqqq', '$2y$10$AV//hus1/GE7rIlNExnVVeBol7UZeYSvPkmwj27/uQC63BP1qy/xS', 'kkalal', 'qqqqq', 'kaallalal@koala.com', '+93', '12223334442', 195, 1, NULL, 'mobile_users/3DNCeb4fjZ.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-09-29 18:17:12', '2018-09-29 18:17:19', 'E98F9CF0-A916-425A-A360-D4F24EE42C68', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'PpvI', '2018-09-29 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(72, 'MustafaSan', '$2y$10$jE27qNAzTUlHwgoVAt9NbOH4zruv3dmV0wbIueq15l4smwjmC.7Ty', 'Mustafa', 'San', 'egoistic1@yahoo.com', '+20', '1007895473', 195, 1, NULL, 'mobile_users/yLZgleBVdX.jpeg', NULL, 1, 0, 1, NULL, NULL, '2018-10-08 11:45:24', '2018-10-09 08:00:47', '27E5D646-5A7E-48BD-A742-F0B5DAADC8E8', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'yIRy', '2018-10-09 10:00:47', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(73, 'maiadamohamed', '$2y$10$wAvCm3//2aguAvx921JUPOeV9786HjXSItC7yE4MCg4tohfjQRORG', 'maiada', 'mohamed', 'maiadam15@gshhss.com', '+20', '1128255536', 195, 1, NULL, '/mobile_users/C2u0HCYjmd.jpeg', NULL, 1, 1, 1, NULL, NULL, '2018-10-10 12:47:10', '2018-10-10 12:48:07', 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, 'b0afe8d8e6be37c4cbcf2ba1a6c5fa821f95a0dc36fe2c83009934775fc71d8e67f35fdf446172cd', NULL, NULL, NULL, '1234', 0, 'RLkN', '2018-10-11 10:49:11', NULL, '2018-10-10 12:47:10', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(74, 'ahmedmedo', '$2y$10$wAvCm3//2aguAvx921JUPOeV9786HjXSItC7yE4MCg4tohfjQRORG', 'ahmed', 'medo', 'ahmed.alaa.eldin122@gmail.com', '+20', '1021194536', 195, 1, NULL, '/mobile_users/JeaDyfIWS5.jpeg', NULL, 1, 1, 1, NULL, NULL, '2018-10-11 13:43:25', '2018-10-11 13:43:25', 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, '2e046e2c3d8ca70400c27da1e8b1c648468723dc780dffa7633163d8cf32aaa9112afc957ea7ba78', NULL, NULL, 1, '1234', 0, 'Or9L', '2018-10-11 13:43:25', NULL, '2018-10-11 13:43:25', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(75, 'santaf', '$2y$10$XoxeRPTcWLOifNHU16aCfeSqzNU/esUT4F.cQW9L7LJmO9ycIEYqO', 'Mustafa', NULL, 'egoistic1@yahoo.com', NULL, '01007895473', NULL, NULL, NULL, 'backend_users/1539097905194.jpg', NULL, 1, 0, 0, NULL, NULL, '2018-10-09 13:11:45', '2018-10-10 06:13:13', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-10-10 08:17:45', NULL, '2018-10-10 06:13:01', NULL, NULL, 'Africa/Cairo', 'XO8xVA9wNQXLw3CplO8TidLjAyXN5llSu15r79vFdISn52DYYVXskGpfKWpZ', NULL),
(76, 'amroooamrooooo', '$2y$10$8E.qhEHdWP0xPaSeLGTZCe5pIUY7SIDT0IrBOBRSUe9D5RQme9VKu', 'amrooo', 'amrooooo', 'amro@amro.com', '+93', '1122334455', 195, 1, NULL, 'mobile_users/fr62p4lIZ1.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-09 18:03:22', '2018-10-09 18:03:54', 'B3BF2A77-CB7F-4954-819A-2EB55427F683', 'ios', NULL, '8245a771eeed48fd5fb0471654c04d2fed1e819d63f6152ad27416a59993e2e84f2ec65a85956b25', NULL, NULL, 2, '1234', 1, 'ZSH2', '2018-10-09 18:03:54', NULL, '2018-10-09 18:03:22', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(77, 'zzzsss', '$2y$10$MsQ7/b8wpy3byGnnkvQKL.wO7OGpj4lalj8Qk9nAYCZ59Ny1nLCxu', 'zzz', 'sss', 'ii@mail.com', '+20', '1098558500', 195, 1, NULL, 'mobile_users/peaarod6p5.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-09 18:09:48', '2018-10-09 18:11:13', '8C134F55-CC87-4067-811A-69C26EC99BB4', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'XkIs', '2018-10-09 00:00:00', 1, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(78, 'nnnnaaaa', '$2y$10$SV726h4cwJuT7t7tTpEHCuVnkGrqSxJZUtdq8VSuPgBRp/dtyCBQK', 'nnnn', 'aaaa', 'zz@mail.com', '+20', '1097311391', 195, 1, NULL, 'mobile_users/cC9ZlDZuDC.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-09 18:12:58', '2018-10-09 18:12:58', '8C134F55-CC87-4067-811A-69C26EC99BB4', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'Rape', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(79, 'AE', '$2y$10$Hf.ja0ae2f07f8hi3TqBvuPWTAI76cPecM/j/XvdPcvl3698zgeNq', 'A', 'E', 'mamamam@yahoo.com', '+20', '1018979697', 195, 1, NULL, 'mobile_users/LmsjWt8kjh.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 08:19:36', '2018-10-10 08:19:36', 'BAA23CCC-8C3F-43F4-A845-9B6563B516EE', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'kWMl', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(80, 'Karen', '$2y$10$VFVBaPjGkalbe82J81Lx7.X2Bs6O3ZmtjAkGvxtlGXWcYmqsCWgwm', 'Karen', '', 'salma.omar33@pentavalue.com', '+20', '1223335312', 195, 1, 1, 'mobile_users/CylnSN0z4D.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 10:43:36', '2018-10-10 10:43:36', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, '6ct4', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(81, 'Kared n2', '$2y$10$IrFh0G3doXjkTer//IIWuOEZp/kPM0dD/akws.ITfcROxsWuFc6Be', 'Kared n2', '', 'salma.omar323@pentavalue.com', '+20', '12233335312', 195, 1, 1, 'mobile_users/FQ9EmeXFn2.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 13:35:05', '2018-10-10 13:35:05', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, '0UdI', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(82, 'Kardded n2', '$2y$10$BBkAlf89ZjxIXm4w/4dx9.MhNOfbdFR72oU.uWBHUh0rTCeKhQsA.', 'Kardded n2', '', 'salma.omddar323@pentavalue.com', '+20', '122333385312', 195, 1, 1, 'mobile_users/F0j4IIU3q7.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 13:35:24', '2018-10-10 13:35:24', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'YJfn', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(83, 'Malek', '$2y$10$V/tKOv2oGt6OSqgXVj52suZ1qU5tfIdess8wFk.L318Ntae/zTn6u', 'Malek', '', 'salma.omar2@pentavalue.com', '+20', '1227775513', NULL, NULL, 1, 'mobile_users/akgom2X8DJ.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 13:36:31', '2018-10-10 13:36:31', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'Idhl', NULL, NULL, NULL, NULL, '30.090984', NULL, NULL, NULL),
(84, 'Malek', '$2y$10$D2BvgUEtL.3hlQVYwsAGDeGor1eFipobS5WtLvmqEWS8deeKhqRvq', 'Malek', '', 'salma.omar4@pentavalue.com', '+20', '1227775913', NULL, NULL, 1, 'mobile_users/190IX7Rvkz.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 13:38:04', '2018-10-10 13:38:04', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'neMO', NULL, NULL, NULL, NULL, '30.090984', NULL, NULL, NULL),
(85, 'Malek', '$2y$10$eWHyeLFstj1SUobhi/.OMOsfBAM2/Lpn.02BjDdkQQSJt.A8bxIl2', 'Malek', '', 'salma.omar8@pentavalue.com', '+20', '1227875913', NULL, NULL, 1, 'mobile_users/iqMnCkvKDz.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 13:40:00', '2018-10-10 13:40:00', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, '5zMt', NULL, NULL, NULL, NULL, '30.090984', NULL, NULL, NULL),
(86, 'shebo', '$2y$10$UDXbKxa1QMHvYlGH6FR//uous1P9YtCl7Dr8q.gyJOqchHz20USwS', 'shebo', '', 'shebo@ga.com', '+20', '1113587330', NULL, NULL, 1, 'mobile_users/yVU8IQNZGk.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 14:18:56', '2018-10-10 14:18:56', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'pIwP', NULL, NULL, NULL, NULL, '31.3749877', NULL, NULL, NULL),
(87, 'sheb2o', '$2y$10$7sh3mSLNKyiriEifC5XUxOEQ.3BNR88M0ebEpNFS1eC1Jzv7NkSji', 'sheb2o', '', 'shebo@gam.com', '+20', '1113587337', NULL, NULL, 1, 'mobile_users/aaPpmSGAi1.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-10 15:04:41', '2018-10-10 15:04:41', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, NULL, NULL, NULL, 1, '1234', 0, 'G9KM', NULL, NULL, NULL, NULL, '31.3749877', NULL, NULL, NULL),
(88, 'shehab', '$2y$10$IROzoFOJ2G6593H1fTl.dea6vP7DbxTvH5CJnDS9tJgGodG0S9tx2', 'shehab', '', 'shebo@gmail.com', '+20', '1234567890', NULL, NULL, 1, 'mobile_users/51eyFS5f4J.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-14 03:57:44', '2018-10-14 03:57:44', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, 'bc425030e5f127149e68b304523752ae9cf996fa29892fe6a8132468c80b5b1ee520bdbb7563d8b4', NULL, NULL, 1, '1234', 1, '6jgO', '2018-10-14 03:57:44', NULL, '2018-10-14 03:57:44', '30.0799981', '31.3749877', NULL, NULL, NULL),
(89, 'shehab', '$2y$10$33EgEWe5ebPAJAqP8x0ddeJbSiKN1wRkMO1ur3lXT0.oA9by.FXOa', 'shehab', '', 'sheboo@gmail.com', '+20', '1234567891', NULL, NULL, 1, 'mobile_users/YlShF4R8KV.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-14 03:22:47', '2018-10-14 03:22:47', 'c0u7NmRxxGg:APA91bFPmiJX0BuBU8ieXIPjBxREDdN3j0AOeIwEU-639vGWKkazzlA6AfFbchB2T5ojcdxqh3leb0EqGHdMC0VtLTDJ5VHgQBHctnZOhYtl4joM2FFX3mP5LaZycP7Z8Sr-vhQovWh_', 'android', NULL, '3c0d202c371e9799d256e7424079242cd726dd5aa676338c2487ad620bb4dbee6458f28fcc2fcb39', NULL, NULL, 1, '1234', 1, 'gAHS', '2018-10-14 03:22:47', NULL, '2018-10-14 03:22:47', '30.0799981', '31.3749877', NULL, NULL, NULL),
(91, 'amrooooamirooppoo', '$2y$10$llNwZog/7QKKzCh0nkkRmOmDWtxsQ21Qv4FEaGBt8ycyerauAGS8.', 'amroooo', 'amirooppoo', 'amorooo@amrooo.com', '+93', '999000999000', 195, 1, NULL, 'mobile_users/Z8gbsGHmuE.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-12 13:58:00', '2018-10-12 13:58:09', 'BD6AD1DD-E7E1-414C-A49B-B1F3F16119B0', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'FnEp', '2018-10-12 00:00:00', NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(92, 'ccccccaaaaaa', '$2y$10$XBMJ2jHrX4r/yyuJOG7S4ujZ9MVYmIufnbra2cghv0XTByi4Z9vOS', 'cccccc', 'aaaaaa', 'vvvv@nnnn.com', '+355', '124356789', 195, 1, NULL, 'mobile_users/NF9ukySsPu.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-12 14:16:25', '2018-10-12 14:16:25', '4F282960-5D1B-44B8-BCE7-86F2E34C6689', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'GMIP', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(93, 'vvvvvxxxxxx', '$2y$10$iqFj22VMc.bFz/BEQ0XFIOrehoDZTSdmhDChrCIO/oXvri7sDpUUK', 'vvvvv', 'xxxxxx', 'xxx@mail.com', '+20', '10973113000', 195, 1, NULL, 'mobile_users/lfMYagAnWR.jpeg', NULL, 0, 0, 0, NULL, NULL, '2018-10-12 19:57:00', '2018-10-12 19:57:00', '4F282960-5D1B-44B8-BCE7-86F2E34C6689', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 0, 'Ws0x', NULL, NULL, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(94, 'aaaaaaaa', '$2y$10$HGFkzLSd42vgA8pOX5UfBeQ/Of19tACueG0xnEtN2HqOP.u7owe9i', 'aaaa', 'aaaa', 'aaaam@mamma.com', '+93', '111000111', 195, 1, NULL, 'mobile_users/gEtZzxxxL5.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-13 20:48:22', '2018-10-13 20:54:59', '4F282960-5D1B-44B8-BCE7-86F2E34C6689', 'ios', NULL, NULL, NULL, NULL, 1, '1234', 1, 'BfuI', '2018-10-13 20:54:59', NULL, '2018-10-13 20:48:22', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(95, 'hhhhhqqqllal', '$2y$10$gcrwDtADcDFfTHFLHkQRo./A0rBDI4qJ9PviHaAezNu8WiecLFUIW', 'hhhhh', 'qqqllal', 'test99@test99.com', '+355', '150015001500', 195, 1, NULL, 'mobile_users/2e64ABbwgS.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-13 10:43:18', '2018-10-13 10:58:37', '3C00BB15-AAA8-488E-80AA-DDB423A1F9AE', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'NRNu', '2018-10-13 00:00:00', 1, NULL, '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(96, 'amooooamooooo', '$2y$10$EfgeRwY.njO9vOAjZLfbTukDEtUxtP/6rZ/GrFwLR6xxbp8OPB..6', 'amoooo', 'amooooo', 'amrooo@amrooo.com', '+93', '01098558500', 195, 1, NULL, 'mobile_users/83dej83uZC.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-13 11:28:03', '2018-10-13 11:50:10', '3C00BB15-AAA8-488E-80AA-DDB423A1F9AE', 'ios', NULL, NULL, NULL, NULL, NULL, '1234', 1, 'AdCp', '2018-10-13 11:50:10', 1, '2018-10-13 11:28:03', '46.73858600', '24.77426500', '+02:00', NULL, NULL),
(97, 'new testnew test', '$2y$10$HQADIInL.Wq747gsLZdgW.aa6PbmtNsJAfCnVw0dnCY8zID5AyONq', 'new test', 'new test', 'test123@test321.com', '+93', '5555511111', 195, 1, NULL, 'mobile_users/lAEalVfkDt.jpeg', NULL, 1, 1, 0, NULL, NULL, '2018-10-13 17:03:17', '2018-10-13 17:03:42', 'F177B824-6AD2-419C-A2B2-903D9C0AFD66', 'ios', NULL, '39e98c06332c143f534b8957604ca3cd3fe06bf77387064d345d39a0c5ad813da387208ff0f016cf', NULL, NULL, 1, '1234', 1, 'wzMh', '2018-10-13 17:03:42', 2, '2018-10-13 17:03:17', '46.73858600', '24.77426500', '+02:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_calendars`
--

CREATE TABLE `user_calendars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `to_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_calendars`
--

INSERT INTO `user_calendars` (`id`, `user_id`, `event_id`, `from_date`, `to_date`) VALUES
(1, 36, 3, '2018-06-29 18:00:00', '2018-06-29 23:00:00'),
(3, 36, 4, '2018-06-29 18:00:00', '2018-06-29 23:00:00'),
(5, 36, 5, '2018-06-29 18:00:00', '2018-06-29 23:00:00'),
(6, 36, 6, '2018-06-29 18:00:00', '2018-06-29 23:00:00'),
(7, 36, 7, '2018-06-29 18:00:00', '2018-06-29 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`id`, `name`, `entity_id`, `user_id`, `item_id`) VALUES
(2, 'Favorite', 4, 36, 4),
(3, 'Favorite', 4, 36, 5),
(4, 'Favorite', 4, 36, 6),
(7, 'Favorite Shop', 10, 41, 1),
(8, 'Favorite Shop', 10, 41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_going`
--

CREATE TABLE `user_going` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_going`
--

INSERT INTO `user_going` (`id`, `user_id`, `event_id`) VALUES
(9, 36, 4),
(10, 36, 5),
(11, 36, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `interest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `user_id`, `interest_id`) VALUES
(12, 3, 1),
(13, 3, 3),
(14, 12, 1),
(15, 12, 2),
(19, 16, 4),
(20, 36, 4),
(21, 36, 5),
(22, 36, 6),
(29, 42, 7),
(30, 42, 8),
(31, 42, 9),
(32, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_rules`
--

CREATE TABLE `user_rules` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_rules`
--

INSERT INTO `user_rules` (`id`, `user_id`, `rule_id`) VALUES
(3, 1, 1),
(4, 1, 3),
(5, 9, 4),
(6, 9, 1),
(9, 7, 3),
(10, 7, 1),
(11, 11, 4),
(12, 11, 1),
(13, 12, 2),
(14, 13, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 2),
(24, 23, 4),
(25, 23, 1),
(26, 24, 2),
(27, 25, 2),
(28, 26, 2),
(29, 27, 2),
(30, 28, 2),
(31, 29, 2),
(32, 30, 2),
(33, 31, 2),
(34, 32, 2),
(35, 33, 2),
(36, 34, 2),
(37, 35, 2),
(38, 36, 2),
(39, 37, 2),
(40, 38, 2),
(41, 39, 2),
(42, 40, 2),
(43, 41, 2),
(44, 42, 2),
(45, 43, 2),
(48, 45, 4),
(49, 45, 1),
(50, 46, 5),
(51, 46, 1),
(54, 44, 3),
(55, 44, 1),
(56, 47, 2),
(57, 48, 2),
(58, 49, 2),
(59, 50, 3),
(60, 50, 1),
(61, 51, 2),
(62, 52, 2),
(63, 53, 2),
(64, 54, 2),
(65, 55, 2),
(66, 56, 2),
(67, 57, 2),
(68, 58, 2),
(69, 59, 2),
(70, 60, 2),
(71, 61, 2),
(72, 62, 2),
(73, 63, 2),
(74, 64, 2),
(75, 65, 2),
(76, 66, 2),
(77, 67, 2),
(78, 68, 2),
(79, 69, 2),
(80, 70, 2),
(81, 71, 2),
(82, 72, 2),
(83, 73, 2),
(84, 74, 2),
(85, 75, 4),
(86, 75, 1),
(87, 76, 2),
(88, 77, 2),
(89, 78, 2),
(90, 79, 2),
(91, 80, 2),
(92, 81, 2),
(93, 82, 2),
(94, 83, 2),
(95, 84, 2),
(96, 85, 2),
(97, 86, 2),
(98, 87, 2),
(99, 88, 2),
(100, 89, 2),
(101, 90, 2),
(102, 91, 2),
(103, 92, 2),
(104, 93, 2),
(105, 94, 2),
(106, 95, 2),
(107, 96, 2),
(108, 97, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_ranges`
--
ALTER TABLE `age_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `big_events`
--
ALTER TABLE `big_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entity_localizations`
--
ALTER TABLE `entity_localizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_booking_tickets`
--
ALTER TABLE `event_booking_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_hash_tags`
--
ALTER TABLE `event_hash_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_media`
--
ALTER TABLE `event_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_posts`
--
ALTER TABLE `event_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_post_replies`
--
ALTER TABLE `event_post_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_statuses`
--
ALTER TABLE `event_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famous_attractions`
--
ALTER TABLE `famous_attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famous_attraction_categories`
--
ALTER TABLE `famous_attraction_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famous_attraction_days`
--
ALTER TABLE `famous_attraction_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famous_attraction_media`
--
ALTER TABLE `famous_attraction_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_categories`
--
ALTER TABLE `fa_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_pages`
--
ALTER TABLE `fixed_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geo_cities`
--
ALTER TABLE `geo_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geo_countries`
--
ALTER TABLE `geo_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hash_tags`
--
ALTER TABLE `hash_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_push`
--
ALTER TABLE `notifications_push`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_items`
--
ALTER TABLE `notification_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_branches`
--
ALTER TABLE `shop_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_branch_times`
--
ALTER TABLE `shop_branch_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_days`
--
ALTER TABLE `shop_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_media`
--
ALTER TABLE `shop_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_keywords`
--
ALTER TABLE `trending_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_calendars`
--
ALTER TABLE `user_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_going`
--
ALTER TABLE `user_going`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rules`
--
ALTER TABLE `user_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_ranges`
--
ALTER TABLE `age_ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `big_events`
--
ALTER TABLE `big_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `entity_localizations`
--
ALTER TABLE `entity_localizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_booking_tickets`
--
ALTER TABLE `event_booking_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `event_hash_tags`
--
ALTER TABLE `event_hash_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `event_media`
--
ALTER TABLE `event_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `event_posts`
--
ALTER TABLE `event_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `event_post_replies`
--
ALTER TABLE `event_post_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event_statuses`
--
ALTER TABLE `event_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `famous_attractions`
--
ALTER TABLE `famous_attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `famous_attraction_categories`
--
ALTER TABLE `famous_attraction_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `famous_attraction_days`
--
ALTER TABLE `famous_attraction_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `famous_attraction_media`
--
ALTER TABLE `famous_attraction_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fa_categories`
--
ALTER TABLE `fa_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fixed_pages`
--
ALTER TABLE `fixed_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `geo_cities`
--
ALTER TABLE `geo_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `geo_countries`
--
ALTER TABLE `geo_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `hash_tags`
--
ALTER TABLE `hash_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `notifications_push`
--
ALTER TABLE `notifications_push`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `notification_items`
--
ALTER TABLE `notification_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shop_branches`
--
ALTER TABLE `shop_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop_branch_times`
--
ALTER TABLE `shop_branch_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shop_days`
--
ALTER TABLE `shop_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `shop_media`
--
ALTER TABLE `shop_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trending_keywords`
--
ALTER TABLE `trending_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user_calendars`
--
ALTER TABLE `user_calendars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_going`
--
ALTER TABLE `user_going`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_rules`
--
ALTER TABLE `user_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2016 at 09:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evis_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('53ab51122965ed1052bbfadcbf26f4ee', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/50.0.2661.102 Chrome/50.0.2661.10', 1468352084, 'a:16:{s:9:"user_data";s:0:"";s:8:"admin_id";s:1:"1";s:10:"admin_name";s:5:"Admin";s:11:"admin_level";s:1:"1";s:15:"admin_date_time";s:19:"2016-06-28 18:37:28";s:11:"customer_id";s:1:"1";s:10:"first_name";s:6:"Sheikh";s:11:"grand_total";d:380;s:13:"shipping_city";s:9:"Australia";s:19:"shipping_first_name";s:6:"Sheikh";s:18:"shipping_last_name";s:5:"Arnov";s:14:"shipping_email";s:24:"arnov@evistechnology.com";s:15:"shipping_mobile";s:13:"8801611698715";s:16:"shipping_address";s:31:"Goal Bathan.\nMagura, Bangladesh";s:12:"payment_type";s:3:"COD";s:13:"cart_contents";a:4:{s:32:"676cab337d6b9f8889abe37c5211c28c";a:8:{s:5:"rowid";s:32:"676cab337d6b9f8889abe37c5211c28c";s:2:"id";s:2:"12";s:5:"image";s:49:"upload_image/product_image_0/footwear_1_thumb.png";s:4:"name";s:8:"منتج";s:3:"qty";s:1:"1";s:5:"price";s:6:"150.00";s:7:"options";a:2:{s:6:"colour";s:7:"Default";s:4:"size";s:7:"Default";}s:8:"subtotal";d:150;}s:32:"b780174b9362663619fd14108ad284b8";a:8:{s:5:"rowid";s:32:"b780174b9362663619fd14108ad284b8";s:2:"id";s:1:"8";s:5:"image";s:47:"upload_image/product_image_0/tshirt_1_thumb.png";s:4:"name";s:17:"قميص أخضر";s:3:"qty";s:1:"1";s:5:"price";s:6:"230.00";s:7:"options";a:2:{s:6:"colour";s:4:"Blue";s:4:"size";s:7:"Default";}s:8:"subtotal";d:230;}s:11:"total_items";i:2;s:10:"cart_total";d:380;}}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_level` tinyint(1) NOT NULL,
  `admin_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_date_time`, `admin_level`, `admin_status`) VALUES
(1, 'Admin', 'admin@evis.com', '111111', '2016-06-28 12:37:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(2) NOT NULL,
  `banner_image` varchar(250) NOT NULL,
  `banner_position` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_image`, `banner_position`) VALUES
(1, 'upload_image/banner_image/adv-left_thumb.jpg', 1),
(2, 'upload_image/banner_image/adv-right_thumb.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `color_code_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `color_code_id`, `category_name`, `category_status`) VALUES
(1, 1, 'قمصان رياضية', 1),
(2, 2, 'الاحذية الرياضية', 1),
(3, 3, 'الكرات الرياضية', 1),
(4, 4, 'البنطلونات الرياضية', 1),
(5, 5, 'الشورتات', 1),
(6, 6, 'الاكسسورات', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(2) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`) VALUES
(1, 'القاهرة');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(2) NOT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`) VALUES
(1, 'Default'),
(2, 'Red'),
(3, 'Blue'),
(4, 'Lime');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color_code`
--

CREATE TABLE `tbl_color_code` (
  `color_code_id` int(2) NOT NULL,
  `color_code_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_color_code`
--

INSERT INTO `tbl_color_code` (`color_code_id`, `color_code_name`) VALUES
(1, '#00acc1;'),
(2, '#009688;'),
(3, '#ffcc00;'),
(4, '#6666ff;'),
(5, '#006666;'),
(6, '#ff33cc;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(3) NOT NULL,
  `city_id` int(2) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(32) NOT NULL,
  `customer_mobile` varchar(50) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `city_id`, `first_name`, `last_name`, `customer_email`, `customer_password`, `customer_mobile`, `customer_address`, `customer_status`) VALUES
(1, 1, 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '111111', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match`
--

CREATE TABLE `tbl_match` (
  `match_id` int(10) NOT NULL,
  `first_team` varchar(100) NOT NULL,
  `opposite_team` varchar(100) NOT NULL,
  `match_time` varchar(10) NOT NULL,
  `match_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_match`
--

INSERT INTO `tbl_match` (`match_id`, `first_team`, `opposite_team`, `match_time`, `match_date`) VALUES
(1, 'آل هلال', 'الأهلي', '14:56', '20-07-2016'),
(2, 'الفتح', 'النصر', '01:30', '14-07-2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(4) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_image` varchar(250) NOT NULL,
  `news_date` varchar(11) NOT NULL,
  `news_summery` text NOT NULL,
  `full_news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_image`, `news_date`, `news_summery`, `full_news`) VALUES
(1, 'الأهلي يبدأ رحلة الدفاع عن الدوري السعودي بمواجهة الاتفاق', 'upload_image/news_image/1_thumb.jpg', '10-07-2016', 'يستهل الأهلي، حامل اللقب، مشواره في الموسم الجديد بدوري المحترفين السعودي لكرة القدم، بمواجهة الاتفاق الصاعد حديثا لدوري الأضواء، بعد صدور جدول مباريات الدور الأول، اليوم الإثنين.', ''),
(2, 'اتحاد جدة يعلن تسديد جزء من مستحقات مونتاري', 'upload_image/news_image/2_thumb.jpg', '12-07-2016', 'وتأتي هذه التحركات من جانب إدارة النادي المكلفة برئاسة أحمد مسعود، لتفادي أي عواقب محتملة جراء تقدم أي لاعب له مستحقات لدى النادي بشكوى رسمية، تمنع النادي من تسجيل لاعبين في فترة الانتقالات الصيفية.', ''),
(3, 'النصر السعودى فى اول تدريباته استعدادا للموسم الجديد', 'upload_image/news_image/3_thumb.jpg', '12-06-2016', 'وتأتي هذه التحركات من جانب إدارة النادي المكلفة برئاسة أحمد مسعود، لتفادي أي عواقب محتملة جراء تقدم أي لاعب له مستحقات لدى النادي بشكوى رسمية، تمنع النادي من تسجيل لاعبين في فترة الانتقالات الصيفية.', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_subscription`
--

CREATE TABLE `tbl_newsletter_subscription` (
  `subscription_id` int(10) NOT NULL,
  `subscription_email` varchar(100) NOT NULL,
  `subscription_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(5) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `shipping_id` int(4) NOT NULL,
  `payment_id` int(4) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `invoice_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_status`, `order_total`, `invoice_date`) VALUES
(1, 1, 1, 1, 0, 700.00, '2016-07-12'),
(2, 1, 2, 2, 1, 200.00, '2016-07-12'),
(3, 1, 3, 3, 0, 700.00, '2016-07-12'),
(4, 1, 4, 4, 0, 500.00, '2016-07-12'),
(5, 1, 5, 5, 0, 500.00, '2016-07-12'),
(6, 1, 6, 6, 1, 500.00, '2016-07-12'),
(7, 1, 7, 7, 1, 500.00, '2016-07-12'),
(8, 1, 8, 8, 1, 500.00, '2016-07-12'),
(9, 1, 9, 9, 1, 500.00, '2016-07-12'),
(10, 1, 10, 10, 1, 500.00, '2016-07-12'),
(11, 1, 11, 11, 1, 500.00, '2016-07-12'),
(12, 1, 12, 12, 1, 500.00, '2016-07-12'),
(13, 1, 13, 13, 1, 500.00, '2016-07-12'),
(14, 1, 14, 14, 1, 500.00, '2016-07-12'),
(15, 1, 15, 15, 1, 500.00, '2016-07-12'),
(16, 1, 16, 16, 1, 500.00, '2016-07-12'),
(17, 1, 17, 17, 1, 500.00, '2016-07-12'),
(18, 1, 18, 18, 1, 500.00, '2016-07-12'),
(19, 1, 19, 19, 1, 500.00, '2016-07-12'),
(20, 1, 20, 20, 0, 1200.00, '2016-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`) VALUES
(1, 1, 5, 'معطف - Default - Default', 500, '1'),
(2, 1, 4, 'تي شيرت - Default - Default', 200, '1'),
(3, 2, 4, 'تي شيرت Colour :- Default Size :- Default', 200, '1'),
(4, 3, 10, 'منتج Colour :- Default Size :- Default', 210, '1'),
(5, 3, 11, 'منتج Colour :- Default Size :- Default', 340, '1'),
(6, 3, 12, 'منتج Colour :- Default Size :- Default', 150, '1'),
(7, 4, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(8, 5, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(9, 6, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(10, 7, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(11, 8, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(12, 9, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(13, 10, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(14, 11, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(15, 12, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(16, 13, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(17, 14, 5, 'معطف Colour :- Default Size :- Default', 500, '1'),
(18, 15, 5, 'معطف(Colour:- Default) (Size:- Default)', 500, '1'),
(19, 16, 5, 'معطف (Colour:- Default) (Size:- Default)', 500, '1'),
(20, 17, 5, 'معطف (Colour:- Default) (Size:- Default)', 500, '1'),
(21, 18, 5, 'معطف (Colour:- Default) (Size:- Default)', 500, '1'),
(22, 19, 5, 'معطف (Colour:- Default) (Size:- Default)', 500, '1'),
(23, 20, 5, 'معطف (Colour:- Default) (Size:- Default)', 500, '1'),
(24, 20, 11, 'منتج (Colour:- Default) (Size:- Default)', 340, '1'),
(25, 20, 10, 'منتج (Colour:- Default) (Size:- Default)', 210, '1'),
(26, 20, 12, 'منتج (Colour:- Default) (Size:- Default)', 150, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(5) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `shipping_id` int(4) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `customer_id`, `shipping_id`, `payment_type`, `payment_status`, `payment_date_time`) VALUES
(1, 1, 1, 'COD', 0, '2016-07-12 09:38:04'),
(2, 1, 2, 'COD', 0, '2016-07-12 17:02:14'),
(3, 1, 3, 'COD', 0, '2016-07-12 17:05:16'),
(4, 1, 4, 'COD', 0, '2016-07-12 17:34:19'),
(5, 1, 5, 'COD', 0, '2016-07-12 17:39:41'),
(6, 1, 6, 'COD', 0, '2016-07-12 17:41:59'),
(7, 1, 7, 'COD', 0, '2016-07-12 17:42:51'),
(8, 1, 8, 'COD', 0, '2016-07-12 17:42:55'),
(9, 1, 9, 'COD', 0, '2016-07-12 17:46:31'),
(10, 1, 10, 'COD', 0, '2016-07-12 17:47:28'),
(11, 1, 11, 'COD', 0, '2016-07-12 17:47:54'),
(12, 1, 12, 'COD', 0, '2016-07-12 17:48:15'),
(13, 1, 13, 'COD', 0, '2016-07-12 17:48:36'),
(14, 1, 14, 'COD', 0, '2016-07-12 17:48:55'),
(15, 1, 15, 'COD', 0, '2016-07-12 17:51:26'),
(16, 1, 16, 'COD', 0, '2016-07-12 17:51:58'),
(17, 1, 17, 'COD', 0, '2016-07-12 17:52:57'),
(18, 1, 18, 'COD', 0, '2016-07-12 17:53:36'),
(19, 1, 19, 'COD', 0, '2016-07-12 17:53:49'),
(20, 1, 20, 'COD', 0, '2016-07-12 18:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prediction`
--

CREATE TABLE `tbl_prediction` (
  `prediction_id` int(10) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `match_id` int(10) NOT NULL,
  `first_team_prediction` text NOT NULL,
  `opposite_team_prediction` text NOT NULL,
  `date_of_prediction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prediction`
--

INSERT INTO `tbl_prediction` (`prediction_id`, `customer_id`, `match_id`, `first_team_prediction`, `opposite_team_prediction`, `date_of_prediction`) VALUES
(1, 1, 2, 'This team win', 'This team win loses', '2016-07-11 13:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(4) NOT NULL,
  `category_id` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_tag` varchar(10) NOT NULL,
  `product_image_0` varchar(250) NOT NULL,
  `product_image_1` varchar(250) NOT NULL,
  `product_image_2` varchar(250) NOT NULL,
  `product_image_3` varchar(250) NOT NULL,
  `product_image_4` varchar(250) NOT NULL,
  `product_quantity` varchar(10) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_old_price` float(10,2) DEFAULT NULL,
  `product_summery` text NOT NULL,
  `product_description` text NOT NULL,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_color`, `product_size`, `product_name`, `product_tag`, `product_image_0`, `product_image_1`, `product_image_2`, `product_image_3`, `product_image_4`, `product_quantity`, `product_price`, `product_old_price`, `product_summery`, `product_description`, `product_status`) VALUES
(2, 1, 'Red', 'M', 'كرة قدم', '', 'upload_image/product_image_0/2_thumb.png', '', '', '', '', '300', 400.00, 0.00, '', '', 1),
(3, 1, 'Blue', 'L', 'كرة قدم', '', 'upload_image/product_image_0/3_thumb.png', '', '', '', '', '50', 120.00, 0.00, '', '', 1),
(4, 2, 'Lime', 'S', 'تي شيرت', '', 'upload_image/product_image_0/2_thumb.jpg', '', '', '', '', '298', 200.00, 170.00, '', '', 1),
(5, 2, 'Default', 'S', 'معطف', '', 'upload_image/product_image_0/blouse_thumb.jpg', '', '', '', '', '182', 500.00, 400.00, '', '', 1),
(7, 5, 'Red', 'M', 'قميص ازرق', '', 'upload_image/product_image_0/tshirt_thumb.png', '', '', '', '', '300', 200.00, 0.00, '', '', 1),
(8, 6, 'Blue', 'L', 'قميص أخضر', '', 'upload_image/product_image_0/tshirt_1_thumb.png', '', '', '', '', '20', 230.00, 0.00, '', '', 1),
(9, 1, 'Red', 'L', 'قميص ابيض', '', 'upload_image/product_image_0/tshirt_2_thumb.png', '', '', '', '', '50', 100.00, 0.00, '', '', 1),
(10, 4, 'Blue', 'M', 'منتج', '', 'upload_image/product_image_0/demo_1_thumb.png', '', '', '', '', '18', 210.00, 0.00, '', '', 1),
(11, 4, 'Red', 'S', 'منتج', '', 'upload_image/product_image_0/demo_2_thumb.png', '', '', '', '', '8', 340.00, 0.00, '', '', 1),
(12, 6, 'Red', 'S', 'منتج', '', 'upload_image/product_image_0/footwear_1_thumb.png', 'upload_image/product_image_1/footwear_thumb.png', '', '', '', '88', 150.00, 0.00, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(4) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_first_name` varchar(100) NOT NULL,
  `shipping_last_name` varchar(100) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_mobile` varchar(50) NOT NULL,
  `shipping_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_id`, `shipping_city`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_mobile`, `shipping_address`) VALUES
(1, 1, '1', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(2, 1, '0', '0', '0', '0', '0', '0'),
(3, 1, 'Dhaka', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(4, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(5, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(6, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(7, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(8, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(9, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(10, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(11, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(12, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(13, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(14, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(15, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(16, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(17, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(18, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(19, 1, 'القاهرة', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh'),
(20, 1, 'Australia', 'Sheikh', 'Arnov', 'arnov@evistechnology.com', '8801611698715', 'Goal Bathan.\nMagura, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(2) NOT NULL,
  `size_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, 'Default'),
(2, 'S'),
(3, 'M'),
(4, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `slide_id` int(2) NOT NULL,
  `slide_title` varchar(100) NOT NULL,
  `slide_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `slide_title`, `slide_image`) VALUES
(1, 'الأهلي يبدأ رحلة الدفاع عن الدوري السعودي بمواجهة الاتفاق', 'upload_image/slide_image/1_thumb.jpg'),
(2, 'اتحاد جدة يعلن تسديد جزء من مستحقات مونتاري', 'upload_image/slide_image/2_thumb.jpg'),
(3, 'النصر السعودي يبدأ أول تدريباته استعدادا للموسم الجديد', 'upload_image/slide_image/3_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(3) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `team_wins` varchar(10) NOT NULL,
  `team_loses` varchar(10) NOT NULL,
  `team_ties` varchar(10) NOT NULL,
  `team_goals` varchar(10) NOT NULL,
  `team_points` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `team_name`, `team_wins`, `team_loses`, `team_ties`, `team_goals`, `team_points`) VALUES
(1, 'الأهلي', '19', '1', '6', '55', '63'),
(2, 'آل هلال', '17', '5', '4', '52', '55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `product_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_color_code`
--
ALTER TABLE `tbl_color_code`
  ADD PRIMARY KEY (`color_code_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_match`
--
ALTER TABLE `tbl_match`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_newsletter_subscription`
--
ALTER TABLE `tbl_newsletter_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_prediction`
--
ALTER TABLE `tbl_prediction`
  ADD PRIMARY KEY (`prediction_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_color_code`
--
ALTER TABLE `tbl_color_code`
  MODIFY `color_code_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_match`
--
ALTER TABLE `tbl_match`
  MODIFY `match_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_newsletter_subscription`
--
ALTER TABLE `tbl_newsletter_subscription`
  MODIFY `subscription_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_prediction`
--
ALTER TABLE `tbl_prediction`
  MODIFY `prediction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `slide_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

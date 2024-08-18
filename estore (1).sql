-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 05:18 PM
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
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `estore_brand`
--

CREATE TABLE `estore_brand` (
  `ID` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_status` int(11) NOT NULL COMMENT '1 for active 0 for inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_brand`
--

INSERT INTO `estore_brand` (`ID`, `b_name`, `b_image`, `b_status`) VALUES
(14, 'Samsung', '', 1),
(16, 'Xiaomi', '', 1),
(17, 'Motorola', '', 1),
(18, 'Realme', '', 1),
(19, 'Nokia', '', 1),
(20, 'Oppo', '', 1),
(21, 'Vivo', '', 1),
(22, 'TCL', '', 1),
(23, 'Huawei', '', 1),
(24, 'Lenovo', '', 1),
(25, 'Google', '', 1),
(26, 'OnePlus', '', 1),
(27, 'Sony', '', 1),
(28, 'Asus', '', 1),
(29, 'Razer', '', 1),
(30, 'Nubia', '', 1),
(31, 'Ulefone', '', 1),
(32, 'Blackview', '', 1),
(33, 'Doogee', '', 1),
(34, 'Kyocera', '', 1),
(35, 'AGM', '', 1),
(36, 'Sonim', '', 1),
(37, 'OUKITEL', '', 1),
(38, 'Cat', '', 1),
(39, 'Land Rover', '', 1),
(40, 'Apple', '', 1),
(41, 'Poco', '', 1),
(42, 'Alcatel', '', 1),
(43, 'Jio', '', 1),
(44, 'LG', '', 1),
(45, 'Blu', '', 1),
(46, 'ZTE', '', 1),
(47, 'Amazon', '', 1),
(48, 'HP', '', 1),
(49, 'Dell', '', 1),
(50, 'Acer', '', 1),
(51, 'Microsoft', '', 1),
(52, 'Chuwi', '', 1),
(53, 'Vankyo', '', 1),
(54, 'Contixo', '', 1),
(55, 'Dragon Touch', '', 1),
(56, 'Teclast', '', 1),
(57, 'Ematic', '', 1),
(58, 'Kurio', '', 1),
(59, 'LeapFrog', '', 1),
(60, 'Honor', '', 1),
(61, 'Royole', '', 1),
(62, 'Microsoft', '', 1),
(63, 'Energizer', '', 1),
(64, 'Maxcom', '', 1),
(65, 'Itel', '', 1),
(66, 'Garmin', '', 1),
(67, 'Fitbit', '', 1),
(68, 'Fossil', '', 1),
(69, 'TicWatch', '', 1),
(70, 'Amazfit', '', 1),
(71, 'Suunto', '', 1),
(72, 'Withings', '', 1),
(73, 'Whoop', '', 1),
(74, 'Oura', '', 1),
(75, 'Kobo', '', 1),
(76, 'PocketBook', '', 1),
(77, 'Onyx Boox', '', 1),
(78, 'Barnes & Noble', '', 1),
(79, 'Sony', '', 1),
(80, 'Bookeen', '', 1),
(81, 'Boyue', '', 1),
(82, 'Tolino', '', 1),
(83, 'Good e-Reader', '', 1),
(84, 'Energy Sistem', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estore_cart`
--

CREATE TABLE `estore_cart` (
  `ID` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estore_category`
--

CREATE TABLE `estore_category` (
  `ID` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_image` varchar(255) NOT NULL DEFAULT '0',
  `is_parent` int(11) NOT NULL DEFAULT 0,
  `c_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_category`
--

INSERT INTO `estore_category` (`ID`, `c_name`, `c_image`, `is_parent`, `c_status`) VALUES
(131, 'Smartphone', '1546209286smartphone-balancing-with-pink-background_23-2150271746.avif', 0, 1),
(132, 'Tablet', '111711737tablet-mockup_115431-30.avif', 0, 1),
(133, 'Foldable Phones', '282440415foldable-phone-mockup_106244-2093.avif', 0, 1),
(134, 'Flagship', '0', 131, 1),
(135, 'Gaming', '0', 131, 1),
(136, 'Camera-Centric', '0', 131, 1),
(137, 'High-End', '0', 132, 1),
(138, '2-in-1', '0', 132, 1),
(139, 'Kids', '0', 132, 1),
(140, 'Horizontal', '0', 133, 1),
(141, 'Vertical', '0', 133, 1),
(142, 'Normal', '0', 131, 1),
(143, 'Normal', '0', 132, 1),
(144, 'Normal', '0', 133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estore_coupon`
--

CREATE TABLE `estore_coupon` (
  `ID` int(11) NOT NULL,
  `coupon` varchar(15) NOT NULL,
  `amount` int(11) NOT NULL,
  `dis_type` int(11) DEFAULT NULL COMMENT '0 for % and 1 for fixed',
  `starting_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `dis_on_type` int(11) DEFAULT NULL COMMENT '0 for specific products, 1 for specific category and 2 for specific brand and 3 for all products',
  `discount_on` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_coupon`
--

INSERT INTO `estore_coupon` (`ID`, `coupon`, `amount`, `dis_type`, `starting_date`, `expire_date`, `dis_on_type`, `discount_on`, `status`) VALUES
(10, 'sgMy06Q6', 10, 1, '2023-03-22', '2023-03-31', 1, ',2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estore_orders`
--

CREATE TABLE `estore_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estore_orders`
--

INSERT INTO `estore_orders` (`id`, `user_id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(29, 5, 'Huzaifa', 'contact.mdhuzaifa@gmail.com', '+8801312855589', 1499, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66bdcfa7d99f8', 'BDT'),
(30, 8, 'aklima', 'aklima@gmail.com', '+8801256778856', 7499, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66bdd82e9af07', 'BDT'),
(33, 8, 'sadia', 'sadia@gmail.com', '+880198765432', 7499, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66be20773248d', 'BDT'),
(34, 5, 'seyam', 'seyam@gmail.com', '+88017654322', 29000, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66be25ef07202', 'BDT'),
(35, 5, 'safi', 'safi@gmail.com', '+88013765446', 500, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66be2b4848196', 'BDT'),
(36, 5, 'min', 'min@gmail.com', '+88017872266ye', 261000, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66be4db66e64e', 'BDT'),
(37, 5, 'ripa', 'rip@gmail.com', '+8809876544456', 500, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66c0b4f56bf8d', 'BDT'),
(38, 8, 'nili', 'nili@gmail.com', '+8801876543323', 0, 'Dhaka', 'Pending', 'SSLCZ_TEST_66c0b6bb8deb3', 'BDT'),
(39, 8, 'nili', 'nili@gmail.com', '+8801876543323', 0, 'Dhaka', 'Pending', 'SSLCZ_TEST_66c0b8837bcc7', 'BDT'),
(40, 8, 'nili', 'nili@gmail.com', '+8801876543323', 0, 'Dhaka', 'Pending', 'SSLCZ_TEST_66c0b889b1941', 'BDT'),
(41, 8, 'nili', 'nili@gmail.com', '+8801876543323', 8000, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66c0b896a7cd8', 'BDT'),
(42, 8, 'aklima', 'aklima@gmail.com', '+8801256778856', 232000, 'Dhaka', 'confirmed', 'SSLCZ_TEST_66c0ba5c3b092', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `estore_order_items`
--

CREATE TABLE `estore_order_items` (
  `ID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_order_items`
--

INSERT INTO `estore_order_items` (`ID`, `order_id`, `product_id`, `qty`) VALUES
(1, 27, 49, 5),
(2, 28, 49, 2),
(3, 28, 50, 1),
(4, 29, 49, 1),
(5, 30, 50, 1),
(6, 33, 50, 1),
(7, 34, 52, 1),
(8, 35, 53, 1),
(9, 36, 52, 9),
(10, 37, 53, 1),
(11, 41, 54, 1),
(12, 42, 52, 8);

-- --------------------------------------------------------

--
-- Table structure for table `estore_payment`
--

CREATE TABLE `estore_payment` (
  `id` int(11) NOT NULL,
  `tran_id` varchar(255) NOT NULL,
  `bank_tran_id` varchar(255) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `tran_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estore_payment`
--

INSERT INTO `estore_payment` (`id`, `tran_id`, `bank_tran_id`, `card_type`, `status`, `tran_date`) VALUES
(9, 'SSLCZ_TEST_66bdbcd5012ed', '2408151431230NwHqtDe2jQtOHH', 'BKASH-BKash', 'Confirmed', '2024-08-15 14:31:17'),
(10, 'SSLCZ_TEST_66bdc3b2c4c92', '2408151500410R2eCWrlaINafOQ', 'BKASH-BKash', 'Confirmed', '2024-08-15 15:00:35'),
(11, 'SSLCZ_TEST_66bdcfa7d99f8', '240815155143ta35n3chHRHlXU4', 'BKASH-BKash', 'Confirmed', '2024-08-15 15:51:36'),
(13, 'SSLCZ_TEST_66be20773248d', '240815213947vPHPq0HYXpWHk6k', 'BKASH-BKash', 'Confirmed', '2024-08-15 21:39:29'),
(14, 'SSLCZ_TEST_66be25ef07202', '240815220302LDUx5xMfGVrj1mQ', 'BKASH-BKash', 'Confirmed', '2024-08-15 22:02:50'),
(15, 'SSLCZ_TEST_66be2b4848196', '240815222552JxRXSjSZgotubPm', 'NAGAD-Nagad', 'Confirmed', '2024-08-15 22:25:38'),
(16, 'SSLCZ_TEST_66be4db66e64e', '24081605303sDz4mzqWddyxR2J', 'DBBLMOBILEB-Dbbl Mobile Banking', 'Confirmed', '2024-08-16 00:52:33'),
(17, 'SSLCZ_TEST_66c0b4f56bf8d', '2408172038580Fk48s8wE2LWZro', 'NAGAD-Nagad', 'Confirmed', '2024-08-17 20:37:37'),
(18, 'SSLCZ_TEST_66c0b896a7cd8', '240817205318AV7QndN6NotizMr', 'NAGAD-Nagad', 'Confirmed', '2024-08-17 20:53:06'),
(19, 'SSLCZ_TEST_66c0ba5c3b092', '2408172100513AhMdWch7rHEHGp', 'DBBLMOBILEB-Dbbl Mobile Banking', 'Confirmed', '2024-08-17 21:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `estore_product`
--

CREATE TABLE `estore_product` (
  `ID` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_category` int(11) NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_reg_price` int(11) NOT NULL DEFAULT 0,
  `p_sale_price` int(11) NOT NULL DEFAULT 0,
  `p_featured_img` varchar(255) DEFAULT NULL,
  `p_galley_img` text DEFAULT NULL,
  `p_short_desc` text NOT NULL,
  `p_big_desc` text DEFAULT NULL,
  `p_quantity` int(11) NOT NULL DEFAULT 0,
  `p_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_product`
--

INSERT INTO `estore_product` (`ID`, `p_name`, `p_category`, `p_brand`, `p_reg_price`, `p_sale_price`, `p_featured_img`, `p_galley_img`, `p_short_desc`, `p_big_desc`, `p_quantity`, `p_status`) VALUES
(49, 'Samsung Galaxy A12', 142, 14, 1499, 0, '1040578703171009835396MP9.webp', '', '<p>Samsung Galaxy A12 is officially released on November 24, 2020.</p><p>The dimension of the smartphone is 164 x 75.8 x 8.9 mm and it weighs 205 grams. The smartphone is pack with 3 GB, 4 GB, and 6 GB RAM with 32 GB, 64 GB, and 128 GB internal storage options.</p><p>The device runs on the Android 10 operating system. It features GPS with A-GPS, GLONASS, GALILEO, BDS, USB Type-C 2.0, and FM radio. It is built with a Glass front, plastic back, and plastic frame.</p><p>It is fueled with a non-removable Li-Po 5000 mAh battery + Fast battery charging 15W. The smartphone features a 6.5 inches TFT display that has a 720 x 1560 pixels resolution. The device comes in various colors such as Black, White, Blue, and Red.</p><p>The smartphone is integrated with a Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by). It features quad camera: 48 MP (wide) + 5 MP (ultrawide) + 2 MP (macro) + 2 MP (depth) while on the front there is a 8 MP camera.</p>', '<div class=\"_gry-bg _spctbl _ovfhide\">\r\n<div class=\"_flx\">\r\n<div class=\"_hd\">\r\n<ul class=\"aps-features-list\">\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Processor</strong>:&nbsp;Octa-core (2.3 GHz, 1.8 GHz)</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>RAM</strong>:&nbsp;3 GB, 4 GB, 6 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Storage</strong>:&nbsp;32 GB, 64 GB, 128 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Display</strong>:&nbsp;6.5 inches</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Camera</strong>:&nbsp;Quad Camera</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Battery</strong>:&nbsp;Li-Po 5000 mAh</div>\r\n</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 400, 1),
(50, 'Xiaomi Redmi 9A', 142, 16, 8000, 7499, '1807628500Redmi-9A-600x600.webp', '', '<p>Xiaomi Redmi 9A is not officially released yet while the specs mentioned below are based on rumors.</p><p>The smartphone is equipped with sensors such as Fingerprint (rear-mounted), accelerometer, gyro, and proximity. The smartphone features Infrared port, USB 2.0, and Bluetooth 5.0, A2DP, LE.</p><p>The Xiaomi Redmi 9A is available in different colors like blue and other colors. The smartphone is powered by the MediaTek Helio G25 Octa-core processor while the GPU is Mali-G31.</p><p>The smartphone is fueled by a Non-removable Li-Po 5000 mAh battery. The phone runs on the Android 10 + MIUI 12 operating system providing smooth operation of the device.</p><p>The smartphone comes in 6.53 inches size and the display is IPS LCD capacitive touchscreen that provides 720 x 1600 pixels resolution.</p><p>The rear camera consists of a 13 MP (wide) and on the front, it has a 5 MP camera sensor. The smartphone is integrated with 3 GB RAM and 32 GB internal storage that can be increased with microSDXC (dedicated slot).</p>', '<ul class=\"aps-features-list\">\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Processor</strong>:&nbsp;MediaTek Helio G25</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>RAM</strong>:&nbsp;3 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Storage</strong>:&nbsp;32 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Display</strong>:&nbsp;6.53 inches</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Camera</strong>:&nbsp;13 MP</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Battery</strong>:&nbsp;Li-Po 5000 mAh battery</div>\r\n</div>\r\n</li>\r\n</ul>', 400, 1),
(51, 'iphone12', 136, 40, 500000, 0, '2117873713iphn12.jpeg', '@1390980318iphn12.jpeg', '<p><span style=\"color: rgb(189, 193, 198); background-color: rgb(31, 31, 31);\">Apple iPhone 12 ; Type, Super Retina XDR OLED, HDR10, Dolby Vision, 625 nits (HBM), 1200 nits (peak) ; Size,&nbsp;</span><strong style=\"color: rgb(188, 192, 195); background-color: rgb(31, 31, 31);\">6.1 inches</strong><span style=\"color: rgb(189, 193, 198); background-color: rgb(31, 31, 31);\">, 90.2 cm2&nbsp;(~86.0% screen-to-body ratio).</span></p>', '<ul class=\"techspecs-list\" role=\"list\">\r\n<li role=\"listitem\">Super Retina XDR display</li>\r\n<li role=\"listitem\">6.1‑inch (diagonal) all‑screen OLED&nbsp;display</li>\r\n<li role=\"listitem\">2532‑by‑1170-pixel resolution at 460&nbsp;ppi</li>\r\n<li role=\"listitem\">HDR display</li>\r\n<li role=\"listitem\">True&nbsp;Tone</li>\r\n<li role=\"listitem\">Wide color (P3)</li>\r\n<li role=\"listitem\">Haptic Touch</li>\r\n<li role=\"listitem\">2,000,000:1 contrast ratio (typical)</li>\r\n<li role=\"listitem\">800 nits max brightness (typical); 1200 nits peak brightness&nbsp;(HDR)</li>\r\n<li role=\"listitem\">Fingerprint-resistant oleophobic coating</li>\r\n<li role=\"listitem\">Support for display of multiple languages and characters&nbsp;simultaneously</li>\r\n</ul>\r\n<p class=\"typography-caption model-caption\">The iPhone 12 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.06 inches diagonally (actual viewable area is less).</p>', 10, 1),
(52, 'Vivo-V27', 142, 21, 29000, 0, '744089358vivo-V27.jpg', '@748055367vivo-V27.jpg', '<p><br></p><p><span style=\"color: var(--always-white);\">vivo V27 ; Size, 6.78 inches, 111.0 cm2 (~90.4% screen-to-body ratio) ; Resolution, 1080 x 2400 pixels, 20:9 ratio (~388 ppi density) ; OS, Android 13, Funtouch 13.</span></p><p><br></p><p><br></p><p><br></p>', '<ul class=\"item-attr-list\">\r\n<li class=\"item-attr\">\r\n<div class=\"item-attr-value-box show\">&nbsp;</div>\r\n</li>\r\n</ul>\r\n<ul class=\"item-attr-list\">\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">Processor</p>\r\n<div class=\"item-attr-value-box\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">MediaTek Dimensity 7200</p>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">Color</p>\r\n<div class=\"item-attr-value-box\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">Noble Black, Magic Blue</p>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">Operating System</p>\r\n<div class=\"item-attr-value-box\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">Funtouch OS 13 Global</p>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">RAM&amp;ROM</p>\r\n<div class=\"item-attr-value-box show\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">12 GB + 256 GB<br>*Actual available RAM is less than 12 GB due to the storage of the operating system and pre-installed apps.<br>*Actual available ROM is less than 256 GB due to the storage of the operating system and pre-installed apps.</p>\r\n</div>\r\n<p class=\"item-attr-open\"><span class=\"open-text no-flip-over\">More</span></p>\r\n</div>\r\n</li>\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">Battery</p>\r\n<div class=\"item-attr-value-box\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">4600 mAh (TYP)<br>4500 mAh (MIN)</p>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"item-attr\">\r\n<p class=\"item-attr-name no-flip-over\">Fast Charging</p>\r\n<div class=\"item-attr-value-box show\">\r\n<div class=\"item-attr-value-div\">\r\n<p class=\"item-attr-value no-flip-over\">66W (11V/6A)<br>*V27 is equipped with a vivo standard charger which supports a charging power of up to 66W. The actual charging power is dynamically adjusted as</p>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>', 8, 1),
(53, 'realme c55', 142, 18, 250000, 500, '695254991realme-C53.jpg', '@1449716999realme-C53.jpg', '<p><span style=\"color: rgb(0, 0, 0);\">Up to 8GB RAM built in, with an additional 8GB dynamic RAM available through software optimizations, bringing plenty of power for even the most demanding games.</span></p>', '<div class=\"sec-title opensans-semibold\">A blast to shoot with.</div>\r\n<div class=\"sec-desc animate-general animate-100\">The segment&rsquo;s first ever 64MP camera, the segment&rsquo;s largest camera sensor, and the segment&rsquo;s most advanced imaging software. Add it all up, and you get a camera that&rsquo;s simply more fun to shoot with.</div>\r\n<div class=\"sec-desc animate-general animate-100\">With 256GB storage, you get twice the capacity of any other C Series product. Take photos and videos and download all your favorite shows with peace of mind, knowing your phone can stay smooth through it all.</div>', 15, 1),
(54, 'Nokia 2780', 141, 19, 8000, 0, '5353412981897099368L298N-Module-Pinout.jpg', '@4799650041897099368L298N-Module-Pinout.jpg', '<p>202.1 x 58 x 11.5 mm (7.96 x 2.28 x 0.45 in)</p><p>Weight</p><p>131.2 g (4.62 oz)</p><p>SIM</p><p>Single SIM (Nano-SIM)m</p><p><br></p>', '<div class=\"aps-group\">TFT LCD capacitive touchscreen, 16M colors<br>Size<br>2.7 inches, 22.6 cm2 (~19.3% screen-to-body ratio)<br>Resolution<br>240 x 320 pixels, 4:3 ratio (~148 ppi density)<br>Features<br>Secondary external 1.77\" display<br>Platform<br>OS<br>Kai OS 3.1<br>Chipset<br>Qualcomm QM215 Snapdragon 215 (28 nm)<br>CPU<br>Quad-core 1.3 GHz Cortex-A53<br>GPU<br>Adreno 308<br>Memory<br>Card slot<br>microSDHC (dedicated slot)<br>Internal<br>4 GB<br>RAM<br>512 MB<br>Main camera<br>Single<br>5 MP<br>Features<br>LED flash<br>Video<br>Unspecified</div>', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estore_user`
--

CREATE TABLE `estore_user` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `userrole` int(11) NOT NULL COMMENT '0 for subscriber 1 for customer 2 for editor 3 for super admin',
  `status` int(11) DEFAULT NULL COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estore_user`
--

INSERT INTO `estore_user` (`ID`, `firstname`, `lastname`, `username`, `email`, `pass`, `address`, `photo`, `phone`, `userrole`, `status`) VALUES
(5, '', '', 'Admin', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Mirpur-12, Dhaka, Bangladesh', '', '01783338485', 3, 1),
(7, 'Hamim', 'Hamim', '', 'hamim@gmail.com', '4490c494202c98d9bb70f9473b2483d530aec6ef', NULL, NULL, '01543534698', 1, 1),
(8, 'aklima', 'toha', '', 'toha@gmail.com', '7841fb1f92b99194ca818d410cb09430731b6285', NULL, NULL, '01787301500', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estore_brand`
--
ALTER TABLE `estore_brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estore_cart`
--
ALTER TABLE `estore_cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_p_id_cart` (`p_id`),
  ADD KEY `fk_user_id_cart` (`user_id`);

--
-- Indexes for table `estore_category`
--
ALTER TABLE `estore_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estore_coupon`
--
ALTER TABLE `estore_coupon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estore_orders`
--
ALTER TABLE `estore_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_user` (`user_id`);

--
-- Indexes for table `estore_order_items`
--
ALTER TABLE `estore_order_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `estore_payment`
--
ALTER TABLE `estore_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estore_product`
--
ALTER TABLE `estore_product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `p_category` (`p_category`),
  ADD KEY `p_brand` (`p_brand`);

--
-- Indexes for table `estore_user`
--
ALTER TABLE `estore_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estore_brand`
--
ALTER TABLE `estore_brand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `estore_cart`
--
ALTER TABLE `estore_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `estore_category`
--
ALTER TABLE `estore_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `estore_coupon`
--
ALTER TABLE `estore_coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `estore_orders`
--
ALTER TABLE `estore_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `estore_order_items`
--
ALTER TABLE `estore_order_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `estore_payment`
--
ALTER TABLE `estore_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `estore_product`
--
ALTER TABLE `estore_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `estore_user`
--
ALTER TABLE `estore_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estore_cart`
--
ALTER TABLE `estore_cart`
  ADD CONSTRAINT `fk_p_id_cart` FOREIGN KEY (`p_id`) REFERENCES `estore_product` (`ID`),
  ADD CONSTRAINT `fk_user_id_cart` FOREIGN KEY (`user_id`) REFERENCES `estore_user` (`ID`);

--
-- Constraints for table `estore_orders`
--
ALTER TABLE `estore_orders`
  ADD CONSTRAINT `fk_user_id_user` FOREIGN KEY (`user_id`) REFERENCES `estore_user` (`ID`);

--
-- Constraints for table `estore_product`
--
ALTER TABLE `estore_product`
  ADD CONSTRAINT `estore_product_ibfk_1` FOREIGN KEY (`p_category`) REFERENCES `estore_category` (`ID`),
  ADD CONSTRAINT `estore_product_ibfk_2` FOREIGN KEY (`p_brand`) REFERENCES `estore_brand` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

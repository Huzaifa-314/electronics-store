-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 09:26 PM
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

--
-- Dumping data for table `estore_cart`
--

INSERT INTO `estore_cart` (`ID`, `p_id`, `qty`, `user_id`, `updated_at`) VALUES
(20, 50, 1, 7, '2024-08-09 15:16:10'),
(21, 49, 1, 7, '2024-08-09 16:27:36'),
(22, 50, 1, 5, '2024-08-09 18:21:23');

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
(50, 'Xiaomi Redmi 9A', 142, 16, 8000, 7499, '1807628500Redmi-9A-600x600.webp', '', '<p>Xiaomi Redmi 9A is not officially released yet while the specs mentioned below are based on rumors.</p><p>The smartphone is equipped with sensors such as Fingerprint (rear-mounted), accelerometer, gyro, and proximity. The smartphone features Infrared port, USB 2.0, and Bluetooth 5.0, A2DP, LE.</p><p>The Xiaomi Redmi 9A is available in different colors like blue and other colors. The smartphone is powered by the MediaTek Helio G25 Octa-core processor while the GPU is Mali-G31.</p><p>The smartphone is fueled by a Non-removable Li-Po 5000 mAh battery. The phone runs on the Android 10 + MIUI 12 operating system providing smooth operation of the device.</p><p>The smartphone comes in 6.53 inches size and the display is IPS LCD capacitive touchscreen that provides 720 x 1600 pixels resolution.</p><p>The rear camera consists of a 13 MP (wide) and on the front, it has a 5 MP camera sensor. The smartphone is integrated with 3 GB RAM and 32 GB internal storage that can be increased with microSDXC (dedicated slot).</p>', '<ul class=\"aps-features-list\">\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Processor</strong>:&nbsp;MediaTek Helio G25</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>RAM</strong>:&nbsp;3 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Storage</strong>:&nbsp;32 GB</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Display</strong>:&nbsp;6.53 inches</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Camera</strong>:&nbsp;13 MP</div>\r\n</div>\r\n</li>\r\n<li>\r\n<div class=\"aps-feature-anim\">\r\n<div class=\"aps-feature-info\"><strong>Battery</strong>:&nbsp;Li-Po 5000 mAh battery</div>\r\n</div>\r\n</li>\r\n</ul>', 400, 1);

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
(7, 'Hamim', 'Hamim', '', 'hamim@gmail.com', '4490c494202c98d9bb70f9473b2483d530aec6ef', NULL, NULL, '01543534698', 1, 1);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `estore_product`
--
ALTER TABLE `estore_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `estore_user`
--
ALTER TABLE `estore_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `estore_product`
--
ALTER TABLE `estore_product`
  ADD CONSTRAINT `estore_product_ibfk_1` FOREIGN KEY (`p_category`) REFERENCES `estore_category` (`ID`),
  ADD CONSTRAINT `estore_product_ibfk_2` FOREIGN KEY (`p_brand`) REFERENCES `estore_brand` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

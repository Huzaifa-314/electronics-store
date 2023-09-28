-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 12:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(1, 'GreyRobotics', '627230648download.png', 1),
(8, 'SparkFun', '1252995638sparkfun.png', 1),
(11, 'TechShop', '1505010747logo (1).png', 1);

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
(1, 'Robotics', 'robot.png', 0, 1),
(2, 'Sensors', 'sensor.png', 0, 1),
(3, 'Microcontroller', 'microchip.png', 0, 1),
(4, 'Accessories', 'accessories.png', 0, 1),
(5, 'Basic Components', 'shapes.png', 0, 1),
(6, 'Kits', 'robot-kit.png', 0, 1),
(7, 'Motor', '0', 1, 1),
(8, 'Motor Driver', '0', 1, 1),
(9, 'Wheels and Caster', '0', 1, 1),
(10, 'Controller', '0', 1, 1),
(11, 'Temperature', '0', 2, 1),
(12, 'Motion', '0', 2, 1),
(13, 'Sound', '0', 2, 1),
(14, 'Light', '0', 2, 1),
(15, 'Pressure', '0', 2, 1),
(16, 'Weight', '0', 2, 1),
(17, 'PIC Microcontroller', '0', 3, 1),
(18, 'ARV Microcontroller', '0', 3, 1),
(19, 'ARM Microcontroller', '0', 3, 1),
(20, 'Connector', '0', 4, 1),
(21, 'Cable', '0', 4, 1),
(22, 'Computer Peripherals', '0', 4, 1),
(23, 'Resistor', '0', 5, 1),
(24, 'Capacitor', '0', 5, 1),
(25, 'Transistor', '0', 5, 1),
(26, 'Diode', '0', 5, 1),
(27, 'Regulator', '0', 5, 1),
(28, 'Starter Kits', '0', 6, 1),
(29, 'Advance kits', '0', 6, 1),
(30, 'Science Box', '0', 6, 1);

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
(40, 'Arduino Uno R3 SMD', 18, 1, 0, 0, '1499409678Arduino-Uno-R3-SMD-03.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 0, 1),
(41, 'L298N Motor Driver (Red)', 8, 11, 211, 159, '521438342L298N-Motor-Driver-(Red).jpg', '@14081204409v_a3_ksdDAxLdBz.png@1897099368L298N-Module-Pinout.jpg', '<p><span style=\"color: rgb(25, 25, 25);\">The L298N chip contains two standard H-bridges capable of driving a pair of DC motors, making it ideal for building a two-wheeled robotic platform.</span></p>', '<p class=\"ql-align-justify\"><strong>This module can drive either 2 DC motors or 1 Stepper motor at a time.</strong></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\">This module is based on L298N,high voltage,high current dual full bridge driver&nbsp;which can be used to drive a DC motor and stepper motor, relay coil inductive load; using standard logic level signal control; having two enable control end allow or prohibit the work has a logic device power supply input terminal, in the case regardless of the input signal affect the internal logic circuit portion to operate at a low voltage; can be an external sense resistor, the amount of change in feedback to the control circuit.&nbsp;</p><p class=\"ql-align-justify\">This module integrates a built-in 5V power supply. When you drive voltage of 7V-35V can onboard 5V logic supply, do not input voltage when using onboard 5V power supply, the +5 V power supply interface, but leads to 5V voltage for external use</p><p class=\"ql-align-justify\">When ENA is HIGH, IN1 IN2 control OUT1 OUT2</p><p class=\"ql-align-justify\">When ENB is HIGH, IN3 IN4 control OUT3 OUT4</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><strong>Application:</strong></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">1: driving&nbsp;stepper motor</p><p class=\"ql-align-justify\">2:&nbsp;driving&nbsp;brushed DC motor motor</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\"><strong>Similar DC motor drivers made by techshopbd-</strong></p><p class=\"ql-align-justify\"><br></p><ul><li>TB6612FNG Dual DC motor Controller (click&nbsp;<a href=\"https://techshopbd.com/detail/2630/TB6612FNG_Dual_DC_Motor_Controller\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(0, 123, 255);\">here</a>)</li><li>L293D Dual DC motor Controller&nbsp;(click&nbsp;<a href=\"https://techshopbd.com/detail/3501/L293D_Dual_DC_Motor_Controller_Red\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(0, 123, 255);\">here</a>)</li><li>L298 Dual DC motor Controller&nbsp;(click&nbsp;<a href=\"https://techshopbd.com/detail/2544/L298_Dual_DC_Motor_Controller\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(0, 123, 255);\">here</a>)</li><li>L298 Dual DC motor Shield&nbsp;(click&nbsp;<a href=\"https://techshopbd.com/detail/2847/L298_Dual_DC_Motor_Shield\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(0, 123, 255);\">here</a>)</li></ul><p><br></p>', 10, 1),
(42, 'product500', 21, 1, 500, 490, '1983947246Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(43, 'product 400', 21, 1, 400, 380, '412419926Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(44, 'product300', 21, 1, 300, 270, '954131897Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(45, 'product200', 21, 1, 200, 160, '922039595Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(46, 'product100', 21, 1, 100, 50, '1417254242Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(47, 'productnoff', 21, 1, 500, 0, '761904268Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1),
(48, 'product100', 21, 1, 100, 50, '1417254242Arduino-Uno-R3-SMD-02.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 1, 1);

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
(5, '', '', 'Huzaifa', 'contact.mdhuzaifa@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Mirpur-12, Dhaka, Bangladesh', '', '01813016898', 3, 1),
(6, '', '', 'Rokibul Hasan', 'hacker@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '                       lol                                                            ', '1164514911298938170_1222569708477963_7133349612134539342_n.jpg', '322', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estore_brand`
--
ALTER TABLE `estore_brand`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `estore_category`
--
ALTER TABLE `estore_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `estore_coupon`
--
ALTER TABLE `estore_coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `estore_product`
--
ALTER TABLE `estore_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `estore_user`
--
ALTER TABLE `estore_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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

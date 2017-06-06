-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 04:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `District_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `District_name`) VALUES
(2, 'Moktails', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `del_count`
--

CREATE TABLE IF NOT EXISTS `del_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `t_quantity` double NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `del_count`
--

INSERT INTO `del_count` (`id`, `cid`, `t_quantity`, `status`) VALUES
(1, 1, 10, 1),
(2, 2, 252, 1),
(3, 3, 52, 1),
(4, 4, 5, 1),
(5, 6, 1556, 1),
(13, 14, 71, 1),
(14, 16, 16, 1),
(15, 17, 21, 1),
(16, 18, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `del_info`
--

CREATE TABLE IF NOT EXISTS `del_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `del_info`
--

INSERT INTO `del_info` (`id`, `department`, `comment`, `date`, `status`) VALUES
(1, 'Department 3', '', '08/19/2014', 1),
(2, 'Department 5', '', '08/20/2014', 1),
(3, 'Department 2', 'Hello dear.....', '08/12/2014', 1),
(4, 'Department 2', 'sssssssssssssssssss', '08/27/2014', 1),
(6, 'Select Department', '', '08/05/2014', 1),
(14, 'Select Department', '', '08/18/2014', 1),
(16, 'Department 4', '', '07/24/2014', 1),
(17, 'Department 4', '', '08/30/2014', 1),
(18, 'Department 4', 'I''m masum', '08/19/2014', 1);

-- --------------------------------------------------------

--
-- Table structure for table `del_product`
--

CREATE TABLE IF NOT EXISTS `del_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `del_product`
--

INSERT INTO `del_product` (`id`, `cid`, `pid`, `quantity`, `status`) VALUES
(1, 1, 3, 10, 1),
(2, 2, 1, 52, 1),
(3, 2, 3, 50, 1),
(4, 2, 1, 150, 1),
(5, 3, 2, 52, 1),
(6, 4, 1, 5, 1),
(8, 6, 0, 1556, 1),
(22, 14, 0, 6, 1),
(23, 14, 0, 56, 1),
(24, 14, 0, 9, 1),
(25, 16, 2, 5, 1),
(26, 16, 3, 5, 1),
(27, 16, 2, 6, 1),
(28, 17, 1, 8, 1),
(29, 17, 3, 9, 1),
(30, 17, 2, 4, 1),
(31, 18, 3, 5, 1),
(32, 18, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `eng_name` varchar(50) NOT NULL,
  `bang_name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `division` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `eng_name`, `bang_name`, `code`, `division`) VALUES
(1, 'Barguna', 'বরগুনা', '', 'Barisal'),
(2, 'Barisal', 'বরিশাল', '', 'Barisal'),
(3, 'Bhola', 'ভোলা', '', 'Barisal'),
(4, 'Jhalokati', 'ঝালকাঠি', '', 'Barisal'),
(5, 'Patuakhali', 'পটুয়াখালী', '', 'Barisal'),
(6, 'Pirojpur', 'পিরোজপুর', '', 'Barisal'),
(7, 'Bandarban', 'বান্দরবান', '', 'Chittagong'),
(8, 'Brahmanbaria', 'ব্রাহ্মণবাড়ীয়া', '', 'Chittagong'),
(9, 'Chandpur', 'চাঁদপুর', '', 'Chittagong'),
(10, 'Chittagong', 'চট্টগ্রাম', '', 'Chittagong'),
(11, 'Comilla', 'কুমিল্লা', '', 'Chittagong'),
(12, 'Cox''s Bazar', 'কক্সবাজার', '', 'Chittagong'),
(13, 'Feni', 'ফেনী', '', 'Chittagong'),
(14, 'Khagrachhari', 'খাগড়াছড়ি', '', 'Chittagong'),
(15, 'Lakshmipur', 'লক্ষ্মীপুর', '', 'Chittagong'),
(16, 'Noakhali', 'নোয়াখালী', '', 'Chittagong'),
(17, 'Rangamati', 'রাঙ্গামাটি', '', 'Chittagong'),
(18, 'Dhaka', 'ঢাকা', '', 'Dhaka'),
(19, 'Faridpur', 'ফরিদপুর', '', 'Dhaka'),
(20, 'Gazipur', 'গাজীপুর', '', 'Dhaka'),
(21, 'Gopalganj', 'গোপালগঞ্জ', '', 'Dhaka'),
(22, 'Kishoreganj', 'কিশোরগঞ্জ', '', 'Dhaka'),
(23, 'Madaripur', 'মাদারীপুর', '', 'Dhaka'),
(24, 'Manikganj', 'মানিকগঞ্জ', '', 'Dhaka'),
(25, 'Munshiganj', 'মুন্সীগঞ্জ', '', 'Dhaka'),
(26, 'Narayanganj', 'নারায়ণগঞ্জ', '', 'Dhaka'),
(27, 'Narsingdi', 'নরসিংদী', '', 'Dhaka'),
(28, 'Rajbari', 'রাজবাড়ী', '', 'Dhaka'),
(29, 'Shariatpur', 'শরীয়তপুর', '', 'Dhaka'),
(30, 'Tangail', 'টাঙ্গাইল', '', 'Dhaka'),
(31, 'Bagerhat', 'বাগেরহাট', '', 'Khulna'),
(32, 'Chuadanga', 'চুয়াডাঙ্গা', '', 'Khulna'),
(33, 'Jessore', 'যশোর', '', 'Khulna'),
(34, 'Jhenaidah', 'ঝিনাইদহ', '', 'Khulna'),
(35, 'Khulna', 'খুলনা', '', 'Khulna'),
(36, 'Kushtia', 'কুষ্টিয়া', '', 'Khulna'),
(37, 'Magura', 'মাগুরা', '', 'Khulna'),
(38, 'Meherpur', 'মেহেরপুর', '', 'Khulna'),
(39, 'Narail', 'নড়াইল', '', 'Khulna'),
(40, 'Satkhira', 'সাতক্ষিরা', '', 'Khulna'),
(41, 'Jamalpur', 'জামালপুর', '', 'Mymensingh'),
(42, 'Mymensingh', 'ময়মনসিংহ', '', 'Mymensingh'),
(43, 'Netrakona', 'নেত্রকোনা', '', 'Mymensingh'),
(44, 'Sherpur', 'শেরপুর', '', 'Mymensingh'),
(45, 'Bogra', 'বগুড়া', '', 'Rajshahi'),
(46, 'Joypurhat', 'জয়পুরহাট', '', 'Rajshahi'),
(47, 'Naogaon', 'নওগাঁ', '', 'Rajshahi'),
(48, 'Natore', 'নাটোর', '', 'Rajshahi'),
(49, 'Chapainawabganj', 'নওয়াবগঞ্জ', '', 'Rajshahi'),
(50, 'Pabna', 'পাবনা	', '', 'Rajshahi'),
(51, 'Rajshahi', 'রাজশাহী', '', 'Rajshahi'),
(52, 'Sirajgonj', 'সিরাজগঞ্জ', '', 'Rajshahi'),
(53, 'Dinajpur', 'দিনাজপুর', '', 'Rangpur'),
(54, 'Gaibandha', 'গাইবান্ধা', '', 'Rangpur'),
(55, 'Kurigram', 'কুড়িগ্রাম', '', 'Rangpur'),
(56, 'Lalmonirhat', 'লালমনিরহাট', '', 'Rangpur'),
(57, 'Nilphamari', 'নীলফামারী', '', 'Rangpur'),
(58, 'Panchagarh', 'পঞ্চগড়', '', 'Rangpur'),
(59, 'Rangpur', 'রংপুর', '', 'Rangpur'),
(60, 'Thakurgaon', 'ঠাকুরগাঁও', '', 'Rangpur'),
(61, 'Habiganj', 'হবিগঞ্জ', '', 'Sylhet'),
(62, 'Moulvibazar', 'মৌলভীবাজার', '', 'Sylhet'),
(63, 'Sunamganj', 'সুনামগঞ্জ', '', 'Sylhet'),
(64, 'Sylhet', 'সিলেট', '', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `eng_name` varchar(50) NOT NULL,
  `bang_name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `eng_name`, `bang_name`, `code`, `country`) VALUES
(1, 'Dhaka', 'ঢাকা', '', 'Bangladesh'),
(2, 'Barisal', 'বরিশাল', '', 'Bangladesh'),
(3, 'Chittagong', 'চট্টগ্রাম', '', 'Bangladesh'),
(4, 'Khulna', 'খুলনা', '', 'Bangladesh'),
(5, 'Mymensingh', 'ময়মনসিংহ', '', 'Bangladesh'),
(6, 'Rajshahi', 'রাজশাহী', '', 'Bangladesh'),
(7, 'Rangpur', 'রংপুর', '', 'Bangladesh'),
(8, 'Sylhet', 'সিলেট', '', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `trans_id` int(11) NOT NULL,
  `trans_items` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `trans_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `trans_date` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `trans_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `trans_inventory` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bcost` double NOT NULL,
  `scost` double NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cid`, `bcost`, `scost`, `details`, `status`) VALUES
(2, 'salad ', '2', 30, 15, 'the salad is fresh food.\r\n', 1),
(3, 'Beef fry berany', '2', 20, 50, 'It''s good food and careful more not beef.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pur_count`
--

CREATE TABLE IF NOT EXISTS `pur_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `t_quantity` double NOT NULL,
  `t_price` double NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pur_count`
--

INSERT INTO `pur_count` (`id`, `cid`, `t_quantity`, `t_price`, `status`) VALUES
(2, 2, 4, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pur_info`
--

CREATE TABLE IF NOT EXISTS `pur_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `purchaser` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pur_info`
--

INSERT INTO `pur_info` (`id`, `sid`, `purchaser`, `date`, `status`) VALUES
(2, '1', 'hyjhh', '08/23/2014', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pur_product`
--

CREATE TABLE IF NOT EXISTS `pur_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `pid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `quantity` int(150) NOT NULL,
  `total_p` double NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `email`, `address`, `status`) VALUES
(1, 'Md. Masum billah', '01922483273', 'masum@gmail.com', 'Jhenaidah, Bangladesh', 1),
(2, 'Alamgir Hossain', '0165541155', 'alamgirdiu31@gmail.com', 'Jhenaidah, Bangladesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `district_id`, `address`, `phone`, `email`, `password`, `user_type`, `status`, `is_admin`) VALUES
(1, 'admin', '', 'Mirpur, Dhaka', '01922483273', 'admin@biodata', 'c8837b23ff8aaa8a2dde915473ce0991', '1', '1', 1),
(8, 'normal admin', '0', 'Dssd', '', 'normal@biodata', '202cb962ac59075b964b07152d234b70', '1', '1', 0),
(9, 'Normal user', 'Khulna', 'Khulna', '34555', 'user@biodata', '202cb962ac59075b964b07152d234b70', '0', '1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

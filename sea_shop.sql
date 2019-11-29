-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2019 at 07:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sea_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `order_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `order_num`) VALUES
(1, 'watches', 1, 0),
(2, 'clothes', 1, 1),
(3, 'Phone', 1, 2),
(13, 'Car', 1, 3),
(14, 'Computer', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `states_and_regions` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `lead_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `states_and_regions`, `price`, `lead_time`) VALUES
(1, 'Mawlamyine', 'Mon', 3000, 48),
(5, 'Ta Htone', 'Mon', 4000, 24),
(6, 'Nay Pyi Taw', 'Mandalay', 50000, 24);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `order_num` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `summary_zawgyi` text COLLATE utf8_unicode_ci NOT NULL,
  `summary_unicode` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo_qty` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_code`, `status`, `order_num`, `stock`, `price`, `discount_percent`, `summary_zawgyi`, `summary_unicode`, `category_id`, `photo_qty`, `created_date`, `modified_date`) VALUES
(1, 'Item Name 1', 'In1', 1, 0, 10, 100000, 10, 'item name 1', 'item name 1', 13, 1, '2019-11-29 09:48:44', '2019-11-29 09:48:44'),
(6, 'Item Name 2', 'In2', 1, 0, 20, 200000, 20, 'Item name 2', 'Item name 2', 2, 2, '2019-11-29 11:01:33', '2019-11-29 11:03:00'),
(7, 'Item Name 1', 'In3', 1, 0, 30, 300000, 30, 'item name 3', 'item name 3', 1, 3, '2019-11-29 11:04:05', '2019-11-29 11:04:05'),
(8, 'item name 4', 'In4', 1, 0, 40, 400000, 40, 'item name 4', 'item name 4', 3, 4, '2019-11-29 11:05:13', '2019-11-29 11:05:13'),
(9, 'Item Name w1', 'Inw1', 1, 0, 10, 100000, 10, 'text', 'text', 1, 1, '2019-11-29 12:42:01', '2019-11-29 12:48:54'),
(10, 'Item Name w2', 'Inw2', 1, 0, 10, 1000000, 10, 'hrer', 'gefeff', 1, 2, '2019-11-29 12:45:01', '2019-11-29 12:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `item_photos`
--

CREATE TABLE `item_photos` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_photos`
--

INSERT INTO `item_photos` (`item_id`, `name`) VALUES
(1, 'In1_tree-736885_1280.jpg'),
(6, 'In2_VNS-L31_id_8_5.jpg'),
(6, 'In2_VNS-L31_id_8_4.jpg'),
(7, 'In3_L-11_id_2_0.jpg'),
(7, 'In3_L-23_id_6_1.jpg'),
(7, 'In3_te_id_0_0.jpg'),
(8, 'In4_Ef-530_id_4_3.jpg'),
(8, 'In4_Ef-530_id_4_2.jpg'),
(8, 'In4_Ef-530_id_4_1.jpg'),
(8, 'In4_Ef-530_id_4_0.jpg'),
(10, 'Inw2_L-12_id_5_0.jpg'),
(10, 'Inw2_L-23_id_6_1.jpg'),
(9, 'Inw1_VNS-L31_id_8_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `permission`, `created_date`, `modified_date`) VALUES
(1, 'Hein Kaung Khant', 'eceae632dc1262ae9f81e47d5de578dd07911918', 1, '2019-05-10 10:40:27', '2019-05-24 14:23:12'),
(2, 'Swe Swe Nyein', '6b1790c67536850f7c65c1f9a070c31d17e66f0e', 1, '2019-05-10 11:23:57', '2019-05-24 14:23:14'),
(3, 'Wai Lin Phyo', 'c7f52b5a80d349cc09ac682cdb059a013269a9e3', 1, '2019-05-10 11:25:26', '2019-05-24 14:23:14'),
(5, 'Myint Oo', 'f3c4aa8279c73a7bb8299406dd46d23332b0e0c6', 1, '2019-05-10 12:38:44', '2019-05-24 14:23:16'),
(6, 'Harry Sang Te', 'f5e202dd89aea517bea95be1980b4360398f839f', 1, '2019-05-10 12:39:40', '2019-05-24 14:23:15'),
(7, 'Arkar Phyo', '39b39cd5cffefda3d7db538664ed4c5c417ebcbf', 0, '2019-05-10 22:56:25', '2019-11-29 12:57:29'),
(8, 'Khin Yu', '6f2a20e6515663460b44538d0257b94418f76b09', 1, '2019-05-26 09:20:41', '2019-05-26 09:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `remark`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Test Customer 1', '09798467816', 'Yangon', 'some', 0, '2019-11-29 11:53:32', '2019-11-29 11:53:32'),
(2, 'Test Buy now 1', '09798467816', 'Yangon', 'Something', 0, '2019-11-29 12:59:06', '2019-11-29 12:59:06'),
(3, 'Test Customer 2', '09260968600', 'Yangon', 'some', 0, '2019-11-29 13:00:49', '2019-11-29 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `qty`, `remark`, `item_id`, `order_id`) VALUES
(1, 6, '6', 1, 1),
(2, 1, '1', 6, 1),
(3, 1, '1', 7, 1),
(4, 1, '1', 8, 1),
(5, 3, '', 7, 2),
(6, 1, '1', 10, 3),
(7, 1, '1', 9, 3),
(8, 4, '1', 7, 3),
(9, 1, '4', 6, 3),
(10, 1, '1', 8, 3),
(11, 1, '1', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `promo_photos`
--

CREATE TABLE `promo_photos` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promo_photos`
--

INSERT INTO `promo_photos` (`id`, `created_date`) VALUES
(5, '2019-05-10 12:31:09'),
(7, '2019-05-19 21:10:16'),
(8, '2019-11-28 20:58:59'),
(9, '2019-11-29 12:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `promo_text`
--

CREATE TABLE `promo_text` (
  `id` int(11) NOT NULL,
  `promo_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promo_text`
--

INSERT INTO `promo_text` (`id`, `promo_text`, `created_date`, `modified_date`) VALUES
(2, 'Update Hein Kaung. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2019-05-07 22:18:10', '2019-11-28 20:59:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_photos`
--
ALTER TABLE `promo_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_text`
--
ALTER TABLE `promo_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promo_photos`
--
ALTER TABLE `promo_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo_text`
--
ALTER TABLE `promo_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

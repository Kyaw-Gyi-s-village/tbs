-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 04:42 AM
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
(1, 'watches', 1, 1),
(2, 'clothes', 1, 2),
(3, 'Phone', 1, 0);

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
(2, 'Yangon', 'Yangon', 2000, 24),
(5, 'Ta Htone', 'Mon', 4000, 24);

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
(1, 'casio edifice', 'ef550RBSB', 1, 2, 10, 100000, 10, 'ကျမကျမ', 'some text', 1, 1, '2019-04-29 21:00:22', '2019-04-29 21:00:22'),
(2, 'Longyi', 'L-11', 1, 1, 20, 10000, 0, 'ကူစမ', 'hello', 2, 2, '2019-04-29 21:00:22', '2019-04-29 21:00:22'),
(3, 'G-Shock', 'g-550', 1, 3, 10, 100000, 1, 'တန', 'asd', 1, 3, '2019-04-30 16:49:33', '2019-04-30 16:49:33'),
(4, 'Casio Edifice', 'Ef-530', 0, 0, 15, 145000, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. ', 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 1, 6, '2019-05-09 12:04:09', '2019-05-09 12:04:09'),
(5, 'Longyi', 'L-12', 0, 0, 30, 12000, 0, 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 2, 2, '2019-05-09 12:06:38', '2019-05-09 12:06:38'),
(6, 'Longyi', 'L-23', 0, 0, 50, 12500, 30, 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 2, 2, '2019-05-09 12:08:34', '2019-05-09 12:08:34'),
(7, 'Casio Edifice', 'EF-560', 1, 0, 5, 165000, 8, 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 'Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum. occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 1, 3, '2019-05-09 12:11:08', '2019-05-09 12:11:08'),
(8, 'Huawei P9lite', 'VNS-L31', 1, 0, 5, 279000, 10, 'celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi.', 3, 6, '2019-05-09 12:17:30', '2019-05-09 12:17:30'),
(9, 'Huawei GR7 2017', 'VNS-G32', 1, 0, 10, 300000, 10, 'Voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas, ultimum aliquos suscipiantur temporibus perpetuam. Id negant reprehensione doctrina studiose perveniri gratissimo patriam filio, dignissimos aliquid equidem euripidis desperantes impetum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Attingere torquatus invitat consuevit fictae, iudicem perfruique iudicio grate desiderare versatur vias moderatio metuamus, voluptatibus pugnare populo comparandae loquuntur ipsarum simulent elaborare duo, exorsus nullae recusandae cur concertationesque commodi celeritas omnesque occulte dixi, istius se platone existunt praetore assumenda. Morbos alias posidonium deterius, tractat impendet studio adest mundus quaestionem adamare didicisse tantas.', 3, 3, '2019-05-09 12:29:57', '2019-05-09 12:29:57'),
(10, 'GG-shock', 'gs-111', 1, 0, 10, 135000, 10, 'á€€á€»á€°á€€á€»á€°', 'á€”á€°á€”á€°', 1, 2, '2019-05-23 14:41:04', '2019-05-25 23:46:19'),
(12, 'Huawei P9lite', 'h-11', 1, 0, 10, 135000, 10, 'some', 'á€”á€žá€„á€ž', 3, 3, '2019-05-23 14:42:56', '2019-05-23 14:42:56');

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
(7, 'Arkar Phyo', '39b39cd5cffefda3d7db538664ed4c5c417ebcbf', 1, '2019-05-10 22:56:25', '2019-05-24 14:23:12'),
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
(1, 'Hein Kaung Khant', '09798467816', '104, Marlarmyine 3rd st, Hlaing Qtr(16), Yangon', 'Something', 1, '2019-05-09 20:43:09', '2019-05-10 22:58:28'),
(2, 'Hein Myat Thu', '09798407578', '104, U Aye 4th st, Hlaing Qtr(16), Yangon', 'Something', 0, '2019-05-09 20:43:09', '2019-05-10 22:58:33'),
(3, 'Sang Zula', '09421143439', 'Chin Pyay', 'Chin Gyi', 0, '2019-05-13 22:33:01', '2019-05-13 22:33:01'),
(4, 'Wai Linn Phyo', '09420035200', 'South Oakkalar', 'some', 0, '2019-05-13 22:40:48', '2019-05-13 22:40:48'),
(5, 'Myint Oo', '09692730619', 'Hlaing', 'haha', 0, '2019-05-13 22:48:30', '2019-05-13 22:48:30'),
(6, 'Swe Swe Nyein', '09798467816', 'Hlaing', 'haha', 0, '2019-05-14 11:45:37', '2019-05-14 11:45:37'),
(7, 'Arkar Phyo', '09788351044', 'Yangon', 'something', 0, '2019-05-14 11:49:34', '2019-05-14 11:49:34'),
(8, 'Hein Kaung Khant', '09798407578', 'Mawlamyine', 'Something', 0, '2019-05-14 16:52:47', '2019-05-14 16:52:47'),
(9, 'Win Pa Pa Aung', '09260968600', 'Mawlamyine', 'Some', 0, '2019-05-14 16:54:45', '2019-05-14 16:54:45'),
(14, 'Moe Thu', '09420035200', 'MICT park', 'some remark', 0, '2019-05-22 21:30:53', '2019-05-22 21:30:53'),
(15, 'Hein Kaung Khant', '', '', '', 0, '2019-05-26 08:20:44', '2019-05-26 08:20:44'),
(16, 'djdjsjs', 'jejejejdj', 'Jrjdjdjjddk', '', 0, '2019-05-26 13:51:31', '2019-05-26 13:51:31'),
(17, 'wjjajdnnwdn', '38848827', 'Enfnwjsn', 'Ejjsjdjdd', 0, '2019-05-26 13:52:00', '2019-05-26 13:52:00'),
(18, 'heinkaungkhant', '38848827', 'Djwjsjjwjdn', 'Djejjwjsjsj', 0, '2019-05-26 13:52:56', '2019-05-26 13:52:56'),
(19, 'Wai Linn Phyo', '4024394823048', 'kfjiwafjewoafpjieaofj', '`jreajfioawjfoewjfaopej', 0, '2019-05-26 17:16:30', '2019-05-26 17:16:30'),
(20, 'Aaa', '123', 'Bbb', 'Hhh', 0, '2019-05-27 08:33:23', '2019-05-27 08:33:23'),
(21, 'Bskbxj', '846..467', 'Jdnfknf', 'Jdijnfok', 0, '2019-05-27 08:35:00', '2019-05-27 08:35:00'),
(22, 'Usbxjndjc', '937968', 'Odhosbih', 'Hdondjc', 0, '2019-05-27 08:35:53', '2019-06-15 09:25:48');

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
(1, 3, 'some', 1, 1),
(2, 2, 'something', 2, 1),
(3, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temperantiam amicitiam desiderat poterimus utrumque, iucunditatis. Quaeri proficiscuntur innumerabiles pariatur ulla, quaeso sicine', 5, 2),
(4, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temperantiam amicitiam desiderat poterimus utrumque, iucunditatis. Quaeri proficiscuntur innumerabiles pariatur ulla, quaeso sicine', 7, 2),
(5, 1, '', 1, 3),
(6, 1, '', 2, 4),
(7, 1, '', 8, 5),
(8, 1, '', 9, 6),
(9, 1, '', 7, 7),
(10, 1, '', 8, 8),
(11, 3, '', 2, 9),
(16, 1, 'one', 7, 14),
(17, 1, 'two', 1, 14),
(18, 1, 'three', 2, 14),
(19, 1, 'four', 8, 14),
(20, 1, 'five', 9, 14),
(21, 10, '', 8, 16),
(22, 1, '', 8, 17),
(23, 1, '', 7, 18),
(24, 2, '', 2, 19),
(25, 2, '', 7, 19),
(26, 5, '', 10, 19),
(27, 5, '', 1, 19),
(28, 1, '', 8, 20),
(29, 1, '', 7, 21),
(30, 1, '', 2, 22);

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
(6, '2019-05-10 12:31:17'),
(7, '2019-05-19 21:10:16');

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
(2, 'Hein Kaung. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2019-05-07 22:18:10', '2019-05-19 21:10:36');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `promo_photos`
--
ALTER TABLE `promo_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promo_text`
--
ALTER TABLE `promo_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

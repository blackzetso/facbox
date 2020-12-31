-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 ديسمبر 2020 الساعة 02:29
-- إصدار الخادم: 10.4.8-MariaDB
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` varchar(60) DEFAULT NULL,
  `qty` varchar(60) DEFAULT NULL,
  `total` varchar(60) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id`, `product`, `name`, `price`, `qty`, `total`, `user`) VALUES
(40, 15, 'بطاطس ', '10', '', '0', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(11, 'سوبر ماركت', '4478384.webp'),
(17, 'خضروات و فواكه', '9721882.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `build` varchar(255) NOT NULL,
  `storey` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `order_status` varchar(60) NOT NULL DEFAULT 'طلب جديد',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `city`, `zone`, `street`, `build`, `storey`, `orders`, `user`, `time_from`, `time_to`, `order_status`, `date`) VALUES
(24, 'المستقبل', 'الهايكستب', 'عمارات الميات', '132', '4', '', 1, '18:27', '12:22', 'مرتجع', '2020-12-27'),
(25, 'يب', 'شسي', 'بشيشي ', ' سيب', 'بسش', '', 1, '19:53', '19:53', 'طلب جديد', '2020-12-27');

-- --------------------------------------------------------

--
-- بنية الجدول `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` varchar(20) DEFAULT '0',
  `qty` varchar(20) DEFAULT '0',
  `total` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `order_items`
--

INSERT INTO `order_items` (`id`, `item_id`, `name`, `order_id`, `date`, `price`, `qty`, `total`) VALUES
(13, 10, 'الجنسج', 25, '2020-12-27', '50', '1.25', '62.5');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `img` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `short_desc` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `price` varchar(60) NOT NULL,
  `price2` varchar(60) DEFAULT NULL,
  `unite` varchar(60) NOT NULL,
  `unite2` varchar(80) DEFAULT NULL,
  `Decimal_number` varchar(60) NOT NULL DEFAULT '1',
  `discount` varchar(60) NOT NULL,
  `Additional_img` varchar(255) NOT NULL,
  `Availability` varchar(60) NOT NULL DEFAULT 'متوفر فى المخزن',
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `short_desc`, `price`, `price2`, `unite`, `unite2`, `Decimal_number`, `discount`, `Additional_img`, `Availability`, `category`, `subcategory`) VALUES
(8, 'طماطم شيري وسط', '5404181.jpg', 'وصف المنتج', 'وصف قصير', '5', NULL, 'كجم', NULL, '0.5', '0', '', 'متوفر فى المخزن', 11, 11),
(10, 'الجنسج', '1519091.jpg', '', '', '50', NULL, 'كجم', NULL, '0.25', '0', '', 'متوفر فى المخزن', 11, 11),
(13, 'كرنب', '2541534.png', 'empty', 'empty', '15', NULL, 'كجم', NULL, '0.5', '0', '', 'متوفر فى المخزن', 17, 14),
(14, 'طماطم', '5551030.jpg', 'empty', 'empty', '14', NULL, 'كجم', NULL, '0.5', '0', '', 'متوفر فى المخزن', 11, 11),
(15, 'بطاطس ', '7213239.png', 'empty', 'empty', '10', '20', 'قطعة', 'علبه', '0.5', '0', '', 'متوفر فى المخزن', 17, 13);

-- --------------------------------------------------------

--
-- بنية الجدول `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `category` int(60) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category`, `img`) VALUES
(11, 'منتجات غذائية', 11, '7547413.png'),
(13, 'خضروات', 17, '516083.jpg'),
(14, 'فواكه', 17, '6381528.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'كجم'),
(2, 'علبه'),
(3, 'كمية'),
(4, 'زجاجه'),
(5, 'كيس'),
(6, 'قطعة');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'user',
  `phone_number` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `permission`, `phone_number`) VALUES
(1, 'hemdat', 'm@gmail.com', '4297f44b13955235245b2497399d7a93', 'admin', '01090250088'),
(3, 'hemdat', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', ''),
(4, 'محمد الشافعى', 'abdoon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '01090250088');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart` (`product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_subcategory` (`category`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- القيود للجدول `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_item` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `category_subcategory` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

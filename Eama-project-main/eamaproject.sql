-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eamaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `UsersUid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `UsersUid`) VALUES
(16, 23),
(20, 24),
(11, 25),
(13, 26),
(14, 27);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `cart_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`cart_id`, `id`, `quantity`) VALUES
(16, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'forsha'),
(3, 'Toothbrush'),
(6, 'sui');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Pname` varchar(255) NOT NULL,
  `pquantity` int(255) NOT NULL,
  `pdescription` varchar(255) NOT NULL,
  `pbrand` varchar(255) NOT NULL,
  `pcategory` int(255) NOT NULL,
  `pprice` int(255) NOT NULL,
  `psize` int(255) NOT NULL,
  `comp_discount` double NOT NULL,
  `regular_discount` double NOT NULL,
  `pimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Pname`, `pquantity`, `pdescription`, `pbrand`, `pcategory`, `pprice`, `psize`, `comp_discount`, `regular_discount`, `pimage`) VALUES
(12, 'forshten', 555, 'nartuo hits sasuke', 'zara', 2, 89, 3, 0, 0, '../public/img/image_6581b058d550c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UsersUid` int(11) NOT NULL,
  `UsersName` varchar(255) NOT NULL,
  `UsersEmail` varchar(255) NOT NULL,
  `UsersPwd` varchar(255) NOT NULL,
  `UsersRole` varchar(128) NOT NULL,
  `UserAddress` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UsersUid`, `UsersName`, `UsersEmail`, `UsersPwd`, `UsersRole`, `UserAddress`) VALUES
(22, 'ahmed osama', 'aosmaaa@gmail.com', '$2y$10$SkEKRNFwmsMOHrAcH4BX2.QMxgP3wwE0pHVpvpgL.zPPWuvpiLD1.', 'user', ''),
(23, 'rennie', 'rennie@gmail.com', '$2y$10$5f0OnGUCZGytmpt6nq51sO4Nn8AY1IHKa6EnAHYI1lW1vmf3dW0sa', 'user', ''),
(24, 'ahmed osama', 'ahmed@gmail.com', '$2y$10$B.FTwriEe8D0mB7mBWRsIexC654.lPSAoa8TQZyMN2IuJDwB.e3Ke', 'user', ''),
(25, 'ahmed', 'ah@gmail.com', '$2y$10$nys6JTTkQyhqrA9rKTNxcOuY3lUoGMktcuYA7NlvGwqV8yTU/E1.i', 'A', ''),
(26, 'fares', 'fares@gmail.com', '$2y$10$tmTbKPJcD9QaXm10h0ExKesSCTZy1xoqg387rFZntfPukVhHwED22', 'user', ''),
(27, 'osama abdallah', 'osama@gmail.com', '$2y$10$W3eXjPRYd30wnxJs3DZO7erXZ0v0y0m17ujiNnL2DHoXuTvj861TC', 'user', ''),
(28, 'mohamed', 'mohamed@gmail.com', '$2y$10$sykg9ra.0Wwpf3H4L.Esye8TmZqNaoVVihIf.j1GybOCXYfmrp30q', 'user', ''),
(29, 'admin', 'admin@gmail.com', '$2y$10$ycgbTTNyOUNELwi0fRZowOSJKAitmj3OhSNZfBcYdXkKjic0vuDlC', 'A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`UsersUid`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`cart_id`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category` (`pcategory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UsersUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UsersUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UsersUid`) REFERENCES `users` (`UsersUid`);

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`pcategory`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 07:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manageproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(12, 'User', '$2y$10$jqIrzRPEdDjxdpw2koMRKObPE4dra9btvuFFtz18Z2q.6tpZ3lUha', 'user', '2023-02-25 14:00:31'),
(13, 'Admin', '$2y$10$GANhb8PeRLcKQNsxcOWhX.cWZJ.Tx9Vw1iqOdNAyRZaa/rjHMVCPe', 'admin', '2023-02-25 14:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `prd_price` float NOT NULL,
  `prd_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `type_id`, `prd_price`, `prd_image`, `created_at`) VALUES
(001, 'MSI RX580', 002, 5900, 'prd_63fa125758302.jpg', '2023-02-25 13:51:19'),
(002, 'Intel Core I5', 001, 9900, 'prd_63fa12b223b2d.jpg', '2023-02-25 13:52:50'),
(003, 'CORSAIR VENGEANCE', 003, 3400, 'prd_63fa12fd331c9.jpg', '2023-02-26 04:54:17'),
(004, 'Geforce RTX3050', 002, 12990, 'prd_63fa135fc1dcb.webp', '2023-02-25 13:55:43'),
(005, 'ASUS 3060Ti', 002, 1590, 'prd_63fa139209933.png', '2023-02-25 13:56:34'),
(006, 'AMD Ryzen 5 3600', 001, 5000, 'prd_63fa13c20925f.webp', '2023-02-25 13:57:22'),
(007, 'Hyper X', 003, 3500, 'prd_63fa1427e3661.jpg', '2023-02-25 13:59:03'),
(008, 'KLLISRE DD4', 003, 3500, 'prd_63fa154323206.webp', '2023-02-25 14:03:47'),
(009, 'Intel Core I5 7400', 001, 4990, 'prd_63fa1576b3415.jpg', '2023-02-25 14:04:38'),
(010, 'AMD Ryzen 7 3700x', 001, 5000, 'prd_63fad661ee571.webp', '2023-02-26 03:47:45'),
(012, 'Logitech G G413', 005, 4590, 'prd_63fad7add03c0.png', '2023-02-26 03:53:17'),
(013, 'CORSAIR K70', 005, 5900, 'prd_63faeb76f36b9.webp', '2023-02-26 05:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(001, 'CPU'),
(002, 'VGA'),
(003, 'RAM'),
(005, 'Keyboard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

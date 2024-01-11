-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 01:50 PM
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
-- Database: `db_btp`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,2) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `barcode`, `qty`, `amount`, `image`, `date`, `views`, `user_id`) VALUES
(47, 'Shigure Ui Nendoroid', '01830822861', 1, 300.00, 'uploads/0ada58fbb03fbeefe316ce6111554895d902aa1a_8031.jpg', '2024-01-11 08:07:14', 4, '1'),
(48, 'Black Clover Manga Volume 1', '01487894088', 1, 250.00, 'uploads/a80a807ccf0d3fc7af437f82708ebdad7f409755_9471.jpg', '2024-01-11 12:11:18', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `customer_name` varchar(50) DEFAULT 'Unknown',
  `customer_contact` varchar(11) DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `barcode`, `receipt_no`, `description`, `qty`, `amount`, `total`, `date`, `user_id`, `customer_name`, `customer_contact`) VALUES
(57, '01830822861', 38, 'Shigure Ui Nendoroid', 1, 300.00, 300.00, '2024-01-11 08:07:26', '1', 'Unknown', 'Unknown'),
(58, '01830822861', 39, 'Shigure Ui Nendoroid', 2, 300.00, 600.00, '2024-01-11 12:12:10', '1', 'Unknown', 'Unknown'),
(59, '01487894088', 40, 'Black Clover Manga Volume 1', 3, 250.00, 750.00, '2024-01-11 12:35:14', '8', 'Unknown', 'Unknown'),
(60, '01487894088', 41, 'Black Clover Manga Volume 1', 1, 250.00, 250.00, '2024-01-11 13:05:50', '1', 'Unknown', 'Unknown'),
(61, '01487894088', 42, 'Black Clover Manga Volume 1', 2, 250.00, 500.00, '2024-01-11 13:37:01', '9', 'Unknown', 'Unknown'),
(62, '01830822861', 42, 'Shigure Ui Nendoroid', 5, 300.00, 1500.00, '2024-01-11 13:37:01', '9', 'Unknown', 'Unknown'),
(63, '01830822861', 43, 'Shigure Ui Nendoroid', 5, 300.00, 1500.00, '2024-01-11 13:48:52', '9', 'Unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(500) NOT NULL,
  `role` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `remove_user` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `role`, `gender`, `remove_user`) VALUES
(1, 'ryanshit', 'email@email.com', '$2y$10$W23e/gbw5ZjH8tBnNLp4Pey5KlAM8cEbrEkR4oGu0qDFk4h2.FuQe', '2023-05-03 13:28:40', '', 'owner', 'male', 0),
(8, 'anna', 'test1@email.com', '$2y$10$h.cnX6bfOE.Zb26lZ4bqNOUELVT085FITXqHH0tR6zb0whpFvWebm', '2024-01-11 12:34:15', '', 'cashier', 'female', 1),
(9, 'Pancho', 'pancho@email.com', '$2y$10$R2YjqPAH9SaNCJUvZjqZcOYyP7/reD.Ltc9KxDzAwahhFVQEopDqq', '2024-01-11 13:15:38', '', 'owner', 'male', 1),
(10, 'pontanos', 'pontanos@email.com', '$2y$10$ghGsy90mVBd1CR83iOlBZuzwiXYaRfgt/6LysfCd2R39ZxEF6QYnm', '2024-01-11 13:16:39', '', 'owner', 'male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `description` (`description`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `qty` (`qty`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `views` (`views`),
  ADD KEY `date` (`date`),
  ADD KEY `amount` (`amount`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `description` (`description`),
  ADD KEY `qty` (`qty`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `receipt_no` (`receipt_no`),
  ADD KEY `amount` (`amount`),
  ADD KEY `total` (`total`),
  ADD KEY `customer_name` (`customer_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

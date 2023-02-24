-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 01:30 PM
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
-- Database: `dbkartell`
--
CREATE DATABASE IF NOT EXISTS `dbkartell` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbkartell`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_header` varchar(255) NOT NULL,
  `news_summary` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_divide` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_header`, `news_summary`, `news_image`, `news_divide`, `user_id`, `created_date`) VALUES
(16, 'Kartell Flagship Store Wien Opening', 'Wien | December 2022', 'news1.jpg', 'news1.html', 2, '2023-02-16 18:53:27'),
(17, 'Kartell Outdoor & Louis Ghost 20th Anniversary at Kartell Flagship Store Paris', 'Paris | January 2023', 'news2.jpg', 'news2.html', 2, '2023-02-16 18:54:50'),
(18, 'Kartell Flagship Store Miami Opening', 'Miami | November 2022', 'news3.jpg', 'news3.html', 1, '2023-02-16 18:55:37'),
(19, 'Kartell and Teatro alla la Scala', 'Milano | July 2021', 'news4.jpg', 'news4.html', 2, '2023-02-16 18:55:59'),
(20, 'Kartell Flagship Store Genova Opening', 'Genova | December 2021', 'news6.jpg', 'news6.html', 2, '2023-02-16 19:08:39'),
(21, 'Kartell Flagship Store Seoul Opening', 'Seoul | June 2020', 'news7.jpg', 'news7.html', 2, '2023-02-16 19:09:14'),
(22, 'Kartell fills the main window at Salvioni Milano Durini', 'Milano | February 2020', 'news8.jpg', 'news8.html', 2, '2023-02-16 19:10:13'),
(23, 'Masters: new artists variations for a charity auction', 'Milano | October 2019', 'news9.jpg', 'news9.html', 2, '2023-02-16 19:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `products_header` varchar(255) NOT NULL,
  `products_image` varchar(255) NOT NULL,
  `products_price` decimal(10,2) NOT NULL,
  `products_link` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `products_header`, `products_image`, `products_price`, `products_link`, `created_date`, `user_id`) VALUES
(1, 'MASTERS Metal', 'product1.webp', '100.00', '#', '2023-02-16 21:16:04', 1),
(5, 'LOUIS GHOST', 'product2.webp', '79.00', '#', '2023-02-21 13:42:13', 1),
(6, 'MAUI', 'product3.webp', '50.00', '#', '2023-02-21 14:07:59', 1),
(7, 'PIUMA', 'product4.webp', '80.00', '#', '2023-02-21 14:10:15', 1),
(8, 'LARGO Gubbio', 'product5..webp', '1200.00', '#', '2023-02-21 15:33:16', 1),
(9, 'LARGO Velvet', 'product6.webp', '1120.00', '#', '2023-02-21 15:35:44', 1),
(10, 'LARGO Three-Seater Nile', 'product7.webp', '1400.00', '#', '2023-02-21 15:36:42', 1),
(11, 'LARGO De Poule', 'product8.webp', '1400.00', '#', '2023-02-21 15:38:05', 1),
(12, 'TRAMA - WINE', 'product9.webp', '100.00', '#', '2023-02-21 17:04:30', 1),
(13, 'TRAMA - WATER', 'product10.webp', '110.00', '#', '2023-02-21 17:05:32', 1),
(14, 'JELLIES FAMILY - WINE', 'product11.webp', '100.00', '#', '2023-02-21 17:06:29', 1),
(15, 'JELLIES FAMILY - WATER', 'product12.webp', '110.00', '#', '2023-02-21 17:07:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` tinytext NOT NULL,
  `user_password` longtext NOT NULL,
  `user_email` tinytext NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`, `usertype`, `created_date`) VALUES
(1, 'Arlind', '$2y$10$E5pQts.9jitlmi6bQ31wL.CIt0qsLeIGh4F/mkg5L8ey0eURE2wX.', 'arlindmaliqi28@gmail.com', 'admin', '2023-02-21 13:35:05'),
(2, 'Trimi', '$2y$10$5cxFtnQHyvVIRqM2YplWN.Q84iDOgMzk67f4MOPqBIIrTS1X5GGuK', 'trimz@gmail.com', 'admin', '2023-02-16 19:59:17'),
(3, 'Ramiz', '$2y$10$R01377kuAC5EzhhRliYK/.syfTndb4kFKm0AnQGPJvKd/nK.vsjxq', 'Ramiz85@ubt-uni.net', 'user', '2023-02-21 13:39:23'),
(4, 'Blerim', '$2y$10$8aINN7AsNyW0WPBQHU/qXOuZWXgyNTu9ZrzG6kUsnqlHHHm7jbLBW', 'BlerimZ@ubt-uni.net', 'user', '2023-02-21 13:39:32'),
(10, 'Florent', '$2y$10$szX664d.j21llHMruPwiL.4ohA/1dNkXgaU9qjIoxmHDxHatbQuD.', 'florent-sahiti@gmail.com', 'user', '2023-02-23 13:03:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

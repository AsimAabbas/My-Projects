-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 01:54 PM
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
-- Database: `wms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(2, 'Electronics', 'Electronics devices'),
(4, 'Medical', 'Medical'),
(10, 'Beauty', 'asd asd adf ewr dcvz asdvadta fasd sdaf asd');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `quantity`) VALUES
(31, 'Mobile', 'added dash ds added adzed fcxz dasf  df asdf vsd ', '2', 300, 200),
(32, 'Care for women', 'qmfjijasd tgsdfgf ', '2', 30, 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `user_type`) VALUES
(1, 'Asim', ' Abbas', 'asim@gmail.com', '$2y$10$gLqkPvO.JIV9V0OR76ZHUu3e9K5X3QwheVAFXJJ2wejRzp.6mMQVC', 0),
(2, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$B03uU804tv3SOsCF/iEgUO.hQy3q8dVlUC51GI.jCGSElaME8Vr9W', 1),
(3, 'Imran', ' Abbas', 'Imran@gamil.com', '$2y$10$FWAemIdu5iMgHTTmY7IO4Ont3fJqcILfzehrn2QY.bIyAHku6ibWy', 0),
(4, 'Imran', ' Abbas', 'Imran@gmail.com', '$2y$10$Iyt4SIFVWMnyfDGo58Gt4O1FQlEba1PfsoMpddXOgoO.7gKslXK0S', 0),
(5, 'Bilal', 'Akram', 'bilal@gmail.com', '$2y$10$J1ZEuUT.mIaB4b1xcukvXu980Rh4FOzVrXvAVI1.7ja1d3rH6W5Ie', 0),
(6, 'Taimor', 'Khan', 'taimor@gmal.com', '$2y$10$OdmZPWpAVyP9gWgE4Hwgc.W2YX9A.xiUXUGa52sh36R.wxlcDo6g2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

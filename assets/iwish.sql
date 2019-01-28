-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 07:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwish`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_url` varchar(200) NOT NULL,
  `item_price` double NOT NULL DEFAULT '0',
  `item_priority` int(11) NOT NULL DEFAULT '0',
  `parent_wish_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_description`, `item_url`, `item_price`, `item_priority`, `parent_wish_list_id`) VALUES
(1, 'Mouse', 'Gaming Mouse', 'http://www.mouse.com', 0, 1, 1),
(6, 'Monitor', 'Gaming Monitor', 'htttp://www.Monitor.com', 100, 2, 2),
(14, 'Razor blade', 'Gaming Laptop', 'htttp://www.raazor.com', 200, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`) VALUES
(1, 'Hasitha', 'test123'),
(4, 'Gathitha', '123'),
(5, 'ZubZero', 'test123'),
(8, 'test', 'test'),
(9, 'Test2', 'test2'),
(10, 'NewUser', 'new'),
(11, 'Cat', 'cat'),
(12, 'Mike', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `list_description` varchar(200) NOT NULL,
  `list_owner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `list_name`, `list_description`, `list_owner`) VALUES
(1, 'Hasitha wish list', 'wish list of hasitha', 'Hasitha'),
(2, '123', '123', 'Gathitha'),
(3, 'Zublist', 'List of Zub', 'ZubZero'),
(6, 'test', 'test', 'test'),
(7, 'test2', 'test2', 'Test2'),
(8, 'NewList', 'newList', 'NewUser'),
(9, 'cat', 'cat', 'Cat'),
(10, 'Mikes List', 'Mik list dis', 'Mike');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerFK` (`list_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `ownerFK` FOREIGN KEY (`list_owner`) REFERENCES `users` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

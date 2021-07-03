-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 26, 2021 at 12:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_selling`
--
CREATE DATABASE IF NOT EXISTS `book_selling` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `book_selling`;

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `book_no` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `book_name` text DEFAULT NULL,
  `writer_name` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `reffer_no` text DEFAULT NULL,
  `price` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_no`, `email`, `book_name`, `writer_name`, `title`, `image`, `reffer_no`, `price`) VALUES
(13, 'hasan@mail.com', 'Heartbreak Bay (Stillhouse Lake, 5) Paperback', 'Rachel Caine', 'Heartbreak Bay', '../../contents/img/493851tD5SVYdJL._SX331_BO1,204,203,200_.jpg', '012', '100'),
(14, 'hasan@mail.com', 'The Silent Patient ', 'Gina Homolka', 'The Silent Patient ', '../../contents/img/949341bsvxNUSdL._SX327_BO1,204,203,200_.jpg', '013', '150'),
(15, 'hasan@mail.com', 'The Bullet (Eve Duncan, 27)', 'Iris Johansen', 'The Bullet (Eve Duncan, 27)', '../../contents/img/343351vOVGf+79L._SX334_BO1,204,203,200_.jpg', '014', '120'),
(16, 'hasan@mail.com', 'My First Learn to Write Workbook: Practice for Kids with Pen Control, Line Tracing, Letters, and More!', 'Virginia Hume', 'My First Learn to Write Workbook', '../../contents/img/4962516Bwd1ubwL._SX384_BO1,204,203,200_.jpg', '015', '100'),
(17, 'hasan@mail.com', 'Amari and the Night Brothers (Supernatural Investigations)', 'B. B. Alston', 'Amari and the Night Brothers', '../../contents/img/536951ieTRZOR+S._SX329_BO1,204,203,200_.jpg', '016', '220'),
(18, 'hasan@mail.com', 'Eyes That Kiss in the Corners', 'Joanna Ho', 'Eyes That Kiss in the Corners', '../../contents/img/4745518cC86Q+CS._SX409_BO1,204,203,200_.jpg', '017', '320'),
(19, 'hasan@mail.com', 'Campbell Biology (Campbell Biology Series) 11th Edition', 'Lisa Urry', 'Campbell Biology', '../../contents/img/869941JaGePfE3L._SX412_BO1,204,203,200_.jpg', '018', '80'),
(20, 'hasan@mail.com', 'Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow', 'Samin Nosrat', 'Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow', '../../contents/img/874651aqYc1QyrL.jpg', '019', '190'),
(21, 'hasan@mail.com', 'The Art of Public Speaking ', 'Eric Ripert', 'The Art of Public Speaking ', '../../contents/img/785641xx26u3j5L.jpg', '020', '155');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_no` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `reffer_no` text DEFAULT NULL,
  `owner_email` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT '0',
  `image` text DEFAULT NULL,
  `book_name` text DEFAULT NULL,
  `writer_name` text DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `transaction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_no`, `name`, `email`, `reffer_no`, `owner_email`, `status`, `image`, `book_name`, `writer_name`, `item`, `book_price`, `transaction`) VALUES
(5, 'Hossain Ahmed', 'Hossain@gmail.com', '012', 'hasan@mail.com', 'success', '../../contents/img/493851tD5SVYdJL._SX331_BO1,204,203,200_.jpg', 'Heartbreak Bay (Stillhouse Lake, 5) Paperback', 'Rachel Caine', 1, 100, 'VADE0B248932'),
(6, 'Hossain Ahmed', 'Hossain@gmail.com', '014', 'hasan@mail.com', 'success', '../../contents/img/343351vOVGf+79L._SX334_BO1,204,203,200_.jpg', 'The Bullet (Eve Duncan, 27)', 'Iris Johansen', 1, 120, 'VADE0B248932'),
(10, 'Hossain Ahmed', 'Hossain@gmail.com', '013', 'hasan@mail.com', 'success', '../../contents/img/949341bsvxNUSdL._SX327_BO1,204,203,200_.jpg', 'The Silent Patient ', 'Gina Homolka', 2, 150, 'VADE0B248932'),
(11, 'Hossain Ahmed', 'Hossain@gmail.com', '012', 'hasan@mail.com', 'success', '../../contents/img/493851tD5SVYdJL._SX331_BO1,204,203,200_.jpg', 'Heartbreak Bay (Stillhouse Lake, 5) Paperback', 'Rachel Caine', 1, 100, 'VADE0B248932'),
(12, 'Hossain Ahmed', 'Hossain@gmail.com', '013', 'hasan@mail.com', 'success', '../../contents/img/949341bsvxNUSdL._SX327_BO1,204,203,200_.jpg', 'The Silent Patient ', 'Gina Homolka', 1, 150, 'VADE0B248932');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `no` int(11) NOT NULL,
  `owners_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `owners_name` text DEFAULT NULL,
  `users_name` text DEFAULT NULL,
  `message_from` text DEFAULT NULL,
  `message_to` text DEFAULT NULL,
  `messageRead` varchar(7) DEFAULT 'unseen',
  `message` varchar(7) DEFAULT 'unseen',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`no`, `owners_id`, `users_id`, `owners_name`, `users_name`, `message_from`, `message_to`, `messageRead`, `message`, `date`, `time`) VALUES
(2, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed', 'hi', NULL, 'seen', 'seen', '2021-06-26', '03:41:36'),
(3, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed', 'hi', NULL, 'seen', 'seen', '2021-06-26', '03:41:55'),
(4, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed', 'ki', NULL, 'seen', 'seen', '2021-06-26', '03:41:58'),
(5, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed', 'hello', NULL, 'seen', 'seen', '2021-06-26', '03:42:06'),
(6, 2, 5, 'Hasan Mahmud  ', 'Hossain Ahmed', 'kmn achos', NULL, 'seen', 'seen', '2021-06-26', '03:47:19'),
(7, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed  ', NULL, 'kire', 'seen', 'seen', '2021-06-26', '03:56:36'),
(8, 2, 5, 'Hasan Mahmud', 'Hossain Ahmed  ', NULL, 'ki', 'seen', 'seen', '2021-06-26', '03:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `no` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `notice` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`no`, `title`, `name`, `notice`, `date`) VALUES
(18, 'Terms And Condition', 'Saqline Mustaq', '1.1 “Buyer” means the individual or organisation who buys or agrees to buy the Goods from the Seller;\r\n\r\n1.2 “Consumer” shall have the meaning ascribed in section 12 of the Unfair Contract Terms Act 1977;\r\n\r\n1.3 “Contract” means the contract between the Seller and the Buyer for the sale and purchase of Goods incorporating these Terms and Conditions;\r\n\r\n1.4 “Goods” means the articles that the Buyer agrees to buy from the Seller;\r\n\r\n1.5 “Seller” means Health Books International Barn B, New Barnes Mill, Cottonmill Lane, St Albans, Hertfordshire, AL1 2HA that owns and operates healthbooksinternational.org\r\n\r\n1.6 “Terms and Conditions” means the terms and conditions of sale set out in this document and any special terms and conditions agreed in writing by the Seller.', '2021-06-03 01:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `shop_owner`
--

CREATE TABLE `shop_owner` (
  `owner_no` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pnumber` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `shop_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_owner`
--

INSERT INTO `shop_owner` (`owner_no`, `name`, `email`, `address`, `pnumber`, `state`, `city`, `shop_name`) VALUES
(0, 'Hasan Mahmud', 'hasan@mail.com', 'Muradpur', '01850751714', 'BD', 'Cittagong', 'Rokomari Binding');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `emailtoken` text NOT NULL DEFAULT 'no',
  `checkActive` text NOT NULL DEFAULT 'no',
  `recover` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `name`, `email`, `position`, `pass`, `emailtoken`, `checkActive`, `recover`) VALUES
(1, 'Hossain Jaber', 'gg@mail.com', 'Admin', '12345', 'yes', 'yes', '467481'),
(2, 'Hasan Mahmud', 'hasan@mail.com', 'Owner', '123456', 'yes', 'yes', NULL),
(4, 'Jubair Ahmed', 'jubar@email.net', 'Admin', '12345', 'yes', 'no', NULL),
(5, 'Hossain Ahmed', 'Hossain@gmail.com', 'User', '123456', 'yes', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `no` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pnumber` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`no`, `name`, `email`, `address`, `pnumber`, `state`, `city`) VALUES
(2, 'Hossain Ahmed', 'Hossain@gmail.com', 'Muradpur', '01850751714', 'BD', 'Cittagong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`book_no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_no`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `book_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

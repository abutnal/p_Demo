-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 01:51 PM
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
-- Database: `provab_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'Car', '07/01/2019'),
(2, 'Bike', '07/01/2019'),
(3, 'TV', '07/01/2019'),
(4, 'Mobile', '07/01/2019');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `product_name`, `category_name`, `price`, `photo`, `created_at`) VALUES
(18, 'Audi', 'Car', '555050', 'download.jpg', 'Jan 06 2019 8:15:45 pm'),
(19, 'Suzuki Hero Electric', 'Bike', '150000', 'download (2).jpg', 'Jan 06 2019 8:16:34 pm'),
(20, 'LG ', 'TV', '25000', 'download (3).jpg', 'Jan 06 2019 8:17:48 pm'),
(21, 'Cadillac', 'Car', '4000202', 'download (1).jpg', 'Jan 06 2019 8:21:06 pm');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `created_at`) VALUES
(1, 'Audi', 1, '07/01/2019'),
(2, 'BMW', 1, '07/01/2019'),
(3, 'Cadillac', 1, '07/01/2019'),
(4, 'Chevrolet', 1, '07/01/2019'),
(5, 'Datsun', 1, '07/01/2019'),
(6, 'Ferrari', 1, '07/01/2019'),
(7, 'Ford', 1, '07/01/2019'),
(8, 'Honda', 1, '07/01/2019'),
(9, 'Honda Royal Enfield', 2, '07/01/2018'),
(10, 'Hero Moto Corp TVS', 2, '07/01/2018'),
(11, 'Jawa Motorcycles Bajaj', 2, '07/01/2018'),
(12, 'Suzuki Hero Electric', 2, '07/01/2018'),
(13, 'Mahindra Vespa', 2, '07/01/2018'),
(14, 'Kawasaki Harley Davidson', 2, '07/01/2018'),
(15, 'Ducati Triumph', 2, '07/01/2018'),
(16, 'LG ', 3, '07/01/2018'),
(17, 'Samsung ', 3, '07/01/2018'),
(18, 'Sony', 3, '07/01/2018'),
(19, 'Vizio ', 3, '07/01/2018'),
(20, 'Videocon ', 3, '07/01/2018'),
(21, 'Nokia', 4, '07/01/2018'),
(22, 'Samsung', 4, '07/01/2018'),
(23, 'Apple', 4, '07/01/2018'),
(24, 'MI', 4, '07/01/2018'),
(25, '1 Plus', 4, '07/01/2018'),
(26, 'Motorola', 4, '07/01/2018');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`) VALUES
(1, 'Jyoti D', 'jyo@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

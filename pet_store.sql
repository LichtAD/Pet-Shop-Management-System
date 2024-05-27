-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 12:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `u_id` int(5) DEFAULT NULL,
  `p_id` int(5) DEFAULT NULL,
  `q` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`u_id`, `p_id`, `q`) VALUES
(11, 5, 1),
(11, 7, 1),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`) VALUES
(1, 'abc', 'abc@gmail.com', 123),
(2, 'bc', 'bc@yahoo.com', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `q` int(3) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `total` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `c_id`, `p_id`, `q`, `date`, `total`) VALUES
(41, 11, 1, NULL, '2023-04-13', 1520),
(42, 11, 2, NULL, '2023-04-13', 1520),
(43, 11, 1, 1, '2023-04-13', 1505),
(44, 11, 2, 1, '2023-04-13', 15),
(45, 11, 2, 1, '2023-04-13', 15),
(46, 11, 2, 1, '2023-04-13', 15);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product`, `amount`, `cost`) VALUES
(2, 'aaa', 22, 222),
(3, 'fbjjf', 452, 38);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `img` varchar(400) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'accessories'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `amount`, `price`, `img`, `type`) VALUES
(1, 'dog food', 1005, 1505, 'https://www.pet.com.bd/petvault/uploads/2021/07/Spectrum-Kitten38-Cat-Food-Chicken-Formula-2kg-220x220.jpg', 'accessories'),
(2, 'fish food', 6, 15, 'https://www.pet.com.bd/petvault/uploads/2021/07/Spectrum-Kitten38-Cat-Food-Chicken-Formula-2kg-220x220.jpg', 'accessories'),
(5, 'Kiwof Cat Dewormer Chewable Tablets (4 Tablets)', 1200, 480, 'https://www.pet.com.bd/petvault/uploads/2018/11/Kiwof-Easy-Chews.jpg', 'medicine'),
(6, '\r\nVersele-Laga Oropharma – Ear Care (150ml)', 125, 660, 'https://www.pet.com.bd/petvault/uploads/2018/03/Ear-Care.jpg', 'medicine'),
(7, '\r\nHimalaya Erina-EP Tick & Flea Control Shampoo for Cat & Dog (200ml)', 56, 640, 'https://www.pet.com.bd/petvault/uploads/2019/12/Himalaya-ERINA-COAT-CLEANSER-200ML-200-ml-Pet-Coat-Cleanser-Suitable-For-Dog-Cat.jpg', 'medicine'),
(8, 'Exclusive Cat Dress – Code# 001 (Size 3)', 22, 1390, 'https://www.pet.com.bd/petvault/uploads/2019/05/Cat-Dress-05.jpg', 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `address`, `phone`, `cost`) VALUES
(1, 'gulshan', 1235, 2505),
(4, 'shah', 330, 33430);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'a', 'a', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `img` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`, `address`, `img`) VALUES
(1, 'a', '1', 'a', 'customer', '123', NULL, NULL),
(2, 'djf', '11', 'djf@gmail.com', 'customer', '123', NULL, NULL),
(9, 'admin', '111', 'ajd', 'admin', '123', NULL, NULL),
(10, 'emam', '444', 'emam@gmail.com', 'customer', '123', NULL, NULL),
(11, 'Emam Hasan', '+8801771408299', 'emam.hasan@g.bracu.ac.bd', 'customer', '@habi', 'Dhaka, Bangladesh', 'https://www.pet.com.bd/petvault/uploads/2018/12/cattt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

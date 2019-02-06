-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2019 at 01:17 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_supplier` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_srp` decimal(25,2) NOT NULL,
  `product_price` decimal(25,2) NOT NULL,
  `product_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_number`, `product_quantity`, `product_category`, `product_supplier`, `product_desc`, `product_srp`, `product_price`, `product_added`, `status`) VALUES
(000009, 'fdfdsfsd', 'catcat000009', 0, 26, 5, 'fdssfdsf', '50.00', '20.00', '2019-02-06 06:49:22', 'Available'),
(000010, 'Janey', 'catcat-000010', 10, 27, 3, 'ddasd', '20.00', '10.00', '2019-02-06 06:52:11', 'Available'),
(000011, 'fdsfdsfdsfdsfsdf', 'catsub-000011', 20, 29, 5, 'dfdsfdsf', '100.00', '50.00', '2019-02-06 06:52:40', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `subcategory_name`) VALUES
(26, 'category1', 'subname1'),
(27, 'category1', 'subname2'),
(28, 'category2', 'subname3'),
(29, 'category2', 'subname4'),
(30, 'categoryadd', 'one'),
(31, 'categoryadd', 'two');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(11) NOT NULL,
  `transaction_number` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_number` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` decimal(25,2) NOT NULL,
  `product_total_amount` decimal(25,2) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `transaction_number`, `product_number`, `product_name`, `product_qty`, `product_price`, `product_total_amount`, `date_ordered`) VALUES
(1, 000036, 000001, 'CCS Lace', 5, '50.00', '250.00', '2019-02-05 05:10:46'),
(3, 000037, 000002, 'sadsadsd', 12, '120.00', '1200.00', '2018-02-04 08:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_supplier`
--

CREATE TABLE `product_supplier` (
  `id` int(11) NOT NULL,
  `supplier_comp_name` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_tel` varchar(8) NOT NULL,
  `supplier_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_supplier`
--

INSERT INTO `product_supplier` (`id`, `supplier_comp_name`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_tel`, `supplier_added`, `status`) VALUES
(3, 'supp', 'mney', 'ney', '092-9956-6290', '875-9856', '2019-02-02 02:43:59', 'Archive'),
(4, 'fdsfd', 'fdsfdsf', 'makati', '092-9956-6290', '875-9856', '2019-02-02 02:44:04', 'Available'),
(5, 'pahiram', 'janey', 'makati', '092-9956-6290', '875-9856', '2019-02-02 03:57:31', 'Available'),
(6, 'Supplier 1', 'Janey Lajara', 'Sr Nuestra', '+(63) 936-274-8349', '875-5516', '2019-02-05 09:24:23', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `date_added`, `date_login`) VALUES
(1, 'Janey', 'Lajara', 'Teoxon', 'jane_teoxon08@yahoo.com', 'janey12345', '2019-01-30 07:54:43', '2019-01-30 07:54:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_supplier`
--
ALTER TABLE `product_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 07:48 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers_loan_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `udhar_amnt` int(11) NOT NULL,
  `udhar_return` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `name`, `mobile`, `email`, `address`, `udhar_amnt`, `udhar_return`) VALUES
(1, 'Kiran Madhukar Pawar', 7020471054, 'pawark485@gmail.com', 'Nashik', 15000, 0),
(2, 'Akshay', 97945415412, 'akshay@gmail.com', 'NGN', 1700, 0),
(3, 'sachin borse', 5465154515, 'sachin@gmail.com', 'pune', 4000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shopkeepers`
--

CREATE TABLE `shopkeepers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopkeepers`
--

INSERT INTO `shopkeepers` (`id`, `name`, `mobile`, `address`) VALUES
(2, 'sachin borse', 4516541515, 'pune'),
(3, 'abc', 56845315415, 'hyu');

-- --------------------------------------------------------

--
-- Table structure for table `udhar_amnt`
--

CREATE TABLE `udhar_amnt` (
  `udhar_amnt_id` int(11) NOT NULL,
  `udhar_date` date NOT NULL,
  `udhar_amnt` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `shopkeepers_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `udhar_amnt`
--

INSERT INTO `udhar_amnt` (`udhar_amnt_id`, `udhar_date`, `udhar_amnt`, `cust_id`, `shopkeepers_name`) VALUES
(1, '2020-01-15', 5000, 1, 'sachin borse'),
(2, '2020-01-15', 10000, 1, 'sachin borse'),
(3, '2020-01-16', 1000, 2, 'sachin borse'),
(4, '2020-01-19', 500, 2, 'sachin borse'),
(5, '2020-01-19', 5000, 3, 'sachin borse'),
(6, '2020-01-30', 1000, 2, 'sachin borse');

-- --------------------------------------------------------

--
-- Table structure for table `udhar_amnt_payment`
--

CREATE TABLE `udhar_amnt_payment` (
  `udhar_return_id` int(11) NOT NULL,
  `udhar_payment_date` date NOT NULL DEFAULT current_timestamp(),
  `udhar_payment_amnt` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `shopkeepers_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `udhar_amnt_payment`
--

INSERT INTO `udhar_amnt_payment` (`udhar_return_id`, `udhar_payment_date`, `udhar_payment_amnt`, `cust_id`, `shopkeepers_name`) VALUES
(1, '2020-01-15', 2000, 1, 'sachin borse'),
(2, '2020-01-15', 4500, 1, 'sachin borse'),
(3, '2020-01-15', 1500, 1, 'abc'),
(4, '2020-01-15', 1500, 1, 'sachin borse'),
(5, '2020-01-19', 800, 2, 'abc'),
(6, '2020-01-19', 1000, 3, 'sachin borse');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `joining_date` date DEFAULT current_timestamp(),
  `designation` varchar(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user_code` varchar(6) NOT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `name`, `joining_date`, `designation`, `username`, `password`, `user_code`, `is_active`, `create_date`, `create_id`, `update_date`, `update_id`) VALUES
(1, 1, 'Sachin', '2019-10-10', 'Admin', 'sachin', 'sachin', '', 'Active', '2019-10-22 08:03:40', 0, '2019-10-22 08:03:40', 0),
(2, 2, 'Kiran', '2019-10-11', 'Admin', 'kiran', 'kiran', '', 'Active', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udhar_amnt`
--
ALTER TABLE `udhar_amnt`
  ADD PRIMARY KEY (`udhar_amnt_id`);

--
-- Indexes for table `udhar_amnt_payment`
--
ALTER TABLE `udhar_amnt_payment`
  ADD PRIMARY KEY (`udhar_return_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `udhar_amnt`
--
ALTER TABLE `udhar_amnt`
  MODIFY `udhar_amnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `udhar_amnt_payment`
--
ALTER TABLE `udhar_amnt_payment`
  MODIFY `udhar_return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

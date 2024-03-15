-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_orders`
--

CREATE TABLE `buyer_orders` (
  `amd_no` int(100) NOT NULL,
  `amd_date` varchar(100) NOT NULL,
  `last_amd_date` varchar(100) NOT NULL,
  `posting_ref_no` int(50) NOT NULL,
  `po_dt` varchar(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `group_sortno` varchar(100) NOT NULL,
  `qty_printName` varchar(50) NOT NULL,
  `qty_printName2` varchar(100) NOT NULL,
  `order_mtr` varchar(50) NOT NULL,
  `tolerance_prec` varchar(50) NOT NULL,
  `amd_mtr` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `delivery_starting` varchar(100) NOT NULL,
  `party_comp_date` varchar(100) NOT NULL,
  `comp_date` varchar(100) NOT NULL,
  `party_rate` int(50) NOT NULL,
  `last_desp_date` varchar(50) NOT NULL,
  `tot_desp_mtrs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer_orders`
--

INSERT INTO `buyer_orders` (`amd_no`, `amd_date`, `last_amd_date`, `posting_ref_no`, `po_dt`, `buyer_name`, `group_sortno`, `qty_printName`, `qty_printName2`, `order_mtr`, `tolerance_prec`, `amd_mtr`, `total`, `delivery_starting`, `party_comp_date`, `comp_date`, `party_rate`, `last_desp_date`, `tot_desp_mtrs`) VALUES
(1, '14/03/2024', '13/03/2024', 1, '10', 'Buyer-1', '5', '10', 'PrintName 1', '5', '10', '50', 40, '14/03/2024', '15/03/2024', '15/03/2024', 100, '14/03/2024', '10'),
(2, '14/03/2024', '13/03/2024', 2, '10', 'Buyer-2', '5', '10', 'PrintName 2', '5', '10', '50', 40, '14/03/2024', '15/03/2024', '15/03/2024', 100, '14/03/2024', '10');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_order_details`
--

CREATE TABLE `buyer_order_details` (
  `posting_ref_no` varchar(50) NOT NULL,
  `orderList` text NOT NULL,
  `total_order` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer_order_details`
--

INSERT INTO `buyer_order_details` (`posting_ref_no`, `orderList`, `total_order`) VALUES
('1', '[[1,\"2024-03-06\",\"2024-03-12\",\"10\",\"Mode 1\"],[2,\"2024-03-03\",\"2024-03-10\",\"10\",\"Mode 2\"],[3,\"2024-03-15\",\"2024-03-15\",\"10\",\"Mode 2\"]]', 30),
('2', '[[1,\"2024-03-07\",\"2024-03-14\",\"12\",\"Mode 1\"],[2,\"2024-03-06\",\"2024-03-13\",\"10\",\"Mode 2\"],[3,\"2024-03-05\",\"2024-03-12\",\"8\",\"Mode 3\"]]', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `superAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `user` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `superAdmin`, `admin`, `user`) VALUES
('dinesh', '123', 1, 0, 0),
('dk', 'test', 0, 1, 0),
('kumar', '1234', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_orders`
--
ALTER TABLE `buyer_orders`
  ADD PRIMARY KEY (`posting_ref_no`);

--
-- Indexes for table `buyer_order_details`
--
ALTER TABLE `buyer_order_details`
  ADD PRIMARY KEY (`posting_ref_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

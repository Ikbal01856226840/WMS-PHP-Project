-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 12:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `prd_id` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `company` int(20) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `stock_group` int(20) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `warranty` int(20) DEFAULT NULL,
  `batch_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prd_id`, `name`, `company`, `unit`, `stock_group`, `status`, `warranty`, `batch_no`) VALUES
(1, '11', 'aaa', 0, 'kg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `title`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', 'When using this account it is possible to cause irreversible. Default it gets all permission', 0, 1, '2016-12-19 00:44:30', '2019-10-22 16:49:56'),
(2, 'admin', 'Admin', '[Administrator] Full access to create, edit, and update companies, and orders', 0, 1, '2016-12-19 00:44:30', '2019-11-27 16:51:40'),
(3, 'Manager', 'Manager', 'Ability to create new companies and orders, or edit and update any existing ones', 0, 2, '2016-12-19 00:45:53', '2017-06-11 07:49:00'),
(4, 'Author', 'Author', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences', 0, 2, '2016-12-19 00:45:53', '2017-06-11 07:49:47'),
(5, 'Contributors', 'Contributor', '[Contributor] A standard user that can have a licence assigned to them. No administrative features', 0, 2, '2017-01-02 01:38:35', '2017-07-01 09:40:55'),
(6, 'User', 'User', 'Access Only Defined Pages.', 0, 0, '2021-12-13 04:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_group`
--

CREATE TABLE `stock_group` (
  `id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `under` int(20) DEFAULT NULL,
  `qty_add_per` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_group`
--

INSERT INTO `stock_group` (`id`, `name`, `alias`, `under`, `qty_add_per`, `status`) VALUES
(1, 'aaa', 'asd', 0, 1, NULL),
(2, 'qqq', 'qqq', 0, 1, NULL),
(3, 'vvvv', 'vvvvv', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(20) DEFAULT NULL,
  `user_phone` int(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`, `branch_id`, `user_phone`, `address`) VALUES
(1, 'rehan', 'rehan', 'cse.nahid25@gmail.com', '$2y$10$kd7X9BHBEScaGOrUcAluleI2iuxC52LSrkQKMceaDzTYRUy6.huB2', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'admin', 'admin', 'cse.nahid25@gmail.com', '$2y$10$kd7X9BHBEScaGOrUcAluleI2iuxC52LSrkQKMceaDzTYRUy6.huB2', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'user', 'user', 'cse.nahid25@gmail.com', '$2y$10$kd7X9BHBEScaGOrUcAluleI2iuxC52LSrkQKMceaDzTYRUy6.huB2', 1, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'REHAN', 'REHANAKRAM', 'rehan', '$2y$10$qpBO8okme42BtlJhcbYksOur7bq7LwiRnPJCeXhC8M.vSwah2bhvK', 0, 1, NULL, NULL, NULL, 1, 1571145331, ''),
(11, 'sss', 'ds', 'rehan', '$2y$10$rjeRl5t0c8RglvM3zWql2uoLB17mt1ukWpnkxx4mx4Z.EwCwyQLeS', 0, 2, NULL, NULL, NULL, 1, 1571145331, 'alif nagr, purbo badda'),
(12, 'assd', 'AS', 'rehan', '$2y$10$v7aI3KEIqwHFAS21oGvaQeP1UQS2A/StZWVJg8Lxymx1u1ONCMOKm', 0, 2, NULL, '2022-08-02 18:00:00', NULL, 1, 1571145331, 'alif nagr, purbo badda');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_card`
--

CREATE TABLE `warranty_card` (
  `id` int(20) NOT NULL,
  `product_id` int(20) DEFAULT NULL,
  `product_serial` varchar(250) DEFAULT NULL,
  `card_no` varchar(250) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `card_end_date` date DEFAULT NULL,
  `dealer_id` int(20) DEFAULT NULL,
  `sales_office` varchar(200) DEFAULT NULL,
  `sales_person` varchar(200) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `customer_address` date DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `priority` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`slug`);

--
-- Indexes for table `stock_group`
--
ALTER TABLE `stock_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `warranty_card`
--
ALTER TABLE `warranty_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_group`
--
ALTER TABLE `stock_group`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warranty_card`
--
ALTER TABLE `warranty_card`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

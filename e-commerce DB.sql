-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 04:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `e-commerce`
--
CREATE DATABASE IF NOT EXISTS `e-commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-commerce`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `admin_img` mediumtext NOT NULL,
                         `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `admin_img`, `department`) VALUES
                                                                              (1, 'arafat', '123', '', 'ADMIN'),
                                                                              (3, 'ahmed', '123', '', 'ADMIN'),
                                                                              (14, 'Ahmed Arafat', '1234', 'Summer.jpg', 'JOKER'),
                                                                              (15, 'yousry', '123', '', 'HR'),
                                                                              (17, 'moafi', '123', '', 'LOG'),
                                                                              (23, 'aaa', '123', 'test 1.jpg', 'HR'),
                                                                              (24, 'zzz', '123', 'Screenshot (144).png', 'HR'),
                                                                              (25, 'Ahmed Mohamed Yousry', '123', 'Screenshot (2).png', 'LOG');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `password` varchar(30) NOT NULL,
                            `email` varchar(255) NOT NULL,
                            `address` varchar(255) NOT NULL,
                            `phone` int(11) NOT NULL,
                            `cust_img` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`, `email`, `address`, `phone`, `cust_img`) VALUES
                                                                                               (1, 'ahmed', '123', 'ahmed@gmail.com', 'haram', 1013769931, ''),
                                                                                               (12, 'Ahmed Arafat', '3', 'ipod5gcc306@gmail.com', 'giza', 1013769931, ''),
                                                                                               (14, 'aa', '123', 'ddd@gmail.cpok', 'Haram', 1013769931, ''),
                                                                                               (19, 'Ahmed Mohamed Yousry', '123', 'ipod5gcc306@gmail.com', 'Haram', 1013769931, 'Summer.jpg'),
                                                                                               (20, 'Arafat', '123', 'ahmedxarafat0101@gmail.com', 'Haram', 1013769931, 'photo_2020-11-09_22-42-39.jpg'),
                                                                                               (21, 'bbb', '123', 'ahmedxarafat0101@gmail.com', 'Haram', 1013769931, 'Screenshot (72).png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `id` int(11) NOT NULL,
                          `id_customer` int(11) NOT NULL,
                          `id_product` int(11) NOT NULL,
                          `no_of_items` int(25) NOT NULL,
                          `price` int(11) NOT NULL,
                          `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `id_product`, `no_of_items`, `price`, `description`) VALUES
                                                                                                    (8, 1, 1, 10, 100, 'i love 7up'),
                                                                                                    (9, 1, 1, 5, 50, 'i love 7up'),
                                                                                                    (10, 1, 1, 5, 50, 'i love 7up'),
                                                                                                    (12, 14, 4, 4, 48, 'i love 7up67'),
                                                                                                    (13, 14, 1, 4, 40, 'kkk'),
                                                                                                    (14, 14, 1, 4, 40, 'erewrw'),
                                                                                                    (15, 14, 1, 2, 20, 'kkk'),
                                                                                                    (16, 1, 1, 3, 30, 'Haram'),
                                                                                                    (17, 1, 5, 9, 45, 'LAYSLAYS'),
                                                                                                    (18, 19, 5, 12, 60, '453'),
                                                                                                    (19, 19, 1, 5, 50, 'rter'),
                                                                                                    (20, 19, 1, 6, 60, 'i love 7up'),
                                                                                                    (21, 19, 4, 3, 30, 'wewewq'),
                                                                                                    (22, 19, 1, 6, 60, 'i love 7up'),
                                                                                                    (23, 19, 5, 6, 30, 'i love 7up');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
                           `id` int(11) NOT NULL,
                           `name` varchar(255) NOT NULL,
                           `description` varchar(1000) NOT NULL,
                           `price` int(11) NOT NULL,
                           `id_admin` int(11) NOT NULL,
                           `id_section` int(11) NOT NULL,
                           `product_img` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `id_admin`, `id_section`, `product_img`) VALUES
                                                                                                          (1, '7up', 'Ya Lazez Ya Ray2', 10, 1, 1, '7up_pic.jpg'),
                                                                                                          (4, 'pepsi', 'Soft Drinks (Lot of Sugar)', 10, 1, 1, 'Pepsi_pic.jpg'),
                                                                                                          (5, 'Lays', 'Fried Potato', 5, 1, 1, 'Lays_pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
                           `id` int(11) NOT NULL,
                           `name` varchar(255) NOT NULL,
                           `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `id_admin`) VALUES
    (1, 'food & Drinks', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_admin`),
  ADD KEY `id_customer_2` (`id_admin`),
  ADD KEY `id_section` (`id_section`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
    ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
    ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

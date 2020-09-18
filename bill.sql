-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 10:25 AM
-- Server version: 5.7.15-log
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'General Items'),
(2, 'Cosmetics'),
(4, 'Perfumes'),
(6, 'Body Spray'),
(7, '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`) VALUES
(2, 'Cute Plus'),
(3, 'J & J'),
(4, 'Ponds'),
(5, 'Derma Clear'),
(7, 'Nivea'),
(8, 'Vaseline'),
(9, 'Garnier'),
(10, 'Dove'),
(12, 'Creme 21'),
(13, 'Jergens'),
(14, 'Olay'),
(15, 'Loreal'),
(16, 'Clean & Clear'),
(17, 'St.Ives'),
(18, 'Fragrance'),
(19, 'TRESemme'),
(20, 'Tony&Guy'),
(21, 'Gatsby'),
(22, 'Pantene'),
(23, 'Nova Gold'),
(24, 'Listerine'),
(25, 'Sensodyne'),
(26, 'Colgate'),
(27, 'Pepsodent'),
(28, 'Close up'),
(29, 'Rivaj'),
(30, 'Janssen Cosmetics'),
(31, 'VEET'),
(34, 'Nair'),
(36, 'Wokali'),
(37, 'Paris Collection'),
(39, 'Nature'),
(40, 'Junsui Naturals'),
(41, 'Reckitt Benckiser'),
(42, 'Life Boy'),
(44, 'Amrij'),
(45, 'China'),
(46, 'Vatika'),
(47, 'Fair & Lovely'),
(48, 'Sunsilk'),
(49, 'Enchanteur'),
(50, 'Yardley'),
(51, 'Head & Shoulder'),
(52, 'Medicam'),
(53, 'Oral B'),
(54, 'Care'),
(55, 'Charmina'),
(56, 'English'),
(58, 'GSK'),
(59, 'mothercare'),
(60, 'Meiji'),
(61, 'Morinaga'),
(62, 'Abbott'),
(63, 'Nestle'),
(64, 'Almarai'),
(65, 'Nutrafil'),
(67, 'Dupas'),
(68, 'Stillman\'s'),
(69, 'Father & Sons'),
(70, 'Uniferoz'),
(71, 'Qarshi');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `registeration_date` datetime NOT NULL,
  `admin_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `full_name`, `phone`, `site_name`, `site_url`, `login`, `password`, `email`, `image`, `logo`, `registeration_date`, `admin_type`) VALUES
(1, 'admin', '', '', '', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'wasifkhanali@gmail.com', 'mn-1-army_battleship_bombing_fighter_fires_fun_games_gangs_gun_hardware_joy_soldier_wars_games_3840x2400.jpg', '', '2019-12-07 01:15:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

CREATE TABLE `tbl_site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_phone` varchar(30) NOT NULL,
  `site_skype` varchar(30) NOT NULL,
  `site_address` varchar(100) NOT NULL,
  `site_copyrights` varchar(200) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_tagline` varchar(250) NOT NULL,
  `site_url` varchar(250) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `site_header_code` text NOT NULL,
  `site_footer_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `site_name`, `site_phone`, `site_skype`, `site_address`, `site_copyrights`, `site_logo`, `site_favicon`, `site_tagline`, `site_url`, `site_email`, `site_header_code`, `site_footer_code`) VALUES
(1, 'Luxor', '03000793385', 'wasifkhantareen', 'op. Girls Comprehensive School Gulgushat, Multan', '2019 all rights are reserved', 'unitedsoft_logo.png', 'fav-icon.png', 'Inventory Management System - Purchase, Sales, Stock, Billing Software', 'http://wwww.unitedsoft.net/', 'wasifkhanali@gmail.com', '																																																																												', '																																																																												');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `gender`, `password`, `status`, `role`) VALUES
(1, 'Shahzad', 'Khan', 'admin', 'admin@gmail.com', 'm', 'e10adc3949ba59abbe56e057f20f883e', '1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

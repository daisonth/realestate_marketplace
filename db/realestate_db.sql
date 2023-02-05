-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 06:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_listings_tbl`
--

CREATE TABLE `active_listings_tbl` (
  `listing_id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `property_size` varchar(30) NOT NULL,
  `property_address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `price_format` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `image_one` varchar(250) NOT NULL,
  `image_two` varchar(250) DEFAULT NULL,
  `image_three` varchar(250) DEFAULT NULL,
  `image_four` varchar(250) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `active_listings_tbl`
--

INSERT INTO `active_listings_tbl` (`listing_id`, `owner`, `title`, `discription`, `property_type`, `property_size`, `property_address`, `city`, `pin`, `price`, `price_format`, `fname`, `lname`, `email`, `phoneno`, `image_one`, `image_two`, `image_three`, `image_four`, `status`) VALUES
(1, 6, 'first listing', 'this is the first listing', 'appartment', '15', 'sample address', 'mumbai', '234234', '3 lakh', 'per cent', 'test', 'testl', 'test@test.test', '2342342342', 'uploads/6_image1.jpg', 'uploads/6_image5.jpg', 'uploads/6_image3.jpg', 'uploads/6_image4.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userid`, `firstname`, `lastname`, `password`, `email`, `phoneno`, `address`, `city`, `state`, `pincode`, `dp`) VALUES
(5, 'blah', 'balh', '123', 'asdf@ww.w', '123413213', 'asdf', 'asdf', 'asdf', 123123123, ''),
(6, 'James', 'Bond', '1234', 'test@test.test', '12341341234', 'House No 66', 'Cochi', 'Kerala', 987, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_listings_tbl`
--
ALTER TABLE `active_listings_tbl`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_listings_tbl`
--
ALTER TABLE `active_listings_tbl`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

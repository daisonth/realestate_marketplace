-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2023 at 03:40 AM
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
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `fname`, `lname`, `emailid`, `phoneno`, `password`) VALUES
(1, 'admin', 'master', 'admin@admin.admin', '1234567890', 'admin'),
(2, 'a', 'a', 'a@a.a', '123456123', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `property_tbl`
--

CREATE TABLE `property_tbl` (
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `size` varchar(30) NOT NULL,
  `size_format` varchar(50) NOT NULL DEFAULT 'sqft',
  `property_address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `denomination` varchar(50) NOT NULL DEFAULT 'lk',
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `image_one` varchar(250) DEFAULT NULL,
  `image_two` varchar(250) DEFAULT NULL,
  `image_three` varchar(250) DEFAULT NULL,
  `image_four` varchar(250) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_tbl`
--

INSERT INTO `property_tbl` (`property_id`, `owner_id`, `title`, `discription`, `property_type`, `size`, `size_format`, `property_address`, `city`, `pin`, `price`, `denomination`, `fname`, `lname`, `email`, `phoneno`, `image_one`, `image_two`, `image_three`, `image_four`, `status`, `date`) VALUES
(2, 6, 'flat in chennai for sale', 'The property has been developed by a society of ioc officers for their own residential purposes and two towers are developed and is occupied.There is only one apartment per floor in the second tower giving privacy and exclusive access. ', 'appartment', '3', 'Sqrft', 'Safal Park CHS Ltd, Plot No 3 & 12, Near Jhama Sweets,Sector No 25, Nerul', 'Navi Mumbai', '400706', '95', 'lk', 'James', 'Bond', 'test@test.test', '12341341234', 'uploads/6_Flat26.jpeg', 'uploads/6_Flat25.jpeg', 'uploads/6_Flat24.jpeg', 'uploads/6_Flat22.jpeg', 'active', '0000-00-00'),
(3, 6, '2 BHK Flat for sale in Guruvayoor', 'Looking for a good 2 BHK Apartment in Guruvayoor, Guruvayoor? This property is in one of Guruvayoors most popular locations. This is a no brokerage property. The property is on floor 4. Total number of floors is 8. Maintenance charges of this property is Rs 2000. This Apartment is available for Rs 54.0 L. This modern unit has a built-up area of 1280 Square feet. There are 2 bedrooms and 2 bathroom. It is very close to some of citys best hospitals, such as, Rajah Hospital, Tahani Hospital, and Sraddha Physiotherapy Clinic. Established schools, such as Sreekrishna High School, Little Flower Convent Girls Higher Secondary School, and GHSS Chavakkad are also close-by\r\n', 'flat', '2', 'bhk', 'Platinum Pancharatna, Guruvayoor, Guruvayoor Build Up Area-1280 sq.ftv', 'Guruvayoor', '345623', '35', 'lk', 'James', 'Bond', 'test@test.test', '12341341234', 'uploads/6_Flat13.jpeg', 'uploads/6_Flat12.jpeg', 'uploads/6_flate15.jpeg', 'uploads/6_Flat11.jpeg', 'active', '0000-00-00'),
(4, 6, '2 BHK Independent House for sale in Amalanagar, Thrissur', 'This property is located at Karore near Avanur. This is near to Thrissur Government Medical College(only 3 KMS). Also near to Kerala Health University ( only 2.5 KMS). Only 8 KMS to Amala Medical College.Only 5 KMS to Mundur centre. Good climate conditions with greenary and water availability is the key highlights of this place. Temples, Church, Shops are also near the house. Bus route is also there near the house.\r\n\r\nBedrooms-2\r\nBathrooms-2\r\nParking-1 Open Parking\r\nBalcony-1', 'house', '2', 'bhk', 'karore near avanur', 'Thrissur', '345567', '2', 'lk', 'James', 'Bond', 'test@test.test', '12341341234', 'uploads/6_House11.jpeg', 'uploads/6_House12.jpeg', 'uploads/6_House14.jpeg', 'uploads/6_House15.jpeg', 'active', '0000-00-00'),
(5, 5, 'Residential Plot for sale in Ottapalam, Palakkad', '2178 Square feet Plot for sale in Ottapalam, Palakkad. This land has a dimension of 47.0 mt length 47.0 mt width. This Plot is available at a price of Rs 20.0 L. The average price per sqft is Rs 918.0. Price. The width of the facing road is 246.0 mt. The brokerage amount to be paid is Rs 0.', 'plot', '2178 Square feet', 'sqft', 'Ottapalam', 'Palakkad', '23454', '23.0 L', 'lk', 'Donnie ', 'H. Funkhouser', 'DonnieHFunkhouser@dayrep.com', '2354-2342-322', 'uploads/5_plote1.jpeg', 'uploads/5_plote2.jpeg', 'uploads/5_plote3.jpeg', 'uploads/5_plote4.jpg', 'active', '0000-00-00'),
(6, 6, '3 BHK Flat for sale in Marine Drive', 'Check out this 3 BHK Apartment for sale in Marine Drive, Kochi. This 3 BHK Apartment is perfect for a modern-day lifestyle. Marine Drive is a promising location in Kochi and this is one of the finest properties in the area. Buy this Apartment for sale now. It is located on floor 24. The total number of floors in this project is 25. This property is a modern-day abode, with 2188 Square feet built-up area. The unit has 3 bedrooms and 3 bathroom. Educational institutions are closeby with schools such as St.Teresas Higher Secondary School, Asmi Convent, and St Theresas Convent High Schools nearby. Healthcare centres such as Medical Trust Hospital, Lisie Hospital, and General Hospital are also easily accessible\r\nOFFERS\r\n1. Free car parking\r\n2. Free furniture\r\n3. Free modular kitchen setup\r\n4. Free Chimeny', 'flat', '3', 'bhk', 'Marine Drive', 'Kochi', '23454', '2.65', 'cr', 'James', 'Bond', 'test@test.test', '12341341234', 'uploads/6_Flat45.jpeg', 'uploads/6_Flat42.jpeg', 'uploads/6_Flat43.jpeg', 'uploads/6_Flat41.jpeg', 'active', '2023-02-11');

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
  `pincode` varchar(15) NOT NULL,
  `dp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userid`, `firstname`, `lastname`, `password`, `email`, `phoneno`, `address`, `city`, `state`, `pincode`, `dp`) VALUES
(5, 'Donnie ', 'H. Funkhouser', '1234', 'DonnieHFunkhouser@dayrep.com', '2354-2342-322', '4287 Glenview Drive Corpus Christi,', 'Mysoor', 'Karnataka', '78401', ''),
(6, 'James', 'Bond', '1234', 'test@test.test', '12341341234', 'House No 69', 'Kochi', 'Kerala', '987 897', ''),
(7, 'Tara ', ' Davis', '1234', 'TaraCDavis@armyspy.com', '332520663', '2354 Turkey ', ' Pen Lane', 'Columbus', '683452', ''),
(8, 'Martin ', ' R. Stalnaker', '1234', 'MartinRStalnaker@rhyta.com', '8055529146', '496 Leisure Lane Moorpark, CA 93021', 'Leisure Lane', ' Moorpark', '93021', ''),
(9, 'Malik ', ' Nair ', '1234', 'hbhagat@hotmail.com', '03783695616', '44, Andheri, Thiruvananthapuram - 532147', ' Thiruvananthapuram', 'Kerala', '532147', ''),
(10, 'Mridula ', ' Gobin ', '1234', 'bpradhan@murty.com', '913691939170', '52, Richa Society, Avantika Nagar Agra - 101974', ' Richa Society', 'Jammu', '101974', ''),
(11, 'Binita ', ' Hari ', '1234', 'jayaraman.urmila@gmail.com', '02390499705', '36, Maya Apartments, Aarif Chowk Vishakhapattanam - 230366', ' Vishakhapattanam', 'Gujarat', '230366', ''),
(12, 'Madhavi', ' Gobin', '1234', 'bprabhu@yahoo.com', '91504 3530819', '87, EddieGunj, Hyderabad - 461949', 'Hyderabad ', 'Andra Pradesh', '461949', ''),
(13, 'Madhavi ', 'Gobin ', '1234', 'cbhavsar@khalsa.in', '+91 660 4389011', '99, Feroz Heights, NeerendraGarh Kolkata - 469552', 'Kolkata ', 'Kolkata ', '469552', ''),
(14, 'Rolex', 'K.j', '1234', 'rolexmass@gmail.com', '9897612530', 'kanja villa, 17 street, Vishakapatanna', 'Vishakapatanna', 'Tamil Nadu', '92451', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

CREATE TABLE `wishlist_tbl` (
  `wishlist_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`wishlist_id`, `property_id`, `user_id`) VALUES
(23, 4, 6),
(25, 3, 6),
(27, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `property_tbl`
--
ALTER TABLE `property_tbl`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_tbl`
--
ALTER TABLE `property_tbl`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

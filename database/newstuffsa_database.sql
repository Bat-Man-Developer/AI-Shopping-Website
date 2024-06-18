-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 11:06 AM
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
-- Database: `newstuffsa_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `fldadminid` int(11) NOT NULL,
  `fldadminname` varchar(100) NOT NULL,
  `fldadminemail` varchar(150) NOT NULL,
  `fldadminposition` varchar(250) NOT NULL,
  `fldadmindepartment` varchar(250) NOT NULL,
  `fldadminpassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`fldadminid`, `fldadminname`, `fldadminemail`, `fldadminposition`, `fldadmindepartment`, `fldadminpassword`) VALUES
(2, 'Unknown Guest', 'guest@gmail.com', 'Administrator', 'IT', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `customerbillingaddress`
--

CREATE TABLE `customerbillingaddress` (
  `fldbillingid` int(11) NOT NULL,
  `fldorderid` int(11) NOT NULL,
  `fldbillingfirstname` varchar(100) NOT NULL,
  `fldbillinglastname` varchar(100) NOT NULL,
  `fldbillingaddressline1` varchar(150) NOT NULL,
  `fldbillingaddressline2` varchar(150) NOT NULL,
  `fldbillingpostalcode` varchar(10) NOT NULL,
  `fldbillingcity` varchar(150) NOT NULL,
  `fldbillingcountry` varchar(150) NOT NULL,
  `fldbillingemail` varchar(150) NOT NULL,
  `fldbillingphonenumber` varchar(15) NOT NULL,
  `fldbillingidnumber` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerbillingaddress`
--

INSERT INTO `customerbillingaddress` (`fldbillingid`, `fldorderid`, `fldbillingfirstname`, `fldbillinglastname`, `fldbillingaddressline1`, `fldbillingaddressline2`, `fldbillingpostalcode`, `fldbillingcity`, `fldbillingcountry`, `fldbillingemail`, `fldbillingphonenumber`, `fldbillingidnumber`) VALUES
(97, 241, 'kay', 'mudau', '676 Delen Road', '', '1804', 'Kimberely', 'South_Africa', 'kkay.mudau007@gmail.com', '0875535478', '0003186643877'),
(98, 240, 'njabulo', 'moditambi', '56 Fallo Street', '', '1776', 'Durban', 'South_Africa', 'njabulo@gmail.com', '0780034567', '0005354467866');

-- --------------------------------------------------------

--
-- Table structure for table `customershippingaddress`
--

CREATE TABLE `customershippingaddress` (
  `fldshippingid` int(11) NOT NULL,
  `fldorderid` int(11) NOT NULL,
  `fldshippingfirstname` varchar(100) NOT NULL,
  `fldshippinglastname` varchar(100) NOT NULL,
  `fldshippingaddressline1` varchar(150) NOT NULL,
  `fldshippingaddressline2` varchar(150) NOT NULL,
  `fldshippingpostalcode` varchar(10) NOT NULL,
  `fldshippingcity` varchar(100) NOT NULL,
  `fldshippingcountry` varchar(100) NOT NULL,
  `fldshippingemail` varchar(150) NOT NULL,
  `fldshippingphonenumber` varchar(15) NOT NULL,
  `fldshippingdeliverycomment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customershippingaddress`
--

INSERT INTO `customershippingaddress` (`fldshippingid`, `fldorderid`, `fldshippingfirstname`, `fldshippinglastname`, `fldshippingaddressline1`, `fldshippingaddressline2`, `fldshippingpostalcode`, `fldshippingcity`, `fldshippingcountry`, `fldshippingemail`, `fldshippingphonenumber`, `fldshippingdeliverycomment`) VALUES
(244, 239, 'njabulo', 'moditambi', '56 Fallo Street', '', '1776', 'Durban', 'South_Africa', 'njabulo@gmail.com', '0780034567', ''),
(245, 240, 'njabulo', 'moditambi', '56 Fallo Street', '', '1776', 'Durban', 'South_Africa', 'njabulo@gmail.com', '0780034567', ''),
(246, 241, 'kay', 'mudau', '676 Delen Road', '', '1804', 'Kimberely', 'South_Africa', 'kkay.mudau007@gmail.com', '0875535478', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `fldorderitemid` int(11) NOT NULL,
  `fldorderid` int(11) NOT NULL,
  `fldproductid` int(11) NOT NULL,
  `fldproductname` varchar(255) NOT NULL,
  `fldproductimage` varchar(255) NOT NULL,
  `fldproductdiscount` int(2) NOT NULL,
  `fldproductprice` decimal(11,2) NOT NULL,
  `fldproductquantity` int(11) NOT NULL,
  `fldshippingid` int(11) NOT NULL,
  `fldbillingidnumber` varchar(13) NOT NULL,
  `fldorderdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`fldorderitemid`, `fldorderid`, `fldproductid`, `fldproductname`, `fldproductimage`, `fldproductdiscount`, `fldproductprice`, `fldproductquantity`, `fldshippingid`, `fldbillingidnumber`, `fldorderdate`) VALUES
(332, 239, 156, 'FURNITURE Parker Mid Back Chair Black', 'FURNITURE Parker Mid Back Chair Black.png', 0, 1999.00, 1, 244, '0005354467866', '2024-03-24 12:16:10'),
(333, 240, 156, 'FURNITURE Parker Mid Back Chair Black', 'FURNITURE Parker Mid Back Chair Black.png', 0, 1999.00, 1, 245, '0005354467866', '2024-03-24 12:16:11'),
(334, 241, 156, 'FURNITURE Parker Mid Back Chair Black', 'FURNITURE Parker Mid Back Chair Black.png', 0, 1999.00, 1, 246, '0003186643877', '2024-03-28 15:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `fldorderid` int(11) NOT NULL,
  `fldordercost` decimal(11,2) NOT NULL,
  `fldcouriercost` decimal(11,2) NOT NULL,
  `fldproductdiscount` int(2) NOT NULL,
  `fldorderstatus` varchar(100) NOT NULL,
  `flduserid` int(11) NOT NULL,
  `fldshippingid` int(11) NOT NULL,
  `fldbillingidnumber` varchar(13) NOT NULL,
  `fldbillingphonenumber` varchar(15) NOT NULL,
  `fldshippingphonenumber` varchar(10) NOT NULL,
  `fldshippingcity` varchar(255) NOT NULL,
  `fldshippingcountry` varchar(100) NOT NULL,
  `fldshippingaddressline1` varchar(255) NOT NULL,
  `fldshippingaddressline2` varchar(150) NOT NULL,
  `fldorderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `fldshippingdeliverycomment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`fldorderid`, `fldordercost`, `fldcouriercost`, `fldproductdiscount`, `fldorderstatus`, `flduserid`, `fldshippingid`, `fldbillingidnumber`, `fldbillingphonenumber`, `fldshippingphonenumber`, `fldshippingcity`, `fldshippingcountry`, `fldshippingaddressline1`, `fldshippingaddressline2`, `fldorderdate`, `fldshippingdeliverycomment`) VALUES
(239, 2179.00, 180.00, 0, 'Not Paid', 98, 244, '0005354467866', '0780034567', '0780034567', 'Durban', 'South_Africa', '56 Fallo Street', '', '2024-03-24 12:16:10', ''),
(240, 2179.00, 180.00, 0, 'Shipped', 98, 245, '0005354467866', '', '', 'Durban', 'South_Africa', '56 Fallo Street', '', '2024-03-24 12:16:11', ''),
(241, 2099.00, 100.00, 0, 'Not Paid', 97, 246, '0003186643877', '0875535478', '0875535478', 'Kimberely', 'South_Africa', '676 Delen Road', '', '2024-03-28 15:48:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `fldpaymentid` int(11) NOT NULL,
  `fldorderid` int(11) NOT NULL,
  `flduserid` int(11) NOT NULL,
  `fldtransactionid` varchar(250) NOT NULL,
  `fldpaymentdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`fldpaymentid`, `fldorderid`, `flduserid`, `fldtransactionid`, `fldpaymentdate`) VALUES
(122, 240, 98, '0', '2024-03-24 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `fldproductreviewid` int(11) NOT NULL,
  `fldproductid` int(11) NOT NULL,
  `flduserid` int(11) NOT NULL,
  `flduserfirstname` varchar(100) NOT NULL,
  `flduserlastname` varchar(100) NOT NULL,
  `fldusercountry` varchar(100) NOT NULL,
  `fldproductreviewcomment` text NOT NULL,
  `fldproductreviewdate` datetime NOT NULL DEFAULT current_timestamp(),
  `fldproductreviewrating` varchar(100) NOT NULL,
  `flduseremail` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `fldproductid` int(11) NOT NULL,
  `fldproductname` varchar(100) NOT NULL,
  `fldproductdepartment` varchar(100) NOT NULL,
  `fldproductcategory` varchar(100) NOT NULL,
  `fldproducttype` varchar(100) NOT NULL,
  `fldproductcolor` varchar(100) NOT NULL,
  `fldproductgender` varchar(100) NOT NULL,
  `fldproductsize` varchar(100) NOT NULL,
  `fldproductstock` varchar(11) NOT NULL,
  `fldproductdescription` varchar(255) NOT NULL,
  `fldproductimage` varchar(255) NOT NULL,
  `fldproductimage1` varchar(255) NOT NULL,
  `fldproductimage2` varchar(255) NOT NULL,
  `fldproductimage3` varchar(255) NOT NULL,
  `fldproductimage4` varchar(255) NOT NULL,
  `fldproductimage5` varchar(255) NOT NULL,
  `fldproductimage6` varchar(255) NOT NULL,
  `fldproductprice` decimal(11,2) NOT NULL,
  `fldproductdiscount` int(2) NOT NULL,
  `fldproductdiscountcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`fldproductid`, `fldproductname`, `fldproductdepartment`, `fldproductcategory`, `fldproducttype`, `fldproductcolor`, `fldproductgender`, `fldproductsize`, `fldproductstock`, `fldproductdescription`, `fldproductimage`, `fldproductimage1`, `fldproductimage2`, `fldproductimage3`, `fldproductimage4`, `fldproductimage5`, `fldproductimage6`, `fldproductprice`, `fldproductdiscount`, `fldproductdiscountcode`) VALUES
(145, 'Apple iPhone 15 Pro Max 1TB Black Titanium', 'Electronics & Devices', 'Mobile', 'IPhone', 'Black', 'none', 'none', '5', 'Smartphone · Dual SIM · 5G · Wireless Charging · With Fast Charging · iOS · Facial Recognition · With OLED Display · Black Titanium · Water Resistan', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0db7.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbc 1.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbd 2.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbe 3.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbf 4.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dc0 5.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dc1 6.png', 42000.00, 5, ''),
(154, 'MacBook Air 13-inch', 'Electronics', '', 'Electronics', '', '', '', '4', 'Very Fast', 'MacBook Air 13-inch.png', 'MacBook Air 13-inch top.png', 'MacBook Air 13-inch right.png', 'MacBook Air 13-inch left.png', 'MacBook Air 13-inch bottom.png', 'MacBook Air 13-inch back.png', 'MacBook Air 13-inch side.png', 9999.99, 5, ''),
(156, 'FURNITURE Parker Mid Back Chair Black', 'Home & Appliances', '', 'Home', '', '', '', '5', 'PU/PVC combination Gas lift height adjustable Swivel and tilt mechanism Nylon base Maximum weight 120kg Assembly required Black 12 month guarantee', 'FURNITURE Parker Mid Back Chair Black.png', 'FURNITURE Parker Mid Back Chair Black 1.png', 'FURNITURE Parker Mid Back Chair Black 2.png', 'FURNITURE Parker Mid Back Chair Black 3.png', 'FURNITURE Parker Mid Back Chair Black 4.png', 'FURNITURE Parker Mid Back Chair Black 5.png', 'FURNITURE Parker Mid Back Chair Black 6.png', 1999.00, 2, ''),
(157, 'Nike Shirt', 'Clothing, Shoes & Accessories', 'Clothing', 'T-Shirt', 'Black', 'Male', 'Male', '6', 'Original Shirt', 'Nike Shirt.png', 'Nike Shirt 1.png', 'Nike Shirt 2.png', 'Nike Shirt 3.png', 'Nike Shirt 4.png', 'Nike Shirt 5.png', 'Nike Shirt 6.png', 516.00, 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `fldtestimonialsid` int(11) NOT NULL,
  `fldtestimonialsfirstname` varchar(100) NOT NULL,
  `fldtestimonialslastname` varchar(100) NOT NULL,
  `fldtestimonialsemail` varchar(150) NOT NULL,
  `fldtestimonialspassword` varchar(150) NOT NULL,
  `fldtestimonialscomment` text NOT NULL,
  `fldtestimonialsimage` varchar(255) NOT NULL,
  `fldtestimonialsdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `flduserid` int(11) NOT NULL,
  `flduserimage` varchar(255) NOT NULL,
  `flduserfirstname` varchar(100) NOT NULL,
  `flduserlastname` varchar(100) NOT NULL,
  `flduseraddressline1` varchar(150) NOT NULL,
  `flduseraddressline2` varchar(150) NOT NULL,
  `flduserpostalcode` varchar(10) NOT NULL,
  `fldusercity` varchar(150) NOT NULL,
  `fldusercountry` varchar(150) NOT NULL,
  `flduseremail` varchar(150) NOT NULL,
  `flduserphonenumber` varchar(15) NOT NULL,
  `flduseridnumber` varchar(13) NOT NULL,
  `flduserpassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`flduserid`, `flduserimage`, `flduserfirstname`, `flduserlastname`, `flduseraddressline1`, `flduseraddressline2`, `flduserpostalcode`, `fldusercity`, `fldusercountry`, `flduseremail`, `flduserphonenumber`, `flduseridnumber`, `flduserpassword`) VALUES
(97, 'unknownimage.png', 'kay', 'mudau', '676 Delen Road', '', '1804', 'Kimberely', 'South_Africa', 'kkay.mudau007@gmail.com', '0875535478', '0003186643877', '550e1bafe077ff0b0b67f4e32f29d751'),
(98, 'unknownimage.png', 'njabulo', 'moditambi', '56 Fallo Street', '', '1776', 'Durban', 'South_Africa', 'njabulo@gmail.com', '0780034567', '0005354467866', '550e1bafe077ff0b0b67f4e32f29d751');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`fldadminid`);

--
-- Indexes for table `customerbillingaddress`
--
ALTER TABLE `customerbillingaddress`
  ADD PRIMARY KEY (`fldbillingid`,`fldbillingidnumber`);

--
-- Indexes for table `customershippingaddress`
--
ALTER TABLE `customershippingaddress`
  ADD PRIMARY KEY (`fldshippingid`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`fldorderitemid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`fldorderid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`fldpaymentid`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`fldproductreviewid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`fldproductid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`fldtestimonialsid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`flduserid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `fldadminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerbillingaddress`
--
ALTER TABLE `customerbillingaddress`
  MODIFY `fldbillingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `customershippingaddress`
--
ALTER TABLE `customershippingaddress`
  MODIFY `fldshippingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `fldorderitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `fldorderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `fldpaymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `fldproductreviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `fldproductid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `fldtestimonialsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `flduserid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

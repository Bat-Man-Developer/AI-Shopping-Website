-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 12:08 AM
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
(2, 'Batman', 'kkay.mudau008@gmail.com', 'Administrator', 'Boss', '12345678');

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
(103, 264, 'Freddy', 'Maguwani', '12 Mokapi Street, Gabora', '', '5568', 'Nelspruit', 'South_Africa', 'freddy@gmail.com', '0765585348', '0005443267789'),
(104, 263, 'drake', 'ovo', '566 Park Lane, Crisona', '', '2332', 'California', 'USA', 'drake@gmail.com', '554327634256', '8534864478587');

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
(270, 262, 'drake', 'ovo', '566 Park Lane, Crisona', '', '2332', 'California', 'USA', 'drake@gmail.com', '554327634256', ''),
(271, 263, 'drake', 'ovo', '566 Park Lane, Crisona', '', '2332', 'California', 'USA', 'drake@gmail.com', '554327634256', ''),
(272, 264, 'Freddy', 'Maguwani', '12 Mokapi Street, Gabora', '', '5568', 'Nelspruit', 'South_Africa', 'freddy@gmail.com', '0765585348', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `fldorderitemid` int(11) NOT NULL,
  `fldorderid` int(11) NOT NULL,
  `fldproductid` int(11) NOT NULL,
  `fldproductsellersid` int(11) NOT NULL,
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

INSERT INTO `orderitems` (`fldorderitemid`, `fldorderid`, `fldproductid`, `fldproductsellersid`, `fldproductname`, `fldproductimage`, `fldproductdiscount`, `fldproductprice`, `fldproductquantity`, `fldshippingid`, `fldbillingidnumber`, `fldorderdate`) VALUES
(366, 262, 159, 4, 'Absolute Vodka', 'Absolute Vodka.jpeg', 0, 399.00, 1, 270, '8534864478587', '2024-05-06 22:13:16'),
(367, 262, 164, 2, 'Air Jordans', 'Air Jordans.png', 0, 2199.00, 1, 270, '8534864478587', '2024-05-06 22:13:16'),
(368, 262, 157, 3, 'Nike Shirt', 'Nike Shirt.png', 0, 516.00, 1, 270, '8534864478587', '2024-05-06 22:13:16'),
(369, 262, 156, 3, 'FURNITURE Parker Mid Back Chair Black', 'FURNITURE Parker Mid Back Chair Black.png', 0, 1999.00, 1, 270, '8534864478587', '2024-05-06 22:13:16'),
(370, 263, 159, 4, 'Absolute Vodka', 'Absolute Vodka.jpeg', 0, 399.00, 1, 271, '8534864478587', '2024-05-06 22:16:30'),
(371, 263, 164, 2, 'Air Jordans', 'Air Jordans.png', 0, 2199.00, 1, 271, '8534864478587', '2024-05-06 22:16:30'),
(372, 263, 157, 3, 'Nike Shirt', 'Nike Shirt.png', 0, 516.00, 1, 271, '8534864478587', '2024-05-06 22:16:30'),
(373, 263, 156, 3, 'FURNITURE Parker Mid Back Chair Black', 'FURNITURE Parker Mid Back Chair Black.png', 0, 1999.00, 1, 271, '8534864478587', '2024-05-06 22:16:30'),
(374, 263, 145, 1, 'Apple iPhone 15 Pro Max 1TB Black Titanium', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0db7.png', 0, 38000.00, 1, 271, '8534864478587', '2024-05-06 22:16:30'),
(375, 264, 157, 3, 'Nike Shirt', 'Nike Shirt.png', 0, 516.00, 1, 272, '0005443267789', '2024-05-06 23:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `fldorderid` int(11) NOT NULL,
  `fldproductsellersid` varchar(2000) NOT NULL,
  `fldordercost` decimal(11,2) NOT NULL,
  `fldcouriercost` decimal(11,2) NOT NULL,
  `fldproductdiscountcode` varchar(50) NOT NULL,
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

INSERT INTO `orders` (`fldorderid`, `fldproductsellersid`, `fldordercost`, `fldcouriercost`, `fldproductdiscountcode`, `fldorderstatus`, `flduserid`, `fldshippingid`, `fldbillingidnumber`, `fldbillingphonenumber`, `fldshippingphonenumber`, `fldshippingcity`, `fldshippingcountry`, `fldshippingaddressline1`, `fldshippingaddressline2`, `fldorderdate`, `fldshippingdeliverycomment`) VALUES
(262, '0,4,2,3,3', 5293.00, 180.00, '', 'Not Paid', 104, 270, '8534864478587', '554327634256', '5543276342', 'California', 'USA', '566 Park Lane, Crisona', '', '2024-05-06 22:13:16', ''),
(263, '0,1,2,3,3,4', 43213.00, 100.00, '', 'Delivered', 104, 271, '8534864478587', '554327634256', '', 'California', 'USA', '566 Park Lane, Crisona', '', '2024-05-06 22:16:30', ''),
(264, '0,3', 616.00, 100.00, '', 'Paid', 103, 272, '0005443267789', '0765585348', '0765585348', 'Nelspruit', 'South_Africa', '12 Mokapi Street, Gabora', '', '2024-05-06 23:57:55', '');

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
(126, 264, 103, '1', '2024-05-06 23:58:29');

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
  `fldproductsellersid` int(11) NOT NULL,
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
  `fldproductdiscountcode` varchar(50) NOT NULL,
  `fldproductlength` varchar(10) NOT NULL,
  `fldproductwidth` varchar(10) NOT NULL,
  `fldproductheight` varchar(10) NOT NULL,
  `fldproductweight` varchar(10) NOT NULL,
  `fldproductfragile` varchar(10) NOT NULL,
  `fldproductspecialhandlingreq` varchar(1000) NOT NULL,
  `fldproductinsurancereq` varchar(2000) NOT NULL,
  `fldproductaddressline1` varchar(150) NOT NULL,
  `fldproductaddressline2` varchar(150) NOT NULL,
  `fldproductpostalcode` varchar(10) NOT NULL,
  `fldproductcity` varchar(150) NOT NULL,
  `fldproductcountry` varchar(150) NOT NULL,
  `fldproductowner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`fldproductid`, `fldproductsellersid`, `fldproductname`, `fldproductdepartment`, `fldproductcategory`, `fldproducttype`, `fldproductcolor`, `fldproductgender`, `fldproductsize`, `fldproductstock`, `fldproductdescription`, `fldproductimage`, `fldproductimage1`, `fldproductimage2`, `fldproductimage3`, `fldproductimage4`, `fldproductimage5`, `fldproductimage6`, `fldproductprice`, `fldproductdiscount`, `fldproductdiscountcode`, `fldproductlength`, `fldproductwidth`, `fldproductheight`, `fldproductweight`, `fldproductfragile`, `fldproductspecialhandlingreq`, `fldproductinsurancereq`, `fldproductaddressline1`, `fldproductaddressline2`, `fldproductpostalcode`, `fldproductcity`, `fldproductcountry`, `fldproductowner`) VALUES
(145, 1, 'Apple iPhone 15 Pro Max 1TB Black Titanium', 'Electronics & Devices', 'Mobile', 'IPhone', 'Black', '', '', '12', 'Smartphone · Dual SIM · 5G · Wireless Charging · With Fast Charging · iOS · Facial Recognition · With OLED Display · Black Titanium · Water Resistan', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0db7.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbc 1.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbd 2.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbe 3.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dbf 4.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dc0 5.png', 'Apple iPhone 15 Pro Max 1TB Black Titanium66169da6f0dc1 6.png', 38000.00, 5, '', '0', '4', '11', '0.25', 'Yes', '', '', '65 Wisani Street, Shoshanguve', '', '1645', 'Pretoria', 'South_Africa', 'Kay Mudau'),
(154, 2, 'Mac Book Pro II', 'Electronics & Devices', 'Laptop', 'Mac', 'Silver', '', '', '5', 'Very Good', 'MacBook Air 13-inch.png', 'MacBook Air 13-inch top.png', 'MacBook Air 13-inch right.png', 'MacBook Air 13-inch left.png', 'MacBook Air 13-inch bottom.png', 'MacBook Air 13-inch back.png', 'MacBook Air 13-inch side.png', 51000.00, 13, 'Awesome33', '50', '30', '19', '1.25', 'Yes', '', '', '65 Wisani Street, Shoshanguve', '', '1645', 'Pretoria', 'South_Africa', 'Kay Mudau'),
(156, 3, 'FURNITURE Parker Mid Back Chair Black', 'Home & Furniture', 'Office Chair', 'Chair', '', '', '', '7', 'PU/PVC combination Gas lift height adjustable Swivel and tilt mechanism Nylon base Maximum weight 120kg Assembly required Black 12 month guarantee', 'FURNITURE Parker Mid Back Chair Black.png', 'FURNITURE Parker Mid Back Chair Black 1.png', 'FURNITURE Parker Mid Back Chair Black 2.png', 'FURNITURE Parker Mid Back Chair Black 3.png', 'FURNITURE Parker Mid Back Chair Black 4.png', 'FURNITURE Parker Mid Back Chair Black 5.png', 'FURNITURE Parker Mid Back Chair Black 6.png', 1999.00, 0, '', '0', '0', '0', '0', 'No', '', '', '65 Wisani Street, Shoshanguve', '', '1645', 'Pretoria', 'South_Africa', 'Kay Mudau'),
(157, 3, 'Nike Shirt', 'Clothing, Shoes & Accessories', 'Shirts', 'T-Shirt', 'Black', 'Male', '', '12', 'Original Shirt', 'Nike Shirt.png', 'Nike Shirt 1.png', 'Nike Shirt 2.png', 'Nike Shirt 3.png', 'Nike Shirt 4.png', 'Nike Shirt 5.png', 'Nike Shirt 6.png', 516.00, 2, '', '0', '0', '0', '0', 'No', '', '', '65 Wisani Street, Shoshanguve', '', '1645', 'Pretoria', 'South_Africa', 'Kay Mudau'),
(159, 4, 'Absolute Vodka', 'Liquor', 'Vodka', '', '', '', '', '18', '43% Alcohol. Not for sale to persons under the age of 18.', 'Absolute Vodka.jpeg', 'Absolute Vodka 1.jpeg', 'Absolute Vodka 2.jpeg', 'Absolute Vodka 3.jpeg', 'Absolute Vodka 4.jpeg', 'Absolute Vodka 5.jpeg', 'Absolute Vodka 6.jpeg', 399.00, 6, 'Friday66', '18', '5', '18', '1.1', 'Yes', '', '', '56 Wisani Street, Soshanguve', '', '1756', 'Pretoria', 'South_Africa', 'Kay Mudau'),
(164, 2, 'Air Jordans', 'Clothing, Shoes & Accessories', 'Shoes', 'High Top Sneakers', 'Red & Black', 'Unisex', 'Medium', '8', 'Very Comfortable', 'Air Jordans.png', 'Air Jordans 1.png', 'Air Jordans 2.png', 'Air Jordans 3.png', 'Air Jordans 4.png', 'Air Jordans 5.png', 'Air Jordans 6.png', 2199.00, 5, 'nuuuTT78', '0', '0', '0', '0', 'No', '', '', '45 Birbeck Street, New Park', '', '8301', 'Kimberley', 'South_Africa', 'Amanda Sandla');

-- --------------------------------------------------------

--
-- Table structure for table `productsellers`
--

CREATE TABLE `productsellers` (
  `fldproductsellersid` int(11) NOT NULL,
  `fldproductsellersimage` varchar(150) NOT NULL,
  `fldproductsellersfirstname` varchar(100) NOT NULL,
  `fldproductsellerslastname` varchar(100) NOT NULL,
  `fldproductsellersaddressline1` varchar(150) NOT NULL,
  `fldproductsellersaddressline2` varchar(150) NOT NULL,
  `fldproductsellerspostalcode` varchar(4) NOT NULL,
  `fldproductsellerscity` varchar(150) NOT NULL,
  `fldproductsellerscountry` varchar(150) NOT NULL,
  `fldproductsellersemail` varchar(150) NOT NULL,
  `fldproductsellersphonenumber` varchar(11) NOT NULL,
  `fldproductsellersidnumber` varchar(13) NOT NULL,
  `fldproductsellerspassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productsellers`
--

INSERT INTO `productsellers` (`fldproductsellersid`, `fldproductsellersimage`, `fldproductsellersfirstname`, `fldproductsellerslastname`, `fldproductsellersaddressline1`, `fldproductsellersaddressline2`, `fldproductsellerspostalcode`, `fldproductsellerscity`, `fldproductsellerscountry`, `fldproductsellersemail`, `fldproductsellersphonenumber`, `fldproductsellersidnumber`, `fldproductsellerspassword`) VALUES
(1, 'unknownimage.png', 'Kay', 'Mudau', '4708 Mhunti Street, Tshiawelo', '', '1818', 'Johannesburg', 'South_Africa', 'kkay.mudau008@gmail.com', '0780051495', '01182512800', '25d55ad283aa400af464c76d713c07ad'),
(2, 'unknownimage.png', 'Amanda', 'Sandla', '78 Willow Street, New Park', '', '8301', 'Kimberley', 'South_Africa', 'amanda@gmail.com', '0812987736', '0003182367899', '25d55ad283aa400af464c76d713c07ad'),
(3, 'unknownimage.png', 'Njabulo', 'Moditambi', '67 Wisani Street, Tshiawelo', '', '1892', 'Johannesburg', 'South_Africa', 'njabulo@gmail.com', '0756695434', '0006436514688', '25d55ad283aa400af464c76d713c07ad'),
(4, 'unknownimage.png', 'Awanda', 'Gumbi', '45 Birbeck Street, New Park', '', '6589', 'Kimberley', 'South_Africa', 'awanda@gmail.com', '0785549870', '0006537769877', '25d55ad283aa400af464c76d713c07ad'),
(5, 'unknownimage.png', 'Mazuwo', 'Mudau', '21 Truter Street, Luis Trichardt', '', '3301', 'Thohoyandou', 'South_Africa', 'mazuwo@gmail.com', '0853452278', '0807186612966', '25f9e794323b453885f5181f1b624d0b'),
(6, 'unknownimage.png', 'Londo Junior', 'Mudau', '32 Long Street, Pinetown', '', '4436', 'Durban', 'South_Africa', 'junior@gmail.com', '0764453899', '1011173345977', '25d55ad283aa400af464c76d713c07ad');

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

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`fldtestimonialsid`, `fldtestimonialsfirstname`, `fldtestimonialslastname`, `fldtestimonialsemail`, `fldtestimonialspassword`, `fldtestimonialscomment`, `fldtestimonialsimage`, `fldtestimonialsdate`) VALUES
(45, 'Freddy', 'Maguwani', 'freddy@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 'unknownimage.png', '2024-05-06 13:04:53'),
(46, 'drake', 'ovo', 'drake@gmail.com', '', '', 'unknownimage.png', '2024-05-06 21:19:17');

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
(103, 'unknownimage.png', 'Freddy', 'Maguwani', '12 Mokapi Street, Gabora', '', '5568', 'Nelspruit', 'South_Africa', 'freddy@gmail.com', '0765585348', '0005443267789', '550e1bafe077ff0b0b67f4e32f29d751'),
(104, 'unknownimage.png', 'drake', 'ovo', '566 Park Lane, Crisona', '', '2332', 'California', 'USA', 'drake@gmail.com', '554327634256', '8534864478587', '550e1bafe077ff0b0b67f4e32f29d751');

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
  ADD PRIMARY KEY (`fldbillingid`,`fldbillingidnumber`),
  ADD UNIQUE KEY `fldorderid` (`fldorderid`),
  ADD UNIQUE KEY `fldbillingidnumber` (`fldbillingidnumber`),
  ADD UNIQUE KEY `fldbillingidnumber_2` (`fldbillingidnumber`);

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
-- Indexes for table `productsellers`
--
ALTER TABLE `productsellers`
  ADD PRIMARY KEY (`fldproductsellersid`);

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
  MODIFY `fldbillingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `customershippingaddress`
--
ALTER TABLE `customershippingaddress`
  MODIFY `fldshippingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `fldorderitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `fldorderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `fldpaymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `fldproductreviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `fldproductid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `productsellers`
--
ALTER TABLE `productsellers`
  MODIFY `fldproductsellersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `fldtestimonialsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `flduserid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerbillingaddress`
--
ALTER TABLE `customerbillingaddress`
  ADD CONSTRAINT `customerbillingaddress_ibfk_1` FOREIGN KEY (`fldbillingid`) REFERENCES `users` (`flduserid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

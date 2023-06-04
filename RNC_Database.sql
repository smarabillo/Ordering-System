-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 11:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_system`
--
CREATE DATABASE IF NOT EXISTS `tb_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_Orders`
--

DROP TABLE IF EXISTS `tb_Orders`;
CREATE TABLE `tb_Orders` (
  `OrderId` int(20) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `CustomerName` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_Orders`
--

INSERT INTO `tb_Orders` (`OrderId`, `ProductId`, `OrderDate`, `CustomerName`, `Quantity`) VALUES
(401, 103, '2023-03-11', 'John', 1),
(402, 103, '2023-03-11', 'Chud', 2),
(403, 101, '2023-03-11', 'Bon', 1),
(404, 105, '2023-03-11', 'Kremlin', 3),
(405, 104, '2023-03-11', 'Jian', 1),
(415, 105, '2023-06-04', 'Shem', 2),
(417, 101, '2023-06-04', 'John', 4),
(418, 107, '2023-06-04', 'S', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_Payments`
--

DROP TABLE IF EXISTS `tb_Payments`;
CREATE TABLE `tb_Payments` (
  `PaymentId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_Products`
--

DROP TABLE IF EXISTS `tb_Products`;
CREATE TABLE `tb_Products` (
  `ProductId` int(5) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_Products`
--

INSERT INTO `tb_Products` (`ProductId`, `ProductName`, `ProductDesc`, `ProductPrice`) VALUES
(101, 'Spare Ribs Meal', 'Spare Ribs w/rice and drinks', 100),
(102, 'Sisig Meal', 'Sisig w/rice and drinks', 105),
(103, 'Burger Steak Meal', 'Burgersteak w/rice and drinks', 95),
(104, 'Baconsilog', 'Baconsilog w/rice and drinks', 80),
(105, 'Tapsilog', 'Tapsilog w/rice And drinks', 105),
(106, 'Tocilog', 'Tocilog w/rice And Drinks\r\n', 105),
(107, 'Chorizolog', 'Chorizolog W/rice And Drinks', 105);

-- --------------------------------------------------------

--
-- Table structure for table `tb_User`
--

DROP TABLE IF EXISTS `tb_User`;
CREATE TABLE `tb_User` (
  `UserId` int(10) NOT NULL,
  `UserPass` varchar(40) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `UserAddress` varchar(50) NOT NULL,
  `ContactNum` varchar(11) NOT NULL,
  `UserAccess` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_User`
--

INSERT INTO `tb_User` (`UserId`, `UserPass`, `FullName`, `UserAddress`, `ContactNum`, `UserAccess`) VALUES
(2121, '202cb962ac59075b964b07152d234b70', 'Luke Skywalker', 'San Carlos City', '0947135161', 'Admin'),
(2122, 'd41d8cd98f00b204e9800998ecf8427e', 'Anakin Skywalker', 'San Carlos City', '0932351664 ', 'Employee'),
(2123, '202cb962ac59075b964b07152d234b70', 'Jin Kazama', 'Silay City', '0931473786 ', 'Employee'),
(2124, '202cb962ac59075b964b07152d234b70', 'Lebron James', 'Bacolod City', '0929860321', 'Employee'),
(2150, '202cb962ac59075b964b07152d234b70', 'Kacey Musgraves', 'Silay City', '0978814726', 'Employee'),
(2152, 'f7302e22d7656beb3b27af5cceaf6a2a', 'Dummy', 'San Carlos City', '0947135161', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_Orders`
--
ALTER TABLE `tb_Orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `KEY` (`ProductId`) USING BTREE;

--
-- Indexes for table `tb_Payments`
--
ALTER TABLE `tb_Payments`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `tb_Products`
--
ALTER TABLE `tb_Products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `tb_User`
--
ALTER TABLE `tb_User`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_Orders`
--
ALTER TABLE `tb_Orders`
  MODIFY `OrderId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `tb_Payments`
--
ALTER TABLE `tb_Payments`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_Products`
--
ALTER TABLE `tb_Products`
  MODIFY `ProductId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_User`
--
ALTER TABLE `tb_User`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_Orders`
--
ALTER TABLE `tb_Orders`
  ADD CONSTRAINT `test` FOREIGN KEY (`ProductId`) REFERENCES `tb_Products` (`ProductId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

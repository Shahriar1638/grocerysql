-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 08:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerydbtwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `email`, `salary`) VALUES
('ADM001', 'admin@example.com', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `productId` int(11) NOT NULL,
  `customeremail` varchar(60) NOT NULL,
  `productname` varchar(60) NOT NULL,
  `productamount` decimal(7,2) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`productId`, `customeremail`, `productname`, `productamount`, `price`) VALUES
(1, 'cus4@abc.com', 'Fresh Tomato', 3.00, 2.99),
(1, 'jane@example.com', 'Fresh Tomato', 2.00, 2.99),
(1, 'john@example.com', 'Fresh Tomato', 9.50, 2.99),
(2, 'cus4@abc.com', 'Crispy Lettuce', 2.50, 1.49),
(2, 'duck@duck.com', 'Crispy Lettuce', 0.50, 1.49),
(2, 'jane@example.com', 'Crispy Lettuce', 1.00, 1.49),
(2, 'john@example.com', 'Crispy Lettuce', 1.50, 1.49),
(3, 'duck@duck.com', 'Organic Potato', 5.00, 3.49),
(3, 'jane@example.com', 'Organic Potato', 0.50, 3.49),
(3, 'john@example.com', 'Organic Potato', 1.00, 3.49),
(3, 'seller4@abc.com', 'Organic Potato', 1.00, 3.49),
(13, 'john@example.com', 'Juicy Apple', 1.00, 1.99),
(14, 'jane@example.com', 'Ripe Banana', 12.00, 0.99),
(15, 'duck@duck.com', 'Sweet Orange', 4.00, 2.49),
(15, 'jane@example.com', 'Sweet Orange', 10.00, 2.49),
(16, 'john@example.com', 'Fresh Carrot', 2.00, 1.49),
(17, 'john@example.com', 'Green Broccoli', 1.00, 2.99),
(18, 'duck@duck.com', 'Red Bell Pepper', 1.00, 3.29),
(18, 'seller4@abc.com', 'Red Bell Pepper', 1.00, 3.29),
(20, 'jane@example.com', 'Chocolate Chip Cookies', 0.50, 3.49);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `email`, `points`) VALUES
('CUS001', 'jane@example.com', 100),
('CUS002', 'john@example.com', 150),
('CUS003', 'Meow@Meow.com', 0),
('CUS004', 'duck@duck.com', 0),
('CUS005', 'duck@cus.com', 0),
('CUS006', 'cus4@abc.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `imgurl` varchar(60) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `ammount` text DEFAULT NULL,
  `publishdate` date NOT NULL,
  `selleremail` varchar(60) DEFAULT NULL,
  `sellcount` int(11) DEFAULT 0,
  `category` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `name`, `imgurl`, `price`, `ammount`, `publishdate`, `selleremail`, `sellcount`, `category`, `status`) VALUES
(1, 'Fresh Tomato', 'https://i.ibb.co/C1LWMsR/tomato.jpg', 2.99, 'wk,0.5,1,2', '2024-03-29', 'seller1@example.com', 50, 'Vegetables', 'published'),
(2, 'Crispy Lettuce', 'https://i.ibb.co/MNGLvtk/lettuce.jpg', 1.49, 'wk,0.5,1,2', '2024-03-28', 'seller2@example.com', 8, 'Vegetables', 'published'),
(3, 'Organic Potato', 'https://i.ibb.co/vqmQk8Z/potato.jpg', 3.49, 'wk,0.5,1,2', '2024-03-27', 'seller1@example.com', 3, 'Vegetables', 'published'),
(13, 'Juicy Apple', 'https://i.ibb.co/Nrs4B1r/apple.jpg', 1.99, 'p,4,10,12', '2024-03-25', 'seller2@example.com', 12, 'Fruits', 'published'),
(14, 'Ripe Banana', 'https://i.ibb.co/FbJQ2fB/banana.jpg', 0.99, 'p,4,10,12', '2024-03-24', 'seller2@example.com', 15, 'Fruits', 'published'),
(15, 'Sweet Orange', 'https://i.ibb.co/bdck7T5/orange.jpg', 2.49, 'p,4,10,12', '2024-03-23', 'seller1@example.com', 10, 'Fruits', 'published'),
(16, 'Fresh Carrot', 'https://i.ibb.co/BzC19cb/carrot.jpg', 1.49, 'wk,0.5,1,2', '2024-03-22', 'seller2@example.com', 20, 'Vegetables', 'published'),
(17, 'Green Broccoli', 'https://i.ibb.co/N71pydr/broccoli.jpg', 2.99, 'wk,0.5,1,2', '2024-03-21', 'seller1@example.com', 18, 'Vegetables', 'pending'),
(18, 'Red Bell Pepper', 'https://i.ibb.co/W6MQ5j2/pepper.jpg', 3.29, 'wk,0.5,1,2', '2024-03-20', 'seller1@example.com', 25, 'Vegetables', 'published'),
(19, 'Whole Wheat Bread', 'https://i.ibb.co/pxxMTsK/bread.jpg', 4.99, 'wp,0.5,1,1.5', '2024-03-19', 'seller2@example.com', 8, 'Bakery', 'published'),
(20, 'Chocolate Chip Cookies', 'https://i.ibb.co/Nmrv15C/cookies.jpg', 3.49, 'wp,0.5,1,1.5', '2024-03-18', 'seller2@example.com', 30, 'Bakery', 'published'),
(23, 'catto', 'https://i.ibb.co/wynG8kg/strafield.jpg', 20.45, 'wp,2,3,4', '2024-04-15', 'seller1@example.com', 0, 'Fruits and Veggies', 'published'),
(24, 'catto', 'https://i.ibb.co/qrWs7vK/technology.jpg', 4152.22, 'p,2,3,4', '2024-04-16', 'seller1@example.com', 0, 'Fruits and Veggies', 'published'),
(25, 'catto', 'https://i.ibb.co/qrWs7vK/technology.jpg', 54115.20, 'wp,2,3,4', '2024-04-17', 'seller1@example.com', 0, 'Fruits and Veggies', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sellerID` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `revenue` decimal(10,2) DEFAULT NULL,
  `numOfApproved` int(11) DEFAULT 0,
  `numOfReject` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellerID`, `email`, `revenue`, `numOfApproved`, `numOfReject`) VALUES
('SLR001', 'seller1@example.com', 10000.00, 4, 1),
('SLR002', 'seller2@example.com', 15000.00, 3, 0),
('SLR003', 'duck@meow.com', 0.00, 0, 0),
('SLR004', 'duck@seller.com', 0.00, 0, 0),
('SLR005', 'catto@seller.com', 0.00, 0, 0),
('SLR006', 'seller4@abc.com', 0.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `role` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`role`, `username`, `email`, `password`) VALUES
('admin', 'admin_user', 'admin@example.com', 'adminpass'),
('seller', 'catto', 'catto@seller.com', 'asd'),
('customer', 'customer4', 'cus4@abc.com', 'asd'),
('customer', 'duck', 'duck@cus.com', 'lol'),
('customer', 'duck', 'duck@duck.com', 'lol'),
('seller', 'sdsdsd', 'duck@meow.com', 'sdsda'),
('seller', 'duck', 'duck@seller.com', 'lol'),
('seller', 'nuts', 'gg@ez.com', 'nuts'),
('customer', 'jane_doe', 'jane@example.com', 'customerpass'),
('customer', 'john_doe', 'john@example.com', 'customerpass'),
('customer', 'asas', 'Meow@Meow.com', 'sdsdsd'),
('seller', 'seller1', 'seller1@example.com', 'sellerpass'),
('seller', 'seller2', 'seller2@example.com', 'sellerpass'),
('seller', 'seller4', 'seller4@abc.com', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`productId`,`customeremail`),
  ADD KEY `customeremail` (`customeremail`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `selleremail` (`selleremail`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sellerID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`customeremail`) REFERENCES `users` (`email`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`selleremail`) REFERENCES `users` (`email`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

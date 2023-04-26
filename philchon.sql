-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 03:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `philchon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `adminID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`adminID`, `emailAddress`, `password`) VALUES
(1, 'philchonski@gmail.com', '$2a$10$r1z.6Yn1gIqqIRDdU7kzUe0RlXQuN8w.POfHHCLqNDrxRXHDV6tS6');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` int(10) UNSIGNED NOT NULL,
  `ORDER_NO` varchar(45) NOT NULL DEFAULT '',
  `ORDER_DATE` date NOT NULL DEFAULT '0000-00-00',
  `UID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TOTAL_AMT` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `ORDER_NO`, `ORDER_DATE`, `UID`, `TOTAL_AMT`) VALUES
(1, '40831', '2022-12-10', 1, 18.98),
(2, '92744', '2022-12-11', 2, 17.98),
(3, '87271', '2022-12-11', 3, 39.98),
(4, '95024', '2022-12-12', 4, 12.98),
(5, '20751', '2022-12-12', 5, 7.99),
(6, '71575', '2022-12-12', 6, 14.98),
(7, '76053', '2022-12-12', 7, 9.00),
(8, '32435', '2022-12-12', 8, 9.98),
(9, '38633', '2022-12-12', 9, 3.00),
(10, '49239', '2022-12-12', 10, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PNAME` varchar(45) NOT NULL DEFAULT '',
  `PRICE` double(10,2) NOT NULL DEFAULT 0.00,
  `QTY` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TOTAL` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ID`, `OID`, `PID`, `PNAME`, `PRICE`, `QTY`, `TOTAL`) VALUES
(1, 1, 1, 'C2 Apple Green Tea', 3.00, 3, 9.00),
(2, 1, 3, 'Gina Mango Juice', 4.99, 2, 9.98),
(3, 2, 2, 'Philippine Calamansi', 3.99, 2, 7.98),
(4, 2, 22, 'Filipino Conditioner', 5.00, 2, 10.00),
(5, 3, 25, 'Likas', 15.00, 2, 30.00),
(6, 3, 3, 'Gina Mango Juice', 4.99, 2, 9.98),
(7, 4, 3, 'Gina Mango Juice', 4.99, 2, 9.98),
(8, 4, 1, 'C2 Apple Green Tea', 3.00, 1, 3.00),
(9, 5, 3, 'Gina Mango Juice', 4.99, 1, 4.99),
(10, 5, 11, 'Chippy', 3.00, 1, 3.00),
(11, 6, 7, 'Mango', 5.00, 1, 5.00),
(12, 6, 3, 'Gina Mango Juice', 4.99, 2, 9.98),
(13, 7, 1, 'C2 Apple Green Tea', 3.00, 3, 9.00),
(14, 8, 3, 'Gina Mango Juice', 4.99, 2, 9.98),
(15, 9, 1, 'C2 Apple Green Tea', 3.00, 1, 3.00),
(16, 10, 12, 'Sweet Corn', 5.00, 1, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` int(10) UNSIGNED NOT NULL,
  `PRODUCT` varchar(45) NOT NULL DEFAULT '',
  `PRICE` double(10,2) NOT NULL DEFAULT 0.00,
  `IMAGE` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `PRODUCT`, `PRICE`, `IMAGE`, `DESCRIPTION`) VALUES
(1, 'C2 Apple Green Tea', 3.00, 'C2.jpg', 'Simply Green Tea'),
(2, 'Philippine Calamansi', 3.99, 'Philippine Calamansi.jpg', 'Its the perfect Fresh Calamansi'),
(3, 'Gina Mango Juice', 4.99, 'Mango.jpg', 'Best Mango Juice'),
(4, 'Mogu Mogu', 2.75, 'Mogu.jpg', 'Filled with tasty jello like pieces'),
(5, 'Sarsi', 3.00, 'Sarsi.jpg', 'Home-land rootbeer'),
(6, 'Soursop', 4.00, 'soursop.jpg', 'A sour fruit'),
(7, 'Mango', 5.00, 'mangofruit.jpg', 'A classic sweet treat'),
(8, 'Rambutan', 2.00, 'rambutan.jpg', 'A fruit similar to a grape'),
(9, 'Sinigueras', 6.00, 'sinigueras.jpg', 'A fruit similiar to a plum'),
(10, 'Dragon Fruit', 3.00, 'dragon.jpg', 'A fruit similar to a kiwi'),
(12, 'Sweet Corn', 5.00, 'sweet corn.jpg', 'Sweet corn chips'),
(14, 'Chiz Curls', 3.00, 'chiz.jpg', 'Cheese flavored corn puffs'),
(15, 'Oishi', 4.00, 'oishi.jpg', 'Shrimp flavored chips'),
(16, 'Magic Sarap', 2.00, 'magic.jpg', 'Flavored seasoning mix'),
(17, 'Mama Sita', 2.00, 'mama.jpg', 'Flavored seasoning mix'),
(18, 'Ginisa', 2.50, 'ginisa.jpg', 'Flavored seasoning mix'),
(19, 'Datu Puti', 4.00, 'datu.jpg', 'White Vinegar'),
(20, 'Datu Puti', 4.00, 'soysauce.jpg', 'Soy Sauce'),
(21, 'Filipino Shampoo', 5.00, 'shampoo.jpg', 'Shampoo for hair'),
(22, 'Filipino Conditioner', 5.00, 'conditioner.jpg', 'Conditioner for hair'),
(23, 'Tabo', 3.50, 'tabo.jpg', 'For bathroom purposes'),
(24, 'Belo Essentials', 10.00, 'belo.jpg', 'Whitening bar soap'),
(25, 'Likas', 15.00, 'likas.jpg', 'Papaya whitening bar soap'),
(28, 'Salt and Vinegar Chips', 4.75, 'saltbinigar.jpg', 'You can taste the \"biniagr\"'),
(30, 'Coconut Juice', 6.99, 'coconut.jpg', 'Taste like real coconut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text DEFAULT NULL,
  `EMAIL` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `NAME`, `ADDRESS`, `EMAIL`) VALUES
(1, 'Zander', '9 Path Plaza Level Jersey City NJ 07306', 'zander@gmail.com'),
(2, 'Katrice F', '9 Path Plaza Level Jersey City NJ 07306', 'katricef@gmail.com'),
(3, 'Nayee P', '455 Baldwin Ave Jersey City NJ 07306', 'naye@gmail.com'),
(4, 'john doe', '97 Laidlaw Ave', 'johndoe@gmail.com'),
(5, 'John Smith', '97 Baldwin Ave', 'smithjohn@gmail.com'),
(6, 'Kevin B', '97 Jefferson Ave ', 'kevinb@gmail.com'),
(7, 'Kevin L', '89 Jefferson Ave', 'kevinl@gmail.com'),
(8, 'Naye B', '90 Jefferson Ave', 'nayeb@gmail.com'),
(9, 'Gizzelle', '83 Jefferson Ave', 'gb@gmail.com'),
(10, 'Kevin Y', '95 Jefferson Ave', 'keviny@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

GRANT SELECT, INSERT, DELETE, UPDATE ON philchon to philchon@localhost IDENTIFIED BY 'philchon';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

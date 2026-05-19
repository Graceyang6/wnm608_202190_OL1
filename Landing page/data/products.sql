-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.byetcluster.com
-- Generation Time: Apr 04, 2026 at 06:54 PM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41168580_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `image`) VALUES
(1, 'Tennis Racket', '199.99', 'equipment', 'High performance racket', 'racket.jpg'),
(2, 'Tennis Balls', '9.99', 'equipment', 'Pack of 3 balls', 'balls.jpg'),
(3, 'Tennis Shoes', '129.99', 'apparel', 'Comfortable court shoes', 'shoes.jpg'),
(4, 'Sports Hat', '24.99', 'apparel', 'Lightweight sports hat', 'hat.jpg'),
(5, 'Wristband', '12.99', 'accessories', 'Sweat absorbing wristband', 'wristband.jpg'),
(6, 'Water Bottle', '15.99', 'accessories', '1 liter sports bottle', 'bottle.jpg'),
(7, 'Tennis Bag', '89.99', 'equipment', 'Large capacity gear bag', 'bag.jpg'),
(8, 'Grip Tape', '8.99', 'accessories', 'Non slip racket grip', 'grip.jpg'),
(9, 'Sports Socks', '14.99', 'apparel', 'Comfortable athletic socks', 'socks.jpg'),
(10, 'Headband', '10.99', 'accessories', 'Keeps sweat away', 'headband.jpg'),
(11, 'Training Net', '59.99', 'equipment', 'Portable practice net', 'net.jpg'),
(12, 'T Shirt', '29.99', 'apparel', 'Breathable sports shirt', 'tshirt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

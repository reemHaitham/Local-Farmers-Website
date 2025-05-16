-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 07:07 AM
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
-- Database: `localfarmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_type` text NOT NULL,
  `product_name` text NOT NULL,
  `product_describe` text NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_type`, `product_name`, `product_describe`, `product_price`) VALUES
('Fruits', 'Organic Tomatoes', 'Plump, sun-ripened tomatoes bursting with flavor. Available March through May', 1.5),
('Vegetables', 'Organic Carrots', 'variety of colors and flavors. Grown without synthetic pesticides.', 1.09),
('Eggs & Dairy', 'Farm Fresh Eggs', 'Free-range eggs from our happy hens. Available year-round.', 2.03),
('Handmade & Organic products', 'Strawberry Jam', 'Made with our organic strawberries. No artificial ingredients.', 4.5),
('Fruits', 'Pomegranates', 'Ruby-red pomegranates filled with sweet-tart jewels. Available August through October.', 2.5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

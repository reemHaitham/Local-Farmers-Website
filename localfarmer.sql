-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 07:06 AM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` text NOT NULL,
  `date` text NOT NULL,
  `numOfItems` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `date`, `numOfItems`, `total`, `status`) VALUES
('FV-78945', 'Jun 12, 2023', 5, 42.5, 'Delivered'),
('FV-46502', 'Jun 8, 2023', 3, 28.7, 'Shipped'),
('FV-50697', 'Jun 5, 2023', 7, 65.2, 'Processing'),
('FV-70192', 'Apr 13, 2025', 1, 4.5, 'Delivered'),
('FV-77385', 'Feb 25, 2024', 4, 33.15, 'Shipped\r\n');

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

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `farmerName` text NOT NULL,
  `farmName` text NOT NULL,
  `Location` text NOT NULL,
  `Products` text NOT NULL,
  `Method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`farmerName`, `farmName`, `Location`, `Products`, `Method`) VALUES
('John Doe', 'Green Valley', 'Salalah', 'Organic Vegetables', 'Eco-friendly'),
('Alice Smith', 'Sunny Acres', 'Sur', 'Free-range Eggs', 'Pasture-raised'),
('Bob Johnson', 'Hilltop Farms', 'Sohar', 'Citrus Fruits', 'Non-GMO'),
('Mary Evans', 'Riverbend Farm', 'Muscat', 'Organic Dairy', 'Grass-fed'),
('kothar Ahmed', 'Happy Farm', 'Qurayyat', 'Vegetables', 'Hydroponics');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewer_name` text NOT NULL,
  `reviewer_text` text NOT NULL,
  `reviewer_rate` text NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewer_name`, `reviewer_text`, `reviewer_rate`, `DATE`) VALUES
('Zainab Salim	', 'Amazing produce, always fresh and delivered on time!	', 'Excellent', '2025-05-16'),
('Ali Abdullah	', 'The eggs from Sunny Acres are the best I\'ve ever had!	', 'Good', '2025-05-16'),
('Kothar Ahmed	', 'Great experience! Will definitely buy again.	', 'Excellent', '2025-05-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localFarmers`
--

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
('John Doe', 'Green Valley', 'Salalah','Organic Vegetables', "Eco-friendly"),
('Alice Smith', 'Sunny Acres', 'Sur', 'Free-range Eggs', 'Pasture-raised'),
('Bob Johnson', 'Hilltop Farms', 'sohar', 'Citrus Fruits', 'Non-GMO'),
('Mary Evans','Riverbend Farm', 'muscat', 'Organic Dairy', 'Grass-fed'),
('kothar Ahmed', 'happy farm', 'Qurayyat','vegetables','Hydroponics');

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
('Fruits', 'Organic Tomatoes', 'Plump, sun-ripened tomatoes bursting with flavor. Available March through May.', 1.5),
('Vegetables', 'Organic Carrots', 'variety of colors and flavors. Grown without synthetic pesticides.', 1.09),
('Eggs & Dairy', 'Farm Fresh Eggs', 'Free-range eggs from our happy hens. Available year-round.', 2.03),
('Handmade & Organic products', 'Strawberry Jam', 'Made with our organic strawberries. No artificial ingredients.', 4.5),
('Fruits', 'Pomegranates', 'Ruby-red pomegranates filled with sweet-tart jewels. Available August through October.', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` text NOT NULL,
  `date` text NOT NULL,
  `numOfItems` int(11) NOT NULL,
  `total` double NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `date`, `numOfItems`, `total`, `Status`) VALUES
('FV-78945', 'Jun 12, 2023', 5, 42.50, 'Delivered'),
('FV-46502', 'Jun 8, 2023', 3, 28.7, 'Shipped'),
('FV-50697', 'Jun 5, 2023', 7, 65.20, 'Processing'),
('FV-70192', 'Apr 13, 2025', 1, 4.5, 'Delivered'),
('FV-77385', 'Feb 25, 2024',4, 33.15, 'Shipped');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`farmerName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



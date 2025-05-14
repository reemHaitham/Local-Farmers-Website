
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`farmerName`),
  ADD KEY `farmerName` (`farmerName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

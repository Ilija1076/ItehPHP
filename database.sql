SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--
CREATE DATABASE IF NOT EXISTS `universe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `universe`;

-- --------------------------------------------------------

--
-- Table structure for table `destinations1`
--

DROP TABLE IF EXISTS `destinations1`;
CREATE TABLE `destinations1` (
  `id` int(11) NOT NULL,
  `planet` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `departure` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations1`
--

INSERT INTO `destinations1` (`id`, `planet`, `distance`, `time`, `departure`) VALUES
(10, 'Venus', '61,000,000 km', '2 days', '2022-12-22'),
(11, 'Jupiter', '588,000,000 km', '5 days', '2022-12-23'),
(25, 'Mars', '54,600,000 km', '2 days', '2022-12-24'),
(13, 'Mercury', '91,700,000 km', '3 days', '2022-12-25'),
(22, 'Saturn', '1,200,000,000 km', '8 days', '2022-12-26'),
(29, 'Uranus', '2,900,000,000 km', '20 days', '2022-12-27'),
(33, 'Neptune', '4,500,000,000 km', '30 days', '2022-12-28');

--
-- Table structure for table `destinations2`
--

DROP TABLE IF EXISTS `destinations2`;
CREATE TABLE `destinations2` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `departure` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations2`
--

INSERT INTO `destinations2` (`id`, `place`, `distance`, `time`, `departure`) VALUES
(50, 'Bora Bora', '15,000 km', '10 days', '2022-12-22'),
(51, 'Santorini', '10,000 km', '7 days', '2022-12-23'),
(56, 'Maldives', '8,000 km', '5 days', '2022-12-24'),
(58, 'Galapagos Islands', '12,000 km', '8 days', '2022-12-25'),
(59, 'Machu Picchu', '5,000 km', '3 days', '2022-12-26'),
(61, 'Great Barrier Reef', '14,000 km', '9 days', '2022-12-27'),
(66, 'Serengeti National Park', '6,000 km', '4 days', '2022-12-28'),
(69, 'Salar de Uyuni', '4,000 km', '3 days', '2022-12-29'),
(77, 'Seychelles', '12,000 km', '8 days', '2022-12-30'),
(79, 'Antelope Canyon', '3,000 km', '2 days', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations1`
--

ALTER TABLE `destinations1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations2`
--

ALTER TABLE `destinations2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations1`
--
ALTER TABLE `destinations1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `destinations2`
--

ALTER TABLE `destinations2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


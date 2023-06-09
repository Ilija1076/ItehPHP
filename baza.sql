SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--
CREATE DATABASE IF NOT EXISTS `univerzum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `univerzum`;

-- --------------------------------------------------------

--
-- Table structure for table `destinacije`
--

DROP TABLE IF EXISTS `destinacije`;
CREATE TABLE `destinacije` (
  `id` int(11) NOT NULL,
  `planeta` varchar(255) NOT NULL,
  `udaljenost` varchar(255) NOT NULL,
  `vreme` varchar(255) NOT NULL,
  `polazak` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinacije`
--

INSERT INTO `destinacije` (`id`, `planeta`, `udaljenost`, `vreme`, `polazak`) VALUES
(10, 'Venera', '61000000 km', '2 dana', '2022-12-22'),
(11, 'Jupiter', '588000000 km', '5 dana', '2022-12-23'),
(25, 'Mars', '54600000 km', '2 dana', '2022-12-24'),
(13, 'Merkur', '91700000 km', '3 dana', '2022-12-25'),
(22, 'Saturn', '1200000000 km', '8 dana', '2022-12-26'),
(29, 'Uran', '2900000000 km', '20 dana', '2022-12-27'),
(33, 'Neptun', '4500000000 km', '30 dana', '2022-12-28');

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
-- Indexes for table `destinacije`
--
ALTER TABLE `destinacije`
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
-- AUTO_INCREMENT for table `destinacije`
--
ALTER TABLE `destinacije`
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
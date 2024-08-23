-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `h_id` int(5) NOT NULL,
  `services` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`h_id`, `services`) VALUES
(1008, 'Elevator'),
(1008, 'Parking'),
(1008, 'Power Backup'),
(1008, '24hr Room Service'),
(1006, 'Power Backup'),
(1006, '24hr Room Service');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(5) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `ph_no` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `address`, `ph_no`, `password`) VALUES
(49, 'Varun', 'Bellary', 9875641235, 'login@456'),
(50, 'Nithin', 'Belgaum', 8745612390, 'hello'),
(51, 'Bhushan', 'Mangalore', 9874152630, 'gunthur');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `h_id` int(5) NOT NULL,
  `h_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `ph_no` bigint(10) NOT NULL,
  `hotel_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`h_id`, `h_name`, `address`, `ph_no`, `hotel_type`) VALUES
(1006, 'Golden Palms', 'Bengaluru', 6325365234, 4),
(1008, 'Marriot', 'Bengaluru', 921654354, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `check_in` date NOT NULL,
  `no_of_days` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `r_id`, `c_id`, `check_in`, `no_of_days`) VALUES
(108, 102, 50, '2023-02-15', 3),
(110, 102, 50, '2023-02-08', 3);

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `res_log` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN
INSERT INTO res_log VALUES (NEW.res_id,NEW.no_of_days);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservationsview`
-- (See below for the actual view)
--
CREATE TABLE `reservationsview` (
`res_id` int(5)
,`c_id` int(5)
,`r_id` int(5)
,`check_in` date
);

-- --------------------------------------------------------

--
-- Table structure for table `res_log`
--

CREATE TABLE `res_log` (
  `res_id` int(5) NOT NULL,
  `nod` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_log`
--

INSERT INTO `res_log` (`res_id`, `nod`) VALUES
(115, 4),
(116, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `h_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `room_price` mediumint(8) NOT NULL,
  `room_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`h_id`, `r_id`, `room_price`, `room_type`) VALUES
(1008, 102, 4000, 'Executive'),
(1008, 4589, 8000, 'Presidential');

-- --------------------------------------------------------

--
-- Structure for view `reservationsview`
--
DROP TABLE IF EXISTS `reservationsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservationsview`  AS SELECT `reservation`.`res_id` AS `res_id`, `reservation`.`c_id` AS `c_id`, `reservation`.`r_id` AS `r_id`, `reservation`.`check_in` AS `check_in` FROM `reservation` WHERE `reservation`.`check_in` between '2023-02-10' and '2023-02-19''2023-02-19'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`,`r_id`,`c_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `res_log`
--
ALTER TABLE `res_log`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `h_id` (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenities`
--
ALTER TABLE `amenities`
  ADD CONSTRAINT `amenities_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

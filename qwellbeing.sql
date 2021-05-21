-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 21, 2021 at 12:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qwellbeing`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyupdate`
--

CREATE TABLE `dailyupdate` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `oxygen` float NOT NULL,
  `heartrate` float NOT NULL,
  `BreathingProblem` varchar(10) NOT NULL,
  `SpeakingProblem` varchar(10) NOT NULL,
  `ChestPain` varchar(10) NOT NULL,
  `SoreThroat` varchar(10) NOT NULL,
  `LossOfTasteAndSmell` varchar(10) NOT NULL,
  `Conjunctivitis` varchar(10) NOT NULL,
  `DiscolourationOfFingers` varchar(10) NOT NULL,
  `Fever` varchar(10) NOT NULL,
  `DryCough` varchar(10) NOT NULL,
  `Tiredness` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyupdate`
--

INSERT INTO `dailyupdate` (`id`, `temperature`, `oxygen`, `heartrate`, `BreathingProblem`, `SpeakingProblem`, `ChestPain`, `SoreThroat`, `LossOfTasteAndSmell`, `Conjunctivitis`, `DiscolourationOfFingers`, `Fever`, `DryCough`, `Tiredness`, `date`) VALUES
(17, 100, 99, 85, 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', '2021-05-21'),
(18, 100, 100, 90, 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', '2021-05-21'),
(19, 98, 95, 90, 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'No', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(4) NOT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `aadhaar_number` bigint(20) DEFAULT NULL,
  `locality` varchar(225) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `email_address`, `password`, `gender`, `age`, `contact_number`, `aadhaar_number`, `locality`, `date`) VALUES
(11, 'Urvi', 'Sharma', 'urvi@gmail.com', '$2y$10$RcEvJjua8xmn1Ti7x2U6X.HE9EcnTCb2cIS7cflXZCsic/MAHoLLe', 'female', 21, NULL, NULL, NULL, '2021-05-16 13:18:29'),
(13, 'Rohan', 'Varma', 'rohan@gmail.com', '$2y$10$4bxIhWOZGf/f2jXdq/M5Qe3cT.b2zpLgxYQ1ZIEl8oygVvSZ66Ysa', 'male', 21, NULL, NULL, NULL, '2021-05-16 13:33:25'),
(14, 'Jaya', 'Rao', 'jaya@gmail.com', '$2y$10$RO3YeDgJ1naMblU2D6C2p.MqwlGmGCYM9vQ.MMoPQvO/iuhjBMD4y', 'female', 34, NULL, NULL, NULL, '2021-05-16 13:35:37'),
(15, 'Shreya', 'Mishra', 'shreya@gmail.com', '$2y$10$euLs/oUhCafJ.Nl4ONKu.eMiDh.TAHXhL78wAvOPkFBwPybKPxOPu', 'female', 34, NULL, NULL, NULL, '2021-05-16 18:18:14'),
(16, 'Mahima', 'Shetty', 'msshetty237@gmail.com', '$2y$10$c8PhjNgVd/BRG0hq/J8V/O0eIRMAiAWxcVD6I7VdUfkmXM5q1pUF2', 'female', 20, NULL, NULL, NULL, '2021-05-20 15:37:39'),
(17, 'Krish', 'Kadam', 'krish123@gmail.com', '$2y$10$Dv0IRVKQi756thk4u9T7p.bOybXaPrpakPTM2gpl/7IX5hWR3qIyC', 'male', 25, NULL, NULL, NULL, '2021-05-20 20:47:12'),
(18, 'Mahesh', 'Chavan', 'maheshchavan@gmail.com', '$2y$10$zDETca8X9vGPa8UX3WsxLOJm9eNggUpPcbWQ713S5JbUewmkMpHc.', 'male', 35, NULL, NULL, NULL, '2021-05-21 15:13:32'),
(19, 'Sanjay', 'Datt', 'sanjaydutt@gmail.com', '$2y$10$6jAYGwKffwG8rR23DTz/GuS1M19ERWV.IyHX.SCv8psefRg0AbF/q', 'male', 60, NULL, NULL, NULL, '2021-05-21 15:29:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

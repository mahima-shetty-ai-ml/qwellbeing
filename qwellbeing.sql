-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 01:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
(18, 95, 99, 85, 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '2021-05-22'),
(19, 100, 95, 85, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', '2021-05-22'),
(20, 98.5, 99, 90, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', '2021-05-22'),
(21, 98, 99, 89, 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', '2021-05-22'),
(18, 95, 100, 98, 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', '2021-05-21'),
(18, 95, 98, 87, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2021-05-23'),
(19, 97, 100, 85, 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', '2021-05-21'),
(19, 94, 94, 96, 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', '2021-05-23'),
(20, 94, 98, 87, 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', '2021-05-21'),
(20, 94, 94, 85, 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', '2021-05-23'),
(21, 95, 98, 85, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2021-05-21'),
(21, 94, 98, 85, 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', '2021-05-23'),
(29, 100, 100, 85, 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', '2021-05-23'),
(17, 95, 99, 85, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2021-05-23'),
(17, 95, 100, 85, 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', '2021-05-24'),
(16, 95, 100, 85, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2021-05-24');

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
  `age` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `email_address`, `password`, `gender`, `age`) VALUES
(11, 'Urvi', 'Sharma', 'urvi@gmail.com', '$2y$10$RcEvJjua8xmn1Ti7x2U6X.HE9EcnTCb2cIS7cflXZCsic/MAHoLLe', 'female', 21),
(13, 'Rohan', 'Varma', 'rohan@gmail.com', '$2y$10$4bxIhWOZGf/f2jXdq/M5Qe3cT.b2zpLgxYQ1ZIEl8oygVvSZ66Ysa', 'male', 21),
(14, 'Jaya', 'Rao', 'jaya@gmail.com', '$2y$10$RO3YeDgJ1naMblU2D6C2p.MqwlGmGCYM9vQ.MMoPQvO/iuhjBMD4y', 'female', 34),
(15, 'Shreya', 'Mishra', 'shreya@gmail.com', '$2y$10$euLs/oUhCafJ.Nl4ONKu.eMiDh.TAHXhL78wAvOPkFBwPybKPxOPu', 'female', 34),
(16, 'Mahima', 'Shetty', 'msshetty237@gmail.com', '$2y$10$c8PhjNgVd/BRG0hq/J8V/O0eIRMAiAWxcVD6I7VdUfkmXM5q1pUF2', 'female', 20),
(17, 'Krish', 'Kadam', 'krish123@gmail.com', '$2y$10$Dv0IRVKQi756thk4u9T7p.bOybXaPrpakPTM2gpl/7IX5hWR3qIyC', 'male', 25),
(18, 'Mahesh', 'Chavan', 'maheshchavan@gmail.com', '$2y$10$zDETca8X9vGPa8UX3WsxLOJm9eNggUpPcbWQ713S5JbUewmkMpHc.', 'male', 35),
(19, 'Sanjay', 'Datt', 'sanjaydutt@gmail.com', '$2y$10$6jAYGwKffwG8rR23DTz/GuS1M19ERWV.IyHX.SCv8psefRg0AbF/q', 'male', 60),
(20, 'Prathiksha', 'Shetty', 'prathiksha@gmail.com', '$2y$10$UnIhl.POf4wicZEuw9ACCOoH.G.bu3O.OPIPYMQmIE.WVpJpWar02', 'female', 20),
(21, 'Gaurav', 'Prasad', 'gaurav@gmail.com', '$2y$10$8j2fhPcWaWcyAQtOXVvdruv1nCJbyBXajENdNkCTSwH2QOzNuE/qK', 'male', 25),
(22, 'Urmila', 'Jain', 'urmila@gmail.com', '$2y$10$h5VgUETNcdoYrnsAO5h1PemIBiKSz1JWVKDvsi9X9djfWPzPXo4zy', 'female', 24),
(23, 'Harsh', 'Jain', 'harsh@gmail.com', '$2y$10$jABQncmVoiZAXbVR4wRNeOc6xorTH5NRAbPu2HBDJ0fG5JhY1kcD2', 'male', 21),
(24, 'Sameer', 'Trivedi', 'sameer@gmail.com', '$2y$10$Uw4kDoxQwZg7/gVwQgudxOCnsTEemB0fUyuuXx.00aY84nTrYCrLi', 'male', 34),
(25, 'Anu', 'Shah', 'anu@gmail.com', '$2y$10$cogs2f43Mui8DvoR41/ENe6VkbOdAWdR6EFO/wfUC7RsbeHzWPDi6', 'female', 24),
(26, 'Riley', 'Patil', 'riley@gmail.com', '$2y$10$qQRMsG065ff/ISRrW9GwzedXXEisjRIF3h4tG6p7ewIUghncTYAde', 'male', 20),
(27, 'Dheeraj', 'Bhadra', 'dheeraj@gmail.com', '$2y$10$WgfLr2Pf2Vkvzf/k5.nbfu/MGY8.mmCER5iotunAtKYgaU84F6mNK', 'male', 23),
(28, 'Furqan', 'Khan', 'furqan@gmail.com', '$2y$10$594E6M6MNIneo0pSGdwD6O4D19yR/QCxG1S9kWNXI.AC8sZ5digam', 'male', 20),
(29, 'Ganesh', 'Jain', 'ganesh@gmail.com', '$2y$10$okB0kdIwsz64Wf29O7j5ZOdosSYD/l6wIQau7QT8crShsWPvcvWXy', 'male', 24);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

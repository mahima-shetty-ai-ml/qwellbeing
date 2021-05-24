-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 24, 2021 at 01:13 PM
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
-- Table structure for table `password_reset_tempdb`
--

CREATE TABLE `password_reset_tempdb` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset_tempdb`
--

INSERT INTO `password_reset_tempdb` (`id`, `email_address`, `key`, `expDate`) VALUES
(1, 'sanjaydutt@gmail.com', '3787ee75c34d7728cc92adb3559e7b8d59718eb7c0', '2021-05-23 19:44:48'),
(2, 'sanjaydutt@gmail.com', '82ab0ac6d2abbbefcd67c21d244774934603f1f42b', '2021-05-23 19:48:02'),
(3, 'sanjaydutt@gmail.com', 'b41321f462326e09410bafcba7345b466ef9f78141', '2021-05-23 19:48:08'),
(4, 'sanjaydutt@gmail.com', 'f3e9145ee15b71e609664f45599c0624570d0d2114', '2021-05-23 19:48:23'),
(5, 'sanjaydutt@gmail.com', '26d42a67ef7406c72d0c3adc50599067838ae6bbc6', '2021-05-23 19:48:28'),
(6, 'sanjaydutt@gmail.com', '79bf73cce16779b7d966b5563938d1f487d503abae', '2021-05-23 19:49:23'),
(7, 'sanjaydutt@gmail.com', '061b26eda09a719d7abd23d01ae055de15974a9cf1', '2021-05-23 19:49:28'),
(8, 'sanjaydutt@gmail.com', '42985b46a19f16f6bdc3b004f1d76657b638d4ad1b', '2021-05-23 19:52:56'),
(9, 'sanjaydutt@gmail.com', '8eae05b43ca8b4fae0a8c00838a412c083916f2a17', '2021-05-23 19:53:01'),
(10, 'sanjaydutt@gmail.com', '1504749f762bdbad673922679f57c839c266b0b11b', '2021-05-23 19:54:43'),
(11, 'sanjaydutt@gmail.com', '77198d1e932419665af7d28eb441cec1e91e46d64f', '2021-05-23 19:54:52'),
(12, 'msshetty237@gmail.com', '5b944d8bfcfc91ee5fe9018e69a67fc2dee470f757', '2021-05-24 12:12:55'),
(13, 'msshetty237@gmail.com', '4abd55afd4f1461479d0fecb5b7a45ae8f3978ed2b', '2021-05-24 12:13:01'),
(14, 'msshetty237@gmail.com', 'd0b28f97132a7aa47bdbfae91e3575a58b45e99619', '2021-05-24 12:13:30'),
(15, 'msshetty237@gmail.com', '9d05e794bc7064577ab5aff52855577df520ba4eee', '2021-05-24 12:13:36'),
(16, 'msshetty237@gmail.com', 'a022035bc8e58c4144c6bc8056e157193ebc8a5e1e', '2021-05-24 12:14:18'),
(17, 'msshetty237@gmail.com', '0873f30f7904ea6327d2b89170f160a533d852249b', '2021-05-24 12:15:12'),
(18, 'msshetty237@gmail.com', 'debb880d903bfc8d7ec3f9f40304451657f4881076', '2021-05-24 12:15:48'),
(19, 'msshetty237@gmail.com', '58f9535715514179c2df468e0e1ecfdb8fd931fdc8', '2021-05-24 12:18:43'),
(20, 'msshetty237@gmail.com', '9921c7b0c450d8b071d063e958cd1f859f0d20c97a', '2021-05-24 12:18:50'),
(21, 'msshetty237@gmail.com', '0aea562914426df134fc0621a3bdef59f42607dda6', '2021-05-24 12:22:00'),
(22, 'msshetty237@gmail.com', '5b0fee4539d601ecbcfe9fafbbb5263196071d6d87', '2021-05-24 12:22:24'),
(23, 'msshetty237@gmail.com', '66bba90c504dbd1f671aa50070641a8ee784638ad6', '2021-05-24 12:22:35'),
(24, 'msshetty237@gmail.com', '230d481f3d7ee5a76395c2b2a6074d935b75f5421c', '2021-05-24 12:29:08'),
(25, 'msshetty237@gmail.com', '2d0abe8782c78c0650fd7045e0c40e5ca11c925549', '2021-05-24 12:30:29'),
(26, 'msshetty237@gmail.com', '869b124d71de0db4af7166ef783ffa606f30950009', '2021-05-24 12:30:34'),
(27, 'msshetty237@gmail.com', '11e8af4c14776aa0755416257ed0bbcaf91d8ecfb0', '2021-05-24 12:30:38'),
(28, 'msshetty237@gmail.com', '19dd94ce073b10acd81642676e2e69aab8255a471b', '2021-05-24 12:35:46'),
(29, 'msshetty237@gmail.com', '542a079e3a074051defd8eeb64c21b719174fc4722', '2021-05-24 12:45:35'),
(30, 'msshetty237@gmail.com', '9bde02a6cb246bf940191589559209e7f9913d66ea', '2021-05-24 12:45:42');

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
-- Indexes for table `password_reset_tempdb`
--
ALTER TABLE `password_reset_tempdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_reset_tempdb`
--
ALTER TABLE `password_reset_tempdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

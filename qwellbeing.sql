-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 05:16 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_address` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `aadhaar_number` bigint(20) DEFAULT NULL,
  `locality` varchar(225) DEFAULT NULL,
  `body_temperature` float DEFAULT NULL,
  `heart_rate` int(4) DEFAULT NULL,
  `feeling` varchar(20) DEFAULT NULL,
  `health_problems` varchar(225) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_address`, `password`, `contact_number`, `aadhaar_number`, `locality`, `body_temperature`, `heart_rate`, `feeling`, `health_problems`, `date`) VALUES
(2, 'smriti@gmail.com', '$2y$10$4PPGj30CKB8c3T3Fo8k9wuAgVNAQIOhgu5e2b3f4HgRzrFB88u2tG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:01:33'),
(3, 'shanaya@gmail.com', '$2y$10$o5/G0UCIvVP1MoL1NUhZmeBjOWtNvmcqBkcvn80RsSi/vWaa.JKIG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:01:59'),
(4, 'meera@gmail.com', '$2y$10$1986oKDX0nTAz08a/n8nnOniJpNsUhvKlEhEYdrWkupBaflFL4JuK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:04:32'),
(5, 'sahil@gmail.com', '$2y$10$SMg6GyT0JXbMwgQTz6c66.If22ogNuujYqeyPzJfMxYCcBqhi/rlm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:09:46'),
(6, 'harish@gmail.com', '$2y$10$jBHzT//HTm2WEFzWbf0rkeWfH5RVEzsN3bb0LdDRv59FSyK8Q90yG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:15:50'),
(7, 'john@gmail.com', '$2y$10$s0bcD3YWOsM9eonkubwOJOKPgJwc1c6VCmUaQCjmCDtu959rukVZe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:19:55'),
(8, 'ben@gmail.com', '$2y$10$Ym0qcF7w4KG/E3CtYbdOIOJWNUkUi/2LlvQY/.n9t8WRz8ApC9XbO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:21:39'),
(9, 'varun@gmail.com', '$2y$10$vnhGi2BjH9m5cPn.GtUAP.2j1t2nCZzTAzW0MDPe41sapzNaA5gGW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 01:37:24'),
(10, 'karan@gmail.com', '$2y$10$.eqGj.kzwEKu8Ld1ELIYFOY9r/lbWGIRmhH5Fe3Vb/z5l5azuHMl2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 02:29:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

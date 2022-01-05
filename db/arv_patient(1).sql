-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 11:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arv_patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `ward` varchar(255) NOT NULL DEFAULT '0',
  `district` varchar(255) NOT NULL DEFAULT '0',
  `region` varchar(255) NOT NULL DEFAULT '0',
  `country` varchar(255) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `ward`, `district`, `region`, `country`, `user_id`) VALUES
(26, 'isen', 'NYEGEZI', 'MWANZA', 'TZ', 19),
(27, 'MAZIMBU', 'MOROGORO (M)', 'MOROGORO', 'TZ', 20),
(28, 'MAZIMBU', 'Mvomero', 'MWANZA', 'TZ', 21),
(29, 'MAZIMBU', 'Mvomero', 'MOROGO', 'TZ', 22),
(30, 'MAZIMBU', 'MOROGORO (M)', 'MWANZA', 'TZ', 23);

-- --------------------------------------------------------

--
-- Table structure for table `arv_store`
--

CREATE TABLE `arv_store` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `batch_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arv_store`
--

INSERT INTO `arv_store` (`id`, `quantity`, `batch_date`, `branch_id`, `user_id`) VALUES
(7, 5000, '2021-06-03', 2, 22),
(8, 5000, '2021-06-12', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'none'),
(2, 'MZUMBE'),
(3, 'NYASUBI');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `address`, `user_id`) VALUES
(26, 'muhaas2021@gmail.com', 19),
(27, 'shaabanbakhresa85@gmail.com', 20),
(28, 'admin@gmail.com', 21),
(29, 'clinician@gmail.com', 22),
(30, 'ann@gmail.com', 23);

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint`
--

CREATE TABLE `fingerprint` (
  `id` int(11) NOT NULL,
  `templates` varchar(1000) NOT NULL DEFAULT '0',
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fingerprint`
--

INSERT INTO `fingerprint` (`id`, `templates`, `pid`) VALUES
(1, 'Rk1SACAyMAAAAAFuAAABAAGQAMUAxQEAAABFOECQAAykPIC4ACIYXYCJACawSkByACkwQ0DbACn8Q4DXADeIQ0CJADkwQ0C/ADsQSkDlAED0SkCJAEkwPIDGAFoMUICoAF8cSkDeAF+EUEDuAF9wUECcAGEwPIBwAGNESoB5AGM8UECtAGMUV4BaAGpMSoC9AG+YXUCeAHtwV4DSAIScXYAUAIbUPIBmAIZUV4DUAJKkXYBpAJfoSoB0AJloSkBBAKBYUICXAKB8XUBmAKJcUECHALEAXYBYAMpkUIDGAMqQXUCVAM94UIBDAN3gSoClAN0MSoBaAN/0SoC/AOKMUEC/AOsUUEDUAO2MV4DLAPyMUEB0AQB4SkCcAQUISkDGAQwUSoDUAQyQSkA3ARVkPICFARx4SoDCAS2QSkBDATH0PEB3AUSAQ0ChAVCQQ4BRAW6IPIB3AXEIPECXAXMQPEB3AXqAPICQAYMMQwAA', 23);

-- --------------------------------------------------------

--
-- Table structure for table `patient_doctor`
--

CREATE TABLE `patient_doctor` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`id`, `pid`, `did`, `dname`, `phone`, `email`, `branch`, `rid`) VALUES
(8, 20, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 7),
(9, 19, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 8),
(10, 20, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 9),
(11, 19, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 10),
(12, 20, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 11),
(13, 21, 22, 'EMMANUEL H RAJABU', '+2554545676', 'custodian@gmail.com', 'MZUMBE', 13);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `pno` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `pno`, `user_id`) VALUES
(26, '0745681617', 19),
(27, '0718800422', 20),
(28, '0745681617', 21),
(29, '+2554545676', 22),
(30, '0622344987', 23);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `quantity_used` int(11) NOT NULL DEFAULT 0,
  `weight` float NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `return_date` date NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `quantity_used`, `weight`, `date`, `return_date`, `pid`) VALUES
(7, 100, 83, '2021-06-02', '2021-06-10', 20),
(8, 134, 83, '2021-06-02', '2021-06-10', 19),
(9, 500, 87, '2021-06-02', '2021-06-03', 20),
(10, 4266, 77, '2021-06-02', '2021-06-03', 19),
(11, 500, 67, '2021-06-12', '2021-06-30', 20),
(13, 1000, 12, '2021-06-12', '2021-06-30', 21);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'patient'),
(2, 'clinician'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `sex`, `dob`, `role_id`, `branch_id`, `created_at`, `password`) VALUES
(19, 'EMMANUEL B MOHAMMED', 'M', '2021-06-03', 1, 1, '2021-06-02 17:30:04', '12345'),
(20, 'SHABANI B MOHAMMED', 'M', '2021-06-03', 1, 1, '2021-06-02 17:32:11', '12345'),
(21, 'Bakari B Abdul', 'M', '2021-06-04', 3, 3, '2021-06-02 17:36:33', '12345'),
(22, 'EMMANUEL H RAJABU', 'M', '2021-06-03', 2, 2, '2021-06-02 17:38:01', '12345'),
(23, 'ANNAMARIA G SEMWENDA', 'F', '2021-07-26', 1, 1, '2021-07-25 22:25:47', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `arv_store`
--
ALTER TABLE `arv_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `arv_store`
--
ALTER TABLE `arv_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fingerprint`
--
ALTER TABLE `fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arv_store`
--
ALTER TABLE `arv_store`
  ADD CONSTRAINT `arv_store_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arv_store_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arv_store_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD CONSTRAINT `fingerprint_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  ADD CONSTRAINT `patient_doctor_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_doctor_ibfk_2` FOREIGN KEY (`did`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_doctor_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `record` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

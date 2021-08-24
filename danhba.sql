-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 10:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danhba`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `idPerson` int(11) NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workPhone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonePerson` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`idPerson`, `fullName`, `position`, `workPhone`, `email`, `phonePerson`, `id_unit`) VALUES
(1, 'Mr.Kim', 'Hiệu Trưởng', '01299999999', 'hieutruong123@gmail.com', '0123456789', 1),
(2, 'Lê Văn Bình', ' Phó Hiệu Trưởng', '012566666666', 'phohieutruong123@gmail.com', '0911111111', 1),
(3, 'Kiều Tuấn Dũng', 'Trưởng Bộ Môn', '0125698778954', 'truongbomon123@gmail.com', '0977777777', 2),
(4, 'Nguyễn Văn B', 'Trợ Lý', '012333333333', 'troly@gmail.com', '0124655643', 10),
(5, 'Đặng Thị Thu Hiền', 'Trạm Trưởng', '012555555555', 'tramtruong123@gmail.com', '0963655555', 10),
(6, 'Nguyễn Khánh Linh', 'Trợ Lý Khoa', '038869623323', 'trolykhoa123@gmail.com', '0956789632', 9),
(7, 'Nguyễn Văn A', 'Giảng Viên', '012345696356', 'anv@gmail.com', '0145789862', 10);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `address`, `phone`, `website`, `id_parent`) VALUES
(1, 'Ban Giám Hiệu', 'N1', '01', '01@gmail.com', NULL),
(2, 'Hội Đồng Trường', 'N2', '02', '02@gmail.com', NULL),
(3, 'Khoa Kỹ Thuật', 'N3', '03', '03@gmail.com', NULL),
(4, 'Kỹ Thuật Điện', 'N4', '04', '04@gmail.com', 3),
(5, 'Kỹ Thuật Ô tô', 'N5', '05', '05@gmail.com', 3),
(6, 'Khoa Kinh Tế', 'N6', '06', '06@gmail.com', NULL),
(7, 'Khinh Tế Đối Ngoại', 'N7', '071', '071@gmail.com', 6),
(8, 'Kinh tế Học', 'N7', '072', '072@gmail.com', 6),
(9, 'Thư Viện', 'N8', '08', '08@gmail.com', NULL),
(10, 'Y Tế', 'N9', '09', '09@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passWord` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `passWord`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idPerson`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `idPerson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

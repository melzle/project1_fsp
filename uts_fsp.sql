-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 03:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_fsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `idhari` int(11) NOT NULL,
  `nama` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`idhari`, `nama`) VALUES
(1, 'Minggu'),
(2, 'Senin'),
(3, 'Selasa'),
(4, 'Rabu'),
(5, 'Kamis'),
(6, 'Jumat'),
(7, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `nrp` char(9) NOT NULL,
  `idhari` int(11) NOT NULL,
  `idjam_kuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`nrp`, `idhari`, `idjam_kuliah`) VALUES
('160420400', 1, 1),
('160420400', 2, 2),
('160420400', 3, 3),
('160420400', 3, 6),
('160420400', 5, 10),
('160420400', 6, 11),
('160420400', 7, 12),
('160420401', 1, 12),
('160420401', 2, 11),
('160420401', 3, 10),
('160420401', 5, 3),
('160420401', 6, 2),
('160420401', 7, 1),
('160420402', 1, 1),
('160420402', 1, 6),
('160420402', 1, 12),
('160420402', 2, 2),
('160420402', 2, 6),
('160420402', 2, 11),
('160420402', 3, 3),
('160420402', 3, 6),
('160420402', 3, 10),
('160420402', 4, 1),
('160420402', 4, 2),
('160420402', 4, 3),
('160420402', 4, 4),
('160420402', 4, 5),
('160420402', 4, 6),
('160420402', 4, 7),
('160420402', 4, 8),
('160420402', 4, 9),
('160420402', 4, 10),
('160420402', 4, 11),
('160420402', 4, 12),
('160420402', 5, 3),
('160420402', 5, 6),
('160420402', 5, 10),
('160420402', 6, 2),
('160420402', 6, 6),
('160420402', 6, 11),
('160420402', 7, 1),
('160420402', 7, 6),
('160420402', 7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jam_kuliah`
--

CREATE TABLE `jam_kuliah` (
  `idjam_kuliah` int(11) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jam_kuliah`
--

INSERT INTO `jam_kuliah` (`idjam_kuliah`, `jam_mulai`, `jam_selesai`) VALUES
(1, '07:00:00', '07:55:00'),
(2, '07:55:00', '08:50:00'),
(3, '08:50:00', '09:45:00'),
(4, '09:45:00', '10:40:00'),
(5, '10:40:00', '11:35:00'),
(6, '11:35:00', '12:25:00'),
(7, '13:00:00', '13:55:00'),
(8, '13:55:00', '14:50:00'),
(9, '14:50:00', '15:45:00'),
(10, '15:45:00', '16:40:00'),
(11, '16:40:00', '17:35:00'),
(12, '17:35:00', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` char(9) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`) VALUES
('160420400', 'Gaban'),
('160420401', 'Sharivan'),
('160420402', 'Shaider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`idhari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`nrp`,`idhari`,`idjam_kuliah`),
  ADD KEY `fk_mahasiswa_has_hari_hari1_idx` (`idhari`),
  ADD KEY `fk_mahasiswa_has_hari_mahasiswa_idx` (`nrp`),
  ADD KEY `fk_mahasiswa_has_hari_jam_kuliah1_idx` (`idjam_kuliah`);

--
-- Indexes for table `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  ADD PRIMARY KEY (`idjam_kuliah`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `idhari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  MODIFY `idjam_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_mahasiswa_has_hari_hari1` FOREIGN KEY (`idhari`) REFERENCES `hari` (`idhari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_has_hari_jam_kuliah1` FOREIGN KEY (`idjam_kuliah`) REFERENCES `jam_kuliah` (`idjam_kuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_has_hari_mahasiswa` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

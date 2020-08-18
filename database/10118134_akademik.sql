-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 02:51 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `10118134_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(8) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `matakuliah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `matakuliah`) VALUES
('15000001', 'Anji', 'Basis Data 2'),
('15000002', 'Yandi', 'Metode Numerik'),
('15000003', 'Dwikeu', 'Kalkulus 1'),
('15000004', 'Angga', 'Bahasa Indonesia'),
('15000005', 'Rudi', 'Basis Data 1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(8) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jurusan`) VALUES
('10118001', 'Andhika Galih', 'Sistem Informasi'),
('10118002', 'Aden Syakir', 'Teknik Informatika'),
('10118003', 'Budi Halim', 'Sistem informasi'),
('10118004', 'Adriansyah', 'Sistem Informasi'),
('10118005', 'Randy', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(5) NOT NULL,
  `nama_matakuliah` varchar(50) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `sks`) VALUES
('1001', 'Bahasa Indonesia', 2),
('1002', 'Bahasa Inggris', 2),
('1003', 'Matdas', 3),
('3001', 'Kalkulus 1', 3),
('3002', 'Basis Data 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) DEFAULT NULL,
  `kode_matakuliah` varchar(5) DEFAULT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkuliahan`
--

INSERT INTO `perkuliahan` (`id`, `nim`, `kode_matakuliah`, `nip`, `nilai`) VALUES
(2, '10118003', '3002', '15000005', 85),
(3, '10118005', '1002', '15000001', 85),
(4, '10118001', '1001', '15000004', 70),
(5, '10118005', '3001', '15000003', 79),
(6, '10118004', '3001', '15000003', 82),
(7, '10118001', '1001', '15000004', 70),
(8, '10118002', '1001', '15000004', 90),
(9, '10118003', '3002', '15000005', 90),
(10, '10118002', '1003', '15000009', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indexes for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

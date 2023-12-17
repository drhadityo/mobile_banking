-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 10:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password`, `nama`) VALUES
('Ahmad21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Ahmad Nasrudin Jamil'),
('Dohan21', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Dohan Rizky Hadityo'),
('Zaky21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Muhammad Adam Zaky Jiddya');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(25) NOT NULL,
  `username_admin` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan','') DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tempat` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `username_admin`, `password`, `nik`, `nama`, `email`, `jns_kelamin`, `agama`, `pekerjaan`, `no_tlp`, `alamat`, `tempat`, `tgl_lahir`) VALUES
('agil11', 'Ahmad21', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', '09574268', 'Agil Putra Sanjaya', 'sanjaya32@gmail.com', 'Laki-laki', 'Islam', 'Wirausahawan', '0926372293723', 'Pucuk', 'Lamongan', '1998-06-26'),
('danuali45', 'Ahmad21', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, 'Ali Danu Erlangga', 'erlanggadanu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('renata11', 'Dohan21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '65427426', 'Renata Anjani Yuliana ', 'renatasena17@gmail.com', 'Perempuan', 'Kristen', 'Web Designer', '0816373836344', 'Kamal', 'Lamongan', '2002-12-09'),
('rezabahar11', 'Ahmad21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '24156543', 'Reza Baharudin Akbar', 'rezakbar31@gmail.com', 'Laki-laki', 'Islam', 'Arsitek', '09656376459', 'Sugio', 'Kedungpring', '1980-11-26'),
('Rudi44', 'Dohan21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '98231527', 'Rudianto Zaza  Ibrahim', 'rudianto11@gmail.com', 'Laki-laki', 'Islam', 'Wirausahawan', '088456789365', 'Gresik', 'Gresik', '2022-11-10'),
('safiraningrum12', 'Dohan21', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '12546753', 'Safira Ningrum Putri ', 'putrinignrum77@gmail.com', 'Perempuan', 'Islam', 'Akuntansi', '08328346638', 'Kamal', 'Kamal', '1990-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `no_rek` varchar(16) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`no_rek`, `username`, `balance`) VALUES
('142728', 'rezabahar11', '17942667'),
('162826', 'rezabahar11', '850000'),
('231567', NULL, '23757333'),
('241536', 'Rudi44', '2100000'),
('273232', 'Rudi44', '15500000'),
('274821', 'rezabahar11', '6000000'),
('342162', 'safiraningrum12', '5500000'),
('345236', 'agil11', '5000000'),
('826182', NULL, '5000000'),
('873733', 'rezabahar11', '7800000');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `tgl_transfer` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_rek` varchar(16) NOT NULL,
  `rek_no_rek` varchar(6) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`tgl_transfer`, `no_rek`, `rek_no_rek`, `jumlah`, `keterangan`) VALUES
('2022-11-26 06:37:18', '162826', '273232', '500000', 'Bayar COD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username_admin` (`username_admin`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`no_rek`),
  ADD KEY `nik` (`username`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`tgl_transfer`),
  ADD KEY `no_rek` (`no_rek`),
  ADD KEY `rek_no_rek` (`rek_no_rek`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`);

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `rekening_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE SET NULL;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_2` FOREIGN KEY (`no_rek`) REFERENCES `rekening` (`no_rek`),
  ADD CONSTRAINT `transfer_ibfk_3` FOREIGN KEY (`rek_no_rek`) REFERENCES `rekening` (`no_rek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

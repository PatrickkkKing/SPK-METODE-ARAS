-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 01:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_aras`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_konversi`
--

CREATE TABLE `data_konversi` (
  `id` int(11) NOT NULL,
  `alternatif` int(20) NOT NULL,
  `pembukaan_rekening` int(20) NOT NULL,
  `penarikan_uang_di_bank` int(20) NOT NULL,
  `transfer_antar_bank` int(20) NOT NULL,
  `transfer_beda_bank` int(20) NOT NULL,
  `pinjaman` int(20) NOT NULL,
  `tabungan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_konversi`
--

INSERT INTO `data_konversi` (`id`, `alternatif`, `tinggi_badan`, `berat_badan`, `berpenampilan_menarik`, `menguasai_panggung`) VALUES
(1, 'Haris Kurniawa', 4, 4, '4', '2'),
(2, 'Ryan Miranda', 4, 3, '5', '5'),
(3, 'Reza Arianda', 5, 3, '4', '4'),
(4, 'Philip', 5, 3, '4', '5'),
(5, 'Dara Risty', 4, 2, '5', '4'),
(6, 'Putri Afriani', 4, 3, '3', '2'),
(7, 'Nadia', 3, 2, '4', '4'),
(8, 'Ariansyah', 4, 3, '5', '5'),
(9, 'Nanda', 5, 4, '5', '4'),
(10, 'Olivia', 4, 2, '5', '4'),
(11, 'Meghna Sharma', 5, 3, '5', '5'),
(12, 'Fawaz Rizaka', 4, 3, '4', '5'),
(13, 'Meihani Putri', 3, 2, '3', '4'),
(14, 'Niken Wulandari', 4, 3, '2', '3'),
(15, 'Zura Alvira', 5, 4, '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `data_matrik`
--

CREATE TABLE `data_matrik` (
  `id` int(10) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `tinggi_badan` int(10) NOT NULL,
  `berat_badan` int(10) NOT NULL,
  `berpenampilan_menarik` int(15) NOT NULL,
  `menguasai_panggung` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_matrik`
--

INSERT INTO `data_matrik` (`id`, `alternatif`, `tinggi_badan`, `berat_badan`, `berpenampilan_menarik`, `menguasai_panggung`) VALUES
(1, '-', 5, 4, 5, 5),
(2, 'Haris Kurniawa', 4, 4, 4, 2),
(3, 'Ryan Miranda', 4, 3, 5, 5),
(4, 'Reza Arianda', 5, 3, 4, 4),
(5, 'Philip', 5, 3, 4, 5),
(6, 'Dara Risty', 4, 2, 5, 4),
(7, 'Putri Afriani', 4, 3, 3, 2),
(8, 'Nadia', 3, 2, 4, 4),
(9, 'Ariansyah', 4, 3, 5, 5),
(10, 'Nanda', 5, 4, 5, 4),
(11, 'Olivia', 4, 2, 5, 4),
(12, 'Meghna Sharma', 5, 3, 5, 5),
(13, 'Fawaz Rizaka', 4, 3, 4, 5),
(14, 'Meihani Putri', 3, 2, 3, 4),
(15, 'Niken Wulandari', 4, 3, 2, 3),
(16, 'Zura Alvira', 5, 4, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `data_primer`
--

CREATE TABLE `data_primer` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `tinggi_badan` int(10) NOT NULL,
  `berat_badan` int(5) NOT NULL,
  `berpenampilan_menarik` varchar(15) NOT NULL,
  `menguasai_panggung` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_primer`
--

INSERT INTO `data_primer` (`id`, `alternatif`, `tinggi_badan`, `berat_badan`, `berpenampilan_menarik`, `menguasai_panggung`) VALUES
(1, 'Haris Kurniawa', 175, 65, 'Menarik', 'Kurang Baik'),
(2, 'Ryan Miranda', 178, 60, 'Sangat Menarik', 'Sangat Baik'),
(3, 'Reza Arianda', 182, 60, 'Menarik', 'Baik'),
(4, 'Philip', 180, 60, 'Menarik', 'Sangat Baik'),
(5, 'Dara Risty', 170, 50, 'Sangat Menarik', 'Baik'),
(6, 'Putri Afriani', 170, 55, 'Cukup', 'Kurang Baik'),
(7, 'Nadia', 168, 49, 'Menarik', 'Baik'),
(8, 'Ariansyah', 173, 58, 'Sangat Menarik', 'Sangat Baik'),
(9, 'Nanda', 180, 71, 'Sangat Menarik', 'Baik'),
(10, 'Olivia', 174, 50, 'Sangat Menarik', 'Baik'),
(11, 'Meghna Sharma', 183, 60, 'Sangat Menarik', 'Sangat Baik'),
(12, 'Fawaz Rizaka', 179, 58, 'Menarik', 'Sangat Baik'),
(13, 'Meihani Putri', 165, 50, 'Cukup', 'Baik'),
(14, 'Niken Wulandari', 173, 62, 'Kurang Menarik', 'Cukup'),
(15, 'Zura Alvira', 180, 65, 'Menarik', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `no` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `nilai_optimum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`no`, `alternatif`, `nilai_optimum`) VALUES
(1, '-', 0.0769),
(2, 'Haris Kurniawa', 0.0634),
(3, 'Ryan Miranda', 0.0648),
(4, 'Reza Arianda', 0.0662),
(5, 'Philip', 0.0677),
(6, 'Dara Risty', 0.057),
(7, 'Putri Afriani', 0.0543),
(8, 'Nadia', 0.0481),
(9, 'Ariansyah', 0.0648),
(10, 'Nanda', 0.0754),
(11, 'Olivia', 0.057),
(12, 'Meghna Sharma', 0.0707),
(13, 'Fawaz Rizaka', 0.0618),
(14, 'Meihani Putri', 0.0452),
(15, 'Niken Wulandari', 0.0529),
(16, 'Zura Alvira', 0.0739);

-- --------------------------------------------------------

--
-- Table structure for table `hasil2`
--

CREATE TABLE `hasil2` (
  `no` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil2`
--

INSERT INTO `hasil2` (`no`, `alternatif`, `nilai_akhir`) VALUES
(2, 'Haris Kurniawa', 0.8244),
(3, 'Ryan Miranda', 0.8427),
(4, 'Reza Arianda', 0.8609),
(5, 'Philip', 0.8804),
(6, 'Dara Risty', 0.7412),
(7, 'Putri Afriani', 0.7061),
(8, 'Nadia', 0.6255),
(9, 'Ariansyah', 0.8427),
(10, 'Nanda', 0.9805),
(11, 'Olivia', 0.7412),
(12, 'Meghna Sharma', 0.9194),
(13, 'Fawaz Rizaka', 0.8036),
(14, 'Meihani Putri', 0.5878),
(15, 'Niken Wulandari', 0.6879),
(16, 'Zura Alvira', 0.961);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `tinggi_badan` float NOT NULL,
  `berat_badan` float NOT NULL,
  `berpenampilan_menarik` float NOT NULL,
  `menguasai_panggung` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id`, `alternatif`, `tinggi_badan`, `berat_badan`, `berpenampilan_menarik`, `menguasai_panggung`) VALUES
(1, '-', 0.0735, 0.0833, 0.0746, 0.0758),
(2, 'Haris Kurniawa', 0.0588, 0.0833, 0.0597, 0.0303),
(3, 'Ryan Miranda', 0.0588, 0.0625, 0.0746, 0.0758),
(4, 'Reza Arianda', 0.0735, 0.0625, 0.0597, 0.0606),
(5, 'Philip', 0.0735, 0.0625, 0.0597, 0.0758),
(6, 'Dara Risty', 0.0588, 0.0417, 0.0746, 0.0606),
(7, 'Putri Afriani', 0.0588, 0.0625, 0.0448, 0.0303),
(8, 'Nadia', 0.0441, 0.0417, 0.0597, 0.0606),
(9, 'Ariansyah', 0.0588, 0.0625, 0.0746, 0.0758),
(10, 'Nanda', 0.0735, 0.0833, 0.0746, 0.0606),
(11, 'Olivia', 0.0588, 0.0417, 0.0746, 0.0606),
(12, 'Meghna Sharma', 0.0735, 0.0625, 0.0746, 0.0758),
(13, 'Fawaz Rizaka', 0.0588, 0.0625, 0.0597, 0.0758),
(14, 'Meihani Putri', 0.0441, 0.0417, 0.0448, 0.0606),
(15, 'Niken Wulandari', 0.0588, 0.0625, 0.0299, 0.0455),
(16, 'Zura Alvira', 0.0735, 0.0833, 0.0597, 0.0758);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi_terbobot`
--

CREATE TABLE `normalisasi_terbobot` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `tinggi_badan` float NOT NULL,
  `berat_badan` float NOT NULL,
  `berpenampilan_menarik` float NOT NULL,
  `menguasai_panggung` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi_terbobot`
--

INSERT INTO `normalisasi_terbobot` (`id`, `alternatif`, `tinggi_badan`, `berat_badan`, `berpenampilan_menarik`, `menguasai_panggung`) VALUES
(1, '-', 0.0294, 0.025, 0.0149, 0.0076),
(2, 'Haris Kurniawa', 0.0235, 0.025, 0.0119, 0.003),
(3, 'Ryan Miranda', 0.0235, 0.0188, 0.0149, 0.0076),
(4, 'Reza Arianda', 0.0294, 0.0188, 0.0119, 0.0061),
(5, 'Philip', 0.0294, 0.0188, 0.0119, 0.0076),
(6, 'Dara Risty', 0.0235, 0.0125, 0.0149, 0.0061),
(7, 'Putri Afriani', 0.0235, 0.0188, 0.009, 0.003),
(8, 'Nadia', 0.0176, 0.0125, 0.0119, 0.0061),
(9, 'Ariansyah', 0.0235, 0.0188, 0.0149, 0.0076),
(10, 'Nanda', 0.0294, 0.025, 0.0149, 0.0061),
(11, 'Olivia', 0.0235, 0.0125, 0.0149, 0.0061),
(12, 'Meghna Sharma', 0.0294, 0.0188, 0.0149, 0.0076),
(13, 'Fawaz Rizaka', 0.0235, 0.0188, 0.0119, 0.0076),
(14, 'Meihani Putri', 0.0176, 0.0125, 0.009, 0.0061),
(15, 'Niken Wulandari', 0.0235, 0.0188, 0.006, 0.0046),
(16, 'Zura Alvira', 0.0294, 0.025, 0.0119, 0.0076);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_konversi`
--
ALTER TABLE `data_konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_matrik`
--
ALTER TABLE `data_matrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_primer`
--
ALTER TABLE `data_primer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `hasil2`
--
ALTER TABLE `hasil2`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi_terbobot`
--
ALTER TABLE `normalisasi_terbobot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_konversi`
--
ALTER TABLE `data_konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_matrik`
--
ALTER TABLE `data_matrik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_primer`
--
ALTER TABLE `data_primer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hasil2`
--
ALTER TABLE `hasil2`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `normalisasi_terbobot`
--
ALTER TABLE `normalisasi_terbobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 10:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyektekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `item_image_directory` varchar(255) NOT NULL,
  `size_s` int(11) DEFAULT NULL,
  `size_m` int(11) DEFAULT NULL,
  `size_l` int(11) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `item_image_directory`, `size_s`, `size_m`, `size_l`, `harga`) VALUES
(1, 'Street Tee 1', 'assets/images/street1.jpg', 1, 1, 0, '210.000'),
(2, 'Street Tee 2', 'assets/images/street2.jpg', 1, 1, 2, '250.000'),
(3, 'Street Tee 3', 'assets/images/street3.jpg', 0, 0, 0, '125.000'),
(4, 'Street Tee 4', 'assets/images/street4.jpg', 0, 0, 1, '175.000'),
(6, 'testing', 'assets/images/BackgroundPlasticBlack.png', 0, 0, 0, '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `size` varchar(2) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `no_order` varchar(255) DEFAULT NULL,
  `id_baju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `size`, `email`, `kuantitas`, `no_order`, `id_baju`) VALUES
(1, '2020-12-18', 'M', 'dummy@dummy.com', 1, '4245994487699', 1),
(2, '2020-12-18', 'M', 'dummy@dummy.com', 1, '91834110464', 1),
(3, '2020-12-18', 'M', 'dummy@dummy.com', 1, '42401117702', 2),
(4, '2020-12-18', 'L', 'dummy@dummy.com', 1, '8294021033069', 1),
(5, '2020-12-18', 'M', 'dummysecond@dummy.second', 1, '575828730808', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `alamat`, `password`) VALUES
(1, 'dummy@dummy.com', 'dummy', 'dummyalamat2', 'dummy'),
(2, 'dummysecond@dummy.second', 'dummysecond', 'dummysecondalamat2', 'dummysecond'),
(3, 'admin@bajuku.com', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

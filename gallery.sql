-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 03:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `userid`, `tanggal_dibuat`) VALUES
(11, 'kenagan', 'masa asam sama amas', 5, '2024-02-20 21:03:05'),
(12, 'Tugas', 'Haduh meledak ', 5, '2024-02-20 21:20:38'),
(13, 'Foto', 'c', 3, '2024-02-21 03:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `lokasifile`, `albumid`, `userid`, `tanggal_dibuat`) VALUES
(9, 'Pas aku Sama Tasya', 'Jadi gais ini cerita nya dikasih tugas terus difotoin', '1708484797_IMG-20240205-WA0046.jpg', 11, 5, '2024-02-20 17:00:00'),
(10, 'a', 'a', '1708506240_IMG-20240205-WA0046.jpg', 13, 3, '2024-02-20 17:00:00'),
(11, 'a', 'a', '1709479348_IMG-20240205-WA0025.jpg', 11, 5, '2024-03-02 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(23, 9, 5, 'anjai tugas apaantuh', '2024-02-21 06:59:36'),
(24, 10, 3, 'aduh', '2024-02-21 09:15:47'),
(25, 9, 3, 'Wih lucukk', '2024-02-24 09:36:45'),
(26, 9, 3, 'hadeuh', '2024-02-24 09:46:16'),
(27, 11, 4, 'alo', '2024-03-03 16:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(4, 9, 5, '2024-02-20 17:00:00'),
(6, 10, 3, '2024-02-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `level`, `tanggal_dibuat`, `foto_profil`) VALUES
(1, 'user1', '12345', 'user1@gmail.com', 'User 01', 'admin', '2024-02-20 20:24:09', ''),
(3, 'Tsyakmlaa', 'Tasyauser123', 'tasyauser99@gmail.com', 'Tasya Kamila', 'user', '2024-02-11 22:09:13', ''),
(4, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', '0000-00-00 00:00:00', ''),
(5, 'Tk', 'tk', 'asdfgh@sdfghgmail.com', 'asdfghjk', 'user', '2024-02-21 02:55:58', ''),
(6, 'fghhjjk', 'fhgjhkj', 'sfdgfhjh@rgfhgj', 'hj', 'user', '2024-02-20 12:59:08', ''),
(7, '<h1> Rakamz </h1>', 'sdfghj', 'tabah.tdy@gmail.com', 'sdfghjk', 'user', '2024-02-22 20:02:50', ''),
(8, '', '', '', '', 'user', '2024-03-03 13:26:55', ''),
(9, '', '', '', '', 'user', '2024-03-03 13:26:59', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

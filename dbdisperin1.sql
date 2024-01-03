-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 03, 2024 at 04:06 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdisperin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ikm`
--

DROP TABLE IF EXISTS `ikm`;
CREATE TABLE IF NOT EXISTS `ikm` (
  `idIkm` int NOT NULL AUTO_INCREMENT,
  `idKategori` int DEFAULT NULL,
  `namaPemilik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namaBrand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahunBerdiri` year NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `noTelp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idIkm`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ikm`
--

INSERT INTO `ikm` (`idIkm`, `idKategori`, `namaPemilik`, `namaBrand`, `logo`, `tahunBerdiri`, `alamat`, `noTelp`) VALUES
(25, 28, 'Silva', 'Butik Ipa', 'Picture1.png', '2020', 'jl bersama', '2312321123213'),
(26, 27, 'Ridho', 'Ridho Multimedia', 'stretched-1920-1080-1149777.jpg', '2020', 'Jl dengan dia', '2313123'),
(27, 26, 'Yesa', 'Yesa Jimbe', 'Screenshot 2023-07-06 185224.png', '2021', 'jl in aja', '2312312'),
(28, 26, 'Karin', 'Karin Restaurant', 'photo_2023-04-14_17-36-09.jpg', '2021', 'Jl dgn yesa', '3123123'),
(51, 28, 'ASDSA', 'ASDAD', 'Screenshot 2023-05-04 224948.png', '2023', 'asdadasda', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `idKategori` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategori`) VALUES
(26, 'Makanan'),
(27, 'Teknologi'),
(28, 'Pakaian'),
(29, 'Seni');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `idProduk` int NOT NULL AUTO_INCREMENT,
  `idIkm` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namaProduk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsiProduk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idProduk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `idIkm`, `namaProduk`, `deskripsiProduk`) VALUES
(6, '27', 'Jimbe Papua', 'Jimbe asli dari papua'),
(7, '25', 'Baju Gamis', 'Gamis asli dari arab\r\n'),
(8, '26', 'LiveStream ', 'LiveStram dengan kualitas Terbaik'),
(9, '28', 'Seblak', 'Seblak Enak niqmatt\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idAkun` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAkun`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idAkun`, `nama`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '123', 1),
(3, 'asd', 'asd@adad.com', '123', 0),
(4, 'user', 'user@1.com', '123', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

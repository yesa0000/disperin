-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 14.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

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
-- Struktur dari tabel `ikm`
--

CREATE TABLE `ikm` (
  `idIkm` int(11) NOT NULL,
  `idKategori` int(11) DEFAULT NULL,
  `idAkun` varchar(255) DEFAULT NULL,
  `namaPemilik` varchar(255) NOT NULL,
  `namaBrand` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tahunBerdiri` year(4) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noTelp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ikm`
--

INSERT INTO `ikm` (`idIkm`, `idKategori`, `idAkun`, `namaPemilik`, `namaBrand`, `logo`, `tahunBerdiri`, `alamat`, `noTelp`) VALUES
(57, 29, '6', 'Yesa Alza', 'sdsdfsd', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'jl. pangeran marto', '0812345678'),
(60, 29, '7', 'ridho', 'dhohh', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2024', 'jl. pangeran marto', '122383'),
(61, 26, '8', 'dewi', 'hohh', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2024', 'jl. pangeran ', '123456788'),
(62, 29, '9', 'hadi putra', 'hadi musik', 'IMG_6645.JPG', '2023', 'jl . lunjuk', '123456'),
(63, 27, '10', 'ade', 'destore', 'IMG_6639.JPG', '2024', 'jl. pangeran marto', '083173845273');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategori`) VALUES
(26, 'Makanan'),
(27, 'Teknologi'),
(28, 'Pakaian'),
(29, 'Seni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `idIkm` varchar(255) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `deskripsiProduk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT '26',
  `fotoproduk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `idIkm`, `namaProduk`, `deskripsiProduk`, `kategori`, `fotoproduk`) VALUES
(1, '61', 'guy', 'hahaha', '27', ''),
(2, '57', 'Gorengan', 'enak', '26', ''),
(4, '62', 'gitar kayu', 'alat musik petik', '29', ''),
(5, '63', 'kocak', 'wkwkwk', '27', 'uploads/DIV EDITOR NOV.jpg'),
(6, '63', 'diamon', '100', '27', 'uploads/DIV VE NOV.jpg'),
(7, '63', 'diamon', 'r', '27', 'uploads/DIVISI VE.jpg'),
(8, '63', 'diamon', 'aaa', '26', 'uploads/DIV VE NOV.jpg'),
(9, '57', 'lerr', 'wewewe', '27', 'uploads/DIV EDITOR NOV.jpg'),
(10, '57', 'lerr', 'wewewe', '27', 'uploads/DIV EDITOR NOV.jpg'),
(11, '63', 'adeee', 'aaaaa', '27', 'uploads/Screenshot (37).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idAkun` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idAkun`, `nama`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '123', 1),
(6, 'yesa', 'yesa@gmail.com', '123', 0),
(8, 'dewi', 'dewi@gmail.com', '123', 0),
(9, 'hadi putra', 'hadi@gmail.com', '123', 0),
(10, 'ade', 'adedwiprayoga01@gmail.com', 'ade', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ikm`
--
ALTER TABLE `ikm`
  ADD PRIMARY KEY (`idIkm`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idAkun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ikm`
--
ALTER TABLE `ikm`
  MODIFY `idIkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

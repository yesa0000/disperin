-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2024 pada 13.29
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
  `idAkun` varchar(50) DEFAULT NULL,
  `namaPemilik` varchar(50) NOT NULL,
  `namaBrand` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tahunBerdiri` year(4) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ikm`
--

INSERT INTO `ikm` (`idIkm`, `idKategori`, `idAkun`, `namaPemilik`, `namaBrand`, `logo`, `tahunBerdiri`, `alamat`, `noTelp`) VALUES
(82, 28, '23', 'Yesa Alza', 'Yesa Baju Batik', 'uploads/batik_3.jpg', '2022', 'Jl. pangeran marto', '08123456798'),
(83, 29, '24', 'ibu gina', 'ibu gina lukisan', 'uploads/png-clipart-art-painting-business-design-logo-vertebrate.png', '2023', 'jl. lunjuk', '08132456765'),
(84, 27, NULL, 'asdasd', 'asdasd', 'uploads/pengertian seni lukis.jpg', '2024', 'sdasd', '23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategori`) VALUES
(26, 'Makanan'),
(27, 'Teknologi'),
(28, 'Pakaian'),
(29, 'Seni'),
(31, 'Alat Kuli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `idIkm` varchar(60) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `deskripsiProduk` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT '26',
  `fotoproduk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `idIkm`, `namaProduk`, `deskripsiProduk`, `kategori`, `fotoproduk`) VALUES
(97, '82', 'Batik Cewek', 'Batik menggunakan bahan kain', '28', 'uploads/OIP (1).jpg'),
(98, '83', 'lukisan burung', 'lukisan pakai air', '29', 'uploads/33e2c2a096b98ac7dec7e62be41194a8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idAkun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idAkun`, `nama`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70 ', 1),
(22, 'Rani Putri', 'rani@gmail.com', '871237bf25ba34556a2755fdf2f0ee44', 0),
(23, 'Yesa Alza', 'yesa@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(24, 'ibu gina', 'gina@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

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
  MODIFY `idIkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

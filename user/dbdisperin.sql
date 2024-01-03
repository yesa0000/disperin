-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2023 pada 03.56
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

INSERT INTO `ikm` (`idIkm`, `idKategori`, `namaPemilik`, `namaBrand`, `logo`, `tahunBerdiri`, `alamat`, `noTelp`) VALUES
(1, NULL, 'adasd', 'asdasd', '0000', '0000', 'asdadas', 'asd12'),
(2, NULL, 'asdasd', 'asdsad', '0000', '0000', 'asdasda', '231313'),
(3, NULL, 'asdasd', 'asdasd', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', 'asda'),
(4, NULL, 'asda', 'asdasda', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', '2323'),
(5, NULL, 'asda', 'asdasda', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', '2323'),
(6, NULL, 'asda', 'asdasda', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', '2323'),
(7, NULL, 'asda', 'asdasda', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', '2323'),
(8, NULL, 'asda', 'asdasda', '4276c2aeda78a33a50fe9c4841d70f3c.png', '2023', 'asdasd', '2323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `idIkm` varchar(255) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `deskripsiProduk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idAkun` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idAkun`, `nama`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '123', '1'),
(3, 'asd', 'asd@adad.com', '123', '0');

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
  MODIFY `idIkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

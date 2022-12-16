-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Des 2022 pada 05.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_4_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(2, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(3, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(4, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(5, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(6, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(7, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(8, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(9, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(10, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(11, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(12, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(13, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(14, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(16, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(17, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(18, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111'),
(19, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(20, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587'),
(21, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'ivankomang@ary', '082399480587'),
(22, 'mudle', 'c4ca4238a0b923820dcc509a6f75849b', 'Moodle_komang@ary', '082399480587'),
(23, 'ary123', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@aryasas', '082399480587'),
(24, 'aryarte', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary123', '082399480587'),
(25, 'ary12_ary', '202cb962ac59075b964b07152d234b70', 'komang@ary.com', '082399480587');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

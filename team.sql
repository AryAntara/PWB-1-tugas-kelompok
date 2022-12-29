-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Des 2022 pada 10.42
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'anak'),
(2, 'pria'),
(6, 'wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_produk` varchar(225) NOT NULL,
  `type` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `jenis_kelamin` enum('1','2','3') NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `negara_asal` varchar(100) NOT NULL,
  `dikirim_dari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `stok`, `gambar_produk`, `type`, `merek`, `jenis_kelamin`, `bahan`, `negara_asal`, `dikirim_dari`) VALUES
(1, 6, 'Caroline Alperstedt', 'Selina Sling Bag Tas Fashion Selempang Wanita</br>\r\nModel minimalis yang cocok untuk gaya Kasual</br>\r\n</br>\r\n<table>\r\n<tr><td>Details</td></tr>\r\n<tr><td><p class=\"m-0 mx-2\">Bahan</p></td><td>: Kulit Sintetis</td></tr>\r\n<tr><td><p class=\"m-0 mx-2\">Dimensi</p></td><td>: P 17.5 x L 6 x T 14 cm</td></tr>\r\n<tr><td><p class=\"m-0 mx-2\">Warna</p></td><td>: Hitam, Cokelat</td></tr>\r\n<tr><td><p class=\"m-0 mx-2\">Berat</p></td><td>: 700 gram</td></tr>\r\n</table>\r\n', 500000, 999, 'assets/img/product/tas/tas-7.jpg', 'tas', '', '1', '', '', ''),
(2, 6, 'Faux Leather Crossbody', 'Size 25x14x9cm<br/>\r\nQUALITY VIP PLATINUM 1:1<br/>\r\n(Berdasarkan ORIGINAL)<br/><br/>\r\n<table>\r\n<tr><td>MATERIAL</td><td>: Lambskin Leather</td></tr>\r\n<tr><td>INCLUDE</td><td>: Invoice, Dustbag, Box Magnet</td></tr>\r\n<tr><td>BERAT</td><td>: 1.3 KG (INCLUDE BOX)</td></tr>\r\n</table>', 450000, 551, 'assets/img/product/tas/tas-8.jpg', 'tas', 'Tertasan', '2', 'lambskin leather', 'Indonesia', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `favorit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone_number`, `favorit`) VALUES
(1, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', '[\"1\",\"2\",\"1\",\"2\"]'),
(2, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(3, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(4, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(5, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(6, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(7, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(8, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(9, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(10, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(11, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(12, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(13, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(14, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(16, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(17, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(18, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(19, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(20, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(21, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'ivankomang@ary', '082399480587', ''),
(22, 'mudle', 'c4ca4238a0b923820dcc509a6f75849b', 'Moodle_komang@ary', '082399480587', ''),
(23, 'ary123', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@aryasas', '082399480587', ''),
(24, 'aryarte', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary123', '082399480587', ''),
(25, 'ary12_ary', '202cb962ac59075b964b07152d234b70', 'komang@ary.com', '082399480587', ''),
(26, 'aryantara', 'c20ad4d76fe97759aa27a0c99bff6710', 'komang@ary12', '019228931723', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

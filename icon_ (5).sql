-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2020 pada 16.21
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icon+`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `perfonmasi_jaringan`
--

CREATE TABLE `perfonmasi_jaringan` (
  `id_data` int(11) NOT NULL,
  `u_pln` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `bandwith` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `asman` varchar(50) NOT NULL,
  `peru` varchar(50) NOT NULL,
  `jml` int(11) NOT NULL,
  `dur` time NOT NULL,
  `stan` decimal(11,2) NOT NULL,
  `rele` decimal(11,2) NOT NULL,
  `id_tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perfonmasi_jaringan`
--

INSERT INTO `perfonmasi_jaringan` (`id_data`, `u_pln`, `link`, `product`, `bandwith`, `service_id`, `asman`, `peru`, `jml`, `dur`, `stan`, `rele`, `id_tanggal`) VALUES
(8, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR - UP2D] BASECAMP GRUP HAR CIREBON', ' IPVPN ', 0, 1000056487, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 5),
(9, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR - UP2D] BASECAMP GRUP HAR CIREBON', ' IPVPN ', 0, 2147483647, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 1),
(10, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR - UP2D] GI KOSAMBI BARU', ' IPVPN ', 1, 1000071327, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 1),
(11, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR] KANTOR UID JABAR - TELKOMSEL DAGO (AMR)', 'CLEAR CHANNEL', 2, 1000048577, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 1),
(12, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR] KANTOR UID JABAR', 'INTERNET', 30, 2147483647, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 1),
(13, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR] UP2D JABAR', 'I-WIN INDOOR', 0, 2147483647, 'JABAR 1', '', 0, '00:00:00', '99.00', '100.00', 2),
(14, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR - UP2D] GH KLMS - UKB', ' IPVPN ', 0, 1000035262, 'JABAR 1', 'Link SCADA', 1, '10:11:00', '99.00', '98.64', 2),
(15, 'PLN UNIT INDUK DISTRIBUSI JAWA BARAT', '[UID JABAR] ULP INDRAMAYU KOTA', ' IPVPN ', 1, 1000048315, 'JABAR 1', 'Link SCADA', 1, '17:54:00', '99.00', '97.59', 2),
(16, 'PLN UNIT INDUK PUSAT PENGATUR BEBAN', '[UIP2B - UP2B JABAR] GITET SAGULING 500 kV', 'INTERNET', 5, 2147483647, 'JABAR 1', '', 1, '25:54:00', '99.00', '96.52', 2),
(17, 'PLN UNIT INDUK PUSAT PENGATUR BEBAN', '[UIP2B - UP2B JABAR] GITET SAGULING 500 kV', 'I-WIN INDOOR', 0, 2147483647, 'JABAR 1', '', 1, '08:00:00', '99.00', '98.92', 2),
(18, 'PLN UNIT INDUK PUSAT PENGATUR BEBAN', '[UIP2B - UP2B JABAR] GI CIBADAK BARU - GI LEMBUR SITU 150 KV', 'CLEAR CHANNEL', 2, 1000051930, 'JABAR 2', '', 1, '10:37:00', '99.00', '98.57', 1),
(19, 'PLN UNIT INDUK PUSAT PENGATUR BEBAN', '[UIP2B - UP2B JABAR] GI LEMBUR SITU - GI UBRUG (WAN TI)', 'CLEAR CHANNEL', 2, 1000051916, 'JABAR 2', '', 1, '10:37:00', '99.00', '98.57', 1),
(21, 'dsaas', 'sda', 'sadsad', 0, 0, 'sdasdsa', 'saasd', 0, '00:00:00', '0.00', '0.00', 2),
(23, 'sdadsa', 'sadsa', '', 0, 0, 'dsadsad231sad', '', 0, '00:00:00', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal`
--

CREATE TABLE `tanggal` (
  `id_tanggal` int(11) NOT NULL,
  `dates` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggal`
--

INSERT INTO `tanggal` (`id_tanggal`, `dates`) VALUES
(1, 'Desember / 2020'),
(2, 'januari / 2021'),
(5, 'February / 2021'),
(7, 'January / 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `ia` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usr`
--

INSERT INTO `usr` (`id`, `name`, `email`, `image`, `password`, `roles_id`, `ia`, `date_create`) VALUES
(1, 'momos', 'momo@gm.cos', 'default.png', '$2y$10$FnY7lE1Xlb.BLGEqPKez3O3tyWtSWydzajoDkp8gEmFazCxenIQ6W', 2, 1, 1592186187),
(2, 'admin', 'admin@gm.cos', 'default.png', '$2y$10$RUlFZbf0kYRK9k2HZs4JAeL5VpjFttjatuupLskBFHo8fWEO/HiZW', 1, 1, 1593671871);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usr_role`
--

CREATE TABLE `usr_role` (
  `roles_id` int(11) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usr_role`
--

INSERT INTO `usr_role` (`roles_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `perfonmasi_jaringan`
--
ALTER TABLE `perfonmasi_jaringan`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_tanggal` (`id_tanggal`);

--
-- Indeks untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id_tanggal`);

--
-- Indeks untuk tabel `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `usr_role`
--
ALTER TABLE `usr_role`
  ADD PRIMARY KEY (`roles_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perfonmasi_jaringan`
--
ALTER TABLE `perfonmasi_jaringan`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `usr_role`
--
ALTER TABLE `usr_role`
  MODIFY `roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

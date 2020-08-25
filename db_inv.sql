-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2020 pada 11.26
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(4) NOT NULL,
  `id_satuan` int(3) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `stok`, `id_satuan`, `harga_beli`, `harga_jual`) VALUES
(2, 'Penggaris', 60, 1, 1000, 2000),
(3, 'Buku Tulis sidu', 65, 1, 3000, 3500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_transaksi`
--

CREATE TABLE `tb_m_transaksi` (
  `kode_transaksi` varchar(16) NOT NULL,
  `tgl_transaksi` varchar(11) NOT NULL,
  `tgl_ditambahkan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_m_transaksi`
--

INSERT INTO `tb_m_transaksi` (`kode_transaksi`, `tgl_transaksi`, `tgl_ditambahkan`) VALUES
('USP250820BRX', '25/08/2020', '2020-08-25 13:12:44'),
('USP250820FVY', '25/08/2020', '2020-08-25 13:12:44'),
('USP250820PEM', '25/08/2020', '2020-08-25 17:25:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'dus'),
(3, 'botol'),
(7, 'lusin'),
(8, 'kotak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(16) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_transaksi`, `id_barang`, `jumlah`) VALUES
(4, 'USP250820BRX', 2, 5),
(5, 'USP250820FVY', 3, 10),
(6, 'USP250820FVY', 2, 5),
(7, 'USP250820PEM', 3, 10),
(8, 'USP250820PEM', 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_m_transaksi`
--
ALTER TABLE `tb_m_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

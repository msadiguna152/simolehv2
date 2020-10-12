-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 09:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `rincian_alamat` text NOT NULL,
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `id_pembeli`, `alamat_lengkap`, `rincian_alamat`, `lat`, `long`) VALUES
(2, 1, 'Jalan Dua Mas Putra', 'Kosan berwarna Abu-abu', '1111', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(1, 'Makanan', 'makanan'),
(2, 'Minuman', 'minuman'),
(3, 'Pakaian', 'pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id_pembeli`, `nama_pembeli`, `no_telpon`, `email`, `password`) VALUES
(1, 'Adiguna', '6285245462842', 'msadiguna152@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `email`, `no_telpon`, `level`) VALUES
(1, 'Adiguna', '1', '1', 'msadiguna152@gmail.com', '085245462842', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `cara_pembayaran` varchar(50) NOT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ongkir` int(20) NOT NULL,
  `voucher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_pembeli`, `cara_pembayaran`, `total_pembayaran`, `tanggal_pesanan`, `status`, `ongkir`, `voucher`) VALUES
(1, 1, 'COD', '20000', '2020-10-02 00:00:00', '1', 20000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `harga_promosi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `promosi` int(11) NOT NULL,
  `terlaris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `harga_promosi`, `deskripsi`, `gambar`, `promosi`, `terlaris`) VALUES
(5, 1, 'Wadai Untuk', '1000', '0', '', 'img058.jpg', 0, 0),
(6, 1, 'Okkey Jelly Drink', '2000', '1000', 'Minuman Ringan Penunda Lapar', '123', 1, 1),
(8, 3, 'Es Kelapa Muda', '2000', '2000', 'test', 'logo_d.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian_pesanan`
--

CREATE TABLE `tb_rincian_pesanan` (
  `id_rincian_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `banyak` varchar(20) NOT NULL,
  `total_harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sliders`
--

CREATE TABLE `tb_sliders` (
  `id_sliders` int(11) NOT NULL,
  `url_sliders` varchar(50) NOT NULL,
  `gambar_slider` varchar(25) NOT NULL,
  `keterangan_sliders` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_rincian_pesanan`
--
ALTER TABLE `tb_rincian_pesanan`
  ADD PRIMARY KEY (`id_rincian_pesanan`);

--
-- Indexes for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  ADD PRIMARY KEY (`id_sliders`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_rincian_pesanan`
--
ALTER TABLE `tb_rincian_pesanan`
  MODIFY `id_rincian_pesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  MODIFY `id_sliders` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

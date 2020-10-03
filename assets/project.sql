-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 06:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tanggal_artikel` varchar(20) NOT NULL,
  `status_artikel` varchar(20) NOT NULL,
  `foto_artikel` varchar(100) DEFAULT NULL,
  `file_artikel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_pengguna`, `judul_artikel`, `isi_artikel`, `tanggal_artikel`, `status_artikel`, `foto_artikel`, `file_artikel`) VALUES
(8, 1, 'Strategi Pencegahan Penyakit Tular Vektor DBD di Kota Pekanbaru', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', '29/04/2020', 'Tidak Aktif', 'cerita-rakyat-indonesia-keong-mas.jpg', ''),
(9, 1, 'Strategi Pencegahan Penyakit Tular Vektor DBD di Kota Pekanbaru', '<p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test&nbsp;</p><p>test&nbsp;<span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><span style="font-size: 1rem;">test&nbsp;</span><br></p> ', '06/05/2020', 'Tidak Aktif', 'welcome.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `kode_pendaftar` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `alasan_mendaftar` text NOT NULL,
  `tanggal_pendaftar` varchar(50) DEFAULT NULL,
  `status_pendaftar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `kode_pendaftar`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `nomor_hp`, `alamat`, `pekerjaan`, `pendidikan_terakhir`, `dokumen`, `alasan_mendaftar`, `tanggal_pendaftar`, `status_pendaftar`) VALUES
(1, '63010101111111', 'Muhammad Syahbani Adiguna', 'Laki-laki', 'Banjarmasin', '23/11/1996', 'msadiguna152@gmail.com', '6282274307701', 'Jl. Bina Bersama RT.02 RW.01 Ds. Sarikandi Kec. Kurau', 'Honorer', 'D3 Teknik Informatika', '123', 'Ingin Mencari Ilmu', '2020-04-28 10:14:31am', 'Aktif'),
(8, '000000000000123', 'Muhammad Syahbani Adiguna', 'Laki-laki', 'Banjarmasin', '23/11/1996', 'msadiguna152@gmail.com', '85245462842', 'Kurau', 'Petani', 'D3', 'fast-food-restaurant-counter (1).zip', 'Bekerja', '2020-05-05 17:47:29', 'Konfirmasi'),
(10, '0987654321', 'Adiguna', 'Laki-laki', 'Bjm', '23/11/1996', 'adiguna152@gmail.com', '+6285245462842', 'Kurau', 'Petani', 'D3', 'fast-food-restaurant-counter_(1).zip', 'Belajar', '2020-05-05 18:15:36', 'Konfirmasi'),
(11, '12345', 'Adiguna', 'Laki-laki', 'Adiguna', '12/12/2010', 'Adiguna@gmail.com', '+62621862981629', 'Adiguna', 'Adiguna', 'Adiguna', 'flat-design-colorful-characters-welcoming.zip', 'gbhjbbn', '2020-05-07 14:14:44', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pendaftar` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `foto_pengguna` varchar(25) DEFAULT NULL,
  `terakhir_login` varchar(30) DEFAULT NULL,
  `status_login` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `kode_pendaftar`, `username`, `password`, `level`, `nama_pengguna`, `foto_pengguna`, `terakhir_login`, `status_login`) VALUES
(1, '63010101111111', 'admin', 'admin', 'Admin', 'Adiguna152', 'logo_d.png', '07-05-2020 18:20:31', 'Offline'),
(4, '000000000000123', '000000000000123', '000000000000123', 'User', 'Muhammad Syahbani Adiguna', 'user.png', NULL, NULL),
(5, '0987654321', '0987654321', '0987654321', 'User', 'Adiguna', 'user.png', NULL, NULL),
(6, '6301010111111', '12345', '12345', 'User', 'Adiguna', 'user.png', '07-05-2020 14:17:17', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status_penerima` varchar(20) NOT NULL,
  `tanggal_pesan` varchar(30) NOT NULL,
  `file_pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nama_sosmed` varchar(50) NOT NULL,
  `url_sosmed` text NOT NULL,
  `jenis_sosmed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `id_pengguna`, `nama_sosmed`, `url_sosmed`, `jenis_sosmed`) VALUES
(4, 1, 'adiguna152', 'https://www.instagram.com/adiguna152', 'Instagram'),
(9, 1, 'adiguna152', 'https://www.facebook.com/msadiguna.fromsarikandi', 'Facebook'),
(12, 1, '6285245462842', '6285245462842', 'WhatsApp'),
(13, 1, 'msadiguna152@gmail.com', 'msadiguna152@gmail.com', 'G-mail');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `judul_video` varchar(100) NOT NULL,
  `deskripsi_video` text NOT NULL,
  `tanggal_video` varchar(20) NOT NULL,
  `status_video` varchar(20) NOT NULL,
  `url_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_pengguna`, `judul_video`, `deskripsi_video`, `tanggal_video`, `status_video`, `url_video`) VALUES
(2, 1, 'DJ ~ Biarkan Semuanya Berlalu Pergi Dan Takkan Kembali Mantul Viral', 'Selamat mendengarkan kasih santuy\r\nJngan Lupa Sireket ???? Up 100k', '03/05/2020', 'Tidak Aktif', 'https://www.youtube.com/watch?v=-SKNYjbce9Y'),
(3, 1, 'Dj terakhir - sufian suhaimi breakbeat mixtape full bass 2020', '', '06/05/2020', 'Tidak Aktif', 'https://www.youtube.com/watch?v=lSx3vBx5TTc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD UNIQUE KEY `kode_pendaftar` (`kode_pendaftar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

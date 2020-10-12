-- MariaDB dump 10.17  Distrib 10.5.5-MariaDB, for osx10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: projek
-- ------------------------------------------------------
-- Server version	10.5.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_alamat`
--

DROP TABLE IF EXISTS `tb_alamat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `rincian_alamat` text NOT NULL,
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alamat`
--

LOCK TABLES `tb_alamat` WRITE;
/*!40000 ALTER TABLE `tb_alamat` DISABLE KEYS */;
INSERT INTO `tb_alamat` VALUES (1,1,'Jalan Dua Mas Putra','Kosan berwarna Abu-abu','-3.7550099','114.7662845'),(4,3,'Jln. Bina Bersama RT.02 RW.01 Desa Sarikandi Kec. Kurau','Didepan rumah yang ada pohon beringin','-3.6055826','114.6971873'),(5,3,'Jln. Dua Mas Putra','Kosan warna abu-abu','-3.6055826','114.6971873'),(6,3,'Komplek Wengga Pabahanan, Pabahanan,Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia,70815','Dekat Kantor Desa Pabahanan','-3.7711493','114.7694261'),(12,-1,'SMP Negeri 2 Pelaihari Jalan A. Syairani,Kompleks Perkantoran,Angsau,Kecamatan Pelaihari,Kabupaten Tanah Laut,Kalimantan Selatan,Indonesia,70814','tes','-3.8081261','114.7872752'),(13,-1,'Komplek Wengga Pabahanan Pabahanan,Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia,70815','','-3.7711493','114.7694261'),(14,-1,'RumahSakit Sungai Riam,Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia,70815','Pas di depan rumah sakit tak tunggu','-3.8557579','114.7261654'),(15,-1,'Taman Desa Pabahanan Jalan Surapit,Limbang,Sarawak,Malaysia,98700','Deket sawah itu, jangan lupa ya? ','4.7843991','114.9954462'),(16,-1,'Komplek Wengga Pabahanan Pabahanan,Pelaihari,Tanah Laut Regency,South Kalimantan,Indonesia,70815','','-3.7711493','114.7694261');
/*!40000 ALTER TABLE `tb_alamat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Makanan','makanan','8.svg'),(2,'Minuman','minuman','5.svg'),(3,'Pakaian','pakaian','7.svg');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pembeli`
--

DROP TABLE IF EXISTS `tb_pembeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pembeli` (
  `id_pembeli` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pembeli` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pembeli`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pembeli`
--

LOCK TABLES `tb_pembeli` WRITE;
/*!40000 ALTER TABLE `tb_pembeli` DISABLE KEYS */;
INSERT INTO `tb_pembeli` VALUES (1,'Adiguna','6285245462842','msadiguna152@gmail.com','1'),(3,'Syahbani Adiguna','6295245462842','dev@gopedia.id','1'),(4,'','','',''),(5,'','','',''),(6,'','','',''),(7,'','','',''),(8,'','','',''),(9,'','','',''),(10,'','','',''),(11,'','','',''),(12,'','','',''),(13,'','','',''),(14,'','','',''),(15,'','','',''),(16,'','','','');
/*!40000 ALTER TABLE `tb_pembeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengaturan`
--

DROP TABLE IF EXISTS `tb_pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_bisnis` varchar(50) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `id_tipe_ongkir` int(11) NOT NULL,
  `alamat_toko` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengaturan`
--

LOCK TABLES `tb_pengaturan` WRITE;
/*!40000 ALTER TABLE `tb_pengaturan` DISABLE KEYS */;
INSERT INTO `tb_pengaturan` VALUES (1,'E-Commerce Simpel Oleh Oleh (SIMOLEH)','6285245462842',1,'Jln. Bina Bersama RT.01 RW.02 Desa Sarikandi Kecamatan Kurau','Tanah Laut','Kalimantan Selatan','-','-');
/*!40000 ALTER TABLE `tb_pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengguna`
--

DROP TABLE IF EXISTS `tb_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengguna`
--

LOCK TABLES `tb_pengguna` WRITE;
/*!40000 ALTER TABLE `tb_pengguna` DISABLE KEYS */;
INSERT INTO `tb_pengguna` VALUES (1,'Adiguna','1','1','msadiguna152@gmail.com','085245462842','Admin');
/*!40000 ALTER TABLE `tb_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pesanan`
--

DROP TABLE IF EXISTS `tb_pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_alamat` int(11) NOT NULL,
  `cara_pembayaran` varchar(50) NOT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ongkir` int(20) NOT NULL,
  `voucher` varchar(20) NOT NULL,
  `kode_pembayaran` text DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pesanan`
--

LOCK TABLES `tb_pesanan` WRITE;
/*!40000 ALTER TABLE `tb_pesanan` DISABLE KEYS */;
INSERT INTO `tb_pesanan` VALUES (1,1,'COD','20000','2020-10-02 00:00:00','1',20000,'20000',NULL),(3,15,'OVO','10000','2020-10-10 17:15:55','PENDING',0,'0','ovo-ewallet-1602350154-1628793341'),(4,15,'OVO','10000','2020-10-10 17:16:26','PENDING',0,'0','ovo-ewallet-1602350185-97664363'),(5,15,'OVO','10000','2020-10-10 17:23:58','PENDING',0,'0','ovo-ewallet-1602350637-443915437'),(6,15,'OVO','10000','2020-10-10 17:32:18','PENDING',0,'0','ovo-ewallet-1602351137-1829346718'),(7,15,'OVO','10000','2020-10-10 17:33:02','COMPLETED',0,'0','ovo-ewallet-1602351180-434537346'),(8,16,'OVO','10000','2020-10-12 10:29:39','PENDING',0,'0','ovo-ewallet-1602498578-1587514020'),(9,16,'OVO','9000','2020-10-12 11:22:10','PENDING',0,'0','ovo-ewallet-1602501729-2104016032'),(10,16,'OVO','9000','2020-10-12 11:23:46','PENDING',0,'0','ovo-ewallet-1602501824-610044855');
/*!40000 ALTER TABLE `tb_pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produk`
--

DROP TABLE IF EXISTS `tb_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `harga_promosi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `promosi` int(11) NOT NULL,
  `terlaris` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produk`
--

LOCK TABLES `tb_produk` WRITE;
/*!40000 ALTER TABLE `tb_produk` DISABLE KEYS */;
INSERT INTO `tb_produk` VALUES (1,1,'Wadai Untuk','1000','0','','v1.jpg',0,0),(2,1,'Okkey Jelly Drink','2000','1000','Minuman Ringan Penunda Lapar','v1.jpg',1,1),(3,2,'Es Kelapa Muda','2000','0','test','v1.jpg',1,1);
/*!40000 ALTER TABLE `tb_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rincian_pesanan`
--

DROP TABLE IF EXISTS `tb_rincian_pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_rincian_pesanan` (
  `id_rincian_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` varchar(20) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rincian_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rincian_pesanan`
--

LOCK TABLES `tb_rincian_pesanan` WRITE;
/*!40000 ALTER TABLE `tb_rincian_pesanan` DISABLE KEYS */;
INSERT INTO `tb_rincian_pesanan` VALUES (1,1,1,'2','300000'),(2,1,2,'3','10000'),(3,3,1,'2','2000'),(4,3,2,'8','8000'),(5,4,1,'2','2000'),(6,4,2,'8','8000'),(7,5,1,'2','2000'),(8,5,2,'8','8000'),(9,6,1,'2','2000'),(10,6,2,'8','8000'),(11,7,1,'2','2000'),(12,7,2,'8','8000'),(13,8,1,'2','2000'),(14,8,2,'8','8000'),(15,9,1,'6','6000'),(16,9,2,'1','1000'),(17,9,3,'1','2000'),(18,10,1,'6','6000'),(19,10,2,'1','1000'),(20,10,3,'1','2000');
/*!40000 ALTER TABLE `tb_rincian_pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sliders`
--

DROP TABLE IF EXISTS `tb_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sliders` (
  `id_sliders` int(11) NOT NULL AUTO_INCREMENT,
  `url_sliders` varchar(50) NOT NULL,
  `gambar_slider` varchar(25) NOT NULL,
  `keterangan_sliders` text NOT NULL,
  PRIMARY KEY (`id_sliders`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sliders`
--

LOCK TABLES `tb_sliders` WRITE;
/*!40000 ALTER TABLE `tb_sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sliders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-12 19:54:37

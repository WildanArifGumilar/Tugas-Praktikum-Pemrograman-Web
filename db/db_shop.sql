-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 09:50 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'superuser');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `id_baju` int(11) NOT NULL,
  `nama_baju` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `harga_pokok` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` varchar(10) NOT NULL,
  `kategori` int(11) NOT NULL,
  `populer` int(11) NOT NULL,
  `paling_banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id_baju`, `nama_baju`, `gambar`, `harga_pokok`, `harga_jual`, `keterangan`, `stok`, `kategori`, `populer`, `paling_banyak`) VALUES
(32, 'Baju Batik', 'gambar/5YfuKnSW_400x400.jpg', '5000', '250000', 'berbahan batik berkualitas tinggi di import dari majenang', '100', 12, 1, 0),
(33, 'Kaos Drone', 'gambar/418qENme5XL.jpg', '2500', '75000', 'berbahan kain berkualitas rendah dengan harga mahal', '250', 11, 0, 0),
(34, 'Jas', 'gambar/2013-wholesale-autumn-foreign-trade-men-s.jpg', '100000', '1000000', 'jas berkualitas premium yang limited edition', '2', 12, 1, 0),
(35, 'Dreambirds batik', 'gambar/d78b083da2e198e7db26b5154cb16b6e--pakaian-gaya-celana-panjang.jpg', '50000', '1000000', 'jaket limited edition +bonus (bungkus kresek)', '1', 13, 2, 1),
(36, 'gothic costume girl', 'gambar/gothic lolita.jpg', '50000', '500000', 'costume anime gothic + bonus poster katalog produk tersebut', '0', 14, 2, 1),
(37, 'blazer limited', 'gambar/HTB1EnBTLXXXXXaOaXXXq6xXFXXXR.jpg', '250000', '500000', 'blazer dengan kulit macan asli (trio macan)', '9', 13, 1, 1),
(38, 'Kaos Loli', 'gambar/images5Y2UW61C.jpg', '50000', '1000000', 'didapatkan di polsek terdekat + tercyduk', '1', 11, 0, 0),
(39, 'Kaos futsal', 'gambar/img484-1416750886.jpg', '50000', '75000', 'dengan bahan dingin', '100', 11, 0, 0),
(40, 'Japanese Anime Cospl', 'gambar/Japanese-Anime-Cosplay-Sword-Art-Online-Kirito-Cosplay-Costume-Set-for-Men-BLACK.jpg_640x640.jpg', '350000', '2000000', 'dapatkan penawaran menarik berupa bonus asuna (dalam bentuk poster)', '1', 14, 0, 0),
(41, 'Jubah Naruto', 'gambar/Jubah-Naruto-Panjang-Jubah-Hokage-Yondaime-Putih110.000.jpg', '250000', '250000', 'dengan memakai jubah ini dipercaya akan bisa rasengan.', '99', 14, 1, 1),
(42, 'Kaos biasa', 'gambar/TR401_9004-Coffee_grande.jpg', '5000', '2000000', 'kaos biasa berkualitas supreme (tapi bohong)', '1', 11, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telfon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `password`, `telfon`, `alamat`, `nama`) VALUES
(110, 'fitri', 'fitri', '081330707045', 'jatikaterban', 'fitria'),
(111, 'asfim', 'asfim', '057898756341', 'mabungg', 'asfiim'),
(112, 'ela', 'ela', '085133777888', 'jatipojok', 'elaaa'),
(113, 'dinda', '12345', '08130707054', 'jati katerban baron nganjuk', 'dindaanika'),
(114, 'raihan', 'raihan', '085678987654', 'papua', 'raihannur'),
(115, 'Wildan', 'wildan', '087728456533', 'Majenang', 'Wildan Arif Gumilar'),
(116, 'Rifan', 'rifan', '012938109283', 'garut', 'rifan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'T-Shirt'),
(12, 'Kemeja'),
(13, 'Jaket'),
(14, 'Anime');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `total_harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `jumlah`, `tanggal`, `id_customer`, `id_baju`, `total_harga`) VALUES
(4, 498, '22-02-2017', 68, 23, '29880000'),
(5, 1, '22-02-2017', 68, 23, '60000');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id`, `id_transaksi`, `gambar`) VALUES
(14, 19, 'konfirmasi/7b79bf87bd6ee695644e2775cd98855e.jpg'),
(15, 22, 'konfirmasi/1aa5862202fb60ffca0a315e7a31ba9d.jpg'),
(16, 23, 'konfirmasi/3f09cb5949dfb5b24448ea884e86d01f.jpg'),
(17, 24, 'konfirmasi/1aa5862202fb60ffca0a315e7a31ba9d.jpg'),
(18, 25, 'konfirmasi/007f5f2bc3a7ba3003cca06ec57c1a67.jpg'),
(19, 26, 'konfirmasi/barangadmin.png'),
(20, 27, 'konfirmasi/tambahbarang.png'),
(21, 29, 'konfirmasi/07ebcfd980ecc5033a0af239c978e192.jpg'),
(22, 32, 'konfirmasi/Untitled-sss1.png'),
(23, 33, 'konfirmasi/Untitled-sss1.png'),
(24, 34, 'konfirmasi/Untitled-sss1.png'),
(25, 35, 'konfirmasi/imgres.jpg'),
(26, 36, 'konfirmasi/3f09cb5949dfb5b24448ea884e86d01f.jpg'),
(27, 37, 'konfirmasi/7b79bf87bd6ee695644e2775cd98855e.jpg'),
(28, 38, 'konfirmasi/1aa5862202fb60ffca0a315e7a31ba9d.jpg'),
(29, 39, 'konfirmasi/007f5f2bc3a7ba3003cca06ec57c1a67.jpg'),
(30, 41, 'konfirmasi/20160911_135122.jpg'),
(31, 40, 'konfirmasi/20160911_135122.jpg'),
(32, 42, 'konfirmasi/20160911_135122.jpg'),
(33, 44, 'konfirmasi/2. Hacker Symbol HD Wallpaper.png'),
(34, 45, 'konfirmasi/Jubah-Naruto-Panjang-Jubah-Hokage-Yondaime-Putih110.000.jpg'),
(35, 46, 'konfirmasi/gothic lolita.jpg'),
(36, 47, 'konfirmasi/HTB1EnBTLXXXXXaOaXXXq6xXFXXXR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subtransaksi`
--

CREATE TABLE `subtransaksi` (
  `id` int(11) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `total_harga` varchar(10) NOT NULL,
  `encrypt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtransaksi`
--

INSERT INTO `subtransaksi` (`id`, `jumlah`, `tanggal`, `id_customer`, `id_baju`, `total_harga`, `encrypt`) VALUES
(43, '3', '24-02-2017', 110, 25, '210000', '28775'),
(44, '5', '24-02-2017', 110, 25, '350000', '26477'),
(45, '3', '25-02-2017', 113, 27, '105000', '6925'),
(46, '2', '25-02-2017', 113, 25, '140000', '6925'),
(47, '2', '25-02-2017', 113, 29, '100000', '32673'),
(48, '3', '25-02-2017', 113, 30, '150000', '32673'),
(49, '2', '25-02-2017', 110, 28, '80000', '11702'),
(50, '3', '25-02-2017', 114, 27, '105000', '6839'),
(51, '1', '19-10-2017', 110, 25, '70000', '22549'),
(52, '1', '19-10-2017', 110, 31, '50000', '28831'),
(54, '3', '19-10-2017', 116, 31, '150000', '5730'),
(55, '1', '19-10-2017', 115, 41, '250000', '24628'),
(56, '1', '19-10-2017', 116, 35, '1000000', '30503'),
(57, '1', '19-10-2017', 116, 36, '500000', '30503'),
(58, '1', '19-10-2017', 110, 37, '500000', '32349');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_subtransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `status`, `tanggal`, `id_customer`, `id_subtransaksi`) VALUES
(45, 'Dalam Pengiriman', '19-10-2017', 115, 24628),
(46, 'Sudah Dikonfirmasi', '19-10-2017', 116, 30503),
(47, 'Menunggu Persetujuan', '19-10-2017', 110, 32349);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id_baju`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtransaksi`
--
ALTER TABLE `subtransaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
  MODIFY `id_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `subtransaksi`
--
ALTER TABLE `subtransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

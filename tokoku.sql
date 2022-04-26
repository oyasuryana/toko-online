-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2022 at 10:23 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Repeat_Loop` ()  BEGIN
   DECLARE A INT;
   SET A = 1;
   REPEAT
   SET A = A + 1;
   SELECT A;
   UNTIL A > 12
   END REPEAT;
   END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kode_produk` char(3) NOT NULL,
  `jml_beli` mediumint(9) NOT NULL,
  `keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `kode_produk`, `jml_beli`, `keterangan`) VALUES
(1, 1, 'p01', 1, 'Hitam - Kuningan'),
(2, 1, 'P02', 1, 'Hitam Biru'),
(3, 1, 'p03', 1, 'Ukuran XL'),
(4, 2, 'p03', 2, 'XL'),
(5, 2, 'p01', 1, 'Hitam - Biru'),
(6, 3, 'p03', 1, 'Ukuran M'),
(7, 3, 'P02', 1, 'Warna Sesui Photo Sample'),
(8, 4, 'p03', 1, 'Warna sesuai gambar contoh'),
(9, 4, 'p01', 2, 'Hitam-Biru'),
(10, 5, 'p03', 1, 'XL'),
(11, 5, 'P02', 1, 'Hitam'),
(12, 5, 'p01', 1, 'Merah'),
(13, 6, 'p01', 1, '-'),
(14, 6, 'P02', 2, ''),
(15, 7, 'p03', 2, 'XL'),
(16, 7, 'P02', 1, 'Hijau'),
(17, 7, 'p01', 1, 'Kuning'),
(18, 8, 'p03', 2, '1-XL 1-L'),
(19, 8, 'P02', 1, 'Merah'),
(20, 8, 'p01', 1, '-'),
(21, 9, 'p01', 1, '-'),
(22, 9, 'P02', 1, '-'),
(23, 10, 'p03', 1, 'M'),
(24, 10, 'P02', 1, '-'),
(25, 11, 'p01', 1, ''),
(26, 11, 'p03', 1, ''),
(27, 12, 'p03', 1, 'warna hitam'),
(28, 13, 'p03', 1, 'L'),
(29, 13, 'P02', 1, '-'),
(30, 14, 'p03', 1, 'Ukuran L, warna hitam muda'),
(31, 14, 'p01', 1, '-'),
(32, 14, 'P02', 1, '-'),
(33, 15, 'p03', 3, 'warna hitam, ukuran L'),
(34, 16, 'P04', 1, '40'),
(35, 16, 'P05', 1, '-'),
(36, 16, 'p03', 2, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `id_inbox` int(11) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(150) NOT NULL,
  `waktu_kirim` datetime NOT NULL,
  `isi_pesan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`id_inbox`, `nama_pengirim`, `email_pengirim`, `waktu_kirim`, `isi_pesan`) VALUES
(1, 'Fajar', 'fajar@yahoo.com', '2018-11-09 04:58:32', 'Tes'),
(2, 'Oya Suryana', 'oyasuryana@yahoo.com', '2019-01-10 01:59:16', 'Tes'),
(3, 'Oya Suryana', 'oyasuryana@yahoo.com', '2019-01-10 01:59:52', 'Tes'),
(4, 'Oya Suryana', 'oyasuryana@yahoo.com', '2019-01-10 01:59:54', 'Tes'),
(5, 'Rika Widiningsih', 'rika@yahoo.com', '2019-01-10 02:01:00', 'tes'),
(6, 'Tes', 'oyasuryana@yahoo.com', '2019-01-10 02:01:55', 'Tes'),
(7, 'Oya Suryana', 'oyasuryana@yahoo.com', '2019-01-10 02:04:03', 'Tes lagi'),
(8, 'Nunik Nurdiati', 'ucuniek@yahoo.com', '2019-01-14 14:20:06', 'Komplain Donk'),
(9, 'Dani', 'dani@yahoo.com', '2019-01-15 00:33:05', 'Ada celana gunung warna hitam muda tidak ?'),
(10, 'Galih', 'galih@yahoo.com', '2019-01-15 00:43:03', 'kalo retur gimana prosesnya ?'),
(11, 'Iqbal', 'iqbal@yahoo.com', '2019-01-25 02:31:49', 'Kumahas sih barang na kepanjanan kaki nya...retur na kumaha ???'),
(12, 'Iqbal', 'iqbal@yahoo.com', '2019-01-25 02:31:51', 'Kumahas sih barang na kepanjanan kaki nya...retur na kumaha ???'),
(13, '', '', '2019-02-01 04:01:15', ''),
(14, 'Sindi', 'sindi@yahoo.com', '2019-02-06 01:32:09', 'Ada power bank ga ??'),
(15, 'Rizky', 'rizky@google.com', '2019-02-06 01:33:59', 'gan salah ukuran...kegedeaan.. calana teu aya lubangan ...gmana returnya ??'),
(16, 'Rizky', 'rizky@google.com', '2019-02-06 01:34:05', 'gan salah ukuran...kegedeaan.. calana teu aya lubangan ...gmana returnya ??'),
(17, 'Asep', 'asep@yahoo.com', '2019-02-07 04:34:23', 'Jual power bank tidak ??'),
(18, 'dani', 'dani@google.com', '2019-02-07 04:35:25', 'Udah tiga pesanan saya belum sampai ??'),
(19, 'Ardanava', 'ardanava16@gmail.com', '2019-02-07 05:32:20', 'Cao ni ma'),
(20, 'Ardanava', 'ardanava16@gmail.com', '2019-02-07 05:32:59', 'Cao ni ma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `id_pembelian` int(11) NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`id_pembelian`, `waktu_konfirmasi`, `bukti_pembayaran`) VALUES
(1, '2019-01-26 05:16:20', '1-bukti_transfer.jpg'),
(2, '2019-01-31 15:43:21', '2-sk_iii_d.jpg'),
(5, '2019-01-26 05:48:33', '5-bukti_transfer_ade_risdiana.png'),
(6, '2019-01-26 15:31:21', '6-IMG-20190115-WA0009.jpg'),
(7, '2019-01-26 04:54:00', '7-VPS-smk2kng4.png'),
(8, '2019-01-31 15:47:31', '8-teamviewer.png'),
(9, '2019-02-04 06:22:01', '9-struk-atm-bri-2013-img-cencored.jpg'),
(11, '2019-01-28 06:09:09', '11-struk-token-pln-500x228.png'),
(13, '2019-02-01 00:37:38', '13-struk-atm-bri-2013-img-cencored.jpg'),
(14, '2019-02-06 01:19:55', '14-struk_atm.png'),
(16, '2019-02-07 04:33:21', '16-struk-atm-bri-2013-img-cencored.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `email` varchar(200) NOT NULL,
  `status_pembelian` enum('selesai','pending') NOT NULL DEFAULT 'pending',
  `rek_tujuan` tinyint(4) NOT NULL,
  `jasa_kurir` tinyint(4) NOT NULL,
  `alamat_tujuan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `tanggal_pembelian`, `email`, `status_pembelian`, `rek_tujuan`, `jasa_kurir`, `alamat_tujuan`) VALUES
(1, '2019-01-14 09:02:25', 'lutfi@yahoo.com', 'selesai', 1, 1, 'Kuningan'),
(2, '2019-01-14 13:41:59', 'ucuniek@yahoo.com', 'selesai', 1, 1, 'Cigadung'),
(3, '2019-01-14 14:12:00', 'ucuniek@yahoo.com', 'pending', 0, 0, ''),
(4, '2019-01-15 00:38:55', 'galih@yahoo.com', 'selesai', 1, 1, 'Kuningan'),
(5, '2019-01-24 03:45:16', 'lutfi@yahoo.com', 'selesai', 1, 1, 'Kuningan'),
(6, '2019-01-24 03:49:12', 'lutfi@yahoo.com', 'selesai', 1, 1, 'Kuningan'),
(7, '2019-01-25 02:27:25', 'iqbal@yahoo.com', 'selesai', 2, 2, 'Desa Bayuning RT 12 RW 03'),
(8, '2019-01-25 03:49:11', 'nurman@google.com', 'selesai', 1, 1, 'Kadugede'),
(9, '2019-01-25 03:52:10', 'nurman@google.com', 'selesai', 2, 4, 'Desa Margabakti - Kadugede\r\nKuningan'),
(10, '2019-01-26 14:10:10', 'ucuniek@yahoo.com', 'pending', 0, 0, ''),
(11, '2019-01-26 15:37:25', 'lutfi@yahoo.com', 'selesai', 1, 2, 'Kuningan'),
(12, '2019-01-28 06:44:51', 'nurmanfauzan001@gmail.com', 'pending', 0, 0, ''),
(13, '2019-02-01 00:33:26', 'lutfi@yahoo.com', 'selesai', 2, 2, 'Cigugur-Kuningan'),
(14, '2019-02-06 01:10:15', 'rizky@google.com', 'selesai', 2, 1, 'RT 01 RW 06 Garawangi'),
(15, '2019-02-07 02:27:42', 'irma@gmail.com', 'pending', 0, 0, ''),
(16, '2019-02-07 04:30:20', 'dani@google.com', 'selesai', 2, 2, 'RT 01 RW 02 Jalaksana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kode_produk` char(3) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_beli` mediumint(9) NOT NULL,
  `harga_jual` mediumint(9) NOT NULL,
  `jml_beli` mediumint(9) NOT NULL,
  `photo_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `nama_produk`, `merk`, `tgl_beli`, `harga_beli`, `harga_jual`, `jml_beli`, `photo_produk`) VALUES
('p01', 'Tas Backpaker Anti Air', 'Eiger', '2019-01-02', 400000, 475000, 15, 'p01.jpg'),
('P02', 'Tas Gendong', 'Eiger', '2019-01-05', 250000, 300000, 10, 'p02.jpg'),
('p03', 'Celana Gunung', 'Eiger', '2019-01-10', 175000, 210000, 24, 'p03.jpg'),
('P04', 'Sepatu', 'Adidas', '2019-06-02', 100000, 150000, 10, 'P04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `email` varchar(200) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `password` char(32) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `level` enum('administrator','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`email`, `nama_lengkap`, `password`, `alamat`, `handphone`, `waktu_daftar`, `level`) VALUES
('ardanava16@gmail.com', 'Ardanava', 'e6fea635a6e2ffc7313dfbb3ae72a9b0', 'Planet Bumi', '', '2019-02-07 04:39:03', 'member'),
('dani@google.com', 'dani', '202cb962ac59075b964b07152d234b70', 'Jalaksana', '', '2019-02-07 04:29:18', 'member'),
('galih@yahoo.com', 'Galih', '202cb962ac59075b964b07152d234b70', 'Kuningan', '', '2019-01-15 00:36:18', 'member'),
('iqbal@yahoo.com', 'Iqbal', '202cb962ac59075b964b07152d234b70', 'Kadugede', '', '2019-01-25 02:26:00', 'member'),
('irma@gmail.com', 'irmayanti', '202cb962ac59075b964b07152d234b70', 'ciherang, kadugede, kuningan', '', '2019-02-07 02:27:04', 'member'),
('lutfi@yahoo.com', 'M. Lutfhi', '202cb962ac59075b964b07152d234b70', 'Kuningan', '', '2019-01-14 03:53:36', 'member'),
('nurman@google.com', 'Nurman', '202cb962ac59075b964b07152d234b70', 'Kadugede', '', '2019-01-25 03:47:56', 'member'),
('nurmanfauzan001@gmail.com', 'nurman fauzan hidayana', '202cb962ac59075b964b07152d234b70', 'sindang jawa', '', '2019-01-28 06:43:19', 'member'),
('oyasuryana@yahoo.com', 'Oya Suryana', '202cb962ac59075b964b07152d234b70', 'Kuningan', '', '2019-01-12 04:59:35', 'administrator'),
('rika.widianingsih@yahoo.com', 'Rika Widianingsih', '602755dcc0177f7ab9fd73d86bc9eb54', 'Bayuning - Kuningan', '083435464531', '2019-01-12 05:02:06', 'member'),
('rizky@google.com', 'Rizky', '202cb962ac59075b964b07152d234b70', 'Garawangi', '', '2019-02-06 01:08:39', 'member'),
('shelasyawalita@gmail.com', 'Shela', '202cb962ac59075b964b07152d234b70', 'Ds. Mekarwangi Kec. Lebakwangi', '', '2019-01-26 15:44:25', 'member'),
('trisukma761@gmail.com', 'Tri Sukma Wijaya', '202cb962ac59075b964b07152d234b70', 'Cibeureum-Kuningan', '', '2019-02-01 04:09:35', 'member'),
('ucuniek@yahoo.com', 'Nunik Nurdiati', '202cb962ac59075b964b07152d234b70', 'Cigadung', '', '2019-01-14 13:41:31', 'member');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_order`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_order` (
`kode_produk` char(3)
,`nama_produk` varchar(150)
,`merk` varchar(100)
,`id_pembelian` int(11)
,`tanggal_pembelian` datetime
,`jml_beli` mediumint(9)
,`harga_jual` mediumint(9)
,`total_harga` bigint(17)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order_pending`
-- (See below for the actual view)
--
CREATE TABLE `v_order_pending` (
`nama_lengkap` varchar(150)
,`email` varchar(200)
,`id_pembelian` int(11)
,`tanggal_pembelian` datetime
,`jumlah_pembelian` decimal(30,0)
,`total_pembelian` decimal(38,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order_selesai`
-- (See below for the actual view)
--
CREATE TABLE `v_order_selesai` (
`nama_lengkap` varchar(150)
,`alamat_tujuan` mediumtext
,`jasa_kurir` tinyint(4)
,`id_pembelian` int(11)
,`email` varchar(200)
,`tanggal_pembelian` datetime
,`jumlah_pembelian` decimal(30,0)
,`total_pembelian` decimal(38,0)
,`bukti_pembayaran` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `v_detail_order`
--
DROP TABLE IF EXISTS `v_detail_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_order`  AS  select `tbl_produk`.`kode_produk` AS `kode_produk`,`tbl_produk`.`nama_produk` AS `nama_produk`,`tbl_produk`.`merk` AS `merk`,`tbl_pembelian`.`id_pembelian` AS `id_pembelian`,`tbl_pembelian`.`tanggal_pembelian` AS `tanggal_pembelian`,`tbl_detail_pembelian`.`jml_beli` AS `jml_beli`,`tbl_produk`.`harga_jual` AS `harga_jual`,(`tbl_detail_pembelian`.`jml_beli` * `tbl_produk`.`harga_jual`) AS `total_harga` from ((`tbl_detail_pembelian` join `tbl_produk` on((`tbl_detail_pembelian`.`kode_produk` = `tbl_produk`.`kode_produk`))) join `tbl_pembelian` on((`tbl_pembelian`.`id_pembelian` = `tbl_detail_pembelian`.`id_pembelian`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_pending`
--
DROP TABLE IF EXISTS `v_order_pending`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_pending`  AS  select `tbl_user`.`nama_lengkap` AS `nama_lengkap`,`tbl_pembelian`.`email` AS `email`,`tbl_pembelian`.`id_pembelian` AS `id_pembelian`,`tbl_pembelian`.`tanggal_pembelian` AS `tanggal_pembelian`,sum(`tbl_detail_pembelian`.`jml_beli`) AS `jumlah_pembelian`,sum((`tbl_detail_pembelian`.`jml_beli` * `tbl_produk`.`harga_jual`)) AS `total_pembelian` from (((`tbl_detail_pembelian` join `tbl_produk` on((`tbl_detail_pembelian`.`kode_produk` = `tbl_produk`.`kode_produk`))) join `tbl_pembelian` on((`tbl_pembelian`.`id_pembelian` = `tbl_detail_pembelian`.`id_pembelian`))) join `tbl_user` on((`tbl_pembelian`.`email` = `tbl_user`.`email`))) where (`tbl_pembelian`.`status_pembelian` = 'pending') group by `tbl_pembelian`.`id_pembelian`,`tbl_pembelian`.`email`,`tbl_pembelian`.`tanggal_pembelian` order by `tbl_pembelian`.`tanggal_pembelian` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_selesai`
--
DROP TABLE IF EXISTS `v_order_selesai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_selesai`  AS  select `tbl_user`.`nama_lengkap` AS `nama_lengkap`,`tbl_pembelian`.`alamat_tujuan` AS `alamat_tujuan`,`tbl_pembelian`.`jasa_kurir` AS `jasa_kurir`,`tbl_pembelian`.`id_pembelian` AS `id_pembelian`,`tbl_pembelian`.`email` AS `email`,`tbl_pembelian`.`tanggal_pembelian` AS `tanggal_pembelian`,sum(`tbl_detail_pembelian`.`jml_beli`) AS `jumlah_pembelian`,sum((`tbl_detail_pembelian`.`jml_beli` * `tbl_produk`.`harga_jual`)) AS `total_pembelian`,`tbl_konfirmasi`.`bukti_pembayaran` AS `bukti_pembayaran` from ((((`tbl_detail_pembelian` left join `tbl_produk` on((`tbl_detail_pembelian`.`kode_produk` = `tbl_produk`.`kode_produk`))) left join `tbl_pembelian` on((`tbl_pembelian`.`id_pembelian` = `tbl_detail_pembelian`.`id_pembelian`))) left join `tbl_user` on((`tbl_pembelian`.`email` = `tbl_user`.`email`))) left join `tbl_konfirmasi` on((`tbl_konfirmasi`.`id_pembelian` = `tbl_detail_pembelian`.`id_pembelian`))) where (`tbl_pembelian`.`status_pembelian` = 'selesai') group by `tbl_pembelian`.`id_pembelian`,`tbl_pembelian`.`email`,`tbl_pembelian`.`tanggal_pembelian` order by `tbl_pembelian`.`tanggal_pembelian` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 05:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `idconoth` int(11) NOT NULL,
  `isis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_analisis`
--

CREATE TABLE `tbl_analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `analisis` text NOT NULL,
  `bulan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_analisis`
--

INSERT INTO `tbl_analisis` (`id_analisis`, `id_indikator`, `id_satker`, `analisis`, `bulan`) VALUES
(6, 4, 1, 'Keterbatasan SDM dalam pelaksanaan kegiatan pengendalian orang, alat angkut, barang dan lingkungan di wilayah kerja', 1),
(7, 4, 1, 'Keterbatasan SDM pada wilker', 2),
(8, 4, 1, 'Kurangnya pengetahuan dan ketrampilansuberdaya dalam rangka kewaspadaan dini, pengendalian penyakir emerging, bencana, kegiatan matra/situasi khusus dan penyelidikan epidemologi', 1),
(11, 6, 1, 'pelaporan dan penginputan E-Monev DJA belum tepat waktu setiap bulannya', 1),
(16, 6, 1, 'Banyak kegiatan masih dalam rencana belum dilaksanakan', 1),
(17, 9, 1, 'Pelatihan SDM masih dalam penjadwalan', 1),
(18, 9, 1, 'Koordinasi dengan lembaga pelatihan teknis', 1),
(19, 4, 1, 'Koordinasi dengan daerah terjangkit ditingkatkan', 2),
(20, 6, 1, 'Monitoring Emonev DJA setiap bulan', 2),
(21, 6, 1, 'Mempercepat pembayaran untuk kegiatan yang sudah dilaksanakan', 2),
(22, 9, 1, 'Menghimbau pegawai untuk mengikuti pelatihan teknis', 2),
(23, 9, 1, 'Koordinasi dengan tim pelatihan', 2),
(24, 4, 1, 'Nambah satu di januari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
(29, 2, 2),
(30, 1, 2),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13),
(35, 1, 14),
(36, 3, 1),
(37, 3, 2),
(38, 3, 3),
(39, 3, 9),
(40, 3, 10),
(41, 3, 11),
(42, 3, 12),
(43, 3, 13),
(44, 3, 14),
(45, 1, 15),
(46, 2, 15),
(47, 2, 14),
(48, 2, 13),
(49, 2, 12),
(50, 2, 11),
(51, 2, 10),
(52, 2, 9),
(53, 3, 15),
(54, 3, 16),
(55, 1, 16),
(56, 1, 17),
(57, 3, 17),
(58, 1, 18),
(59, 3, 18),
(60, 1, 19),
(61, 3, 19),
(62, 1, 20),
(63, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indikator`
--

CREATE TABLE `tbl_indikator` (
  `id_indikator` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `indikator` text NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_indikator`
--

INSERT INTO `tbl_indikator` (`id_indikator`, `id_user_level`, `indikator`, `tahun`) VALUES
(2, 3, 'Jumlah pemeriksaan orang, alat angkut, barang dan lingkungan sesuai standar kekarantinaan kesehatan', '2022'),
(4, 3, 'Persentase faktor risiko penyakit dipintu masuk yang dikendalikan pada orang, alat angkut, barang dan lingkungan', '2022'),
(5, 3, 'Indeks Pengendalian Faktor risiko di pintu masuk negara', '2022'),
(6, 3, 'Nilai kinerja  anggaran', '2022'),
(7, 3, 'Nilai Indikator Kinerja Pelaksanaan Anggaran (IKPA)', '2022'),
(8, 3, 'Kinerja implementasi WBK satker', '2022'),
(9, 3, 'Persentase Peningkatan kapasitas ASN sebanyak 20 JPL', '2022'),
(10, 4, 'Jumlah surveilans faktor risiko dan penyakit berbasis laboratorium yang dilaksanakan', '2022'),
(11, 4, 'Persentase rekomendasi hasil surveilans faktor risiko dan penyakit berbasis laboratorium yang dimanfaatkan', '2022'),
(12, 4, 'Persentase respon sinyal KLB/Bencana  kurang dari 24 jam', '2022'),
(13, 4, 'Teknologi Tepat Guna yang dihasilkan', '2022'),
(14, 4, 'Nilai kinerja  anggaran', '2022'),
(15, 4, 'Nilai Indikator Kinerja Pelaksanaan Anggaran (IKPA)', '2022'),
(16, 4, 'Kinerja implementasi WBK satker', '2022'),
(17, 4, 'Persentase Peningkatan kapasitas ASN sebanyak 20 JPL', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'Master Indikator', 'indikator', 'fa fa-caret-right', 11, 'y'),
(11, 'Master', '#', 'fa fa-caret-square-o-right', 0, 'y'),
(12, 'Master Satker', 'satker', 'fa fa-caret-right', 11, 'y'),
(13, 'Target', 'target', 'fa fa-caret-right', 14, 'y'),
(14, 'Pemantik', '#', 'fa fa-caret-square-o-right', 0, 'y'),
(15, 'contoh', 'contoh', 'fa fa-caret-right', 0, 'y'),
(16, 'Realisasi', 'realisasi', 'fa fa-caret-right', 14, 'y'),
(17, 'Analisis Capaian', 'analisis', 'fa fa-caret-right', 14, 'y'),
(18, 'Rencana Tindak Lanjut', 'rtlanjut', 'fa fa-caret-right', 14, 'y'),
(19, 'RTL2', 'rtlstrategi', 'fa fa-caret-right', 14, 'y'),
(20, 'Update RTL', 'updatertl', 'fa fa-caret-right', 14, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitoring`
--

CREATE TABLE `tbl_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_analisis` int(11) NOT NULL,
  `id_tasks` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `rtl_strategi` text NOT NULL,
  `potential_blocker` text NOT NULL,
  `pic` text NOT NULL,
  `tgl_start` date NOT NULL,
  `tgl_deadline` date NOT NULL,
  `tgl_tercapai` date NOT NULL,
  `upload_bukti` varchar(255) NOT NULL,
  `catatan_pic` text NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=no,1=yes',
  `ara_kasatker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_monitoring`
--

INSERT INTO `tbl_monitoring` (`id_monitoring`, `id_analisis`, `id_tasks`, `id_satker`, `rtl_strategi`, `potential_blocker`, `pic`, `tgl_start`, `tgl_deadline`, `tgl_tercapai`, `upload_bukti`, `catatan_pic`, `status`, `ara_kasatker`) VALUES
(1, 6, 10, 1, 'Call to a member function format() on bool update 2', 'Call to a member function format() on bool update 2', 'update 3 update 2', '2022-09-11', '2022-09-17', '0000-00-00', '1', '2', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker`
--

CREATE TABLE `tbl_satker` (
  `id_satker` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `satker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker`
--

INSERT INTO `tbl_satker` (`id_satker`, `id_user_level`, `satker`) VALUES
(1, 3, 'KKP Kelas I Makassar'),
(2, 3, 'KKP Kelas I Denpasar'),
(3, 3, 'KKP Kelas I Batam'),
(5, 4, 'BBTKLPP Banjarbaru'),
(6, 4, 'BBTKLPP Jakarta'),
(7, 9, 'Direktorat Surkakes'),
(8, 8, 'Direktorat Penyehatan Lingkungan'),
(9, 7, 'Direktorat Pengelolaan Imunisasi'),
(10, 6, 'Direktorat P2PTM'),
(11, 5, 'Direktorat P2PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_target`
--

CREATE TABLE `tbl_target` (
  `id_target` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `target` decimal(7,2) NOT NULL,
  `realisasi` decimal(7,2) NOT NULL,
  `capaian` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_target`
--

INSERT INTO `tbl_target` (`id_target`, `id_indikator`, `id_satker`, `bulan`, `target`, `realisasi`, `capaian`) VALUES
(2, 2, 3, '1', '1.00', '1.00', '1.00'),
(5, 4, 1, '2', '1.00', '1.00', '1.00'),
(7, 4, 1, '1', '100.00', '2.00', '2.00'),
(8, 9, 1, '1', '10.00', '90.00', '900.00'),
(9, 6, 1, '1', '20.00', '50.00', '250.00'),
(10, 6, 1, '2', '90.00', '0.00', '0.00'),
(11, 9, 1, '2', '60.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `id_tasks` int(11) NOT NULL,
  `id_analisis` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `tasks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`id_tasks`, `id_analisis`, `id_satker`, `tasks`) VALUES
(1, 17, 1, 'Tasks 20 JPL Januari Pelatihan SDm'),
(2, 22, 1, 'Tasks 20 JPL Januari Pelatihan SDM'),
(3, 17, 1, 'Tasks 20 JPL Januari Pelatihan SDM DUA'),
(4, 22, 1, '20 JPL Februari  Menghimbau pegawai'),
(5, 11, 1, 'nilai januari pelaporan'),
(6, 11, 1, 'nilai januari pelaporan dua'),
(7, 24, 1, 'Nambah jadi satu'),
(8, 7, 1, 'Presentase februari keterbatasan SDM'),
(9, 19, 1, 'koordinasi'),
(10, 6, 1, 'SDM lagi Update 3'),
(11, 24, 1, 'jan'),
(12, 6, 1, 'SDM'),
(13, 7, 1, 'Wilker');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `idsatker` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `idsatker`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 1, 'Nuris Akbar M.Kom', 'nuris.akbar@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(3, 1, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y'),
(7, 1, 'KKP Kelas I Makassar', 'kk1@mail.com', '$2y$04$KmI1/9en9Ml0pVuOxQmME.38NngH505rTS40G0KzkUHTtwes4Nm7u', 'anonym.jpg', 3, 'y'),
(8, 3, 'KKP Kelas I Batam', 'kk2@mail.com', '$2y$04$LZyWRMcgCpWm0JIINu7jpum2EvA7FFzeg629i7dzB7fNvlYuP5Y6W', '', 3, 'y'),
(10, 5, 'BBTKLPP Banjarbaru', 'ewe@hjk.ll', '$2y$04$QZiE9ih5tRIUcK58/s9vq.dIq9uzTGs5qbHB3k9p1IGjZa7NW/T46', '', 3, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'KKP'),
(4, 'B/BTKLPP'),
(5, 'Dit P2PM'),
(6, 'Dit P2PTM'),
(7, 'Dit Pengelolaan Imunisasi'),
(8, 'Dit PL'),
(9, 'Dit Surkarkes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_analisis`
-- (See below for the actual view)
--
CREATE TABLE `v_analisis` (
`id_analisis` int(11)
,`id_indikator` int(11)
,`indikator` text
,`tahun` varchar(4)
,`id_satker` int(11)
,`satker` text
,`analisis` text
,`bulan` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_indikator`
-- (See below for the actual view)
--
CREATE TABLE `v_indikator` (
`id_indikator` int(11)
,`id_user_level` int(11)
,`nama_level` varchar(30)
,`indikator` text
,`tahun` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_realisasi`
-- (See below for the actual view)
--
CREATE TABLE `v_realisasi` (
`id_target` int(11)
,`id_indikator` int(11)
,`indikator` text
,`tahun` varchar(4)
,`id_satker` int(11)
,`id_users` int(11)
,`bulan` varchar(255)
,`target` decimal(7,2)
,`realisasi` decimal(7,2)
,`capaian` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rtl`
-- (See below for the actual view)
--
CREATE TABLE `v_rtl` (
`id_tasks` int(11)
,`id_satker` int(11)
,`satker` text
,`id_indikator` int(11)
,`indikator` text
,`id_analisis` int(11)
,`analisis` text
,`tasks` text
,`bulan` int(5)
,`tahun` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rtl_2`
-- (See below for the actual view)
--
CREATE TABLE `v_rtl_2` (
`id_monitoring` int(11)
,`id_satker` int(11)
,`satker` text
,`id_indikator` int(11)
,`indikator` text
,`id_analisis` int(11)
,`analisis` text
,`id_tasks` int(11)
,`tasks` text
,`bulan` int(5)
,`rtl_strategi` text
,`potential_blocker` text
,`pic` text
,`tgl_start` date
,`tgl_deadline` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rtl_3`
-- (See below for the actual view)
--
CREATE TABLE `v_rtl_3` (
`id_monitoring` int(11)
,`id_satker` int(11)
,`satker` text
,`id_indikator` int(11)
,`indikator` text
,`id_analisis` int(11)
,`analisis` text
,`id_tasks` int(11)
,`tasks` text
,`bulan` int(5)
,`rtl_strategi` text
,`potential_blocker` text
,`pic` text
,`tgl_start` date
,`tgl_deadline` date
,`tgl_tercapai` date
,`upload_bukti` varchar(255)
,`catatan_pic` text
,`status` enum('0','1')
,`tgl_sekarang` date
,`stwarna` varchar(1)
,`stket` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_satker`
-- (See below for the actual view)
--
CREATE TABLE `v_satker` (
`id_satker` int(11)
,`id_user_level` int(11)
,`nama_level` varchar(30)
,`satker` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_target`
-- (See below for the actual view)
--
CREATE TABLE `v_target` (
`id_target` int(11)
,`id_indikator` int(11)
,`indikator` text
,`tahun` varchar(4)
,`id_satker` int(11)
,`id_users` int(11)
,`bulan` varchar(255)
,`target` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_targetanalisis`
-- (See below for the actual view)
--
CREATE TABLE `v_targetanalisis` (
`id_target` int(11)
,`id_indikator` int(11)
,`indikator` text
,`tahun` varchar(4)
,`id_satker` int(11)
,`id_users` int(11)
,`bulan` varchar(255)
,`target` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Structure for view `v_analisis`
--
DROP TABLE IF EXISTS `v_analisis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_analisis`  AS SELECT `tbl_analisis`.`id_analisis` AS `id_analisis`, `tbl_analisis`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_indikator`.`tahun` AS `tahun`, `tbl_analisis`.`id_satker` AS `id_satker`, `tbl_satker`.`satker` AS `satker`, `tbl_analisis`.`analisis` AS `analisis`, `tbl_analisis`.`bulan` AS `bulan` FROM ((`tbl_analisis` join `tbl_indikator` on(`tbl_analisis`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_satker` on(`tbl_analisis`.`id_satker` = `tbl_satker`.`id_satker`)) ORDER BY `tbl_analisis`.`id_indikator` ASC, `tbl_analisis`.`bulan` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_indikator`
--
DROP TABLE IF EXISTS `v_indikator`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_indikator`  AS SELECT `tbl_indikator`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`id_user_level` AS `id_user_level`, `tbl_user_level`.`nama_level` AS `nama_level`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_indikator`.`tahun` AS `tahun` FROM (`tbl_indikator` join `tbl_user_level` on(`tbl_indikator`.`id_user_level` = `tbl_user_level`.`id_user_level`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_realisasi`
--
DROP TABLE IF EXISTS `v_realisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_realisasi`  AS SELECT `tbl_target`.`id_target` AS `id_target`, `tbl_target`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_indikator`.`tahun` AS `tahun`, `tbl_target`.`id_satker` AS `id_satker`, `tbl_user`.`id_users` AS `id_users`, `tbl_target`.`bulan` AS `bulan`, `tbl_target`.`target` AS `target`, `tbl_target`.`realisasi` AS `realisasi`, `tbl_target`.`capaian` AS `capaian` FROM ((((`tbl_target` join `tbl_indikator` on(`tbl_target`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_user_level` on(`tbl_indikator`.`id_user_level` = `tbl_user_level`.`id_user_level`)) join `tbl_satker` on(`tbl_target`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_user_level`.`id_user_level` = `tbl_satker`.`id_user_level`)) join `tbl_user` on(`tbl_satker`.`id_satker` = `tbl_user`.`idsatker`)) GROUP BY `tbl_target`.`id_target` ORDER BY `tbl_target`.`id_indikator` ASC, `tbl_target`.`bulan` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_rtl`
--
DROP TABLE IF EXISTS `v_rtl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_rtl`  AS SELECT `tbl_tasks`.`id_tasks` AS `id_tasks`, `tbl_tasks`.`id_satker` AS `id_satker`, `tbl_satker`.`satker` AS `satker`, `tbl_analisis`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_tasks`.`id_analisis` AS `id_analisis`, `tbl_analisis`.`analisis` AS `analisis`, `tbl_tasks`.`tasks` AS `tasks`, `tbl_analisis`.`bulan` AS `bulan`, `tbl_indikator`.`tahun` AS `tahun` FROM (((`tbl_tasks` join `tbl_analisis` on(`tbl_tasks`.`id_analisis` = `tbl_analisis`.`id_analisis`)) join `tbl_satker` on(`tbl_analisis`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_tasks`.`id_satker` = `tbl_satker`.`id_satker`)) join `tbl_indikator` on(`tbl_analisis`.`id_indikator` = `tbl_indikator`.`id_indikator`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_rtl_2`
--
DROP TABLE IF EXISTS `v_rtl_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_rtl_2`  AS SELECT `tbl_monitoring`.`id_monitoring` AS `id_monitoring`, `tbl_tasks`.`id_satker` AS `id_satker`, `tbl_satker`.`satker` AS `satker`, `tbl_analisis`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_tasks`.`id_analisis` AS `id_analisis`, `tbl_analisis`.`analisis` AS `analisis`, `tbl_tasks`.`id_tasks` AS `id_tasks`, `tbl_tasks`.`tasks` AS `tasks`, `tbl_analisis`.`bulan` AS `bulan`, `tbl_monitoring`.`rtl_strategi` AS `rtl_strategi`, `tbl_monitoring`.`potential_blocker` AS `potential_blocker`, `tbl_monitoring`.`pic` AS `pic`, `tbl_monitoring`.`tgl_start` AS `tgl_start`, `tbl_monitoring`.`tgl_deadline` AS `tgl_deadline` FROM ((((`tbl_tasks` join `tbl_analisis` on(`tbl_tasks`.`id_analisis` = `tbl_analisis`.`id_analisis`)) join `tbl_satker` on(`tbl_analisis`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_tasks`.`id_satker` = `tbl_satker`.`id_satker`)) join `tbl_indikator` on(`tbl_analisis`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_monitoring` on(`tbl_analisis`.`id_analisis` = `tbl_monitoring`.`id_analisis` and `tbl_satker`.`id_satker` = `tbl_monitoring`.`id_satker` and `tbl_tasks`.`id_tasks` = `tbl_monitoring`.`id_tasks`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_rtl_3`
--
DROP TABLE IF EXISTS `v_rtl_3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_rtl_3`  AS SELECT `tbl_monitoring`.`id_monitoring` AS `id_monitoring`, `tbl_tasks`.`id_satker` AS `id_satker`, `tbl_satker`.`satker` AS `satker`, `tbl_analisis`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_tasks`.`id_analisis` AS `id_analisis`, `tbl_analisis`.`analisis` AS `analisis`, `tbl_tasks`.`id_tasks` AS `id_tasks`, `tbl_tasks`.`tasks` AS `tasks`, `tbl_analisis`.`bulan` AS `bulan`, `tbl_monitoring`.`rtl_strategi` AS `rtl_strategi`, `tbl_monitoring`.`potential_blocker` AS `potential_blocker`, `tbl_monitoring`.`pic` AS `pic`, `tbl_monitoring`.`tgl_start` AS `tgl_start`, `tbl_monitoring`.`tgl_deadline` AS `tgl_deadline`, `tbl_monitoring`.`tgl_tercapai` AS `tgl_tercapai`, `tbl_monitoring`.`upload_bukti` AS `upload_bukti`, `tbl_monitoring`.`catatan_pic` AS `catatan_pic`, `tbl_monitoring`.`status` AS `status`, curdate() AS `tgl_sekarang`, CASE WHEN curdate() between `tbl_monitoring`.`tgl_start` and `tbl_monitoring`.`tgl_deadline` AND `tbl_monitoring`.`status` = '0' THEN coalesce('1') WHEN curdate() > `tbl_monitoring`.`tgl_deadline` AND `tbl_monitoring`.`status` = '0' THEN coalesce('0') WHEN `tbl_monitoring`.`status` = '1' THEN coalesce('2') END AS `stwarna`, CASE WHEN curdate() between `tbl_monitoring`.`tgl_start` and `tbl_monitoring`.`tgl_deadline` AND `tbl_monitoring`.`status` = '0' THEN coalesce('Dalam Proses') WHEN curdate() > `tbl_monitoring`.`tgl_deadline` AND `tbl_monitoring`.`status` = '0' THEN coalesce('Belum terlaksana') WHEN `tbl_monitoring`.`status` = '1' THEN coalesce('Sudah Terlaksana') END AS `stket` FROM ((((`tbl_tasks` join `tbl_analisis` on(`tbl_tasks`.`id_analisis` = `tbl_analisis`.`id_analisis`)) join `tbl_satker` on(`tbl_analisis`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_tasks`.`id_satker` = `tbl_satker`.`id_satker`)) join `tbl_indikator` on(`tbl_analisis`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_monitoring` on(`tbl_analisis`.`id_analisis` = `tbl_monitoring`.`id_analisis` and `tbl_satker`.`id_satker` = `tbl_monitoring`.`id_satker` and `tbl_tasks`.`id_tasks` = `tbl_monitoring`.`id_tasks`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_satker`
--
DROP TABLE IF EXISTS `v_satker`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_satker`  AS SELECT `tbl_satker`.`id_satker` AS `id_satker`, `tbl_satker`.`id_user_level` AS `id_user_level`, `tbl_user_level`.`nama_level` AS `nama_level`, `tbl_satker`.`satker` AS `satker` FROM (`tbl_satker` join `tbl_user_level` on(`tbl_satker`.`id_user_level` = `tbl_user_level`.`id_user_level`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_target`
--
DROP TABLE IF EXISTS `v_target`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_target`  AS SELECT `tbl_target`.`id_target` AS `id_target`, `tbl_target`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_indikator`.`tahun` AS `tahun`, `tbl_target`.`id_satker` AS `id_satker`, `tbl_user`.`id_users` AS `id_users`, `tbl_target`.`bulan` AS `bulan`, `tbl_target`.`target` AS `target` FROM ((((`tbl_target` join `tbl_indikator` on(`tbl_target`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_user_level` on(`tbl_indikator`.`id_user_level` = `tbl_user_level`.`id_user_level`)) join `tbl_satker` on(`tbl_target`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_user_level`.`id_user_level` = `tbl_satker`.`id_user_level`)) join `tbl_user` on(`tbl_satker`.`id_satker` = `tbl_user`.`idsatker`)) GROUP BY `tbl_target`.`id_target` ORDER BY `tbl_target`.`id_indikator` ASC, `tbl_target`.`bulan` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_targetanalisis`
--
DROP TABLE IF EXISTS `v_targetanalisis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`silly`@`localhost` SQL SECURITY DEFINER VIEW `v_targetanalisis`  AS SELECT `tbl_target`.`id_target` AS `id_target`, `tbl_target`.`id_indikator` AS `id_indikator`, `tbl_indikator`.`indikator` AS `indikator`, `tbl_indikator`.`tahun` AS `tahun`, `tbl_target`.`id_satker` AS `id_satker`, `tbl_user`.`id_users` AS `id_users`, `tbl_target`.`bulan` AS `bulan`, `tbl_target`.`target` AS `target` FROM ((((`tbl_target` join `tbl_indikator` on(`tbl_target`.`id_indikator` = `tbl_indikator`.`id_indikator`)) join `tbl_user_level` on(`tbl_indikator`.`id_user_level` = `tbl_user_level`.`id_user_level`)) join `tbl_satker` on(`tbl_target`.`id_satker` = `tbl_satker`.`id_satker` and `tbl_user_level`.`id_user_level` = `tbl_satker`.`id_user_level`)) join `tbl_user` on(`tbl_satker`.`id_satker` = `tbl_user`.`idsatker`)) GROUP BY `tbl_target`.`id_indikator` ORDER BY `tbl_target`.`id_satker` ASC, `tbl_target`.`id_indikator` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contoh`
--
ALTER TABLE `contoh`
  ADD PRIMARY KEY (`idconoth`);

--
-- Indexes for table `tbl_analisis`
--
ALTER TABLE `tbl_analisis`
  ADD PRIMARY KEY (`id_analisis`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_satker` (`id_satker`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `idulevel` (`id_user_level`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `id_analisis` (`id_analisis`),
  ADD KEY `id_satker` (`id_satker`),
  ADD KEY `id_tasks` (`id_tasks`);

--
-- Indexes for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD PRIMARY KEY (`id_satker`),
  ADD KEY `tbl_satker_ibfk_1` (`id_user_level`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_target`
--
ALTER TABLE `tbl_target`
  ADD PRIMARY KEY (`id_target`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_groupsatker` (`id_satker`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`id_tasks`),
  ADD KEY `id_analisis` (`id_analisis`),
  ADD KEY `id_satker` (`id_satker`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `idsatker` (`idsatker`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contoh`
--
ALTER TABLE `contoh`
  MODIFY `idconoth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_analisis`
--
ALTER TABLE `tbl_analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_target`
--
ALTER TABLE `tbl_target`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_analisis`
--
ALTER TABLE `tbl_analisis`
  ADD CONSTRAINT `tbl_analisis_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `tbl_indikator` (`id_indikator`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_analisis_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `tbl_satker` (`id_satker`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD CONSTRAINT `tbl_indikator_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`) ON DELETE NO ACTION;

--
-- Constraints for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD CONSTRAINT `tbl_monitoring_ibfk_1` FOREIGN KEY (`id_analisis`) REFERENCES `tbl_analisis` (`id_analisis`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_monitoring_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `tbl_satker` (`id_satker`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_monitoring_ibfk_3` FOREIGN KEY (`id_tasks`) REFERENCES `tbl_tasks` (`id_tasks`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD CONSTRAINT `tbl_satker_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`) ON DELETE NO ACTION;

--
-- Constraints for table `tbl_target`
--
ALTER TABLE `tbl_target`
  ADD CONSTRAINT `tbl_target_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `tbl_indikator` (`id_indikator`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_target_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `tbl_satker` (`id_satker`) ON DELETE NO ACTION;

--
-- Constraints for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD CONSTRAINT `tbl_tasks_ibfk_1` FOREIGN KEY (`id_analisis`) REFERENCES `tbl_analisis` (`id_analisis`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_tasks_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `tbl_satker` (`id_satker`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`idsatker`) REFERENCES `tbl_satker` (`id_satker`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

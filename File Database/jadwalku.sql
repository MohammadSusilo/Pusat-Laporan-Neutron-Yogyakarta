-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 03:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwalku`
--

-- --------------------------------------------------------

--
-- Table structure for table `dev_changelogs`
--

CREATE TABLE `dev_changelogs` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `versi` varchar(50) DEFAULT NULL,
  `tgl` date NOT NULL,
  `desc` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dev_changelogs`
--

INSERT INTO `dev_changelogs` (`id`, `id_user`, `versi`, `tgl`, `desc`, `created_at`, `updated_at`) VALUES
(4, '3', '1.0', '2020-03-10', 'Link Form Laporan', '2020-03-10 02:11:00', '2020-03-10 02:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_agenda`
--

CREATE TABLE `jdw_agenda` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_bagian` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `ruang` varchar(50) NOT NULL,
  `desc` mediumtext NOT NULL,
  `solusi` mediumtext NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `timestart` time NOT NULL,
  `timefinish` time NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `team` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_agenda`
--

INSERT INTO `jdw_agenda` (`id`, `id_user`, `id_bagian`, `title`, `ruang`, `desc`, `solusi`, `start`, `end`, `timestart`, `timefinish`, `status`, `team`, `created_at`, `updated_at`) VALUES
(5, '2', 'KP_MM', 'Incididunt consequat', 'In dolores tenetur o', 'Vel temporibus offic', 'Ipsum dolor quia qui', '2020-03-05 00:00:00', '2020-03-06 00:00:00', '09:00:00', '16:00:00', NULL, NULL, '2020-03-04 19:42:57', '2020-03-05 02:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_agenda_team`
--

CREATE TABLE `jdw_agenda_team` (
  `id` int(11) NOT NULL,
  `id_agenda` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_agenda_team`
--

INSERT INTO `jdw_agenda_team` (`id`, `id_agenda`, `team`, `created_at`, `updated_at`) VALUES
(5, '5', 'KP_MM', '2020-03-05 02:42:57', NULL),
(6, '5', '220.01.15576', '2020-03-05 02:42:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jdw_bagian`
--

CREATE TABLE `jdw_bagian` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_bagian`
--

INSERT INTO `jdw_bagian` (`id`, `kode`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PK', 'Pengkaderan', '0', '2020-02-28 23:59:31', '2020-02-29 06:59:31'),
(3, 'SK', 'Sekretariat', '0', '2020-02-29 00:04:04', '2020-02-29 07:04:04'),
(4, 'INV', 'Inventaris', '0', '2020-02-29 00:04:17', '2020-02-29 07:04:17'),
(5, 'KU', 'Keuangan', '0', '2020-02-29 00:04:30', '2020-02-29 07:04:30'),
(6, 'PG', 'Pengawasan', '0', '2020-02-29 00:04:43', '2020-02-29 07:04:43'),
(7, 'DT', 'Data', '0', '2020-02-29 00:04:57', '2020-02-29 07:04:57'),
(8, 'PS', 'Personalia', '0', '2020-02-29 00:05:14', '2020-02-29 07:05:14'),
(10, 'ACC_PJK', 'Accounting/Pajak', '0', '2020-02-29 07:06:25', '2020-02-29 07:05:51'),
(12, 'KP_MM', 'Komputer/Multimedia', '0', '2020-02-29 00:06:14', '2020-02-29 07:06:14'),
(13, 'PD_PM', 'Pendidikan/Pemateri', '0', '2020-03-09 07:36:55', '2020-02-29 07:06:38'),
(14, 'MK', 'Marketing', '0', '2020-02-29 00:06:50', '2020-02-29 07:06:50'),
(15, 'LO', 'Logistik', '0', '2020-02-29 00:07:05', '2020-02-29 07:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_kuisioner`
--

CREATE TABLE `jdw_kuisioner` (
  `id` int(11) NOT NULL,
  `id_bagian` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_kuisioner`
--

INSERT INTO `jdw_kuisioner` (`id`, `id_bagian`, `judul`, `desc`, `link`, `created_at`, `updated_at`) VALUES
(2, 'SK', 'TES', 'yoayo', 'https://onlinepngtools.com/resize-png', '2020-03-09 03:10:20', '0000-00-00 00:00:00'),
(3, 'PK', 'Link A', 'link A', 'https://www.codepolitan.com/protect-menggunakan-middleware-laravel-59fab97ba55e8', '2020-03-08 21:29:42', '2020-03-09 04:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_role`
--

CREATE TABLE `jdw_role` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_role`
--

INSERT INTO `jdw_role` (`id`, `kode`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'KA', 'Kabag', '0', '2020-02-29 07:08:36', '2020-02-29 06:38:00'),
(3, 'WKA', 'Wakabag', '0', '2020-02-29 00:08:28', '2020-02-29 07:08:28'),
(4, 'KASUB', 'Kasubag', '0', '2020-02-29 00:08:54', '2020-02-29 07:08:54'),
(5, 'STA', 'Staff', '0', '2020-02-29 00:11:20', '2020-02-29 07:11:20'),
(6, 'ADM', 'Admin', '0', '2020-02-29 00:14:36', '2020-02-29 07:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_token`
--

CREATE TABLE `jdw_token` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `isi_token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdw_token`
--

INSERT INTO `jdw_token` (`id`, `id_user`, `isi_token`, `created_at`, `updated_at`) VALUES
(2, '3', '8403', '2020-03-08 18:58:48', '2020-03-09 01:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_role` varchar(50) NOT NULL,
  `id_bagian` varchar(50) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `nik` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` varchar(50) DEFAULT NULL,
  `homedir` varchar(50) DEFAULT NULL,
  `usage` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `id_bagian`, `color`, `nik`, `name`, `email`, `email_verified_at`, `username`, `password`, `permission`, `homedir`, `usage`, `status`, `created_at`, `updated_at`) VALUES
(2, 'STA', 'KP_MM', '#24ff00', '220.01.15576', 'mohammad susilo', 'mohammadsusilo99@gmail.com', '2020-03-02 03:45:07', 'susilo', '$2y$10$a1/320TWUDa1i1kcijB42ORftynGEDqqSeBa/ivyftsKrhC2Cdg5m', NULL, NULL, NULL, '0', '2020-03-02 03:45:07', '2020-03-02 02:15:31'),
(3, 'ADM', 'KP_MM', '', '220.01.1557', 'admin', 'mohammadsusilo99@gmail.com', '2020-03-03 06:45:49', 'admin', '$2y$10$VNLKG5yBiu1GLRImPDWzROeBwuL47eSL7pcPTtzMA9GeNQDQSGB52', NULL, NULL, NULL, '0', '2020-03-03 06:45:49', '2020-03-02 03:32:48'),
(4, 'KA', 'PK', '#69db0f', '000.00.0001', 'Pengkaderan', 'pk@gmail.com', '2020-03-09 04:13:48', 'pengkaderan', '$2y$10$W8jnxRzKh3VMsK8yJQR0Ge0rVCRmnjhEarWbWMZy/ZZg.Q.u2mXti', NULL, NULL, NULL, '0', '2020-03-08 21:13:48', '2020-03-09 04:13:48'),
(5, 'KA', 'SK', NULL, '000.00.0002', 'Sekretariat', 'sk@gmail.com', '2020-03-09 08:02:27', 'sekretariat', '$2y$10$rXpVpTrfkPWIVOz/V8ewCOueyp4YI1ykUGTWzyvj1fylZIJ.dTDSK', NULL, NULL, NULL, '0', '2020-03-09 01:02:27', '2020-03-09 08:02:27'),
(6, 'KA', 'INV', NULL, '000.00.0003', 'Inventaris', 'inv@gmail.com', '2020-03-09 08:03:31', 'inventaris', '$2y$10$TU8fnDxgrhh2ui8ZV4N8wu1vIv/PZIaU/VlYcss1e5QpjSKnkSg9e', NULL, NULL, NULL, '0', '2020-03-09 01:03:31', '2020-03-09 08:03:31'),
(7, 'KA', 'KU', NULL, '000.00.0004', 'Keuangan', 'ku@gmail.com', '2020-03-09 08:14:27', 'keuangan', '$2y$10$xqW3fpEkpOD3b4i7DRPyQutvz0s2E/5WP8WB6BneJhRFWFwqZtYXe', NULL, NULL, NULL, '0', '2020-03-09 01:14:27', '2020-03-09 08:14:27'),
(8, 'KA', 'PG', NULL, '000.00.0005', 'Pengawasan', 'pg@gmail.com', '2020-03-09 08:22:58', 'pengawasan', '$2y$10$PnHMAdjA3KRLfKvw397X..i99Z5iHjdqBA5OsLVv.Tb6Suln1bxke', NULL, NULL, NULL, '0', '2020-03-09 01:22:58', '2020-03-09 08:22:58'),
(9, 'KA', 'DT', NULL, '000.00.0006', 'Data', 'dt@gmail.com', '2020-03-09 08:38:40', 'data', '$2y$10$fSRFBfg7FHk6P33HVwR70eOsdyax6.4kRHFmvWLUV5cfVMIjHLERW', NULL, NULL, NULL, '0', '2020-03-09 01:38:40', '2020-03-09 08:38:40'),
(10, 'KA', 'PS', NULL, '000.00.0007', 'Personalia', 'ps@gmail.com', '2020-03-09 08:40:01', 'personalia', '$2y$10$Yf59cUyh7Vpr1WabV3RAb.agbpYFqOQZwL5RWEKY/swrY9xVLJhQ2', NULL, NULL, NULL, '0', '2020-03-09 01:40:01', '2020-03-09 08:40:01'),
(11, 'KA', 'ACC_PJK', NULL, '000.00.0008', 'Accounting & Pajak', 'pjk@gmail.com', '2020-03-09 08:41:21', 'AccountingPajak', '$2y$10$BnK7wuuSnSsmLLkWEvxzkOfLYiv9B0h5T8RnOR8SvD17Qf/jBebje', NULL, NULL, NULL, '0', '2020-03-09 01:41:21', '2020-03-09 08:41:21'),
(12, 'KA', 'KP_MM', NULL, '000.00.0009', 'Komputer & Multimedia', 'kpmm@gmail.com', '2020-03-09 08:43:04', 'komputermultimedia', '$2y$10$JfOcZtXX18hRsgYPDTohuujQJy0qRV8OmyoYDkYlZ2LogMlNR1.A6', NULL, NULL, NULL, '0', '2020-03-09 01:43:04', '2020-03-09 08:43:04'),
(13, 'KA', 'PD_PM', NULL, '000.00.0010', 'Pendidikan & Pemateri', 'pd@gmail.com', '2020-03-09 09:25:57', 'pendidikanpemateri', '$2y$10$Lr.Rno8sLWEsshbsnQnuy.m.6if6uHCMCXiaERY5nJQ02DhjwWN/W', NULL, NULL, NULL, '0', '2020-03-09 02:25:57', '2020-03-09 09:25:57'),
(14, 'KA', 'MK', NULL, '000.00.0011', 'Marketing', 'mk@gmail.com', '2020-03-09 09:29:12', 'marketing', '$2y$10$BH92leCrHQD2V4GXUbalDuNkYqMcRwXBsRYyDGRoY65DE2b9EdFQq', NULL, NULL, NULL, '0', '2020-03-09 02:29:12', '2020-03-09 09:29:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dev_changelogs`
--
ALTER TABLE `dev_changelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdw_agenda`
--
ALTER TABLE `jdw_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdw_agenda_team`
--
ALTER TABLE `jdw_agenda_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdw_bagian`
--
ALTER TABLE `jdw_bagian`
  ADD PRIMARY KEY (`id`,`kode`);

--
-- Indexes for table `jdw_kuisioner`
--
ALTER TABLE `jdw_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdw_role`
--
ALTER TABLE `jdw_role`
  ADD PRIMARY KEY (`id`,`kode`);

--
-- Indexes for table `jdw_token`
--
ALTER TABLE `jdw_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`nik`),
  ADD UNIQUE KEY `email_verified_at` (`email_verified_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dev_changelogs`
--
ALTER TABLE `dev_changelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jdw_agenda`
--
ALTER TABLE `jdw_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jdw_agenda_team`
--
ALTER TABLE `jdw_agenda_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jdw_bagian`
--
ALTER TABLE `jdw_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jdw_kuisioner`
--
ALTER TABLE `jdw_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jdw_role`
--
ALTER TABLE `jdw_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jdw_token`
--
ALTER TABLE `jdw_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

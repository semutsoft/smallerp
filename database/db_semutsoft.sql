-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Bulan Mei 2019 pada 21.21
-- Versi server: 5.7.24
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_semutsoft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_client`
--

CREATE TABLE `mst_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_register_key` varchar(32) NOT NULL,
  `client_status` set('SUBSCRIBER','DEMO','PENDING','CANCEL') NOT NULL DEFAULT 'DEMO',
  `client_valid_until` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_client`
--

INSERT INTO `mst_client` (`client_id`, `client_name`, `client_register_key`, `client_status`, `client_valid_until`, `created_date`, `created_by`) VALUES
(1, 'PT DEMO ERP ', '123456789987654321', 'DEMO', '2019-12-31', '2019-05-04 14:09:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_client_auth`
--

CREATE TABLE `mst_client_auth` (
  `auth_id` int(11) NOT NULL,
  `group_id` tinyint(2) NOT NULL,
  `auth_name` varchar(50) NOT NULL,
  `is_created` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_client_group`
--

CREATE TABLE `mst_client_group` (
  `group_id` tinyint(2) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_client_group`
--

INSERT INTO `mst_client_group` (`group_id`, `group_name`, `created_date`, `created_by`) VALUES
(1, 'System', '2019-05-24 00:00:00', 1),
(2, 'Administrator', '2019-05-24 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_client_login`
--

CREATE TABLE `mst_client_login` (
  `login_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_client_login`
--

INSERT INTO `mst_client_login` (`login_id`, `client_id`, `email`, `password`, `login_is_active`, `created_date`, `created_by`) VALUES
(1, 1, 'dwi_wahyudi@yahoo.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, '2019-05-24 11:51:20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customer`
--

CREATE TABLE `mst_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_fullname` varchar(100) NOT NULL,
  `customer_address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customer_branch`
--

CREATE TABLE `mst_customer_branch` (
  `branch_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_menu`
--

CREATE TABLE `mst_menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_alias` varchar(50) NOT NULL,
  `menu_link` varchar(50) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_order` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_menu`
--

INSERT INTO `mst_menu` (`menu_id`, `parent_id`, `menu_name`, `menu_alias`, `menu_link`, `menu_icon`, `menu_order`) VALUES
(1, 0, 'Pengaturan Sistem', '', 'settings', '', 0),
(2, 0, 'Persiapan Data', '', 'master', '', 0),
(3, 0, 'Jadual Trucking', '', 'jadual', '', 0),
(4, 0, 'Job Order', '', 'job', '', 0),
(5, 0, 'Validasi', '', 'validasi', '', 0),
(6, 0, 'Surat Jalan', '', 'surat_jalan', '', 0),
(7, 0, 'Persediaan', '', 'persediaan', '', 0),
(8, 0, 'Perawatan dan Perbaikan', '', 'perawatan', '', 0),
(9, 0, 'Jaminan Kontainer', '', 'jaminan', '', 0),
(10, 0, 'Keuangan', '', 'keuangan', '', 0),
(11, 0, 'Hutang Piutang', '', 'hutang', '', 0),
(12, 0, 'Akuntansi', '', 'akuntansi', '', 0),
(13, 0, 'Dokumentasi', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_client`
--
ALTER TABLE `mst_client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_name` (`client_name`);

--
-- Indeks untuk tabel `mst_client_auth`
--
ALTER TABLE `mst_client_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indeks untuk tabel `mst_client_group`
--
ALTER TABLE `mst_client_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `mst_client_login`
--
ALTER TABLE `mst_client_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `mst_customer`
--
ALTER TABLE `mst_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `mst_customer_branch`
--
ALTER TABLE `mst_customer_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indeks untuk tabel `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_client`
--
ALTER TABLE `mst_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_client_auth`
--
ALTER TABLE `mst_client_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_client_group`
--
ALTER TABLE `mst_client_group`
  MODIFY `group_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mst_client_login`
--
ALTER TABLE `mst_client_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_customer`
--
ALTER TABLE `mst_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_customer_branch`
--
ALTER TABLE `mst_customer_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Database: `db_smallerp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_coa`
--

CREATE TABLE `mst_coa` (
  `coa_id` int(11) NOT NULL,
  `coa_group_id` int(1) NOT NULL,
  `parent_no` varchar(20) NOT NULL,
  `coa_no` varchar(15) NOT NULL,
  `coa_name` varchar(60) NOT NULL,
  `jn_acc` set('D','K') NOT NULL,
  `type` set('1','2') NOT NULL COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `level` int(11) NOT NULL,
  `nm_type` varchar(20) DEFAULT NULL,
  `kd_hc` varchar(6) DEFAULT NULL,
  `nm_hc` varchar(60) DEFAULT NULL,
  `cur_code` varchar(10) DEFAULT NULL,
  `cur_rate` decimal(12,2) DEFAULT NULL,
  `sl_awa` decimal(20,2) NOT NULL,
  `kasbank` set('','Kas','Bank') NOT NULL,
  `kasbank_norek` varchar(100) NOT NULL,
  `kasbank_cabang` varchar(100) NOT NULL,
  `kasabank_nama_bank` varchar(100) NOT NULL,
  `kasbank_atas_nama` varchar(200) NOT NULL,
  `kasbank_tipe` enum('Keluar','Masuk','Keluar/Masuk','') NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `cabang` tinyint(4) NOT NULL DEFAULT '1',
  `setAkun` set('1','2','3','4','5','6','7','8','9','10','11') DEFAULT NULL COMMENT '1 = Diskon, 2 = Hutang Usaha, 3 = PPH 23, 4 = PPN Masuk, 5 = PPN Keluar, 6 = Piutang Reimbursment, 7 = Piutang Usaha, 8 = Reimbursment, 9 = Pendapatan Piutang, 10 = Biaya Komisi, 11 = DP',
  `operator` set('1','2') NOT NULL DEFAULT '1' COMMENT '1 = penjumlahan, 2 = pengurangan',
  `default_jumlah` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_coa`
--

INSERT INTO `mst_coa` (`coa_id`, `coa_group_id`, `parent_no`, `coa_no`, `coa_name`, `jn_acc`, `type`, `level`, `nm_type`, `kd_hc`, `nm_hc`, `cur_code`, `cur_rate`, `sl_awa`, `kasbank`, `kasbank_norek`, `kasbank_cabang`, `kasabank_nama_bank`, `kasbank_atas_nama`, `kasbank_tipe`, `kode_transaksi`, `cabang`, `setAkun`, `operator`, `default_jumlah`) VALUES
(984, 1, '11113', '111', 'KAS & SETARA KAS ', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '', '1', ''),
(993, 1, '11             ', '114', 'PIUTANG ISTIMEWA', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(995, 1, '11', '116', 'PAJAK DIBAYAR DIMUKA', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(996, 1, '11', '117', 'BIAYA DIBAYAR DIMUKA', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1010, 1, '13', '131', 'BIAYA PRAOPERASI', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1015, 2, '21', '212', 'HUTANG PAJAK', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1016, 2, '21             ', '213', 'HUTANG BIAYA', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1019, 2, '22', '221', 'HUTANG BANK', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1021, 2, '22', '223', 'HUTANG AFILIASI', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1023, 3, '3', '31', 'MODAL', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1024, 3, '3', '32', 'LABA DITAHAN', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1026, 4, '               ', '4              ', 'PENDAPATAN                                                  ', 'K', '1', 1, 'Header', '010100', 'Kantor Pusat', '1', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1027, 4, '4              ', '41', 'PENDAPATAN', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1033, 5, '5              ', '51', 'BIAYA - BIAYA', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '10', '1', '0'),
(1080, 7, '', '7', 'PENDAPATAN LAIN-LAIN', 'K', '1', 1, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1081, 7, '7', '71', 'PENDAPATAN LAIN-LAIN', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1082, 7, '71', '712', 'LEBIH / KURANG PENERIMAAN', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1083, 7, '71', '711', 'JASA BANK', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1084, 7, '71', '714', 'SELISIH HITUNGAN SUPIR', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1085, 7, '71', '715', 'LAIN-LAIN', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1086, 8, '', '8', 'BIAYA LAIN-LAIN', 'D', '1', 1, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1087, 8, '81', '811', 'BEBAN BUNGA BANK', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1088, 8, '81', '812', 'BIAYA ADMINISTRASI BANK', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1089, 8, '81', '815', 'SELISIH STOK', 'D', '1', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1093, 8, '8', '82', 'BEBAN PAJAK', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1094, 8, '8', '83', 'BIAYA LAINNYA', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1096, 1, '112            ', '1121', 'PIUTANG USAHA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '7', '1', '0'),
(1098, 1, '11', '113', 'PIUTANG  KARYAWAN', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1109, 1, '114            ', '1141', 'PIUTANG ISTIMEWA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '750000000.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1113, 1, '1161', '1161', 'PPH  PASAL 21', 'D', '2', 4, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '1051501.00', '', '', '', '', '', 'Keluar', '', 1, '', '1', '0'),
(1116, 1, '121            ', '1211', 'TANAH', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1128, 1, '131', '1311', 'BIAYA PRAOPERASI', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1129, 1, '131', '1312', 'AKUMULASI AMORTISASI BIAYA PRAOPERASI', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1134, 2, '21', '211', 'HUTANG USAHA', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1135, 2, '211            ', '2111', 'HUTANG USAHA', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '90133500.00', '', '', '', '', '', 'Keluar', '', 1, '2', '1', '0'),
(1136, 2, '212', '2121', 'HUTANG PPH PASAL 21', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '547819.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1137, 2, '213', '2131', 'HUTANG CICILAN DUMP TRUCK', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1139, 2, '221            ', '2211', 'HUTANG BANK', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1141, 2, '223', '2231', 'HUTANG AFILIASI', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1142, 3, '31             ', '311', 'MODAL SAHAM', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1145, 4, '41', '411', 'PENDAPATAN TRUCKING', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1304, 1, '11113', '11111', 'KAS KECIL', 'D', '1', 5, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '33181795.43', '', '', '', '', '', 'Keluar', '', 1, '', '1', ''),
(1308, 1, '113            ', '1131', 'PIUTANG KARYAWAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1320, 1, '116            ', '1162', 'PPH PASAL 23', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '3', '2', '2%'),
(1321, 1, '116', '1163', 'PPH PASAL 25', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1322, 1, '116            ', '1169', 'PPN MASUKAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '4', '1', '0'),
(1323, 1, '1', '12', 'AKTIVA TETAP', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1324, 1, '12', '121', 'NILAI PEROLEHAN', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1325, 1, '121', '1212', 'HARTA TETAP KELOMPOK I ( BANGUNAN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '64176886.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1326, 1, '121', '1213', 'HARTA TETAP KELOMPOK II ( MESIN & PERALATAN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1327, 1, '121', '1214', 'HARTA TETAP KELOMPOK III ( MEBEL & ATK )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1328, 1, '121', '1215', 'HARTA TETAP KELOMPOK IV ( KENDARAAN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1329, 1, '12', '122', 'AKUMULASI PENYUSUTAN', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1330, 1, '122', '1222', 'AKUM. PENYUSUTAN KELOMPOK 1 ( BANGUNAN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '-13504761.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1331, 1, '122', '1223', 'AKUM. PENYUSUTAN KELOMPOK II ( MESIN & PERALATAN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1332, 1, '122', '1224', 'AKUM. PENYUSUTAN KELOMPOK III ( MEBEL & ATK )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1334, 1, '1              ', '13', 'AKTIVA LAINNYA', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1335, 2, '2', '21', 'KEWAJIBAN LANCAR', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1336, 2, '2              ', '22', 'KEWAJIBAN JANGKA PANJANG', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1337, 2, '212            ', '2122', 'HUTANG PPH PASAL 23', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1338, 2, '212            ', '2123', 'HUTANG PPH PASAL 25', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '379725.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1339, 2, '2129', '2129', 'PPN KELUARAN', 'K', '2', 4, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '12749000.00', '', '', '', '', '', 'Keluar', '', 1, '5', '1', '0'),
(1340, 2, '22', '226', 'HUTANG KE PARTNER', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1341, 2, '226            ', '2261', 'HUTANG PARTNER A', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1342, 3, '31             ', '312', 'MODAL DISETOR', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1343, 3, '32             ', '321', 'LABA (RUGI) TAHUN SEBELUMNYA', 'K', '2', 3, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '2954937.71', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1344, 3, '32             ', '322', 'LABA (RUGI) TAHUN BERJALAN', 'K', '2', 3, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1347, 3, '3', '33', 'REVALUASI AKTIVA TETAP', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1390, 8, '81', '814', 'SELISIH KAS', 'D', '1', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1391, 1, '11             ', '118', 'UANG MUKA PEMBELIAN', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1392, 1, '118', '1181', 'UANG MUKA PEMBELIAN DUMP TRUCK', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1398, 2, '21             ', '216', 'PENDAPATAN DITERIMA DIMUKA', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1486, 2, '21             ', '219', 'HUTANG LAINNYA', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1488, 2, '219', '2191', 'HUTANG LAINNYA', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1521, 1, '11             ', '115', 'REIMBURSMENT', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '8', '1', '0'),
(1522, 1, '115            ', '1151', 'REIMBURSMENT (KASBON)', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1523, 1, '117', '1171', 'SEWA DIBAYAR DIMUKA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '36111111.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1526, 1, '111', '1113', 'AYAT SILANG', 'D', '1', 4, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1529, 2, '212            ', '2124', 'HUTANG PPH PASAL 29', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '786569.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1530, 2, '212            ', '2125', 'HUTANG PPH PASAL 4 AYAT (2)', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1531, 2, '213', '2132', 'HUTANG CICILAN ALAT BERAT', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1532, 2, '213', '2133', 'HUTANG CICILAN MOBIL OPERASIONAL', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1533, 2, '21', '214', 'HUTANG KE KOMISARIS & DIREKTUR', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1534, 2, '214', '2141', 'HUTANG KE IBU SUSAN', 'D', '1', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '27316376.72', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1537, 2, '214', '2142', 'HUTANG KE PAK JIMMY', 'D', '1', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1538, 2, '215', '2151', 'HUTANG KE KARYAWAN', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1541, 2, '216', '2161', 'PENDAPATAN DITERIMA DIMUKA', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1542, 2, '226', '2262', 'HUTANG PARTNER B', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1548, 3, '311', '3111', 'MODAL SAHAM', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1549, 3, '312', '3121', 'MODAL A', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '700000000.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1550, 3, '312', '3122', 'MODAL B', 'K', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '50000000.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1552, 3, '32', '323', 'DEVIDEN', 'K', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1554, 3, '33', '331', 'REVALUASI AKTIVA TETAP', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1567, 5, '51', '511', 'BIAYA TRUCKING', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1571, 5, '511', '51101', 'BIAYA BONGKAR MUAT', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1572, 5, '511', '51102', 'BIAYA KOMISI SOPIR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1573, 5, '511', '51103', 'BIAYA UANG JALAN SOPIR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1574, 5, '511', '51104', 'BIAYA TOL', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1575, 5, '511', '51105', 'BIAYA KAWALAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1580, 6, '621', '6111', 'BEBAN GAJI', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1581, 6, '621', '6112', 'BEBAN TUNJANGAN TRANSPORT', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1582, 6, '621', '6113', 'BEBAN LEMBUR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1584, 6, '621', '6114', 'BEBAN BONUS', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1585, 6, '621', '6115', 'BEBAN THR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1586, 6, '62', '612', 'BEBAN KANTOR', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1587, 6, '622', '6121', 'BEBAN LISTRIK & AIR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1588, 6, '622', '6122', 'BEBAN LOGISTIK DAN RUMAH TANGGA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1589, 6, '622', '6123', 'BEBAN TELEPHONE KANTOR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1590, 6, '622', '6124', 'BEBAN TELEPHONE VOUCHER', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1591, 6, '622', '6125', 'BEBAN TELEPHONE PASCA BAYAR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1592, 6, '622', '6126', 'BEBAN INTERNET & TV CABLE', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1593, 6, '622', '6127', 'BEBAN  FOTOCOPY & DAN FAX', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1594, 6, '622', '6128', 'BEBAN  PERLENGKAPAN KANTOR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1595, 6, '622', '6129', 'BEBAN  PERALATAN KANTOR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1596, 6, '622', '6130', 'BEBAN PERCETAKAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1597, 6, '622', '6131', 'BEBAN POS & MATERAI', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1598, 6, '62', '621', 'BEBAN BPJS', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1599, 6, '623', '6211', 'BEBAN BPJS KETENAGAKERJAAN', 'D', '1', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1600, 6, '623', '6212', 'BEBAN BPJS KESEHATAN', 'D', '1', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1602, 6, '62', '622', 'BEBAN SEWA', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1603, 6, '624', '6221', 'BEBAN SEWA GEDUNG', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1604, 6, '624', '6222', 'BEBAN SEWA KENDARAAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1605, 6, '624', '6223', 'BEBAN SEWA LAINNYA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1606, 6, '6', '63', 'BEBAN PENYUSUTAN', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1607, 6, '66', '631', 'BEBAN PNYSTN BANGUNAN', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1608, 6, '66', '632', 'BEBAN PNYSTN MESIN & PERALATAN', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1609, 6, '66', '633', 'BEBAN PNYSTN MEBEL& ATK', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1610, 6, '66', '635', 'BEBAN PNYSTN HARTA LAINNYA', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1611, 6, '62', '624', 'BEBAN UMUM', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1612, 6, '628', '6241', 'BEBAN PENGURUSAN PERIJINAN & LEGALITAS', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1613, 6, '628', '6242', 'BEBAN PERJALANAN DINAS', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1616, 6, '628', '6243', 'BEBAN  KURIR', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1622, 6, '628', '6244', 'BEBAN UMUM LAINNYA', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1623, 6, '62', '623', 'BEBAN PERAWATAN & PERBAIKAN', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1624, 6, '627', '6231', 'BEBAN PEMELIHARAAN & PERBAIKAN GEDUNG', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1625, 6, '627', '6232', 'BEBAN PEMASANGAN & INSTALASI', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1626, 6, '627', '6233', 'BEBAN PERAWATAN KENDARAAN OPERASIONAL', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1627, 6, '627', '6234', 'BEBAN PERLENGKAPAN KEND. OPERASIONAL', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1630, 8, '81', '813', 'SELISIH KURS', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1631, 8, '821', '821', 'BEBAN PPH 21', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1633, 8, '821', '822', 'BEBAN PPH 23', 'D', '2', 3, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1637, 1, '115', '1152', 'DEPOSIT JAMINAN', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1641, 1, '112', '1122', 'PIUTANG REIMBURSMENT ( DN )', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '6', '1', '0'),
(1642, 5, '511', '51106', 'BIAYA BBM', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(1674, 4, '411', '411-01', 'PENDAPATAN BONGKAR MUAT', 'D', '1', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3417, 6, '622', '6132', 'BEBAN ASURANSI GEDUNG', 'D', '2', 4, 'Detail', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3468, 1, '115', '1153', 'REIMBURSMENT ( KASBON ) KARYAWAN', 'D', '2', 4, 'Detail', '', '', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3469, 5, '51', '513', 'POTONGAN & RETUR', 'D', '1', 3, 'Header', '', '', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '1', '1', '0'),
(3482, 6, '622', '6133', 'BEBAN ENTERTAIN/KONSUMSI', 'D', '2', 4, 'Detail', '', '', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3483, 1, '122', '1225', 'AKUM. PENYUSUTAN KELOMPOK IV ( KENDARAAN )', 'D', '2', 4, 'Detail', '', '', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3484, 1, '11             ', '119', 'PERSEDIAAN', 'D', '1', 3, 'Header', '', '', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3485, 1, '119', '1191', 'PERSEDIAAN SPAREPART', 'D', '1', 4, 'Header', '', '', 'IDR', '1.00', '1039000.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3493, 1, '119', '1192', 'PERSEDIAAN MATERAI', 'D', '1', 4, 'Header', '', '', 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3520, 2, '212', '2126', 'HUTANG PPH FINAL', 'D', '2', 4, 'Detail', '', '', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3555, 1, '111', '1111', 'KAS', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3562, 1, '', '11111-2', 'KAS - SOLAR', 'K', '2', 6, 'Detail', NULL, NULL, '1', '1.00', '0.00', 'Kas', '', '', '', '', 'Keluar', 'KK', 1, NULL, '1', '0'),
(3575, 1, '11112', '11112-2', 'KAS BESAR 2', 'K', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3576, 1, '11112', '11112-1', 'KAS BESAR 1', 'K', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3589, 1, '119', '1193', 'PERSEDIAAN SPARE PART KENDARAAN', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3610, 5, '513', '5131', 'POTONGAN & RETUR', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3611, 5, '5131', '513101', 'POTONGAN PEMBELIAN ( DISKON )', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3612, 5, '5131', '513102', 'RETUR PEMBELIAN', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3615, 5, '51', '512', 'BIAYA MARKETING', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3616, 5, '512', '512-01', 'BIAYA MARKETING', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3618, 5, '51', '514', 'HARGA POKOK PENJUALAN', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3619, 5, '514', '5141', 'HARGA POKOK PENJUALAN', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3620, 5, '5141', '514101', 'HARGA POKOK PENJUALAN', 'D', '1', 5, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3626, 5, '511', '51107', 'BIAYA TAMBAHAN BONGKAR MUAT', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3627, 5, '511', '51108', 'BIAYA TRUKING VENDOR', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3629, 4, '411', '411-03', 'PENDAPATAN UANG JALAN SOPIR', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3630, 4, '411', '411-02', 'PENDAPATAN KOMISI SOPIR', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3631, 4, '411', '411-04', 'PENDAPATAN TOL', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3632, 4, '411', '411-5', 'PENDAPATAN KAWALAN', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3633, 4, '411', '411-06', 'PENDAPATAN BBM', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3634, 4, '411', '411-07', 'PENDAPATAN TAMBAHAN BONGKAR MUAT', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3635, 4, '411', '411-8', 'PENDAPATAN TRUCKING VENDOR', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3637, 4, '41', '413', 'PENDAPATAN POTONGAN & RETUR PEMBELIAN', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3638, 4, '412', '413-01', 'PENDAPATAN POTONGAN PEMBELIAN', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3639, 4, '412', '413-02', 'PENDAPATAN RETUR PEMBELIAN', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3640, 4, '411', '411-09', 'PENDAPATAN RITASE', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3641, 5, '511', '51110', 'BIAYA BONUS KERAJINAN', 'D', '2', 4, 'Detail', NULL, NULL, NULL, '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3643, 5, '51', '515', 'BIAYA PERAWATAN & PERBAIKAN KENDARAAN', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3644, 5, '515', '5151', 'BIAYA PERAWATAN & PERBAIKAN KENDARAAN', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3645, 5, '5151', '515101', 'BIAYA JASA PERAWATAN & PERBAIKAN', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3646, 1, '11111', '11111-1', 'KAS - UANG JALAN', 'D', '1', 6, 'Header', NULL, NULL, '1', '1.00', '0.00', 'Kas', '', '', '', '', 'Keluar', 'KU', 1, '', '1', ''),
(3648, 2, '', '2', 'KEWAJIBAN', 'D', '1', 1, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3649, 2, '21', '215', 'HUTANG KE KARYAWAN', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3655, 1, '11111', '11111-5', 'KAS - HITUNGAN SUPIR', 'K', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3656, 1, '11111', '11111-6', 'KAS - LYDIA', 'K', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3669, 1, '11121', '11121-2', 'BANK BCA 0953-417-771 - SOLAR', 'D', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3673, 1, '11121', '11121-6', 'BANK BCA 0953-667-166 - UANG JALAN AJIBARANG', 'K', '2', 6, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3678, 1, '', '11123-1', 'BANK NIAGA 332-0100-154-001', 'K', '2', 6, 'Detail', NULL, NULL, '1', '1.00', '0.00', 'Bank', '', '', '', '', 'Keluar', 'NIA', 1, NULL, '1', '0'),
(3679, 1, '1113', '11131', 'AYAT SILANG', 'K', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3691, 2, '215', '2152', 'HUTANG KOMISI KE SOPIR', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3692, 3, '323', '3231', 'DEVIDEN', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3695, 1, '118', '1182', 'UANG MUKA PEMBELIAN ALAT BERAT', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3696, 1, '118', '1183', 'UANG MUKA PEMBELIAN MOBIL OPERASIONAL', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3697, 1, '1191', '11911', 'PERSEDIAAN SPAREPART DUMP TRUCK', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3698, 1, '1191', '11912', 'PERSEDIAAN SPAREPART ALAT BERAT', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3699, 1, '1191', '11913', 'PERSEDIAAN SPAREPART KENDARAAN OPERASIONAL', 'D', '2', 5, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3700, 4, '41', '412', 'PENDAPATAN ALAT BERAT', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3701, 8, '8', '81', 'BIAYA LAIN-LAIN', 'D', '1', 2, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3704, 8, '82', '823', 'BEBAN PPH 25', 'D', '2', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3705, 8, '82', '825', 'BEBAN PAJAK LAINNYA', 'D', '2', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3711, 6, '66', '634', 'BEBAN PNYSTN KENDARAAN', 'D', '2', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3712, 1, '116', '1164', 'PPH PASAL 29', 'D', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3713, 1, '', '1', 'AKTIVA', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3714, 1, '11113', '11', 'AKTIVA LANCAR', 'D', '1', 3, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '', '1', ''),
(3715, 3, '', '3', 'MODAL', 'K', '1', 2, 'Header', '010100', 'Kantor Pusat', 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3716, 5, '', '5', 'BIAYA', 'D', '1', 2, 'Header', '010100', 'Kantor Pusat', '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3720, 6, '', '6', 'BEBAN OPERASIONAL', 'D', '1', 1, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3723, 6, '6', '61', 'BEBAN ADMINISTRASI & UMUM', 'D', '1', 2, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3724, 6, '61', '611', 'BEBAN PERSONALIA', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3725, 2, '214', '2143', 'HUTANG KE YULIANA', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3726, 8, '83', '831', 'BIAYA LAINNYA', 'K', '2', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3728, 4, '412', '412-01', 'PENDAPATAN ALAT BERAT', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3730, 8, '81', '816', 'SELISIH HUTANG', 'D', '1', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3731, 8, '81', '817', 'SELISIH PIUTANG', 'D', '1', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3732, 8, '81', '818', 'LEBIH / KURANG PEMBAYARAN', 'D', '1', 3, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3733, 4, '411', '411-10', 'PENDAPATAN KOMISI SALES', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3734, 5, '512-01', '512-02', 'BIAYA KOMISI SALES', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3736, 1, '', '11122-3', 'BANK DANAMON 3586-513878 an PT. BKU ( USD )', 'K', '2', 6, 'Detail', NULL, NULL, '1', '14000.00', '0.00', 'Bank', '', '', '', '', 'Keluar', 'DNM', 1, NULL, '1', '0'),
(3738, 1, '118', '1184', 'UANG MUKA PEMBELIAN', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '11', '1', '0'),
(3739, 1, '11111', '11111-5 KAS', 'KAS - HITUNGAN SUPIR', 'D', '1', 7, 'Detail', NULL, NULL, '1', NULL, '0.00', 'Kas', '', '', '', '', 'Keluar/Masuk', 'KHS', 1, NULL, '1', '0'),
(3740, 4, '413', '414', 'PENDAPATAN LAINNYA', 'D', '1', 4, 'Header', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '9', '1', '0'),
(3741, 4, '413', '414-01', 'PENDAPATAN LAINNYA', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3742, 5, '51', '516', 'BIAYA CUSTOM CLEARANCE', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3743, 5, '516', '51601', 'THC', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3744, 4, '41', '415', 'PENDAPATAN CUSTOM CLEARANCE', 'D', '1', 3, 'Header', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3745, 4, '415', '41501', 'PENDAPATAN CUSTOM CLEARANCE', 'K', '2', 4, 'Detail', NULL, NULL, 'IDR', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3748, 4, '411', '411-11', 'PENDAPATAN PIUTANG SUPIR', 'D', '1', 4, 'Detail', NULL, NULL, 'IDR', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, NULL, '1', '0'),
(3755, 1, '11112', '11113', 'KAS BESAR CABANG - A', 'D', '2', 5, 'Header', NULL, NULL, '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 10, NULL, '1', '0'),
(4213, 5, '51111', '51111', 'BIAYA TRUCKINGS', 'D', '1', 4, 'Detail', NULL, NULL, '1', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 10, '10', '1', ''),
(4214, 1, '1111', '11112', 'KAS KECIL OPS', 'D', '', 5, 'Detail', NULL, NULL, '1', '0.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '', '1', ''),
(4219, 5, '511', '51112', 'BIAYA TRUCKINGS', 'D', '1', 4, 'Header', NULL, NULL, '1', '1.00', '0.00', '', '', '', '', '', 'Keluar', '', 1, '', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_coa_group`
--

CREATE TABLE `mst_coa_group` (
  `coa_group_id` int(11) NOT NULL,
  `coa_group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_coa_group`
--

INSERT INTO `mst_coa_group` (`coa_group_id`, `coa_group_name`) VALUES
(1, 'AKTIVA'),
(2, 'HUTANG'),
(3, 'MODAL'),
(4, 'PENDAPATAN'),
(5, 'HARGA POKOK'),
(6, 'BIAYA'),
(7, 'PENDAPATAN LAIN'),
(8, 'BIAYA LAIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_company`
--

CREATE TABLE `mst_company` (
  `company_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_fullname` varchar(100) NOT NULL,
  `company_address` tinytext NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_province` varchar(50) NOT NULL,
  `company_country` varchar(50) NOT NULL,
  `company_zip` char(5) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_fax` varchar(20) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_url` varchar(100) NOT NULL,
  `nsfp` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `pkp` varchar(50) NOT NULL,
  `pkp_date` date NOT NULL DEFAULT '2000-01-01',
  `fiskal_start` date NOT NULL DEFAULT '2000-01-01',
  `fiskal_end` date NOT NULL DEFAULT '2000-01-01',
  `account_laba_rugi_bulanan` varchar(15) NOT NULL,
  `account_laba_rugi_tahunan` varchar(15) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `kop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_company`
--

INSERT INTO `mst_company` (`company_id`, `client_id`, `company_name`, `company_fullname`, `company_address`, `company_city`, `company_province`, `company_country`, `company_zip`, `company_phone`, `company_fax`, `company_email`, `company_url`, `nsfp`, `npwp`, `pkp`, `pkp_date`, `fiskal_start`, `fiskal_end`, `account_laba_rugi_bulanan`, `account_laba_rugi_tahunan`, `logo`, `kop`) VALUES
(1, 1, 'DEMO ABC', 'DEMO ABC, PT', 'Jl. Demo Raya', 'Jakarta', 'DKI Jakarta', 'Indonesia', '11100', '021-82212345', '021-82212346', 'demo@demo.com', 'https://www.demo.com', '', '', '', '2000-01-01', '0000-00-00', '2000-01-01', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_company_branch`
--

CREATE TABLE `mst_company_branch` (
  `branch_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_fullname` varchar(100) NOT NULL,
  `branch_address` tinytext NOT NULL,
  `branch_city` varchar(100) NOT NULL,
  `branch_province` varchar(50) NOT NULL,
  `branch_country` varchar(50) NOT NULL,
  `branch_zip` char(5) NOT NULL,
  `branch_phone` varchar(20) NOT NULL,
  `branch_fax` varchar(20) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `branch_url` varchar(100) NOT NULL,
  `nsfp` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `pkp` varchar(50) NOT NULL,
  `pkp_date` date NOT NULL DEFAULT '2000-01-01',
  `fiskal_start` date NOT NULL DEFAULT '2000-01-01',
  `fiskal_end` date NOT NULL DEFAULT '2000-01-01',
  `account_laba_rugi_bulanan` varchar(15) NOT NULL,
  `account_laba_rugi_tahunan` varchar(15) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `kop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_company_branch`
--

INSERT INTO `mst_company_branch` (`branch_id`, `company_id`, `branch_name`, `branch_fullname`, `branch_address`, `branch_city`, `branch_province`, `branch_country`, `branch_zip`, `branch_phone`, `branch_fax`, `branch_email`, `branch_url`, `nsfp`, `npwp`, `pkp`, `pkp_date`, `fiskal_start`, `fiskal_end`, `account_laba_rugi_bulanan`, `account_laba_rugi_tahunan`, `logo`, `kop`) VALUES
(1, 1, 'CABANG DEMO ABC TEST UBAH LAGI', 'DEMO ABC, PT', 'Jl. Demo Raya', 'Jakarta', 'DKI Jakarta', 'Indonesia', '11100', '021-82212345', '021-82212346', 'demo@demo.com', 'https://www.demo.com', '', '', '', '2000-01-01', '0000-00-00', '2000-01-01', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_currency`
--

CREATE TABLE `mst_currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `negara` varchar(50) NOT NULL,
  `currency_sim` varchar(10) CHARACTER SET utf8 NOT NULL,
  `currency_rate` decimal(10,2) NOT NULL,
  `tax_rate` decimal(10,2) NOT NULL,
  `st_def` int(1) NOT NULL,
  `no_sk` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_currency`
--

INSERT INTO `mst_currency` (`currency_id`, `currency_code`, `negara`, `currency_sim`, `currency_rate`, `tax_rate`, `st_def`, `no_sk`) VALUES
(1, 'IDR', 'INDONESIA', 'Rp.', '1.00', '1.00', 1, ''),
(2, 'USD', 'UNITED STATE OF AMERICA', '$', '14151.00', '13000.00', 0, ''),
(3, 'AUD', 'AUSTRALIA', 'AUD', '11000.00', '0.00', 0, ''),
(19, 'SGD', 'Singapore', 'SGD', '9000.00', '0.00', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_dept`
--

CREATE TABLE `mst_dept` (
  `kode_bagian` varchar(40) NOT NULL,
  `nama_bagian` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_dept`
--

INSERT INTO `mst_dept` (`kode_bagian`, `nama_bagian`) VALUES
('PEMASARAN', 'DIVISI PEMASARAN '),
('PERSONALIA', 'DIVISI PERSONALIA & UMUM'),
('TEKNIK', 'DIVISI TEKNIK'),
('OPERASIONAL', 'DIVISI OPERASIONAL'),
('DIREKTUR', 'DIREKTUR'),
('KEUANGAN', 'DIVISI KEUANGAN'),
('-', '-'),
('NN', 'NO NAME');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_employee`
--

CREATE TABLE `mst_employee` (
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT '1',
  `employee_code` varchar(20) NOT NULL,
  `employee_name` varchar(70) NOT NULL,
  `employee_address` varchar(150) DEFAULT NULL,
  `employee_position` varchar(50) NOT NULL,
  `employee_dept` varchar(50) NOT NULL,
  `akun_hutang` int(11) NOT NULL,
  `akun_piutang` int(11) NOT NULL,
  `tempo` int(10) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'person.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_employee`
--

INSERT INTO `mst_employee` (`employee_id`, `company_id`, `employee_code`, `employee_name`, `employee_address`, `employee_position`, `employee_dept`, `akun_hutang`, `akun_piutang`, `tempo`, `photo`) VALUES
(1, 1, 'NNG', 'NANANG RUSTIANTO', NULL, 'PROGRAMMER', '', 0, 0, 0, 'ca668-whatsapp-image-2018-04-21-at-08.15.00.jpeg'),
(6, 1, 'IRFAN HARITS', 'IRFAN HARITS', NULL, 'MARKETING', 'PEMASARAN', 0, 0, 0, 'bc888-p2350484.jpg'),
(8, 1, 'YAHYA', 'YAHYA', 'Bekasi', 'SUPIR', 'OPERASIONAL', 3691, 3719, 20, 'a409d-person.jpg'),
(10, 1, 'ERIANTI', 'ERIATI', NULL, 'ACCOUTING', 'KEUANGAN', 0, 0, 0, ''),
(11, 1, 'LIDYA ALPIANY', 'LIDYA ALPIANY', NULL, 'FINANCE', 'KEUANGAN', 0, 0, 0, ''),
(12, 1, 'MEGA AYU LESTARI', 'MEGA AYU LESTARI', NULL, 'ADMINISTRASI', 'KEUANGAN', 0, 0, 0, ''),
(13, 1, 'ARION', 'ARION', NULL, 'ADMINISTRASI', 'KEUANGAN', 0, 0, 0, ''),
(14, 1, 'ICHSAN', 'ICHSAN MARTAHAN. N', NULL, 'SUPIR OPERASIONAL', 'OPERASIONAL', 0, 0, 0, ''),
(15, 1, 'YOYOH', 'YOYOH', NULL, 'OFFICE GIRL', 'PERSONALIA', 0, 0, 0, ''),
(16, 1, 'RULY', 'RULY', NULL, 'OFFICE BOY', 'PERSONALIA', 0, 0, 0, ''),
(17, 1, 'SANDI', 'SANDI', NULL, 'MEKANIK', 'TEKNIK', 0, 0, 0, ''),
(18, 1, 'NENDAR', 'NENDAR', NULL, 'GUDANG', 'PERSONALIA', 0, 0, 0, ''),
(19, 1, 'ERNADI', 'ERNADI', NULL, 'MEKANIK', 'TEKNIK', 0, 0, 0, ''),
(20, 1, 'KEMED', 'KEMED', NULL, 'MEKANIK', 'TEKNIK', 0, 0, 0, ''),
(21, 1, 'MAIN', 'MA\'IN', NULL, 'WELDER', 'TEKNIK', 0, 0, 0, ''),
(22, 1, 'JAMSUR', 'JAMSUR', NULL, 'BAGIAN SOLAR', 'OPERASIONAL', 0, 0, 0, ''),
(23, 1, 'ALDI', 'ALDI SOPIAN', NULL, '', '', 0, 0, 0, ''),
(24, 1, 'YUNUS', 'YUNUS', NULL, 'HELPER MEKANIK', 'TEKNIK', 0, 0, 0, ''),
(25, 1, 'SAIPUL', 'SAIPUL ANWAR', NULL, 'SECURITY', 'PERSONALIA', 0, 0, 0, ''),
(26, 1, 'SUPANDJI', 'SUPANDJI', NULL, 'SECURITY', 'PERSONALIA', 0, 0, 0, ''),
(27, 1, 'SUWARNA', 'SUWARNA', NULL, 'SECURITY', 'PERSONALIA', 0, 0, 0, ''),
(28, 1, 'DENI', 'DENI', NULL, 'SECURITY', 'PERSONALIA', 0, 0, 0, ''),
(29, 1, 'MAULANA', 'MAULANA', NULL, 'OPERASIONAL', 'OPERASIONAL', 0, 0, 0, ''),
(30, 1, 'SUWARDI', 'SUWARDI', NULL, 'PENGAWAS LAPANGAN', 'OPERASIONAL', 0, 0, 0, ''),
(31, 1, 'MULYADI', 'MULYADI', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(32, 1, 'YULIANTO', 'YULIANTO', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(33, 1, 'SUMARTONO', 'SUMARTONO', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(34, 1, 'JAJANG', 'JAJANG', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(35, 1, 'GUMIN', 'GUMIN', NULL, 'OPERAT0R', 'TEKNIK', 0, 0, 0, ''),
(36, 1, 'HAROM', 'HAROM', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(37, 1, 'MURDIANA', 'MURDIANA', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(38, 1, 'SAAM', 'SAAM', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(39, 1, 'RISKI', 'RISKI', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(40, 1, 'SURYA', 'SURYA', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(41, 1, 'MAHMUDI', 'MAHMUDI', NULL, 'OPERATOR', 'TEKNIK', 0, 0, 0, ''),
(42, 1, 'EKA', 'EKA SURYANINGSIH', NULL, '', '', 0, 0, 0, ''),
(43, 1, 'INDRA', 'INDRA', NULL, '', '', 0, 0, 0, ''),
(44, 1, 'ANWAR', 'ANWAR', NULL, 'MEKANIK', 'TEKNIK', 0, 0, 0, ''),
(45, 1, 'YULIANA', 'YULIANA', NULL, 'DIREKTUR', 'DIREKTUR', 0, 0, 0, ''),
(46, 1, 'KOMARUDIN', 'KOMARUDIN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(47, 1, 'KURSI', 'KURSI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(48, 1, 'IDA', 'IDA', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(49, 1, 'ACEP', 'ACEP', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(50, 1, 'SUPRI', 'SUPRI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(51, 1, 'GUNAWAN', 'GUNAWAN', NULL, 'SUPIR', 'OPERASIONAL', 3691, 3719, 7, ''),
(52, 1, 'ANDI', 'ANDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(53, 1, 'EDI', 'EDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(54, 1, 'MISNANG', 'MISNANG', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(55, 1, 'BUDI', 'BUDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(56, 1, 'MAMUN', 'MAMUN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(57, 1, 'MUGNI', 'MUGNI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(58, 1, 'NIMAN', 'NIMAN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(59, 1, 'DEDE', 'DEDE - BKU', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(60, 1, 'ARIYANSYAH', 'ARIYANSYAH', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(61, 1, 'ENJUN', 'ENJUN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(62, 1, 'ISAN', 'ISAN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(63, 1, 'SELON', 'SELON', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(64, 1, 'NANA', 'NANA', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(65, 1, 'MAHMUDIN', 'MAHMUDIN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(66, 1, 'DEDE_TPP', 'DEDE - TPP', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(67, 1, 'EKA.', 'EKA.', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(68, 1, 'HERMAN', 'HERMAN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(69, 1, 'ARIF', 'ARIF', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(70, 1, 'HENDRIK', 'HENDRIK', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(71, 1, 'SAHRU', 'SAHRU', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(72, 1, 'IJANG', 'IJANG', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(73, 1, 'USEP', 'USEP', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(74, 1, 'IDRIS', 'IDRIS', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(75, 1, 'GUNAWANPYT', 'GUNAWAN PYT', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(76, 1, 'TATANG', 'TATANG', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(77, 1, 'AHDI', 'AHDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(78, 1, 'SAPAN', 'SAPAN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(79, 1, 'SUKO', 'SUKO', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(80, 1, 'DWI', 'DWI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(81, 1, 'SLAMET', 'SLAMET', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(82, 1, 'ARI', 'ARI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(83, 1, 'KUSYANTO', 'KUSYANTO', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(84, 1, 'WAHYUDI', 'WAHYUDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(85, 1, 'TOIFUL', 'TOIFUL', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(86, 1, 'JONI', 'JONI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(87, 1, 'RUDI', 'RUDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(88, 1, 'ARDI', 'ARDI', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(89, 1, 'MUSA', 'MUSA', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(90, 1, 'RENDY', 'RENDY', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(91, 1, 'SARMIN', 'SARMIN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(92, 1, 'ROIB', 'ROIB', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(93, 1, 'NANANG', 'NANANG', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(94, 1, 'NIRMAN', 'NIRMAN', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(95, 1, 'ABEDNEGO', 'ABEDNEGO', NULL, 'MARKETING', 'PEMASARAN', 0, 0, 0, 'd84ec-p2340882.jpg'),
(96, 1, 'BENI SADELI', 'BENI SADELI', NULL, 'MARKETING', 'PEMASARAN', 0, 0, 0, ''),
(97, 1, '-', '-', NULL, '-', '-', 0, 0, 0, ''),
(98, 1, 'SABARUDIN', 'SABARUDIN', NULL, 'MARKETING', 'PEMASARAN', 0, 0, 0, ''),
(99, 1, 'NN', 'NO NAME', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, ''),
(100, 1, 'ABDULAH', 'ABDULAH', NULL, 'SUPIR', 'OPERASIONAL', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_login`
--

CREATE TABLE `mst_login` (
  `login_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `login_password` varchar(32) NOT NULL,
  `login_is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst_login`
--

INSERT INTO `mst_login` (`login_id`, `employee_id`, `login_email`, `login_password`, `login_is_active`, `created_date`, `created_by`) VALUES
(1, 1, 'demo@demo.com', '', 1, '2019-05-05 23:03:28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_vendor`
--

CREATE TABLE `mst_vendor` (
  `id_sup` int(11) NOT NULL,
  `kd_sup` varchar(40) NOT NULL,
  `nm_sup` varchar(60) NOT NULL,
  `nm_sup1` varchar(60) NOT NULL,
  `nm_sup2` varchar(60) NOT NULL,
  `no_ap` varchar(15) NOT NULL,
  `nm_ap` varchar(60) NOT NULL,
  `tg_mas` date NOT NULL,
  `id_s` int(10) NOT NULL,
  `id_t` int(10) NOT NULL,
  `id_f` int(10) NOT NULL,
  `id_k` int(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `al_pjk` varchar(100) NOT NULL,
  `al_kir` varchar(100) NOT NULL,
  `prop` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kd_pos` varchar(6) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `web` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kd_apgro` varchar(5) NOT NULL,
  `nm_apgro` varchar(10) NOT NULL,
  `kd_area` varchar(5) NOT NULL,
  `nm_area` varchar(30) NOT NULL,
  `hut_awa` decimal(16,2) NOT NULL,
  `cr_jou` decimal(16,2) NOT NULL,
  `db_jou` decimal(16,2) NOT NULL,
  `hut_rp` decimal(16,2) NOT NULL,
  `tk` varchar(10) NOT NULL,
  `tempo` int(10) NOT NULL,
  `cr_lim` decimal(16,2) NOT NULL,
  `sisa_lim` decimal(16,2) NOT NULL,
  `st_akt` int(1) NOT NULL,
  `cbank` varchar(60) NOT NULL,
  `nm_gir` varchar(30) NOT NULL,
  `rek` varchar(30) NOT NULL,
  `atas` varchar(30) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `pkp` varchar(30) NOT NULL,
  `tg_pkp` date NOT NULL,
  `ppn` int(2) NOT NULL,
  `inc_ppn` enum('Tidak','Ya') NOT NULL,
  `pph23` int(2) NOT NULL,
  `cur_code` varchar(10) NOT NULL,
  `cur_rate` decimal(10,2) NOT NULL,
  `tax_rate` decimal(10,2) NOT NULL,
  `kd_hc` varchar(6) NOT NULL,
  `nm_hc` varchar(60) NOT NULL,
  `hc` int(1) NOT NULL,
  `kd_dv` varchar(10) NOT NULL,
  `nm_dv` varchar(45) NOT NULL,
  `dv` int(1) NOT NULL,
  `status` enum('Ya','Tidak') NOT NULL,
  `id_use` varchar(30) NOT NULL,
  `kd_use2` varchar(20) NOT NULL,
  `kd_use` varchar(20) NOT NULL,
  `st_ohr` int(1) NOT NULL,
  `st_oht` int(1) NOT NULL,
  `time_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL,
  `kelompok` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_vendor`
--

INSERT INTO `mst_vendor` (`id_sup`, `kd_sup`, `nm_sup`, `nm_sup1`, `nm_sup2`, `no_ap`, `nm_ap`, `tg_mas`, `id_s`, `id_t`, `id_f`, `id_k`, `alamat`, `al_pjk`, `al_kir`, `prop`, `kota`, `kd_pos`, `telp`, `hp`, `kontak`, `fax`, `web`, `email`, `kd_apgro`, `nm_apgro`, `kd_area`, `nm_area`, `hut_awa`, `cr_jou`, `db_jou`, `hut_rp`, `tk`, `tempo`, `cr_lim`, `sisa_lim`, `st_akt`, `cbank`, `nm_gir`, `rek`, `atas`, `npwp`, `pkp`, `tg_pkp`, `ppn`, `inc_ppn`, `pph23`, `cur_code`, `cur_rate`, `tax_rate`, `kd_hc`, `nm_hc`, `hc`, `kd_dv`, `nm_dv`, `dv`, `status`, `id_use`, `kd_use2`, `kd_use`, `st_ohr`, `st_oht`, `time_entry`, `last_update`, `kelompok`) VALUES
(8, 'MBJ', 'MENARA BENTENG JAYA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 10, 'Ya', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-09-08 08:05:25', '0000-00-00 00:00:00', ''),
(9, 'SU', 'SUMBER USAHA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 30, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 01:40:02', '0000-00-00 00:00:00', ''),
(34, 'GP', 'TOKO Gn.PUTRI', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 21:21:36', '0000-00-00 00:00:00', ''),
(11, 'PJ', 'UD. PRATAMA JAYA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:38:36', '0000-00-00 00:00:00', ''),
(12, 'WM', 'WIJAYA MOTOR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:38:54', '0000-00-00 00:00:00', ''),
(13, 'TMM', 'TIRTA MAS MOTOR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:39:20', '0000-00-00 00:00:00', ''),
(14, 'TPD', 'TRACTOR POWER DIESEL', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 7, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-06-27 09:33:37', '0000-00-00 00:00:00', ''),
(15, 'PP', 'PT. PETROASIA PASIFIK', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:40:47', '0000-00-00 00:00:00', ''),
(16, 'BGP', 'BUANA GEMILANG PRIMA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:41:12', '0000-00-00 00:00:00', ''),
(17, 'MM', 'METAL MOTOR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:41:29', '0000-00-00 00:00:00', ''),
(18, 'CS', 'CAHAYA SPRING', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:42:05', '0000-00-00 00:00:00', ''),
(19, 'BRC', 'BIMA RAYA CAT', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:42:28', '0000-00-00 00:00:00', ''),
(20, 'RJM', 'RATIH JAYA MULIA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:42:56', '0000-00-00 00:00:00', ''),
(21, 'FM', 'FUJI MOTOR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:43:18', '0000-00-00 00:00:00', ''),
(22, 'MS', 'MEGA SETIA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 'Bpk. Galatasam', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 10, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-08-31 12:41:57', '0000-00-00 00:00:00', ''),
(23, 'ABL', 'ANUGRAH BUANA LANCAR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, 'Tidak', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-12-05 08:42:45', '0000-00-00 00:00:00', ''),
(24, 'CRW', 'CROWN', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 'Bpk. KASIMAN', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 10, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-08-31 12:45:02', '0000-00-00 00:00:00', ''),
(25, 'SM', 'SUMBER MOTOR', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 20:44:39', '0000-00-00 00:00:00', ''),
(26, 'MIS', 'PT MULTIPRIMA INDOSEJAHTERA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:28', '0000-00-00 00:00:00', ''),
(27, 'TSP', 'PT. TIGA SINAR PERKASA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:36', '0000-00-00 00:00:00', ''),
(28, 'GSM', 'GUNUNG SUMBER MURNI', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:23', '0000-00-00 00:00:00', ''),
(29, 'JA', 'CV. JAYA ABADI', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:25', '0000-00-00 00:00:00', ''),
(30, 'SJB', 'SURYA JAYA BAN', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:31', '0000-00-00 00:00:00', ''),
(31, 'SR', 'SUMBER REJEKI', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-12-05 08:25:33', '0000-00-00 00:00:00', ''),
(32, 'TBB', 'TAMBAL BAN BERSAMA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 21:04:45', '0000-00-00 00:00:00', ''),
(33, 'TPP', 'PT. TRANSINDO PERKASA PRIMA', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 14, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, '', '', '', '', 0, 0, '2018-05-28 21:09:24', '0000-00-00 00:00:00', ''),
(37, 'KDE', 'Test Vendor', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, 'Alamat', '', '', '', '', '', '', '', 'Kontak', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 30, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 10, 'Ya', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-08-31 15:25:43', '0000-00-00 00:00:00', ''),
(38, 'CDA', 'Ce De A', '', '', '', '', '0000-00-00', 0, 0, 0, 0, 'qweqs', '', '', '', 'asdasd', '', '23123', '', '123', '34342', '', 'asdas@email', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 0, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 34, 'Ya', 23, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-11-21 15:09:56', '0000-00-00 00:00:00', 'adas'),
(39, 'DLT', 'PT. DAMAR LOGISTIK TRANSPORT', '', '', '1135', '', '0000-00-00', 0, 0, 0, 0, 'Jl. Abadi Makmur No. 7', '', '', '', 'JAKARTA UTARA', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '', 7, '0.00', '0.00', 0, '', '', '', '', '', '', '0000-00-00', 0, 'Tidak', 0, '', '0.00', '0.00', '', '', 0, '', '', 0, 'Ya', '', '', '', 0, 0, '2018-12-03 14:03:03', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_coa`
--
ALTER TABLE `mst_coa`
  ADD PRIMARY KEY (`coa_id`),
  ADD UNIQUE KEY `no_acc` (`coa_no`);

--
-- Indeks untuk tabel `mst_coa_group`
--
ALTER TABLE `mst_coa_group`
  ADD PRIMARY KEY (`coa_group_id`);

--
-- Indeks untuk tabel `mst_company`
--
ALTER TABLE `mst_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indeks untuk tabel `mst_company_branch`
--
ALTER TABLE `mst_company_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indeks untuk tabel `mst_currency`
--
ALTER TABLE `mst_currency`
  ADD PRIMARY KEY (`currency_id`),
  ADD UNIQUE KEY `cur_code` (`currency_code`);

--
-- Indeks untuk tabel `mst_dept`
--
ALTER TABLE `mst_dept`
  ADD PRIMARY KEY (`kode_bagian`);

--
-- Indeks untuk tabel `mst_employee`
--
ALTER TABLE `mst_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `kode_karyawan` (`employee_code`);

--
-- Indeks untuk tabel `mst_login`
--
ALTER TABLE `mst_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `mst_vendor`
--
ALTER TABLE `mst_vendor`
  ADD PRIMARY KEY (`id_sup`),
  ADD UNIQUE KEY `kd_sup` (`kd_sup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_coa`
--
ALTER TABLE `mst_coa`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4220;

--
-- AUTO_INCREMENT untuk tabel `mst_coa_group`
--
ALTER TABLE `mst_coa_group`
  MODIFY `coa_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mst_company`
--
ALTER TABLE `mst_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_company_branch`
--
ALTER TABLE `mst_company_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_currency`
--
ALTER TABLE `mst_currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mst_employee`
--
ALTER TABLE `mst_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `mst_login`
--
ALTER TABLE `mst_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_vendor`
--
ALTER TABLE `mst_vendor`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29 Sep 2017 pada 14.19
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnidiklat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_users`
--

CREATE TABLE `app_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin ,2=pihak jurusan ,3=pegawai ,4=mahasiswa',
  `keterangan` varchar(5) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_users`
--

INSERT INTO `app_users` (`id_users`, `username`, `nama`, `password`, `level`, `keterangan`, `last_login`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '2017-09-29 18:42:17'),
(10, 'hery', '', '11357611cb1b43ff3138d1eba068644b', 3, '11111', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat`
--

CREATE TABLE `diklat` (
  `nosttp` varchar(12) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `tgl_sttp` date NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `namadiklat` varchar(50) NOT NULL,
  `tempatdiklat` varchar(35) NOT NULL,
  `penyelenggara` varchar(35) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `jml_jam` int(11) NOT NULL,
  `judullapproper` varchar(50) NOT NULL,
  `full_path` varchar(100) DEFAULT NULL,
  `filesttp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diklat`
--

INSERT INTO `diklat` (`nosttp`, `nip`, `tgl_sttp`, `tglmulai`, `tglselesai`, `namadiklat`, `tempatdiklat`, `penyelenggara`, `angkatan`, `jml_jam`, `judullapproper`, `full_path`, `filesttp`) VALUES
('1122ABC', '12345', '2017-09-28', '2017-09-25', '2017-09-28', 'jaringan', 'hotel dinasti', 'kominfo', 2, 28, 'dampak kerusakan jaringan', 'herysusantosdotblogspotdotcom11.jpg', NULL),
('adfg', '', '2017-09-29', '2017-09-29', '2017-09-30', 'pelatihan microsoft', 'hotel dinasti', 'kominfo', 2, 28, 'dampak kerusakan jaringan', 'herysusantosdotblogspotdotcom2.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `filesttp`
--

CREATE TABLE `filesttp` (
  `nosttp` varchar(12) NOT NULL,
  `filesttp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `filesttp`
--

INSERT INTO `filesttp` (`nosttp`, `filesttp`) VALUES
('12345', 'herysusantosdotblogspotdotcom21.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(11),
(11),
(11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `kode_gol` varchar(5) NOT NULL,
  `gol` varchar(15) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `kode_instansi` varchar(8) NOT NULL,
  `nama_instansi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisdiklat`
--

CREATE TABLE `jenisdiklat` (
  `kode_diklat` varchar(8) NOT NULL,
  `nama_diklat` varchar(15) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id_mainmenu` int(11) NOT NULL,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=jurusan,3 dosen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mainmenu`
--

INSERT INTO `mainmenu` (`id_mainmenu`, `nama_mainmenu`, `icon`, `aktif`, `link`, `level`) VALUES
(26, 'Master data', 'fa fa-bar-chart-o', 'y', '#', 1),
(28, 'Diklat', 'fa fa-building-o', 'y', '#', 1),
(29, 'Laporan', 'gi gi-notes_2', 'y', '#', 1),
(31, 'Mahasiswa', 'gi gi-group', 'y', 'mahasiswa', 2),
(32, 'dosen', 'gi gi-user', 'y', 'dosen', 2),
(33, 'matakuliah', 'gi gi-address_book', 'y', 'matakuliah', 2),
(34, 'registrasi', 'hi hi-qrcode', 'y', 'registrasi', 2),
(35, 'krs & khs', 'gi gi-display', 'y', '#', 2),
(36, 'jadwal kuliah', 'gi gi-calendar', 'y', 'jadwalkuliah', 2),
(37, 'jadwal', 'gi gi-calendar', 'y', 'jadwalkuliah/jadwalngajar', 3),
(38, 'absen mahasiswa', 'gi gi-notes_2', 'y', 'absensi', 3),
(39, 'nilai', 'gi gi-stats', 'y', 'khs/berinilai', 3),
(40, 'bodata', 'gi gi-user', 'y', 'users/account', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `outbox`
--

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2014-05-12 09:23:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 46, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:23:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 45, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:23:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 44, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:23:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 42, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:23:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 43, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:23:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 41, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:24:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 47, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-12 09:24:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 48, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-22 03:14:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah -500000', 49, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2014-05-22 03:14:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 4750000', 50, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2017-05-26 14:10:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 8200000', 51, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris'),
('2017-05-26 14:10:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '082121473036', 'Default_No_Compression', NULL, -1, 'Biaya Tunggakan Keuangan anak anda adalah 8200000', 52, 'false', -1, 'keuangan', '0000-00-00 00:00:00', 'default', 'Nuris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `gol` varchar(8) NOT NULL,
  `pangkat` varchar(12) NOT NULL,
  `instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`nip`, `nama`, `gol`, `pangkat`, `instansi`) VALUES
('12345', 'iwan', '3A', 'pranata komp', 'humas'),
('123456789012345', 'Hery Susanto', '3B', 'Pelaksana', 'Kominfo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('keuangan', '2014-05-12 01:27:43', '2014-05-11 23:20:24', '2014-05-12 01:27:53', 'yes', 'yes', '354058180822796', 'Gammu 1.28.90, Windows Server 2007, GCC 4.4, MinGW 3.13', 0, 0, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2014-04-27 23:08:17', '0000-00-00 00:00:00', '2014-04-27 23:08:17', NULL, '00740065007300740069006E006700200073006D0073002000700065007200740061006D0061', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'testing sms pertama', 1, 'testingSMS', 1, 'SendingOKNoReport', -1, 19, 255, 'Gammu 1.28.90'),
('2014-04-27 23:26:31', '0000-00-00 00:00:00', '2014-04-27 23:26:31', NULL, '007400650073007400200073006D00730020006B0065006400750061', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'test sms kedua', 2, 'testingSMS', 1, 'SendingError', -1, -1, 255, 'nuris'),
('2014-04-27 23:28:50', '0000-00-00 00:00:00', '2014-04-27 23:28:50', NULL, '006800680068006800680068', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hhhhhh', 8, 'testingSMS', 1, 'SendingOKNoReport', -1, 20, 255, 'Gammu 1.28.90'),
('2014-04-27 23:28:53', '0000-00-00 00:00:00', '2014-04-27 23:28:53', NULL, '00680061006C006C006F0020006E0075007200690073', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hallo nuris', 3, 'testingSMS', 1, 'SendingOKNoReport', -1, 21, 255, 'Gammu'),
('2014-04-27 23:28:56', '0000-00-00 00:00:00', '2014-04-27 23:28:56', NULL, '00680061006C006C006F0020006E0075007200690073', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hallo nuris', 4, 'testingSMS', 1, 'SendingOKNoReport', -1, 22, 255, 'Gammu'),
('2014-04-27 23:29:00', '0000-00-00 00:00:00', '2014-04-27 23:29:00', NULL, '0068006100690020006E007500720069007300200061006B006200610072', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hai nuris akbar', 5, 'testingSMS', 1, 'SendingOKNoReport', -1, 23, 255, 'Gammu 1.28.90'),
('2014-04-27 23:29:03', '0000-00-00 00:00:00', '2014-04-27 23:29:03', NULL, '0068006100690020006E007500720069007300200061006B0062006100720032', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hai nuris akbar2', 6, 'testingSMS', 1, 'SendingOKNoReport', -1, 24, 255, 'Gammu 1.28.90'),
('2014-04-27 23:29:06', '0000-00-00 00:00:00', '2014-04-27 23:29:06', NULL, '00630063006300630063', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'ccccc', 7, 'testingSMS', 1, 'SendingOKNoReport', -1, 25, 255, 'Gammu 1.28.90'),
('2014-04-27 23:29:09', '0000-00-00 00:00:00', '2014-04-27 23:29:09', NULL, '006B006B006B006B006B', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'kkkkk', 9, 'testingSMS', 1, 'SendingOKNoReport', -1, 26, 255, 'Gammu 1.28.90'),
('2014-04-27 23:45:17', '0000-00-00 00:00:00', '2014-04-27 23:45:17', NULL, '0063006F006200610020006B006900720069006D0020006400610072006900200063006F0064006500690067006E0069007400650072', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'coba kirim dari codeigniter', 10, 'testingSMS', 1, 'SendingOKNoReport', -1, 27, 255, 'Gammu 1.28.90'),
('2014-04-27 23:45:21', '0000-00-00 00:00:00', '2014-04-27 23:45:21', NULL, '0063006F006200610020006B006900720069006D0020006400610072006900200063006F0064006500690067006E00690074006500720020006B0065006400750061', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'coba kirim dari codeigniter kedua', 11, 'testingSMS', 1, 'SendingOKNoReport', -1, 28, 255, 'Gammu 1.28.90'),
('2014-04-27 23:45:56', '0000-00-00 00:00:00', '2014-04-27 23:45:56', NULL, '0063006F006200610020006B006900720069006D0020006400610072006900200063006F0064006500690067006E00690074006500720020006B00650074006900670061', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'coba kirim dari codeigniter ketiga', 12, 'testingSMS', 1, 'SendingOKNoReport', -1, 29, 255, 'Gammu 1.28.90'),
('2014-04-27 23:49:01', '0000-00-00 00:00:00', '2014-04-27 23:49:01', NULL, '006800610069002000620072006F', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'hai bro', 13, 'testingSMS', 1, 'SendingOKNoReport', -1, 30, 255, 'Gammu 1.28.90'),
('2014-04-28 00:30:10', '0000-00-00 00:00:00', '2014-04-28 00:30:10', NULL, '0057006500620020006F006600200049006E0066006F0072006D006100740069006F006E002000530079007300740065006D0020006F006600200041006B006100640065006D00690063002000500072006F006700720061006D00200053007400750064007900200049006E0073007400720075006D0065006E0074006100740069006F006E000D000A00200020002000200020002000200020002000200020002000200020002000200061006E006400200045006C0065006300740072006F006E006900630073002000680061007600650020006200650065006E002000640065007300690067006E0065006400200061006E0064002000630061006E0020006200650020006100630063006500730073006500640020007400680072006F00750067006800200069006E007400650072', '082121473036', 'Default_No_Compression', '0500038C0301', '+6289644000001', -1, 'Web of Information System of Akademic Program Study Instrumentation\r\n                and Electronics have been designed and can be accessed through inter', 15, 'testingSMS', 1, 'SendingOKNoReport', -1, 31, 255, 'Gammu'),
('2014-04-28 00:30:14', '0000-00-00 00:00:00', '2014-04-28 00:30:14', NULL, '006E00650074002E0020004200790020007700650062000D000A002000200020002000200020002000200020002000200020002000200020002000740068006500200061006C006C00200069006E0066006F0072006D006100740069006F006E002000610062006F007500740020006B006E006F007700610062006C006500200061006B006100640065006D00690063002E000D000A0020002000200020002000200020002000200020002000200020002000200020005700650062002000640065007300690067006E0065006400200072006500700072006500730065006E0074002000640079006E0061006D00690063002000770065006200200073006F00200074006800610074002000630061006E0020006D0061006B0065002000610020006300680061006E0067006500200064', '082121473036', 'Default_No_Compression', '0500038C0302', '+6289644000001', -1, 'net. By web\r\n                the all information about knowable akademic.\r\n                Web designed represent dynamic web so that can make a change d', 15, 'testingSMS', 2, 'SendingOKNoReport', -1, 32, 255, 'Gammu'),
('2014-04-28 00:30:16', '0000-00-00 00:00:00', '2014-04-28 00:30:16', NULL, '006100740061002000610074002E', '082121473036', 'Default_No_Compression', '0500038C0303', '+6289644000001', -1, 'ata at.', 15, 'testingSMS', 3, 'SendingOKNoReport', -1, 33, 255, 'Gammu'),
('2014-05-11 09:21:47', '0000-00-00 00:00:00', '2014-05-11 09:21:47', NULL, '0067006600670066006700660067', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'gfgfgfg', 23, 'keuangan', 1, 'SendingOKNoReport', -1, 134, 255, 'Gammu 1.28.90'),
('2014-05-11 23:20:58', '0000-00-00 00:00:00', '2014-05-11 23:20:58', NULL, '0074006500730020006B006900720069006D00200073006D0073', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'tes kirim sms', 36, 'keuangan', 1, 'SendingOKNoReport', -1, 160, 255, 'Gammu 1.28.90'),
('2014-05-11 23:25:35', '0000-00-00 00:00:00', '2014-05-11 23:25:35', NULL, '00420069006100790061002000540075006E006700670061006B0061006E0020004B006500750061006E00670061006E00200061006E0061006B00200061006E006400610020006100640061006C0061006800200033003500300030003000300030', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'Biaya Tunggakan Keuangan anak anda adalah 3500000', 40, 'keuangan', 1, 'SendingOKNoReport', -1, 161, 255, 'Nuris'),
('2014-05-11 23:25:38', '0000-00-00 00:00:00', '2014-05-11 23:25:38', NULL, '00420069006100790061002000540075006E006700670061006B0061006E0020004B006500750061006E00670061006E00200061006E0061006B00200061006E006400610020006100640061006C0061006800200031003400300030003000300030', '082121473036', 'Default_No_Compression', '', '+6289644000001', -1, 'Biaya Tunggakan Keuangan anak anda adalah 1400000', 39, 'keuangan', 1, 'SendingOKNoReport', -1, 162, 255, 'Nuris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_kampus` varchar(160) NOT NULL,
  `alamat_kampus` text NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_kampus`, `alamat_kampus`, `telpon`) VALUES
(1, 'politeknik tedc bandung1', 'cimahi', '0218765431');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_mainmenu`, `nama_submenu`, `link`, `aktif`, `icon`, `level`) VALUES
(70, 28, 'Detil Diklat', 'diklat', 'y', 'gi gi-calendar', 1),
(71, 28, 'Upload File STTP', 'sttp', 'y', 'gi gi-calendar', 1),
(73, 26, 'golongan', 'golongan', 'y', 'gi gi-parents', 1),
(74, 26, 'jenisdiklat', 'jenisdiklat', 'y', 'gi gi-parents', 1),
(75, 26, 'instansi', 'instansi', 'y', 'gi gi-parents', 1),
(76, 26, 'peserta', 'peserta', 'y', 'gi gi-parents', 1),
(82, 29, 'Laporan Diklat', 'laporandiklat/laporan', 'y', 'gi gi-notes_2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`nosttp`);

--
-- Indexes for table `filesttp`
--
ALTER TABLE `filesttp`
  ADD PRIMARY KEY (`nosttp`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`kode_gol`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`kode_instansi`);

--
-- Indexes for table `jenisdiklat`
--
ALTER TABLE `jenisdiklat`
  ADD PRIMARY KEY (`kode_diklat`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id_mainmenu`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id_mainmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `pbk`
--
ALTER TABLE `pbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

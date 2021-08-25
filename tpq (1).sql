-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Agu 2021 pada 04.34
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `id_assignment` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`id_assignment`, `id_aunt`, `item_name`, `user_id`, `created_at`) VALUES
(1, 1, 'Superadmin', 1, '0000-00-00 00:00:00'),
(2, 2, 'Admin', 2, NULL),
(9, 2, 'Admin', 14, '2020-12-05 09:44:53'),
(10, 3, 'User', 15, '2020-12-05 13:31:57'),
(11, 3, 'User', 16, '2020-12-09 10:53:24'),
(12, 2, 'Admin', 17, '2020-12-09 10:58:12'),
(13, 3, 'User', 18, '2021-08-10 18:15:03'),
(14, 2, 'Admin', 19, '2021-08-10 18:21:41'),
(15, 3, 'User', 20, '2021-08-10 18:22:31'),
(16, 3, 'User', 21, '2021-08-15 12:55:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `id_aunt` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`id_aunt`, `name`, `tipe`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 1, 'hak akses admin', NULL, NULL),
(2, 'Admin', 1, 'hak akses kasir', NULL, NULL),
(3, 'User', 1, 'Hak akses diatas admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `idc` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`idc`, `id_aunt`, `parent`, `child`) VALUES
(1, 1, 'Superadmin', 15),
(2, 1, 'Superadmin', 22),
(3, 1, 'Superadmin', 33),
(4, 1, 'Superadmin', 13),
(15, 1, 'Superadmin', 47),
(16, 1, 'Superadmin', 48),
(28, 1, 'Superadmin', 40),
(42, 1, 'Superadmin', 41),
(43, 2, 'Admin', 12),
(45, 1, 'Superadmin', 49),
(46, 1, 'Superadmin', 50),
(47, 1, 'Superadmin', 51),
(48, 1, 'Superadmin', 52),
(50, 1, 'Superadmin', 54),
(51, 1, 'Superadmin', 56),
(52, 1, 'Superadmin', 55),
(53, 1, 'Superadmin', 57),
(58, 1, 'Superadmin', 70),
(68, 2, 'Admin', 61),
(69, 2, 'Admin', 62),
(70, 2, 'Admin', 63),
(75, 1, 'Superadmin', 76),
(76, 1, 'Superadmin', 77),
(77, 1, 'Superadmin', 78),
(78, 1, 'Superadmin', 74),
(79, 1, 'Superadmin', 79),
(81, 1, 'Superadmin', 80),
(82, 1, 'Superadmin', 81),
(83, 1, 'Superadmin', 82),
(84, 1, 'Superadmin', 83),
(85, 1, 'Superadmin', 84),
(86, 1, 'Superadmin', 85),
(87, 1, 'Superadmin', 86),
(88, 1, 'Superadmin', 63),
(89, 1, 'Superadmin', 89),
(90, 1, 'Superadmin', 90),
(91, 2, 'Admin', 90),
(92, 2, 'Admin', 84),
(93, 2, 'Admin', 85),
(94, 2, 'Admin', 86),
(97, 2, 'Admin', 89),
(100, 1, 'Superadmin', 73),
(102, 2, 'Admin', 40),
(103, 3, 'User', 12),
(104, 3, 'User', 92),
(105, 3, 'User', 93),
(106, 3, 'User', 61),
(107, 3, 'User', 62),
(108, 3, 'User', 63),
(109, 3, 'User', 94),
(110, 3, 'User', 95),
(111, 1, 'Superadmin', 95),
(112, 2, 'Admin', 95),
(113, 1, 'Superadmin', 96),
(114, 2, 'Admin', 96),
(115, 3, 'User', 97),
(116, 2, 'Admin', 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_kelas_siswa` int(11) NOT NULL,
  `kelakuan` varchar(11) DEFAULT '0',
  `kerajinan` varchar(11) DEFAULT '0',
  `kebersihan` varchar(11) DEFAULT '0',
  `izin` varchar(11) DEFAULT '-',
  `sakit` varchar(11) DEFAULT '-',
  `alpa` varchar(11) DEFAULT '-',
  `catatan` text DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_kelas_siswa`, `kelakuan`, `kerajinan`, `kebersihan`, `izin`, `sakit`, `alpa`, `catatan`) VALUES
(2, 15, '90', '85', '75', '-', '-', '-', 'tes'),
(3, 14, '0', '0', '0', '-', '-', '-', ''),
(4, 8, '0', '0', '0', '-', '-', '-', 'g'),
(5, 10, '0', '0', '0', '-', '-', '-', '-'),
(6, 18, '0', '0', '0', '-', '-', '-', '-'),
(7, 19, '0', '0', '0', '-', '-', '-', '-'),
(8, 20, '0', '0', '0', '-', '-', '-', '-'),
(9, 21, '0', '0', '0', '-', '1', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_file`
--

CREATE TABLE `data_file` (
  `id_file` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_file`
--

INSERT INTO `data_file` (`id_file`, `judul`, `deskripsi`, `file`, `tgl_upload`) VALUES
(1, 'edewd', 'dwedweqdwedwed fewfd weq', 'dwed.jpg', '2020-11-20'),
(8, 'Amazing Taste Beautiful Place', 'we twt ww4 yw4 we twt ww4 yw4 we twt ww4 yw4 we twt ww4 yw4 we twt ww4 yw4', 'file_20112020175217.png', '2020-11-20'),
(9, 'The Best Coffee Testing Experience', 'gukfgykfyjkf', 'file_20112020175227.pdf', '2020-11-20'),
(10, 'Amazing Taste Beautiful Place', 'kggk', 'file_20112020175303.docx', '2020-11-20'),
(11, 'ewrewr 324', 'dsasad', 'file_02122020073706.docx', '2020-12-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenis_mapel`
--

CREATE TABLE `data_jenis_mapel` (
  `id_jenis_mapel` int(11) NOT NULL,
  `nama_jenis_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jenis_mapel`
--

INSERT INTO `data_jenis_mapel` (`id_jenis_mapel`, `nama_jenis_mapel`) VALUES
(1, 'Tadarus Al-Qur\'an'),
(2, 'Hafalan Surah Pendek'),
(3, 'Ilmu Tajwid'),
(4, 'Bacaan Solat'),
(5, 'Amalan Solat'),
(6, 'Doa dan Adab Harian'),
(7, 'Tahsinul Kitabah'),
(8, 'Dienul Islam'),
(9, 'Muatan Lokal'),
(10, 'Hafalan Ayat Pilihan'),
(11, 'Al Qur\'an'),
(12, 'Al Hadist'),
(13, 'Aqidah'),
(14, 'Akhlaq'),
(15, 'Fiqih'),
(16, 'Tarekh Islam'),
(17, 'Bahasa Arab'),
(18, 'dfssdf'),
(19, 'ssss'),
(20, 'wedewdew'),
(21, 'dsfdsf'),
(22, 'arab patin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenjang`
--

CREATE TABLE `data_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jenjang`
--

INSERT INTO `data_jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'Wustho'),
(2, 'Awwaliyah'),
(3, 'TPQ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `id_jenjang`) VALUES
(1, 'Wustho Kelas 1', 1),
(3, 'Awwaliyah 4', 2),
(6, 'Awwaliyah 3', 2),
(7, 'Awwaliyah 2', 2),
(8, 'Awwaliyah 1', 2),
(13, 'TPQ Level B', 3),
(14, 'TPQ Level A', 3),
(15, 'TPQ Level C', 3),
(16, 'Wustho Kelas 2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mapel`
--

CREATE TABLE `data_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `id_jenis_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mapel`
--

INSERT INTO `data_mapel` (`id_mapel`, `nama_mapel`, `id_jenis_mapel`) VALUES
(1, 'Hafalan ayat pilihan2', 10),
(2, 'Amalan Solat', 5),
(3, 'Hafalan surah pendek', 2),
(5, 'Tadarus Al Qur\'an', 1),
(8, 'Ilmu Tajwid', 3),
(13, 'Bacaan solat ketika takbiratul ihrom sampai dengan salam', 4),
(14, 'Do\'a dan adab sehari-hari', 6),
(15, 'Tahsinul kitabah', 7),
(16, 'Dienul Islam', 8),
(17, 'Persinas ASAD', 9),
(18, 'Tahfidz', 9),
(19, 'Bacaan Al Qur\'an', 11),
(20, 'Do\'a dan Dalil - dalil', 12),
(21, '6 Thobi\'at luhur', 13),
(22, 'Pendalaman beratnya hukum zina', 13),
(23, 'Tata Krama', 14),
(24, 'Praktek ibadah', 15),
(25, 'Keteladanan Nabi dan Rosul', 16),
(26, 'Arab Pegon', 17),
(27, 'Makna himpunan Hadist', 17),
(28, 'to the monn', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_santri`
--

CREATE TABLE `data_santri` (
  `id_santri` int(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telepon_ortu` varchar(20) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_santri`
--

INSERT INTO `data_santri` (`id_santri`, `nama_lengkap`, `nama_panggilan`, `nomor_induk`, `tempat_lahir`, `tanggal_lahir`, `anak_ke`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `telepon_ortu`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `foto`, `tanggal_masuk`, `id_user`) VALUES
(5, 'johar', 'jo', '1001001', 'malang', '2010-02-01', 1, 'janjan', 'lili', 'nga', 'ngur', 'asdasdas', '454353454352', 'malang', 'bulan', 'malang', 'jatim', 'default.png', '2020-12-05', 2),
(6, 'yayan', 'yayan', '1001002', 'pasuruan', '1997-10-04', 1, 'Sodikin', 'ika', 'pedagang', 'pedagang', 'Suwayuwo', '2321424', 'suwayuwo', 'sukorejo', 'pasuruan', 'jatim', 'default.png', '2020-12-09', 2),
(7, 'fdg', 'dsfsdf fdsf', '1001003', 'dsfdsf', '2021-08-10', 2, 'dsfdsf', 'dsfsd', 'dffs', 'fsdfs', 'fdsfsd', '32434', 'cvdfvdfv', 'vdfvdfv', 'vdvfdv', 'vdfvfdv', 'default.png', '2021-08-10', 2),
(8, 'fdg', 'dsfsdf fdsf', '1001004', 'dsfdsf', '2021-08-10', 4, 'dsfdsf', 'dfg', 'gfd', 'gfd', 'dfgdfg', '3443', 'gfdgd', '345', '345', 'rtete', 'default.png', '2021-08-10', 19),
(9, 'cxzc', 'dsfsdf fdsf', '1001005', 'dsfdsf', '2021-08-17', 2, 'dsfsdf', 'sdsds', 'dss', 'sds', 'dscdsc', '342423423', 'cvdfvdfv', 'vdfvdfv', 'vdvfdv', 'vdfvfdv', 'default.png', '2021-08-15', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tpq`
--

CREATE TABLE `data_tpq` (
  `id_tpq` int(11) NOT NULL,
  `nama_tpq` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `ketua` varchar(100) NOT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_tpq`
--

INSERT INTO `data_tpq` (`id_tpq`, `nama_tpq`, `alamat`, `telp`, `email`, `ketua`, `id_users`) VALUES
(1, 'KBM Desa Pandaan', 'desa pandaan Pasuruan', '081241413030', 'desa@am.com', 'Nadia', 2),
(2, 'Madrasah Diniah Takmiliah Fatkhul Huda', 'Jl. Buluagung, RT 02/ RW 11, Desa Sengonagung, Kec. Purwosari, Kab, Pasuruan', '3523453245324', 'joni@gmail.com', 'Bpk. Lutfy Wijaya', 1),
(5, 'mai', 'sadmksadm', '2932943289', 'rizalffanani@gmail.com', 'Nadia sdsd', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ustadz`
--

CREATE TABLE `data_ustadz` (
  `id_ustadz` int(15) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_ustadz` varchar(100) NOT NULL,
  `status` enum('Mub. Tugasan','Mub. Setempat','Asisten') NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_ustadz`
--

INSERT INTO `data_ustadz` (`id_ustadz`, `nip`, `nama_ustadz`, `status`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `foto`, `tgl_masuk`, `id_user`) VALUES
(1, '21321321321', 'humaji', 'Mub. Tugasan', 'L', 'malang', '2020-12-01', 'sadfsadf', 'sdadas', 'dsadas', 'dsadsadasdas', '1guru_01122020080555.png', '2020-12-01', 2),
(2, '324423', 'al biruni', 'Mub. Tugasan', 'L', 'malamng', '2020-12-04', 'edfsdfsd', 'mas', 'dsf', 'fsdf', 'default.png', '2020-12-03', 2),
(3, '4574574', 'rtyrtyrt', 'Mub. Setempat', 'P', 'malang', '2020-12-03', 'tyryrt', 'sdadas', 'dsadas', 'rttyr', 'default.png', '2020-12-03', 2),
(4, '444', 'weweq', 'Asisten', 'P', 'malang', '2008-07-09', 'dfsfsdfs', 'mas', 'bue', 'ewrewrwer', 'default.png', '2020-12-03', 2),
(5, '453543', 'terte', 'Mub. Setempat', 'P', 'dsfdsf', '2021-08-10', 'bfgdgd', 'fdggd', 'dfggd', 'dfgdfg', 'default.png', '2021-08-10', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nama_web` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `wa` varchar(18) NOT NULL,
  `logo_web` text NOT NULL,
  `format_nis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `nama_web`, `tentang`, `slogan`, `alamat`, `email`, `wa`, `logo_web`, `format_nis`) VALUES
(1, 'PPG BANGIL', 'PPG DAERAH BANGIL', '', 'Jalan Ahmad Yani Gang Satria Lama No.6 Malang', 'pickup1me@gmail.com', '0813-3378-2544', '1file_09092020110940.jpg', '311235141463000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mapel`
--

CREATE TABLE `kelas_mapel` (
  `id_klsmapel` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_klstpq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_mapel`
--

INSERT INTO `kelas_mapel` (`id_klsmapel`, `id_mapel`, `id_klstpq`) VALUES
(15, 1, 9),
(16, 2, 9),
(17, 3, 9),
(18, 1, 10),
(19, 3, 10),
(20, 5, 10),
(21, 8, 10),
(22, 1, 11),
(23, 2, 11),
(24, 26, 11),
(26, 5, 11),
(29, 3, 12),
(30, 5, 12),
(31, 8, 12),
(32, 1, 12),
(34, 2, 12),
(35, 13, 12),
(36, 14, 12),
(37, 15, 12),
(38, 16, 12),
(39, 17, 12),
(40, 18, 12),
(43, 5, 13),
(44, 8, 13),
(45, 13, 13),
(46, 3, 13),
(47, 2, 13),
(48, 1, 13),
(49, 14, 13),
(50, 15, 13),
(51, 16, 13),
(52, 17, 13),
(53, 18, 13),
(54, 19, 14),
(55, 20, 14),
(56, 21, 14),
(57, 23, 14),
(58, 24, 14),
(59, 25, 14),
(60, 26, 14),
(61, 17, 14),
(62, 18, 14),
(63, 19, 15),
(64, 20, 15),
(65, 21, 15),
(66, 23, 15),
(67, 24, 15),
(68, 25, 15),
(69, 26, 15),
(70, 17, 15),
(71, 18, 15),
(72, 19, 16),
(73, 20, 16),
(74, 21, 16),
(75, 23, 16),
(76, 24, 16),
(77, 25, 16),
(78, 26, 16),
(79, 17, 16),
(80, 18, 16),
(81, 1, 17),
(82, 3, 17),
(83, 13, 11),
(84, 20, 19),
(85, 2, 19),
(86, 1, 19),
(87, 13, 19),
(88, 1, 19),
(89, 5, 19),
(90, 23, 19),
(91, 28, 19),
(94, 3, 20),
(96, 8, 20),
(97, 3, 21),
(98, 5, 21),
(99, 1, 21),
(101, 22, 21),
(102, 13, 21),
(103, 21, 21),
(104, 26, 21),
(105, 24, 21),
(106, 27, 21),
(107, 14, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_santri`
--

CREATE TABLE `kelas_santri` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_klstpq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_santri`
--

INSERT INTO `kelas_santri` (`id_kelas_siswa`, `id_santri`, `id_klstpq`) VALUES
(8, 5, 9),
(9, 5, 10),
(10, 6, 11),
(11, 8, 17),
(14, 5, 20),
(15, 6, 20),
(16, 8, 19),
(18, 9, 19),
(19, 5, 21),
(20, 6, 21),
(21, 8, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_tpq`
--

CREATE TABLE `kelas_tpq` (
  `id_klstpq` int(11) NOT NULL,
  `id_tpq` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap','') NOT NULL,
  `id_ustadz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_tpq`
--

INSERT INTO `kelas_tpq` (`id_klstpq`, `id_tpq`, `id_kelas`, `id_tahun_ajaran`, `semester`, `id_ustadz`) VALUES
(9, 1, 1, 1, 'Ganjil', 1),
(10, 1, 1, 1, 'Genap', 3),
(11, 1, 3, 1, 'Ganjil', 4),
(12, 2, 14, 1, 'Genap', 3),
(13, 2, 13, 1, 'Genap', 5),
(14, 2, 8, 1, 'Genap', 1),
(15, 2, 7, 1, 'Genap', 5),
(16, 2, 6, 1, 'Genap', 3),
(17, 5, 1, 1, 'Ganjil', 3),
(18, 1, 8, 1, 'Ganjil', NULL),
(19, 1, 13, 1, 'Ganjil', 3),
(20, 1, 3, 1, 'Genap', 3),
(21, 1, 15, 1, 'Ganjil', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `deskrip` text NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) DEFAULT 0,
  `tipe` enum('menu','link','pager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `deskrip`, `icon`, `is_active`, `is_parent`, `tipe`) VALUES
(12, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(13, 'Admin', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(15, 'menu management', 'admin/menu', 'hak akses penuh Controler menu/*', 'fa fa-list-alt', 1, 13, 'menu'),
(22, 'GENERATOR', 'harviacode', 'hak akses penuh Controler harviacode/*', 'fa fa-laptop', 1, 13, 'menu'),
(40, 'data', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(41, 'Setting', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(47, 'Auth item', 'admin/auth_item', 'hak akses penuh Controler Auth_item/*', 'fa fa-laptop', 1, 13, 'menu'),
(48, 'Auth detail', 'admin/auth_item_child', 'hak akses penuh Controler Auth_item_child/*', 'fa fa-laptop', 1, 13, 'menu'),
(52, 'Info Web', 'admin/info', 'hak akses Info', 'fa fa-list-alt', 1, 41, 'menu'),
(61, 'users/update', 'admin/users/update', 'hak akses aksi users/update/', 'fa fa-laptop', 1, 0, 'pager'),
(62, 'users/update_pass', 'admin/users/update_pass', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(63, 'users/read', 'admin/users/read', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(70, 'data user', 'admin/users', 'Data users', 'fa fa-laptop', 1, 40, 'menu'),
(73, 'admin', 'admin', 'routing', '1', 1, 0, 'pager'),
(74, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(78, 'tema', 'admin/tema', 'hak akses', 'fa fa-list-alt', 1, 41, 'link'),
(80, 'data jenjang', 'admin/data_jenjang', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(81, 'data mapel', 'admin/data_jenis_mapel', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(82, 'data kelas', 'admin/data_kelas', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(83, 'data materi', 'admin/data_mapel', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(84, 'data santri', 'admin/data_santri', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(85, 'data ustadz', 'admin/data_ustadz', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(86, 'data tpq', 'admin/data_tpq', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(87, 'kelas tpq', 'admin/kelas_tpq', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(88, 'kelas santri', 'admin/kelas_santri', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(89, 'Nilai Santri', 'admin/view_kelas', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(90, 'data file', 'admin/data_file', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(91, 'kelas mapel', 'admin/kelas_mapel', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(92, 'admin/data_santri/update/', 'admin/data_santri/update/', 'hak akses aksi users/update/', 'fa fa-laptop', 1, 0, 'pager'),
(93, 'Profil', 'admin/data_santri/read/0', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'menu'),
(94, 'rekap nilai', 'admin/rekap_nilai', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(95, 'Grafik nilai', 'admin/grafik_nilai', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(96, 'saran', 'admin/saran', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(97, 'Kotak Saran', 'admin/saran/create', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'menu'),
(98, 'Catatan', 'admin/catatan', 'hak akses', 'fa fa-laptop', 1, 0, 'link');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_santri`
--

CREATE TABLE `nilai_santri` (
  `id_nilai` int(11) NOT NULL,
  `id_kelas_siswa` int(11) NOT NULL,
  `id_klsmapel` int(11) NOT NULL,
  `nilai` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_santri`
--

INSERT INTO `nilai_santri` (`id_nilai`, `id_kelas_siswa`, `id_klsmapel`, `nilai`) VALUES
(1, 8, 17, '89'),
(2, 8, 16, '89'),
(3, 8, 15, '78'),
(4, 9, 21, '80'),
(5, 9, 20, '78'),
(6, 9, 19, '78'),
(7, 9, 18, '60'),
(8, 10, 22, '77'),
(9, 10, 23, '99'),
(10, 11, 82, '84'),
(11, 11, 81, '32'),
(12, 10, 26, '32'),
(13, 10, 24, '32'),
(14, 10, 83, '44'),
(17, 14, 96, '45'),
(18, 14, 94, '54'),
(19, 15, 96, '77'),
(20, 15, 94, '77'),
(21, 18, 91, ''),
(22, 18, 90, ''),
(23, 18, 89, ''),
(24, 18, 88, ''),
(25, 18, 87, ''),
(26, 18, 86, ''),
(27, 18, 85, ''),
(28, 18, 84, ''),
(29, 21, 107, '88'),
(30, 21, 106, '77'),
(31, 21, 105, '0'),
(32, 21, 104, '98'),
(33, 21, 103, '10'),
(34, 21, 102, '77'),
(35, 21, 101, '10'),
(36, 21, 99, '76'),
(37, 21, 98, '88'),
(38, 21, 97, '99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saran` text NOT NULL,
  `datetime` date NOT NULL,
  `status` enum('new','old') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id_saran`, `id_user`, `saran`, `datetime`, `status`) VALUES
(1, 15, 'mantap', '2020-12-08', 'old'),
(2, 15, 'sdfsdf', '2020-12-08', 'old'),
(3, 15, 'sdfsdf', '2020-12-08', 'old'),
(4, 15, 'mantap', '2020-12-09', 'old'),
(5, 15, 'jbhjkhb kbh', '2020-12-09', 'old');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(10) NOT NULL,
  `nama_ajaran` varchar(100) NOT NULL,
  `status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `nama_ajaran`, `status`) VALUES
(1, '2020/2021', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `navbar_bg_color` varchar(100) NOT NULL,
  `navbar_font_color` varchar(100) NOT NULL,
  `sidebar_bg_color` varchar(50) NOT NULL,
  `sidebar_font_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id_tema`, `navbar_bg_color`, `navbar_font_color`, `sidebar_bg_color`, `sidebar_font_color`) VALUES
(1, 'gray', 'dark', 'dark', 'secondary');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nokartuidentitas` varchar(30) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nokartuidentitas`, `first_name`, `last_name`, `alamat`, `phone`, `foto`, `active`) VALUES
(1, 'superadmin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '', 'admin1', NULL, NULL, '083834558876', 'default.png', 1),
(2, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'kasir1@gmail.com', '', 'raka', NULL, NULL, '082122314141', 'default.png', 1),
(14, 'admintpq3', 'e10adc3949ba59abbe56e057f20f883e', 'khodirotulu@gmail.com', NULL, 'admintpq', NULL, NULL, '089755672', 'default.png', 1),
(15, '1001001', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'jo', NULL, NULL, '454353454352', 'default.png', 1),
(16, '1001002', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'yayan', NULL, NULL, '2321424', 'default.png', 1),
(17, 'admintpq4', 'e10adc3949ba59abbe56e057f20f883e', 'suwayuwo@gmail.com', NULL, 'admintpq', NULL, NULL, '08934141', 'default.png', 1),
(18, '1001003', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dsfsdf fdsf', NULL, NULL, '32434', 'default.png', 1),
(19, 'admintpq5', 'e10adc3949ba59abbe56e057f20f883e', 'rizalffanani@gmail.com', NULL, 'admintpq', NULL, NULL, '2932943289', 'default.png', 1),
(20, '1001004', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dsfsdf fdsf', NULL, NULL, '3443', 'default.png', 1),
(21, '1001005', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dsfsdf fdsf', NULL, NULL, '342423423', 'default.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_detail`
--

CREATE TABLE `users_detail` (
  `id` bigint(11) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_detail`
--

INSERT INTO `users_detail` (`id`, `ip_address`, `activation_code`, `forgotten_password_time`, `created_on`, `last_login`) VALUES
(1, '109.109.109.109', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, '::1', NULL, NULL, '2020-12-05 09:44:53', NULL),
(15, '::1', NULL, NULL, '2020-12-05 13:31:57', NULL),
(16, '::1', NULL, NULL, '2020-12-09 10:53:24', NULL),
(17, '::1', NULL, NULL, '2020-12-09 10:58:12', NULL),
(18, '::1', NULL, NULL, '2021-08-10 18:15:03', NULL),
(19, '::1', NULL, NULL, '2021-08-10 18:21:41', NULL),
(20, '::1', NULL, NULL, '2021-08-10 18:22:31', NULL),
(21, '::1', NULL, NULL, '2021-08-15 12:55:28', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_akses`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_akses` (
`id` bigint(11)
,`username` varchar(100)
,`first_name` varchar(50)
,`name_level` varchar(64)
,`id_aunt` int(11)
,`id_child` int(11)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_active` int(1)
,`is_parent` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_auth_child`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_auth_child` (
`idc` int(11)
,`parent` varchar(64)
,`child` int(11)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_parent` int(1)
,`is_active` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_grafik_nilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_grafik_nilai` (
`id_klstpq` int(11)
,`id_kelas_siswa` int(11)
,`id_santri` int(11)
,`nomor_induk` varchar(100)
,`nama_jenjang` varchar(100)
,`semester` enum('Ganjil','Genap','')
,`status` enum('N','Y')
,`rata` double(19,2)
,`nama_kelas` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_hk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_hk` (
`id` bigint(11)
,`username` varchar(100)
,`id_assignment` int(11)
,`id_aunt` int(11)
,`item_name` varchar(64)
,`created_at` datetime
,`idc` int(11)
,`child` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kelas`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kelas` (
`id_klstpq` int(11)
,`id_ustadz` int(11)
,`nama_ustadz` varchar(100)
,`id_tpq` int(11)
,`nama_tpq` varchar(100)
,`id_kelas` int(11)
,`nama_kelas` varchar(100)
,`id_jenjang` int(11)
,`nama_jenjang` varchar(100)
,`id_tahun_ajaran` int(10)
,`nama_ajaran` varchar(100)
,`status` enum('N','Y')
,`semester` enum('Ganjil','Genap','')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kelas_mapel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kelas_mapel` (
`id_klsmapel` int(11)
,`id_mapel` int(11)
,`nama_mapel` varchar(100)
,`id_jenis_mapel` int(11)
,`nama_jenis_mapel` varchar(100)
,`id_klstpq` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kelas_santri`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kelas_santri` (
`id_kelas_siswa` int(11)
,`id_santri` int(11)
,`nama_lengkap` varchar(100)
,`nomor_induk` varchar(100)
,`id_klstpq` int(11)
,`id_tpq` int(11)
,`nama_tpq` varchar(100)
,`id_kelas` int(11)
,`nama_kelas` varchar(100)
,`id_jenjang` int(11)
,`nama_jenjang` varchar(100)
,`id_tahun_ajaran` int(11)
,`nama_ajaran` varchar(100)
,`status` enum('N','Y')
,`semester` enum('Ganjil','Genap','')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_nilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_nilai` (
`id_nilai` int(11)
,`id_kelas_siswa` int(11)
,`id_klsmapel` int(11)
,`id_klstpq` int(11)
,`id_mapel` int(11)
,`nama_mapel` varchar(100)
,`id_jenis_mapel` int(11)
,`nama_jenis_mapel` varchar(100)
,`nilai` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_saran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_saran` (
`id_saran` int(11)
,`id_user` int(11)
,`saran` text
,`status` enum('new','old')
,`first_name` varchar(50)
,`username` varchar(100)
,`datetime` date
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_akses`
--
DROP TABLE IF EXISTS `view_akses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `users`.`first_name` AS `first_name`, `auth_item`.`name` AS `name_level`, `auth_item`.`id_aunt` AS `id_aunt`, `menu`.`id` AS `id_child`, `menu`.`name` AS `name`, `menu`.`link` AS `link`, `menu`.`deskrip` AS `deskrip`, `menu`.`icon` AS `icon`, `menu`.`is_active` AS `is_active`, `menu`.`is_parent` AS `is_parent`, `menu`.`tipe` AS `tipe` FROM ((((`users` join `auth_assignment` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item` on(`auth_item`.`id_aunt` = `auth_assignment`.`id_aunt`)) join `auth_item_child` on(`auth_item`.`id_aunt` = `auth_item_child`.`id_aunt`)) join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_auth_child`
--
DROP TABLE IF EXISTS `view_auth_child`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_auth_child`  AS SELECT `auth_item_child`.`idc` AS `idc`, `auth_item_child`.`parent` AS `parent`, `auth_item_child`.`child` AS `child`, `menu`.`name` AS `name`, `menu`.`link` AS `link`, `menu`.`deskrip` AS `deskrip`, `menu`.`icon` AS `icon`, `menu`.`is_parent` AS `is_parent`, `menu`.`is_active` AS `is_active`, `menu`.`tipe` AS `tipe` FROM (`auth_item_child` join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_grafik_nilai`
--
DROP TABLE IF EXISTS `view_grafik_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafik_nilai`  AS SELECT `view_nilai`.`id_klstpq` AS `id_klstpq`, `view_nilai`.`id_kelas_siswa` AS `id_kelas_siswa`, `view_kelas_santri`.`id_santri` AS `id_santri`, `view_kelas_santri`.`nomor_induk` AS `nomor_induk`, `view_kelas_santri`.`nama_jenjang` AS `nama_jenjang`, `view_kelas_santri`.`semester` AS `semester`, `view_kelas_santri`.`status` AS `status`, round(avg(`view_nilai`.`nilai`),2) AS `rata`, `view_kelas_santri`.`nama_kelas` AS `nama_kelas` FROM (`view_nilai` join `view_kelas_santri` on(`view_nilai`.`id_kelas_siswa` = `view_kelas_santri`.`id_kelas_siswa`)) GROUP BY `view_nilai`.`id_kelas_siswa` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_hk`
--
DROP TABLE IF EXISTS `view_hk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hk`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `auth_assignment`.`id_assignment` AS `id_assignment`, `auth_assignment`.`id_aunt` AS `id_aunt`, `auth_assignment`.`item_name` AS `item_name`, `auth_assignment`.`created_at` AS `created_at`, `auth_item_child`.`idc` AS `idc`, `auth_item_child`.`child` AS `child` FROM ((`auth_assignment` join `users` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item_child` on(`auth_item_child`.`id_aunt` = `auth_assignment`.`id_aunt`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas`  AS SELECT `kelas_tpq`.`id_klstpq` AS `id_klstpq`, `kelas_tpq`.`id_ustadz` AS `id_ustadz`, `data_ustadz`.`nama_ustadz` AS `nama_ustadz`, `data_tpq`.`id_tpq` AS `id_tpq`, `data_tpq`.`nama_tpq` AS `nama_tpq`, `data_kelas`.`id_kelas` AS `id_kelas`, `data_kelas`.`nama_kelas` AS `nama_kelas`, `data_jenjang`.`id_jenjang` AS `id_jenjang`, `data_jenjang`.`nama_jenjang` AS `nama_jenjang`, `tahun_ajaran`.`id_tahun_ajaran` AS `id_tahun_ajaran`, `tahun_ajaran`.`nama_ajaran` AS `nama_ajaran`, `tahun_ajaran`.`status` AS `status`, `kelas_tpq`.`semester` AS `semester` FROM (((((`kelas_tpq` join `data_tpq` on(`kelas_tpq`.`id_tpq` = `data_tpq`.`id_tpq`)) join `data_kelas` on(`kelas_tpq`.`id_kelas` = `data_kelas`.`id_kelas`)) join `data_jenjang` on(`data_kelas`.`id_jenjang` = `data_jenjang`.`id_jenjang`)) join `tahun_ajaran` on(`kelas_tpq`.`id_tahun_ajaran` = `tahun_ajaran`.`id_tahun_ajaran`)) join `data_ustadz` on(`kelas_tpq`.`id_ustadz` = `data_ustadz`.`id_ustadz`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kelas_mapel`
--
DROP TABLE IF EXISTS `view_kelas_mapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas_mapel`  AS SELECT `kelas_mapel`.`id_klsmapel` AS `id_klsmapel`, `data_mapel`.`id_mapel` AS `id_mapel`, `data_mapel`.`nama_mapel` AS `nama_mapel`, `data_mapel`.`id_jenis_mapel` AS `id_jenis_mapel`, `data_jenis_mapel`.`nama_jenis_mapel` AS `nama_jenis_mapel`, `kelas_mapel`.`id_klstpq` AS `id_klstpq` FROM ((`kelas_mapel` join `data_mapel` on(`kelas_mapel`.`id_mapel` = `data_mapel`.`id_mapel`)) join `data_jenis_mapel` on(`data_mapel`.`id_jenis_mapel` = `data_jenis_mapel`.`id_jenis_mapel` and `data_mapel`.`id_jenis_mapel` = `data_jenis_mapel`.`id_jenis_mapel`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kelas_santri`
--
DROP TABLE IF EXISTS `view_kelas_santri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas_santri`  AS SELECT `kelas_santri`.`id_kelas_siswa` AS `id_kelas_siswa`, `kelas_santri`.`id_santri` AS `id_santri`, `data_santri`.`nama_lengkap` AS `nama_lengkap`, `data_santri`.`nomor_induk` AS `nomor_induk`, `kelas_tpq`.`id_klstpq` AS `id_klstpq`, `kelas_tpq`.`id_tpq` AS `id_tpq`, `data_tpq`.`nama_tpq` AS `nama_tpq`, `kelas_tpq`.`id_kelas` AS `id_kelas`, `data_kelas`.`nama_kelas` AS `nama_kelas`, `data_kelas`.`id_jenjang` AS `id_jenjang`, `data_jenjang`.`nama_jenjang` AS `nama_jenjang`, `kelas_tpq`.`id_tahun_ajaran` AS `id_tahun_ajaran`, `tahun_ajaran`.`nama_ajaran` AS `nama_ajaran`, `tahun_ajaran`.`status` AS `status`, `kelas_tpq`.`semester` AS `semester` FROM ((((((`kelas_santri` join `kelas_tpq` on(`kelas_santri`.`id_klstpq` = `kelas_tpq`.`id_klstpq`)) join `data_santri` on(`kelas_santri`.`id_santri` = `data_santri`.`id_santri`)) join `data_tpq` on(`kelas_tpq`.`id_tpq` = `data_tpq`.`id_tpq`)) join `data_kelas` on(`kelas_tpq`.`id_kelas` = `data_kelas`.`id_kelas`)) join `tahun_ajaran` on(`kelas_tpq`.`id_tahun_ajaran` = `tahun_ajaran`.`id_tahun_ajaran`)) join `data_jenjang` on(`data_kelas`.`id_jenjang` = `data_jenjang`.`id_jenjang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_nilai`
--
DROP TABLE IF EXISTS `view_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilai`  AS SELECT `nilai_santri`.`id_nilai` AS `id_nilai`, `nilai_santri`.`id_kelas_siswa` AS `id_kelas_siswa`, `kelas_mapel`.`id_klsmapel` AS `id_klsmapel`, `kelas_mapel`.`id_klstpq` AS `id_klstpq`, `data_mapel`.`id_mapel` AS `id_mapel`, `data_mapel`.`nama_mapel` AS `nama_mapel`, `data_jenis_mapel`.`id_jenis_mapel` AS `id_jenis_mapel`, `data_jenis_mapel`.`nama_jenis_mapel` AS `nama_jenis_mapel`, `nilai_santri`.`nilai` AS `nilai` FROM (((`nilai_santri` join `kelas_mapel` on(`nilai_santri`.`id_klsmapel` = `kelas_mapel`.`id_klsmapel`)) join `data_mapel` on(`kelas_mapel`.`id_mapel` = `data_mapel`.`id_mapel`)) join `data_jenis_mapel` on(`data_mapel`.`id_jenis_mapel` = `data_jenis_mapel`.`id_jenis_mapel`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_saran`
--
DROP TABLE IF EXISTS `view_saran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_saran`  AS SELECT `saran`.`id_saran` AS `id_saran`, `saran`.`id_user` AS `id_user`, `saran`.`saran` AS `saran`, `saran`.`status` AS `status`, `users`.`first_name` AS `first_name`, `users`.`username` AS `username`, `saran`.`datetime` AS `datetime` FROM (`saran` join `users` on(`saran`.`id_user` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`id_assignment`),
  ADD KEY `auth` (`id_aunt`),
  ADD KEY `user` (`user_id`);

--
-- Indeks untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`id_aunt`);

--
-- Indeks untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `id_aunt` (`id_aunt`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `kls_siswa` (`id_kelas_siswa`);

--
-- Indeks untuk tabel `data_file`
--
ALTER TABLE `data_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `data_jenis_mapel`
--
ALTER TABLE `data_jenis_mapel`
  ADD PRIMARY KEY (`id_jenis_mapel`);

--
-- Indeks untuk tabel `data_jenjang`
--
ALTER TABLE `data_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jenjang` (`id_jenjang`);

--
-- Indeks untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `jenis_mapel` (`id_jenis_mapel`);

--
-- Indeks untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `data_tpq`
--
ALTER TABLE `data_tpq`
  ADD PRIMARY KEY (`id_tpq`);

--
-- Indeks untuk tabel `data_ustadz`
--
ALTER TABLE `data_ustadz`
  ADD PRIMARY KEY (`id_ustadz`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  ADD PRIMARY KEY (`id_klsmapel`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_klstpq` (`id_klstpq`);

--
-- Indeks untuk tabel `kelas_santri`
--
ALTER TABLE `kelas_santri`
  ADD PRIMARY KEY (`id_kelas_siswa`),
  ADD KEY `klstpq` (`id_klstpq`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indeks untuk tabel `kelas_tpq`
--
ALTER TABLE `kelas_tpq`
  ADD PRIMARY KEY (`id_klstpq`),
  ADD KEY `kelas` (`id_kelas`),
  ADD KEY `tpq` (`id_tpq`),
  ADD KEY `tajun_ajaran` (`id_tahun_ajaran`),
  ADD KEY `ustadz` (`id_ustadz`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_santri`
--
ALTER TABLE `nilai_santri`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kelas_siswa` (`id_kelas_siswa`),
  ADD KEY `id_klsmapel` (`id_klsmapel`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id_aunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_file`
--
ALTER TABLE `data_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_jenis_mapel`
--
ALTER TABLE `data_jenis_mapel`
  MODIFY `id_jenis_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `data_jenjang`
--
ALTER TABLE `data_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id_santri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_tpq`
--
ALTER TABLE `data_tpq`
  MODIFY `id_tpq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_ustadz`
--
ALTER TABLE `data_ustadz`
  MODIFY `id_ustadz` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  MODIFY `id_klsmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `kelas_santri`
--
ALTER TABLE `kelas_santri`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kelas_tpq`
--
ALTER TABLE `kelas_tpq`
  MODIFY `id_klstpq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `nilai_santri`
--
ALTER TABLE `nilai_santri`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth` FOREIGN KEY (`id_aunt`) REFERENCES `auth_item` (`id_aunt`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`id_aunt`) REFERENCES `auth_item` (`id_aunt`);

--
-- Ketidakleluasaan untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `kls_siswa` FOREIGN KEY (`id_kelas_siswa`) REFERENCES `kelas_santri` (`id_kelas_siswa`);

--
-- Ketidakleluasaan untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD CONSTRAINT `jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `data_jenjang` (`id_jenjang`);

--
-- Ketidakleluasaan untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD CONSTRAINT `jenis_mapel` FOREIGN KEY (`id_jenis_mapel`) REFERENCES `data_jenis_mapel` (`id_jenis_mapel`);

--
-- Ketidakleluasaan untuk tabel `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  ADD CONSTRAINT `kelas_mapel_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `data_mapel` (`id_mapel`),
  ADD CONSTRAINT `kelas_mapel_ibfk_2` FOREIGN KEY (`id_klstpq`) REFERENCES `kelas_tpq` (`id_klstpq`);

--
-- Ketidakleluasaan untuk tabel `kelas_santri`
--
ALTER TABLE `kelas_santri`
  ADD CONSTRAINT `id_santri` FOREIGN KEY (`id_santri`) REFERENCES `data_santri` (`id_santri`),
  ADD CONSTRAINT `klstpq` FOREIGN KEY (`id_klstpq`) REFERENCES `kelas_tpq` (`id_klstpq`);

--
-- Ketidakleluasaan untuk tabel `kelas_tpq`
--
ALTER TABLE `kelas_tpq`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`),
  ADD CONSTRAINT `tajun_ajaran` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`),
  ADD CONSTRAINT `tpq` FOREIGN KEY (`id_tpq`) REFERENCES `data_tpq` (`id_tpq`),
  ADD CONSTRAINT `ustadz` FOREIGN KEY (`id_ustadz`) REFERENCES `data_ustadz` (`id_ustadz`);

--
-- Ketidakleluasaan untuk tabel `nilai_santri`
--
ALTER TABLE `nilai_santri`
  ADD CONSTRAINT `nilai_santri_ibfk_1` FOREIGN KEY (`id_kelas_siswa`) REFERENCES `kelas_santri` (`id_kelas_siswa`),
  ADD CONSTRAINT `nilai_santri_ibfk_2` FOREIGN KEY (`id_klsmapel`) REFERENCES `kelas_mapel` (`id_klsmapel`);

--
-- Ketidakleluasaan untuk tabel `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

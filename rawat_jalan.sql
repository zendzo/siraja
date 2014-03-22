-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2014 pada 08.21
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `rawat_jalan`
--
CREATE DATABASE IF NOT EXISTS `rawat_jalan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rawat_jalan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_medis`
--

CREATE TABLE IF NOT EXISTS `catatan_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `takanan_darah` varchar(4) NOT NULL,
  `alergi` varchar(25) NOT NULL,
  `riwayat_penyakit` varchar(100) NOT NULL,
  `kode_ICD` varchar(25) NOT NULL,
  `Keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `catatan_medis`
--

INSERT INTO `catatan_medis` (`id`, `id_pasien`, `tanggal`, `takanan_darah`, `alergi`, `riwayat_penyakit`, `kode_ICD`, `Keterangan`) VALUES
(1, 14, '17-03-2014', '120', 'kulit', 'tidak ada', '1250000', 'harus segera istirahat'),
(2, 14, '17-03-2014', '', '', '', '', ''),
(3, 14, '17-03-2014', '160', '', '', '', ''),
(4, 14, '17-03-2014', '160', 'cabe', 'lorem ', '1525556585', 'lorem '),
(5, 15, '17-03-2014', '160', '', ' dbd', '1212', ' perlu perwatan'),
(6, 16, '20-03-2014', '120/', 'nihil', 'Demam Berdarah ', 'a', ' Istirahat Lebih lanjunt jangan banyak bergerak. usahakan banyak minum air putih'),
(7, 18, '21-03-2014', '120/', 'tidak ada', ' tidak ada', 'nihil', 'hanya Demam biasa di karnakan ke lelahan '),
(8, 18, '21-03-2014', '120/', 'tidak ada', ' tidak ada', 'nihil', 'hanya Demam biasa di karnakan ke lelahan '),
(9, 19, '22-03-2014', '120/', 'tdak ada', ' demam berdarah', '-', ' istirrahat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `indikasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `jk` char(1) NOT NULL,
  `tampat` varchar(100) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `agama` char(1) NOT NULL,
  `pendidikan` char(1) NOT NULL,
  `tipe` char(1) NOT NULL,
  `goldarah` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `kodepos`, `telepon`, `jk`, `tampat`, `tgl`, `agama`, `pendidikan`, `tipe`, `goldarah`) VALUES
(14, 'M. Zaenal mustofa', 'bintan center tanjungpinang', '29111', '081274569291', '1', 'lampung', '12/09/1992', '1', '5', '3', '4'),
(15, 'rudi', ' tanjungpinang', '29111', '12121212', '1', ' dabo', '12/09/1992', '1', '3', '3', '2'),
(16, 'Yuliana Susanti', 'Tanjungpinang kota, km 5 ', '29111', '0812121212', '2', 'Tanjungpinang ', '12/03/1989', '1', '5', '1', '1'),
(18, 'Danang Prtama Dina', 'Lorong Kimpang Gg. Sempit melaju ', '666''', '20', '1', 'pinang ', '12/08/1882', '3', '3', '3', '1'),
(19, 'diana', 'tanjungpinang ', '2911', '012121211122', '1', ' tanjungpinang ', '2014-03-22', '1', '3', '3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppp`
--

CREATE TABLE IF NOT EXISTS `ppp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `ppp`
--

INSERT INTO `ppp` (`id`, `pasien_id`, `dokter_id`, `keterangan`) VALUES
(20, 19, 1, 'Pemeriksaan rontagen ke rumah sakit batam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `pasien_id`, `dokter_id`, `obat_id`, `dosis`, `tanggal`) VALUES
(1, 14, 1, 1, '3x 1 hari', '2014-03-21 15:26:50'),
(4, 18, 1, 1, '1 kali sehari setelah sarapan', '2014-03-21 17:46:23'),
(5, 18, 1, 1, '1 kali sehari setelah sarapan', '2014-03-21 17:52:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `role` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `jabatan`, `role`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'programer', 1, 1),
(3, 'yuliana', '1de5c967b45b9ad642de61ba3eb68d80', 'Staff Administrasi', 3, 1),
(4, 'boris', '4dbf44c6b1be736ee92ef90090452fc2', 'Dokter', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `users_group`
--

INSERT INTO `users_group` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `nama_lengkap`, `alamat`, `pendidikan`) VALUES
(1, 1, 'M. Zaenal Mustofa', 'Jl. DI Panjaitan KM 9 Tanjungpinang', '4'),
(2, 14, 'Berry Saptana Siapa', 'Tanjung ucanf', '5'),
(3, 3, 'Yuliana Safitri Darmayanti', 'Tanjung balai karimun', '5'),
(4, 4, 'Boris Simatupang, Drs', 'Tanjung balai karimun', '5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

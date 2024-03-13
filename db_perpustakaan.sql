-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 04.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `kategori_buku` varchar(125) NOT NULL,
  `penerbit_buku` varchar(125) NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun_terbit` varchar(125) NOT NULL,
  `isbn` int(50) NOT NULL,
  `jumlah_halaman` varchar(1000) NOT NULL,
  `j_buku_baik` varchar(125) NOT NULL,
  `j_buku_rusak` varchar(125) NOT NULL,
  `link_buku` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `penerbit_buku`, `pengarang`, `tahun_terbit`, `isbn`, `jumlah_halaman`, `j_buku_baik`, `j_buku_rusak`, `link_buku`) VALUES
(22, 'Musuh Dalam Selimut', 'Fiksi', 'PT Gramedia', 'Eka Kurniawan', '2000', 22211332, '900', '5', '1', ''),
(23, 'Seribu Bulan', 'Non-Fiksi', 'Amazon Publishing', 'AKU', '2000', 87821214, '700', '6', '2', ''),
(24, 'Kota Mati', 'Novel', 'Serambi', 'Joni', '2000', 33445566, '455', '20', '5', ''),
(28, 'aaa', 'Non-Fiksi', 'Serambi', 'AKU', '2001', 786786786, '444', '65', '22', 'https://getbootstrap.com/docs/5.3/components/card/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `parent_comment` varchar(500) NOT NULL,
  `student` varchar(1000) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `discussion`
--

INSERT INTO `discussion` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(141, '', '', 'aaa', '0000-00-00 00:00:00'),
(142, '', '', 'bbb', '0000-00-00 00:00:00'),
(143, '', '', 'woi', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_app` varchar(50) NOT NULL,
  `alamat_app` text NOT NULL,
  `email_app` varchar(125) NOT NULL,
  `nomor_hp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_app`, `alamat_app`, `email_app`, `nomor_hp`) VALUES
(1, 'ForPus', 'Jl. Tampomas Utara III No. 08', 'contact@forpus.com', '088806215541');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'KT-001', 'Novel'),
(2, 'KT-002', 'Non-Fiksi'),
(3, 'KT-003', 'Fiksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `isi_pemberitahuan` varchar(255) NOT NULL,
  `level_user` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id_pemberitahuan`, `isi_pemberitahuan`, `level_user`, `status`) VALUES
(1, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(2, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(3, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(4, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(5, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(6, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(7, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(8, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(9, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(10, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(11, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(12, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(13, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(14, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(15, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(16, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(17, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(18, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(19, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(20, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(21, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(22, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(23, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(24, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(25, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(26, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(27, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(28, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(29, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(30, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(31, '<i class=\'fa fa-exchange\'></i> #Anando Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(32, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(33, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(34, '<i class=\'fa fa-repeat\'></i> #Anando Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(35, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(36, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(37, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(38, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(39, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(40, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(41, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(42, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(43, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(44, '<i class=\'fa fa-exchange\'></i> #user Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(45, '<i class=\'fa fa-repeat\'></i> #user Telah mengembalikan Buku', 'Admin', 'Sudah dibaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_anggota` varchar(125) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `tanggal_peminjaman` varchar(125) NOT NULL,
  `tanggal_pengembalian` varchar(50) NOT NULL,
  `kondisi_buku_saat_dipinjam` varchar(125) NOT NULL,
  `kondisi_buku_saat_dikembalikan` varchar(125) NOT NULL,
  `denda` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_anggota`, `judul_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`) VALUES
(9, 'Anando', 'Beauty Is a Wound', '13-02-2024', '13-02-2024', 'Baik', 'Baik', 'Tidak ada'),
(10, 'Anando', 'WEER', '13-02-2024', '13-02-2024', 'Baik', 'Rusak', 'Rp 50.000'),
(12, 'user', 'The Good Samaritan', '13-02-2024', '13-02-2024', 'Baik', 'Rusak', 'Rp 20.000'),
(13, 'user', 'AWE', '13-02-2024', '13-02-2024', 'Rusak', 'Hilang', 'Rp 50.000'),
(14, 'user', 'BOLO', '13-02-2024', '13-02-2024', 'Baik', 'Hilang', 'Rp 50.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(125) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `verif_penerbit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`, `verif_penerbit`) VALUES
(1, 'PN-001', 'PT Gramedia', 'Terverifikasi'),
(2, 'PN-002', 'Amazon Publishing', 'Terverifikasi'),
(3, 'PN-003', 'Serambi', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `judul_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_kirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `penerima`, `pengirim`, `judul_pesan`, `isi_pesan`, `status`, `tanggal_kirim`) VALUES
(1, 'Administrator', 'Anando', 'Penting', 'Hai apakabar?', 'Sudah dibaca', '12-02-2024'),
(8, 'admin2', '', 'Pengembalian', 'Sudah Ya?\r\n', 'Belum dibaca', '26-02-2024'),
(10, 'Administrator', '', 'Pengembalian', 'p', 'Sudah dibaca', '26-02-2024'),
(11, 'Anando', '', 'Penting', 'ooo', 'Sudah dibaca', '26-02-2024'),
(12, 'user', 'Anando', 'Hai', ']pp', 'Sudah dibaca', '26-02-2024'),
(13, 'Administrator', 'Anando', 'Penting', '[[p', 'Belum dibaca', '26-02-2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `nis` char(20) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `verif` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `join_date` varchar(125) NOT NULL,
  `terakhir_login` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `kode_user`, `nis`, `fullname`, `username`, `password`, `foto`, `kelas`, `alamat`, `verif`, `role`, `join_date`, `terakhir_login`) VALUES
(1, '-', '-', 'Administrator', 'admin', 'admin', '', '-', '-', 'Iya', 'Admin', '04-05-2021', '07-03-2024 ( 10:08:34 )'),
(2, 'AP001', '5321', 'Anando', 'nando', 'nando', '', 'XII - Administrasi Perkantoran', 'Jl Menoreh Utara', 'Tidak', 'Anggota', '12-02-2024', '28-02-2024 ( 12:18:16 )'),
(3, 'AP002', '32144', 'user', 'user', 'user', '', 'XII - Administrasi Perkantoran', 'Jl Kaligarang 76', 'Tidak', 'Anggota', '12-02-2024', '07-03-2024 ( 10:06:36 )'),
(4, '-', '-', 'admin2', 'admin2', 'admin2', '', '-', '-', 'Iya', 'Admin', '19-02-2024', '26-02-2024 ( 13:12:59 )'),
(14, 'AP003', '2233110', '112', '112', '123', 'ssamson.jpg', 'XI - Tata Boga', 'popo', 'Tidak', 'Anggota', '06-03-2024', '06-03-2024 ( 13:44:47 )');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Feb 2018 pada 18.43
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `bahan_barang` varchar(30) DEFAULT NULL,
  `asal_barang` varchar(30) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `harga_barang` int(10) DEFAULT NULL,
  `mutasi` varchar(30) DEFAULT NULL,
  `kondisi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `merk`, `jumlah`, `bahan_barang`, `asal_barang`, `tgl_masuk`, `harga_barang`, `mutasi`, `kondisi`) VALUES
(1, 'Meja Tulis + Kaca', '1/2 Biro', 15, 'Kayu', 'hibah', '2013-01-01', 2000000, NULL, 'Baik'),
(2, 'Telpon', 'Sahtel', 1, 'Electronic', 'beli', '2013-01-01', 5000, NULL, 'Baik'),
(3, 'Printer', 'Canon MP 237', 1, 'Electronic', 'beli', '2013-01-01', 500000, NULL, 'Baik'),
(12, 'Kertas', 'Sidu', 2000, 'HVS', 'Beli', '1900-12-30', 50000, NULL, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_inventaris`
--

CREATE TABLE `tb_detail_inventaris` (
  `id_detail_inventaris` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `id_inventaris` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `tgl_masapakai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_inventaris`
--

INSERT INTO `tb_detail_inventaris` (`id_detail_inventaris`, `id_barang`, `id_inventaris`, `jumlah`, `tgl_diterima`, `tgl_masapakai`) VALUES
(1, 1, 1, 10, '2018-02-16', '2018-02-21'),
(2, 2, 2, 1, '2018-02-16', '2018-07-26'),
(7, 1, 1, 3, '2018-02-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `id_barang`, `jumlah`) VALUES
(1, 1, 3),
(2, 2, 0),
(3, 3, 1),
(4, 12, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_inventaris` int(5) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_inventaris`, `lokasi`, `id_user`) VALUES
(1, 'Ruangan Tata Usaha', 1),
(2, 'Ruangan Ketua Umum', 1),
(5, 'Ruangan Offset/Percetakan', 2),
(6, 'Ruangan Pendidikan dan Banglihara', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(10) NOT NULL DEFAULT '',
  `nama` varchar(64) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `jab` varchar(32) NOT NULL,
  `tmp_lhr` varchar(32) NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `hak_cuti_tahunan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `jk`, `jab`, `tmp_lhr`, `tgl_lhr`, `gol_darah`, `agama`, `status`, `telp`, `alamat`, `hak_cuti_tahunan`) VALUES
('PEG-000001', 'Budiman H', 'L', 'Manager', 'Cilacap', '2016-04-01', 'AB', 'Islam', 'K1', '085714057686', 'Jakarta', 10),
('PEG-000002', 'Raef', 'L', 'Supervisor', 'Banyumas', '2016-05-03', 'AB', 'Islam', 'K1', '098787771324', 'Purwokerto', 12),
('PEG-000003', 'Kun Anta', 'P', 'GL', 'Istanbul', '2016-05-06', 'A', 'Islam', 'K1', '028245431213', 'Turkey', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan_barang`
--

CREATE TABLE `tb_pengajuan_barang` (
  `id_pengajuan_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_inventaris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan_barang`
--

INSERT INTO `tb_pengajuan_barang` (`id_pengajuan_barang`, `nama_barang`, `jumlah`, `keterangan`, `status`, `id_inventaris`) VALUES
(1, 'Komputer', 30, 'butuh komputer baru', 'Ditolak', 1),
(2, 'Kertas', 2000, '2 RIM', 'Menunggu Konfirmasi', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pergantian_barang`
--

CREATE TABLE `tb_pergantian_barang` (
  `id_pergantian_barang` int(11) NOT NULL,
  `id_detail_inventaris` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pergantian_barang`
--

INSERT INTO `tb_pergantian_barang` (`id_pergantian_barang`, `id_detail_inventaris`, `jumlah`, `keterangan`, `status`) VALUES
(1, 1, 2, 'patah', 'Ditolak'),
(2, 2, 1, 'Konslet', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_user`, `password`, `hak_akses`, `aktif`) VALUES
(1, 'amat', 'Amat S', '123', 'User', 'Y'),
(2, 'PEG-000001', 'Budiman', '123', 'Pegawai', 'Y'),
(3, 'admin', 'Rakhmat Saleh', '123', 'Admin', 'Y'),
(7, 'Jhon', 'Jhon Doe', '123', 'Kepala', 'Y'),
(8, 'dadi', 'Dadi Firmana', '123', 'User', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detail_inventaris`
--
ALTER TABLE `tb_detail_inventaris`
  ADD PRIMARY KEY (`id_detail_inventaris`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_detail_inventaris` (`id_detail_inventaris`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pengajuan_barang`
--
ALTER TABLE `tb_pengajuan_barang`
  ADD PRIMARY KEY (`id_pengajuan_barang`),
  ADD KEY `id_pengajuan_barang` (`id_pengajuan_barang`),
  ADD KEY `id_pengajuan_barang_2` (`id_pengajuan_barang`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `tb_pergantian_barang`
--
ALTER TABLE `tb_pergantian_barang`
  ADD PRIMARY KEY (`id_pergantian_barang`),
  ADD KEY `id_pergantian_barang` (`id_pergantian_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_detail_inventaris`
--
ALTER TABLE `tb_detail_inventaris`
  MODIFY `id_detail_inventaris` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_inventaris` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pengajuan_barang`
--
ALTER TABLE `tb_pengajuan_barang`
  MODIFY `id_pengajuan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pergantian_barang`
--
ALTER TABLE `tb_pergantian_barang`
  MODIFY `id_pergantian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_inventaris`
--
ALTER TABLE `tb_detail_inventaris`
  ADD CONSTRAINT `tb_detail_inventaris_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_inventaris_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `tb_inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD CONSTRAINT `tb_gudang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD CONSTRAINT `tb_inventaris_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan_barang`
--
ALTER TABLE `tb_pengajuan_barang`
  ADD CONSTRAINT `tb_pengajuan_barang_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `tb_inventaris` (`id_inventaris`);

--
-- Ketidakleluasaan untuk tabel `tb_pergantian_barang`
--
ALTER TABLE `tb_pergantian_barang`
  ADD CONSTRAINT `tb_pergantian_barang_ibfk_1` FOREIGN KEY (`id_pergantian_barang`) REFERENCES `tb_detail_inventaris` (`id_detail_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

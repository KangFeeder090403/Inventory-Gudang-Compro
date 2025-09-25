-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2025 pada 17.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_acc_petugas`
--

CREATE TABLE `tb_acc_petugas` (
  `kode_acc` varchar(20) NOT NULL,
  `nama_acc` varchar(20) NOT NULL,
  `otorisasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_acc_petugas`
--

INSERT INTO `tb_acc_petugas` (`kode_acc`, `nama_acc`, `otorisasi`) VALUES
('AC-01', 'Master Customer', ''),
('AC-02', 'Master Supplier', ''),
('AC-03', 'Master Barang', ''),
('AC-04', 'Transaksi Masuk', ''),
('AC-05', 'Transaksi Keluar', ''),
('AC-06', 'Koreksi Masuk', ''),
('AC-07', 'Koreksi Keluar', ''),
('AC-08', 'Update Stock', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0812838281', '22092020020607employee1.png'),
(19, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user 1', '0812838281', '22092020020520employee3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `satuan`, `isi_satuan`) VALUES
('123', 'UREA', 'TON', 1000),
('456', 'PHOSKA', 'TON', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_in`
--

CREATE TABLE `tb_barang_in` (
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_in`
--

INSERT INTO `tb_barang_in` (`kode_transaksi`, `tanggal`, `type`, `kode_brg`, `nama_brg`, `satuan`, `isi_satuan`, `masuk`, `rak`, `kondisi`, `kode_supplier`, `supplier`, `petugas`) VALUES
('1', '2025-09-12', 'BM', '123', 'UREA', 'TON', 1000, 100, 'Rak A - Pupuk Urea', 'Rusak', 'S003', 'PT Subur Makmur Abadi', 'Rina Kurniawati'),
('2', '2025-09-12', 'BM', '123', 'UREA', 'TON', 1000, 100, 'Rak B - Pupuk NPK', 'Original', 'S004', 'UD Tani Sejahtera', 'Rina Kurniawati'),
('3', '2025-09-12', 'BM', '456', 'PHOSKA', 'TON', 1000, 100, 'Rak A - Pupuk Urea', 'Rusak', 'S004', 'UD Tani Sejahtera', 'Rina Kurniawati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_out`
--

CREATE TABLE `tb_barang_out` (
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kode_customer` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `truck` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_out`
--

INSERT INTO `tb_barang_out` (`kode_transaksi`, `tanggal`, `type`, `kode_brg`, `nama_brg`, `satuan`, `isi_satuan`, `keluar`, `rak`, `kondisi`, `kode_customer`, `customer`, `petugas`, `truck`) VALUES
('4', '2025-09-12', 'BK', '123', 'UREA', 'TON', 1000, 50, 'Rak A - Pupuk Urea', 'Rusak', 'C003', 'CV Agri Nusantara', 'Budi Santoso', 'h1'),
('5', '2025-09-12', 'BK', '123', 'UREA', 'TON', 1000, 50, 'Rak B - Pupuk NPK', 'Rusak', 'C004', 'PT Pupuk Mandiri Jaya', 'Rina Kurniawati', 'h2'),
('6', '2025-09-12', 'BK', '456', 'PHOSKA', 'TON', 1000, 50, 'Rak A - Pupuk Urea', 'Rusak', 'C003', 'CV Agri Nusantara', 'Budi Santoso', 'h3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cus`
--

CREATE TABLE `tb_cus` (
  `kode_cus` varchar(20) NOT NULL,
  `nama_cus` varchar(255) NOT NULL,
  `alamat_cus` text NOT NULL,
  `email_cus` varchar(255) NOT NULL,
  `cp_cus` varchar(255) NOT NULL,
  `telepon_cus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_cus`
--

INSERT INTO `tb_cus` (`kode_cus`, `nama_cus`, `alamat_cus`, `email_cus`, `cp_cus`, `telepon_cus`) VALUES
('C001', 'PT Tani Makmur Sejahtera', 'Jl. Raya Gresik No.12, Gresik', 'marketing@tanisejahtera.com', 'Hendra Wijaya', '0812-1111-2222'),
('C002', 'Koperasi Petani Subur', 'Jl. Desa Sukamaju RT 02 RW 03, Lamongan', 'koperasi@petanisubur.co.id', 'Siti Rahmawati', '0821-3333-4444'),
('C003', 'CV Agri Nusantara', 'Jl. Raya Manyar No.7, Gresik', 'admin@agrinusantara.co.id', 'Bambang Setyo', '0856-5555-6666'),
('C004', 'PT Pupuk Mandiri Jaya', 'Jl. Industri No.88, Surabaya', 'sales@pupukmandiri.com', 'Andi Pratama', '0878-7777-8888'),
('C005', 'Kelompok Tani Sumber Rejeki', 'Jl. Pertanian No.45, Tuban', 'ktani@sumberrejeki.org', 'Rina Lestari', '0813-9999-0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kartu`
--

CREATE TABLE `tb_kartu` (
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` varchar(255) NOT NULL,
  `saldoawal` varchar(255) NOT NULL,
  `masuk` varchar(255) NOT NULL,
  `keluar` varchar(255) NOT NULL,
  `saldoakhir` varchar(255) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kode_customer` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kartu`
--

INSERT INTO `tb_kartu` (`kode_transaksi`, `tanggal`, `type`, `kode_brg`, `nama_brg`, `satuan`, `isi_satuan`, `saldoawal`, `masuk`, `keluar`, `saldoakhir`, `rak`, `kondisi`, `kode_customer`, `kode_supplier`, `petugas`) VALUES
('', '2025-09-12', '', '123', 'UREA', '', '', '500', '', '', '', 'Rak A - Pupuk Urea', '', '', '', ''),
('', '2025-09-12', '', '123', 'UREA', '', '', '500', '', '', '', 'Rak B - Pupuk NPK', '', '', '', ''),
('', '2025-09-12', '', '456', 'PHOSKA', '', '', '500', '', '', '', 'Rak A - Pupuk Urea', '', '', '', ''),
('1', '2025-09-12', 'BM', '123', 'UREA', 'TON', '1000', '', '100', '', '', 'Rak A - Pupuk Urea', 'Rusak', '', 'S003', 'Rina Kurniawati'),
('2', '2025-09-12', 'BM', '123', 'UREA', 'TON', '1000', '', '100', '', '', 'Rak B - Pupuk NPK', 'Original', '', 'S004', 'Rina Kurniawati'),
('3', '2025-09-12', 'BM', '456', 'PHOSKA', 'TON', '1000', '', '100', '', '', 'Rak A - Pupuk Urea', 'Rusak', '', 'S004', 'Rina Kurniawati'),
('4', '2025-09-12', 'BK', '123', 'UREA', 'TON', '1000', '', '', '50', '', 'Rak A - Pupuk Urea', 'Rusak', 'C003', '', 'Budi Santoso'),
('5', '2025-09-12', 'BK', '123', 'UREA', 'TON', '1000', '', '', '50', '', 'Rak B - Pupuk NPK', 'Rusak', 'C004', '', 'Rina Kurniawati'),
('6', '2025-09-12', 'BK', '456', 'PHOSKA', 'TON', '1000', '', '', '50', '', 'Rak A - Pupuk Urea', 'Rusak', 'C003', '', 'Budi Santoso'),
('7', '2025-09-12', 'KBM', '123', 'UREA', 'TON', '1000', '', '500', '', '', 'Rak A - Pupuk Urea', 'Original', 'C004', '', 'Rina Kurniawati'),
('8', '2025-09-12', 'KBM', '123', 'UREA', 'TON', '1000', '', '500', '', '', 'Rak B - Pupuk NPK', 'Rusak', 'C003', '', 'Budi Santoso'),
('9', '2025-09-12', 'KBM', '456', 'PHOSKA', 'TON', '1000', '', '500', '', '', 'Rak A - Pupuk Urea', 'Original', 'C004', '', 'Rina Kurniawati'),
('11', '2025-09-12', 'KBK', '123', 'UREA', 'TON', '1000', '', '', '50', '', 'Rak A - Pupuk Urea', 'Original', '', 'S003', 'Rina Kurniawati'),
('22', '2025-09-12', 'KBK', '123', 'UREA', 'TON', '1000', '', '', '50', '', 'Rak B - Pupuk NPK', 'Rusak', '', 'S003', 'Rina Kurniawati'),
('33', '2025-09-12', 'KBK', '456', 'PHOSKA', 'TON', '1000', '', '', '50', '', 'Rak A - Pupuk Urea', 'Basah', '', 'S003', 'Agus Prasetyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `kode_kondisi` varchar(255) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`kode_kondisi`, `nama_kondisi`) VALUES
('K001', 'Original'),
('K002', 'Rusak'),
('K003', 'Basah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koreksi_in`
--

CREATE TABLE `tb_koreksi_in` (
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kode_customer` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `truck` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_koreksi_in`
--

INSERT INTO `tb_koreksi_in` (`kode_transaksi`, `tanggal`, `type`, `kode_brg`, `nama_brg`, `satuan`, `isi_satuan`, `masuk`, `rak`, `kondisi`, `kode_customer`, `customer`, `petugas`, `truck`) VALUES
('7', '2025-09-12', 'KBM', '123', 'UREA', 'TON', 1000, 500, 'Rak A - Pupuk Urea', 'Original', 'C004', 'PT Pupuk Mandiri Jaya', 'Rina Kurniawati', 'h1'),
('8', '2025-09-12', 'KBM', '123', 'UREA', 'TON', 1000, 500, 'Rak B - Pupuk NPK', 'Rusak', 'C003', 'CV Agri Nusantara', 'Budi Santoso', 'h2'),
('9', '2025-09-12', 'KBM', '456', 'PHOSKA', 'TON', 1000, 500, 'Rak A - Pupuk Urea', 'Original', 'C004', 'PT Pupuk Mandiri Jaya', 'Rina Kurniawati', 'h3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koreksi_out`
--

CREATE TABLE `tb_koreksi_out` (
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_koreksi_out`
--

INSERT INTO `tb_koreksi_out` (`kode_transaksi`, `tanggal`, `type`, `kode_brg`, `nama_brg`, `satuan`, `isi_satuan`, `keluar`, `rak`, `kondisi`, `kode_supplier`, `supplier`, `petugas`) VALUES
('11', '2025-09-12', 'KBK', '123', 'UREA', 'TON', 1000, 50, 'Rak A - Pupuk Urea', 'Original', 'S003', 'PT Subur Makmur Abadi', 'Rina Kurniawati'),
('22', '2025-09-12', 'KBK', '123', 'UREA', 'TON', 1000, 50, 'Rak B - Pupuk NPK', 'Rusak', 'S003', 'PT Subur Makmur Abadi', 'Rina Kurniawati'),
('33', '2025-09-12', 'KBK', '456', 'PHOSKA', 'TON', 1000, 50, 'Rak A - Pupuk Urea', 'Basah', 'S003', 'PT Subur Makmur Abadi', 'Agus Prasetyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `kode_petugas` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otorisasi` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`kode_petugas`, `nama`, `job`, `username`, `password`, `otorisasi`, `telepon`) VALUES
('P001', 'Andi Saputra', 'Kepala Gudang Pupuk', 'andi_gdg', '202cb962ac59075b964b07152d234b70', 'AC-03,AC-04,AC-05,AC-06,AC-07,AC-08', '0812-3456-7890'),
('P002', 'Siti Lestari', 'Admin Gudang Pupuk', 'siti_admin', '202cb962ac59075b964b07152d234b70', 'AC-01,AC-02,AC-03', '0821-3344-5566'),
('P003', 'Budi Santoso', 'Petugas Penerimaan Barang', 'budi_in', '202cb962ac59075b964b07152d234b70', 'AC-04,AC-06', '0856-2233-4455'),
('P004', 'Rina Kurniawati', 'Petugas Pengeluaran Barang', 'rina_out', '202cb962ac59075b964b07152d234b70', 'AC-05,AC-07', '0878-9988-1122'),
('P005', 'Agus Prasetyo', 'Petugas Stok & Inventaris', 'agus_stock', '202cb962ac59075b964b07152d234b70', 'AC-03,AC-08', '0813-6677-8899');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `kode_rak` varchar(255) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`kode_rak`, `nama_rak`) VALUES
('R001', 'Rak A - Pupuk Urea'),
('R002', 'Rak B - Pupuk NPK'),
('R003', 'Rak C - Pupuk ZA'),
('R004', 'Rak D - Pupuk Organik'),
('R005', 'Rak E - Pupuk Campuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldoawal`
--

CREATE TABLE `tb_saldoawal` (
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `saldoawal` varchar(255) NOT NULL,
  `rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_saldoawal`
--

INSERT INTO `tb_saldoawal` (`kode_brg`, `nama_brg`, `tanggal`, `saldoawal`, `rak`) VALUES
('123', 'UREA', '2025-09-12', '500', 'Rak A - Pupuk Urea'),
('123', 'UREA', '2025-09-12', '500', 'Rak B - Pupuk NPK'),
('456', 'PHOSKA', '2025-09-12', '500', 'Rak A - Pupuk Urea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sup`
--

CREATE TABLE `tb_sup` (
  `kode_sup` varchar(255) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `alamat_sup` text NOT NULL,
  `email_sup` varchar(255) NOT NULL,
  `cp_sup` varchar(255) NOT NULL,
  `telepon_sup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sup`
--

INSERT INTO `tb_sup` (`kode_sup`, `nama_sup`, `alamat_sup`, `email_sup`, `cp_sup`, `telepon_sup`) VALUES
('S001', 'PT Pupuk Indonesia', 'Jl. Veteran No.10, Gresik', 'sales@pupukindonesia.co.id', 'Ahmad Fauzi', '0812-1000-2000'),
('S002', 'CV Agro Sentosa', 'Jl. Raya Pertanian No.22, Surabaya', 'admin@agrosentosa.com', 'Lina Marlina', '0821-3000-4000'),
('S003', 'PT Subur Makmur Abadi', 'Jl. Industri No.45, Lamongan', 'marketing@suburmakmur.co.id', 'Bambang Widodo', '0856-5000-6000'),
('S004', 'UD Tani Sejahtera', 'Jl. Desa Tanjung RT 01 RW 02, Tuban', 'info@tanisejahtera.id', 'Rudi Hartono', '0878-7000-8000'),
('S005', 'PT Nusantara Agro Kimia', 'Jl. Raya Kimia No.15, Mojokerto', 'cs@nusantaraagrokimia.com', 'Ratna Ayu', '0813-9000-1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_type`
--

CREATE TABLE `tb_type` (
  `kode_type` varchar(255) NOT NULL,
  `nama_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_type`
--

INSERT INTO `tb_type` (`kode_type`, `nama_type`) VALUES
('BM', 'Barang Masuk'),
('BK', 'Barang Keluar'),
('KBM', 'Koreksi Barang Masuk'),
('KBK', 'Koreksi Barang Keluar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `kode_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

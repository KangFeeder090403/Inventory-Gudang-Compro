-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2025 pada 16.36
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
('AC-01', 'Customer', ''),
('AC-02', 'Supplier', ''),
('AC-03', 'Data Barang', ''),
('AC-04', 'Input Barang Masuk', ''),
('AC-05', 'Input Barang Keluar', ''),
('AC-06', 'Return (Awal)', ''),
('AC-07', 'Return (Akhir)', ''),
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
(23, 'Haydar', '202cb962ac59075b964b07152d234b70', 'Haydar Akbar', '082338703095', '');

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
('BRG-001', 'Karung 50 Kg', 'Karung', 50),
('BRG-002', 'Karung 25 Kg', 'Karung', 25),
('BRG-003', 'Plastik Packing', 'Pack', 100),
('BRG-004', 'Tali Ikat', 'Rol', 50),
('BRG-005', 'Label Barang', 'Pack', 200),
('BRG-006', 'Kardus Besar', 'Pcs', 1);

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
('CUST-001', 'PT Maju Bersama', 'Jl. Merpati No. 12, Jakarta Selatan', 'info@majubersama.co.id', 'Bapak Rian Setiawan', '0812-5566-9911'),
('CUST-002', 'CV Sumber Jaya', 'Jl. Raya Industri No. 88, Bekasi', 'admin@sumberjaya.com', 'Ibu Lestari', '0821-7788-1144'),
('CUST-003', 'PT Mitra Abadi', 'Jl. Anggrek No. 5, Surabaya', 'marketing@mitraabadi.co.id', 'Bapak Doni Pratama', '0813-9900-4411'),
('CUST-004', 'UD Sentosa Makmur', 'Jl. Pahlawan No. 22, Semarang', 'sentosa.makmur@gmail.com', 'Ibu Nita', '0852-6677-2300'),
('CUST-005', 'PT Cahaya Timur', 'Jl. Kenanga No. 77, Bandung', 'cs@cahayatimur.com', 'Bapak Yusuf', '0838-2211-4400'),
('CUST-006', 'CV Pelita Mandiri', 'Jl. Melati No. 9, Yogyakarta', 'pelita.mandiri@outlook.com', 'Ibu Winda', '0812-7700-9876');

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
('KDS-01', 'Baik'),
('KDS-02', 'Rusak'),
('KDS-03', 'Retak'),
('KDS-04', 'Kedaluwarsa'),
('KDS-05', 'Hampir Habis Masa Pakai'),
('KDS-06', 'Hilang / Tidak Ditemukan');

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
('PTG-001', 'Andi Saputra', 'Kepala Gudang', 'andi.gudang', '202cb962ac59075b964b07152d234b70', 'AC-01,AC-02,AC-03,AC-04,AC-05,AC-06,AC-07,AC-08', '081234567890'),
('PTG-002', 'Budi Santoso', 'Admin Gudang', 'adminpupuk', '202cb962ac59075b964b07152d234b70', 'AC-01,AC-02,AC-03,AC-04,AC-05', '082345678901'),
('PTG-003', 'Siti Rahmawati', 'Staff Gudang', 'siti.staff', '202cb962ac59075b964b07152d234b70', 'AC-03,AC-04,AC-05', '083456789012');

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
('RAK-001', 'Blok A – Rak 01'),
('RAK-002', 'Blok A – Rak 02'),
('RAK-003', 'Blok B – Rak 01'),
('RAK-004', 'Blok B – Rak 02'),
('RAK-005', 'Blok C – Rak 01'),
('RAK-006', 'Blok C – Rak 02');

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
('SUP-001', 'PT Sinar Abadi', 'Jl. Wijaya Kusuma No. 10, Jakarta Barat', 'supplier@sinarabadi.co.id', 'Bapak Heru Santoso', '0812-3344-9900'),
('SUP-002', 'CV Berkah Mandiri', 'Jl. Cempaka No. 21, Surabaya', 'info@berkahmandiri.com', 'Ibu Rina Pratiwi', '0813-8811-7722'),
('SUP-003', 'PT Jaya Persada', 'Jl. Kenangan No. 14, Medan', 'admin@jayapersada.co.id', 'Bapak Toni Wijaya', '0821-6677-4411'),
('SUP-004', 'UD Makmur Sentosa', 'Jl. Puspa No. 5, Bandung', 'makmur.sentosa@gmail.com', 'Ibu Mira', '0852-9988-3355'),
('SUP-005', 'PT Graha Utama', 'Jl. Teratai No. 40, Semarang', 'cs@grahaupt.com', 'Bapak Irfan Maulana', '0838-5511-7700'),
('SUP-006', 'CV Surya Niaga', 'Jl. Mawar No. 3, Yogyakarta', 'suryaniaga@outlook.com', 'Ibu Diah', '0812-8855-9901');

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
  MODIFY `kode_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

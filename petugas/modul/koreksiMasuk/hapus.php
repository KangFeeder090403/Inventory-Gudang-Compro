<?php
include "sesi_petugas.php";
if (isset($_GET['kode_transaksi'])) {
	include "../koneksi.php";
	$id = $_GET['kode_transaksi'];

	$sql1 = "DELETE FROM tb_koreksi_in WHERE kode_transaksi = '$id'";
	$hapus1 = mysqli_query($koneksi, $sql1);

	if ($hapus1) {
		// redirect ke halaman koreksi masuk
		header("Location: ?m=koreksiMasuk&s=awal");
		exit();
	} else {
		echo 'Data Koreksi Barang Masuk Gagal Dihapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
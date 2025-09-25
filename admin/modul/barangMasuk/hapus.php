<?php
include "sesi_admin.php";
if (isset($_GET['kode_transaksi'])) {
	include "../koneksi.php";
	$id = $_GET['kode_transaksi'];

	$sql1 = "DELETE FROM tb_barang_in WHERE kode_transaksi= '$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=barangMasuk&s=awal");
	} else {
		echo 'Data Kelas Gagal Di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
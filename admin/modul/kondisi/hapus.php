<?php
include "sesi_admin.php";
if (isset($_GET['kode_kondisi'])) {
	include "../koneksi.php";
	$id = $_GET['kode_kondisi'];

	$sql1 = "DELETE FROM tb_kondisi WHERE kode_kondisi= '$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=kondisi&s=awal");
	} else {
		echo 'Data Kelas Gagal Di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
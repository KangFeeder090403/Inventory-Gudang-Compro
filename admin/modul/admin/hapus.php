<?php
include "sesi_admin.php";
if (isset($_GET['kode_admin'])) {
	include "../koneksi.php";
	$id = $_GET['kode_admin'];
	$sql = "SELECT * FROM tb_admin WHERE kode_admin='$id'";
	$hapus = mysqli_query($koneksi, $sql);
	$r = mysqli_fetch_array($hapus);
	$sql1 = "DELETE FROM tb_admin WHERE kode_admin='$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=admin");
	} else {
		echo 'Data Kelas GagaL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
<?php
include "sesi_petugas.php";
if (isset($_GET['kode_cus'])) {
	include "../koneksi.php";
	$id = $_GET['kode_cus'];

	$sql1 = "DELETE FROM tb_cus WHERE kode_cus='$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=customer&s=awal");
	} else {
		echo 'Data Kelas Gagal Di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
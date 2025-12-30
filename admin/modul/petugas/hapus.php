<?php
include "sesi_admin.php";
if (isset($_GET['kode_petugas'])) {
	include "../koneksi.php";
	$id = $_GET['kode_petugas'];

	$sql1 = "DELETE FROM tb_petugas WHERE kode_petugas= '$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=petugas&s=awal");
	} else {
		echo 'Data Kelas Gagal di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
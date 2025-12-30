<?php
include "sesi_admin.php";
if (isset($_GET['kode_rak'])) {
	include "../koneksi.php";
	$id = $_GET['kode_rak'];

	$sql1 = "DELETE FROM tb_rak WHERE kode_rak= '$id'";


	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=rak&s=awal");
	} else {
		echo 'Data Kelas Gagal Di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
<?php
include "sesi_admin.php";
if (isset($_GET['kode_transaksi'])) {
	include "../koneksi.php";
	$id = $_GET['kode_transaksi'];

	// hapus data dari tabel koreksi_out berdasarkan kode_transaksi
	$sql = "DELETE FROM tb_koreksi_out WHERE kode_transaksi = '$id'";
	$hapus = mysqli_query($koneksi, $sql);

	if ($hapus) {
		header("Location: ?m=koreksiKeluar&s=awal");
		exit;
	} else {
		echo "Data Gagal Dihapus: " . mysqli_error($koneksi);
		echo '<br><a href="index.php?m=koreksiKeluar&s=awal">Kembali</a>';
	}
}
?>
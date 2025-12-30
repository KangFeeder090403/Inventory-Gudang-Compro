<?php
include "sesi_admin.php"; // hanya admin yang bisa akses
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	// ambil dan amankan input
	$kode_brg_lama = mysqli_real_escape_string($koneksi, $_POST['kode_brg_lama']);
	$tanggal_lama = mysqli_real_escape_string($koneksi, $_POST['tanggal_lama']);
	$kode_brg = mysqli_real_escape_string($koneksi, $_POST['kode_brg']);
	$nama_brg = mysqli_real_escape_string($koneksi, $_POST['nama_brg']);
	$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
	$saldoawal = mysqli_real_escape_string($koneksi, $_POST['saldoawal']);
	$rak = mysqli_real_escape_string($koneksi, $_POST['rak']);

	// Update tb_saldoawal
	$sql1 = "UPDATE tb_saldoawal SET 
				tanggal='$tanggal', 
				saldoawal='$saldoawal',
				rak='$rak'
			WHERE kode_brg='$kode_brg_lama' AND tanggal='$tanggal_lama'";

	$query1 = mysqli_query($koneksi, $sql1);

	// Update tb_kartu juga
	$sql2 = "UPDATE tb_kartu SET 
				tanggal='$tanggal', 
				saldoawal='$saldoawal',
				rak='$rak'
			WHERE kode_brg='$kode_brg_lama' AND tanggal='$tanggal_lama'";

	$query2 = mysqli_query($koneksi, $sql2);

	if ($query1 && $query2) {
		header("location: ?m=saldoawal&s=awal");
		exit;
	} else {
		echo "Gagal Update Data: " . mysqli_error($koneksi);
	}
} else {
	echo "Akses tidak valid";
}
?>

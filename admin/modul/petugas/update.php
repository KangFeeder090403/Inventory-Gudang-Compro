<?php
include "sesi_admin.php"; // hanya admin yang bisa akses
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	// ambil dan amankan input
	$kode_petugas = mysqli_real_escape_string($koneksi, $_POST['kode_petugas']);
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$job = mysqli_real_escape_string($koneksi, $_POST['job']); // Job/Jobdisk
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);

	// ambil otorisasi dari checkbox
	$otorisasiArr = isset($_POST['otorisasi']) ? $_POST['otorisasi'] : [];
	$otorisasi = mysqli_real_escape_string($koneksi, implode(",", $otorisasiArr));

	// password opsional
	if (!empty($_POST['password'])) {
		$password = md5($_POST['password']);
		$sql = "UPDATE tb_petugas SET 
                    nama='$nama', 
                    job='$job', 
                    username='$username', 
                    password='$password', 
                    telepon='$telepon', 
                    otorisasi='$otorisasi'
                WHERE kode_petugas='$kode_petugas'";
	} else {
		$sql = "UPDATE tb_petugas SET 
                    nama='$nama', 
                    job='$job', 
                    username='$username', 
                    telepon='$telepon', 
                    otorisasi='$otorisasi'
                WHERE kode_petugas='$kode_petugas'";
	}

	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("location: ?m=petugas&s=awal");
		exit;
	} else {
		echo "Gagal Update Data: " . mysqli_error($koneksi);
	}
}
?>

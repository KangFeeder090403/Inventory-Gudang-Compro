<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
	include "../koneksi.php";
	$kode_petugas = $_POST['kode_petugas'];
	$nama = $_POST['nama'];
	$job = $_POST['job'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$telepon = $_POST['telepon'];

	// pastikan otorisasi dari checkbox multiple
	$otorisasiArr = isset($_POST['otorisasi']) ? $_POST['otorisasi'] : [];
	// ubah array ke string, pisah dengan koma
	$otorisasi = implode(",", $otorisasiArr);

	// cek username sudah ada atau belum
	$sql = "SELECT * FROM tb_petugas WHERE username = '$username'";
	$tambah = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		echo "username sudah ada";
	} else {
		$sql = "INSERT INTO tb_petugas 
                SET kode_petugas='$kode_petugas', 
                    nama='$nama', 
                    job='$job', 
                    username='$username', 
                    password='$password', 
                    otorisasi='$otorisasi', 
                    telepon='$telepon'";
		mysqli_query($koneksi, $sql);
		header("location: ?m=petugas&s=awal");
	}

} else {
	echo "Gagal";
}
?>
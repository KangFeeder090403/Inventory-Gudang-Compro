<?php
include "sesi_admin.php"; // hanya admin yang bisa akses
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	// ambil dan amankan input
	$kode_admin = mysqli_real_escape_string($koneksi, $_POST['kode_admin']);
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);

	// password opsional - hanya update jika diisi
	if (!empty($_POST['password'])) {
		$password = md5($_POST['password']);
		$sql = "UPDATE tb_admin SET 
                    nama='$nama', 
                    password='$password', 
                    telepon='$telepon'
                WHERE kode_admin='$kode_admin'";
	} else {
		// jika password kosong, tidak diupdate
		$sql = "UPDATE tb_admin SET 
                    nama='$nama', 
                    telepon='$telepon'
                WHERE kode_admin='$kode_admin'";
	}

	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("location: ?m=admin&s=awal");
		exit;
	} else {
		echo "Gagal Update Data: " . mysqli_error($koneksi);
	}
} else {
	echo "Akses tidak valid";
}
?>

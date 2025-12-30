<?php
include "sesi_admin.php"; // hanya admin yang bisa akses
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	// ambil dan amankan input
	$kode_kondisi_lama = mysqli_real_escape_string($koneksi, $_POST['kode_kondisi_lama']);
	$kode_kondisi = mysqli_real_escape_string($koneksi, $_POST['kode_kondisi']);
	$nama_kondisi = mysqli_real_escape_string($koneksi, $_POST['nama_kondisi']);

	// cek apakah kode_kondisi berubah dan sudah digunakan oleh data lain
	if ($kode_kondisi != $kode_kondisi_lama) {
		$cek = mysqli_query($koneksi, "SELECT * FROM tb_kondisi WHERE kode_kondisi='$kode_kondisi'");
		if (mysqli_num_rows($cek) > 0) {
			echo "<script>
					alert('Kode Kondisi sudah digunakan!');
					window.location.href='?m=kondisi&s=ubah&kode_kondisi=$kode_kondisi_lama';
				  </script>";
			exit;
		}
	}

	$sql = "UPDATE tb_kondisi SET 
				kode_kondisi='$kode_kondisi', 
				nama_kondisi='$nama_kondisi'
			WHERE kode_kondisi='$kode_kondisi_lama'";

	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("location: ?m=kondisi&s=awal");
		exit;
	} else {
		echo "Gagal Update Data: " . mysqli_error($koneksi);
	}
} else {
	echo "Akses tidak valid";
}
?>

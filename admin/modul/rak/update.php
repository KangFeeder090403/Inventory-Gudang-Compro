<?php
include "sesi_admin.php"; // hanya admin yang bisa akses
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	// ambil dan amankan input
	$kode_rak_lama = mysqli_real_escape_string($koneksi, $_POST['kode_rak_lama']);
	$kode_rak = mysqli_real_escape_string($koneksi, $_POST['kode_rak']);
	$nama_rak = mysqli_real_escape_string($koneksi, $_POST['nama_rak']);

	// cek apakah kode_rak berubah dan sudah digunakan oleh data lain
	if ($kode_rak != $kode_rak_lama) {
		$cek = mysqli_query($koneksi, "SELECT * FROM tb_rak WHERE kode_rak='$kode_rak'");
		if (mysqli_num_rows($cek) > 0) {
			echo "<script>
					alert('Kode Rak sudah digunakan!');
					window.location.href='?m=rak&s=ubah&kode_rak=$kode_rak_lama';
				  </script>";
			exit;
		}
	}

	$sql = "UPDATE tb_rak SET 
				kode_rak='$kode_rak', 
				nama_rak='$nama_rak'
			WHERE kode_rak='$kode_rak_lama'";

	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("location: ?m=rak&s=awal");
		exit;
	} else {
		echo "Gagal Update Data: " . mysqli_error($koneksi);
	}
} else {
	echo "Akses tidak valid";
}
?>

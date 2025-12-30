<?php

include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$kode_cus = $_POST['kode_cus'];
	$nama_cus = $_POST['nama_cus'];
	$email_cus = $_POST['email_cus'];
	$alamat_cus = $_POST['alamat_cus'];
	$cp_cus = $_POST['cp_cus'];
	$telepon_cus = $_POST['telepon_cus'];

}

$sql = "UPDATE tb_cus SET kode_cus='$kode_cus', nama_cus='$nama_cus', alamat_cus='$alamat_cus', email_cus='$email_cus', cp_cus='$cp_cus', telepon_cus='$telepon_cus' WHERE kode_cus='$kode_cus'";
$update = mysqli_query($koneksi, $sql);

if ($update) {
	header("location: ?m=customer&s=awal");
} else {
	echo "gagal";
}




?>
<?php

include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$kode_sup = $_POST['kode_sup'];
	$nama_sup = $_POST['nama_sup'];
	$email_sup = $_POST['email_sup'];
	$alamat_sup = $_POST['alamat_sup'];
	$cp_sup = $_POST['cp_sup'];
	$telepon_sup = $_POST['telepon_sup'];

}

$sql = "UPDATE tb_sup SET kode_sup='$kode_sup', nama_sup='$nama_sup', alamat_sup='$alamat_sup', email_sup='$email_sup', cp_sup='$cp_sup', telepon_sup='$telepon_sup' WHERE kode_sup='$kode_sup'";
$update = mysqli_query($koneksi, $sql);

if ($update) {
	header("location: ?m=supplier&s=awal");
} else {
	echo "gagal";
}




?>
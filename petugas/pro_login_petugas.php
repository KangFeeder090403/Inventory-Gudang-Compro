<?php
include '../koneksi.php';

$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM tb_petugas WHERE username = '$user' AND password = '$pass' LIMIT 1";
$login = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($login);
$b = mysqli_fetch_assoc($login);

if ($ketemu > 0) {
	session_start();
	$_SESSION['idinv2'] = $b['kode_petugas'];
	$_SESSION['userinv2'] = $b['username'];
	$_SESSION['passinv2'] = $b['password'];
	$_SESSION['namainv2'] = $b['nama'];
	$_SESSION['teleponinv2'] = $b['telepon'];

	// Simpan otorisasi
	if (!empty($b['otorisasi'])) {
		$_SESSION['otorisasi'] = explode(",", $b['otorisasi']);
	} else {
		$_SESSION['otorisasi'] = [];
	}

	// Redirect ke index + status success
	header("Location: index.php?m=awal&status=success");
	exit;
} else {
	// kalau login gagal -> balik ke login_petugas.php + error
	header("Location: login_petugas.php?error=1");
	exit;
}
?>
<?php
include '../koneksi.php';

$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'";
$login = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($login);
$b = mysqli_fetch_array($login);

if ($ketemu > 0) {
	session_start();
	$_SESSION['idinv'] = $b['kode_admin'];
	$_SESSION['userinv'] = $b['username'];
	$_SESSION['passinv'] = $b['password'];
	$_SESSION['namainv'] = $b['nama'];
	$_SESSION['teleponinv'] = $b['telepon'];

	// Redirect ke index dengan status success
	header("Location: index.php?m=awal&status=success");
	exit;
} else {
	// Jika salah -> kembali ke login.php dengan error
	header("Location: login.php?error=1");
	exit;
}
?>
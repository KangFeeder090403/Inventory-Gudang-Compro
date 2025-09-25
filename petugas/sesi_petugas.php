<?php
if (empty($_SESSION['idinv2']) and empty($_SESSION['inv2'])) {
	header('location: login_petugas.php');
}
?>
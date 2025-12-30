<?php
if (empty($_SESSION['idinv']) and empty($_SESSION['inv'])) {
	header('location: login.php');
}
?>
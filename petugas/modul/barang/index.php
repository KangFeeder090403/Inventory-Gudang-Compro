<?php
include_once "sesi_petugas.php";
?>
<!-- Loader -->
<div id="loader">
	<div class="spinner"></div>
	<p>Loading...</p>
</div>

<!-- Konten Utama -->
<div id="content" style="display:none;"></div>
<?php
$modul = (isset($_GET['s'])) ? $_GET['s'] : "awal";
switch ($modul) {
	case 'awal':
	default:
		include "modul/barang/title.php";
		break;
	case 'simpan':
		include "modul/barang/simpan.php";
		break;
	case 'hapus':
		include "modul/barang/hapus.php";
		break;
	case 'ubah':
		include "modul/barang/ubah.php";
		break;
	case 'update':
		include "modul/barang/update.php";
		break;

}
?>

<style>
	/* Loader Wrapper */
	#loader {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #fff;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		z-index: 9999;
		opacity: 1;
		transition: opacity 1s ease;
		/* efek fade out */
		font-family: Arial, sans-serif;
	}

	#loader p {
		margin-top: 15px;
		font-size: 16px;
		color: #555;
	}

	/* Spinner */
	.spinner {
		width: 60px;
		height: 60px;
		border: 6px solid #ddd;
		border-top: 6px solid #007bff;
		border-radius: 50%;
		animation: spin 1s linear infinite;
	}

	@keyframes spin {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}
</style>

<script>
	window.addEventListener("load", function () {
		const loader = document.getElementById("loader");
		const content = document.getElementById("content");

		setTimeout(() => {
			loader.style.opacity = "0";
			setTimeout(() => {
				loader.style.display = "none";
				content.style.display = "block";
			}, 1000);
		}, 1000);
	});
</script>
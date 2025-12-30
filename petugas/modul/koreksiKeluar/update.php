<?php

include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$kode_transaksi = $_POST['kode_transaksi'];
    $tanggal = $_POST['tanggal'];
    $type = $_POST['type'];
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $satuan = $_POST['satuan'];
    $isi_satuan = $_POST['isi_satuan'];
    $keluar = $_POST['keluar'];
    $rak = $_POST['rak'];
    $kondisi = $_POST['kondisi'];
    $kode_supplier = $_POST['kode_supplier'];
    $supplier = $_POST['supplier'];
    $petugas = $_POST['petugas'];

}

$sql = "UPDATE tb_koreksi_out SET kode_transaksi='$kode_transaksi', tanggal='$tanggal', type='$type', kode_brg='$kode_brg', nama_brg='$nama_brg', satuan='$satuan', isi_satuan='$isi_satuan', keluar='$keluar', rak='$rak', kondisi='$kondisi', kode_supplier='$kode_supplier', supplier='$supplier', petugas='$petugas' WHERE kode_transaksi='$kode_transaksi'";
$update = mysqli_query($koneksi, $sql);

if ($update) {
	header("location: ?m=koreksiKeluar&s=awal");
} else {
	echo "gagal";
}




?>
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
    $masuk = $_POST['masuk'];
    $rak = $_POST['rak'];
    $kondisi = $_POST['kondisi'];
    $kode_customer = $_POST['kode_customer'];
    $customer = $_POST['customer'];
    $petugas = $_POST['petugas'];
    $truck = $_POST['truck'];

}

$sql = "UPDATE tb_koreksi_in SET kode_transaksi='$kode_transaksi', tanggal='$tanggal', type='$type', kode_brg='$kode_brg', nama_brg='$nama_brg', satuan='$satuan', isi_satuan='$isi_satuan', masuk='$masuk', rak='$rak', kondisi='$kondisi', kode_customer='$kode_customer', customer='$customer', petugas='$petugas', truck='$truck' WHERE kode_transaksi='$kode_transaksi'";
$update = mysqli_query($koneksi, $sql);

if ($update) {
	header("location: ?m=koreksiKeluar&s=awal");
} else {
	echo "gagal";
}




?>
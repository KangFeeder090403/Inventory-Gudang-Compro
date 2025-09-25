<?php
include "sesi_admin.php";

if (isset($_POST['simpan'])) {
    include('../koneksi.php');

    // ambil data dari form
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
    $kode_supplier = $_POST['kode_sup'];
    $supplier = $_POST['nama_sup'];
    $petugas = $_POST['petugas'];

    // insert ke tb_barang_in
    $insert1 = mysqli_query($koneksi, "INSERT INTO tb_barang_in 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, masuk, rak, kondisi, kode_supplier, supplier, petugas) 
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$masuk','$rak','$kondisi','$kode_supplier','$supplier','$petugas')");

    // insert ke tb_kartu (tanpa nama_brg & supplier)
    $insert2 = mysqli_query($koneksi, "INSERT INTO tb_kartu 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, masuk, rak, kondisi, kode_supplier, petugas) 
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$masuk','$rak','$kondisi','$kode_supplier','$petugas')");

    if ($insert1 && $insert2) {
        header("location: ?m=barangMasuk&s=awal");
        exit;
    } else {
        echo "Gagal Simpan: " . mysqli_error($koneksi);
    }
}
?>
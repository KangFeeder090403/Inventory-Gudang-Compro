<?php
include "sesi_petugas.php";

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
    $keluar = $_POST['keluar'];
    $rak = $_POST['rak'];
    $kondisi = $_POST['kondisi'];
    $kode_supplier = $_POST['kode_sup'];
    $supplier = $_POST['nama_sup'];
    $petugas = $_POST['petugas'];

    // insert ke tb_koreksi_out
    $insert1 = mysqli_query($koneksi, "INSERT INTO tb_koreksi_out 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, keluar, rak, kondisi, kode_supplier, supplier, petugas) 
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$keluar','$rak','$kondisi','$kode_supplier','$supplier','$petugas')");

    // insert juga ke tb_kartu
    $insert2 = mysqli_query($koneksi, "INSERT INTO tb_kartu 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, keluar, rak, kondisi, kode_supplier, petugas) 
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$keluar','$rak','$kondisi','$kode_supplier','$petugas')");

    if ($insert1 && $insert2) {
        header("location: ?m=koreksiKeluar&s=awal");
        exit;
    } else {
        echo "Gagal simpan: " . mysqli_error($koneksi);
    }
}
?>
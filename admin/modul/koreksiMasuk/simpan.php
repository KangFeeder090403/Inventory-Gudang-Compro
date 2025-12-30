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
    $kode_customer = $_POST['kode_cus'];
    $customer = $_POST['nama_cus'];
    $petugas = $_POST['petugas'];
    $truck = $_POST['truck'];

    // insert ke tb_koreksi_in
    $insert1 = mysqli_query($koneksi, "
        INSERT INTO tb_koreksi_in 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, masuk, rak, kondisi, kode_customer, customer, petugas, truck) 
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$masuk','$rak','$kondisi','$kode_customer','$customer','$petugas','$truck')
    ");

    // insert juga ke tb_kartu (tanpa nama_brg, customer, truck)
    $insert2 = mysqli_query($koneksi, "
        INSERT INTO tb_kartu 
        (kode_transaksi, tanggal, type, kode_brg, nama_brg, satuan, isi_satuan, masuk, rak, kondisi, kode_customer, petugas)  
        VALUES 
        ('$kode_transaksi','$tanggal','$type','$kode_brg','$nama_brg','$satuan','$isi_satuan','$masuk','$rak','$kondisi','$kode_customer','$petugas')
    ");

    if ($insert1 && $insert2) {
        header("location: ?m=koreksiMasuk&s=awal");
        exit;
    } else {
        echo "Gagal Simpan: " . mysqli_error($koneksi);
    }
}
?>
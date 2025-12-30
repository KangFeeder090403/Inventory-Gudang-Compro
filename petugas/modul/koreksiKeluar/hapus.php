<?php
include "sesi_petugas.php";
if (isset($_GET['kode_transaksi'])) {
    include "../koneksi.php";
    $id = $_GET['kode_transaksi'];

    // hapus data dari tabel koreksi_out
    $sql1 = "DELETE FROM tb_koreksi_out WHERE kode_transaksi = '$id'";
    $hapus1 = mysqli_query($koneksi, $sql1);

    // hapus data terkait di tb_kartu
    $sql2 = "DELETE FROM tb_kartu WHERE kode_transaksi = '$id'";
    $hapus2 = mysqli_query($koneksi, $sql2);

    if ($hapus1 && $hapus2) {
        header("Location: ?m=koreksiKeluar&s=awal");
        exit;
    } else {
        echo "Data Gagal Dihapus: " . mysqli_error($koneksi);
        echo '<br><a href="index.php?m=koreksiKeluar&s=awal">Kembali</a>';
    }
}
?>

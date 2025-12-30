<?php
include "sesi_admin.php";
if (isset($_GET['kode_transaksi'])) {
    include "../koneksi.php";
    $id = $_GET['kode_transaksi'];

    // hapus dari tb_koreksi_in
    $sql1 = "DELETE FROM tb_koreksi_in WHERE kode_transaksi = '$id'";
    $hapus1 = mysqli_query($koneksi, $sql1);

    // hapus juga dari tb_kartu kalau ada data terkait
    $sql2 = "DELETE FROM tb_kartu WHERE kode_transaksi = '$id'";
    $hapus2 = mysqli_query($koneksi, $sql2);

    if ($hapus1 && $hapus2) {
        // redirect ke halaman koreksi masuk
        header("Location: ?m=koreksiMasuk&s=awal");
        exit();
    } else {
        echo 'Data Koreksi Barang Masuk Gagal Dihapus: ' . mysqli_error($koneksi);
        echo '<a href="index.php">Kembali</a>';
    }
}
?>

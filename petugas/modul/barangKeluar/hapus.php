<?php
include "sesi_petugas.php";
if (isset($_GET['kode_transaksi'])) {
    include "../koneksi.php";
    $id = $_GET['kode_transaksi'];

    // hapus dari tb_barang_out
    $sql1 = "DELETE FROM tb_barang_out WHERE kode_transaksi = '$id' LIMIT 1";
    $hapus1 = mysqli_query($koneksi, $sql1);

    // hapus juga dari tb_kartu (jika ada data terkait)
    $sql2 = "DELETE FROM tb_kartu WHERE kode_transaksi = '$id' LIMIT 1";
    $hapus2 = mysqli_query($koneksi, $sql2);

    if ($hapus1 && $hapus2) {
        header("Location: ?m=barangKeluar&s=awal");
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
        echo '<a href="index.php">Kembali</a>';
    }
}
?>

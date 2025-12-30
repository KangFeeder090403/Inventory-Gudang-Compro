<?php
include "sesi_admin.php";

if(isset($_GET['kode_brg'])){
    include "../koneksi.php";

    $kode_brg = $_GET['kode_brg'];
    $tanggal = $_GET['tanggal'];
    $saldoawal = $_GET['saldoawal'];
    $rak = $_GET['rak'];

    // Hapus dari tb_saldoawal
    $sql1 = "DELETE FROM tb_saldoawal 
             WHERE kode_brg='$kode_brg' 
               AND tanggal='$tanggal' 
               AND saldoawal='$saldoawal' 
               AND rak='$rak'
             LIMIT 1"; 
    $hapus1 = mysqli_query($koneksi, $sql1);

    // Hapus juga dari tb_kartu (ikut pakai rak biar presisi)
    $sql2 = "DELETE FROM tb_kartu 
             WHERE kode_brg='$kode_brg' 
               AND tanggal='$tanggal'
               AND rak='$rak'
             LIMIT 1"; 
    $hapus2 = mysqli_query($koneksi, $sql2);

    if($hapus1 && $hapus2){
        header("Location: ?m=saldoawal&s=awal");
    } else {
        echo "Data Gagal dihapus: " . mysqli_error($koneksi);
        echo '<a href="index.php">Kembali</a>';
    }
}
?>

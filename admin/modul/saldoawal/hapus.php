<?php
include "sesi_admin.php";

if(isset($_GET['kode_brg'])){
    include "../koneksi.php";

    $kode_brg = $_GET['kode_brg'];
    $tanggal = $_GET['tanggal'];
    $saldoawal = $_GET['saldoawal'];
    $rak = $_GET['rak'];

    $sql = "DELETE FROM tb_saldoawal 
            WHERE kode_brg='$kode_brg' 
              AND tanggal='$tanggal' 
              AND saldoawal='$saldoawal' 
              AND rak='$rak'
            LIMIT 1"; // hanya hapus 1 baris
              
    $hapus = mysqli_query($koneksi, $sql);

    if($hapus){
        header("Location: ?m=saldoawal&s=awal");
    } else {
        echo "Data Gagal dihapus: " . mysqli_error($koneksi);
        echo '<a href="index.php">Kembali</a>';
    }
}
?>

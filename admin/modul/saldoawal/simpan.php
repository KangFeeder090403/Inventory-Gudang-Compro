<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $tanggal = $_POST['tanggal'];
    $saldoawal = $_POST['saldoawal'];
    $rak = $_POST['rak'];

    // simpan ke tb_saldoawal
    $sql1 = "INSERT INTO tb_saldoawal (kode_brg, nama_brg, tanggal, saldoawal, rak)
             VALUES ('$kode_brg','$nama_brg','$tanggal','$saldoawal','$rak')";
    $insert1 = mysqli_query($koneksi, $sql1);

    // simpan juga ke tb_kartu
    $sql2 = "INSERT INTO tb_kartu (kode_brg, nama_brg, tanggal, saldoawal, rak)
             VALUES ('$kode_brg','$nama_brg','$tanggal','$saldoawal','$rak')";
    $insert2 = mysqli_query($koneksi, $sql2);

    if ($insert1 && $insert2) {
        echo "<script>
                window.location.href=document.referrer;
              </script>";
    } else {
        echo "Gagal simpan: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses Langsung Tidak Diperbolehkan!";
}
?>

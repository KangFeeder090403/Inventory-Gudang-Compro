<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_kondisi = $_POST['kode_kondisi'];
    $nama_kondisi = $_POST['nama_kondisi'];

    $sql = "INSERT INTO tb_kondisi (kode_kondisi, nama_kondisi)
            VALUES ('$kode_kondisi', '$nama_kondisi')";

    $insert = mysqli_query($koneksi, $sql);

    if ($insert) {
        echo "<script>
                window.location.href=document.referrer;
              </script>";
    } else {
        echo "Gagal simpan: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses langsung Tidak Diperbolehkan!";
}
?>
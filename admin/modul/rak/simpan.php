<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_rak = $_POST['kode_rak'];
    $nama_rak = $_POST['nama_rak'];

    $sql = "INSERT INTO tb_rak (kode_rak, nama_rak)
            VALUES ('$kode_rak', '$nama_rak')";

    $insert = mysqli_query($koneksi, $sql);

    if ($insert) {
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
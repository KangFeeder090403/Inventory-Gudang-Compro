<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_sup = $_POST['kode_sup'];
    $nama_sup = $_POST['nama_sup'];
    $alamat_sup = $_POST['alamat_sup'];
    $email_sup = $_POST['email_sup'];
    $cp_sup = $_POST['cp_sup'];
    $telepon_sup = $_POST['telepon_sup'];

    $sql = "INSERT INTO tb_sup (kode_sup, nama_sup, alamat_sup, email_sup, cp_sup, telepon_sup)
            VALUES ('$kode_sup','$nama_sup','$alamat_sup','$email_sup','$cp_sup','$telepon_sup')";

    $insert = mysqli_query($koneksi, $sql);

    if ($insert) {
        // reload otomatis halaman sebelumnya supaya data baru langsung muncul
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
<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_cus = $_POST['kode_cus'];
    $nama_cus = $_POST['nama_cus'];
    $alamat_cus = $_POST['alamat_cus'];
    $email_cus = $_POST['email_cus'];
    $cp_cus = $_POST['cp_cus'];
    $telepon_cus = $_POST['telepon_cus'];

    $sql = "INSERT INTO tb_cus (kode_cus, nama_cus, alamat_cus, email_cus, cp_cus, telepon_cus)
            VALUES ('$kode_cus','$nama_cus','$alamat_cus','$email_cus','$cp_cus','$telepon_cus')";

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
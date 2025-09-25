<?php
include "sesi_petugas.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $satuan = $_POST['satuan'];
    $isi_satuan = $_POST['isi_satuan'];

    // cek kode barang apakah sudah ada
    $sql_cek = mysqli_query($koneksi, "SELECT 1 FROM tb_barang WHERE kode_brg = '$kode_brg'");
    $cek = mysqli_fetch_row($sql_cek);

    if ($cek) {
        echo "<script>
                alert('Kode Barang Sudah Ada!');
                window.history.back();
              </script>";
    } else {
        $sql = "INSERT INTO tb_barang (kode_brg, nama_brg, satuan, isi_satuan)
                VALUES ('$kode_brg','$nama_brg','$satuan','$isi_satuan')";
        $insert = mysqli_query($koneksi, $sql);

        if ($insert) {
            echo "<script>
                    window.location.href=document.referrer;
                  </script>";
        } else {
            echo "Gagal simpan: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "Akses Langsung Tidak Diperbolehkan!";
}
?>
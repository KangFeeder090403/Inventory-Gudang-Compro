<?php
include "sesi_admin.php";
if (isset($_POST['simpan'])) {
    include "../koneksi.php";

    // Ambil data dari form
    $kode_transaksi = $_POST['kode_transaksi'];
    $tanggal = $_POST['tanggal'];
    $type = $_POST['type'];
    $kode_brg = $_POST['kode_brg'];
    $satuan = $_POST['satuan'];
    $isi_satuan = $_POST['isi_satuan'];
    $rak = $_POST['rak'];
    $kondisi = $_POST['kondisi'];
    $kode_customer = $_POST['kode_customer'];
    $kode_supplier = $_POST['kode_supplier'];
    $petugas = $_POST['petugas'];

    // Query insert ke tb_kartu
    $sql = "INSERT INTO tb_kartu 
            (kode_transaksi, tanggal, type, kode_brg, satuan, isi_satuan, rak, kondisi, kode_customer, kode_supplier, petugas) 
            VALUES 
            ('$kode_transaksi', '$tanggal', '$type', '$kode_brg', '$satuan', '$isi_satuan', '$rak', '$kondisi', '$kode_customer', '$kode_supplier', '$petugas')";

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
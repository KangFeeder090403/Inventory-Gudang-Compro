<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $satuan = $_POST['satuan'];
    $isi_satuan = $_POST['isi_satuan'];

    // sesuaikan nama kolom dengan yang ada di database kamu!
    $sql = "UPDATE tb_barang 
            SET nama_brg='$nama_brg', satuan='$satuan', isi_satuan='$isi_satuan'
            WHERE kode_brg='$kode_brg'";

    $update = mysqli_query($koneksi, $sql);

    if ($update) {
        header("location: ?m=barang&s=awal");
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses Tidak Valid";
}
?>
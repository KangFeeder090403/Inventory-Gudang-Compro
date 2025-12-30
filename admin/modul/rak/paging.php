<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Ambil keyword pencarian
$cari = isset($_GET['cari_rak']) ? mysqli_real_escape_string($koneksi, $_GET['cari_rak']) : "";

// Hitung total data sesuai filter
if ($cari != "") {
    $query_total = "SELECT * FROM tb_rak WHERE kode_rak LIKE '%$cari%' OR nama_rak LIKE '%$cari%'";
} else {
    $query_total = "SELECT * FROM tb_rak";
}
$data = mysqli_query($koneksi, $query_total);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// Query data sesuai pagination + filter
$nomor = $halaman_awal + 1;
$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// Jika tombol cari ditekan
if (isset($_POST['go_rak'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari_rak']);
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_rak
        WHERE kode_rak LIKE '%$cari%'
           OR nama_rak LIKE '%$cari%'
        ORDER BY kode_rak ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_rak
        ORDER BY CAST(SUBSTRING_INDEX(kode_rak, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}

// Jika data kosong
if (mysqli_num_rows($data_rak) == 0) {
    echo "<tr><td colspan='3' align='center'>Tidak ada data</td></tr>";
}

// Looping tampil data
while ($row = mysqli_fetch_array($data_rak)) {
    ?>
    <tr>
        <td><?= $row['kode_rak']; ?></td>
        <td><?= $row['nama_rak']; ?></td>
        <td>
            <a href="index.php?m=rak&s=hapus&kode_rak=<?= $row['kode_rak']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a> |
            <a href="index.php?m=rak&s=ubah&kode_rak=<?= $row['kode_rak']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
    <?php
}
?>
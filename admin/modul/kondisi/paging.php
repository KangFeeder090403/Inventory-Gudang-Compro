<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Hitung total data
$data = mysqli_query($koneksi, "SELECT * FROM tb_kondisi");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// Ambil data sesuai pagination dan urutkan dari kecil ke besar
$data_kondisi = mysqli_query($koneksi, "
    SELECT * FROM tb_kondisi
    ORDER BY CAST(SUBSTRING_INDEX(kode_kondisi, '-', -1) AS UNSIGNED) ASC
    LIMIT $halaman_awal, $batas
");

$nomor = $halaman_awal + 1;
$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// Jika data kosong
if (mysqli_num_rows($data_kondisi) == 0) {
    echo "<tr><td colspan='3' align='center'>Tidak ada data</td></tr>";
}

// Looping tampil data
while ($row = mysqli_fetch_array($data_kondisi)) {
    ?>
    <tr>
        <td><?= $row['kode_kondisi']; ?></td>
        <td><?= $row['nama_kondisi']; ?></td>
        <td>
            <a href="index.php?m=kondisi&s=hapus&kode_kondisi=<?= $row['kode_kondisi']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a> |
            <a href="index.php?m=kondisi&s=ubah&kode_kondisi=<?= $row['kode_kondisi']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
    <?php
}
?>
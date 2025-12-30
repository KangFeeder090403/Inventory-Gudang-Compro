<?php
include '../koneksi.php';

// Batas data per halaman
$batas = 5;

// Ambil halaman dari URL, kalau tidak ada set default ke 1
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;

// Hitung posisi data awal
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Hitung total data
$data = mysqli_query($koneksi, "SELECT * FROM tb_sup");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// Jika tombol cari ditekan
if (isset($_POST['go_supplier'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari_supplier']);
    $data_supplier = mysqli_query($koneksi, "
        SELECT * FROM tb_sup
        WHERE kode_sup LIKE '%$cari%'
           OR nama_sup LIKE '%$cari%'
        ORDER BY kode_sup ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_supplier = mysqli_query($koneksi, "
        SELECT * FROM tb_sup
        ORDER BY CAST(SUBSTRING_INDEX(kode_sup, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}

$nomor = $halaman_awal + 1;

// Debug jika data kosong
if (mysqli_num_rows($data_supplier) == 0) {
    echo "<tr><td colspan='7' align='center'>Tidak ada data</td></tr>";
}

while ($row = mysqli_fetch_assoc($data_supplier)) {
    ?>
    <tr>
        <td><?= $row['kode_sup']; ?></td>
        <td><?= $row['nama_sup']; ?></td>
        <td><?= $row['alamat_sup']; ?></td>
        <td><?= $row['email_sup']; ?></td>
        <td><?= $row['cp_sup']; ?></td>
        <td><?= $row['telepon_sup']; ?></td>
        <td>
            <a href="index.php?m=supplier&s=hapus&kode_sup=<?= $row['kode_sup']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a>
            |
            <a href="index.php?m=supplier&s=ubah&kode_sup=<?= $row['kode_sup']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
    <?php
}
?>
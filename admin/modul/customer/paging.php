<?php
include '../koneksi.php';

// Batas data per halaman
$batas = 5;

// Ambil halaman dari URL, kalau tidak ada set default ke 1
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;

// Hitung posisi data awal
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Hitung total data
$data = mysqli_query($koneksi, "SELECT * FROM tb_cus");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// Jika tombol cari ditekan
if (isset($_POST['go_customer'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari_customer']);
    $data_customer = mysqli_query($koneksi, "
        SELECT * FROM tb_cus
        WHERE kode_cus LIKE '%$cari%'
           OR nama_cus LIKE '%$cari%'
        ORDER BY kode_cus ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_customer = mysqli_query($koneksi, "
        SELECT * FROM tb_cus
        ORDER BY CAST(SUBSTRING_INDEX(kode_cus, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}

$nomor = $halaman_awal + 1;

// Debug jika data kosong
if (mysqli_num_rows($data_customer) == 0) {
    echo "<tr><td colspan='7' align='center'>Tidak Ada Data</td></tr>";
}

while ($row = mysqli_fetch_assoc($data_customer)) {
    ?>
    <tr>
        <td><?= $row['kode_cus']; ?></td>
        <td><?= $row['nama_cus']; ?></td>
        <td><?= $row['alamat_cus']; ?></td>
        <td><?= $row['email_cus']; ?></td>
        <td><?= $row['cp_cus']; ?></td>
        <td><?= $row['telepon_cus']; ?></td>
        <td>
            <a href="index.php?m=customer&s=hapus&kode_cus=<?= $row['kode_cus']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a>
            |
            <a href="index.php?m=customer&s=ubah&kode_cus=<?= $row['kode_cus']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
    <?php
}
?>
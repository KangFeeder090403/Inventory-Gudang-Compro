<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = $halaman + 1;

// Hitung total data
$data = mysqli_query($koneksi, "SELECT * FROM tb_saldoawal");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Jika tombol cari ditekan
if (isset($_POST['go'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari']);
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_saldoawal
        WHERE kode_brg LIKE '%$cari%'
           OR nama_brg LIKE '%$cari%'
        ORDER BY CAST(SUBSTRING_INDEX(kode_brg, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_saldoawal
        ORDER BY CAST(SUBSTRING_INDEX(kode_brg, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}


while ($row = mysqli_fetch_array($data_rak)):
?>
<tr>
    <td><?php echo $row['kode_brg']; ?></td>
    <td><?php echo $row['nama_brg']; ?></td>
    <td><?php echo $row['tanggal']; ?></td>
    <td><?php echo $row['saldoawal']; ?></td>
    <td><?php echo $row['rak']; ?></td>
    <td>
        <a href="index.php?m=saldoawal&s=hapus&kode_brg=<?php echo $row['kode_brg']; ?>&tanggal=<?php echo $row['tanggal']; ?>&saldoawal=<?php echo $row['saldoawal']; ?>&rak=<?php echo $row['rak']; ?>"
        onclick="return confirm('Yakin Akan Dihapus?')">
        <button class="btn btn-danger">Hapus</button>
        </a>

    </td>
</tr>
<?php endwhile; ?>

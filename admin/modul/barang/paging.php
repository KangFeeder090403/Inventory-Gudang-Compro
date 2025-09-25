<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = $halaman + 1;

// Hitung total data
$data = mysqli_query($koneksi, "SELECT * FROM tb_barang");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Jika tombol cari ditekan
if (isset($_POST['go'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari']);
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_barang
        WHERE kode_brg LIKE '%$cari%'
           OR nama_brg LIKE '%$cari%'
        ORDER BY CAST(SUBSTRING_INDEX(kode_brg, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_rak = mysqli_query($koneksi, "
        SELECT * FROM tb_barang
        ORDER BY CAST(SUBSTRING_INDEX(kode_brg, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}


while ($row = mysqli_fetch_array($data_rak)):
    ?>
    <tr>
        <td><?php echo $row['kode_brg']; ?></td>
        <td><?php echo $row['nama_brg']; ?></td>
        <td><?php echo $row['satuan']; ?></td>
        <td><?php echo $row['isi_satuan']; ?></td>
        <td>
            <a href="index.php?m=barang&s=hapus&kode_brg=<?php echo $row['kode_brg']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a> |
            <a href="index.php?m=barang&s=ubah&kode_brg=<?php echo $row['kode_brg']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
<?php endwhile; ?>
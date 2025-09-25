<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// hitung total data dulu
$data = mysqli_query($koneksi, "SELECT * FROM tb_koreksi_in");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// definisi prev/next
$previous = $halaman - 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// jika tombol cari ditekan
if (isset($_POST['go_koreksiMasuk'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari_koreksiMasuk']);
    $result = mysqli_query($koneksi, "
        SELECT * FROM tb_koreksi_in
        WHERE kode_transaksi LIKE '%$cari%'
           OR nama_brg LIKE '%$cari%'
        ORDER BY CAST(SUBSTRING_INDEX(kode_transaksi, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $result = mysqli_query($koneksi, "
        SELECT * FROM tb_koreksi_in
        ORDER BY CAST(SUBSTRING_INDEX(kode_transaksi, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}

$nomor = $halaman_awal + 1;

// looping data
while ($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row['kode_transaksi']; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
        <td><?php echo $row['kode_brg']; ?></td>
        <td><?php echo $row['nama_brg']; ?></td>
        <td><?php echo $row['satuan']; ?></td>
        <td><?php echo $row['isi_satuan']; ?></td>
        <td><?php echo $row['masuk']; ?></td>
        <td><?php echo $row['rak']; ?></td>
        <td><?php echo $row['kondisi']; ?></td>
        <td><?php echo $row['kode_customer']; ?></td>
        <td><?php echo $row['customer']; ?></td>
        <td><?php echo $row['petugas']; ?></td>
        <td><?php echo $row['truck']; ?></td>

        <td>
            <a href="index.php?m=koreksiMasuk&s=hapus&kode_transaksi=<?php echo $row['kode_transaksi']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a>
        </td>
    </tr>
<?php } ?>
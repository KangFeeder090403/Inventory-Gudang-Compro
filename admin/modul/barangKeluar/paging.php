<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// hitung total data dulu
$data = mysqli_query($koneksi, "SELECT * FROM tb_barang_out");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// baru definisikan prev/next
$previous = $halaman - 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// ambil data sesuai pagination
$data_brg_out = mysqli_query($koneksi, "SELECT * FROM tb_barang_out ORDER BY kode_transaksi ASC LIMIT $halaman_awal, $batas");

$nomor = $halaman_awal + 1;

// Jika tombol cari ditekan
if (isset($_POST['go_barangKeluar'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['cari_barangKeluar']);
    $data_barangKeluar = mysqli_query($koneksi, "
        SELECT * FROM tb_barang_out
        WHERE kode_transaksi LIKE '%$cari%'
           OR nama_brg LIKE '%$cari%'
        ORDER BY kode_transaksi ASC
        LIMIT $halaman_awal, $batas
    ");
} else {
    $data_barangKeluar = mysqli_query($koneksi, "
        SELECT * FROM tb_barang_out
        ORDER BY CAST(SUBSTRING_INDEX(kode_transaksi, '-', -1) AS UNSIGNED) ASC
        LIMIT $halaman_awal, $batas
    ");
}

// hasil query final untuk looping
$result = $data_barangKeluar;

while ($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row['kode_transaksi']; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
        <td><?php echo $row['kode_brg']; ?></td>
        <td><?php echo $row['nama_brg']; ?></td>
        <td><?php echo $row['satuan']; ?></td>
        <td><?php echo $row['isi_satuan']; ?></td>
        <td><?php echo $row['keluar']; ?></td>
        <td><?php echo $row['rak']; ?></td>
        <td><?php echo $row['kondisi']; ?></td>
        <td><?php echo $row['kode_customer']; ?></td>
        <td><?php echo $row['customer']; ?></td>
        <td><?php echo $row['petugas']; ?></td>
        <td><?php echo $row['truck']; ?></td>

        <td>
            <a href="index.php?m=barangKeluar&s=hapus&kode_transaksi=<?php echo $row['kode_transaksi']; ?>"
                onclick="return confirm('Yakin Akan Dihapus?')">
                <button class="btn btn-danger">Hapus</button>
            </a> |
            <a href="index.php?m=barangKeluar&s=ubah&kode_transaksi=<?php echo $row['kode_transaksi']; ?>">
                <button class="btn btn-primary">Edit</button>
            </a>
        </td>
    </tr>
<?php } ?>
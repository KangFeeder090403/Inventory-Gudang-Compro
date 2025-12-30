<?php
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Ambil keyword pencarian
$cari = isset($_GET['cari_kartu']) ? mysqli_real_escape_string($koneksi, $_GET['cari_kartu']) : "";

// Hitung total data sesuai filter
if ($cari != "") {
    $query_total = "SELECT * FROM tb_kartu WHERE kode_transaksi LIKE '%$cari%' OR kode_brg LIKE '%$cari%'";
} else {
    $query_total = "SELECT * FROM tb_kartu";
}
$data = mysqli_query($koneksi, $query_total);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// Query data sesuai pagination + filter
$nomor = $halaman_awal + 1;
$previous = ($halaman > 1) ? $halaman - 1 : 1;
$next = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;

// Ambil input (kalau kosong jadinya string kosong)
$cari_tanggal = isset($_POST['cari_tanggal']) ? mysqli_real_escape_string($koneksi, $_POST['cari_tanggal']) : '';
$cari_kartu   = isset($_POST['cari_kartu']) ? mysqli_real_escape_string($koneksi, $_POST['cari_kartu']) : '';

// Jika tombol cari ditekan
if (isset($_POST['go_tanggal']) || isset($_POST['go_kartu'])) {
    // Buat query dasar
    $query = "
    SELECT 
        k.kode_brg,
        k.nama_brg,
        IFNULL(s.saldoawal,0) AS saldoawal,
        SUM(k.masuk) AS total_masuk,
        SUM(k.keluar) AS total_keluar,
        (IFNULL(s.saldoawal,0) + SUM(k.masuk) - SUM(k.keluar)) AS saldoakhir,
        k.rak
    FROM tb_kartu k
    LEFT JOIN (
        SELECT kode_brg, MAX(saldoawal) AS saldoawal
        FROM tb_saldoawal
        GROUP BY kode_brg
    ) s ON s.kode_brg = k.kode_brg
    WHERE 1=1
    ";

    if (!empty($cari_tanggal)) {
        $query .= " AND k.tanggal = '$cari_tanggal'";
    }

    if (!empty($cari_kartu)) {
        $query .= " AND (k.kode_transaksi LIKE '%$cari_kartu%' OR k.kode_brg LIKE '%$cari_kartu%')";
    }

    $query .= "
    GROUP BY k.kode_brg, k.nama_brg, k.rak
    ORDER BY CAST(SUBSTRING_INDEX(k.kode_brg, '-', -1) AS UNSIGNED) ASC
    LIMIT $halaman_awal, $batas
    ";

    $data_kartu = mysqli_query($koneksi, $query);

}
// Jika tidak ada pencarian
else {
    $data_kartu = mysqli_query($koneksi, "
    SELECT 
        k.kode_brg,
        k.nama_brg,
        IFNULL(s.saldoawal,0) AS saldoawal,
        SUM(k.masuk) AS total_masuk,
        SUM(k.keluar) AS total_keluar,
        (IFNULL(s.saldoawal,0) + SUM(k.masuk) - SUM(k.keluar)) AS saldoakhir,
        k.rak
    FROM tb_kartu k
    LEFT JOIN (
        SELECT kode_brg, MAX(saldoawal) AS saldoawal
        FROM tb_saldoawal
        GROUP BY kode_brg
    ) s ON s.kode_brg = k.kode_brg
    GROUP BY k.kode_brg, k.nama_brg, k.rak
    ORDER BY CAST(SUBSTRING_INDEX(k.kode_brg, '-', -1) AS UNSIGNED) ASC
    LIMIT $halaman_awal, $batas
    ");
}

// Jika data kosong
if (!$data_kartu || mysqli_num_rows($data_kartu) == 0) {
    echo "<tr><td colspan='12' align='center'>Tidak ada data</td></tr>";
} else {
    // Looping tampil data
    while ($row = mysqli_fetch_array($data_kartu)) {
        ?>
        <tr>
            <td><?= htmlspecialchars($row['kode_brg']); ?></td>
            <td><?= htmlspecialchars($row['nama_brg']); ?></td>
            <td><?= htmlspecialchars($row['saldoawal']); ?></td>
            <td><?= htmlspecialchars($row['total_masuk']); ?></td>
            <td><?= htmlspecialchars($row['total_keluar']); ?></td>
            <td><?= htmlspecialchars($row['saldoakhir']); ?></td>
            <td><?= htmlspecialchars($row['rak']); ?></td>
        </tr>
        <?php
    }
}
?>

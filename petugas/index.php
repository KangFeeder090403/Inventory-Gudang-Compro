<?php
session_start();
include_once "sesi_petugas.php";

$modul = (isset($_GET['m'])) ? $_GET['m'] : "awal";
$jawal = "Sistem Inventory Gudang";
switch ($modul) {
    case 'awal':
    default:
        $aktif = "Beranda";
        $judul = "$jawal";
        include "awal.php";
        break;
    case 'customer':
        $aktif = "Customer";
        $judul = "Customer";
        include "modul/customer/index.php";
        break;
    case 'supplier':
        $aktif = "Supplier";
        $judul = "Supplier";
        include "modul/supplier/index.php";
        break;
    case 'barang':
        $aktif = "Barang";
        $judul = "Data Barang";
        include "modul/barang/index.php";
        break;
    case 'barangMasuk':
        $aktif = "Barang Masuk";
        $judul = "Modul Barang Masuk ";
        include "modul/barangMasuk/index.php";
        break;
    case 'barangKeluar':
        $aktif = "Barang Keluar";
        $judul = "Modul Barang Keluar ";
        include "modul/barangKeluar/index.php";
        break;
    case 'koreksiMasuk':
        $aktif = "Koreksi Masuk";
        $judul = "Modul Koreksi Persediaan Masuk";
        include "modul/koreksiMasuk/index.php";
        break;
    case 'koreksiKeluar':
        $aktif = "Koreksi Keluar";
        $judul = "Modul Koreksi Persediaan Keluar";
        include "modul/koreksiKeluar/index.php";
        break;

    case 'updatestock':
        $aktif = "Update Stock";
        $judul = "Barang Stok";
        include "modul/updatestock/index.php";
        break;
}
?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Selamat Datang!',
            html: '<?php echo $_SESSION['namainv2'] . " (Petugas)"; ?>',
            icon: 'success',
            timer: 2500,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>
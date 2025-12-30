<?php
session_start();
include_once "sesi_admin.php";
$modul = (isset($_GET['m'])) ? $_GET['m'] : "awal";
$jawal = "Sistem Inventory Gudang";
switch ($modul) {
    case 'awal':
    default:
        $aktif = "Beranda";
        $judul = "$jawal";
        include "awal.php";
        break;
    case 'admin':
        $aktif = "Admin";
        $judul = "Admin";
        include "modul/admin/index.php";
        break;
    case 'petugas':
        $aktif = "Petugas";
        $judul = "Petugas Gudang";
        include "modul/petugas/index.php";
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
    case 'rak':
        $aktif = "Rak";
        $judul = "Rak Penyimpanan";
        include "modul/rak/index.php";
        break;
    case 'kondisi':
        $aktif = "Kondisi";
        $judul = "Kondisi Barang";
        include "modul/kondisi/index.php";
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

    case 'saldoawal':
        $aktif = "Saldo Awal";
        $judul = "Saldo Awal";
        include "modul/saldoawal/index.php";
        break;

}

if (isset($_GET['status']) && $_GET['status'] === 'success' && isset($_SESSION['namainv'])) {
    $nama = $_SESSION['namainv'];
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          title: 'Selamat Datang!',
          text: 'Halo, $nama',
          icon: 'success',
          confirmButtonText: 'OK'
        });
      });
    </script>
    ";
}

?>
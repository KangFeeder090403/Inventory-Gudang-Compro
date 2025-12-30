<?php

date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
$jamSekarang = date("h:i a");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Stok Awal</title>

  <!-- boootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

  <!-- icon dan fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- tema css -->
  <link href="../css/tampilanadmin.css" rel="stylesheet">

</head>

<body>
  <!-- Menu -->
  <div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
          <img src="coba1.jpg" alt="Logo" style="height:35px; margin-right:10px;">
          <a class="navbar-brand">Sistem Inventory Gudang</a>
      </div>
      <?php
      $kode_brg = $_GET['kode_brg'];
      $tanggal = $_GET['tanggal'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_saldoawal WHERE kode_brg = '$kode_brg' AND tanggal = '$tanggal'";
      $query = mysqli_query($koneksi, $sql);
      $r = mysqli_fetch_array($query);

      ?>
      <ul class="nav navbar-top-links navbar-right">

      </ul>

      <!-- menu samping -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="?m=awal.php">
                <i class="fa fa-home"></i> Beranda
              </a>
            </li>

            <li>
              <a href="?m=admin&s=awal">
                <i class="fa fa-user-secret"></i> Admin
              </a>
            </li>

            <li>
              <a href="?m=petugas&s=awal">
                <i class="fa fa-user"></i> Petugas Gudang
              </a>
            </li>

            <li>
              <a href="?m=customer&s=awal">
                <i class="fa fa-users"></i> Customer
              </a>
            </li>

            <li>
              <a href="?m=supplier&s=awal">
                <i class="fa fa-building"></i> Supplier
              </a>
            </li>

            <li>
              <a href="?m=rak&s=awal">
                <i class="fa fa-cubes"></i> Rak Penyimpanan
              </a>
            </li>

            <li>
              <a href="?m=kondisi&s=awal">
                <i class="fa fa-check-square"></i> Kondisi Barang
              </a>
            </li>

            <li>
              <a href="?m=barang&s=awal">
                <i class="fa fa-archive"></i> Data Barang
              </a>
            </li>

            <li>
              <a href="?m=barangMasuk&s=awal">
                <i class="fa fa-download"></i> Input Barang Masuk
              </a>
            </li>

            <li>
              <a href="?m=barangKeluar&s=awal">
                <i class="fa fa-upload"></i> Input Barang Keluar
              </a>
            </li>

            <li>
              <a href="?m=koreksiMasuk&s=awal">
                <i class="fa fa-plus-square"></i> Return (Awal)
              </a>
            </li>

            <li>
              <a href="?m=koreksiKeluar&s=awal">
                <i class="fa fa-minus-square"></i> Return (Akhir)
              </a>
            </li>

            <li>
              <a href="?m=updatestock&s=awal">
                <i class="fa fa-dropbox"></i> Update Stok
              </a>
            </li>

            <li>
              <a href="?m=saldoawal&s=awal">
                <i class="fa fa-archive"></i> Stok Awal
              </a>
            </li>
            
            <li>
              <a href="logout.php" onclick="return confirm('yakin ingin logout?')">
                <i class="fa fa-warning"></i> Logout
              </a>
            </li>
          </ul>
        </div>
      </div>

    </nav>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Edit Stok Awal</h1>
        </div>
      </div>

      <div class="row">

        <form action="?m=saldoawal&s=update" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="kode_brg_lama" value="<?php echo $r['kode_brg']; ?>">
          <input type="hidden" name="tanggal_lama" value="<?php echo $r['tanggal']; ?>">
          
          <div class="form-group">
            <label for="kode_brg">Kode Barang</label>
            <input type="text" class="form-control" id="kode_brg" name="kode_brg"
              value="<?php echo $r['kode_brg']; ?>" readonly>
            <small class="form-text text-muted">Kode barang tidak dapat diubah</small>
          </div>
          
          <div class="form-group">
            <label for="nama_brg">Nama Barang</label>
            <input type="text" class="form-control" value="<?php echo $r['nama_brg']; ?>" id="nama_brg"
              name="nama_brg" readonly>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" value="<?php echo $r['tanggal']; ?>" id="tanggal"
              name="tanggal" required>
            <small class="form-text text-muted">Masukkan Tanggal</small>
          </div>

          <div class="form-group">
            <label for="saldoawal">Stok Awal</label>
            <input type="number" class="form-control" value="<?php echo $r['saldoawal']; ?>" id="saldoawal"
              name="saldoawal" placeholder="Masukkan Stok Awal" required>
            <small class="form-text text-muted">Masukkan Stok Awal</small>
          </div>

          <div class="form-group">
            <label for="rak">Rak Penyimpanan</label>
            <?php
            $sql_rak = "SELECT * FROM tb_rak ORDER BY kode_rak ASC";
            $hasil_rak = mysqli_query($koneksi, $sql_rak);

            echo '<select name="rak" class="form-control" required>';
            echo '<option value="">--- PILIH ---</option>';

            while ($data_rak = mysqli_fetch_array($hasil_rak)) {
              $selected = ($data_rak['nama_rak'] == $r['rak']) ? 'selected' : '';
              echo '<option value="' . $data_rak['nama_rak'] . '" ' . $selected . '>' . $data_rak['kode_rak'] . ' | ' . $data_rak['nama_rak'] . '</option>';
            }

            echo '</select>';
            ?>
            <small class="form-text text-muted">Pilih Rak Penyimpanan</small>
          </div>

          <div class="form-group text-right">
            <a href="?m=saldoawal&s=awal" class="btn btn-secondary">Close</a>
            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="../vendor/css/js/bootstrap.min.js"></script>

  <!-- Script untuk active menu -->
  <script src="../js/active-menu.js"></script>

</body>

</html>

<?php
include '../koneksi.php';
if (!isset($_SESSION["idinv"])) {
  header("Location: login.php");
  exit();
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $judul; ?></title>

  <!-- boootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

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
      $id = $_SESSION['idinv'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_admin WHERE kode_admin = '$id'";
      $query = mysqli_query($koneksi, $sql);
      $r = mysqli_fetch_array($query);

      ?>
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo $r['nama']; ?>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <form class="" action="logout.php" onclick="return confirm('Yakin Ingin Logout?');" method="post">
                <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i>
                  Logout</button>
              </form>
            </li>
          </ul>
        </li>
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
              <a href="logout.php" onclick="return confirm('Yakin Ingin Logout?')">
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
          <h1 class="page-header">Selamat Datang, <?php echo $r['nama']; ?></h1>
        </div>
      </div>

      <div class="row">

        <!-- 1. Master Admin -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-users fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_admin) AS jml FROM tb_admin";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Admin</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=admin&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 2. Master Petugas -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-success panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-user fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_petugas) AS jml FROM tb_petugas";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Petugas Gudang</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=petugas&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 3. Master Customer -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-warning panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-building fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_cus) AS jml FROM tb_cus";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Customer</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=customer&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 4. Master Supplier -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-danger panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-truck fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_sup) AS jml FROM tb_sup";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Supplier</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=supplier&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 5. Data Rak -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-primary panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-archive fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_rak) AS jml FROM tb_rak";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Rak Penyimpanan</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=rak&s=awal">View Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- 6. Kondisi Barang -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-default panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-check-circle fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_kondisi) AS jml FROM tb_kondisi";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Kondisi Barang</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=kondisi&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 7. Master Barang -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-cubes fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_brg) AS jml FROM tb_barang";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Data Barang</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=barang&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 8. Transaksi Barang In -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-success panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-download fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_transaksi) AS jml FROM tb_barang_in";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Input Barang Masuk</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=barangMasuk&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 9. Transaksi Barang Out -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-danger panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-upload fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_transaksi) AS jml FROM tb_barang_out";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Input Barang Keluar</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=barangKeluar&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 10. Transaksi Koreksi Masuk -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-warning panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-edit fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_transaksi) AS jml FROM tb_koreksi_in";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Return (Awal)</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=koreksiMasuk&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

        <!-- 11. Transaksi Koreksi Keluar -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-primary panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-edit fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(kode_transaksi) AS jml FROM tb_koreksi_out";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Return (Akhir)</div>
                </div>
              </div>
            </div>
            <div class="panel-footer"><a href="?m=koreksiKeluar&s=awal">View Details <i
                  class="fa fa-arrow-circle-right"></i></a></div>
          </div>
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-primary panel-dashboard">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4"><i class="fa fa-dropbox fa-3x"></i></div>
                <div class="col-xs-8 text-right">
                  <?php
                  $sql = "SELECT COUNT(DISTINCT kode_brg) AS jml FROM tb_kartu";
                  $q = mysqli_query($koneksi, $sql);
                  $r = mysqli_fetch_assoc($q);
                  echo "<h4>{$r['jml']}</h4>";
                  ?>
                  <div>Update Stock</div>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <a href="?m=updatestock&s=awal">
                View Details <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>


        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!--include-->
        <script src="../vendor/css/js/bootstrap.min.js"></script>

</body>

</html>
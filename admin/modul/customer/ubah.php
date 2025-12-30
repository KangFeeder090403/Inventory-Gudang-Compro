<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Customer</title>

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
      $id = $_GET['kode_cus'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_cus WHERE kode_cus = '$id'";
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
              <a href="logout.php" onclick="return confirm('Yakin Ingin Logout?')">
                <i class="fa fa-warning"></i> Logout
              </a>
            </li>

          </ul>
        </div>
      </div>

    </nav>

    <form action="?m=customer&s=update" method="POST" enctype="multipart/form-data">
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Edit Customer</h1>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Kode Customer</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="kode_cus"
            value="<?php echo $r['kode_cus']; ?>" aria-describedby="emailHelp" placeholder="Masukkan Kode Customer">

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Customer</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="nama_cus"
            value="<?php echo $r['nama_cus']; ?>" aria-describedby="emailHelp" placeholder="Masukkan Nama Customer">
          <small id="emailHelp" class="form-text text-muted">Masukkan Nama Customer</small>
        </div>
        <div class="form-group">
          <label>Email Customer</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="email_cus" aria-describedby="emailHelp"
            placeholder="Masukkan Email Customer" value="<?php echo $r['email_cus']; ?>">
          <small class="form-text text-muted">Masukkan Email Customer</small>
        </div>
        <div class="form-group">
          <label>Alamat Customer</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $r['alamat_cus']; ?>"
            name="alamat_cus" placeholder="Masukkan Alamat Customer">
          <small id="emailHelp" class="form-text text-muted">Masukkan Alamat Customer</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Kontak Customer</label>
          <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $r['cp_cus']; ?>"
            name="cp_cus" aria-describedby="emailHelp" placeholder="Masukkan Kontak Customer">
          <small id="emailHelp" class="form-text text-muted">Masukkan Kontak Customer</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telepon Customer</label>
          <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $r['telepon_cus']; ?>"
            name="telepon_cus" aria-describedby="emailHelp" placeholder="Masukkan Telepon Customer">
          <small id="emailHelp" class="form-text text-muted">Masukkan Telepon Customer</small>
        </div>

        <div class="form-group text-right">
          <a href="?m=customer&s=awal" class="btn btn-secondary">Close</a>
          <button type="submit" name="simpan" class="btn btn-primary">Save</button>
        </div>

    </form>


  </div>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="../vendor/css/js/bootstrap.min.js"></script>

  <!-- Script untuk active menu -->
  <script src="../js/active-menu.js"></script>

</body>

</html>
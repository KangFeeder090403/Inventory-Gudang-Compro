<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Master Petugas</title>

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
        <a class="navbar-brand">PT Graha Sarana Gresik</a>
      </div>
      <?php
      $id = $_GET['kode_petugas'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_petugas WHERE kode_petugas = '$id'";
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
                <i class="fa fa-user-secret"></i> Master Admin
              </a>
            </li>

            <li>
              <a href="?m=petugas&s=awal">
                <i class="fa fa-user"></i> Master Petugas
              </a>
            </li>

            <li>
              <a href="?m=customer&s=awal">
                <i class="fa fa-users"></i> Master Customer
              </a>
            </li>

            <li>
              <a href="?m=supplier&s=awal">
                <i class="fa fa-building"></i> Master Supplier
              </a>
            </li>

            <li>
              <a href="?m=rak&s=awal">
                <i class="fa fa-cubes"></i> Data Rak
              </a>
            </li>

            <li>
              <a href="?m=kondisi&s=awal">
                <i class="fa fa-check-square"></i> Kondisi Barang
              </a>
            </li>

            <li>
              <a href="?m=barang&s=awal">
                <i class="fa fa-archive"></i> Master Barang
              </a>
            </li>

            <li>
              <a href="?m=barangMasuk&s=awal">
                <i class="fa fa-download"></i> Transaksi Barang Masuk
              </a>
            </li>

            <li>
              <a href="?m=barangKeluar&s=awal">
                <i class="fa fa-upload"></i> Transaksi Barang Keluar
              </a>
            </li>

            <li>
              <a href="?m=koreksiMasuk&s=awal">
                <i class="fa fa-plus-square"></i> Transaksi Koreksi Persediaan Masuk
              </a>
            </li>

            <li>
              <a href="?m=koreksiKeluar&s=awal">
                <i class="fa fa-minus-square"></i> Transaksi Koreksi Persediaan Keluar
              </a>
            </li>

            <li>
              <a href="?m=updatestock&s=awal">
                <i class="fa fa-dropbox"></i> Update Stock
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
          <h1 class="page-header">Edit Master Petugas</h1>
        </div>
      </div>

      <div class="row">

        <input type="hidden" value="<?php echo $r['kode_petugas']; ?>" name="kode_petugas">
        <form action="?m=petugas&s=update" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Petugas</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="kode_petugas"
              value="<?php echo $r['kode_petugas']; ?>" aria-describedby="emailHelp"
              placeholder="Masukkan Kode Petugas">

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" value="<?php echo $r['nama']; ?>" id="exampleInputEmail1"
              name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama">

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Job</label>
            <input type="text" class="form-control" value="<?php echo $r['job']; ?>" id="exampleInputEmail1" name="job"
              aria-describedby="emailHelp" placeholder="Masukkan Job">

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username"
              value="<?php echo $r['username']; ?>" aria-describedby="emailHelp" placeholder="Masukkan Username">

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="password"
              aria-describedby="emailHelp" placeholder="Masukkan Password">

          </div>

          <div class="form-group">
            <label for="otorisasi">Otorisasi</label><br>
            <?php
            include '../koneksi.php';

            // ambil data otorisasi dari tabel
            $sql = "SELECT * FROM tb_acc_petugas ORDER BY kode_acc ASC";
            $hasil = mysqli_query($koneksi, $sql);

            // ubah string otorisasi dari DB jadi array
            $otorisasi_terpilih = explode(',', $r['otorisasi']);

            while ($data = mysqli_fetch_array($hasil)) {
              $checked = in_array($data['kode_acc'], $otorisasi_terpilih) ? 'checked' : '';
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="otorisasi[]"
                  value="<?php echo $data['kode_acc']; ?>" id="acc_<?php echo $data['kode_acc']; ?>" <?php echo $checked; ?>>
                <label class="form-check-label" for="acc_<?php echo $data['kode_acc']; ?>">
                  <?php echo $data['kode_acc'] . ' | ' . $data['nama_acc']; ?>
                </label>
              </div>
            <?php } ?>
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Telepon</label>
            <input type="text" class="form-control" value="<?php echo $r['telepon']; ?>" id="exampleInputEmail1"
              name="telepon" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon">

            <small id="emailHelp" class="form-text text-muted"></small>
          </div>


          <div class="form-group text-right">
            <a href="?m=petugas&s=awal" class="btn btn-secondary">Close</a>
            <button type="submit" name="simpan" class="btn btn-primary">Save</button>
          </div>


        </form>

      </div>

      <!-- jQuery -->
      <script src="../vendor/jquery/jquery.min.js"></script>

      <!--include-->
      <script src="../vendor/css/js/bootstrap.min.js"></script>

</body>

</html>
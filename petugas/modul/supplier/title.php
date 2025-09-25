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
          <img src="logo.jpg" alt="Logo" style="height:35px; margin-right:10px;">
        <a class="navbar-brand">PT Graha Sarana Gresik</a>
      </div>
      <?php
      $id = $_SESSION['idinv2'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_petugas WHERE kode_petugas = '$id'";
      $query = mysqli_query($koneksi, $sql);
      $r = mysqli_fetch_array($query);

      ?>
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            </i> <?php echo $r['nama']; ?>
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

            <?php if (in_array("AC-01", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=customer&s=awal">
                  <i class="fa fa-users"></i> Master Customer
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-02", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=supplier&s=awal">
                  <i class="fa fa-building"></i> Master Supplier
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-03", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=barang&s=awal">
                  <i class="fa fa-archive"></i> Master Barang
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-04", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=barangMasuk&s=awal">
                  <i class="fa fa-download"></i> Transaksi Barang Masuk
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-05", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=barangKeluar&s=awal">
                  <i class="fa fa-upload"></i> Transaksi Barang Keluar
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-06", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=koreksiMasuk&s=awal">
                  <i class="fa fa-plus-square"></i> Transaksi Koreksi Persediaan Masuk
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-07", $_SESSION['otorisasi'])) { ?>
              <li>
                <a href="?m=koreksiKeluar&s=awal">
                  <i class="fa fa-minus-square"></i> Transaksi Koreksi Persediaan Keluar
                </a>
              </li>
            <?php } ?>

            <?php if (in_array("AC-08", $_SESSION['otorisasi'])) { ?>
              <li>
              <a href="?m=updatestock&s=awal">
                <i class="fa fa-dropbox"></i> Update Stock
              </a>
            </li>
            <?php } ?>

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
          <h1 class="page-header">Master Supplier</h1>
        </div>
      </div>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Data
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="?m=supplier&s=simpan" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Supplier</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="kode_sup" maxlength="15"
                    aria-describedby="emailHelp" placeholder="Masukkan Kode Supplier">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Kode Supplier</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Supplier</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama_sup"
                    aria-describedby="emailHelp" placeholder="Masukkan Nama Supplier">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Nama Supplier</small>
                </div>
                <div class="form-group">
                  <label>Email Supplier</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="email_sup"
                    aria-describedby="emailHelp" placeholder="Masukkan Email Supplier">
                  <small class="form-text text-muted">Masukkan Email Supplier</small>
                </div>
                <div class="form-group">
                  <label>Alamat Supplier</label>
                  <textarea class="form-control" aria-describedby="emailHelp" name="alamat_sup"
                    placeholder="Masukkan Alamat Supplier"></textarea>
                  <small id="emailHelp" class="form-text text-muted">Masukkan Alamat Supplier</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Person</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="cp_sup"
                    aria-describedby="emailHelp" placeholder="Masukkan Contact Person">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Contact Person</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon Supplier</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="telepon_sup"
                    aria-describedby="emailHelp" placeholder="Masukkan Telepon Supplier">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Telepon Supplier</small>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="simpan" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <center>
          <form action="" method="POST">
            <label>Cari Supplier (Kode / Nama)</label>
            <input type="text" name="cari_supplier">
            <button type="submit" name="go_supplier" class="btn btn-success">Cari</button>
          </form>
        </center>
      </div>

      <div class="row">

        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>

                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Alamat Email Supplier</th>
                <th>Contact Person</th>
                <th>No. Hp</th>

                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>

              <?php

              include 'paging.php';

              ?>
            </tbody>
          </table>

          <center>
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                  echo "href='?m=supplier&s=awal&halaman=$previous'";
                } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link"
                    href="?m=supplier&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                  echo "href='?m=supplier&s=awal&halaman=$next'";
                } ?>>Next</a>
              </li>
            </ul>
          </center>
        </div>
      </div>


    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="../vendor/css/js/bootstrap.min.js"></script>

</body>

</html>
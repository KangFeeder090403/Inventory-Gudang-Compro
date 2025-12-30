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

  <!-- print css -->
  <link href="../css/print.css" rel="stylesheet" media="print">

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
          <h1 class="page-header">Petugas Gudang</h1>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Petugas Gudang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="?m=petugas&s=simpan" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Petugas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="kode_petugas" maxlength="15"
                    aria-describedby="emailHelp" placeholder="Masukkan Kode Petugas">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Kode Petugas</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Petugas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                    aria-describedby="emailHelp" placeholder="Masukkan Nama Petugas">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Nama Petugas</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jabatan</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="job"
                    aria-describedby="emailHelp" placeholder="Masukkan Job Disk Petugas">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Jabatan Petugas</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                    aria-describedby="emailHelp" placeholder="Masukkan Username">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Username</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                    aria-describedby="emailHelp" placeholder="Masukkan Password">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Password</small>
                </div>
                <div class="form-group">
                  <label for="otorisasi">Hak Akses</label><br>
                  <?php
                  include '../koneksi.php';

                  // ambil data otorisasi dari tabel
                  $sql = "SELECT * FROM tb_acc_petugas ORDER BY kode_acc ASC";
                  $hasil = mysqli_query($koneksi, $sql);

                  while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="otorisasi[]"
                        value="<?php echo $data['kode_acc']; ?>" id="acc_<?php echo $data['kode_acc']; ?>">
                      <label class="form-check-label" for="acc_<?php echo $data['kode_acc']; ?>">
                        <?php echo $data['kode_acc'] . ' | ' . $data['nama_acc']; ?>
                      </label>
                    </div>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon Petugas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="telepon"
                    aria-describedby="emailHelp" placeholder="Masukkan Telepon Petugas">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Telepon Petugas</small>
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

        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>

                <th>Kode</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Hak Akses</th>
                <th>Telepon</th>


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
                  echo "href='?m=petugas&s=awal&halaman=$previous'";
                } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link"
                    href="?m=petugas&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                  echo "href='?m=petugas&s=awal&halaman=$next'";
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

  <!-- Script untuk active menu -->
  <script src="../js/active-menu.js"></script>
  
  <!-- Fallback script -->
  <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#side-menu a[href*="petugas"]').addClass('active');
        }, 100);
    });
  </script>

</body>

</html>
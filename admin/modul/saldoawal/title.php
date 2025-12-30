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
          <h1 class="page-header">Stok Awal</h1>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Stok Awal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="?m=saldoawal&s=simpan" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="kode_brg">Kode Barang</label>
                  <?php
                  include("../koneksi.php");
                  // tambahin ORDER BY supaya kode barang urut
                  $queryBarang = "SELECT * FROM tb_barang ORDER BY kode_brg ASC";
                  $resultBarang = mysqli_query($koneksi, $queryBarang);

                  $jsBarang = "var prdBarang = {};\n";

                  echo '<select name="kode_brg" onchange="changeBarang(this.value)" class="form-control">';
                  echo '<option value="">--- PILIH ---</option>';

                  while ($row = mysqli_fetch_array($resultBarang)) {
                    echo '<option value="' . $row['kode_brg'] . '">' . $row['kode_brg'] . ' | ' . $row['nama_brg'] . '</option>';
                    $jsBarang .= "prdBarang['" . $row['kode_brg'] . "'] = {
                        nama_brg:'" . addslashes($row['nama_brg']) . "',
                        satuan:'" . addslashes($row['satuan']) . "',
                        isi_satuan:'" . addslashes($row['isi_satuan']) . "'
                    };\n";
                  }
                  echo '</select>';
                  ?>
                  <script type="text/javascript">
                    <?php echo $jsBarang; ?>
                    function changeBarang(id) {
                      document.getElementById('prd_nmbrg').value = prdBarang[id].nama_brg;
                      document.getElementById('prd_satuan').value = prdBarang[id].satuan;
                      document.getElementById('prd_isi_satuan').value = prdBarang[id].isi_satuan;
                    }
                  </script>
                </div>


                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_brg" readonly id="prd_nmbrg" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" class="form-control" value="<?php echo $tanggalSekarang; ?>"
                    id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Stok Awal</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="saldoawal"
                    aria-describedby="emailHelp" placeholder="Masukkan Stok Awal">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Stok Awal</small>
                </div>
                <div class="form-group">
                  <label for="rak">Rak</label>
                  <?php
                  include '../koneksi.php';
                  // tambahin ORDER BY biar urut kecil -> besar
                  $sql = "SELECT * FROM tb_rak ORDER BY kode_rak ASC";
                  $hasil = mysqli_query($koneksi, $sql);

                  // buat array JS dari PHP
                  $jsRak = "var prdRak = {};\n";

                  echo '<select name="rak" onchange="changeRak(this.value)" class="form-control">';
                  echo '<option value="">--- PILIH ---</option>';

                  while ($data = mysqli_fetch_array($hasil)) {
                    // simpan nama_rak di value agar yang tersimpan adalah nama, bukan kode
                    echo '<option value="' . $data['nama_rak'] . '">' . $data['kode_rak'] . ' | ' . $data['nama_rak'] . '</option>';
                    $jsRak .= "prdRak['" . $data['kode_rak'] . "'] = {
                        nama_rak:'" . addslashes($data['nama_rak']) . "',
                        lokasi:'" . addslashes($data['lokasi']) . "',
                        kapasitas:'" . addslashes($data['kapasitas']) . "'
                    };\n";
                  }

                  echo '</select>';
                  ?>
                  <script type="text/javascript">
                    <?php echo $jsRak; ?>
                    function changeRak(id) {
                      // jika value pakai nama_rak, maka cukup set manual
                      document.getElementById('prd_nmrak').value = id;
                      // tetap ambil data lain (lokasi & kapasitas) dari array jsRak
                      // tapi akses pakai kode_rak (key)
                      for (let kode in prdRak) {
                        if (prdRak[kode].nama_rak === id) {
                          document.getElementById('prd_lokasi').value = prdRak[kode].lokasi;
                          document.getElementById('prd_kapasitas').value = prdRak[kode].kapasitas;
                        }
                      }
                    }
                  </script>
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
            <label>Cari Stok Awal (Kode / Nama)</label>
            <input type="text" name="cari">
            <button type="submit" name="go" class="btn btn-success">Cari</button>
          </form>
        </center>
      </div>

      <div class="row">


        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>

                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Stok Awal</th>
                <th>Rak Penyimpanan</th>
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
                  echo "href='?m=saldoawal&s=awal&halaman=$previous'";
                } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link"
                    href="?m=saldoawal&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                  echo "href='?m=saldoawal&s=awal&halaman=$next'";
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
            $('#side-menu a[href*="saldoawal"]').addClass('active');
        }, 100);
    });
  </script>

</body>

</html>
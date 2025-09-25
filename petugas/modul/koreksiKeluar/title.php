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
  <title>Transaksi Koreksi Barang Keluar</title>

  <!-- boootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

  <!-- icon dan fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- tema css -->
  <link href="../css/tampilanadmin.css" rel="stylesheet">

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
          <h1 class="page-header">Transaksi Koreksi Barang Keluar</h1>
        </div>
      </div>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Data
      </button>

      <!-- Tombol Print PDF -->
      <button onclick="window.print()" class="btn btn-danger no-print">
        <i class="fa fa-file-pdf-o"></i> Print PDF
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Transaksi Koreksi Barang Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="?m=koreksiKeluar&s=simpan" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="kode_transaksi">Kode Transaksi</label>
                  <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control"
                    placeholder="Masukkan Kode Transaksi Koreksi Barang Keluar" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" class="form-control" value="<?php echo $tanggalSekarang; ?>"
                    id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
                </div>

                <div class="form-group">
                  <label for="typeSelect">Type</label>
                  <select class="form-control" name="type" id="typeSelect" required>
                    <option value="">--- PILIH ---</option>
                    <?php
                    include '../koneksi.php';

                    $sql = "SELECT * FROM tb_type ORDER BY kode_type ASC";
                    $hasil = mysqli_query($koneksi, $sql);

                    if (!$hasil) {
                      die("Query error: " . mysqli_error($koneksi));
                    }

                    while ($data = mysqli_fetch_assoc($hasil)) {
                      $kode_type = htmlspecialchars($data['kode_type']);
                      $nama_type = htmlspecialchars($data['nama_type']);
                      echo "<option value='$kode_type'>{$kode_type} | {$nama_type}</option>";
                    }
                    ?>
                  </select>
                </div>

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
                  <label>Satuan</label>
                  <input type="text" name="satuan" readonly id="prd_satuan" class="form-control">
                </div>

                <div class="form-group">
                  <label>Isi Satuan</label>
                  <input type="text" name="isi_satuan" readonly id="prd_isi_satuan" class="form-control">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Keluar</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="keluar"
                    aria-describedby="emailHelp" placeholder="Masukkan Keluar">
                  <small id="emailHelp" class="form-text text-muted">Masukkan Keluar</small>
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

                <div class="form-group">
                  <label for="exampleInputEmail1">Kondisi Barang</label>
                  <select class="form-control" name="kondisi" required="">
                    <option value="">--- PILIH ---</option> <!-- Tambahan opsi default -->
                    <?php
                    include '../koneksi.php';

                    // tambahin ORDER BY supaya urut
                    $sql = "SELECT * FROM tb_kondisi ORDER BY kode_kondisi ASC";
                    $hasil = mysqli_query($koneksi, $sql);

                    while ($data = mysqli_fetch_array($hasil)) {
                      ?>
                      <option value="<?php echo $data['nama_kondisi']; ?>">
                        <?php echo $data['kode_kondisi'] . ' | ' . $data['nama_kondisi']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="kode_sup">Kode Supplier</label>
                  <?php
                  // tambahkan ORDER BY biar urut
                  $querySup = "SELECT * FROM tb_sup ORDER BY kode_sup ASC";
                  $resultSup = mysqli_query($koneksi, $querySup);

                  $jsSupplier = "var prdSupplier = {};\n";

                  echo '<select name="kode_sup" onchange="changeSupplier(this.value)" class="form-control">';
                  echo '<option value="">--- PILIH ---</option>';

                  while ($row = mysqli_fetch_array($resultSup)) {
                    echo '<option value="' . $row['kode_sup'] . '">' . $row['kode_sup'] . ' | ' . $row['nama_sup'] . '</option>';
                    $jsSupplier .= "prdSupplier['" . $row['kode_sup'] . "'] = {
                        nama_sup:'" . addslashes($row['nama_sup']) . "'
                    };\n";
                  }
                  echo '</select>';
                  ?>
                  <script type="text/javascript">
                    <?php echo $jsSupplier; ?>
                    function changeSupplier(id) {
                      document.getElementById('prd_sup').value = prdSupplier[id].nama_sup;
                    }
                  </script>
                </div>


                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" name="nama_sup" readonly id="prd_sup" class="form-control">
                </div>



                <div class="form-group">
                  <label for="petugas">Petugas</label>
                  <?php
                  include '../koneksi.php';

                  // tambahkan ORDER BY biar kode urut kecil -> besar
                  $sql = "SELECT * FROM tb_petugas ORDER BY kode_petugas ASC";
                  $hasil = mysqli_query($koneksi, $sql);

                  $jsPetugas = "var prdPetugas = {};\n";

                  echo '<select name="petugas" onchange="changePetugas(this.value)" class="form-control">';
                  echo '<option value="">--- PILIH ---</option>';

                  while ($data = mysqli_fetch_array($hasil)) {
                    echo '<option value="' . $data['nama'] . '">' . $data['kode_petugas'] . ' | ' . $data['nama'] . '</option>';
                    $jsPetugas .= "prdPetugas['" . $data['kode_petugas'] . "'] = {
                        nama:'" . addslashes($data['nama']) . "'
                    };\n";
                  }

                  echo '</select>';
                  ?>
                  <script type="text/javascript">
                    <?php echo $jsPetugas; ?>
                    function changePetugas(id) {
                      document.getElementById('prd_petugas').value = prdPetugas[id].nama;
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
            <label>Cari Koreksi Keluar (Kode / Nama)</label>
            <input type="text" name="cari_koreksiKeluar">
            <button type="submit" name="go_koreksiKeluar" class="btn btn-success">Cari</button>
          </form>
        </center>
      </div>

      <div class="row">


        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>

                <th>Kode Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Isi Satuan</th>
                <th>Keluar</th>
                <th>Rak</th>
                <th>Kondisi Brg</th>
                <th>Kode Supplier</th>
                <th>Supplier</th>
                <th>Petugas</th>



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
                  echo "href='?m=koreksiKeluar&s=awal&halaman=$previous'";
                } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link"
                    href="?m=koreksiKeluar&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                  echo "href='?m=koreksiKeluar&s=awal&halaman=$next'";
                } ?>>Next</a>
              </li>
            </ul>
          </center>


        </div>
      </div>


    </div>
  </div>

  <!-- Logo khusus print -->
  <img src="logo.jpg" class="print-logo" alt="Logo">

  <style>
    @media print {

      /* Logo hanya muncul di print */
      .print-logo {
        position: fixed;
        top: 15px;
        right: 20px;
        width: 100px;
        height: auto;
        display: block;
      }
    }

    @media screen {
      .print-logo {
        display: none;
      }
    }
  </style>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="../vendor/css/js/bootstrap.min.js"></script>

</body>

</html>
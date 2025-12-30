<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Barang Keluar</title>

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
      $id = $_GET['kode_transaksi'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_barang_out WHERE kode_transaksi = '$id'";
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

    <form action="?m=barangKeluar&s=update" method="POST" enctype="multipart/form-data">
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Edit Barang Keluar</h1>
          </div>
        </div>

        <div class="form-group">
    <label for="kode_transaksi">Kode Transaksi</label>
    <input type="text" name="kode_transaksi" id="kode_transaksi" 
           class="form-control" 
           value="<?php echo $r['kode_transaksi']; ?>">
</div>

  <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" class="form-control" 
           value="<?php echo $r['tanggal']; ?>">
  </div>

  <div class="form-group">
    <label for="typeSelect">Type</label>
    <select class="form-control" name="type" id="typeSelect" required>
      <option value="">--- PILIH ---</option>
      <?php
      $sql = "SELECT * FROM tb_type ORDER BY kode_type ASC";
      $hasil = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($hasil)) {
        $selected = ($r['type'] == $data['kode_type']) ? "selected" : "";
        echo "<option value='{$data['kode_type']}' $selected>{$data['kode_type']} | {$data['nama_type']}</option>";
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

  echo '<select name="kode_brg" id="kode_brg" onchange="changeBarang(this.value)" class="form-control">';
  echo '<option value="">--- PILIH ---</option>';

  while ($row = mysqli_fetch_array($resultBarang)) {
    // kasih selected otomatis kalau sesuai data lama
    $selected = ($r['kode_brg'] == $row['kode_brg']) ? "selected" : "";
    echo '<option value="' . $row['kode_brg'] . '" ' . $selected . '>'
        . $row['kode_brg'] . ' | ' . $row['nama_brg'] . '</option>';
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
      if (id && prdBarang[id]) {
        document.getElementById('prd_nmbrg').value = prdBarang[id].nama_brg;
        document.getElementById('prd_satuan').value = prdBarang[id].satuan;
        document.getElementById('prd_isi_satuan').value = prdBarang[id].isi_satuan;
      } else {
        document.getElementById('prd_nmbrg').value = "";
        document.getElementById('prd_satuan').value = "";
        document.getElementById('prd_isi_satuan').value = "";
      }
    }

    // auto trigger pas halaman pertama kali dibuka
    window.addEventListener('load', function() {
      var val = document.getElementById('kode_brg').value;
      if (val !== "") changeBarang(val);
    });
  </script>
</div>

<div class="form-group">
  <label>Nama Barang</label>
  <input type="text" name="nama_brg" readonly id="prd_nmbrg"
         value="<?php echo $r['nama_brg']; ?>" class="form-control">
</div>

<div class="form-group">
  <label>Satuan</label>
  <input type="text" name="satuan" readonly id="prd_satuan"
         value="<?php echo $r['satuan']; ?>" class="form-control">
</div>

<div class="form-group">
  <label>Isi Satuan</label>
  <input type="text" name="isi_satuan" readonly id="prd_isi_satuan"
         value="<?php echo $r['isi_satuan']; ?>" class="form-control">
</div>


  <div class="form-group">
    <label for="keluar">Keluar</label>
    <input type="text" name="keluar" id="keluar" class="form-control" 
           value="<?php echo $r['keluar']; ?>">
  </div>

  <div class="form-group">
    <label for="rak">Rak</label>
    <select name="rak" class="form-control">
      <option value="">--- PILIH ---</option>
      <?php
      $sql = "SELECT * FROM tb_rak ORDER BY kode_rak ASC";
      $hasil = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($hasil)) {
        $selected = ($r['rak'] == $data['nama_rak']) ? "selected" : "";
        echo "<option value='{$data['nama_rak']}' $selected>{$data['kode_rak']} | {$data['nama_rak']}</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="kondisi">Kondisi Barang</label>
    <select name="kondisi" class="form-control">
      <option value="">--- PILIH ---</option>
      <?php
      $sql = "SELECT * FROM tb_kondisi ORDER BY kode_kondisi ASC";
      $hasil = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($hasil)) {
        $selected = ($r['kondisi'] == $data['nama_kondisi']) ? "selected" : "";
        echo "<option value='{$data['nama_kondisi']}' $selected>{$data['kode_kondisi']} | {$data['nama_kondisi']}</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
  <label for="kode_cus">Kode Customer</label>
  <?php
  // tambahkan ORDER BY biar urut
  $querySup = "SELECT * FROM tb_cus ORDER BY kode_cus ASC";
  $resultSup = mysqli_query($koneksi, $querySup);

  $jsSupplier = "var prdCustomer = {};\n";

  echo '<select name="kode_cus" id="kode_cus" onchange="changeSupplier(this.value)" class="form-control">';
  echo '<option value="">--- PILIH ---</option>';

  while ($row = mysqli_fetch_array($resultSup)) {
    // otomatis terpilih kalau sama dengan data lama
    $selected = ($r['kode_customer'] == $row['kode_cus']) ? "selected" : "";
    echo '<option value="' . $row['kode_cus'] . '" ' . $selected . '>'
        . $row['kode_cus'] . ' | ' . $row['nama_cus'] . '</option>';
    $jsSupplier .= "prdCustomer['" . $row['kode_cus'] . "'] = {
        nama_cus:'" . addslashes($row['nama_cus']) . "'
    };\n";
  }
  echo '</select>';
  ?>
  <script type="text/javascript">
    <?php echo $jsCustomer; ?>
    function changeCustomer(id) {
      if (id && prdCustomer[id]) {
        document.getElementById('prd_cus').value = prdCustomer[id].nama_cus;
      } else {
        document.getElementById('prd_cus').value = "";
      }
    }

    // auto set saat halaman dibuka
    window.addEventListener('load', function() {
      var val = document.getElementById('kode_cus').value;
      if (val !== "") changeCustomer(val);
    });
  </script>
</div>

<div class="form-group">
  <label>Nama Customer</label>
  <input type="text" name="nama_cus" readonly id="prd_cus"
         value="<?php echo $r['customer']; ?>" class="form-control">
</div>


  <div class="form-group">
    <label for="petugas">Petugas</label>
    <select name="petugas" class="form-control">
      <option value="">--- PILIH ---</option>
      <?php
      $sql = "SELECT * FROM tb_petugas ORDER BY kode_petugas ASC";
      $hasil = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($hasil)) {
        $selected = ($r['petugas'] == $data['nama']) ? "selected" : "";
        echo "<option value='{$data['nama']}' $selected>{$data['kode_petugas']} | {$data['nama']}</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="truck">Truck</label>
    <input type="text" name="truck" id="truck" 
           class="form-control" 
           value="<?php echo $r['truck']; ?>">
</div>

  <div class="form-group text-right">
    <a href="?m=barangKeluar&s=awal" class="btn btn-secondary">Close</a>
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
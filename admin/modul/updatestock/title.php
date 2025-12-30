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
                            <form class="" action="logout.php" onclick="return confirm('Yakin Ingin Logout?');"
                                method="post">
                                <button class="btn btn-default" type="submit" name="keluar"><i
                                        class="fa fa-sign-out"></i>
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
                            <a href="logout.php">
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
                    <h1 class="page-header">Update Stock</h1>
                </div>

            </div>



            <!-- Form Cari Tanggal -->
            <div class="row mt-3">
                <div class="col-md-8 offset-md-2">
                    <form action="" method="POST" class="d-flex justify-content-start align-items-center">

                        <button type="button" onclick="window.print()" class="btn btn-danger no-print">
                            <i class="fa fa-file-pdf-o"></i> Print PDF
                        </button>

                        <button type="button" onclick="exportToExcel('printArea', 'Update_Stock')"
                            class="btn btn-success no-print">
                            <i class="fa fa-file-excel-o"></i> Export Excel
                        </button>

                    </form>
                </div>
            </div>


            <div id="printArea">
                <!-- Header khusus untuk print -->
                <div class="print-header">
                    <div class="print-header-content">
                        <div class="print-header-left">
                            <h2 class="print-header-title">
                            <i class="fa fa-dropbox print-header-icon"></i>
                            LAPORAN UPDATE STOCK
                        </h2>
                    </div>
                </div>
            </div>                <div class="row">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok Awal</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Jumlah Keluar</th>
                                    <th>Saldo Akhir</th>
                                    <th>Rak Penyimpanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'paging.php'; ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                    <center>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='?m=updatestock&s=awal&halaman=$previous'";
                                } ?>>Previous</a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                                ?>
                                <li class="page-item"><a class="page-link"
                                        href="?m=updatestock&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                    echo "href='?m=updatestock&s=awal&halaman=$next'";
                                } ?>>Next</a>
         </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo khusus print -->
    <img src="coba1.jpg" class="print-logo" alt="Logo">

    <style>
        @media print {


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
    <script src="../vendor/css/js/bootstrap.min.js"></script>

    <script>
        function exportToExcel() {
            var header = "<html xmlns:x='urn:schemas-microsoft-com:office:excel'>" +
                "<head><meta charset='utf-8'></head><body>";


            header += "<h2 style='text-align:left;'>UPDATE STOCK</h2>";
            header += "<img src='coba1.jpg' style='width:100px; float:right; margin-bottom:10px;'>";

            var footer = "</body></html>";
            var table = document.getElementById("printArea").innerHTML;

            var sourceHTML = header + table + footer;
            var source = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'Update_Stock.xls';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }
    </script>

    <!-- Script untuk active menu -->
    <script src="../js/active-menu.js"></script>
    
    <!-- Fallback script -->
    <script>
      $(document).ready(function() {
          setTimeout(function() {
              $('#side-menu a[href*="updatestock"]').addClass('active');
          }, 100);
      });
    </script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- boootstrap -->
  <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

  <!-- icon dan fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- tema css -->
  <link href="css/tampilan.css" rel="stylesheet">
  <title>PT Graha Sarana Gresik</title>
</head>

<body>


  <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
          <img src="images/logo.jpg" alt="Logo" style="height:35px; margin-right:10px;">
          <span style="margin-left: 10px;">PT Graha Sarana Gresik</span>
        </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="page-scroll">
            <a href="index.php">Beranda</a>
          </li>
          <li class="page-scroll">
            <a href="#login">Masuk</a>
          </li>
          <li class="page-scroll">
            <a href="#tentang">Tentang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <style>
    body {
      margin: 0;
      padding-top: 80px;

    }

    #login {
      margin-top: 100px;

    }

    #myCarousel,
    #myCarousel .carousel-inner,
    #myCarousel .item,
    #myCarousel .item img {
      width: 100%;
      height: 100vh;
    }

    #myCarousel .item img {
      object-fit: cover;
    }


    body {
      margin: 0;
      padding-top: 50px;

    }

    .section-divider {
      border-top: 2px solid #ddd;
      margin: 50px auto;
      width: 60%;
    }

    .section-title {
      font-weight: bold;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .jumbotron {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }


    .login-section {
      background: linear-gradient(135deg, #007BFF, #00C9A7);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
      text-align: center;
      color: white;
    }


    .login-card {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      padding: 40px 20px;
      display: inline-block;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .section-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 30px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }


    .button-group {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }


    .btn-modern {
      font-size: 18px;
      font-weight: bold;
      padding: 15px 40px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      color: white;
    }

    .btn-admin {
      background: #007BFF;
    }

    .btn-admin:hover {
      background: #007BFF;
      transform: translateY(-3px);
    }

    .btn-petugas {
      background: #ffa502;
    }

    .btn-petugas:hover {
      background: #e67e22;
      transform: translateY(-3px);
    }
  </style>


  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="first-slide" src="images/gudang1.jpg" alt="First slide">
      </div>
      <div class="item">
        <img class="second-slide" src="images/gudang2.jpg" alt="Second slide">
      </div>
      <div class="item">
        <img class="third-slide" src="images/gudang3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="sr-only">Next</span>
    </a>
  </div>


  <section id="login" class="section-margin">
    <div class="login-section">
      <div class="login-card">
        <h1 class="section-title">Masuk Sebagai</h1>
        <div class="button-group">
          <a href="admin/login.php" target="_blank">
            <button class="btn-modern btn-admin">Admin</button>
          </a>
          <a href="petugas/login_petugas.php" target="_blank">
            <button class="btn-modern btn-petugas">Petugas</button>
          </a>
        </div>
      </div>
    </div>
  </section>




  <style>
    .login-btn {
      font-size: 18px;
      font-weight: bold;
      padding: 12px 30px;
      border-radius: 8px;
      transition: all 0.3s ease-in-out;
    }

    .login-btn:hover {
      transform: scale(1.1);
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
    }


    .login-btn:active {
      transform: scale(0.95);
    }
  </style>


  <div class="section-divider"></div>

  <section id="tentang" class="section-margin" style="margin-bottom: 100pt;">
    <div class="row content">
      <div class="col-lg-12 danger text-center zero-panel">
        <div class="col-lg-12 zero-panel-content">
          <div class="jumbotron">
            <h1 class="section-title">Website Inventory</h1><br>
            <p>Website aplikasi inventory barang di PT Graha Sarana Gresik merupakan sistem berbasis web yang digunakan
              perusahaan untuk mengelola persediaan barang secara terpusat dan terkomputerisasi. Website ini
              memungkinkan pencatatan serta pemantauan barang masuk dan keluar secara real-time sehingga mendukung
              kelancaran operasional perusahaan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="vendor/css/js/bootstrap.min.js"></script>
</body>

</html>
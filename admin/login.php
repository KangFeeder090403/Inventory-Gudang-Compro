<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin</title>

  <!-- Bootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #004aad, #007bff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
    }

    .login-card h3 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
      color: #004aad;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .input-group-addon {
      background: #f1f1f1;
      border: none;
    }

    .form-control {
      border-radius: 6px;
    }

    .btn-custom {
      border-radius: 6px;
      font-weight: 600;
      padding: 10px 0;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      transform: scale(1.05);
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      height: 60px;
    }
  </style>
</head>

<div class="login-card">
  <img src="logo.jpg" alt="Logo" class="logo">
  <h3>Login Admin</h3>

  <!-- Pesan error -->
  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center" style="padding:8px; border-radius:6px;">
      Username Atau Password Salah!
    </div>
  <?php endif; ?>

  <form action="pro_login_admin.php" method="post">
    <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-user"></i></span>
      <input class="form-control" type="text" name="user" required placeholder="Masukkan username Anda">
    </div>
    <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
      <input class="form-control" type="password" name="pass" required placeholder="Password">
    </div>
    <div class="form-group text-center">
      <a href="../index.php" class="btn btn-danger btn-custom" style="width: 45%;">Batal</a>
      <input class="btn btn-primary btn-custom" type="submit" value="Masuk" style="width: 45%;">
    </div>
  </form>
</div>


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/css/js/bootstrap.min.js"></script>
</body>

</html>
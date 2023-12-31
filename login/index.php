<?php
session_start();

if ($_SESSION) {
  if (isset($_SESSION['admin_authenticated']) || $_SESSION['admin_authenticated']) {
    header('Location: ../admin/');
    exit();
  } elseif (isset($_SESSION['dokter_authenticated']) || $_SESSION['dokter_authenticated']) {
    header('Location: ../dokter/');
    exit();
  } else {
    null;
  }
}

// Check if the form is submitted
if (isset($_POST['loginAdmin'])) {
  $username = $_POST['usernameAdmin'];
  $password = $_POST['passwordAdmin'];

  // Validate credentials (replace this with your authentication logic)
  if ($username == 'admin123' && $password == 'adminadmin') {
    $_SESSION['admin_authenticated'] = true;
    header('Location: ../admin/');
    exit();
  } else {
    $error = "Invalid credentials";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Staff - Capstone</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="h1"><b>Login Staff</b></p>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs float" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-admin-tab" data-toggle="pill" href="#custom-tabs-one-admin" role="tab" aria-controls="custom-tabs-one-admin" aria-selected="true">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-dokter-tab" data-toggle="pill" href="#custom-tabs-one-dokter" role="tab" aria-controls="custom-tabs-one-dokter" aria-selected="false">Dokter</a>
          </li>
        </ul>
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-admin" role="tabpanel" aria-labelledby="custom-tabs-one-admin-tab">
            <p class="login-box-msg" style="margin-top: 10px">Masuk sebagai Admin</p>
            <?php if (isset($error)) : ?>
              <p class="text-danger"><?php echo 'Username atau password salah' ?></p>
            <?php endif; ?>
            <form action="../login/" method="post">
              <div class="input-group mb-3">
                <input required name="usernameAdmin" type="text" class="form-control" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input required name="passwordAdmin" type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="submit" name="loginAdmin" value="Login" class="btn btn-primary btn-block" />
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-dokter" role="tabpanel" aria-labelledby="custom-tabs-one-dokter-tab">
            <p class="login-box-msg" style="margin-top: 10px">Masuk sebagai Dokter</p>
            <form>
              <div class="input-group mb-3">
                <input required type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input required type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="submit" name="loginDokter" value="Login" class="btn btn-primary btn-block" />
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>
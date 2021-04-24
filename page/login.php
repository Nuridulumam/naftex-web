<?php 
  include ('../koneksi/koneksi.php');
  if (isset($_POST["login"],$_POST["username"],$_POST["password"])) {
      $username = $_POST["username"];
      $password = MD5($_POST["password"]);

      //cek username dan password 
      $sql = "SELECT `id_user`, `level` FROM `user` WHERE `username`='$username' and `password`='$password'";
      $query = mysqli_query($koneksi, $sql); 
      $jumlah = mysqli_num_rows($query);

      if ($jumlah==1) {
        session_start(); 
          while($data = mysqli_fetch_row($query)){ 
              $id_user = $data[0];
              $level = $data[1];
              $_SESSION['id_user']=$id_user; 
              $_SESSION['level']=$level; 
              header("Location:../admin/index.php"); 
          } 
      } else {$notif="gagal";}
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Portal Naftex- Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4"><b>Selamat datang di Portal Naftex</b></h1>
                    </div>
                    <?php 
                      if (isset($_GET["notif"])&&$_GET["notif"]=="berhasil") { ?>
                        <div class="alert alert-success mt-3 text-center" role="alert"> Silahkan login untuk melanjutkan!</div>
                      <?php } 
                    ?>
                    <form class="user" method="post">
                      <div class="form-group">
                        <input type="username" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Masukkan Username" name="username" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password" name="password" />
                      </div>
                      <?php
                        if (isset($notif)&&$notif=="gagal") {?>
                          <p class="text-danger text-center">Username/Password Salah!</p>
                        <?php }
                      ?>
                      <!-- <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck" />
                          <label class="custom-control-label" for="customCheck">Simpan Data</label>
                        </div>
                      </div> -->
                      <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                    <hr />
                    <div class="text-center">
                      <a class="small" href="forgot-password.php">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="register.php"><b>Daftar Program Naftex</b></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>

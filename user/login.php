<?php 
  include ('../koneksi/koneksi.php');
  if (isset($_POST["login"],$_POST["username"],$_POST["password"])) {
    $username = $_POST["username"];
    $password = MD5($_POST["password"]);

    //cek username dan password 
    $sql = "SELECT `id_user`,`username` FROM `user` WHERE `username`='$username' and `password`='$password'";
    $query = mysqli_query($koneksi, $sql); 
    $jumlah = mysqli_num_rows($query);

    if ($jumlah==1) {
      session_start(); 
      while($data = mysqli_fetch_row($query)){ 
          $id_user = $data[0];
          $username = $data[1];
          $_SESSION['id_user']=$id_user; 
          $_SESSION['username']=$username; 
          header("Location:index.php"); 
      } 
    } else {$notif="gagal";}
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portal Naftex- Masuk</title>
    <?php include "include/head.php" ?>
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

    <?php include "include/script.php" ?>

  </body>
</html>

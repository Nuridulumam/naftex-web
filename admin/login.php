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
              header("Location:index.php"); 
          } 
      } else {$gagal=1;}
  }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php" ?>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <?php
                      if (isset($gagal)&&$gagal=="1") {?>
                        <p class="text-danger text-center">Username/Password Salah!</p>
                      <?php }
                    ?>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
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

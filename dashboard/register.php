<?php
	include('../koneksi/koneksi.php');
    if (isset($_POST["register"])) {
      if (!empty($_POST["nama"])&&!empty($_POST["username"])&&!empty($_POST["email"])&&!empty($_POST["wa1"])&&!empty($_POST["password"])&&!empty($_POST["passwordk"])) {
        $nama 		= $_POST["nama"];
        $username 	= $_POST["username"];
        $email   	= $_POST["email"];
        $wa1    	= $_POST["wa1"];
        $password 	= MD5($_POST["password"]);
        $passwordk 	= MD5($_POST["passwordk"]);
        //cek password
        if ($password==$passwordk) {
        	$q_nama = mysqli_query($koneksi, "SELECT `nama` FROM `user` WHERE `nama`='$nama'"); 
			    $j_nama = mysqli_num_rows($q_nama);
			    // cek nama
          if ($j_nama==0) {
          	$q_username = mysqli_query($koneksi, "SELECT `username` FROM `user` WHERE `username`='$username'"); 
				    $j_username = mysqli_num_rows($q_username);
				    //cek username
				    if ($j_username==0) {
		    	    mysqli_query($koneksi,"INSERT INTO `user` (`nama`, `username`, `email`, `password`,`level`) VALUES ('$nama', '$username', '$email', '$password','peserta')");
              mysqli_query($koneksi,"INSERT INTO `data_peserta` (`username`, `wa1`) VALUES ('$username', '$wa1')");
              mysqli_query($koneksi,"INSERT INTO `pembayaran_peserta` (`username`) VALUES ('$username')");
              mysqli_query($koneksi,"INSERT INTO `file_peserta` (`username`) VALUES ('$username')");
			        header("Location:login.php?notif=berhasil"); 
		        }else {$notif = "Username telah terdaftar";}
          } else {$notif = "Nama Tim telah terdaftar";}
        } else {$notif = "Password konfirmasi salah";}
      } else {$notif = "Semua Data wajib diisi!";}
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portal Naftex- Daftar Akun</title>
    <?php include "include/head.php" ?>
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><b>Daftar Akun Naftex!</b></h1>
                </div>
                <form class="user" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Tim" name="nama" maxlength="50" required/>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" minlength="5" required/>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" placeholder="Alamat Email" name="email" required/>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="wa1" placeholder="Nomor Whatsapp" name="wa1" maxlength="20" required/>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" minlength="8" required/>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="passwordk" placeholder="Konfirmasi Password" name="passwordk" required/>
                    </div>
                  </div>
                  <?php 
                  	if (isset($notif)) { ?>
                  		<p class="text-danger text-center"><?= $notif ?></p>
                  	<?php }
                  ?>
                  <button type="submit" name="register" class="btn btn-primary btn-user btn-block"> Daftar Akun</button>
                </form>
                <hr />
                <div class="text-center">
                  <a class="small" href="login.php"><b>Sudah punya akun? Login!</b></a>
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

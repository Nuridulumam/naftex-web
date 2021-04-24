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
				    	$s_reg = "INSERT INTO `user` (`nama`, `username`, `email`, `password`) VALUES ('$nama', '$username', '$email', '$password')";
			            mysqli_query($koneksi,$s_reg);
			            //get id_user
			            $q_id = mysqli_query($koneksi, "SELECT `id_user` FROM `user` WHERE `username`='$username'"); 
					    while($d_id = mysqli_fetch_row($q_id)){ $id_user = $d_id[0]; } 
			            $s_reg2 = "INSERT INTO `data_peserta` (`id_user`, `wa1`) VALUES ('$id_user', '$wa1')";
			            mysqli_query($koneksi,$s_reg2);
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Portal Naftex- Daftar Akun</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>

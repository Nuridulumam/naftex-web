<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit"])) {
        if (!empty($_POST["passl"])&&!empty($_POST["passb"])) {
            $passl = MD5($_POST["passl"]);
            $passb = MD5($_POST["passb"]);
            //get password
            $q_p = mysqli_query($koneksi, "SELECT `password` FROM `admin` WHERE `username`='$username'"); 
            while($d_p = mysqli_fetch_row($q_p)){ $pass = $d_p[0]; }
            //cek password lama
            if ($passl==$pass) {
                //cek password baru
                if ($passl!=$passb) {
                    mysqli_query($koneksi,"UPDATE `admin` SET `password`='$passb' WHERE `username`='$username'");
                } else {$notif2 = "Password baru tidak boleh sama dengan password lama!";}
            }else {$notif1 = "Password salah!";}
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php" ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "include/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "include/navbar.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-key"></i> Ubah Password</h1>
                    <div class="container mt-2 card shadow p-5">
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/img/password.jpg" alt="foto-profile" height="270px">
                            </div>
                            <div class="col-md-4">
                                <form method="post">
                                    <?php
                                        // $q_u = mysqli_query($koneksi, "SELECT `username` FROM `admin` WHERE `username`='$username'"); 
                                        // while($d_u = mysqli_fetch_row($q_u)){ $username = $d_u[0]; }
                                    ?>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control shadow" id="username" placeholder="<?= $username ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="passl">Password Lama</label>
                                        <input type="password" name="passl" class="form-control shadow" id="passl" required>
                                        <?php
                                            if (isset($notif1)) { ?>
                                               <p class="text-danger"><?= $notif1 ?></p>
                                            <?php }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="passb">Password Baru</label>
                                        <input type="password" name="passb" class="form-control shadow" id="passb" required>
                                        <?php
                                            if (isset($notif2)) { ?>
                                               <p class="text-danger"><?= $notif2 ?></p>
                                            <?php }
                                        ?>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

        </div>
    </div>

    <?php include "include/script.php" ?>

</body>

</html>
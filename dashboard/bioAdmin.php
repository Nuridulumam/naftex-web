<?php 
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit"])) {
        if (!empty($_POST["nama"])&&!empty($_POST["email"])&&!empty($_POST["wa"])) {
            $nama_baru  = $_POST["nama"];
            $email_baru = $_POST["email"];
            $wa_baru    = $_POST["wa"];
            //echo $email.$id_lomba;
            $sql_u = "UPDATE `admin` SET `nama`='$nama_baru',`email`='$email_baru', `wa`='$wa_baru' WHERE `username`='$username'";
            mysqli_query($koneksi,$sql_u);
            $notif = "berhasil";
        } else {$notif = "gagal";}
    }
    if (isset($_POST["submit-foto"])) {
        if (isset($username)) {
          $file_tmp   = $_FILES['foto']['tmp_name'];
          $file_name  = $_FILES['foto']['name']; 
          $file_exp   = explode('.',$file_name);
          $file_ext   = end($file_exp);
          $nama_file  = $username."_foto.".$file_ext;
          $direktori  = 'assets/img/foto/'.$nama_file;
          if(move_uploaded_file($file_tmp,$direktori)){ 
            mysqli_query($koneksi,"UPDATE `admin` SET `foto`='$nama_file' WHERE `username`='$username'");
            $notif = "berhasil";
          }else{
            $notif = "gagal";
          }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin 2 - Dashboard</title>
    <?php include "include/head.php" ?>
</head>

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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i> Biodata Admin</h1>

                    <div class="container mt-2 card shadow p-5">
                        <div class="row justify-content-center">
                            <?php
                                $query_d = mysqli_query($koneksi, "SELECT `email`,`wa`,`foto`,`nama` FROM `admin` WHERE `username`='$username'");
                                while ($data_d = mysqli_fetch_row($query_d)) {
                                    $email  = $data_d[0];
                                    $wa     = $data_d[1];
                                    $foto   = $data_d[2];
                                    $nama   = $data_d[3];
                                }
                            ?>
                            <div class="col-md-3">
                                <?php
                                    if (!empty($foto)) { ?>
                                        <img src="assets/img/foto/<?= $foto ?>" class="rounded-circle" alt="foto-profile" width="170px">
                                    <?php } else { ?>
                                        <img src="assets/img/undraw_profile.svg" alt="foto-profile" width="170px">
                                    <?php }
                                ?>
                                <a href="#" data-toggle="modal" data-target="#editFoto" class="btn btn-circle bg-light" style="margin: -50px 0 0 110px; position: relative; z-index: 1;"><i class="fas fa-edit "></i></a>
                                <h6 class="h6"> ID : <?= "100" . $id_admin ?></h6>
                            </div>
                            <div class="col-md-7">
                                <?php
                                //$notif = "berhasil";
                                if (isset($notif) && $notif == "berhasil") { ?>
                                    <div class="alert alert-success mt-3" role="alert"> Data Berhasil di Simpan!</div>
                                <?php } else if (isset($notif) && $notif == "gagal") { ?>
                                    <div class="alert alert-danger mt-3" role="alert"> Data Gagal di Simpan!</div>
                                <?php }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" id="inputnama" value="<?= $nama ?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="<?= $username ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" value="<?= $email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorWa">Nomor Whatsapp</label>
                                        <input type="text" name="wa" class="form-control" id="wa" value="<?= $wa ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="level" placeholder="<?= $level ?>" disabled>
                                    </div>
                                    <!-- <button type="submit" name="submit" class="btn btn-info">Edit Profile</button> -->
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="modal fade" id="editFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Foto</label>
                                        <input type="file" name="foto" class="form-control" id="inputnama" value="<?= $nama ?>">
                                        <ul class="my-2">
                                            <li class="text-danger">Foto harus berformat JPG atau PNG.</li>
                                            <li class="text-danger">Foto tidak boleh lebih dari 1 MB.</li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit" name="submit-foto">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
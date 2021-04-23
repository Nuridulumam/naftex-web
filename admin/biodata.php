<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit"])) {
        if (!empty($_POST["nama"])&&!empty($_POST["email"])&&!empty($_POST["id_lomba"])) {
            $nama_baru       = $_POST["nama"];
            $email_baru      = $_POST["email"];
            $id_lomba_baru   = $_POST["id_lomba"];
            //echo $email.$id_lomba;
            $sql_u = "UPDATE `user` SET `nama`='$nama_baru',`email`='$email_baru' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi,$sql_u);
            $sql_v = "UPDATE `data_peserta` SET `id_lomba`='$id_lomba_baru' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi,$sql_v);
            $notif = "berhasil";
        } else {$notif = "gagal";}
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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i> Biodata Peserta</h1>

                    <div class="container mt-2 card shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <img src="img/undraw_profile.svg" alt="foto-profile" width="170px">
                                <a href="#" class="btn btn-circle bg-light" style="margin: -50px 0 0 110px; position: relative; z-index: 1;"><i class="fas fa-edit "></i></a>
                                <h6 class="h6"> ID : <?= "100".$id_user ?></h6>
                            </div>
                            <div class="col-md-7">
                                <?php
                                    $sql_d = "SELECT `user`.`nama`,`user`.`username`,`user`.`email`,`data_peserta`.`id_lomba` FROM `user` INNER JOIN `data_peserta` ON `user`.`id_user`=`data_peserta`.`id_user`";
                                    $query_d = mysqli_query($koneksi,$sql_d);
                                    while ($data_d = mysqli_fetch_row($query_d)) {
                                        $nama       = $data_d[0];
                                        $username   = $data_d[1];
                                        $email      = $data_d[2];
                                        $id_lomba   = $data_d[3];
                                    }
                                ?>
                                <?php 
                                    //$notif = "berhasil";
                                    if (isset($notif)&&$notif=="berhasil") { ?>
                                       <div class="alert alert-success mt-3" role="alert"> Data Berhasil di Simpan!</div>
                                    <?php } else if (isset($notif)&&$notif=="gagal") { ?>
                                        <div class="alert alert-danger mt-3" role="alert"> Data Gagal di Simpan!</div>
                                    <?php }
                                ?>
                                <form method="post">   
                                    <div class="form-group">
                                        <label for="nama">Nama Tim</label>
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
                                        <label for="id_lomba">Jenis Lomba</label>
                                        <select class="form-control" id="id_lomba" name="id_lomba">
                                            <?php
                                                $sql_l = "SELECT `id_lomba`,`nama` FROM `data_lomba` ORDER BY `nama`";
                                                $query_l = mysqli_query($koneksi,$sql_l);
                                                while ($data_l = mysqli_fetch_row($query_l)) {
                                                    $id_l   = $data_l[0];
                                                    $nama_l = $data_l[1];
                                                ?>
                                                <option value="<?= $id_l ?>" <?php if($id_l==$id_lomba){echo "selected";} ?>><?= $nama_l ?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-secondary">Edit Profile</button> -->
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan Profile</button>
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
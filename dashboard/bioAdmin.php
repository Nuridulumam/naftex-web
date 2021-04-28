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
                            <div class="col-md-3">
                                <img src="assets/img/undraw_profile.svg" alt="foto-profile" width="170px">
                                <a href="#" class="btn btn-circle bg-light" style="margin: -50px 0 0 110px; position: relative; z-index: 1;"><i class="fas fa-edit "></i></a>
                                <h6 class="h6"> ID : <?= "100" . $id_user ?></h6>
                            </div>
                            <div class="col-md-7">
                                <?php
                                // $sql_d = "SELECT `nama`,`username`,`email`,`id_lomba` FROM `user` WHERE `id_user`='$id_user'";
                                // $query_d = mysqli_query($koneksi, $sql_d);
                                // while ($data_d = mysqli_fetch_row($query_d)) {
                                //     $nama       = $data_d[0];
                                //     $username   = $data_d[1];
                                //     $email      = $data_d[2];
                                //     $id_lomba   = $data_d[3];
                                // }
                                ?>
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
                                        <input type="text" name="nomorWA" class="form-control" id="nomorWA" value="<?= $whatsapp ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" name="role" class="form-control" id="role" value="<?= $role ?>" disabled>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-secondary">Edit Profile</button> -->
                                    <button type="submit" name="submit" class="btn btn-info">Edit Profile</button>
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
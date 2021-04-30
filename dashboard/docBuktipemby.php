<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php');  
    if (isset($_POST["submit-confirm"])) {
        if (!empty($_POST["username"])) {
            $username  = $_POST["username"];
            mysqli_query($koneksi,"UPDATE `pembayaran_peserta` SET `status_bayar`='berhasil' WHERE `username`='$username'");
            $notif = "berhasil";
        } else {$notif = "gagal";}
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bukti Pembayaran</title>
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

                    <div class="container col-12 card shadow p-5">
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-file"></i> Bukti Pembayaran Tim</h1>
                        <?php
                            if (isset($notif) && $notif == "berhasil") { ?>
                                <div class="alert alert-success mt-3" role="alert"> Data Berhasil di Simpan!</div>
                            <?php } else if (isset($notif) && $notif == "gagal") { ?>
                                <div class="alert alert-danger mt-3" role="alert"> Data Gagal di Simpan!</div>
                            <?php }
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Username Tim</th>
                                                <th scope="col">Nama Tim</th>
                                                <th scope="col">Bukti Pembayaran</th>
                                                <th scope="col">Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql_p = "SELECT user.username, user.nama, pembayaran_peserta.bukti_transfer, pembayaran_peserta.status_bayar FROM `user` 
                                                LEFT JOIN `pembayaran_peserta` ON pembayaran_peserta.username = user.username";
                                                $query_p = mysqli_query($koneksi,$sql_p);
                                                while($data_p = mysqli_fetch_row($query_p)){ 
                                                    $username   = $data_p[0];
                                                    $nama     = $data_p[1];
                                                    $bukti   = $data_p[2];
                                                    $status    = $data_p[3];
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $nama ?></td>
                                                <td>
                                                    <a data-toggle="collapse" href="#buktitimid<?= $no ?>" role="button" aria-expanded="false" aria-controls="buktitimid=1">
                                                        <?= $bukti ?>
                                                    </a>
                                                    <div class="collapse" id="buktitimid<?= $no ?>">
                                                        <img src="assets/img/bukti-pembayaran/<?= $bukti ?>" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($status=="pending") { ?>
                                                        <a href="#" data-toggle="modal" data-target="#confirmModal" class="badge badge-info p-1" onclick='setConfirm("<?= $username ?>")'><i class="fas fa-check"></i> Confirm</a>
                                                    <?php } else if ($status=="berhasil") { ?>
                                                        <a href="#" class="badge badge-success p-1"><i class="fas fa-check-double"> Verified</i></a>
                                                    <?php }

                                                    ?>                            
                                                </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <p>Apakah anda yakin ingin mengonfirmasi pembayaran?</p>
                                    <div class="form-group">
                                        <input type="hidden" class="d-none" name="username" class="form-control" id="cUsername" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="submit-confirm">Confirm</button>
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
    <script type="text/javascript">
        function setConfirm(username){
          document.getElementById("cUsername").value = username;
        }
    </script>


</body>

</html>
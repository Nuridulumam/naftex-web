<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php'); 
    if (isset($_POST["submit-confirm"])) {
        if (!empty($_POST["username"])) {
            $username  = $_POST["username"];
            mysqli_query($koneksi,"UPDATE `dokumen_peserta` SET `status_dokumen`='confirmed' WHERE `username`='$username'");
            $notif = "berhasil";
        } else {$notif = "gagal";}
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dokumen Tim</title>
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
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-file"></i> Dokumen Tim</h1>
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Nama Tim</th>
                                                <th scope="col">Berkas Upload</th>
                                                <th scope="col" width="120px">Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql_p = "SELECT user.username, user.nama, dokumen_peserta.proposal, dokumen_peserta.sk, dokumen_peserta.ktm, dokumen_peserta.status_dokumen FROM `user` 
                                                LEFT JOIN `dokumen_peserta` ON dokumen_peserta.username = user.username";
                                                $query_p = mysqli_query($koneksi,$sql_p);
                                                while($data_p = mysqli_fetch_row($query_p)){ 
                                                    $username   = $data_p[0];
                                                    $nama       = $data_p[1];
                                                    $proposal   = $data_p[2];
                                                    $sk         = $data_p[3];
                                                    $ktm        = $data_p[4];
                                                    $status     = $data_p[5];
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $nama ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#tampilpdf" onclick='setTampil("<?= $proposal ?>")'><?= $proposal ?></a> <br>
                                                    <a href="#" data-toggle="modal" data-target="#tampilpdf" onclick='setTampil("<?= $sk ?>")'><?= $sk ?></a> <br>
                                                    <a href="#" data-toggle="modal" data-target="#tampilpdf" onclick='setTampil("<?= $ktm ?>")'><?= $ktm ?></a>
                                                </td>
                                                <td>
                                                    <?php if ($status=="") { ?>
                                                        <a href="#" data-toggle="modal" data-target="#confirmModal" class="badge badge-info p-1" onclick='setConfirm("<?= $username ?>")'><i class="fas fa-check"></i> Confirm</a>
                                                    <?php } else if ($status=="confirmed") { ?>
                                                        <a href="#" class="badge badge-success p-1"><i class="fas fa-check-double"> Verified</i></a>
                                                    <?php } ?>
                                                    <!-- <a href="#" class="badge badge-danger p-1"><i class="fas fa-trash"></i> Delete</a> -->
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
                <div class="modal fade" id="tampilpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tampil Dokumen</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <embed id="pdfViewer" src="" width="400" height="600" type="application/x-pdf" frameborder="0" allowfullscreen></embed>
                                <!-- <iframe src="assets/dokumen/admin_ktm.pdf" style="width: 400px; height: 600px" frameborder="0" allowfullscreen></iframe> -->
                                <!-- <?php 
                                    $dir = "assets/dokumen/";
                                    $pdf = "admin_ktm.pdf";
                                    exec("/bin/convert ".$dir.$pdf." ".$dir.$pdf.".png");
                                    print '<img src="'.$dir.$pdf.'.png" />';
                                ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Dokumen</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <p>Apakah anda yakin ingin mengonfirmasi dokumen?</p>
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
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

        </div>
    </div>

    <?php include "include/script.php" ?>
    <script type="text/javascript">
        function setTampil(pdf){
          document.getElementById("pdfViewer").src = "assets/dokumen/"+pdf;
        };
    </script>
    <script type="text/javascript">
        function setConfirm(username){
          document.getElementById("cUsername").value = username;
        }
    </script>

</body>

</html>
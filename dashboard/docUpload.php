<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit-upload"])) {
        if (!empty($_FILES["proposal"])){
            $file_tmp   = $_FILES['proposal']['tmp_name'];
            $file_name  = $_FILES['proposal']['name']; 
            $file_exp   = explode('.',$file_name);
            $file_ext   = end($file_exp);
            $nama_file  = $username."_proposal.".$file_ext;
            $direktori  = 'assets/dokumen/'.$nama_file;
            if(move_uploaded_file($file_tmp,$direktori)){ 
                mysqli_query($koneksi,"UPDATE `dokumen_peserta` SET `proposal`='$nama_file' WHERE `username`='$username'");
                $notif = "berhasil";
            }
        }
        if (!empty($_FILES["sk"])){
            $file_tmp   = $_FILES['sk']['tmp_name'];
            $file_name  = $_FILES['sk']['name']; 
            $file_exp   = explode('.',$file_name);
            $file_ext   = end($file_exp);
            $nama_file  = $username."_sk.".$file_ext;
            $direktori  = 'assets/dokumen/'.$nama_file;
            if(move_uploaded_file($file_tmp,$direktori)){ 
                mysqli_query($koneksi,"UPDATE `dokumen_peserta` SET `sk`='$nama_file' WHERE `username`='$username'");
                $notif = "berhasil";
            }
        }
        if (!empty($_FILES["ktm"])){
            $file_tmp   = $_FILES['ktm']['tmp_name'];
            $file_name  = $_FILES['ktm']['name']; 
            $file_exp   = explode('.',$file_name);
            $file_ext   = end($file_exp);
            $nama_file  = $username."_ktm.".$file_ext;
            $direktori  = 'assets/dokumen/'.$nama_file;
            if(move_uploaded_file($file_tmp,$direktori)){ 
                mysqli_query($koneksi,"UPDATE `dokumen_peserta` SET `ktm`='$nama_file' WHERE `username`='$username'");
                $notif = "berhasil";
            }
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Dokumen</title>
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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-upload"></i> Upload Dokumen</h1>

                    <div class="container mt-2 card shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-7 mr-md-auto">
                                <?php 
                                    //$notif = "berhasil";
                                    if (isset($notif)&&$notif=="berhasil") { ?>
                                       <div class="alert alert-success mt-3" role="alert"> Dokumen Berhasil di Upload!</div>
                                    <?php } else if (isset($notif)&&$notif=="gagal") { ?>
                                        <div class="alert alert-danger mt-3" role="alert"> Dokumen Gagal di Upload!</div>
                                    <?php }
                                ?>
                                <form method="post" enctype="multipart/form-data"> 
                                    <?php 
                                        $query_p = mysqli_query($koneksi,"SELECT `proposal`,`sk`,`ktm` FROM `dokumen_peserta` WHERE `username`='$username'");
                                        while ($data_p = mysqli_fetch_row($query_p)) {
                                            $proposal   = $data_p[0];
                                            $sk         = $data_p[1];
                                            $ktm        = $data_p[2];
                                        }
                                    ?>
                                    <div class="form-row">
                                        <label class="col-12" for="proposal">Upload Proposal</label>
                                        <div class="form-group col-10">
                                            <input type="file" name="proposal" class="form-control">
                                        </div>
                                        <div class="">
                                            <?php 
                                                if (!empty($proposal)) { ?>
                                                    <span><a href="assets/dokumen/<?= $proposal ?>" target='_blank'>Lihat</a></span>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label class="col-12" for="sk">Upload Surat Keterangan</label>
                                        <div class="form-group col-10">
                                            <input type="file" name="sk" class="form-control">
                                        </div>
                                        <div class="">
                                            <?php 
                                                if (!empty($sk)) { ?>
                                                    <span><a href="assets/dokumen/<?= $sk ?>" target='_blank'>Lihat</a></span>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label class="col-12" for="ktm">Upload KTM</label>
                                        <div class="form-group col-10">
                                            <input type="file" name="ktm" class="form-control">
                                        </div>
                                        <div class="">
                                            <?php 
                                                if (!empty($ktm)) { ?>
                                                    <span><a href="assets/dokumen/<?= $ktm ?>" target='_blank'>Lihat</a></span>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <!-- <button type="submit" class="btn btn-secondary">Edit Profile</button> -->
                                        <button type="submit" name="submit-upload" class="btn btn-primary">Upload</button>
                                    </div>
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
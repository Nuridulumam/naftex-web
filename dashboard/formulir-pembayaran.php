<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit-bayar"])) {
        mysqli_query($koneksi,"UPDATE `pembayaran_peserta` SET `status_bayar`='belum' WHERE `username`='$username'");
    }
    if (isset($_POST["submit-bukti"])) {
        if (!empty($_FILES["bukti"])) {
            $file_tmp   = $_FILES['bukti']['tmp_name'];
            $file_name  = $_FILES['bukti']['name']; 
            $file_exp   = explode('.',$file_name);
            $file_ext   = end($file_exp);
            $nama_file  = $username."_bukti.".$file_ext;
            $direktori  = 'assets/img/bukti-pembayaran/'.$nama_file;
            if(move_uploaded_file($file_tmp,$direktori)){
                mysqli_query($koneksi,"UPDATE `pembayaran_peserta` SET `status_bayar`='pending' WHERE `username`='$username'"); 
                mysqli_query($koneksi,"UPDATE `pembayaran_peserta` SET `bukti_transfer`='$nama_file' WHERE `username`='$username'");
            }
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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-money-check-alt"></i> Formulir Pembayaran</h1>
                    <?php 
                        $query_s = mysqli_query($koneksi,"SELECT `status_bayar` FROM `pembayaran_peserta` WHERE `username`='$username'");
                        while ($data_s = mysqli_fetch_row($query_s)) {$status_bayar   = $data_s[0];}

                        if (empty($status_bayar)) {
                    ?>
                    <div class="container mt-2 mb-5 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <?php
                                    $query_d = mysqli_query($koneksi,"SELECT `id_lomba` FROM `user` WHERE `username`='$username'");
                                    while ($data_d = mysqli_fetch_row($query_d)) {$id_lomba   = $data_d[0];}
                                    $query_l = mysqli_query($koneksi,"SELECT `nama` FROM `data_lomba` WHERE `id_lomba`='$id_lomba'");
                                    while ($data_l = mysqli_fetch_row($query_l)) {$nama_lomba = $data_l[0];}
                                ?>
                                <form method="post">
                                    <div class="alert alert-primary mt-3" role="alert">Pastikan semua data sudah diisi dengan benar!</div>
                                    <div class="form-group">
                                        <label for="nama">Nama Tim</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $nama ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_lomba">Jenis Lomba</label>
                                        <input type="text" class="form-control" id="id_lomba" name="id_lomba" placeholder="<?= $nama_lomba ?>" disabled>
                                    </div>
                                    <div>
                                        <?php
                                        if      ($id_user>=1&&$id_user<=9)   {$biaya="Rp. 100.00".$id_user; }
                                        else if ($id_user>=10&&$id_user<=99) {$biaya="Rp. 100.0".$id_user; }
                                        ?>
                                        <p>Biaya Pendaftaran : </p>
                                        <h3><?= $biaya ?></h3>
                                    </div>
                                    <button class="btn btn-info float-right" type="submit" name="submit-bayar">Bayar</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/img/pembayaran.jpg" alt="pembayaran" height="400px">
                            </div>
                        </div>
                    </div>
                    <?php } else if ($status_bayar=="belum") { ?>
                    <div class="container mt-2 mb-5 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <h3>Status Pembayaran: <span class="badge badge-danger">Menunggu Pembayaran</span></h3>
                                <p>Silahkan lakukan pembayaran ke nomor rekening 000000000000000 atas nama Nama sejumlah :</p>
                                <?php
                                    if      ($id_user>=1&&$id_user<=9)   {$biaya="Rp. 100.00".$id_user; }
                                    else if ($id_user>=10&&$id_user<=99) {$biaya="Rp. 100.0".$id_user; }
                                ?>
                                <h3><?= $biaya ?></h3>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Jika anda sudah membayar, upload bukti pembayaran disini</label>
                                        <input type="file" class="form-control" id="bukti" name="bukti">
                                    </div>
                                    <button class="btn btn-info float-right" type="submit" name="submit-bukti">Kirim Bukti Transfer</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/img/pembayaran.jpg" alt="pembayaran" height="400px">
                            </div>
                        </div>
                    </div>
                    <?php } else if ($status_bayar=="pending") { ?>
                    <div class="container mt-2 mb-5 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <h3>Status Pembayaran: <span class="badge badge-warning">Sedang Diverivikasi</span></h3>
                                <p>Pembayaran anda saat ini sedang diverivikasi oleh admin</p>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/img/pembayaran.jpg" alt="pembayaran" height="400px">
                            </div>
                        </div>
                    </div>
                    <?php } else if ($status_bayar=="berhasil") { ?>
                    <div class="container mt-2 mb-5 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <h3>Status Pembayaran: <span class="badge badge-success">Berhasil</span></h3>
                                <p>Pembayaran anda sudah kami terima</p>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/img/pembayaran.jpg" alt="pembayaran" height="400px">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php'); 
    if (isset($_POST["submit-anggota1"])) {
        if (!empty($_POST["nama1"])&&!empty($_POST["wa1"])&&!empty($_POST["univ1"])&&!empty($_POST["ttl1"])&&!empty($_POST["alamat1"])) {
            $nama   =$_POST["nama1"];
            $wa     =$_POST["wa1"];
            $univ   =$_POST["univ1"];
            $ttl    =$_POST["ttl1"];
            $alamat =$_POST["alamat1"];
            $sql_u = "UPDATE `data_peserta` SET `nama1`='$nama',`wa1`='$wa',`univ1`='$univ',`ttl1`='$ttl',`alamat1`='$alamat' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi,$sql_u);
            $notif = "berhasil";
        } else {$notif = "gagal";}
    }
    if (isset($_POST["submit-anggota2"])) {
        if (!empty($_POST["nama2"])&&!empty($_POST["wa2"])&&!empty($_POST["univ2"])&&!empty($_POST["ttl2"])&&!empty($_POST["alamat2"])) {
            $nama   =$_POST["nama2"];
            $wa     =$_POST["wa2"];
            $univ   =$_POST["univ2"];
            $ttl    =$_POST["ttl2"];
            $alamat =$_POST["alamat2"];
            $sql_u = "UPDATE `data_peserta` SET `nama2`='$nama',`wa2`='$wa',`univ2`='$univ',`ttl2`='$ttl',`alamat2`='$alamat' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi,$sql_u);
            $notif = "berhasil";
        } else {$notif = "gagal";}
    }
    if (isset($_POST["submit-anggota1"])) {
        if (!empty($_POST["nama3"])&&!empty($_POST["wa3"])&&!empty($_POST["univ3"])&&!empty($_POST["ttl3"])&&!empty($_POST["alamat3"])) {
            $nama   =$_POST["nama3"];
            $wa     =$_POST["wa3"];
            $univ   =$_POST["univ3"];
            $ttl    =$_POST["ttl3"];
            $alamat =$_POST["alamat3"];
            $sql_u = "UPDATE `data_peserta` SET `nama3`='$nama',`wa3`='$wa',`univ3`='$univ',`ttl3`='$ttl',`alamat3`='$alamat' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi,$sql_u);
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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-users"></i> Formulir Biodata Tim</h1>

                    <div class="container mt-2 card shadow p-5">
                        <?php 
                            if (isset($notif)&&$notif=="berhasil") { ?>
                               <div class="alert alert-success mt-3" role="alert"> Data Berhasil di Simpan!</div>
                            <?php } else if (isset($notif)&&$notif=="gagal") { ?>
                                <div class="alert alert-danger mt-3" role="alert"> Data Gagal di Simpan!</div>
                            <?php }
                        ?>
                        
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <div class="row">
                                    <div class="col-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Get Started</a>
                                            <a class="nav-link" id="v-pills-anggota1-tab" data-toggle="pill" href="#v-pills-anggota1" role="tab" aria-controls="v-pills-profile" aria-selected="false">Biodata Anggota 1</a>
                                            <a class="nav-link" id="v-pills-anggota2-tab" data-toggle="pill" href="#v-pills-anggota2" role="tab" aria-controls="v-pills-messages" aria-selected="false">Biodata Anggota 2</a>
                                            <a class="nav-link" id="v-pills-anggota3-tab" data-toggle="pill" href="#v-pills-anggota3" role="tab" aria-controls="v-pills-settings" aria-selected="false">Biodata Anggota 3</a>
                                        </div>
                                    </div>

                                    <!-- Tab panes -->
                                    <div class="col-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="getstarted text-center">
                                                    <img src="img/6316.jpg" alt="get-started" width="550px">
                                                    <h2 class="h2">Silahkan Mengisi Formulir Biodata Tim</h2>
                                                    <p class="font-weight-normal">Seluruh data yang disampaikan kepada panitia harus memenuhi persyaratan yang ada.</p>
                                                </div>
                                            </div>
                                            
                                            <?php
                                                $anggota = [1,2,3];
                                                foreach ($anggota as $i) {    
                                                    $sql_a = "SELECT `nama$i`,`wa$i`,`univ$i`,`ttl$i`,`alamat$i` FROM `data_peserta` WHERE `id_user`='$id_user'";
                                                    $query_a = mysqli_query($koneksi,$sql_a);
                                                    while($data_a = mysqli_fetch_row($query_a)){ 
                                                        $nama   = $data_a[0];
                                                        $wa     = $data_a[1];
                                                        $univ   = $data_a[2];
                                                        $ttl    = $data_a[3];
                                                        $alamat = $data_a[4]; 
                                            ?>
                                            <div class="tab-pane fade" id="v-pills-anggota<?= $i ?>" role="tabpanel" aria-labelledby="v-pills-anggota<?= $i ?>-tab">
                                                <form class="shadow p-3 rounded" method="post">
                                                    <h4 class="h5 rounded font-weight-bold text-dark">Biodata Anggota <?= $i ?> <?php if($i=="1"){echo "(Ketua)";} ?></h4>
                                                    <hr class="sidebar-divider">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="nama<?= $i ?>">Nama Lengkap</label>
                                                            <input type="text" name="nama<?= $i ?>" class="form-control" id="nama<?= $i ?>" maxlength="50" value="<?= $nama ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="wa<?= $i ?>">No Whatsapp</label>
                                                            <input type="text" name="wa<?= $i ?>" class="form-control" id="wa<?= $i ?>" maxlength="15" value="<?= $wa ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="univ<?= $i ?>">Universitas</label>
                                                        <input type="text" name="univ<?= $i ?>" class="form-control" id="univ<?= $i ?>" maxlength="50" value="<?= $univ ?>" required>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="ttl<?= $i ?>">Tanggal Lahir</label>
                                                            <input type="text" name="ttl<?= $i ?>" class="form-control" id="ttl<?= $i ?>" maxlength="15" value="<?= $ttl ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label for="alamat<?= $i ?>">Alamat Lengkap</label>
                                                            <input type="text" name="alamat<?= $i ?>" class="form-control" id="alamat<?= $i ?>" maxlength="100" value="<?= $alamat ?>" required>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit-anggota<?= $i ?>" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                            <?php } } ?>

                                        </div>
                                    </div>
                                </div>
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
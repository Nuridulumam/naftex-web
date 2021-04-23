<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
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

                    <div class="container mt-2 mb-5 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <?php
                                    $sql_d   = "SELECT `id_lomba` FROM `data_peserta` WHERE `id_user`='$id_user'";
                                    $query_d = mysqli_query($koneksi,$sql_d);
                                    while ($data_d = mysqli_fetch_row($query_d)) {$id_lomba   = $data_d[0];}
                                    $sql_l   = "SELECT `nama` FROM `data_lomba` WHERE `id_lomba`='$id_lomba'";
                                    $query_l = mysqli_query($koneksi,$sql_l);
                                    while ($data_l = mysqli_fetch_row($query_l)) {$nama_lomba = $data_l[0];}
                                ?>
                                <form>
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
                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputCity">Nomor Rekening</label>
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Bank</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="btn btn-info float-right">Bayar</div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img src="img/pembayaran.jpg" alt="pembayaran" height="400px">
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
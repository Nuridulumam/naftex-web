<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit-delete"])) {
        if (!empty($_POST["username"])) {
            $usernamee  = $_POST["username"];
            //get foto
            $query_f = mysqli_query($koneksi,"SELECT `foto` FROM `user` WHERE `username`='$usernamee'"); 
            $jumlah_f = mysqli_num_rows($query_f); 
            if($jumlah_f>0){ 
                while($data_f = mysqli_fetch_row($query_f)){ 
                  $foto = $data_f[0]; 
                  //menghapus foto 
                  //unlink("assets/img/foto/$foto"); 
                } 
            }
            //get bukti_pembayaran
            $query_b = mysqli_query($koneksi,"SELECT `bukti_transfer` FROM `pembayaran_peserta` WHERE `username`='$usernamee'"); 
            $jumlah_b = mysqli_num_rows($query_b); 
            if($jumlah_b>0){ 
                while($data_b = mysqli_fetch_row($query_b)){ 
                  $bukti = $data_b[0]; 
                  //menghapus bukti pembayaran 
                  //unlink("assets/img/bukti-pembayaran/$bukti"); 
                } 
            } 
            //mysqli_query($koneksi,"DELETE FROM `user` WHERE `username`='$usernamee'");
            $hapus = "berhasil";
        } else {$hapus = "gagal";}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengaturan User</title>
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
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i> Pengaturan User Peserta</h1>
                        <?php
                            if (isset($hapus) && $hapus == "berhasil") { ?>
                                <div class="alert alert-success mt-3" role="alert"> Akun Berhasil dihapus!</div>
                            <?php } else if (isset($hapus) && $hapus == "gagal") { ?>
                                <div class="alert alert-danger mt-3" role="alert"> Akun Gagal dihapus!</div>
                            <?php }
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Username </th>
                                                <th scope="col">Nama Tim</th>
                                                <th scope="col">Lomba</th>
                                                <th scope="col" width="50px">Action</th>
                                            
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql_p = "SELECT user.username, user.nama, data_lomba.nama FROM `user` LEFT JOIN `data_lomba` 
                                                ON data_lomba.id_lomba = user.id_lomba ORDER BY `id_user` DESC";
                                                $query_p = mysqli_query($koneksi,$sql_p);
                                                while($data_p = mysqli_fetch_row($query_p)){ 
                                                    $username   = $data_p[0];
                                                    $nama       = $data_p[1];
                                                    $lomba      = $data_p[2];
                                            ?>
                                            <tr>
                                                <td scope="row" class="td-nomer"><?= $no ?></td>
                                                <td><?= $username ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= $lomba ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteUser" class="badge badge-danger p-1" onclick="setHapus('<?= $username ?>')"><i class="fas fa-trash"> </i> Delete</a>
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
                <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <p id="dHapus">Apakah anda yakin ingin menghapus akun?</p>
                                    <div class="form-group">
                                        <input type="hidden" class="d-none" name="username" class="form-control" id="dUsername" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-danger" type="submit" name="submit-delete">Delete</button>
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
        function setHapus(username){
          document.getElementById("dUsername").value = username;
        }
    </script>

</body>

</html>
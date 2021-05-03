<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit-lomba"])) {
        if (!empty($_POST["id_lomba"])&&!empty($_POST["nama"])&&!empty($_POST["harga"])) {
            $id_lombaa  = $_POST["id_lomba"];
            $nama_baru  = $_POST["nama"];
            $harga_baru = $_POST["harga"];
            $sql_l = "UPDATE `data_lomba` SET `nama`='$nama_baru',`harga`='$harga_baru' WHERE `id_lomba`='$id_lombaa'";
            mysqli_query($koneksi,$sql_l);
            $notif = "berhasil";
        } else {$notif = "gagal";}
    }
    if (isset($_POST["submit-delete"])) {
        if (!empty($_POST["id_lomba"])) {
            $id_lombaa  = $_POST["id_lomba"];
            mysqli_query($koneksi,"DELETE FROM `user` WHERE `username`='$usernamee'");
            $hapus = "berhasil";
        } else {$hapus = "gagal";}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengaturan Lomba</title>
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
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i>Pengaturan Lomba</h1>
                        <?php
                            if (isset($hapus) && $hapus == "berhasil") { ?>
                                <div class="alert alert-success mt-3" role="alert"> Lomba Berhasil dihapus!</div>
                            <?php } else if (isset($hapus) && $hapus == "gagal") { ?>
                                <div class="alert alert-danger mt-3" role="alert"> Lomba Gagal dihapus!</div>
                            <?php }
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Lomba</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Peserta</th>
                                                <th scope="col" width="50px">Action</th>
                                            
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql_p = "SELECT `nama`, `harga`, `id_lomba` FROM `data_lomba`";
                                                $query_p = mysqli_query($koneksi,$sql_p);
                                                while($data_p = mysqli_fetch_row($query_p)){ 
                                                    $nama      = $data_p[0];
                                                    $harga     = $data_p[1];
                                                    $id_lomba  = $data_p[2];
                                            ?>
                                            <tr>
                                                <td scope="row" class="td-nomer"><?= $no ?></td>
                                                <td><?= $nama ?></td>
                                                <td>Rp. <?= $harga ?></td>
                                                <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `user` WHERE `id_lomba`=$id_lomba")); ?> Tim</td>
                                                <td width="120px">
                                                    <a href="#" data-toggle="modal" data-target="#editLomba" class="badge badge-info p-1" onclick='setLomba("<?= $id_lomba ?>")'><i class="fas fa-edit"></i> Edit</a>
                                                    <p id="<?= $id_lomba ?>" class="d-none"><?php echo $nama.','.$harga ?></p>
                                                    <a href="#" data-toggle="modal" data-target="#deleteLomba" class="badge badge-danger p-1" onclick="setHapus('<?= $id_lomba ?>')"><i class="fas fa-trash"> </i> Delete</a>
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
                <div class="modal fade" id="editLomba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Lomba</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" class="d-none" name="id_lomba" class="form-control" id="eIdLomba" value="">
                                    <div class="form-group">
                                        <label for="nama">Nama Lomba</label>
                                        <input type="text" name="nama" class="form-control" id="eNama" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Harga</label>
                                        <div class="row m-0">
                                            <span class="my-auto mr-2">Rp. </span>
                                            <input type="text" name="harga" class="col-11 form-control" id="eHarga" value="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit" name="submit-lomba">Simpan Lomba</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteLomba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Lomba</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <p id="dHapus">Apakah anda yakin ingin menghapus Lomba ini?</p>
                                    <div class="form-group">
                                        <input type="hidden" class="d-none" name="id_lomba" class="form-control" id="dIdLomba" value="">
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
        function setLomba(IdLomba){
          var dataLomba = (document.getElementById(IdLomba).textContent).split(",");
          document.getElementById("eIdLomba").value = IdLomba;
          document.getElementById("eNama").value = dataLomba[0];
          document.getElementById("eHarga").value = dataLomba[1];
        };
    </script>
    <script type="text/javascript">
        function setHapus(IdLomba){
          document.getElementById("dIdLomba").value = IdLomba;
        }
    </script>

</body>

</html>
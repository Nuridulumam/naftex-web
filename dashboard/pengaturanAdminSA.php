<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php');
    if (isset($_POST["submit-admin"])) {
        if (!empty($_POST["username"])&&!empty($_POST["nama"])&&!empty($_POST["email"])&&!empty($_POST["wa"])&&!empty($_POST["level"])) {
            $usernamee  = $_POST["username"];
            $nama_baru  = $_POST["nama"];
            $email_baru = $_POST["email"];
            $wa_baru    = $_POST["wa"];
            $level_baru = $_POST["level"];
            $sql_u = "UPDATE `admin` SET `nama`='$nama_baru',`email`='$email_baru', `wa`='$wa_baru', `level`='$level_baru' WHERE `username`='$usernamee'";
            mysqli_query($koneksi,$sql_u);
            $notif = "berhasil";
        } else {$notif = "gagal";}
    }
    if (isset($_POST["submit-delete"])) {
        if (!empty($_POST["username"])) {
            $usernamee  = $_POST["username"];
            //get foto
            $query_f = mysqli_query($koneksi,"SELECT `foto` FROM `admin` WHERE `username`='$usernamee'"); 
            $jumlah_f = mysqli_num_rows($query_f); 
            if($jumlah_f>0){ 
                while($data_f = mysqli_fetch_row($query_f)){ 
                  $foto = $data_f[0]; 
                  //menghapus foto 
                  unlink("assets/img/foto/$foto"); 
                } 
            } 
            mysqli_query($koneksi,"DELETE FROM `admin` WHERE `username`='$usernamee'");
            $hapus = "berhasil";
        } else {$hapus = "gagal";}
    }
?>
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

                    <div class="container col-12 card shadow p-5">
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i> Pengaturan Admin & SuperAdmin</h1>
                        <?php
                            if (isset($notif) && $notif == "berhasil") { ?>
                                <div class="alert alert-success mt-3" role="alert"> Data Berhasil disimpan!</div>
                            <?php } else if (isset($notif) && $notif == "gagal") { ?>
                                <div class="alert alert-danger mt-3" role="alert"> Data Gagal disimpan!</div>
                            <?php }
                        ?>
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
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Role</th>
                                                <th scope="col" width="120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql_p = "SELECT `username`, `nama`, `level`, `email`, `wa` FROM `admin` ORDER BY `id_admin` DESC";
                                                $query_p = mysqli_query($koneksi,$sql_p);
                                                while($data_p = mysqli_fetch_row($query_p)){ 
                                                    $username   = $data_p[0];
                                                    $nama       = $data_p[1];
                                                    $level      = $data_p[2];
                                                    $email      = $data_p[3];
                                                    $wa         = $data_p[4];
                                            ?>
                                            <tr>
                                                <th scope="row" class="td-nomer"><?= $no ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= $level ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#editAdmin" class="badge badge-info p-1" onclick='setAdmin("<?= $username ?>")'><i class="fas fa-edit"></i> Edit</a>
                                                    <p id="<?= $username ?>" class="d-none"><?php echo $nama.','.$wa.','.$email.','.$level ?></p>
                                                    <a href="#" data-toggle="modal" data-target="#deleteAdmin" class="badge badge-danger p-1" onclick="setHapus('<?= $username ?>')"><i class="fas fa-trash"> </i> Delete</a>
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
                <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User Admin</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" id="eNama" value="">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="ePlaceholder" placeholder="" disabled>
                                            <input type="hidden" name="username" class="form-control d-none" id="eUsername" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nomorWa">Nomor Whatsapp</label>
                                            <input type="text" name="wa" class="form-control" id="eWa" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="eEmail" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" name="level" class="form-control" id="eLevel" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit" name="submit-admin">Simpan Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Admin</h5>
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
        function setAdmin(username){
          var dataAdmin = (document.getElementById(username).textContent).split(",");
          document.getElementById("ePlaceholder").placeholder = username;
          document.getElementById("eUsername").value = username;
          document.getElementById("eNama").value = dataAdmin[0];
          document.getElementById("eWa").value = dataAdmin[1];
          document.getElementById("eEmail").value = dataAdmin[2];
          document.getElementById("eLevel").value = dataAdmin[3];
        };
    </script>
    <script type="text/javascript">
        function setHapus(username){
          //var dataAd = (document.getElementById(username).textContent).split(",");
          document.getElementById("dUsername").value = username;
          //document.getElementById("dHapus").textContent = "Apakah anda yakin ingin menghapus akun ".dataAd[0]."?";
        }
    </script>

</body>

</html>
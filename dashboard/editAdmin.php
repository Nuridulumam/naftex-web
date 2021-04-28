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

                    <div class="container mt-2 p-5">
                        <div class="row justify-content-center">
                            <div class="card p-5 shadow col-md-8">
                                <div class="head">
                                    <h1 class="h3 text-gray-800 mb-4 "><i class="fas fa-id-card-alt"></i> Edit User Admin
                                        <a href="pengaturanAdminSA.php" class="btn btn-info float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="row mt-2 justify-content-center">
                                    <div class="col-md-10">
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
                                                <input type="text" name="role" class="form-control" id="nomorWA" value="<?= $role ?>">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Profile</button>
                                        </form>
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
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
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card-alt"></i> Biodata Peserta</h1>

                    <div class="container mt-2 card shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <img src="img/undraw_profile.svg" alt="foto-profile" width="170px">
                                <a href="#" class="btn btn-circle bg-light" style="margin: -50px 0 0 110px; position: relative; z-index: 1;"><i class="fas fa-edit "></i></a>
                                <h6 class="h6"> ID : XCJW48</h6>
                            </div>
                            <div class="col-md-7">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputusername">Username</label>
                                            <input type="text" class="form-control" id="inputusername" placeholder="nuridulumam" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputtim">Nama Tim</label>
                                            <input type="text" name="tim" class="form-control" id="inputtim" placeholder="Tim Till Jannah">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputnama">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" id="inputnama" placeholder="Muhammad Nuridul Umam">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenislomba">Jenis Lomba</label>
                                        <input type="text" name="jenis-lomba" class="form-control" id="jenislomba" placeholder="Lomba WWWWW">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputuniv">Universitas</label>
                                            <input type="text" name="universitas" class="form-control" id="inputuniv" placeholder="Universitas Brawijaya">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Kota</label>
                                            <select id="inputprovinsi" name="kota" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputprovinsi">Provinsi</label>
                                            <select id="inputprovinsi" name="provinsi" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Edit Profile</button>
                                    <button type="submit" class="btn btn-primary">Simpan Profile</button>
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

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "include/script.php" ?>
</body>

</html>
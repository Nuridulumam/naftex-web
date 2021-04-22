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
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <div class="row">
                                    <div class="col-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Get Started</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Biodata Ketua</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Biodata Anggota 1</a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Biodata Anggota 2</a>
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
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <h4 class="h5 p-3 rounded font-weight-bold shadow text-dark">Biodata Ketua Tim</h4>
                                                <hr class="sidebar-divider">
                                                <form class="shadow p-3 rounded">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputusername">Nama Depan</label>
                                                            <input type="text" class="form-control" id="inputusername">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputtim">Nama Belakang</label>
                                                            <input type="text" name="tim" class="form-control" id="inputtim">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputnama">Universitas</label>
                                                        <input type="text" name="nama" class="form-control" id="inputnama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenislomba">Tanggal Lahir</label>
                                                        <input type="text" name="jenis-lomba" class="form-control" id="jenislomba">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputuniv">Alamat Lengkap</label>
                                                            <input type="text" name="universitas" class="form-control" id="inputuniv">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputCity">Kota/Kabupaten</label>
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
                                                    <div class="alert alert-success mt-3" role="alert">
                                                        Data Berhasil di Simpan!
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
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
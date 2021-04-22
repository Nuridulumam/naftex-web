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

                    <div class="container mt-2 card bg-light shadow p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 p-3 rounded-lg">
                                <form>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Example input placeholder">
                                    </div>
                                    <div class="form-group">
                                        <label for="tim">Nama Tim</label>
                                        <input type="text" class="form-control" id="tim" placeholder="Another input placeholder">
                                    </div>
                                    <div class="form-group">
                                        <label for="tim">Mata Lomba</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-row">
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
                                    </div>
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
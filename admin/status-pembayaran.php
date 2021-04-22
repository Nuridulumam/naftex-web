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
                                <h2>Status Pembayaran: <span class="badge badge-success">Berhasil</span></h2>
                                <h2>Status Pembayaran: <span class="badge badge-warning">Pending</span></h2>
                                <h1>Status Pembayaran: <span class="badge badge-secondary">Belum</span></h1>
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
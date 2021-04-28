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
                                <img src="assets/img/pembayaran.jpg" alt="pembayaran" height="400px">
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
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

                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-key"></i> Ubah Password</h1>
                    <div class="container mt-2 card shadow p-5">
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="img/password.jpg" alt="foto-profile" height="270px">
                            </div>
                            <div class="col-md-4">
                                <form>
                                    <div class="form-group">
                                        <label for="inputusername">Username</label>
                                        <input type="text" name="username" class="form-control shadow" id="inputusername" placeholder="nuridulumam" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordlama">Password Lama</label>
                                        <input type="password" name="passwordlama" class="form-control shadow" id="passwordlama" placeholder="ahdvbas">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordbaru">Password Baru</label>
                                        <input type="password" name="passwordbaru" class="form-control shadow" id="passwordbaru" placeholder="ahdvbas">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</i></button>
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
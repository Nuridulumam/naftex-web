<?php  
    include('../koneksi/koneksi.php'); 
    include('include/session.php');  
?> 
<!DOCTYPE html>
<html lang="en">
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
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang, <?= $nama ?></h1>

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
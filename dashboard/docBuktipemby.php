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
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-file"></i> Bukti Pembayaran Tim</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID Tim</th>
                                                <th scope="col">Nama Tim</th>
                                                <th scope="col">Bukti Pembayaran</th>
                                                <th scope="col">Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>IUGSD241</td>
                                                <td>Auto Win</td>
                                                <td>
                                                    <a data-toggle="collapse" href="#buktitimid1" role="button" aria-expanded="false" aria-controls="buktitimid=1">
                                                        isi temp nama foto nya .jpg </nya>
                                                    </a>
                                                    <div class="collapse" id="buktitimid1">
                                                        <img src="assets/img/user/bukti-pembayaran/bukti pembayran tim 1.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" class="badge badge-info p-1"><i class="fas fa-check"></i> Confirm</a>
                                                    <a href="#" class="badge badge-success p-1"><i class="fas fa-check-double"> Verified</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>DFAIB21</td>
                                                <td>Always Win</td>
                                                <td>
                                                    <a data-toggle="collapse" href="#buktitimid2" role="button" aria-expanded="false" aria-controls="buktitimid=1">
                                                        isi temp nama fotonya .jpg </nya>
                                                    </a>
                                                    <div class="collapse" id="buktitimid2">
                                                        <img src="assets/img/user/bukti-pembayaran/bukti pembayran tim 2.jpg" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" class="badge badge-info p-1"><i class="fas fa-check"></i> Confirm</a>
                                                    <a href="#" class="badge badge-success p-1"><i class="fas fa-check-double"> Verified</i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
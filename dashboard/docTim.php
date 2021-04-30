<?php
    include('../koneksi/koneksi.php'); 
    include('include/session.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dokumen Tim</title>
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
                        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-file"></i> Dokumen Tim</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID Tim</th>
                                                <th scope="col">Nama Tim</th>
                                                <th scope="col">Asal Universitas</th>
                                                <th scope="col">Berkas Upload</th>
                                                <th scope="col" width="120px">Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>IUGSD241</td>
                                                <td>Auto Win</td>
                                                <td>Universitas Diponegoro</td>
                                                <td>
                                                    <a href="#">dokumen1.pdf</a> <br>
                                                    <a href="#">dokumen1.pdf</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="badge badge-info p-1"><i class="fas fa-check"></i> Confirm</a>
                                                    <a href="#" class="badge badge-danger p-1"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>DFAIB21</td>
                                                <td>Always Win</td>
                                                <td>Universitas Brawijaya</td>
                                                <td>
                                                    <a href="#">dokumen1.pdf</a> <br>
                                                    <a href="#">dokumen1.pdf</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="badge badge-info p-1"><i class="fas fa-check"></i> Confirm</a>
                                                    <a href="#" class="badge badge-danger p-1"><i class="fas fa-trash"></i> Delete</a>
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
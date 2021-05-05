<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Project <sup>NAFTEX</sup></div>
    </a>
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />

    <?php 
        if ($level=="peserta") {
    ?>
    <!-- #USER -->
    <div class="sidebar-heading">User</div>
    <!-- Nav Item - Pofile -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bioUser" aria-expanded="true" aria-controls="bioUser">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="bioUser" class="collapse" aria-labelledby="headBiodata" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Profile:</h6>
                <a class="collapse-item" href="bioTim.php">Biodata Tim</a>
                <a class="collapse-item" href="bioAnggota.php">Biodata Anggota</a>
                <a class="collapse-item" href="editpassword.php">Ubah Password</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Rulebook -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#downloads" aria-expanded="true" aria-controls="downloads">
            <i class="fas fa-fw fa-download"></i>
            <span>Petunjuk Lomba</span>
        </a>
        <div id="downloads" class="collapse" aria-labelledby="headPetunjuk" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Petunjuk lomba:</h6>
                <a class="collapse-item" href="buttons.html">Rulebook</a>
                <a class="collapse-item" href="cards.html">Petunjuk Pelaksanaan</a>
                <a class="collapse-item" href="cards.html">Rundown</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pembayaran Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payments" aria-expanded="true" aria-controls="payments">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Pembayaran</span>
        </a>
        <div id="payments" class="collapse" aria-labelledby="headFormulirPemb" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Pembayaran:</h6>
                <a class="collapse-item" href="formulir-pembayaran.php">Formulir Pembayaran</a>
                <!-- <a class="collapse-item" href="status-pembayaran.php">Status Pembayaran</a> -->
                <a class="collapse-item" href="utilities-border.html">Cara Pembayaran</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Upload Berkas -->
    <li class="nav-item">
        <a class="nav-link" href="docUpload.php">
            <i class="fas fa-fw fa-upload"></i>
            <span>Upload Dokumen</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dokumenupload" aria-expanded="true" aria-controls="dokumenupload">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Dokumen Upload</span>
        </a>
        <div id="dokumenupload" class="collapse" aria-labelledby="headUplDokumen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman dokumen:</h6>
                <a class="collapse-item" href="utilities-color.html">Upload Proposal</a>
                <a class="collapse-item" href="utilities-color.html">Upload Surat Keterangan</a>
                <a class="collapse-item" href="utilities-border.html">Upload KTM</a>
            </div>
        </div>
    </li> -->

    <hr class="sidebar-divider d-none d-md-block" />
    <!-- #Akhir USER -->
    <?php } ?>

    <?php 
        if ($level=="admin"||$level=="superadmin") {
    ?>
    <!-- #ADMIN & SuperADMIN -->
    <div class="sidebar-heading">Admin / SuperAdmin</div>
    <!-- Nav Item - Pofile -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bioAdmin" aria-expanded="true" aria-controls="bioAdmin">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="bioAdmin" class="collapse" aria-labelledby="headBioadmin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Profile:</h6>
                <a class="collapse-item" href="bioAdmin.php">Biodata</a>
                <a class="collapse-item" href="editpasswordAdmin.php">Ubah Password</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Dokumen -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#docadmin" aria-expanded="true" aria-controls="docadmin">
            <i class="fas fa-fw fa-users"></i>
            <span>Dokumen</span>
        </a>
        <div id="docadmin" class="collapse" aria-labelledby="headListDokumen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Dokumen:</h6>
                <a class="collapse-item" href="docTim.php">Dokumen Perlombaan</a>
                <a class="collapse-item" href="docBuktipemby.php">Bukti Pembayaran</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Website -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#website" aria-expanded="true" aria-controls="website">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Website</span>
        </a>
        <div id="website" class="collapse" aria-labelledby="headListWebsite" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Website:</h6>
                <a class="collapse-item" href=".php">Berita</a>
                <a class="collapse-item" href=".php">Kompetisi</a>
                <a class="collapse-item" href=".php">Seminar</a>
                <a class="collapse-item" href=".php">Faq</a>
                <a class="collapse-item" href=".php">About Us</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Lomba -->
    <li class="nav-item">
        <a class="nav-link" href="lomba.php">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Lomba</span>
        </a>
    </li>
    <?php
        if ($level=="superadmin") { ?>
            <!-- Nav Item - PengaturanUser -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageUser" aria-expanded="true" aria-controls="manageUser">
                    <i class="fas fa-fw fa-users"></i>
                    <span>PengaturanUser</span>
                </a>
                <div id="manageUser" class="collapse" aria-labelledby="headListPengaturanUser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Halaman Pengaturan User:</h6>
                        <a class="collapse-item" href="pengaturanAdminSA.php">Admin & Superadmin</a>
                        <a class="collapse-item" href="pengaturanUserPS.php">Peserta</a>
                    </div>
                </div>
            </li>
        <?php }
    ?>
    

    <hr class="sidebar-divider d-none d-md-block" />
    <!-- #Akir ADMIN & SuperADMIN -->
    <?php } ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card">
        <img class="sidebar-card-illustration mb-2" src="assets/img/undraw_rocket.svg" alt="" />
        <p class="text-center mb-2"><strong>Pengumuman!</strong> pendaftaran akan di <b>tutup</b> 3 hari lagi!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Bayar!</a>
    </div>
</ul>
<!-- End of Sidebar -->
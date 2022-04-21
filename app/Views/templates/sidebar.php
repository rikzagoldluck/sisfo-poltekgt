<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISFO PGT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">



    <!-- Heading -->
    <div class="sidebar-heading">
        Papan Informasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Papan Informasi</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>IPK</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student/poin'); ?>">
            <i class="fas fa-fw fa-hammer"></i>
            <span>Poin/Kondite</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Presensi
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student/presensi_magang'); ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Magang</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        PROFIL
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('student/profil'); ?>">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Profil</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
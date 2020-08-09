<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Eldora Vet Clinic</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="./">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Akun
    </div>

    <li class="nav-item">
        <a href="<?= base_url('member/'); ?>" class="nav-link">
            <i class="fas fa-fw fa-bars"></i>
            <span>Ajukan Jadwal Konsultasi</span></a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('member/'); ?>" class="nav-link">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Konsultasi Dengan Dokter</span></a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('member/data_pet'); ?>" class="nav-link">
            <i class="fas fa-fw fa-paw"></i>
            <span>Data Peliharaan</span></a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('member/'); ?>" class="nav-link">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Medical Record Peliharaan</span></a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('member/edit_profile'); ?>" class="nav-link">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Ubah Akun</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Keluar -->
    <li class="nav-item">
        <a href="<?= base_url('home/logout'); ?>" class="nav-link">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
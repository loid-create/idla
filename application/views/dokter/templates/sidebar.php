<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Eldora Vet Clinic</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Akun
    </div>

    <!-- <li class="nav-item">
        <a href="<?= base_url('dokter/jadwal'); ?>" class="nav-link">
            <i class="fas fa-fw fa-bars"></i>
            <span>Lihat Jadwal Janji Member</span></a>
    </li> -->

    <li class="nav-item">
        <a href="<?= base_url('dokter/konsultasi_online'); ?>" class="nav-link">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Lihat Konsultasi Member</span></a>
    </li>

    <!-- <li class="nav-item">
        <a href="<?= base_url('dokter/medical_record'); ?>" class="nav-link">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Medical Record</span></a>
    </li> -->

    <li class="nav-item">
        <a href="<?= base_url('dokter/edit_profile'); ?>" class="nav-link">
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
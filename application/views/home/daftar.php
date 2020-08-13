<!--Navbar Start-->
<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand logo text-uppercase" href="index.html">
            Eldora Vet Clinic
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                <li class="nav-item">
                    <a href="<?= base_url('home'); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/tentang'); ?>" class="nav-link">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/kontak'); ?>" class="nav-link">Kontak</a>
                </li>
                <li class="nav-item active">
                    <a href="<?= base_url('home/daftar'); ?>" class="nav-link">Daftar</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/masuk'); ?>" class="nav-link">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- contact start -->
<section class="section bg-light" id="contact">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?php base_url('home/daftar'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama lengkap" value="<?= set_value('name'); ?>">
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class=" form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password..">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password..">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
                                    </form>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('home/masuk'); ?>">Sudah memiliki akun ? Masuk!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- contact end -->
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <title>Eldora Vet Clinic</title>

    <link rel="shortcut icon" href="<?= base_url('assets/'); ?><?= base_url('assets/'); ?>images/favicon.ico">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600|Raleway:500,700" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css" type="text/css">

    <!-- themify-icons -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/themify-icons.css">

    <!-- magnific-popup css  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/magnific-popup.css" />

    <!--slider-->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.theme.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.transitions.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/style.css" />

</head>

<body>

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
                    <li class="nav-item active">
                        <a href="<?= base_url('home/kontak'); ?>" class="nav-link">Kontak</a>
                    </li>
                    <li class="nav-item">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center mb-5">
                        <h3 class="font-weight-bold">Kontak</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-form mt-3">
                        <div id="message"></div>
                        <?= $this->session->flashdata('message'); ?>
                        <form method="POST" action="<?php base_url('home/kontak'); ?>" name="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Nama kamu..." value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input name="email" id="email" type="text" class="form-control" placeholder="Email kamu..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input name="subject" id="subject" type="text" class="form-control" placeholder="Subjek kamu..." value="<?= set_value('subject'); ?>">
                                        <?= form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="comments">Message</label>
                                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Pesan kamu..."></textarea>
                                        <?= form_error('comments', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom" value="Kirim Pesan">
                                    <div id="simple-msg"></div>
                                </div>
                            </div>
                        </form>
                        <!-- /form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->

    <!-- footer start -->
    <footer class="section bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-desc text-center mt-4 p-4">
                        <div class="contact-icon mb-3">
                            <i class="ti-location-pin text-custom h3"></i>
                        </div>
                        <div class="contact-details text-white">
                            <p class="mb-0">Jl. Gunung Krakatau No.261, Pulo Brayan Darat I, Kec. Medan Tim., Kota Medan, Sumatera Utara 20236</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-desc text-center mt-4 p-4">
                        <div class="contact-icon mb-3">
                            <i class="ti-mobile text-custom h3"></i>
                        </div>
                        <div class="contact-details text-white">
                            <p class="mb-0">+628126494668</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-desc text-center mt-4 p-4">
                        <div class="contact-icon mb-3">
                            <i class="ti-email text-custom h3"></i>
                        </div>
                        <div class="contact-details text-white">
                            <p class="mb-0">example@abc.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="text-center ">
                        <ul class="social-icons list-inline">
                            <li class="list-inline-item"><a href="#" class=""><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="ti-twitter-alt"></i></a></li>
                        </ul>
                    </div>
                    <div class="text-center text-white mt-4">
                        <p class="copyright-desc">2020 &copy; Eldora Vet Clinic | All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top"> <i class="ti-angle-up"> </i> </a>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <!-- javascript -->
    <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/scrollspy.min.js"></script>
    <!-- text-animte -->
    <script src="<?= base_url('assets/'); ?>js/anime.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= base_url('assets/'); ?>js/jquery.magnific-popup.min.js"></script>
    <!-- filter -->
    <script src="<?= base_url('assets/'); ?>js/isotope.js"></script>
    <script src="<?= base_url('assets/'); ?>js/masonry.pkgd.min.js"></script>
    <!-- carousel -->
    <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>
</body>

</html>
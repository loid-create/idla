<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css">

    <style>
        .fileDiv {
            position: relative;
            overflow: hidden;
        }

        .upload_attachmentfile {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .btnFileOpen {
            margin-top: -50px;
        }

        .direct-chat-warning .right>.direct-chat-text {
            background: #d2d6de;
            border-color: #d2d6de;
            color: #444;
            text-align: right;
        }

        .direct-chat-primary .right>.direct-chat-text {
            background: #3c8dbc;
            border-color: #3c8dbc;
            color: #fff;
            text-align: right;
        }

        .spiner .fa-spin {
            font-size: 24px;
        }

        .attachmentImgCls {
            width: 450px;
            margin-left: -25px;
            cursor: pointer;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
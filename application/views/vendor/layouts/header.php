<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" href="<?= base_url('/app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('/app-assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/vendors.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/extensions/nouislider.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/extensions/toastr.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/forms/select/select2.min.css') ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/bootstrap-extended.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/colors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/components.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/themes/dark-layout.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/themes/bordered-layout.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/themes/semi-dark-layout.css') ?>">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/pickers/form-pickadate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/form-validation.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/pickers/form-pickadate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/form-wizard.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/plugins/extensions/ext-component-sliders.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/plugins/extensions/ext-component-toastr.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/app-assets/css/plugins/forms/form-number-input.css') ?>">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/style.css') ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="<?= base_url('/') ?>"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                    <h2 class="brand-text mb-0">Pengadaan PPKS</h2>
                </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
           <!-- Notifikasi -->
            <ul class="nav navbar-nav align-items-center ml-auto">
                <?php if($this->session->userdata('email')): $username = $this->session->userdata('username'); ?>
                <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up"><?= count($this->Penawaran_pengadaan_model->getAllNotifikasiMitra($this->session->userdata('id_mitra'))) ?></span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifikasi</h4>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <?php if($this->session->userdata('id_mitra')): ?>
                                <?php if(count($this->Penawaran_pengadaan_model->getAllNotifikasiMitra($this->session->userdata('id_mitra'))) > 0): ?>
                                    <div class="media d-flex align-items-start">
                                        <div class="media-body">
                                            <p class="media-heading"><span class="font-weight-bolder">Penawaran</span></p><small class="notification-text"></small>
                                        </div>
                                    </div>
                                    <?php 
                                    $notifikasi = $this->Penawaran_pengadaan_model->getAllNotifikasiMitra($this->session->userdata('id_mitra'));
                                    foreach($notifikasi as $value):
                                    ?>
                                    <a class="d-flex" href="<?= base_url('negosiasiPekerjaan/detail/'.$value['nomor_penawaran']) ?>">   
                                        <div class="media d-flex align-items-start">
                                            <div class="media-body">
                                                <p class="media-heading"><span class="font-weight-bolder"></span><b>[<?= $this->Penawaran_pengadaan_model->getStatus()[$value['status_penawaran']] ?>]</b> Penawaran dengan nomor <b><?= $value['nomor_penawaran'] ?></b></p><small class="notification-text"> <?= $value['waktu'] ?></small>
                                            </div>
                                        </div>
                                    </a>
                            <?php endforeach; endif; endif;?>
                        </li>
                    </ul>
                </li>
               <li class="nav-item dropdown dropdown-notification mr-25">
                   <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"><?= $this->session->userdata('email') ?></span><span class="user-status">Online</span></div><span class="avatar"><img class="round" src="<?= base_url('/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                       </a>
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                           <a class="dropdown-item" href="<?= base_url('site/resetPassword/'.$this->session->userdata('id')) ?>"><i class="mr-50" data-feather="key"></i>Reset Password</a>
                           <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="mr-50" data-feather="power"></i> Logout</a>
                       </div>
                   </li>
               </li>
               <!-- End Notifikasi -->
               <?php else: ?>
                   <li class="nav-item dropdown dropdown-user">
                       <a href="<?= base_url('/auth/signin') ?>" class="btn btn-primary mr-1">Masuk</a>
                       <a href="<?= base_url('/auth/signup') ?>" class="btn btn-outline-primary">Daftar</a>
                   </li>
               <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->
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
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/select/select2.min.css') ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap-extended.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/colors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/components.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/themes/dark-layout.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/themes/bordered-layout.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/themes/semi-dark-layout.css') ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/plugins/forms/form-validation.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/pages/page-auth.css') ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="<?= base_url('/') ?>">
                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
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
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h2 class="brand-text text-primary ml-1">Pengadaan PPKS</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?= base_url('app-assets/images/pages/register-v2-dark.svg') ?>" alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <?php if($this->session->flashdata('success')): ?>
                                    <div class="col-md-12 p-0 mt-2">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Sukses
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </h4>
                                            <div class="alert-body">
                                                <?= $this->session->flashdata('success') ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif($this->session->flashdata('failed')): ?>
                                    <div class="col-md-12 p-0 mt-2">
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Gagal
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </h4>
                                            <div class="alert-body">
                                                <?= $this->session->flashdata('failed') ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <h2 class="card-title font-weight-bold mb-1">Buat Akun Baru</h2>
                                <p class="card-text mb-2">Buat akun baru anda untuk memulai menjadi Mitra Rekanan di pengadaan PPKS</p>
                                <form class="auth-register-form mt-2" action="<?= base_url('/auth/signup'); ?>" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="nama">Nama Perusahaan</label>
                                        <input class="form-control" id="nama" type="text" name="nama" placeholder="CV. Mitra Rekanan" aria-describedby="nama" autofocus="" tabindex="1" value="<?= set_value('nama') ?>" />
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="jenis_bidang">Jenis Bidang</label>
                                        <br>
                                        <input type="checkbox" name="is_pengadaan" value="1" class="mt-1" <?= set_select('is_pengadaan', '1', FALSE); ?>> Pengadaan
                                        <input type="checkbox" name="is_konstruksi" value="1" class="mt-1 ml-1" <?= set_select('is_konstruksi', '1', FALSE); ?>> Konstruksi
                                        <input type="checkbox" name="is_konsultasi" value="1" class="mt-1 ml-1" <?= set_select('is_konsultasi', '1', FALSE); ?>> Konsultasi
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="id_provinsi">Provinsi</label>
                                        <select name="id_provinsi" class="select2 form-control" id="id_provinsi">
                                            <option value="" disabled selected>- Pilih Provinsi -</option>
                                            <?php if(count($provinsi) > 0): foreach($provinsi as $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['provinsi'] ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_provinsi') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="id_kota">Kota</label>
                                        <select name="id_kota" class="select2 form-control" id="id_kota">
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kota') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="id_kecamatan">Kecamatan</label>
                                        <select name="id_kecamatan" class="select2 form-control" id="id_kecamatan">
                                        </select>
                                        <small class="text-danger"><?= form_error('id_kecamatan') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat"></textarea>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="no_telephone">No. Telephone/Handphone</label>
                                        <input class="form-control" id="no_telephone" type="text" name="no_telephone" placeholder="08123456789" aria-describedby="no_telephone" autofocus="" tabindex="1" value="<?= set_value('no_telephone') ?>" />
                                        <small class="text-danger"><?= form_error('no_telephone') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="nomor_npwp">No. NPWP</label>
                                        <input class="form-control" id="nomor_npwp" type="text" name="nomor_npwp" placeholder="1234567890" aria-describedby="nomor_npwp" autofocus="" tabindex="1" value="<?= set_value('nomor_npwp') ?>" />
                                        <small class="text-danger"><?= form_error('nomor_npwp') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="nama_direktur">Nama Petinggi (Direktur/Owner/CEO)</label>
                                        <input class="form-control" id="nama_direktur" type="text" name="nama_direktur" placeholder="Adi Budi Lubis" aria-describedby="nama_direktur" autofocus="" tabindex="1" value="<?= set_value('nama_direktur') ?>"/>
                                        <small class="text-danger"><?= form_error('nama_direktur') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email" placeholder="admibudi@example.com" aria-describedby="email" tabindex="2" value="<?= set_value('email') ?>"/>
                                        <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="????????????????????????" aria-describedby="password" tabindex="3" value="<?= set_value('password') ?>"/>
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                        <small class="text-danger"><?= form_error('password') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="confirm_password">Konfirmasi Password</label>
                                        <div class="input-group input-group-merge form-confirm_password-toggle">
                                            <input class="form-control form-control-merge" id="confirm_password" type="password" name="confirm_password" placeholder="????????????????????????" aria-describedby="password" tabindex="3" value="<?= set_value('confirm_password') ?>"/>
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                        <small class="text-danger"><?= form_error('confirm_password') ?></small>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="5">Buat Akun</button>
                                </form>
                                <p class="text-center mt-2"><span>Sudah Punya Akun?</span><a href="<?= base_url('/auth/signin') ?>"><span>&nbsp;Masuk</span></a></p>
                                
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('app-assets/js/scripts/pages/page-auth-register.js') ?>"></script>
    <!-- END: Page JS-->

     <!-- BEGIN: Page JS-->
     <script src="<?= base_url('app-assets/js/scripts/forms/form-select2.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/scripts/forms/form-input-mask.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/scripts/extensions/ext-component-blockui.js') ?>"></script>
    <!-- END: Page JS-->

    <script src="<?= base_url('/assets/js/select_area.js') ?>"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
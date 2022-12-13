<?php 
$path_only = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url('/') ?>">
                            <h2 class="brand-text mb-0">Pengadaan PPKS</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item <?= basename($path_only) == 'pengadaanppks' || basename($path_only) == '/' || basename($path_only) == '' || basename($path_only) == 'site' ? 'active' : '' ?> "><a class="nav-link d-flex align-items-center" href="<?= base_url('/') ?>"><span data-i18n="">Beranda</span></a></li>
                    <?php if($this->session->userdata('id_mitra')): ?>
                    <?php $mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($this->session->userdata('id_mitra')); if($mitra_rekanan['status'] == 3): ?>
                    <li class="nav-item <?= basename($path_only) == 'paketPekerjaan' ? 'active' : '' ?>"><a class="nav-link d-flex align-items-center" href="<?= base_url('/paketPekerjaan') ?>"><span data-i18n="paketPekerjaan">Paket Pekerjaan</span></a></li>
                    <li class="nav-item <?= basename($path_only) == 'negosiasiPekerjaan' ? 'active' : '' ?>"><a class="nav-link d-flex align-items-center" href="<?= base_url('/negosiasiPekerjaan') ?>"><span data-i18n="negosiasiPekerjaan">Penawaran</span></a></li>
                    <li class="nav-item <?= basename($path_only) == 'dealPekerjaan' ? 'active' : '' ?>"><a class="nav-link d-flex align-items-center" href="<?= base_url('/dealPekerjaan') ?>"><span data-i18n="dealPekerjaan">Pekerjaan</span></a></li>
                    <?php endif; ?>
                    <li class="nav-item <?= basename($path_only) == 'profile' ? 'active' : '' ?>"><a class="nav-link d-flex align-items-center" href="<?= base_url('/site/profile') ?>"><span data-i18n="profile">Profile Mitra Rekanan</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->
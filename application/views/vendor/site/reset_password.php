<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title"><?= $title ?></h4>
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
                        </div>
                        <div class="card-body mt-2">
                            <form action="<?= base_url('site/resetPassword') ?>" method="POST">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong><i style="color:red; font-size: 28px;">&#8902</i> Password Baru:</strong>
                                            <input type="password" name="password" class="form-control" placeholder="password" required>
                                            <small class="text-danger"><?= form_error('password') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong><i style="color:red; font-size: 28px;">&#8902</i> Konfirmasi Password Baru:</strong>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password Baru" required>
                                            <small class="text-danger"><?= form_error('confirm_password') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                        <button type="submit" class="btn btn-primary col-md-12 btn-section-block">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
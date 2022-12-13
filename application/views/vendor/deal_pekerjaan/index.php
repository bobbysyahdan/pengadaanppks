<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="ajax-datatable">
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
                            <div class="card-body">
                                <div class="card-datatable">
                                    <table class="datatables-ajax table table" id="table_id"> 
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Bidang Pekerjaan</th>
                                                <th>Nomor Paket Pekerjaan</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($penawaran) > 0):
                                                foreach($penawaran as $key => $value): 
                                                    $nomor_penawaran = $value['nomor_penawaran'];
                                            ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td>
                                                    <?php if($value['jenis_bidang'] == 'Pengadaan') : ?>
                                                    <div class="badge badge-light-success">Pengadaan</div>
                                                    <?php elseif($value['jenis_bidang'] == 'Konstruksi') : ?>
                                                    <div class="badge badge-light-warning">Konstruksi</div>
                                                    <?php elseif($value['jenis_bidang'] == 'Konsultasi') : ?>
                                                    <div class="badge badge-light-info">Konsultasi</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $value['nomor_paket_pekerjaan'] ?></td>
                                                <td>
                                                    <a href="<?= base_url("/dealPekerjaan/detail/$nomor_penawaran") ?>" class="btn btn-info">Detail Pekerjaan</a>
                                                </td>
                                            </tr>
                                            <?php 
                                                endforeach; 
                                                endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->


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
                                                <th>Nomor Penawaran</th>
                                                <th>Dari Paket Pekerjaan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                <td><?= $value['nomor_penawaran'] ?></td>
                                                <td><?= $value['nomor_paket_pekerjaan'] ?></td>
                                                <td><?php if($value['status_penawaran'] == 0): ?>
                                                        <p class="text-warning">Pengajuan Penawaran</p>
                                                    <?php elseif($value['status_penawaran'] == 1): ?>
                                                        <p class="text-success">Disetujui Pengadaan PPKS</p>
                                                    <?php elseif($value['status_penawaran'] == 2): ?>
                                                        <p class="text-info">Penawaran Balasan Dari Pengadaan PPKS</p>
                                                    <?php elseif($value['status_penawaran'] == 4): ?>
                                                        <p class="text-success">Disetujui Kedua Pihak</p>
                                                    <?php elseif($value['status_penawaran'] == 9): ?>
                                                        <p class="text-danger">Dibatalkan Pengadaan PPKS</p>
                                                    <?php elseif($value['status_penawaran'] == 5): ?>
                                                        <p class="text-danger">Dibatalkan Mitra Rekanan</p>
                                                    <?php elseif($value['status_penawaran'] == 6): ?>
                                                        <p class="text-warning">Permintaan Penawaran Awal</p>
                                                    <?php elseif($value['status_penawaran'] == 7): ?>
                                                        <p class="text-success">Proses Pekerjaan</p>
                                                    <?php elseif($value['status_penawaran'] == 8): ?>
                                                        <p class="text-success">Pekerjaan Selesai</p>
                                                    <?php elseif($value['status_penawaran'] == 3): ?>
                                                        <p class="text-danger">Ditolak Pengadaan PPKS</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href='<?= base_url("/negosiasiPekerjaan/detail/$nomor_penawaran") ?>' class="btn btn-info mb-1">Detail Penawaran</a>
                                                    <?php if($value['status_penawaran'] == 0): ?>
                                                        <a href="<?= base_url('/negosiasiPekerjaan/update/'.$value['nomor_penawaran']) ?>" class="btn btn-primary mb-1">Ubah Penawaran</a>
                                                        <a href="<?= base_url('/negosiasiPekerjaan/delete/'.$value['nomor_penawaran']) ?>" class="btn btn-danger mb-1" onclick="return confirm('Apakah anda yakin ? ')">Hapus Penawaran</a>
                                                    <?php elseif($value['status_penawaran'] == 2): ?>
                                                        <a href="<?= base_url('/negosiasiPekerjaan/updateDisetujuiMitraRekanan/'.$nomor_penawaran) ?>" class="btn btn-success mb-1" onclick="return confirm('Anda sepakat dengan penawaran balasan dari Pengadaan PPKS. Apakah anda yakin ? ')">Disetujui Balasan Penawaran</a>
                                                        <a href="<?= base_url('/negosiasiPekerjaan/updatePermintaanNegosiasiAwal/'.$nomor_penawaran) ?>" class="btn btn-warning mb-1" onclick="return confirm('Jika penawaran awal anda ditolak Pengadaan PPKS maka penawaran anda akan dibatalkan. Dan jika penawaran awal anda disetujui, maka penawaran awal anda terpilih. Apakah anda yakin ? ') ">Permintaan Negosiasi Awal</a>
                                                        <a href="<?= base_url('/negosiasiPekerjaan/updateDibatalkanMitraRekanan/'.$nomor_penawaran) ?>" class="btn btn-danger mb-1" onclick="return confirm('Penawaran anda pada tender ini akan dibatalkan. Apakah anda yakin ? ')">Batalkan Penawaran</a>
                                                    <?php elseif($value['status_penawaran'] == 1): ?>
                                                        <a href="<?= base_url("/negosiasiPekerjaan/updateDisetujuiMitraRekanan/$nomor_penawaran") ?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-success mb-1">[KLIK] Disetujui</a>
                                                        <a href="" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger mb-1">[KLIK] Dibatalkan</a>
                                                    <?php endif; ?>
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


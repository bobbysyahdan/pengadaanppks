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
                                                <th>Nomor Paket Pekerjaan</th>
                                                <th>Bidang Pekerjaan</th>
                                                <th>Kode KBLI</th>
                                                <th>Tanggal Mulai Penawaran</th>
                                                <th>Tanggal Akhir Penawaran</th>
                                                <th>Jumlah Pekerjaan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($paket_pekerjaan) > 0):
                                                foreach($paket_pekerjaan as $key => $value): 
                                                $tug_3 = str_replace('/','-', $value['tug_3']);
                                                $nomor_paket_pekerjaan = $value['nomor_paket_pekerjaan'];
                                            ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><b><?= $value['nomor_paket_pekerjaan'] ?></b></td>
                                                <td>
                                                    <?php if($value['jenis_bidang'] == 'Pengadaan') : ?>
                                                    <div class="badge badge-light-info">Pengadaan</div>
                                                    <?php elseif($value['jenis_bidang'] == 'Konstruksi') : ?>
                                                    <div class="badge badge-light-warning">Konstruksi</div>
                                                    <?php elseif($value['jenis_bidang'] == 'Konsultasi') : ?>
                                                    <div class="badge badge-light-primary">Konsultasi</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php  $kode_kbli = explode(',', $value['kode_kbli']); ?>
                                                    <?php foreach($kode_kbli as $kbli):?>
                                                        <p><?= $kbli ?></p>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td><?= $value['tgl_mulai_tender'] ?></td>
                                                <td><?= $value['tgl_akhir_tender'] ?></td>
                                                <td><?= count($this->Penawaran_pengadaan_model->getAllByNomorPaketPekerjaan($value['nomor_paket_pekerjaan'])) ?></td>
                                                <td>
                                                    <?php if($value['tanggal_akhir_tender'] > date('Y-m-d')): ?>
                                                        <?php if($value['status_paket_pekerjaan'] == 5 || $value['status_paket_pekerjaan'] == 3 || $value['status_paket_pekerjaan'] == 4): ?>
                                                            <p class="text-success">Proses Penawaran Selesai</p>
                                                        <?php elseif($value['status_paket_pekerjaan'] == 6): ?>
                                                            <p class="text-danger">Dibatalkan oleh Pengadaan PPKS</p>
                                                        <?php else: ?>
                                                            <p class="text-warning">Sedang Berlangsung Proses Penawaran</p>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <p class="text-success">Waktu Negosiasi Selesai</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($this->session->userdata('id_mitra')): ?>
                                                        <?php $cek_penawaran = $this->Penawaran_pengadaan_model->getAllByIdMitraIdPaketPekerjaan($this->session->userdata('id_mitra'), $value['id']); ?>
                                                        <a href='<?= base_url("/paketPekerjaan/detail/$nomor_paket_pekerjaan") ?>' class="btn btn-info mb-1">Detail Pekerjaan</a>
                                                        <?php if(count($cek_penawaran) == 0): ?>
                                                        <a href='<?= base_url("/paketPekerjaan/tambahPengajuanPenawaran/$nomor_paket_pekerjaan") ?>' class="btn btn-primary mb-1">Tambah Pengajuan Penawaran</a>
                                                        <?php else:
                                                            $nomor_penawaran = $cek_penawaran[0]['nomor_penawaran'];
                                                        ?>
                                                        <a href='<?= base_url("/negosiasiPekerjaan/detail/$nomor_penawaran") ?>' class="btn btn-warning mb-1">Lihat Penawaran Anda</a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        Anda harus <a class="text-primary" href="<?= base_url('auth/signin') ?>">Masuk</a> atau <a class="text-primary" href="href="<?= base_url('auth/signin') ?>> Daftar </a>terlebih dahulu
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
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="breadcrumb-wrapper">
                            <a href="Javascript:history.go ( -1); Location.reload ()" class="content-header-title float-left mb-0"><i class="ficon" data-feather="arrow-left"></i><b>Kembali</b></a>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('/negosiasiPekerjaan'); ?>">Penawaran</a></li>
                                <li class="breadcrumb-item">Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title"><?= $title ?></h4>
                                <?php if($penawaran[0]['status_penawaran'] == 0 && $penawaran[0]['status_paket_pekerjaan'] == 0): ?>
                                    <div style="float:left">
                                        <a href="<?= base_url('/negosiasiPekerjaan/update/'.$nomor_penawaran) ?>" class="btn btn-primary ml-1">Ubah Penawaran</a>
                                        <a href="<?= base_url('/negosiasiPekerjaan/delete/'.$nomor_penawaran) ?>" class="btn btn-danger ml-1" onclick="return confirm('Apakah anda yakin ? ')">Hapus Penawaran</a>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 2 && $penawaran[0]['status_paket_pekerjaan'] == 2): ?>
                                    <div style="float:left">
                                        <a href="<?= base_url('/negosiasiPekerjaan/updateDisetujuiMitraRekanan/'.$nomor_penawaran) ?>" class="btn btn-success mr-1" onclick="return confirm('Anda sepakat dengan penawaran balasan dari Pengadaan PPKS. Apakah anda yakin ? ')">Disetujui Balasan Penawaran</a>
                                        <a href="<?= base_url('/negosiasiPekerjaan/updatePermintaanNegosiasiAwal/'.$nomor_penawaran) ?>" class="btn btn-warning mr-1" onclick="return confirm('Jika penawaran awal anda ditolak Pengadaan PPKS maka penawaran anda akan dibatalkan. Dan jika penawaran awal anda disetujui, maka penawaran awal anda terpilih. Apakah anda yakin ? ') ">Permintaan Negosiasi Awal</a>
                                        <a href="<?= base_url('/negosiasiPekerjaan/updateDibatalkanMitraRekanan/'.$nomor_penawaran) ?>" class="btn btn-danger mr-1" onclick="return confirm('Penawaran anda pada tender ini akan dibatalkan. Apakah anda yakin ? ')">Batalkan Penawaran</a>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 1): ?>
                                    <div style="float:left">
                                        <span style="color:#28c76f; border:1px solid #28c76f; border-radius: 2px; padding:5px;">Disetujui Pengadaan PPKS</span>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 3): ?>
                                    <div style="float:left">
                                        <span style="color:#ea5455; border:1px solid #ea5455; border-radius: 2px; padding:5px;">Ditolak Pengadaan PPKS</span>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 4): ?>
                                    <div style="float:left">
                                        <span style="color:#28c76f; border:1px solid #28c76f; border-radius: 2px; padding:5px;">Disetujui Kedua Pihak</span>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 5): ?>
                                    <div style="float:left">
                                        <span style="color:#ea5455; border:1px solid #ea5455; border-radius: 2px; padding:5px;">Dibatalkan Mitra Rekanan</span>
                                    </div>
                                <?php elseif($penawaran[0]['status_penawaran'] == 6): ?>
                                    <div style="float:left">
                                        <span style="color:#ffac5d; border:1px solid #ffac5d; border-radius: 2px; padding:5px;">Permintaan Negosiasi Awal</span>
                                    </div>
                                <?php endif; ?>
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
                                    <table class="datatables-ajax table table-responsive" id="table_id"> 
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Merk</th>
                                                <th>Type</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th style="background: #0085e6;">Harga Satuan Perhitungan PPKS</th>
                                                <th style="background: #0085e6;">Total Harga Perhitungan PPKS</th>
                                                <th style="background: #377e47;">Harga Satuan Yang Ditawarkan</th>
                                                <th style="background: #377e47;">Total Harga Yang Ditawarkan</th>
                                                <th style="background: #ff7e03;">Harga Satuan Balasan Tawaran</th>
                                                <th style="background: #ff7e03;">Total Harg Balasan Tawaran</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                if(count($penawaran) > 0):
                                                    $jumlah_harga_satuan_ps = 0;
                                                    $jumlah_total_harga_ps = 0;
                                                    $jumlah_harga_satuan = 0;
                                                    $jumlah_total_harga = 0;
                                                    $jumlah_harga_satuan_pengadaan = 0;
                                                    $jumlah_total_harga_pengadaan = 0;
                                                foreach($penawaran as $key => $value): 
                                                    $jumlah_harga_satuan_ps += $value['harga_satuan_ps'];
                                                    $jumlah_total_harga_ps += $value['total_harga_ps'];
                                                    $jumlah_harga_satuan += $value['harga_satuan'];
                                                    $jumlah_total_harga += $value['total_harga'];
                                                    $jumlah_harga_satuan_pengadaan += $value['harga_satuan_pengadaan'];
                                                    $jumlah_total_harga_pengadaan += $value['total_harga_pengadaan'];
                                            ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $value['nomor_kode_barang'] == NULL ? '<span style="color:#3db0f7; border:1px solid #3db0f7; border-radius: 2px; padding:5px;">New!</span>' : $value['nomor_kode_barang'] ?></td>
                                                <td><?= $value['nama_barang'] ?></td>
                                                <td><?= $value['merk'] == NULL ? '-' : $value['merk'] ?></td>
                                                <td><?= $value['type'] == NULL ? '-' : $value['type'] ?></td>
                                                <td><?= $value['deskripsi'] == NULL ? '-' : $value['deskripsi'] ?></td>
                                                <td><?= $value['jumlah'].' '.$value['nama_satuan_barang'] ?></td>
                                                <td style="background: rgba(0, 133, 230, 0,1)"><?= 'Rp'.number_format($value['harga_satuan_ps'],0,'.','.') ?></td>
                                                <td style="background: rgba(0, 133, 230, 0,1)"><?= 'Rp'.number_format($value['total_harga_ps'],0,'.','.') ?></td>
                                                <td style="background: rgba(55, 126, 71, 0.1);"><?= 'Rp'.number_format($value['harga_satuan'],0,'.','.') ?></td>
                                                <td style="background: rgba(55, 126, 71, 0.1);"><?= 'Rp'.number_format($value['total_harga'],0,'.','.') ?></td>
                                                <td style="background: rgba(255, 159, 67, 0.1);"><?= $value['harga_satuan_pengadaan'] == NULL ? '-' : 'Rp'.number_format($value['harga_satuan_pengadaan'],0,'.','.') ?></td>
                                                <td style="background: rgba(255, 159, 67, 0.1);"><?= $value['total_harga_pengadaan'] == NULL ? '-' :  'Rp'.number_format($value['total_harga_pengadaan'],0,'.','.') ?></td>
                                            </tr>
                                            <?php 
                                                endforeach; 
                                                endif;
                                            ?>
                                            <tr>
                                                <td style="background-color: #343d55; text-align: center;" colspan="7">Total</td>
                                                <td style="background: rgba(0, 133, 230, 0,1);"><?= $jumlah_harga_satuan_ps == 0 ? '-' : 'Rp'.number_format($jumlah_harga_satuan_ps,0,'.','.') ?></td>
                                                <td style="background: rgba(0, 133, 230, 0,1);"><?= $jumlah_total_harga_ps == 0 ? '-' : 'Rp'.number_format($jumlah_total_harga_ps,0,'.','.') ?></td>
                                                <td style="background: rgba(55, 126, 71, 0.1);"><?= $jumlah_harga_satuan == 0 ? '-' : 'Rp'.number_format($jumlah_harga_satuan,0,'.','.') ?></td>
                                                <td style="background: rgba(55, 126, 71, 0.1);"><?= $jumlah_total_harga == 0 ? '-' : 'Rp'.number_format($jumlah_total_harga,0,'.','.') ?></td>
                                                <td style="background: rgba(255, 159, 67, 0.1);"><?= $jumlah_harga_satuan_pengadaan == 0 ? '-' : 'Rp'.number_format($jumlah_harga_satuan_pengadaan,0,'.','.') ?></td>
                                                <td style="background: rgba(255, 159, 67, 0.1);"><?= $jumlah_total_harga_pengadaan == 0 ? '-' : 'Rp'.number_format($jumlah_total_harga_pengadaan,0,'.','.') ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php if($penawaran[0]['status_penawaran'] == 1): ?>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <a href="<?= base_url("/negosiasiPekerjaan/updateDisetujuiMitraRekanan/$nomor_penawaran") ?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-success col-md-12">[KLIK] Disetujui</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger col-md-12">[KLIK] Dibatalkan</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
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


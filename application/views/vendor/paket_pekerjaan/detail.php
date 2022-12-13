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
                                <li class="breadcrumb-item"><a href="<?= base_url('/paketPekerjaan'); ?>">Paket Pekerjan</a></li>
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
                                <?php 
                                $check_penawaran = $this->Penawaran_pengadaan_model->getAllByIdMitraIdPaketPekerjaan($this->session->userdata('id_mitra'), $paket_pekerjaan[0]['id']);
                                ?>
                                <?php if(count($check_penawaran) == 0): ?>
                                <div style="float:left">
                                    <a href="<?= base_url("/paketPekerjaan/tambahPengajuanPenawaran/$nomor_paket_pekerjaan") ?>" class="btn btn-primary"><b>
                                    <i data-feather="plus" style="margin-right: 5px;"></i></b>Tambah Pengajuan Penawaran</a>
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
                                    <table class="datatables-ajax table" id="table_id"> 
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Merk</th>
                                                <th>Type</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan Perhitungan PPKS</th>
                                                <th>Total Harga Perhitungan PPKS</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                if(count($paket_pekerjaan) > 0): $total_harga_ps = 0;
                                                foreach($paket_pekerjaan as $key => $value): 
                                                $total_harga_ps += $value['total_harga_ps']; 
                                            ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $value['nomor_kode_barang'] == NULL ? '<span style="color:#3db0f7; border:1px solid #3db0f7; border-radius: 2px; padding:5px;">New!</span>' : $value['nomor_kode_barang'] ?></td>
                                                <td><?= $value['nama_barang'] ?></td>
                                                <td><?= $value['merk'] == NULL ? '-' : $value['merk'] ?></td>
                                                <td><?= $value['type'] == NULL ? '-' : $value['type'] ?></td>
                                                <td><?= $value['deskripsi'] == NULL ? '-' : $value['deskripsi'] ?></td>
                                                <td><?= $value['jumlah'].' '.$value['nama_satuan_barang'] ?></td>
                                                <td><?= 'Rp'.number_format($value['harga_satuan_ps'],0,'.','.') ?></td>
                                                <td><?= 'Rp'.number_format($value['total_harga_ps'],0,'.','.') ?></td>
                                            </tr>
                                            <?php 
                                                endforeach; 
                                                endif;
                                            ?>
                                            <tr>
                                                <td style="background-color: #3B4253;text-align: center;" colspan="8">Total</td>
                                                <td style="background-color: #3B4253;"><?= 'Rp'.number_format($total_harga_ps,0,'.','.') ?></td>
                                            </tr>
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


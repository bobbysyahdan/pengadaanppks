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
                                <li class="breadcrumb-item"><a href="<?= base_url('/negosiasiPekerjaan'); ?>">Negosiasi Pekerjan</a></li>
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
                                                <th>Harga Satuan</th>
                                                <th>Total Harga</th>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                if(count($penawaran) > 0):
                                                    $jumlah_harga_satuan_pengadaan = 0;
                                                    $jumlah_total_harga_pengadaan = 0;
                                                foreach($penawaran as $key => $value): 
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
                                                <td><?= $value['harga_satuan_pengadaan'] == NULL ? '-' : 'Rp'.number_format($value['harga_satuan_pengadaan'],0,'.','.') ?></td>
                                                <td><?= $value['total_harga_pengadaan'] == NULL ? '-' :  'Rp'.number_format($value['total_harga_pengadaan'],0,'.','.') ?></td>
                                            </tr>
                                            <?php 
                                                endforeach; 
                                                endif;
                                            ?>
                                            <tr>
                                                <td style="background-color: #343d55; text-align: center;" colspan="7">Total</td>
                                                <td><?= $jumlah_harga_satuan_pengadaan == 0 ? '-' : 'Rp'.number_format($jumlah_harga_satuan_pengadaan,0,'.','.') ?></td>
                                                <td><?= $jumlah_total_harga_pengadaan == 0 ? '-' : 'Rp'.number_format($jumlah_total_harga_pengadaan,0,'.','.') ?></td>
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


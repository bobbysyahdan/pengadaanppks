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
                                    <li class="breadcrumb-item">Tambah Pengajuan Penawaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div>
                                    <h4 class="card-title" style="margin-bottom:-10px"><?= $title ?></h4>
                                    <small class="default">Isi formulir dibawah ini. Form bertanda (<i style="color:red; font-size: 28px;;">&#8902</i>) wajib diisi.</small>
                                </div>
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
                                <form action="<?= base_url("/paketPekerjaan/tambahPengajuanPenawaran/$nomor_paket_pekerjaan") ?>" name="form1" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table col-md-12 mt-2"> 
                                                <thead>
                                                    <tr>
                                                        <th><span style="color:red; font-size: 28px;">&#8902</span> Produk Barang / Jasa</th>
                                                        <th><span style="color:red; font-size: 28px;">&#8902</span> Jumlah Item</th>
                                                        <th><span style="color:red; font-size: 28px;">&#8902</span> Harga Satuan Perhitungan PPKS</th>
                                                        <th><span style="color:red; font-size: 28px;">&#8902</span> Harga Satuan</th>
                                                        <th><span style="color:red; font-size: 28px;">&#8902</span> Jumlah Harga</th>
                                                    </tr>
                                                    <?php 
                                                    $jumlah_total_harga = 0;
                                                    foreach($paket_pekerjaan as $key => $value):
                                                        if($value['id_pajak'] != NULL || $value['id_pajak'] != 0) {
                                                            $persentase_pajak = $this->Ref_pajak_model->getById($value['id_pajak']);
                                                            $total_harga = $value['total_harga'];
                                                            $jumlah_total_harga += $total_harga;
                                                        } else {
                                                            $total_harga = $value['harga_satuan'] * $value['jumlah'];
                                                        }
                                                        ?>
                                                    <tr>
                                                        <td><?= $value['nomor_kode_barang'] == NULL ? $value['nama_barang'] : $value['nomor_kode_barang'].' - '.$value['nama_barang'] ?></td>
                                                        <td><?= $value['jumlah'].' '.$value['nama_satuan_barang'] ?></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" name="harga_satuan_ps<?= $key ?>" id="harga_satuan_ps<?= $key ?>" onChange="startCalc()" class="form-control" placeholder="10000" value="<?= $value['harga_satuan_ps'] ?>" required readonly>
                                                            </div>
                                                            <small class="text-danger"><?= form_error("harga_satuan_ps$key") ?></small>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" name="harga_satuan<?= $key ?>" id="harga_satuan<?= $key ?>" onChange="startCalc()" class="form-control" placeholder="10000" value="<?= $value['harga_satuan'] ?>" required>
                                                            </div>
                                                            <small class="text-danger"><?= form_error("harga_satuan$key") ?></small>
                                                        </td>
                                                        <input type="hidden" name="jumlah<?= $key ?>" id="jumlah<?= $key ?>" class="form-control" value="<?= $value['jumlah'] ?>">
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" name="total_jumlah<?= $key ?>" id="total_jumlah<?= $key ?>" class="form-control" value="<?= $jumlah_total_harga ?>" readOnly/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </thead>
                                            </table>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <div class="col-md-6" style="float:left; color:black">.</div>
                                            <div class="col-md-6" style="float:left;">
                                            <table class="table table-responsive table-borderless"> 
                                                <thead>
                                                    <tr>
                                                        <td><h3>Total Harga</h3></td>
                                                        <td>:</td>
                                                        <td><h1 id="txt_total_harga">Rp<?= $jumlah_total_harga ?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary col-md-12 btn-section-block" id="btn_simpan">Simpan</button>
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

    <script>
        function startCalc(){         
            interval = setInterval("calc()",1);
        }  

        function calc(){
            <?php foreach($paket_pekerjaan as $key => $value): ?>
                    document.getElementById('total_jumlah<?= $key ?>').value = document.getElementById('harga_satuan<?= $key ?>').value * document.getElementById('jumlah<?= $key ?>').value;
                    var tj<?= $key ?> = parseInt(document.getElementById('total_jumlah<?= $key ?>').value);

            <?php endforeach; ?>

            let total_harga = 0;
            <?php foreach($paket_pekerjaan as $key => $value): ?>

                total_harga += tj<?= $key ?>

            <?php endforeach; ?>

            document.getElementById("txt_total_harga").innerHTML = 'Rp'+total_harga;  
        }


        function stopCalc(){         
            clearInterval(interval);
        }
    </script>
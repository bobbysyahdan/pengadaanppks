
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
                        <?php if($mitra_rekanan['status'] != 3): ?>
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
                                <form action="<?= base_url('site/profile') ?>" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> Nama Perusahaan:</strong>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Perusahaan" value="<?= $mitra_rekanan['nama'] ?>" required>
                                                <small class="text-danger"><?= form_error('nama') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> Jenis Bidang:</strong><br>
                                                <input type="checkbox" name="is_pengadaan" value="1" class="mt-1" <?= $mitra_rekanan['is_pengadaan'] == 1 ? 'checked' : '' ?>> Pengadaan
                                                <input type="checkbox" name="is_konstruksi" value="1" class="mt-1 ml-1" <?= $mitra_rekanan['is_konstruksi'] == 1 ? 'checked' : '' ?>> Konstruksi
                                                <input type="checkbox" name="is_konsultasi" value="1" class="mt-1 ml-1" <?= $mitra_rekanan['is_konsultasi'] == 1 ? 'checked' : '' ?>> Konsultasi
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> Alamat:</strong>
                                                <input type="text" name="alamat" class="form-control" placeholder="alamat" value="<?= $mitra_rekanan['alamat'] ?>" required>
                                                <small class="text-danger"><?= form_error('alamat') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> No. Telephone/Handphone:</strong>
                                                <input type="email" name="no_telephone" class="form-control" placeholder="No. Telephone/Handphone" value="<?= $mitra_rekanan['no_telephone'] ?>" required readonly>
                                                <small class="text-danger"><?= form_error('no_telephone') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> No. NPWP:</strong>
                                                <input type="text" name="nomor_npwp" class="form-control" placeholder="No. NPWP" value="<?= $mitra_rekanan['nomor_npwp'] ?>" required>
                                                <small class="text-danger"><?= form_error('nomor_npwp') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> Nama Petinggi (Direktur/Owner/CEO):</strong>
                                                <input type="text" name="nama_direktur" class="form-control" placeholder="Nama Petinggi (Direktur/Owner/CEO)" value="<?= $mitra_rekanan['nama_direktur'] ?>" required>
                                                <small class="text-danger"><?= form_error('nama_direktur') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong><i style="color:red; font-size: 28px;">&#8902</i> Email:</strong>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $mitra_rekanan['email'] ?>" required readonly>
                                                <small class="text-danger"><?= form_error('email') ?></small>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                            <button type="submit" class="btn btn-primary col-md-12 btn-section-block">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body col-md-12">
                                <div class="row mt-2" style="margin-bottom:-20px;">
                                    <div class="col-md-12">
                                        <p class="text-warning"><b>Data Informasi Perusahaan</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-datatable ml-1 mt-2">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Nama Perusahaan</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['nama'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['alamat'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['email'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Telepon</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['no_telephone'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Petinggi</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['nama_direktur'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. NPWP</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <b><?= $mitra_rekanan['nomor_npwp'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Bidang</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php if($mitra_rekanan['is_pengadaan'] == 1): ?>
                                                            <div class="badge badge-light-info">Pengadaan</div>
                                                        <?php endif; if($mitra_rekanan['is_konstruksi'] == 1): ?>
                                                            <div class="badge badge-light-warning">Konstruksi</div>
                                                        <?php endif; if($mitra_rekanan['is_konsultasi'] == 1): ?>
                                                            <div class="badge badge-light-primary">Konsultasi</div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode KBLI</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $kode_kbli = explode(',', $mitra_rekanan['kode_kbli']); ?>
                                                        <?php foreach($kode_kbli as $key => $kbli):?>
                                                        <?= $kbli ?>
                                                        <?php if($key != count($kode_kbli)-1): ?>
                                                        ,
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php if($mitra_rekanan['status'] == 1): ?>
                                                            <b class="text-warning">Sedang Verifikasi</b>
                                                        <?php elseif($mitra_rekanan['status'] == 2): ?>
                                                            <b class="text-danger">Ditolak</b>
                                                        <?php elseif($mitra_rekanan['status'] == 3): ?>
                                                            <b class="text-success">Disetujui</b>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-3" style="margin-bottom:-20px;">
                                    <div class="col-md-12">
                                        <p class="text-warning"><b>File Identitas Perusahaan</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-datatable ml-1 mt-2">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>- File Akta Pendirian / Akta Perubahan</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $files = explode(',', $mitra_rekanan['file_akta_pendirian']); foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                                <span>* <a href="<?= $file ?>" class="text-success" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></span>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>- File Perizinan Berusaha Berbasis Resiko (Nomor Izin Berusaha dan lampirannya)</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $files = explode(',', $mitra_rekanan['file_nib']); foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                                <span>* <a href="<?= $file ?>" class="text-success" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></span>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>- File Sertifikat Badan Usaha</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $files = explode(',', $mitra_rekanan['file_sertifikat_badan_usaha']); foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                                <span>* <a href="<?= $file ?>" class="text-success" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></span>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>- File KTP Komisaris</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $files = explode(',', $mitra_rekanan['file_ktp_komisaris']); foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                                <span>* <a href="<?= $file ?>" class="text-success" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></span>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>- File KTP Direktur</td>
                                                    <td class="pr-1 pl-1">:</td>
                                                    <td>
                                                        <?php $files = explode(',', $mitra_rekanan['file_ktp_direktur']); foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                                <span>* <a href="<?= $file ?>" class="text-success" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></span>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

   

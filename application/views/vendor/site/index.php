<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-detached">
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12 text-center">
                                        <?php if($this->session->userdata('id')): ?>
                                        <h4 style="text-align: center">Selamat Datang, <?= $this->session->userdata('nama_mitra') ?> di Pengadaan PPKS</h4>
                                        <?php else: ?>
                                        <h4>Selamat Datang di Pengadaan PPKS</h4>
                                        <div class="col-md-12 p-0 mt-1">
                                            <h5>Silahkan Masuk atau Daftar terlebih dahulu</h5>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <?php if($status == 0 && $status != NULL): ?>
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <div>
                                        <h2 class="card-title">Verifikasi File Identitas Perusahaan</h2>
                                        <p class="mt-1">Sebelum dapat mengajukan penawaran ke Pengadaan PPKS, Mitra Rekanan terlebih dahulu verifikasi file identitas perusahaan Anda. Mohon upload file pada form dibawah ini dengan catatan: </p>
                                        <p class="text-warning font-weight-bolder m-1" style="margin-bottom: -20px;">* <i>File yang diupload berformat pdf</i><br>* <i>Ukuran file yang diupload dimasing-masing form maksimal 5 MB</i><br>* <i>Setiap form dapat mengupload lebih dari 1 file dalam satu kali aksi</i></p>
                                        <?php if($this->session->flashdata('failed')): ?>
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
                                </div>
                                <div class="card-body mt-1">
                                    <form action="<?= base_url('/site/uploadFileAktaPendirian') ?>" method="POST" enctype="multipart/form-data" id="id_file_akta_pendirian">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Akta Pendirian / Akta Perubahan :</strong>
                                                <?php if($this->session->flashdata('success_file_akta_pendirian')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_akta_pendirian') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_akta_pendirian')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_akta_pendirian') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_akta_pendirian'] != NULL): $files = explode(',', $mitra_rekanan['file_akta_pendirian']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input form-control <?= $mitra_rekanan['file_akta_pendirian'] == NULL ? 'is_valid' : '' ?>" id="file_akta_pendirian" name="file_akta_pendirian[]" multiple/>
                                                        <label class="custom-file-label" for="file_akta_pendirian">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_akta_pendirian'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>

                                            </div>
                                        <!-- <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <strong><i style="color:red; font-size: 28px;">&#8902</i> Upload File Akta Pendirian / Akta Perubahan:</strong>
                                                    <div class="media">
                                                        <a href="javascript:void(0);" class="mr-25">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" id="account-upload-img" class="rounded mr-50" alt="profile image" height="80" width="80" />
                                                        </a>
                                                        <div class="media-body mt-75 ml-1">
                                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                            <input type="file" id="account-upload" hidden accept="pdf/*" />
                                                            <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                                            <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                                        </div>
                                                    </div>
                                                    <small class="text-default"><i style="font-size: 28px;">&#8902</i> File yang diupload berformat pdf. Dan bisa upload lebih dari 1 file.</small>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-warning col-md-12 mt-5 btn-section-block">Unggah</button>
                                            </div>
                                        </div> -->
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileNIB') ?>" method="POST" enctype="multipart/form-data" id="id_file_nib">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Perizinan Berusaha Berbasis Resiko (Nomor Izin Berusaha dan lampirannya) :</strong>
                                                <?php if($this->session->flashdata('success_file_nib')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_nib') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_nib')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_nib') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_nib'] != NULL): $files = explode(',', $mitra_rekanan['file_nib']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_nib" name="file_nib[]" multiple/>
                                                        <label class="custom-file-label" for="file_nib">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_nib'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileSertifikatBadanUsaha') ?>" method="POST" enctype="multipart/form-data" id="id_file_sertifikat_badan_usaha">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Sertifikat Badan Usaha :</strong>
                                                <?php if($this->session->flashdata('success_file_sertifikat_badan_usaha')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_sertifikat_badan_usaha') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_sertifikat_badan_usaha')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_sertifikat_badan_usaha') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_sertifikat_badan_usaha'] != NULL): $files = explode(',', $mitra_rekanan['file_sertifikat_badan_usaha']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_sertifikat_badan_usaha" name="file_sertifikat_badan_usaha[]" multiple/>
                                                        <label class="custom-file-label" for="file_sertifikat_badan_usaha">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_sertifikat_badan_usaha'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileKTPKomisaris') ?>" method="POST" enctype="multipart/form-data" id="id_file_ktp_komisaris">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File KTP Komisaris :</strong>
                                                <?php if($this->session->flashdata('success_file_ktp_komisaris')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_ktp_komisaris') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_ktp_komisaris')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_ktp_komisaris') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_ktp_komisaris'] != NULL): $files = explode(',', $mitra_rekanan['file_ktp_komisaris']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_ktp_komisaris" name="file_ktp_komisaris[]" multiple/>
                                                        <label class="custom-file-label" for="file_ktp_komisaris">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_ktp_komisaris'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileKTPDirektur') ?>" method="POST" enctype="multipart/form-data" id="id_file_ktp_direktur">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File KTP Direktur :</strong>
                                                <?php if($this->session->flashdata('success_file_ktp_direktur')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_ktp_direktur') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_ktp_direktur')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_ktp_direktur') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_ktp_direktur'] != NULL): $files = explode(',', $mitra_rekanan['file_ktp_direktur']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_ktp_direktur" name="file_ktp_direktur[]" multiple/>
                                                        <label class="custom-file-label" for="file_ktp_direktur">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_ktp_direktur'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileNPWPDirektur') ?>" method="POST" enctype="multipart/form-data" id="id_file_npwp_direktur">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File NPWP Direktur :</strong>
                                                <?php if($this->session->flashdata('success_file_npwp_direktur')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_npwp_direktur') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_npwp_direktur')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_npwp_direktur') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_npwp_direktur'] != NULL): $files = explode(',', $mitra_rekanan['file_npwp_direktur']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_npwp_direktur" name="file_npwp_direktur[]" multiple/>
                                                        <label class="custom-file-label" for="file_npwp_direktur">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_npwp_direktur'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileNPWPPerusahaan') ?>" method="POST" enctype="multipart/form-data" id="id_file_npwp_perusahaan">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File NPWP Perusahaan :</strong>
                                                <?php if($this->session->flashdata('success_file_npwp_perusahaan')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_npwp_perusahaan') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_npwp_perusahaan')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_npwp_perusahaan') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_npwp_perusahaan'] != NULL): $files = explode(',', $mitra_rekanan['file_npwp_perusahaan']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_npwp_perusahaan" name="file_npwp_perusahaan[]" multiple/>
                                                        <label class="custom-file-label" for="file_npwp_perusahaan">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_npwp_perusahaan'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileSuratKemenkumham') ?>" method="POST" enctype="multipart/form-data" id="id_file_surat_kemenkumham">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Surat Kementerian Hukum dan HAM :</strong>
                                                <?php if($this->session->flashdata('success_file_surat_kemenkumham')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_surat_kemenkumham') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_surat_kemenkumham')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_surat_kemenkumham') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_surat_kemenkumham'] != NULL): $files = explode(',', $mitra_rekanan['file_surat_kemenkumham']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_surat_kemenkumham" name="file_surat_kemenkumham[]" multiple/>
                                                        <label class="custom-file-label" for="file_surat_kemenkumham">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_surat_kemenkumham'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileSuratPengukuhan') ?>" method="POST" enctype="multipart/form-data" id="id_file_surat_pengukuhan">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Surat Pengukuhan Perusahaan Kenak pajak :</strong>
                                                <?php if($this->session->flashdata('success_file_surat_pengukuhan')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_surat_pengukuhan') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_surat_pengukuhan')): ?>
                                                    <div class="col-md-12 p-0 mt-2">
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading">Gagal
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </h4>
                                                            <div class="alert-body">
                                                                <?= $this->session->flashdata('failed_file_surat_pengukuhan') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_surat_pengukuhan'] != NULL): $files = explode(',', $mitra_rekanan['file_surat_pengukuhan']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_surat_pengukuhan" name="file_surat_pengukuhan[]" multiple/>
                                                        <label class="custom-file-label" for="file_surat_pengukuhan">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_surat_pengukuhan'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/uploadFileSuratDomisili') ?>" method="POST" enctype="multipart/form-data" id="id_file_surat_domisili">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Upload File Surat Keterangan Domisili :</strong>
                                                <?php if($this->session->flashdata('success_file_surat_domisili')): ?>
                                                <div class="col-md-12 p-0">
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">Sukses
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('success_file_surat_domisili') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php elseif($this->session->flashdata('failed_file_surat_domisili')): ?>
                                                <div class="col-md-12 p-0 mt-2">
                                                    <div class="alert alert-danger" role="alert">
                                                        <h4 class="alert-heading">Gagal
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </h4>
                                                        <div class="alert-body">
                                                            <?= $this->session->flashdata('failed_file_surat_domisili') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($mitra_rekanan['file_surat_domisili'] != NULL): $files = explode(',', $mitra_rekanan['file_surat_domisili']); ?>
                                                    <p class="mt-1"> File yang berhasil diupload: </p>
                                                    <?php foreach($files as $file): $url_file = $file; $ex_file = explode('/',$file); ?>
                                                        <p><i data-feather='check-circle' class="text-success"></i><a href="<?= $file ?>" class="text-white" target="_blank"> <?= $ex_file[count($ex_file)-1] ?></a></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file_surat_domisili" name="file_surat_domisili[]" multiple/>
                                                        <label class="custom-file-label" for="file_surat_domisili">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($mitra_rekanan['file_surat_domisili'] == NULL): ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-info btn-block" id="btn-page-block-overlay">Unggah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <button type="submit" class="btn btn-warning btn-block" id="btn-page-block-overlay">Unggah Ulang</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/site/index') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <strong class="text-white"><i style="color:red; font-size: 28px;">&#8902</i> Kode KBLI yang telah diizinkan untuk perusahaan Anda :</strong>
                                                <select class="select2 form-control" name="kbli[]" id="kbli" multiple>
                                                </select>
                                                <small class="text-danger"><?= form_error('kbli[]') ?></small>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                                                <button type="submit" class="btn btn-success col-md-12 btn-section-block">Submit</button>
                                            </div>
                                        </div>   
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($status == 1 && $status != NULL): ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <h4 class="text-warning text-center">Data Identitas Perusahaan <b><?= $this->session->userdata('nama_mitra') ?></b> berhasil disubmit. Mohon menunggu konfirmasi dari <b>Pengadaan PPKS</b> </h4>
                                        <p class="text-center">Silahkan menunggu konfirmasi persetujuan dari pihak Pengadaan PPKS. Kami akan mengirim konfirmasi persetujuan lewat email Anda atau Anda bisa langsung cek lewat sistem ini.</p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($status == 2 && $status != NULL): ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <h4 class="text-danger text-center">Verifikasi Data Identitas Perusahaan <b><?= $this->session->userdata('nama_mitra') ?></b> Ditolak</b> </h4>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($status == 3 && $status != NULL): ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <h4 class="text-success text-center">Verifikasi Data Identitas Perusahaan <b><?= $this->session->userdata('nama_mitra') ?></b> Disetujui</h4>
                                        <p class="text-center">Sekarang akun Anda bisa mengajukan penawaran pada paket pekerjaan yang tersedia sesuai kode KBLI.</p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content--
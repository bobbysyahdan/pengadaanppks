<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
		$this->load->model('Kode_kbli_model');
		$this->load->model('User_vendor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }

	public function index()
	{
		$data['title'] = "Pengadaan PPKS";
		if($this->session->userdata('id_mitra')) {
			$mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($this->session->userdata('id_mitra'));
			$data['mitra_rekanan'] = $mitra_rekanan;
			$data['status'] = $mitra_rekanan['status'];
			// $data['kbli'] = $this->Mitra_pembelian_barang_gudang_model->getAllKBLI();
		} else {
			$data['status'] = NULL;
			$data['mitra_rekanan'] = NULL;
		}

		$this->form_validation->set_rules("kbli[]", 'Kode KBLI', 'required');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('vendor/layouts/header', $data);
			$this->load->view('vendor/layouts/menu');
			$this->load->view('vendor/site/index', $data);
			$this->load->view('vendor/layouts/footer_kode_kbli');
		} else {
			if($this->session->userdata('id_mitra')) {
				$id_mitra = $this->session->userdata('id_mitra');
				if($mitra_rekanan['file_akta_pendirian'] != NULL && 
				$mitra_rekanan['file_nib'] != NULL && 
				$mitra_rekanan['file_sertifikat_badan_usaha'] != NULL &&
				$mitra_rekanan['file_ktp_komisaris'] != NULL &&
				$mitra_rekanan['file_ktp_direktur'] != NULL && 
				$mitra_rekanan['file_npwp_direktur'] != NULL && 
				$mitra_rekanan['file_npwp_perusahaan'] != NULL &&
				$mitra_rekanan['file_surat_kemenkumham'] != NULL &&
				$mitra_rekanan['file_surat_pengukuhan'] != NULL &&
				$mitra_rekanan['file_surat_domisili'] != NULL) {
					$this->Mitra_pembelian_barang_gudang_model->updateStatusVerifikasi($id_mitra);
					$this->session->set_flashdata('success', "Data berhasil disimpan.");
					redirect("/site/index");
				} else {
					$this->session->set_flashdata('failed', "Anda belum mengunggah keseluruhan dokumen.");
					redirect("/site/index");
				}
			}	 
		}
	}

	public function uploadFileAktaPendirian()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_akta_pendirian']['name'];
			$file_type = $_FILES['file_akta_pendirian']['type'];
			$file_size = $_FILES['file_akta_pendirian']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_akta_pendirian', 'File yang diupload harus berformat pdf.');
							redirect('/site/index');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_akta_pendirian', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_akta_pendirian', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_akta_pendirian', "File Akta Pendirian berhasil diupload");
				redirect("/site/index");  
			} else {
				$this->session->set_flashdata('failed_file_akta_pendirian', 'File Akta Pendirian yang diupload belum dipilih.');
				redirect('/site/index');  
			}
		}
	}

	public function uploadFileNIB()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_nib']['name'];
			$file_type = $_FILES['file_nib']['type'];
			$file_size = $_FILES['file_nib']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_nib', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_akta_pendirian');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_nib', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_akta_pendirian');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_nib', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_nib', "File Perizinan Berusaha Berbasis Resiko (Nomor Izin Berusaha dan lampirannya) berhasil diupload");
				redirect("/site/index/#id_file_akta_pendirian");  
			} else {
				$this->session->set_flashdata('failed_file_nib', 'File Perizinan Berusaha Berbasis Resiko (Nomor Izin Berusaha dan lampirannya) yang diupload belum dipilih.');
				redirect('/site/index/#id_file_akta_pendirian');  
			}
		}
	}

	public function uploadFileSertifikatBadanUsaha()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_sertifikat_badan_usaha']['name'];
			$file_type = $_FILES['file_sertifikat_badan_usaha']['type'];
			$file_size = $_FILES['file_sertifikat_badan_usaha']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_sertifikat_badan_usaha', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_nib');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_sertifikat_badan_usaha', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_nib');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_sertifikat_badan_usaha', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_sertifikat_badan_usaha', "File Sertifikat Badan Usaha berhasil diupload");
				redirect("/site/index/#id_file_nib");  
			} else {
				$this->session->set_flashdata('failed_file_sertifikat_badan_usaha', 'File Sertifikat Badan Usaha yang diupload belum dipilih.');
				redirect('/site/index/#id_file_nib');  
			}
		}
	}

	public function uploadFileKTPKomisaris()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_ktp_komisaris']['name'];
			$file_type = $_FILES['file_ktp_komisaris']['type'];
			$file_size = $_FILES['file_ktp_komisaris']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_ktp_komisaris', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_sertifikat_badan_usaha');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_ktp_komisaris', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_sertifikat_badan_usaha');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_ktp_komisaris', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_ktp_komisaris', "File KTP Komisaris berhasil diupload");
				redirect("/site/index/#id_file_sertifikat_badan_usaha");  
			} else {
				$this->session->set_flashdata('failed_file_ktp_komisaris', 'File KTP Komisaris yang diupload belum dipilih.');
				redirect('/site/index/#id_file_sertifikat_badan_usaha');  
			}
		}
	}

	public function uploadFileKTPDirektur()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_ktp_direktur']['name'];
			$file_type = $_FILES['file_ktp_direktur']['type'];
			$file_size = $_FILES['file_ktp_direktur']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_ktp_direktur', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_ktp_komisaris');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_ktp_direktur', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_ktp_komisaris');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_ktp_direktur', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_ktp_direktur', "File KTP Direktur berhasil diupload");
				redirect("/site/index/#id_file_ktp_komisaris");  
			} else {
				$this->session->set_flashdata('failed_file_ktp_direktur', 'File KTP Direktur yang diupload belum dipilih.');
				redirect('/site/index/#id_file_ktp_komisaris');  
			}
		}
	}

	public function uploadFileNPWPDirektur()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_npwp_direktur']['name'];
			$file_type = $_FILES['file_npwp_direktur']['type'];
			$file_size = $_FILES['file_npwp_direktur']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_npwp_direktur', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_ktp_direktur');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_npwp_direktur', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_ktp_direktur');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_npwp_direktur', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_npwp_direktur', "File NPWP Direktur berhasil diupload");
				redirect("/site/index/#id_file_ktp_direktur");  
			} else {
				$this->session->set_flashdata('failed_file_npwp_direktur', 'File NPWP Direktur yang diupload belum dipilih.');
				redirect('/site/index/#id_file_ktp_direktur');  
			}
		}
	}

	public function uploadFileNPWPPerusahaan()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_npwp_perusahaan']['name'];
			$file_type = $_FILES['file_npwp_perusahaan']['type'];
			$file_size = $_FILES['file_npwp_perusahaan']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_npwp_perusahaan', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_npwp_direktur');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_npwp_perusahaan', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_npwp_direktur');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_npwp_perusahaan', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_npwp_perusahaan', "File NPWP Perusahaan berhasil diupload");
				redirect("/site/index/#id_file_npwp_direktur");  
			} else {
				$this->session->set_flashdata('failed_file_npwp_perusahaan', 'File NPWP Perusahaan yang diupload belum dipilih.');
				redirect('/site/index/#id_file_npwp_direktur');  
			}
		}
	}

	public function uploadFileSuratKemenkumham()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_surat_kemenkumham']['name'];
			$file_type = $_FILES['file_surat_kemenkumham']['type'];
			$file_size = $_FILES['file_surat_kemenkumham']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_surat_kemenkumham', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_npwp_perusahaan');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_surat_kemenkumham', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_npwp_perusahaan');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_surat_kemenkumham', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_surat_kemenkumham', "File Surat Kementerian Hukum dan HAM berhasil diupload");
				redirect("/site/index/#id_file_npwp_perusahaan");  
			} else {
				$this->session->set_flashdata('failed_file_surat_kemenkumham', 'File Surat Kementerian Hukum dan HAM yang diupload belum dipilih.');
				redirect('/site/index/#id_file_npwp_perusahaan');  
			}
		}
	}

	public function uploadFileSuratPengukuhan()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_surat_pengukuhan']['name'];
			$file_type = $_FILES['file_surat_pengukuhan']['type'];
			$file_size = $_FILES['file_surat_pengukuhan']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_surat_pengukuhan', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_surat_kemenkumham');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_surat_pengukuhan', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_surat_kemenkumham');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_surat_pengukuhan', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_surat_pengukuhan', "File Surat Pengukuhan Perusahaan Kenak pajak berhasil diupload");
				redirect("/site/index/#id_file_surat_kemenkumham");  
			} else {
				$this->session->set_flashdata('failed_file_surat_pengukuhan', 'File Surat Pengukuhan Perusahaan Kenak pajak yang diupload belum dipilih.');
				redirect('/site/index/#id_file_surat_kemenkumham');  
			}
		}
	}

	public function uploadFileSuratDomisili()
	{
		if($this->session->userdata('id')) {
			$file_name = $_FILES['file_surat_domisili']['name'];
			$file_type = $_FILES['file_surat_domisili']['type'];
			$file_size = $_FILES['file_surat_domisili']['size'];
			$count_file_size = 0;
			if($file_name[0] != "" || $file_name[0] != NULL) {
				foreach($file_type as $file) {
					if($file) {
						if($file != 'application/pdf') {
							$this->session->set_flashdata('failed_file_surat_domisili', 'File yang diupload harus berformat pdf.');
							redirect('/site/index/#id_file_surat_pengukuhan');
						} 
					}
				}
		
				foreach($file_size as $file) {
					$count_file_size += $file;
				}

				if($count_file_size >= 5000000) {
					$this->session->set_flashdata('failed_file_surat_domisili', 'Size maksimal file yang di upload yaitu 5MB.');
					redirect('/site/index/#id_file_surat_pengukuhan');
				}
				$this->Mitra_pembelian_barang_gudang_model->updateUploadFiles('file_surat_domisili', $this->session->userdata('id_mitra'));
				$this->session->set_flashdata('success_file_surat_domisili', "File Surat Keterangan Domisili berhasil diupload");
				redirect("/site/index/#id_file_surat_pengukuhan");  
			} else {
				$this->session->set_flashdata('failed_file_surat_domisili', 'File Surat Keterangan Domisili yang diupload belum dipilih.');
				redirect('/site/index/#id_file_surat_pengukuhan');  
			}
		}
	}

	

	public function profile()
	{
		if($this->session->userdata('id')) {
			$data['title'] = "Profile Mitra Rekanan";
			if($this->session->userdata('id')) {
				$id = $this->session->userdata('id');
				$id_mitra =  $this->session->userdata('id_mitra');
				$data['mitra_rekanan'] = $this->Mitra_pembelian_barang_gudang_model->getById($id_mitra);
				$data['user'] = $this->User_vendor_model->getById($id);
			}
			$this->form_validation->set_rules("nama", 'Nama Perusahaan', 'required');
			$this->form_validation->set_rules("email", 'Email', 'required');
			if($this->form_validation->run() == FALSE) {
				$this->load->view('vendor/layouts/header', $data);
				$this->load->view('vendor/layouts/menu');
				$this->load->view('vendor/site/profile', $data);
				$this->load->view('vendor/layouts/footer');
			} else {
				$this->User_vendor_model->update($id);
				$this->Mitra_pembelian_barang_gudang_model->update($id_mitra);
				$this->session->set_flashdata('success', "Data berhasil disimpan.");
				redirect("/site/profile");     
			}
		}
	}	

	public function resetPassword()
	{
		$data['title'] = "Reset Password";
		if($this->session->userdata('id_mitra')){
			if($this->session->userdata('id')) {
				$id = $this->session->userdata('id');
				$id_mitra =  $this->session->userdata('id_mitra');
				$data['mitra_rekanan'] = $this->Mitra_pembelian_barang_gudang_model->getById($id_mitra);
				$data['user'] = $this->User_vendor_model->getById($id);
			}
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
			if($this->form_validation->run() == FALSE) {
				$this->load->view('vendor/layouts/header', $data);
				$this->load->view('vendor/layouts/menu');
				$this->load->view('vendor/site/reset_password', $data);
				$this->load->view('vendor/layouts/footer');
			} else {
				$this->User_vendor_model->resetPassword($id);
				$this->session->set_flashdata('success', "Data berhasil disimpan.");
				redirect("/site/resetPassword");     
			}
		} else {
			redirect("/site/index");
		}
	}
}
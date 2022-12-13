<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DealPekerjaan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
		$this->load->model('User_vendor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }

	public function index()
	{
		$data['title'] = "Daftar Paket Pekerjaan Yang Sudah Deal";
		$data['penawaran'] = $this->Penawaran_pengadaan_model->getAllDealPekerjaan($this->session->userdata('id_mitra'));
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
		$this->load->view('vendor/deal_pekerjaan/index', $data);
		$this->load->view('vendor/layouts/footer');
	}

	public function detail($nomor_penawaran)
	{
		$data['nomor_penawaran'] = $nomor_penawaran;
		$data['title'] = "Detail Paket Pekerjaan #$nomor_penawaran";
		$data['penawaran'] = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
		$this->load->view('vendor/deal_pekerjaan/detail', $data);
		$this->load->view('vendor/layouts/footer');
	}
}
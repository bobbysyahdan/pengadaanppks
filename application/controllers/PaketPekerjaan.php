<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketPekerjaan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
		$this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('Kode_kbli_model');
		$this->load->model('User_vendor_model');
		$this->load->model('User_vendor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
		// if(!$this->session->userdata('email') || $this->session->userdata('email') && $this->session->userdata('role') != 2) {
        //     redirect('/auth/signin');
        // }
    }

	public function index()
	{
		$data['title'] = "Paket Pekerjaan";
        if($this->session->userdata('id_mitra')) {
            $data['paket_pekerjaan'] = $this->Paket_pekerjaan_pengadaan_model->getAllByBidangGroupByNomorPaketPekerjaan();
        } else {
		    $data['paket_pekerjaan'] = $this->Paket_pekerjaan_pengadaan_model->getAllGroupByNomorPaketPekerjaan();
        }
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
        if($this->session->userdata('id_mitra')){
            $mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($this->session->userdata('id_mitra'));
            if($mitra_rekanan['status'] == 3){
              
                $this->load->view('vendor/paket_pekerjaan/index_accepted', $data);
            } else {
                $this->load->view('vendor/paket_pekerjaan/index', $data);
            }
        } else {
            $this->load->view('vendor/paket_pekerjaan/index', $data);
        }
		$this->load->view('vendor/layouts/footer');
	}

	public function detail($nomor_paket_pekerjaan)
	{
        $data['title'] = "Detail Paket Pekerjaan #$nomor_paket_pekerjaan";
        $data['nomor_paket_pekerjaan'] = $nomor_paket_pekerjaan;
        $data['paket_pekerjaan'] = $this->Paket_pekerjaan_pengadaan_model->getAllByNomorPaketPekerjaan($nomor_paket_pekerjaan);
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
		$this->load->view('vendor/paket_pekerjaan/detail', $data);
		$this->load->view('vendor/layouts/footer');
	}


	public function tambahPengajuanPenawaran($nomor_paket_pekerjaan)
	{   
        $data['title'] = "Tambah Pengajuan Penawaran Paket Pekerjaan #$nomor_paket_pekerjaan";
        if($this->session->userdata('id_mitra')) {
            $mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($this->session->userdata('id_mitra'));
            if($mitra_rekanan['status'] == 3) {
                $paket_pekerjaan = $this->Paket_pekerjaan_pengadaan_model->getAllByNomorPaketPekerjaan($nomor_paket_pekerjaan);
                $data['nomor_paket_pekerjaan'] = $nomor_paket_pekerjaan;
                $data['paket_pekerjaan'] = $paket_pekerjaan; 
                foreach($paket_pekerjaan as $key => $value) {
                    $this->form_validation->set_rules("harga_satuan$key", 'Harga Satuan', 'required|numeric');
                }
                if($this->form_validation->run() == FALSE) {
                    $this->load->view('vendor/layouts/header', $data);
                    $this->load->view('vendor/layouts/menu');
                    $this->load->view('vendor/paket_pekerjaan/create', $data);
                    $this->load->view('vendor/layouts/footer');
                } else {
                    $date = date('Ymd');
                    $uniq_code = count($this->Penawaran_pengadaan_model->getAllByNomorPaketPekerjaan($nomor_paket_pekerjaan)) + 1;
                    foreach($paket_pekerjaan as $key => $value) {
                        $split_nomor = explode('-',$value['nomor_paket_pekerjaan']);
                        $nomor_penawaran = $split_nomor[1].'-'.$date.'-'.$uniq_code;
                        $this->Penawaran_pengadaan_model->tambahDariTUG3($value['id'], $this->input->post("harga_satuan$key"), $nomor_penawaran);
                    }
                    $url_redirect =  base_url("/negosiasiPekerjaan/detail/$nomor_penawaran");
                    $this->session->set_flashdata('success', "Data penawaran anda berhasil disimpan. Silahkan masuk ke menu <b>Negosiasi</b> > <b>detail</b> untuk melihat data yg tersimpan.  <a class='text-success' href='$url_redirect'>[KLIK DISINI]</a>");
                    redirect("/paketPekerjaan");                  
                }
            } else {
                redirect('/site/index');
            }
        }  else {
            $this->load->view('vendor/layouts/header', $data);
            $this->load->view('vendor/layouts/menu');
            $this->load->view('vendor/site/harus_login', $data);
            $this->load->view('vendor/layouts/footer');
        }           
    }

    public function ajaxGetKodeKBLI($kode_kbli) {
        $data['kbli'] = $this->Kode_kbli_model->getAllByLikeKode($kode_kbli);
        echo json_encode($data);
        // $this->Mitra_pembelian_barang_gudang_model->getAllKBLI();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NegosiasiPekerjaan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
        $this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('User_vendor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
		// if(!$this->session->userdata('email') || $this->session->userdata('email') && $this->session->userdata('role') != 2) {
        //     redirect('/auth/signin');
        // }
    }

	public function index()
	{
		$data['title'] = "Penawaran Mitra Rekanan";
		$data['penawaran'] = $this->Penawaran_pengadaan_model->getAllByIdMitraGroupByNomorPenawaran($this->session->userdata('id_mitra'));
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
		$this->load->view('vendor/negosiasi_pekerjaan/index', $data);
		$this->load->view('vendor/layouts/footer');
	}

	public function detail($nomor_penawaran)
	{
		$data['nomor_penawaran'] = $nomor_penawaran;
		$data['title'] = "Detail Penawaran Mitra Rekanan #$nomor_penawaran";
		$data['penawaran'] = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        foreach($data['penawaran'] as $value) {
            $this->Penawaran_pengadaan_model->updateDibacaMitra($value['id']);
        }
		$this->load->view('vendor/layouts/header', $data);
		$this->load->view('vendor/layouts/menu');
		$this->load->view('vendor/negosiasi_pekerjaan/detail', $data);
		$this->load->view('vendor/layouts/footer');
	}


	// public function tambahPengajuanPenawaran($tug_3)
	// {   
    //     $real_tug_3 = str_replace('-','/', $tug_3);
    //     $data['title'] = "Tambah Pengajuan Penawaran TUG 3 No #$real_tug_3";
    //     $pengajuan_barang = $this->Pengajuan_barang_gudang_model->getAllByTUG3($real_tug_3);
    //     $data['tug_3'] = $tug_3;
    //     $data['pengajuan_barang'] = $pengajuan_barang; 
    //     foreach($pengajuan_barang as $key => $value) {
    //         $this->form_validation->set_rules("harga_satuan$key", 'Harga Satuan', 'required|numeric');
    //     }
    //         if($this->form_validation->run() == FALSE) {
    //             $this->load->view('vendor/layouts/header', $data);
    //             $this->load->view('vendor/layouts/menu');
    //             $this->load->view('vendor/paket_pekerjaan/create', $data);
    //             $this->load->view('vendor/layouts/footer');
    //         } else {
	// 			$nomor_penawaran = rand();
    //             foreach($pengajuan_barang as $key => $value) {
    //                 $this->Penawaran_pengadaan_model->create($value['id'], $this->input->post("harga_satuan$key"), $nomor_penawaran);
    //             }
    //             $url_redirect =  base_url("/paketPekerjaan/negosiasiPenawaran/$nomor_penawaran");
    //             $this->session->set_flashdata('success', "Data pemesanan barang berhasil disimpan. Silahkan masuk ke menu <b>Pengadaan Barang / Jasa</b> > <b>Pemesanan</b> untuk melihat data yg tersimpan.  <a class='btn btn-outline-success' href='$url_redirect'>[KLIK DISINI]</a>");
    //             redirect("/bagian/permohonanPengajuanBarangTUG3/detailPengajuan/$tug_3");                  
    //         }
    // }

    public function update($nomor_penawaran)
	{   
        $data['title'] = "Ubah Penawaran #$nomor_penawaran";
        $penawaran = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        $data['nomor_penawaran'] = $nomor_penawaran;
        $data['penawaran'] = $penawaran; 
        foreach($penawaran as $key => $value) {
            $this->form_validation->set_rules("harga_satuan$key", 'Harga Satuan', 'required|numeric');
        }
        if($this->form_validation->run() == FALSE) {
            $this->load->view('vendor/layouts/header', $data);
            $this->load->view('vendor/layouts/menu');
            $this->load->view('vendor/negosiasi_pekerjaan/update', $data);
            $this->load->view('vendor/layouts/footer');
        } else {
            foreach($penawaran as $key => $value) {
                $this->Penawaran_pengadaan_model->update($value['id'], $key);
            }
            $url_redirect =  base_url("/paketPekerjaan/negosiasiPenawaran/$nomor_penawaran");
            $this->session->set_flashdata('success', "Data berhasil disimpan");
            redirect("/negosiasiPekerjaan/detail/$nomor_penawaran");                  
        }
    }

    public function updatePermintaanNegosiasiAwal($nomor_penawaran)
	{   
        $data['title'] = "Ubah Penawaran #$nomor_penawaran";
        $penawaran = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        $data['nomor_penawaran'] = $nomor_penawaran;
        $data['penawaran'] = $penawaran; 
        foreach($penawaran as $key => $value) {
            $this->Penawaran_pengadaan_model->updatePermintaanNegosiasiAwal($value['id']);
        }
        $this->session->set_flashdata('success', "Data berhasil disimpan");
        redirect("/negosiasiPekerjaan/detail/$nomor_penawaran");     
    }

    public function updateDisetujuiMitraRekanan($nomor_penawaran)
	{   
        $data['title'] = "Ubah Penawaran #$nomor_penawaran";
        $penawaran = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        $data['nomor_penawaran'] = $nomor_penawaran;
        $data['penawaran'] = $penawaran; 
        foreach($penawaran as $key => $value) {
            $this->Penawaran_pengadaan_model->updateDisetujuiMitraRekanan($value['id']);
            $this->Paket_pekerjaan_pengadaan_model->updateDisetujuiMitraRekanan($value['id_paket_pekerjaan']);
            $penawaran_lainnya = $this->Penawaran_pengadaan_model->getAllByIdPaketPekerjaan($value['id_paket_pekerjaan']);
            if(count($penawaran_lainnya) > 0) {
                foreach($penawaran_lainnya as $value2) {
                    if($value2['id'] != $value['id']) {
                        $this->Penawaran_pengadaan_model->updateDitolakPengadaan($value2['id']);
                    }
                } 
            }
        }
        $this->session->set_flashdata('success', "Data berhasil disimpan");
        redirect("/negosiasiPekerjaan/detail/$nomor_penawaran");     
    }

    public function updateDibatalkanMitraRekanan($nomor_penawaran)
	{   
        $data['title'] = "Ubah Penawaran #$nomor_penawaran";
        $penawaran = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        $data['nomor_penawaran'] = $nomor_penawaran;
        $data['penawaran'] = $penawaran; 
        foreach($penawaran as $key => $value) {
            $this->Penawaran_pengadaan_model->updateDibatalkanMitraRekanan($value['id']);
            $this->Paket_pekerjaan_pengadaan_model->updateDibatalkanMitraRekanan($value['id_paket_pekerjaan']);
        }
        $this->session->set_flashdata('success', "Data berhasil disimpan");
        redirect("/negosiasiPekerjaan/detail/$nomor_penawaran");     
    }

    public function delete($nomor_penawaran)
	{   
        $penawaran = $this->Penawaran_pengadaan_model->getAllByNomorPenawaran($nomor_penawaran);
        foreach($penawaran as $key => $value) {
            $this->Penawaran_pengadaan_model->delete($value['id']);
        }
        $this->session->set_flashdata('success', "Data berhasil dihapus");
        redirect("/negosiasiPekerjaan");     
    }
}
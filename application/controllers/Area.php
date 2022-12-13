<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
		$this->load->model('Ref_kota_rajaongkir_model');
		$this->load->model('Ref_subdistrict_rajaongkir_model');
		$this->load->model('User_vendor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }

    public function getCities()
    {
        $cities = $this->Ref_kota_rajaongkir_model->getByIdProvinsi($this->input->post('id_provinsi'));
        foreach($cities as $city){
            echo "<option value='$city[id]'>$city[type] $city[nama_kota]</option>";
        }
    }

    public function getSubdistrict()
    {
        $kecamatan = $this->Ref_subdistrict_rajaongkir_model->getByIdKota($this->input->post('id_kota'));
        foreach($kecamatan as $value){
            echo "<option value='$value[id]'>$value[nama_subdistrict]</option>";
        }
    }
}

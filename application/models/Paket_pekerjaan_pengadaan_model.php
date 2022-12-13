<?php 

class Paket_pekerjaan_pengadaan_model extends CI_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function getAll()
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByNomorPaketPekerjaan($nomor_paket_pekerjaan)
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->where('paket_pekerjaan_pengadaan.nomor_paket_pekerjaan', $nomor_paket_pekerjaan);
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByIdMitraGroupByNomorPaketPekerjaan($id_mitra)
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->where('paket_pekerjaan_pengadaan.id_mitra', $id_mitra);
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('paket_pekerjaan_pengadaan.nomor_paket_pekerjaan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllGroupByNomorPaketPekerjaan()
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('paket_pekerjaan_pengadaan.nomor_paket_pekerjaan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByBidangGroupByNomorPaketPekerjaan()
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        if($this->session->userdata('is_pengadaan') == 1) {
            $this->db->or_where('paket_pekerjaan_pengadaan.jenis_bidang', 'Pengadaan');
        }
        if($this->session->userdata('is_konstruksi') == 1) {
            $this->db->or_where('paket_pekerjaan_pengadaan.jenis_bidang', 'Konstruksi');
        }if($this->session->userdata('is_konsultasi') == 1) {
            $this->db->or_where('paket_pekerjaan_pengadaan.jenis_bidang', 'Konsultasi');
        }
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('paket_pekerjaan_pengadaan.nomor_paket_pekerjaan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByTUG3GroupByNomorPaketPekerjaan($tug_3)
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->join('pengajuan_barang_gudang', 'pengajuan_barang_gudang.id = paket_pekerjaan_pengadaan.id_pengajuan_barang');
        $this->db->where('pengajuan_barang_gudang.tug_3', $tug_3);
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('paket_pekerjaan_pengadaan.nomor_paket_pekerjaan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select("*,
        paket_pekerjaan_pengadaan.id AS id,
        DATE_FORMAT(paket_pekerjaan_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_mulai_tender,'%d-%m-%Y') AS tgl_mulai_tender, 
        DATE_FORMAT(paket_pekerjaan_pengadaan.tanggal_akhir_tender,'%d-%m-%Y') AS tgl_akhir_tender, 
        ");
        $this->db->from('paket_pekerjaan_pengadaan');
        $this->db->where('paket_pekerjaan_pengadaan.id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function update($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('paket_pekerjaan_pengadaan', $data);
    }

    public function updateDisetujuiMitraRekanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "status_paket_pekerjaan" => 3,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('paket_pekerjaan_pengadaan', $data);
    }

    public function updateDibatalkanMitraRekanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "status_paket_pekerjaan" => 0,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('paket_pekerjaan_pengadaan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('paket_pekerjaan_pengadaan');
    }


    public function getStatus()
    {
        $status = [
            'Proses Penawaran',
            'Penawaran Balasan Pengadaan PPKS',
            'Disetujui Pengadaan PPKS',
            'Disetujui Kedua Pihak',
            'Proses Pekerjaan',
            'Pekerjaan Selesai',
            'Dibatalkan',
        ];

        return $status;
    }
}

?>
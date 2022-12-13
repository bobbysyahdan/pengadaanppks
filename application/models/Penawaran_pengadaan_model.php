<?php 

class Penawaran_pengadaan_model extends CI_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function getAll()
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
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
        $this->db->order_by('paket_pekerjaan_pengadaan.id','ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByIdPaketPekerjaan($id_paket_pekerjaan)
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id_paket_pekerjaan', $id_paket_pekerjaan);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllGroupByNomorPenawaran()
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('penawaran_pengadaan.id_paket_pekerjaan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByNomorPenawaran($nomor_penawaran)
    {
        $this->db->select("*, 
        penawaran_pengadaan.id AS id,
        penawaran_pengadaan.harga_satuan AS harga_satuan,
        penawaran_pengadaan.total_harga AS total_harga,
        DATE_FORMAT(penawaran_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        ");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.nomor_penawaran', $nomor_penawaran);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByIdMitraIdPaketPekerjaan($id_mitra, $id_paket_pekerjaan)
    {
        $this->db->select("*, 
        penawaran_pengadaan.id AS id,
        penawaran_pengadaan.harga_satuan AS harga_satuan,
        penawaran_pengadaan.total_harga AS total_harga,
        DATE_FORMAT(penawaran_pengadaan.created_at,'%d-%m-%Y') AS tgl_created_at, 
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,
        ");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id_mitra', $id_mitra);
        $this->db->where('penawaran_pengadaan.id_paket_pekerjaan', $id_paket_pekerjaan);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllByIdMitraGroupByNomorPenawaran($id_mitra)
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id_mitra', $id_mitra);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('penawaran_pengadaan.nomor_penawaran');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllNotifikasiMitra($id_mitra)
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id_mitra', $id_mitra);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->where('penawaran_pengadaan.dibaca_vendor',0);
        $this->db->group_by('penawaran_pengadaan.nomor_penawaran');
        $this->db->order_by('penawaran_pengadaan.updated_at', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllDealPekerjaan($id_mitra)
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id_mitra', $id_mitra);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 0);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 1);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 2);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 3);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 4);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 5);
        $this->db->where('penawaran_pengadaan.status_penawaran !=', 6);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $this->db->group_by('penawaran_pengadaan.nomor_penawaran');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select("*, penawaran_pengadaan.id AS id,
        DATE_FORMAT(penawaran_pengadaan.updated_at,'%d-%m-%Y H:i:s') AS waktu,");
        $this->db->from('penawaran_pengadaan');
        $this->db->where('penawaran_pengadaan.id', $id);
        $this->db->join('paket_pekerjaan_pengadaan', 'paket_pekerjaan_pengadaan.id = penawaran_pengadaan.id_paket_pekerjaan');
        $this->db->join('ref_satuan_barang', 'ref_satuan_barang.id = paket_pekerjaan_pengadaan.id_satuan_barang');
        $this->db->join('ref_kategori_barang', 'ref_kategori_barang.id = paket_pekerjaan_pengadaan.id_kategori_barang');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function tambahDariTUG3($id_paket_pekerjaan, $harga_satuan, $nomor_penawaran)
    {
        try {
            $this->db->trans_start();
            date_default_timezone_set('Asia/Jakarta');
            $date_time = date('y-m-d H:i:s');
            $paket_pekerjaan = $this->Paket_pekerjaan_pengadaan_model->getById($id_paket_pekerjaan);
            $total_harga = $paket_pekerjaan['jumlah'] * $harga_satuan;
            
            $data = [
                "id_paket_pekerjaan" => $id_paket_pekerjaan,
                "id_pengajuan_barang" => $paket_pekerjaan['id_pengajuan_barang'],
                "nomor_penawaran" => $nomor_penawaran,
                "status_penawaran" => 0,
                "disetujui_vendor" => 0,
                "disetujui_pengadaan" => 0,
                "id_mitra" => $this->session->userdata('id_mitra'),
                "total_harga" => $total_harga,
                "harga_satuan" => $harga_satuan,
                "dibaca_vendor" => 1,
                "dibaca_pengadaan" => 0,
                "created_at" => $date_time,
                "updated_at" => $date_time,
                "created_by" => $this->session->userdata('id'),
            ];
            
            $this->db->insert('penawaran_pengadaan', $data);
            $this->db->trans_complete();
            return $id;
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }
    }
    public function update($id, $key)
    {
        try {
            date_default_timezone_set('Asia/Jakarta');
            $date_time = date('y-m-d H:i:s');
            $penawaran = $this->Penawaran_pengadaan_model->getById($id);
            $harga_satuan = $this->input->post("harga_satuan$key");
            $total_harga = $penawaran['jumlah'] * $harga_satuan;
            $data = [
                "total_harga" => $total_harga,
                "harga_satuan" => $harga_satuan,
                "updated_at" => $date_time,
            ];
            $this->db->where('id', $id);
            $this->db->update('penawaran_pengadaan', $data);
            $this->db->trans_complete();
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penawaran_pengadaan');
    }
    
    public function updateDisetujuiMitraRekanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $get_data = $this->Penawaran_pengadaan_model->getById($id);

        $data = [
            "status_penawaran" => 4,
            "disetujui_vendor" => 1,
            "dibaca_vendor" => 1,
            "dibaca_pengadaan" => 0,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('penawaran_pengadaan', $data);
    }

    public function updateDitolakPengadaan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $get_data = $this->Penawaran_pengadaan_model->getById($id);

        $data = [
            "status_penawaran" => 3,
            "disetujui_vendor" => 0,
            "dibaca_vendor" => 1,
            "dibaca_pengadaan" => 0,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('penawaran_pengadaan', $data);
    }

    public function updatePermintaanNegosiasiAwal($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $get_data = $this->Penawaran_pengadaan_model->getById($id);

        $data = [
            "status_penawaran" => 6,
            "dibaca_vendor" => 1,
            "dibaca_pengadaan" => 0,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('penawaran_pengadaan', $data);
    }
    

    public function updateDibatalkanMitraRekanan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $get_data = $this->Penawaran_pengadaan_model->getById($id);

        $data = [
            "status_penawaran" => 5,
            "dibaca_vendor" => 1,
            "dibaca_pengadaan" => 0,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('penawaran_pengadaan', $data);
    }

    public function updateDibacaMitra($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');

        $data = [
            "dibaca_vendor" => 1,
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('penawaran_pengadaan', $data);
    }


    public function getStatus()
    {
        $status = [
            'Proses Penawaran',
            'Disetujui Pengadaan PPKS',
            'Penawaran Balasan Pengadaan PPKS',
            'Ditolak Pengadaan PPKS',
            'Disetujui Kedua Pihak',
            'Dibatalkan Mitra Rekanan',
            'Permintaan Penawaran Awal',
            'Proses Pekerjaan',
            'Pekerjaan Selesai',
            'Dibatalkan Pengadaan PPKS',
        ];

        return $status;
    }
}

?>
<?php 

class Mitra_pembelian_barang_gudang_model extends CI_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('mitra_pembelian_barang_gudang');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('mitra_pembelian_barang_gudang');
        $this->db->where('mitra_pembelian_barang_gudang.id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function create($id_user)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');

        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telephone" => $this->input->post('no_telephone', true),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "nama_direktur" => $this->input->post('nama_direktur', true),
            "nomor_npwp" => $this->input->post('nomor_npwp', true),
            "is_pengadaan" => $this->input->post('is_pengadaan', true),
            "is_konsultasi" => $this->input->post('is_konsultasi', true),
            "is_konstruksi" => $this->input->post('is_konstruksi', true),
            "id_provinsi" => $this->input->post('id_provinsi', true),
            "id_kota" => $this->input->post('id_kota', true),
            "id_kecamatan" => $this->input->post('id_provinsi', true),
            "status" => 0,
            "id_user" => $id_user,
            "dibaca_pengadaan" => 0,
            "created_at" => $date_time,
            "updated_at" => $date_time,
            "created_by" => 1,
        ];
        $this->db->insert('mitra_pembelian_barang_gudang', $data);
    }

    public function update($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telephone" => $this->input->post('no_telephone', true),
            "nama_direktur" => $this->input->post('nama_direktur', true),
            "nomor_npwp" => $this->input->post('nomor_npwp', true),
            "is_pengadaan" => $this->input->post('is_pengadaan', true),
            "is_konsultasi" => $this->input->post('is_konsultasi', true),
            "is_konstruksi" => $this->input->post('is_konstruksi', true),
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('mitra_pembelian_barang_gudang', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mitra_pembelian_barang_gudang');
    }

    public function updateStatusVerifikasi($id)
    {
        try {
            $this->db->trans_start();
            date_default_timezone_set('Asia/Jakarta');
            $date_time = date('y-m-d H:i:s');
            $kbli = $this->input->post('kbli[]');
            if($kbli != NULL) {
                $kbli = implode(",", $kbli);
            } else {
                $kbli = NULL;
            }
            $data = [
                "status" => 1,
                "kode_kbli" => $kbli,
                "updated_at" => $date_time,
            ];
            $this->db->where('id', $id);
            $this->db->update('mitra_pembelian_barang_gudang', $data);
            $this->db->trans_complete();
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }     
    }

    public function updateUploadFiles($jenis_file, $id)
    {
        try {
            $this->db->trans_start();
            $mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($id);
            if($mitra_rekanan["$jenis_file"] != NULL) {
                $this->Mitra_pembelian_barang_gudang_model->deleteFiles($jenis_file, $id);
            }
            $uploaded_files = $this->Mitra_pembelian_barang_gudang_model->uploadFiles($jenis_file);
            $files = implode(",", $uploaded_files);
            date_default_timezone_set('Asia/Jakarta');
            $date_time = date('y-m-d H:i:s');
            $data = [
                "$jenis_file" => $files,
                "updated_at" => $date_time,
            ];
            $this->db->where('id', $id);
            $this->db->update('mitra_pembelian_barang_gudang', $data);
            $this->db->trans_complete();
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }   
    }

    public function uploadFiles($jenis_file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('ymdHis');
        $files = $_FILES[$jenis_file]['name'];
        $uploaded_files = [];
        if(count($files) > 0) {
            foreach($files as $key => $value) {
                $random = rand();
                $_FILES['file']['name'] = $_FILES[$jenis_file]['name'][$key];
                $_FILES['file']['type'] = $_FILES[$jenis_file]['type'][$key];
                $_FILES['file']['tmp_name'] = $_FILES[$jenis_file]['tmp_name'][$key];
                $_FILES['file']['error'] = $_FILES[$jenis_file]['error'][$key];
                $_FILES['file']['size'] = $_FILES[$jenis_file]['size'][$key];
                $config_file['upload_path'] = './upload/mitraRekanan/';
                $config_file['allowed_types'] = '*';
                $config_file['file_name'] = $jenis_file.'_'.$random.'_'.$date_time.'.pdf';
                $config_file['overwrite'] = true;
                $config_file['max_size'] = 50000; 
                $this->upload->initialize($config_file);
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $filename = base_url("upload/mitraRekanan/$filename");
                    array_push($uploaded_files, $filename);
                }
            }
            return $uploaded_files;
        } else {
            return NULL;
        }
    }

    public function deleteFiles($jenis_file, $id)
    {
        $mitra_rekanan = $this->Mitra_pembelian_barang_gudang_model->getById($id);
        if ($mitra_rekanan[$jenis_file] != NULL) {
            $files = explode(",", $mitra_rekanan[$jenis_file]);
            foreach($files as $value) {
                $filename = explode("/", $value);
                $filename = explode(".", $filename[count($filename)-1])[0];
                array_map('unlink', glob(FCPATH."upload/mitraRekanan/$filename.*"));
            }
        }
        return true;
    }

    public function getAllKBLI()
    {
        $kbli = [];
        for($i = 100; $i <= 999; $i++) {
            if($i < 9999) {
                array_push($kbli, "0$i");
            } else {
                array_push($kbli, "$i");
            }
        }
        return $kbli;
    }

}

?>
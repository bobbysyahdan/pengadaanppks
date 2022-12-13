<?php 

class Kode_kbli_model extends CI_model {

    public function getAll()
    {
        $query = $this->db->get('kode_kbli');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('kode_kbli', ['id' => $id]);
        return $query->row_array();
    }

    public function getAllByLikeKode($kode_kbli)
    {
        $this->db->select('*, kode_kbli.id AS id');
        $this->db->from('kode_kbli');
        $this->db->like('kode_kbli.kode', $kode_kbli, 'after');
        $query = $this->db->get()->result_array();
        return $query;
    }
}

?>
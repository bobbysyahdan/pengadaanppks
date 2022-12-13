<?php 

class Ref_subdistrict_rajaongkir_model extends CI_model {

    public function getAll()
    {
        $query = $this->db->get('ref_subdistrict_rajaongkir');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('ref_subdistrict_rajaongkir', ['id' => $id]);
        return $query->row_array();
    }

    public function getByIdKota($id_kota)
    {
        $query = $this->db->get_where('ref_subdistrict_rajaongkir', ['id_kota' => $id_kota]);
        return $query->result_array();
    }
}

?>
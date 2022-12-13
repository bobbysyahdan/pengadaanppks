<?php 

class User_vendor_model extends CI_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user_vendor');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllVerified()
    {
        $this->db->select('*');
        $this->db->from('user_vendor');
        $this->db->where('user_vendor.is_verified', 1);
        $this->db->where('user_vendor.role !=', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select('*, user_vendor.id AS id, mitra_pembelian_barang_gudang.id AS id_mitra');
        $this->db->from('user_vendor');
        $this->db->where('user_vendor.id', $id);
        $this->db->join('mitra_pembelian_barang_gudang', 'mitra_pembelian_barang_gudang.id_user = user_vendor.id');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function getByEmail($email)
    {
        $this->db->select('*, user_vendor.id AS id, mitra_pembelian_barang_gudang.id AS id_mitra');
        $this->db->from('user_vendor');
        $this->db->where('user_vendor.email', $email);
        $this->db->join('mitra_pembelian_barang_gudang', 'mitra_pembelian_barang_gudang.id_user = user_vendor.id');
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function getByRememberToken($remember_token)
    {
        $this->db->select('*, user_vendor.id AS id, mitra_pembelian_barang_gudang.id AS id_mitra');
        $this->db->from('user_vendor');
        $this->db->where('user_vendor.remember_token', $remember_token);
        $this->db->join('mitra_pembelian_barang_gudang', 'mitra_pembelian_barang_gudang.id_user = user_vendor.id');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function create($token)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "username" => htmlspecialchars($this->input->post('nama', true)),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "role" => 100,
            "remember_token" => $token,
            "is_active" => 0,
            "created_at" => $date_time,
            "updated_at" => $date_time,
        ];
        $this->db->insert('user_vendor', $data);
        $id = $this->db->insert_id();
        $this->Mitra_pembelian_barang_gudang_model->create($id);
    }

    public function emailVerified($token)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "is_active" => 1,
            "email_verified_at" => $date_time,
            "updated_at" => $date_time,
        ];
        $this->db->where('remember_token', $token);
        $this->db->update('user_vendor', $data);
    }

    public function update($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "username" => htmlspecialchars($this->input->post('name', true)),
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('user_vendor', $data);
    }

    public function resetPassword($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_time = date('y-m-d H:i:s');
        $data = [
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "updated_at" => $date_time,
        ];
        $this->db->where('id', $id);
        $this->db->update('user_vendor', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_vendor');
    }

    public function sendVerificationEmail($remember_token)
    {
        $user = $this->User_vendor_model->getByRememberToken($remember_token);
        if($user) {
            $email_pengirim = "no-reply@iopri.org";
			$email = $user['email'];
			$nama = $user['username'];
			$url = base_url("/auth/emailVerified/$remember_token");
			$message = "
			<p>Halo, <b>$nama</b></p>
			<p>Terima kasih sudah mendaftar menjadi Mitra Rekanan Di Pengadaan PPKS. Selanjutnya verifikasi untuk mengaktifkan akun Anda. Silahkan klik link berikut ini:</p>
			<p>$url</p>
			";
			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.iopri.org';
			$config['smtp_user'] = 'no-reply@iopri.org';
			$config['smtp_pass'] = 'SvdCUS4Tz=;L';
			$config['smtp_port'] = 465;
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['smtp_crypto'] = 'ssl';
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from('no-reply@iopri.org', 'Pengadaan PPKS');
			$this->email->to($email);
			$this->email->subject('Verifikasi Akun Baru Mitra Rekanan Pengadaan PPKS');
			$this->email->message($message);
			$this->email->set_mailtype("html");
            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
            } else {
                $this->email->send();
            }
        }
    }

    public function forgotPassword($email)
    {
        $user = $this->User_vendor_model->getByEmail($email);
        if($user) {
            $email_pengirim = "no-reply@iopri.org";
			$email = $user['email'];
            $remember_token = $user['remember_token'];
			$nama = $user['username'];
			$url = base_url("/auth/resetPassword/$remember_token");
			$message = "
			<p>Halo, <b>$nama</b></p>
			<p>Untuk memperbaharui password Akun Anda, Silahkan klik link berikut ini:</p>
			<p>$url</p>
			";
			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.iopri.org';
			$config['smtp_user'] = 'no-reply@iopri.org';
			$config['smtp_pass'] = 'SvdCUS4Tz=;L';
			$config['smtp_port'] = 465;
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['smtp_crypto'] = 'ssl';
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from('no-reply@iopri.org', 'Pengadaan PPKS');
			$this->email->to($email);
			$this->email->subject('Lupa Password');
			$this->email->message($message);
			$this->email->set_mailtype("html");
            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
            } else {
                $this->email->send();
            }
        }
    }

}

?>
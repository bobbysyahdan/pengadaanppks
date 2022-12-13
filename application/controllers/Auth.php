<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Mitra_pembelian_barang_gudang_model');
		$this->load->model('User_vendor_model');
		$this->load->model('Penawaran_pengadaan_model');
		$this->load->model('Paket_pekerjaan_pengadaan_model');
		$this->load->model('Ref_provinsi_rajaongkir_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }

	public function signin()
	{
		$data['title'] = "Masuk";
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$pass = md5($password);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('vendor/auth/signin', $data);
		} else {
			$user = $this->db->get_where('user_vendor', ['email' => $email])->row_array();
			$remember_token = $user['remember_token'];
			if(isset($user)) {
					if($user['is_active'] == 1) {
							if(password_verify($password, $user['password']) || $pass == $cek_karyawan['pass']) {
								$user = $this->User_vendor_model->getById($user['id']);
								$data = [
										'id' => $user['id'],
										'email' => $user['email'],
										'username' => $user['username'],
										'role' => $user['role'],
										'status' => $user['status'],
										'kode_kbli' => $user['kode_kbli'],
										'id_mitra' => $user['id_mitra'],
										'nama_mitra' => $user['nama'],
										'is_pengadaan' => $user['is_pengadaan'],
										'is_konstruksi' => $user['is_konstruksi'],
										'is_konsultasi' => $user['is_konsultasi'],
								];

								date_default_timezone_set('Asia/Jakarta');
								$date_time = date('y-m-d H:i:s');
								$data_user = [
										'last_login' => $date_time,
								];
								$this->db->where('id', $user['id']);
								$this->db->update('user_vendor', $data_user);

								$this->session->set_userdata($data);
								redirect('/');
							} else {
									$this->session->set_flashdata('failed', 'Password Salah.');
									redirect('/auth/signin');
							}
					} else {
						$resend_link = base_url("/auth/sendVerificationEmail/$remember_token");
						$this->session->set_flashdata('failed', "Akun belum aktif. Mohon verifikasi Akun Anda lewat email Anda. Jika belum ada terkirim ke email Anda, tekan <b><a class='text-success' href='$resend_link'>Kirim Ulang</a></b> untuk mengirim kembali link verifikasi Akun Anda.");
						redirect('/auth/signin');
					}
			} else {
				$this->session->set_flashdata('failed', 'Email Anda tidak terdaftar.');
				redirect('/auth/signin');
			}
		}
	}

	public function signup()
	{
		$data['title'] = "Buat Akun";
		$this->form_validation->set_rules('nomor_npwp', 'No. NPWP', 'required');
		$this->form_validation->set_rules('no_telephone', 'No. Telephone/Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nama', 'Nama Perusahaan', 'trim|required|is_unique[user_vendor.username]',[
			'is_unique' => 'This nama perusahaan already registered!',

		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_vendor.email]', [
			'is_unique' => 'This email already registered!',
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
		$data['provinsi'] = $this->Ref_provinsi_rajaongkir_model->getAll();
		if($this->form_validation->run() == FALSE) {
			$this->load->view('vendor/auth/signup', $data);

		} else {
			if($this->input->post('is_pengadaan') && $this->input->post('is_konstruksi') && $this->input->post('is_konsultasi')) {
				$this->session->set_flashdata('failed', 'Mohon dipilih jenis bidang Perusahaan Anda.');
			}
			$token = rand();
			$email_pengirim = "no-reply@iopri.org";
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$url = base_url("/auth/emailVerified/$token");
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
			$this->User_vendor_model->create($token);
			$this->session->set_flashdata('success', 'Akun baru Anda berhasil dibuat. Kami telah mengirim link verifikasi akun di email Anda untuk mengaktifkan akun Anda.');
			redirect('/auth/signin');
		}
	}

	public function emailVerified($token)
	{
		$this->User_vendor_model->emailVerified($token);
		$this->session->set_flashdata('success', 'Selamat, akun Anda telah aktif. Anda sekarang bisa sign in dan menjadi Mitra Rekanan Pengadaan PPKS.');
		redirect('/auth/signin');
	}

	public function resetPassword($remember_token)
	{
		$data['title'] = "Reset Password";
		$data['remember_token'] = $remember_token;
		$data['user'] = $this->User_vendor_model->getByRememberToken($remember_token);
		$id = $data['user']['id'];
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('vendor/layouts/header', $data);
			$this->load->view('vendor/layouts/menu');
			$this->load->view('vendor/auth/reset_password', $data);
			$this->load->view('vendor/layouts/footer');
		} else {
			$this->User_vendor_model->resetPassword($id);
			$this->session->set_flashdata('success', "Password Akun Anda sudah diperbaharui. Silahkan masuk dengan Akun Anda.");
			redirect("/auth/signin");     
		}
	} 

	public function forgotPassword()
	{
		$data['title'] = "Forgot Password";
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vendor/auth/forgot_password', $data);
		} else {
			$email = $this->input->post('email');
			$user = $this->User_vendor_model->getByEmail($email);
			if($user) {
				if($user['is_active'] != 1) {
					$token = $user['remember_token'];
					$resend_link = base_url("/auth/forgotPassoword/$token");
					$this->session->set_flashdata('failed', "<small>Email Akun anda belum diverifikasi.</small><br><small> Silahkan verfikasi terlebih dahulu. Jika Anda belum mendapatkan link verifikasi, tekan <a class='text-success' href='$resend_link'><b>Kirim Ulang</b></a> untuk mengirim link verifikasi yang baru.</small>");
					redirect('/auth/forgotPassword');
				} else {
					$this->User_vendor_model->forgotPassword($email);
					$this->session->set_flashdata('success', '<small>Berhasil mengirim link pembaharuan password ke Akun Email Anda.</small>');
					redirect('/auth/forgotPassword');
				}
			} else {
				$this->session->set_flashdata('failed', "<small>Email tidak terdaftar.</small>");
				redirect('/auth/forgotPassword');
			}
		}
	}	

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_mitra');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('kode_kbli');
		$this->session->unset_userdata('is_pengadaan');
		$this->session->unset_userdata('is_konstruksi');
		$this->session->unset_userdata('is_konsultasi');
		redirect('/');
	}

	public function sendVerificationEmail($token_email)
	{   
        $user = $this->User_vendor_model->getByRememberToken($token_email);
		if($user) {
			if($user['is_active'] == 0) {
				$this->User_vendor_model->sendVerificationEmail($token_email);
				$this->session->set_flashdata('success', 'Link verifikasi Akun Anda berhasil terkirim ke Email Anda.');	
			} else {
				$link_signin = base_url('/auth/signin');
				$this->session->set_flashdata('failed', "Akun Anda sudah Aktif. Silahkan masuk Akun Anda di Menu <a href='$link_signin'>Masuk</a>.");	
			}
		} else {
			$this->session->set_flashdata('failed', 'Email Anda tidak terdaftar.');	
		}
		
		redirect('/auth/signin');
    }
}

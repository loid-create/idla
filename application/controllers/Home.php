<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$ambil = $this->db->get_where('info')->row_array();
		$data['i_h'] =  $ambil;

		$this->load->view('home/index', $data);
	}
	public function tentang()
	{
		$drh1 = $this->db->get_where('klinik', ['id_klinik' => '1'])->row_array();
		$data['tg1'] =  $drh1;

		$drh2 = $this->db->get_where('klinik', ['id_klinik' => '2'])->row_array();
		$data['tg2'] =  $drh2;

		$ambil = $this->db->get_where('info')->row_array();
		$data['i_h'] =  $ambil;

		$ambil2 = $this->db->get_where('tentang')->row_array();
		$data['t_k'] =  $ambil2;

		$this->load->view('home/tentang', $data);
	}
	public function kontak()
	{
		$ambil = $this->db->get_where('info')->row_array();
		$data['i_ktk'] =  $ambil;

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|trim');
		$this->form_validation->set_rules('comments', 'Pesan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('home/kontak', $data);
		} else {
			$this->authen->sendKontak();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan kamu berhasil dikirimkan, terimakasih.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('home/kontak');
		}
	}
	public function daftar()
	{
		$ambil = $this->db->get_where('info')->row_array();
		$data['i_reg'] =  $ambil;
		//validasi
		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]', [
			'max_length' => 'Nama tidak boleh lebih dari 50 huruf !'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email telah terdaftar !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak sama !',
			'min_length' => 'Password minimal 4 digit!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('home/daftar');
			$this->load->view('templates/footer', $data);
		} else {
			$this->authen->register();
			//pesan flashdata berhasil register
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil membuat akun, <strong>silahkan login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('home/masuk');
		}
	}
	public function masuk()
	{
		$ambil = $this->db->get_where('info')->row_array();
		$data['i_reg'] =  $ambil;

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('home/masuk');
			$this->load->view('templates/footer', $data);
		} else {
			//validasi success
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$masuk = $this->authen->getUser($email);
		if ($masuk) {
			//cek aktif
			if ($masuk['is_active'] == 1) {
				//cek password
				if (password_verify($password, $masuk['password'])) {
					$data = [
						'id' => $masuk['id'],
						'nama' => $masuk['nama'],
						'email' => $masuk['email'],
						'role_id' => $masuk['role_id'],
						'status' => $masuk['status'],
						'date_created' => $masuk['date_created']
					];
					//session
					$this->session->set_userdata($data);
					//login berdasarkan role
					if ($masuk['role_id'] == 1) {
						redirect('admin');
					} elseif ($masuk['role_id'] == 2) {
						redirect('member');
					} else {
						redirect('dokter');
					}
				} else {
					//password salah
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Password salah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('home/masuk');
				}
			} else {
				//akun tidak aktif
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Akun ini tidak aktif!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('home/masuk');
			}
		} else {
			//akun tidak terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Akun belum terdaftar!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('home/masuk');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('home');
	}
}

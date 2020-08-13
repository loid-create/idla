<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
    }

    public function index()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Admin';
        $data['admin'] =  $ambil;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah_dokter()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Tambah Dokter';
        $data['admin'] =  $ambil;

        //validasi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email telah terdaftar !'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password minimal 4 digit!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah-dokter', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->admod->registerDokter();
            //pesan flashdata berhasil register
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil membuat akun, <strong>silahkan login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/data_dokter');
        }
    }

    public function data_member()
    {
        $ambil = $this->db->get_where('user')->row_array();
        $data['title'] = 'Eldora Vet Clinic - Data Member';
        $data['admin'] =  $ambil;

        $hasil1 = $this->db->select('*')->where('role_id', '2')->get('user')->result_array();
        $data['dtMember'] = $hasil1;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/data-member', $data);
        $this->load->view('admin/templates/footer');
    }

    public function hapus_data_member()
    {
        $id = $this->uri->segment(3);
        $this->admod->deleteUsers($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Member kamu berhasil dihapus !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_member');
    }

    public function hapus_data_dokter()
    {
        $id = $this->uri->segment(3);
        $this->admod->deleteUsers($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Member kamu berhasil dihapus !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_dokter');
    }

    public function data_dokter()
    {
        $ambil = $this->db->get_where('user', ['role_id' => '3'])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Data Dokter';
        $data['admin'] =  $ambil;

        $hasil1 = $this->db->select('*')->where('role_id', '3')->get('user')->result_array();
        $data['dtDokter'] = $hasil1;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/data-dokter', $data);
        $this->load->view('admin/templates/footer');
    }

    public function kelola_info()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Kelola Info Klinik';
        $data['admin'] =  $ambil;

        $hasil1 = $this->db->get('info')->result_array();
        $data['infoclinic'] = $hasil1;

        $hasil2 = $this->db->get('tentang')->result_array();
        $data['tentang'] = $hasil2;

        $hasil3 = $this->db->get('klinik')->result_array();
        $data['klinik'] = $hasil3;

        $hasil4 = $this->db->get('kontak')->result_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/kelola', $data);
        $this->load->view('admin/templates/footer');
    }
}

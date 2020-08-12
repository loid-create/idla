<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        check_member();
    }

    public function index()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Member';
        $data['member'] = $ambil;

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('member/templates/footer');
    }

    public function ajukan()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Member';
        $data['member'] = $ambil;

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/ajukan-konsultasi', $data);
        $this->load->view('member/templates/footer');
    }

    public function detail_pengajuan()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Member';
        $data['member'] = $ambil;

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/detail-pengajuan', $data);
        $this->load->view('member/templates/footer');
    }

    public function konsultasi()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Member';
        $data['member'] = $ambil;

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/konsultasi-online', $data);
        $this->load->view('member/templates/footer');
    }

    public function medical_record()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Member';
        $data['member'] = $ambil;

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/medical-record', $data);
        $this->load->view('member/templates/footer');
    }

    public function edit_profile()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Edit Profil';
        $data['member'] = $ambil;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('member/templates/header', $data);
            $this->load->view('member/templates/sidebar', $data);
            $this->load->view('member/templates/topbar', $data);
            $this->load->view('member/edit-member', $data);
            $this->load->view('member/templates/footer');
        } else {
            $this->authen->editMember();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi akun kamu telah diubah. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('member');
        }
    }

    public function data_pet()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Data Peliharaan';
        $data['member'] = $ambil;

        ///$this->db->select('*')->where('role_id', '2')->get('user')->result_array();
        //$cek1 = $this->db->select('*')->where('id', ['id' => $this->session->userdata('id')])->get('user')->result_array();
        //$cek2 = $this->db->select('*')->where('user_id', ['user_id' => $this->session->userdata('user_id')])->get('peliharaan')->result_array();

        ///$hasil = $this->db->get('peliharaan')->result_array();
        $hasil = $this->db->select("user.id, peliharaan.id, peliharaan.user_id, peliharaan.nama_pet, peliharaan.ras_pet, peliharaan.jenis_pet, peliharaan.jk, peliharaan.date_created, peliharaan.date_modified")->from('user')->join('peliharaan', 'user.id = peliharaan.user_id')->where("user.email", $this->session->userdata('email'))->get()->result_array();
        $data['pet'] = $hasil;

        $this->form_validation->set_rules('namapet', 'Nama Pet', 'required|trim|is_unique[peliharaan.nama_pet]', [
            'is_unique' => 'Nama Pet sudah ada !'
        ]);
        $this->form_validation->set_rules('ras', 'Ras Pet', 'required|trim');
        $this->form_validation->set_rules('jp', 'Jenis Pet', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('member/templates/header', $data);
            $this->load->view('member/templates/sidebar', $data);
            $this->load->view('member/templates/topbar', $data);
            $this->load->view('member/data-pet', $data);
            $this->load->view('member/templates/footer');
        } else {
            $this->authen->tambahPet();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Peliharaan kamu berhasil ditambah !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('member/data_pet');
        }
    }

    public function hapus_data_pet()
    {
        $id = $this->uri->segment(3);
        $this->authen->deletePet($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Peliharaan kamu berhasil dihapus !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('member/data_pet');
    }

    public function edit_data_pet()
    {
        $this->form_validation->set_rules('namapet', 'Nama Peliharaan', 'required|trim');
        $this->form_validation->set_rules('ras', 'Ras Peliharaan', 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->authen->editPet();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Peliharaan kamu berhasil diubah !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('member/data_pet');
        }
    }
}

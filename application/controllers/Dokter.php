<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        check_dokter();
    }

    public function index()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function jadwal()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/jadwal', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function konsultasi_online()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/konsultasi-online', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function medical_record()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/medical-record', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function edit_profile()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Edit Profil';
        $data['dokter'] = $ambil;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('dokter/templates/header', $data);
            $this->load->view('dokter/templates/sidebar', $data);
            $this->load->view('dokter/templates/topbar', $data);
            $this->load->view('dokter/edit-dokter', $data);
            $this->load->view('dokter/templates/footer');
        } else {
            $this->authen->editMember();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi akun kamu telah diubah. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('dokter');
        }
    }
}

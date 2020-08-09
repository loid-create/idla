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

        $hasil = $this->db->get('peliharaan')->result_array();
        $data['pet'] = $hasil;

        $update_pet = $this->db->get_where('peliharaan')->row_array();
        $data['u_pet'] = $update_pet;

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
        $this->load->model('Auth_model', 'del_pet');
        $id = $this->uri->segment(3);
        $this->del_pet->deletePet($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Peliharaan kamu berhasil dihapus !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('member/data_pet');
    }

    public function edit_data_pet()
    {
        $this->load->model('Auth_model', 'c_pet');
        $this->form_validation->set_rules('namapet', 'Nama Peliharaan', 'required|trim');
        $this->form_validation->set_rules('ras', 'Ras Peliharaan', 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->c_pet->editPet();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Data Peliharaan kamu berhasil diubah !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('member/data_pet');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function register()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'gambar' => 'member.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'tgl_lahir' => date('Y-m-d'),
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('user', $data);
    }

    public function registerDokter()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'gambar' => 'doctor.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 3,
            'is_active' => 1,
            'tgl_lahir' => date('Y-m-d'),
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('user', $data);
    }

    public function registerPet()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama_pet' => htmlspecialchars($this->input->post('name', true)),
            'ras' => htmlspecialchars($email),
            'jenis_pet' => 1,
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('pet', $data);
    }

    public function editMember()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $ambil;

        $id = $this->input->post('id', true);
        $name = $this->input->post('name', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $notelp = $this->input->post('no_telp', true);
        $jk = $this->input->post('jk', true);
        $alamat = $this->input->post('alamat', true);
        $kota = $this->input->post('kota', true);
        $gambar_lama = $data['member']['gambar'];

        if ($_FILES['image']['error'] === 4) {
            $upload_gambar = $gambar_lama;
        } elseif ($gambar_lama == "member.png") {
            $upload_gambar = "member.png";
        } else {
            $upload_gambar = $_FILES['image']['name'];
            if ($upload_gambar) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    unlink(FCPATH . 'assets/' . $gambar_lama);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        $data = [
            'nama' => htmlspecialchars($name),
            'gambar' => $upload_gambar,
            'tgl_lahir' => htmlspecialchars($tgl_lahir),
            'no_telp' => htmlspecialchars($notelp),
            'jenis_kelamin' => $jk,
            'alamat' => htmlspecialchars($alamat),
            'kota' => htmlspecialchars($kota),
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function tambahPet()
    {
        $np = $this->input->post('namapet', true);
        $rp = $this->input->post('ras', true);
        $jp = $this->input->post('jp', true);

        $data = [
            'nama_pet' => htmlspecialchars($np),
            'ras_pet' => htmlspecialchars($rp),
            'jenis_pet' => $jp,
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('peliharaan', $data);
    }

    public function editPet()
    {
        $id = $this->input->post('id', true);
        $np = $this->input->post('namapet', true);
        $rp = $this->input->post('ras', true);
        $jp = $this->input->post('jp', true);
        $jk = $this->input->post('jk', true);

        $data = [
            'nama_pet' => htmlspecialchars($np),
            'ras_pet' => htmlspecialchars($rp),
            'jenis_pet' => $jp,
            'jk' => $jk,
            'date_created' => date('Y-m-d')
        ];

        $this->db->where('id', $id);
        $this->db->update('peliharaan', $data);
    }

    public function deletePet($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peliharaan');
    }
}

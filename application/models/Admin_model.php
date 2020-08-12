<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function registerDokter()
    {
        $email = $this->input->post('email', true);
        $jk = $this->input->post('jk', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'gambar' => 'doctor.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $jk,
            'role_id' => 3,
            'status' => 1,
            'is_active' => 1,
            'tgl_lahir' => date('Y-m-d'),
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('user', $data);
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

    public function deleteUsers($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}

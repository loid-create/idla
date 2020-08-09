<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

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

    public function deleteInfo($id)
    {
        $this->db->where('id_info', $id);
        $this->db->delete('info');
    }
}

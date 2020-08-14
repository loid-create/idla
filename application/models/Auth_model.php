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
            'status' => 1,
            'is_active' => 1,
            'tgl_lahir' => date('Y-m-d'),
            'date_created' => date('Y-m-d')
        ];
        $this->db->insert('user', $data);
        $this->db->update('janji_temu', $data);
        return $data;
    }

    public function sendKontak()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $sj = $this->input->post('subject', true);
        $pesan = $this->input->post('comments', true);
        $data = [
            'nama' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'subject' => htmlspecialchars($sj),
            'message' => htmlspecialchars($pesan),
            'ip_address' => $this->input->ip_address()
        ];
        $this->db->insert('kontak', $data);
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

    public function editMemberApi($user)
    {
        $ambil = $this->db->get_where('user', ['email' => $user->email])->row_array();

        $name = $this->input->post('name', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $notelp = $this->input->post('no_telp', true);
        $jk = $this->input->post('jk', true);
        $alamat = $this->input->post('alamat', true);
        $kota = $this->input->post('kota', true);
        $gambar_lama = $ambil['gambar'];

        if ($_FILES['image']['error'] === 4) {
            $upload_gambar = $gambar_lama;
        } elseif ($gambar_lama == "member.png") {
            $upload_gambar = "member2.png";
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

        $this->db->where('id', $user->id);
        $this->db->update('user', $data);
        return $this->db->get_where('user', ['email' => $user->email])->row_array();
    }

    public function tambahPet()
    {
        $np = $this->input->post('namapet', true);
        $rp = $this->input->post('ras', true);
        $jp = $this->input->post('jp', true);
        $jk = $this->input->post('jk', true);
        $uid = $this->input->post('userid', true);
        $data = [
            'user_id' => $uid,
            'nama_pet' => htmlspecialchars($np),
            'ras_pet' => htmlspecialchars($rp),
            'jenis_pet' => $jp,
            'jk' => $jk,
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
            'date_modified' => date('Y-m-d')
        ];

        $this->db->where('id', $id);
        $this->db->update('peliharaan', $data);
    }

    public function editInfo()
    {
        $id = $this->input->post('id', true);
        $alt_info = $this->input->post('alamat', true);
        $np_info = $this->input->post('notelp', true);
        $em_info = $this->input->post('email', true);

        $data = [
            'alamat' => htmlspecialchars($alt_info),
            'notelp' => htmlspecialchars($np_info),
            'email' => htmlspecialchars($em_info)
        ];

        $this->db->where('id_info', $id);
        $this->db->update('info', $data);
    }

    public function editTentang()
    {
        $id = $this->input->post('id', true);
        $n_klinik = $this->input->post('namaklinik', true);
        $t_klinik = $this->input->post('tentang', true);

        $data = [
            'nama_klinik' => htmlspecialchars($n_klinik),
            'isi_tentang' => htmlspecialchars($t_klinik)
        ];

        $this->db->where('id_tentang', $id);
        $this->db->update('tentang', $data);
    }

    public function editDokterKlinik()
    {
        $id = $this->input->post('id', true);
        $nd_k = $this->input->post('namadokter', true);
        $pd_k = $this->input->post('profesi', true);

        $data = [
            'nama_dokter' => htmlspecialchars($nd_k),
            'profesi' => htmlspecialchars($pd_k)
        ];

        $this->db->where('id_klinik', $id);
        $this->db->update('klinik', $data);
    }

    public function deletePet($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peliharaan');
    }


    public function tambahJanji($userid)
    {
        $jadwalId = $this->input->post('jadwalId');
        $jadwal = $this->detailJadwal($jadwalId);
        if (!$jadwal->isBooked) {
            $data = [
                'userId' => $userid,
                'dokterId' => $jadwal->dokterId,
                'jadwalId' => $jadwalId,
                'waktu' => $jadwal->startAt,
                'durasi' => $jadwal->durasi
            ];
            $this->db->insert('janji_temu', $data);
            $this->bookJadwal($jadwalId);
            return $data;
        }
        return 0;
    }

    public function detailJanji($id)
    {
        return $this->db->get_where('janji_temu', ['id' => $id])->first_row();
    }

    public function editJanji($userid)
    {
        $id = $this->uri->segment(3);
        $jadwalId = $this->input->post('jadwalId');
        $janji = $this->detailJanji($id);

        $newJadwal = $this->detailJadwal($jadwalId);
        if (!$newJadwal->isBooked && !$janji->konfirmasi) {
            $data = [
                'waktu' => $newJadwal->startAt,
                'dokterId' => $newJadwal->dokterId,
                'jadwalId' => $jadwalId,
                'konfirmasi' => 0,
                'durasi' => $newJadwal->durasi
            ];
            $this->db->where('id', $id);
            $this->db->update('janji_temu', $data);

            $this->bookJadwal($jadwalId);
            $this->cancelBookedJadwal($janji->jadwalId);
            return $data;
        }
        return 0;
    }


    public function confirmJanji() // untuk dokter
    {
        $id = $this->input->post('id');
        $data = [
            'konfirmasi' => 1
        ];
        $this->db->where('id', $id);
        return $this->db->update('janji_temu', $data);
    }


    public function deleteJanji()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        return $this->db->delete('janji_temu');
    }

    public function getDokter()
    {
        return $this->db->get_where('user', ['role_id' => 3, 'is_active' => 1])->result();
    }

    //====================================== JADWAL ============================
    public function tambahJadwal($data)
    {
        $this->db->insert_batch('jadwal_dokter', $data);
        return $data;
    }

    public function getJadwal($dokterId, $date)
    {
        if ($date) {
            return $this->db->get_where('jadwal_dokter', ['dokterId' => $dokterId, "date" => $date])->result();
        }
        return $this->db->get_where('jadwal_dokter', ['dokterId' => $dokterId])->result();
    }

    public function checkJadwal($date)
    {
        return $this->db->get_where('jadwal_dokter', ['date' => $date])->first_row();
    }

    public function detailJadwal($id)
    {
        return $this->db->get_where('jadwal_dokter', ['id' => $id])->first_row();
    }

    public function bookJadwal($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('jadwal_dokter', ['isBooked' => 1]);
    }

    public function cancelBookedJadwal($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('jadwal_dokter', ['isBooked' => 0]);
    }
    //===========================END JADWAL============================================
}

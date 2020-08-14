<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $User = 'user';

    public function GetUserData()
    {
        $this->db->select('id,nama,email,gambar,tgl_lahir,no_telp,jenis_kelamin,alamat,kota');
        $this->db->from($this->User);
        $this->db->where("id", $this->session->userdata['id']);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function PictureUrl()
    {
        $this->db->select('id,gambar');
        $this->db->from($this->User);
        $this->db->where("id", $this->session->userdata['id']);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['gambar'])) {
            return base_url('assets/' . $res['gambar']);
        } else {
            return base_url('assets/img/profile/default.png');
        }
    }

    public function PictureUrlById($id)
    {
        $this->db->select('id,gambar');
        $this->db->from($this->User);
        $this->db->where("id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['gambar'])) {
            return base_url('assets/' . $res['gambar']);
        } else {
            return base_url('assets/img/profile/default.png');
        }
    }





    public function GetName($id)
    {
        $this->db->select('id,nama');
        $this->db->from($this->User);
        $this->db->where("id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();

        return $res['nama'];
    }

    public function GetIDByName($name)
    {
        $this->db->select('id,nama');
        $this->db->from($this->User);
        $this->db->where("nama", $name);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();

        return $res['id'];
    }

    public function AllRoleTypes($role)
    {
        $this->db->select('id,nama');
        $this->db->from($this->User);
        $this->db->where("role_id", $role);
        $query = $this->db->get();
        $u = $query->num_rows();

        return $u;
    }

    public function VendorsList()
    {
        $this->db->select('id,nama,gambar,email');
        $this->db->from($this->User);
        $this->db->where("role_id", "3");
        $this->db->where("status", "1");
        $query = $this->db->get();
        $r = $query->result_array();

        return $r;
    }

    public function ClientsListCs()
    {
        $this->db->select('id,nama,gambar,email');
        $this->db->from($this->User);
        $this->db->where("role_id", "2");
        $this->db->where("status", "1");
        $query = $this->db->get();
        $r = $query->result_array();

        return $r;
    }

    public function joinTable() {
        $this->db->select('janji_temu.id, user.nama, user.gambar, jadwal_dokter.startAt, jadwal_dokter.endAt, user.kota, user.alamat, user.jenis_kelamin, janji_temu.konfirmasi, jadwal_dokter.date');
        $this->db->from('janji_temu');
        $this->db->join('user','user.id=janji_temu.userId');
        $this->db->join('jadwal_dokter','jadwal_dokter.id=janji_temu.jadwalId');
        
        $query = $this->db->get();

        return $query->result_array();
    }
}

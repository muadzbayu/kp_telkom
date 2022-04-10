<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Nilai_model extends CI_Model
{
    public function get_all()
    {
        if(is_stts('user')){
            $this->db->where('id_user', $this->session->id_user);
            $result = $this->db->get('form_penilaian');
            return $result->result(); 
        }else{  
            $this->db->join('users', 'users.id_user = form_penilaian.id_user', 'LEFT');
            $this->db->where('id_admin', $this->session->id_admin);
            $result = $this->db->get('form_penilaian');
            return $result->result(); 
        }
    }
    public function insert_data($data)
    {
        $result = $this->db->insert('form_penilaian', array('id_user'=>$data));
        return $result;
    }
    public function find($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->get('form_penilaian');
        return $result->row();
    }
    public function update_data($id, $data)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->update('form_penilaian', $data);
        return $result;
    }
    public function delete_data($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('form_penilaian');
        return $result;
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Jam_model.php */
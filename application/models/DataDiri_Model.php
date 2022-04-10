<?php 
defined('BASEPATH') OR die('No direct script access allowed!');
	 

class DataDiri_model extends CI_Model
{
	public function insert_data($data){
        $result = $this->db->insert('data_diri', array('id_user'=>$data));
        return $result;
    }
    public function update_data($id, $data)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->update('data_diri', $data);
        return $result;
    }

    public function delete_data($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('data_diri');
        return $result;
    }
}

 
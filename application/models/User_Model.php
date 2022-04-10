<?php
defined('BASEPATH') OR die('No direct script access allowed');

class User_Model extends CI_Model
{
    //cek login table admin
    public function find_by($username,$password)
    {
      $data = $this->db->get_where('admin',array('id_admin'=>$username,'password'=>$password));
       return $data;
    }
     public function find_by_user($username,$password)
    {
       $data = $this->db->get_where('users',array('id_user'=>$username,'password'=>$password));
       return $data;
    }
    //
   public function find_by_datadiri($value, $return = FALSE)
    {
        if($this->session->stts == "admin"){
            $this->db->where('id_admin', $value);
            $data = $this->db->get('admin');
            if ($return) {
                return $data->row();
            }
            return $data;
        }else{
            $this->db->join('data_diri', 'users.id_user = data_diri.id_user', 'LEFT');
            $data = $this->db->get('users');
            if ($return) {
                return $data->row();
            }
            return $data;
        }
        
    }

    public function update_data($id, $data)
    {
        //table user
        if($this->session->stts == "user"){
            $this->db->where('id_user', $id);
            $result = $this->db->update('users', $data);
            return $result;
        }
        //table admin
        else{
            $this->db->where('id_admin', $id);
            $result = $this->db->update('admin', $data);
            return $result;
        }  
    }
     public function update_data_diri($id, $data)
    {
        //table user
            $this->db->where('id_user', $id);
            $result = $this->db->update('data_diri', $data);
            return $result;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('admin', $data);
        return $result;
    }
}


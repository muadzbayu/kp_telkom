<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model', 'user');
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->model('Divisi_model');
    }

    public function index()
    {

        $stts = $this->session->stts;
        if($stts == "admin"){
            $id_admin = $this->session->id_admin;
            $data['user'] = $this->user->find_by_datadiri($id_admin, true);
            $data['pointer'] = "Absensi"; 
            $data['sub_bread'] = "Data Diri";
            return $this->template->load('template', 'edit_profil', $data);
        }else{
            $id_user = $this->session->id_user;
            $data['user'] = $this->user->find_by_datadiri($id_user, true);
            $data['divisi'] = $this->Divisi_model->get_all();
            $data['pointer'] = "Dashboard"; 
            $data['sub_bread'] = "Data Diri";
            return $this->template->load('template', 'edit_profil', $data);
        }
        
    }

    public function edit_profil()
    {
        $post = $this->input->post();
        //admin
        if($this->session->stts == "admin"){
            $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'telegram' => $post['telegram'],
            'email' => $post['email'],
            'id_admin' => $post['username'],
            ];
        }
        
        //user
        if($this->session->stts == "user"){
             $data = [
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'telegram' => $post['telegram'],
            'email' => $post['email'],
            'divisi' => $post['divisi'],
            'id_user' => $post['username'],
        ];
            $data_diri = [
                'asal_sekolah' => $post['asal_sekolah'],
                'program_studi' => $post['program_studi'],
                'tempat_kp' => $post['tempat_kp'],
                'waktu_mulai' => $post['waktu_mulai'],
                'waktu_selesai' => $post['waktu_selesai'],
                'dosen_pembimbing' => $post['dosen_pembimbing'],
                'pembimbing_lapangan' => $post['pembimbing_lapangan'],
            ];
        }
       

        if ($post['password'] !== '') {
            /*kalau menggunakan md5
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            */
            $data['password'] = $post['password'];
        }
        //cek session user atau admin
        if($this->session->stts == "user"){
            $result = $this->user->update_data($this->session->id_user, $data);
            $this->user->update_data_diri($this->session->id_user, $data_diri);
            //$result = $this->mahasiswa->update_data_diri($this->session->id_user, $data1);
        }else{
            $result = $this->user->update_data($this->session->id_admin, $data);
        }
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Profil berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Profil gagal diubah!'
            ];
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('user');
    }

    public function update_foto()
    {
        $config = [
            'upload_path' => './assets/img/profil',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $response = [
                'status' => 'error',
                'message' => $this->upload->display_errors()
            ];

            $this->session->set_flashdata('response', $response);
            return redirect('user');
        }

        $data_foto = $this->upload->data();
        $data['foto'] = $data_foto['file_name'];
        if($this->session->stts == "user"){
            $result = $this->user->update_data($this->session->id_user, $data);
        }else{
            $result = $this->user->update_data($this->session->id_admin, $data);
        }

        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Foto Profil berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Foto Profil gagal diubah!'
            ];
            unlink($data_foto['full_path']);
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('user');
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\User.php */
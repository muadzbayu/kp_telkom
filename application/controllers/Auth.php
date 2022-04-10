<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login(true);
    }

    public function index()
    {
        return $this->load->view('login');
    }
    public function register(){
        return $this->load->view('register');
    }
    public function register_akun(){
        $this->load->model('User_Model');
        $post = $this->input->post();
            $data = [
            'id_admin' => $post['username'],
            'nik' => $post['nik'],
            'telp' => $post['telp'],
            'password' => $post['password'],
            ];

        $result = $this->User_Model->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Admin telah ditambahkan!'
            ];
            $redirect = 'auth/';
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Admin gagal ditambahkan'
            ];
            $redirect = 'auth/register';
        }
        
        $this->session->set_flashdata('response', $response);
        redirect($redirect);
    }

    public function login()
    {
        $this->load->model('User_Model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //admin
        $check = $this->User_Model->find_by($username, $password);
        if ($check->num_rows() > 0) {
            $user_data = $check->row();
            //$verify_password = password_verify($password, $user_data);
            //$verify_password = $this->baru($password,$user_data);
            $this->set_session($user_data);
            if($user_data->stts = 'user'){
                redirect('absensi');
            }
            else{
                redirect('dashboard');
            }
        } //user
        else {
            $check = $this->User_Model->find_by_user($username, $password);
            if ($check->num_rows() > 0) {
                $user_data = $check->row();
                //$verify_password = password_verify($password, $user_data);
                //$verify_password = $this->baru($password,$user_data);
                $this->set_session($user_data);
                if($user_data->stts = 'user'){
                    redirect('dashboard');
                }
                else{
                    redirect('dashboard');
                }
            } else {
                $this->error('Login gagal! <br>User atau Password Salah');
            }
        }

        redirect('auth/');
    }


   public function baru($password,$user_data){
        if($password ==$user_data->password)
            {
                return true;
            }
            else{
                return false;
            }
    }
    private function set_session($user_data)
    {
        $this->load->model('Absensi_model');
         if($user_data->stts == "user"){
             $this->session->set_userdata([
           'id_user' => $user_data->id_user,
           'nama' => $user_data->nama,
           'foto' => $user_data->foto,
           'divisi' => $user_data->divisi,
           'stts' => $user_data->stts,
           'is_login' => true
            ]);   
        }else{
            $this->session->set_userdata([
           'id_admin' => $user_data->id_admin,
           'nama' => $user_data->nama,
           'foto' => $user_data->foto,
           'stts' => $user_data->stts,
           'is_login' => true
        ]);       
        }
        

        if ($user_data->stts == 'user') {
            $time = date('H:i:s');
            $absen = $this->Absensi_model->absen_harian_user($user_data->id_user);
            $absen_hari_ini = $absen->num_rows();

            if ($absen_hari_ini < 2) {
                $keterangan = '';
                if ($absen_hari_ini == 1) {
                    $keterangan = 'pulang';
                } else if ($absen_hari_ini == 0) {
                    $keterangan = 'masuk';
                }

                $this->session->set_flashdata('absen_needed', [
                    'href' => base_url('absensi/check_absen/'),
                    'message' => 'Anda belum melakukan absensi'
                ]);
            }
        }

        $this->session->set_flashdata('response', [
            'status' => 'success', 
            'message' => 'Selamat Datang ' . $user_data->nama
        ]);
    }

    private function error($msg)
    {
        $this->session->set_flashdata('error', $msg);
    }
}

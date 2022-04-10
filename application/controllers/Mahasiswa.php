<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Mahasiswa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_status_not('admin');
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->model('Nilai_model');
        $this->load->model('DataDiri_Model');
        $this->load->model('Absensi_Model');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswa->get_all();
        $data['pointer'] = "Dashboard"; 
        $data['sub_bread'] = "Buat Akun";
        return $this->template->load('template', 'karyawan/index', $data);
    }

    public function create()
    {
        $this->load->model('Divisi_model', 'divisi');
        $data['divisi'] = $this->divisi->get_all();
        //variabel ini untuk mengisi column id_admin pada tabel users
        $data['admin'] = $this->session->id_admin;
        $data['pointer'] = "Dashboard"; 
        $data['sub_bread'] = "Tambah Akun";
        return $this->template->load('template', 'karyawan/create', $data);
    }

    //Setelah Create/Tambah Mahasiswa
    public function store()
    {
        $post = $this->input->post();
        $data = [
            'id_user' => $post['username'],
            'password' => $post['password'],
            'id_admin' => $post['id_admin'],
            //'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ];

        $result = $this->mahasiswa->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data mahasiswa telah ditambahkan!'
            ];
            //perintah untuk menambahkan data pada tabel nilai_model sesuai dengan id_user
            //$this->DataDiri_Model->insert_data($data['id_user']);
            $this->Nilai_model->insert_data($data['id_user']);
            $this->DataDiri_Model->insert_data($data['id_user']);
            $redirect = 'mahasiswa/';
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data mahasiswa gagal ditambahkan'
            ];
            $redirect = 'mahasiswa/create';
        }
        
        $this->session->set_flashdata('response', $response);
        redirect($redirect);
    }

    public function edit()
    {
        $id_user = $this->uri->segment(3);
        $data['mahasiswa'] = $this->mahasiswa->find($id_user);
        return $this->template->load('template', 'karyawan/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'telegram' => $post['telegram'],
            'email' => $post['email'],
            'divisi' => $post['divisi'],
            'id_user' => $post['username'],
        ];

        /*$data1 = [
            'program_studi' => $post['program_studi'],
            'asal_sekolah' => $post['asal_sekolah'],
            'tempat_kp' => $post['tempat_kp'],
            'waktu_mulai' => $post['waktu_mulai'],
            'waktu_selesai' => $post['waktu_selesai'],
            'dosen_pembimbing' => $post['dosen_pembimbing'],
            'id_user' => $post['username'],
        ];
*/
        if ($post['password'] !== '') {
            //$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            $data['password'] = $post['password'];
        }

        $result = $this->mahasiswa->update_data($post['id_user'], $data);
       //$this->DataDiri_Model->update_data($post['id_user'], $data1);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data mahasiswa berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data mahasiswa gagal diubah!'
            ];
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('mahasiswa');
    }

    public function destroy()
    {
        $id = $this->uri->segment(3);
        //hapus semua data yang terkait dengan id_user
        $this->Nilai_model->delete_data($id);
        $this->DataDiri_Model->delete_data($id);
        $this->Absensi_Model->delete_data($id);
        $result = $this->mahasiswa->delete_data($id);

        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data mahasiswa berhasil dihapus!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data mahasiswa gagal dihapus!'
            ];
        }
        header('Content-Type: application/json');
        echo $response;
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Karyawan.php */
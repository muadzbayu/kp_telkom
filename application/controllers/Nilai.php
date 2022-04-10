<?php 
defined('BASEPATH') OR die('No direct script access allowed!');
/**
 * 
 */
class Nilai extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        is_login();
        $this->load->model('nilai_model');
    }

    public function index()
    {
        $data['nilai'] = $this->nilai_model->get_all();
        if(is_stts('user')){
            $data['title'] = "Daftar Nilai Mahasiswa";
        }
        else {
            $data['title'] = "Hasil Nilai Kerja Praktik";
        }
        $data['pointer'] = "Dashboard"; 
        $data['sub_bread'] = "Form Nilai KP";
        return $this->template->load('template', 'form_nilai', $data);
    }
    public function edit()
    {
        $data = $this->uri->segment(3);
        $result['pointer'] = "Dashboard"; 
        $result['sub_bread'] = "Edit Nilai KP";
        $result['nilai'] = $this->nilai_model->find($data);
        return $this->template->load('template','edit_nilai',$result);
    }
    public function update()
    {
        $post = $this->input->post();
        if($post['kehadiran'] > 100){$post['kehadiran'] = 100;}
        else if($post['kehadiran'] < 0){$post['kehadiran'] = 0;}

        if($post['kerjasama'] > 100){$post['kerjasama'] = 100;}
        else if($post['kerjasama'] < 0){$post['kerjasama'] = 0;}

        if($post['komunikasi'] > 100){$post['komunikasi'] = 100;}
        else if($post['komunikasi'] < 0){$post['komunikasi'] = 0;}

        if($post['sikap'] > 100){$post['sikap'] = 100;}
        else if($post['sikap'] < 0){$post['sikap'] = 0;}

        if($post['prestasi_kerja'] > 100){$post['prestasi_kerja'] = 100;}
        else if($post['prestasi_kerja'] < 0){$post['prestasi_kerja'] = 0;}

        if($post['kreatifitas'] > 100){$post['kreatifitas'] = 100;}
        else if($post['kreatifitas'] < 0){$post['kreatifitas'] = 0;}

        $data = [
            'kehadiran' => $post['kehadiran'],
            'kerjasama' => $post['kerjasama'],
            'komunikasi' => $post['komunikasi'],
            'sikap' => $post['sikap'],
            'prestasi_kerja' => $post['prestasi_kerja'],
            'kreatifitas' => $post['kreatifitas']
           ];

        $result = $this->nilai_model->update_data($post['username'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data nilai telah diubah!',
                'data' => $result
            ];
        } else {
            $reponse = [
                'status' => 'error',
                'message' => 'Data nilai gagal diubah!'
            ];
        }
        redirect('nilai');
        return $this->response_json($response);
    }

    public function response_json($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
 ?>
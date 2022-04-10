<?php 
/**
 * 
 */
class Fileku extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        is_login();
    }

	public function index(){
		$data['pointer'] = "Dashboard"; 
        $data['sub_bread'] = "File Tugas";
        return $this->template->load('template', 'fileku/unduh',$data);
	}
	public function upload(){
		$target_path = "files/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		echo "$target_path";
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			redirect('Fileku');
		}
		else{
			echo "Error uploading file. Please try again!";
			redirect('Fileku');
		}
	}
	public function delete(){
		$hapus = $this->uri->segment(3);
		unlink("files/".$hapus);
		redirect('Fileku');
	}
	public function download(){	
		$direktori = "./files/";
		$filename = $this->uri->segment(3);
		if(file_exists($direktori.$filename)){
			$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
			switch($file_extension){
				case "pdf":$ctype="application/pdf";
				break;
				case "exe":$ctype="application/ocnet-stream";
				break;
				case "zip":$ctype="application/zip";
				break;
				case "rar":$ctype="application/rar";
				break;
				case "doc":$ctype="application/msword";
				break;
				case "xls":$ctype="application/vnd.ms-excel";
				break;
				case "ppt":$ctype="application/vnd.ms-powerpoint";
				break;
				case "gif":$ctype="image/gif";
				break;
				case "png":$ctype="application/png";
				break;
				case "jpeg":$ctype="application/jpeg";
				break;
				case "jpg":$ctype="application/jpg";
				break;
				default: $ctype="application/octet-stream";
				break;
			}
			if($file_extension=='php'){
				echo "<h1>Access forbidden!</h1>
				  	<p>Please contact Administrator.</p>";
				  	exit;
			}
			else
			{
				header("Content-Type: octet/stream");
				header("Paragma: private");
				header("Expires:0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control:private",false);
				header("Content-Type:$ctype");
				header("Content-Disposition:attachment;filename=\"".basename($filename)."\";");
				header("Content-Transfer-Encoding:binary");
				header("Content-Length:".filesize($direktori.$filename));
				readfile("$direktori$filename");
				exit();
			}
		}else{
			echo"<h1>Acess forbidden!</h1>
			 <p>Please contact Administrator.</p>";
			exit;
		}
	}
}

	 ?>
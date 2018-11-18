<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPeserta extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$databeranda['tampil']=$this->db->query("select * from tbl_peserta");
		$databeranda['content']='peserta/v_peserta';
		$this->load->view('admin/home',$databeranda);
	}

	public function cari(){
		$npm = $_POST['npm'];
		$q=$this->db->query("select * from tbl_peserta where npm='".$npm."'")->num_rows();
		// print_r($q);
		if ($q > 0) {
			// $data = array('pesan' => 'NPM sudah terdaftar')
			echo "<br>NPM sudah terdaftar, Silahkan anda login";
		}else{
			echo "<br>NPM Tersedia";
		}
	}
	public function cari_email(){
		$email = $_POST['email'];
		$q=$this->db->query("select * from tbl_peserta where email='".$email."'")->num_rows();
		// print_r($q);
		if ($q > 0) {
			// $data = array('pesan' => 'NPM sudah terdaftar')
			echo "<br>Email sudah terdaftar, Silahkan gunakan Email lain";
		}else{
			echo "<br>Email Tersedia";
		}
	}

	public function register(){
		$this->load->view('peserta/v_daftar');
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSeleksi extends CI_Controller {

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


// 	function __construct(){
// 	parent::__construct();
	
// 			if($this->session->userdata('status') != "login"){
// 			redirect(base_url('LoginPeserta'));
// 		}
	
// }
	public function index()
	{
		
		// $databeranda['content']='peserta/v_daftar';
		$this->load->view('v_login_peserta');
	}
	public function simpan(){
			$data['nama']=$this->input->post("nama");
			$data['jurusan']=$this->input->post("jurusan");
			$data['npm']=$this->input->post("npm");
			$data['email']=$this->input->post("email");
			$data['username']=$this->input->post("username");
			$data['password']=$this->input->post("password");
			$data['level']='mahasiswa';
			$data['status_peserta']='0';
			//print_r($data);die;
			$q = $this->db->query("select * from tbl_peserta where npm='".$data['npm']."' and email='".$data['email']."' ")->num_rows();
			$qa = $this->db->query("select * from tbl_peserta where npm='".$data['npm']."' ")->num_rows();
			$qe = $this->db->query("select * from tbl_peserta where email='".$data['email']."' ")->num_rows();
			if ($q > 0) {
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>NPM dan Email sudah Terdaftar</div>");
				header('location:'.base_url().'./');
			}else if ($qa > 0) {
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>NPM sudah Terdaftar</div>");
				header('location:'.base_url().'./');
			}else if ($qe >0 ) {
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Email sudah Terdaftar</div>");
				header('location:'.base_url().'./');
			}else{
				$this->RsModel->TambahData("tbl_peserta",$data);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Anda Berhasil Register, Silahkan Login Menggunakan Username dan Password Anda.</div>");
			header('location:'.base_url().'LoginPeserta');
			}
			
	}

	public function verif_p(){
		$id=$this->uri->segment(3);
		$where=array('id_register'=>$id);
		$data['status_peserta']='1';
		// $this->RsModel->HapusData('tbl_peserta',$where);
		$this->RsModel->EditData("tbl_peserta",$data,$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diverifikasi</div>");
		header('location:'.base_url().'KelolaPeserta');
	}
}

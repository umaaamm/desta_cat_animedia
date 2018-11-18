<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLoginP extends CI_Controller {

	public function index()
	{
	//	$databeranda['content']='admin/v-beranda';
		$this->load->view('v_login_peserta');
	}
		//login
	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//print_r($npm);
		//$cek = $this->RsModel->cek_login("tbl_admin",$where)->num_rows();
		$cek = $this->db->query("SELECT * FROM tbl_peserta WHERE username='$username' && password='$password' && status_peserta='1' ");
		//print_r($cek);die;
		//$cek1 = $this->db->query("SELECT * FROM tbl_bagian WHERE username='$username' AND password='$password' ");
		if($cek->num_rows() > 0){
				foreach($cek->result() as $key){
				$lvl = $key->level;
				$nama = $key->nama;
				$id_register=$key->id_register;
			}
			if($lvl=='mahasiswa'){
				$data_session = array(
				'nama' => $nama,
				'level'=> $lvl,
				'id_register'=>$id_register,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerPengerjaan/Peserta');
			}else{
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Username dan Password anda Salah</div>");
				// echo "wkowkowkow";

				die;
				redirect('LoginPeserta');
			}

		}else{
			$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Akun Anda Belum diverifikasi oleh Admin.</div>");
				// echo "wkowkowkow";
			header('location:'.base_url().'LoginPeserta');
				// die;
			// redirect('LoginPeserta');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'./');
	
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerUtama extends CI_Controller {

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


	function __construct(){
	parent::__construct();
	
			if($this->session->userdata('status') != "login"){
			redirect(base_url('Admin'));
		}
	}

	public function index()
	{
		$databeranda['jumlah_soal']=$this->db->query("select count(*) as total_soal from tbl_soal")->result_array();
		$databeranda['jumlah_pendaftar']=$this->db->query("select count(*) as total_pendaftar from tbl_peserta")->result_array();
		$databeranda['total_soal_umum']=$this->db->query("select count(*) as total_soal_umum_k from tbl_soal where id_bidang='1' ")->result_array();
		$databeranda['total_soal_animasi']=$this->db->query("select count(*) as total_soal_animasi_k from tbl_soal where id_bidang='2' ")->result_array();
		$databeranda['total_soal_photo']=$this->db->query("select count(*) as total_soal_photo_k from tbl_soal where id_bidang='3' ")->result_array();
		$databeranda['total_soal_dg']=$this->db->query("select count(*) as total_soal_dg_k from tbl_soal where id_bidang='4' ")->result_array();
		// $databeranda['jumlah_sum_masuk']=$this->db->query("select sum(stok_t) as total_sum_m from tbl_barang_masuk");
		// $databeranda['jumlah_sum_tersedia']=$this->db->query("select sum(stok_b) as total_sum_t from tbl_persedian");
		$databeranda['content']='admin/v_beranda';
		$this->load->view('admin/home',$databeranda);
	}
}

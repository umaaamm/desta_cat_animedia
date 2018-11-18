<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPengerjaan extends CI_Controller {

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
			redirect(base_url('./'));
		}
	
}
	public function index()
	{
		
		
		
		 $cek_id_r= $this->db->query("select * from tbl_tes_peserta where id_register='".$_SESSION['id_register']."' and status_test = '0' ")->result_array();
		 $databeranda['tampil_id']=$this->db->query("select tbl_bidang.nama_bidang from tbl_bidang LEFT JOIN tbl_tes_peserta on tbl_bidang.id_bidang = tbl_tes_peserta.id_bidang where tbl_bidang.id_bidang ='".$cek_id_r['0']['id_bidang']."' ")->result_array();
		 $databeranda['tampil_id_b'] = $cek_id_r['0']['id_bidang'];
		  $databeranda['jumlahSoal'] = $this->soalModel->getJumlahSoal($databeranda['tampil_id_b']);
			$databeranda['waktuPengerjaan'] = '60';
		 // print_r($databeranda['tampil_id_b']);die;
		// print_r($cek_id_r);die;
        // $data['waktuPengerjaan'] = $this->soalModel->getWaktuPengerjaan($kodePeserta, $this->kodeSesi)->durasi;
		// $this->soalModel->generateSoal($_SESSION['id_register'],$cek_id_r['0']['id_bidang']);
		$databeranda['content']='front/soal';
		$this->load->view('admin/home',$databeranda);

	}	
	public function Peserta(){
		$databeranda['jumlah_soal']=$this->db->query("select count(*) as total_soal from tbl_soal")->result_array();
		$databeranda['jumlah_pendaftar']=$this->db->query("select count(*) as total_pendaftar from tbl_peserta")->result_array();
		$databeranda['total_soal_umum']=$this->db->query("select count(*) as total_soal_umum_k from tbl_soal where id_bidang='1' ")->result_array();
		$databeranda['total_soal_animasi']=$this->db->query("select count(*) as total_soal_animasi_k from tbl_soal where id_bidang='2' ")->result_array();
		$databeranda['total_soal_photo']=$this->db->query("select count(*) as total_soal_photo_k from tbl_soal where id_bidang='3' ")->result_array();
		$databeranda['total_soal_dg']=$this->db->query("select count(*) as total_soal_dg_k from tbl_soal where id_bidang='4' ")->result_array();
		$databeranda['content']='peserta/v_beranda_mahasiswa';
		$this->load->view('admin/home',$databeranda);
	}

}

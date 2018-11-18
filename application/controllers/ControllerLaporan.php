<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLaporan extends CI_Controller {

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
		$databeranda['tampil']=$this->db->query("SELECT tbl_peserta.id_register,tbl_peserta.nama,tbl_bidang.nama_bidang,tbl_test.id_bidang, SUM(tbl_test.status)/10*100 AS nilai FROM tbl_test LEFT JOIN tbl_bidang on tbl_test.id_bidang = tbl_bidang.id_bidang LEFT JOIN tbl_peserta on tbl_test.id_register = tbl_peserta.id_register GROUP BY tbl_test.id_register, tbl_test.id_bidang");
		// $databeranda['tampil']=$this->db->query("SELECT tbl_peserta.id_register,tbl_peserta.nama,tbl_bidang.nama_bidang,tbl_test.id_bidang, SUM(tbl_test.status) AS nilai FROM tbl_test LEFT JOIN tbl_bidang on tbl_test.id_bidang = tbl_bidang.id_bidang LEFT JOIN tbl_peserta on tbl_test.id_register = tbl_peserta.id_register GROUP BY tbl_test.id_register, tbl_test.id_bidang");
		$databeranda['content']='laporan/v_laporan';
		$this->load->view('admin/home',$databeranda);
	}


}

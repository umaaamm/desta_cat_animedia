<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerTestPeserta extends CI_Controller {

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
		
		$databeranda['tampil_cek']=$this->db->query("select * from tbl_tes_peserta where id_register='".$_SESSION['id_register']."'");
		$databeranda['tampil_cek_num']=$this->db->query("select * from tbl_tes_peserta where id_register='".$_SESSION['id_register']."'")->num_rows();
			$a=$this->db->query("select * from tbl_bidang")->result_array();
			$num=$this->db->query("select * from tbl_bidang")->num_rows();
			$data=array();
				for ($i=1; $i < $num ; $i++) { 
					// echo $a[$i]['nama_bidang'];
					array_push($data, array('id_bidang' => $a[$i]['id_bidang'],'nama_bidang' => $a[$i]['nama_bidang']));
				}

		 $array_c = array_chunk($a, 1);
			//  print_r($array_c[0]);
			// die;

// $hitung = count($data);
// for($x = 1; $x < $hitung; $x++) {
//     echo $x.'. '.$data[$x];
//     echo "<br>";
// }
// die;
				$databeranda['bidang_chunk']=$array_c[0];
				$databeranda['bidang_cut']=$data;
		$databeranda['tampil_bidangs']=$this->db->query("select * from tbl_bidang")->result_array();
		$databeranda['content']='peserta/v_test_peserta';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$data['id_register']=$this->input->post("id_register");
			$data['id_bidang']=$this->input->post("id_bidang");
			$data['status_test']='0';
			// print_r($data['id_bidang']);die;
			$q=$this->db->query("select * from tbl_tes_peserta where id_register='".$data['id_register']."' and id_bidang='".$data['id_bidang']."'")->num_rows();
			if ($q <= 0) {
				$this->soalModel->generateSoal($_SESSION['id_register'],$data['id_bidang']);
				$this->RsModel->TambahData("tbl_tes_peserta",$data);
				$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
				// header('location:'.base_url().'TestPeserta');
			// header('location:'.base_url().'ControllerPengerjaan','refresh');
				redirect('ControllerPengerjaan');
			}else{
				$this->session->set_flashdata("notif","<div class='alert alert-success'>Anda Sudah Melakukan Test di bidang ini Silahkan Pilih bidang lain.</div>");
				header('location:'.base_url().'TestPeserta','refresh');
			}
			//print_r($data);die;
			// $this->soalModel->generateSoal($_SESSION['id_register'],$cek_id_r['0']['id_bidang']);
			
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_admin'=>$id);
		$this->RsModel->HapusData('tbl_admin',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaAdmin');
	}

	public function edit(){
			$where['id_admin']=$this->input->post('id');
			$data['nama_admin']=$this->input->post("nama_admin");
			$data['username']=$this->input->post("user");
			$data['password']=$this->input->post("pass");

			//print_r($where);die;
			$this->RsModel->EditData("tbl_admin",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaAdmin');

	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller
{

    private $kodePeserta = "";
    private $kodeSesi = "";

    public function __construct()
    {
        parent::__construct();

         $this->load->model('soalModel');

        // $this->load->model('M_auth_peserta');

        // if (!$this->M_auth_peserta->updateLogAkses()){
        //     redirect('/block');
        // }

        // load Session Library
        // $this->load->library('session');
        // $this->load->library('encrypt');
        //$_SESSION['waktu'] = null;

        // $peserta = $this->db->query("select * from tbl_peserta where id_register = '".$_SESSION['id_register']."'")->first_row();
        // $peserta_bidang = $this->db->query("select * from tbl_tes_peserta where id_register = '".$_SESSION['id_register']."'")->first_row();
        // $this->id_register = $peserta->id_register;

        // $this->kodeSesi = @$_GET['sesi'];
    }

    // public function profil()
    // {
    //     $this->template->views('profil/profil');
    // }

    public function index()
    {
//  $kodesesi=$this->uri->segment(3);
        //$data['kodePeserta'] = '4023';
        //$kode_peserta= $this->session->userdata('C_kode_peserta');
        // $data['kodePeserta'] = $this->kodePeserta;
        // $statusPeserta = $this->db->query("select * from tbl_peserta_sesi join tbl_sesi_tes on tbl_sesi_tes.kode_sesi = tbl_peserta_sesi.kode_sesi where kode_peserta = '" . $data['kodePeserta'] . "' and tbl_sesi_tes.kode_sesi = '" . $this->kodeSesi . "' and status = 2")->first_row();
        // if (!empty($statusPeserta)) {
        //     if ($statusPeserta->status_peserta == 1) {
        //         // redirect(base_url('/front/soal'), 'location');
        //         redirect(base_url('/front/soal/nilaiakhir'), 'location');
        //     }
        // } else {
        //     redirect(base_url('/front/utama'), 'location');
        // }

        // $data['page'] = "Home";
        // $data['judul'] = "Data CAT";
        // $data['deskripsi'] = "Home";

        // $kodePeserta = $this->kodePeserta;
        // $this->soalModel->generateSoal($this->kodePeserta, $this->kodeSesi);
        // $data['peserta'] = $this->soalModel->select_peserta($this->kodePeserta);
        // $data['jumlahSoal'] = $this->soalModel->getJumlahSoal($this->kodeSesi);

        // $data['waktuPengerjaan'] = $this->soalModel->getWaktuPengerjaan($kodePeserta, $this->kodeSesi)->durasi;

        // $data['kodeSesi'] = $this->kodeSesi;
        // $this->template->views('front/soal', $data);
    }

    // public function awalpeserta()
    // {
    //     $data['page'] = "Home Peserta CAT";
    //     $data['judul'] = "Home CAT";
    //     $data['deskripsi'] = "Home Peserta CAT";
    //     $data['tampilsesi'] = $this->soalModel->tampilsesi();
    //     $this->template->views('front/awal_v', $data);

    // }

    // public function tampilaw()
    // {
    //     $data['pesertasoal'] = $this->soalModel->pesertaawal();
    //     $data['kodeSesi'] = $this->kodeSesi;
    //     $this->load->view('front/list_peserta_soal', $data);
    // }

    public function nilaiakhir()
    {
       

        // unset($_SESSION['waktu']);

        $id_register = $_GET['id_register'];
        $id_bidang=$_GET['id_bidang'];
        // $this->db->query("update tbl_peserta_sesi set status_peserta = 1 where kode_peserta = '" . $kodePeserta . "' and kode_sesi = '" . $this->kodeSesi . "'");

        $sqlHasil = 'SELECT tbl_bidang.nama_bidang,tbl_test.id_bidang, SUM(tbl_test.status)/10*100 AS nilai FROM tbl_test LEFT JOIN tbl_bidang on tbl_test.id_bidang = tbl_bidang.id_bidang
        WHERE tbl_test.id_register = "' . $id_register . '" and tbl_test.id_bidang = "' . $id_bidang . '"
        GROUP BY tbl_test.id_register, tbl_test.id_bidang';

        $hasilTes = $this->db->query($sqlHasil)->result();
        // print_r($hasilTes);die;

        $update = $this->db->query("update tbl_tes_peserta set status_test ='1' where id_register='".$id_register."' and id_bidang='".$id_bidang."'");
        $data['hasil'] = $hasilTes;
        $data['content'] = 'front/nilai';
        $this->load->view('admin/home',$data);
        // $this->load->view('admin/home',$databeranda);
         // $this->template->views('/front/nilai', $data);
    }

    public function nilaiAll(){
        $sql="SELECT tbl_bidang.nama_bidang,tbl_test.id_bidang, SUM(tbl_test.status)/10*100 AS nilai FROM tbl_test LEFT JOIN tbl_bidang on tbl_test.id_bidang = tbl_bidang.id_bidang where tbl_test.id_register='".$_SESSION['id_register']."' GROUP BY tbl_test.id_register, tbl_test.id_bidang";
        $hasilTesAll = $this->db->query($sql)->result();
        $data['hasil'] = $hasilTesAll;
        $data['content'] = 'front/nilaiall';
        $this->load->view('admin/home',$data);
    }


    // public function tampilhasil($kodePeserta)
    // {
    //     $data['page'] = "Hasil Ujian";
    //     $data['judul'] = "Hasil CAT";
    //     $data['deskripsi'] = "Hasil CAT";
    //     $data['hasil'] = $this->soalModel->select_hasil($kodePeserta);
    //     $this->template->views('front/hasil', $data);

    // }

    public function getSoal()
    {
        $nomor = $_GET['no'];
        $id_bidang = $_GET['id_bidang'];
        $id_register = $_GET['id_register'];
        $soal = $this->soalModel->getSoal($nomor,$id_register,$id_bidang);
        echo json_encode($soal, JSON_PRETTY_PRINT);
    }

    public function simpanJawaban()
    {
        $data = $_GET;
        // print_r($data);die;
        // $data['id_register'] = '7';
        $data['waktu_submit'] = date('Y-m-d H:m:s');

        $this->soalModel->simpanJawaban($data, $this->kodeSesi);
        echo json_encode(['status' => 'success'], JSON_PRETTY_PRINT);
    }

    public function getJawaban()
    {
        $data = $_GET;
        $data['id_register'] = $_GET['id_register'];
        $data['id_bidang'] = $_GET['id_bidang'];
        // print_r($data['id_bidang']);die;
        $data = $this->soalModel->getJawaban($data,$data['id_bidang']);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAllJawaban()
    {
       $data['id_register'] = $_GET['id_register'];
        $data['id_bidang'] = $_GET['id_bidang'];

        $data = $this->soalModel->getAllJawaban($data,$data['id_bidang']);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function setCountdown()
    {
        // // $_SESSION['waktu'] = $_GET['waktu'];
        // echo json_encode(['waktu' => 60]);
         $_SESSION['waktu'] = $_GET['waktu'];
        echo json_encode(['waktu' => $_SESSION['waktu']]);
    }
}

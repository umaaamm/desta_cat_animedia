<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class soalModel extends CI_Model
{
    public function generateSoal($id_register, $id_bidang)
    {
        //$_SESSION['waktu'] = null;
        $sqlTmpSoal = "select * from temp_random_soal where id_register='" . $id_register . "' and id_bidang='".$id_bidang."' ";
        $dataTmpSoal = $this->db->query($sqlTmpSoal)->result();
        // print_r(count($dataTmpSoal));die;

        //$pesertaSesi = "select * from tbl_peserta_sesi where kode_peserta = '" . $kode_peserta . "'";
        //$dataPesertaSesi = $this->db->query($pesertaSesi)->first_row();

        if (count($dataTmpSoal) <= 0) {
            /*
            $dataUjian = $this->db->query("SELECT * 
FROM tbl_sesi_tes
JOIN tbl_matauji ON tbl_matauji.`kode_matauji` = tbl_sesi_tes.`kode_matauji`
WHERE kode_sesi = '" . $kode_sesi . "'")->first_row();
            */

//             $sql = "SELECT tbl_banksoal.*
// FROM tbl_banksoal
// JOIN tbl_soal_ujian on tbl_banksoal.kode_soal = tbl_soal_ujian.kode_soal
// JOIN tbl_kategori_soal on tbl_kategori_soal.kode_kategori_soal = tbl_banksoal.kode_kategori_soal
// JOIN tbl_matauji on tbl_matauji.kode_matauji = tbl_kategori_soal.kode_matauji
// join tbl_sesi_tes on tbl_sesi_tes.kode_matauji = tbl_matauji.kode_matauji
// where tbl_sesi_tes.kode_sesi = '" . $kode_sesi . "'
// ORDER BY RAND()";

            $sql = "SELECT tbl_soal.* FROM tbl_soal where id_bidang='".$id_bidang."' ORDER BY RAND()";

            $data = $this->db->query($sql)->result();


            foreach ($data as $row) {
                $sqlSimpan = 'insert into temp_random_soal(id_soal, id_register, id_bidang) values("' . $row->id_soal . '", "' . $id_register . '", "' . $id_bidang . '")';
                $this->db->query($sqlSimpan);
            }
        }
    }

//     public function getWaktuPengerjaan($kode_peserta, $kode_sesi)
//     {
//         $sql = "SELECT tbl_sesi_tes.*
// FROM tbl_sesi_tes where `kode_sesi`='" . $kode_sesi . "'";

//         $data = $this->db->query($sql)->first_row();
//         return $data;

//     }

//     public function tampilsesi()
//     {
//         $sql = "SELECT * FROM
// tbl_sesi_tes JOIN tbl_matauji ON tbl_matauji.kode_matauji = tbl_sesi_tes.kode_matauji
// WHERE tbl_sesi_tes.status = '2' ";
//         $data = $this->db->query($sql);
//         return $data->result();
//     }

//     public function pesertaawal()
//     {
//         $sql = "SELECT * FROM
// tbl_sesi_tes JOIN tbl_matauji ON tbl_matauji.`kode_matauji` = tbl_sesi_tes.`kode_matauji`
// WHERE tbl_sesi_tes.`status` = '2'";
//         $data = $this->db->query($sql);
//         return $data->result();
//     }

    public function select_peserta($kode_peserta)
    {
        $sql = "select * from tbl_tes WHERE kode_peserta='" . $kode_peserta . "' ";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function select_hasil($kode_peserta)
    {
        $sql = "SELECT COUNT(CASE STATUS WHEN '1' THEN 1 ELSE NULL END) AS jumlah
FROM tbl_tes WHERE kode_peserta='" . $kode_peserta . "' ";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getJumlahSoal($id_bidang)
    {
//         $sql = "SELECT tbl_banksoal.*
// FROM tbl_banksoal
// JOIN tbl_soal_ujian on tbl_banksoal.kode_soal = tbl_soal_ujian.kode_soal
// JOIN tbl_kategori_soal on tbl_kategori_soal.kode_kategori_soal = tbl_banksoal.kode_kategori_soal
// JOIN tbl_matauji on tbl_matauji.kode_matauji = tbl_kategori_soal.kode_matauji
// join tbl_sesi_tes on tbl_sesi_tes.kode_matauji = tbl_matauji.kode_matauji
// where tbl_sesi_tes.kode_sesi = '" . $kode_sesi . "'
// ORDER BY RAND()";
        $sql="SELECT tbl_soal.* FROM tbl_soal where id_bidang='".$id_bidang."' ORDER BY RAND()  ";

        $data = $this->db->query($sql)->result();
        return count($data);
    }


    public function getSoal($nomor, $id_register, $id_bidang)
    {

        error_reporting(0);
        // $sql = 'SELECT tbl_banksoal.*, tbl_kategori_soal.*, tbl_matauji.*
        //     FROM tbl_banksoal 
        //     JOIN tmp_soal_random ON tbl_banksoal.`kode_soal` = tmp_soal_random.`kode_soal`
        //     JOIN tbl_kategori_soal on tbl_banksoal.kode_kategori_soal = tbl_kategori_soal.kode_kategori_soal
        //     JOIN tbl_matauji on tbl_matauji.kode_matauji = tbl_kategori_soal.kode_matauji
        //     WHERE tmp_soal_random.`kode_peserta`="' . $kodePeserta . '" limit ' . ($nomor - 1) . ',1';
        
        $sql="SELECT tbl_soal.* from tbl_soal INNER JOIN temp_random_soal on tbl_soal.id_soal = temp_random_soal.id_soal where temp_random_soal.id_register ='".$id_register."' and temp_random_soal.id_bidang='".$id_bidang."' limit ".($nomor-1).",1";
        $data = $this->db->query($sql)->first_row();

        

        $sqlData = 'select * from tbl_test where id_soal = "' . $data->id_soal . '" and id_register = "' . $id_register . '" and no_soal = "' . $nomor . '"';
        $dataTes = $this->db->query($sqlData)->first_row();

        //$sqlSimpan = 'update tbl_tes set jawaban ="' . $data['jawaban'] . '", waktu_submit = "' . $data['waktu_submit'] . '"  where kode_soal = "' . $data['kodeSoal'] . '" and kode_peserta = "' . $data['kode_peserta'] . '" and nomor_soal = "' . $data['nomor'] . '"';

        if (count($dataTes) <= 0) {
            $sqlSimpan = 'insert into tbl_test(id_soal, id_register, no_soal, id_bidang) values ("' . $data->id_soal . '", "' . $id_register . '", "' . $nomor . '", "' . $id_bidang . '")';
            $this->db->query($sqlSimpan);
        }


        return $data;
    }

    public function simpanJawaban($data, $id_bidang)
    {
        $sqlSoal = 'select * from tbl_soal where id_soal="' . $data['id_soal'] . '"';
        $dataSoal = $this->db->query($sqlSoal)->first_row();
        $jawaban = $data['jawaban'];
        if (strtolower($dataSoal->kunci_jawaban) == strtolower($jawaban)) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }


        $sqlData = 'select * from tbl_test where id_soal = "' . $data['id_soal'] . '" and id_register = "' . $data['id_register'] . '" and no_soal = "' . $data['nomor'] . '"';
        //echo $sqlData;
        $dataTes = $this->db->query($sqlData)->first_row();

        $sqlSimpan = 'update tbl_test set jawaban ="' . $data['jawaban'] . '", waktu_submit = "' . $data['waktu_submit'] . '", status="' . $data['status'] . '"  where id_soal = "' . $data['id_soal'] . '" and id_register = "' . $data['id_register'] . '" and no_soal = "' . $data['nomor'] . '"';

        if (count($dataTes) <= 0) {
            $sqlSimpan = 'insert into tbl_test(id_soal, id_register, jawaban, waktu_submit, status,no_soal,id_bidang) values ("' . $data['id_soal'] . '", "' . $data['id_register'] . '", "' . $data['jawaban'] . '", "' . $data['waktu_submit'] . '", "' . $data['status'] . '", "' . $data['nomor'] . '","' . $id_bidang . '")';
        }


        return $this->db->query($sqlSimpan);
    }

    public function getJawaban($data, $id_bidang)
    {
        $sql = "select * from tbl_test where id_register='" . $data['id_register'] . "' and id_soal = '" . $data['id_soal'] . "' and no_soal = '" . $data['nomor'] . "' and id_bidang = '" . $id_bidang . "'";
        return $this->db->query($sql)->first_row();
    }

    public function getAllJawaban($data, $id_bidang)
    {
        $sql = "select * from tbl_test where id_register='" . $data['id_register'] . "' and id_bidang = '" . $id_bidang . "'";
        return $this->db->query($sql)->result();
    }

}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */

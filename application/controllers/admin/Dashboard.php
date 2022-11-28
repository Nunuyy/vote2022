<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent:: __construct();
        // $this->load->model('siswa/Siswa_model','siswaM');
        // $this->load->model('guru/Guru_model','guruM');
        // $this->load->model('tendik/Tendik_model','tendikM');
        // $this->load->model('kandidat/Kandidat_model','kandidatM');

        //print_r($_SESSION);
        if ($_SESSION['id']) {
            //echo "Sudah Login";
        }else{
            //echo "Belum Login";
            redirect('admin/Login');   
        }
    }

    public function index()
    {
        $this->load->model('siswa/Siswa_model','siswaM');
        $siswa = $this->siswaM->mydb->get();
        $data['siswa'] = $siswa;

        $this->helpM->atas_lte();
        $this->load->view('admin/blank',$data);
        $this->helpM->bawah_lte();
    }

    public function dashboard()
    {


        $this->load->model('OtherModel');
        $data['dpt_s'] = $this->OtherModel->get_pemilih_tetap_s();
        $data['dpt_g'] = $this->OtherModel->get_pemilih_tetap_g();
        $data['dpt_t'] = $this->OtherModel->get_pemilih_tetap_t();


        $this->load->model('OtherModel');
        $data['mpk_s'] = $this->OtherModel->get_suara_mpk_s();
        $data['osis_s'] = $this->OtherModel->get_suara_osis_s();
        $data['mpk_g'] = $this->OtherModel->get_suara_mpk_g();
        $data['osis_g'] = $this->OtherModel->get_suara_osis_g();
        $data['mpk_t'] = $this->OtherModel->get_suara_mpk_t();
        $data['osis_t'] = $this->OtherModel->get_suara_osis_t();

        $this->helpM->atas_lte();
        $this->load->view('admin/dashboard',$data);
        $this->helpM->bawah_lte();
    }

    public function statistik()
    {


        $this->load->model('OtherModel');
        $data['dpt_s'] = $this->OtherModel->get_pemilih_tetap_s();
        $data['dpt_g'] = $this->OtherModel->get_pemilih_tetap_g();
        $data['dpt_t'] = $this->OtherModel->get_pemilih_tetap_t();

        
        $this->load->model('OtherModel');
        $data['mpk_s'] = $this->OtherModel->get_suara_mpk_s();
        $data['osis_s'] = $this->OtherModel->get_suara_osis_s();
        $data['mpk_g'] = $this->OtherModel->get_suara_mpk_g();
        $data['osis_g'] = $this->OtherModel->get_suara_osis_g();
        $data['mpk_t'] = $this->OtherModel->get_suara_mpk_t();
        $data['osis_t'] = $this->OtherModel->get_suara_osis_t();

        $this->helpM->atas_lte();
        $this->load->view('admin/statistik',$data);
        $this->helpM->bawah_lte();
    }

    public function perolehan()
    {
        
        $this->load->model('kandidat/Kandidat_model','kandidatM');
        $kandidat = $this->kandidatM->mydb->get();
        $data['kandidat'] = $kandidat;


       /* $this->load->model('OtherModel','otM');
        $data['mpk'] = $this->otM->mydb->get_suara_mpk();
        $data['osis'] = $this->otM->mydb->get_suara_osis();*/

        $this->load->model('OtherModel');
        $data['mpk_s'] = $this->OtherModel->get_suara_mpk_s();
        $data['osis_s'] = $this->OtherModel->get_suara_osis_s();
        $data['mpk_g'] = $this->OtherModel->get_suara_mpk_g();
        $data['osis_g'] = $this->OtherModel->get_suara_osis_g();
        $data['mpk_t'] = $this->OtherModel->get_suara_mpk_t();
        $data['osis_t'] = $this->OtherModel->get_suara_osis_t();

        $this->helpM->atas_lte();
        $this->load->view('admin/perolehan',$data);
        $this->helpM->bawah_lte();
    }

    public function test()
    {
        $this->load->view('admin/test_dtbls');
    }

    public function master_siswa()
    {
        $this->load->model('siswa/Siswa_model','siswaM');
        $siswa = $this->siswaM->mydb->get();
        $data['siswa'] = $siswa;

        $this->helpM->atas_lte();
        $this->load->view('admin/v_master_siswa',$data);
        $this->helpM->bawah_lte();
    }

    public function master_guru()
    {
        $this->load->model('guru/Guru_model','guruM');
        $guru = $this->guruM->mydb->get();
        $data['guru'] = $guru;

        $this->helpM->atas_lte();
        $this->load->view('admin/v_master_guru',$data);
        $this->helpM->bawah_lte();
    }

    public function master_tendik()
    {
        $this->load->model('tendik/Tendik_model','tendikM');
        $tendik = $this->tendikM->mydb->get();
        $data['tendik'] = $tendik;

        $this->helpM->atas_lte();
        $this->load->view('admin/v_master_tendik',$data);
        $this->helpM->bawah_lte();
    }

    /*
    public function randomPassword()
    {
        //$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function generate_pass_siswa()
    {
        $this->load->model('siswa/Siswa_model','siswaM');
        $siswa = $this->siswaM->mydb->get();
        $data['siswa'] = $siswa;

        //$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $passwordnya = implode($pass); //turn the array into a string

        foreach ($siswa as $row) {
            $kasipass= $this->randomPassword();
            echo $row['id']." - ".$row['nama']." - ".$kasipass." - ";
            //update/simpan passwor ke table siswa
            $data_update = array('password' => $kasipass);
            $res = $this->siswaM->mydb->edit($data_update,$row['id']);
            if ($res) {
                echo "Tersimpan";
            }else{
                echo "XXXXX";
            }
            echo "<br>";
        }

        $this->helpM->atas_lte();
        $this->load->view('admin/blank',$data);
        $this->helpM->bawah_lte();
    }

    public function generate_pass_guru()
    {
        $this->load->model('guru/Guru_model','guruM');
        $guru = $this->guruM->mydb->get();
        $data['guru'] = $guru;

        //$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $passwordnya = implode($pass); //turn the array into a string

        foreach ($guru as $row) {
            $kasipass= $this->randomPassword();
            echo $row['id']." - ".$row['nama']." - ".$kasipass." - ";
            //update/simpan passwor ke table guru
            $data_update = array('password' => $kasipass);
            $res = $this->guruM->mydb->edit($data_update,$row['id']);
            if ($res) {
                echo "Tersimpan";
            }else{
                echo "XXXXX";
            }
            echo "<br>";
        }

        $this->helpM->atas_lte();
        $this->load->view('admin/blank',$data);
        $this->helpM->bawah_lte();
    }

    public function generate_pass_tendik()
    {
        $this->load->model('tendik/Tendik_model','tendikM');
        $tendik = $this->tendikM->mydb->get();
        $data['tendik'] = $tendik;

        //$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $passwordnya = implode($pass); //turn the array into a string

        foreach ($tendik as $row) {
            $kasipass= $this->randomPassword();
            echo $row['id']." - ".$row['nama']." - ".$kasipass." - ";
            //update/simpan passwor ke table tendik
            $data_update = array('password' => $kasipass);
            $res = $this->tendikM->mydb->edit($data_update,$row['id']);
            if ($res) {
                echo "Tersimpan";
            }else{
                echo "XXXXX";
            }
            echo "<br>";
        }

        $this->helpM->atas_lte();
        $this->load->view('admin/blank',$data);
        $this->helpM->bawah_lte();
    }*/

}

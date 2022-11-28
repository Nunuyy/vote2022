<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
        $this->load->model('guru/Guru_model','guruM');
        //$this->load->model('siswa/Siswa_model','siswaM');
        $this->load->model('kandidat/Kandidat_model','kandidatM');
        date_default_timezone_set('Asia/Jakarta');
        //setlocale(LC_ALL, 'IND');

        //print_r($_SESSION);
        if ($_SESSION['id']) {
            //echo "Sudah Login";
        }else{
            //echo "Belum Login";
            redirect('Login');   
        }
    }

    public function index()
    {
        $this->helpM->header();

        $guru = $this->guruM->mydb->get();
        $data['guru'] = $guru;

        $this->load->view('guru/guru',$data);

        $this->helpM->footer();
    }

    public function ceklogin()
    {
        $this->helpM->header();

        $id = $this->input->post('id');
        $password = $this->input->post('password');

        if(!$password || !$id){

        $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Data yang Anda Masukan Tidak Lengkap !!!</b></p>
                <p><b>Silahkan ulangi !</b></p>
            </div>');
        redirect('guru/guru');   

        }else{

                $user = $this->guruM->mydb->params = array(
                    'id' => $id,
                    'password' => $password
                );

                $getdata = $this->guruM->mydb->get($user);
                
                if ($getdata) {

                    $this->guruM->mydb->setSession($getdata);
                    redirect("guru/guru/mpk");
                }else{
                    
                    redirect('guru/guru');
                } 
        }
    }

    public function osis()
    {
        $this->helpM->header();
        $this->helpM->atas();

        $this->kandidatM->mydb->params = array(
            'org' => 'osis'
        );

        $kandidat = $this->kandidatM->mydb->get();
        $data['kandidat'] = $kandidat;

        $this->load->view('osis',$data);

        $this->helpM->footer();
    }

    public function mpk()
    {
        $this->helpM->header();
        $this->helpM->atas();

        $this->kandidatM->mydb->params = array(
            'org' => 'mpk'
        );

        $kandidat = $this->kandidatM->mydb->get();
        $data['kandidat'] = $kandidat;

        $this->load->view('mpk',$data);

        $this->helpM->footer();
    }

     public function voting_mpk()
    {
        $kandidat = $this->input->post('kandidat_mpk');
        $data_update = array('status_vote_mpk' => 1,'vote_mpk' => $kandidat );

        $id_siswa = $_SESSION['id'];
        
        $res = $this->guruM->mydb->edit($data_update,$id_siswa);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('guru/guru/osis');
        }else{
            echo "<h1>Update Data Gagal</h1>";
        }
    }

    public function voting_osis()
    {
        $kandidat = $this->input->post('kandidat_osis');
        $data_update = array('status_vote_osis' => 1,'vote_osis' => $kandidat );

        $id_siswa = $_SESSION['id'];
        
        $res = $this->guruM->mydb->edit($data_update,$id_siswa);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('guru/guru/jadi');
        }else{
            echo "<h1>Update Data Gagal</h1>";
        }
    }

    public function jadi()
    {
        $this->helpM->header();

        $this->load->view('logout');

        $this->helpM->footer();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tendik extends CI_Controller {

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
        $this->load->model('tendik/Tendik_model','tendikM');
        $this->load->model('kandidat/Kandidat_model','kandidatM');
    }

    public function index()
    {
        $this->helpM->header();

        $siswa = $this->tendikM->mydb->get();
        $data['tendik'] = $siswa;

        $this->load->view('tendik/tendik',$data);

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
        redirect('Welcome');   

        }else{

                $user = $this->tendikM->mydb->params = array(
                    'id' => $id,
                    'password' => $password
                );

                $getdata = $this->tendikM->mydb->get($user);
                
                if ($getdata) {

                    $this->tendikM->mydb->setSession($getdata);
                    redirect("tendik/Tendik/mpk");
                }else{
                    
                    redirect('tendik/Tendik');
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
        
        $res = $this->tendikM->mydb->edit($data_update,$id_siswa);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('tendik/Tendik/osis');
        }else{
            echo "<h1>Update Data Gagal</h1>";
        }
    }

    public function voting_osis()
    {
        $kandidat = $this->input->post('kandidat_osis');
        $data_update = array('status_vote_osis' => 1,'vote_osis' => $kandidat );

        $id_siswa = $_SESSION['id'];
        
        $res = $this->tendikM->mydb->edit($data_update,$id_siswa);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('tendik/Tendik/jadi');
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

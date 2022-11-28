<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tendik extends CI_Controller {

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

	function __construct()
	{
		parent:: __construct();
        //$this->load->model('siswa/Siswa_model','siswaM');
        $this->load->model('guru/Guru_model','guruM');
		$this->load->model('tendik/Tendik_model','tendikM');
		$this->load->model('kandidat/Kandidat_model','kandidatM');
        date_default_timezone_set('Asia/Jakarta');
        //setlocale(LC_ALL, 'IND');

        //print_r($_SESSION);
        if ($_SESSION['id']) {
            //echo "Sudah Login";
        }else{
            //echo "Belum Login";
            redirect('login/login_tendik');   
        }
	}

	public function index()
	{
        $this->helpM->header();

        $tendik = $this->tendikM->mydb->get();
        $data['tendik'] = $tendik;

        $this->load->view('login_tendik',$data);

        $this->helpM->footer();
	}

    public function osis()
	{
        $user_id = $this->tendikM->mydb->params = array(
            'id' => $_SESSION['id']
        );

        $aku = $this->tendikM->mydb->get($user_id);
        $cek = $aku[0]['status_vote_osis'];

        if ($cek==0) {
            $this->helpM->header();
            $this->helpM->atas();

            $this->kandidatM->mydb->params = array(
                'org' => 'osis'
            );

            $kandidat = $this->kandidatM->mydb->get();
            $data['kandidat'] = $kandidat;

            $this->load->view('osis',$data);

            $this->helpM->footer();
        } else {
            //echo "anda sudah memilih";
            // $this->session->set_flashdata('msg', 
            //     '<div class="alert alert-primary">
            //         <p><b>Anda sudah memilih ketua OSIS</b></p>
            //     </div>');
            redirect('welcome/sudah_osis');  
        }
        
        
	}

    public function mpk()
    {
        //print_r($_SESSION);

        $user_id = $this->tendikM->mydb->params = array(
            'id' => $_SESSION['id']
        );

        $aku = $this->tendikM->mydb->get($user_id);
        $cek = $aku[0]['status_vote_mpk'];

        if ($cek==0) {
            $this->helpM->header();
            $this->helpM->atas();

            $this->kandidatM->mydb->params = array(
                'org' => 'mpk'
            );

            $kandidat = $this->kandidatM->mydb->get();
            $data['kandidat'] = $kandidat;

            $this->load->view('mpk',$data);

            $this->helpM->footer();
        } else {
            //echo "anda sudah memilih";
            // $this->session->set_flashdata('msg', 
            //     '<div class="alert alert-primary">
            //         <p><b>Anda sudah memilih ketua MPK</b></p>
            //         <p><b>Silahkan melanjutkan memilih ketua OSIS</b></p>
            //     </div>');
            redirect('Tendik/sudah_mpk');  
        }
    }   

    public function sudah_mpk()
    {
        //print_r($_SESSION);
        //echo "status_vote_mpk yeuh : ".$_SESSION['status_vote_mpk'];
            $this->helpM->header();
            $this->helpM->atas();

            $kandidat = $this->kandidatM->mydb->get();
            $data['kandidat'] = $kandidat;
            $this->load->view('mpk_sudah_t',$data);

            $this->helpM->footer();
    }

    public function sudah_osis()
    {
        //print_r($_SESSION);
        //echo "status_vote_mpk yeuh : ".$_SESSION['status_vote_mpk'];
            $this->helpM->header();
            $this->helpM->atas();

            $kandidat = $this->kandidatM->mydb->get();
            $data['kandidat'] = $kandidat;
            $this->load->view('osis_sudah_t',$data);

            $this->helpM->footer();
    }

	 public function voting_mpk()
    {
        $kandidat = $this->input->post('kandidat_mpk');
        $data_update = array('status_vote_mpk' => 1,'vote_mpk' => $kandidat,'vote_mpk_time' => date("Y-m-d H:i:s") );

        $id_tendik = $_SESSION['id'];
        
        $res = $this->tendikM->mydb->edit($data_update,$id_tendik);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('Tendik/osis');
        }else{
            echo "<h1>Update Data Gagal</h1>";
        }
    }

    public function voting_osis()
    {
        $kandidat = $this->input->post('kandidat_osis');
        $data_update = array('status_vote_osis' => 1,'vote_osis' => $kandidat,'vote_osis_time' => date("Y-m-d H:i:s") );

        $id_tendik = $_SESSION['id'];
        
        $res = $this->tendikM->mydb->edit($data_update,$id_tendik);

        if ($res >=1) {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Terimakasih telah memilih !!!</b></p>
            </div>');
           redirect('Tendik/selesai');
        }else{
            echo "<h1>Update Data Gagal</h1>";
        }
    }

    public function selesai()
    {
        $this->session->sess_destroy();
        unset($_SESSION);

        $this->helpM->header();

        $this->load->view('logout');

        //$this->helpM->footer();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('siswa/Siswa_model','siswaM');
        $this->load->model('guru/Guru_model','guruM');
		$this->load->model('tendik/Tendik_model','tendikM');
		$this->load->model('kandidat/Kandidat_model','kandidatM');
        $this->load->model('OtherModel');
	}

	public function index()
	{
        $this->helpM->header();

        $siswa = $this->siswaM->mydb->get();
        $data['siswa'] = $siswa;

        $this->load->view('index',$data);

        $this->helpM->footer();
	}

    public function login_guru()
    {
        $this->helpM->header();


        //$guru = $this->guruM->mydb->get();
        //$data['guru'] = $guru;

        $guru = $this->OtherModel->getTableBy("guru","nama","asc"); 
        $data['guru'] = $guru; 

        $this->load->view('login_guru',$data);

        $this->helpM->footer();
    }

    public function login_tendik()
    {
        $this->helpM->header();

        
        $tendik = $this->OtherModel->getTableBy("tendik","nama","asc"); 
        $data['tendik'] = $tendik; 

        //$tendik = $this->tendikM->mydb->get();
        //$data['tendik'] = $tendik;

        $this->load->view('login_tendik',$data);

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
        redirect('Login');   

        }else{

                $user = $this->siswaM->mydb->params = array(
                    'id' => $id,
                    'password' => $password
                );

                $getdata = $this->siswaM->mydb->get($user);
                
                if ($getdata) {

                $data_update = array('login_time' => date("Y-m-d H:i:s") );
                $res = $this->siswaM->mydb->edit($data_update,$id);

                    $this->siswaM->mydb->setSession($getdata);
                    redirect("Welcome/mpk");
                }else{
                    
                    $this->session->set_flashdata('msg', 
                        '<div class="alert alert-primary">
                            <p><b>ID atau Password salah !</b></p>
                            <p><b>Silahkan ulangi !</b></p>
                        </div>');
                    redirect('Login'); 
                } 
        }
    }

	public function ceklogin_guru()
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
        redirect('Login/login_guru');   

        }else{

                $user = $this->guruM->mydb->params = array(
                    'id' => $id,
                    'password' => $password
                );

                $getdata = $this->guruM->mydb->get($user);
                
                if ($getdata) {

                $data_update = array('login_time' => date("Y-m-d H:i:s") );
                $res = $this->guruM->mydb->edit($data_update,$id);

                	$this->guruM->mydb->setSessionGuru($getdata);
                	redirect("Guru/mpk");
                }else{
                    
                    $this->session->set_flashdata('msg', 
                        '<div class="alert alert-primary">
                            <p><b>ID atau Password salah !</b></p>
                            <p><b>Silahkan ulangi !</b></p>
                        </div>');
                    redirect('Login/login_guru'); 
                } 
        }
    }


    public function ceklogin_tendik()
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
        redirect('Login/login_tendik');   

        }else{

                $user = $this->tendikM->mydb->params = array(
                    'id' => $id,
                    'password' => $password
                );

                $getdata = $this->tendikM->mydb->get($user);
                
                if ($getdata) {

                $data_update = array('login_time' => date("Y-m-d H:i:s") );
                $res = $this->tendikM->mydb->edit($data_update,$id);

                    $this->tendikM->mydb->setSessionTendik($getdata);
                    redirect("Tendik/mpk");
                }else{
                    
                    $this->session->set_flashdata('msg', 
                        '<div class="alert alert-primary">
                            <p><b>ID atau Password salah !</b></p>
                            <p><b>Silahkan ulangi !</b></p>
                        </div>');
                    redirect('Login/login_tendik'); 
                    //redirect('Tendik');
                } 
        }
    }
    public function selesai()
    {
    $this->session->sess_destroy();
    unset($_SESSION);

        $this->helpM->header();

        $this->load->view('logout');

        $this->helpM->footer();
    }
}

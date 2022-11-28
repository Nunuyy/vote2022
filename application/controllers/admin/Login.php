<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Admin_model','adminM');
        $this->load->model('siswa/Siswa_model','siswaM');
        $this->load->model('kandidat/Kandidat_model','kandidatM');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function ceklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(!$password || !$username){

        $this->session->set_flashdata('msg', 
            '<div class="alert alert-primary">
                <p><b>Data yang Anda Masukan Tidak Lengkap !!!</b></p>
                <p><b>Silahkan ulangi !</b></p>
            </div>');
        redirect('admin/login');   

        }else{

                $user = $this->adminM->mydb->params = array(
                    'username' => $username,
                    'password' => $password
                );

                $getdata = $this->adminM->mydb->get($user);
                
                if ($getdata) {
                    $this->adminM->mydb->setSessionAdmin($getdata);
                    redirect("admin/dashboard");
                    
                }else{
                    
                    redirect('admin/login');
                } 
        }
    }

    public function logout()
    {
    $this->session->sess_destroy();
    unset($_SESSION);

        $this->helpM->header();

        redirect('admin/login'); 
    }


}

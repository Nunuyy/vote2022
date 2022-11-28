<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kandidat/Kandidat_model', 'kandidatM');
    }

    function irfan(){

        $this->helpM->header();
                
        $this->load->view('kandidat/irfan');
    }

    function dani(){
        
         $this->helpM->header();
        
        $this->load->view('kandidat/dani');
    }

}
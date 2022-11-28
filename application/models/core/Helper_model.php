<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Helper_model
 *
 * @author Sutisna
 */

class Helper_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function header(){
        $this->load->view('core/header');
    }

    function header_surat(){
        $this->load->view('core/header_surat');
    }

    function menu(){
        $this->load->view('core/menu');
    }

    function footer(){
        $this->load->view('core/footer');
    }

    function atas(){
        $this->load->view('core/atas');
    }

    function atas_lte(){
        $this->load->view('core/atas_lte');
    }

    function bawah_lte(){
        $this->load->view('core/bawah_lte');
    }

}
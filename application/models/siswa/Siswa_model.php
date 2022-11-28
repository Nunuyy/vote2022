<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dudi_model
 *
 * @author Sutisna
 */

class Siswa_model extends CI_Model
{
    public $mydb;

    function __construct()
    {
        parent::__construct();

        $this->mydb = new Database_model();
        $this->mydb->tableName = "siswa";
        $this->mydb->primaryKey = "id";
    }

}
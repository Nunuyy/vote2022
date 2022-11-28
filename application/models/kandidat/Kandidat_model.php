<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dudi_model
 *
 * @author Sutisna
 */

class Kandidat_model extends CI_Model
{
    public $mydb;

    function __construct()
    {
        parent::__construct();

        $this->mydb = new Database_model();
        $this->mydb->tableName = "kandidat";
        $this->mydb->primaryKey = "id";
    }

}
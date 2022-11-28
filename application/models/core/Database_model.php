<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Database_model
 *
 */

class Database_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get from DB. This is active record helper
     *
     * @return mixed
     */
    public function get($returnResult="array"){

         /*Defaults parameters example
        $paramsDefault = array(
            'status' => $status
        );
        */

        if(!isset($this->tableName)){
            debug("Tentukan table name sebelum get database");
        }

        $paramsDefault=array();
        if(isset($this->paramsDefault)){
            $paramsDefault = $this->paramsDefault;
        }

        $params=array();
        if(isset($this->params)){
            $params = $this->params;
        }

        //Combine default and assigned params
        $thisParam = $this->defaultParam($paramsDefault,$params);

        //Where or where in filter
        $this->getWhereLike($thisParam);

        //Get the data
        $q=$this->db->get($this->tableName);

        //Return the data
        if($returnResult=="num_rows"){
            $resultDb=$q->num_rows();
        }else{
            $resultDb=$q->result_array();
        }
        return $resultDb;
    }

    public function jumlah(){

        if(!isset($this->tableName)){
            debug("Tentukan table name sebelum get database");
        }

        $paramsDefault=array();
        if(isset($this->paramsDefault)){
            $paramsDefault = $this->paramsDefault;
        }

        $params=array();
        if(isset($this->params)){
            $params = $this->params;
        }

        //Combine default and assigned params
        $thisParam = $this->defaultParam($paramsDefault,$params);

        //Where or where in filter
        $this->getWhereLike($thisParam);

        //Get the data

        $q=$this->db->count_all_results($this->tableName);

        return $q;
    }

    /**
     * Get params and combine with the default param
     *
     * @param $paramsDefault
     * @param $params
     * @return array
     */
    function defaultParam($paramsDefault,$params){

        //Jika $params kosong, maka return semua $paramsDefault
        if(!$params){
            return $paramsDefault;
        }

        //Jika $params ada, maka gabungkan $paramsDefault dengan
        foreach($paramsDefault as $key=>$rowDefault){

            $exist=false;
            if(array_key_exists($key,$params)){
                $exist=true;
            }

            //Kalo belom exist, tambahin ke $params
            if(!$exist){
                $params[$key] = $rowDefault;
            }

        }

        return $params;
    }

    /**
     * Get where like for active record helper
     *
     * @param $thisParam
     */
    public function getWhereLike($thisParam){

        $keyword        = "";
        if(array_key_exists('search_keyword',$thisParam)){
            $keyword = $thisParam['search_keyword'];
        }

        $search_field        = "";
        if(array_key_exists('search_field',$thisParam)){
            $search_field = $thisParam['search_field'];
        }

        $where_or_field        = "";
        if(array_key_exists('where_or_field',$thisParam)){
            $where_or_field = $thisParam['where_or_field'];
        }

        $where_or        = "";
        if(array_key_exists('where_or',$thisParam)){
            $where_or = $thisParam['where_or'];
        }

        $where_start        = "";
        if(array_key_exists('where_start',$thisParam)){
            $where_start = $thisParam['where_start'];
        }

        $where_start_value       = "";
        if(array_key_exists('where_start_value',$thisParam)){
            $where_start_value = $thisParam['where_start_value'];
        }

        $where_end_value        = "";
        if(array_key_exists('where_end_value',$thisParam)){
            $where_end_value = $thisParam['where_end_value'];
        }



        //Jika termasuk keyword tersebut, maka jangan dimasukin ke where or where in
        $notWhere = array('order','order_by','limit','search_keyword','search_field');
        $WhereOrIn = $thisParam;
        foreach($notWhere as $value){
            if(array_key_exists($value,$thisParam)){
                unset($WhereOrIn[$value]);
            }
        }

        //Searching by keyword / like
        if($keyword){
            if(is_array($search_field)){
                foreach($search_field as $rowSearch){
                    $this->db->like($rowSearch,$keyword);
                }
            }else{
                $this->db->like($search_field,$keyword);
            }
        }

        //Where OR
        if($where_or_field && $where_or){
            if(is_array($where_or)){
                $this->db->or_where_in($where_or_field,$where_or);
            }else{
                $this->db->or_where($where_or_field,$where_or);
            }
            unset($WhereOrIn['where_or']);
            unset($WhereOrIn['where_or_field']);
        }

        //Between
        if($where_start && $where_start_value){
            $this->db->where($where_start." BETWEEN '".$where_start_value."' AND '".$where_end_value."'",NULL,FALSE);
            unset($WhereOrIn['where_start']);
            unset($WhereOrIn['where_start_value']);
            unset($WhereOrIn['where_end_value']);
        }

        //Where or Where In
        if($WhereOrIn){
            foreach($WhereOrIn as $key=>$row){
                if(array_key_exists($key,$thisParam)){
                    $this->whereOrIn($key,$row);
                }
            }
        }

        //Ordering
        $orderKey="order";
        $orderByKey="order_by";
        if( array_key_exists($orderKey,$thisParam) && array_key_exists($orderByKey,$thisParam) ){
            $this->db->order_by($thisParam[$orderByKey],$thisParam[$orderKey]);
        }

        //Limit
        if(array_key_exists('limit',$thisParam)){
            $this->db->limit($thisParam['limit']);
        }

    }

    /**
     * Where or where in
     *
     * @param $key
     * @param $value
     */
    function whereOrIn($key,$value){
        if($value!=NULL && $value!=""){
            if(is_array($value)){
                $this->db->where_in($key,$value);
            }else{
                $this->db->where($key,$value);
            }
        }
    }

    /**
     * Add process
     *
     * @param $dataTerms
     * @return mixed
     */
    function add($dataTerms,$batch=false)
    {
        if($dataTerms){
            if($batch){
                $this->db->insert_batch($this->tableName, $dataTerms);
            }else{
                $this->db->insert($this->tableName, $dataTerms);
            }
            return $this->db->insert_id();
        }
    }

    /**
     * Process edit
     *
     * @param $data
     * @param string $idKey
     * @param $idValue
     * @return mixed
     */
    function edit($data,$idValue,$idKey="")
    {
        if($data && $idValue){

            if(!$idKey){
                $idKey = $this->primaryKey;
            }

            $this->db->where($idKey,$idValue);
            $update = $this->db->update($this->tableName, $data);
            return $update;
        }
    }

    /**
     * Delete from table
     *
     * @param $idValue
     * @param string $idKey
     * @return mixed
     */
    function delete($idValue,$idKey=""){
        if($idValue){
            if(!$idKey){
                $idKey = $this->primaryKey;
            }
            if(is_array($idKey)){
                $this->db->where_in($idKey,$idValue);
            }else{
                $this->db->where($idKey,$idValue);
            }
            return $this->db->delete($this->tableName);
        }
    }

    function setSession($getdata){
 
        $userData=$getdata[0];
        $dataSession = array(
            'id'   => $userData['id'],
            'nama'     => $userData['nama'],
            'password'     => $userData['password'],
            'login_time'     => $userData['login_time'],
            'status_vote_mpk'  => $userData['status_vote_mpk'],
            'vote_mpk_time'  => $userData['vote_mpk_time'],
            'vote_mpk'  => $userData['vote_mpk'],
            'status_vote_osis'   => $userData['status_vote_osis'],
            'vote_osis'  => $userData['vote_osis'],
            'vote_osis_time'  => $userData['vote_osis_time'],
        );
        $this->session->set_userdata($dataSession);
 
    }

    function setSessionGuru($getdata){
 
        $userData=$getdata[0];
        $dataSession = array(
            'id'   => $userData['id'],
            'nama'     => $userData['nama'],
            'tgl_lahir'     => $userData['tgl_lahir'],
            'status'     => $userData['status'],
            'password'     => $userData['password'],
            'login_time'     => $userData['login_time'],
            'status_vote_mpk'  => $userData['status_vote_mpk'],
            'vote_mpk'  => $userData['vote_mpk'],
            'vote_mpk_time'  => $userData['vote_mpk_time'],
            'status_vote_osis'   => $userData['status_vote_osis'],
            'vote_osis'  => $userData['vote_osis'],
            'vote_osis_time'  => $userData['vote_osis_time'],
        );
        $this->session->set_userdata($dataSession);
 
    }

    function setSessionTendik($getdata){
 
        $userData=$getdata[0];
        $dataSession = array(
            'id'   => $userData['id'],
            'nama'     => $userData['nama'],
            'tgl_lahir'     => $userData['tgl_lahir'],
            'status'     => $userData['status'],
            'password'     => $userData['password'],
            'login_time'     => $userData['login_time'],
            'status_vote_mpk'  => $userData['status_vote_mpk'],
            'vote_mpk'  => $userData['vote_mpk'],
            'vote_mpk_time'  => $userData['vote_mpk_time'],
            'status_vote_osis'   => $userData['status_vote_osis'],
            'vote_osis'  => $userData['vote_osis'],
            'vote_osis_time'  => $userData['vote_osis_time'],
        );
        $this->session->set_userdata($dataSession);
 
    }

    function setSessionAdmin($getdata){
 
        $userData=$getdata[0];
        //$dataSession= $userData;

        
        $dataSession = array(
            'id'   => $userData['id'],
            'username'     => $userData['username'],
            'password'     => $userData['password'],
            'nama'  => $userData['nama'],
        );
        $this->session->set_userdata($dataSession);
 
    }

}
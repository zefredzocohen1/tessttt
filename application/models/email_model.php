<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends MY_Model
{
    var $table = 'email';
    var $key = 'email_id';

    function getList($input = array()){
        $this->db->join('email_template','email_template.email_template_id=email_type');
        return $this->db->get($this->table);
    }
    function getEmailTemplate(){
        return $this->db->get('email_template');
    }
    function getEmailBook($arrayID = array()){
        foreach ($arrayID as $key => $value){
            $this->db->or_where('email_type',$value);
        }
        return $this->db->get($this->table);
    }
}
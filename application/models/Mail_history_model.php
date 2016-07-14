<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Mail_history_model extends MY_Model
	{
            var $table = 'address';
            var $key   = 'address_id';

            function insertGetId($data = array()){
                if($this->create($data)){
                    $insert_id = $this->db->insert_id();
                    return $insert_id;
                }
            }
            function getAddress($query){
                $this->db->from("address");
                $this->db->or_like('lower(address_street_ascii)', $query); 
                $this->db->or_like('lower(district_ascii)', $query); 
                $this->db->or_like('lower(provincial_ascii)', $query); 
                $this->db->or_like('lower(country_ascii)', $query);
                return $this->db->get()->result_array();
            }
            function search($array=  array()){
                $this->db->from('address');
            }
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class app_config_model extends MY_Model
{
    var $table = 'app_config';
    var $key = 'key';

    function batch_save($data){
        $success = true;
        $this->db->trans_start();
        foreach($data as $key=>$value){
            if(!$this->save($key, $value)){
                $success=false;
                break;
            }
        }

        $this->db->trans_complete();		
        return $success;
		
    }
    function save_data($data){
        foreach ($data as $key => $value){
            $this->save($key, $value);
        }
        return true;
    }
    
    function save($key,$value){
        $config_data=array(
            'key'=>$key,
            'value'=>$value
        );
        return $this->db->replace('app_config', $config_data);
    }
    
    function exists($key){
        $this->db->where($this->key,$key);
        $query = $this->db->get($this->table);
        return($query->num_rows()==1);
    }
    
    function get_all(){
        $this->db->order_by($this->key,'asc');
        return $this->db->get($this->table);
    }
    
    
}
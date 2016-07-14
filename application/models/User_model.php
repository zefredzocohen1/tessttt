<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    var $table = 'user';
    var $key = 'user_id';

    function getList($input = array()){

		$this->db->select($this->table.'.*,role_name');
		$this->get_list_set_input($input);
		$this->db->from($this->table);
		$this->db->join('role',$this->table.'.role_id = role.role_id');
		$query = $this->db->get();
		return $query->result();
    }

    function getInfoLogin($id){
    	if(!$id){
    		return false;
    	}
    	$this->db->select($this->table.'.*,role_name');
    	$this->db->where($this->key,$id);
    	$this->db->from($this->table);
    	$this->db->join('role',$this->table.'.role_id = role.role_id');
    	$query = $this->db->get();
    	if($query->num_rows){
    		return false;
    	}else{
    		return $query->row();
    	}
    }
    
    function exists($where = array()){
        if(count($where)>0){
            $this->db->from($this->table);
            foreach ($where as $key => $value){
                $this->db->where($key,$value);
            }
            return ($this->db->get()->num_rows()>0);
        }
        else  return false;
    }
    
    function get_logged_in_employee_info() {
        if ($this->is_logged_in()) {
            $userLogin = $this->session->userdata('userLogin');
            return $this->get_info_id($userLogin['user_id']);
        }

        return false;
    }
    
    function get_info_id($id){
            $query = $this->db->get_where($this->table, array($this->key => $id), 1);
		if($query->num_rows()==1){
			return $query->row();
		}
		else
		{
			//create object with empty properties.
			$fields = $this->db->list_fields($this->table);
			$person_obj = new stdClass;
			
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			
			return $person_obj;
		}
    }
    
    function is_logged_in() {
        return $this->session->userdata('userLogin') != false;
    }
    
    function has_module_permission($module_id, $user_id) {
        //if no module_id is null, allow access
        if ($module_id == null) {
            return true;
        }

        $query = $this->db->get_where('permissions', array('user_id' => $user_id, 'module_id' => $module_id), 1);
        return $query->num_rows() == 1;
    }

    function has_module_action_permission($module_id, $action_id, $user_id) {
        //if no module_id is null, allow access
        if ($module_id == null) {
            return true;
        }

        $query = $this->db->get_where('permissions_actions', array('user_id' => $user_id, 'module_id' => $module_id, 'action_id' => $action_id), 1);
        return $query->num_rows() == 1;
    }
//    function get_role($user_id){
//        $this->db->from('user');
//        $this->db->join('role','role.id=user.role_id');
//        $this->db->where('user_id',$user_id);
//        return $this->db->get_row();
//    }
    
}
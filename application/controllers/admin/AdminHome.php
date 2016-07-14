<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once 'AdminHome.php';
	class AdminHome extends MY_Controller{
            var $module_id;
		
		function __construct($module_id= NULL){
			parent::__construct();
                        $this->module_id = $module_id;
			$module_admin = $this->uri->segment(1);
			switch ($module_admin) {
                            case 'admin':{
                                $this->_checkLogin();
                                break;
                            }
                            default:{
                                break;
                                    }
			}
                        if(!$this->user_model->has_module_permission($this->module_id,$this->user_model->get_logged_in_employee_info()->user_id)){
                            redirect('site/no_access/'.$this->module_id);
                        }
		}

		function _checkLogin(){
			$userLogin = $this->user_model->is_logged_in();
			if(!$userLogin ){
				redirect(admin_url('login'));
			}
		}
                function check_action_permission($action_id,$module_id){
                    if($module_id=null)return true;
                    else{
                        $this->db->get_where();
                    }
                }

	}
?>
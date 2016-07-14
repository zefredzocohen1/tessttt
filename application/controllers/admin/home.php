<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
       require_once 'AdminHome.php';
	class Home extends AdminHome
	{
		function __construct()
		{
			parent::__construct(get_class());
		}

		function index(){
//                    $this->lang->load('block_lang');
                    echo lang('block_test');
                    echo $this->config->item('language');
                    $userLogin = ($this->session->userdata('userLogin')) ? $this->session->userdata('userLogin') : '';

                    if($userLogin){
                        $admin_id = $userLogin['user_id'];
                        $admin_info = $this->user_model->getInfoLogin($admin_id);
                        $data['admin_info'] = $admin_info;
                    }
                    $data['is_active'] = 'home';
                    $data['title'] = lang('dashboard');
                    $data['temp'] = ('admin/home/index');
                    $this->load->view('admin/layout', isset($data) ? ($data) : null);
		}
	}
?>
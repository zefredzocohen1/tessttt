<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class No_access extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index($module_id='')
	{
//            $data = array(
//                'module_id'=> $module_id
//            );
//            $this->load->view('no_access',$data);
        $data['temp'] = 'admin/user/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
	}
}

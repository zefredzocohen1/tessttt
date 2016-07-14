<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class No_access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($module_id='')
    {
        $data['module_id'] = $module_id;
        $this->load->view('errors/no_access', isset($data) ? ($data) : null);


    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    public function index(){
    }
    public function pageNotFound(){
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('errors/pagenotfound');//loading view
    }
}

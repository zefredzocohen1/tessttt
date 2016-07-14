<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {
        $data['meta_title'] = 'Index';
        $data['temp'] = ('site/home/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
    public function bookroom()
    {
        $data['meta_title'] = 'Bookroom';
        $data['temp'] = ('site/home/bookroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function listroom()
    {
        $data['meta_title'] = 'Listroom';
        $data['temp'] = ('site/home/listroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function login()
    {
        $data['meta_title'] = 'Login';
        $data['temp'] = ('site/home/login');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews1()
    {
        $data['meta_title'] = 'Postnews1';
        $data['temp'] = ('site/home/postnews1');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews2()
    {
        $data['meta_title'] = 'Postnews2';
        $data['temp'] = ('site/home/postnews2');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews3()
    {
        $data['meta_title'] = 'Postnews3';
        $data['temp'] = ('site/home/postnews3');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews_success()
    {
        $data['meta_title'] = 'Postnews_success';
        $data['temp'] = ('site/home/postnews_success');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function register()
    {
        $data['meta_title'] = 'Register';
        $data['temp'] = ('site/home/register');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->library("form_validation");
        $this->load->helper('form');
        $this->load->model('user_model');
        if ($this->input->post('login')) {
            
            $this->form_validation->set_rules('login', 'Login', 'callback_checkLogin');
            $this->form_validation->set_error_delimiters('<div class="errorLogin"><span class="glyphicon glyphicon-exclamation-sign"></span> ', '</div>');
            if ($this->form_validation->run()) {

                $user_name = $this->input->post('user_name');
                $input = array();
                $userLogin = array();
                $input['where'] = array('user_name' => $user_name);
                $userLogin = $this->user_model->get_row($input);

                $userLogin = array(
                    'user_id' => $userLogin->user_id,
                    'last_name' => $userLogin->last_name,
                    'first_name' => $userLogin->first_name,
                    'user_name' =>  $userLogin->user_name
                );

                $this->session->set_userdata('userLogin', $userLogin);
                $this->session->set_userdata('user_id', $userLogin->user_id);
                redirect(admin_url("home"));
            }
        }

        $data['title'] = 'login';
        $data['temp'] = ('admin/login/index');
        $this->load->view('admin/layout_auth', isset($data) ? ($data) : null);
    }

    public function checkLogin(){

        $user_name = $this->input->post('user_name');
        $password = md5($this->input->post('password'));
        $role = 3;
        $status = 1;

        $where = array();
        $where = array('user_name' => $user_name,'password'  => $password);

        if($this->user_model->check_exists($where)){

            $where = array( 'user_name' => $user_name, 'password'  => $password,'role_id < '   => $role);
            if($this->user_model->check_exists($where)){
                $where = array('user_name' => $user_name, 'password'  => $password,'role_id < '   => $role, 'status'=> $status);
                if($this->user_model->check_exists($where)){
                    return true;
                }else{
                    $this->form_validation->set_message('checkLogin', 'Không thể đăng nhập do trạng thái tài khoản.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('checkLogin', 'Tài khoản không đủ quyền đăng nhập.');
                return false;
            }
            
        }else{
            $this->form_validation->set_message('checkLogin', 'Sai tên đăng nhập hoặc mật khẩu.');
            return false;
        }
    }

}
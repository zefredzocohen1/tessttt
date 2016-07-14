<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailTo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mail_template_model');
        $this->load->model('mail_history_model');
    }

    public function index($data= array()){
        $this->load->model("role_model");
        $input = array();
        $input['order'] = array('role_id','ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;

        $this->load->library('pagination');
        $total = $this->user_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/user/index');
        $config['per_page'] = 15;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        if($this->uri->segment('4') && $this->uri->segment('4') > 1){
            $segment = $this->uri->segment('4');
        }else{
            $segment = 1;
        }

        $segment = (int)$segment;
        $start = ($segment - 1)*$config['per_page'];
        $pagination_link = $this->pagination->create_links();
        $data['pagination_link'] = $pagination_link;

        $message = $this->session->flashdata();
        $data['message'] = $message;

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $input['order'] = array('user_id','DESC');

      
        /*-- Lọc user_name--*/
        $user_name = $this->input->get('user_name');
        if($user_name){
            $input['like'] = array('user_name', $user_name);
        }
          /*-- Lọc ozganzation--*/
        $ozganzation = $this->input->get('ozganzation');

        if($ozganzation){
            $input['or_like'] = array('ozganzation', $ozganzation);
        }
        /*-- Lọc role--*/
        $role_id = $this->input->get('role');
        $role_id = (int)$role_id;
        if($role_id){
             $input['where']['tbl_user.role_id'] = $role_id;
        }

        //Lay session adminLogin de list user != adminLogin
        if(!is_NULL($this->session->userdata('adminLogin'))){
            $adminLogin = $this->session->userdata('adminLogin');
            $input['where']['user_id !='] = $adminLogin['user_id'];
        }
        $list = $this->user_model->getList($input);
        $data['total'] = $total;
        $data['list'] = $list;

        $data['title'] = 'Danh sách tài khoản';
        $data['temp'] = 'admin/user/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : null);


    }
}
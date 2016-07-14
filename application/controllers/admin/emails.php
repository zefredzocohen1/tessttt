<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once 'AdminHome.php';
    class Emails extends AdminHome{
        function __construct(){
            parent::__construct(get_class());
            $this->load->model('email_model');
            $this->lang->load('comm_email_lang.php', 'vietnamese');
        }

        function index(){
            $this->load->library('pagination');
            $total = $this->email_model->get_total();

            $config = array();
            $config["total_rows"] = $total;
            $config['base_url'] = admin_url('emails/index');
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

            $input = array();
            $input['limit'] = array($config['per_page'], $start);
            $input['order'] = array('email_id','ASC');

            $message = $this->session->flashdata();
            $data['message'] = $message;
            $list = $this->email_model->getList($input);
            $data['total'] = $total;
            $data['list'] = $list;
            $data['title'] = 'Danh sách email';
            $data['temp'] = 'admin/emails/index';
            $this->load->view('admin/layout', (isset($data)) ? $data: NULL);
        }

        function edit($id=-1){
            if($id>0){
                $input = array(
                    'where'=>array(
                        'email_id'=>$id,
                    )
                );
                $join = array(
                    'email_template'=>'email_template_id::email_type',
                );
                $data['email'] = $this->email_model->get_row($input,$join);
                $data['email_template'] = $this->email_model->getEmailTemplate()->result();
                $data['temp'] = 'admin/emails/edit';
                $this->load->view('admin/layout', (isset($data)) ? $data: NULL);
            }
        }
        
        function delete($id=-1){
            if($id>0){
                $this->email_model->delete($id);
            }   
        }
        function save($id=-1){
            if($id>0){
                $data = array(
                    'email_title' => $this->input->post('title_email')?trim($this->input->post('title_email')):'',
                    "description" => $this->input->post('edit_email')?trim($this->input->post('edit_email')):'',
                    'email_type' => $this->input->post('type_email')?trim($this->input->post('type_email')):'',
                );
                if($this->email_model->update($id,$data))
                    echo json_encode (array('success'=>true,'message'=>$data['description']));
                else {
                    echo json_encode (array('success'=>FALSE,'message'=>'error_email_update'));
                }
            }
        }
    }
?>
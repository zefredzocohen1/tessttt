<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';
	class Provincial extends AdminHome
	{
		function __construct(){

			parent::__construct(get_class());
			$this->load->model('provincial_model');	
		}

		function index(){
			$this->load->library('pagination');

			$total_rows = $this->provincial_model->get_total();

			$config = array();
			$config["total_rows"] = $total_rows;
			$config['base_url'] = base_url('admin/provincial/index');
			$config['per_page'] = 15;
			$config['uri_segment'] = 4;
			$config['next_link'] = 'Trang kế tiếp';
			$config['prev_link'] = 'Trang trước';
			$config['use_page_numbers'] = TRUE;

			$this->pagination->initialize($config);

			if($this->uri->segment('4')){
				$segment = $this->uri->segment('4');
			}else{
				$segment = 1;
			}
			$segment = (int)$segment;

			$start = ($segment - 1)*$config['per_page'];

			$input = array();
			$input['limit'] = array($config['per_page'],$start);

			$input['order'] = array('provincial_name','ASC');
			$data['list'] = $this->provincial_model->get_list($input);

			$data['total'] = $total_rows;
			
			//lay nội dung message
			$message = $this->session->flashdata();
			$data['message'] = $message;
			
			$data['title'] = 'Danh sách tỉnh thành';
	        $data['temp'] = 'admin/provincial/index';

	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);
		}

		function check_provin_name(){

			$provincial_name = $this->input->post('provincial_name');
			$where = array('provincial_name' => $provincial_name);
			if($this->provincial_model->check_exists($where)){
				$this->form_validation->set_message(__FUNCTION__, 'Tên tỉnh đã tồn tại!');
				return false;
			}
			return true;
		}

		function create(){

			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())
			{
				$this->form_validation->set_rules('provincial_name', 'provincial', 'trim|required|callback_check_provin_name');

				if($this->form_validation->run())
				{
					$provincial_name = $this->input->post('provincial_name');
					$description = $this->input->post('description');

					$data = array(
						'provincial_name' => $provincial_name,
						'description'	  => $description
					);

					if($this->provincial_model->create($data))
					{
						$this->session->set_flashdata('message','Thêm mới dữ liệu thành công!');
					}
					else
					{
						$this->session->set_flashdata('message','Thêm mới dữ liệu thất bại!');
					}
					redirect(base_url('admin/provincial'));
				}
			}

			$data['title'] = 'Thêm mới tỉnh thành';
	        $data['temp'] = 'admin/provincial/create';
	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);	
		}


		function edit(){

			$this->load->library('form_validation');
			$this->load->helper('form');

			$id = $this->uri->rsegment('3');
			$id = (int)$id;

			$data['info'] = $this->provincial_model->get_info($id);

			if(!$data['info']){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(base_url('admin/provincial'));
			}

			if($this->input->post()){

				$provincial_name = $this->input->post('provincial_name');

				if($provincial_name != $data['info']->provincial_name){

					$this->form_validation->set_rules('provincial_name', 'provincial', 'trim|required|callback_check_provin_name');
				}else{
					$this->form_validation->set_rules('provincial_name', 'provincial', 'trim|required');
				}


				if($this->form_validation->run()){

					$provincial_name = $this->input->post('provincial_name');
					$description = $this->input->post('description');

					$data = array(
						'provincial_name' => $provincial_name,
						'description'	  => $description
					);

					if($this->provincial_model->update($id,$data)){

						$this->session->set_flashdata('message', 'Cập nhật thành công!');
					}else{

						$this->session->set_flashdata('message', 'Cập nhật thất bại!');
					}

					redirect(base_url('admin/provincial'));
				}
			}

			$data['title'] = 'Cập nhật tỉnh thành';
	        $data['temp'] = 'admin/provincial/edit';
	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);	

		}

		function delete(){
			$id = $this->uri->rsegment('3');
			$id = (int)$id;

			$data['info'] = $this->provincial_model->get_info($id);

			if(!$data['info']){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(base_url('admin/provincial'));
			}

			if($this->provincial_model->delete($id)){
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
			}
			redirect(base_url('admin/provincial'));
		}
	}
?>
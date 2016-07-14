<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
        require_once 'AdminHome.php';
	class Room_type extends AdminHome
	{
		
		function __construct()
		{
			parent::__construct(get_class());
			$this->load->model('room_type_model');
		}

		function index(){
			$this->load->library('pagination');
			$total = $this->room_type_model->get_total();

			$config = array();
			$config["total_rows"] = $total;
			$config['base_url'] = admin_url('room_type/index');
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
			$input['order'] = array('room_type_id','ASC');
			
			$message = $this->session->flashdata();
			$data['message'] = $message;

			$list = $this->room_type_model->get_list($input);
			$data['total'] = $total;
			$data['list'] = $list;

			$data['title'] = 'Danh sách loại phòng';
			$data['temp'] = 'admin/room_type/index';
			$this->load->view('admin/layout', (isset($data)) ? $data: NULL);
		}

		function create(){

			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post()){

				$this->form_validation->set_rules('room_type_name', 'Room Type', 'trim|required|min_length[2]');

				$this->form_validation->set_rules('room_type_name_en','Room Type (EN)', 'trim|required|min_length[2]');

				if($this->form_validation->run()){

					$room_type_name = $this->input->post('room_type_name');
					$room_type_name_en = $this->input->post('room_type_name_en');
					$description = $this->input->post('description');
					$description_en = $this->input->post('description_en');
					if($this->input->post('status') =='on'){

						$status = 1;
					}else{
						$status = 0;
					}
					$created = date('Y:m:d H:i:s');

					$data = array(
						'room_type_name' => $room_type_name,
						'room_type_name_en' => $room_type_name_en,
						'description' => $description,
						'description_en' => $description_en,
						'status' => $status,
						'created'=>$created 
					);

					if($this->room_type_model->create($data)){

						$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
					}else{
						$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
					}

					redirect(base_url('admin/room_type'));
				}
			}
			$data['title'] = 'Thêm mới loại phòng';
			$data['temp'] = 'admin/room_type/create';
			$this->load->view('admin/layout', (isset($data)) ? $data : NULL);
		}

		function edit(){

			$this->load->library('form_validation');
			$this->load->helper('form');

			$id = $this->uri->rsegment('3');
			$id = (int)$id;

			$info = $this->room_type_model->get_info($id);

			if(!$info){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('room_type'));
			}else{

				$data['info'] = $info;
			}

			if($this->input->post()){
				// echo "<pre>";
				// print_r($this->input->post());
				$this->form_validation->set_rules('room_type_name', 'Room Type', 'trim|required|min_length[2]');

				$this->form_validation->set_rules('room_type_name_en','Room Type (EN)', 'trim|required|min_length[2]');

				if($this->form_validation->run()){

					$room_type_name = $this->input->post('room_type_name');
					$room_type_name_en = $this->input->post('room_type_name_en');
					$description = $this->input->post('description');
					$description_en = $this->input->post('description_en');
					if($this->input->post('status') =='on'){

						$status = 1;
					}else{

						$status = 0;
					}

					$created = date('Y:m:d H:i:s');

					$data = array(
						'room_type_name' => $room_type_name,
						'room_type_name_en' => $room_type_name_en,
						'description' => $description,
						'description_en' => $description_en,
						'status' => $status,
						'created'=>$created
					);

					if($this->room_type_model->update($id,$data)){

						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
					}else{
						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
					}

					redirect(admin_url('room_type/index'));

				}
			}

			$data['title'] = 'Cập nhật tiện nghi';
	        $data['temp'] = 'admin/room_type/edit';
	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);

		}

		function delete(){
			$id = $this->uri->rsegment('3');
			$id = (int)$id;
			$info = $this->room_type_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('room_type/index'));
			}else{
				if($this->room_type_model->delete($id)){

					$this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
				}
			
				redirect(admin_url('room_type/index'));
				
			}
		}

		function status(){

			if($this->input->post('id')){
				$id = $this->input->post('id');
			}
			$field = 'status';

			$statusInfo = $this->room_type_model->get_info($id ,$field);
			if(!$statusInfo){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('room_type/index'));

			}else{

				if($statusInfo->status == 1){
					$data = array(
						'status'=>0,
					);
				}else{
					$data = array(
						'status'=>1,
					);
				}
			}

			if($this->room_type_model->update($id, $data)){
				
			}
		}

		function deleteAll(){
			if($this->input->post('arrId')){
				$arrId = $this->input->post('arrId');
				foreach ($arrId as $id) {
					$this->room_type_model->delete($id);
				}
			}
		}
	}
?>
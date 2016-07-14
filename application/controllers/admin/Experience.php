<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
        require_once 'AdminHome.php';
	class Experience extends AdminHome
	{
		
		function __construct()
		{
			parent::__construct(get_class());
			$this->load->model('experience_model');
		}

		function index(){
			
			$this->load->library('pagination');
			$total = $this->experience_model->get_total();

			$config = array();
			$config["total_rows"] = $total;
			$config['base_url'] = base_url('admin/experience/index');
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
			$input['order'] = array('experience_id','ASC');
			$input['join'] = array('icon','icon_id' );
			
			$list = $this->experience_model->getListAll($input);
			$data['total'] = $total;
			$data['list'] = $list;

			$data['title'] = 'Danh sách trải nghiệm';
                        $data['temp'] = 'admin/experience/index';
                        $this->load->view('admin/layout',isset($data)? ($data) : NULL);
		}

		function messIconErr($str){
			if(!isset($str)){
				$this->form_validation->set_message('messIconErr', 'Bạn chưa chọn icon cho trải nghiệm!');
				return false;
			}else{
				return true;
			}
		}

		function create(){

			$this->load->model("icon_model");
			$this->load->library('form_validation');
			$this->load->helper('form');

			$list_icon = $this->icon_model->get_list();
			$data['list_icon'] = $list_icon;

			if($this->input->post()){

				$this->form_validation->set_rules('experience_name', 'Experience', 'trim|required|min_length[2]|max_length[35]');

				$this->form_validation->set_rules('experience_name_en','Experience (EN)', 'trim|required|min_length[2]|max_length[35]');
				$this->form_validation->set_rules('icon','Icon', 'callback_messIconErr');

				if($this->form_validation->run()){

					$experience_name = $this->input->post('experience_name');
					$experience_name_en = $this->input->post('experience_name_en');
					$description = $this->input->post('description');
					$description_en = $this->input->post('description_en');
					
					if($this->input->post('status') =='on'){

						$status = 1;
					}else{
						$status = 0;
					}
					if($this->input->post('icon')){

						$icon = $this->input->post('icon');
					}
					$created = date('Y:m:d H:i:s');

					$data = array(
						'experience_name' => $experience_name,
						'experience_name_en' => $experience_name_en,
						'description' => $description,
						'description_en' => $description_en,
						'icon' => $icon,
						'status' => $status,
						'created'=>$created 
					);

					if($this->experience_model->create($data)){

						$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
					}else{
						$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
					}

					redirect(base_url('admin/experience'));

				}
			}

			$data['title'] = 'Thêm mới tiện nghi';
	        $data['temp'] = 'admin/experience/create';
	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);
		}

		function edit(){
			$this->load->model("icon_model");
			$this->load->library('form_validation');
			$this->load->helper('form');

			$id = $this->uri->rsegment('3');
			$id = (int)$id;

			$info = $this->experience_model->get_info($id);

			if(!$info){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('experience'));
			}else{

				$data['info'] = $info;
			}

			$list_icon = $this->icon_model->get_list();
			$data['list_icon'] = $list_icon;

			if($this->input->post()){
				// echo "<pre>";
				// print_r($this->input->post());
				$this->form_validation->set_rules('experience_name', 'Room Type', 'trim|required|min_length[2]|max_length[35]');

				$this->form_validation->set_rules('experience_name_en','Room Type (EN)', 'trim|required|min_length[2]|max_length[35]');
				$this->form_validation->set_rules('icon','Icon', 'callback_messIconErr');

				if($this->form_validation->run()){

					$experience_name = $this->input->post('experience_name');
					$experience_name_en = $this->input->post('experience_name_en');
					$description = $this->input->post('description');
					$description_en = $this->input->post('description_en');
					if($this->input->post('icon')){
						$icon = $this->input->post('icon');
					}
					if($this->input->post('status') =='on'){
						$status = 1;
					}else{
						$status = 0;
					}

					$created = date('Y:m:d H:i:s');

					$data = array(
						'name' => $experience_name,
						'name_en' => $experience_name_en,
						'description' => $description,
						'description_en' => $description_en,
						'icon'=>$icon,
						'status' => $status,
						'created'=>$created
					);

					if($this->experience_model->update($id,$data)){

						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
					}else{
						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
					}

					redirect(admin_url('experience/index'));

				}
			}

			$data['title'] = 'Cập nhật tiện nghi';
	        $data['temp'] = 'admin/experience/edit';
	        $this->load->view('admin/layout',isset($data)? ($data) : NULL);
		}

		function delete(){
			$id = $this->uri->rsegment('3');
			$id = (int)$id;
			$info = $this->experience_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('experience/index'));
			}else{
				if($this->experience_model->delete($id)){

					$this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
				}
			
				redirect(admin_url('experience/index'));
				
			}
		}

		function status(){

			if($this->input->post('id')){
				$id = $this->input->post('id');
			}
			$field = 'status';

			$statusInfo = $this->experience_model->get_info($id ,$field);
			if(!$statusInfo){

				$this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
				redirect(admin_url('experience/index'));

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

			if($this->experience_model->update($id, $data)){
				
			}
		}

		function deleteAll(){
			if($this->input->post('arrId')){
				$arrId = $this->input->post('arrId');
				foreach ($arrId as $id) {
					$this->experience_model->delete($id);
				}
			}
		}

	}
?>
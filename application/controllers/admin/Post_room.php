<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
        require_once 'AdminHome.php';
	class Post_room extends AdminHome
	{
		
            function __construct(){
                parent::__construct(get_class());
                $this->load->model("post_room_model");
                $this->load->model("Address_model");
                $this->load->model("house_type_model");
                $this->load->model("room_type_model");
                $this->load->model("amenities_model");
                $this->load->model("experience_model");
                $this->load->library('form_validation');
                $this->load->helper('form');
            }

            function index(){
                $this->load->model('post_room_model');
                $this->load->library('pagination');
                $total = $this->post_room_model->get_total();
                $data['total'] = $total;
                        $config = array();
                $config["total_rows"] = $total;
                $config['base_url'] = base_url('admin/post_room/index');
                $config['per_page'] = 10;
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

                $post_room_name = $this->input->get('post_room_name');

                // like loi -- ko search dc dong thoi
                if($post_room_name){
                    $input['like'] = array('post_room_name', $post_room_name);
                }

                $user_name = $this->input->get('user_name');
                if($user_name){
                    $input['or_like'] = array('user_name', $user_name);
                }

                $list_room = $this->post_room_model->getListInfo_where($input);
                if($list_room){
                        $data['list_room'] = $list_room;
                }

                $data['title'] = 'Danh sách';
                $data['temp'] = 'admin/post_room/index';
                $this->load->view('admin/layout', isset($data)?$data:'');
            }

		function post($id=-1){
			if($this->session->userdata('adminLogin')){
				$adminLogin = $this->session->userdata('adminLogin');
			}
                        if($id>0){
                            $data_post_room = $this->post_room_model->get_row(array('where'=>array('post_room_id'=>$id)));
                            $data['address'] = $this->Address_model->get_row(array('where'=>array('address_id'=>$data_post_room->address_id)));
                        }
			
			$input = array();
			$input['where'] = array('status'=>1);
			$list_house_type = $this->house_type_model->get_list($input);
			$list_room_type = $this->room_type_model->get_list($input);
			$list_amenities = $this->amenities_model->get_list($input);
			$list_experience = $this->experience_model->getListAll($input);
			
			$data["list_house_type"] = $list_house_type;
			$data["list_room_type"] = $list_room_type;
			$data["list_amenities"] = $list_amenities;
			$data["list_experience"] = $list_experience;

			if($this->input->post()){
				
				$this->form_validation->set_rules('address_street','Address Street','trim|required');
				$this->form_validation->set_rules('district','District','trim|required');
				$this->form_validation->set_rules('provincial','Provincial','trim|required');
				$this->form_validation->set_rules('zip_code','zip_code','trim|required|numeric|max_length[6]');
				$this->form_validation->set_rules('country','Country','trim|required');
				$this->form_validation->set_rules('post_room_name','post_room_name','trim|required|min_length[20]|max_length[50]');
				$this->form_validation->set_rules('description','description','trim|required|min_length[300]|max_length[1000]');
				$this->form_validation->set_rules('acreage','Acreage','numeric');

				if($this->form_validation->run()){

                                    $address_detail = $this->input->post('address_detail');
                                    $lat 			= $this->input->post('lat');
                                    $lng 			= $this->input->post('lng');
                                    $address_street = $this->input->post('address_street');
                                    $address_2		= $this->input->post('address_2');
                                    $district 		= $this->input->post('district');
                                    $district_ascii = stripUnicode($district);
                                    $provincial 	= $this->input->post('provincial');
                                    $provincial_ascii = stripUnicode($provincial);
                                    $zip_code 		= $this->input->post('zip_code');
                                    $country 		= $this->input->post('country');
                                    $country_ascii	= stripUnicode($country);

                                    $post_room_name = $this->input->post('post_room_name');
                                    $description 	= $this->input->post('description');
                                    $house_type 	= $this->input->post('house_type');
                                    $room_type 		= $this->input->post('room_type');
                                    $num_guest		= $this->input->post('num_guest');
                                    $num_bedroom	= $this->input->post('num_bedroom');
                                    $num_bed 		= $this->input->post('num_bed');
                                    $num_bathroom 	= $this->input->post('num_bathroom');
                                    $acreage 		= $this->input->post('acreage');
                                    $user_id		= (isset($adminLogin) && is_array($adminLogin))? $adminLogin['user_id'] : 0;
                                    if($this->input->post('amenities') && is_array($this->input->post('amenities'))){
                                            $amenities = implode(',', $this->input->post('amenities'));
                                    }else{
                                            $amenities = NULL;
                                    }
                                    if($this->input->post('experience') && is_array($this->input->post('experience'))){
                                            $experience = implode(',', $this->input->post('experience'));
                                    }else{
                                            $experience = NULL;
                                    }
                                    $sess = array(
                                        'address' 		=> array(
                                            'address_detail'	=> $address_detail,
                                            'lat'			 	=> $lat,
                                            'lng'				=> $lng,
                                            'address_street'	=> $address_street,
                                            'address_2'			=> $address_2,
                                            'district'			=> $district,
                                            'district_ascii'	=> $district_ascii,
                                            'provincial'		=> $provincial,
                                            'provincial_ascii'	=> $provincial_ascii,
                                            'zip_code'			=> $zip_code,
                                            'country'			=> $country,
                                            'country_ascii'		=> $country_ascii,
                                                ),
                                        'post_room_name'=> $post_room_name,
                                        'description'	=> $description,
                                        'house_type'	=> $house_type,
                                        'room_type'		=> $room_type,
                                        'num_guest'		=> $num_guest,
                                        'num_bedroom'	=> $num_bedroom,
                                        'num_bed'		=> $num_bed,
                                        'num_bathroom'	=> $num_bathroom,
                                        'acreage' 		=> $acreage,
                                        'amenities'		=> $amenities,
                                        'experience'	=> $experience,
                                        'user_id'		=> $user_id
                                    );
                                    $data_sess['post_info'] = $sess;
                                    $this->session->set_userdata($data_sess);
                                    redirect(admin_url('post_room/post_price/'.$id));
				}
			}

			$data['title'] = 'Đăng phòng cho thuê';
			$data['temp'] = 'admin/post_room/post';
			$this->load->view('admin/layout', isset($data)?$data:'');
		}

		function post_price($id=-1){

			if($this->session->userdata('post_info') !== NULL){
				$post_info  = $this->session->userdata('post_info');
			}
			if(!isset($post_info)){
				redirect(admin_url('post_room/post'));
			}
			if($this->session->userdata('post_news') !== NULL){
				$post_news['post_news'] =  $this->session->userdata('post_news');
			}

			if($this->input->post()){
				$this->form_validation->set_rules("price_night_vn","Price night","trim|required|integer");
				$this->form_validation->set_rules("price_night_en","Price night","trim|required|integer");

				if($this->form_validation->run()){
					$price_night_vn 	= $this->input->post('price_night_vn');

					if($this->input->post('price_night_en') == ''){

						$price_night_en = $price_night_vn;
					}else{

						$price_night_en = $this->input->post('price_night_en');
					}
					$price_lastweek_vn 	= $this->input->post('price_lastweek_vn');
					$price_lastweek_en 	= $this->input->post('price_lastweek_en');

					if($this->input->post('type_last_week')){

						$type_last_week 	= implode(',', $this->input->post('type_last_week'));
					}else{
						$type_last_week 	= NULL;
					}

					$price_week_vn 		= $this->input->post('price_week_vn');
					$price_week_en 		= $this->input->post('price_week_en');
					$price_month_vn 	= $this->input->post('price_month_vn');
					$price_month_en 	= $this->input->post('price_month_en');
					$deposit_vn 		= $this->input->post('deposit_vn');
					$deposit_en 		= $this->input->post('deposit_en');
					$price_guest_more_vn= $this->input->post('price_guest_more_vn');
					$price_guest_more_en= $this->input->post('price_guest_more_en');
					$clearning_fee_vn	= $this->input->post('clearning_fee_vn');
					$clearning_fee_en	= $this->input->post('clearning_fee_en');
					if($this->input->post('clearning_type')){
						$clearning_type = $this->input->post('clearning_type');
					}else{
						$clearning_type = NULL;
					}
					$cancel_police 		= $this->input->post('cancel_police');
					$regulations		= $this->input->post('regulations');

					$sess = array(
						'price_night_vn' 		=> $price_night_vn,
						'price_night_en' 		=> $price_night_en,
						'price_lastweek_vn' 	=> $price_lastweek_vn,
						'price_lastweek_en'		=> $price_lastweek_en,
						'type_last_week'		=> $type_last_week,
						'price_week_vn'			=> $price_week_vn,
						'price_week_en'			=> $price_week_en,
						'price_month_vn'		=> $price_month_vn,
						'price_month_en'		=> $price_month_en,
						'deposit_vn'			=> $deposit_vn,
						'deposit_en'			=> $deposit_en,
						'price_guest_more_vn' 	=> $price_guest_more_vn,
						'price_guest_more_en' 	=> $price_guest_more_en,
						'clearning_fee_vn'		=> $clearning_fee_vn,
						'clearning_fee_en'		=> $clearning_fee_en,
						'clearning_type'		=> $clearning_type,
						'cancel_police'			=> $cancel_police,
						'regulations'			=> $regulations
					);

					$post_price['post_price'] = $sess;
					$this->session->set_userdata($post_price);
					redirect(admin_url('post_room/post_photo'));
 				}
			}
			$data['title'] = 'Đăng phòng cho thuê';
			$data['temp'] = 'admin/post_room/post_price';
			$this->load->view('admin/layout', isset($data)?$data:'');
		}

		function post_photo($id=-1){

			if($this->session->userdata('post_info') !== NULL){
				$post_info  = $this->session->userdata('post_info');
			}
			if($this->session->userdata('post_price') !== NULL){
				$post_price = $this->session->userdata('post_price');
			}
			
			if(!isset($post_info) && !isset($post_price)){
				redirect(admin_url('post_room/post'));
			}
			else if(isset($post_info) && !isset($post_price)){
				redirect(admin_url('post_room/post_price'));
			}

			$this->load->model('address_model');

			if($this->input->post('submit')){

				$upload_path = '/uploads/room';
				$this->load->library('upload_library');
				$imageList = array();
				$imageList = $this->upload_library->upload_files($upload_path, 'image_list');
				// pre($imageList);die;
				$image_list = json_encode($imageList);
				
				$created = date('Y-m-d : H-i-s');
				$updated = $created;
				$sess = array(
					'image_list' => $image_list,
					'created' => $created,
					'updated' => $updated
				);

				$data_sess['post_photo'] = $sess;
				$this->session->set_userdata($data_sess);
				$post_photo = $this->session->userdata('post_photo');
				/*
				*	Thêm dữ liệu từ session post_info
				*
				*	Thêm dữ liệu vào table address, get id_address
				*	unset address trong array post_info 
				*/
				$address_id = $this->address_model->insertGetId($post_info['address']);
				unset($post_info['address']);
				$post_info['address_id'] = $address_id;

				$post = array_merge($post_info, $post_price,$post_photo);

				if($this->post_room_model->create($post)){
					$this->session->unset_userdata('post_info');
					$this->session->unset_userdata('post_price');
					$this->session->unset_userdata('post_photo');
					redirect(admin_url('post_room/index'));
				}
			}

			$data['title'] = 'Đăng phòng cho thuê';
			$data['temp'] = 'admin/post_room/post_photo';
			$this->load->view('admin/layout', isset($data)?$data:'');
		}

		function status(){
			$id = $this->input->post('id');
	        $id = (int)$id;

	        $statusInfo = $this->post_room_model->get_info($id,'status');
	        if(!$statusInfo){

	            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
	            redirect(admin_url('post_room/index'));
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
	        if($this->post_room_model->update($id, $data)){
	            
	        }
		}

		function delete(){
			$this->load->model('address_model');

			$id = $this->uri->rsegment(3);
			$id = (int)$id;

			$info = $this->post_room_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message','Không tồn tại bản ghi!');
				redirect(admin_url('post_room/index'));
			}else{
				$address_id = $info->address_id;
				$this->address_model->delete($address_id);
				$this->post_room_model->delete($id);

				$image_link = json_decode($info->image_list);
				if(is_array($image_link)){
					foreach ($image_link as $img) {
						if(file_exists($img)){
							unlink($img);
						}
					}
				}
				redirect(admin_url('post_room'));
			}
		}
                
                function edit($id=-1){
			if($this->session->userdata('adminLogin')){
				$adminLogin = $this->session->userdata('adminLogin');
			}
                        if($id>0){
                            $data_post_room = $this->post_room_model->get_row(array('where'=>array('post_room_id'=>$id)));
                            $data['address'] = $this->Address_model->get_row(array('where'=>array('address_id'=>$data_post_room->address_id)));
                            
			$this->load->model("house_type_model");
			$this->load->model("room_type_model");
			$this->load->model("amenities_model");
			$this->load->model("experience_model");

			$this->load->library('form_validation');
			$this->load->helper('form');
			$input = array();
			$input['where'] = array('status'=>1);
			$list_house_type = $this->house_type_model->get_list($input);
			$list_room_type = $this->room_type_model->get_list($input);
			$list_amenities = $this->amenities_model->get_list($input);
			$list_experience = $this->experience_model->getListAll($input);
			
			$data["list_house_type"] = $list_house_type;
			$data["list_room_type"] = $list_room_type;
			$data["list_amenities"] = $list_amenities;
			$data["list_experience"] = $list_experience;

			if($this->input->post()){
				
				$this->form_validation->set_rules('address_street','Address Street','trim|required');
				$this->form_validation->set_rules('district','District','trim|required');
				$this->form_validation->set_rules('provincial','Provincial','trim|required');
				$this->form_validation->set_rules('zip_code','zip_code','trim|required|numeric|max_length[6]');
				$this->form_validation->set_rules('country','Country','trim|required');
				$this->form_validation->set_rules('post_room_name','post_room_name','trim|required|min_length[20]|max_length[50]');
				$this->form_validation->set_rules('description','description','trim|required|min_length[300]|max_length[1000]');
				$this->form_validation->set_rules('acreage','Acreage','numeric');

				if($this->form_validation->run()){

                                    $address_detail = $this->input->post('address_detail');
                                    $lat 			= $this->input->post('lat');
                                    $lng 			= $this->input->post('lng');
                                    $address_street = $this->input->post('address_street');
                                    $address_2		= $this->input->post('address_2');
                                    $district 		= $this->input->post('district');
                                    $district_ascii = stripUnicode($district);
                                    $provincial 	= $this->input->post('provincial');
                                    $provincial_ascii = stripUnicode($provincial);
                                    $zip_code 		= $this->input->post('zip_code');
                                    $country 		= $this->input->post('country');
                                    $country_ascii	= stripUnicode($country);

                                    $post_room_name = $this->input->post('post_room_name');
                                    $description 	= $this->input->post('description');
                                    $house_type 	= $this->input->post('house_type');
                                    $room_type 		= $this->input->post('room_type');
                                    $num_guest		= $this->input->post('num_guest');
                                    $num_bedroom	= $this->input->post('num_bedroom');
                                    $num_bed 		= $this->input->post('num_bed');
                                    $num_bathroom 	= $this->input->post('num_bathroom');
                                    $acreage 		= $this->input->post('acreage');
                                    $user_id		= (isset($adminLogin) && is_array($adminLogin))? $adminLogin['user_id'] : 0;
                                    if($this->input->post('amenities') && is_array($this->input->post('amenities'))){
                                            $amenities = implode(',', $this->input->post('amenities'));
                                    }else{
                                            $amenities = NULL;
                                    }
                                    if($this->input->post('experience') && is_array($this->input->post('experience'))){
                                            $experience = implode(',', $this->input->post('experience'));
                                    }else{
                                            $experience = NULL;
                                    }
                                    $sess = array(
                                        'address' 		=> array(
                                            'address_detail'	=> $address_detail,
                                            'lat'			 	=> $lat,
                                            'lng'				=> $lng,
                                            'address_street'	=> $address_street,
                                            'address_2'			=> $address_2,
                                            'district'			=> $district,
                                            'district_ascii'	=> $district_ascii,
                                            'provincial'		=> $provincial,
                                            'provincial_ascii'	=> $provincial_ascii,
                                            'zip_code'			=> $zip_code,
                                            'country'			=> $country,
                                            'country_ascii'		=> $country_ascii,
                                                ),
                                        'post_room_name'=> $post_room_name,
                                        'description'	=> $description,
                                        'house_type'	=> $house_type,
                                        'room_type'		=> $room_type,
                                        'num_guest'		=> $num_guest,
                                        'num_bedroom'	=> $num_bedroom,
                                        'num_bed'		=> $num_bed,
                                        'num_bathroom'	=> $num_bathroom,
                                        'acreage' 		=> $acreage,
                                        'amenities'		=> $amenities,
                                        'experience'	=> $experience,
                                        'user_id'		=> $user_id
                                    );
                                    $data_sess['post_info'] = $sess;
                                    $this->session->set_userdata($data_sess);
                                    redirect(admin_url('post_room/post_price'));
				}
			}

			$data['title'] = 'Đăng phòng cho thuê';
			$data['temp'] = 'admin/post_room/post';
			$this->load->view('admin/layout', isset($data)?$data:'');
		}
	}
        }
?>
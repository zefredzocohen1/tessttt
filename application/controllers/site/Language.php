<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Language extends MY_Controller {
		function __construct(){
			parent:: __construct();
			$this->load->model('post_room_model');
                        $this->load->model('Address_model');
                        $this->load->model('Amenities_model');
                        $this->load->model('Experience_model');
		}
                public function index(){
                    if($_POST['language']=='vie'){
                        $this->session->set_userdata('language','vietnamese');
                    }
                    else{
                        $this->session->set_userdata('language','english');
                    }
                    echo json_encode(array('success'=>'true'));
                    exit;
                }

                public function search(){
                    $data['encode'] = $this->config->item('encode_id');
                    $_location = trim($this->input->get('location'));
                    if($_location!=NULL) $_location = vn_str_filter (strtolower ($_location));
                    
                    if(isset($_GET['location'])&&trim($_GET['location'])!=''){
                        $data['location'] = trim($_GET['location']);
                    }
                    if(isset($_GET['checkin'])&&trim($_GET['checkin'])!=''){
                        $data['checkin'] = trim($_GET['checkin']);
                    }
                    if(isset($_GET['checkout'])&&trim($_GET['checkout'])!=''){
                        $data['checkout'] = trim($_GET['checkout']);
                    }
                    if(isset($_GET['guest'])&&trim($_GET['guest'])!=''){
                        $data['guest'] = trim($_GET['guest']);
                    }
                    
                    $search_input = array(
                        'location'  =>  $_location,
                        'checkin'   =>  trim($this->input->get('checkin')),
                        'checkout'  =>  trim($this->input->get('checkout')),
                        'guest'     =>  trim($this->input->get('guest')),
                    );
                    $total = $this->post_room_model->search($search_input)->num_rows();
                    $data['total'] = $total;
                    
                    $config['total_rows'] = $data['total'];
                    $config['base_url'] = rtrim(base_url()."room/search?location=".$_GET['location']);
                    $config['per_page'] = 2;
                    $config['use_page_numbers'] = TRUE;
                    $config['page_query_string'] = TRUE;
                    $config['query_string_segment'] = 'page';
                    $config['uri_segment'] = 4;
                    // config pagintion với bootraps
                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul>';
                    $config['first_link'] = false;
                    $config['last_link'] = false;
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['prev_link'] = '&laquo';
                    $config['prev_tag_open'] = '<li class="prev">';
                    $config['prev_tag_close'] = '</li>';
                    $config['next_link'] = '&raquo';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li>';
                    $config['num_tag_close'] = '</li>';
                    
                    $this->pagination->initialize($config);
                    $data['pagination_link'] = $this->pagination->create_links();
                    $data['per_page'] = $config['per_page'];
                    
                    $amenities = $this->input->post('amenities')?$this->input->post('amenities'):'';
                    $experiences = $this->input->post('experiences')?$this->input->post('experiences'):'';
                    $bedroom = $this->input->post('bedroom')?$this->input->post('bedroom'):'';
                    $bathroom = $this->input->post('bathroom')?$this->input->post('bathroom'):'';
                    $beds = $this->input->post('beds')?$this->input->post('beds'):'';
                    
                    if($amenities!=''||$experiences!=''||$bedroom!=''||$bathroom!=''||$beds!=''){
                        echo json_encode(array(
                            'result'    =>'result',
                        ));
                        exit;
                    }
                    
                    $start = isset($_GET['page'])&&trim($_GET['page'])!=''?$_GET['page']-1:0;
                    
                    $this->load->library('pagination', $config);
                    $list_room = $this->post_room_model->search($search_input,$data['per_page'],$start)->result();
                    if(count($list_room)>0){
                    //get room type
                        foreach ($list_room as $line => $room){
                            $data['room_type'][$line] = array($room->house_type_name, $room->house_type_id);
                            $data['amenities'] = !isset($data['amenities'])?explode(',', $room->amenities):array_merge($data['amenities'],array_diff(explode(',', $room->amenities),$data['amenities']));
                            $data['experience'] = !isset($data['experience'])?explode(',', $room->experience):array_merge($data['experience'],array_diff(explode(',', $room->experience),$data['experience']));
                            $data['price_range'][$line] = $room->price_night_vn;
                        }
                        $data['table_amenities']= get_checkbox_manage_table('amenities','Tiện nghi',  $this, 120,$this->Amenities_model->getListAll());
                        $data['table_experiences'] = get_checkbox_manage_table('experiences','Trải nghiệm',  $this, 120,$this->Experience_model->getListAll());
                        $data['list_room'] = $list_room;
                        sort($data['price_range']);
                        $data['price_range_min'] = min($data['price_range']);
                        $data['price_range_max'] = $data['price_range_min']*100; 
                        unset($data['price_range']);
                        if($list_room){
                                $data['list_room'] = $list_room;
                        }
                        else{
                            $data['list_room'] = NULL;
                        }
                    }
                    $data['temp'] = ('site/room/list_room');
                    $this->load->view('site/layout', isset($data) ? ($data) : null);
	    }

		function room_detail($id){
                    if($id==null){
                        redirect(base_url());
                    }
                    $encode = $this->config->item('encode_id')->decode($id);
                    
                    if(count($encode)<=0){
                        redirect(base_url());
                    }else{
                        $data['id_encode'] = $id;
                    }
                    
                    if(isset($_GET['ch_in'])&&trim($_GET['ch_in'])!=''){
                        $data['ch_in'] = trim($_GET['ch_in']);
                    }
                    if(isset($_GET['ch_out'])&&trim($_GET['ch_out'])!=''){
                        $data['ch_out'] = trim($_GET['ch_out']);
                    }
                    if(isset($_GET['guest'])&&trim($_GET['guest'])!=''){
                        $data['guest'] = trim($_GET['guest']);
                    }
                    $this->load->model('amenities_model');
                    $id_decode = (int)$encode[0];
                    $data_room = array(
                        'room_id'=>$id_decode,
                        
                    );
                    $this->session->set_userdata($data_room);
                    $input = array();

                    $list_amenities = $this->amenities_model->get_list();
                    $data['list_amenities'] = $list_amenities;
                    $info = $this->post_room_model->getInfoDetail($id_decode,$input);

                    if($info){
                            $data['info'] = $info;
                    }
                    $data['meta_title'] = 'room_detail';
                    $data['temp'] = ('site/room/room_detail');
                    $this->load->view('site/layout_index', isset($data) ? ($data) : null);
		}
                
                function order_room($id=''){
                    if(!isset($_SESSION['user_name'])){
                        redirect('home/register');
                    }else{
                        $user_id = $this->session->userdata('user_id');
                        if(!isset($user_id)||$user_id==''){
                            redirect(base_url());
                        }
                        if($id==''){
                            redirect(base_url());
                        }
                        $id_decode = $this->config->item('encode_id')->decode($id);
                        if(count($id_decode)<=0){
                            redirect(base_url());
                        }else{
                            $data['id_encode'] = $id;
                        }
                        $checkin = $this->input->get('checkin')?$this->input->get('checkin'):'';
                        $checkout = $this->input->get('checkout')?$this->input->get('checkout'):'';
                        $guests = $this->input->get('guests')?$this->input->get('guests'):'';
                        if($checkin==''||$checkout==''||$guests==''){
                            redirect(base_url().'room/room_detail/'.$data['id_encode']);
                        }
                        $input = array(
                            'where'=>array(
                                    'post_room_id'=>$id_decode[0],
                                )
                            );
                        $date1 = new DateTime();
                        $date2 = new DateTime();
                        $dateNow = new DateTime();
                        $data['checkin'] = $date1->setDate(
                                date('Y',  strtotime(str_replace('/', '-', $checkin))), 
                                date('m',  strtotime(str_replace('/', '-', $checkin))), 
                                date('d',  strtotime(str_replace('/', '-', $checkin)))
                            );
                        $data['guests'] = $guests;
                        $data['checkout'] = $date2->setDate(
                                date('Y',  strtotime(str_replace('/', '-', $checkout))), 
                                date('m',  strtotime(str_replace('/', '-', $checkout))), 
                                date('d',  strtotime(str_replace('/', '-', $checkout)))
                            );
                        if($data['checkin']>$data['checkout']){
                            redirect(base_url().'room/room_detail/'.$data['id_encode']);
                        }
                        if($data['checkin']<  $dateNow||$data['checkout']<$dateNow){
                            redirect(base_url().'room/room_detail/'.$data['id_encode']);
                        }
                        $prices = $this->post_room_model->get_row($input);
                        $data['name_room'] = $prices->post_room_name;
                        //giá 1 đêm
                        $data['price_night_vn'] = $prices->price_night_vn;
                        $data['max_guest'] = $prices->num_guest;
                        // giá vượt quá số người
                        $data['price_guest_more_vn'] = $prices->price_guest_more_vn;
                        //phí dọn dẹp
                        $data['clearning_fee_vn'] = $prices->clearning_fee_vn;
                        $data['sub_day'] = $data['checkout']->diff($data['checkin']);
                        $data['distance_day'] = $data['sub_day']->days+1;
                        $data['price_all_night'] = $data['distance_day']*$data['price_night_vn'];
                        if($guests<=$data['max_guest']){
                            $data['guest_change'] = 0;
                        }
                        else{
                            $data['guest_change'] = $guests-$data['max_guest'];
                        }
                        if($data['guest_change']<=0){
                            $data['price_all_night_add_fee'] = $data['price_all_night']+$data['clearning_fee_vn'];
                        }else{
                            $data['price_all_night_add_fee'] = $data['price_all_night']+$data['clearning_fee_vn']+($data['guest_change'])*$data['price_guest_more_vn'];
                        }
                        $input = array();
                        $input = array(
                            'where'=>array(
                                    'user_id'=>$user_id,
                                )
                            );
                        $data['user'] = $this->user_model->get_row($input);
//                        pre($data['user']);return;
                        $data['meta_title'] = 'order room';
                        $data['temp'] = ('site/room/order');
                        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
                    }
                }
                
                function validate_room($id=''){
                    $data['temp'] = ('site/room/order');
                    $this->load->view('site/layout', isset($data) ? ($data) : null);
                }
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
             $this->load->library('email');
            $config = get_config_email();
            $this->email->initialize($config);
            $data = array(
                'user_name'=> 'người xác nhận',
                'home_page' => 'Star View',
                'email' =>$config['smtp_user'],
                'post_room_id' =>$config['smtp_user'],
                'price' =>$config['smtp_user'],
                'check_in' =>$config['smtp_user'],
                'check_out' =>$config['smtp_user'],
                'post_room_id' =>$config['smtp_user'],
                'post_room_id' =>$config['smtp_user'] );
         
        $this->email->from('lehai04.1991@gmail.com', 'myname');
        $this->email->to('zefredzocohen@gmail.com');
        $this->email->cc('lehai04.1991@gmail.com'); 

        $this->email->set_mailtype("html");
        $this->email->subject('Email xác nhận đặt phòng');
//        $message= 'chào mừng bạn đã đặt phòng';
        $body = $this->load->view('email_config_order.php',$data,TRUE);
        echo $body;
        $this->email->message($body);   

        $this->email->send();
//
//        echo $this->email->print_debugger();

//        $this->load->view('email_view');
            
            
	}
}

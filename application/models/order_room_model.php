<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Order_room_model extends MY_Model
	{
            var $table = 'order';
            var $key = 'order_id';

            function get_list_room(){
                $this->db->from('order');
                $this->db->join('user','user.user_id=order.user_id');
                $this->db->join('post_room','post_room.post_room_id = order.post_room_id');
                return $this->db->get();
            }
            // kiểm tra xem phòng đã được đặt hay chưa
            // true: đã ton tai
            // false: chưa tồn tại
            function check_exists_room($id,$checkin,$checkout) {
                if(!$this->check_exists(array('post_room_id',$id))) return FALSE;
                $this->db->from('order');
//                $this->db->or_where('checkin<=',$checkout);
//                $this->db->or_where('checkout>=',$checkin);
                $this->db->where('post_room_id',$id);
                $result = $this->db->get()->result();
                $date1 = new DateTime();
                $date2 = new DateTime();
                foreach ($result as $key => $value){
                    $date1->setDate(
                            date('Y',  strtotime($value->checkin)), 
                            date('m',  strtotime($value->checkin)), 
                            date('d',  strtotime($value->checkin))
                    );
                    $date2->setDate(
                            date('Y',  strtotime($value->checkout)), 
                            date('m',  strtotime($value->checkout)), 
                            date('d',  strtotime($value->checkout))
                    );
                    if(($checkout<$date1&&($checkin<=$checkout))||($checkin<=$checkout)&&($checkin>$date2))continue;
                    else return TRUE;
                }
                return FALSE;
            }
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_home extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Address_model');
    }
    public function index()
    {
        echo '1111';die;
        $data['meta_title'] = 'Index';
        $data['temp'] = ('site/home/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
    public function bookroom()
    {
        $data['meta_title'] = 'Bookroom';
        $data['temp'] = ('site/home/bookroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function listroom()
    {
        $data['meta_title'] = 'Listroom';
        $data['temp'] = ('site/home/listroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function login()
    {
        $data['meta_title'] = 'Login';
        $data['temp'] = ('site/home/login');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews1()
    {
        $data['meta_title'] = 'Postnews1';
        $data['temp'] = ('site/home/postnews1');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews2()
    {
        $data['meta_title'] = 'Postnews2';
        $data['temp'] = ('site/home/postnews2');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews3()
    {
        $data['meta_title'] = 'Postnews3';
        $data['temp'] = ('site/home/postnews3');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function postnews_success()
    {
        $data['meta_title'] = 'Postnews_success';
        $data['temp'] = ('site/home/postnews_success');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function register()
    {
        $data['meta_title'] = 'Register';
        $data['temp'] = ('site/home/register');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    public function process($query = ''){
        //get data from address_model vs $query
        $query = strtolower(trim($_POST['query']));
        $query_no = $this->vn_str_filter($query);
        $data = $this->Address_model->getAddress($query_no);
        if(count($data)>0){
            foreach ($data as $key =>$value){
//                $result[$key] = $value['address_street'].', '.$value['district'].', '.$value['provincial'].', '.$value['country'];
                $result[$key] = $value['address_detail'];
            }
            echo json_encode($result);
        }else   
            echo json_encode (array(
                'result'=>'',
            ));
        exit();
    }
      public function vn_str_filter($str) {

        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }

        return $str;
    }
}

<?php
	// admin url
	if(!function_exists('admin_url')){
		function admin_url($str = ''){
			return base_url('admin/'.$str);
		}
	}
	// pre array
	if(!function_exists('pre')){
		function pre($arr = array()){
			echo "<pre>";
			print_r($arr);
			echo "</pre>";
		}
	}

	if(!function_exists('lang')){
		function lang($str=''){
			$CI =& get_instance();
			$lang = $CI->lang->line($str);
			return (!empty($lang))?$lang:$str;
		}
	}

	if(!function_exists('get_lang')){
		function get_lang(){
			if(!isset($_COOKIE['php_lang'])){
				return array(
					'lang' => 'vietnamese',
					'suffix' => ''
				);
			}else{
				return array(
					'lang' => $_COOKIE['php_lang'],
					'suffix'=> ($_COOKIE['php_lang'] == 'vietnamese')?'':'_en'
				);
			}
		}
	}


	if(!function_exists('str_like')){
		function str_like($str){
			$str= trim($str);
			$str = stripUnicode($str);
			$str = str_replace(' ','%',$str);
			return $str;
		}
	}

	if(!function_exists('stripUnicode')){
		function stripUnicode($str){ 
			if(!$str) return false; 
			$unicode = array( 
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ', 
				'd'=>'đ', 
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
				'i'=>'í|ì|ỉ|ĩ|ị', 
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
				'y'=>'ý|ỳ|ỷ|ỹ|y',
			 ); 
			foreach($unicode as $nonUnicode=>$uni) 
				$str = preg_replace("/(".$uni.")/",$nonUnicode,$str); 
			return $str; 
		}
	}
        
        function vn_str_filter($str) {

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
    function url_origin( $s, $use_forwarded_host = false ){
        $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
        $sp       = strtolower( $s['SERVER_PROTOCOL'] );
        $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
        $port     = $s['SERVER_PORT'];
        $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
        $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
        $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
        return $protocol . '://' . $host;
}

function full_url( $s, $use_forwarded_host = false ){
    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}

?>
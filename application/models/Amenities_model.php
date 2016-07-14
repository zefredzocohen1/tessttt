<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Amenities_model extends MY_Model
	{
		var $table = 'amenities';
		var $key   = 'amenities_id';
                public function getListAll(){
			return $this->db->get($this->table);
		}
	}
<?php
	class Experience_model extends MY_Model{
		var $table = 'experience';
		var $key = 'experience_id';

		public function getListAll($input = array()){
			$this->db->select($this->table.'.*,icon_id,icon_value,icon.description as icon_des,icon.description_en as icon_des_en');
			$this->get_list_set_input($input);
			$this->db->join('icon',$this->table.'.icon = icon.icon_id');
			return $this->db->get($this->table);
		}
	}
?>
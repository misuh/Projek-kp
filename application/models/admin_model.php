<?php
	/**
	 * 
	 */
	class admin_model extends CI_Model
	{
		public function getuser(){

			return $this->db->get('usr')->result_array();
		}

		public function selectuser($start,$keyword = null){

		if ($keyword) {
            $this->db->like('name',$keyword);
            $this->db->or_like('email',$keyword);
        }

		return $this->db->get('usr',$start)->result_array();
		}
		public function countalluser(){
			return $this->db->get('usr')->num_rows();
		}
	}
<?php 

class tanggal_model extends CI_Model
	{
		public function tampilalldata(){
			return $this->db->get('tanggal')->result_array();
		}
		public function tampilbt()
		{		
		$this->db->select('*');
		$this->db->from('tanggal');
		$this->db->join('perfonmasi_jaringan', 'tanggal.id_tanggal = perfonmasi_jaringan.id_tanggal');
		$query = $this->db->get()->result();
		// foreach ($query as $row) {
		// 	echo $row->u_pln;
		// 	}
		return $query;
		}

		// public function update(){
		// 	return
		// }

	}


 ?>
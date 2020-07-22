<?php 

class tanggal_model extends CI_Model
	{
		public function tampilalldata(){
			return $this->db->get('tanggal')->result_array();
		}
		public function tampilalldata1(){
			return $this->db->get('tanggal')->result();
		}
		public function tampilbt()
		{		
		$this->db->select('*');
		$this->db->from('tanggal');
		$this->db->join('perfonmasi_jaringan', 'tanggal.id_tanggal = perfonmasi_jaringan.id_tanggal');
		$query = $this->db->get()->result_array();
		// foreach ($query as $row) {
		// 	echo $row->u_pln;
		// 	}
		return $query;
		}

		public function tampils($filter_tabel=null){

				$this->db->select('dates');
				$this->db->from('tanggal');
				$this->db->where($filter_tabel);
				$query = $this->db->get();
			return $query->result();
		}

		// public function update(){
		// 	return
		// }

	}


 ?>
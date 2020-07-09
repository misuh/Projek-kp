<?php
	/**
	 * 
	 */
	class tabel_model extends CI_Model
	{
	public function getalltabel(){
		
		return $this->db->get('perfonmasi_jaringan')->result_array();
	}

	public function gettabel($limit,$start,$keyword = null){

		if ($keyword) {
            $this->db->like('u_pln',$keyword);
            $this->db->or_like('link',$keyword);
            $this->db->or_like('product',$keyword);
            $this->db->or_like('bandwith',$keyword);
            $this->db->or_like('service_id',$keyword);
            $this->db->or_like('asman',$keyword);
            $this->db->or_like('peru',$keyword);
            $this->db->or_like('jml',$keyword);
            $this->db->or_like('dur',$keyword);
            $this->db->or_like('stan',$keyword);
            $this->db->or_like('rele',$keyword);
        }
		return $this->db->get('perfonmasi_jaringan',$limit,$start)->result_array();
	}

	public function gettabel2($start,$keyword = null){

		if ($keyword) {
            $this->db->like('u_pln',$keyword);
            $this->db->or_like('link',$keyword);
            $this->db->or_like('product',$keyword);
            $this->db->or_like('bandwith',$keyword);
            $this->db->or_like('service_id',$keyword);
            $this->db->or_like('asman',$keyword);
            $this->db->or_like('peru',$keyword);
            $this->db->or_like('jml',$keyword);
            $this->db->or_like('dur',$keyword);
            $this->db->or_like('stan',$keyword);
            $this->db->or_like('rele',$keyword);
        }
		return $this->db->get('perfonmasi_jaringan',$start)->result_array();
	}

	public function gettabel1($start,$keyword = null){

		if ($keyword) {
            $this->db->like('u_pln',$keyword);
            $this->db->or_like('link',$keyword);
            $this->db->or_like('product',$keyword);
            $this->db->or_like('bandwith',$keyword);
            $this->db->or_like('service_id',$keyword);
            $this->db->or_like('asman',$keyword);
            $this->db->or_like('peru',$keyword);
            $this->db->or_like('jml',$keyword);
            $this->db->or_like('dur',$keyword);
            $this->db->or_like('stan',$keyword);
            $this->db->or_like('rele',$keyword);
        }
		return $this->db->get('perfonmasi_jaringan',$start)->result();
	}

	public function countalltabel(){

		return $this->db->get('perfonmasi_jaringan')->num_rows();
	}

	public function getfilter($limit,$start,$filter_tabel = null){

		if ($filter_tabel) {
           $this->db->like('id_tanggal',$filter_tabel);
        }
		return $this->db->get('perfonmasi_jaringan',$limit,$start)->result_array();
	}

	public function getfilter1($start,$filter_tabel = null){

		if ($filter_tabel) {
           $this->db->like('id_tanggal',$filter_tabel);
        }
		return $this->db->get('perfonmasi_jaringan',$start)->result_array();
	}
	// public function cari($tabel,$data,$keyword){

	// 	if ($keyword) {
	// 		$keyword = $this->db->like($keyword)
	// 	}
	// 	return $this->db->get()
	// }
}

 ?>
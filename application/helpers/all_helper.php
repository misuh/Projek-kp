<?php 

function get_combo($tbl,$id,$nm,$add_opt)
	{
		$ci = &get_instance();
		$data = $ci->db->get($tbl)->result_array();
		$res = array();
		$res = $add_opt;
		foreach ($data as $v) {
			$res[$v[$id]] = $v[$nm];
		}
		return $res;
	}

 ?>
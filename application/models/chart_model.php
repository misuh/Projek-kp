<?php
	/**
	 * 
	 */
	class chart_model extends CI_Model
	{
		public function getGangguan()
		{
			$sql = "SELECT SUM( TIME_TO_SEC( `dur` ) ) AS jumlah ,tanggal.dates AS dates   FROM perfonmasi_jaringan JOIN tanggal ON perfonmasi_jaringan.id_tanggal = tanggal.id_tanggal GROUP BY tanggal.dates ORDER BY tanggal.id_tanggal ASC";

			return $this->db->query($sql)->result();
		}
	}

?>
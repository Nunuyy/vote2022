<?php
class OtherModel extends CI_Model {
 
	 function getTableBy($table,$col,$sort){
	 	$this->db->from($table);
		$this->db->order_by($col, $sort);
		$query = $this->db->get(); 
		return $query->result_array();
	 }

	public function get_pemilih_tetap_s()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			COUNT(s.id) as jum_dpt_s,
			SUM(s.status_vote_osis) as jum_aktif_s
			FROM siswa s
			");
		//return $query->result();
		//return $query->result_array();
		//return $query->row();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                    $data = $row;
                }
        return $data;
        }
	}

	public function get_pemilih_tetap_g()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			COUNT(g.id) as jum_dpt_g,
			SUM(g.status_vote_osis) as jum_aktif_g
			FROM guru g
			");
		//return $query->result();
		//return $query->result_array();
		return $query->row();
	}

	public function get_pemilih_tetap_t()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			COUNT(t.id) as jum_dpt_t,
			SUM(t.status_vote_osis) as jum_aktif_t
			FROM tendik t
			");
		//return $query->result();
		//return $query->result_array();
		return $query->row();
	}

 	public function get_suara_mpk_s()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(s.vote_mpk) as jumlah_suara_mpk_s
			FROM kandidat k
			LEFT JOIN siswa s ON k.id = s.vote_mpk
			WHERE k.org='mpk'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}

 	public function get_suara_mpk_g()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(g.vote_mpk) as jumlah_suara_mpk_g
			FROM kandidat k
			LEFT JOIN guru g ON k.id = g.vote_mpk
			WHERE k.org='mpk'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}

 	public function get_suara_mpk_t()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(t.vote_mpk) as jumlah_suara_mpk_t
			FROM kandidat k
			LEFT JOIN tendik t ON k.id = t.vote_mpk
			WHERE k.org='mpk'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}

 	public function get_suara_osis_s()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(s.vote_osis) as jumlah_suara_osis_s
			FROM kandidat k
			LEFT JOIN siswa s ON k.id = s.vote_osis
			WHERE k.org='osis'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}

 	public function get_suara_osis_g()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(g.vote_osis) as jumlah_suara_osis_g
			FROM kandidat k
			LEFT JOIN guru g ON k.id = g.vote_osis
			WHERE k.org='osis'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}

 	public function get_suara_osis_t()
	{
		$sueryset = $this->db->query("SET lc_time_names = 'id_ID';");
		$query = $this->db->query("
			SELECT 
			k.id, k.nama, k.org,
			COUNT(t.vote_osis) as jumlah_suara_osis_t
			FROM kandidat k
			LEFT JOIN tendik t ON k.id = t.vote_osis
			WHERE k.org='osis'
			GROUP BY k.id
			");

		//return $query->result();
		return $query->result_array();

	}


 //ruparupa result
 //https://www.codeigniter.com/userguide3/database/results.html
}
?>
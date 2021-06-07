<?php

class Model_karyawan extends CI_Model{

	public function detail_surat($id_surat)
	{
		$result = $this->db->where('id_surat',$id_surat)->get('user_data_surat');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}

}
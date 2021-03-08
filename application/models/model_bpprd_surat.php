<?php

class Model_bpprd_surat extends CI_Model{
	public function tampil_data(){
		// $query = $this->db->get('user_data_surat');
		$query = $this->db->query("SELECT * FROM user_data_surat ORDER BY id_surat DESC"); 
		return $query;
	}

	// Menampilakan di Admin

	public function get_tampil_data($limit, $start){
		// $query = $this->db->get('user_data_surat', $limit, $start);
		// return $query;
		$this->db->select('*');
      	$this->db->order_by('id_surat', 'DESC');
      	return $this->db->get('user_data_surat ', $limit, $start);
	}

	public function count_tampil_data(){
		$query = $this->db->get('user_data_surat')->num_rows(); 
		return $query;
	}

	public function tambah_surat($data,$table){
		$this->db->insert($table,$data);
	}

	public function ganti_slide($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_surat($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_surat', $id)
							->limit(1)
							->get('user_data_surat');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_surat($id_surat)
	{
		$result = $this->db->where('id_surat',$id_surat)->get('user_data_surat');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}

	public function get_keywoard($keywoard)
	{
		$this->db->select('*');
		$this->db->from('user_data_surat');
		$this->db->like('nama_lowongan', $keywoard);
		$this->db->or_like('keterangan_lowongan', $keywoard);
		$this->db->or_like('lokasi_lowongan', $keywoard);
		$this->db->or_like('harga_lowongan', $keywoard);
		$this->db->or_like('no_telepon_lowongan', $keywoard);
		return $this->db->get()->result();
	}

}
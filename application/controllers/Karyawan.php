<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			is_logged_in();
			if($this->session->userdata('role_id') != 4) {
			  redirect('auth');
			}
		}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $user = $this->session->userdata('id');

		// $data['alert'] = $this->db->query("SELECT * FROM user_data_surat as uds, user_komentar as uk WHERE uds.id_surat = uk.id_surat ORDER BY uds.id_surat DESC LIMIT 1")->result();

		$data['surat'] = $this->db->query("SELECT * FROM user_data_surat uds WHERE uds.id_surat ORDER BY id_surat DESC")->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail_surat($id_surat)
	{
		$data['title'] = 'Detail Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['detail'] = $this->model_user_surat->detail_surat($id_surat);

		$data['komentar'] = $this->db->query("SELECT * FROM user_komentar ul, user us WHERE ul.id = us.id AND ul.id_surat = '$id_surat'")->result();

		// $data['komentar'] = $this->db->get('user_komentar')->result();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('karyawan/detail_surat',$data);
		$this->load->view('templates/footer',$data);
	}

}
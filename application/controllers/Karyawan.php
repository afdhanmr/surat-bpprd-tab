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

	public function myprofile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/my-profile', $data);
		$this->load->view('templates/footer');
	}

	public function editprofile(){
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name','Full Name','required|trim');
		
		if($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/edit-profile', $data);
		$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// CEK JIKA ADA GAMBAR
			$upload_image = $_FILES['image']['name'];
			// var_dump($upload_image); die;
			if($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '4096';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/'. $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// echo $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('karyawan/myprofile');
				}
			}


			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Kamu Sudah Berubah</div>');
			redirect('karyawan/myprofile');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password','Current Password','required|trim');
		$this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[5]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','Confirm New Password','required|trim|min_length[5]|matches[new_password1]');

		if($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/changepassword', $data);
		$this->load->view('templates/footer');
		} else {
			$current_password 	= $this->input->post('current_password');
			$new_password 		= $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password</div>');
				redirect('karyawan/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password</div>');
					redirect('karyawan/changepassword');
				} else {
					// Password Sudah Oke
					$password_hash 		=	password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed</div>');
					redirect('karyawan/changepassword');
				}
			}
		}
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpprd extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			is_logged_in();
			if($this->session->userdata('role_id') != 3) {
			  redirect('auth');
			}
		}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bpprd/index', $data);
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
		$this->load->view('bpprd/edit-profile', $data);
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
					redirect('bpprd');
				}
			}


			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Kamu Sudah Berubah</div>');
			redirect('bpprd');
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
		$this->load->view('bpprd/changepassword', $data);
		$this->load->view('templates/footer');
		} else {
			$current_password 	= $this->input->post('current_password');
			$new_password 		= $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password</div>');
				redirect('bpprd/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password</div>');
					redirect('bpprd/changepassword');
				} else {
					// Password Sudah Oke
					$password_hash 		=	password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed</div>');
					redirect('bpprd/changepassword');
				}
			}
		}
	}

	public function datasurat ()
	{
		$data['title'] = 'Data Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// BARU
		$this->load->model('model_user_surat','datasurat');

		// Load Library Pagination
		$this->load->library('pagination');				

		// Config
		$config['base_url']		= site_url('bpprd/datasurat');
		$config['total_rows']	= $this->model_user_surat->count_tampil_data();
		$config['per_page']		= 5;
		$config['num_links'] 	= 2;

		// Style
		$config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav>';

		$config['first_link'] 		= 'First';
		$config['first_tag_open']	= '<li class="page-item">';
		$config['first_tag_close']	= '</li>';

		$config['last_link'] 		= 'Last';
		$config['last_tag_open']	= '<li class="page-item">';
		$config['last_tag_close']	= '</li>';

		$config['next_link'] 		= '&raquo';
		$config['next_tag_open']	= '<li class="page-item">';
		$config['next_tagl_close']	= '</li>';

		$config['prev_link'] 		= '&laquo';
		$config['prev_tag_open']	= '<li class="page-item"	>';
		$config['prev_tag_close']	= '</li>';

		$config['cur_tag_open']		= '<li class="page-item active"><a class="page-link" herf="#">';
		$config['cur_tag_close']	= '</a></li>';

		$config['num_tag_open']		= '<li class="page-item">';
		$config['num_tag_close']	= '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		// initialize
		$this->pagination->initialize($config);

		// $data['start']		= $this->uri->segment(3);
		// $data['surat'] 		= $this->model_user_surat->get_tampil_data($config['per_page'], $data['start'])->result();

		$data['surat'] 		= $this->model_bpprd_surat->tampil_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bpprd/datasurat', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi_balas_surat()
	{
		$id							= $this->session->userdata('id');
		$id_balas					= $this->input->post('id_balas');
		$balas_surat				= $this->input->post('balas_surat');

		$data = array(
			'id_balas'				=> $id_balas,
			// 'id'					=> $id,
			'balas_surat'			=> $balas_surat
		);

		$this->model_bpprd_surat->tambah_surat($data, 'balas_surat');
		redirect('bpprd/datasurat');
	}

	public function detail_surat($id_surat)
	{
		$data['title'] = 'Detail Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['detail'] = $this->model_bpprd_surat->detail_surat($id_surat);

		$data['komentar'] = $this->db->query("SELECT * FROM user_komentar ul, user us WHERE ul.id = us.id AND ul.id_surat = '$id_surat'")->result();

		// $data['komentar'] = $this->model_bpprd_surat->tampil_komentar()->result();

		// $data['komentar'] = $this->model_user_surat->detail_surat($id_surat);	

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('bpprd/detail_surat',$data);
		$this->load->view('templates/footer',$data);
	}

	public function balas_komentar($id_surat)
	{
		$id						= $this->session->userdata('id');
		$komentar				= $this->input->post('komentar');

		$data = array(
			'id'				=> $id,
			'id_surat'			=> $id_surat,
			'komentar'			=> $komentar
		);

		// var_dump($id_surat); die();

		$this->model_bpprd_surat->tambah_surat($data, 'user_komentar');
		redirect('bpprd/detail_surat/'.$id_surat);
	}

	// Hapus Komentar
	public function hapus($id)
	{
		$where  = array('id_komentar' => $id);
		$this->model_user_surat->hapus_data($where, 'user_komentar');
		redirect('bpprd/datasurat');
	}
	

}
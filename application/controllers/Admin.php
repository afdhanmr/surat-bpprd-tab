<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			is_logged_in();
		}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Menampilkan Semua dalam database
		$data['role']	= $this->db->get('user_role')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function roleAccess($role_id)
	{
		$data['title'] 	= 'Role Access';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role']	= $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu']	= $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/roleaccess', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Berubah</div>');
	}

	public function daftaruser()
	{
		$data['title'] = 'Daftar User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['daftaruser'] = $this->db->query("SELECT * FROM user")->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftar-user', $data);
		$this->load->view('templates/footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('password1','Password', 'required|trim|min_length[2]|matches[password2]', ['required' => 'Password wajib diisi!','matches' => 'Password tidak cocok', 'min_length' => 'Password Terlalu Pendek']);
		$this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar User';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/daftar-user');		
			$this->load->view('templates/footer');
		} else {
			$email 	= $this->input->post('email', true);

			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', true)),
				'email'			=> htmlspecialchars($email),
				'image'			=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				// 'role_id'		=> 4,
				'role_id'		=> $this->input->post('role_id'),
				'is_active'		=> 1,
				'date_create'	=> time()
			];

			$this->db->insert('user',$data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Sudah Dibuat</div>');
			redirect('admin/daftaruser');
		}
	}

}
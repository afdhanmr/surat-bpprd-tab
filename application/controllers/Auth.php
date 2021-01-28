<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// public function goToDefaultPage() {
	//   if ($this->session->userdata('role_id') == 1) {
	//     redirect('admin');
	//   } else if ($this->session->userdata('role_id') == 2) {
	//     redirect('user');
	//   }
	// }

	// LOGIN
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');		
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		// Jika user ada
		if ($user) {
			//User aktif
			if ($user['is_active'] == 1) {

			//Cek Password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id'		=> $user['id'],
						'email'		=> $user['email'],
						'role_id'	=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('admin');
					} else if($user['role_id'] == 2){
						redirect('user');
					} else {
					redirect('bpprd');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect('auth');
				}

			} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Aktif</div>');
			redirect('auth');
			}

		// Email belum terdaftar
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('password1','Password', 'required|trim|min_length[2]|matches[password2]', ['required' => 'Password wajib diisi!','matches' => 'Password tidak cocok', 'min_length' => 'Password Terlalu Pendek']);
		$this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'WPU User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');		
			$this->load->view('templates/auth_footer');
		} else {
			$email 	= $this->input->post('email', true);

			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', true)),
				'email'			=> htmlspecialchars($email),
				'image'			=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'		=> 2,
				'is_active'		=> 0,
				'date_create'	=> time()
			];

			// TOKEN
			$token 		=	base64_encode(random_bytes(32));
			// $token = base64_encode(openssl_random_pseudo_bytes(32));
			// $token = bin2hex(openssl_random_pseudo_bytes(32));
			// var_dump($token); die;
			$user_token	=	[
				'email'				=>	$email,
				'token'				=>	$token,
				'date_create'		=>	time()
			];

			 //Tambahan
			// $this->goToDefaultPage();
			$this->db->insert('user',$data);
			$this->db->insert('user_token',$user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Kamu Sudah Dibuat, Silahkan Aktivasi Email</div>');
			redirect('auth');
		}
	}

	// BUAT KIRIM EMAIL
	private function _sendEmail($token,$type)
	{
		$config = [
			'protocol'		=> 'smtp',
			'smtp_host'		=> 'ssl://smtp.googlemail.com',
			'smtp_user'		=> 'heterogen128@gmail.com',
			'smtp_pass'		=> '@A123456789a',
			'smtp_port'		=> 465,
			'mailtype'		=> 'html',
			'charset'		=> 'utf-8',
			'newline'		=> "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('heterogen128@gmail.com', 'Afdhan Muhammad Risyaf');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Active</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
		
		if($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email 	=	$this->input->get('email');
		$token 	=	$this->input->get('token');

		$user 	=	$this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token		=	$this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_create'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => 'email']);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' has been activited! Please Login</div>');
							redirect('auth');

				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Expired</div>');
						redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Token Invalid! Wrong</div>');
					redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account Activation failed! Wrong</div>');
				redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Sudah Logout</div>');
			redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');	
	}

	public function forgotPassword()
	{

		$this->form_validation->set_rules('email','email','required|trim|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');		
			$this->load->view('templates/auth_footer');
		} else {
			$email 	=	$this->input->post('email');
			$user 	= 	$this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token 			=	base64_encode(random_bytes(32));
				$user_token		=	[
				'email'				=>	$email,
				'token'				=>	$token,
				'date_create'		=>	time()
			];

			$this->db->insert('user_token',$user_token);
			$this->_sendEmail($token, 'forgot');

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon Lihat Email Untuk Reset Password</div>');
				redirect('auth/forgotpassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar Atau Aktivasi</div>');
					redirect('auth/forgotpassword');
			}

		}		
	}

	public function resetPassword()
	{
		$email 	=	$this->input->get('email');
		$token 	=	$this->input->get('token');

		$user 	=	$this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token 	=	$this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) { 
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Token Salah</div>');
					redirect('auth');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email Salah</div>');
				redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		
		$this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2','password','required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');		
			$this->load->view('templates/auth_footer');
		} else {
			$password 	= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email 		= $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Sudah Berubah, Silahkan Login</div>');
				redirect('auth');
		}
	}

}
	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index(){
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() ==  false) {
			$data['title'] = 'Login';
			$this->load->view('temp/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('temp/auth_footer');
		}else{
			$this->login_();
		}
	}

	private function login_(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('usr',['email' => $email ])->row_array();
		
		if ($user != NULL) {
			if ($user['ia'] ==  1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'], 
						'roles' => $user['roles']
					];
					$this->session->set_userdata($data);
					if ($user['roles'] == 1) {
						redirect('adm_home	');
					}else{
						redirect('home');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> password salah ! </div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> Email tidak tersedia ! </div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> Gagal Login ! </div>');
			redirect('auth');
		}
	}
	
	public function register(){
			$this->form_validation->set_rules('name','Name','required|trim');
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[usr.email]');
			$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|matches[repassword]',["matches" => "Password Not Match!","min_length" => "Password too short!"]);
			$this->form_validation->set_rules('repassword','RePassword','required|trim|matches[password]');

			if ($this->form_validation->run() == false) {
				$data['title'] = 'registration';
				$this->load->view('temp/auth_header',$data);
				$this->load->view('auth/register');
				$this->load->view('temp/auth_footer');
			}else{
				$data = [
					'name' => htmlspecialchars($this->input->post('name','true')),
					'email' => htmlspecialchars($this->input->post('email','true')),
					'image'=> 'default.png',
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'roles' => 2,
					'ia' => 1,
					'date_create' => time()
				];

				$this->db->insert('usr',$data);
				$this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert"> Akun Berhasil Dibuat ! </div>');
				redirect('auth');
			}
			
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('roles');
		$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> Berhasil Logout ! </div>');
		redirect('auth');

	}

		public function forgot(){
			$this->form_validation->set_rules('email','Email','required|trim|valid_email');
			$email = $this->input->post('email');
			$user = $this->db->get_where('usr',['email' => $email ])->row_array();

			if ($this->form_validation->run() == false) {
				$data['title'] = 'Forgot Password';
				$this->load->view('temp/auth_header',$data);
				$this->load->view('auth/forgot');
				$this->load->view('temp/auth_footer');
			} else {
				if ($user == NULL) {
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> Email tidak tersedia ! </div>');
					redirect('auth/forgot');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert"> Reset Succes ! </div>');
					redirect('auth');
				}
			}
		}
}

?>
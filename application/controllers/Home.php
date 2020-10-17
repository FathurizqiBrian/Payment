<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct() {

        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();

		$this->load->library('genpassword');
		$this->load->helper(array('form', 'url'));

		$this->load->model('UserModel');

		$this->ci =& get_instance();
	}


	public function index()
	{
		$this->load->view('home');
	}

    public function auth(){
		if(isset($_POST["submit"])) {

			$email = $this->input->post('username');
			$pass = $this->input->post('password');

			$user = $this->UserModel->getUserByEmail($email);

			$checkPassword = $this->genpassword->checkPassword($pass, $user->pwd);



			if($checkPassword){
				
				if ($user->status == 1 ) {

					$data_session  = array(
						'nama'  => $user->nama,
						'username'  => $user->username,
						'id' => $user->id,
						'role' => $user->role,
						'status'=> 'logged'
					);

					$this->session->set_userdata($data_session);
					
					redirect('dashboard','refresh');
				}else{
					$this->session->set_flashdata('message', '<div class="text-danger mb-3">Maaf akun anda tidak aktif. Hubungi Admin</div>');
					redirect(base_url());
					
				}

			}else{
			
				$this->session->set_flashdata('message', '<div class="text-danger mb-3">Maaf alamat email atau password tidak cocok.</div>');
				redirect(base_url());
			}
		}else{
			
			redirect(base_url());
		}
	}
	
}

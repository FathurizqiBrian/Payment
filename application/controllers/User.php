<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {

        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('access');
        $this->load->library('GenToken');
		$this->load->library('genpassword');

		$this->load->model('SalesModel');
		$this->load->model('UserModel');

		$this->ci =& get_instance();
        if ( ! $this->session->userdata('status') == "logged"){ 
            redirect(base_url());
        }
	}


	public function index() {
		$data['login'] = $this->session->userdata;
        $data['users'] = $this->UserModel->AllUser();
		$this->load->view('user',$data);
	}
    
    public function new() {
		$data['login'] = $this->session->userdata;
		$this->load->view('user_create',$data);
	}
	
    public function account() {
		$data['login'] = $this->session->userdata;
		$this->load->view('user_update',$data);
    }

    public function create() {

		if(isset($_POST["submit"])) {

			$data['nama'] = $this->input->post('nama');
			$data['role'] = $this->input->post('role');
			$data['username'] = $this->input->post('email');
			$data['status'] = 1;

			$pwduser = $this->input->post('pwd');
			$pwduser2 = $this->input->post('pwd2');

			$data['pwd'] = $this->genpassword->generatePassword($pwduser);

			if ($pwduser == $pwduser2) {

				$this->UserModel->addnew($data);
				
				redirect('user');

			} else {
				$this->session->set_flashdata('message', 'Password Tidak Cocok' );
			}

		}
    }
    
	public function view($id) {
		
		$data['login'] = $this->session->userdata;
		$data['user'] = $this->UserModel->viewUser($id);
		$data['sales'] = $this->UserModel->Sales($id);

		//print_r($data);
		$this->load->view('user_view',$data);
	}
	
	public function edit($id){

		if(isset($_POST["submit"])) {


			$data['nama']  = $this->input->post('nama');
			$data['role'] = $this->input->post('role');
			$data['username'] = $this->input->post('email');
			$data['status'] = $this->input->post('status');

            $pwduser = $this->input->post('pwd');
			$pwduser2 = $this->input->post('pwd2');

			$data['pwd'] = $this->genpassword->generatePassword($pwduser);

			$where = array(
				'id' => $id
            );
            
			if ($pwduser == $pwduser2) {

				$this->UserModel->update($where,$data,'user');
				
				redirect('user');

			} else {
				$this->session->set_flashdata('message', 'Update : '.$data['nama'].' Gagal. Password Tidak Cocok ' );
				redirect('user');
            }
            

		}
	}
	
	public function delete($id){

        $data['status'] = 0;
        
        $where = array(
            'id' => $id
        );

        $hapus = $this->UserModel->update($where,$data,'user');

        if ($hapus) {

            $this->session->set_flashdata('message', 'Akses telah dihapus' );
            
            redirect('user');

        } else {
            $this->session->set_flashdata('message', 'Update Gagal. ' );
            redirect('user');
        }
        
	}

	// Logged User

    public function logout(){
        
        $this->session->sess_destroy();
        
        redirect('/');
    }
    
}
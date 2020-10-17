<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {

        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('access');

		$this->load->model('SalesModel');
		$this->load->model('CustomerModel');

		$this->ci =& get_instance();
        if ( ! $this->session->userdata('status') == "logged"){ 
            redirect(base_url());
        }
		
	}


	public function index() {

		$data['customer'] = $this->CustomerModel->AllCustomer();
		$data['login'] = $this->session->userdata;
		$this->load->view('customer',$data);
	}
    
    public function search() {
        $keyword = $this->input->post('uid');

        $response = $this->CustomerModel->SearchCustomer($keyword);
		
		echo json_encode($response);
    }

	public function view($id) {
		
		$data['customer'] = $this->CustomerModel->viewCustomer($id);
		$data['jumlah'] = $this->CustomerModel->JumlahSales($id);
		
		$data['sales'] = $this->CustomerModel->Sales($id);
		$data['login'] = $this->session->userdata;

		//print_r($data);
		$this->load->view('customer_view',$data);
	}
	
	public function update_customer($id){

		if(isset($_POST["submit"])) {


			$data['namapemesan']  = $this->input->post('namapemesan');
			$data['telppemesan'] = $this->input->post('telppemesan');
			$data['emailpemesan'] = $this->input->post('emailpemesan');

			$where = array(
				'id' => $id
			);

			$this->CustomerModel->update($where,$data,'customer');

			redirect('customer/view/'.$id);


		}
	}


    
}
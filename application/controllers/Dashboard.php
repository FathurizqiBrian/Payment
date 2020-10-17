<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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


	public function index(){

		$data['login'] = $this->session->userdata;
		$data['transaksi'] = $this->CustomerModel->TotalTransaksi();
		$data['customer'] = $this->CustomerModel->TotalCustomer();
		$data['unpaid'] = $this->CustomerModel->unpaid();
		$data['paid'] = $this->CustomerModel->paid();
		
		if($data['login']['role'] == 'sales') {
			$data['sales'] = $this->SalesModel->SalesByUser($data['login']['id']);
			
		}else{
			$data['sales'] = $this->SalesModel->AllSales();
		}
		
		$data['customers'] = $this->CustomerModel->AllCustomer();



		$this->load->view('dashboard',$data);
		//print_r($data);
	}
}

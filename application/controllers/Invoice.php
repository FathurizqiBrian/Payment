<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct() {

        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('access');

		$this->load->model('SalesModel');
		$this->load->model('CustomerModel');

		$this->ci =& get_instance();
		
	}

	// Ini adalah Controller khusus User

	public function index() {
		redirect('dashboard');
	}

	public function inv($invoice) {
		
		$data['sales'] = $this->SalesModel->viewInvoice($invoice);

		if ($data['sales']->payment == 'credit-card') {
			redirect($data['sales']->invoice_url.'#credit-card');

		}else{
			redirect($data['sales']->invoice_url);
		}

	}

	public function success($invoice) {
		
		$data['sales'] = $this->SalesModel->viewInvoice($invoice);
		
		$xendit = $this->access->token();
		$data['xendit'] = $xendit->getInvoice($data['sales']->xendit_id);


		if ($data['xendit']['status'] == 'SETTLED') {

			$inv['status'] = $data['xendit']['status'];
			$inv['payment'] = $data['xendit']['bank_code'];
			
			$where = array(
				'xendit_id' => $data['sales']->xendit_id
			);

			$this->SalesModel->save($where,$inv,'sales');
	
			$this->load->view('payment_success',$data);

		} else if ($data['xendit']['status'] == 'PAID') {

			$inv['status'] = $data['xendit']['status'];
			$inv['payment'] = strtoupper(str_replace("_"," ",$data['xendit']['payment_method']));
			
			$where = array(
				'xendit_id' => $data['sales']->xendit_id
			);

			$this->SalesModel->save($where,$inv,'sales');
	
			$this->load->view('payment_success',$data);

		}  else {
			redirect('invoice/'.strtolower($invoice));
		}
	}

	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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

		$data['login'] = $this->session->userdata;

		if($data['login']['role'] == 'sales') {
			$data['sales'] = $this->SalesModel->SalesByUser($data['login']['id']);
			
		}else{
			$data['sales'] = $this->SalesModel->AllSales();
		}
		
		$this->load->view('sales',$data); 

		//print_r($data);
	}

	public function transaksi($condition) {
		$data['sales'] = $this->SalesModel->Transaksi($condition);
		$data['login'] = $this->session->userdata;
		$this->load->view('sales',$data);
	}
	
	public function new() {

		$data['login'] = $this->session->userdata;

		$xendit = $this->access->token();
		$data['vas'] = $xendit->getVirtualAccountBanks();
		$data['customers'] = $this->CustomerModel->AllCustomer($data);
		$this->load->view('sales_create',$data);
	}

	public function create() {

		// Create xendit invoive
		// Save to DB
		// Redirect to success/kodeinv

		if(isset($_POST["submit"])) {

			$login = $this->session->userdata;
			$xendit = $this->access->token();
			
			$last_invoice  = $this->SalesModel->last()->invoice;

			if ($last_invoice == NULL) { 
				$last_id = 1;
			} else {
				$last_id = $this->SalesModel->last()->id + 1;
			}

			$maks = str_replace("MF-","",$last_invoice) + 1;

			$id_customer = $this->input->post('uid');

			if (!empty($id_customer)) {

				$data['customer'] = $id_customer;

				$data_customer = $this->CustomerModel->viewCustomer($data['customer'] );
				$customer['namapemesan'] = $data_customer->namapemesan;
				$customer['emailpemesan'] = $data_customer->emailpemesan;

				/* $customer = ['telppemesan' => $data['telppemesan'], 'emailpemesan' => $data['emailpemesan'] ]; 
				if ($cek == false) {

					$id_customer = $this->CustomerModel->addnew($data);
					$data['customer'] = $id_customer;
				} */

			}else{

				$customer['namapemesan']  = $this->input->post('namapemesan');
				$customer['telppemesan'] = $this->input->post('telppemesan');
				$customer['emailpemesan'] = $this->input->post('emailpemesan');

				$id_customer = $this->CustomerModel->addnew($customer);
				
				$data['customer'] = $id_customer;
			}
 
			$data['invoice'] = "MF-" . sprintf("%04s", $maks);
			$data['namapengirim'] = $this->input->post('namapengirim');
			$data['produk'] = $this->input->post('produk');
			$data['harga'] = str_replace('.','',$this->input->post('harga'));
			$data['payment'] = $this->input->post('payment');
			$data['status'] = 'PENDING';
			$data['user'] = $login['id'];
			
			$data['notes'] = $this->input->post('catatan');
			
			$description = 'Pemesanan '.$data['produk'].'. Keterangan : '.$data['notes'].'. A.N : '.$customer['namapemesan']. 'Pengirim : '.$customer['namapengirim'] ;


			// Insert to xendit : 

			$external_id = $data['invoice'];
			$success_redirect_url = base_url().'invoice/success/'.$external_id;

			$fixed_va = TRUE;
			$should_send_email= TRUE;

 
			$response = $xendit->createInvoice(
								$external_id,
								$data['harga'],
								$customer['emailpemesan'],
								$description,
								$success_redirect_url,
								$should_send_email,
								$fixed_va);

			$data['xendit_id'] = $response['id'];
			$data['invoice_url'] = $response['invoice_url'];
			$data['status'] = $response['status'];
			
			$save = $this->SalesModel->addnew($data);

			if ($save == TRUE) {
				redirect('sales/success/'.$save);
			}else{
				$this->session->set_flashdata('message', '<p class="text-danger">Mohon lengkapi data Anda</p>' );
			}
			
		}
		
	}

	public function success($invoice) {

		$data['login'] = $this->session->userdata;
		$data['sales'] = $this->SalesModel->viewSales($invoice);
		//print_r($data);
		$this->load->view('sales_success',$data);
	}

	public function view($invoice) {
		

		$data['login'] = $this->session->userdata;
		$data['sales'] = $this->SalesModel->viewSales($invoice);
		
		$xendit = $this->access->token();
		$data['xendit'] = $xendit->getInvoice($data['sales']->xendit_id);

		//print_r($data);
		$this->load->view('sales_view',$data);
	}

	
	public function void($xendit_id){


		$xendit = $this->access->token();
		$response = $xendit->closeInvoice($xendit_id);
		
		$data['status'] = $response['status'];

        $where = array(
            'xendit_id' => $id
        );

        $hapus = $this->SalesModel->save($where,$data,'sales');

        if ($hapus) {

            $this->session->set_flashdata('message', 'Invoice telah ditutup' );
            
            redirect('sales');

        } else {
            $this->session->set_flashdata('message', 'Update Gagal. ' );
            redirect('sales');
        }
        
	}

	public function va() {

		$external_id = 'demo_1475459775872';
		$bank_code = 'BNI';
		$name = 'Rika Sutanto';

		
		print_r($response);
	}
}

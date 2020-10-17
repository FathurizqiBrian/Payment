<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {

    private $_sales = "sales";
    private $_customer = "customer";


    public function addnew($data) {

        $this->db->insert($this->_customer, $data);

        $insert_id  = $this->db->insert_id();

        return $insert_id;
    }

    public function cekCustomer($customer) {

        $this->db->or_where($customer);
        $query = $this->db->get($this->_customer);
 
        if ($query->num_rows() > 0){
            
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function viewCustomer($id) {

        $this->db->where('id',$id);
        $query = $this->db->get($this->_customer);
 
        if ($query->num_rows() > 0){
            
            return $query->row();
        }
        else{
            return false;
        }
    }
    
    public function AllCustomer() {

        $query = $this->db->get($this->_customer);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }

    public function Sales($id) {

        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*,
                           user.id as uid, 
                           user.nama, 
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');
        $this->db->join('user', 'sales.user = user.id');
        
        $this->db->where('sales.customer', $id);
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }

    public function JumlahSales($id) {


        $this->db->select('sales.harga, 
                           sales.customer, 
                           sales.id,
                           SUM(sales.harga) as total_transaksi
                           ');
        $this->db->where('sales.customer', $id);
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

    function SearchCustomer($keyword=""){

        // Fetch users
        $this->db->select('*');

        $this->db->where("namapemesan like '%".$keyword."%' ");

        $query = $this->db->get('customer');
        $customers = $query->result_array();
   
        // Initialize Array with fetched data
        $data = array();

        foreach($customers as $user){

           $data[] = array("id"=>$user['id'], "text"=>$user['namapemesan'], "telp"=>$user['telppemesan']);

        }
        return $data;

     }

     public function update($where,$data,$table){		
         $this->db->where($where);
         $this->db->update($table,$data);
     }

     // Dashboard

     

    public function TotalTransaksi() {

        $this->db->select('sales.harga, 
                           sales.customer, 
                           sales.id,
                           COUNT(sales.harga) as jumlah
                           ');
                           
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

    public function TotalCustomer() {

        $this->db->select('COUNT(customer.id) as jumlah');
                           
        $query = $this->db->get($this->_customer);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

    public function unpaid() {

        $this->db->select('COUNT(status) as jumlah');
                           
        $this->db->where("status !=",'PAID');
        $this->db->where("status !=",'SETTLED');
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

    public function paid() {

        $this->db->select('COUNT(status) as jumlah');
                           
        $this->db->where("status",'PAID');
        $this->db->or_where("status",'SETTLED');
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

/* 
    // All Order
    public function AllOrder() {

        $query = $this->db->get($this->_order);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }
    
    public function View($id) {

        $this->db->where('id', $id);
        $query = $this->db->get($this->_order);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }
    
    public function viewPayment($id) {

        $order = $this->View($id);

        $invoice = $order->invoice;
        $this->db->where('invoice', $invoice);
        $query = $this->db->get($this->_payment);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }

    
    public function getPayment($invoice) {

        $this->db->where('invoice', $invoice);
        $query = $this->db->get($this->_payment);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }
    

    // Untuk Front End
    public function last(){
        
        $query = $this->db->select('id,invoice')->order_by('id', 'DESC')->limit(1)->get($this->_order)->row();

		if ($query){
            return $query;
		}
		else{
			return false;
        }
        
    }

    public function getMelindo() {
        
        $this->db->where('company', 'melindo');
        $query = $this->db->get($this->_catalog);
        
        if ($query->num_rows() > 0){
            return $query->result_array();
		}
		else{
			return false;
        }
    }
    
    public function addPayment($data) {

        $this->db->insert($this->_payment, $data);
        return TRUE;
    }

    public function cekPayment($data) {
        
        $this->db->where('invoice', $data);
        $query = $this->db->get($this->_payment);
 
        if ($query->num_rows() > 0){
            
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function savePayment($where,$data,$table){		
        $this->db->where($where);
		$this->db->update($table,$data);
    }
    
    public function UpdateOrder($where,$data,$table){		
        $this->db->where($where);
		$this->db->update($table,$data);
    } 

    public function viewOrder($id) {
        
        $this->db->where('pesanan.invoice', $id);
        $query = $this->db->get($this->_order);
 
        if ($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return false;
        }
    } */
    
}

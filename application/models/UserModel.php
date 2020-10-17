<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $_sales = "sales";
    private $_user = "user";


    public function addnew($data) {

        $this->db->insert($this->_user, $data);

        $insert_id  = $this->db->insert_id();

        return $insert_id;
    }

    public function cekUser($user) {

        $this->db->or_where($user);
        $query = $this->db->get($this->_user);
 
        if ($query->num_rows() > 0){
            
            return $query->row();
        }
        else{
            return false;
        }
    }

    public function viewUser($id) {

        $this->db->where('id',$id);
        $query = $this->db->get($this->_user);
 
        if ($query->num_rows() > 0){
            
            return $query->row();
        }
        else{
            return false;
        }
    }
    
    public function AllUser() {
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('role', 'DESC');
        $query = $this->db->get($this->_user);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }

    public function User($id) {

        $this->db->select('sales.*, 
                           sales.id as sid, 
                           user.id as cid, 
                           user.*
                           ');

        $this->db->join('user', 'sales.user = user.id');
        $this->db->where('sales.user', $id);
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }


    public function update($where,$data,$table){		
        $this->db->where($where);
        $this->db->update($table,$data);
        return TRUE;
    } 
    
    public function getUserByEmail($email){

        $this->db->where('username', $email);
        
        $query = $this->db->get($this->_user);
        return $query->row();

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

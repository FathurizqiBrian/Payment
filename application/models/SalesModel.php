<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesModel extends CI_Model {

    private $_sales = "sales";

    public function AllSales() {


        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');
        $this->db->order_by('sales.create_date', 'DESC');

        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }

    public function SalesByUser($id) {


        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*,
                           user.id as uid, 
                           user.nama, 
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');
        $this->db->join('user', 'sales.user = user.id');
        
        $this->db->order_by('sales.create_date', 'DESC');
        $this->db->where('sales.user', $id);

        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }
    

    public function Transaksi($condition) {

        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');
        
        if ($condition == 'paid'){
            $this->db->where('sales.status', 'PAID');
            $this->db->or_where('sales.status', 'SETTLED');
        }else{

            $this->db->where('sales.status', 'PENDING');
        }

        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->result();
		}
		else{
			return false;
        }
    }
    
    public function last(){
        
        $query = $this->db->select('id,invoice')->order_by('id', 'DESC')->limit(1)->get($this->_sales)->row();

		if ($query){
            return $query;
		}
		else{
			return false;
        }
        
    }
    public function addnew($data) {

        $this->db->insert($this->_sales, $data);

        $insert_id  = $this->db->insert_id();

        return $insert_id;
    }

    public function viewSales($id) {

        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*,
                           user.id as uid, 
                           user.nama, 
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');
        $this->db->join('user', 'sales.user = user.id');

        $this->db->where('sales.id', $id);
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }


    public function viewInvoice($id) {

        $this->db->select('sales.*, 
                           sales.id as sid, 
                           customer.id as cid, 
                           customer.*
                           ');

        $this->db->join('customer', 'sales.customer = customer.id');

        $this->db->where('sales.invoice', $id);
        $query = $this->db->get($this->_sales);
        
        if ($query->num_rows() > 0){
            return $query->row();
		}
		else{
			return false;
        }
    }
    
}

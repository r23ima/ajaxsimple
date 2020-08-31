<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function getEmployee(){
		$limit = $this->input->get('limit');
		
		$this->db->order_by('emp_datecreated', 'desc');
		$this->db->limit($limit);
		$query = $this->db->get('tbl_employee');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function getEmpByID(){
		$id = $this->input->get('id');
		$this->db->where('emp_id', $id);
		$query = $this->db->get('tbl_employee');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function addEmployee(){
		$field = array(
			'emp_name' 			=>$this->input->post('emp_name'),
			'emp_number' 		=>$this->input->post('emp_mobile'),
			'emp_email' 		=>$this->input->post('emp_email'),
			'emp_address' 		=>$this->input->post('emp_addr'),
			'emp_datecreated'	=>date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_employee', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function updateEmployee(){
		$id = $this->input->post('emp_id');
		$field = array(
			'emp_name'  		=>$this->input->post('emp_name'),
			'emp_number'		=>$this->input->post('emp_mobile'),
			'emp_email'			=>$this->input->post('emp_email'),
			'emp_address'		=>$this->input->post('emp_addr')
		);
		$this->db->where('emp_id', $id);
		$this->db->update('tbl_employee', $field);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function deleteEmployee(){
		$id = $this->input->get('id');
		$this->db->where('emp_id', $id);
		$this->db->delete('tbl_employee');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function getAllRows(){
		$query = $this->db->query('SELECT emp_id FROM tbl_employee');
		return $query->num_rows();
	}
}

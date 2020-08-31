<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Employee_model', 'em');
	}

	function index(){
	/*	$this->load->library('pagination');
		$config['base_url'] = base_url().'ajaxcode/index';
		$config*/

		$this->load->view('employee/header');
		$this->load->view('employee/index');
		$this->load->view('employee/footer');
	}

	public function showAllEmployee(){
		$result = $this->em->getEmployee();
		echo json_encode($result);
	}

	public function getAllRows(){
		$result = $this->em->getAllRows();
		echo json_encode($result);
	}

	public function add(){
		$result = $this->em->addEmployee();
		
		if($result){
			$msg['msg'] = "Employee Added Successfully";
			$msg['type'] = "200";
		}
		else{
			$msg['msg'] = "failed to add employee";
			$msg['type'] = "500";
		}
		echo json_encode($msg);
	}

	public function edit(){
		$result = $this->em->updateEmployee();
		
		if($result){
			$msg['msg'] = "Employee Updated Successfully";
			$msg['type'] = "200";
		}
		else{
			$msg['msg'] = "failed to update employee";
			$msg['type'] = "500";
		}
		echo json_encode($msg);
	}

	public function delete(){
		$result =$this->em->deleteEmployee();
		if($result){
			$msg['msg'] = "Employee Removed Successfully";
			$msg['type'] = "200";
		}
		else{
			$msg['msg'] = "failed to removed employee";
			$msg['type'] = "500";
		}
		echo json_encode($msg);
	}

	public function viewEmployee(){
		$result = $this->em->getEmpByID();
		echo json_encode($result);
	}
}

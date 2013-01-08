<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	
	}
	
	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');	
	}
	

	public function index()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'home';	
		$this->load->view('includes/template' , $data);	
	}
	
	public function searchform()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'searchform';	
		$this->load->view('includes/template' , $data);	
	}
	
	public function help()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'help';	
		$this->load->view('includes/template' , $data);	
	}
	
	public function findemp($sort_by = "emp_no" , $sort_order = "asc", $offset = 0)
	{	
		$limit = 20;
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		
	
		
		$firstname = $this->input->get("firstname");
		$lastname = $this->input->get("lastname");
		$dept = $this->input->get("dept");
		$jobtitle = $this->input->get("jobtitle");
		
		
		if( (($firstname == "" || $firstname == null)) && 
			(($lastname == "" || $lastname == null)) &&
			(($dept == "" || $dept == null)) &&
			(($jobtitle == "" || $jobtitle == null)))
		{
			$data['is_logged_in'] = $is_logged_in;
			$data['nosearch'] = "none";
			$data['main_content'] = 'searchform';	
			$this->load->view('includes/template' ,$data);
			
			
		}
		else
		{
			
		$this->load->model('find_model');

		$results = $this->find_model->queries($is_logged_in, $firstname, $lastname, $dept, $jobtitle, $limit, $offset,$sort_by, $sort_order);
		if($is_logged_in == "1" || $is_logged_in == "is_logged_in")
		{
		$jsonresults = $this->find_model->searchHRQ($firstname, $lastname, $dept, $jobtitle);
		}
		else
		{
		$jsonresults = $this->find_model->searchQ($firstname, $lastname, $dept, $jobtitle);
		}
		$data['fields'] = $results['fields'];
		$data['employees'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];
		$data['username'] = $username;
		$data['is_logged_in'] = $is_logged_in;
		
		$data['sort_order'] = $sort_order;
		$data['sort_by'] = $sort_by;
		
		$data['main_content'] = 'search';
		
		$data2['count'] = count($jsonresults['rows']);
		$data2['results'] = $jsonresults['rows'];
	

	
		echo json_encode($data2);
		//$this->load->view('includes/template' ,$data);
		}	
		
	}
	
	public function add()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'add';	
		$this->load->view('includes/template' , $data);	
	}
	
	public function addemp()
	{
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		
		$dateofbirth = $this->input->get("dateofbirth");
		$firstname = $this->input->get("firstname");
		$lastname = $this->input->get("lastname");
		$gender = $this->input->get("gender");
		$hiredate = $this->input->get("hiredate");
		$salary = $this->input->get("salary");
		$department = $this->input->get("department");
		$title = $this->input->get("title");
		$deptmgr = $this->input->get('deptmgr');
		
		$this->load->model('find_model');
		$q = $this->find_model->addEmployee($dateofbirth, $firstname, $lastname, $gender, $hiredate, $salary, $department, $deptmgr, $title);
		
		if($q)
		{
		$data['main_content'] = 'add';	
		$data['empadd'] = "yes";
		$this->load->view('includes/template', $data);
		}
	}
	
	public function delete()
	{
		$emp_no = $this->input->get('emp_no');
		
		
		$this->load->model('find_model');
		$results = $this->find_model->retrieve($emp_no);	
		$data['fields'] = $results['fields'];
		$data['employees'] = $results['rows'];
		
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'delete';	
		$this->load->view('includes/template' , $data);	
	}
	
	public function deleteemp()
	{
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		
		$emp_no = $this->input->get("emp_no");

		$this->load->model('find_model');
		$this->find_model->deleteFromDeptempTable($emp_no);
		
		$res = $this->find_model->isDeptMgr($emp_no);
		if($res == '1')
		{	
			$this->find_model->deleteFromDeptmgrTable($emp_no);	
		}
		
		$this->find_model->deleteFromSalariesTable($emp_no);
		$this->find_model->deleteFromTitlesTable($emp_no);
		
		$data['res'] = $res;
		$data['main_content'] = 'searchform';	
		$data['empdel'] = "yes";
		$this->load->view('includes/template', $data);
		
	}
	
	public function edit()
	{
		$emp_no = $this->input->get("emp_no");
		
		if($emp_no == "" || $emp_no == null)
		{
			$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
			$data['main_content'] = 'edit2';	
			$this->load->view('includes/template' , $data);	
		}
		else
		{		
		$this->load->model('find_model');
		$results = $this->find_model->retrieve($emp_no);	
		$data['found'] = $results['num_rows'];
		if($data['found'] == 0)
		{
			$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
			$data['main_content'] = 'edit2';	
			$this->load->view('includes/template' , $data);	
		
		}
		else
		{
		$data['emp_no'] = $emp_no;
		$data['fields'] = $results['fields'];
		$data['employees'] = $results['rows'];
		
		$result2 = $this->find_model->isDeptMgr($emp_no);
		$data['dept_mgr'] = $result2['dept_mgr'];	
		
		$result3 = $this->find_model->currentSalary($emp_no);
		$data['salField'] = $result3['salField'];
		$data['sal'] = $result3['sal'];
		
		$result4 = $this->find_model->currentTitle($emp_no);
		$data['titleField'] = $result4['titleField'];
		$data['title'] = $result4['title'];
		
		$result5 = $this->find_model->currentDept($emp_no);
		$data['deptField'] = $result5['deptField'];
		$data['department'] = $result5['dept'];
		
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'edit';	
		$this->load->view('includes/template' , $data);	
		}
		}
	}
	
	public function updateemp()
	{
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$emp_no = $this->input->get("emp_no");
		$dateofbirth = $this->input->get("dateofbirth");
		$firstname = $this->input->get("firstname");
		$lastname = $this->input->get("lastname");
		$gender = $this->input->get("gender");
		$hiredate = $this->input->get("hiredate");
		$salary = $this->input->get("salary");
		$oldSalary = $this->input->get("oldSalary");	
		$dept = $this->input->get("dept");
		$oldDept = $this->input->get("oldDept");
		$title = $this->input->get("jobtitle");
		$oldTitle = $this->input->get("oldTitle");
		$deptmgr = $this->input->get('deptmgr');
		$oldDeptmgr = $this->input->get('oldDeptmgr');
		
		
		$this->load->model('find_model');
		$q = $this->find_model->updateEmployee($emp_no, $dateofbirth, $firstname, $lastname, $gender, $hiredate, $deptmgr);
		
		if($oldSalary != $salary)
		{
			$this->load->model('find_model');
			$q = $this->find_model->updateSalary($emp_no, $salary);
		}
		
		if($oldTitle != $title)
		{
			$this->load->model('find_model');
			$q = $this->find_model->updateTitle($emp_no, $title);
		}
		
		if($oldDept != $dept)
		{
			$this->load->model('find_model');
			$q = $this->find_model->updateDept($emp_no, $dept);
		}
		
		if($oldDeptmgr != $deptmgr)
		{
			if(($oldDeptmgr == "" || $oldDeptmgr == null || $oldDeptmgr == "0") && ($deptmgr == "1" || $deptmgr == "deptmgr"))
			{
				$this->load->model('find_model');
				$q = $this->find_model->promote($emp_no, $dept);
			}
			else if(($deptmgr == "" || $deptmgr == null || $deptmgr == "") && $oldDeptmgr == "1")
			{
				$this->load->model('find_model');
				$q = $this->find_model->demote($emp_no, $dept);
			}
		}
		
		$data['empupdate'] = "yes";
		$results = $this->find_model->retrieve($emp_no);
		$data['emp_no'] = $emp_no;
		$data['fields'] = $results['fields'];
		$data['employees'] = $results['rows'];
		
		$result2 = $this->find_model->isDeptMgr($emp_no);
		$data['dept_mgr'] = $result2['dept_mgr'];	
		
		$result3 = $this->find_model->currentSalary($emp_no);
		$data['salField'] = $result3['salField'];
		$data['sal'] = $result3['sal'];
		
		$result4 = $this->find_model->currentTitle($emp_no);
		$data['titleField'] = $result4['titleField'];
		$data['title'] = $result4['title'];
		
		$result5 = $this->find_model->currentDept($emp_no);
		$data['deptField'] = $result5['deptField'];
		$data['department'] = $result5['dept'];
		
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'edit';	
		$this->load->view('includes/template' , $data);			
		
	}
	
	
}

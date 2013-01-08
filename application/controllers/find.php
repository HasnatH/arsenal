<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	
	}
	
	//to check if user is logged in
	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');	
	}
	
	//index function loads home page
	public function index()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'home';	
		$this->load->view('includes/template' , $data);	
	}
	
	//load search form
	public function searchform()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'searchform';	
		$this->load->view('includes/template' , $data);	
	}
	
	//load help page
	public function help()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'help';	
		$this->load->view('includes/template' , $data);	
	}
	
	//findemp function does search query
	public function findemp($sort_by = "emp_no" , $sort_order = "asc", $offset = 0)
	{	
		$limit = 20;
		
		//check cookie to see if logged in
		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		
	
		//get data from the search form 
		$firstname = $this->input->get("firstname");
		$lastname = $this->input->get("lastname");
		$dept = $this->input->get("dept");
		$jobtitle = $this->input->get("jobtitle");
		
		//check if there is at least one search parameter
		//if none take back to search form page
		//display msg that says to enter at least one search parameter
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
		//if there is a t least 1 parameter search 
		else
		{
			//use this model
		$this->load->model('find_model');

		//get search results
		$results = $this->find_model->queries($is_logged_in, $firstname, $lastname, $dept, $jobtitle, $limit, $offset,$sort_by, $sort_order);
		if($is_logged_in == "1" || $is_logged_in == "is_logged_in")
		{//different search results depending on user
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
	

		//echo in json format
		echo json_encode($data2);
		//$this->load->view('includes/template' ,$data);
		}	
		
	}
	
	//load add page
	public function add()
	{	
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'add';	
		$this->load->view('includes/template' , $data);	
	}
	
	//add employee with data given
	public function addemp()
	{
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		
		//get data from from
		$dateofbirth = $this->input->get("dateofbirth");
		$firstname = $this->input->get("firstname");
		$lastname = $this->input->get("lastname");
		$gender = $this->input->get("gender");
		$hiredate = $this->input->get("hiredate");
		$salary = $this->input->get("salary");
		$department = $this->input->get("department");
		$title = $this->input->get("title");
		$deptmgr = $this->input->get('deptmgr');
		
		//load model and add employee
		$this->load->model('find_model');
		$q = $this->find_model->addEmployee($dateofbirth, $firstname, $lastname, $gender, $hiredate, $salary, $department, $deptmgr, $title);
		
		if($q)
		{
		$data['main_content'] = 'add';	
		$data['empadd'] = "yes";
		$this->load->view('includes/template', $data);
		}
	}
	
	//load delete page
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
	
	//delete the employee from each of the tables
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
		
		//take user back to search page with message confirming deletion
		$data['res'] = $res;
		$data['main_content'] = 'searchform';	
		$data['empdel'] = "yes";
		$this->load->view('includes/template', $data);
		
	}
	
	//load edit page
	public function edit()
	{
		$emp_no = $this->input->get("emp_no");
		
		//if user choose edit page via the search result or from the nav bar
		//if no emp_no is sent the it is from navbar
		//take to another edit page where user enters a emp_no
		if($emp_no == "" || $emp_no == null)
		{
			$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
			$data['main_content'] = 'edit2';	
			$this->load->view('includes/template' , $data);	
		}
		else
		{	
		//retrieve the user data to display in already filled out form to edit user
		$this->load->model('find_model');
		$results = $this->find_model->retrieve($emp_no);	
		$data['found'] = $results['num_rows'];
		if($data['found'] == 0)
		{
		//if no results are found using the emp_no given, then user doesnt exist
		//emp_no given is wrong, asks user for a correct emp_no
			$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
			$data['main_content'] = 'edit2';	
			$this->load->view('includes/template' , $data);	
		
		}
		else
		{
		//update the user data in all the tables
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
		
		//load the edit page again showing the updated data
		$data['is_logged_in'] =  $this->session->userdata('is_logged_in');
		$data['main_content'] = 'edit';	
		$this->load->view('includes/template' , $data);	
		}
		}
	}
	
	//check for changes using old employee data and data changed by user
	//if there are any changes for any field, update the data
	//unchanged data is kept the same
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
		
		//once updated, load the edit page with the updated results in place and updated message
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

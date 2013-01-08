<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find_Model extends CI_Model
{

	//search results are dependent on the different combination of search options the user has asked for
	//search results only show employees who are currently working for the company
	//not any employees who used to work
	//where 'to_date' = '9999-01-01'
	
	public function searchQ($firstname,$lastname,$department,$jobtitle)
	{
	$q = $this->db->select('employees.emp_no AS emp_no, employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		
		$result['rows'] = $q->get()->result();
		$result['num_rows'] = count($result['rows']);
		return $result;
	}
	
	public function searchHRQ($firstname,$lastname,$department,$jobtitle)
	{
	$q = $this->db->select('employees.emp_no AS emp_no, employees.gender AS gender, employees.hire_date AS hire_date, employees.birth_date AS birth_date, employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		
		$result['rows'] = $q->get()->result();
		$result['num_rows'] = count($result['rows']);
		return $result;
	}
	
	public function queries($is_logged_in, $firstname, $lastname, $dept, $jobtitle, $limit, $offset, $sort_by, $sort_order)
	{
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('emp_no', 'birth_date', 'first_name', 'last_name','gender', 'hire_date');
		$sort_by = in_array($sort_by, $sort_columns) ? $sort_by : 'emp_no'; 
		
		//results
		
		
		//FirstName
		if ((($firstname != null) || ($firstname != "")) && (($lastname == null) || ($lastname == "")) && (($dept == null) || ($dept == "")) && (($jobtitle == null) || ($jobtitle == "")))
		{$db = $this->db->like('first_name', $firstname, 'both')
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');

			
			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name'
		);
			
		}
		
		}
		
		//LastName
		if ((($firstname == null) || ($firstname == "")) && (($lastname != null) || ($lastname != "")) && (($dept == null) || ($dept == "")) && (($jobtitle == null) || ($jobtitle == "")))
		{$db = $this->db->like('last_name', $lastname, 'both')
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');
			
			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name'
		);
			
		}
		
		}
		
		//Department
		if ((($firstname == null) || ($firstname == "")) && (($lastname == null) || ($lastname == "")) && (($dept != null) || ($dept != "")) && (($jobtitle == null) || ($jobtitle == "")))
		{$db = $this->db->where('d.dept_no', $dept)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');


			

			
		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department'
		);
			
		}
		
		}
		
		//Jobtitle
		if ((($firstname == null) || ($firstname == "")) && (($lastname == null) || ($lastname == "")) && (($dept == null) || ($dept == "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->where('t.title', $jobtitle)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');
		

			
		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'title' => 'Title'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'title' => 'Title'
		);
			
		}
		
		
		}
		
		//FirstName, LastName
		else if ((($firstname != null) || ($firstname != "")) && (($lastname != null) || ($lastname != "")) && (($dept == null) || ($dept == "")) && (($jobtitle == null) || ($jobtitle == "")))
		{
		$db = $this->db->like('first_name', $firstname, 'both')
			->like('last_name', $lastname, 'both')
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');

			
			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name'
		);
			
		                        }
		
		
		}
		
		//FirstName, LastName, Dept
		else if ((($firstname != null) || ($firstname != "")) && (($lastname != null) || ($lastname != "")) && (($dept != null) || ($dept != "")) && (($jobtitle == null) || ($jobtitle == "")))
		{
		$db = $this->db->like('first_name', $firstname, 'both')
			->like('last_name', $lastname, 'both')
			->where('d.dept_no', $dept)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');

	

			
			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department'
		);
			
		}
		
		}
		
		//FirstName, Dept
		else if ((($firstname != null) || ($firstname != "")) && (($lastname == null) || ($lastname == "")) && (($dept != null) || ($dept != "")) && (($jobtitle == null) || ($jobtitle == "")))
		{
		$db = $this->db->like('first_name', $firstname, 'both')
			->where('d.dept_no', $dept)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');

			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department'
		);
			
		}
		
		}
		
		//LastName, Dept
		else if ((($firstname == null) || ($firstname == "")) && (($lastname != null) || ($lastname != "")) && (($dept != null) || ($dept != "")) && (($jobtitle == null) || ($jobtitle == "")))
		{
		$db = $this->db->like('last_name', $lastname, 'both')
			->where('d.dept_no', $dept)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');

			
			$ret['rows'] = $db->get()->result();
			$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department'
		);
			
		}
		
		}
		
		
		//FirstName, JobTitle
		if ((($firstname != null) || ($firstname != "")) && (($lastname == null) || ($lastname == "")) && (($dept == null) || ($dept == "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('first_name', $firstname, 'both')
			->where('t.title', $jobtitle)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');

		

			
		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'title' => 'Title'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'title' => 'Title'
		);
			
		}
		
		}
		
		
		//LastName, JobTitle
		if ((($firstname == null) || ($firstname == "")) && (($lastname != null) || ($lastname != "")) && (($dept == null) || ($dept == "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('last_name', $lastname, 'both')
			->where('t.title', $jobtitle)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');


			
		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'title' => 'Title'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'title' => 'Title'
		);
			
		}
		
		}
		
		//Department, JobTitle
		if ((($firstname == null) || ($firstname == "")) && (($lastname == null) || ($lastname == "")) && (($dept != null) || ($dept != "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->where('d.dept_no', $dept)
			->where('t.title', $jobtitle)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');
		

		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department',
		'title' => 'Title'	
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department',
		'title' => 'Title'
		);
			
		}
		
		}
		
		
		//FirstName, LastName, JobTitle
		if ((($firstname != null) || ($firstname != "")) && (($lastname != null) || ($lastname != "")) && (($dept == null) || ($dept == "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('first_name', $firstname, 'both')
			->like('last_name', $lastname, 'both')		
			->where('t.title', $jobtitle)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no');
		

		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'title' => 'Title'
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'title' => 'Title'
		);
			
		}
		
		}
		
		//FirstName, Department, JobTitle
		if ((($firstname != null) || ($firstname != "")) && (($lastname == null) || ($lastname == "")) && (($dept != null) || ($dept != "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('first_name', $firstname)
			->where('d.dept_no', $dept)
			->where('t.title', $jobtitle)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');
		

		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department',
		'title' => 'Title'	
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department',
		'title' => 'Title'
		);
			
		}
		
		}
		
		
		//LastName, Department, JobTitle
		if ((($firstname == null) || ($firstname == "")) && (($lastname != null) || ($lastname != "")) && (($dept != null) || ($dept != "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('last_name', $lastname)
			->where('d.dept_no', $dept)
			->where('t.title', $jobtitle)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');
		

			
		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department',
		'title' => 'Title'	
		);
		}
		else {
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department',
		'title' => 'Title'
		);
			
		}
		
		}
		
		//FirstName, LastName, Department, JobTitle
		if ((($firstname != null) || ($firstname != "")) && (($lastname != null) || ($lastname != "")) && (($dept != null) || ($dept != "")) && (($jobtitle != null) || ($jobtitle != "")))
		{$db = $this->db->like('first_name', $firstname)
			->like('last_name', $lastname)
			->where('d.dept_no', $dept)
			->where('t.title', $jobtitle)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles AS t', 't.emp_no = e.emp_no')
			->join('dept_emp AS d', 'd.emp_no = e.emp_no')
			->join('departments AS p', 'p.dept_no = d.dept_no');
		

		$ret['rows'] = $db->get()->result();
		$ret['num_rows'] = count($ret['rows']);
			
		if($is_logged_in == "1")
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date',
		'dept_name' => 'Department',
		'title' => 'Title'	
		);
		}
		else 
		{
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',
		'dept_name' => 'Department',
		'title' => 'Title'
		);
			
		}
		
		
		}
		
		
		//count
		$db = $this->db->select('COUNT(*) as count', FALSE)	
			->from('employees');
				
			$tmpcount = $db->get()->result();
			
			
			
			return $ret;
			
	}
	
	//when adding an employee all 'to_date' = '9999-01-01'
	//to show they are now working for the company
	public function addEmployee($dob, $fname, $lname, $gender, $hiredate, $sal, $dept, $deptmgr, $title)
	{
		//insert in to employees table
		$this->db->set('birth_date',$dob);
		$this->db->set('first_name',$fname);
		$this->db->set('last_name',$lname);
		$this->db->set('gender',$gender);
		$this->db->set('hire_date',$hiredate);
		
		$this->db->insert('employees');
		
		//get the id of the last inserted record
		$fid = $this->db->insert_id();
		
		//insert in to dept_emp table
		$this->db->set('emp_no',$fid);
		$this->db->set('dept_no',$dept);
		$this->db->set('from_date',$hiredate);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_emp');
		
		
		//insert in to salary table
		$this->db->set('emp_no',$fid);
		$this->db->set('salary',$sal);
		$this->db->set('from_date',$hiredate);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('salaries');
		
		//insert in to titles table
		$this->db->set('emp_no',$fid);
		$this->db->set('title',$title);
		$this->db->set('from_date',$hiredate);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('titles');
		
		
		//if department manager
		if($deptmgr == "deptmgr")
		{
		//insert in to dept_manager table
		
		
		$this->db->set('dept_no', $dept);
		$this->db->set('emp_no',$fid);
		$this->db->set('from_date',$hiredate);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_manager');
		
		
		}
		
		return true;
	}
	
	
	//deleting an employee: employee doesn't actually get deleted from table. 
	//their most recent record gets updated 
	//where 'to_date' becomes the date they were 'deleted'
	//search results only display those who have 'to_date' = '9999-01-01'
	//which shows they are still working for the company
	
	public function deleteFromDeptempTable($emp_no)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');
		
		$currDept = $db->get()->result();
		$deptFields = array(
		'emp_no' => 'Emp No',
		'dept_no' => 'Dept No',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currDept as $depts)
		{	
			foreach($deptFields as $field_name => $field_display)
			{ 
				if($field_name == "dept_no"){ $oldDept = $depts->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $depts->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'dept_no' => $oldDept,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('dept_emp');
			$this->db->update('dept_emp', $data);
			
			return true;
			
	}
	
	public function deleteFromDeptmgrTable($emp_no)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('m.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_manager m', 'm.emp_no = e.emp_no');
		
		$currDeptmgr = $db->get()->result();
		$deptmgrFields = array(
		'dept_no' => 'Dept No',
		'emp_no' => 'Emp No',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currDeptmgr as $deptmgrs)
		{	
			foreach($deptmgrFields as $field_name => $field_display)
			{ 
				if($field_name == "dept_no"){ $oldDeptmgr = $deptmgrs->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $deptmgrs->$field_name;}
			}	
		}
		
		$data = array
		(
			'emp_no' => $emp_no,
			'dept_no' => $oldDeptmgr,
			'from_date' => $from_date,
			'to_date' => $today
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('dept_manager');
			$this->db->update('dept_manager', $data);
			
		return true;
	}
	
	
	function deleteFromSalariesTable($emp_no)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('s.to_date', '9999-01-01')
			->from('employees AS e')
			->join('salaries s', 's.emp_no = e.emp_no');
		
		$currSal = $db->get()->result();
		$salFields = array(
		'emp_no' => 'Emp No',
		'salary' => 'Salary',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currSal as $sals)
		{	
			foreach($salFields as $field_name => $field_display)
			{ 
				if($field_name == "salary"){ $oldSalary = $sals->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $sals->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'salary' => $oldSalary,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('salaries');
			$this->db->update('salaries', $data);
			
			return true;
	
	
	
	}
	
	function deleteFromTitlesTable($emp_no)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles t', 't.emp_no = e.emp_no');
		
		$currTitle = $db->get()->result();
		$titleFields = array(
		'emp_no' => 'Emp No',
		'title' => 'Title',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currTitle as $titles)
		{	
			foreach($titleFields as $field_name => $field_display)
			{ 
				if($field_name == "title"){ $oldTitle = $titles->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $titles->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'title' => $oldTitle,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('titles');
			$this->db->update('titles', $data);
			
	
		
			return true;
	
	}
	
	
	function isDeptMgr($emp_no)
	{
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('m.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_manager AS m', 'm.emp_no = e.emp_no');
		
		$retr['rows'] = $db->get()->result();
		$rows = count($retr['rows']);
		
		if($rows > 0)
		{	
			$retr['dept_mgr'] = true;
		}
		else 
		{
			$retr['dept_mgr'] = false;
		}
		
	
		
		return $retr;
	}
	
	
	//retrieve and current functions get employee's most recent information
	//by checking which records have 'to_date' = '9999-01-01'
	public function retrieve($emp_no)
	{
		$db = $this->db->where('e.emp_no', $emp_no)
			->from('employees AS e');			;
				
		$ret['rows'] = $db->get()->result();			
		$ret['num_rows'] = count($ret['rows']);
		
		$ret['fields'] = array(
		'emp_no' => 'Emp No',
		'birth_date' => 'D.o.B',
		'first_name' => 'First Name',
		'last_name' => 'Last Name',	
		'gender' => 'Gender',
		'hire_date' => 'Hire Date'
		);
			
		return $ret;
		
	}
	
		
		
	function currentSalary($emp_no)
	{
		$db = $this->db->select('s.salary')
			->where('e.emp_no', $emp_no)
			->where('s.to_date', '9999-01-01')
			->from('employees AS e')
			->join('salaries s', 's.emp_no = e.emp_no');
	
		$retr['sal'] = $db->get()->result();
		
		$retr['salField'] = array
		(
		'salary' => 'Salary'
	
		);
		
		return $retr;
	}
	
	function currentTitle($emp_no)
	{
		$db = $this->db->select('t.title')
			->where('e.emp_no', $emp_no)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles t', 't.emp_no = e.emp_no');
	
		$retr['title'] = $db->get()->result();
	
		$retr['titleField'] = array
		(
		'title' => 'Title'
	
		);
	
		return $retr;
	}
	
	function currentDept($emp_no)
	{
		$db = $this->db->select('d.dept_no')
			->where('e.emp_no', $emp_no)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');
	
		$retr['dept'] = $db->get()->result();
	
		$retr['deptField'] = array
		(
		'dept_no' => 'Dept No'	
		);
	
		return $retr;
	}
	
	
	//updating employee information works in 4 stages
	//employees table is simple
	//other tables are updated in the following steps:
	//1. find the most recent record for that employee
	//2. store and grab its data 
	//3. update the record BUT change the 'from_date' to the date the info was updated
	//4. add a new record where 'to_date' = the date they were updated 
	// AND 'from_date' = '9999-01-01' to show it is now the most recent record
	public function updateEmployee($emp_no, $dob, $fname, $lname, $gender, $hiredate, $deptmgr)
	{
		$data = array(
			'birth_date' => $dob,
			'first_name' => $fname,
			'last_name' => $lname,
			'gender' => $gender,
			'hire_date' => $hiredate
		
		);
		
		$this->db->where('emp_no', $emp_no);
		$this->db->update('employees', $data);
		
		
	}
	
	public function updateSalary($emp_no, $sal)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('s.to_date', '9999-01-01')
			->from('employees AS e')
			->join('salaries s', 's.emp_no = e.emp_no');
		
		$currSal = $db->get()->result();
		$salFields = array(
		'emp_no' => 'Emp No',
		'salary' => 'Salary',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currSal as $sals)
		{	
			foreach($salFields as $field_name => $field_display)
			{ 
				if($field_name == "salary"){ $oldSalary = $sals->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $sals->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'salary' => $oldSalary,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('salaries');
			$this->db->update('salaries', $data);
			
			
			
		$this->db->set('emp_no',$emp_no);
		$this->db->set('salary',$sal);
		$this->db->set('from_date',$today);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('salaries');
		
		return true;
	}
	
	public function updateTitle($emp_no, $title)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('t.to_date', '9999-01-01')
			->from('employees AS e')
			->join('titles t', 't.emp_no = e.emp_no');
		
		$currTitle = $db->get()->result();
		$titleFields = array(
		'emp_no' => 'Emp No',
		'title' => 'Title',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currTitle as $titles)
		{	
			foreach($titleFields as $field_name => $field_display)
			{ 
				if($field_name == "title"){ $oldTitle = $titles->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $titles->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'title' => $oldTitle,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('titles');
			$this->db->update('titles', $data);
			
			
			
		$this->db->set('emp_no',$emp_no);
		$this->db->set('title',$title);
		$this->db->set('from_date',$today);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('titles');
		
		return true;
	}
	
	public function updateDept($emp_no, $dept)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');
		
		$currDept = $db->get()->result();
		$deptFields = array(
		'emp_no' => 'Emp No',
		'dept_no' => 'Dept No',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currDept as $depts)
		{	
			foreach($deptFields as $field_name => $field_display)
			{ 
				if($field_name == "dept_no"){ $oldDept = $depts->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $depts->$field_name;}
			}	
		}
		
		$data = array(
			'emp_no' => $emp_no,
			'dept_no' => $oldDept,
			'from_date' => $from_date,
			'to_date' => $today	
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('dept_emp');
			$this->db->update('dept_emp', $data);
			
			
			
		$this->db->set('emp_no',$emp_no);
		$this->db->set('dept_no',$dept);
		$this->db->set('from_date',$today);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_emp');
		
		return true;
	}
	
	//promotion works by adding a new record to the dept_manager table
	//with the 'from_date' as the day they were promoted
	//and the 'to_date' as '9999-01-01' 
	//to show they are currently a manager
	public function promote($emp_no, $dept)
	{
		$today = date("Y-m-d");
		
		$this->db->set('dept_no',$dept);
		$this->db->set('emp_no',$emp_no);
		$this->db->set('from_date',$today);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_manager');
		
		return true;
	}
	
	
	//demotion works by updating the record that says they were a manager
	//finds that record
	//stores and grabs its data
	//updates record BUT changes 'to_date' to the date they were demoted
	public function demote($emp_no, $dept)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('m.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_manager m', 'm.emp_no = e.emp_no');
		
		$currDeptmgr = $db->get()->result();
		$deptmgrFields = array(
		'dept_no' => 'Dept No',
		'emp_no' => 'Emp No',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currDeptmgr as $deptmgrs)
		{	
			foreach($deptmgrFields as $field_name => $field_display)
			{ 
				if($field_name == "dept_no"){ $oldDeptmgr = $deptmgrs->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $deptmgrs->$field_name;}
			}	
		}
		
		$data = array
		(
			'emp_no' => $emp_no,
			'dept_no' => $oldDeptmgr,
			'from_date' => $from_date,
			'to_date' => $today
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('dept_manager');
			$this->db->update('dept_manager', $data);
			
		return true;
	}
	

}


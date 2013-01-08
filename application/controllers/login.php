<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	//index function loads the login page
	function index()
	{		
			$data['auth'] = "";
			$data['main_content'] = 'login_form';	
			$data['is_logged_in'] = null;
			$this->load->view('includes/template' , $data);
	}
	
	//if login details are in correct
	//load login form but with message saying Login Failed
	function index2($auth)
	{	
			$data['auth'] = 'fail';	
			$data['main_content'] = 'login_form';	
			$data['is_logged_in'] = null;
			$this->load->view('includes/template' , $data);
	}
	
	//authenticate the login
	public function auth_login() 
	{
		$this->load->model('login_model');
		$q = $this->login_model->authenticate();
		
		//if a result is given back then set the cookies and take to home page
		if($q == "1")
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			redirect('find/');
		}
		//if wrong then take to Login Failed page
		else 
		{
		$this->index2($auth = "fail");
		}
	}
	
	//logout destroys the session
	public function logout()  
	{  
		$this->session->sess_destroy();  
		redirect('find/');
	}

		
	
}


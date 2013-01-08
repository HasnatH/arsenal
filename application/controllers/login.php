<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function index()
	{		
			$data['auth'] = "";
			$data['main_content'] = 'login_form';	
			$data['is_logged_in'] = null;
			$this->load->view('includes/template' , $data);
	}
	
	function index2($auth)
	{	
			$data['auth'] = 'fail';	
			$data['main_content'] = 'login_form';	
			$data['is_logged_in'] = null;
			$this->load->view('includes/template' , $data);
	}
	
	public function auth_login() 
	{
		$this->load->model('login_model');
		$q = $this->login_model->authenticate();
		
	
		if($q == "1")
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			redirect('find/');
		}
		
		else 
		{
		$this->index2($auth = "fail");
		}
	}
	
	public function logout()  
	{  
		$this->session->sess_destroy();  
		redirect('find/');
	}

		
	
}


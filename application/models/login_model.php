<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model
{
	//authenticates the user using login info given
	public function authenticate()
	{
		//finds the record in login table to see if the username and password (in md5 format) 
		//matches the user login info
		$this->db->where('username' , $this->input->post('username'));
		$this->db->where('password' , md5($this->input->post('password')));
		$q = $this->db->get('login');
		
		//return true if there was a match
		if($q->num_rows == 1)
		{
			return true;
		}
	}
}
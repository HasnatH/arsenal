<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model
{
	public function authenticate()
	{
		$this->db->where('username' , $this->input->post('username'));
		$this->db->where('password' , md5($this->input->post('password')));
		$q = $this->db->get('login');
		
		if($q->num_rows == 1)
		{
			return true;
		}
	}
}
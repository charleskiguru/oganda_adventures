<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function can_login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$query = $this->db->get('admin');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function insert_plan($data)
	{
		$this->db->insert('plans', $data);
	}
}
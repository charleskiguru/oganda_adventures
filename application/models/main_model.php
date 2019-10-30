<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function can_login($email, $password)
	{
		$this->db->select('*');
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
	public function get_user($email){
		$this->db->where('email', $email);
		$query = $this->db->get('admin');

		return $query->row();
	}
	function insert_plan($data)
	{
		$this->db->insert('plans', $data);
	}
	function update_plan($plan_id, $data)
	{
		$this->db->where("id", $plan_id);
		$this->db->update("plans", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	function delete_single_plan($plan_id)
	{
		$this->db->where("id", $plan_id);
		$this->db->delete("plans");

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	function insert_team($data)
    {
        $this->db->insert('team', $data);
	}
	function update_profile_picture($picture_id, $data)
	{
		$this->db->where("id", $picture_id);
		$this->db->update("admin", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	function update_profile_details($profile_id, $data)
	{
		$this->db->where("id", $profile_id);
		$this->db->update("admin", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	function change_password($user_id, $data)
	{
		$this->db->where("id", $user_id);
		$this->db->update("admin", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}
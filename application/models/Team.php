<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model {
    function get_team()
    {
        $result = $this->db->query("select * from team")->result_array();
        return $result;
    }
    function fetch_single_team($team_id)
    {
        $this->db->where("id", $team_id);
        $query = $this->db->get('team');
        return $query->result();
    }
    function update_team($team_id, $data)
	{
		$this->db->where("id", $team_id);
		$this->db->update("team", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
    }
    function delete_team($team_id)
	{
		$this->db->where("id", $team_id);
		$this->db->delete("team");
    }
    function get_team_homepage()
    {
        $result = $this->db->query("select * from team where status='active' ")->result_array();
        return $result;
    }
}
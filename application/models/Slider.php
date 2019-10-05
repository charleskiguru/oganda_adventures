<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Model {
    function get_sliders()
    {
        $result = $this->db->query("select * from slider_images")->result_array();
        return $result;
    }
    function insert_slider($data)
	{
		$this->db->insert('slider_images', $data);
	}
    function fetch_single_slider($slider_id)
    {
        $this->db->where("id", $slider_id);
        $query = $this->db->get('slider_images');
        return $query->result();
    }
    function update_slider($slider_id, $data)
	{
		$this->db->where("id", $slider_id);
		$this->db->update("slider_images", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}
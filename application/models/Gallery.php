<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Model {
    function get_images()
    {
        $result = $this->db->query("select * from gallery_images")->result_array();
        return $result;
    }
    function get_videos()
    {
        $result = $this->db->query("select * from gallery_videos")->result_array();
        return $result;
    }
    function insert_gallery_image($data)
	{
		$this->db->insert('gallery_images', $data);
    }
    function insert_gallery_video($data)
	{
		$this->db->insert('gallery_videos', $data);
	}
    function fetch_single_image_gallery($image_id)
    {
        $this->db->where("id", $image_id);
        $query = $this->db->get('gallery_images');
        return $query->result();
    }
    function update_gallery_image($image_id, $data)
	{
		$this->db->where("id", $image_id);
		$this->db->update("gallery_images", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
    }
    function fetch_single_video_gallery($video_id)
    {
        $this->db->where("id", $video_id);
        $query = $this->db->get('gallery_videos');
        return $query->result();
    }
    function update_gallery_video($video_id, $data)
	{
		$this->db->where("id", $video_id);
		$this->db->update("gallery_videos", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
    }
    function delete_gallery_image($image_id)
	{
		$this->db->where("id", $image_id);
		$this->db->delete("gallery_images");
    }
    function delete_gallery_video($video_id)
	{
		$this->db->where("id", $video_id);
		$this->db->delete("gallery_videos");
    }
    public function get_gallery_images()
    {
        $result = $this->db->query("select * from gallery_images where status='active' ")->result_array();
        return $result;
    }
}
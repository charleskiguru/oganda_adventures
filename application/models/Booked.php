<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booked extends CI_Model {
    var $table = "booked_tours";
    var $select_column = array("id", "plan_booked", "booking_id", "booking_status", "first_name", "last_name", "email", "phoneno", "no_adults", "no_kids", "total_cost", "nationality", "created_at");
    var $order_column = array(null, "plan_booked", "booking_id", "booking_status", "first_name", "last_name", "email", "phoneno", "no_adults", "no_kids", "total_cost", "nationality", null, null);
    function make_query(){
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if(isset($_POST["search"]["value"]))
        {
            $this->db->like("plan_booked", $_POST["search"]["value"]);
            $this->db->or_like("booking_id", $_POST["search"]["value"]);
        }
        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else{
            $this->db->order_by("id", "DESC");
        }
    }
    function make_datatables()
    {
        $this->make_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function fetch_single_booked_plan()
    {
        $this->db->where("id", $booked_id);
        $query = $this->db->get('booked_tours');
        return $query->result();
    }
}
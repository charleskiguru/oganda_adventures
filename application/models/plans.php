<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Model {
    var $table = "plans";
    var $select_column = array("id", "plan_name", "image", "start_date", "end_date", "plan_cost", "description");
    var $order_column = array(null, "plan_name", "image", "start_date", "end_date", "plan_cost", null, null);
    function make_query(){
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if(isset($_POST["search"]["value"]))
        {
            $this->db->like("plan_name", $_POST["search"]["value"]);
        }
        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else{
            $this->db->order_by("id", "ASC");
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
    function fetch_single_plan($plan_id)
    {
        $this->db->where("id", $plan_id);
        $query = $this->db->get('plans');
        return $query->result();
    }
    public function get_plan()
    {
        $result = $this->db->query("select * from plans where status=1")->result_array();
        return $result;
    }
    public function booking()
    {
        $field = array(
            'first_name'    =>  $this->input->post('first_name'),
            'last_name'     =>  $this->input->post('last_name'),
            'email'         =>  $this->input->post('email'),
            'phoneno'       =>  $this->input->post('phoneno'),
            'no_adults'     =>  $this->input->post('no_adults'),
            'no_kids'       =>  $this->input->post('no_kids'),
            'nationality'   =>  $this->input->post('nationality'),
            'created_at'    =>  date('Y-m-d H:i:s')
        );
        $this->db->insert('booked_tours', $field);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
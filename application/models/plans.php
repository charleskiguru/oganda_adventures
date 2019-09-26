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
            'plan_booked'   =>  $this->input->post('plan_name'),
            'first_name'    =>  $this->input->post('first_name'),
            'last_name'     =>  $this->input->post('last_name'),
            'email'         =>  $this->input->post('email'),
            'phoneno'       =>  $this->input->post('phoneno'),
            'no_adults'     =>  $this->input->post('no_adults'),
            'no_kids'       =>  $this->input->post('no_kids'),
            'total_cost'    =>  $this->input->post('total_cost'),
            'nationality'   =>  $this->input->post('nationality'),
            'created_at'    =>  date('Y-m-d H:i:s')
        );
        $this->db->insert('booked_tours', $field);

        if($this->db->affected_rows() > 0)
        {
            $mobile = $this->input->post('phoneno');
            $message= $this->input->post('first_name');
            $encodedMessage = urlencode($message);

            $userName = "charleskiguru";
            $authkey = "65ec0c786dab7c184e35bfc0dc32b6636fa020a0d0bc5cd9457030e3eaba31ff";
            $senderID = "AFRICASTKNG";
            $postData = array(
                'userName' => $userName,
                'authkey' => $authkey,
                'senderID' => $senderID,
                'mobile' => $mobile,
                'message' => $encodedMessage
            );
            $url = "http://swiftext.co.ke/API/?action=compose";
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST => TRUE,
                CURLOPT_POSTFIELDS => $postData
            ));
            
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            $curl_close($ch);

            return true;
        }
        else{
            return false;
        }
    }
}
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
    function fetch_single_booked_plan($booked_id)
    {
        $this->db->where("id", $booked_id);
        $query = $this->db->get('booked_tours');
        return $query->result();
    }
    function update_booked_plan($booked_id, $data)
	{
		$this->db->where("id", $booked_id);
		$this->db->update("booked_tours", $data);

		if($this->db->affected_rows() > 0)
		{
            // $api_username = 'oganda';
            // $api_key = '360bac58785a24ecd97fedb4636c12eef8ce614c012eaf02dd6b08b0321f3bed';
            // $FirstName = $this->input->post('first_name');
            // $PlanName = $this->input->post('plan_booked');
            // $BookingId = $this->input->post('booking_id');
            // $TotalCost = $this->input->post('total_cost');
            // require_once(APPPATH.'libraries/AfricasTalkingGateway.php');
            // $gateway = new AfricasTalkingGateway($api_username, $api_key);
            // $sms_message = 'Dear '.$FirstName.', your have successfully completed the payments for booking ID '.$BookingId.'. We will notify you about the arrangements. Thank you from Oganda Adventures.';
            // $recipient = $this->input->post('phoneno');
            // try{
            //     $results  = $gateway->sendMessage($recipient, $sms_message);
            //     // foreach($results as $result) {
            //     //     if ($result->messageId == 'None'){
            //     //         $msg_err = $msg_err . $result->status . '</br>';
            //     //     }else{
            //     //     }
            //     // }
            // }catch ( AfricasTalkingGatewayException $e ){
            //     //$msg_err = $msg_err . $e->getMessage() . '</br>';
            //     return false;
            // }
			return true;
		}
		else{
			return false;
		}
	}
}
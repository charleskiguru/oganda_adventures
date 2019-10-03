<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model {
    
    function contacts()
    {
        $insert_data = array(
            'name' => $this->input->post('contact_name'),
            'email' => $this->input->post('contact_email'),
            'subject' => $this->input->post('contact_subject'),
            'message' => $this->input->post('contact_message')
		);
        $this->db->insert('contacts', $insert_data);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}

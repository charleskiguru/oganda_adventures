<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('url');
    }
    public function index()
    {
        $data = $this->input->post();

        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.ogandaadventures.co.ke';
        $config['smtp_user'] = 'info@ogandaadventures.co.ke';
        $config['smtp_pass'] = '{iK_B&o{_8x9';
        $config['smtp_port'] = '110';
        $this->email-initialize($config);

        $this->email->set_newline("\r\n");
        
        $this->email->from($data['email']);
        $this->email->to('info@ogandaadventures.co.ke');
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        if($this->email->send()){
            $this->session->set_flashdata('success', 'Email sent successfully');
        }
    }
}
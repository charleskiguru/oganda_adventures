<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    public function index()
    {
        $this->load->helper('form');
        // $data = $this->input->post();

        // $this->load->library('email');
        // $config = array();
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'mail.ogandaadventures.co.ke';
        // $config['smtp_user'] = 'info@ogandaadventures.co.ke';
        // $config['smtp_pass'] = '{iK_B&o{_8x9';
        // $config['smtp_port'] = '110';
        // $this->email-initialize($config);

        // $this->email->set_newline("\r\n");
        
        // $this->email->from($data['email']);
        // $this->email->to('info@ogandaadventures.co.ke');
        // $this->email->subject($data['subject']);
        // $this->email->message($data['message']);

        // if($this->email->send()){
        //     $this->session->set_flashdata('success', 'Email sent successfully');
        // }
    }
    public function send_mail()
    {
        $from_email="charleskiguru14@gmail.com"
        $to_email="info@ogandaadventures.co.ke";

        $this->load->library('email');
        $this->email->from($from_email, 'Charles kiguru');
        $this->email->to($to_email);
        $this->email->subject('Email test');
        $this->email->message('Testing email class');

        if(this->email->send())
        {
            echo "Email delivered successfully";
        }
        else{
            echo "Email not sent";
        }
    }
}
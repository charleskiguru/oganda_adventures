<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans_all extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->model('plans');
		$data['plans'] = $this->plans->get_all_plan();
        $this->load->view('all_plans', $data);
    }
}
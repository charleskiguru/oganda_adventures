<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->model('plans');
		$data['plans'] = $this->plans->get_plan();

		$this->load->view('my_page', $data);
	}
}

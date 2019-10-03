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
	public function booking()
	{
		$this->load->model('plans');
		$result = $this->plans->booking();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function contact()
	{
		$this->load->model('contact');
		$result = $this->contact->contacts();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}

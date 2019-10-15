<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('og/admin_login');
	}
	public function admin_login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run())
		{
			//True
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			//load model
			$this->load->model('main_model');

			if ($this->main_model->can_login($email, $password)) 
			{
				$session_data = array(
					'email' => $email
				);

				$this->session->set_userdata($session_data);
				redirect(base_url() . 'dashboard/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Email address or Password');
				redirect(base_url() . 'og/admin_login');
			}
		}
		else
		{
			//False
			$this->index();
		}
	}

	function dashboard()
	{
		if($this->session->userdata('email') != '')
		{
			redirect(base_url() . 'dashboard/dashboard');
		}
		else
		{
			redirect(base_url() . 'og/admin_login');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'og/admin_login');
	}
}
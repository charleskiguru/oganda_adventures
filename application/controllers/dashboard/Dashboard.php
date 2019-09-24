<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('email'))
			return redirect('og/admin_login');
	}
	public function index()
	{
		$this->load->view('dashboard/dashboard');
	}
	public function slider()
	{
		$this->load->view('dashboard/slider');
	}
	public function plans()
	{
		$this->load->view('dashboard/plans');
	}
	function fetch_plans(){
		$this->load->model("plans");
		$fetch_data = $this->plans->make_datatables();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array	 = array();
			$sub_array[] = '<img src="' .base_url().'assets/upload/'.$row->image.'" class="img-thumbnail" width="75"/> ';
			$sub_array[] = $row->plan_name;
			$sub_array[] = $row->start_date;
			$sub_array[] = $row->end_date;
			$sub_array[] = $row->plan_cost;
			$sub_array[] = $row->description;

			$sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';
			$sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=>	$this->plans->get_all_data(),
			"recordsFiltered"	=>	$this->plans->get_filtered_data(),
			"data"				=>	$data
		);
		echo json_encode($output);	
	}
	function plan_action()
	{
		//if($_POST["action"]  == "Edit")
		//{
			$image = '';
			if($_FILES["image"]["name"] != '')
			{
				$image = $this->upload_image();
			}
			else
			{
				$image = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'plan_name'		=>	$this->input->post('plan_name'),
				'image'			=>	$image,
				'start_date'	=>	$this->input->post('start_date'),
				'end_date'		=>	$this->input->post('end_date'),
				'plan_cost'		=>	$this->input->post('plan_cost'),
				'description'	=>	$this->input->post('description')
			);
			$this->load->model('main_model');
			$this->main_model->update_plan($this->input->post("plan_id"), $updated_data);
			echo 'Data Updated';
		//}
		//else
		//{
		//	$insert_data = array(
		//		'plan_name' => $this->input->post('plan_name'),
		//		'image'     => $this->upload_image(),
		//		'start_date' => $this->input->post('start_date'),
		//		'end_date' => $this->input->post('end_date'),
		//		'plan_cost' => $this->input->post('plan_cost'),
		//		'description' => $this->input->post('description')
		//	);
		//	$this->load->model('main_model');
		//	$this->main_model->insert_plan($insert_data);
		//	echo "Data inserted";
		//}
	}
	function upload_image()
	{
		if(isset($_FILES["image"]))
		{
			$extension = explode('.', $_FILES['image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets/upload/' . $new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function fetch_single_plan()
	{
		$output = array();
		$this->load->model("plans");
		$data = $this->plans->fetch_single_plan($_POST["plan_id"]);

		foreach ($data as $row) {
			$output['plan_name'] 	= $row->plan_name;

			if($row->image != '')
			{
				$output['image'] = '<img src="' .base_url().'assets/upload/'.$row->image.'" class="img-thumbnail" width="75"/>
				<input type="hidden" name="hidden_user_image" value="'.$row->image.'"> ';
			}
			else{
				$output['image'] = '<input type="hidden" name="hidden_user_image" value=" ">';
			}
			$output['start_date'] 	= $row->start_date;
			$output['end_date'] 	= $row->end_date;
			$output['plan_cost'] 	= $row->plan_cost;
			$output['description'] 	= $row->description;
		}
		echo json_encode($output);
	}
}

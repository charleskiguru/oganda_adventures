<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('main_model');
		if(! $this->session->userdata('email'))
			return redirect('og/admin_login');
	}
	public function index()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->view('dashboard/dashboard', $data);
	}
	public function slider()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->model('plans');
		$data['sliders'] = $this->plans->get_sliders();
		$this->load->view('dashboard/slider', $data);
	}
	public function plans()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->view('dashboard/plans', $data);
	}
	public function plans_booked()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->view("dashboard/booked_plans", $data);
	}
	public function team()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->model('team');
		$data['teams']=$this->team->get_team();
		$this->load->view('dashboard/team', $data);
	}
	public function gallery()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->model('gallery');
		$data['gallery_images'] = $this->gallery->get_images();
		$data['gallery_videos'] = $this->gallery->get_videos();
		$this->load->view('dashboard/gallery', $data);
	}
	public function profile()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->view('dashboard/profile', $data);
	}
	public function change_password()
	{
		$user_email = $this->session->userdata('email');
		$data['user'] = $this->main_model->get_user($user_email);

		$this->load->view('dashboard/change_password',$data);
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
			if($row->status=='active')
			{
				$sub_array[] = '<span class="badge badge-success">'.$row->status.'</span>' ;
			}
			else{
				$sub_array[] = '<span class="badge badge-danger">'.$row->status.'</span>' ;
			}

			$sub_array[]='<a href="javascript:void(0);" class="action-icon "> <i class="mdi mdi-square-edit-outline update" id="'.$row->id.'"></i></a>';
            $sub_array[]='<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete delete" id="'.$row->id.'"></i>';
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
		if($this->input->post("plan_id")  != ""){
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
				'description'	=>	$this->input->post('description'),
				'status'		=>	$this->input->post('status')
			);
			$this->load->model('main_model');
			$this->main_model->update_plan($this->input->post("plan_id"), $updated_data);
			echo 'Data Updated';
		}
		else
		{
			$insert_data = array(
				'plan_name' => $this->input->post('plan_name'),
				'image'     => $this->upload_image(),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'plan_cost' => $this->input->post('plan_cost'),
				'description' => $this->input->post('description'),
				'status'	=>	$this->input->post('status')
			);
			$this->load->model('main_model');
			$this->main_model->insert_plan($insert_data);
			echo "Data inserted";
		}
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
			$output['status'] 		= $row->status;
		}
		echo json_encode($output);
	}
	function delete_booked_plan()
	{
		$this->load->model('plans');
		$this->plans->delete_booked_plan($_POST["booked_id"]);
		echo "Booked plan successfuly deleted";
	}
	function fetch_single_slider()
	{
		$output = array();
		$this->load->model("slider");
		$data = $this->slider->fetch_single_slider($_POST["slider_id"]);

		foreach ($data as $row) {
			if($row->image != '')
			{
				$output['image'] = '<img src="' .base_url().'assets/images/slider/'.$row->image.'" class="img-thumbnail" width="75"/>
				<input type="hidden" name="hidden_user_image" value="'.$row->image.'"> ';
			}
			else{
				$output['image'] = '<input type="hidden" name="hidden_user_image" value=" ">';
			}
			$output['title'] 	= $row->title;
			$output['description'] 	= $row->description;
		}
		echo json_encode($output);
	}
	function fetch_booked_plans(){
		$this->load->model('booked');
		$fetch_data = $this->booked->make_datatables();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array	 = array();
			$sub_array[] = $row->plan_booked;
			$sub_array[] = $row->booking_id;

			if($row->booking_status=='paid')
			{
				$sub_array[] = '<span class="badge badge-success">'.$row->booking_status.'</span>' ;
			}
			else{
				$sub_array[] = '<span class="badge badge-danger">'.$row->booking_status.'</span>' ;
			}
			$sub_array[] = $row->first_name;
			$sub_array[] = $row->phoneno;
			$sub_array[] = $row->no_adults;
			$sub_array[] = $row->no_kids;
			$sub_array[] = $row->total_cost;
			$sub_array[] = $row->created_at;

			$sub_array[]='<a href="javascript:void(0);" class="action-icon "> <i class="mdi mdi-square-edit-outline update" id="'.$row->id.'"></i></a>';
            $sub_array[]='<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete delete" id="'.$row->id.'"></i>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=>	$this->booked->get_all_data(),
			"recordsFiltered"	=>	$this->booked->get_filtered_data(),
			"data"				=>	$data
		);
		echo json_encode($output);
	}
	function fetch_single_booked_plan()
	{
		$output = array();
		$this->load->model("booked");
		$data = $this->booked->fetch_single_booked_plan($_POST["booked_id"]);

		foreach ($data as $row) {
			$output['plan_booked'] 	= $row->plan_booked;
			$output['booking_id'] 	= $row->booking_id;
			$output['first_name'] 	= $row->first_name;
			$output['phoneno'] 	= $row->phoneno;
			$output['total_cost'] 	= $row->total_cost;
			$output['booking_status'] 	= $row->booking_status;
		}
		echo json_encode($output);
	}
	function delete_single_plan()
	{
		$this->load->model('main_model');
		$this->main_model->delete_single_plan($_POST["plan_id"]);
		echo 'Plan deleted successfully';
	}
	function booked_action()
	{
		$updated_data = array(
			'booking_status'	=>	$this->input->post('status')
		);
		$this->load->model('booked');
		$this->booked->update_booked_plan($this->input->post("booked_id"), $updated_data);
		echo 'Confirmed payments';
	}
	function slider_action()
	{
		if($this->input->post('slider_id') !='')
		{
			$image = '';
			if($_FILES["image"]["name"] != '')
			{
				$image = $this->upload_slider();
			}
			else
			{
				$image = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'image'			=>	$image,
				'title'			=>	$this->input->post('title'),
				'description'	=>	$this->input->post('description')
			);
			$this->load->model('slider');
			$this->slider->update_slider($this->input->post("slider_id"), $updated_data);
			echo 'Data Updated';
		}
		else{
			$insert_data = array(
				'image'     => $this->upload_slider(),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date'		=>	date('d-m-Y')
			);
	
			$this->load->model('slider');
			$this->slider->insert_slider($insert_data);
			echo "Data inserted";
		}
	}
	function upload_slider()
	{
		if(isset($_FILES["image"]))
		{
			$extension = explode('.', $_FILES['image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets/images/slider/' . $new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function delete_slider()
	{
		$this->load->model('slider');
		$this->slider->delete_slider($_POST["slider_id"]);
		echo "Slider deleted successfully!";
	}
	function team_action(){
		if($this->input->post("team_id")  != ""){
			$image = '';
			if($_FILES["image"]["name"] != '')
			{
				$image = $this->upload_team();
			}
			else
			{
				$image = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'full_name'		=>	$this->input->post('full_name'),
				'image'			=>	$image,
				'role'			=>	$this->input->post('role'),
				'facebook'		=>	$this->input->post('facebook'),
				'twitter'		=>	$this->input->post('twitter'),
				'instagram'		=>	$this->input->post('instagram')
			);
			$this->load->model('team');
			$this->team->update_team($this->input->post("team_id"), $updated_data);
			echo 'Data Updated';
		}
		else
		{
			$insert_data = array(
				'full_name' => $this->input->post('full_name'),
				'image'		=> $this->upload_team(),
				'role'		=> $this->input->post('role'),
				'facebook'	=> $this->input->post('facebook'),
				'twitter'	=> $this->input->post('twitter'),
				'instagram'	=> $this->input->post('instagram')
			);
			$this->load->model('main_model');
			$this->main_model->insert_team($insert_data);
			echo "Team member inserted successfully";
		}
	}
	function upload_team()
	{
		if(isset($_FILES["image"]))
		{
			$extension = explode('.', $_FILES['image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets/images/team/' . $new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function fetch_single_team()
	{
		$output = array();
		$this->load->model("team");
		$data = $this->team->fetch_single_team($_POST["team_id"]);

		foreach ($data as $row) {
			$output['full_name'] 	= $row->full_name;

			if($row->image != '')
			{
				$output['image'] = '<img src="' .base_url().'assets/images/slider/'.$row->image.'" class="img-thumbnail" width="75"/>
				<input type="hidden" name="hidden_user_image" value="'.$row->image.'"> ';
			}
			else{
				$output['image'] = '<input type="hidden" name="hidden_user_image" value=" ">';
			}
			$output['role'] 		= $row->role;
			$output['facebook'] 	= $row->facebook;
			$output['twitter'] 		= $row->twitter;
			$output['instagram'] 	= $row->instagram;
		}
		echo json_encode($output);
	}
	function delete_team()
	{
		$this->load->model('team');
		$this->team->delete_team($_POST["team_id"]);
		echo "Member deleted successfully!";
	}
	function image_action()
	{
		if($this->input->post("image_id")  != ""){
			$image = '';
			if($_FILES["image"]["name"] != '')
			{
				$image = $this->upload_gallery();
			}
			else
			{
				$image = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'image'			=>	$image,
				'description'	=>	$this->input->post('description'),
				'status'		=>  $this->input->post('status')
			);
			$this->load->model('gallery');
			$this->gallery->update_gallery_image($this->input->post("image_id"), $updated_data);
			echo 'Data Updated';
		}
		else
		{
			$insert_data = array(
				'image'     	=> $this->upload_gallery(),
				'description' 	=> $this->input->post('description'),
				'date'			=> date('d-m-Y'),
				'status'		=> $this->input->post('status')
			);
	
			$this->load->model('gallery');
			$this->gallery->insert_gallery_image($insert_data);
			echo "Data inserted";
		}
	}
	function fetch_single_image_gallery()
	{
		$output = array();
		$this->load->model('gallery');
		$data = $this->gallery->fetch_single_image_gallery($_POST["image_id"]);

		foreach ($data as $row) {

			if($row->image != '')
			{
				$output['image'] = '<img src="' .base_url().'assets/images/gallery/'.$row->image.'" class="img-thumbnail" width="75"/>
				<input type="hidden" name="hidden_user_image" value="'.$row->image.'"> ';
			}
			else{
				$output['image'] = '<input type="hidden" name="hidden_user_image" value=" ">';
			}
			$output['description'] 		= $row->description;
			$output['status'] 			= $row->status;
		}
		echo json_encode($output);
	}
	function upload_gallery()
	{
		if(isset($_FILES["image"]))
		{
			$extension = explode('.', $_FILES['image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets/images/gallery/' . $new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function video_action()
	{
		if($this->input->post("video_id")  != ""){
			$updated_data = array(
				'youtube_link'	=>	$this->input->post('y_link'),
				'description'	=>	$this->input->post('v_description')
			);
			$this->load->model('gallery');
			$this->gallery->update_gallery_video($this->input->post("video_id"), $updated_data);
			echo 'Data Updated';
		}
		else
		{
			$insert_data = array(
				'youtube_link'  => $this->input->post('y_link'),
				'description' 	=> $this->input->post('v_description'),
				'date'			=> date('d-m-Y')
			);
	
			$this->load->model('gallery');
			$this->gallery->insert_gallery_video($insert_data);
			echo "Data inserted";
		}
	}
	function fetch_single_video_gallery()
	{
		$output = array();
		$this->load->model('gallery');
		$data = $this->gallery->fetch_single_video_gallery($_POST["video_id"]);

		foreach ($data as $row) {
			$output['youtube_link'] 	= $row->youtube_link;
			$output['description'] 		= $row->description;
		}
		echo json_encode($output);
	}
	function delete_gallery_image()
	{
		$this->load->model('gallery');
		$this->gallery->delete_gallery_image($_POST["image_id"]);
		echo "Image deleted successfully!";
	}
	function delete_gallery_video()
	{
		$this->load->model('gallery');
		$this->gallery->delete_gallery_video($_POST["video_id"]);
		echo "Video deleted successfully!";
	}
	function update_profile_picture()
	{
		$image = '';
			if($_FILES["image"]["name"] != '')
			{
				$image = $this->upload_profile();
			}
			else
			{
				$image = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'image'			=>	$image
			);
			$this->load->model('main_model');
			$this->main_model->update_profile_picture($this->input->post("picture_id"), $updated_data);
			echo 'Data Updated';
	}
	function upload_profile()
	{
		if(isset($_FILES["image"]))
		{
			$extension = explode('.', $_FILES['image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets1/images/users/' . $new_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function update_profile_details()
	{
		$updated_data = array(
			'first_name'	=>	$this->input->post('first_name'),
			'last_name'		=>	$this->input->post('last_name'),
			'phone_number'	=>	$this->input->post('phone_number'),
			'gender'		=>	$this->input->post('gender')
		);
		$this->load->model('main_model');
		$this->main_model->update_profile_details($this->input->post("profile_id"), $updated_data);
		echo 'Data Updated';
	}
	function change_pass()
	{
		$updated_data = array(
			'password'	=>	md5($this->input->post('new_password'))
		);
		$this->load->model('main_model');
		$this->main_model->change_password($this->input->post("user_id"), $updated_data);
		echo 'Password has been changed.';
	}
}

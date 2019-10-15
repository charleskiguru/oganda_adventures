<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->model('gallery');
		$data['gallery_images'] = $this->gallery->get_images();
		$data['gallery_videos'] = $this->gallery->get_videos();
        $this->load->view('portfolio', $data);
    }
}
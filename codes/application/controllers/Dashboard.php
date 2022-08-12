<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->user_id = $this->session->userdata("user_id");
	}

	public function index() {
		$this->load->view("dashboard/index");
	}

}

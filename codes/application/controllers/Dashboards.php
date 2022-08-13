<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Dashboard");

		$this->user_id = $this->session->userdata("user_id");
		if(!$this->user_id) {
			redirect("/");
		}
		$this->is_admin = $this->Dashboard->is_user_admin($this->user_id);
	}

	public function index() {
		if($this->is_admin["is_admin"]) {
			redirect("dashboards/admin");
		}
		else {
			$this->load->view("dashboard/index");
		}
	}

	public function admin() {
		$this->load->view("dashboard/admin");
	}

	public function logout() {
		$this->session->unset_userdata("user_id");
		redirect("/");
	}

}

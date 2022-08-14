<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Dashboard");

		$this->user_id = $this->session->userdata("user_id");
		$this->is_admin = $this->Dashboard->is_user_admin($this->user_id);
	}

	public function index() {
		if(!$this->user_id) {
			redirect("/login");
		}
		if($this->is_admin["is_admin"]) {
			redirect("/products");
		}
		else {
			$view_data["user"] = $this->user_id;
			$this->load->view("index", $view_data);
		}
	}

	public function home() {
		$view_data["user"] = $this->user_id;
		$this->load->view("index", $view_data);
	}

	public function products() {
		$view_data["user"] = $this->user_id;
		$this->load->view("dashboard/catalog", $view_data);
	}

	public function admin() {
		$this->load->view("dashboard/index");
	}

	public function logout() {
		$this->session->unset_userdata("user_id");
		redirect("/login");
	}

}

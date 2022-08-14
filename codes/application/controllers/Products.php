<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Product");
	}

	public function show($product_id = 0) {
		$view_data["user"] = $this->session->userdata("user_id");
		$this->load->view("dashboard/show", $view_data);
	}

}

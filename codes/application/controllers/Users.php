<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->myconfig =& get_config();
	}

	public function index() {
		$view_data["user"] = $this->session->userdata("user_id");
		$this->load->view("index", $view_data);
	}

	public function admin() {
		if($this->session->userdata("user_id")) {
			redirect("dashboards");
			return;
		}
		$this->load->view('users/login');
	}


	public function login() {
		if($this->session->userdata("user_id")) {
			redirect("dashboards");
			return;
		}
		$this->load->view('users/login');
	}

	public function register() {
		$this->load->view("users/register");
	}

	public function process_login() {
		$fields = $this->input->post(NULL, TRUE);

		$res = $this->User->login($fields, $this->myconfig["encryption_key"]);
		if($res == -1) {
			$this->session->set_flashdata("errors", "<p>Wrong email or password.</p>");			
		}
		else if($res == 0) {
			$this->session->set_flashdata("errors", validation_errors());			
		}
		else {
			$this->session->set_userdata("user_id", $res["id"]);		
			$this->session->set_userdata("name", $res["first_name"]);		
			redirect("dashboards");
		}
		redirect("/login");
	}

	public function process_register() {
		$fields = $this->input->post(NULL, TRUE);
		
		$user_id = $this->User->register($fields, $this->myconfig["encryption_key"]);		
		if($user_id) {
			$this->session->set_userdata("user_id", $user_id);
			$user = $this->User->get_user_by_id($user_id);
			$this->session->set_userdata("name", $user["first_name"]);
			redirect("dashboards");
		}
		else {
			$this->session->set_flashdata("errors", validation_errors());			
			redirect("/register");
		}

	}

	public function logout() {
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("cart_count");
		$this->session->unset_userdata("name");
		redirect("/login");
	}

	public function profile() {
		$view_data["name"] = $this->session->userdata("name");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$this->load->view("profile", $view_data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->myconfig =& get_config();
	}

	public function index() {
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
			$this->session->set_userdata("user_id", $res);		
			redirect("dashboards");
		}
		redirect("/");
	}

	public function process_register() {
		$fields = $this->input->post(NULL, TRUE);
		
		$user_id = $this->User->register($fields, $this->myconfig["encryption_key"]);		
		if($user_id) {
			$this->session->set_userdata("user_id", $user_id);		
			redirect("dashboards");
		}
		else {
			$this->session->set_flashdata("errors", validation_errors());			
			redirect("/register");
		}

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	private function validate_registration($post) {
		$this->form_validation->set_rules("first_name", "First name", "required|min_length[2]|alpha");
		$this->form_validation->set_rules("last_name", "Last name", "required|min_length[2]|alpha");
		$this->form_validation->set_rules("email_address", "Email address", "required|valid_email");
		$this->form_validation->set_rules("contact_number", "Contact number", "required|is_numeric");
		$this->form_validation->set_rules("role", "Role", "required|is_numeric");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "Confirm password", "required|min_length[8]|matches[password]");

		if(!$this->form_validation->run()) {
			return FALSE;
		}
		return TRUE;
	}

	/*
		DOCU: this function insert new user if inputs are valid
			it insert the user to the users table and users_information table
		OWNER: ronrix
	*/ 
	public function register($fields, $key){

		if(!$this->validate_registration($fields)) {
			return FALSE;
		}

		// users table
		$query = "INSERT INTO users(email, password) VALUES(?, ?)";
		$params = array(
			$this->security->xss_clean($fields["email_address"]),
			md5($this->security->xss_clean($fields["password"]).$key)
		);
		$this->db->query($query, $params);
		$user_id = $this->db->insert_id();

		// users_information table
		$query = "INSERT INTO users_information(user_id, first_name, last_name, email_address, contact_number, is_admin) VALUES(?, ?, ?, ?, ?, ?)";
		$params = array(
			$user_id,
			$this->security->xss_clean($fields["first_name"]),
			$this->security->xss_clean($fields["last_name"]),
			$this->security->xss_clean($fields["email_address"]),
			$this->security->xss_clean($fields["contact_number"]),
			$this->security->xss_clean($fields["role"]),
		);
		$this->db->query($query, $params);

		return $user_id;
	}

	private function validate_login($post) {
		$this->form_validation->set_rules("email_address", "Email", "required|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");

		if(!$this->form_validation->run()) {
			return FALSE;
		}
		return TRUE;
	}

	/*
		DOCU: this function checks if the credentials exits in db,
			this also checks the hash password. if match, then return the user_id.
			if inputs are invalid return 0, if password is not correct return -1, else return the id

		OWNER: ronrix
	*/
	public function login($fields, $key){

		if(!$this->validate_login($fields)) {
			return 0;
		}

		$user =$this->db->query("SELECT * FROM users WHERE email=?", $this->security->xss_clean($fields["email_address"]))->row_array();

		$hashed_password = md5($fields["password"].$key);
		if($hashed_password == $user["password"]) {
			return $user["id"];
		}
		return -1;
	}
}

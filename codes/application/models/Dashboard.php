<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

	public function is_user_admin($user_id) {
		return $this->db->query("SELECT is_admin FROM users_information WHERE user_id=?", $this->security->xss_clean($user_id))->row_array();
	}

}

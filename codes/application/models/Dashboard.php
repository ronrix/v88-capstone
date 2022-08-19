<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

	public function is_user_admin($user_id) {
		$params = array(
			$this->security->xss_clean($user_id), $this->input->ip_address()
		);
		return $this->db->query("SELECT is_admin FROM users WHERE id=? AND ip_addr=?", $params)->row_array();
	}

	public function get_total_carts_by_id($user_id) {
		return $this->db->query("SELECT COUNT(*) AS total FROM carts WHERE user_id=?", $this->security->xss_clean($user_id))->row_array();
	}

	public function get_all_carts_by_id($user_id) {
		return $this->db->query("SELECT * FROM carts WHERE user_id=?", $user_id)->result_array();
	}
}

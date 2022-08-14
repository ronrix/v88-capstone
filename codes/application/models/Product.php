<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function fetch_all($product_id) {
		return $this->db->query("SELECT * FROM products WHERE id=?", $this->security->xss_clean($product_id))->row_array();
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

	public function filter_products_by_category($category_id) {
		return $this->db->query("SELECT * 
					FROM products 
					INNER JOIN categories ON products.category_id = categories.id 
					WHERE categories.id = ?
		", $this->security->xss_clean($category_id))->result_array();
	}

	public function update_($cat, $id) {
		$this->db->query("UPDATE categories SET category=? WHERE id=?", array($this->security->xss_clean($cat), $this->security->xss_clean($id)));
		return $this->db->affected_rows();
	}
}

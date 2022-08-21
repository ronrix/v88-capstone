<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function fetch_all($user_id) {
		return $this->db->query("SELECT * FROM products WHERE user_id=?", $this->security->xss_clean($user_id))->result_array();
	}
	
	public function fetch_all_products() {
		return $this->db->query("SELECT * FROM products")->result_array();
	}

	public function get_product_by_userid($product_id, $user_id) {
		return $this->db->query("SELECT * FROM orders WHERE id=? AND user_id=?", array($this->security->xss_clean($product_id), $user_id))->row_array();
	}

	public function get_product_by_id($product_id) {
		return $this->db->query("SELECT * FROM products WHERE id=?", array($this->security->xss_clean($product_id)))->row_array();
	}

	public function get_order_by_id($id) {
		return $this->db->query("SELECT orders
				FROM orders WHERE id=?"
				, array("'%admin_id: " . $this->security->xss_clean($id)))->row_array();
	}

	/*
		DOCU: this function adds the product
		OWNER: ronrix
	*/ 
	public function add_product($fields, $user_id, $img_paths) {

		// insert the category if category input is filled
		if(!empty($fields["new_category"])) {
			$this->db->query("INSERT INTO categories(category) VALUES(?)", $this->security->xss_clean($fields["new_category"]));
			$category_id = $this->db->insert_id();
		}
		$query = "INSERT INTO products(category_id, user_id, product_name, price, description, inventory_count, images_path)
					VALUES(?, ?, ?, ?, ?, ?, ?)";

		$images = json_encode($img_paths);
		$params = array(
			isset($category_id) ? $category_id : $this->security->xss_clean($fields["category"]),
			$user_id,
			$this->security->xss_clean($fields["product_name"]),
			$this->security->xss_clean($fields["price"]),
			$this->security->xss_clean($fields["description"]),
			$this->security->xss_clean($fields["inventory_count"]),
			$this->security->xss_clean($images),
		);

		$this->db->query($query, $params);
		return $this->db->affected_rows();
	}


	
	public function delete_product($id, $user_id) {
		$params = array(
			$this->security->xss_clean($id),
			$user_id
		);
		$this->db->query("DELETE FROM products WHERE id=? AND user_id=?", $params);
		return $this->db->affected_rows();
	}

}

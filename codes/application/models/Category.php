<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

	/*
		DOCU: this function filters the products based on the category
		OWNER: ronrix
	*/ 
	public function filter_products_by_category($category_id) {
		return $this->db->query("SELECT * 
					FROM products 
					INNER JOIN categories ON products.category_id = categories.id 
					WHERE categories.id = ?
		", $this->security->xss_clean($category_id))->result_array();
	}

	/*
		DOCU: this function gets all the products from the products table
		OWNER: ronrix
	*/ 
	public function fetch_all_products() {
		return $this->db->query("SELECT * FROM products")->result_array();
	}

	/*
		DOCU: this function updates the category, this function invoked on the admin page for adding products
		OWNER: ronrix
	*/ 
	public function update_($cat, $id) {
		$this->db->query("UPDATE categories SET category=? WHERE id=?", array($this->security->xss_clean($cat), $this->security->xss_clean($id)));
		return $this->db->affected_rows();
	}

	/*
		DOCU: this function gets all the categories with the count of the products on each
		OWNER; ronrix
	*/ 
	public function fetch_all_categories() {
		return $this->db->query("SELECT categories.id, categories.category, COUNT(products.id) AS products_count
					FROM products 
					LEFT JOIN categories ON categories.id = products.category_id 
					GROUP BY products.category_id"
		)->result_array();
	}

	/*
		DOCU: this function gets all the products based on the search input
		OWNER: ronrix
	*/ 
	public function search_products($fields) {
		if(!empty($fields["search"])) {
			$query = "SELECT * FROM products WHERE product_name LIKE ?";
			return $this->db->query($query, array("%{$this->security->xss_clean($fields["search"])}%"))->result_array();
		}
		else {
			$query = "SELECT * FROM products";
			return $this->db->query($query)->result_array();
		}
	}

	/*
		DOCU: this function sorts the products by price this is invoked on the catalog page
		OWNER: ronrix
	*/ 
	public function sort_by_price($fields) {
		$order = $fields["sort_by_price"] == 0 ? "ASC" : "DESC";
		
		return $this->db->query("SELECT * FROM products  ORDER BY price $order")->result_array();
	}

}

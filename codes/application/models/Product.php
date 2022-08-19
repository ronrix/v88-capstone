<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function fetch_all($user_id) {
		return $this->db->query("SELECT * FROM products WHERE user_id=?", $this->security->xss_clean($user_id))->result_array();
	}
	
	public function fetch_all_categories() {
		return $this->db->query("SELECT id, category FROM categories")->result_array();
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

	public function get_orders_by_id($id) {
		return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date
				FROM orders 
				WHERE user_id=?", $id)->result_array();
	}

	public function get_order_by_id($id) {
		return $this->db->query("SELECT orders
				FROM orders WHERE id=?"
				, array("'%admin_id: " . $this->security->xss_clean($id)))->row_array();
	}

	private function get_carts_by_id($user_id) {
		return $this->db->query("SELECT * FROM carts WHERE user_id=?", $user_id)->result_array();
	}

	public function add_to_cart($fields, $user_id) {
		$product = $this->get_product_by_id($this->security->xss_clean($fields["product_id"]));		

		$cart = array(
			"admin_id" => $fields["user_id"],
			"item" => $product["product_name"],
			"price" => $product["price"],
			"quantity" => $fields["quantity"],
			"total" => (intval($product["price"]) * intval($fields["quantity"])) + 100,
		);

		$this->db->query("INSERT INTO carts(user_id, product) VALUES(?, ?)", array($user_id, json_encode($cart)));
		return $this->db->affected_rows();
	}

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
			isset($category_id) ? $category_id : $this->security->xss_clean($fields["category_id"]),
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

	public function get_total_price_carts($user_id) {
		$carts = $this->db->query("SELECT product FROM carts WHERE user_id=?", $user_id)->result_array();
		if($carts) {
	
			$total = 0;
			foreach($carts as $cart) {
				$new_cart = json_decode($cart["product"], true);
				$total += $new_cart["price"] * $new_cart["quantity"];
			}
			return $total;
		}
		return 0;
	}

	private function remove_cart($user_id) {
		$this->db->query("DELETE FROM carts WHERE user_id=?", $user_id);
	}


	public function checkout($fields, $user_id) {

		$shipping_info = array(
			"first_name" => $fields["fname"],
			"lasst_name" => $fields["lname"],
			"address" => $fields["addr_1"],
			"address_1" => $fields["addr_2"],
			"city" => $fields["city"],
			"state" => $fields["state"],
			"zipcode" => $fields["zipcode"],
		);

		$billing_info = array(
			"first_name" => $fields["fname_b"],
			"lasst_name" => $fields["lname_b"],
			"address" => $fields["addr_1_b"],
			"address_1" => $fields["addr_2_b"],
			"city" => $fields["city_b"],
			"state" => $fields["state_b"],
			"zipcode" => $fields["zipcode_b"],
		);

		// get carts of the user
		$carts = $this->get_carts_by_id($user_id);

		foreach($carts as $cart) {
			$admin = json_decode($cart["product"], true);
			$params = array(
				$admin["admin_id"],
				$cart["product"],
				json_encode($shipping_info),
				json_encode($billing_info),
				"Order on process",
			);
	
			$this->db->query("INSERT INTO orders(user_id, product_lists, shipping_info, billing_info, order_status) 
				VALUES(?, ?, ?, ?, ?)
			", $params);
		}

		// remove products from carts
		$this->remove_cart($user_id);
		return $this->db->affected_rows();
	}

	private function del($carts, $id) {
		$new_data = array();
		foreach($carts as $a) {
			if($a["product_id"] != $id) {
				array_push($new_data, $a);
			}
		}
		return $new_data;
	}

	public function delete_cart($fields, $user_id) {
		$this->db->query("DELETE FROM carts WHERE id=? AND user_id=?", array($this->security->xss_clean($fields["cart_id"]), $user_id));
		return $this->db->affected_rows();
	}


	public function update_cart_quantity($fields, $user_id) {
		$cart = $this->db->query("SELECT product FROM carts WHERE id=?", $this->security->xss_clean($fields["cart_id"]))->row_array();

		$new_cart = json_decode($cart["product"], true);
		$new_cart["quantity"] = $fields["quantity"];
		
		$params = array(
			json_encode($new_cart),
			$this->security->xss_clean($fields["cart_id"]),
			$user_id
		);

		$this->db->query("UPDATE carts SET product=? WHERE id=? AND user_id=?", $params);
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

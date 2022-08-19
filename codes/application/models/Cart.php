<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->model("Product");
		}
		
		/*
			DOCU: this function get the total price of the whole cart
			OWNER: ronrix
		*/ 
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

		/*
			DOCU: this function removes the cart when checkout is invoked
			OWNER: ronrix
		*/ 
		private function remove_cart($user_id) {
			$this->db->query("DELETE FROM carts WHERE user_id=?", $user_id);
			return $this->db->affected_rows();
		}

		private function get_carts_by_id($user_id) {
			return $this->db->query("SELECT * FROM carts WHERE user_id=?", $user_id)->result_array();
		}
	
		/*
			DOCU: this function is the payment for the carts
			OWNER: ronrix
		*/ 
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
	
	
		/*
			DOCU: this function deletes the cart by user id
			OWNER: ronrix
		*/ 
		public function delete_cart($fields, $user_id) {
			$this->db->query("DELETE FROM carts WHERE id=? AND user_id=?", array($this->security->xss_clean($fields["cart_id"]), $user_id));
			return $this->db->affected_rows();
		}
	
	
		/*
			DOCU: this function updates the cart quantity
			OWNER: ronrix
		*/ 
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
	
		/*
			DOCU: this function adds the product to the cart
			OWNER: ronrix
		*/ 
		public function add_to_cart($fields, $user_id) {
			$product = $this->Product->get_product_by_id($this->security->xss_clean($fields["product_id"]));		

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

	}
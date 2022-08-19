<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

	private function status($i) {
		if($i == 1) {
			return "Order on process";
		}
		else if($i == 2) {
			return "Shipped";
		}
		else if($i == 0) {
			return "ASC";
		}
		else {
			return "Cancelled";
		}
	}

	public function update_order($fields, $user_id) {
		
		$this->db->query("UPDATE orders SET order_status=? WHERE id=? AND user_id=?", 
			array(
				$this->status($this->security->xss_clean($fields["order_status"])), 
				$this->security->xss_clean($fields["order_id"]),
				$user_id
			)
		);
		return $this->db->affected_rows();
	}

	public function filter_orders($fields, $user_id) {

		$filter_query = $this->status(($fields["order_status"])) !== "ASC" ? " AND order_status=? " : " ORDER BY ? "; 
		

		if(!empty($fields["search"])) {
			$query = "SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date FROM orders WHERE user_id=? AND id=? OR JSON_EXTRACT(shipping_info, '$') LIKE ?";
			return $this->db->query($query, 
				array(
					$user_id,
					$this->security->xss_clean($fields["search"]),
					"%". $this->security->xss_clean($fields["search"]) . "%",
				)
			)->result_array();
		}

		return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date FROM orders WHERE user_id=? $filter_query", 
			array(
				$user_id,
				$this->status($this->security->xss_clean($fields["order_status"])), 
			)
		)->result_array();
	}
}

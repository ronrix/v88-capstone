<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Carts extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model("Cart");
			$this->load->model("Dashboard");
		}
		
		/*
			DOCU: this function delete a cart and this invoked in the cart page
			OWNER: ronrix
		*/ 
		public function delete_cart() {
			$fields = $this->input->post(NULL, TRUE);
			if(!empty($fields)) {
				$this->Cart->delete_cart($fields, $this->session->userdata("user_id"));
			}

			$view_data["cart_count"] = $this->session->userdata("cart_count");
			$view_data["user"] = $this->session->userdata("user_id");
			$view_data["name"] = $this->session->userdata("name");
			$res = $this->Dashboard->get_all_carts_by_id($view_data["user"]);
			
			$view_data["carts"] = $res;
			$this->load->view("partials/carts-table", $view_data);
		}

		/*
			DOCU: this function updates the quantity of the product on the cart page
			OWNER: ronrix
		*/ 
		public function update_cart() {
			$fields = $this->input->post(NULL, TRUE);

			$this->Cart->update_cart_quantity($fields, $this->session->userdata("user_id"));

			$view_data["cart_count"] = $this->session->userdata("cart_count");
			$view_data["user"] = $this->session->userdata("user_id");
			$view_data["name"] = $this->session->userdata("name");
			$res = $this->Dashboard->get_all_carts_by_id($view_data["user"]);
			
			$view_data["carts"] = $res;
			$this->load->view("partials/carts-table", $view_data);
		}

		/*
			DOCU: this function get the total price to render on the product page
			OWNER: ronrix
		*/ 
		public function get_total_price() {
			$total = $this->Cart->get_total_price_carts($this->session->userdata("user_id"));
			if($total) {
				echo $total;
			}
			else {
				echo json_encode(array("status" => 500));	
			}
		}

		/* 
			DOCU: this function adds the product to the cart of the user
			OWNER: ronrix
		*/ 
		public function add_to_cart() {

			$fields = $this->input->post(NULL, TRUE);
			$res = $this->Cart->add_to_cart($fields, $this->session->userdata("user_id"));
			
			if($res) {
				header("Content-Type: application/json");
				$cart_count = $this->session->userdata("cart_count");
				$this->session->set_userdata("cart_count", $cart_count + 1);
				echo json_encode(array("status" => 200));
			}
			else {
				header("Content-Type: application/json");
				echo json_encode(array("status" => 500));			
			}
		}

		/*
			DOCU: this function is the payment is placing the order function
				implement the StripeAPI later, if not user has found redirects to /login
			OWNER: ronrix
		*/ 
		public function checkout() {
			$fields = $this->input->post(NULL, TRUE);
			if(!$this->session->userdata("user_id")) {
				redirect("/login");
			}
			if(empty($fields["card"])) {
				echo json_encode(array("status" => 300));	
				return;
			}
			$res = $this->Cart->checkout($fields, $this->session->userdata("user_id"));
			if($res) {
				echo json_encode(array("status" => 200));	
			}
			else {
				echo json_encode(array("status" => 500));	
			}
		}
	}
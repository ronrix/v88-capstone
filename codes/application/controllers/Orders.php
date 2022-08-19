<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Order");
		$this->load->model("Product");
	}

	/*
		DOCU: this function updates the order status from order page
		OWNER: ronrix
	*/ 
	public function update_order() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Order->update_order($fields, $this->session->userdata("user_id"));
		if($res) {
			echo "200";
		}
		else {
			echo "500";
		}
	}

	/*
		DOCU: this function filters the order on the order page form
		OWNER: ronrix
	*/ 
	public function filter_orders() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Order->filter_orders($fields, $this->session->userdata("user_id"));
		$view_data["orders"] = $res;

		$this->load->view("partials/order-table.php", $view_data);
	}

	/*
		DOCU: this function view the show page of the order
		OWNER: ronrix
	*/ 
	public function show_order($id=0) {
		$res = $this->Product->get_product_by_userid($id, $this->session->userdata("user_id"));
		$res["product_lists"] = json_decode($res["product_lists"], true);
		$res["billing_info"] = json_decode($res["billing_info"], true);
		$res["shipping_info"] = json_decode($res["shipping_info"], true);
		$view_data["order"] = $res;
		$this->load->view("dashboard/show", $view_data);
	}


}

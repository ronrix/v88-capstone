<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Dashboard");
		$this->load->model("Product");
		if(!$this->session->userdata("user_id")) {
			redirect("/login");
		}
		$this->is_admin = $this->Dashboard->is_user_admin($this->session->userdata("user_id"));
		if(!$this->is_admin["is_admin"]) {
			$res = $this->Dashboard->get_total_carts_by_id($this->session->userdata("user_id"));
			$this->session->set_userdata("cart_count", $res["total"]);
		}
	}

	public function index() {
		if($this->is_admin["is_admin"] == 1) {
			$res = $this->Product->get_orders_by_id($this->session->userdata("user_id"));

			$view_data["orders"] = $res;
			$this->load->view("dashboard/orders", $view_data);
		}
		else {
			$view_data["user"] = $this->session->userdata("user_id");
			$view_data["name"] = $this->session->userdata("name");
			$view_data["cart_count"] = $this->session->userdata("cart_count");
			$view_data["products"] = $this->Product->fetch_all_products();
			$this->load->view("home", $view_data);
		}
	}

	public function products() {
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["name"] = $this->session->userdata("name");
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["products"] = $this->Product->fetch_all($this->session->userdata("user_id"));
		$view_data["categories"] = $this->Product->fetch_all_categories();
		if($this->is_admin["is_admin"] == 1) {
			$this->load->view("dashboard/products", $view_data);
		}
		else {
			$this->load->view("home", $view_data);
		}
	}

	public function catalog() {
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["name"] = $this->session->userdata("name");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["products"] = $this->Product->fetch_all_products();
		$this->load->view("catalog", $view_data);
	}

	public function cart() {
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["name"] = $this->session->userdata("name");
		$res = $this->Dashboard->get_all_carts_by_id($this->session->userdata("user_id"));

		$view_data["cart_id"] = $res ? $res[0]["id"] : '';
		$view_data["carts"] = $res;
		$view_data["total"] = $this->Product->get_total_price_carts($this->session->userdata("user_id"));
		$this->load->view("cart", $view_data);
	}

	public function cart_count_update() {
		echo $this->session->userdata("cart_count");
	}

}

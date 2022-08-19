<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	/*
		DOCU: this constructor checks if the login user is an admin or not
			and it also get the cart count of the user if ever it is populated
		OWNER: Ronrix
	*/ 
	public function __construct(){
		parent::__construct();
		$this->load->model("Dashboard");
		$this->load->model("Product");
		$this->load->model("Category");
		$this->load->model("Cart");
		if(!$this->session->userdata("user_id")) {
			redirect("/login");
		}
		$this->is_admin = $this->Dashboard->is_user_admin($this->session->userdata("user_id"));
		if(!$this->is_admin["is_admin"]) {
			$res = $this->Dashboard->get_total_carts_by_id($this->session->userdata("user_id"));
			$this->session->set_userdata("cart_count", $res["total"]);
		}
	}

	/*
		DOCU: this function takes the user to their page, if admin it goes to the admin page and 
			if customer user it goes to the home page or catalog.

		OWNER: ronrix
	*/
	public function index() {
		if($this->is_admin["is_admin"] == 1) {
			$res = $this->Product->get_orders_by_id($this->session->userdata("user_id"));

			$view_data["orders"] = $res;
			$view_data["pagination_count"] = count($view_data["orders"])/5;

			$this->load->view("dashboard/orders", $view_data);
		}
		else {
			$view_data["user"] = $this->session->userdata("user_id");
			$view_data["name"] = $this->session->userdata("name");
			$view_data["cart_count"] = $this->session->userdata("cart_count");
			$view_data["products"] = $this->Product->fetch_all_products();
			$view_data["featured_products"] = $view_data["products"];
			$view_data["featured_products"] = array_splice($view_data["featured_products"], 0, 3);

			$this->load->view("home", $view_data);
		}
	}

	/*
		DOCU: this function view the products page when the user is admin, and if customer user it goes to the home page
		OWNER: ronrix
	*/ 
	public function products() {
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["name"] = $this->session->userdata("name");
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["products"] = $this->Product->fetch_all($this->session->userdata("user_id"));
		$view_data["categories"] = $this->Category->fetch_all_categories();
		$view_data["pagination_count"] = count($view_data["products"])/5;
		if($this->is_admin["is_admin"] == 1) {
			$this->load->view("dashboard/products", $view_data);
		}
		else {
			$this->load->view("home", $view_data);
		}
	}

	/*
		DOCU: this function view the catalog page with necessary data
	*/ 
	public function catalog() {
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["name"] = $this->session->userdata("name");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["products"] = $this->Product->fetch_all_products();
		$view_data["pagination_count"] = count($view_data["products"])/5;
		$view_data["categories"] = $this->Category->fetch_all_categories();
		$this->load->view("catalog", $view_data);
	}

	/*
		DOCU: this function view the cart page
		OWNER: ronrix
	*/ 
	public function cart() {
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["name"] = $this->session->userdata("name");
		$res = $this->Dashboard->get_all_carts_by_id($this->session->userdata("user_id"));

		$view_data["cart_id"] = $res ? $res[0]["id"] : '';
		$view_data["carts"] = $res;
		$view_data["total"] = $this->Cart->get_total_price_carts($this->session->userdata("user_id"));
		$this->load->view("cart", $view_data);
	}

	/*
		DOCU: this function gets the count of the cart to show to header of the pages
			when it changes
		OWNER: ronrix
	*/ 
	public function cart_count_update() {
		echo $this->session->userdata("cart_count");
	}

}

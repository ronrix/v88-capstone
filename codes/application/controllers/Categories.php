<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Category");
		$this->load->model("Product");
	}

	/*
		DOCU: this function is invoked on catalog categories button, it filters the products 
		OWNER: ronrix
	*/ 
	public function category($id=0) {
		if(!$id || $id==0) {
			redirect("dashboards");
		}
		$res = $this->Category->filter_products_by_category($id);
		$view_data["products"] = $res;
		$this->load->view("partials/catalog-products", $view_data);
	}

	/*
		DOCU: this function is invoked on show all btn, it gets all the products
		OWNER: ronrix
	*/
	public function show_all() {
		$res = $this->Product->fetch_all_products();
		$view_data["products"] = $res;
		$this->load->view("partials/catalog-products", $view_data);	
	}

	/*
		DOCU: this function is invoked on the search form from catalog page, it filters the products
			on search
		OWNER: ronrix
	*/ 
	public function search() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Category->search_products($fields);
		$view_data["products"] = $res;
		$this->load->view("partials/catalog-products", $view_data);	
	}

	/*
		DOCU: this function is invoked on the search form from catalog page, it filters the products
			on search
		OWNER: ronrix
	*/ 
	public function sort_by_price() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Category->sort_by_price($fields);
		$view_data["products"] = $res;
		$this->load->view("partials/catalog-products", $view_data);	
	}

	public function edit_category($id=0) {
		$res = $this->Category->update_($id);
		if($res) {
			echo "200";
		}
		else {
			echo "500";
		}
	}

	

}

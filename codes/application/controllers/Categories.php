<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Category");
	}

	public function category($id=0) {
		if(!$id || $id==0) {
			redirect("dashboards");
		}
		$res = $this->Category->filter_products_by_category($id);
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

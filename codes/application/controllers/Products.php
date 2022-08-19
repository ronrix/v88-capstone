<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Product");
		$this->load->model("Dashboard");
	}

	public function show($product_id = 0) {
		$view_data["name"] = $this->session->userdata("name");
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["product"] = $this->Product->get_product_by_id($product_id);
		$view_data["imgs"] = json_decode($view_data["product"]["images_path"], true);
		$this->load->view("product-details", $view_data);
	}

	public function categories() {
		$result["categories"] = $this->Product->fetch_all_categories();
		$this->load->view("partials/categories", $result);
	}

	public function products() {
		$result["products"] = $this->Product->fetch_all_products();
		$this->load->view("partials/catalog-products", $result);
	}

	public function add_to_cart() {

		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Product->add_to_cart($fields, $this->session->userdata("user_id"));
		
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

	public function checkout() {
		$fields = $this->input->post(NULL, TRUE);
		if(!$this->session->userdata("user_id")) {
			redirect("/login");
		}
		$res = $this->Product->checkout($fields, $this->session->userdata("user_id"));
		if($res) {
			echo json_encode(array("status" => 200));	
		}
		else {
			echo json_encode(array("status" => 500));	
		}
	}

	public function add() {

	
		// echo "<pre>";
		// var_dump($_FILES);
		// echo "</pre>";
		// die();
		$paths = array();
		$count = count($_FILES['images']['name']);
		for($i=0;$i<$count;$i++){
	  
		  if(!empty($_FILES['images']['name'][$i])){
	  
			$_FILES['file']['name'] = $_FILES['images']['name'][$i];
			$_FILES['file']['type'] = $_FILES['images']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
			$_FILES['file']['error'] = $_FILES['images']['error'][$i];
			$_FILES['file']['size'] = $_FILES['images']['size'][$i];
	
			// file upload
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000';
	 
			$this->load->library('upload',$config); 
            $this->upload->initialize($config);

			if($this->upload->do_upload('file')){
				// return success
				$data = $this->upload->data();
				
				$paths[] =  "uploads/" .$_FILES["images"]["name"][$i];
			}
			else {
				var_dump($this->upload->display_errors());
			}
			
		  }
		}

		// save to db
		$fields = $this->input->post(NULL, TRUE);
		$this->Product->add_product($fields, $this->session->userdata("user_id"), $paths);
		
		redirect("/dashboard/products");
	}


	public function show_order($id=0) {
		$res = $this->Product->get_product_by_userid($id, $this->session->userdata("user_id"));
		$res["product_lists"] = json_decode($res["product_lists"], true);
		$res["billing_info"] = json_decode($res["billing_info"], true);
		$res["shipping_info"] = json_decode($res["shipping_info"], true);
		$view_data["order"] = $res;
		$this->load->view("dashboard/show", $view_data);
	}

	public function delete_cart() {
		$fields = $this->input->post(NULL, TRUE);
		if(!empty($fields)) {
			$this->Product->delete_cart($fields, $this->session->userdata("user_id"));
		}

		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["name"] = $this->session->userdata("name");
		$res = $this->Dashboard->get_all_carts_by_id($view_data["user"]);
		
		$view_data["carts"] = $res;
		$this->load->view("partials/carts-table", $view_data);
	}

	public function update_cart() {
		$fields = $this->input->post(NULL, TRUE);

		$this->Product->update_cart_quantity($fields, $this->session->userdata("user_id"));

		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["name"] = $this->session->userdata("name");
		$res = $this->Dashboard->get_all_carts_by_id($view_data["user"]);
		
		$view_data["carts"] = $res;
		$this->load->view("partials/carts-table", $view_data);
	}

	public function get_total_price() {
		$total = $this->Product->get_total_price_carts($this->session->userdata("user_id"));
		if($total) {
			$view_data["products"] = $this->Product->fetch_all($this->session->userdata("user_id"));
			$this->load->view("partials/products-table", $view_data);
		}
		else {
			echo json_encode(array("status" => 500));	
		}
	}

	public function delete_product() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Product->delete_product($fields["product_id"], $this->session->userdata("user_id"));
		if($res) {
			$view_data["products"] = $this->Product->fetch_all($this->session->userdata("user_id"));
			$this->load->view("partials/products-table", $view_data);
		}
		else {
			echo json_encode(array("status" => 500));	
		}
	}

	public function update_product($id=0) {
		echo "hello";
	}
}

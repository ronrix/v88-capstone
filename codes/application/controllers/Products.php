<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Product");
		$this->load->model("Dashboard");
	}

	/*
		DOCU: this function show the product details of the product
		OWNER: ronrix
	*/ 
	public function show($product_id = 0) {
		$view_data["name"] = $this->session->userdata("name");
		$view_data["cart_count"] = $this->session->userdata("cart_count");
		$view_data["user"] = $this->session->userdata("user_id");
		$view_data["product"] = $this->Product->get_product_by_id($product_id);
		$view_data["imgs"] = json_decode($view_data["product"]["images_path"], true);
		$this->load->view("product-details", $view_data);
	}

	/*
		DOCU: this function gets all the products from the db and render to the catalog page
		OWNER: ronrix
	*/ 
	public function products() {
		$result["products"] = $this->Product->fetch_all_products();
		$this->load->view("partials/catalog-products", $result);
	}


	/*
		DOCU: this function adds the product with the image file that will be stored on the upload folder
			the path of the uploaded image will be stored on the db
		OWNER: ronrix
	*/ 
	public function add() {

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



	/*
		DOCU: this function deletes the product, this is invoked on the products page
		OWNER: ronrix
	*/ 
	public function delete_product() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Product->delete_product($fields["product_id"], $this->session->userdata("user_id"));
		if($res) {
			// $view_data["products"] = $this->Product->fetch_all($this->session->userdata("user_id"));
			// $this->load->view("partials/products-table", $view_data);
			redirect("/dashboards/products");
		}
		else {
			echo json_encode(array("status" => 500));	
		}
	}

	public function update_product($id=0) {
		echo "hello";
	}
}

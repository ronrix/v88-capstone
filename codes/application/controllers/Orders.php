<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Order");
	}

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

	public function filter_orders() {
		$fields = $this->input->post(NULL, TRUE);
		$res = $this->Order->filter_orders($fields, $this->session->userdata("user_id"));
		$view_data["orders"] = $res;

		$this->load->view("partials/order-table.php", $view_data);
	}

}

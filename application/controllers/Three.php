<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Three extends CI_Controller
{
	public function index($identifier)
	{
		$this->load->model('product_model');
		$this->load->model('prices_model');
		$data['header'] = $this->load->view('header', '', true);
		$data['product'] = $this->product_model->getBy('identifier', $identifier);
		if (!empty($data['product'])) {
			$data['prices'] = $this->prices_model->getByProduct($data['product'][0]['id']);
		} else {
			$data['heading'] = 'Error!';
			$data['message'] = '<p>Not found.</p>';
			$this->load->view('errors/html/error_general', $data);
			return;
		}
		$this->load->view('three', $data);
	}
}

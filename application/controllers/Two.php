<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Two extends CI_Controller
{
	public function index()
	{
		$this->load->model('product_model');
		$data['header'] = $this->load->view('header', '', true);
		$data['product'] = $this->product_model->get();
		$this->load->view('two', $data);
	}
}

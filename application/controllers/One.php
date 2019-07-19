<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class One extends CI_Controller
{
	public function index()
	{
		switch ($this->input->server('REQUEST_METHOD')) {
			case 'POST':
				$this->post();
				break;
			case 'GET':
			default:
				$this->get();
				break;
		}
	}

	private function post()
	{
		echo $this->input->post('url');
	}

	private function get()
	{
		$data['header'] = $this->load->view('header', '', true);
		$this->load->view('one', $data);
	}
}

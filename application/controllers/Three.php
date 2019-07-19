<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Three extends CI_Controller
{
	public function index($identifier)
	{
		$this->load->model('product_model');
		$this->load->model('prices_model');
		$this->load->model('comment_model');
		$data['header'] = $this->load->view('header', '', true);
		$data['product'] = $this->product_model->getBy('identifier', $identifier);
		if (!empty($data['product'])) {
			$data['prices'] = $this->prices_model->getByProduct($data['product'][0]['id']);
			$data['comment'] = $this->comment_model->getByProduct($data['product'][0]['id']);
		} else {
			$data['heading'] = 'Error!';
			$data['message'] = '<p>Not found.</p>';
			$this->load->view('errors/html/error_general', $data);
			return;
		}
		$this->load->view('three', $data);
	}

	public function comment($product_id)
	{
		$comment = $this->input->post('comment');
		$this->load->model('comment_model');
		$this->comment_model->insert($product_id, $comment);

		$this->load->model('product_model');
		$product = $this->product_model->getBy('id', $product_id);
		redirect('three/'.$product[0]['identifier']);
	}

	public function upvote($comment_id)
	{
		$this->load->model('comment_model');
		$this->comment_model->upvote($comment_id);
		$comment = $this->comment_model->getById($comment_id);

		$this->load->model('product_model');
		$product = $this->product_model->getBy('id', $comment[0]['product_id']);
		redirect('three/'.$product[0]['identifier']);
	}

	public function downvote($comment_id)
	{
		$this->load->model('comment_model');
		$this->comment_model->downvote($comment_id);
		$comment = $this->comment_model->getById($comment_id);

		$this->load->model('product_model');
		$product = $this->product_model->getBy('id', $comment[0]['product_id']);
		redirect('three/'.$product[0]['identifier']);
	}
}

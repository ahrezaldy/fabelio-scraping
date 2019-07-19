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
		$url = $this->input->post('url');
		$host = parse_url($url, PHP_URL_HOST);
		if ($host !== 'fabelio.com') {
			$this->error('Invalid URL.');
			return;
		}
		$path = parse_url($url, PHP_URL_PATH);
		if (substr($path, 0, strlen('/ip/')) !== '/ip/') {
			$this->error('Invalid Product Page.');
			return;
		}
		libxml_use_internal_errors(true);
		$domDoc = new DOMDocument();
		$domDoc->loadHTMLFile($url);
		$xpath = new DOMXPath($domDoc);
		$numberNode = $xpath->query('//div[@data-product-id]');
		$nameNode = $xpath->query('//span[@class="base"]');
		$descNode = $xpath->query('//div[@id="description"]');
		$priceNode = $xpath->query('//span[@data-price-type="finalPrice"]');

		$this->load->model('product_model');
		$this->load->model('prices_model');
		$identifier = rtrim(ltrim($path, '/ip/'), '.html');
		$number = $numberNode->item(0)->attributes->getNamedItem('data-product-id')->nodeValue;
		$name = $nameNode->item(0)->nodeValue;
		$description = $descNode->item(0)->nodeValue;
		$price = $priceNode->item(0)->attributes->getNamedItem('data-price-amount')->nodeValue;
		$product = $this->product_model->getBy('identifier', $identifier);
		if (!empty($product)) {
			$product_id = $product[0]['id'];
			$this->product_model->updatePriceByIdentifier($identifier, $price);
		} else {
			$product_id = $this->product_model->insert($identifier, $number, $name, $description, $price, $url);
		}
		$this->prices_model->insert($product_id, $price);
		redirect('three/'.$identifier);
	}

	private function error($message)
	{
		$data['heading'] = 'Error!';
		$data['message'] = '<p>'.$message.'</p>';
		$this->load->view('errors/html/error_general', $data);
	}

	private function get()
	{
		$data['header'] = $this->load->view('header', '', true);
		$this->load->view('one', $data);
	}
}

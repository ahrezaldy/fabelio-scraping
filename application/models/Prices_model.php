<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prices_model extends CI_Model
{
    public $product_id, $price, $timestamp;

    public function getByProduct($product_id)
    {
        $query = $this->db->get_where('prices', ['product_id' => $product_id]);
        return $query->result_array();
    }

    public function insert($product_id, $price)
    {
        $this->product_id = (int) $product_id;
        $this->price = (int) $price;
        $this->timestamp = time();

        $this->db->insert('prices', $this);
    }
}

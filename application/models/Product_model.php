<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public $identifier, $number, $name, $description, $price, $images, $url;

    public function get()
    {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function insert($identifier, $number, $name, $description, $price, $images, $url)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->number = $number;
        $this->description = $description;
        $this->price = $price;
        $this->images = serialize($images);
        $this->url = $url;

        $this->db->insert('entries', $this);
    }
}

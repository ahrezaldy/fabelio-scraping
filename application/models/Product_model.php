<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public $identifier, $number, $name, $description, $price, $url;

    public function get()
    {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function getBy($field, $value)
    {
        $query = $this->db->get_where('product', [$field => $value]);
        return $query->result_array();
    }

    public function insert($identifier, $number, $name, $description, $price, $url)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->number = (int) $number;
        $this->description = $description;
        $this->price = (int) $price;
        $this->url = $url;

        $this->db->insert('product', $this);
        return $this->db->insert_id();
    }

    public function updatePriceByIdentifier($identifier, $price)
    {
        $this->db->set('price', $price);
        $this->db->where('identifier', $identifier);
        $this->db->update('product');
    }
}

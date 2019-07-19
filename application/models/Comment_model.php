<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public $product_id, $comment, $upvote, $downvote, $timestamp;

    public function getById($comment_id)
    {
        $query = $this->db->get_where('comment', ['id' => $comment_id]);
        return $query->result_array();
    }

    public function getByProduct($product_id)
    {
        $query = $this->db->get_where('comment', ['product_id' => $product_id]);
        return $query->result_array();
    }

    public function insert($product_id, $comment)
    {
        $this->product_id = (int) $product_id;
        $this->comment = $comment;
        $this->upvote = 0;
        $this->downvote = 0;
        $this->timestamp = time();

        $this->db->insert('comment', $this);
    }

    public function upvote($id)
    {
        $this->db->set('upvote', '`upvote`+1', false);
        $this->db->where('id', $id);
        $this->db->update('comment');
    }

    public function downvote($id)
    {
        $this->db->set('downvote', '`downvote`+1', false);
        $this->db->where('id', $id);
        $this->db->update('comment');
    }
}

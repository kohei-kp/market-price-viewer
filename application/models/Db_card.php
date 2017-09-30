<?php

class Db_card extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($group_id = NULL)
    {
        $this->db->where('group_id', $group_id);
        $query = $this->db->get('card');
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert_batch('card', $data);
    }
}

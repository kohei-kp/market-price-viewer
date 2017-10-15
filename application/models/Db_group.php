<?php

class Db_group extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($group_id = NULL)
    {
        $this->db->where('group_id', $group_id);
        $query = $this->db->get('group');
        return $query->result_array();
    }

    public function get_all()
    {
        $this->db->select('*');
        $query = $this->db->get('group');
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('group', $data);
    }

}

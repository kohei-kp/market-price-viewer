<?php

class Db_group extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * グループを検索する
     *
     * @param array $options
     * @return array
     */
    public function search($options)
    {
        $this->db->select('*');

        if (array_key_exists('group_id', $options))
        {
            $this->db->where('group_id', $options['group_id']);
        }

        return $this->db->get('groups')->result();
    }

    /**
     * グループを追加する
     *
     * @param array $data
     * @return integer $group_id
     */
    public function insert($data)
    {
        $this->db->set($data)->insert('groups');
        return $this->db->insert_id();
    }

    /**
     * グループを更新する
     *
     * @param integer $group_id
     * @param array $data
     * @return integer $group_id
     */
    public function update($group_id, $data)
    {
        $this->db->where('group_id', $group_id);
        $this->db->set($data)->update('groups');

        return $group_id;
    }

    /**
     * グループを削除する
     *
     * @param integer $group_id
     * @return boolean
     */
    public function remove($group_id)
    {
        $this->db->where('group_id', $group_id);
        return $this->db->delete('groups');
    }

}

<?php

class Db_card extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * カードを検索する
     *
     * @param array $options
     * @return array
     */
    public function search($options)
    {
        $this->db->select('*');

        if (array_key_exists('card_id', $options))
        {
            $this->db->where('card_id', $options['card_id']);
        }
        if (array_key_exists('', $options))
        {
            $this->db->where('group_id', $options['group_id']);
        }

        return $this->db->get('cards')->result();
    }

    /**
     * カードを追加する
     *
     * @param array $data
     * @return integer $card_id
     */
    public function insert($data)
    {
        $this->db->set($data)->insert('cards');
        return $this->db->insert_id();
    }

    /**
     * カードを更新する
     *
     * @param integer $card_id
     * @param array $data
     * @return integer $card_id
     */
    public function update($card_id, $data)
    {
        $this->db->where('card_id', $card_id);
        $this->db->set($data)->update('cards');

        return $card_id;
    }

    /**
     * カードを削除する
     *
     * @param integer $card_id
     * @return boolean
     */
    public function remove($card_id)
    {
        $this->db->where('card_id', $card_id);
        return $this->db->delete('cards');
    }
}

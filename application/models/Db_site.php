<?php

class Db_site extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * サイトを検索する
     *
     * @param array $options
     * @return array
     */
    public function search($options)
    {
        $this->db->select('*');

        if (array_key_exists('site_id', $options))
        {
            $this->db->where('site_id', $options['site_id']);
        }

        return $this->db->get('sites')->result();
    }

    /**
     * サイトを追加する
     *
     * @param array $data
     * @return integer $site_id
     */
    public function insert($data)
    {
        $this->db->set($data)->insert('sites');
        return $this->db->insert_id();
    }

    /**
     * サイトを更新する
     *
     * @param integer $site_id
     * @param array $data
     * @return integer $site_id
     */
    public function update($site_id, $data)
    {
        $this->db->where('site_id', $site_id);
        $this->db->set($data)->update('sites');

        return $site_id;
    }

    /**
     * サイトを削除する
     *
     * @param integer $site_id
     * @return boolean
     */
    public function delete($site_id)
    {
        $this->db->where('site_id', $site_id);
        return $this->db->delete('sites');
    }

}

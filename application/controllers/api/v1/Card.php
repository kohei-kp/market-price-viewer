<?php

class Card extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_card');
    }

    /**
     * カードの一覧を取得する
     *
     */
    public function search()
    {
        $options = [];
        if (array_key_exists('group_id', $_POST))
        {
            $options['group_id'] = element('group_id', $_POST);
        }
        if (array_key_exists('card_id', $_POST))
        {
            $options['card_id'] = element('card_id', $_POST);
        }

        $this->response->result = TRUE;
        $this->response->card_list = $this->db_card->search($options);
        $this->output_json();
    }

    /**
     * カードを登録する
     *
     */
    public function create()
    {
        $this->response->result = TRUE;

        $data = [
            'group_id'  => element('groupId', $_POST),
            'card_name' => element('cardname', $_POST),
            'url'       => urldecode(element('url', $_POST)),
            'site_id'   => element('siteId', $_POST)
        ];

        $this->response->card_id = $this->db_card->insert($data);
        $this->output_json();
    }

    /**
     * カードを編集する
     *
     */
    public function edit()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

    /**
     * カードを削除する
     *
     */
    public function delete()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

}

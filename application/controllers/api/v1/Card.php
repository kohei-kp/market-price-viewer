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
        $this->responce->result = TRUE;
        $this->responce->card_list = $this->db_card->search(['group_id' => 1]);
        $this->output_json();
    }

    /**
     * カードを登録する
     *
     */
    public function create()
    {
        $this->responce->result = TRUE;
        $this->output_json();
    }

    /**
     * カードを編集する
     *
     */
    public function edit()
    {
        $this->responce->result = TRUE;
        $this->output_json();
    }

    /**
     * カードを削除する
     *
     */
    public function delete()
    {
        $this->responce->result = TRUE;
        $this->output_json();
    }

}

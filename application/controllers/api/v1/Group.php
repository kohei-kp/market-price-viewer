<?php

class Group extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_group');
    }

    /**
     * 弾一覧を取得する
     *
     */
    public function search()
    {
        $this->responce->result = TRUE;
        $this->responce->group_list = $this->db_group->search([]);
        $this->output_json();
    }

    /**
     * 弾を作成する
     *
     */
    public function create()
    {
        $this->responce = TRUE;
        $this->output_json();
    }

    /**
     * 弾を編集する
     *
     */
    public function edit()
    {
        $this->responce->result = TRUE;
        $this->output_json();
    }

    /**
     * 弾を削除する
     *
     */
    public function delete()
    {
        $this->responce->result = TRUE;
        $this->output_json();
    }

}

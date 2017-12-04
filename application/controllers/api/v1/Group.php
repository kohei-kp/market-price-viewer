<?php

class Group extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_group');
        $this->load->helper('util');
    }

    /**
     * 弾一覧を取得する
     *
     */
    public function search()
    {
        $this->response->result = TRUE;
        $this->response->group_list = $this->db_group->search([]);
        $this->output_json();
    }

    /**
     * 弾を作成する
     *
     */
    public function create()
    {
        $this->response->result = TRUE;

        $commit_date = get_datetime();

        $data = [
            'group_name'  => element('groupname', $_POST),
            'insert_date' => $commit_date,
            'update_date' => $commit_date,
        ];

        $this->response->group_id = $this->db_group->insert($data);
        $this->output_json();
    }

    /**
     * 弾を編集する
     *
     */
    public function edit()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

    /**
     * 弾を削除する
     *
     */
    public function delete()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

}

<?php

class Site extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_site');
        $this->load->helper('util');
    }

    /**
     * サイト一覧を取得する
     *
     */
    public function search()
    {
        $this->response->result = TRUE;
        $this->response->site_list = $this->db_site->search([]);
        $this->output_json();
    }

    /**
     * サイトを登録する
     *
     */
    public function create()
    {
        $this->response->result = TRUE;

        $commit_date = get_datetime();

        $data = [
            'site_name'   => element('sitename', $_POST),
            'site_code'   => element('sitecode', $_POST),
            'insert_date' => $commit_date,
            'update_date' => $commit_date,
        ];

        $this->response->site_id = $this->db_site->insert($data);
    }

    /**
     * サイトを編集する
     *
     */
    public function edit()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

    /**
     * サイトを削除する
     *
     */
    public function delete()
    {
        $this->response->result = TRUE;
        $this->output_json();
    }

}

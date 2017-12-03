<?php

class Site extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_site');
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

        $data = [
            'site_name' => element('sitename', $_POST),
            'site_code' => element('sitecode', $_POST)
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

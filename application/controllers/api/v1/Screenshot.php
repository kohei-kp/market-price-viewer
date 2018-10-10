<?php

class Screenshot extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_card');
        $this->load->model('db_site');
        $this->load->helper('util');
        $this->load->library('lib_screenshot');
    }

    /**
     * 画像を更新する
     *
     */
    public function update()
    {
        $this->response->result = TRUE;

        $commit_date = get_datetime();

        $this->db_site->db->trans_start();

        $site = $this->db_site->search(['site_id' => element('siteId', $_POST)]);

        $objectURL = $this->lib_screenshot->takeScreenshot(
            element('url', $_POST),
            $site[0]->width,
            $site[0]->height,
            $site[0]->top,
            $site[0]->left,
            element('cardId', $_POST)
        );

        $this->db_card->update(
            element('cardId', $_POST),
            [ 
                'update_date' => $commit_date,
                'img_url' => $objectURL
           ]
        );

        $this->db_site->db->trans_complete();

        $this->response->update_date = $commit_date;
        $this->output_json();
    }
}

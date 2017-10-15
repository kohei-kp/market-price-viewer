<?php

class Top extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_group');
    }

    public function index()
    {
        $data['group_data'] = $this->db_group->get_all();

        $this->load->view('common/header', []);
        $this->load->view('top/top', $data);
        $this->load->view('common/footer', []);
    }

}

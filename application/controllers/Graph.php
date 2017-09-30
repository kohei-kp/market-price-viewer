<?php

class Graph extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_card');
    }

    public function index($argument = NULL)
    {

        $data['card_data'] = $this->db_card->get($argument);

        $this->load->view('common/header', []);
        $this->load->view('graph/graph', $data);
        $this->load->view('common/footer', []);
    }
}

<?php

class Group extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header', []);
        $this->load->view('group/group', []);
        $this->load->view('common/footer', []);
    }

}

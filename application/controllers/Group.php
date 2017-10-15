<?php

class Group extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_group');
    }

    public function index()
    {
        $this->load->view('common/header', []);
        $this->load->view('group/group', []);
        $this->load->view('common/footer', []);
    }

    public function create()
    {
        $posts = $this->input->post();
        $data = [
            'group_name' => $posts['group_name']
        ];

        if ($this->db_group->insert($data))
        {
            redirect('top');
        }
    }
}

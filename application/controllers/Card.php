<?php

class Card extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('db_card');
    }

    public function index()
    {
        $this->load->view('common/header', []);
        $this->load->view('card/card', []);
        $this->load->view('common/footer', []);
    }

    public function create()
    {
        $posts = $this->input->post(NULL, TRUE);
        unset($posts['action']);

        $index = 0;
        $data = [];
        foreach ($posts as $key => $value)
        {
            if (preg_match('/card_name/', $key))
            {
                $data[$index]['card_name'] = $value;
            }
            else if (preg_match('/url/', $key))
            {
                $data[$index]['url'] = urldecode($value);
            }
            else if (preg_match('/width/', $key))
            {
                $data[$index]['width'] = $value;
            }
            else if (preg_match('/height/', $key))
            {
                $data[$index]['height'] = $value;
            }
            else if (preg_match('/top/', $key))
            {
                $data[$index]['top'] = $value;
            }
            else if (preg_match('/left/', $key))
            {
                $data[$index]['left'] = $value;
                $data[$index]['group_id'] = 1;
                $index++;
            }
        }

        if ($this->db_card->insert($data))
        {
            redirect('top');
        }
    }
}

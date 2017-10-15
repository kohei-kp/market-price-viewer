<?php

class Card extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model(['db_card', 'db_group']);
    }

    public function index()
    {
        $group_data = [];
        foreach ($this->db_group->get_all() as $group)
        {
            $group_data[$group['group_id']] = $group['group_name'];
        }

        $data = [
            'group_data' => $group_data
        ];

        $this->load->view('common/header', []);
        $this->load->view('card/card', $data);
        $this->load->view('common/footer', []);
    }

    public function create()
    {
        $posts = $this->input->post(NULL, TRUE);
        $group_id = $posts['group_list'];

        unset($posts['action']);
        unset($posts['group_list']);

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
                $data[$index]['group_id'] = $group_id;
                $index++;
            }
        }

        if ($this->db_card->insert($data))
        {
            redirect('top');
        }
    }
}

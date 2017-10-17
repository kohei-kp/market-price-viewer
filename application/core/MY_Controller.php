<?php

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->init_responce();
    }

    /**
     * 出力データの初期化
     *
     */
    public function init_responce()
    {
        $this->responce = (object) [
            'result' => FALSE
        ];
    }

    /**
     * JSONとして出力
     *
     */
    public function output_json()
    {
        $CI =& get_instance();
        $CI->output->set_content_type('application/json');
        $CI->output->set_output(json_encode($this->responce));
        $CI->output->display();
        exit;
    }

}

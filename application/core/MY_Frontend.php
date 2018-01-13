<?php

/**
 * @property  Status_mdl $Status_mdl
 * @property  Page_mdl $Page_mdl
 * @property  User_mdl $User_mdl
 */
class MY_Frontend extends CI_Controller {

    public $content;
    public $language;
    private $layout = "layout";
    private $template = "index";

    public function __construct() {
        parent::__construct();
        $this->benchmark->mark('code_start');
        $this->content['is_rtl'] = false;
        if (($list = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']))) {
            if (preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $list, $list)) {
                $this->language = array_combine($list[1], $list[2]);
                foreach ($this->language as $n => $v)
                    $this->language[$n] = $v ? $v : 1;
                arsort($this->language, SORT_NUMERIC);
            }
        } else $this->language = array();
        
        foreach($this->language as $key => $value)
        {
	        if(strpos($key, 'ar'))
	        {
		        $this->content['is_rtl'] = true;
	        }
        }
    }

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function setLayout($template = 'layout') {
        $this->layout = $template;
    }

    public function renderPage() {
        $data = array("template" => $this->template, "content" => $this->content);
        $this->benchmark->mark('code_end');
        $this->load->view($this->layout, $data);
    }

    public function renderWith($template, $layout = 'layout') {
        $this->setTemplate($template);
        $this->setLayout($layout);
        $this->renderPage();
    }
}

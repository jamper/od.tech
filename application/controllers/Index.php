<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 */
class Index extends MY_Frontend {
    public function __construct(){
        parent::__construct();
        $this->load->model('Category_mdl');
    }

    public function index(){
	    $this->content['Title'] = 'Пожертвования';
	    
	    $this->content['categories'] = $this->Category_mdl->getCategories();
        $this->renderWith('index');
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 */
class Results extends MY_Frontend {
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Category_mdl', 'User_mdl'));
    }

    public function index(){
	    $data = $this->input->post();
	    $userID = $this->User_mdl->insertUser($data);
	    $this->User_mdl->insertUsersCharity($userID, $data);
	    
	    $this->content['categories'] = $this->Category_mdl->getCategoriesByID($data['category']);
	    
	    $this->content['data'] = $data;
	    $this->content['Title'] = 'Результаты пожертвования';
        $this->renderWith('results');
    }
}
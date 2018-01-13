<?php

class User_mdl extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    public function insertUser($data=null)
    {
	    if(!empty($data))
	    {
		    $insert_data['name_first'] = $data['name'];
		    $insert_data['name_last'] = $data['surname'];
		    $insert_data['email'] = $data['email'];
		    $insert_data['charity_perc'] = $data['range'];
		    
			$this->db->insert('users', $insert_data);
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
    }
    public function insertUsersCharity($userID, $data=null)
    {
	    if(!empty($data['category']))
	    {
		    foreach($data['category'] as $item)
		    {
			    $this->db->insert('users_charity', array('user_id' => $userID, 'charity_id' => $item));
		    }
	    }
    }
}
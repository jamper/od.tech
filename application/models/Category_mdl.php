<?php

class Category_mdl extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getCategories() {
	    $query = $this->db->get('charity_categories');
	    return $query->result();
    }
    public function getCategoriesByID($ids = null)
    {
	    if(!empty($ids))
	    {
		    $this->db->where_in('charity_id', $ids);
		    $query = $this->db->get('charity_categories');
			return $query->result();
	    }
    }
}
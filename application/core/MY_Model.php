<?php

/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 28.07.2015
 * Time: 18:35
 */
class MY_Model extends CI_Model {
    public $table = '';
    protected $primary = 'intID';
    protected $return_type = 'object';

    public function __construct($table = '') {
        parent::__construct();
        $this->table = $table;
//        $this->db->_track_aliases($table.' as t');
    }

    public function paginate($limit, $page = 1) {
        $this->db->limit($limit, ($page-1)*$limit);
        return $this;
    }
    
    public function max($field) {
        $this->db->select($field);
        $this->db->select_max($field);
        return $this->db->get($this->table)->row()->$field;
    }

    public function min($field) {
        $this->db->select($field);
        $this->db->select_min($field);
        return $this->db->get($this->table)->row()->$field;
    }

    /**
     * @param null|array $field where clause
     * @return int
     */
    public function count($field = null) {
        $this->db->from($this->table.' as t');
        if (!is_null($field)) $this->db->where($field);
        return $this->db->count_all_results();
    }

    public function listFields() {
        return $this->db->list_fields($this->table);
    }

    public function newestFirst($flag = true) {
        $flag = ($flag)?'DESC':'ASC';
        $this->db->order_by('t.dateCreate', $flag);
        return $this;
    }

    public function erase() {
        $this->db->query('TRUNCATE TABLE '.$this->table);
    }

    public function get($config = null) {
        if ($config != null) {
            if (isset($config['where']))
                $this->db->where($config['where']);
            if (isset($config['where_in'])) {
                $this->db->where_in(key($config['where_in']), reset($config['where_in']));
            }
            if (isset($config['or_where_in'])) {
                $this->db->or_where_in(key($config['or_where_in']), reset($config['or_where_in']));
            }
            if (isset($config['limit']))
                $this->db->limit($config['limit']);
            if (isset($config['offset']))
                $this->db->offset($config['offset']);
            if (isset($config['select']))
                $this->db->select($config['select']);
            else
                $this->db->select('t.*');
            if (isset($config['group_by']))
                $this->db->group_by($config['group_by']);
            if (isset($config['distinct']))
                $this->db->distinct();
            if (isset($config['having']))
                $this->db->having($config['having']);
            if (isset($config['like'])) {
                if (isset($config['like_side']))
                    $this->db->like($config['like'], '', $config['like_side']);
                else
                    $this->db->like($config['like']);
            }
            if (isset($config['or_like'])) {
                if (isset($config['like_side']))
                    $this->db->or_like($config['or_like'], '', $config['like_side']);
                else
                    $this->db->or_like($config['or_like']);
            }
            if (isset($config['order_by'])) {
                if (isset($config['direction']))
                    $this->db->order_by($config['order_by'], $config['direction']);
                else
                    $this->db->order_by($config['order_by'], 'ASC');
            }
        }
        $result = $this->db->get($this->table.' as t')->result();
        if ($result) return $result;
        else return array();
    }

    /**
     * @static
     * @param $id
     * @return stdClass
     */
    public function find($id) {
        $this->db->select('t.*');
        $this->db->where('t.'.$this->primary, $id);
        $this->db->limit(1);
        $data = $this->db->get($this->table . ' as t')->row();
        return $data;
    }

    /**
     * @param string|array $field
     * @param string $value
     * @return stdClass
     */
    public function findBy($field, $value = null) {
        $this->db->select('t.*');
        $this->db->where($field, $value);
        $this->db->limit(1);
        $data = $this->db->get($this->table . ' as t')->row();
        return $data;
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        $p = $this->primary;
        if (isset($data->$p)) {
            $this->db->update($this->table, $data, array($p => $data->$p));
            return $data->$p;
        } elseif (isset($data[$p])) {
            $this->db->update($this->table, $data, array($p => $data[$p]));
            return $data[$p];
        }
        return 0;
    }

    public function save($data) {
        $p = $this->primary;
        if (isset($data->$p) && $data->$p != '') {
            $this->db->update($this->table, $data, array($p => $data->$p));
            return $data->$p;
        } elseif (isset($data[$p]) && $data[$p] != '') {
            $this->db->update($this->table, $data, array($p => $data[$p]));
            return $data[$p];
        } else {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    
    public function remove($id) {
        if(is_array($id)) $this->db->where($id);
        elseif($id) $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }
}
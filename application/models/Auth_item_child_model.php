<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_item_child_model extends CI_Model
{

    public $table = 'auth_item_child';
    public $table2 = 'view_auth_child';
    public $id = 'idc';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }    

    function get_all_view()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table2)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_have($parent,$child)
    {
        $this->db->where('parent', $parent);
        $this->db->where('child', $child);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idc', $q);
	$this->db->or_like('parent', $q);
	$this->db->or_like('child', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idc', $q);
	$this->db->or_like('parent', $q);
	$this->db->or_like('child', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function delete2($id_aunt,$child)
    {
        $this->db->where("id_aunt", $id_aunt);
        $this->db->where("child", $child);
        $this->db->delete($this->table);
    }

}

/* End of file Auth_item_child_model.php */
/* Location: ./application/models/Auth_item_child_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-13 17:37:56 */
/* http://harviacode.com */
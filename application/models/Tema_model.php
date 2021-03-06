<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tema_model extends CI_Model
{

    public $table = 'tema';
    public $id = 'id_tema';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_tema,navbar_bg_color,navbar_font_color,sidebar_bg_color,sidebar_font_color');
        $this->datatables->from('tema');
        //add this line for join
        //$this->datatables->join('table2', 'tema.field = table2.field');
        $this->datatables->add_column('action',anchor(site_url('admin/tema/read/$1'),'Read')." | ".anchor(site_url('admin/tema/update/$1'),'Update'), 'id_tema');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tema', $q);
	$this->db->or_like('navbar_bg_color', $q);
	$this->db->or_like('navbar_font_color', $q);
	$this->db->or_like('sidebar_bg_color', $q);
	$this->db->or_like('sidebar_font_color', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tema', $q);
	$this->db->or_like('navbar_bg_color', $q);
	$this->db->or_like('navbar_font_color', $q);
	$this->db->or_like('sidebar_bg_color', $q);
	$this->db->or_like('sidebar_font_color', $q);
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

}

/* End of file Tema_model.php */
/* Location: ./application/models/Tema_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-03 06:13:00 */
/* http://harviacode.com */
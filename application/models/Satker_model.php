<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satker_model extends CI_Model
{

    public $table = 'v_satker';
    public $table2 = 'tbl_satker';
    public $id = 'id_satker';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_satker,id_user_level,nama_level,satker');
        $this->datatables->from('v_satker');
        //add this line for join
        //$this->datatables->join('table2', 'v_satker.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('satker/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('satker/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
                ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('satker/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), 'id_satker');
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
        $this->db->like('', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('nama_level', $q);
	$this->db->or_like('satker', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('nama_level', $q);
	$this->db->or_like('satker', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table2, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table2, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table2);
    }

}

/* End of file Satker_model.php */
/* Location: ./application/models/Satker_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-06 08:20:08 */
/* http://harviacode.com */
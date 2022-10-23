<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vrafikview_model extends CI_Model
{

    public $table = 'v_grafikview';
    public $id = 'id_satker';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_satker,satker,bulan,status,stket,st0,st1,st2');
        $this->datatables->from('v_grafikview');
        //add this line for join
        //$this->datatables->join('table2', 'v_grafikview.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('vrafikview/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
        //     ".anchor(site_url('vrafikview/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
        //         ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('vrafikview/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), 'id_satker');
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
        $this->db->like('id_satker', $q);
	$this->db->or_like('satker', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('stket', $q);
	$this->db->or_like('st0', $q);
	$this->db->or_like('st1', $q);
	$this->db->or_like('st2', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_satker', $q);
	$this->db->or_like('satker', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('stket', $q);
	$this->db->or_like('st0', $q);
	$this->db->or_like('st1', $q);
	$this->db->or_like('st2', $q);
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

/* End of file Vrafikview_model.php */
/* Location: ./application/models/Vrafikview_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-24 01:26:38 */
/* http://harviacode.com */
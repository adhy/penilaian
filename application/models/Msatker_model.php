<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msatker_model extends CI_Model
{

    public $table = 'v_satker';
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
        $this->datatables->add_column('trc', anchor(site_url('msatker/trc/$1'),'<i class="fa fa-rocket" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')), 'id_satker');
        $this->datatables->add_column('me', anchor(site_url('msatker/monev/$1'),'<i class="fa fa-search" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')), 'id_satker');
        $this->datatables->add_column('grafik', anchor(site_url('msatker/grafik/$1'),'<i class="fa fa-area-chart" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')), 'id_satker');
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
        $this->db->like('id_satker', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('nama_level', $q);
	$this->db->or_like('satker', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    // function insert($data)
    // {
    //     $this->db->insert($this->table, $data);
    // }

    // // update data
    // function update($id, $data)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->update($this->table, $data);
    // }

    // // delete data
    // function delete($id)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->delete($this->table);
    // }

}

/* End of file Msatker_model.php */
/* Location: ./application/models/Msatker_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-09 03:47:39 */
/* http://harviacode.com */
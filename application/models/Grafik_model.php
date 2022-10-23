<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    public $table = 'v_grafik';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_satker,satker,tahun,bulan,s0jan,s1jan,s2jan,stask1,bstask1,s0feb,s1feb,s2feb,stask2,bstask2,s0mar,s1mar,s2mar,stask3,bstask3,s0apr,s1apr,s2apr,stask4,bstask4,s0mei,s1mei,s2mei,stask5,bstask5,s0jun,s1jun,s2jun,stask6,bstask6,s0jul,s1jul,s2jul,stask7,bstask7,s0aug,s1aug,s2aug,stask8,bstask8,s0sept,s1sept,s2sept,stask9,bstask9,s0okt,s1okt,s2okt,stask10,bstask10,s0nov,s1nov,s2nov,stask11,bstask11,s0des,s1des,s2des,stask12,bstask12');
        $this->datatables->from('v_grafik');
        //add this line for join
        //$this->datatables->join('table2', 'v_grafik.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('grafik/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('grafik/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
                ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('grafik/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), '');
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
	$this->db->or_like('satker', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('s0jan', $q);
	$this->db->or_like('s1jan', $q);
	$this->db->or_like('s2jan', $q);
	$this->db->or_like('stask1', $q);
	$this->db->or_like('bstask1', $q);
	$this->db->or_like('s0feb', $q);
	$this->db->or_like('s1feb', $q);
	$this->db->or_like('s2feb', $q);
	$this->db->or_like('stask2', $q);
	$this->db->or_like('bstask2', $q);
	$this->db->or_like('s0mar', $q);
	$this->db->or_like('s1mar', $q);
	$this->db->or_like('s2mar', $q);
	$this->db->or_like('stask3', $q);
	$this->db->or_like('bstask3', $q);
	$this->db->or_like('s0apr', $q);
	$this->db->or_like('s1apr', $q);
	$this->db->or_like('s2apr', $q);
	$this->db->or_like('stask4', $q);
	$this->db->or_like('bstask4', $q);
	$this->db->or_like('s0mei', $q);
	$this->db->or_like('s1mei', $q);
	$this->db->or_like('s2mei', $q);
	$this->db->or_like('stask5', $q);
	$this->db->or_like('bstask5', $q);
	$this->db->or_like('s0jun', $q);
	$this->db->or_like('s1jun', $q);
	$this->db->or_like('s2jun', $q);
	$this->db->or_like('stask6', $q);
	$this->db->or_like('bstask6', $q);
	$this->db->or_like('s0jul', $q);
	$this->db->or_like('s1jul', $q);
	$this->db->or_like('s2jul', $q);
	$this->db->or_like('stask7', $q);
	$this->db->or_like('bstask7', $q);
	$this->db->or_like('s0aug', $q);
	$this->db->or_like('s1aug', $q);
	$this->db->or_like('s2aug', $q);
	$this->db->or_like('stask8', $q);
	$this->db->or_like('bstask8', $q);
	$this->db->or_like('s0sept', $q);
	$this->db->or_like('s1sept', $q);
	$this->db->or_like('s2sept', $q);
	$this->db->or_like('stask9', $q);
	$this->db->or_like('bstask9', $q);
	$this->db->or_like('s0okt', $q);
	$this->db->or_like('s1okt', $q);
	$this->db->or_like('s2okt', $q);
	$this->db->or_like('stask10', $q);
	$this->db->or_like('bstask10', $q);
	$this->db->or_like('s0nov', $q);
	$this->db->or_like('s1nov', $q);
	$this->db->or_like('s2nov', $q);
	$this->db->or_like('stask11', $q);
	$this->db->or_like('bstask11', $q);
	$this->db->or_like('s0des', $q);
	$this->db->or_like('s1des', $q);
	$this->db->or_like('s2des', $q);
	$this->db->or_like('stask12', $q);
	$this->db->or_like('bstask12', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('satker', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('s0jan', $q);
	$this->db->or_like('s1jan', $q);
	$this->db->or_like('s2jan', $q);
	$this->db->or_like('stask1', $q);
	$this->db->or_like('bstask1', $q);
	$this->db->or_like('s0feb', $q);
	$this->db->or_like('s1feb', $q);
	$this->db->or_like('s2feb', $q);
	$this->db->or_like('stask2', $q);
	$this->db->or_like('bstask2', $q);
	$this->db->or_like('s0mar', $q);
	$this->db->or_like('s1mar', $q);
	$this->db->or_like('s2mar', $q);
	$this->db->or_like('stask3', $q);
	$this->db->or_like('bstask3', $q);
	$this->db->or_like('s0apr', $q);
	$this->db->or_like('s1apr', $q);
	$this->db->or_like('s2apr', $q);
	$this->db->or_like('stask4', $q);
	$this->db->or_like('bstask4', $q);
	$this->db->or_like('s0mei', $q);
	$this->db->or_like('s1mei', $q);
	$this->db->or_like('s2mei', $q);
	$this->db->or_like('stask5', $q);
	$this->db->or_like('bstask5', $q);
	$this->db->or_like('s0jun', $q);
	$this->db->or_like('s1jun', $q);
	$this->db->or_like('s2jun', $q);
	$this->db->or_like('stask6', $q);
	$this->db->or_like('bstask6', $q);
	$this->db->or_like('s0jul', $q);
	$this->db->or_like('s1jul', $q);
	$this->db->or_like('s2jul', $q);
	$this->db->or_like('stask7', $q);
	$this->db->or_like('bstask7', $q);
	$this->db->or_like('s0aug', $q);
	$this->db->or_like('s1aug', $q);
	$this->db->or_like('s2aug', $q);
	$this->db->or_like('stask8', $q);
	$this->db->or_like('bstask8', $q);
	$this->db->or_like('s0sept', $q);
	$this->db->or_like('s1sept', $q);
	$this->db->or_like('s2sept', $q);
	$this->db->or_like('stask9', $q);
	$this->db->or_like('bstask9', $q);
	$this->db->or_like('s0okt', $q);
	$this->db->or_like('s1okt', $q);
	$this->db->or_like('s2okt', $q);
	$this->db->or_like('stask10', $q);
	$this->db->or_like('bstask10', $q);
	$this->db->or_like('s0nov', $q);
	$this->db->or_like('s1nov', $q);
	$this->db->or_like('s2nov', $q);
	$this->db->or_like('stask11', $q);
	$this->db->or_like('bstask11', $q);
	$this->db->or_like('s0des', $q);
	$this->db->or_like('s1des', $q);
	$this->db->or_like('s2des', $q);
	$this->db->or_like('stask12', $q);
	$this->db->or_like('bstask12', $q);
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

/* End of file Grafik_model.php */
/* Location: ./application/models/Grafik_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-22 11:56:42 */
/* http://harviacode.com */
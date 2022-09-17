<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rtlstrategi_model extends CI_Model
{

    public $table = 'v_rtl_2';
    public $table2 = 'tbl_monitoring';
    public $table3 = 'v_rtl';
    public $id = 'id_monitoring';
    public $order = 'DESC';
    

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id,$di) {
        $this->datatables->select('id_monitoring,id_satker,satker,id_indikator,indikator,id_analisis,analisis,id_tasks,tasks,bulan,rtl_strategi,potential_blocker,pic,tgl_start,tgl_deadline,tahun');
        $this->datatables->from('v_rtl_2');
        $this->datatables->add_column('bulan', '$1', 'bulanindosys(bulan,&#128197;)');
        $this->datatables->add_column('tgl_deadline', '$1', 'tgl_indo(tgl_deadline)');
        $this->datatables->add_column('indikator', '$1', 'add_symbolg(indikator,Indikator &#10148;,2)');
        $this->datatables->add_column('analisis', '$1', 'add_symbolg(analisis,Analisis &#10149;,2)');
        $this->datatables->add_column('tasks', '$1', 'add_symbolg(tasks,Task &rdca;,2)');
        $this->datatables->where('id_satker', $id);
        $this->datatables->where('tahun', $di);
        //add this line for join
        //$this->datatables->join('table2', 'v_rtl_2.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('rtlstrategi/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
                ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('rtlstrategi/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), 'id_monitoring');
        // $this->datatables->add_column('action', anchor(site_url('rtlstrategi/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
        //     ".anchor(site_url('rtlstrategi/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
        //         ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('rtlstrategi/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), 'id_monitoring');
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
        $this->db->like('id_monitoring', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('satker', $q);
	$this->db->or_like('id_indikator', $q);
	$this->db->or_like('indikator', $q);
	$this->db->or_like('id_analisis', $q);
	$this->db->or_like('analisis', $q);
	$this->db->or_like('id_tasks', $q);
	$this->db->or_like('tasks', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('rtl_strategi', $q);
	$this->db->or_like('potential_blocker', $q);
	$this->db->or_like('pic', $q);
	$this->db->or_like('tgl_start', $q);
	$this->db->or_like('tgl_deadline', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_monitoring', $q);
	$this->db->or_like('id_satker', $q);
	$this->db->or_like('satker', $q);
	$this->db->or_like('id_indikator', $q);
	$this->db->or_like('indikator', $q);
	$this->db->or_like('id_analisis', $q);
	$this->db->or_like('analisis', $q);
	$this->db->or_like('id_tasks', $q);
	$this->db->or_like('tasks', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('rtl_strategi', $q);
	$this->db->or_like('potential_blocker', $q);
	$this->db->or_like('pic', $q);
	$this->db->or_like('tgl_start', $q);
	$this->db->or_like('tgl_deadline', $q);
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
    function gbulan($id)
    {
        $this->db->where($id);
        $this->db->group_by('bulan');
        $this->db->order_by('bulan','ASC');
        $query=$this->db->get($this->table3);
        return $query->result();
    }
    function ganalisis($id)
    {
        $this->db->where($id);
        $this->db->group_by('bulan');
        // $this->db->order_by('bulan','ASC');
        $query=$this->db->get($this->table3);
        return $query->result();
    }
    function gtasks($id)
    {
        $this->db->where($id);
        $this->db->group_by('bulan');
        // $this->db->order_by('bulan','ASC');
        $query=$this->db->get($this->table3);
        return $query->result();
    }

}

/* End of file Rtlstrategi_model.php */
/* Location: ./application/models/Rtlstrategi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-11 04:21:52 */
/* http://harviacode.com */
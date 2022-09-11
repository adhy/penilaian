<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Updatertl_model extends CI_Model
{

    public $table = 'v_rtl_3';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_monitoring,id_satker,satker,id_indikator,indikator,id_analisis,analisis,id_tasks,tasks,bulan,rtl_strategi,potential_blocker,pic,tgl_start,tgl_deadline,tgl_tercapai,upload_bukti,catatan_pic,status');
        $this->datatables->from('v_rtl_3');
        //add this line for join
        //$this->datatables->join('table2', 'v_rtl_3.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('updatertl/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('updatertl/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
                ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('updatertl/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), '');
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
	$this->db->or_like('id_monitoring', $q);
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
	$this->db->or_like('tgl_tercapai', $q);
	$this->db->or_like('upload_bukti', $q);
	$this->db->or_like('catatan_pic', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_monitoring', $q);
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
	$this->db->or_like('tgl_tercapai', $q);
	$this->db->or_like('upload_bukti', $q);
	$this->db->or_like('catatan_pic', $q);
	$this->db->or_like('status', $q);
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

/* End of file Updatertl_model.php */
/* Location: ./application/models/Updatertl_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-11 15:11:43 */
/* http://harviacode.com */
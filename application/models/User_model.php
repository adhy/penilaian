<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'tbl_user';
    public $table2 = 'tbl_satker';
    public $id = 'id_users';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_users,full_name,email,nama_level,is_aktif,satker,jabatan');
        $this->datatables->from('tbl_user');
        $this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        $this->datatables->add_column('jabatan', '$1', 'rename_jabatan(jabatan)');
        //add this line for join
        $this->datatables->join('tbl_user_level', 'tbl_user.id_user_level = tbl_user_level.id_user_level');
        $this->datatables->join('tbl_satker', 'tbl_user.idsatker = tbl_satker.id_satker');
        $this->datatables->add_column('action',anchor(site_url('user/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor('#','<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-href="'.site_url('user/delete/$1').'" data-toggle="modal" data-target="#confirm-delete"'), 'id_users');
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
        $this->db->like('id_users', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('images', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('is_aktif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_users', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('images', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('is_aktif', $q);
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
    function getsatker()
    {  $idL = array('1', '2');
       $this->db->where_not_in('id_user_level', $idL);
        $this->db->order_by('id', $this->order);
        return $this->db->get($this->table2)->result();
    }
    function get_mail($data){
        $this->db->where('email',$data);
        $result=$this->db->get($this->table);
        return $result;
    }
    function get_data($id=null,$di){
        $sql="SELECT
        v_rtl_3.id_satker,
        v_rtl_3.satker,
        v_rtl_3.tahun,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '1' AND id_satker='".$id."') AS s0jan,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '1' AND id_satker='".$id."') AS s1jan,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '1' AND id_satker='".$id."') AS s2jan,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '1' AND id_satker='".$id."') AS stask1,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Jan' ) END ) AS bstask1,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '2' AND id_satker='".$id."') AS s0feb,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '2' AND id_satker='".$id."') AS s1feb,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '2' AND id_satker='".$id."') AS s2feb,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '2' AND id_satker='".$id."') AS stask2,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Feb' ) END ) AS bstask2,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '3' AND id_satker='".$id."') AS s0mar,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '3' AND id_satker='".$id."') AS s1mar,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '3' AND id_satker='".$id."') AS s2mar,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '3' AND id_satker='".$id."') AS stask3,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Mar' ) END ) AS bstask3,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '4' AND id_satker='".$id."') AS s0apr,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '4' AND id_satker='".$id."') AS s1apr,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '4' AND id_satker='".$id."') AS s2apr,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '4' AND id_satker='".$id."') AS stask4,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Apr' ) END ) AS bstask4,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '5' AND id_satker='".$id."') AS s0mei,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '5' AND id_satker='".$id."') AS s1mei,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '5' AND id_satker='".$id."') AS s2mei,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '5' AND id_satker='".$id."') AS stask5,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Mei' ) END ) AS bstask5,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '6' AND id_satker='".$id."') AS s0jun,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '6' AND id_satker='".$id."') AS s1jun,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '6' AND id_satker='".$id."') AS s2jun,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '6' AND id_satker='".$id."') AS stask6,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Jun' ) END ) AS bstask6,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '7' AND id_satker='".$id."') AS s0jul,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '7' AND id_satker='".$id."') AS s1jul,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '7' AND id_satker='".$id."') AS s2jul,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '7' AND id_satker='".$id."') AS stask7,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Jul' ) END ) AS bstask7,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '8' AND id_satker='".$id."') AS s0aug,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '8' AND id_satker='".$id."') AS s1aug,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '8' AND id_satker='".$id."') AS s2aug,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '8' AND id_satker='".$id."') AS stask8,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Aug' ) END ) AS bstask8,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '9' AND id_satker='".$id."') AS s0sep,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '9' AND id_satker='".$id."') AS s1sep,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '9' AND id_satker='".$id."') AS s2sep,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '9' AND id_satker='".$id."') AS stask9,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Sep' ) END ) AS bstask9,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '10' AND id_satker='".$id."') AS s0okt,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '10' AND id_satker='".$id."') AS s1okt,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '10' AND id_satker='".$id."') AS s2okt,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '10' AND id_satker='".$id."') AS stask10,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Okt' ) END ) AS bstask10,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '11' AND id_satker='".$id."' ) AS s0nov,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '11' AND id_satker='".$id."') AS s1nov,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '11' AND id_satker='".$id."') AS s2nov,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '11' AND id_satker='".$id."') AS stask11,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Nov' ) END ) AS bstask11,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '0' AND bulan = '12' AND id_satker='".$id."') AS s0des,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '1' AND bulan = '12' AND id_satker='".$id."') AS s1des,
        ( SELECT COUNT( STATUS ) FROM v_rtl_3 WHERE STATUS = '2' AND bulan = '12' AND id_satker='".$id."') AS s2des,
        ( SELECT COUNT( id_tasks ) FROM v_rtl_3 WHERE bulan = '12' AND id_satker='".$id."') AS stask12,
        ( CASE WHEN bulan IS NOT NULL THEN COALESCE ( 'Des' ) END ) AS bstask12 
    FROM
        v_rtl_3 
    WHERE id_satker='".$id."' AND tahun='".$di."'
    GROUP BY
        v_rtl_3.id_satker ";
        return $this->db->query($sql)->row();
    }



}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 06:32:22 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rtlanjut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rtlanjut_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rtlanjut/v_rtl_list');
    } 
    
    public function json() {
        $this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
         header('Content-Type: application/json');
         echo $this->Rtlanjut_model->json($this->idsatker,$this->tahun);
    }

    public function read($id) 
    {
        $row = $this->Rtlanjut_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tasks' => $row->id_tasks,
		'id_satker' => $row->id_satker,
		'satker' => $row->satker,
		'id_indikator' => $row->id_indikator,
		'indikator' => $row->indikator,
		'id_analisis' => $row->id_analisis,
		'analisis' => $row->analisis,
		'tasks' => $row->tasks,
		'bulan' => $row->bulan,
	    );
            $this->template->load('template','rtlanjut/v_rtl_read', $data);
        } else {
            notif('1');
            redirect(site_url('rtlanjut'));
        }
    }
    public function gbulan() {
        header('Content-Type: application/json');
        $bulan='';
        $inindikator=$this->input->post('indikator');
        $intahun=$this->session->userdata('tahun');
		$inwhere=$this->session->userdata('idsatker');
        $where=array('id_satker'=>$inwhere,'tahun'=>$intahun,'id_indikator'=>$inindikator);
        $Vbulan=$this->Rtlanjut_model->gbulan($where);
        $data[] = array("id"=>'', "text"=>'Enter keywords !');
        if($inindikator!=null){
        foreach($Vbulan as $rows){
            $data[] = array("id"=>$rows->bulan, "text"=>bulanindo($rows->bulan)); 
        }}else{$data[] = array("id"=>'', "text"=>'Enter keywords !');}
        //var_dump( $inindikator,$intahun,$inwhere);
        echo json_encode($data);
    }
    public function ganalisis() {
        header('Content-Type: application/json');
        $bulan='';
        $inindikator=$this->input->post('indikator');
        $inbulan=$this->input->post('bulan');
        $intahun=$this->session->userdata('tahun');
		$inwhere=$this->session->userdata('idsatker');
        $where=array('id_satker'=>$inwhere,'tahun'=>$intahun,'id_indikator'=>$inindikator,'bulan'=>$inbulan);
        $Vbulan=$this->Rtlanjut_model->ganalisis($where);
        $data[] = array("id"=>'', "text"=>'Enter keywords !');
        if($inindikator!=null){
        foreach($Vbulan as $rows){
            $data[] = array("id"=>$rows->id_analisis, "text"=>$rows->analisis); 
        }}else{$data[] = array("id"=>'', "text"=>'Enter keywords !');}
        //var_dump( $inindikator,$intahun,$inwhere);
        echo json_encode($data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('rtlanjut/create_action'),
	    'id_tasks' => set_value('id_tasks'),
	    'indikator' => set_value('indikator'),
	    'tasks' => set_value('tasks'),
	);
        $this->template->load('template','rtlanjut/v_rtl_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tasks' => $this->input->post('id_tasks',TRUE),
		'id_satker' => $this->input->post('satker',TRUE),
		'id_analisis' => $this->input->post('analisis',TRUE),
		'id_analisis' => $this->input->post('analisis',TRUE),
		'tasks' => $this->input->post('tasks',TRUE),
	    );

            $this->Rtlanjut_model->insert($data);
            notif('0');
            redirect(site_url('rtlanjut'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rtlanjut_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
                'action' => site_url('rtlanjut/update_action'),
		'id_tasks' => set_value('id_tasks', $row->id_tasks),
		'satker' => set_value('satker', $row->id_satker),
		'indikator' => set_value('indikator', $row->indikator),
		'bulan' => set_value('bulan', $row->bulan),
		'analisis' => set_value('analisis', $row->analisis),
		'tasks' => set_value('tasks', $row->tasks),
	    );
            $this->template->load('template','rtlanjut/v_rtl_formedit', $data);
        } else {
            notif('1');
            redirect(site_url('rtlanjut'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'tasks' => $this->input->post('tasks',TRUE),
	    );

            $this->Rtlanjut_model->update($this->input->post('id_tasks',TRUE), $data);
            notif('0');
            redirect(site_url('rtlanjut'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rtlanjut_model->get_by_id($id);

        if ($row) {
            $this->Rtlanjut_model->delete($id);
            notif('2');
            redirect(site_url('rtlanjut'));
        } else {
            notif('1');
            redirect(site_url('rtlanjut'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	$this->form_validation->set_rules('analisis', 'analisis', 'trim|required');
	$this->form_validation->set_rules('tasks', 'Strategi', 'trim|required');

	$this->form_validation->set_rules('id_tasks', 'id_tasks', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Rtlanjut.php */
/* Location: ./application/controllers/Rtlanjut.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-10 12:16:31 */
/* http://harviacode.com */
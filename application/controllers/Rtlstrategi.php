<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rtlstrategi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rtlstrategi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rtlstrategi/v_rtl_2_list');
    } 
    
    public function json() {
        $this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
         header('Content-Type: application/json');
         echo $this->Rtlstrategi_model->json($this->idsatker,$this->tahun);
    }

    public function read($id) 
    {
        $row = $this->Rtlstrategi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_monitoring' => $row->id_monitoring,
		'id_satker' => $row->id_satker,
		'satker' => $row->satker,
		'id_indikator' => $row->id_indikator,
		'indikator' => $row->indikator,
		'id_analisis' => $row->id_analisis,
		'analisis' => $row->analisis,
		'id_tasks' => $row->id_tasks,
		'tasks' => $row->tasks,
		'bulan' => $row->bulan,
		'rtl_strategi' => $row->rtl_strategi,
		'potential_blocker' => $row->potential_blocker,
		'pic' => $row->pic,
		'tgl_start' => $row->tgl_start,
		'tgl_deadline' => $row->tgl_deadline,
	    );
            $this->template->load('template','rtlstrategi/v_rtl_2_read', $data);
        } else {
            notif('1');
            redirect(site_url('rtlstrategi'));
        }
    }
	public function gbulan() {
        header('Content-Type: application/json');
        $bulan='';
        $inindikator=$this->input->post('indikator');
        $intahun=$this->session->userdata('tahun');
		$inwhere=$this->session->userdata('idsatker');
        $where=array('id_satker'=>$inwhere,'tahun'=>$intahun,'id_indikator'=>$inindikator);
        $Vbulan=$this->Rtlstrategi_model->gbulan($where);
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
        $Vbulan=$this->Rtlstrategi_model->ganalisis($where);
        $data[] = array("id"=>'', "text"=>'Enter keywords !');
        if($inindikator!=null){
        foreach($Vbulan as $rows){
            $data[] = array("id"=>$rows->id_analisis, "text"=>$rows->analisis); 
        }}else{$data[] = array("id"=>'', "text"=>'Enter keywords !');}
        //var_dump( $inindikator,$intahun,$inwhere);
        echo json_encode($data);
    }
	public function gtasks() {
        header('Content-Type: application/json');
        $bulan='';
        $inindikator=$this->input->post('indikator');
        $inbulan=$this->input->post('bulan');
        $inanalisis=$this->input->post('analisis');
        $intahun=$this->session->userdata('tahun');
		$inwhere=$this->session->userdata('idsatker');
        $where=array('id_satker'=>$inwhere,'tahun'=>$intahun,'id_indikator'=>$inindikator,'bulan'=>$inbulan,'id_analisis'=>$inanalisis);
        $Vbulan=$this->Rtlstrategi_model->ganalisis($where);
        $data[] = array("id"=>'', "text"=>'Enter keywords !');
        if($inindikator!=null){
        foreach($Vbulan as $rows){
            $data[] = array("id"=>$rows->id_tasks, "text"=>$rows->tasks); 
        }}else{$data[] = array("id"=>'', "text"=>'Enter keywords !');}
        //var_dump( $inindikator,$intahun,$inwhere);
        echo json_encode($data);
    }
    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('rtlstrategi/create_action'),
	    'id_monitoring' => set_value('id_monitoring'),
	    'indikator' => set_value('indikator'),
	    'analisis' => set_value('analisis'),
	    'tasks' => set_value('tasks'),
	    'bulan' => set_value('bulan'),
	    'rtl_strategi' => set_value('rtl_strategi'),
	    'potential_blocker' => set_value('potential_blocker'),
	    'pic' => set_value('pic'),
	    'tgl_start' => set_value('tgl_start'),
	    'tgl_deadline' => set_value('tgl_deadline'),
	);
        $this->template->load('template','rtlstrategi/v_rtl_2_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
		$datenow = date("y-m-d");
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $date=$this->input->post('tgl_deadline');
		$deadline = DateTime::createFromFormat('d-F-Y', $date)->format('Y-m-d');
        //$deadline=$deadline->format('Y-m-d');
		//$deadline=$deadline;
            $data = array(
		'id_monitoring' => $this->input->post('id_monitoring',TRUE),
		'id_satker' => $this->input->post('satker',TRUE),
		'id_analisis' => $this->input->post('analisis',TRUE),
		'id_tasks' => $this->input->post('tasks',TRUE),
		'rtl_strategi' => $this->input->post('rtl_strategi',TRUE),
		'potential_blocker' => $this->input->post('potential_blocker',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'tgl_start' => $datenow,
		'tgl_deadline' => $deadline,
	    );

            $this->Rtlstrategi_model->insert($data);
            notif('0');
            redirect(site_url('rtlstrategi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rtlstrategi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('rtlstrategi/update_action'),
		'id_monitoring' => set_value('id_monitoring', $row->id_monitoring),
		'indikator' => set_value('indikator', $row->indikator),
		'analisis' => set_value('analisis', $row->analisis),
		'tasks' => set_value('tasks', $row->tasks),
		'bulan' => set_value('bulan', $row->bulan),
		'rtl_strategi' => set_value('rtl_strategi', $row->rtl_strategi),
		'potential_blocker' => set_value('potential_blocker', $row->potential_blocker),
		'pic' => set_value('pic', $row->pic),
		'tgl_deadline' => set_value('tgl_deadline', $row->tgl_deadline),
	    );
            $this->template->load('template','rtlstrategi/v_rtl_2_formedit', $data);
        } else {
            notif('1');
            redirect(site_url('rtlstrategi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_monitoring', TRUE));
        } else {
		$deadline = DateTime::createFromFormat('d-F-Y', $this->input->post('tgl_deadline',TRUE));
		$deadline=$deadline->format('Y-m-d');
		var_dump($deadline);
            $data = array(
		'id_monitoring' => $this->input->post('id_monitoring',TRUE),
		'rtl_strategi' => $this->input->post('rtl_strategi',TRUE),
		'potential_blocker' => $this->input->post('potential_blocker',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'tgl_deadline' => $deadline,
	    );

            $this->Rtlstrategi_model->update($this->input->post('id_monitoring', TRUE), $data);
            notif('0');
            redirect(site_url('rtlstrategi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rtlstrategi_model->get_by_id($id);

        if ($row) {
            $this->Rtlstrategi_model->delete($id);
            notif('2');
            redirect(site_url('rtlstrategi'));
        } else {
            notif('1');
            redirect(site_url('rtlstrategi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('indikator', 'indikator', 'trim|required');
	$this->form_validation->set_rules('analisis', 'analisis', 'trim|required');
	$this->form_validation->set_rules('tasks', 'tasks', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('rtl_strategi', 'rtl strategi', 'trim|required');
	$this->form_validation->set_rules('potential_blocker', 'potential blocker', 'trim|required');
	$this->form_validation->set_rules('pic', 'pic', 'trim|required');
	$this->form_validation->set_rules('tgl_deadline', 'tgl deadline', 'trim|required');

	$this->form_validation->set_rules('id_monitoring', 'id monitoring', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Rtlstrategi.php */
/* Location: ./application/controllers/Rtlstrategi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-11 04:21:52 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analisis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Analisis_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','analisis/v_analisis_list');
    } 
    
    public function json() {
        $this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
         header('Content-Type: application/json');
         echo $this->Analisis_model->json($this->idsatker,$this->tahun);
    }
    public function gbulan() {
        header('Content-Type: application/json');
        $bulan='';
        $inindikator=$this->input->post('indikator');
        $intahun=$this->session->userdata('tahun');
		$inwhere=$this->session->userdata('idsatker');
        $where=array('id_satker'=>$inwhere,'tahun'=>$intahun,'id_indikator'=>$inindikator);
        $Vbulan=$this->Analisis_model->gbulan($where);
        $data[] = array("id"=>'', "text"=>'Enter keywords !');
        if($inindikator!=null){
        foreach($Vbulan as $rows){
            $data[] = array("id"=>$rows->bulan, "text"=>bulanindo($rows->bulan)); 
        }}else{$data[] = array("id"=>'', "text"=>'Enter keywords !');}
        //var_dump( $inindikator,$intahun,$inwhere);
        echo json_encode($data);
    }

    public function read($id) 
    {
        $row = $this->Analisis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'analisis' => $row->analisis,
		'bulan' => $row->bulan,
		'indikator' => $row->indikator,
		'tahun' => $row->tahun,
	    );
            $this->template->load('template','analisis/v_analisis_read', $data);
        } else {
            notif('1');
            redirect(site_url('analisis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('analisis/create_action'),
	    'id_analisis' => set_value('id_analisis'),
	    'analisis' => set_value('analisis'),
	    'bulan' => set_value('bulan'),
	    'indikator' => set_value('indikator'),
	    'tahun' => set_value('tahun'),
	);
        $this->template->load('template','analisis/v_analisis_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $intahun=$this->session->userdata('tahun');
        $inwhere=$this->session->userdata('idsatker');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_analisis' => $this->input->post('id_analisis',TRUE),
        'id_indikator' => $this->input->post('indikator',TRUE),
        'id_satker' =>  $inwhere,
       
		'analisis' => $this->input->post('analisis',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		
	    );

            $this->Analisis_model->insert($data);
            notif('0');
            redirect(site_url('analisis'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Analisis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbaharui',
                'action' => site_url('analisis/update_action'),
		'id_analisis' => set_value('id_analisis', $row->id_analisis),
		'analisis' => set_value('analisis', $row->analisis),
		'bulan' => set_value('bulan', $row->bulan),
		'indikator' => set_value('indikator', $row->indikator),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->template->load('template','analisis/v_analisis_formedit', $data);
        } else {
            notif('1');
            redirect(site_url('analisis'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_analisis' => $this->input->post('id_analisis',TRUE),
		'analisis' => $this->input->post('analisis',TRUE),
	    );

            $this->Analisis_model->update($this->input->post('id_analisis', TRUE), $data);
            notif('0');
            redirect(site_url('analisis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Analisis_model->get_by_id($id);

        if ($row) {
            $this->Analisis_model->delete($id);
            notif('2');
            redirect(site_url('analisis'));
        } else {
            notif('1');
            redirect(site_url('analisis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('analisis', 'analisis', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('indikator', 'indikator', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim');

	$this->form_validation->set_rules('id_analisis', 'id analisis', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Analisis.php */
/* Location: ./application/controllers/Analisis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-08 16:26:33 */
/* http://harviacode.com */
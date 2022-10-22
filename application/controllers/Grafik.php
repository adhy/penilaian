<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Grafik_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','grafik/v_grafik_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Grafik_model->json();
    }

    public function read($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satker' => $row->id_satker,
		'satker' => $row->satker,
		'tahun' => $row->tahun,
		'bulan' => $row->bulan,
		's0jan' => $row->s0jan,
		's1jan' => $row->s1jan,
		's2jan' => $row->s2jan,
		'stask1' => $row->stask1,
		'bstask1' => $row->bstask1,
		's0feb' => $row->s0feb,
		's1feb' => $row->s1feb,
		's2feb' => $row->s2feb,
		'stask2' => $row->stask2,
		'bstask2' => $row->bstask2,
		's0mar' => $row->s0mar,
		's1mar' => $row->s1mar,
		's2mar' => $row->s2mar,
		'stask3' => $row->stask3,
		'bstask3' => $row->bstask3,
		's0apr' => $row->s0apr,
		's1apr' => $row->s1apr,
		's2apr' => $row->s2apr,
		'stask4' => $row->stask4,
		'bstask4' => $row->bstask4,
		's0mei' => $row->s0mei,
		's1mei' => $row->s1mei,
		's2mei' => $row->s2mei,
		'stask5' => $row->stask5,
		'bstask5' => $row->bstask5,
		's0jun' => $row->s0jun,
		's1jun' => $row->s1jun,
		's2jun' => $row->s2jun,
		'stask6' => $row->stask6,
		'bstask6' => $row->bstask6,
		's0jul' => $row->s0jul,
		's1jul' => $row->s1jul,
		's2jul' => $row->s2jul,
		'stask7' => $row->stask7,
		'bstask7' => $row->bstask7,
		's0aug' => $row->s0aug,
		's1aug' => $row->s1aug,
		's2aug' => $row->s2aug,
		'stask8' => $row->stask8,
		'bstask8' => $row->bstask8,
		's0sept' => $row->s0sept,
		's1sept' => $row->s1sept,
		's2sept' => $row->s2sept,
		'stask9' => $row->stask9,
		'bstask9' => $row->bstask9,
		's0okt' => $row->s0okt,
		's1okt' => $row->s1okt,
		's2okt' => $row->s2okt,
		'stask10' => $row->stask10,
		'bstask10' => $row->bstask10,
		's0nov' => $row->s0nov,
		's1nov' => $row->s1nov,
		's2nov' => $row->s2nov,
		'stask11' => $row->stask11,
		'bstask11' => $row->bstask11,
		's0des' => $row->s0des,
		's1des' => $row->s1des,
		's2des' => $row->s2des,
		'stask12' => $row->stask12,
		'bstask12' => $row->bstask12,
	    );
            $this->template->load('template','grafik/v_grafik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('grafik/create_action'),
	    'id_satker' => set_value('id_satker'),
	    'satker' => set_value('satker'),
	    'tahun' => set_value('tahun'),
	    'bulan' => set_value('bulan'),
	    's0jan' => set_value('s0jan'),
	    's1jan' => set_value('s1jan'),
	    's2jan' => set_value('s2jan'),
	    'stask1' => set_value('stask1'),
	    'bstask1' => set_value('bstask1'),
	    's0feb' => set_value('s0feb'),
	    's1feb' => set_value('s1feb'),
	    's2feb' => set_value('s2feb'),
	    'stask2' => set_value('stask2'),
	    'bstask2' => set_value('bstask2'),
	    's0mar' => set_value('s0mar'),
	    's1mar' => set_value('s1mar'),
	    's2mar' => set_value('s2mar'),
	    'stask3' => set_value('stask3'),
	    'bstask3' => set_value('bstask3'),
	    's0apr' => set_value('s0apr'),
	    's1apr' => set_value('s1apr'),
	    's2apr' => set_value('s2apr'),
	    'stask4' => set_value('stask4'),
	    'bstask4' => set_value('bstask4'),
	    's0mei' => set_value('s0mei'),
	    's1mei' => set_value('s1mei'),
	    's2mei' => set_value('s2mei'),
	    'stask5' => set_value('stask5'),
	    'bstask5' => set_value('bstask5'),
	    's0jun' => set_value('s0jun'),
	    's1jun' => set_value('s1jun'),
	    's2jun' => set_value('s2jun'),
	    'stask6' => set_value('stask6'),
	    'bstask6' => set_value('bstask6'),
	    's0jul' => set_value('s0jul'),
	    's1jul' => set_value('s1jul'),
	    's2jul' => set_value('s2jul'),
	    'stask7' => set_value('stask7'),
	    'bstask7' => set_value('bstask7'),
	    's0aug' => set_value('s0aug'),
	    's1aug' => set_value('s1aug'),
	    's2aug' => set_value('s2aug'),
	    'stask8' => set_value('stask8'),
	    'bstask8' => set_value('bstask8'),
	    's0sept' => set_value('s0sept'),
	    's1sept' => set_value('s1sept'),
	    's2sept' => set_value('s2sept'),
	    'stask9' => set_value('stask9'),
	    'bstask9' => set_value('bstask9'),
	    's0okt' => set_value('s0okt'),
	    's1okt' => set_value('s1okt'),
	    's2okt' => set_value('s2okt'),
	    'stask10' => set_value('stask10'),
	    'bstask10' => set_value('bstask10'),
	    's0nov' => set_value('s0nov'),
	    's1nov' => set_value('s1nov'),
	    's2nov' => set_value('s2nov'),
	    'stask11' => set_value('stask11'),
	    'bstask11' => set_value('bstask11'),
	    's0des' => set_value('s0des'),
	    's1des' => set_value('s1des'),
	    's2des' => set_value('s2des'),
	    'stask12' => set_value('stask12'),
	    'bstask12' => set_value('bstask12'),
	);
        $this->template->load('template','grafik/v_grafik_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_satker' => $this->input->post('id_satker',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		's0jan' => $this->input->post('s0jan',TRUE),
		's1jan' => $this->input->post('s1jan',TRUE),
		's2jan' => $this->input->post('s2jan',TRUE),
		'stask1' => $this->input->post('stask1',TRUE),
		'bstask1' => $this->input->post('bstask1',TRUE),
		's0feb' => $this->input->post('s0feb',TRUE),
		's1feb' => $this->input->post('s1feb',TRUE),
		's2feb' => $this->input->post('s2feb',TRUE),
		'stask2' => $this->input->post('stask2',TRUE),
		'bstask2' => $this->input->post('bstask2',TRUE),
		's0mar' => $this->input->post('s0mar',TRUE),
		's1mar' => $this->input->post('s1mar',TRUE),
		's2mar' => $this->input->post('s2mar',TRUE),
		'stask3' => $this->input->post('stask3',TRUE),
		'bstask3' => $this->input->post('bstask3',TRUE),
		's0apr' => $this->input->post('s0apr',TRUE),
		's1apr' => $this->input->post('s1apr',TRUE),
		's2apr' => $this->input->post('s2apr',TRUE),
		'stask4' => $this->input->post('stask4',TRUE),
		'bstask4' => $this->input->post('bstask4',TRUE),
		's0mei' => $this->input->post('s0mei',TRUE),
		's1mei' => $this->input->post('s1mei',TRUE),
		's2mei' => $this->input->post('s2mei',TRUE),
		'stask5' => $this->input->post('stask5',TRUE),
		'bstask5' => $this->input->post('bstask5',TRUE),
		's0jun' => $this->input->post('s0jun',TRUE),
		's1jun' => $this->input->post('s1jun',TRUE),
		's2jun' => $this->input->post('s2jun',TRUE),
		'stask6' => $this->input->post('stask6',TRUE),
		'bstask6' => $this->input->post('bstask6',TRUE),
		's0jul' => $this->input->post('s0jul',TRUE),
		's1jul' => $this->input->post('s1jul',TRUE),
		's2jul' => $this->input->post('s2jul',TRUE),
		'stask7' => $this->input->post('stask7',TRUE),
		'bstask7' => $this->input->post('bstask7',TRUE),
		's0aug' => $this->input->post('s0aug',TRUE),
		's1aug' => $this->input->post('s1aug',TRUE),
		's2aug' => $this->input->post('s2aug',TRUE),
		'stask8' => $this->input->post('stask8',TRUE),
		'bstask8' => $this->input->post('bstask8',TRUE),
		's0sept' => $this->input->post('s0sept',TRUE),
		's1sept' => $this->input->post('s1sept',TRUE),
		's2sept' => $this->input->post('s2sept',TRUE),
		'stask9' => $this->input->post('stask9',TRUE),
		'bstask9' => $this->input->post('bstask9',TRUE),
		's0okt' => $this->input->post('s0okt',TRUE),
		's1okt' => $this->input->post('s1okt',TRUE),
		's2okt' => $this->input->post('s2okt',TRUE),
		'stask10' => $this->input->post('stask10',TRUE),
		'bstask10' => $this->input->post('bstask10',TRUE),
		's0nov' => $this->input->post('s0nov',TRUE),
		's1nov' => $this->input->post('s1nov',TRUE),
		's2nov' => $this->input->post('s2nov',TRUE),
		'stask11' => $this->input->post('stask11',TRUE),
		'bstask11' => $this->input->post('bstask11',TRUE),
		's0des' => $this->input->post('s0des',TRUE),
		's1des' => $this->input->post('s1des',TRUE),
		's2des' => $this->input->post('s2des',TRUE),
		'stask12' => $this->input->post('stask12',TRUE),
		'bstask12' => $this->input->post('bstask12',TRUE),
	    );

            $this->Grafik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('grafik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('grafik/update_action'),
		'id_satker' => set_value('id_satker', $row->id_satker),
		'satker' => set_value('satker', $row->satker),
		'tahun' => set_value('tahun', $row->tahun),
		'bulan' => set_value('bulan', $row->bulan),
		's0jan' => set_value('s0jan', $row->s0jan),
		's1jan' => set_value('s1jan', $row->s1jan),
		's2jan' => set_value('s2jan', $row->s2jan),
		'stask1' => set_value('stask1', $row->stask1),
		'bstask1' => set_value('bstask1', $row->bstask1),
		's0feb' => set_value('s0feb', $row->s0feb),
		's1feb' => set_value('s1feb', $row->s1feb),
		's2feb' => set_value('s2feb', $row->s2feb),
		'stask2' => set_value('stask2', $row->stask2),
		'bstask2' => set_value('bstask2', $row->bstask2),
		's0mar' => set_value('s0mar', $row->s0mar),
		's1mar' => set_value('s1mar', $row->s1mar),
		's2mar' => set_value('s2mar', $row->s2mar),
		'stask3' => set_value('stask3', $row->stask3),
		'bstask3' => set_value('bstask3', $row->bstask3),
		's0apr' => set_value('s0apr', $row->s0apr),
		's1apr' => set_value('s1apr', $row->s1apr),
		's2apr' => set_value('s2apr', $row->s2apr),
		'stask4' => set_value('stask4', $row->stask4),
		'bstask4' => set_value('bstask4', $row->bstask4),
		's0mei' => set_value('s0mei', $row->s0mei),
		's1mei' => set_value('s1mei', $row->s1mei),
		's2mei' => set_value('s2mei', $row->s2mei),
		'stask5' => set_value('stask5', $row->stask5),
		'bstask5' => set_value('bstask5', $row->bstask5),
		's0jun' => set_value('s0jun', $row->s0jun),
		's1jun' => set_value('s1jun', $row->s1jun),
		's2jun' => set_value('s2jun', $row->s2jun),
		'stask6' => set_value('stask6', $row->stask6),
		'bstask6' => set_value('bstask6', $row->bstask6),
		's0jul' => set_value('s0jul', $row->s0jul),
		's1jul' => set_value('s1jul', $row->s1jul),
		's2jul' => set_value('s2jul', $row->s2jul),
		'stask7' => set_value('stask7', $row->stask7),
		'bstask7' => set_value('bstask7', $row->bstask7),
		's0aug' => set_value('s0aug', $row->s0aug),
		's1aug' => set_value('s1aug', $row->s1aug),
		's2aug' => set_value('s2aug', $row->s2aug),
		'stask8' => set_value('stask8', $row->stask8),
		'bstask8' => set_value('bstask8', $row->bstask8),
		's0sept' => set_value('s0sept', $row->s0sept),
		's1sept' => set_value('s1sept', $row->s1sept),
		's2sept' => set_value('s2sept', $row->s2sept),
		'stask9' => set_value('stask9', $row->stask9),
		'bstask9' => set_value('bstask9', $row->bstask9),
		's0okt' => set_value('s0okt', $row->s0okt),
		's1okt' => set_value('s1okt', $row->s1okt),
		's2okt' => set_value('s2okt', $row->s2okt),
		'stask10' => set_value('stask10', $row->stask10),
		'bstask10' => set_value('bstask10', $row->bstask10),
		's0nov' => set_value('s0nov', $row->s0nov),
		's1nov' => set_value('s1nov', $row->s1nov),
		's2nov' => set_value('s2nov', $row->s2nov),
		'stask11' => set_value('stask11', $row->stask11),
		'bstask11' => set_value('bstask11', $row->bstask11),
		's0des' => set_value('s0des', $row->s0des),
		's1des' => set_value('s1des', $row->s1des),
		's2des' => set_value('s2des', $row->s2des),
		'stask12' => set_value('stask12', $row->stask12),
		'bstask12' => set_value('bstask12', $row->bstask12),
	    );
            $this->template->load('template','grafik/v_grafik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_satker' => $this->input->post('id_satker',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		's0jan' => $this->input->post('s0jan',TRUE),
		's1jan' => $this->input->post('s1jan',TRUE),
		's2jan' => $this->input->post('s2jan',TRUE),
		'stask1' => $this->input->post('stask1',TRUE),
		'bstask1' => $this->input->post('bstask1',TRUE),
		's0feb' => $this->input->post('s0feb',TRUE),
		's1feb' => $this->input->post('s1feb',TRUE),
		's2feb' => $this->input->post('s2feb',TRUE),
		'stask2' => $this->input->post('stask2',TRUE),
		'bstask2' => $this->input->post('bstask2',TRUE),
		's0mar' => $this->input->post('s0mar',TRUE),
		's1mar' => $this->input->post('s1mar',TRUE),
		's2mar' => $this->input->post('s2mar',TRUE),
		'stask3' => $this->input->post('stask3',TRUE),
		'bstask3' => $this->input->post('bstask3',TRUE),
		's0apr' => $this->input->post('s0apr',TRUE),
		's1apr' => $this->input->post('s1apr',TRUE),
		's2apr' => $this->input->post('s2apr',TRUE),
		'stask4' => $this->input->post('stask4',TRUE),
		'bstask4' => $this->input->post('bstask4',TRUE),
		's0mei' => $this->input->post('s0mei',TRUE),
		's1mei' => $this->input->post('s1mei',TRUE),
		's2mei' => $this->input->post('s2mei',TRUE),
		'stask5' => $this->input->post('stask5',TRUE),
		'bstask5' => $this->input->post('bstask5',TRUE),
		's0jun' => $this->input->post('s0jun',TRUE),
		's1jun' => $this->input->post('s1jun',TRUE),
		's2jun' => $this->input->post('s2jun',TRUE),
		'stask6' => $this->input->post('stask6',TRUE),
		'bstask6' => $this->input->post('bstask6',TRUE),
		's0jul' => $this->input->post('s0jul',TRUE),
		's1jul' => $this->input->post('s1jul',TRUE),
		's2jul' => $this->input->post('s2jul',TRUE),
		'stask7' => $this->input->post('stask7',TRUE),
		'bstask7' => $this->input->post('bstask7',TRUE),
		's0aug' => $this->input->post('s0aug',TRUE),
		's1aug' => $this->input->post('s1aug',TRUE),
		's2aug' => $this->input->post('s2aug',TRUE),
		'stask8' => $this->input->post('stask8',TRUE),
		'bstask8' => $this->input->post('bstask8',TRUE),
		's0sept' => $this->input->post('s0sept',TRUE),
		's1sept' => $this->input->post('s1sept',TRUE),
		's2sept' => $this->input->post('s2sept',TRUE),
		'stask9' => $this->input->post('stask9',TRUE),
		'bstask9' => $this->input->post('bstask9',TRUE),
		's0okt' => $this->input->post('s0okt',TRUE),
		's1okt' => $this->input->post('s1okt',TRUE),
		's2okt' => $this->input->post('s2okt',TRUE),
		'stask10' => $this->input->post('stask10',TRUE),
		'bstask10' => $this->input->post('bstask10',TRUE),
		's0nov' => $this->input->post('s0nov',TRUE),
		's1nov' => $this->input->post('s1nov',TRUE),
		's2nov' => $this->input->post('s2nov',TRUE),
		'stask11' => $this->input->post('stask11',TRUE),
		'bstask11' => $this->input->post('bstask11',TRUE),
		's0des' => $this->input->post('s0des',TRUE),
		's1des' => $this->input->post('s1des',TRUE),
		's2des' => $this->input->post('s2des',TRUE),
		'stask12' => $this->input->post('stask12',TRUE),
		'bstask12' => $this->input->post('bstask12',TRUE),
	    );

            $this->Grafik_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grafik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grafik_model->get_by_id($id);

        if ($row) {
            $this->Grafik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grafik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grafik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('s0jan', 's0jan', 'trim|required');
	$this->form_validation->set_rules('s1jan', 's1jan', 'trim|required');
	$this->form_validation->set_rules('s2jan', 's2jan', 'trim|required');
	$this->form_validation->set_rules('stask1', 'stask1', 'trim|required');
	$this->form_validation->set_rules('bstask1', 'bstask1', 'trim|required');
	$this->form_validation->set_rules('s0feb', 's0feb', 'trim|required');
	$this->form_validation->set_rules('s1feb', 's1feb', 'trim|required');
	$this->form_validation->set_rules('s2feb', 's2feb', 'trim|required');
	$this->form_validation->set_rules('stask2', 'stask2', 'trim|required');
	$this->form_validation->set_rules('bstask2', 'bstask2', 'trim|required');
	$this->form_validation->set_rules('s0mar', 's0mar', 'trim|required');
	$this->form_validation->set_rules('s1mar', 's1mar', 'trim|required');
	$this->form_validation->set_rules('s2mar', 's2mar', 'trim|required');
	$this->form_validation->set_rules('stask3', 'stask3', 'trim|required');
	$this->form_validation->set_rules('bstask3', 'bstask3', 'trim|required');
	$this->form_validation->set_rules('s0apr', 's0apr', 'trim|required');
	$this->form_validation->set_rules('s1apr', 's1apr', 'trim|required');
	$this->form_validation->set_rules('s2apr', 's2apr', 'trim|required');
	$this->form_validation->set_rules('stask4', 'stask4', 'trim|required');
	$this->form_validation->set_rules('bstask4', 'bstask4', 'trim|required');
	$this->form_validation->set_rules('s0mei', 's0mei', 'trim|required');
	$this->form_validation->set_rules('s1mei', 's1mei', 'trim|required');
	$this->form_validation->set_rules('s2mei', 's2mei', 'trim|required');
	$this->form_validation->set_rules('stask5', 'stask5', 'trim|required');
	$this->form_validation->set_rules('bstask5', 'bstask5', 'trim|required');
	$this->form_validation->set_rules('s0jun', 's0jun', 'trim|required');
	$this->form_validation->set_rules('s1jun', 's1jun', 'trim|required');
	$this->form_validation->set_rules('s2jun', 's2jun', 'trim|required');
	$this->form_validation->set_rules('stask6', 'stask6', 'trim|required');
	$this->form_validation->set_rules('bstask6', 'bstask6', 'trim|required');
	$this->form_validation->set_rules('s0jul', 's0jul', 'trim|required');
	$this->form_validation->set_rules('s1jul', 's1jul', 'trim|required');
	$this->form_validation->set_rules('s2jul', 's2jul', 'trim|required');
	$this->form_validation->set_rules('stask7', 'stask7', 'trim|required');
	$this->form_validation->set_rules('bstask7', 'bstask7', 'trim|required');
	$this->form_validation->set_rules('s0aug', 's0aug', 'trim|required');
	$this->form_validation->set_rules('s1aug', 's1aug', 'trim|required');
	$this->form_validation->set_rules('s2aug', 's2aug', 'trim|required');
	$this->form_validation->set_rules('stask8', 'stask8', 'trim|required');
	$this->form_validation->set_rules('bstask8', 'bstask8', 'trim|required');
	$this->form_validation->set_rules('s0sept', 's0sept', 'trim|required');
	$this->form_validation->set_rules('s1sept', 's1sept', 'trim|required');
	$this->form_validation->set_rules('s2sept', 's2sept', 'trim|required');
	$this->form_validation->set_rules('stask9', 'stask9', 'trim|required');
	$this->form_validation->set_rules('bstask9', 'bstask9', 'trim|required');
	$this->form_validation->set_rules('s0okt', 's0okt', 'trim|required');
	$this->form_validation->set_rules('s1okt', 's1okt', 'trim|required');
	$this->form_validation->set_rules('s2okt', 's2okt', 'trim|required');
	$this->form_validation->set_rules('stask10', 'stask10', 'trim|required');
	$this->form_validation->set_rules('bstask10', 'bstask10', 'trim|required');
	$this->form_validation->set_rules('s0nov', 's0nov', 'trim|required');
	$this->form_validation->set_rules('s1nov', 's1nov', 'trim|required');
	$this->form_validation->set_rules('s2nov', 's2nov', 'trim|required');
	$this->form_validation->set_rules('stask11', 'stask11', 'trim|required');
	$this->form_validation->set_rules('bstask11', 'bstask11', 'trim|required');
	$this->form_validation->set_rules('s0des', 's0des', 'trim|required');
	$this->form_validation->set_rules('s1des', 's1des', 'trim|required');
	$this->form_validation->set_rules('s2des', 's2des', 'trim|required');
	$this->form_validation->set_rules('stask12', 'stask12', 'trim|required');
	$this->form_validation->set_rules('bstask12', 'bstask12', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-22 11:56:42 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Realisasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','realisasi/v_realisasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Realisasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'indikator' => $row->indikator,
		'tahun' => $row->tahun,
		'bulan' => $row->bulan,
		'target' => $row->target,
		'realisasi' => $row->realisasi,
		'capaian' => $row->capaian,
	    );
            $this->template->load('template','realisasi/v_realisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }

    public function create($id) 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('realisasi/create_action'),
	    'id_target' => set_value('id_target'),
	    'id_indikator' => set_value('id_indikator'),
	    'indikator' => set_value('indikator'),
	    'tahun' => set_value('tahun'),
	    'id_satker' => set_value('id_satker'),
	    'id_users' => set_value('id_users'),
	    'bulan' => set_value('bulan'),
	    'target' => set_value('target'),
	    'realisasi' => set_value('realisasi'),
	    'capaian' => set_value('capaian'),
	);
        $this->template->load('template','realisasi/v_realisasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_target', TRUE));
        } else {
            $data = array(
		'id_target' => $this->input->post('id_target',TRUE),
		'id_indikator' => $this->input->post('id_indikator',TRUE),
		'indikator' => $this->input->post('indikator',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'id_satker' => $this->input->post('id_satker',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'target' => $this->input->post('target',TRUE),
		'realisasi' => $this->input->post('realisasi',TRUE),
		'capaian' => $this->input->post('capaian',TRUE),
	    );

            $this->Realisasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('realisasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('realisasi/update_action'),
		'id_target' => set_value('id_target', $row->id_target),
		'indikator' => set_value('indikator', $row->indikator),
		'tahun' => set_value('tahun', $row->tahun),
		'bulan' => set_value('bulan', $row->bulan),
		'target' => set_value('target', $row->target),
		'realisasi' => set_value('realisasi', $row->realisasi),
	    );
            $this->template->load('template','realisasi/v_realisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_target', TRUE));
        } else {
        $target     =$this->input->post('target2',TRUE);
        $realisasi  =$this->input->post('realisasi',TRUE);
        $capaian    =($realisasi/$target)*100;
        //var_dump($capaian);
            $data = array(
		'realisasi' => $realisasi,
		'capaian' => $capaian,
	    );

            $this->Realisasi_model->update($this->input->post('id_target', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('realisasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Realisasi_model->get_by_id($id);

        if ($row) {
            $this->Realisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('realisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realisasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('target', 'target', 'trim|numeric');
	$this->form_validation->set_rules('realisasi', 'realisasi', 'trim|required|numeric');

	$this->form_validation->set_rules('id_target', 'id target', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Realisasi.php */
/* Location: ./application/controllers/Realisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-08 01:14:12 */
/* http://harviacode.com */
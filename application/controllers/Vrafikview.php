<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vrafikview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Vrafikview_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','vrafikview/v_grafikview_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Vrafikview_model->json();
    }

    public function read($id) 
    {
        $row = $this->Vrafikview_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satker' => $row->id_satker,
		'satker' => $row->satker,
		'bulan' => $row->bulan,
		'status' => $row->status,
		'stket' => $row->stket,
		'st0' => $row->st0,
		'st1' => $row->st1,
		'st2' => $row->st2,
	    );
            $this->template->load('template','vrafikview/v_grafikview_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vrafikview'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('vrafikview/create_action'),
	    'id_satker' => set_value('id_satker'),
	    'satker' => set_value('satker'),
	    'bulan' => set_value('bulan'),
	    'status' => set_value('status'),
	    'stket' => set_value('stket'),
	    'st0' => set_value('st0'),
	    'st1' => set_value('st1'),
	    'st2' => set_value('st2'),
	);
        $this->template->load('template','vrafikview/v_grafikview_form', $data);
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
		'bulan' => $this->input->post('bulan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'stket' => $this->input->post('stket',TRUE),
		'st0' => $this->input->post('st0',TRUE),
		'st1' => $this->input->post('st1',TRUE),
		'st2' => $this->input->post('st2',TRUE),
	    );

            $this->Vrafikview_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('vrafikview'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Vrafikview_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('vrafikview/update_action'),
		'id_satker' => set_value('id_satker', $row->id_satker),
		'satker' => set_value('satker', $row->satker),
		'bulan' => set_value('bulan', $row->bulan),
		'status' => set_value('status', $row->status),
		'stket' => set_value('stket', $row->stket),
		'st0' => set_value('st0', $row->st0),
		'st1' => set_value('st1', $row->st1),
		'st2' => set_value('st2', $row->st2),
	    );
            $this->template->load('template','vrafikview/v_grafikview_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vrafikview'));
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
		'bulan' => $this->input->post('bulan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'stket' => $this->input->post('stket',TRUE),
		'st0' => $this->input->post('st0',TRUE),
		'st1' => $this->input->post('st1',TRUE),
		'st2' => $this->input->post('st2',TRUE),
	    );

            $this->Vrafikview_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('vrafikview'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Vrafikview_model->get_by_id($id);

        if ($row) {
            $this->Vrafikview_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vrafikview'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vrafikview'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('stket', 'stket', 'trim|required');
	$this->form_validation->set_rules('st0', 'st0', 'trim|required');
	$this->form_validation->set_rules('st1', 'st1', 'trim|required');
	$this->form_validation->set_rules('st2', 'st2', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Vrafikview.php */
/* Location: ./application/controllers/Vrafikview.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-24 01:26:38 */
/* http://harviacode.com */
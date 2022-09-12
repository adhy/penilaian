<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Target extends CI_Controller
{
    Public $idsatker;
    Public $tahun;
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Target_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    
    }

    public function index()
    {
        $this->template->load('template','target/v_target_list');
    } 
    
    public function json() {
        $this->tahun=$this->session->userdata('tahun');
       // var_dump($this->tahun);
        $iduser= $this->session->userdata('id_users');
        if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
        header('Content-Type: application/json');
        echo $this->Target_model->json($this->idsatker,$this->tahun);
    }

    public function read($id) 
    {
        $row = $this->Target_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_target' => $row->id_target,
		'id_indikator' => $row->id_indikator,
		'indikator' => $row->indikator,
		'tahun' => $row->tahun,
		'id_satker' => $row->id_satker,
		'id_users' => $row->id_users,
		'bulan' => bulanindo($row->bulan),
		'target' => $row->target,
	    );
            $this->template->load('template','target/v_target_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('target/create_action'),
	    'id_target' => set_value('id_target'),
	    'id_indikator' => set_value('id_indikator'),
	    'indikator' => set_value('indikator'),
	    'bulan' => set_value('bulan'),
	    'target' => set_value('target'),
	);
        $this->template->load('template','target/v_target_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_indikator' => $this->input->post('indikator',TRUE),
		'id_satker' => $this->session->userdata('idsatker'),
		'bulan' => $this->input->post('bulan',TRUE),
		'target' => $this->input->post('target',TRUE),
		'realisasi' => 0,
		'capaian' => 0,
	    );
        //var_dump($data);

           $this->Target_model->insert($data);
           // if(!$insert){$error = $this->db->error(); echo $error;}else{ echo "SUCCESSFULLY INSERTED ITEM";}
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('target'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Target_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('target/update_action'),
		'id_target' => set_value('id_target', $row->id_target),
		'id_indikator' => set_value('indikator', $row->id_indikator),
		'bulan' => set_value('bulan', $row->bulan),
		'target' => set_value('target', $row->target),
	    );
            $this->template->load('template','target/v_target_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_indikator' => $this->input->post('indikator',TRUE),
		'id_satker' => $this->session->userdata('idsatker'),
		'bulan' => $this->input->post('bulan',TRUE),
		'target' => $this->input->post('target',TRUE),
	    );

            $this->Target_model->update($this->input->post('id_target', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('target'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Target_model->get_by_id($id);

        if ($row) {
            $this->Target_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('target'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('indikator', 'indikator', 'trim|required');

	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('target', 'target', 'trim|required|numeric');

	$this->form_validation->set_rules('id_target', 'id target', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Target.php */
/* Location: ./application/controllers/Target.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-06 14:33:42 */
/* http://harviacode.com */
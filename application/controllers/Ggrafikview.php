<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ggrafikview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ggrafikview_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','ggrafikview/v_grafikview_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ggrafikview_model->json();
    }

    public function read($id) 
    {
        $row = $this->Ggrafikview_model->get_by_id($id);
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
		'total' => $row->total,
	    );
            $this->template->load('template','ggrafikview/v_grafikview_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ggrafikview'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('ggrafikview/create_action'),
	    'id_satker' => set_value('id_satker'),
	    'satker' => set_value('satker'),
	    'bulan' => set_value('bulan'),
	    'status' => set_value('status'),
	    'stket' => set_value('stket'),
	    'st0' => set_value('st0'),
	    'st1' => set_value('st1'),
	    'st2' => set_value('st2'),
	    'total' => set_value('total'),
	);
        $this->template->load('template','ggrafikview/v_grafikview_form', $data);
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
		'total' => $this->input->post('total',TRUE),
	    );

            $this->Ggrafikview_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ggrafikview'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ggrafikview_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('ggrafikview/update_action'),
		'id_satker' => set_value('id_satker', $row->id_satker),
		'satker' => set_value('satker', $row->satker),
		'bulan' => set_value('bulan', $row->bulan),
		'status' => set_value('status', $row->status),
		'stket' => set_value('stket', $row->stket),
		'st0' => set_value('st0', $row->st0),
		'st1' => set_value('st1', $row->st1),
		'st2' => set_value('st2', $row->st2),
		'total' => set_value('total', $row->total),
	    );
            $this->template->load('template','ggrafikview/v_grafikview_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ggrafikview'));
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
		'total' => $this->input->post('total',TRUE),
	    );

            $this->Ggrafikview_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ggrafikview'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ggrafikview_model->get_by_id($id);

        if ($row) {
            $this->Ggrafikview_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ggrafikview'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ggrafikview'));
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
	$this->form_validation->set_rules('total', 'total', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_grafikview.xls";
        $judul = "v_grafikview";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Stket");
	xlsWriteLabel($tablehead, $kolomhead++, "St0");
	xlsWriteLabel($tablehead, $kolomhead++, "St1");
	xlsWriteLabel($tablehead, $kolomhead++, "St2");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");

	foreach ($this->Ggrafikview_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_satker);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satker);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bulan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->stket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->st0);
	    xlsWriteLabel($tablebody, $kolombody++, $data->st1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->st2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ggrafikview.php */
/* Location: ./application/controllers/Ggrafikview.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-01 17:57:34 */
/* http://harviacode.com */
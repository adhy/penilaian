<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pelaporan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pelaporan/v_pelaporan_list');
    } 
    
    public function json() {
        $this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
         header('Content-Type: application/json');
         echo $this->Pelaporan_model->json($this->idsatker,$this->tahun);
    }

    // public function read($id) 
    // {
    //     $row = $this->Pelaporan_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
	// 	'id_indikator' => $row->id_indikator,
	// 	'tahun' => $row->tahun,
	// 	'indikator' => $row->indikator,
	// 	'bulan' => $row->bulan,
	// 	'target' => $row->target,
	// 	'realisasi' => $row->realisasi,
	// 	'capaian' => $row->capaian,
	// 	'id_satker' => $row->id_satker,
	// 	'satker' => $row->satker,
	//     );
    //         $this->template->load('template','pelaporan/v_pelaporan_read', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('pelaporan'));
    //     }
    // }

    // public function create() 
    // {
    //     $data = array(
    //         'button' => 'Simpan',
    //         'action' => site_url('pelaporan/create_action'),
	//     'id_indikator' => set_value('id_indikator'),
	//     'tahun' => set_value('tahun'),
	//     'indikator' => set_value('indikator'),
	//     'bulan' => set_value('bulan'),
	//     'target' => set_value('target'),
	//     'realisasi' => set_value('realisasi'),
	//     'capaian' => set_value('capaian'),
	//     'id_satker' => set_value('id_satker'),
	//     'satker' => set_value('satker'),
	// );
    //     $this->template->load('template','pelaporan/v_pelaporan_form', $data);
    // }
    
    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
	// 	'id_indikator' => $this->input->post('id_indikator',TRUE),
	// 	'tahun' => $this->input->post('tahun',TRUE),
	// 	'indikator' => $this->input->post('indikator',TRUE),
	// 	'bulan' => $this->input->post('bulan',TRUE),
	// 	'target' => $this->input->post('target',TRUE),
	// 	'realisasi' => $this->input->post('realisasi',TRUE),
	// 	'capaian' => $this->input->post('capaian',TRUE),
	// 	'id_satker' => $this->input->post('id_satker',TRUE),
	// 	'satker' => $this->input->post('satker',TRUE),
	//     );

    //         $this->Pelaporan_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success 2');
    //         redirect(site_url('pelaporan'));
    //     }
    // }
    
    // public function update($id) 
    // {
    //     $row = $this->Pelaporan_model->get_by_id($id);

    //     if ($row) {
    //         $data = array(
    //             'button' => 'Simpan',
    //             'action' => site_url('pelaporan/update_action'),
	// 	'id_indikator' => set_value('id_indikator', $row->id_indikator),
	// 	'tahun' => set_value('tahun', $row->tahun),
	// 	'indikator' => set_value('indikator', $row->indikator),
	// 	'bulan' => set_value('bulan', $row->bulan),
	// 	'target' => set_value('target', $row->target),
	// 	'realisasi' => set_value('realisasi', $row->realisasi),
	// 	'capaian' => set_value('capaian', $row->capaian),
	// 	'id_satker' => set_value('id_satker', $row->id_satker),
	// 	'satker' => set_value('satker', $row->satker),
	//     );
    //         $this->template->load('template','pelaporan/v_pelaporan_form', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('pelaporan'));
    //     }
    // }
    
    // public function update_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->update($this->input->post('', TRUE));
    //     } else {
    //         $data = array(
	// 	'id_indikator' => $this->input->post('id_indikator',TRUE),
	// 	'tahun' => $this->input->post('tahun',TRUE),
	// 	'indikator' => $this->input->post('indikator',TRUE),
	// 	'bulan' => $this->input->post('bulan',TRUE),
	// 	'target' => $this->input->post('target',TRUE),
	// 	'realisasi' => $this->input->post('realisasi',TRUE),
	// 	'capaian' => $this->input->post('capaian',TRUE),
	// 	'id_satker' => $this->input->post('id_satker',TRUE),
	// 	'satker' => $this->input->post('satker',TRUE),
	//     );

    //         $this->Pelaporan_model->update($this->input->post('', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('pelaporan'));
    //     }
    // }
    
    // public function delete($id) 
    // {
    //     $row = $this->Pelaporan_model->get_by_id($id);

    //     if ($row) {
    //         $this->Pelaporan_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('pelaporan'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('pelaporan'));
    //     }
    // }

    // public function _rules() 
    // {
	// $this->form_validation->set_rules('id_indikator', 'id indikator', 'trim|required');
	// $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	// $this->form_validation->set_rules('indikator', 'indikator', 'trim|required');
	// $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	// $this->form_validation->set_rules('target', 'target', 'trim|required|numeric');
	// $this->form_validation->set_rules('realisasi', 'realisasi', 'trim|required|numeric');
	// $this->form_validation->set_rules('capaian', 'capaian', 'trim|required|numeric');
	// $this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
	// $this->form_validation->set_rules('satker', 'satker', 'trim|required');

	// $this->form_validation->set_rules('', '', 'trim');
	// $this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    // }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_pelaporan.xls";
        $judul = "v_pelaporan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Indikator");
	xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
	xlsWriteLabel($tablehead, $kolomhead++, "Target");
	xlsWriteLabel($tablehead, $kolomhead++, "Realisasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Capaian");
	xlsWriteLabel($tablehead, $kolomhead++, "Satker");

	foreach ($this->Pelaporan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->indikator);
	    xlsWriteLabel($tablebody, $kolombody++, bulanindo($data->bulan));
	    xlsWriteNumber($tablebody, $kolombody++, $data->target);
	    xlsWriteNumber($tablebody, $kolombody++, $data->realisasi);
	    xlsWriteNumber($tablebody, $kolombody++, add_symbol($data->capaian));
	    xlsWriteLabel($tablebody, $kolombody++, $data->satker);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pelaporan.php */
/* Location: ./application/controllers/Pelaporan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-15 08:50:46 */
/* http://harviacode.com */
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msatker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Msatker_model');
        $this->load->model('Monev_model');
        $this->load->model('Mtrc_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','msatker/v_satker_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Msatker_model->json();
    }
    public function monev($id)
    {    $ses_data['trc']=$this->uri->segment(3);
        $row = $this->Msatker_model->get_by_id($id);
        if ($row) {
            $data['satker'] = $row->satker;        
        $this->session->set_userdata($ses_data);
        $this->template->load('template','msatker/v_monev_list', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msatker'));
        }
       
    } 
    public function trc($id)
    {    $ses_data['monev']=$this->uri->segment(3);
        $row = $this->Msatker_model->get_by_id($id);
        if ($row) {
            $data['satker'] = $row->satker;
        $this->session->set_userdata($ses_data);
        $this->template->load('template','msatker/v_trc_list', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msatker'));
        }
       
    } 
    public function grafik($id)
    {    $grafik=$this->uri->segment(3);
        $row = $this->Msatker_model->get_by_id($id);
        if ($row) {
            $ses_data['satkerr'] = $row->satker;
        $this->session->set_userdata($ses_data);
        $this->tahun=$this->session->userdata('tahun');
        $row=$this->User_model->get_data($grafik,$this->tahun);
        $data='';
            if ($row) {
                $data = array(
                    'Jan'=>$row->bstask1,'Feb'=>$row->bstask2,'Mar'=>$row->bstask3,'Apr'=>$row->bstask4,'Mei'=>$row->bstask5,'Jun'=>$row->bstask6,'Jul'=>$row->bstask7,'Aug'=>$row->bstask8,'Sep'=>$row->bstask9,'Okt'=>$row->bstask10,'Nov'=>$row->bstask11,'Des'=>$row->bstask12,'s0jan'=>$row->s0jan,'s1jan'=>$row->s1jan,'s2jan'=>$row->s2jan,'s0feb'=>$row->s0feb,'s1feb'=>$row->s1feb,'s2feb'=>$row->s2feb,'s0mar'=>$row->s0mar,'s1mar'=>$row->s1mar,'s2mar'=>$row->s2mar,'s0apr'=>$row->s0apr,'s1apr'=>$row->s1apr,'s2apr'=>$row->s2apr,'s0mei'=>$row->s0mei,'s1mei'=>$row->s1mei,'s2mei'=>$row->s2mei,'s0jun'=>$row->s0jun,'s1jun'=>$row->s1jun,'s2jun'=>$row->s2jun,'s0jul'=>$row->s0jul,'s1jul'=>$row->s1jul,'s2jul'=>$row->s2jul,'s0aug'=>$row->s0aug,'s1aug'=>$row->s1aug,'s2aug'=>$row->s2aug,'s0sep'=>$row->s0sep,'s1sep'=>$row->s1sep,'s2sep'=>$row->s2sep,'s0okt'=>$row->s0okt,'s1okt'=>$row->s1okt,'s2okt'=>$row->s2okt,'s0nov'=>$row->s0nov,'s1nov'=>$row->s1nov,'s2nov'=>$row->s2nov,'s0des'=>$row->s0des,'s1des'=>$row->s1des,'s2des'=>$row->s2des
            );
        
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
            }
        $this->template->load('template','msatker/v_grafik_list', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('msatker'));
        }
       
    } 
    public function json_trc() {
        $trc=$this->session->userdata('trc');
        $this->tahun=$this->session->userdata('tahun');
        //var_dump( $monev,$this->tahun);
        header('Content-Type: application/json');
        echo $this->Mtrc_model->json($trc,$this->tahun);
    }
    public function json_monev() {
        $monev=$this->session->userdata('monev');
        $this->tahun=$this->session->userdata('tahun');
        //var_dump( $monev,$this->tahun);
        header('Content-Type: application/json');
        echo $this->Monev_model->json($monev,$this->tahun);
    }
    // public function read($id) 
    // {
    //     $row = $this->Msatker_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
	// 	'id_satker' => $row->id_satker,
	// 	'id_user_level' => $row->id_user_level,
	// 	'nama_level' => $row->nama_level,
	// 	'satker' => $row->satker,
	//     );
    //         $this->template->load('template','msatker/v_satker_read', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('msatker'));
    //     }
    // }

    // public function create() 
    // {
    //     $data = array(
    //         'button' => 'Simpan',
    //         'action' => site_url('msatker/create_action'),
	//     'id_satker' => set_value('id_satker'),
	//     'id_user_level' => set_value('id_user_level'),
	//     'nama_level' => set_value('nama_level'),
	//     'satker' => set_value('satker'),
	// );
    //     $this->template->load('template','msatker/v_satker_form', $data);
    // }
    
    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
	// 	'id_satker' => $this->input->post('id_satker',TRUE),
	// 	'id_user_level' => $this->input->post('id_user_level',TRUE),
	// 	'nama_level' => $this->input->post('nama_level',TRUE),
	// 	'satker' => $this->input->post('satker',TRUE),
	//     );

    //         $this->Msatker_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success 2');
    //         redirect(site_url('msatker'));
    //     }
    // }
    
    // public function update($id) 
    // {
    //     $row = $this->Msatker_model->get_by_id($id);

    //     if ($row) {
    //         $data = array(
    //             'button' => 'Simpan',
    //             'action' => site_url('msatker/update_action'),
	// 	'id_satker' => set_value('id_satker', $row->id_satker),
	// 	'id_user_level' => set_value('id_user_level', $row->id_user_level),
	// 	'nama_level' => set_value('nama_level', $row->nama_level),
	// 	'satker' => set_value('satker', $row->satker),
	//     );
    //         $this->template->load('template','msatker/v_satker_form', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('msatker'));
    //     }
    // }
    
    // public function update_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->update($this->input->post('', TRUE));
    //     } else {
    //         $data = array(
	// 	'id_satker' => $this->input->post('id_satker',TRUE),
	// 	'id_user_level' => $this->input->post('id_user_level',TRUE),
	// 	'nama_level' => $this->input->post('nama_level',TRUE),
	// 	'satker' => $this->input->post('satker',TRUE),
	//     );

    //         $this->Msatker_model->update($this->input->post('', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('msatker'));
    //     }
    // }
    
    // public function delete($id) 
    // {
    //     $row = $this->Msatker_model->get_by_id($id);

    //     if ($row) {
    //         $this->Msatker_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('msatker'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('msatker'));
    //     }
    // }

    // public function _rules() 
    // {
	// $this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
	// $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
	// $this->form_validation->set_rules('nama_level', 'nama level', 'trim|required');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Capaian(%)");
	xlsWriteLabel($tablehead, $kolomhead++, "Satker");
    $monev=$this->session->userdata('monev');
    $this->tahun=$this->session->userdata('tahun');
    $laporan=$this->Monev_model->get_all($monev,$this->tahun);
	foreach ( $laporan as $data) {
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

/* End of file Msatker.php */
/* Location: ./application/controllers/Msatker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-09 03:47:39 */
/* http://harviacode.com */
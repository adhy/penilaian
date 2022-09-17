<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arahankasat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Arahankasat_model');
        $this->load->model('Arahankasatsuper_model');
        $this->load->model('Arahankasatkasatker_model');
        $this->load->model('Arahankasatstaff_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','arahankasat/v_rtl_4_list');
    } 
    
    public function json() {
		$this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
		header('Content-Type: application/json');
		$jabatan=$this->session->userdata('jabatan');
		if($jabatan=='0'){
			echo $this->Arahankasatsuper_model->json($this->idsatker,$this->tahun);
		}elseif ($jabatan=='1'){
			echo $this->Arahankasatkasatker_model->json($this->idsatker,$this->tahun);
		}else{
			echo $this->Arahankasatstaff_model->json($this->idsatker,$this->tahun);
		}
        
    }

    // public function read($id) 
    // {
    //     $row = $this->Arahankasatkasatker_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
	// 	'id_monitoring' => $row->id_monitoring,
	// 	'id_satker' => $row->id_satker,
	// 	'satker' => $row->satker,
	// 	'id_indikator' => $row->id_indikator,
	// 	'indikator' => $row->indikator,
	// 	'id_analisis' => $row->id_analisis,
	// 	'analisis' => $row->analisis,
	// 	'id_tasks' => $row->id_tasks,
	// 	'tasks' => $row->tasks,
	// 	'bulan' => $row->bulan,
	// 	'rtl_strategi' => $row->rtl_strategi,
	// 	'potential_blocker' => $row->potential_blocker,
	// 	'pic' => $row->pic,
	// 	'tgl_start' => $row->tgl_start,
	// 	'tgl_deadline' => $row->tgl_deadline,
	// 	'tgl_tercapai' => $row->tgl_tercapai,
	// 	'upload_bukti' => $row->upload_bukti,
	// 	'catatan_pic' => $row->catatan_pic,
	// 	'status' => $row->status,
	// 	'tgl_sekarang' => $row->tgl_sekarang,
	// 	'stwarna' => $row->stwarna,
	// 	'stket' => $row->stket,
	// 	'ara_kasatker' => $row->ara_kasatker,
	//     );
    //         $this->template->load('template','arahankasat/v_rtl_4_read', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('arahankasat'));
    //     }
    // }

    // public function create() 
    // {
    //     $data = array(
    //         'button' => 'Simpan',
    //         'action' => site_url('arahankasat/create_action'),
	//     'id_monitoring' => set_value('id_monitoring'),
	//     'id_satker' => set_value('id_satker'),
	//     'satker' => set_value('satker'),
	//     'id_indikator' => set_value('id_indikator'),
	//     'indikator' => set_value('indikator'),
	//     'id_analisis' => set_value('id_analisis'),
	//     'analisis' => set_value('analisis'),
	//     'id_tasks' => set_value('id_tasks'),
	//     'tasks' => set_value('tasks'),
	//     'bulan' => set_value('bulan'),
	//     'rtl_strategi' => set_value('rtl_strategi'),
	//     'potential_blocker' => set_value('potential_blocker'),
	//     'pic' => set_value('pic'),
	//     'tgl_start' => set_value('tgl_start'),
	//     'tgl_deadline' => set_value('tgl_deadline'),
	//     'tgl_tercapai' => set_value('tgl_tercapai'),
	//     'upload_bukti' => set_value('upload_bukti'),
	//     'catatan_pic' => set_value('catatan_pic'),
	//     'status' => set_value('status'),
	//     'tgl_sekarang' => set_value('tgl_sekarang'),
	//     'stwarna' => set_value('stwarna'),
	//     'stket' => set_value('stket'),
	//     'ara_kasatker' => set_value('ara_kasatker'),
	// );
    //     $this->template->load('template','arahankasat/v_rtl_4_form', $data);
    // }
    
    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
	// 	'id_monitoring' => $this->input->post('id_monitoring',TRUE),
	// 	'id_satker' => $this->input->post('id_satker',TRUE),
	// 	'satker' => $this->input->post('satker',TRUE),
	// 	'id_indikator' => $this->input->post('id_indikator',TRUE),
	// 	'indikator' => $this->input->post('indikator',TRUE),
	// 	'id_analisis' => $this->input->post('id_analisis',TRUE),
	// 	'analisis' => $this->input->post('analisis',TRUE),
	// 	'id_tasks' => $this->input->post('id_tasks',TRUE),
	// 	'tasks' => $this->input->post('tasks',TRUE),
	// 	'bulan' => $this->input->post('bulan',TRUE),
	// 	'rtl_strategi' => $this->input->post('rtl_strategi',TRUE),
	// 	'potential_blocker' => $this->input->post('potential_blocker',TRUE),
	// 	'pic' => $this->input->post('pic',TRUE),
	// 	'tgl_start' => $this->input->post('tgl_start',TRUE),
	// 	'tgl_deadline' => $this->input->post('tgl_deadline',TRUE),
	// 	'tgl_tercapai' => $this->input->post('tgl_tercapai',TRUE),
	// 	'upload_bukti' => $this->input->post('upload_bukti',TRUE),
	// 	'catatan_pic' => $this->input->post('catatan_pic',TRUE),
	// 	'status' => $this->input->post('status',TRUE),
	// 	'tgl_sekarang' => $this->input->post('tgl_sekarang',TRUE),
	// 	'stwarna' => $this->input->post('stwarna',TRUE),
	// 	'stket' => $this->input->post('stket',TRUE),
	// 	'ara_kasatker' => $this->input->post('ara_kasatker',TRUE),
	//     );

    //         $this->Arahankasat_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success 2');
    //         redirect(site_url('arahankasat'));
    //     }
    // }
    
    public function update($id) 
    {
        $row = $this->Arahankasat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('arahankasat/update_action'),
		'id_monitoring' => set_value('id_monitoring', $row->id_monitoring),
		'id_satker' => set_value('id_satker', $row->id_satker),
		'satker' => set_value('satker', $row->satker),
		'id_indikator' => set_value('id_indikator', $row->id_indikator),
		'indikator' => set_value('indikator', $row->indikator),
		'id_analisis' => set_value('id_analisis', $row->id_analisis),
		'analisis' => set_value('analisis', $row->analisis),
		'id_tasks' => set_value('id_tasks', $row->id_tasks),
		'tasks' => set_value('tasks', $row->tasks),
		'bulan' => set_value('bulan', $row->bulan),
		'rtl_strategi' => set_value('rtl_strategi', $row->rtl_strategi),
		'potential_blocker' => set_value('potential_blocker', $row->potential_blocker),
		'pic' => set_value('pic', $row->pic),
		'tgl_start' => set_value('tgl_start', $row->tgl_start),
		'tgl_deadline' => set_value('tgl_deadline', $row->tgl_deadline),
		'tgl_tercapai' => set_value('tgl_tercapai', $row->tgl_tercapai),
		'upload_bukti' => set_value('upload_bukti', $row->upload_bukti),
		'catatan_pic' => set_value('catatan_pic', $row->catatan_pic),
		'status' => set_value('status', $row->status),
		'tgl_sekarang' => set_value('tgl_sekarang', $row->tgl_sekarang),
		'stwarna' => set_value('stwarna', $row->stwarna),
		'stket' => set_value('stket', $row->stket),
		'ara_kasatker' => set_value('ara_kasatker', $row->ara_kasatker),
	    );
            $this->template->load('template','arahankasat/v_rtl_4_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arahankasat'));
        }
    }
    
    public function update_action() 
    {
		$jabatan=$this->session->userdata('jabatan');
		if($jabatan=='0'){
			$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id_monitoring', TRUE));
			} else {
				$data = array(
			'ara_kasatker' => $this->input->post('ara_kasatker',TRUE),
			);
	
				$this->Arahankasatsuper_model->update($this->input->post('id_monitoring', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('arahankasat'));
			}
			//echo $this->Arahankasatsuper_model->json();
		}elseif ($jabatan=='1'){
			$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id_monitoring', TRUE));
			} else {
				$data = array(
			'ara_kasatker' => $this->input->post('ara_kasatker',TRUE),
			);
	
				$this->Arahankasatkasatker_model->update($this->input->post('id_monitoring', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('arahankasat'));
			}
		}else{
			redirect(site_url('arahankasat'));
		}

    }
    
    // public function delete($id) 
    // {
    //     $row = $this->Arahankasat_model->get_by_id($id);

    //     if ($row) {
    //         $this->Arahankasat_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('arahankasat'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('arahankasat'));
    //     }
    // }

    public function _rules() 
    {
	$this->form_validation->set_rules('ara_kasatker', 'ara kasatker', 'trim|required');

	$this->form_validation->set_rules('id_monitoring', 'id_monitoring', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Arahankasat.php */
/* Location: ./application/controllers/Arahankasat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-12 15:42:19 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Updatertl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Updatertl_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','updatertl/v_rtl_3_list');
    } 
    
    public function json() {
		$this->tahun=$this->session->userdata('tahun');
        // var_dump($this->tahun);
         $iduser= $this->session->userdata('id_users');
         if($iduser<=3){$this->idsatker=null;}else{$this->idsatker= $this->session->userdata('idsatker');}
         header('Content-Type: application/json');
         echo $this->Updatertl_model->json($this->idsatker,$this->tahun);
    }
    public function download($id) {
        force_download('/assets/doc_upload/'.$id.'',NULL);
    }

    // public function read($id) 
    // {
    //     $row = $this->Updatertl_model->get_by_id($id);
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
	//     );
    //         $this->template->load('template','updatertl/v_rtl_3_read', $data);
    //     } else {
    //         notif('1');
    //         redirect(site_url('updatertl'));
    //     }
    // }

    // public function create() 
    // {
    //     $data = array(
    //         'button' => 'Simpan',
    //         'action' => site_url('updatertl/create_action'),
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
	// );
    //     $this->template->load('template','updatertl/v_rtl_3_form', $data);
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
	//     );

    //         $this->Updatertl_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success 2');
    //         redirect(site_url('updatertl'));
    //     }
    // }
	
    public function update($id) 
    {
        $row = $this->Updatertl_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('updatertl/update_action'),
		'id_monitoring' => set_value('id_monitoring', $row->id_monitoring),
		'indikator' => set_value('indikator', $row->indikator),
		'analisis' => set_value('analisis', $row->analisis),
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
	    );
            $this->template->load('template','updatertl/v_rtl_3_form', $data);
        } else {
            notif('1');
            redirect(site_url('updatertl'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');
		$docnya = $this->upload_doc();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_monitoring', TRUE));
        } else {
				$upload_bukti='';
				if(!isset($_FILES['upload_bukti'])){$upload_bukti='0';}
				$catatan_pic=$this->input->post('catatan_pic',TRUE);
				$status='';
				if(!isset($catatan_pic)){$status='0';}else{$status='1';}
				if($docnya['file_name']==''){
				$data = array(
					'tgl_tercapai' => $curr_date,
					'upload_bukti' => $upload_bukti,
					'catatan_pic' => $catatan_pic,
					'status' => $status,
					);
				}else{
					$data = array(
						'tgl_tercapai' => $curr_date,
						'upload_bukti' => $docnya['file_name'],
						'catatan_pic' => $catatan_pic,
						'status' => $status,
						);
						$this->session->set_userdata('upload_bukti',$docnya['file_name']);
				}

            $reupdate=$this->Updatertl_model->update($this->input->post('id_monitoring', TRUE), $data);
			//var_dump($reupdate,$docnya['file_name'],$no);
            notif('0');
            redirect(site_url('updatertl'));
        }
    }
    function upload_doc(){
        $config['upload_path']          = './assets/doc_upload/';
        $config['allowed_types']        = 'pdf';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload_bukti');
        return $this->upload->data();
    }
    public function delete($id) 
    {
        $row = $this->Updatertl_model->get_by_id($id);

        if ($row) {
            $this->Updatertl_model->delete($id);
            notif('2');
            redirect(site_url('updatertl'));
        } else {
            notif('1');
            redirect(site_url('updatertl'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tgl_tercapai', 'tgl tercapai', 'trim|required');
	//$this->form_validation->set_rules('upload_bukti', 'upload bukti', 'trim');
	$this->form_validation->set_rules('catatan_pic', 'catatan pic', 'trim|required');

	$this->form_validation->set_rules('id_monitoring', 'id_monitoring', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

/* End of file Updatertl.php */
/* Location: ./application/controllers/Updatertl.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-11 15:11:43 */
/* http://harviacode.com */
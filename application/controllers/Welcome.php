<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->model('Vrafikview_model');
        $this->load->library('form_validation');   
        $this->load->library('datatables');     
    }

    public function index() {
        //$this->load->view('table');
        $tahun=$this->session->userdata('tahun');
        //var_dump($tahun);
        $satker=$this->session->userdata('idsatker');
        var_dump( $satker);
        $data='';
        if($satker!=12){
            $row=$this->User_model->get_data($satker,$tahun);
           
            if ($row) {
                $data = array(
                    'Jan'=>$row->bstask1,'Feb'=>$row->bstask2,'Mar'=>$row->bstask3,'Apr'=>$row->bstask4,'Mei'=>$row->bstask5,'Jun'=>$row->bstask6,'Jul'=>$row->bstask7,'Aug'=>$row->bstask8,'Sep'=>$row->bstask9,'Okt'=>$row->bstask10,'Nov'=>$row->bstask11,'Des'=>$row->bstask12,'s0jan'=>$row->s0jan,'s1jan'=>$row->s1jan,'s2jan'=>$row->s2jan,'s0feb'=>$row->s0feb,'s1feb'=>$row->s1feb,'s2feb'=>$row->s2feb,'s0mar'=>$row->s0mar,'s1mar'=>$row->s1mar,'s2mar'=>$row->s2mar,'s0apr'=>$row->s0apr,'s1apr'=>$row->s1apr,'s2apr'=>$row->s2apr,'s0mei'=>$row->s0mei,'s1mei'=>$row->s1mei,'s2mei'=>$row->s2mei,'s0jun'=>$row->s0jun,'s1jun'=>$row->s1jun,'s2jun'=>$row->s2jun,'s0jul'=>$row->s0jul,'s1jul'=>$row->s1jul,'s2jul'=>$row->s2jul,'s0aug'=>$row->s0aug,'s1aug'=>$row->s1aug,'s2aug'=>$row->s2aug,'s0sep'=>$row->s0sep,'s1sep'=>$row->s1sep,'s2sep'=>$row->s2sep,'s0okt'=>$row->s0okt,'s1okt'=>$row->s1okt,'s2okt'=>$row->s2okt,'s0nov'=>$row->s0nov,'s1nov'=>$row->s1nov,'s2nov'=>$row->s2nov,'s0des'=>$row->s0des,'s1des'=>$row->s1des,'s2des'=>$row->s2des
            );
            //$this->template->load('template', 'welcome',$data);
        
            } else {
                
               $this->session->set_flashdata('message', 'ARecord Not Found');
            }
            $this->template->load('template', 'welcome',$data);
        }else{
                $this->template->load('template', 'vrafikview/v_grafikview_list');
        }    
        //var_dump($row);
        
        
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->Vrafikview_model->json();
    }
    // public function index() {
    //     //$this->load->view('table');
    //     $tahun=$this->session->userdata('tahun');
    //     //var_dump($tahun);
    //     $this->template->load('template', 'welcome');
    // }
    // public function grafik() {
    //     $satker=$this->session->userdata('idsatker');
    //     $tahun=$this->session->userdata('tahun');
    //     $row = $this->User_model->get_data($satker,$tahun)->result();
    //     echo json_encode($row);
    //     //var_dump($tahun);
    // }
    function profile(){
        $id=$this->session->userdata('id_users');;
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('welcome/profile_action'),
		'id_users'      => set_value('id_users', $row->id_users),
		'full_name'     => set_value('full_name', $row->full_name),
		'email'         => set_value('email', $row->email),
		'password'      => set_value('password', $row->password),
		'images'        => set_value('images', $row->images),
	    );
            $this->template->load('template','user/tbl_user_edit', $data);
        } else {
            notif('1');
            redirect(site_url('welcome'));
        }
    }
    public function profile_action() 
    {
        $this->_rulesprof();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->profile($this->input->post('id_users', TRUE));
        } else {
            if($foto['file_name']==''){
                $data = array(
		'full_name'     => $this->input->post('full_name',TRUE));
		//'email'         => $this->input->post('email',TRUE));
            }else{
                $data = array(
		'full_name'     => $this->input->post('full_name',TRUE),
		//'email'         => $this->input->post('email',TRUE),
                'images'        =>$foto['file_name']);
                
                // ubah foto profil yang aktif
                $this->session->set_userdata('images',$foto['file_name']);
            }

            $this->User_model->update($this->input->post('id_users', TRUE), $data);
            notif('0');
            redirect(site_url('welcome'));
        }
    }
    function upload_foto(){
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
    public function _rulesprof() 
    {
	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	//$this->form_validation->set_rules('password', 'password', 'trim|required');
	//$this->form_validation->set_rules('images', 'images', 'trim|required');


	$this->form_validation->set_rules('id_users', 'id_users', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }

}

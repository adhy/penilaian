<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
    }

    public function index() {
        //$this->load->view('table');
        $tahun=$this->session->userdata('tahun');
        //var_dump($tahun);
        $this->template->load('template', 'welcome');
    }
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
		'full_name'     => $this->input->post('full_name',TRUE),
		'email'         => $this->input->post('email',TRUE));
            }else{
                $data = array(
		'full_name'     => $this->input->post('full_name',TRUE),
		'email'         => $this->input->post('email',TRUE),
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

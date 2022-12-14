<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','user/tbl_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_users'      => $row->id_users,
        'satker'      => $row->satker,
		'full_name'     => $row->full_name,
		'email'         => $row->email,
		'password'      => $row->password,
		'images'        => $row->images,
		'id_user_level' => $row->id_user_level,
		'is_aktif'      => $row->is_aktif,
	    );
            $this->template->load('template','user/tbl_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Create',
            'action'        => site_url('user/create_action'),
	    'id_users'      => set_value('id_users'),
        'satker'     => set_value('satker'),
	    'full_name'     => set_value('full_name'),
	    'email'         => set_value('email'),
	    'password'      => set_value('password'),
	    'images'        => set_value('images'),
	    'id_user_level' => set_value('id_user_level'),
	    'is_aktif'      => set_value('is_aktif'),
	    'jabatan'      => set_value('jabatan'),
	);
        $this->template->load('template','user/tbl_user_form', $data);
    }
    
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $email=$this->input->post('email',TRUE);
            $id_user='';
            $this->_usercheck($email,$id_user);
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            if($foto['file_name']==''){
                $data = array(
                    'idsatker' => $this->input->post('satker',TRUE),        
                    'full_name'     => $this->input->post('full_name',TRUE),
                    'email'         => $this->input->post('email',TRUE),
                    'password'      => $hashPassword,
                    'id_user_level' => $this->input->post('id_user_level',TRUE),
                    'is_aktif'      => $this->input->post('is_aktif',TRUE),
                    'jabatan'      => $this->input->post('jabatan',TRUE),
                    );
            }else{
                $data = array(
                    'idsatker' => $this->input->post('satker',TRUE),        
                    'full_name'     => $this->input->post('full_name',TRUE),
                    'email'         => $this->input->post('email',TRUE),
                    'password'      => $hashPassword,
                    'images'        => $foto['file_name'],
                    'id_user_level' => $this->input->post('id_user_level',TRUE),
                    'is_aktif'      => $this->input->post('is_aktif',TRUE),
                    'jabatan'      => $this->input->post('jabatan',TRUE),
                    );
            }
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('user/update_action'),
		'id_users'      => set_value('id_users', $row->id_users),
		'full_name'     => set_value('full_name', $row->full_name),
		'email'         => set_value('email', $row->email),
		'password'      => set_value('password', $row->password),
		'images'        => set_value('images', $row->images),
		'id_user_level' => set_value('id_user_level', $row->id_user_level),
		'satker'        => set_value('satker', $row->idsatker),
		'is_aktif'      => set_value('is_aktif', $row->is_aktif),
		'jabatan'      => set_value('jabatan', $row->jabatan),
	    );
        $ses_data['emailupdate']      = $row->email;
            $this->template->load('template','user/tbl_user_formedit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            $email=$this->input->post('email',TRUE);
            $id_user=$this->input->post('id_users', TRUE);
            $this->_usercheck($email,$id_user);
            if($foto['file_name']==''){
                $data = array(
        'idsatker' => $this->input->post('satker',TRUE),
		'full_name'     => $this->input->post('full_name',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif'      => $this->input->post('is_aktif',TRUE),
		'jabatan'      => $this->input->post('jabatan',TRUE));
            }else{
                $data = array(
		'full_name'     => $this->input->post('full_name',TRUE),
                'images'        =>$foto['file_name'],
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif'      => $this->input->post('is_aktif',TRUE),
		'jabatan'      => $this->input->post('jabatan',TRUE));
                
                // ubah foto profil yang aktif
                $this->session->set_userdata('images',$foto['file_name']);
            }

            $this->User_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
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
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    public function _usercheck($mail,$idnya){
        $list = $this->User_model->get_mail($mail);
        if($list->num_rows()>0){
            if($this->session->userdata('emailupdate')==$mail){
                return true;
            }else{
                $this->session->set_flashdata('message', 'Gagal menambah data');
            redirect(site_url('user'));
            }
        }else{
            return true;
        }
    }    

    public function _rules() 
    {
	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim');
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	//$this->form_validation->set_rules('password', 'password', 'trim|required');
	//$this->form_validation->set_rules('images', 'images', 'trim|required');
	$this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
	$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

	$this->form_validation->set_rules('id_users', 'id_users', 'trim');
	$this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    }
    // public function _rulesprof() 
    // {
	// $this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	// $this->form_validation->set_rules('email', 'email', 'trim|required');
	// //$this->form_validation->set_rules('password', 'password', 'trim|required');
	// //$this->form_validation->set_rules('images', 'images', 'trim|required');


	// $this->form_validation->set_rules('id_users', 'id_users', 'trim');
	// $this->form_validation->set_error_delimiters('<div class="has-error"><label class="text-danger"><i class="fa fa-times-circle-o"></i> ', '</label></div>');
    // }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_user.xls";
        $judul = "tbl_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Full Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Images");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->images);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_user.doc");

        $data = array(
            'tbl_user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/tbl_user_doc',$data);
    }
    
    // function profile(){
    //     $id=$this->session->userdata('id_users');;
    //     $row = $this->User_model->get_by_id($id);

    //     if ($row) {
    //         $data = array(
    //             'button'        => 'Update',
    //             'action'        => site_url('user/profile_action'),
	// 	'id_users'      => set_value('id_users', $row->id_users),
	// 	'full_name'     => set_value('full_name', $row->full_name),
	// 	'email'         => set_value('email', $row->email),
	// 	'password'      => set_value('password', $row->password),
	// 	'images'        => set_value('images', $row->images),
	//     );
    //         $this->template->load('template','user/tbl_user_edit', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('user'));
    //     }
    // }
    // public function profile_action() 
    // {
    //     $this->_rulesprof();
    //     $foto = $this->upload_foto();
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->profile($this->input->post('id_users', TRUE));
    //     } else {
    //         if($foto['file_name']==''){
    //             $data = array(
    //     'idsatker' => $this->input->post('satker',TRUE),
	// 	'full_name'     => $this->input->post('full_name',TRUE),
	// 	'email'         => $this->input->post('email',TRUE));
    //         }else{
    //             $data = array(
	// 	'full_name'     => $this->input->post('full_name',TRUE),
	// 	'email'         => $this->input->post('email',TRUE),
    //             'images'        =>$foto['file_name']);
                
    //             // ubah foto profil yang aktif
    //             $this->session->set_userdata('images',$foto['file_name']);
    //         }

    //         $this->User_model->profile($this->input->post('id_users', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('user'));
    //     }
    // }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 06:32:22 */
/* http://harviacode.com */
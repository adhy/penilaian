<?php
function cmb_dinamis($name,$table,$field,$pk,$selected=null,$order=null,$placeholder=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2' data-placeholder='$placeholder'><option></option>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamiswhere($name,$table,$field,$pk,$selected=null,$order=null,$where,$placeholder=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2' data-placeholder='$placeholder'><option></option>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get_where($table,$where)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_dinamiswhereorder($name,$table,$field,$pk,$selected=null,$order=null,$where,$placeholder=null,$group=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2' data-placeholder='$placeholder'><option></option>";
    if($order){
        $ci->db->order_by($pk,$order);
    }
    $ci->db->group_by($group);
    $data = $ci->db->get_where($table,$where)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_diwherebulan($name,$table,$field,$pk,$selected=null,$order=null,$where,$placeholder=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2' data-placeholder='$placeholder'><option></option>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get_where($table,$where)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">". bulanindo(strtoupper($d->$field))."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function select2_dinamis($name,$table,$field,$placeholder){
    $ci = get_instance();
    $select2 = '<select name="'.$name.'" class="form-control select2 select2-hidden-accessible" multiple="" 
               data-placeholder="'.$placeholder.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $select2.= ' <option>'.$row->$field.'</option>';
    }
    $select2 .='</select>';
    return $select2;
}

function datalist_dinamis($name,$table,$field,$value=null){
    $ci = get_instance();
    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control">
    <datalist id="'.$name.'">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $string.='<option value="'.$row->$field.'">';
    }
    $string .='</datalist>';
    return $string;
}

function rename_string_is_aktif($string){
        return $string=='y'?'Aktif':'Tidak Aktif';
    }
function add_symbol($string){
        return $string=$string.' %';
    }
function add_symbolg($string,$symbol,$position){
    switch ($position){
        case 1:
            return $string=$string.'&nbsp;&nbsp;'.$symbol;;
            break;
        case 2:
            return $string=$symbol.'&nbsp;&nbsp;'.$string;
            break;
    }
}
function add_upload($string){
    if($string=='0'){$string='<p class="text-red">Belum Upload</p>';}else{$string=anchor(site_url('assets/doc_upload/'.$string.''),'<i class="fa fa-cloud-download" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'));}
    return $string;
}
function tgl_indomin($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . '-' . $bulan[ (int)$pecahkan[1] ] . '-' . $pecahkan[0];
}
function bulanindosys($bln,$sys)
	{
		switch ($bln)
		{
			case 1:
				return  $bln=$sys."&nbsp;&nbsp;Januari";
				break;
			case 2:
				return  $bln=$sys."&nbsp;&nbsp;Februari";
				break;
			case 3:
				return  $bln=$sys."&nbsp;&nbsp;Maret";
				break;
			case 4:
				return $bln=$sys."&nbsp;&nbsp;April";
				break;
			case 5:
				return $bln=$sys."&nbsp;&nbsp;Mei";
				break;
			case 6:
				return $bln=$sys."&nbsp;&nbsp;Juni";
				break;
			case 7:
				return $bln=$sys."&nbsp;&nbsp;Juli";
				break;
			case 8:
				return $bln=$sys."&nbsp;&nbsp;Agustus";
				break;
			case 9:
				return $bln=$sys."&nbsp;&nbsp;September";
				break;
			case 10:
				return $bln=$sys."&nbsp;&nbsp;Oktober";
				break;
			case 11:
				return $bln=$sys."&nbsp;&nbsp;November";
				break;
			case 12:
				return $bln=$sys."&nbsp;&nbsp;Desember";
				break;
		}
	}
function bulanindo($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
    

function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('id_users')){
        redirect('auth');
    }else{
        $modul = $ci->uri->segment(1);
        
        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu',array('url'=>$modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses',array('id_menu'=>$id_menu,'id_user_level'=>$id_user_level));
        if($hak_akses->num_rows()<1){
            redirect('blokir');
            exit;
        }
    }
}

function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level,$id_menu){
    $ci = get_instance();
    $ci->db->where('id_user_level',$id_user_level);
    $ci->db->where('id_menu',$id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if($data->num_rows()>0){
        return "checked='checked'";
    }
}


function autocomplate_json($table,$field){
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}

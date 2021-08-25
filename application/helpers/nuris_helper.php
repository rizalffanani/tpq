<?php
function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2bs4'>";
    $cmb .= "<option value='0'>pilih</option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function dinamis($table,$field,$pk,$selected,$where="",$whereval="")
{
    $ci = get_instance();
    $cmb = "<option value='0'>pilih</option>";
    if ($where!="") {
        $ci->db->where($where, $whereval);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    return $cmb;
}
function cmb_dinamis_user($name,$table,$field,$pk,$where,$whereval,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control select2bs4'>";
    $cmb .= "<option value='0'>pilih</option>";
    $ci->db->where($where, $whereval);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_menu($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field.'/'.$d->tipe.'['.$d->link.']')."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_dinamis2($name,$table,$field,$pk,$selected,$no){
    $pki = explode("|", $pk);
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $ci->db->where('tipe', $no);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        if (count($pki)>1) {
            $pkc="";
            $cmb .="<option value='";
            for ($i=0; $i < count($pki); $i++) { 
                $pks = $pki[$i];
                $cmb .=$d->$pks.'|';
                $pkc .=$d->$pks.'|';
            }
            $cmb .="'";
        }else{
            $pkc = $d->$pk;
            $cmb .="<option value='".$pkc."'";
        }
        $cmb .= $selected==$pkc?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_rekening($name,$table,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $ci->db->where('id', $selected);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .=">".  strtoupper($d->nama_bank.' / '.$d->atas_nama.' / '.$d->no_rekening)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function get_name($table,$field,$pk,$show){
    $ci = get_instance();
    $ci->db->select($show);
    $ci->db->where($field, $pk);
    $data = $ci->db->get($table)->row();
    return $data; 
}
?>
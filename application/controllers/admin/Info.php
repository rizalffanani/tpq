<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Info_model');
        $this->load->library('form_validation');        
    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'title' => 'Info Web',
        );
        $this->template->load('template','admin/info/info_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Info_model->json();
    }

    public function read($id) 
    {
        $row = $this->Info_model->get_by_id($id);
        if ($row) {
            $data = array(
        'title' => 'Info Web',
        'action' => site_url('admin/info/upload'),
        'button' => 'Upload',
        'id_info' => $row->id_info,
        'nama_web' => $row->nama_web,
        'tentang' => $row->tentang,
        'slogan' => $row->slogan,
        'alamat' => $row->alamat,
        'email' => $row->email,
        'wa' => $row->wa,
        'logo_web' => $row->logo_web,
        );
            // $this->load->view('info/info_read', $data);
            $this->template->load('template','admin/info/info_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/info'));
        }
    }

    function upload(){
        $id= $this->input->post('id');
        $row = $this->Info_model->get_by_id($id);
        $config = array(
            'upload_path' => 'assets/img/',
            'allowed_types' => 'jpg|png',
            'file_name' => $id.'file_'.date('dmYHis'),
            'overwrite' => FALSE,
            'max_size' => 2048,   
            'file_ext_tolower' => TRUE,    
            'max_filename' => 0,
            'remove_spaces' => TRUE             
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
            $hasil = "error ".$this->upload->display_errors();
            $data = array('logo_web'=> 'default.jpg');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('logo_web'=> $fot);  
            if ($row->logo_web!="default.png") {
                unlink('assets/img/'.$row->logo_web);
            }   
        }
        $this->Info_model->update($id,$data);
        $this->session->set_flashdata('hasil', $hasil);
        redirect(site_url('admin/info/read/'.$id));
    }
    
    public function update($id) 
    {
        $row = $this->Info_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/info/update_action'),
        'id_info' => set_value('id_info', $row->id_info),
        'nama_web' => set_value('nama_web', $row->nama_web),
        'tentang' => set_value('tentang', $row->tentang),
        'slogan' => set_value('slogan', $row->slogan),
        'alamat' => set_value('alamat', $row->alamat),
        'email' => set_value('email', $row->email),
        'wa' => set_value('wa', $row->wa),
        'format_nis' => set_value('format_nis', $row->format_nis),
        );
            $this->template->load('template','admin/info/info_form', $data);
            // $this->load->view('info/info_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/info'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_info', TRUE));
        } else {
            $data = array(
        'nama_web' => $this->input->post('nama_web',TRUE),
        'tentang' => $this->input->post('tentang',TRUE),
        'slogan' => $this->input->post('slogan',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'email' => $this->input->post('email',TRUE),
        'wa' => $this->input->post('wa',TRUE),
        'format_nis' => $this->input->post('format_nis',TRUE),
        );

            $this->Info_model->update($this->input->post('id_info', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/info'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_web', 'nama web', 'trim|required');
    $this->form_validation->set_rules('tentang', 'tentang', 'trim|required');
    $this->form_validation->set_rules('slogan', 'slogan', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('wa', 'wa', 'trim|required');
    $this->form_validation->set_rules('format_nis', 'format_nis', 'trim|required');

    $this->form_validation->set_rules('id_info', 'id_info', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Info.php */
/* Location: ./application/controllers/Info.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-17 23:46:01 */
/* http://harviacode.com */
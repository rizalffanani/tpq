<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_file extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_file_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'data_file');
        $this->template->load('template','admin/data_file/data_file_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_file_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_file_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_file' => $row->id_file,
		'judul' => $row->judul,
		'deskripsi' => $row->deskripsi,
		'file' => $row->file,
		'tgl_upload' => $row->tgl_upload,
	    );
            $this->template->load('template','admin/data_file/data_file_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_file'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/data_file/create_action'),
	    'id_file' => set_value('id_file'),
	    'judul' => set_value('judul'),
	    'deskripsi' => set_value('deskripsi'),
	    'file' => set_value('file'),
	);
        $this->template->load('template','admin/data_file/data_file_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config = array(
                'upload_path' => 'assets/file',
                'allowed_types' => '*',
                'file_name' => 'file_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2097152,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')){
                $hasil = "error ".$this->upload->display_errors();
                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    'tgl_upload' => date("Y-m-d"),
                );  
            }
            else{
                $hasil = "berhasil disimpan";
                $file = $this->upload->file_name;

                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    'file' => $file,
                    'tgl_upload' => date("Y-m-d"),
                );       
            }

            $this->Data_file_model->insert($data);
            $this->session->set_flashdata('message', $hasil);
            redirect(site_url('admin/data_file'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_file_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/data_file/update_action'),
		'id_file' => set_value('id_file', $row->id_file),
		'judul' => set_value('judul', $row->judul),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'file' => set_value('file', $row->file),
	    );
            $this->template->load('template','admin/data_file/data_file_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_file'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_file', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'file' => $this->input->post('file',TRUE),
	    );

            $this->Data_file_model->update($this->input->post('id_file', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/data_file'));
        }
    }
    
    function upload(){
        $id= $this->input->post('id');$us= $this->input->post('username');
        $row = $this->Users_model->get_by_id($us);
        $config = array(
            'upload_path' => 'assets/file',
            'allowed_types' => '*',
            'file_name' => $id.'file_'.date('dmYHis'),
            'overwrite' => FALSE,
            'max_size' => 2097152,   
            'file_ext_tolower' => TRUE,    
            'max_filename' => 0,
            'remove_spaces' => TRUE             
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
            $hasil = "error ".$this->upload->display_errors();
            $data = array('Foto'=> 'default.png');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('Foto'=> $fot);    
            if ($row->Foto!="default.png") {
                unlink('assets/img/profil/'.$row->Foto);
            }          
        }
        $this->Users_model->update($id,$data);
        $this->session->set_flashdata('hasil', $hasil);
        redirect(site_url('admin/users/read/'.$us));
    }

    public function delete($id) 
    {
        $row = $this->Data_file_model->get_by_id($id);

        if ($row) {
            $this->Data_file_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/data_file'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_file'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	// $this->form_validation->set_rules('file', 'file', 'trim|required');

	$this->form_validation->set_rules('id_file', 'id_file', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_file.php */
/* Location: ./application/controllers/Data_file.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-20 09:24:47 */
/* http://harviacode.com */
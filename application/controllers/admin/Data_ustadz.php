<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_ustadz extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_ustadz_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'data_ustadz');
        $this->template->load('template','admin/data_ustadz/data_ustadz_list', $data);
    } 
    
    public function json() {
        $id = $this->session->userdata("id");
        header('Content-Type: application/json');
        echo $this->Data_ustadz_model->json($id);
    }

    public function read($id) 
    {
        $row = $this->Data_ustadz_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
                'button' => 'Upload',
                'action' => site_url('admin/data_ustadz/upload'),
		'id_ustadz' => $row->id_ustadz,
		'nip' => $row->nip,
		'nama_ustadz' => $row->nama_ustadz,
		'status' => $row->status,
		'jk' => $row->jk,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'alamat' => $row->alamat,
		'nama_ayah' => $row->nama_ayah,
		'nama_ibu' => $row->nama_ibu,
		'alamat_ortu' => $row->alamat_ortu,
		'foto' => $row->foto,
		'tgl_masuk' => $row->tgl_masuk,
	    );
            $this->template->load('template','admin/data_ustadz/data_ustadz_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_ustadz'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/data_ustadz/create_action'),
	    'id_ustadz' => set_value('id_ustadz'),
	    'nip' => set_value('nip'),
	    'nama_ustadz' => set_value('nama_ustadz'),
	    'status' => set_value('status'),
	    'jk' => set_value('jk'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'alamat' => set_value('alamat'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'alamat_ortu' => set_value('alamat_ortu'),
	    'foto' => set_value('foto'),
	    'tgl_masuk' => set_value('tgl_masuk'),
	);
        $this->template->load('template','admin/data_ustadz/data_ustadz_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_ustadz' => $this->input->post('nama_ustadz',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'foto' => 'default.png',
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
        'id_user' => $this->session->userdata("id"),
	    );

            $this->Data_ustadz_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/data_ustadz'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_ustadz_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/data_ustadz/update_action'),
		'id_ustadz' => set_value('id_ustadz', $row->id_ustadz),
		'nip' => set_value('nip', $row->nip),
		'nama_ustadz' => set_value('nama_ustadz', $row->nama_ustadz),
		'status' => set_value('status', $row->status),
		'jk' => set_value('jk', $row->jk),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'alamat_ortu' => set_value('alamat_ortu', $row->alamat_ortu),
		'foto' => set_value('foto', $row->foto),
		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
	    );
            $this->template->load('template','admin/data_ustadz/data_ustadz_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_ustadz'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ustadz', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_ustadz' => $this->input->post('nama_ustadz',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
	    );

            $this->Data_ustadz_model->update($this->input->post('id_ustadz', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/data_ustadz'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_ustadz_model->get_by_id($id);

        if ($row) {
            $this->Data_ustadz_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/data_ustadz'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_ustadz'));
        }
    }

    function upload(){
        $id= $this->input->post('id_ustadz');
        $row = $this->Data_ustadz_model->get_by_id($id);
        $config = array(
            'upload_path' => 'assets/img/guru',
            'allowed_types' => 'jpeg|jpg|png',
            'file_name' => $id.'guru_'.date('dmYHis'),
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
            $data = array('foto'=> 'default.png');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('foto'=> $fot);    
            if ($row->foto!="default.png") {
                unlink('assets/img/guru/'.$row->foto);
            }          
        }
        $this->Data_ustadz_model->update($id,$data);
        $this->session->set_flashdata('hasil', $hasil);
        redirect(site_url('admin/data_ustadz/read/'.$id));
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama_ustadz', 'nama ustadz', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');

	$this->form_validation->set_rules('id_ustadz', 'id_ustadz', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_ustadz.php */
/* Location: ./application/controllers/Data_ustadz.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 15:14:13 */
/* http://harviacode.com */
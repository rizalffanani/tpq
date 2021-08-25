<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tes2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tes2_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'tes2');
        $this->template->load('template','admin/tes2/tes2_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tes2_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tes2_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id' => $row->id,
		'nama_ketua' => $row->nama_ketua,
		'time' => $row->time,
	    );
            $this->template->load('template','admin/tes2/tes2_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tes2'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tes2/create_action'),
	    'id' => set_value('id'),
	    'nama_ketua' => set_value('nama_ketua'),
	    'time' => set_value('time'),
	);
        $this->template->load('template','admin/tes2/tes2_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ketua' => $this->input->post('nama_ketua',TRUE),
		'time' => $this->input->post('time',TRUE),
	    );

            $this->Tes2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tes2'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tes2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tes2/update_action'),
		'id' => set_value('id', $row->id),
		'nama_ketua' => set_value('nama_ketua', $row->nama_ketua),
		'time' => set_value('time', $row->time),
	    );
            $this->template->load('template','admin/tes2/tes2_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tes2'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_ketua' => $this->input->post('nama_ketua',TRUE),
		'time' => $this->input->post('time',TRUE),
	    );

            $this->Tes2_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tes2'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tes2_model->get_by_id($id);

        if ($row) {
            $this->Tes2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tes2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tes2'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ketua', 'nama ketua', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tes2.php */
/* Location: ./application/controllers/Tes2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-02 15:26:15 */
/* http://harviacode.com */
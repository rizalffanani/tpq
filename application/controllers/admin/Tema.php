<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tema extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tema_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'tema');
        $this->template->load('template','admin/tema/tema_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tema_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tema_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_tema' => $row->id_tema,
		'navbar_bg_color' => $row->navbar_bg_color,
		'navbar_font_color' => $row->navbar_font_color,
		'sidebar_bg_color' => $row->sidebar_bg_color,
		'sidebar_font_color' => $row->sidebar_font_color,
	    );
            $this->template->load('template','admin/tema/tema_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tema'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tema/create_action'),
	    'id_tema' => set_value('id_tema'),
	    'navbar_bg_color' => set_value('navbar_bg_color'),
	    'navbar_font_color' => set_value('navbar_font_color'),
	    'sidebar_bg_color' => set_value('sidebar_bg_color'),
	    'sidebar_font_color' => set_value('sidebar_font_color'),
	);
        $this->template->load('template','admin/tema/tema_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'navbar_bg_color' => $this->input->post('navbar_bg_color',TRUE),
		'navbar_font_color' => $this->input->post('navbar_font_color',TRUE),
		'sidebar_bg_color' => $this->input->post('sidebar_bg_color',TRUE),
		'sidebar_font_color' => $this->input->post('sidebar_font_color',TRUE),
	    );

            $this->Tema_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tema'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tema_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tema/update_action'),
		'id_tema' => set_value('id_tema', $row->id_tema),
		'navbar_bg_color' => set_value('navbar_bg_color', $row->navbar_bg_color),
		'navbar_font_color' => set_value('navbar_font_color', $row->navbar_font_color),
		'sidebar_bg_color' => set_value('sidebar_bg_color', $row->sidebar_bg_color),
		'sidebar_font_color' => set_value('sidebar_font_color', $row->sidebar_font_color),
	    );
            $this->template->load('template','admin/tema/tema_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tema'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tema', TRUE));
        } else {
            $data = array(
		'navbar_bg_color' => $this->input->post('navbar_bg_color',TRUE),
		'navbar_font_color' => $this->input->post('navbar_font_color',TRUE),
		'sidebar_bg_color' => $this->input->post('sidebar_bg_color',TRUE),
		'sidebar_font_color' => $this->input->post('sidebar_font_color',TRUE),
	    );

            $this->Tema_model->update($this->input->post('id_tema', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tema'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tema_model->get_by_id($id);

        if ($row) {
            $this->Tema_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tema'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tema'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('navbar_bg_color', 'navbar bg color', 'trim|required');
	$this->form_validation->set_rules('navbar_font_color', 'navbar font color', 'trim|required');
	$this->form_validation->set_rules('sidebar_bg_color', 'sidebar bg color', 'trim|required');
	$this->form_validation->set_rules('sidebar_font_color', 'sidebar font color', 'trim|required');

	$this->form_validation->set_rules('id_tema', 'id_tema', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tema.php */
/* Location: ./application/controllers/Tema.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-03 06:13:00 */
/* http://harviacode.com */
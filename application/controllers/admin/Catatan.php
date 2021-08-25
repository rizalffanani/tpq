<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Catatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'catatan');
        $this->template->load('template','admin/catatan/catatan_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Catatan_model->json();
    }

    public function read($id,$id_klstpq) 
    {
        $row = $this->Catatan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_catatan' => $row->id_catatan,
		'id_kelas_siswa' => $row->id_kelas_siswa,
		'kelakuan' => $row->kelakuan,
		'kerajinan' => $row->kerajinan,
		'kebersihan' => $row->kebersihan,
		'izin' => $row->izin,
		'sakit' => $row->sakit,
		'alpa' => $row->alpa,
		'catatan' => $row->catatan,
        'id_klstpq' => $id_klstpq,
	    );
            $this->template->load('template','admin/catatan/catatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/catatan'));
        }
    }

    public function create($id,$id_klstpq) 
    {
        $row = $this->Catatan_model->get_by_idk($id);
        if (!$row) {
            $data = array(
                'id_kelas_siswa' => $id,
            );
            $this->Catatan_model->insert($data);
            $insert_id = $this->db->insert_id();
            $row = $this->Catatan_model->get_by_id($insert_id);
        }

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/catatan/update_action'),
                'id_catatan' => set_value('id_catatan', $row->id_catatan),
                'id_kelas_siswa' => set_value('id_kelas_siswa', $row->id_kelas_siswa),
                'kelakuan' => set_value('kelakuan', $row->kelakuan),
                'kerajinan' => set_value('kerajinan', $row->kerajinan),
                'kebersihan' => set_value('kebersihan', $row->kebersihan),
                'izin' => set_value('izin', $row->izin),
                'sakit' => set_value('sakit', $row->sakit),
                'alpa' => set_value('alpa', $row->alpa),
                'catatan' => set_value('catatan', $row->catatan),
                'id_klstpq' => set_value('id_klstpq', $id_klstpq),
            );
            $this->template->load('template','admin/catatan/catatan_form', $data);
        }else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/catatan'));
        }
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_kelas_siswa' => $this->input->post('id_kelas_siswa',TRUE),
        		'kelakuan' => $this->input->post('kelakuan',TRUE),
        		'kerajinan' => $this->input->post('kerajinan',TRUE),
        		'kebersihan' => $this->input->post('kebersihan',TRUE),
        		'izin' => $this->input->post('izin',TRUE),
        		'sakit' => $this->input->post('sakit',TRUE),
        		'alpa' => $this->input->post('alpa',TRUE),
        		'catatan' => $this->input->post('catatan',TRUE),
            );

            $this->Catatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/catatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Catatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/catatan/update_action'),
		'id_catatan' => set_value('id_catatan', $row->id_catatan),
		'id_kelas_siswa' => set_value('id_kelas_siswa', $row->id_kelas_siswa),
		'kelakuan' => set_value('kelakuan', $row->kelakuan),
		'kerajinan' => set_value('kerajinan', $row->kerajinan),
		'kebersihan' => set_value('kebersihan', $row->kebersihan),
		'izin' => set_value('izin', $row->izin),
		'sakit' => set_value('sakit', $row->sakit),
		'alpa' => set_value('alpa', $row->alpa),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $this->template->load('template','admin/catatan/catatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/catatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_catatan', TRUE));
        } else {
            $data = array(
        		'id_kelas_siswa' => $this->input->post('id_kelas_siswa',TRUE),
        		'kelakuan' => $this->input->post('kelakuan',TRUE),
        		'kerajinan' => $this->input->post('kerajinan',TRUE),
        		'kebersihan' => $this->input->post('kebersihan',TRUE),
        		'izin' => $this->input->post('izin',TRUE),
        		'sakit' => $this->input->post('sakit',TRUE),
        		'alpa' => $this->input->post('alpa',TRUE),
        		'catatan' => $this->input->post('catatan',TRUE),
	        );

            $id_klstpq = $this->input->post('id_klstpq', TRUE);
            $id_catatan = $this->input->post('id_catatan', TRUE);

            $this->Catatan_model->update($this->input->post('id_catatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/catatan/read/'.$id_catatan.'/'.$id_klstpq));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Catatan_model->get_by_id($id);

        if ($row) {
            $this->Catatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/catatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/catatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas_siswa', 'id kelas siswa', 'trim|required');
	$this->form_validation->set_rules('kelakuan', 'kelakuan', 'trim|required');
	$this->form_validation->set_rules('kerajinan', 'kerajinan', 'trim|required');
	$this->form_validation->set_rules('kebersihan', 'kebersihan', 'trim|required');
	// $this->form_validation->set_rules('izin', 'izin', 'trim|required');
	// $this->form_validation->set_rules('sakit', 'sakit', 'trim|required');
	// $this->form_validation->set_rules('alpa', 'alpa', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_catatan', 'id_catatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Catatan.php */
/* Location: ./application/controllers/Catatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-18 03:56:46 */
/* http://harviacode.com */
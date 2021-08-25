<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap_nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_tpq_model');
        $this->load->model('View_kelas_model');
        $this->load->model('Kelas_santri_model');
        $this->load->model('Catatan_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $lvl = $this->session->userdata("lvl");        
        if ($lvl=="Superadmin") {
            $auth_item = "";
        } elseif ($lvl=="Admin") {
            $auth_item = "";
        } elseif ($lvl=="User") {
            $id = $this->session->userdata("user_id"); 
            $auth_item = $this->View_kelas_model->get_all_versantri($id);
        }
        
        $data = array(
            'title' => 'Rekap Nilai',
            'id_tpq' => set_value('id_tpq'),
            'id_kelas' => set_value('id_kelas'),
            'id_tahun_ajaran' => set_value('id_tahun_ajaran'),
            'semester' => set_value('semester'),
            'id_jenjang' => set_value('id_jenjang'),
            'datas' => $auth_item
        );
        $this->template->load('template','admin/rekap_nilai/rekap_nilai_list', $data);
    } 
    

    public function read($id) 
    {
        $group = $this->Kelas_santri_model->get_all_nilai_group($id);
        $siswa = $this->Kelas_santri_model->get_all_nilai_detail($id);
        $row = $this->Catatan_model->get_by_idk($id);
        if ($siswa) {
            $data = array(
                'title' => 'Read',
        		'group' => $group,
                'siswa' => $siswa,
                'id_catatan' => $row->id_catatan,
                'id_kelas_siswa' => $row->id_kelas_siswa,
                'kelakuan' => $row->kelakuan,
                'kerajinan' => $row->kerajinan,
                'kebersihan' => $row->kebersihan,
                'izin' => $row->izin,
                'sakit' => $row->sakit,
                'alpa' => $row->alpa,
                'catatan' => $row->catatan,
            );
            $this->template->load('template','admin/rekap_nilai/rekap_nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rekap_nilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/rekap_nilai/create_action'),
	    'id_klstpq' => set_value('id_klstpq'),
	    'id_tpq' => set_value('id_tpq'),
	    'nama_tpq' => set_value('nama_tpq'),
	    'id_kelas' => set_value('id_kelas'),
	    'nama_kelas' => set_value('nama_kelas'),
	    'id_jenjang' => set_value('id_jenjang'),
	    'nama_jenjang' => set_value('nama_jenjang'),
	    'id_tahun_ajaran' => set_value('id_tahun_ajaran'),
	    'nama_ajaran' => set_value('nama_ajaran'),
	    'status' => set_value('status'),
	    'semester' => set_value('semester'),
	);
        $this->template->load('template','admin/rekap_nilai/rekap_nilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_klstpq' => $this->input->post('id_klstpq',TRUE),
		'id_tpq' => $this->input->post('id_tpq',TRUE),
		'nama_tpq' => $this->input->post('nama_tpq',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
		'nama_jenjang' => $this->input->post('nama_jenjang',TRUE),
		'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran',TRUE),
		'nama_ajaran' => $this->input->post('nama_ajaran',TRUE),
		'status' => $this->input->post('status',TRUE),
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->View_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/rekap_nilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->View_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/rekap_nilai/update_action'),
		'id_klstpq' => set_value('id_klstpq', $row->id_klstpq),
		'id_tpq' => set_value('id_tpq', $row->id_tpq),
		'nama_tpq' => set_value('nama_tpq', $row->nama_tpq),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
		'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
		'nama_jenjang' => set_value('nama_jenjang', $row->nama_jenjang),
		'id_tahun_ajaran' => set_value('id_tahun_ajaran', $row->id_tahun_ajaran),
		'nama_ajaran' => set_value('nama_ajaran', $row->nama_ajaran),
		'status' => set_value('status', $row->status),
		'semester' => set_value('semester', $row->semester),
	    );
            $this->template->load('template','admin/rekap_nilai/rekap_nilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rekap_nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_klstpq' => $this->input->post('id_klstpq',TRUE),
		'id_tpq' => $this->input->post('id_tpq',TRUE),
		'nama_tpq' => $this->input->post('nama_tpq',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
		'nama_jenjang' => $this->input->post('nama_jenjang',TRUE),
		'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran',TRUE),
		'nama_ajaran' => $this->input->post('nama_ajaran',TRUE),
		'status' => $this->input->post('status',TRUE),
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->View_kelas_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/rekap_nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->View_kelas_model->get_by_id($id);

        if ($row) {
            $this->View_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/rekap_nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rekap_nilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_klstpq', 'id klstpq', 'trim|required');
	$this->form_validation->set_rules('id_tpq', 'id tpq', 'trim|required');
	$this->form_validation->set_rules('nama_tpq', 'nama tpq', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');
	$this->form_validation->set_rules('id_jenjang', 'id jenjang', 'trim|required');
	$this->form_validation->set_rules('nama_jenjang', 'nama jenjang', 'trim|required');
	$this->form_validation->set_rules('id_tahun_ajaran', 'id tahun ajaran', 'trim|required');
	$this->form_validation->set_rules('nama_ajaran', 'nama ajaran', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file rekap_nilai.php */
/* Location: ./application/controllers/rekap_nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-09 09:43:01 */
/* http://harviacode.com */
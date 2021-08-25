<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_tpq extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_tpq_model');
        $this->load->model('Data_tpq_model');
        $this->load->library('form_validation');        
    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'kelas_tpq');
        $this->template->load('template','admin/kelas_tpq/kelas_tpq_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kelas_tpq_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kelas_tpq_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
        'id_klstpq' => $row->id_klstpq,
        'id_tpq' => $row->id_tpq,
        'id_kelas' => $row->id_kelas,
        'id_tahun_ajaran' => $row->id_tahun_ajaran,
        'semester' => $row->semester,
        );
            $this->template->load('template','admin/kelas_tpq/kelas_tpq_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_tpq'));
        }
    }

    public function create() 
    {
        $id = $this->session->userdata("id");
        $row = $this->Data_tpq_model->get_by_iduser($id);
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/kelas_tpq/create_action'),
            'id_klstpq' => set_value('id_klstpq'),
            'id_tpq' => set_value('id_tpq'),
            'id_kelas' => set_value('id_kelas'),
            'id_tahun_ajaran' => set_value('id_tahun_ajaran'),
            'semester' => set_value('semester'),
            'id_ustadz' => set_value('id_ustadz'),
            'id_tpq1' => $row->id_tpq,
        );
        $this->template->load('template','admin/kelas_tpq/kelas_tpq_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_tpq = $this->input->post('id_tpq',TRUE);
            $id_kelas = $this->input->post('id_kelas',TRUE);
            $id_tahun_ajaran = $this->input->post('id_tahun_ajaran',TRUE);
            $semester = $this->input->post('semester',TRUE);
            $id_ustadz = $this->input->post('id_ustadz',TRUE);

            $cek = $this->Kelas_tpq_model->get_by_data($id_tpq,$id_kelas,$id_tahun_ajaran,$semester);

            if (empty($cek)) {
                $data = array(
                    'id_tpq' => $id_tpq,
                    'id_kelas' => $id_kelas,
                    'id_tahun_ajaran' => $id_tahun_ajaran,
                    'id_ustadz' => $id_ustadz,
                    'semester' => $semester,
                );

                $this->Kelas_tpq_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
            }
            redirect(site_url('admin/view_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kelas_tpq_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/kelas_tpq/update_action'),
                'id_klstpq' => set_value('id_klstpq', $row->id_klstpq),
                'id_tpq' => set_value('id_tpq', $row->id_tpq),
                'id_tpq1' =>  set_value('id_tpq1', $row->id_tpq),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'id_tahun_ajaran' => set_value('id_tahun_ajaran', $row->id_tahun_ajaran),
                'semester' => set_value('semester', $row->semester),
                'id_ustadz' => set_value('id_ustadz', $row->id_ustadz),
               );
            $this->template->load('template','admin/kelas_tpq/kelas_tpq_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_tpq'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_klstpq', TRUE));
        } else {
            $data = array(
        'id_tpq' => $this->input->post('id_tpq',TRUE),
        'id_kelas' => $this->input->post('id_kelas',TRUE),
        'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran',TRUE),
        'semester' => $this->input->post('semester',TRUE),
        'id_ustadz' => $this->input->post('id_ustadz',TRUE),
        );

            $this->Kelas_tpq_model->update($this->input->post('id_klstpq', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/view_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kelas_tpq_model->get_by_id($id);

        if ($row) {
            $this->Kelas_tpq_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kelas_tpq'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_tpq'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_tpq', 'id tpq', 'trim|required');
    $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
    $this->form_validation->set_rules('id_tahun_ajaran', 'id tahun ajaran', 'trim|required');
    // $this->form_validation->set_rules('semester', 'semester', 'trim|required');

    $this->form_validation->set_rules('id_klstpq', 'id_klstpq', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas_tpq.php */
/* Location: ./application/controllers/Kelas_tpq.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 15:16:41 */
/* http://harviacode.com */
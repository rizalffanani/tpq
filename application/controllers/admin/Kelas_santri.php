<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_santri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_santri_model');
        $this->load->model('Kelas_santri_model');
        $this->load->model('Kelas_mapel_model');
        $this->load->model('View_kelas_model');
        $this->load->model('Catatan_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index($i="")
    {
        $row = $this->View_kelas_model->get_by_id($i);
        $data = array(
            'title' => $row->nama_tpq.' <br>Kelas '.$row->nama_kelas,
            'srt' => $i
        );
        $this->template->load('template','admin/kelas_santri/kelas_santri_list', $data);
    } 
    
    public function json() {
        $srt = $this->input->post('srt',TRUE);
        header('Content-Type: application/json');
        echo $this->Kelas_santri_model->json($srt);
    }

    public function read($id) 
    {
        $row = $this->Kelas_santri_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_kelas_siswa' => $row->id_kelas_siswa,
		'id_santri' => $row->id_santri,
		'id_klstpq' => $row->id_klstpq,
	    );
            $this->template->load('template','admin/kelas_santri/kelas_santri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_santri'));
        }
    }

    public function nilai($srt,$idm) 
    {
        $row = $this->Kelas_mapel_model->get_all_where($srt);
        $siswa = $this->Kelas_santri_model->get_all_nilai($idm);
        $data = array(  
            'title' => 'Nilai Santri',
            'button' => 'Save',
            'action' => site_url('admin/kelas_santri/nilai_action'),
            'id_kelas_siswa' => $idm,
            'id_klstpq' => $srt,
            'mapel' => $row, 
            'siswa' => $siswa, 
        );
        $this->template->load('template','admin/kelas_santri/nilai_form', $data);
    }

    public function nilai_action() 
    {
        $id_kelas_siswa = $this->input->post('id_kelas_siswa',TRUE);
        $id_klstpq = $this->input->post('id_klstpq',TRUE);
        $mapel = $this->Kelas_mapel_model->get_all_where($id_klstpq);
        foreach ($mapel as $key => $value){
            $cek = $this->Kelas_santri_model->get_cek_nilairow($id_kelas_siswa,$value->id_klsmapel);
            $data = array(
                'id_kelas_siswa ' => $id_kelas_siswa,
                'id_klsmapel ' => $value->id_klsmapel,
                'nilai ' => $this->input->post('nilai'.$value->id_klsmapel,TRUE),
            );
            if (empty($cek)) {
                $this->Kelas_santri_model->insert_nilai($data);
            } else {
                $this->Kelas_santri_model->update_nilai($cek->id_nilai,$data);
            }
        }

        redirect(site_url('admin/kelas_santri/index/'.$id_klstpq));
    }


    public function raport($id_klstpq,$idm)
    {
        // $this->load->view('frontend/download', $id);
        $dt = $this->Kelas_santri_model->get_by_id($idm);
        $dtl = $this->Data_santri_model->get_by_id($dt->id_santri);
        $row = $this->View_kelas_model->get_by_id($id_klstpq);
        $group = $this->Kelas_santri_model->get_all_nilai_group($idm);
        $siswa = $this->Kelas_santri_model->get_all_nilai_detail($idm);
        $rata = $this->Kelas_santri_model->get_all_nilai_rata($id_klstpq);
        $rank = $this->Kelas_santri_model->get_all_nilai_rank($id_klstpq);
        $catat = $this->Catatan_model->get_by_idk($idm);
        $data = array(
            'dtl' => $dtl,
            'row' => $row,
            'group' => $group,
            'siswa' => $siswa,
            'rata' => $rata,
            'rank' => $rank,
            'idm' => $idm,
            'catat' => $catat,
        );
        if (@$data) {
            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('admin/kelas_santri/raport_nilai',$data,true);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } 
        redirect(site_url('admin/kelas_santri/index/'.$id_klstpq));
    }

    public function print($id_klstpq='',$idm='')
    {
        $row = $this->View_kelas_model->get_by_id($id_klstpq);
        $group = $this->Kelas_santri_model->get_all_nilai_group($idm);
        $siswa = $this->Kelas_santri_model->get_all_nilai_detail($idm);
        $data = array(
            'row' => $row,
            'group' => $group,
            'siswa' => $siswa,
        );
        $this->load->view('admin/kelas_santri/raport_nilai',$data);
    }

    public function create($srt) 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/kelas_santri/create_action'),
    	    'id_kelas_siswa' => set_value('id_kelas_siswa'),
    	    'id_santri' => set_value('id_santri'),
    	    'id_klstpq' => $srt,
    	);
        $this->template->load('template','admin/kelas_santri/kelas_santri_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_santri = $this->input->post('id_santri',TRUE);
            $id_klstpq = $this->input->post('id_klstpq',TRUE);
            $cek = $this->Kelas_santri_model->get_cek($id_santri,$id_klstpq);
            if (empty($cek)) {
                $data = array(
                    'id_santri' => $id_santri,
                    'id_klstpq' => $id_klstpq,
                );
                $this->Kelas_santri_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
            }
            redirect(site_url('admin/kelas_santri/index/'.$id_klstpq));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kelas_santri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/kelas_santri/update_action'),
		'id_kelas_siswa' => set_value('id_kelas_siswa', $row->id_kelas_siswa),
		'id_santri' => set_value('id_santri', $row->id_santri),
		'id_klstpq' => set_value('id_klstpq', $row->id_klstpq),
	    );
            $this->template->load('template','admin/kelas_santri/kelas_santri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_santri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas_siswa', TRUE));
        } else {
            $data = array(
		'id_santri' => $this->input->post('id_santri',TRUE),
		'id_klstpq' => $this->input->post('id_klstpq',TRUE),
	    );

            $this->Kelas_santri_model->update($this->input->post('id_kelas_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kelas_santri'));
        }
    }
    
    public function delete($id,$id_klstpq) 
    {
        $row = $this->Kelas_santri_model->get_by_id($id);

        if ($row) {
            $this->Kelas_santri_model->delete2($id);
            $this->Kelas_santri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kelas_santri/index/'.$id_klstpq));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas_santri/index/'.$id_klstpq));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_santri', 'id santri', 'trim|required');
	$this->form_validation->set_rules('id_klstpq', 'id klstpq', 'trim|required');

	$this->form_validation->set_rules('id_kelas_siswa', 'id_kelas_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas_santri.php */
/* Location: ./application/controllers/Kelas_santri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 15:16:45 */
/* http://harviacode.com */
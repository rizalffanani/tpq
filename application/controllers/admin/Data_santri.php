<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_santri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_santri_model');
        $this->load->model('Info_model');
        $this->load->library('form_validation');        
    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'data_santri');
        $this->template->load('template','admin/data_santri/data_santri_list', $data);
    } 
    
    public function json() {
        $id = $this->session->userdata("id");
        header('Content-Type: application/json');
        echo $this->Data_santri_model->json($id);
    }

    public function read($id=0) 
    {
        if($this->session->userdata("lvl")=="User"){
            $id = $this->session->userdata("user_id");
            $row = $this->Data_santri_model->get_by_nid($id);
        }else{
            $row = $this->Data_santri_model->get_by_id($id);            
        }
        if ($row) {
            $data = array(
                'title' => 'Read',
                'button' => 'Upload',
                'action' => site_url('admin/data_santri/upload'),
                'id_santri' => $row->id_santri,
                'nama_lengkap' => $row->nama_lengkap,
                'nama_panggilan' => $row->nama_panggilan,
                'nomor_induk' => $row->nomor_induk,
                'tempat_lahir' => $row->tempat_lahir,
                'tanggal_lahir' => $row->tanggal_lahir,
                'anak_ke' => $row->anak_ke,
                'nama_ayah' => $row->nama_ayah,
                'nama_ibu' => $row->nama_ibu,
                'pekerjaan_ayah' => $row->pekerjaan_ayah,
                'pekerjaan_ibu' => $row->pekerjaan_ibu,
                'alamat_ortu' => $row->alamat_ortu,
                'telepon_ortu' => $row->telepon_ortu,
                'kelurahan' => $row->kelurahan,
                'kecamatan' => $row->kecamatan,
                'kota' => $row->kota,
                'provinsi' => $row->provinsi,
                'foto' => $row->foto,
                'tanggal_masuk' => $row->tanggal_masuk,
            );
            $this->template->load('template','admin/data_santri/data_santri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_santri'));
        }
    }

    public function create() 
    {
        $row = $this->Data_santri_model->get_by_idrow();
        $nmr = $this->Info_model->get_by_id("1");
        $nomor_induk=$nmr->format_nis;
        if ($row) {
            $nomor_induk=($row->nomor_induk+1);
        }
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/data_santri/create_action'),
            'id_santri' => set_value('id_santri'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'nama_panggilan' => set_value('nama_panggilan'),
            'nomor_induk' => $nomor_induk,
            'tempat_lahir' => set_value('tempat_lahir'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            'anak_ke' => set_value('anak_ke'),
            'nama_ayah' => set_value('nama_ayah'),
            'nama_ibu' => set_value('nama_ibu'),
            'pekerjaan_ayah' => set_value('pekerjaan_ayah'),
            'pekerjaan_ibu' => set_value('pekerjaan_ibu'),
            'alamat_ortu' => set_value('alamat_ortu'),
            'telepon_ortu' => set_value('telepon_ortu'),
            'kelurahan' => set_value('kelurahan'),
            'kecamatan' => set_value('kecamatan'),
            'kota' => set_value('kota'),
            'provinsi' => set_value('provinsi'),
            'foto' => set_value('foto'),
            'tanggal_masuk' => set_value('tanggal_masuk'),
        );
        $this->template->load('template','admin/data_santri/data_santri_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
                'nama_panggilan' => $this->input->post('nama_panggilan',TRUE),
                'nomor_induk' => $this->input->post('nomor_induk',TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                'anak_ke' => $this->input->post('anak_ke',TRUE),
                'nama_ayah' => $this->input->post('nama_ayah',TRUE),
                'nama_ibu' => $this->input->post('nama_ibu',TRUE),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
                'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
                'telepon_ortu' => $this->input->post('telepon_ortu',TRUE),
                'kelurahan' => $this->input->post('kelurahan',TRUE),
                'kecamatan' => $this->input->post('kecamatan',TRUE),
                'kota' => $this->input->post('kota',TRUE),
                'provinsi' => $this->input->post('provinsi',TRUE),
                'foto' => "default.png",
                'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
                'id_user' => $this->session->userdata("id"),
            );

            $this->Data_santri_model->insert($data);
            $this->createuser($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/data_santri'));
        }
    }

    public function createuser($data)
    {
        $this->load->model('Mlogin');
        $date = date("Y-m-d H:i:s");
        $data = array(
            'username' => $data['nomor_induk'],
            'password' => md5('123456'),
            'email' => $data['email'],
            'first_name' => $data['nama_panggilan'],
            'phone' => $data['telepon_ortu'],
            'Foto' => 'default.png',
            'active' => '1',
        );
        $this->Mlogin->inserttabel('users',$data);
        $ida= $this->db->insert_id();

        $data2 = array(
            'id' => $ida,
            'ip_address' => $this->input->ip_address(),
            'created_on' => $date,
        );
        $this->Mlogin->inserttabel('users_detail',$data2);

        $data = array(
            'id_aunt' => '3',
            'item_name' => 'User',
            'user_id' => $ida,
            'created_at' => $date,
        );
        $this->load->model('Auth_assignment_model');
        $this->Auth_assignment_model->insert($data);
    }
    
    public function update($id) 
    {
        $row = $this->Data_santri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/data_santri/update_action'),
        'id_santri' => set_value('id_santri', $row->id_santri),
        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
        'nama_panggilan' => set_value('nama_panggilan', $row->nama_panggilan),
        'nomor_induk' => set_value('nomor_induk', $row->nomor_induk),
        'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
        'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
        'anak_ke' => set_value('anak_ke', $row->anak_ke),
        'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
        'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
        'pekerjaan_ayah' => set_value('pekerjaan_ayah', $row->pekerjaan_ayah),
        'pekerjaan_ibu' => set_value('pekerjaan_ibu', $row->pekerjaan_ibu),
        'alamat_ortu' => set_value('alamat_ortu', $row->alamat_ortu),
        'telepon_ortu' => set_value('telepon_ortu', $row->telepon_ortu),
        'kelurahan' => set_value('kelurahan', $row->kelurahan),
        'kecamatan' => set_value('kecamatan', $row->kecamatan),
        'kota' => set_value('kota', $row->kota),
        'provinsi' => set_value('provinsi', $row->provinsi),
        'foto' => set_value('foto', $row->foto),
        'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
        );
            $this->template->load('template','admin/data_santri/data_santri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_santri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_santri', TRUE));
        } else {
            $data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'nama_panggilan' => $this->input->post('nama_panggilan',TRUE),
        'nomor_induk' => $this->input->post('nomor_induk',TRUE),
        'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
        'anak_ke' => $this->input->post('anak_ke',TRUE),
        'nama_ayah' => $this->input->post('nama_ayah',TRUE),
        'nama_ibu' => $this->input->post('nama_ibu',TRUE),
        'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
        'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
        'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
        'telepon_ortu' => $this->input->post('telepon_ortu',TRUE),
        'kelurahan' => $this->input->post('kelurahan',TRUE),
        'kecamatan' => $this->input->post('kecamatan',TRUE),
        'kota' => $this->input->post('kota',TRUE),
        'provinsi' => $this->input->post('provinsi',TRUE),
        // 'foto' => $this->input->post('foto',TRUE),
        'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
        );

            $this->Data_santri_model->update($this->input->post('id_santri', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/data_santri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_santri_model->get_by_id($id);

        if ($row) {
            $this->Data_santri_model->delete_nilai_santri($id);
            $this->Data_santri_model->delete_kelas_santri($id);
            $this->Data_santri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/data_santri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_santri'));
        }
    }

    function upload(){
        $id= $this->input->post('id_santri');
        $row = $this->Data_santri_model->get_by_id($id);
        $config = array(
            'upload_path' => 'assets/img/siswa',
            'allowed_types' => 'jpeg|jpg|png',
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
            $data = array('foto'=> 'default.png');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('foto'=> $fot);    
            if ($row->foto!="default.png") {
                unlink('assets/img/siswa/'.$row->foto);
            }          
        }
        $this->Data_santri_model->update($id,$data);
        $this->session->set_flashdata('hasil', $hasil);
        redirect(site_url('admin/data_santri/read/'.$id));
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
    $this->form_validation->set_rules('nama_panggilan', 'nama panggilan', 'trim|required');
    $this->form_validation->set_rules('nomor_induk', 'nomor induk', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
    $this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
    $this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
    $this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
    $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim|required');
    $this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim|required');
    $this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');
    $this->form_validation->set_rules('telepon_ortu', 'telepon ortu', 'trim|required');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
    $this->form_validation->set_rules('kota', 'kota', 'trim|required');
    $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

    $this->form_validation->set_rules('id_santri', 'id_santri', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_santri.php */
/* Location: ./application/controllers/Data_santri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 15:13:19 */
/* http://harviacode.com */
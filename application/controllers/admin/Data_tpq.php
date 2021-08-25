<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_tpq extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_tpq_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'data_tpq');
        $this->template->load('template','admin/data_tpq/data_tpq_list', $data);
    } 
    
    public function json() {
        $id = $this->session->userdata("id");
        header('Content-Type: application/json');
        echo $this->Data_tpq_model->json($id);
    }

    public function read($id) 
    {
        $row = $this->Data_tpq_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_tpq' => $row->id_tpq,
		'nama_tpq' => $row->nama_tpq,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'email' => $row->email,
		'ketua' => $row->ketua,
	    );
            $this->template->load('template','admin/data_tpq/data_tpq_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_tpq'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/data_tpq/create_action'),
    	    'id_tpq' => set_value('id_tpq'),
    	    'nama_tpq' => set_value('nama_tpq'),
    	    'alamat' => set_value('alamat'),
    	    'telp' => set_value('telp'),
    	    'email' => set_value('email'),
    	    'ketua' => set_value('ketua'),
    	);
        $this->template->load('template','admin/data_tpq/data_tpq_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nama_tpq' => $this->input->post('nama_tpq',TRUE),
        		'alamat' => $this->input->post('alamat',TRUE),
        		'telp' => $this->input->post('telp',TRUE),
        		'email' => $this->input->post('email',TRUE),
        		'ketua' => $this->input->post('ketua',TRUE),
    	    );

            $this->Data_tpq_model->insert($data);
            $ida= $this->db->insert_id();
            $this->createuser($ida,$data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/data_tpq'));
        }
    }

    public function createuser($user,$data)
    {
        $this->load->model('Mlogin');
        $date = date("Y-m-d H:i:s");
        $data = array(
            'username' => 'admintpq'.$user,
            'password' => md5('123456'),
            'email' => $data['email'],
            'first_name' => 'admintpq',
            'phone' => $data['telp'],
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
            'id_aunt' => '2',
            'item_name' => 'Admin',
            'user_id' => $ida,
            'created_at' => $date,
        );
        $this->load->model('Auth_assignment_model');
        $this->Auth_assignment_model->insert($data);

        $data3 = array('id_users' => $ida,);
        $this->Data_tpq_model->update($user, $data3);
    }
    
    public function update($id) 
    {
        $row = $this->Data_tpq_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/data_tpq/update_action'),
		'id_tpq' => set_value('id_tpq', $row->id_tpq),
		'nama_tpq' => set_value('nama_tpq', $row->nama_tpq),
		'alamat' => set_value('alamat', $row->alamat),
		'telp' => set_value('telp', $row->telp),
		'email' => set_value('email', $row->email),
		'ketua' => set_value('ketua', $row->ketua),
	    );
            $this->template->load('template','admin/data_tpq/data_tpq_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_tpq'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tpq', TRUE));
        } else {
            $data = array(
    		'nama_tpq' => $this->input->post('nama_tpq',TRUE),
    		'alamat' => $this->input->post('alamat',TRUE),
    		'telp' => $this->input->post('telp',TRUE),
    		'email' => $this->input->post('email',TRUE),
    		'ketua' => $this->input->post('ketua',TRUE),
    	    );

            $this->Data_tpq_model->update($this->input->post('id_tpq', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/data_tpq'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_tpq_model->get_by_id($id);

        if ($row) {
            $this->Data_tpq_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/data_tpq'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/data_tpq'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_tpq', 'nama tpq', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('ketua', 'ketua', 'trim|required');

	$this->form_validation->set_rules('id_tpq', 'id_tpq', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_tpq.php */
/* Location: ./application/controllers/Data_tpq.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 15:15:47 */
/* http://harviacode.com */
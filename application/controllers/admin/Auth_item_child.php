<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_item_child extends CI_Controller
{
        
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Auth_item_child_model');        
        $this->load->model('Web_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $auth_item_child = $this->Auth_item_child_model->get_all_view();
        // $data['err'] = $this->session->flashdata('message');
        $data = array(
            'auth_item_child_data' => $auth_item_child,
            'title' => 'Auth Item Child',
            'err'=> $this->session->flashdata('message')
        );

        $this->template->load('template','admin/auth_item_child/auth_item_child_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Auth_item_child_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idc' => $row->idc,
            'title' => 'Auth Item Child Read',
		'parent' => $row->parent,
		'child' => $row->child,
	    );
            $this->template->load('template','admin/auth_item_child/auth_item_child_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/auth_item_child'));
        }
    }

    public function create() 
    {
        $row = $this->Web_model->get_all_where("auth_item","tipe","1");
        $dataparent = $row->result();
        $data = array(
            'button' => 'Create',
            'title' => 'Auth Item Child Create',
            'action' => site_url('admin/auth_item_child/create_action'),
    	    'idc' => set_value('idc'),
    	    'parent' => set_value('parent'),
    	    'child' => set_value('child'),
            'dataparent' => $dataparent,
    	);
        $this->template->load('template','admin/auth_item_child/auth_item_child_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $parent = explode("/", $this->input->post('parent',TRUE));

            $child = $this->input->post('child',TRUE);
            $row = $this->Web_model->get_all_where("view_auth_child","parent",$parent[1]);
            $dataparent = $row->result();
            $datas = array();
            foreach ($dataparent as $key => $value) {
                if (!in_array($value->child, $child)) {   
                    $this->Auth_item_child_model->delete2($parent[0],$value->child);
                    echo $value->child;
                }
                $datas[] = $value->child;
            }
            for ($i=0; $i < count($child); $i++) { 
                if (!in_array($child[$i], $datas)) {                   
                    $data = array(
                        'id_aunt' =>$parent[0],
                        'parent' =>$parent[1],
                        'child' => $child[$i],
                    );

                    $this->Auth_item_child_model->insert($data);
                }
            }
            $this->session->set_flashdata('message', succ_msg('Create Record Success'));            
            redirect(site_url('admin/auth_item_child'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Auth_item_child_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
            'title' => 'Auth Item Child Update',
                'action' => site_url('admin/auth_item_child/update_action'),
		'idc' => set_value('idc', $row->idc),
		'parent' => set_value('parent', $row->parent),
		'child' => set_value('child', $row->child),
	    );
            $this->template->load('template','admin/auth_item_child/auth_item_child_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/auth_item_child'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idc', TRUE));
        } else {
            $data = array(
		'parent' => $this->input->post('parent',TRUE),
		'child' => $this->input->post('child',TRUE),
	    );

            $this->Auth_item_child_model->update($this->input->post('idc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/auth_item_child'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Auth_item_child_model->get_by_id($id);

        if ($row) {
            $this->Auth_item_child_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/auth_item_child'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/auth_item_child'));
        }
    }

    public function getMenu()
    {
        $kode = ($this->input->post('kode'));
        $kod = explode("/", $kode);
        //$this->Auth_item_child_model->get_kode();
        $row = $this->Web_model->get_all_where("view_auth_child","parent",$kod[1]);
        $dataparent = $row->result();
        $datas = array();
        foreach ($dataparent as $key => $value) {
            $datas[] = $value->child;
        }

        $row = $this->Web_model->get_all("menu");
        ?>
        <select name="child[]" class="form-control duallistbox" multiple="multiple">
            <?php foreach ($row as $key => $value) {
                $subaktif2 = (in_array($value->id, $datas)) ? "selected='selected'" : "" ;
                echo "<option value='".$value->id."' ".$subaktif2.">".
                strtoupper($value->name.'/'.$value->tipe.'['.$value->link.']').
                "</option>";
            }?>
        </select> <?php 
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('parent', 'parent', 'trim|required');
	$this->form_validation->set_rules('child[]', 'child', 'trim|required');

	$this->form_validation->set_rules('idc', 'idc', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Auth_item_child.php */
/* Location: ./application/controllers/Auth_item_child.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-13 17:37:56 */
/* http://harviacode.com */
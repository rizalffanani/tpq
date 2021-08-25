<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller
{
    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

        if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
            die();
        }
        parent::__construct();
        $this->load->model('Web_model');
    }

    public function index()
    {
        $kategori       = $this->Web_model->get_all_kategori();
        $menu           = $this->Web_model->get_all_menu();
        $order          = $this->Web_model->get_all_order();
        $order_detail   = $this->Web_model->get_all_order_detail();
        $slide           = $this->Web_model->get_all_slider();

        $b  = array('slide' => $slide, 'kategori' => $kategori, 'menu' => $menu, 'order' => $order, 'order_detail' => $order_detail);

        $this->template->load('v_web','frontend/home', $b);
    }    
    public function ce()
    {
       echo 's';
    }
    function chart()
    {
        $b = array();
        $this->template->load('v_web','frontend/cart', $b);
    }
    function add_to_cart($id,$qty){ //fungsi Add To Cart

        $row = $this->Web_model->get_by_id($id);
        $kategori       = $this->Web_model->get_by_idkat($row->id_kategori);
        if ($row) {
            $datas= array(
                'id' => $row->id_menu,
                'name' => $row->nama_menu,
                'price' => $row->harga,
                'qty' => $qty, 
                'id_kategori' => $row->id_kategori,
                'gambar' => $row->foto_menu,
                'nama_kategori' => $kategori->nama_kategori,
            );
            $this->cart->product_name_rules = '[:print:]';
            $this->cart->insert($datas);
            echo(count($this->cart->contents()));
        }
    }
    public function update_cart($a,$b)
    {
        $data = array(
            'rowid' => $a,
            'qty' => $b,
        );
        $this->cart->update($data);
        $rp = array(
            'format' => $this->cart->format_number($this->cart->total()),
            'nilai' => $this->cart->total()
        );
        echo(json_encode($rp));
    }
 
    function show_cart(){ 
        $auth_assignment = $this->Produk_model->get_all5('transaksi');
        $data = array(
            'barang_dat1' => 'hf',
            'barang_data' => $auth_assignment
        );
        $this->template->load('template','frontend/cart', $data);
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart($row_id){ //fungsi untuk menghapus item cart
        $this->cart->remove($row_id);
        $rp = array(
            'jml' =>count($this->cart->contents()),
            'format' => $this->cart->format_number($this->cart->total()),
            'nilai' => $this->cart->total(),
        );
        echo(json_encode($rp));
    }   

    function tyi($value=''){
        $this->load->view('v_web');
    }

    function simpan(){

        $nama_menu = $this->input->post('nama_menu');
        $harga_menu = $this->input->post('harga_menu');
        $kategori = $this->input->post('kategori');
        $deskripsi_menu = $this->input->post('deskripsi');
        
        $data = array('nama_menu' => $nama_menu, 'harga' => $harga_menu, 'id_kategori' => $kategori, 'deskripsi_menu' => $deskripsi_menu );
        $this->Web_model->insert($data);
        redirect('web');

    }
    public function checkout($user)
    {
        $data = array(
            'id_user' =>  $user,
            'total_harga' => $this->cart->total(),
            'date' => date("Y-m-d"),
            'waktu' => date("H:i:s"),
            'bayar' => 0,
        );
        $table="order";
        $this->Web_model->insertall($table,$data);
        $ida= $this->db->insert_id();
        foreach($this->cart->contents() as $key){
            $data = array(
                'id_order' =>  $ida,
                'id_menu' => $key['id'],
                'nama_menu' => $key['name'],
                'id_kategori' => $key['id_kategori'],
                'nama_kategori' => $key['nama_kategori'],
                'qty' => $key['qty'],
                'harga' => $key['price'],
                'total_harga' => $key['subtotal'],
                'gambar' => $key['gambar'],
            );
            $table="order_detail";
            $this->Web_model->insertall($table,$data);
            $this->cart->remove($key['rowid']);
        }
        echo ($ida);
    }   
    public function ckt($id)
    {
        $order = $this->Web_model->get_all_where('order','id_order', $id);
        $order_detail = $this->Web_model->get_all_where('order_detail','id_order', $id);
        $b = array('order'=>$order->row(),'detail'=>$order_detail->result());
        $this->template->load('v_web','frontend/ckt', $b);
    }
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-07 01:38:10 */
/* http://harviacode.com */
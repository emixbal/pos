<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Kasir
 * 
 * @author emixbal
 */
class Kasir extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kasir_model');
    }
    public function index() {
        if (!$this->ion_auth->logged_in()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Aplikasi Unggul Pos';
            $data['main_view']  = 'kasir/home';
            
            $this->load->view('kasir/template', $data);
        }
    }
    
    public function chart_add() {
        if (!$this->ion_auth->logged_in()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Aplikasi Unggul Pos';
            $data['main_view']  = 'kasir/chart_add';
            
            $this->load->view('kasir/template', $data);
        }
    }

    public function koleksi_get_detail(){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{
            $koleksi    = $this->Kasir_model->koleksi_get_filter_kode_koleksi($_POST['kode_koleksi'])->row();
            $koleksi    = json_encode($koleksi);
            $this->output
                ->set_content_type('application/json')
                ->set_output($koleksi);
        }
    }

    public function transaksi_penjualan_add(){
        $uniq   = $_POST['uniq'];
        $data   = array(
            'uniq'  => $_POST['uniq'],
            'user_id'  => $_POST['user_id'],
        );
        $this->Kasir_model->transaksi_penjualan_add($data);
    }

    public function koleksi_transaksi_add(){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{
            if($this->Kasir_model->koleksi_get_stok_filter_koleksi_id($_POST['koleksi_id'])){
                $transaksi_penjualan_id = $this->Kasir_model->get_transaksi_penjualan_id($_POST['uniq'])->row()->id;

                if(!is_null($this->Kasir_model->cek_koleksi_exsit($transaksi_penjualan_id,$_POST['koleksi_id'])->row())){
                    #cek transaksi apa koleksi yang sama sudah ada
                    #jika sudah update qty
                    $this->Kasir_model->koleksi_transaksi_update_qty($transaksi_penjualan_id, $_POST['koleksi_id']);
                }else{
                    $data = array(
                        'transaksi_penjualan_id' => $transaksi_penjualan_id,
                        'koleksi_id'    => $_POST['koleksi_id'],
                        'koleksi_name'  => $_POST['koleksi_name'],
                        'harga_beli'    => $_POST['harga_beli'],
                        'harga_jual'    => $_POST['harga_jual'],
                    );
                    $this->Kasir_model->koleksi_transaksi_add($data);
                }
                $this->Kasir_model->koleksi_update_stok($_POST['koleksi_id']);
                print_r($transaksi_penjualan_id);
            }
        }
    }

    public function koleksi_transaksi_get_filter($transaksi_penjualan_id){
        $koleksi    = $this->Kasir_model->koleksi_transaksi_get_filter($transaksi_penjualan_id)->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($koleksi));
    }
    public function transaksi_penjualan_bayar(){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{
            $data = array(
                't_harga_beli' => $_POST['t_harga_beli'],
                't_harga_jual' => $_POST['t_harga_jual'],
                'nominal_bayar'=> $_POST['nominal_bayar']
            );
            $this->Kasir_model->transaksi_penjualan_bayar($_POST['uniq'], $data);
        }
    }

    public function cari_koleksi(){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{
            $koleksis = $this->Kasir_model->cari_koleksi($_POST['koleksi_key'])->result();
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($koleksis));              
        }
    }

    public function transaksi_penjualan_qty_update(){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{
            $data   = array(
                'koleksi_transaksi_id' => $_POST['koleksi_transaksi_id'],
                'new_qty'   => $_POST['new_qty'],
                'koleksi_id' => $_POST['koleksi_id'],
            );
        }
        $this->Kasir_model->transaksi_penjualan_qty_update($data);
    }

    public function transaksi_penjualan_detail($transaksi_penjualan_id){
        if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()){
            show_404();
        } else{        
            $transaksi_penjualan= $this->Kasir_model->transaksi_penjualan_detail($transaksi_penjualan_id)->result();
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($transaksi_penjualan));  
        }
        
    }
    
    public function penjualan_get(){
        if (!$this->ion_auth->logged_in()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Aplikasi Unggul Pos';
            $data['main_view']  = 'kasir/penjualan_get';


            $hari_ini = date('Y-m-d');
            $data['transaksi_penjualans']=$this->Kasir_model->transaksi_penjualan_get($hari_ini)->result();
            
            $this->load->view('kasir/template', $data);
        }
    }

    public function jajal(){
        $hari_ini = date('Y-m-d');
        echo $hari_ini;
    }
}
?>

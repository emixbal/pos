<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin
 * Kontrol hasil penjualan
 * kontrol stok
 * create akun kasir baru
 * delete/update akun kasir
 * @author emixbal
 */
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    public function index() {
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Dashboard';
            $data['main_view']  = 'admin/dashboard';

            $data['resume']    = $this->Admin_model->resume_in_day(date("Y-m-d"))->row();
            
            $this->load->helper('konversi');
            $this->load->view('admin/template', $data);
        }
    }
    public function koleksi_add() {
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Tambah Koleksi';
            $data['main_view']  = 'admin/koleksi_tambah_fm';
            
            $this->load->view('admin/template', $data);
        }
    }

    public function koleksi_add_do(){
        if (!$this->ion_auth->is_admin() || !$this->input->is_ajax_request()){
            show_404();
        }  else {
            //save data
            $this->Admin_model->koleksi_add($_POST);
            //getting result
            $koleksis   = $this->Admin_model->get_koleksi_filter_kode_invoice($_POST['kode_invoice'])->result();
            $koleksis   = json_encode($koleksis); #encode response data
            $this->output->set_content_type('application/json')->set_output($koleksis); #set response data type
        }
    }
    public function koleksi_show($order='created_at',$type='ASC'){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Lihat Koleksi';
            $data['main_view']  = 'admin/koleksi_show';
            
            $data['koleksis']   = $this->Admin_model->koleksi_get_all()->result();
            
            $this->load->view('admin/template', $data);
        }        
    }

    public function koleksi_show_stok_0(){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            $data['title']      = 'Lihat Koleksi';
            $data['main_view']  = 'admin/koleksi_show_stok_0';
            
            $data['koleksis']   = $this->Admin_model->koleksi_get_stok_0()->result();
            
            $this->load->view('admin/template', $data);
        }        
    }

    public function koleksi_delete_multiple(){
        if (!$this->ion_auth->is_admin() || !$_POST){
            show_404();
        }  else {
            foreach ($_POST['koleksi_delete_check'] as $key => $value) {
                $this->Admin_model->koleksi_delete_multiple($value);
            }
            redirect('Admin/koleksi_show_stok_0');
        }
    }

    public function koleksi_detail($koleksi_id){
        if (!$this->ion_auth->is_admin() || !$this->input->is_ajax_request()){
            show_404();
        }  else {
            $koleksi    = $this->Admin_model->koleksi_detail($koleksi_id)->row();
            $koleksis   = json_encode($koleksi); #encode response data
            $this->output->set_content_type('application/json')->set_output($koleksis); #set response data type            
        }
    }

    public function koleksi_update(){
        if (!$this->ion_auth->is_admin() || !$_POST){
            show_404();
        }  else {
            print_r($_POST);
            $data   = array(
                'name'          => $_POST['nama_koleksi'],
                'kode_koleksi'  => $_POST['kode_koleksi'],
                'harga_beli'    => $_POST['harga_beli'],
                'harga_jual'    => $_POST['harga_jual'],
                'stok'          => $_POST['stok'],
                'keterangan'    => $_POST['keterangan']
            );
            $this->Admin_model->koleksi_update($_POST['koleksi_id'],$data);
            redirect('Admin/koleksi_show');
        }
    }

    public function chart_omset_transaksis_perday_last30(){
        if (!$this->ion_auth->is_admin() || !$this->input->is_ajax_request()){
            show_404();
        }  else {
            $month = date('m');
            $year = date('Y');

            $resume_transaksi   = $this->Admin_model->resume_transaksis_perday_last30()->result();
            $resume_omset       = $this->Admin_model->resume_omsets_perday_last30()->result();
            $data = array(
                'resume_transaksi' => $resume_transaksi,
                'resume_omset' => $resume_omset,
            );
            $data = json_encode($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output($data);
        }
    }

    public function chart_transaksi_omset_modal_permonth($month, $year){
        if (!$this->ion_auth->is_admin() || !$this->input->is_ajax_request()){
            show_404();
        }  else {
            $data   = $this->Admin_model->chart_transaksi_omset_modal_permonth($month, $year)->result();
            
            $data = json_encode($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output($data);
        }
    }

    public function chart_transaksi_omset_modal_peryear($year){
        if (!$this->ion_auth->is_admin() || !$this->input->is_ajax_request()){
            show_404();
        }  else {
            $data   = $this->Admin_model->chart_transaksi_omset_modal_peryear($year)->result();
            
            $data = json_encode($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output($data);
        }
    }

    public function penjualan_laporan_get_filter_date($date=''){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            if($_GET){
                $date=$_GET['date'];
                $data['penjualans'] = $this->Admin_model->penjualan_get_filter_date($date)->result();
                $data['date']  = $date;
            } elseif (!$_GET) {
                $data['penjualans'] = $this->Admin_model->penjualan_get_filter_date($date)->result();
                $data['date']  = $date;
            }

            $data['title']      = 'Laporan Transaksi Harian';
            $data['main_view']  = 'admin/penjualan_get_filter_date';

            $data['total']      = $this->Admin_model->get_total_filter_date($date)->row();

            $this->load->helper('konversi');
            $this->load->view('admin/template', $data);
        }        
    }

    public function penjualan_laporan_get_filter_month($month='', $year=''){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            if($_GET){
                $month=$_GET['month'];
                $year=$_GET['year'];

                $data['penjualans']    = $this->Admin_model->penjualan_get_filter_month($month, $year)->result();

                $data['month']  = $month;
                $data['year']   = $year;

            } elseif (!$_GET) {
                $data['penjualans']    = $this->Admin_model->penjualan_get_filter_month($month, $year)->result();

                $data['month']  = $month;
                $data['year']   = $year;
            }

            $data['title']      = 'Laporan Transaksi Perbulan';
            $data['main_view']  = 'admin/penjualan_get_filter_month';

            $this->load->helper('konversi');
            $data['total']      = $this->Admin_model->get_total_filter_month($month, $year)->row();

            $this->load->view('admin/template', $data);
        }
    }

    public function penjualan_laporan_get_filter_year($year=''){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        }  else {
            if($_GET){
                $year=$_GET['year'];

                $data['penjualans']    = $this->Admin_model->penjualan_get_filter_year($year)->result();
                $data['year']   = $year;

            } elseif (!$_GET) {
                $data['penjualans']    = $this->Admin_model->penjualan_get_filter_year($year)->result();
                $data['year']   = $year;
            }
            $data['title']      = 'Laporan Transaksi Pertahun';
            $data['main_view']  = 'admin/penjualan_get_filter_year';

            //$data['total']      = $this->Admin_model->get_total_filter_month($month, $year)->row();
            $this->load->helper('konversi');
            $this->load->view('admin/template', $data);
        }
    }

    public function jajal(){
        //echo  $this->Jamkeberangkatan_model->update($data);
        $time = now();
        echo standard_date('DATE_RFC822', $time);
    }

    public function jujul($value='')
    {
        echo '<a href="'.site_url('Kasir').'">klik</a>';
    }
    
}
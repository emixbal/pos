<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin_model
 * 
 * @author emixbal
 */
class Admin_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function coba(){
        return 'halo coba';
    }
    
    public function get_koleksi_filter_kode_invoice($kode_invoice) {
        $query = $this->db->get_where('koleksi', array('kode_invoice' => $kode_invoice));
        return $query;
    }
    
    public function koleksi_add($data) {
        $this->db->insert('koleksi', $data);
    }
    
    public function koleksi_get_all(){
        return $this->db->get('koleksi');
    }

    public function koleksi_get_stok_0(){
        $query = $this->db->get_where('koleksi', array('stok' => 0));
        return $query;
    }

    public function koleksi_delete_multiple($koleksi_id){
        $this->db->where('id', $koleksi_id);
        $this->db->delete('koleksi');
    }

    public function koleksi_detail($koleksi_id){
        $query = $this->db->get_where('koleksi', array('id' => $koleksi_id));
        return $query;
    }

    public function koleksi_update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('koleksi', $data);
    }

    public function resume_transaksis_perday_last30(){
        $query_string= "
        SELECT date(created_at) AS tanggal, COUNT(day(created_at)) AS total_transaksi
        FROM transaksi_penjualan
        WHERE date_sub(date(now()), INTERVAL 30 DAY) <= date(created_at)
        GROUP BY day(created_at)";

        return $this->db->query($query_string);
    }

    public function resume_omsets_perday_last30(){
        $query_string = "
        SELECT date(created_at) AS tanggal, SUM(t_harga_jual) AS omset
        FROM transaksi_penjualan
        WHERE date(created_at) >= date_sub(date(now()), INTERVAL 30 DAY)
        GROUP BY day(created_at)";

        return $this->db->query($query_string);
    }

    public function resume_transaksis_perday_inmonth($month, $year){
        $query_string = "
        SELECT date(created_at) AS tanggal, COUNT(day(created_at)) AS total_transaksi
        FROM transaksi_penjualan
        WHERE month(created_at)=".$month." AND year(created_at)=".$year."
        GROUP BY day(created_at)";

        return $this->db->query($query_string);
    }
    public function resume_omsets_perday_inmonth($month, $year){
        $query_string = "
        SELECT date(created_at) AS tanggal, SUM(t_harga_jual) AS omset
        FROM transaksi_penjualan
        WHERE month(created_at)=".$month." AND year(created_at)=".$year."
        GROUP BY day(created_at)";

        return $this->db->query($query_string);
    }

    public function resume_in_day($date){
        $query_string=" SELECT
        COUNT(*)  AS total_transaksi, SUM(t_harga_jual) AS omset,
        SUM(t_harga_jual-t_harga_beli) as profit
        FROM transaksi_penjualan
        WHERE date(created_at)='".$date."'";

        return $this->db->query($query_string);
    }

    public function get_total_filter_date($date){
        $query_string="SELECT COUNT(DISTINCT tp.id) as transaksi,
        COUNT(kt.id) AS item, SUM(kt.qty) AS qty,
        SUM(DISTINCT tp.t_harga_jual) AS omset, SUM(DISTINCT tp.t_harga_beli) AS modal,
        SUM(DISTINCT tp.t_harga_jual)-SUM(DISTINCT tp.t_harga_beli) AS profit
        FROM transaksi_penjualan tp, koleksi_transaksi kt
        WHERE kt.transaksi_penjualan_id=tp.id
        AND date(created_at)='".$date."'";

        return $this->db->query($query_string);
    }

    public function penjualan_get_filter_date($date){
        $query_string="SELECT tp.id as id, DATE_FORMAT(tp.created_at, '%H:%i:%s') as waktu_transaksi,
        COUNT(*) as jumlah_item,
        SUM(kt.qty) as qty,
        users.first_name as kasir,
        tp.t_harga_jual, tp.t_harga_beli, tp.t_harga_jual-tp.t_harga_beli AS profit
        FROM koleksi_transaksi kt, transaksi_penjualan tp, users
        WHERE tp.id=kt.transaksi_penjualan_id AND tp.user_id=users.id
        AND date(created_at)='".$date."' GROUP BY tp.id";
        
        return $this->db->query($query_string);
    }

    public function penjualan_get_filter_month($month, $year){
        $query_string="SELECT tp.id as id, DATE_FORMAT(tp.created_at, '%d %M %Y - %H:%i:%s') as waktu_transaksi,
        COUNT(kt.id) as jumlah_item,
        SUM(kt.qty) as qty,
        users.first_name as kasir,
        tp.t_harga_jual, tp.t_harga_beli, tp.t_harga_jual-tp.t_harga_beli AS profit
        FROM koleksi_transaksi kt, transaksi_penjualan tp, users
        WHERE tp.id=kt.transaksi_penjualan_id
        AND tp.user_id=users.id
        AND month(created_at)='".$month."' AND year(created_at)='".$year."'
        GROUP BY tp.id";

        return $this->db->query($query_string);
    }

    public function penjualan_get_filter_year($year){
        $query_string="SELECT month(tp.created_at) AS month, COUNT(DISTINCT tp.id) AS total_transaksi,
        COUNT(kt.id) AS total_item, SUM(kt.qty) AS total_qty,
        SUM(DISTINCT tp.t_harga_jual) AS total_omset, SUM(DISTINCT tp.t_harga_beli) AS total_modal,
        SUM(DISTINCT tp.t_harga_jual)-SUM(DISTINCT tp.t_harga_beli) AS total_profit
        FROM transaksi_penjualan tp, koleksi_transaksi kt
        WHERE kt.transaksi_penjualan_id=tp.id
        AND year(tp.created_at)='".$year."'
        GROUP BY month(tp.created_at)";

        return $this->db->query($query_string);
    }

    public function get_total_filter_month($month, $year){
        $query_string="SELECT COUNT(DISTINCT tp.id) as transaksi,
        COUNT(kt.id) AS item, SUM(kt.qty) AS qty,
        SUM(DISTINCT tp.t_harga_jual) AS omset, SUM(DISTINCT tp.t_harga_beli) AS modal,
        SUM(DISTINCT tp.t_harga_jual)-SUM(DISTINCT tp.t_harga_beli) AS profit
        FROM transaksi_penjualan tp, koleksi_transaksi kt
        WHERE kt.transaksi_penjualan_id=tp.id
        AND month(created_at)='".$month."'
        AND year(created_at)='".$year."'";

        return $this->db->query($query_string);
    }

    public function chart_transaksi_omset_modal_permonth($month, $year){
        $query_string="SELECT date(created_at) AS date, SUM(t_harga_beli) AS modal, SUM(t_harga_jual) AS omset,
        SUM(t_harga_jual)-SUM(t_harga_beli) AS profit, COUNT(*) AS total_transaksi
        FROM transaksi_penjualan
        WHERE month(created_at)='".$month."' AND year(created_at)='".$year."'
        GROUP BY date(created_at)";

        return $this->db->query($query_string);
    }

    public function chart_transaksi_permonth($month, $year){
        $query_string="SELECT date(created_at) AS date, SUM(t_harga_beli) AS modal, SUM(t_harga_jual) AS omset,
        SUM(t_harga_jual)-SUM(t_harga_beli) AS profit
        FROM transaksi_penjualan
        WHERE month(created_at)='".$month."' AND year(created_at)='".$year."'
        GROUP BY date(created_at)";

        return $this->db->query($query_string);
    }

    public function chart_transaksi_omset_modal_peryear($year){
        #$query_string="SELECT SUBSTR(DATE_FORMAT(created_at, '%M'),1, 3) AS bulan, COUNT(*) AS total_transaksi,
        $query_string="SELECT month(created_at) AS bulan, COUNT(*) AS total_transaksi,
        SUM(t_harga_jual) AS omset, SUM(t_harga_beli) AS modal, SUM(t_harga_jual)-SUM(t_harga_beli) AS profit
        FROM transaksi_penjualan
        WHERE year(created_at)='".$year."'
        GROUP BY month(created_at)";

        return $this->db->query($query_string);
    }



}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Kasir_model
 * 
 * @author emixbal
 */
class Kasir_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function koleksi_get_filter_koleksiid($koleksi_id){
    	return $this->db->get_where('koleksi', array('id' => $koleksi_id));
		
    }
    public function koleksi_get_filter_kode_koleksi($kode_koleksi){
        $query_string = "SELECT * FROM koleksi WHERE kode_koleksi = '".$kode_koleksi."' AND stok > 0";
        return $this->db->query($query_string);

        $data = array(
            'kode_koleksi' => $kode_koleksi,
            'stok' => '>0',
        );
    	return $this->db->get_where('koleksi', $data);
    }

    public function koleksi_get_stok_filter_koleksi_id($koleksi_id){
        return $this->db->get_where('koleksi', array('id' => $koleksi_id))->row()->stok;
    }

    public function transaksi_penjualan_add($data){
		$this->db->insert('transaksi_penjualan', $data);
    }

    public function get_transaksi_penjualan_id($uniq){
    	return $this->db->get_where('transaksi_penjualan', array('uniq' => $uniq));
    }

    public function koleksi_transaksi_add($data){
    	$this->db->insert('koleksi_transaksi', $data);
    }

    public function koleksi_transaksi_update_qty($transaksi_penjualan_id, $koleksi_id){
        $key = array(
            'transaksi_penjualan_id' => $transaksi_penjualan_id,
            'koleksi_id' => $koleksi_id
        );
        #$koleksi_transaksi_id = $this->db->get_where('koleksi_transaksi', $key)->row()->id;

        $this->db->set('qty', 'qty+1', FALSE);
        $this->db->where($key);
        $this->db->update('koleksi_transaksi');
    }

    public function koleksi_transaksi_get_filter($transaksi_penjualan_id){
        $query_string="SELECT kt.id, kt.transaksi_penjualan_id, kt.koleksi_id, k.name, k.harga_beli, k.harga_jual, kt.qty
            FROM koleksi_transaksi kt, koleksi k
            WHERE kt.koleksi_id=k.id AND kt.transaksi_penjualan_id=".$transaksi_penjualan_id;
        
        return $this->db->query($query_string);
    }

    public function koleksi_update_stok($koleksi_id){
        $this->db->set('stok', 'stok-1', FALSE);
        $this->db->where('id', $koleksi_id);
        $this->db->update('koleksi');        
    }

    public function cek_koleksi_exsit($transaksi_penjualan_id, $koleksi_id){
        $data = array(
            'transaksi_penjualan_id' => $transaksi_penjualan_id,
            'koleksi_id' => $koleksi_id
        );
        return $this->db->get_where('koleksi_transaksi', $data);
    }

    private function get_current_qty($koleksi_transaksi_id){
        $this->db->select('qty');
        $this->db->where('id', $koleksi_transaksi_id);
        return $this->db->get('koleksi_transaksi')->row()->qty;
    }
    private function update_qty($id, $new_qty){
        $data = array('qty' => $new_qty);
        $this->db->where('id', $id);
        $this->db->update('koleksi_transaksi', $data);
    }

    public function update_koleksi_stok($id, $new_stok){
        $data = array('stok' => $new_stok);
        $this->db->where('id', $id);
        $this->db->update('koleksi', $data);
    }

    public function koleksi_transaksi_delete($id){
        $this->db->where('id', $id);
        $this->db->delete('koleksi_transaksi');        
    }

    public function transaksi_penjualan_qty_update($data){
        $current_qty = $this->get_current_qty($data['koleksi_transaksi_id']);
        $koleksi_stok = $this->koleksi_get_filter_koleksiid($data['koleksi_id'])->row()->stok;

        if(($data['new_qty'] > $current_qty) && (($koleksi_stok-($data['new_qty']-$current_qty))>=0)){
            $selisih = ($data['new_qty']-$current_qty);
            $new_koleksi_stok = $koleksi_stok-$selisih;

            $this->update_qty($data['koleksi_transaksi_id'],$data['new_qty']);
            $this->update_koleksi_stok($data['koleksi_id'], $new_koleksi_stok);
        } elseif (($data['new_qty'] < $current_qty)) {
            $selisih = $current_qty-$data['new_qty'];
            $new_koleksi_stok = $koleksi_stok+$selisih;

            if($data['new_qty']>0){
                $this->update_qty($data['koleksi_transaksi_id'],$data['new_qty']);
            } elseif ($data['new_qty']==0) {
                $this->koleksi_transaksi_delete($data['koleksi_transaksi_id']);
            }
            $this->update_koleksi_stok($data['koleksi_id'], $new_koleksi_stok);
        }
    }

    public function transaksi_penjualan_bayar($uniq, $data){
        $this->db->where('uniq', $uniq);
        $this->db->update('transaksi_penjualan', $data);       
    }

    public function cari_koleksi($key){
        $query_string = "SELECT * FROM koleksi WHERE name LIKE '%".$key."%' ORDER BY id ASC LIMIT 20";
        return $this->db->query($query_string);
    }

    /*
    laporan penjualan di bawah sini
     */
    public function transaksi_penjualan_get_all(){
        $query = $this->db->get('transaksi_penjualan'); 
        return $query;
    }

    public function transaksi_penjualan_detail($transaksi_penjualan_id){
        $query_string="SELECT kt.id, kt.koleksi_id, kt.koleksi_name, k.kode_koleksi, kt.qty, kt.harga_jual
        FROM koleksi_transaksi kt, koleksi k
        WHERE kt.koleksi_id=k.id AND kt.transaksi_penjualan_id=".$transaksi_penjualan_id;
        return $this->db->query($query_string);
    }

    public function transaksi_penjualan_get($date){
        $query_string="
        SELECT tp.id as id, DATE_FORMAT(tp.created_at, '%d %M %Y - %H:%i:%s') as waktu_transaksi,
        COUNT(*) as jumlah_item,
        SUM(kt.qty) as qty,
        users.first_name as kasir, tp.t_harga_jual
        FROM koleksi_transaksi kt, transaksi_penjualan tp, users
        WHERE tp.id=kt.transaksi_penjualan_id
        AND tp.user_id=users.id
        AND date(created_at)='".$date."' GROUP BY tp.id";
        
        return $this->db->query($query_string);        
    }
}
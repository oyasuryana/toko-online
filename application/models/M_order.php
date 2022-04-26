<?php
defined('BASEPATH') or die ('Error');

Class M_order extends CI_model {
	
	public function AmbilSemuaOrder(){
		$this->db->select('tbl_user.nama_lengkap,tbl_pembelian.email,tbl_pembelian.id_pembelian,
		tbl_pembelian.tanggal_pembelian,sum(tbl_detail_pembelian.jml_beli) AS jumlah_pembelian,
							sum(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_pembelian');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian');					
		$this->db->join('tbl_user','tbl_pembelian.email=tbl_user.email');
		$this->db->order_by('tanggal_pembelian','desc');
		$this->db->group_by('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian');
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}
	
	public function AmbilDataOrder($id_pembelian){
		$this->db->select('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,tbl_user.nama_lengkap');
		$this->db->join('tbl_user','tbl_user.email=tbl_pembelian.email');
		$this->db->where('id_pembelian',$id_pembelian);
		$sql=$this->db->get('tbl_pembelian');
		if($sql->num_rows()==1){
			return $sql->row_array();
		}
	}	

	public function AmbilDetailOrder($id_pembelian){
		$this->db->select('tbl_produk.kode_produk,tbl_produk.nama_produk,tbl_produk.merk,tbl_pembelian.id_pembelian,
		tbl_pembelian.tanggal_pembelian,tbl_detail_pembelian.jml_beli,tbl_produk.harga_jual,
							(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_harga');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian');					
		$this->db->where('tbl_pembelian.id_pembelian',$id_pembelian);
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}	

}

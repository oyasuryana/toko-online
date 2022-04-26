<?php
defined('BASEPATH') or die ('Error');

Class M_beli extends CI_model {



	public function TampilPembelian($member){
		/*
			SELECT tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,sum(tbl_detail_pembelian.jml_beli) AS jml_pembelian,sum(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual) AS total_pembelian
			FROM tbl_detail_pembelian
			JOIN tbl_produk ON tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk
			JOIN tbl_pembelian ON tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian
			GROUP BY tbl_pembelian.email,tbl_pembelian.tanggal_pembelian
 */		$this->db->select('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,sum(tbl_detail_pembelian.jml_beli) AS jumlah_pembelian,
							sum(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_pembelian');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian');					
		$this->db->where('email',$member);
		$this->db->where('status_pembelian','pending');
		$this->db->group_by('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian');
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}


	public function SimpanBeli(){
		
		$DataPembelian=array(
		'tanggal_pembelian'=>date('Y-m-d H:i:s'),
		'email'=>$this->session->userdata('SesEmail')
		);
		$this->db->insert('tbl_pembelian',$DataPembelian);

        // Mencatat IdPembelianTerakhir dari AutoIncrement
        $this->session->set_userdata('IdPembelianTerakhir',$this->db->insert_id());
	}
	
	
	public function SimpanDetailPembelian(){
		$DataDetailPembelian=array(
		'id_pembelian'=> $this->session->userdata('IdPembelianTerakhir'),
		'kode_produk'=> $this->input->post('KodeProduk'),
		'jml_beli'=> $this->input->post('JmlPembelian'),
		'keterangan'=> $this->input->post('keterangan') 
		);
		$this->db->insert('tbl_detail_pembelian',$DataDetailPembelian);
		
	}	
	
	public function AmbilDataBeli($id_pembelian,$email){
		$this->db->select('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,tbl_user.nama_lengkap');
		$this->db->join('tbl_user','tbl_user.email=tbl_pembelian.email');
		$this->db->where('tbl_pembelian.id_pembelian',$id_pembelian);
		$this->db->where('tbl_pembelian.email',$email);
		$this->db->where('tbl_pembelian.status_pembelian','pending');
		$sql=$this->db->get('tbl_pembelian');
		if($sql->num_rows()==1){
			return $sql->row_array();
		}
	}	

	public function AmbilDetailBeli($id_pembelian,$email){
		$this->db->select('tbl_produk.kode_produk,tbl_produk.nama_produk,tbl_produk.merk,tbl_pembelian.id_pembelian,
		tbl_pembelian.tanggal_pembelian,tbl_detail_pembelian.jml_beli,tbl_produk.harga_jual,
							(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_harga');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian');	
		$this->db->where('tbl_pembelian.email',$email);	
		$this->db->where('tbl_pembelian.id_pembelian',$id_pembelian);
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}		
	
	public function SelesaikanPembelian($id_pembelian,$email){
		$data=array(
		'rek_tujuan'=>$this->input->post('bank_txt'),
		'jasa_kurir'=>$this->input->post('kurir_txt'),
		'alamat_tujuan'=>$this->input->post('alamat_txt'),
		'status_pembelian'=>'selesai'
		);
		$this->db->where('id_pembelian',$id_pembelian);
		$this->db->where('email',$email);
		$this->db->update('tbl_pembelian',$data);
	}

	
	public function TampilKonfirmasi($email=null){
		$this->db->select('tbl_user.nama_lengkap,tbl_pembelian.alamat_tujuan,tbl_pembelian.jasa_kurir,tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,sum(tbl_detail_pembelian.jml_beli) AS jumlah_pembelian,
							sum(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_pembelian, tbl_konfirmasi.bukti_pembayaran');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk','left');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian','left');					
		$this->db->join('tbl_user','tbl_user.email=tbl_pembelian.email','left');					
		$this->db->join('tbl_konfirmasi','tbl_konfirmasi.id_pembelian=tbl_detail_pembelian.id_pembelian','left');					
		
		if($email!=null){
		    $this->db->where('tbl_pembelian.email',$email); // hanya untuk menampilkan Konfirmasi Berdasarkan User yang login
		}
		
		$this->db->where('status_pembelian','selesai');
		$this->db->group_by('tbl_user.nama_lengkap,tbl_pembelian.alamat_tujuan,tbl_pembelian.jasa_kurir,tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian');
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}

	public function DetailKonfirmasi($id_pembelian,$email){
		$this->db->select(' tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian,
							tbl_pembelian.rek_tujuan,tbl_pembelian.jasa_kurir,tbl_pembelian.alamat_tujuan,
							sum(tbl_detail_pembelian.jml_beli) AS jumlah_pembelian,
							sum(tbl_detail_pembelian.jml_beli * tbl_produk.harga_jual)
							AS total_pembelian');
		$this->db->join('tbl_produk','tbl_detail_pembelian.kode_produk=tbl_produk.kode_produk');
		$this->db->join('tbl_pembelian','tbl_pembelian.id_pembelian=tbl_detail_pembelian.id_pembelian');					
		$this->db->where('tbl_pembelian.id_pembelian',$id_pembelian);
		$this->db->where('tbl_pembelian.email',$email);
		$this->db->where('status_pembelian','selesai');
		$this->db->group_by('tbl_pembelian.id_pembelian,tbl_pembelian.email,tbl_pembelian.tanggal_pembelian');
		$sql=$this->db->get('tbl_detail_pembelian');
		if($sql->num_rows()==1){
			return $sql->row_array();
		}
	}
	
	public function SimpanKonfirmasi($id_pembelian,$file_bukti){
	$data=array(
	'id_pembelian'=>$id_pembelian,
	'waktu_konfirmasi'=>date('Y-m-d H:i:s'),
	'bukti_pembayaran'=>$file_bukti
	);	
	$this->db->insert('tbl_konfirmasi',$data);
	}
	
}

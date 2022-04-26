<?php
defined('BASEPATH') or die ('Error');


class M_produk extends CI_model{
	
	
	public function ProdukTerbaru($jml_produk){
		// LIMIT $jml_produk	
		$this->db->limit($jml_produk);
		// ORDER BY tgl_beli DESC
		$this->db->order_by('tgl_beli','DESC');
		// SELECT * FROM tbl_produk 
		$sql=$this->db->get('tbl_produk');
		
		if($sql->num_rows()>0){  // mysqli_num_rows()
			return $sql->result_array(); // mysqli_fetch_array
		}
	
	}
	
	public function SemuaProduk(){
		// ORDER BY tgl_beli DESC
		$this->db->order_by('tgl_beli','DESC');
		// SELECT * FROM tbl_produk 
		$sql=$this->db->get('tbl_produk');
		
		if($sql->num_rows()>0){  // mysqli_num_rows()
			return $sql->result_array(); // mysqli_fetch_array
		}
	
	}
	
	// fungsi detail
	public function DetailProduk($kode_produk){
	/* NATIVE SQL
		SELECT * FROM PRODUK 
		WHERE kode_produk = $kode_produk
	*/	
	
	// WHERE kode_produk = $kode_produk
	$this->db->where('kode_produk',$kode_produk);
	// SELECT * FROM tbl_produk
	$sql=$this->db->get('tbl_produk');	
			if($sql->num_rows()==1){
				return $sql->row_array();
			}
	}

	public function CariProduk($KataKunci){
		// WHERE nama_produk Like '%$KataKunci%'
		$this->db->like('nama_produk',$KataKunci);
		// OR merk Like '%$KataKunci%'

		$this->db->or_like('merk',$KataKunci);
		// ORDER BY tgl_beli DESC
		$this->db->order_by('tgl_beli','DESC');
		// SELECT * FROM tbl_produk 
		$sql=$this->db->get('tbl_produk');
		
		if($sql->num_rows()>0){  // mysqli_num_rows()
			return $sql->result_array(); // mysqli_fetch_array
		}
	
	}	
	
	public function SimpanProduk($NamaFilePhotoProduk){
    	$data=array(
    	'kode_produk'=>$this->input->post('kode_produk'),
    	'nama_produk'=>$this->input->post('nama_produk'),
    	'merk'=>$this->input->post('merk_produk'),
    	'tgl_beli'=>$this->input->post('tgl_beli'),
    	'harga_beli'=>$this->input->post('harga_beli'),
    	'jml_beli'=>$this->input->post('jml_beli'),
    	'harga_jual'=>$this->input->post('harga_jual'),
    	'photo_produk'=>$NamaFilePhotoProduk
    	);
    	$this->db->insert('tbl_produk',$data);
	}

    public function HapusProduk($KodeProduk){
        // menghapus data di MySQL Server
        $this->db->where('kode_produk',$KodeProduk);
        $this->db->delete('tbl_produk');
    }
	
}

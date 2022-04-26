<?php
defined('BASEPATH') or die ('Error');

Class M_inbox extends CI_model {
	
	public function AmbilSemuaPesan(){
		$this->db->order_by('waktu_kirim','desc');
		$sql=$this->db->get('tbl_inbox');
		if($sql->num_rows()>0){ // jika ditemukan  data user
			return $sql->result_array();  // simpan dalam array
		}		
	}
	
	public function SimpanPesan(){
		$data=array(
		'nama_pengirim'=>$this->input->post('nama_lengkap'),
		'email_pengirim'=>$this->input->post('email'),
		'waktu_kirim'=>date('Y-m-d H:i:s'),
		'isi_pesan'=>$this->input->post('isi_pesan')
		);	
		
		$this->db->insert('tbl_inbox',$data);	
	}
	
}
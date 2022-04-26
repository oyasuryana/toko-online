<?php
defined('BASEPATH') or die ('Error');

Class M_member extends CI_model {
	
	public function AmbilSemuaMember($level){
		$this->db->where('level',$level);
		$sql=$this->db->get('tbl_user');
		if($sql->num_rows()>0){ // jika ditemukan  data user
			return $sql->result_array();  // simpan dalam array
		}		
	}
	
	public function SimpanUser(){
		$DataUser=array(
		'email'=>$this->input->post('email_txt'),
		'nama_lengkap'=>$this->input->post('nama_txt'),
		'password'=>md5($this->input->post('pass_txt')),
		'alamat'=>$this->input->post('alamat_txt'),
		'waktu_daftar'=>date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_user',$DataUser);
	}
	
	//Untuk Pengecekan Login
	public function AmbilSatuUser($email,$password){
		// WHERE email='$email'
		$this->db->where('email',$email);
		// WHERE password=md5('$email')
		$this->db->where('password',md5($password));
		// SELECT * FROM tbl_user
		$sql=$this->db->get('tbl_user');
		
		if($sql->num_rows()==1){ // jika ditemukan 1 record data user
			return $sql->row_array();  // simpan dalam array
		}
	}
	
}	

<?php
defined('BASEPATH') or die ('Error');

Class Konfirmasi extends CI_controller {
	
	public function __construct(){
		parent::__construct();
			// lakukan load model
			$this->load->model('M_beli');
			$this->CekStatusLogin();
		}
	
	// Fungsi Cek Apakah User Sudah Login atau belum ?
    public function CekStatusLogin(){
       $SudahkahLogin=$this->session->userdata('SudahkahLogin');
          if(!isset($SudahkahLogin)||$SudahkahLogin!= true) {
           $this->session->set_userdata('pesan_login','<div class="alert alert-warning">Anda harus login terlebih dahulu !</div>');
			redirect(site_url('home/login'),'refresh');  
	   } else {
			$this->session->unset_userdata('pesan_login');
       }
    } 

	// Halaman awal web
	public function index(){
		// jalankan fungsi di M_produk
		$data['DaftarKurir']=array(1=>'Tiki','JNE','J & T','Pos Indonesia');		
		$data['DataKonfirmasi']=$this->M_beli->TampilKonfirmasi();
		$data['page']='admin/v_daftar_konfirmasi';
		$this->load->view('v_home',$data);	
	}

    
    
}
<?php
defined('BASEPATH') or die ('Error');

Class Order extends CI_controller {


	public function __construct(){
		parent::__construct();
		// lakukan load model
		$this->load->model('M_order');
		$this->CekStatusLogin();
	}

	
	public function CekStatusLogin(){
       $SudahkahLogin=$this->session->userdata('SudahkahLogin');
          if(!isset($SudahkahLogin)||$SudahkahLogin!= true) {
           $this->session->set_userdata('pesan_login','<div class="alert alert-warning">Anda harus login terlebih dahulu !</div>');
			redirect(site_url('home/login'),'refresh');  
	   } else {
			$this->session->unset_userdata('pesan_login');
       }
    } 

	
	// daftar order
	public function index(){
		$data['page']='admin/v_daftar_order';
		$data['DaftarOrder']=$this->M_order->AmbilSemuaOrder();	
		$this->load->view('v_home',$data);	
	}
	
	// daftar order
	public function detail($id_pembelian){
//		$data['page']='admin/v_detail_order';
		$data['DataOrder']=$this->M_order->AmbilDataOrder($id_pembelian);	
		$data['DetailOrder']=$this->M_order->AmbilDetailOrder($id_pembelian);	
		$this->load->view('admin/v_detail_order',$data);	
	}
	

}

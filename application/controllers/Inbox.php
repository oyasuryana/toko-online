<?php
defined('BASEPATH') or die ('Error');

Class Inbox extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		// lakukan load model
		$this->load->model('M_inbox');
		}

	
	public function CekStatusLogin(){
       $SudahkahLogin=$this->session->userdata('SudahkahLogin');
	   $SesLevel=$this->session->userdata('SesLevel');
          if((!isset($SudahkahLogin)||$SudahkahLogin!= true)&&($SesLevel=='administrator')) {
           $this->session->set_userdata('pesan_login','<div class="alert alert-warning">Anda harus login terlebih dahulu !</div>');
			redirect(site_url('home/login'),'refresh');  
	   } else {
			$this->session->unset_userdata('pesan_login');
       }
    } 

	public function index(){
		
		$data['page']='admin/v_daftar_inbox';
		$data['DaftarInbox']=$this->M_inbox->AmbilSemuaPesan();	
		$this->load->view('v_home',$data);
	}
	
}
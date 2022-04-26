<?php
defined('BASEPATH') or die ('Error');

Class Member extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		// lakukan load model
		$this->load->model('M_member');
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

	
	public function index(){
		// apakah sudah login ?
		$this->CekStatusLogin();	
		$data['page']='admin/v_daftar_member';
		$data['DaftarMember']=$this->M_member->AmbilSemuaMember('member');	
		$this->load->view('v_home',$data);
	}
	
	public function ProsesDaftar(){
		// Jalankan fungsi SimpanUser di M_member
		$this->M_member->SimpanUser();
		// buat pesan sukes daftar
		$this->session->set_userdata('pesan_daftar','<div class="alert alert-success">Pendaftaran berhasil, silahkan login dengan akun anda !</div>');
		// arahkan ke halaman login setelah menyimpan
		redirect('home/login');
	}
	
	public function CekLogin(){
		//Cek apakah ada user dengan email dan password yg diinput di halaman login
		$data['pengguna']=$this->M_member->AmbilSatuUser($this->input->post('email_txt'),$this->input->post('pass_txt'));
			//Jika ada / $data['pengguna'] tidak null
			if($data['pengguna']!=null){
				$this->session->set_userdata('SesEmail',$data['pengguna']['email']);
				$this->session->set_userdata('SesNama',$data['pengguna']['nama_lengkap']);
				$this->session->set_userdata('SesLevel',$data['pengguna']['level']);
				$this->session->set_userdata('SesAlamat',$data['pengguna']['alamat']);
				$this->session->set_userdata('SudahkahLogin',TRUE);				
			} else{
			//Jika tidak ada / $data['pengguna'] = null
			// buat pesan login 
			$this->session->set_userdata('pesan_login','<div class="alert alert-warning">Login gagal, silahkan ulangi !</div>');
			}
		// arahkan ke default controller (home)	
		redirect(site_url(),'refresh');		
	}

	public function Logout(){
		// Hapus Semua Session
		$this->session->sess_destroy();
		// arahkan ke default controller (home)	
		redirect(site_url(),'refresh');		
	}
	

}

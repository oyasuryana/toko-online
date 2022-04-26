<?php
defined('BASEPATH') or die ('Error');

Class Produk extends CI_controller {


	public function __construct(){
		parent::__construct();
		// lakukan load model
		$this->load->model('M_produk');
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


    /* Fungsi untuk menampilkan daftar prodok */
	public function index(){
    	$data['SemuaProduk']=$this->M_produk->SemuaProduk();	
    	$data['page']='admin/v_daftar_produk';
    	$this->load->view('v_home',$data);	
	}
	
	/* Funsi untuk menampilkan form tambah produk */
	public function tambah(){ 
    	$data['page']='admin/v_tambah_produk';
    	$this->load->view('v_home',$data);	
	}

    /* Fungsi Untuk Menyimpan Produk*/
    public function Simpan(){
		// menganti nama file otomatis dengan kode produk	
		$config['file_name'] = $this->input->post('kode_produk');
		$config['upload_path']   = './gambar/'; 
		$config['allowed_types'] = 'png|jpg|jpeg'; 		
		$this->load->library('upload', $config);
    				
			 if ( ! $this->upload->do_upload('filenya')) {
					//jika gagal upload
					$data['error_upload'] = array('error' => $this->upload->display_errors()); 
					$this->session->set_userdata('status_upload',
					'<div class="alert alert-warning alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
					$data['error_upload']['error'].'</div>');
				 }
					
				 else { 

					//jika sukses upload
					$data = array('upload_data' => $this->upload->data());
					$this->M_produk->SimpanProduk($data['upload_data']['file_name']);
					
					$this->session->set_userdata('status_upload','<div class="alert alert-success alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															File berhasil diupload
															</div>');
														
			} 
	
		redirect(site_url('produk'),'refresh');	
    }
    
    public function hapus($KodeProduk,$PhotoProduk){
        // hapus data di mysql
        $this->M_produk->HapusProduk($KodeProduk);
         // menghapus file photo
        unlink('./gambar/'.$PhotoProduk);
	    // arahkan ke halaman produk
		redirect(site_url('produk'),'refresh');	
    }
    
    
}

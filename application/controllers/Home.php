<?php
defined('BASEPATH') or die ('Error');

Class Home extends CI_controller {
	
	public function __construct(){
		parent::__construct();
			// lakukan load model
			$this->load->model('M_produk');
			$this->load->model('M_beli');
			$this->load->model('M_inbox');
			$this->load->model('M_produk');	
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
		$data['ProdukTerbaru']= $this->M_produk->ProdukTerbaru(6);
		$this->load->view('v_home',$data);	
	}
	
	public function SemuaProduk(){
		$data['SemuaProduk']= $this->M_produk->SemuaProduk();
		$data['page']='v_semua_produk';
		$this->load->view('v_home',$data);	
	}
	
	public function CaraBelanja(){
		$data['page']='v_cara_belanja';
		$this->load->view('v_home',$data);			
	}
	
    public function Login()
    {
       $data['page']='v_login';
       $this->load->view('v_home',$data);
    }

	public function HubungiKami(){
		$data['page']='v_hubungi_kami';
		$this->load->view('v_home',$data);			
	}
	
	Public function KirimPesan(){
		$this->M_inbox->SimpanPesan();
		$this->session->set_userdata('pesan_terkirim','<div class="alert alert-success">Pesan terkirim !</div>');
		redirect(site_url('home/HubungiKami','refresh'));
	}
	
	// fungsi detail
	public function detail($kode_produk){
	// lakukan load model
		$this->load->model('M_produk');	
	// Ambil detail
		$data['DetailProduk']=$this->M_produk->DetailProduk($kode_produk);
	// kirim ke view
		$this->load->view('v_detail_produk',$data);		
	}
	
	

	
	public function BuatAkun(){
		$data['page']='v_daftar';
		$this->load->view('v_home',$data);
	}
	

	public function Pencarian()
	{
		$data['HasilCariProduk']=$this->M_produk->CariProduk($this->input->post('KataKunci'));
		$data['page']='v_hasil_cari';
		$this->load->view('v_home',$data);
	}

	//===================================================//
	//      BLOK FUNCTION PROSES PEMBELIAN              //
	// ==================================================//

	public function beli($kode_produk){
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
		// Ambil detail
		$data['DetailProduk']=$this->M_produk->DetailProduk($kode_produk);
		// kirim ke view
		$data['page']='v_beli_produk';
		$this->load->view('v_home',$data);	
	}	

	public function ProsesBeli()
    {
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
        // JIka sudah maka lakukan penyimpanan proses pembelian
        
        if( $this->session->userdata('IdPembelianTerakhir')==null){
			// untuk Simpan Pembelian Pertama
			$this->M_beli->SimpanBeli();
			$this->M_beli->SimpanDetailPembelian();
		} else {
			// untuk Simpan Pembelian Kedua dst
			$this->M_beli->SimpanDetailPembelian();
		}
        
        // arahkan ke home
        redirect(site_url(),'refresh');
    }
    
    public function KeranjangBelanja(){
		// Cek dulu apakah sudah login	
	//	$this->CekStatusLogin();    
        // JIka sudah maka tampilkan keranjang belanja
		$data['KeranjangBelanja']=$this->M_beli->TampilPembelian($this->session->userdata('SesEmail'));
		$data['page']='v_keranjang_belanja';
		$this->load->view('v_home',$data);	
	}	
	
	public function DetailPembelian($id_pembelian){
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
		$data['DataOrder']=$this->M_beli->AmbilDataBeli($id_pembelian,$this->session->userdata('SesEmail'));	
		$data['DetailOrder']=$this->M_beli->AmbilDetailBeli($id_pembelian,$this->session->userdata('SesEmail'));	
		//$data['page']='v_detail_beli_produk';
		$this->load->view('v_detail_beli_produk',$data);			
	}

	//===================================================//
	//      BLOK FUNCTION SELESAIKAN BELANJA             //
	// ==================================================//
	
	public function selesaikan($id_pembelian){
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
		
		$data['DaftarKurir']=array(1=>'Tiki','JNE','J & T','Pos Indonesia');
		$data['DaftarBank']=array(1=>'Bank Mandiri a.n. Oya Suryana, M.Kom. - No. Rekening : 1340005310007','Bank BNI a.n. Oya Suryana, M.Kom. - No. Rekening : 99340039','Bank BJB a.n. Oya Suryana, M.Kom. - No. Rekening : 531098768109');
		
		$data['DataOrder']=$this->M_beli->AmbilDataBeli($id_pembelian,$this->session->userdata('SesEmail'));	
		$data['page']='v_penyelesaian';
		$this->load->view('v_home',$data);			
	}
	
	public function SelesaikanBelanja(){
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
		$this->M_beli->SelesaikanPembelian($this->input->post('id_pembelian'),$this->session->userdata('SesEmail'));
		redirect(site_url('home/KeranjangBelanja'),'refresh');
	}



	//===================================================//
	//              BLOK FUNCTION KONFIRMASI             //
	// ==================================================//
    public function Konfirmasi(){
		// Cek dulu apakah sudah login	
		$this->CekStatusLogin();    
        // JIka sudah maka tampilkan keranjang belanja
		$data['DataKonfirmasi']=$this->M_beli->TampilKonfirmasi($this->session->userdata('SesEmail'));
		$data['page']='v_daftar_konfirmasi';
		$this->load->view('v_home',$data);	
	}	
	
	public function FormKonfirmasi($id_pembelian){
		$data['DaftarKurir']=array(1=>'Tiki','JNE','J & T','Pos Indonesia');
		$data['DaftarBank']=array(1=>'Bank Mandiri a.n. Oya Suryana, M.Kom. - No. Rekening : 1340005310007','Bank BNI a.n. Oya Suryana, M.Kom. - No. Rekening : 99340039','Bank BJB a.n. Oya Suryana, M.Kom. - No. Rekening : 531098768109');
		
		$data['DataPembelian']=$this->M_beli->DetailKonfirmasi($id_pembelian,$this->session->userdata('SesEmail'));	
		$data['page']='v_form_konfirmasi';
		$this->load->view('v_home',$data);	
	}
	
	public function ProsesKonfirmasi(){
		// menganti nama file otomatis	
		$config['file_name'] = $this->input->post('id_pembelian').'-'.$_FILES['filenya']['name'];
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
					
					$this->M_beli->SimpanKonfirmasi($this->input->post('id_pembelian'),$data['upload_data']['file_name']);
					
					$this->session->set_userdata('status_upload','<div class="alert alert-success alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															File berhasil diupload
															</div>');
														
			} 
	
		redirect(site_url('home/Konfirmasi'),'refresh');	
	}

	public function BuktiKonfirmasi($file=null){
	// Cek dulu apakah sudah login	
	    	$this->CekStatusLogin();
	    	if($file!=null){    
     	    echo '<img src="'.base_url('gambar/'.$file).'" class="img-fluid img-thumbnail"/>';
			 } else { echo 'File bukti tidak ditemukan'; } 
	}
	
	public function profil(){
		echo '<h2>Belum beres :)</h2>';
	}
}

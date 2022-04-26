<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="">
	<meta name="author" content=""/>
	<title>Tokoku :: Toko Onlineku</title>
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>"/>
</head>
<body>
	<!-- navbar -->

	<main role="main">	
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
        <!-- Logo Toko Online -->
        <a class="navbar-brand" href="<?php echo site_url();?>">
		 <img class="img-responsive img-thumbnail" src="<?php echo base_url('gambar/logo.png');?>" width="48" height="48" alt="Not Image">
        </a>
        
        <!-- Tombol di Smartphone -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SubMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		
        <!-- Menu DropDown -->
		<div class="collapse navbar-collapse" id="SubMenu">
          <ul class="navbar-nav mr-auto">
			<?php
			// Jika  yang login adalah member
		    if($this->session->userdata('SesLevel')=='member'){ 
			?>
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('home/SemuaProduk');?>">Produk</a>
    			</li>
			<?php 
            }
            // jika tidak ada yang login / pengunjung bukan anggota
            if($this->session->userdata('SudahkahLogin')==false){    
			?>
				<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('home/SemuaProduk');?>">Produk</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('home/CaraBelanja');?>">Panduan Belanja</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('home/HubungiKami');?>">Hubungi Kami</a>
    			</li>									
			<?php
            }

			// Jika yang login adalah member
			if($this->session->userdata('SesLevel')=='member'){
			?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('home/KeranjangBelanja');?>">Keranjang Belanja</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('home/Konfirmasi');?>">Konfirmasi</a>
				</li>						
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('home/HubungiKami');?>">Hubungi Kami</a>
    			</li>									
			<?php
			}
			// Jika sudah ada yang login dan yang login adalah administrator
			if($this->session->userdata('SesLevel')=='administrator'){
			?>
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('produk');?>">Produk</a>
    			</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('member');?>">Member</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('Order');?>">Order</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('konfirmasi');?>">Konfirmasi</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('inbox');?>">Inbox</a>
				</li>			
			<?php
			} 
			// jika admin/member sudah login
			if($this->session->userdata('SudahkahLogin')==true){
			?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('home/profil');?>">Profile</a>
			</li>
			<?php
			}
			?>
          </ul>
		  
          <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo site_url('home/Pencarian');?>">
            <input class="form-control mr-sm-2" name="KataKunci" type="text" placeholder="Search" aria-label="Search">
			<button class="btn btn-info my-2 my-lg-0 mr-sm-2" type="submit">Cari</button>
		  <?php
		  if($this->session->userdata('SudahkahLogin')){ // jika sudah login yg tampil tombol logout
		  ?>
			<a href="<?php echo site_url('member/Logout');?>" class="btn btn-primary my-2 my-lg-0">Logout</a>        			  
		  <?php } 
			else { // jika belum login yg tampil tombol login 
				?>
			<a href="<?php echo site_url('home/login');?>" class="btn btn-danger my-2 my-lg-0">Login</a>        
		  <?php } ?>
          </form>
	  </div>
  </nav>
    
	
	<div class="container-fluid">			
		<?php
		if(isset($page)){
			$this->load->view($page);
		} else {
			$this->load->view('v_produk_terbaru');			
		}		
		?>
	</div>


	<!-- Modal Bootstrap -->
	<div class="modal fade" id="KotakDialog">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Modal Heading</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
			<!-- modal content-->
		  </div>

		  <!-- Modal footer -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		  </div>

		</div>
	  </div>
	</div>

</main>
	
	
<!--footer-->
<footer class="text-muted">
	<div class="container-fluid">
		<hr class="text-green"/>
		<p class="float-right">
		<a href="#">Back to Top</a>
		<p><b>Tokoku</b>
		<br/>Jalan Sukamulya No. 77 <br/>
		Kuningan Jawa Barat<br/>
		Phone / Fax : 0232-872930
		</p>
	</div>
</footer>
<!--footer-->
	
	
	
<script src="<?php echo base_url('bootstrap/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){

    $('#KotakDialog').on('show.bs.modal', function (e) {
        // merubah judul Modal Bootstrap //
        var link  = $(e.relatedTarget);
        var judul = link.data('judul');
		$('.modal-title').text(judul);
		//Load remoter URL dari a href
		$('.modal-body').load(e.relatedTarget.href);
    });
    
	 $('a[data-confirm]').click(function(ev) {
	  var href = $(this).attr('href');
	  if(!$('#dataConfirmModal').length) {
	   $('body').append('<div id="dataConfirmModal" class="modal fade bs-modal-sm" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="dataConfrimLabel">Konfirmasi</h4><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true"> Tidak </button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"> Ya </a></div></div></div></div>');
	   }
	  $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
	  $('#dataConfirmOK').attr('href',href);
	  $('#dataConfirmModal').modal({show:true});
	  return false;
	 });

	
});
</script> 
	
	
</body>
</html>

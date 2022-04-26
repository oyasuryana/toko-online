<div class="row">
	<div class="col-md-4  text-center">
	<img class="img-thumbnail img-responsive" src="<?php echo base_url('gambar/'.$DetailProduk['photo_produk']);?>" />
	</div>

	<div class="col-md-8">
	<h4><?php echo $DetailProduk['nama_produk'];?></h4>
	
		<div class="row mb-3 mt-3">
			<div class="col-md-4 font-weight-bold">Merk</div>	
			<div class="col-md-8"><?php echo $DetailProduk['merk'];?></div>
		</div>


		<div class="row mb-3">
			<div class="col-md-4 font-weight-bold">Harga</div>	
			<div class="col-md-8">Rp. <?php echo number_format($DetailProduk['harga_jual'],0,',','.');?></div>
		</div>
		
		<div class="row mb-3">
			<div class="col-md-4 font-weight-bold">Stok Barang</div>	
			<div class="col-md-8">Tersedia <?php echo $DetailProduk['jml_beli'];?></div>
		</div>
	</div>

</div>

<h2 class="text-center text-success font-weight-bold mt-3">Hasil Pencarian Produk <?php echo $this->input->post('KataKunci');?></h2>
<div class="row">
			<!-- item produk -->
			<?php
				if(isset($HasilCariProduk)) { 
					foreach($HasilCariProduk as $DataProduk) {
						
						?>
			<div class="col-md-3">
				<div class="card mb-2">
					<div class="card-header text-center font-weight-bold "><?php echo $DataProduk['nama_produk'];?></div>
						<img class="card-img-top img-responsive" src="<?php echo base_url('gambar/'.$DataProduk['photo_produk']);?>"/>
						<div class="card-body">
							<div class="text-center">
							<p class="font-weight-bold">Rp. <?php echo number_format($DataProduk['harga_jual'],0,',','.');?>	</p>
							<a href="<?php echo site_url('home/detail/'.$DataProduk['kode_produk']);?>" class="btn btn-info" data-judul="Detail Produk" data-toggle="modal" data-target="#KotakDialog">Detail</a>
							<a href="<?php echo site_url('home/beli/'.$DataProduk['kode_produk']);?>" class="btn btn-danger">Beli</a>
						</div>
					</div>
				</div>
			</div>			
				<?php
					}
				}
				?>				
		<!-- end item produk -->
</div>

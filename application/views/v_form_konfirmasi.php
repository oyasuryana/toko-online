<h2 class="text-center text-success  font-weight-bold mt-4">Form Konfirmasi</h2>
<p>Silahkan upload bukti pembayaran pada form dibawah ini !</p>


<form method="POST" action="<?php echo site_url('home/ProsesKonfirmasi');?>" enctype="multipart/form-data">
	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Nomor Pembelian</label>
		<div class="col-md-9">
			<input type="text" name="id_pembelian" value="<?php echo $DataPembelian['id_pembelian'];?>" class="form-control" readonly/>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Tanggal Pembelian</label>
		<div class="col-md-9">
			<input type="text" name="tanggal_pembelian" value="<?php echo $DataPembelian['tanggal_pembelian'];?>" class="form-control" readonly/>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Total Transfer</label>
		<div class="col-md-9">
			<input type="text" name="tanggal_pembelian" value="Rp. <?php echo number_format($DataPembelian['total_pembelian'],0,',','.');?>" class="form-control" readonly/>
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Jasa Pengiriman</label>
		<div class="col-md-9">
			<input type="text" name="tanggal_pembelian" value="<?php echo $DaftarKurir[$DataPembelian['jasa_kurir']];?>" class="form-control" readonly/>
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Rekening Tujuan</label>
		<div class="col-md-9">
			<input type="text" name="tanggal_pembelian" value="<?php echo $DaftarBank[$DataPembelian['rek_tujuan']];?>" class="form-control" readonly/>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Pilih Bukti Pembayaran</label>
		<div class="col-md-9">
			<input type="file" name="filenya"/>
		</div>
	</div>
		
	<div class="form-group row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	</div>
</form>

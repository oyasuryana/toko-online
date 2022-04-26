<h2 class="text-center text-success  font-weight-bold mt-4">Penyelesaian Pembelian</h2>
<p>Untuk menyelesaikan proses pembelian silahkan lengkapi form dibawah ini</p>

<form method="POST" action="<?php echo site_url('home/SelesaikanBelanja');?>">

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Nomor Pembelian</label>
		<div class="col-md-9">
			<input type="text" name="id_pembelian" value="<?php echo $DataOrder['id_pembelian'];?>" class="form-control" readonly/>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Tanggal Pembelian</label>
		<div class="col-md-9">
			<input type="text" name="tanggal_pembelian" value="<?php echo $DataOrder['tanggal_pembelian'];?>" class="form-control" readonly/>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Rekening Tujuan</label>
		<div class="col-md-9">
			<select name="bank_txt" class="form-control">
				<?php
				for($NoBank=1;$NoBank<=count($DaftarBank);$NoBank++){				
				echo '<option value="'.$NoBank.'">'.$DaftarBank[$NoBank].'</option>';
				}
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Jasa Pengiriman</label>
		<div class="col-md-9">
			<select name="kurir_txt" class="form-control">
				<?php
				for($NoKurir=1;$NoKurir<=count($DaftarKurir);$NoKurir++){
				
				echo '<option value="'.$NoKurir.'">'.$DaftarKurir[$NoKurir].'</option>';
				}
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-3 font-weight-bold">Alamat Pengiriman</label>
		<div class="col-md-9">
			<textarea class="form-control" name="alamat_txt"><?php echo $this->session->userdata('SesAlamat');?></textarea>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Selesaikan Belanja</button>
		</div>
	</div>
</form>

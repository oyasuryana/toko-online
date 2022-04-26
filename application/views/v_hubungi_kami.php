<h2 class="text-center text-success  font-weight-bold mt-4">Hubungi Kami</h2>
<p>Silakan gunakan form dibawah ini untuk menghubungi customer kami</p>

<?php echo $this->session->userdata('pesan_terkirim');?>
<form method="POST" action="<?php echo site_url('home/KirimPesan');?>">
	<div class="form-group">
		<label class="font-weight-bold">Nama Lengkap</label>
	<?php
	if($this->session->userdata('SesNama')){?>
		<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $this->session->userdata('SesNama');?>" readonly/>
	<?php } else { ?>
		<input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap" />		
	<?php } ?>
	</div>
	
	<div class="form-group">
		<label class="font-weight-bold">Email</label>
		<?php
		if($this->session->userdata('SesEmail')){ ?>
		<input type="text" class="form-control" name="email" value="<?php echo $this->session->userdata('SesEmail');?>" readonly/>		
		<?php } else { ?>
		<input type="text" class="form-control" name="email" placeholder="Masukkan email"/>
		<?php } ?>
	</div>
	
	<div class="form-group">
		<label class="font-weight-bold">Pesan</label>
		<textarea class="form-control" name="isi_pesan" placeholder="Masukkan pesan anda"></textarea>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Kirim</button>
	</div>
</form>

<?php echo $this->session->unset_userdata('pesan_terkirim');?>

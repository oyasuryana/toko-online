<h2 class="text-center text-success  font-weight-bold mt-4">Login</h2>
<p>Silakan gunakan form dibawah ini untuk untuk login ke akun anda</p>

<?php 
echo $this->session->userdata('pesan_login');
echo $this->session->userdata('pesan_daftar');
?>
<form method="POST" action="<?php echo site_url('member/CekLogin');?>">

	<div class="form-group">
		<label class="font-weight-bold">Email</label>
		<input type="email" class="form-control" name="email_txt" placeholder="Masukkan email" autofocus autocomplete="off" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>
	
	<div class="form-group">
		<label class="font-weight-bold">Password</label>
		<input type="password" class="form-control" name="pass_txt" placeholder="Masukkan password" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>
	
	<div class="form-group">
		<a href="<?php echo site_url('home/BuatAkun');?>" class="btn btn-success">Buat Akun</a> 
		<button type="submit" class="btn btn-danger">Login</button>
	</div>
</form>

<?php 
$this->session->unset_userdata('pesan_login');
$this->session->unset_userdata('pesan_daftar');
?>

<h2 class="text-success text-center font-weight-bold">Daftar Inbox</h2>
<p>Berikut adalah daftar pesan masuk yang dikirim oleh member/pengunjung.</p>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead class="thead-light">
			<tr>
				<th>No.</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>Isi Pesan</th>
				<th>Waktu Kirim</th>
			</tr>
		</thead>
		<tbody>
			<?php	
			if(isset($DaftarInbox)){
				$NoUrut=null;
				foreach($DaftarInbox as $DataInbox){
				$NoUrut++;	
			?>
			<tr>
				<td><?php echo $NoUrut;?></td>
				<td><?php echo $DataInbox['nama_pengirim'];?></td>
				<td><?php echo $DataInbox['email_pengirim'];?></td>
				<td><?php echo $DataInbox['isi_pesan'];?></td>
				<td><?php echo $DataInbox['waktu_kirim'];?></td>
			</tr>	
			<?php
				}
			}
			?>
		</tbody>	
	</table>
</div>	

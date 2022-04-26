<h2 class="text-success text-center font-weight-bold">Daftar Member</h2>
<p>Berikut adalah daftar member yang tergabung dalam sistem toko online.</p>
<div class="table-responsive">

	<table class="table table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th>No.</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>No. Handphone</th>
			<th>Alamat Lengkap</th>
			<th>Waktu Daftar</th>
		</tr>
	</thead>
	<tbody>
		<?php	
		if(isset($DaftarMember)){
			$NoUrut=null;
			foreach($DaftarMember as $DataMember){
			$NoUrut++;	
		?>
		<tr>
			<td><?php echo $NoUrut;?></td>
			<td><?php echo $DataMember['nama_lengkap'];?></td>
			<td><?php echo $DataMember['email'];?></td>
			<td><?php echo $DataMember['handphone'];?></td>
			<td><?php echo $DataMember['alamat'];?></td>
			<td><?php echo $DataMember['waktu_daftar'];?></td>
		</tr>	
		<?php
			}
		}
		?>
	</tbody>	
</table>
</div>

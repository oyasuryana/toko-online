<h2 class="text-success text-center font-weight-bold">Daftar Order Member</h2>
<p>Berikut adalah daftar order pembelian  oleh member.</p>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead class="thead-light">
			<tr class="text-center">
				<th>No.</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>Waktu Order</th>
				<th>Jml. Barang</th>
				<th>Total Harga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php	
			if(isset($DaftarOrder)){
				$NoUrut=null;
				foreach($DaftarOrder as $DataOrder){
				$NoUrut++;	
			?>
			<tr>
				<td><?php echo $NoUrut;?></td>
				<td><?php echo $DataOrder['nama_lengkap'];?></td>
				<td><?php echo $DataOrder['email'];?></td>
				<td><?php echo $DataOrder['tanggal_pembelian'];?></td>
				<td><?php echo $DataOrder['jumlah_pembelian'];?> produk</td>
				<td class="text-right">Rp. <?php echo number_format($DataOrder['total_pembelian'],0,',','.');?></td>
				<td class="text-center">
					
					<!--<a href="<?php echo site_url('order/detail/'.$DataOrder['id_pembelian']);?>" class="btn btn-info btn-sm">Detail</a>-->
					<a href="<?php echo site_url('order/detail/'.$DataOrder['id_pembelian']);?>"  class="btn btn-success btn-sm" data-judul="Detail Order" data-toggle="modal" data-target="#KotakDialog">Detail</a>							
				</td>
			</tr>	
			<?php
				}
			}
			?>
		</tbody>	
	</table>
</div>	

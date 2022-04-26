<!--<h2 class="text-success text-center font-weight-bold">Detail Pembelian</h2>
<p>Berikut adalah daftar pembelian Anda.</p>

<div class="row">
	<div class="col-md-2 font-weight-bold">Nomor Order</div>
	<div class="col-md-10">
		<?php echo $DataOrder['id_pembelian'];?>
	</div>
</div>	

<div class="row">
	<div class="col-md-2 font-weight-bold">Tanggal Order</div>
	<div class="col-md-10">
		<?php echo $DataOrder['tanggal_pembelian'];?>
	</div>
</div>-->



<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead class="thead-light">
			<tr class="text-center">
				<th>No.</th>
				<th>Kode Barang</th>
				<th>Nama Barang - Merk</th>
				<th>Jml. Barang</th>
				<th>Harga Satuan</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php	
			if(isset($DetailOrder)){
				$NoUrut=null;
				$TotalHarga=null;
				foreach($DetailOrder as $DataOrder){
				$NoUrut++;	
				$TotalHarga=$TotalHarga+$DataOrder['total_harga'];
			?>
			<tr>
				<td><?php echo $NoUrut;?></td>
				<td><?php echo $DataOrder['kode_produk'];?></td>
				<td><?php echo $DataOrder['nama_produk'].' - '.$DataOrder['merk'];?></td>
				<td><?php echo $DataOrder['jml_beli'];?> buah</td>
				<td class="text-right">Rp. <?php echo number_format($DataOrder['harga_jual'],0,',','.');?></td>
				<td class="text-right">Rp. <?php echo number_format($DataOrder['total_harga'],0,',','.');?></td>
			</tr>	
			<?php
				}
			}
			?>
			<tr><th colspan="5" class="text-center">Total</th>
				<th class="text-right">Rp. <?php echo number_format($TotalHarga,0,',','.');?></th>
			</tr>
		</tbody>	
	</table>
</div>	

<h2 class="text-center text-success  font-weight-bold mt-4">Keranjang Belanja</h2>
<p>Berikut ini adalah keranjang belanja anda, silahkan lakukan pembayaran kemudian lakukan konfirmasi pada menu Konfirmasi !</p>
<div class="table-responsive">
<table class="table table-bordered table-hovered">
	<thead class="thead-light">
		<tr class="text-center">
			<th>No</th>
			<th>Tanggal Order</th>
			<th>Jumlah Barang</th>
			<th>Total Pembayaran</th>
			<th>Aksi</th>
		</tr>	
	</thead>
	<body>
		<?php
		if(isset($KeranjangBelanja)){
			$NoUrut=null;
		foreach($KeranjangBelanja as $BarisData){
			$NoUrut++;
			?>
				<tr>
					<td class="text-center">
						<?php echo $NoUrut;?>
					</td>
					<td>
						<?php echo $BarisData['tanggal_pembelian'];?>
					</td>
					<td class="text-right">
						<?php echo $BarisData['jumlah_pembelian'];?> buah
					</td>
					<td class="text-right">
						Rp. <?php echo number_format($BarisData['total_pembelian'],0,',','.');?>
					</td>
					<td class="text-center">
						<a href="<?php echo site_url('home/DetailPembelian/'.$BarisData['id_pembelian']);?>" class="btn btn-info btn-sm" data-judul="Detail Keranjang Belanja" data-toggle="modal" data-target="#KotakDialog">Detail</a>
						<a href="<?php echo site_url('home/Selesaikan/'.$BarisData['id_pembelian']);?>" class="btn btn-primary btn-sm">Selesaikan</a>
					</td>
				</tr>
		<?php
			}
		}
		?>
	</body>
</table>
</div>
<h2 class="text-success text-center font-weight-bold">Daftar Produk</h2>
<p>Berikut adalah daftar produk yang tersedia untuk ditampilkan dihalaman depan dan halaman member.</p>
<p>
    <a href="<?php echo site_url('produk/tambah');?>" class="btn btn-primary btn-sm text-center">Tambah Produk</a> 
</p>
<ul class="list-group">
    <?php
    if(isset($SemuaProduk)){
        
        foreach ($SemuaProduk as $produk ){
            ?>
                    
            <li class="list-group-item">
                <h3 class="text-primary font-weight-bold"><?php echo $produk['kode_produk'].' - '.$produk['nama_produk'];?></h3>                
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?php echo base_url('gambar/'.$produk['photo_produk']);?>" class="img-thumbnail"/>
                    </div>
                    <div class="col-md-9">
                            <div class="form-group row">
                                <label class="col-md-4 font-weight-bold">Merk </label>
                                <div class="col-md-8">
                                    <?php echo $produk['merk'];?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 font-weight-bold">Harga Beli </label>
                                <div class="col-md-8">
                                    Rp. <?php echo number_format($produk['harga_beli'],0,',','.');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4  font-weight-bold">Tanggal Beli </label>
                                <div class="col-md-8">
                                    <?php echo $produk['tgl_beli'];?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 font-weight-bold">Jumlah Beli / Stok </label>
                                <div class="col-md-8">
                                    <?php echo $produk['jml_beli'];?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 font-weight-bold">Harga Jual </label>
                                <div class="col-md-8">
                                    Rp. <?php echo number_format($produk['harga_jual'],0,',','.');?>
                                </div>
                            </div>
                    </div>
                        <!-- kolom tombol-->
                    <div class="col-md-1">
                        <div class="row mt-1">
                            <a href="#" class="btn btn-info btn-sm text-center btn-block">Edit</a> 
                        </div>
                        <div class="row mt-1">
                            <a href="#" class="btn btn-danger btn-sm text-center btn-block" data-confirm="Anda yakin akan menghapus produk <?php echo $produk['kode_produk'];?> ?">Delete</a>
                        </div>
                        <div class="row mt-1">
                            <a href="#" class="btn btn-primary btn-sm text-center btn-block">Ganti Photo</a>
                        </div>
                    </div>
                </div>
            </li>              
            <?php
        }
    }
    ?>
</ul>
     

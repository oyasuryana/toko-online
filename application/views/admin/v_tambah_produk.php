<h2 class="font-weight-bold text-center text-success">Penambahan Produk</h2>
<p>Gunakan form dibawah ini untuk menambah produk baru yang akan dijual.</p>

<form method="POST" action="<?php echo site_url('produk/simpan')?>" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Kode Produk</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="kode_produk" placeholder="Masukan kode produk" autocomplete="off" autofocus required="required"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Nama Produk</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="nama_produk" placeholder="Masukan nama produk" autocomplete="off" required="required"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Nama Produk</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="merk_produk" placeholder="Masukan merk produk" autocomplete="off" required="required"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Tanggal Pembelian</label>
        <div class="col-md-9">
            <input type="date" class="form-control" name="tgl_beli" autocomplete="off" required="required"/>
        </div>
    </div>    

    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Harga Pembelian</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="harga_beli" placeholder="Misal : 100000" autocomplete="off" required="required"/>
        </div>
    </div>    

    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Jumlah Pembelian</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="jml_beli" placeholder="Misal : 10" autocomplete="off" required="required"/>
        </div>
    </div>    

    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Harga Penjualan</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="harga_jual" placeholder="Misal : 100000" autocomplete="off" required="required"/>
        </div>
    </div>    
    
    <div class="form-group row">
        <label class="col-md-3 font-weight-bold">Photo Produk</label>
        <div class="col-md-9">
            <input type="file"  name="filenya" placeholder="Pilih File"  required="required"/>
        </div>
    </div>        

    <div class="form-group row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
    </div>    

</form>    
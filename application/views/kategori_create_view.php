<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h1>Kinicheesetea</h1>
<p><strong>Tambah Data</strong></p>




<div class="row">
                    <div class="col-xl-12">
                         <form action="<?=site_url('kategori/storecreate')?>" method="POST">
                             <div class="form-group">
                                 <label>Id Kategori</label>
                                 <input type="text" name="id_kategori" class="form-control"><span class="text-danger"><?=form_error('id_kategori')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama Kategori</label>
                                 <input type="text" name="nama_kategori" class="form-control"><span class="text-danger"><?=form_error('nama_kategori')?></span>
                             </div>
                             

                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                         </form>
                    </div>
                    </div>

                   
</center>

</body>
</html>
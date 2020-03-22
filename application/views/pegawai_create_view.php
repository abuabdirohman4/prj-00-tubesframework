<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h1>Kinicheesetea</h1>
<p><strong>Tambah Data</strong></p>




<div class="row">
                    <div class="col-xl-12">
                         <form action="storecreate" method="POST">
                             <div class="form-group">
                                 <label>Id Pegawai</label>
                                 <input type="text" name="id_pegawai" value="<?php echo $id_string ?>" class="form-control"><span class="text-danger"><?=form_error('id_pegawai')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama Pegawai</label>
                                 <input type="text" name="nama_pegawai" class="form-control"><span class="text-danger"><?=form_error('nama_pegawai')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Alamat</label>
                                 <input type="text" name="alamat" class="form-control"><span class="text-danger"><?=form_error('alamat')?></span>
                             </div> 
                             <div class="form-group">
                                 <label>Nomor</label>
                                 <input type="text" name="nomor" class="form-control"><span class="text-danger"><?=form_error('nomor')?></span>
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

<html>
<head><title>Bahan Baku</title></head>
<body><center>

<h2>Data Bahan Baku</h2>
<p><strong>Update Data</strong></p>

<div class="row">

                    <div class="col-xl-12">
                         <form action="storeupdate" method="POST">
                             <div class="form-group">

                                 <label>Id Bahan Baku</label>
                                 <input type="text" name="id_bahan_baku" class="form-control" value="<?php echo $id_bahan_baku?>"><span class="text-danger"><?=form_error('id_bahan_baku')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama Bahan Baku </label>
                                 <input type="text" name="nama_bahan_baku" class="form-control" value="<?php echo $nama_bahan_baku?>"><span class="text-danger"><?=form_error('nama_bahan_baku')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Satuan </label>
                                 <input type="text" name="satuan" class="form-control" value="<?php echo $satuan?>"><span class="text-danger"><?=form_error('satuan')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Harga Satuan </label>
                                 <input type="text" name="harga_satuan" class="form-control" value="<?php echo $harga_satuan?>"><span class="text-danger"><?=form_error('harga_satuan')?></span>
                             </div>
                             

                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                         </form>
                    </div>
                    </div>


</body></center>



</html>
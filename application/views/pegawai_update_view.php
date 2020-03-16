<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h1>Kinicheesetea</h1>
<p>===============================</p>

<h2>
<p><strong>Update Data</strong></p></h2>

<div class="row">
                    <div class="col-xl-12">
                         <form action="storeupdate" method="POST">
                             <div class="form-group">
                                 <label>Id Pegawai</label>
                                 <input type="text" name="id_pegawai" class="form-control" readonly value="<?php echo $id_pegawai ?>"><span class="text-danger"><?=form_error('id_pegawai')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama Pegawai</label>
                                 <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $nama_pegawai ?>"> <span class="text-danger"><?=form_error('nama_pegawai')?></span>
							 </div>
							 
							 <div class="form-group">
                                 <label>Alamat</label>
                                 <input type="text" name="alamat" class="form-control" value="<?php echo $alamat ?>"> <span class="text-danger"><?=form_error('alamat')?></span>
                             </div>

                             <div class="form-group">
                                 <label>Nomor</label>
                                 <input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp ?>"> <span class="text-danger"><?=form_error('no_telp')?></span>
                             </div>

                             

                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                         </form>
                    </div>
                    </div>

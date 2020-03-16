<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h1>Kinicheesetea</h1>
<p><strong>Tambah Data</strong></p>




<div class="row">
                    <div class="col-xl-12">
                         <form action="storecreate" method="POST">
                             <div class="form-group">
                                 <label>No Akun</label>
                                 <input type="text" name="no_akun" class="form-control"><span class="text-danger"><?=form_error('no_akun')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama Akun</label>
                                 <input type="text" name="nama_akun" class="form-control"><span class="text-danger"><?=form_error('nama_akun')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Header Akun</label>
                                 <input type="text" name="header_akun" class="form-control"><span class="text-danger"><?=form_error('header_akun')?></span>
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
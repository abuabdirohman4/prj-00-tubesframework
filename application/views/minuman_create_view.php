<html><center>
<head><title>Kinicheesetea</title></head>
<body>
<h1>Kinicheesetea</h1>
<p><strong>Tambah Data</strong></p>

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
    <div class="container-md-4">

<div class="row">
                    <div class="col-xl-12">
                         <form action="storecreate" method="POST">
                             <div class="form-group">
                                 <label>id minuman</label>
                                 <input type="text" value='<?php echo $id_string ?>' name="id_minum" class="form-control"><span class="text-danger"><?=form_error('id_minum')?></span>
                             </div>
                             <div class="form-group">
                                 <label>Nama </label>
                                 <input type="text" name="nama_minum" class="form-control"><span class="text-danger"><?=form_error('nama_minum')?></span>
                             </div>
                             <div class="form-group">
                                 <label>harga </label>
                                 <input type="text" name="harga" class="form-control"><span class="text-danger"><?=form_error('harga')?></span>
                             </div> 
                             <div class="form-group">
                                 <label>id kategori </label>
                                 <select style="display:block" class='form-control' name='id_kategori'>
                                     <option>adasd</option>
                                    <?php
                                        foreach($kategori as $k => $v) {

                                            echo "<option value='$v->nama_kategori'>$v->nama_kategori</option>";
                                        }
                                    ?>
                                 </select>
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

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
                                 <label>id retur</label>
                                 <input type="text" value='<?php echo $id_string ?>' name="id_retur" class="form-control"><span class="text-danger"><?=form_error('id_retur')?></span>
                             </div>
                            <div class="form-group">
                                <label>ID Pembelian </label>
                                <select style="display:block" class='form-control' id='id_pembelian' name='id_pembelian'>
                                    <?php
                                        foreach($pembelian as $k => $v) {

                                            echo "<option value='$v->id_pembelian'>$v->id_pembelian</option>";
                                        }
                                    ?>
                                </select>
                            </div> 
                             <div class="form-group">
                                 <label>bahan baku </label>
                                 <select style="display:block" class='form-control' name='id_bahan_baku'>
                                    <?php
                                        foreach($bahan_baku as $k => $v) {
                                            
                                            echo "<option value='$v->id_bahan_baku'>$v->id_bahan_baku</option>";
                                        }
                                        ?>
                                 </select>
                             </div> 
                            <div class="form-group">
                                <label>jumlah </label>
                                <input type="text" name="jumlah_retur" class="form-control"><span class="text-danger"><?=form_error('harga')?></span>
                            </div> 
                            <div class="form-group">
                                <label>Tanggal </label>
                                <input type="date" name="tgl_retur" class="form-control"><span class="text-danger"><?=form_error('harga')?></span>
                            </div> 
                             

                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                         </form>
                    </div>
                    </div>


</center>
<script type='text/javascript'>

setTimeout(() => {
            $(".select-dropdown").remove()
        }, 200)    
</script>
</body>
</html>

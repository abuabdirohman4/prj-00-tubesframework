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

                                 <label>id retur</label>
                                 <input type="text" name="id_minum" class="form-control" value="<?php echo $row->id_retur?>"><span class="text-danger"><?=form_error('id_minum')?></span>
                             </div>
                             <div class="form-group">
                                 <label>id pembelian</label>
                                 <select style="display:block" class='form-control' name='id_pembelian'>
                                    <?php
                                        foreach($pembelian as $k => $v) {
                                            $selected = $row->id_pembelian == $v->id_pembelian ? 'selected' : '';
                                            echo "<option value='$v->id_pembelian' $selected>$v->id_pembelian</option>";
                                        }
                                    ?>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label>id bahan baku</label>
                                 <select style="display:block" class='form-control' name='id_bahan_baku'>
                                    <?php
                                        foreach($bahan_baku as $k => $v) {
                                            $selected = $row->id_bahan_baku == $v->id_bahan_baku ? 'selected' : '';
                                            echo "<option value='$v->id_bahan_baku' $selected>$v->id_bahan_baku</option>";
                                        }
                                    ?>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label>jumlah </label>
                                 <input type="text" name="jumlah_retur" class="form-control" value="<?php echo $row->jumlah_retur?>"><span class="text-danger"><?=form_error('jumlah_retur')?></span>
                             </div> 
                             <div class="form-group">
                                 <label>tanggal</label>
                                 <input type="date" value='<?php echo $row->tgl_retur?>' name="tgl_retur" class="form-control"><span class="text-danger"><?=form_error('tgl_retur')?></span>

                             </div>
                             

                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                         </form>
                    </div>
                    </div>

<script type='text/javascript'>

setTimeout(() => {
            $(".select-dropdown").remove()
        }, 200)    

</script>


</form>
</center>

</body>
</html>

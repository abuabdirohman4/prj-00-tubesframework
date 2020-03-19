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
                                 <label>id jual</label>
                                 <input type="text" value='<?php echo $model->id_jual ?>' name="id_jual" class="form-control"><span class="text-danger"><?=form_error('id_jual')?></span>
                             </div>
                             <div id="bahan_baku">
                                 <?php
                                    foreach($detail_jual as $k => $v) {
                                        echo '<input type="hidden" name="id_minum_src[]" value="' . $v->id_minum . '"/>';
                                        echo '<div id="bahan_baku_wrapper">';
                                        echo '<div class="form-group">';
                                        echo '<label>id minum </label>
                                        <select style="display:block" class="form-control id_bahan_baku" name="id_minum[]">';
                                        
                                        foreach($minuman as $k2 => $v2) {

                                            echo "<option value='$v2->id_minum'" . ($v2->id_minum == $v->id_minum ? "selected" : "") . ">$v2->id_minum</option>";
                                        }

                                        echo '</select>
                                        </div>
                                        </div>';
                                        echo "<div id='jumlah_wrapper'>";
                                        echo '<div class="form-group">
                                            <label>jumlah </label>
                                            <input type="text" name="jumlah[]" value="' . $v->jumlah . '" class="form-control jumlah"><span class="text-danger"><?=form_error("jumlah")?></span>
                                        </div> ';
                                        echo "</div>";
                                    }
                                 ?>
                                
                            </div>
                             <div class="form-group">
                                 <label>id pegawai </label>
                                 <select style="display:block" class='form-control' name='id_pegawai'>
                                    <?php
                                        foreach($pegawai as $k => $v) {

                                            $selected = $model->id_pegawai == $v->id_pegawai ? "selected" : "";
                                            echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>";
                                        }
                                    ?>
                                 </select>
                             </div> 
                             <div class="form-group ">
                                 <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                                 <input type ="button" value="Batal" onclick="javascript:history.go(-1);"/>
                             </div>
                    </div>
                    </div>

                

</form>
<script>

setTimeout(() => {
    $(".select-dropdown").remove()
}, 200)
</script>
</center>
</body>
</html>

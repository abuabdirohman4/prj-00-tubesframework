<html><center>
<head><title>Kinicheesetea</title></head>
<body>
            <h2>Kinicheesetea - Tambah Data Penjualan</h1><br><br><br>
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
                                 <label>id penjualan</label>
                                 <input type="text" value='<?php echo $id_string ?>' name="id_penjualan" class="form-control"><span class="text-danger"><?=form_error('id_penjualan')?></span>
                             </div>
                             <div id='minuman'>
                                <div class="form-group">
                                    <label>Minuman </label>
                                    <select style="display:block" class='form-control' id='id_minuman' name='id_minum[]'>
                                        <?php
                                            foreach($minuman as $k => $v) {

                                                echo "<option value='$v->id_minum'>$v->id_minum</option>";
                                            }
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>jumlah </label>
                                    <input type="text" name="jumlah[]" class="form-control"><span class="text-danger"><?=form_error('harga')?></span>
                                </div> 
                            </div>
                            <button id="tambah">Tambah</button>
                             <div class="form-group">
                                 <label>id pegawai </label>
                                 <select style="display:block" class='form-control' name='id_pegawai'>
                                    <?php
                                        foreach($pegawai as $k => $v) {

                                            echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>";
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
<script type='text/javascript'>
    $field = $('#minuman').html()

    $(document).ready(()=> {
        $('#tambah').click((e) => {
            e.preventDefault()
            $('#minuman').append($field);
        })
        setTimeout(() => {
            $(".select-dropdown").remove()
        }, 200)
        $(".select-dropdown").remove()
    })
</script>
</body>
</html>

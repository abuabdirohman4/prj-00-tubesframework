<html>
<center>

    <head>
        <title>Kinicheesetea</title>
    </head>

    <div class="row">
        <div class="col-xl-12">
            <form action="storecreate" method="POST">
                <div class="form-group">
                    <label>id pembelian</label>
                    <input type="text" value='<?php echo $id_string ?>' name="id_pembelian" class="form-control"><span class="text-danger"><?= form_error('id_pembelian') ?></span>
                </div>
                <div id='bahan_baku'>
                    <div class="form-group">
                        <label>id bahan baku </label>
                        <select style="display:block" class='form-control' id='id_bahan_baku' name='id_bahan_baku[]'>
                            <?php
                            foreach ($bahan_baku as $k => $v) {

                                echo "<option value='$v->id_bahan_baku'>$v->id_bahan_baku</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>jumlah </label>
                        <input type="text" name="jumlah[]" class="form-control"><span class="text-danger"><?= form_error('harga') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <button id="tambah">Tambah</button>
                </div>
                <div class="form-group">
                    <label>id pegawai </label>
                    <select style="display:block" class='form-control' name='id_pegawai'>
                        <?php
                        foreach ($pegawai as $k => $v) {

                            echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>kd vendor </label>
                    <select style="display:block" class='form-control' name='kd_vendor'>
                        <?php
                        foreach ($vendor as $k => $v) {

                            echo "<option value='$v->kd_vendor'>$v->kd_vendor</option>";
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group ">
                    <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                    <input type="button" value="Batal" onclick="javascript:history.go(-1);" />
                </div>
            </form>
        </div>
    </div>


</center>
<script type='text/javascript'>
    $bahan_baku_html = $('#bahan_baku').html()
    $jumlah_html = $('#jumlah').html()

    $(document).ready(() => {
        $('#tambah').click((e) => {
            e.preventDefault()
            $('#bahan_baku').append($bahan_baku_html);
            $('#bahan_baku').append($jumlah_html);
        })

    })
</script>
</body>

</html>
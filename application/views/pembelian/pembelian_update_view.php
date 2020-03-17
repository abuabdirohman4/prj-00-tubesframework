<html>
<center>

    <head>
        <title>Kinicheesetea</title>
    </head>

    <body>
        <h1>Kinicheesetea</h1>
        <p>===============================</p>

        <h2>
            <p><strong>Update Data</strong></p>
        </h2>


        <div class="row">

            <div class="col-xl-12">
                <form action="storeupdate" method="POST">
                    <div class="form-group">
                        <label>id pembelian</label>
                        <input type="text" value='<?php echo $model->id_pembelian ?>' name="id_pembelian" class="form-control"><span class="text-danger"><?= form_error('id_pembelian') ?></span>
                    </div>
                    <div class="form-group">
                        <label>id bahan baku </label>
                        <select style="display:block" value='<?php echo $model->id_bahan_baku ?>' class='form-control' name='id_bahan_baku'>
                            <?php
                            foreach ($bahan_baku as $k => $v) {

                                $selected = $model->id_bahan_baku == $v->id_bahan_baku ? "selected" : "";
                                echo "<option value='$v->id_bahan_baku' $selected>$v->id_bahan_baku</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>jumlah </label>
                        <input type="text" name="jumlah" value="<?php echo $model->jumlah ?>" class="form-control"><span class="text-danger"><?= form_error('harga') ?></span>
                    </div>
                    <div class="form-group">
                        <label>id pegawai </label>
                        <select style="display:block" class='form-control' name='id_pegawai'>
                            <?php
                            foreach ($pegawai as $k => $v) {

                                $selected = $model->id_pegawai == $v->id_pegawai ? "selected" : "";
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

                                $selected = $model->kd_vendor == $v->kd_vendor ? "selected" : "";
                                echo "<option value='$v->kd_vendor'>$v->kd_vendor</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
        </div>


        </form>
</center>

</body>

</html>
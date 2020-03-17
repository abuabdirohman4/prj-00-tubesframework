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

                        <label>id minuman</label>
                        <input type="text" name="id_minum" class="form-control" value="<?php echo $row->id_minum ?>"><span class="text-danger"><?= form_error('id_minum') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="nama_minum" class="form-control" value="<?php echo $row->nama_minum ?>"><span class="text-danger"><?= form_error('nama_minum') ?></span>
                    </div>
                    <div class="form-group">
                        <label>harga </label>
                        <input type="text" name="harga" class="form-control" value="<?php echo $row->harga ?>"><span class="text-danger"><?= form_error('harga') ?></span>
                    </div>
                    <div class="form-group">
                        <label>id kategori</label>
                        <select style="display:block" class='form-control' name='id_kategori'>
                            <?php
                            foreach ($kategori as $k => $v) {
                                $selected = $row->id_kategori == $v->id_kategori ? 'selected' : '';
                                echo "<option value='$v->id_kategori' $selected>$v->id_kategori</option>";
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


        </form>
</center>

</body>

</html>
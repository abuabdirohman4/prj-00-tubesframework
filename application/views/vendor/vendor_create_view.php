<html>
<center>

    <head>
        <title>Kinicheesetea</title>
    </head>

    <body>
        <h1>Kinicheesetea</h1>
        <p><strong>Tambah Data</strong></p>




        <div class="row">
            <div class="col-xl-12">
                <form action="<?= site_url('vendor/storecreate') ?>" method="POST">
                    <div class="form-group">
                        <label>Kode Vendor</label>
                        <input type="text" name="kd_vendor" value="<?php echo $id_string ?>" class="form-control"><span class="text-danger"><?= form_error('kd_vendor') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Nama Vendor</label>
                        <input type="text" name="nama_vendor" class="form-control"><span class="text-danger"><?= form_error('nama_vendor') ?></span>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control"><span class="text-danger"><?= form_error('alamat') ?></span>
                    </div>


                    <div class="form-group ">
                        <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                        <input type="button" value="Batal" onclick="javascript:history.go(-1);" />
                    </div>
                </form>
            </div>
        </div>


</center>

</body>

</html>
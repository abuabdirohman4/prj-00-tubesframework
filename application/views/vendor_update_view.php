<?= $head ?>

<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<?= $header ?>

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <?= $sidebar_left ?>

        <!-- START CONTENT -->
        <section id="content">

            <?= $breadcrumbs ?>

            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="card-panel">
                            <div class="row">
                                <form action="vendor/storeupdate" method="POST" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Kode Vendor</label>
                                            <input type="text" name="kd_vendor" class="form-control" value="<?php echo $row->kd_vendor ?>"><span class="text-danger"><?= form_error('kd_vendor') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Nama Vendor</label>
                                            <input type="text" name="nama_vendor" class="form-control" value="<?php echo $row->nama_vendor ?>"> <span class="text-danger"><?= form_error('nama_vendor') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat ?>"> <span class="text-danger"><?= form_error('alamat') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" name="btnsubmit" class="cyan waves-effect waves-light btn">Simpan<i class="mdi-content-send right"></i></button>
                                            </button>
                                            <a href="<?= base_url() ?>index.php/vendor/" class="btn waves-effect waves-light red"><i class=" mdi-content-clear"></i></a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--start container-->
            <div class="container">

            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->

        <?= $sidebar_right ?>

    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->

<?= $footer ?>
<?= $scripts ?>
<!-- 
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
                        <label>Kode Vendor</label>
                        <input type="text" name="kd_vendor" class="form-control" value="<?php echo $kd_vendor ?>"><span class="text-danger"><?= form_error('kd_vendor') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Nama Vendor</label>
                        <input type="text" name="nama_vendor" class="form-control" value="<?php echo $nama_vendor ?>"> <span class="text-danger"><?= form_error('nama_vendor') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $alamat ?>"> <span class="text-danger"><?= form_error('alamat') ?></span>
                    </div>


                    <div class="form-group ">
                        <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                        <input type="button" value="Batal" onclick="javascript:history.go(-1);" />
                    </div>
                </form>
            </div>
        </div> -->

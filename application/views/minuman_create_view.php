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
                                <form action="storecreate" method="POST" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>id minuman</label>
                                            <input type="text" value='<?php echo $id_string ?>' name="id_minum" class="form-control"><span class="text-danger"><?= form_error('id_minum') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Nama </label>
                                            <input type="text" name="nama_minum" class="form-control"><span class="text-danger"><?= form_error('nama_minum') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Harga </label>
                                            <input type="text" name="harga" class="form-control"><span class="text-danger"><?= form_error('harga') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">

                                            <select name='id_kategori'>
                                                <option></option>
                                                <?php
                                                foreach ($kategori as $k => $v) {

                                                    echo "<option value='$v->nama_kategori'>$v->nama_kategori</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>ID Kategori </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" name="btnsubmit" class="cyan waves-effect waves-light btn">Simpan<i class="mdi-content-send right"></i></button>
                                            </button>
                                            <a href="<?= base_url() ?>minuman" class="btn waves-effect waves-light red"><i class=" mdi-content-clear"></i></a>
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

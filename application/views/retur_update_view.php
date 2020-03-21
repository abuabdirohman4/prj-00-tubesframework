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

                                            <input type="text" name="id_retur" class="form-control" value="<?php echo $row->id_retur ?>"><span class="text-danger"><?= form_error('id_minum') ?></span>
                                            <label>ID Retur</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name='id_pembelian'>
                                                <?php
                                                foreach ($pembelian as $k => $v) {
                                                    $selected = $row->id_pembelian == $v->id_pembelian ? 'selected' : '';
                                                    echo "<option value='$v->id_pembelian' $selected>$v->id_pembelian</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>ID Pembelian</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name='id_bahan_baku'>
                                                <?php
                                                foreach ($bahan_baku as $k => $v) {
                                                    $selected = $row->id_bahan_baku == $v->id_bahan_baku ? 'selected' : '';
                                                    echo "<option value='$v->id_bahan_baku' $selected>$v->id_bahan_baku</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>ID Bahan Baku</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label>Jumlah </label>
                                            <input type="text" name="jumlah_retur" class="form-control" value="<?php echo $row->jumlah_retur ?>"><span class="text-danger"><?= form_error('jumlah_retur') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label></label>
                                            <input type="date" value='<?php echo $row->tgl_retur ?>' name="tgl_retur" class="datepicker"><span class="text-danger"><?= form_error('tgl_retur') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" name="btnsubmit" class="cyan waves-effect waves-light btn">Simpan<i class="mdi-content-send right"></i></button>
                                            </button>
                                            <a href="<?= base_url() ?>retur" class="btn waves-effect waves-light red"><i class=" mdi-content-clear"></i></a>
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

                        <label>id retur</label>
                        <input type="text" name="id_retur" class="form-control" value="<?php echo $row->id_retur ?>"><span class="text-danger"><?= form_error('id_minum') ?></span>
                    </div>
                    <div class="form-group">
                        <label>id pembelian</label>
                        <select style="display:block" class='form-control' name='id_pembelian'>
                            <?php
                            foreach ($pembelian as $k => $v) {
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
                            foreach ($bahan_baku as $k => $v) {
                                $selected = $row->id_bahan_baku == $v->id_bahan_baku ? 'selected' : '';
                                echo "<option value='$v->id_bahan_baku' $selected>$v->id_bahan_baku</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>jumlah </label>
                        <input type="text" name="jumlah_retur" class="form-control" value="<?php echo $row->jumlah_retur ?>"><span class="text-danger"><?= form_error('jumlah_retur') ?></span>
                    </div>
                    <div class="form-group">
                        <label>tanggal</label>
                        <input type="date" value='<?php echo $row->tgl_retur ?>' name="tgl_retur" class="form-control"><span class="text-danger"><?= form_error('tgl_retur') ?></span>

                    </div>


                    <div class="form-group ">
                        <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                        <input type="button" value="Batal" onclick="javascript:history.go(-1);" />
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

</html> -->
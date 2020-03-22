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
                                            <label>ID Pembelian</label>
                                            <input type="text" readonly value='<?php echo $row->id_pembelian ?>' name="id_pembelian" class="form-control"><span class="text-danger"><?= form_error('id_pembelian') ?></span>
                                        </div>
                                    </div>

                                    <?php
                                    foreach($detail_pembelian as $k => $v) {

                                    ?>

                                    <div class="row">
                                        <div class="input-field col l6">
                                            <select name='id_bahan_baku[]'>
                                                <?php
                                                foreach ($bahan_baku as $k2 => $v2) {
                                                    $selected = $row->id_bahan_baku == $v2->id_bahan_baku ? "selected" : "";
                                                    echo "<option value='$v2->id_bahan_baku' " . ($v->id_bahan_baku == $v2->id_bahan_baku ? "selected" : "" ) . ">$v2->id_bahan_baku</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>ID Bahan Baku </label>
                                        </div>
                                        <div class="input-field col l6">
                                            <label>Jumlah </label>
                                            <input type="text" name="jumlah" value="<?php echo $v->jumlah ?>" class="form-control"><span class="text-danger"><?= form_error('harga') ?></span>
                                        </div>
                                    </div>

                                    <?php
                                    
                                }

                                    ?>
                                    <div class="row">
                                        <div class="col s12">
                                            <label>ID Pegawai </label>
                                            <select class='form-control' id='id_pegawai' name='id_pegawai'>
                                                <?php
                                                foreach ($pegawai as $k => $v) {
                                                    $selected = $row->kd_vendor == $v->kd_vendor ? "selected" : "";
                                                    echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>\n";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name='kd_vendor'>
                                                <?php
                                                foreach ($vendor as $k => $v) {
                                                    $selected = $row->kd_vendor == $v->kd_vendor ? "selected" : "";
                                                    echo "<option value='$v->kd_vendor'>$v->kd_vendor</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>KD Vendor</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" name="btnsubmit" class="cyan waves-effect waves-light btn">Simpan<i class="mdi-content-send right"></i></button>
                                            </button>
                                            <a href="<?= base_url() ?>pembelian" class="btn waves-effect waves-light red"><i class=" mdi-content-clear"></i></a>
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

<?= $scripts ?>

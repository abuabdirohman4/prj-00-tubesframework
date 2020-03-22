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
                                            <label>ID Penjualan</label>
                                            <input type="text" value='<?php echo $row->id_jual ?>' name="id_penjualan" class="form-control"><span class="text-danger"><?= form_error('id_penjualan') ?></span>
                                        </div>
                                    </div>
                                    <div id="tambah_field">
                                        <div class="row">
                                            <div class="input-field col l6">
                                                <select style="display:block" class='form-control' id='id_bahan_baku' name='id_bahan_baku[]'>
                                                    <?php
                                                    foreach ($minuman as $k => $v) {

                                                        echo "<option value='$v->id_minum'>$v->id_minum</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <label>ID Bahan Baku </label>
                                            </div>

                                            <div class="input-field col l6">
                                                <label>Jumlah </label>
                                                <input type="text" name="jumlah[]" class="form-control"><span class="text-danger"><?= form_error('harga') ?></span>
                                            </div>
                                        </div>

                                        <!-- <div id="bahan_baku">
                                            <?php
                                        //     foreach ($detail_jual as $k => $v) {
                                        //         echo '<input type="hidden" name="id_minum_src[]" value="' . $v->id_minum . '"/>';
                                        //         echo '<div id="bahan_baku_wrapper">';
                                        //         echo '<div class="form-group">';
                                        //         echo '<label>id minum </label>
                                        // <select style="display:block" class="form-control id_bahan_baku" name="id_minum[]">';

                                        //         foreach ($minuman as $k2 => $v2) {

                                        //             echo "<option value='$v2->id_minum'" . ($v2->id_minum == $v->id_minum ? "selected" : "") . ">$v2->id_minum</option>";
                                        //         }

                                        //         echo '</select>
                                        // </div>
                                        // </div>';
                                        //         echo "<div id='jumlah_wrapper'>";
                                        //         echo '<div class="form-group">
                                        //     <label>jumlah </label>
                                        //     <input type="text" name="jumlah[]" value="' . $v->jumlah . '" class="form-control jumlah"><span class="text-danger"><?=form_error("jumlah")?></span>
                                        // </div> ';
                                        //         echo "</div>";
                                        //     }
                                            ?>

                                        </div> -->

                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="cyan waves-effect waves-light btn" id="tambah">Tambah</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <label>ID Pegawai </label>
                                            <select class='form-control' id='id_pegawai' name='id_pegawai'>
                                                <?php
                                                foreach ($pegawai as $k => $v) {
                                                    $selected = $model->id_pegawai == $v->id_pegawai ? "selected" : "";
                                                    echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>\n";
                                                }
                                                ?>
                                            </select>
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
                        <label>id jual</label>
                        <input type="text" value='<?php //echo $model->id_jual ?>' name="id_jual" class="form-control"><span class="text-danger"><?= form_error('id_jual') ?></span>
                    </div>
                    <div id="bahan_baku">
                        <?php
                        // foreach ($detail_jual as $k => $v) {
                        //     echo '<input type="hidden" name="id_minum_src[]" value="' . $v->id_minum . '"/>';
                        //     echo '<div id="bahan_baku_wrapper">';
                        //     echo '<div class="form-group">';
                        //     echo '<label>id minum </label>
                        //                 <select style="display:block" class="form-control id_bahan_baku" name="id_minum[]">';

                        //     foreach ($minuman as $k2 => $v2) {

                        //         echo "<option value='$v2->id_minum'" . ($v2->id_minum == $v->id_minum ? "selected" : "") . ">$v2->id_minum</option>";
                        //     }

                        //     echo '</select>
                        //                 </div>
                        //                 </div>';
                        //     echo "<div id='jumlah_wrapper'>";
                        //     echo '<div class="form-group">
                        //                     <label>jumlah </label>
                        //                     <input type="text" name="jumlah[]" value="' . $v->jumlah . '" class="form-control jumlah"><span class="text-danger"><?=form_error("jumlah")?></span>
                        //                 </div> ';
                        //     echo "</div>";
                        // }
                        ?>

                    </div>
                    <div class="form-group">
                        <label>id pegawai </label>
                        <select style="display:block" class='form-control' name='id_pegawai'>
                            <?php
                            // foreach ($pegawai as $k => $v) {

                            //     $selected = $model->id_pegawai == $v->id_pegawai ? "selected" : "";
                            //     echo "<option value='$v->id_pegawai'>$v->id_pegawai</option>";
                            // }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <button type="submit" name="btnsubmit" class="btn btn-success">simpan</button>
                        <input type="button" value="Batal" onclick="javascript:history.go(-1);" />
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

</html> -->